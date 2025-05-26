<?php
session_start();
require_once("settings.php");

// This enhancement adds login functionality to the admin section of the website

// Lockout configuration
$LOCKOUT_DURATION = 60; // in seconds

// Initialize session variables if not already set
if (!isset($_SESSION["login_attempts"])) {
    $_SESSION["login_attempts"] = 0;
}
if (!isset($_SESSION["lockout_time"])) {
    $_SESSION["lockout_time"] = 0;
}

// Handle lockout logic
if ($_SESSION["login_attempts"] >= 3) {
    $elapsed = time() - $_SESSION["lockout_time"];
    if ($elapsed < $LOCKOUT_DURATION) {
        $_SESSION["error"] = "🔒 Too many failed attempts. Please try again in " . ($LOCKOUT_DURATION - $elapsed) . " seconds.";
        header("Location: enhancements.php");
        exit();
    } else {
        // Reset attempts after lockout period
        $_SESSION["login_attempts"] = 0;
        $_SESSION["lockout_time"] = 0;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);

    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION["admin"] = $user;
        $_SESSION["login_attempts"] = 0; // reset on success
        header("Location: manage.php");
        exit();
    } else {
        $_SESSION["login_attempts"] += 1;
        if ($_SESSION["login_attempts"] >= 3) {
            $_SESSION["lockout_time"] = time();
            $_SESSION["error"] = "🔒 Too many failed attempts. Try again in $LOCKOUT_DURATION seconds.";
        } else {
            $_SESSION["error"] = "❌ Invalid username or password.";
        }
        header("Location: enhancements.php");
        exit();
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<article class="NoImageArticle">
  <section>
    <div>
      <h1>Admin Login</h1>

      <?php if (isset($_SESSION["error"])): ?>
        <p class="manage-error"><?= htmlspecialchars($_SESSION["error"]) ?></p>
        <?php unset($_SESSION["error"]); ?>
      <?php endif; ?>

      <form method="post" action="enhancements.php">
        <label class="apply-label" for="username">Username:</label>
        <input class="apply-input" type="text" name="username" id="username" required>

        <label class="apply-label" for="password">Password:</label>
        <input class="apply-input" type="password" name="password" id="password" required>

        <div class="ButtonHolder">
          <input class="BigRedButton" type="submit" value="Login">
          <input class="BigRedButton" type="button" value="Cancel" onclick="history.back();">
        </div>
      </form>
    </div>
  </section>
</article>

</body>
</html>
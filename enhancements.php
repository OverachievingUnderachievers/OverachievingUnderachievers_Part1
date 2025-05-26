<?php
// This enhancement adds login functionality to the admin section of the website
session_start();
require_once("settings.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = trim($_POST["username"]);
    $pass = trim($_POST["password"]);

    // Check directly against plain text values
    $stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_fetch_assoc($result)) {
        $_SESSION["admin"] = $user;
        header("Location: manage.php");
        exit();
    } else {
        $error = "❌ Invalid username or password.";
        header("Location: index.php");
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
    <div class="LeftAlignDiv">
      <h1>Admin Login</h1>
      <form method="post" action="enhancements.php">
        <label class="apply-label" for="username">Username:</label>
        <input class="apply-input" type="text" name="username" id="username" required>

        <label class="apply-label" for="password">Password:</label>
        <input class="apply-input" type="password" name="password" id="password" required>

        <div class="ButtonHolder">
          <input class="BigRedButton" type="submit" value="Login">
        </div>
      </form>
    </div>
  </section>
</article>

</body>
</html>

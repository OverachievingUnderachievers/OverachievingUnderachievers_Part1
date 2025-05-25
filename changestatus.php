<?php
session_start();
if (!isset($_SESSION["admin"])) {
  header("Location: enhancements.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Change EOI Status">
    <meta name="author" content="Harry Webb">
    <title>Change Status</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
    
<?php include_once 'header.inc'; ?>

<body>
    <article class="NoImageArticle">
    
        <div class="manage-table">
        <h1>Change Status</h1><br>

        <?php
            require_once ("settings.php");    
    
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
            if (!$conn) {
                echo "<p>Connection to Database Failed</p>";
            } else {
                $eoi_table = "eoi";


                if (isset ($_POST ["ref_number"])) {
                    $jobrefnumber = $_POST["ref_number"];
                    
                }
                else {
                    header("location: manage.php");
                    exit;
                }
                if (isset ($_POST ["status"])){
                    $Status = $_POST ["status"];
                }
    
                $query = "UPDATE $eoi_table SET Status = '{$Status}' WHERE JobRefNumber = '{$jobrefnumber}'";
    
                $data = mysqli_query($conn, $query);
    
                if (!$data) {
                    echo "<p>Issue with query</p>";
    
                } else {
                    echo "<p> Status of number {$jobrefnumber} has been updated to '{$Status}'";
                }
            mysqli_close($conn);
            }

        ?>    
        </div><br><br><br>
        <a class="BigRedButton" href="manage.php">Return</a><br>
    </article>
</body>
</html>

<?php include 'footer.inc'; ?>

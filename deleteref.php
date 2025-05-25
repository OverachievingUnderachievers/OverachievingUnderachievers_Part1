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
    <meta name="description" content="Delete EOIs">
    <meta name="author" content="Harry Webb">
    <title>Delete By Reference No.</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
    
<?php include_once 'header.inc'; ?>

<body>
    <article class="NoImageArticle">
        
        <div class="manage-table">
        <h1>Delete By Reference No.</h1><br>

        <?php
            require_once ("settings.php");    
    
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
            if (!$conn) {
                echo "<p>Connection to Database Failed</p>";
            } else {
                $eoi_table = "EOI";

                if (isset($_POST['delete_ref'])) {
                    $delete_ref = $_POST['delete_ref'];

                $query = "DELETE FROM $eoi_table WHERE JobRefNumber = '$delete_ref'";
    
                $data = mysqli_query($conn, $query);
                
                if (!$data) {
                    echo "<p>Issue with query</p>";
                } else {
                    if (mysqli_affected_rows($conn) > 0) {
                        echo "<p>Information Deleted for '{$delete_ref}'</p>";
                    } else {
                        echo "<p>No Results Found With Job Reference Number...</p>";
                    }
            }   
            mysqli_close($conn);
            }
            }
        ?>    
        </div><br><br><br>
        <a class="BigRedButton" href="manage.php">Return</a><br>
    </article>

</body>
</html>

<?php include 'footer.inc'; ?>

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
    <meta name="description" content="Sort EOIs By Ref">
    <meta name="author" content="Harry Webb">
    <title>Sort By Reference No.</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
    
<?php include_once 'header.inc'; ?>

<body>
    <article class="NoImageArticle">
        <div class="manage-table">
        <h1>Sort By Reference No.</h1><br>

        <?php
            require_once ("settings.php");    
    
            $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    
            if (!$conn) {
                echo "<p>Connection to Database Failed</p>";
            } else {
                $eoi_table = "eoi";

                if (isset($_POST['search_ref']) && !empty(trim($_POST['search_ref']))) {
                    $search_ref = mysqli_real_escape_string($conn, trim($_POST['search_ref']));

                $query = "SELECT * FROM $eoi_table WHERE JobRefNumber = '$search_ref'";
    
                $data = mysqli_query($conn, $query);
                
    
                if (!$data) {
                    echo "<p>Issue with query</p>";
    
                } else if (mysqli_num_rows($data) > 0) {
                    echo "<table>";
                    echo "<tr>
                        <th>EOI Number</th>                   
                        <th>Job Reference Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Street Address</th>
                        <th>Suburb/Town</th>
                        <th>State</th>
                        <th>Postcode</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Skill 1</th>
                        <th>Skill 2</th>
                        <th>Other Skills</th>
                        <th>Status</th>
                    </tr>";
    
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo "<tr>
                            <td>{$row['EOINumber']}</td>
                            <td>{$row['JobReferenceNumber']}</td>
                            <td>{$row['FirstName']}</td>
                            <td>{$row['LastName']}</td>
                            <td>{$row['StreetAddress']}</td>
                            <td>{$row['SuburbTown']}</td>
                            <td>{$row['State']}</td>
                            <td>{$row['Postcode']}</td>
                            <td>{$row['EmailAddress']}</td>
                            <td>{$row['PhoneNumber']}</td>
                            <td>{$row['Skill1']}</td>
                            <td>{$row['Skill2']}</td>
                            <td>{$row['OtherSkills']}</td>
                            <td>{$row['Status']}</td>
                        </tr>";
                    }
                echo "</table>";
                
                mysqli_free_result($data);
                } else {
                    echo "<p>No Results Found With Job Reference Number...</p>";
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

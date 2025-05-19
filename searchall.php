<!DOCTYPE html>
<html lang="en">

<body>
    <h1>All EOIs</h1>

    <a href="manage.php">Return</a><br>
    <?php      
        require_once ("settings.php");

        $conn = @mysqli_connect(
            $host,
            $user,
            $pwd,
            $sql_db
        );

        if (!$conn) {
            echo "<p>Failed to connect to Database</p>";

        } else {
            $sql_table = "EOI";

            $query = "select * FROM $sql_table";

            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Issue with query</p>";

            } else {
                echo "<table>";
                echo "<tr>
                    <th> EOI Number</th>                   
                    <th>Job Reference Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Street Address</th>
                    <th>Suburb/Town</th>
                    <th>State</th>
                    <th>Postcode</th>
                    <th>Phone Number</th>
                    <th>Skills</th>
                    <th>Other Skills</th>
                    </tr>";


                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['EOINumber']}</td>
                        <td>{$row['JobRefNumber']}</td>
                        <td>{$row['FirstName']}</td>
                        <td>{$row['LastName']}</td>
                        <td>{$row['DOB']}</td>
                        <td>{$row['Gender']}</td>
                        <td>{$row['Email']}</td>
                        <td>{$row['StreetAddress']}</td>
                        <td>{$row['Suburb']}</td>
                        <td>{$row['State']}</td>
                        <td>{$row['Postcode']}</td>
                        <td>{$row['PhoneNumber']}</td>
                        <td>{$row['Skills']}</td>
                        <td>{$row['OtherSkills']}</td>
                        </tr>";
                }
            echo "</table>";
            
            mysqli_free_result($result);
            }
        mysqli_close($conn);
        }
    ?>    
</body>
</html>

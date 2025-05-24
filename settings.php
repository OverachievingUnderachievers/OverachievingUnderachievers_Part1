<?php
$host = "localhost";         // because XAMPP runs the server locally
$username = "root";          // default username for XAMPP's MySQL
$password = "";              // default password is empty in XAMPP
$database = "oua_part2";              // replace with the actual name of your database

$conn = mysqli_connect($host,$username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
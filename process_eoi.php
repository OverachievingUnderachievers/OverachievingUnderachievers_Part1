<?php
require_once("settings.php");

// Redirect if not submitted via POST (direct access protection)
if ($_SERVER["REQUEST_METHOD"] !== "POST" || empty($_POST)) {
    header("Location: apply.php");
    exit();
}

// Helper function to sanitize input
function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Validate and sanitize fields
$jobRef     = clean_input($_POST['JobReferenceNumber']);
$firstName  = clean_input($_POST['FirstName']);
$lastName   = clean_input($_POST['LastName']);
$street     = clean_input($_POST['StreetAddress']);
$suburb     = clean_input($_POST['SuburbTown']);
$state      = clean_input($_POST['State']);
$postcode   = clean_input($_POST['Postcode']);
$email      = clean_input($_POST['EmailAddress']);
$phone      = clean_input($_POST['PhoneNumber']);
$skill1     = clean_input($_POST['Skill1']);
$skill2     = clean_input($_POST['Skill2']);
$otherSkills = clean_input($_POST['OtherSkills']);

// Server-side validation
$errors = [];

if (!preg_match("/^[A-Za-z]{1,20}$/", $firstName)) $errors[] = "First name must be 1–20 alphabetic characters.";
if (!preg_match("/^[A-Za-z]{1,20}$/", $lastName))  $errors[] = "Last name must be 1–20 alphabetic characters.";
if (strlen($street) > 40)                          $errors[] = "Street address must be 40 characters or less.";
if (strlen($suburb) > 40)                          $errors[] = "Suburb/Town must be 40 characters or less.";
if (!in_array($state, ["VIC", "NSW", "QLD", "NT", "WA", "SA", "TAS", "ACT"])) $errors[] = "Invalid state selected.";
if (!preg_match("/^\d{4}$/", $postcode))           $errors[] = "Postcode must be 4 digits.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL))    $errors[] = "Invalid email address.";
if (!preg_match("/^[0-9\s]{8,12}$/", $phone))      $errors[] = "Phone must be 8–12 digits or spaces.";

// Show error page if invalid
if (!empty($errors)) {
    echo "<h1>Submission Failed</h1><ul>";
    foreach ($errors as $e) {
        echo "<li>" . $e . "</li>";
    }
    echo "</ul><p><a href='apply.php'>Go back and try again</a></p>";
    exit();
}

// Create table if it doesn't exist
$createTableSQL = "
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    JobReferenceNumber VARCHAR(5),
    FirstName VARCHAR(20),
    LastName VARCHAR(20),
    StreetAddress VARCHAR(40),
    SuburbTown VARCHAR(40),
    State CHAR(3),
    Postcode CHAR(4),
    EmailAddress VARCHAR(100),
    PhoneNumber VARCHAR(15),
    Skill1 VARCHAR(50),
    Skill2 VARCHAR(50),
    OtherSkills TEXT,
    Status VARCHAR(20) DEFAULT 'New'
)";
mysqli_query($conn, $createTableSQL);

// Insert into table
$insertSQL = "
INSERT INTO eoi 
(JobReferenceNumber, FirstName, LastName, StreetAddress, SuburbTown, State, Postcode, EmailAddress, PhoneNumber, Skill1, Skill2, OtherSkills) 
VALUES 
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $insertSQL);
mysqli_stmt_bind_param($stmt, "ssssssssssss", 
    $jobRef, $firstName, $lastName, $street, $suburb, $state, $postcode, $email, $phone, $skill1, $skill2, $otherSkills);

if (mysqli_stmt_execute($stmt)) {
    $eoi_id = mysqli_insert_id($conn); // Get auto-generated ID
    echo "<h1>Application Submitted Successfully</h1>";
    echo "<p>Your EOI Number is: <strong>$eoi_id</strong></p>";
    echo "<p>Status: <strong>New</strong></p>";
    echo "<p><a href='index.php'>Return to Home</a></p>";
} else {
    echo "<h1>❌ Error submitting application</h1>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>
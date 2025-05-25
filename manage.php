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
    <meta name="description" content="Manage EOIs">
    <meta name="author" content="Harry Webb">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Manage EOIs</title>
</head>
<body>

<?php include 'header.inc'; ?>

<article class="NoImageArticle">

    <div class="ApplyDiv">
    <h1>Manage EOIs</h1>

    <div class="ButtonHolder">
        <a class="BigRedButton" href="searchall.php">View All EOIs</a>
    </div>
    <form method="post" action="searchname.php">
        <fieldset class="apply-fieldset">
            <legend>Search By Name</legend>
            <label class="apply-label" for="search_first_name">First Name</label>
            <input class="apply-input" type="text" name="search_first_name" id="search_first_name">
            <label class="apply-label" for="search_last_name">Last Name</label>
            <input class="apply-input" type="text" name="search_last_name" id="search_last_name"><br><br>
            <input class="BigRedButton" type="submit" value="Search Name">
        </fieldset>
    </form>


    <form method="post" action="searchref.php">
        <fieldset class="apply-fieldset">
            <legend>Search By Ref No.</legend>
            <label class="apply-label" for="search_ref">Job Reference No.</label>
            <input class="apply-input" type="text" name="search_ref" id="search_ref"><br><br>
            <input class="BigRedButton" type="submit" value="Search">
        </fieldset>
    </form>



    <form method="post" action="deleteref.php">
        <fieldset class="apply-fieldset">
            <legend>Delete By Ref No.</legend>
            <label class="apply-label" for="delete_ref">Job Reference No.</label>
            <input class="apply-input" type="text" name="delete_ref" id="delete_ref"><br><br>
            <input class="BigRedButton" type="submit" value="Delete">
        </fieldset>
    </form>

    <form method="post" action="changestatus.php">
        <fieldset class="apply-fieldset">
            <legend>Change EOI Status</legend>
            <label class="apply-label" for="ref_number">Job Reference No.</label>
            <input class="apply-input" type="text" name="ref_number" id="ref_number"><br>
            <label class="apply-label" for="status">Status</label>
            <select class="apply-input" name="status" id="status">
                <option id="New" value="New">New</option>
                <option id="Current" value="Current">Current</option>
                <option id="Final" value="Final">Final</option>
            </select><br><br>
            <input class="BigRedButton" type="submit" value="Change Status">
        </fieldset>
    </form>
    </div>

</article>
</body>


<?php include 'footer.inc'; ?>

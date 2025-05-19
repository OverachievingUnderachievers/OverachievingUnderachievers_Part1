<?php include 'header.inc'; ?>

<link rel="stylesheet" href="styles/styles.css">

<article class="NoImageArticle">

    <div class="ApplyDiv">
    <h1>Manage</h1>

    <div class="ButtonHolder">
        <a class="BigRedButton" href="searchall.php">View All EOIs</a>
    </div>
    <form method="post" action="searchname.php">
        <fieldset class="apply-fieldset">
            <legend>Search By Name</legend>
            <label for="search_first_name">First Name</label>
            <input type="text" name="search_first_name" id="search_first_name"><br><br>
            <label for="search_last_name">Last Name</label>
            <input type="text" name="search_last_name" id="search_last_name"><br><br>
            <input class="BigRedButton" type="submit" value="Search Name">
        </fieldset>
    </form>


    <form method="post" action="searchref.php">
        <fieldset class="apply-fieldset">
            <legend>Search By Ref No.</legend>
            <label for="search_ref">Job Reference No.</label>
            <input type="text" name="search_ref" id="search_ref"><br><br>
            <input class="BigRedButton" type="submit" value="Search">
        </fieldset>
    </form>



    <form method="post" action="deleteref.php">
        <fieldset class="apply-fieldset">
            <legend>Delete By Ref No.</legend>
            <label for="delete_ref">Job Reference No.</label>
            <input type="text" name="delete_ref" id="delete_ref"><br><br>
            <input class="BigRedButton" type="submit" value="Delete">
        </fieldset>
    </form>

<?php include 'footer.inc'; ?>

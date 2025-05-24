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
    <!-- Metadata and document setup -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manage EOIs">
    <meta name="author" content="Nathan Kiremitciyan">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Manage EOIs</title>
</head>
<body>

<!-- Include reusable header -->
<?php include 'header.inc'; ?>

<article class="NoImageArticle">
    <section>
        <h1>Manage EOIs</h1>

        <!-- View all EOIs -->
        <form method="post">
            <fieldset>
                <legend>List All EOIs</legend>
                <input type="submit" name="view_all" value="View All EOIs" class="BigRedButton">
            </fieldset>
        </form>

        <!-- Search EOIs by job reference number -->
        <form method="post">
            <fieldset>
                <legend>Search by Job Reference Number</legend>
                <input type="text" name="job_ref" placeholder="e.g. CE451" class="apply-input">
                <input type="submit" name="search_by_ref" value="Search" class="BigRedButton">
            </fieldset>
        </form>

        <!-- Search EOIs by applicant name -->
        <form method="post">
            <fieldset>
                <legend>Search by Applicant Name</legend>
                <input type="text" name="first_name" placeholder="First Name" class="apply-input">
                <input type="text" name="last_name" placeholder="Last Name" class="apply-input">
                <input type="submit" name="search_by_name" value="Search" class="BigRedButton">
            </fieldset>
        </form>

        <!-- Delete EOIs by job reference number -->
        <form method="post">
            <fieldset>
                <legend>Delete EOIs by Job Reference Number</legend>
                <input type="text" name="delete_ref" placeholder="e.g. CE451" class="apply-input">
                <input type="submit" name="delete_by_ref" value="Delete" class="BigRedButton">
            </fieldset>
        </form>

        <!-- Update EOI status -->
        <form method="post">
            <fieldset>
                <legend>Change EOI Status</legend>
                <input type="number" name="eoi_id" placeholder="EOI Number" class="apply-input" required >
                <select name="new_status" class="apply-input" required>
                    <option value="">Select Status</option>
                    <option value="New">New</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Finalised">Finalised</option>
                </select>
                <input type="submit" name="update_status" value="Update" class="BigRedButton">
            </fieldset>
        </form>
    </section>

    <section>
    <div class="table-container">
        <h2>Results</h2>
        <?php
        // Include DB credentials and establish connection
        require_once("settings.php");
        // Function to print a SQL result as a HTML table
        function print_table($result) {
        $display_columns = ['EOInumber', 'JobReferenceNumber', 'FirstName', 'LastName', 'Status'];
        echo "<table class='eoi-table' border='1'><tr>";
        foreach ($display_columns as $col) {
            echo "<th>{$col}</th>";
        }
        echo "</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($display_columns as $col) {
                echo "<td>" . htmlspecialchars($row[$col]) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }


        // Show all EOIs
        if (isset($_POST['view_all'])) {
            $query = "SELECT * FROM eoi";
            $result = mysqli_query($conn, $query);
            print_table($result);
        }

        // Search by job reference number
        if (isset($_POST['search_by_ref'])) {
            $ref = mysqli_real_escape_string($conn, $_POST['job_ref']);
            $query = "SELECT * FROM eoi WHERE JobReferenceNumber='$ref'";
            $result = mysqli_query($conn, $query);
            print_table($result);
        }

        // Search by applicant name (first, last, or both)
        if (isset($_POST['search_by_name'])) {
            $first = mysqli_real_escape_string($conn, $_POST['first_name']);
            $last = mysqli_real_escape_string($conn, $_POST['last_name']);
            $query = "SELECT * FROM eoi 
                      WHERE FirstName LIKE '%$first%' AND LastName LIKE '%$last%'";
            $result = mysqli_query($conn, $query);
            print_table($result);
        }

        // Delete EOIs by reference number
        if (isset($_POST['delete_by_ref'])) {
            $ref = mysqli_real_escape_string($conn, $_POST['delete_ref']);
            $query = "DELETE FROM eoi WHERE JobReferenceNumber='$ref'";
            if (mysqli_query($conn, $query)) {
                echo "<p>✅ All EOIs with reference $ref deleted.</p>";
            } else {
                echo "<p>❌ Deletion error: " . mysqli_error($conn) . "</p>";
            }
        }

        // Update status for a specific EOI
        if (isset($_POST['update_status'])) {
            $id = (int) $_POST['eoi_id'];
            $status = mysqli_real_escape_string($conn, $_POST['new_status']);
            $query = "UPDATE eoi SET Status='$status' WHERE EOInumber=$id";
            if (mysqli_query($conn, $query)) {
                echo "<p>✅ Status for EOI #$id updated to '$status'.</p>";
            } else {
                echo "<p>❌ Update error: " . mysqli_error($conn) . "</p>";
            }
        }

        // Close DB connection
        mysqli_close($conn);
        ?>
        </div>
    </div>
</div>
</section>
</article>

<!-- Include reusable footer -->
<?php include 'footer.inc'; ?>
</body>
</html>
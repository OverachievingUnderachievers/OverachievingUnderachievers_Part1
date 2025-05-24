<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Job Descriptions for roles at Overachieving Underachievers">
  <meta name="author" content="Krish Sheemar">
  <meta name="keywords" content="Job, PHP, MySQL, Dynamic Jobs">
  <link rel="stylesheet" href="styles/styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <title>Job Descriptions – Overachieving Underachievers</title>
</head>
<body>

<?php include 'header.inc'; ?>
<?php require_once 'settings.php'; ?>

<?php
$query = "SELECT * FROM jobs";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
  while ($job = mysqli_fetch_assoc($result)) {
    echo "<article class='NoImageArticle'>";

    // Section 1 - Overview
    echo "<section>
            <div class='LeftAlignDiv'>
              <h1>{$job['JobTitle']}</h1>
              <p class='Tagline'>At Overachieving Underachievers, anything is achievable</p>
              <p><strong>Position Reference:</strong> {$job['JobRef']}</p>
              <p><strong>Location:</strong> {$job['Location']}</p>
              <p><strong>Salary:</strong> {$job['SalaryRange']}</p>
              <p><strong>Reports to:</strong> {$job['ReportsTo']}</p>
            </div>
            <aside class='RightAlignDiv'>
              <h2>Quick Facts</h2>
              <ul>
                <li><strong>Position Type:</strong> {$job['PositionType']}</li>
                <li><strong>Office:</strong> {$job['Office']}</li>
                <li><strong>Work Mode:</strong> {$job['WorkMode']}</li>
                <li><strong>Start Date:</strong> {$job['StartDate']}</li>
              </ul>
              <img src='images/TOULogo.png' alt='Company Logo' style='max-width: 200px; display: block; margin: 10px auto;'>
            </aside>
          </section>";

    // Section 2 - Role & Company
    echo "<section>
            <div class='LeftAlignDiv'>
              <h2>About the Role</h2>
              <p>{$job['Description']}</p>
            </div>
            <div class='RightAlignDiv'>
              <h2>About the Company</h2>
              <p>{$job['CompanyInfo']}</p>
            </div>
          </section>";

    // Section 3 - Responsibilities & Structure
    echo "<section>
            <div class='LeftAlignDiv'>
              <h2>Key Responsibilities</h2>
              <ol>";

    // Print responsibilities as list items (if they are delimited)
    $responsibilities = explode("\n", $job['Responsibilities']);
    foreach ($responsibilities as $item) {
      if (trim($item) !== '') {
        echo "<li>" . htmlspecialchars($item) . "</li>";
      }
    }

    echo "  </ol>
            </div>
            <div class='RightAlignDiv'>
              <h2>Reporting Structure</h2>
              <p>{$job['ReportingStructure']}</p>
            </div>
          </section>";

    // Section 4 - Skills
    echo "<section>
            <div class='LeftAlignDiv'>
              <h2>Essential Qualifications and Skills</h2>
              <ul>";

    $essentials = explode("\n", $job['EssentialSkills']);
    foreach ($essentials as $item) {
      if (trim($item) !== '') {
        echo "<li>" . htmlspecialchars($item) . "</li>";
      }
    }

    echo "  </ul>
            </div>
            <div class='RightAlignDiv'>
              <h2>Preferable Attributes</h2>
              <ul>";

    $preferred = explode("\n", $job['PreferredAttributes']);
    foreach ($preferred as $item) {
      if (trim($item) !== '') {
        echo "<li>" . htmlspecialchars($item) . "</li>";
      }
    }

    echo "  </ul>
            </div>
          </section>";

    // Section 5 - Apply Button
    echo "<section>
            <div class='RightAlignDiv'>
              <div class='ButtonHolder'><a href='apply.php' class='BigRedButton'>Apply Now!</a></div>
            </div>
          </section>";

    echo "</article>";
  }
} else {
  echo "<p>No job listings found.</p>";
}

mysqli_close($conn);
?>

<?php include 'footer.inc'; ?>
</body>
</html>

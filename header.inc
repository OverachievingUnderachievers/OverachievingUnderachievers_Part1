<?php
// header.inc
function isCurrentPage($page) {
    return basename($_SERVER['PHP_SELF']) == $page ? 'Current' : '';
}
?>

<!-- Site Header with Navigation -->
<header>
<!-- Logo previously generated with OpenAI's DALL·E (April 2025) for branding consistency -->
    <img src="images/TOULogo2.png" alt="Logo">
    <nav>
    <!-- Primary Navigation -->
        <a class="NonActive">OVERACHIEVING UNDERACHIEVERS</a>
        <a href="index.php" class="<?php echo isCurrentPage('index.php'); ?>">Home</a>
        <a href="plans.php" class="<?php echo isCurrentPage('plans.php'); ?>">Plans</a>
        <a href="about.php" class="<?php echo isCurrentPage('about.php'); ?>">About</a>
    </nav>
    <nav class="NavRight">
    <!-- Secondary Navigation for Careers -->
        <a class="NonActive">Careers:</a>
        <a href="jobs.php" class="<?php echo isCurrentPage('jobs.php'); ?>">Job Descriptions</a>
        <a href="apply.php" class="<?php echo isCurrentPage('apply.php'); ?>">Job Application</a>
    </nav>
</header>

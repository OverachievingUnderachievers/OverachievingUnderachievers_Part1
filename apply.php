<!-- Page structure, field layout, and form validation revised with help from ChatGPT -->
<!-- Original author: Harry Webb -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Job Application Form">
  <meta name="keywords" content="Job Application, Form, HTML">
  <meta name="author" content="Harry Webb">
  <link rel="stylesheet" href="styles/styles.css">
  <title>Job Application – Overachieving Underachievers</title>
</head>
<body>

  <!-- Header inclusion for redundancy and modularity -->
  <?php include 'header.inc'; ?>

  <!-- Main Application Form -->
  <article class="NoImageArticle">
    <section>
      <div class="ApplyDiv">
        <h1>Job Application Form</h1>
        <p class="Tagline">Apply to join the Overachieving Underachievers</p>

        <!-- Form generated and validated with ChatGPT guidance -->
        <form action="http://mercury.swin.edu.au/it000000/formtest.php" method="post">
        <section>
        <div class="LeftAlignDiv">

          <!-- Reference -->
          <label class="apply-label" for="reference_number">Job Reference Number:</label><br>
          <select class="apply-input" name="reference_number" id="reference_number" required>
            <option value="">Please Select</option>
            <option value="CE451">CE451</option>
            <option value="SD302">SD302</option>
          </select><br><br>

          <!-- Name -->
          <label class="apply-label" for="first-name">First Name:</label>
          <input class="apply-input" type="text" name="first-name" id="first-name" placeholder="First Name" required>

          <label class="apply-label" for="last-name">Last Name:</label>
          <input class="apply-input" type="text" name="last-name" id="last-name" placeholder="Last Name" required>

          <!-- DOB with HTML5 pattern -->
          <label class="apply-label" for="DOB">Date of Birth:</label>
          <input class="apply-input" type="text" name="DOB" id="DOB" placeholder="dd/mm/yyyy" pattern="\d{2}/\d{2}/\d{4}" required><br><br>

          <!-- Gender (fieldset = semantic grouping) -->
          <fieldset class="apply-fieldset">
            <legend>Gender</legend>
            <label for="male"><input type="radio" id="male" name="gender" value="male" checked> Male</label>
            <label for="female"><input type="radio" id="female" name="gender" value="female"> Female</label>
            <label for="other"><input type="radio" id="other" name="gender" value="other"> Other</label>
          </fieldset><br>

          <!-- Contact -->
          <label class="apply-label" for="email">Email:</label>
          <input class="apply-input" type="email" name="email" id="email" placeholder="Email" required>

          <label class="apply-label" for="phone_number">Phone Number:</label>
          <input class="apply-input" type="text" name="phone_number" id="phone_number" placeholder="Phone Number" pattern="[0-9\s]{8,12}" required>
          <br><br><br><br>
        </div>

        <div class="RightAlignDiv">
          <!-- Address -->
          <label class="apply-label" for="address">Street Address:</label>
          <input class="apply-input" type="text" name="address" id="address" placeholder="Street Address" required>

          <label class="apply-label" for="suburb">Suburb/Town:</label>
          <input class="apply-input" type="text" name="suburb" id="suburb" placeholder="Suburb/Town" required>

          <label class="apply-label" for="postcode">Postcode:</label>
          <input class="apply-input" type="text" name="postcode" id="postcode" placeholder="Postcode" pattern="\d{4}" required>

          <label class="apply-label" for="state">State:</label>
          <select class="apply-input" name="state" id="state" required>
            <option value="">State</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
          </select>

          <!-- Skills fieldset -->
          <fieldset class="apply-fieldset">
            <legend>Required Technical Skills</legend>
            <label for="skill-html"><input type="checkbox" id="skill-html" name="skill" value="1" checked> HTML</label>
            <label for="skill-css"><input type="checkbox" id="skill-css" name="skill" value="2"> CSS</label>
            <br>
            <label for="skill-js"><input type="checkbox" id="skill-js" name="skill" value="3"> JavaScript</label>
            <label for="skill-debug"><input type="checkbox" id="skill-debug" name="skill" value="4"> Debugging</label>
          </fieldset><br>

          <!-- Other Skills -->
          <label class="apply-label" for="other-skills">Other Skills:</label><br>
          <textarea class="apply-input" id="other-skills" name="other-skills" rows="5" placeholder="List additional skills..."></textarea><br><br>
        </div>

        <!-- Submit and Reset -->
        <div class="ButtonHolder">
          <input class="BigRedButton" type="submit" value="Apply">
          <input class="BigRedButton" type="reset" value="Reset">
        </div>
        </section>
        </form>        
      </div>
    </section>
  </article>
  
  <!-- Footer inclusion for redundancy and modularity -->
  <?php include 'footer.inc';?>

</body>
</html>
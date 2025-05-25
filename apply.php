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

<?php include 'header.inc'; ?>

<article class="NoImageArticle">
  <div class="ApplyDiv">
    <h1>Job Application Form</h1>
    <p class="Tagline">Apply to join the Overachieving Underachievers</p>

    <form action="process_eoi.php" method="post" novalidate="novalidate">

      <label class="apply-label" for="JobReferenceNumber">Job Reference Number:</label>
      <div class="apply-row">
        <select class="apply-input" name="JobReferenceNumber" id="JobReferenceNumber" required>
          <option value="">Please Select</option>
          <option value="CE451">CE451</option>
          <option value="SD302">SD302</option>
        </select>
      </div>

      <span class="apply-label">Name: </span>
      <div class="apply-row">
        <div class="apply-input-name" id="apply-names">
          <input class="apply-input" type="text" id="FirstName" name="FirstName" pattern="{0,20}[A-Za-z]" placeholder="e.g. Steven" required>
          <label for="FirstName">First Name</label>
        </div>
        <div class="apply-input-name">
          <input class="apply-input" type="text" id="LastName" name="LastName" pattern="{0,20}[A-Za-z]" placeholder="e.g. Smith" required>
          <label for="LastName">Last Name</label>
        </div>
      </div>

      <div class="apply-row">
        <div class="apply-input-group">
          <label class="apply-label" for="EmailAddress">Email: </label>
          <input class="apply-input" type="email" id="EmailAddress" name="EmailAddress" placeholder="e.g. ex@example.com" required>
        </div>
        <div class="apply-input-group">
          <label class="apply-label" for="PhoneNumber">Phone Number: </label>
          <input class="apply-input" type="text" id="PhoneNumber" name="PhoneNumber" pattern="[0-9\s]{8,12}" required>
        </div>
      </div>

      <div class="apply-row">
        <div class="apply-input-group">
          <label class="apply-label" for="StreetAddress">Street Address: </label>
          <input class="apply-input" type="text" id="StreetAddress" name="StreetAddress" maxlength="40" required>
        </div>
        <div class="apply-input-group">
          <label class="apply-label" for="SuburbTown">Suburb / Town: </label>
          <input class="apply-input" type="text" id="SuburbTown" name="SuburbTown" maxlength="40" required>
        </div>
      </div>

      <div class="apply-row">
        <div class="apply-input-group">
          <label class="apply-label" for="Postcode">Postcode: </label>
          <input class="apply-input" type="text" id="Postcode" name="Postcode" pattern="\d{4}" required>
        </div>
        <div class="apply-input-group">
          <label class="apply-label" for="State">State: </label>
          <select class="apply-input" id="State" name="State" required>
            <option value="">Please Select</option>
            <option value="VIC">VIC</option>
            <option value="NSW">NSW</option>
            <option value="QLD">QLD</option>
            <option value="NT">NT</option>
            <option value="WA">WA</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="ACT">ACT</option>
          </select>
        </div>
      </div>

      <div class="apply-row">
        <div class="apply-input-group">
          <label class="apply-label" for="Skill1">Primary Skill: </label>
          <select class="apply-input" id="Skill1" name="Skill1">
            <option value="">Select a Skill</option>
            <option value="HTML">HTML</option>
            <option value="CSS">CSS</option>
            <option value="JavaScript">JavaScript</option>
            <option value="Debugging">Debugging</option>
          </select>
        </div>
        <div class="apply-input-group">
          <label class="apply-label" for="Skill2">Secondary Skill: </label>
          <select class="apply-input" id="Skill2" name="Skill2">
            <option value="">Select a Skill</option>
            <option value="HTML">HTML</option>
            <option value="CSS">CSS</option>
            <option value="JavaScript">JavaScript</option>
            <option value="Debugging">Debugging</option>
          </select>
        </div>
      </div>

      <label class="apply-label" for="OtherSkills">Other Skills:</label>
      <textarea class="apply-input" name="OtherSkills" id="OtherSkills" rows="5" placeholder="List additional skills..."></textarea>

      <div class="ButtonHolder">
        <input class="BigRedButton" type="submit" value="Apply">
        <input class="BigRedButton" type="reset" value="Reset">
      </div>

    </form>
  </div>
</article>

<?php include 'footer.inc'; ?>

</body>
</html>

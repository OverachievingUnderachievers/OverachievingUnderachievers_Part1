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
         <form action="process_eoi.php" method="post" novalidate="novalidate">
          <section>
            <div class="LeftAlignDiv">

              <!-- Job Reference Number -->
               <label class="apply-label" for="JobReferenceNumber">Job Reference Number:</label><br>
               <select class="apply-input" name="JobReferenceNumber" id="JobReferenceNumber" required>
                <option value="">Please Select</option>
                <option value="CE451">CE451</option>
                <option value="SD302">SD302</option>
              </select><br><br>

              <!-- First and Last Name -->
               <label class="apply-label" for="FirstName">First Name:</label>
               <input class="apply-input" type="text" name="FirstName" id="FirstName" placeholder="First Name" required>
               <label class="apply-label" for="LastName">Last Name:</label>
               <input class="apply-input" type="text" name="LastName" id="LastName" placeholder="Last Name" required>
               
               <!-- Email and Phone -->
                <label class="apply-label" for="EmailAddress">Email:</label>
                <input class="apply-input" type="email" name="EmailAddress" id="EmailAddress" placeholder="Email" required>
                <label class="apply-label" for="PhoneNumber">Phone Number:</label>
                <input class="apply-input" type="text" name="PhoneNumber" id="PhoneNumber" placeholder="Phone Number" pattern="[0-9\s]{8,12}" required>
                <br><br><br><br>
              </div>

              <div class="RightAlignDiv">

                <!-- Address -->
               <label class="apply-label" for="StreetAddress">Street Address:</label>
               <input class="apply-input" type="text" name="StreetAddress" id="StreetAddress" placeholder="Street Address" required>
               <label class="apply-label" for="SuburbTown">Suburb/Town:</label>
               <input class="apply-input" type="text" name="SuburbTown" id="SuburbTown" placeholder="Suburb/Town" required>
               <label class="apply-label" for="Postcode">Postcode:</label>
               <input class="apply-input" type="text" name="Postcode" id="Postcode" placeholder="Postcode" pattern="\d{4}" required>
               <label class="apply-label" for="State">State:</label>
               <select class="apply-input" name="State" id="State" required>
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
              
              <!-- Skills Dropdowns -->
               <label class="apply-label" for="Skill1">Primary Skill:</label>
               <select class="apply-input" name="Skill1" id="Skill1" required>
                <option value="">Select a Skill</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Debugging">Debugging</option>
              </select>
              <label class="apply-label" for="Skill2">Secondary Skill:</label>
              <select class="apply-input" name="Skill2" id="Skill2">
                <option value="">Select a Skill</option>
                <option value="HTML">HTML</option>
                <option value="CSS">CSS</option>
                <option value="JavaScript">JavaScript</option>
                <option value="Debugging">Debugging</option>
              </select><br>

              <!-- Other Skills -->
               <label class="apply-label" for="OtherSkills">Other Skills:</label><br>
               <textarea class="apply-input" id="OtherSkills" name="OtherSkills" rows="5" placeholder="List additional skills..."></textarea><br><br>
              </div>
            </section>
        <!-- Submit and Reset -->
        <div class="ButtonHolder">
          <input class="BigRedButton" type="submit" value="Apply">
          <input class="BigRedButton" type="reset" value="Reset">
        </div>
        </form>        
      </div>
    </section>
  </article>
  
  <!-- Footer inclusion for redundancy and modularity -->
  <?php include 'footer.inc';?>

</body>
</html>
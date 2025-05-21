<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Yamen Sayes">
    <title>Apply for a job | Anonymous</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body id="applyBody">
    <?php include 'header.inc'; ?>
    <div class="applyForm">
        <form method="post" action="process_eoi.php">
            <fieldset id="applyFormSection">
                <legend id="formLegend"><strong>Apply for a job:</strong></legend>

                <!-- Job Reference -->
                <p>
                    <label for="jobRefNum">Job reference number:
                        <select class="input" name="jobRefNum" id="jobRefNum" required>
                            <option value="">Please Select</option>
                            <option value="SDT21">SDT21</option>
                            <option value="ISA58">ISA58</option>
                            <option value="DAN92">DAN92</option>
                        </select>
                    </label>
                </p>

                <!-- First Name -->
                <p>
                    <label for="firstName">First Name:
                        <input class="input" type="text" name="firstName" id="firstName" required maxlength="20" pattern="[a-zA-Z]+" oninvalid="('Please only enter a maximum of 20 alpha characters')">
                    </label>
                </p>

                <!-- Last Name -->
                <p>
                    <label for="lastName">Last Name:
                        <input class="input" type="text" name="lastName" id="lastName" required maxlength="20" pattern="[a-zA-Z]+" oninvalid="('Please only enter a maximum of 20 alpha characters')">
                    </label>
                </p>

                <!-- Email -->
                <p>
                    <label for="email">Email:
                        <input class="input" type="email" name="email" id="email" required>
                    </label>
                </p>

                <!-- Date of Birth -->
                <p>
                    <label for="dob">Date of Birth:
                        <input class="input" type="date" name= "dob" id="dob" size="10" max="2025-12-31" required>
                    </label>
                </p>

                <!-- Gender -->
                <fieldset id="genderFieldset">
                    <legend><strong>Gender:</strong></legend>
                    <p id="genderRadio">
                        <label for="male">Male</label>
                        <input type="radio" id="male" name="gender" value="male" required>
                        <label for="female">Female</label>
                        <input type="radio" id="female" name="gender" value="female">
                    </p>
                </fieldset>

                <!-- Street Address -->
                <p>
                    <label for="street_address">Street address:
                        <input class="input" type="text" name="street_address" id="street_address" required maxlength="40" oninvalid="setCustomValidity('Please enter a maximum of 40 alpha characters')">
                    </label>
                </p>

                <!-- Suburb/Town -->
                <p>
                    <label for="suburbTown">Suburb/town:
                        <input class="input" type="text" name="suburbTown" id="suburbTown" required maxlength="40">
                    </label>
                </p>

                <!-- State -->
                <p>
                    <label for="state">State:
                        <select class="input" name="state" id="state" required>
                            <option value="">Please select</option>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </label>
                </p>

                <!-- Postcode -->
                <p>
                    <label for="postcode">Postcode:
                        <input class="input" type="text" name="postcode" id="postcode" minlength="4" maxlength="4" pattern="[0-9]+">
                    </label>
                </p>

                <!-- Phone Number -->
                <p>
                    <label for="phoneNumber">Phone Number:
                        <input class="input" type="text" name="phoneNumber" id="phoneNumber" minlength="8" maxlength="12" pattern="[0-9]+">
                    </label>
                </p>

                <!-- Qualifications -->
                <fieldset id="qualificationCheckbox">
                    <legend><strong>Required Technical Qualifications:</strong></legend>
                    <p>
                        <input class="checkbox" type="checkbox" id="bachelorDegree" name="qualifications[]" value="bachelorDegree" required>
                        <label for="bachelorDegree">Bachelor's degree in Computer Science, Software Engineering, or a related field.</label>
                    </p>
                    <p>
                        <input class="checkbox" type="checkbox" id="threeYearsExp" name="qualifications[]" value="threeYearsExp" required>
                        <label for="threeYearsExp">Minimum of 3 years of professional experience in software development.</label>
                    </p>
                    <p>
                        <input class="checkbox" type="checkbox" id="twoLanguageProficiency" name="qualifications[]" value="twoLanguageProficiency" required>
                        <label for="twoLanguageProficiency">Strong proficiency in at least two programming languages.</label>
                    </p>
                    <p>
                        <input class="checkbox" type="checkbox" id="frameworkExperience" name="qualifications[]" value="frameworkExperience" required>
                        <label for="frameworkExperience">Experience with software development frameworks (e.g., .NET, React, Angular, Spring, Django).</label>
                    </p>
                </fieldset>

                <!-- Other Skills -->
                <p>
                    <label for="otherSkills">Other skills:
                        <textarea name="otherSkills" id="otherSkills" rows="4" cols="40" placeholder="Write about your other skills here..."></textarea>
                    </label>
                </p>

                <p>
                    <input id="applyButton" type="submit" value="Apply">
                </p>
                <p>
                    <input id="resetButton" type="reset" value="Reset Form">
                </p>
            </fieldset>
        </form>
    </div>
    <?php include 'footer.inc'; ?>
</body>
</html>

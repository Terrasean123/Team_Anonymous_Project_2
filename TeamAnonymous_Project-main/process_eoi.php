<?php
include('db_connection.php');


$job_reference_number = $_POST['jobRefNum'];
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$phone_number = $_POST['phoneNumber'];
$skills = $_POST['otherSkills'];
$street_address = $_POST['street_address'];
$suburb_town = $_POST['suburbTown'];
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$qualifications = implode(", ", $_POST['qualifications']); 


if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

if (!preg_match("/^[0-9]{8,12}$/", $phone_number)) {
    echo "Invalid phone number format";
    exit;
}


$sql = "INSERT INTO EOI (job_reference_number, first_name, last_name, email, phone_number, skills, street_address, suburb_town, state, postcode, gender, dob, qualifications) 
VALUES ('$job_reference_number', '$first_name', '$last_name', '$email', '$phone_number', '$skills', '$street_address', '$suburb_town', '$state', '$postcode', '$gender', '$dob', '$qualifications')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";  
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;  
}

$conn->close();
?>

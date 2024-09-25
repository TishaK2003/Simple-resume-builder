<?php
// Database credentials
$host = 'localhost';
$db = 'resume_builder';
$user = 'root';  // Your MySQL username
$pass = '';      // Your MySQL password

// Create a MySQL connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Insert user information into the users table
$sql = "INSERT INTO users (firstName, lastName, email, phone) VALUES ('$firstName', '$lastName', '$email', '$phone')";
if ($conn->query($sql) === TRUE) {
    $userId = $conn->insert_id;

    // Insert education details
    $degree = $_POST['degree'];
    $institution = $_POST['institution'];
    $startYear = $_POST['startYear'];
    $endYear = $_POST['endYear'];
    $sqlEdu = "INSERT INTO education (userId, degree, institution, startYear, endYear) VALUES ('$userId', '$degree', '$institution', '$startYear', '$endYear')";
    $conn->query($sqlEdu);

    // Insert experience details
    $position = $_POST['position'];
    $company = $_POST['company'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $sqlExp = "INSERT INTO experience (userId, position, company, startDate, endDate) VALUES ('$userId', '$position', '$company', '$startDate', '$endDate')";
    $conn->query($sqlExp);

    echo "Resume submitted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>

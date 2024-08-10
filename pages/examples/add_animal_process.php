<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ebawbawdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name = $_POST['name'];
$client_name = $_POST['client_name'];
$animalType = $_POST['animalType'];
$location = $_POST['location'];
$client_location = $_POST['client_location'];
$animalSex = $_POST['animalSex'];
$age = $_POST['age'];
$clientNIC = $_POST['clientNIC'];
$link = $_POST['link'];
$client_contact = $_POST['client_contact'];
$note = $_POST['note'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO animals (name, client_name, animalType, location, client_location, animalSex, age, clientNIC, link, client_contact, note) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssissss", $name, $client_name, $animalType, $location, $client_location, $animalSex, $age, $clientNIC, $link, $client_contact, $note);

// Execute the statement
if ($stmt->execute()) {
    echo "<script>alert('New animal added successfully'); window.location.href = 'http://localhost/E-BawBaw-main/pages/examples/add_animal.html';</script>";

    
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
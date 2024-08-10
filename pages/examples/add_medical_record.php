<?php
// add_medical_record.php

// Database connection
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

// Get the form data
$animal_id = isset($_POST['animal_id']) ? intval($_POST['animal_id']) : 0;
$medical_details = isset($_POST['medical_details']) ? $_POST['medical_details'] : '';

if ($animal_id && $medical_details) {
    // Insert medical record into the database
    $sql = "INSERT INTO medical_records (animal_id, medical_details) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $animal_id, $medical_details);
    if ($stmt->execute()) {
        echo "<script>alert('Medical record added successfully'); window.location.href = 'profile.php?id=$animal_id';</script>";
    } else {
        echo "<script>alert('Error adding medical record'); window.location.href = 'profile.php?id=$animal_id';</script>";
    }
    $stmt->close();
} else {
    echo "<script>alert('Invalid input'); window.location.href = 'profile.php?id=$animal_id';</script>";
}

$conn->close();
?>
<?php
// add_follow_up.php

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

// Handle follow-up record insertion
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['follow_up_details'])) {
    $animal_id = intval($_POST['animal_id']);
    $details = $_POST['follow_up_details'];

    $sql_insert = "INSERT INTO follow_ups (animal_id, follow_up_details) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("is", $animal_id, $details);

    if ($stmt_insert->execute()) {
        header("Location: profile.php?id=$animal_id");
        exit();
    } else {
        echo "<script>alert('Failed to add follow-up record');</script>";
    }

    $stmt_insert->close();
}

$conn->close();
?>

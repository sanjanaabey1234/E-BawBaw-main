<?php
// delete_animal.php

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

// Check if 'id' is set in the query string
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // SQL query to delete the record
    $sql = "DELETE FROM animals WHERE id = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Record deleted successfully
            echo "<script>alert('Animal Record Deleted successfully'); window.location.href = 'http://localhost/E-BawBaw-main/Animals-page.php';</script>";
        } else {
            // Record not found
            echo "Record not found or already deleted.";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare SQL statement.";
    }
} else {
    echo "No ID specified.";
}

// Close connection
$conn->close();
?>
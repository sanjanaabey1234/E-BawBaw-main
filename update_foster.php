<?php
// update_foster.php
include 'db_connection.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id = $_POST['id'];
    $foster_parent = $_POST['foster_parent'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $nic = $_POST['nic'];
    $description = $_POST['description'];

    // Prepare an SQL statement for execution
    $stmt = $conn->prepare("UPDATE foster_parents SET foster_parent = ?, email = ?, contact = ?, address = ?, nic = ?, description = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $foster_parent, $email, $contact, $address, $nic, $description, $id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
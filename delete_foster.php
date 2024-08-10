<?php
// delete_foster.php
include 'db_connection.php'; // Include database connection

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the ID from the query string and convert it to an integer

    // Prepare an SQL statement for execution
    $stmt = $conn->prepare("DELETE FROM foster_parents WHERE id = ?");
    $stmt->bind_param("i", $id);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to the same page or any other page after successful deletion
        header("Location: http://localhost/E-BawBaw-main/foster_parent.php"); // Replace with the actual page you want to redirect to
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
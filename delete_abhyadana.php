<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ebawbawdb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided in the query string
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Get the ID from the query string
    $id = intval($_GET['id']);
    
    // Prepare the SQL DELETE statement
    $sql = "DELETE FROM abhyadana WHERE id = ?";
    
    // Prepare and execute the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            // Record deleted successfully
            $stmt->close();
            $conn->close();
            header("Location: abhyadana.php?msg=Record deleted successfully");
            exit();
        } else {
            // Error executing statement
            echo "Error deleting record: " . $conn->error;
        }
    } else {
        // Error preparing statement
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    // No ID provided
    echo "No record ID specified.";
}

$conn->close();
?>
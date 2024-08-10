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

// Get the ID from the query string
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prepare the DELETE statement
    $sql = "DELETE FROM Sterilization WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter and execute the statement
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            // Redirect with success message
            echo "<script>
                    alert('Record deleted successfully.');
                    window.location.href = 'projects.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error deleting record.');
                    window.location.href = 'projects.php';
                  </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
                alert('Failed to prepare the SQL statement.');
                window.location.href = 'projects.php';
              </script>";
    }
} else {
    echo "<script>
            alert('No ID specified.');
            window.location.href = 'projects.php';
          </script>";
}

$conn->close();
?>
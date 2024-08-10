<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $foster_parent = $_POST['foster_parent'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $nic = $_POST['nic'];
    $description = $_POST['description'];

    // Validate form data (you can add more validation if needed)
    if (empty($foster_parent) || empty($email) || empty($contact) || empty($address) || empty($nic)) {
        echo "All fields are required.";
        exit;
    }

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

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO foster_parents (foster_parent, email, contact, address, nic, description) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $foster_parent, $email, $contact, $address, $nic, $description);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New foster parent added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
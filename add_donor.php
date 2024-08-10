<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "ebawbawdb"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $nicnum = htmlspecialchars(trim($_POST['nicnum']));
    $contact = htmlspecialchars(trim($_POST['contact']));
    $email = htmlspecialchars(trim($_POST['email']));
    $donation_type = htmlspecialchars(trim($_POST['donation_type']));
    $donation_value = htmlspecialchars(trim($_POST['donation_value']));
    $notes = htmlspecialchars(trim($_POST['notes']));
    
    // Validate input
    if (empty($name) || empty($nicnum) || empty($contact) || empty($email) || empty($donation_type) || empty($donation_value)) {
        echo "Please fill in all required fields.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO donors (name, nicnum, contact, email, donation_type, donation_value, notes) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssis", $name, $nicnum, $contact, $email, $donation_type, $donation_value, $notes);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<h1>Donation Added Successfully</h1>";
        echo "<p>Name: $name</p>";
        echo "<p>ID Number: $nicnum</p>";
        echo "<p>Contact: $contact</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Donation Type: $donation_type</p>";
        echo "<p>Donation Value: LKR $donation_value</p>";
        echo "<p>Notes: $notes</p>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
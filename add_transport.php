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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $driver = $_POST['driver'];
    $client = $_POST['client'];
    $vehicle = $_POST['vehicle'];
    $vehicle_type = $_POST['vehicle_type'];
    $from = $_POST['from'];
    $to = $_POST['to'];
    $contact = $_POST['contact'];
    $mileage = $_POST['mileage'];
    $animal_details = $_POST['animal_details'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO transports (driver, client, vehicle, vehicle_type, `from`, `to`, contact, mileage, animal_details, notes)
            VALUES ('$driver', '$client', '$vehicle', '$vehicle_type', '$from', '$to', '$contact', '$mileage', '$animal_details', '$notes')";

    if ($conn->query($sql) === TRUE) {
        echo "New transport record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
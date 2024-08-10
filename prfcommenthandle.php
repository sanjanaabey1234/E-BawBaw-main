<?php
    session_start();
    $usernameN = $_SESSION['username'];
    $animalId = $_SESSION['currentAnimalID'];

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
    // Inserting Comments [FOLLOW_UP_DETAILS ]!!
    if (isset($_POST['follow_up_details'])) {
        $followUpDetails = $_POST['follow_up_details'];
        // Insert follow-up record
        $sql = "INSERT INTO FollowUpsLog (animal_id, message_type, Comment, User_username, Date) VALUES (?, 'FollowUp', ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
        $stmt->bind_param("iss", $animalId, $followUpDetails, $usernameN);
        if (!$stmt->execute()) {
            die("Animal :". $animalId ." Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $stmt->close();
        echo "<script>window.location.href = 'animal-profile.php';</script>";
        exit();
    }

    // Inserting Comments [MEDICAL DETAILS]!!
    if (isset($_POST['medical_details'])) {
        $followUpDetails = $_POST['medical_details'];
        // Insert follow-up record
        $sql = "INSERT INTO FollowUpsLog (animal_id, message_type, Comment, User_username, Date) VALUES (?, 'MedicalDetail', ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
        $stmt->bind_param("iss", $animalId, $followUpDetails, $usernameN);
        if (!$stmt->execute()) {
            die("Animal :". $animalId ." Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $stmt->close();
        echo "<script>window.location.href = 'animal-profile.php';</script>";
        exit();
    }

    // Inserting Comments [History]!!
    if (isset($_POST['History'])) {
        $followUpDetails = $_POST['History'];
        // Insert follow-up record
        $sql = "INSERT INTO FollowUpsLog (animal_id, message_type, Comment, User_username, Date) VALUES (?, 'History', ?, ?, NOW())";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
        }
        $stmt->bind_param("iss", $animalId, $followUpDetails, $usernameN);
        if (!$stmt->execute()) {
            die("Animal :". $animalId ." Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        }
        $stmt->close();
        echo "<script>window.location.href = 'animal-profile.php';</script>";
        exit();
    }
?>
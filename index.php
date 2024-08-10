<?php
session_start();
echo ".";
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ebawbawdb";

// database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process the login form
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM Users WHERE username = ? AND user_password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_password'] = $user['user_password'];
        $_SESSION['user_email'] = $user['user_email'];
        header("Location: main-page.php");
        exit();
    } else {
        // User doesn't exist or invalid credentials
        echo '<script>alert("Login Failed")</script>';
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E - BawBaw | Login Page</title>
    <!-- Custom Styling -->
    <link rel="stylesheet" href="dist/css/indexStyling.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>

<body style="background-color: #F1F1F1;">
    <div class="login-container">
        <span class="login_label">
            Login - Baw Baw Admin System
        </span>
        <br>
        &nbsp;
        <img src="dist/img/BawBawLogo.png" alt="Description of Image">
        <form method="post" action="">
            <div class="UsernameInput">
                <input type="text" placeholder="Username" name="username" class="username_TXTBOXcs" required>
            </div>
            <div class="passwordInput">
                <input type="password" placeholder="Password" name="password" class="Password_TXTBOXcs" required>
            </div>
            <br>
            <input type="submit" name="login" value="Login" class="loging_BTN btn btn-danger"></button>
            <br>
        </form>
    </div>
</body>

</html>
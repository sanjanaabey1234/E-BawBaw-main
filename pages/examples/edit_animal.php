<?php
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

// Get the animal ID from URL
$animal_id = $_GET['id'];

// Fetch current data
$sql = "SELECT * FROM animals WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $animal_id);
$stmt->execute();
$result = $stmt->get_result();
$animal = $result->fetch_assoc();

// Close connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E - BawBaw | Edit Animal</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">E - BawBaw</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="info">
                        <a href="#" class="d-block">User Name</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <!--
          <li class="nav-item">
            <a href="pages/widgets.html" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Notifications
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>-->
                        <li class="nav-item">
                            <a href="Animals-page.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Animals
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>
                                    Transport
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Donations
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Foster Parents
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>
                                    Project
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>
                                    Report
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    Users
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Edit Animal</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="../../main-page.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="../../Animals-page.php">Animals</a></li>
                                <li class="breadcrumb-item active">Edit Animal</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="update_animal.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo htmlspecialchars($animal['id']); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                value="<?php echo htmlspecialchars($animal['name']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_name">Client Name</label>
                                            <input type="text" class="form-control" id="client_name" name="client_name"
                                                value="<?php echo htmlspecialchars($animal['client_name']); ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="animalType">Animal Type</label>
                                            <select class="form-control select2" id="animalType" name="animalType"
                                                style="width: 100%" required>
                                                <option value="Dog"
                                                    <?php echo $animal['animalType'] === 'Dog' ? 'selected' : ''; ?>>Dog
                                                </option>
                                                <option value="Cat"
                                                    <?php echo $animal['animalType'] === 'Cat' ? 'selected' : ''; ?>>Cat
                                                </option>
                                                <option value="Pig"
                                                    <?php echo $animal['animalType'] === 'Pig' ? 'selected' : ''; ?>>Pig
                                                </option>
                                                <option value="Cow"
                                                    <?php echo $animal['animalType'] === 'Cow' ? 'selected' : ''; ?>>Cow
                                                </option>
                                                <option value="Rabbit"
                                                    <?php echo $animal['animalType'] === 'Rabbit' ? 'selected' : ''; ?>>
                                                    Rabbit</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" id="location" name="location"
                                                value="<?php echo htmlspecialchars($animal['location']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_location">Client Location</label>
                                            <input type="text" class="form-control" id="client_location"
                                                name="client_location"
                                                value="<?php echo htmlspecialchars($animal['client_location']); ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="animalSex">Sex</label>
                                            <select class="form-control select2" id="animalSex" name="animalSex"
                                                style="width: 100%" required>
                                                <option value="Male"
                                                    <?php echo $animal['animalSex'] === 'Male' ? 'selected' : ''; ?>>
                                                    Male</option>
                                                <option value="Female"
                                                    <?php echo $animal['animalSex'] === 'Female' ? 'selected' : ''; ?>>
                                                    Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="age">Age</label>
                                            <input type="number" class="form-control" id="age" name="age"
                                                value="<?php echo htmlspecialchars($animal['age']); ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="clientNIC">Client NIC</label>
                                            <input type="text" class="form-control" id="clientNIC" name="clientNIC"
                                                value="<?php echo htmlspecialchars($animal['clientNIC']); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link">Details Link</label>
                                            <input type="text" class="form-control" id="link" name="link"
                                                value="<?php echo htmlspecialchars($animal['link']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_contact">Client Contact</label>
                                            <input type="text" class="form-control" id="client_contact"
                                                name="client_contact"
                                                value="<?php echo htmlspecialchars($animal['client_contact']); ?>"
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="note">Notes</label>
                                            <textarea class="form-control" id="note" name="note"
                                                placeholder="Enter if there is any notes about animal"><?php echo htmlspecialchars($animal['note']); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Edit Animal
                                        Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2024 <a href="#">BawBaw.org</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>By</b> 36T Connect
            </div>
        </footer>
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
</body>

</html>
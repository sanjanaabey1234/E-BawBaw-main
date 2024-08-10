<?php
// profile.php

// Database connection
$host = 'localhost';
$db = 'ebawbawdb';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve animal details
$animal_id = $_POST['id'] ?? 0;
$animal_query = "SELECT * FROM animals WHERE id = ?";
$stmt = $conn->prepare($animal_query);
$stmt->bind_param("i", $animal_id);
$stmt->execute();
$animal_result = $stmt->get_result();
$animal = $animal_result->fetch_assoc();

// Handle follow-up record addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_follow_up'])) {
    $follow_up_details = $_POST['follow_up_details'];
    if (!empty($follow_up_details)) {
        $insert_follow_up_query = "INSERT INTO follow_up_details (animal_id, follow_up_details) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_follow_up_query);
        $stmt->bind_param("is", $animal_id, $follow_up_details);
        $stmt->execute();
        echo "<script>alert('Follow-up record added successfully');</script>";
    } else {
        echo "<script>alert('Follow-up details cannot be empty');</script>";
    }
}

// Handle medical record addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_medical_record'])) {
    $medical_details = $_POST['medical_details'];
    if (!empty($medical_details)) {
        $insert_medical_query = "INSERT INTO medical_details (animal_id, details) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_medical_query);
        $stmt->bind_param("is", $animal_id, $medical_details);
        $stmt->execute();
        echo "<script>alert('Medical record added successfully');</script>";
    } else {
        echo "<script>alert('Medical details cannot be empty');</script>";
    }
}

// Handle history record addition
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_history_details'])) {
    $history_details = $_POST['history_details'];
    if (!empty($history_details)) {
        $insert_history_details = "INSERT INTO history_details (animal_id, history_details) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_history_details);
        $stmt->bind_param("is", $animal_id, $history_details);
        $stmt->execute();
        echo "<script>alert('History record added successfully');</script>";
    } else {
        echo "<script>alert('History details cannot be empty');</script>";
    }
}

// Fetch follow-ups
$follow_ups_query = "SELECT * FROM follow_up_details WHERE animal_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($follow_ups_query);
$stmt->bind_param("i", $animal_id);
$stmt->execute();
$follow_ups_result = $stmt->get_result();

// Fetch medical details
$medical_details_query = "SELECT * FROM medical_details WHERE animal_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($medical_details_query);
$stmt->bind_param("i", $animal_id);
$stmt->execute();
$medical_details_result = $stmt->get_result();

// Fetch History details
$history_details_query = "SELECT * FROM history_details WHERE animal_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($history_details_query);
$stmt->bind_param("i", $animal_id);
$stmt->execute();
$history_details_result = $stmt->get_result();

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E - BawBaw | Animal Profile</title>

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
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <a href="#" class="d-block">User Name</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="../../main-page.html" class="nav-link ">
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
                            <a href="pages/examples/profile.html" class="nav-link active">
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

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <!-- Profile Image and Info -->
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <?php
                                        $animal_image = '';
                                        switch ($animal['animalType']) {
                                            case 'Dog':
                                                $animal_image = 'dog.png';
                                                break;
                                            case 'Cat':
                                                $animal_image = 'cat.jpg';
                                                break;
                                            case 'Pig':
                                                $animal_image = 'pig.jpg';
                                                break;
                                            case 'Cow':
                                                $animal_image = 'cow.jpg';
                                                break;
                                            case 'Rabbit':
                                                $animal_image = 'rabbit.png';
                                                break;
                                            default:
                                                $animal_image = 'default.png';
                                        }
                                        ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="../../dist/img/<?php echo $animal_image; ?>"
                                            alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center"><?php echo $animal['name']; ?></h3>
                                    <p class="text-muted text-center"><?php echo $animal['animalType']; ?></p>
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item">
                                            <b>Date Admitted</b>
                                            <a
                                                class="float-right"><?php echo date('d-m-Y', strtotime($animal['created_at'])); ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Gender</b>
                                            <a class="float-right"><?php echo $animal['animalSex']; ?></a>
                                        </li>
                                        <li class="list-group-item">
                                            <b>Age</b>
                                            <a class="float-right"><?php echo $animal['age']; ?> Months</a>
                                        </li>
                                    </ul>
                                    <a href="#" class="btn btn-primary btn-block"><b>View Images</b></a>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Foster Parent | <?php echo $animal['client_name']; ?></h3>
                                </div>
                                <div class="card-body">
                                    <strong><i class="fas fa-book mr-1"></i> NIC</strong>
                                    <p class="text-muted"><?php echo $animal['clientNIC']; ?></p>
                                    <hr />
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <p class="text-muted"><?php echo $animal['client_location']; ?></p>
                                    <hr />
                                    <strong><i class="fas fa-pencil-alt mr-1"></i> Contact</strong>
                                    <p class="text-muted"><?php echo $animal['client_contact']; ?></p>
                                    <hr />
                                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                                    <p class="text-muted"><?php echo $animal['note']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#activity" data-toggle="tab">Follow
                                                Up’s</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#timeline" data-toggle="tab">Medical Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#settings" data-toggle="tab">History</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <!-- Display Follow-Ups -->
                                            <?php while ($follow_up = $follow_ups_result->fetch_assoc()): ?>
                                            <div class="post">
                                                <div class="user-block">
                                                    <a href="#"><b>Admin</b></a>
                                                    <p><?php echo date('d-m-Y H:i:s', strtotime($follow_up['created_at'])); ?>
                                                    </p>
                                                </div>
                                                <p><?php echo $follow_up['follow_up_details']; ?></p>
                                            </div>
                                            <?php endwhile; ?>
                                            <form class="form-horizontal" method="POST">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" name="follow_up_details"
                                                        placeholder="Enter Follow up details" />
                                                    <input type="hidden" name="id" value="<?php echo $animal_id; ?>">
                                                    <input type="hidden" name="add_follow_up" value="1">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Add Follow up
                                                            record</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="timeline">
                                            <!-- Display Medical Records -->
                                            <?php while ($medical_detail = $medical_details_result->fetch_assoc()): ?>
                                            <div class="post">
                                                <div class="user-block">
                                                    <a href="#"><b>Dr.Pet</b></a>
                                                    <p><?php echo date('d-m-Y H:i:s', strtotime($medical_detail['created_at'])); ?>
                                                    </p>
                                                </div>
                                                <p><?php echo $medical_detail['details']; ?></p>
                                            </div>
                                            <?php endwhile; ?>
                                            <form class="form-horizontal" method="POST">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" name="medical_details"
                                                        placeholder="Enter Medical Details" />
                                                    <input type="hidden" name="id" value="<?php echo $animal_id; ?>">
                                                    <input type="hidden" name="add_medical_record" value="1">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Add Medical
                                                            record</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="settings">
                                            <!-- Display History Records -->
                                            <?php while ($history_details = $history_details_result->fetch_assoc()): ?>
                                            <div class="post">
                                                <div class="user-block">
                                                    <a href="#"><b>Dr.Pet</b></a>
                                                    <p><?php echo date('d-m-Y H:i:s', strtotime($history_details['created_at'])); ?>
                                                    </p>
                                                </div>
                                                <p><?php echo $history_details['history_details']; ?></p>
                                            </div>
                                            <?php endwhile; ?>
                                            <form class="form-horizontal" method="POST">
                                                <div class="input-group input-group-sm mb-0">
                                                    <input class="form-control form-control-sm" name="history_details"
                                                        placeholder="Enter History Details" />
                                                    <input type="hidden" name="id" value="<?php echo $animal_id; ?>">
                                                    <input type="hidden" name="add_history_details" value="1">
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-danger">Add Medical
                                                            record</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.tab-pane -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
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


<!-- <?php
$conn->close();
?> -->
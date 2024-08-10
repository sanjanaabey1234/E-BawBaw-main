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

// Fetch records from the Sterilization table
$sql = "SELECT * FROM abhyadana";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E - BawBaw | Users</title>
    <!-- Custom Styling -->
    <script src="dist/js/animalSearch.js" defer></script>
    <link rel="stylesheet" href="dist/css/AnimalsPageStyling.css">
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
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
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/main-page.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/Animals-page.php" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Animals</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/transport.php" class="nav-link">
                                <i class="nav-icon fas fa-truck"></i>
                                <p>Transport</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/donations.php" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>Donations</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/foster_parent.php" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Foster Parents</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/projects.php" class="nav-link active">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Project</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-chart-pie"></i>
                                <p>Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/users.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Users</p>
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
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Projects</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button class="btn btn-primary" style="margin-right: 30px;"
                                    onclick="window.location.href='add_abhyadana.php'">Add New Record</button>
                                <li class="breadcrumb-item"><a href="main-page.html">Home</a></li>
                                <li class="breadcrumb-item active">Projects</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                    <p>Sterilization Programs</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="http://localhost/E-BawBaw-main/projects.php" class="small-box-footer">More
                                    info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>Abayadana Program</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="http://localhost/E-BawBaw-main/abhyadana.php" class="small-box-footer">More
                                    info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>Foster Parenting</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="http://localhost/E-BawBaw-main/foster.php" class="small-box-footer">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Project Reports</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="http://localhost/E-BawBaw-main/reports.php" class="small-box-footer">More info
                                    <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Abayadana Program Records</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Client Name</th>
                                                <th>Animal Type</th>
                                                <th>Location</th>
                                                <th>Sex</th>
                                                <th>Age</th>
                                                <th>NIC</th>
                                                <th>Colour</th>
                                                <th>Amount</th>
                                                <th>Contact</th>
                                                <th>Invoice</th>
                                                <th>Link</th>
                                                <th>Note</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $row['id'] . "</td>";
                                                    echo "<td>" . $row['name'] . "</td>";
                                                    echo "<td>" . $row['client_name'] . "</td>";
                                                    echo "<td>" . $row['animal_type'] . "</td>";
                                                    echo "<td>" . $row['location'] . "</td>";
                                                    echo "<td>" . $row['sex'] . "</td>";
                                                    echo "<td>" . $row['age'] . "</td>";
                                                    echo "<td>" . $row['nic'] . "</td>";
                                                    echo "<td>" . $row['colour'] . "</td>";
                                                    echo "<td>" . $row['amount'] . "</td>";
                                                    echo "<td>" . $row['contact'] . "</td>";
                                                    echo "<td>" . $row['invoice'] . "</td>";
                                                    echo "<td>" . $row['link'] . "</td>";
                                                    echo "<td>" . $row['note'] . "</td>";
                                                    echo "<td>" . $row['created_at'] . "</td>";
                                                    echo "<td>" . $row['updated_at'] . "</td>";
                                                    echo "<td><button class='edit-btn'><a href='edit_abhyadana.php?id={$row['id']}' class='edit-btn'>Edit</a></button></td>";
                                                    echo "<td><button class='delete-btn'><a href='delete_abhyadana.php?id={$row['id']}' class='delete-btn'>Delete</a></button></td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='16'>No records found</td></tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Footer Content &copy; 2024 <a href="https://adminlte.io">E-BawBaw</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
</body>

</html>

<?php
$conn->close();
?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ebawbawdb"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, foster_parent, email, contact, address, nic, description, created_at FROM foster_parents";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>E - BawBaw | Users</title>
    <!-- Custom Styling -->
    <script src="dist/js/animalSearch.js" defer></script>
    <link rel="stylesheet" href="dist/css/AnimalsPageStyling.css" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" />
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css" />
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css" />
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css" />
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css" />
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60" />
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
                    style="opacity: 0.8" />
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
                            aria-label="Search" />
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
                            <a href="main-page.html" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
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
                            <a href="http://localhost/E-BawBaw-main/foster_parent.php" class="nav-link active">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Foster Parents</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/projects.php" class="nav-link">
                                <i class="nav-icon fas fa-newspaper"></i>
                                <p>Project</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/E-BawBaw-main/report.php" class="nav-link">
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
                            <h1 class="m-0">Foster Parent</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <button class="btn btn-primary" style="margin-right: 30px"
                                    onclick="window.location.href='add_foster_parent.html'">
                                    Add Foster Parent
                                </button>
                                <li class="breadcrumb-item">
                                    <a href="main-page.html">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Foster Parent</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="table-container">
                <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for records.."
                    title="Type in a name" />
                <table class="fixed-header" id="dataTable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Contact</th>
                            <th>National ID card Number</th>
                            <th>Description</th>
                            <th>Date Joined</th>
                            <th>Status</th>
                            <th>E-Mail</th>
                            <th>Profile</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['foster_parent']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['contact']}</td>
                                        <td>{$row['nic']}</td>
                                        <td>{$row['description']}</td>
                                        <td>{$row['created_at']}</td>
                                        <td>Online</td>
                                        <td>{$row['email']}</td>
                                        <td><a href='http://localhost/E-BawBaw-main/pages/examples/foster_profile.php?id={$row['id']}'>View</a></td>
                                        <td><button class='edit-btn'><a href='edit_foster.php?id={$row['id']}'
                                                class='edit-btn'>Edit</a></button></td>
                                        <td><button class='delete-btn'><a href='delete_foster.php?id={$row['id']}'
                                                class='delete-btn'>Delete</a></button></td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge("uibutton", $.ui.button);
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
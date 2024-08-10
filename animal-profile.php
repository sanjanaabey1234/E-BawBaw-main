<?php
  session_start();
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
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
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
                        <li class="nav-item menu-open">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php
      $user = $_SESSION['username'];
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $id = $_POST['id'];
          $_SESSION['currentAnimalID'] = $id;
          echo "<script>alert('ID in session: ". $_SESSION['currentAnimalID'] ."')</script>";

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

          $sql = "SELECT * FROM Animals WHERE id = ?";
          $stmt = $conn->prepare($sql);
          if (!$stmt) {
              die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
          }
          $stmt->bind_param("i", $id);
          if (!$stmt->execute()) {
              die("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
          }
          $result = $stmt->get_result();
          if (!$result) {
              die("Getting result set failed: (" . $stmt->errno . ") " . $stmt->error);
          }

          $sql2 = "SELECT * FROM FollowUpsLog WHERE animal_id = ? AND message_type = 'FollowUp' ";
          $stmt2 = $conn->prepare($sql2);
          if (!$stmt2) {
              die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
          }
          $stmt2->bind_param("i", $id);
          if (!$stmt2->execute()) {
              die("Execute failed: (" . $stmt2->errno . ") " . $stmt2->error);
          }
          $result2 = $stmt2->get_result();
          if (!$result2) {
              die("Getting result set failed: (" . $stmt2->errno . ") " . $stmt2->error);
          }

          $sql3 = "SELECT * FROM FollowUpsLog WHERE animal_id = ? AND message_type = 'MedicalDetail' ";
          $stmt3 = $conn->prepare($sql3);
          if (!$stmt3) {
              die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
          }
          $stmt3->bind_param("i", $id);
          if (!$stmt3->execute()) {
              die("Execute failed: (" . $stmt3->errno . ") " . $stmt3->error);
          }
          $result3 = $stmt3->get_result();
          if (!$result3) {
              die("Getting result set failed: (" . $stmt3->errno . ") " . $stmt3->error);
          }

          $sql4 = "SELECT * FROM FollowUpsLog WHERE animal_id = ? AND message_type = 'History' ";
          $stmt4 = $conn->prepare($sql4);
          if (!$stmt4) {
              die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
          }
          $stmt4->bind_param("i", $id);
          if (!$stmt4->execute()) {
              die("Execute failed: (" . $stmt4->errno . ") " . $stmt4->error);
          }
          $result4 = $stmt4->get_result();
          if (!$result4) {
              die("Getting result set failed: (" . $stmt4->errno . ") " . $stmt4->error);
          }
          if ($result->num_rows > 0) {
              $petrow = $result->fetch_assoc();
              echo "<section class='content-header'>
                      <div class='container-fluid'>
                        <div class='row mb-2'>
                          <div class='col-sm-6'>
                            <h1>{$petrow['name']}'s Info</h1>
                          </div>
                          <div class='col-sm-6'>
                            <ol class='breadcrumb float-sm-right'>
                              <li class='breadcrumb-item'><a href='#'>Home</a></li>
                              <li class='breadcrumb-item active'>Animal Profile</li>
                            </ol>
                          </div>
                        </div>
                      </div><!-- /.container-fluid -->
                    </section>
                    <section class='content'>
                      <div class='container-fluid'>
                        <div class='row'>
                          <div class='col-md-3'>

                            <!-- Profile Image -->
                            <div class='card card-primary card-outline'>
                              <div class='card-body box-profile'>
                                <div class='text-center'>
                                  <img class='profile-user-img img-fluid img-circle'
                                      src='dist/img/dog.png'
                                      alt='User profile picture'>
                                </div>

                                <h3 class='profile-username text-center'>{$petrow['name']}</h3>

                                <p class='text-muted text-center'>{$petrow['type']}</p>

                                <ul class='list-group list-group-unbordered mb-3'>
                                  <li class='list-group-item'>
                                    <b>Date Admitted</b> <a class='float-right'>{$petrow['date_admitted']}</a>
                                  </li>
                                  <li class='list-group-item'>
                                    <b>Gender</b> <a class='float-right'>{$petrow['sex']}</a>
                                  </li>
                                  <li class='list-group-item'>
                                    <b>Age</b> <a class='float-right'>{$petrow['age']}</a>
                                  </li>
                                </ul>

                                <a href='#' class='btn btn-primary btn-block'><b>View Images</b></a>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- About Me Box -->
                            <div class='card card-primary'>
                              <div class='card-header'>
                                <h3 class='card-title'>Foster Parent | Gihan Dhinushka</h3>
                              </div>
                              <!-- /.card-header -->
                              <div class='card-body'>
                                <strong><i class='fas fa-book mr-1'></i> Education</strong>

                                <p class='text-muted'>
                                  B.S. in Computer Science from the University of Tennessee at Knoxville
                                </p>

                                <hr>

                                <strong><i class='fas fa-map-marker-alt mr-1'></i> Location</strong>

                                <p class='text-muted'>Malibu, California</p>

                                <hr>

                                <strong><i class='fas fa-pencil-alt mr-1'></i> Skills</strong>

                                <p class='text-muted'>
                                  <span class='tag tag-danger'>UI Design</span>
                                  <span class='tag tag-success'>Coding</span>
                                  <span class='tag tag-info'>Javascript</span>
                                  <span class='tag tag-warning'>PHP</span>
                                  <span class='tag tag-primary'>Node.js</span>
                                </p>

                                <hr>

                                <strong><i class='far fa-file-alt mr-1'></i> Notes</strong>

                                <p class='text-muted'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                          <!-- /.col -->
                          <div class='col-md-9'>
                            <div class='card'>
                              <div class='card-header p-2'>
                                <ul class='nav nav-pills'>
                                  <li class='nav-item'><a class='nav-link active' href='#activity' data-toggle='tab'>Follow Up’s</a></li>
                                  <li class='nav-item'><a class='nav-link' href='#timeline' data-toggle='tab'>Medical Details</a></li>
                                  <li class='nav-item'><a class='nav-link' href='#settings' data-toggle='tab'>History</a></li>
                                </ul>
                              </div><!-- /.card-header -->
                              <div class='card-body'>
                                <div class='tab-content'>
                                  <div class='active tab-pane' id='activity'>
                                  ";
                                  while ($petinfo = $result2->fetch_assoc()) {
                                    echo "<!-- Post -->
                                            <div class='post'>
                                              <div class='user-block'>
                                                <a href='#'><b>{$petinfo['User_username']}</b></a>
                                                <p>{$petinfo['Date']}</p>
                                              </div>
                                              <!-- /.user-block -->
                                              <p>
                                                {$petinfo['Comment']}
                                              </p>
                                            </div> ";
                                  }
                                  echo "<form class='form-horizontal' method='POST' action='prfcommenthandle.php'>
                                          <div class='input-group input-group-sm mb-0'>
                                            <input class='form-control form-control-sm' name='follow_up_details' placeholder='Enter Follow up details' required>
                                            <div class='input-group-append'>
                                              <button type='submit' class='btn btn-danger'>Add Follow up record</button>
                                            </div>
                                          </div>
                                        </form>
                                  </div> 
                                  <!-- /.tab-pane -->
                                  <div class='tab-pane' id='timeline'>
                                  " ;

                                  while ($petinfoMedical = $result3->fetch_assoc()) {
                                    echo "<!-- The timeline -->
                                            <div class='post'>
                                              <div class='user-block'>
                                                <a href='#'><b>{$petinfoMedical['User_username']}</b></a>
                                                <p>{$petinfoMedical['Date']}</p>
                                              </div>
                                              <!-- /.user-block -->
                                              <p>
                                                {$petinfoMedical['Comment']}
                                              </p>
                                            </div> ";
                                  }
                                  echo "<form class='form-horizontal' method='POST' action='prfcommenthandle.php'>
                                          <div class='input-group input-group-sm mb-0'>
                                            <input class='form-control form-control-sm' name='medical_details' placeholder='Enter Medical details'>
                                            <div class='input-group-append'>
                                              <button type='submit' class='btn btn-danger'>Add Medical Details record</button>
                                            </div>
                                          </div>
                                        </form>
                                  </div>
                                  <!-- /.tab-pane -->

                                  <div class='tab-pane' id='settings'>
                                  " ;

                                  while ($petinfoHistory = $result4->fetch_assoc()) {
                                    echo "<!-- The timeline -->
                                            <div class='post'>
                                              <div class='user-block'>
                                                <a href='#'><b>{$petinfoHistory['User_username']}</b></a>
                                                <p>{$petinfoHistory['Date']}</p>
                                              </div>
                                              <!-- /.user-block -->
                                              <p>
                                                {$petinfoHistory['Comment']}
                                              </p>
                                            </div> ";
                                  }
                                  echo "<form class='form-horizontal' method='POST' action='prfcommenthandle.php'>
                                          <div class='input-group input-group-sm mb-0'>
                                            <input class='form-control form-control-sm' name='History' placeholder='Enter History details'>
                                            <div class='input-group-append'>
                                              <button type='submit' class='btn btn-danger'>Add History record</button>
                                            </div>
                                          </div>
                                        </form>
                                  </div>
                                  <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                              </div><!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                      </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->";
          } else {
              echo "No results found for the given ID.";
          }

          $stmt->close();
          $stmt2->close();
          $stmt3->close();
          $stmt4->close();
          $conn->close();
      }
    ?>

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
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>
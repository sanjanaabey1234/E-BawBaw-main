<?php
// Connect to database
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

// Get foster parent ID from URL
$foster_parent_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch foster parent details
$sql_foster_parent = "SELECT * FROM foster_parents WHERE id = ?";
$stmt = $conn->prepare($sql_foster_parent);
$stmt->bind_param("i", $foster_parent_id);
$stmt->execute();
$foster_result = $stmt->get_result();

if ($foster_result->num_rows > 0) {
    $foster = $foster_result->fetch_assoc();
} else {
    echo "<p>No foster parent found.</p>";
    exit;
}

// Fetch animals for this foster parent
$sql_animals = "SELECT * FROM combined_animals_foster_parents WHERE foster_parent_id = ?";
$stmt = $conn->prepare($sql_animals);
$stmt->bind_param("i", $foster_parent_id);
$stmt->execute();
$animals_result = $stmt->get_result();


// Handle Follow Up Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['follow_up_details'])) {
    $follow_up_details = trim($_POST['follow_up_details']);

    if (!empty($follow_up_details)) {
        $sql_insert_follow_up = "INSERT INTO foster_follow_up (foster_parent_id, details) VALUES (?, ?)";
        $stmt = $conn->prepare($sql_insert_follow_up);
        $stmt->bind_param("is", $foster_parent_id, $follow_up_details);
        if ($stmt->execute()) {
            echo "<script>alert('Follow up record added successfully.');</script>";
        } else {
            echo "<script>alert('Error adding follow up record.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Please enter follow up details.');</script>";
    }
}

// Fetch the `animalType` for the specific foster parent
$sql_animal_type = "SELECT animalType FROM combined_animals_foster_parents WHERE foster_parent_id = ? LIMIT 1";
$stmt = $conn->prepare($sql_animal_type);
$stmt->bind_param("i", $foster_parent_id);
$stmt->execute();
$animal_type_result = $stmt->get_result();
$animal_type = $animal_type_result->fetch_assoc()['animalType'] ?? 'Dog'; // Default to 'Dog' if not found

// Define the image source based on the `animalType`
switch ($animal_type) {
    case 'Cat':
        $image_src = "../../dist/img/cat.jpg";
        break;
    case 'Pig':
        $image_src = "../../dist/img/pig.jpg";
        break;
    case 'Cow':
        $image_src = "../../dist/img/cow.jpg";
        break;
    case 'Rabbit':
        $image_src = "../../dist/img/rabbit.jpg";
        break;
    case 'Dog':
    default:
        $image_src = "../../dist/img/dog.png";
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<tyl>
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

    <style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
    }

    .card img {
        width: 300px;
        height: 200px;
        object-fit: cover;
    }

    .card-body {
        padding: 16px;
    }

    .heading {
        font-size: 1.5em;
        margin-bottom: 8px;
        color: #333;
    }

    .category {
        font-size: 1.2em;
        margin-bottom: 12px;
        color: #007bff;
    }

    .list-item {
        margin-bottom: 8px;
        display: flex;
        justify-content: space-between;
    }

    .list-item div {
        font-size: 1em;
        color: #555;
    }

    .view-animal {
        margin-top: 12px;
        color: #007bff;
        cursor: pointer;
        text-decoration: underline;
        text-align: center;
    }

    .add-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .add-card img {
        width: 100px;
        height: 100px;
        margin: 16px 0;
    }

    .add-card-text {
        font-size: 1.2em;
        color: #007bff;
        margin-bottom: 16px;
        text-align: center;
    }
    </style>
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
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1><?php echo htmlspecialchars($foster['foster_parent']); ?>'s Info</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="../../main-page.html">Home</a></li>
                                    <li class="breadcrumb-item active">Animal Profile</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">

                                <!-- Profile Image -->
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="../../dist/img/dog.png" alt="User profile picture">
                                        </div>

                                        <h3 class="profile-username text-center">
                                            <?php echo htmlspecialchars($foster['foster_parent']); ?></h3>

                                        <p class="text-muted text-center">Foster Parent</p>

                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Email:</b> <a
                                                    class="float-right"><?php echo htmlspecialchars($foster['email']); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Contact:</b> <a
                                                    class="float-right"><?php echo htmlspecialchars($foster['contact']); ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Address:</b> <a
                                                    class="float-right"><?php echo htmlspecialchars($foster['address']); ?></a>
                                            </li>
                                        </ul>

                                        <a href="edit_foster.php?id=<?php echo $foster_parent_id; ?>"
                                            class="btn btn-primary btn-block"><b>Edit</b></a>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- About Me Box -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Foster Parent |
                                            <?php echo htmlspecialchars($foster['foster_parent']); ?></h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <strong><i class="fas fa-book mr-1"></i> Contact</strong>

                                        <p class="text-muted">
                                            <?php echo htmlspecialchars($foster['contact']); ?>
                                        </p>

                                        <hr>

                                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                        <p class="text-muted"><?php echo htmlspecialchars($foster['address']); ?></p>

                                        <hr>

                                        <strong><i class="fas fa-pencil-alt mr-1"></i> NIC</strong>

                                        <p class="text-muted">
                                            <?php echo htmlspecialchars($foster['nic']); ?>
                                        </p>

                                        <hr>

                                        <strong><i class="far fa-file-alt mr-1"></i> Description</strong>

                                        <p class="text-muted"><?php echo htmlspecialchars($foster['description']); ?>
                                        </p>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->

                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header p-2">
                                        <ul class="nav nav-pills">
                                            <li class="nav-item"><a class="nav-link active" href="#activity"
                                                    data-toggle="tab">Follow Up’s</a></li>

                                            <li class="nav-item"><a class="nav-link" href="#settings"
                                                    data-toggle="tab">Foster Child(s)</a></li>
                                        </ul>
                                    </div><!-- /.card-header -->
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">

                                                <!-- Follow Up Records -->
                                                <h4 class="mt-4">Follow Up Records</h4>

                                                <?php
                                        $sql_follow_up = "SELECT * FROM foster_follow_up WHERE foster_parent_id = ? ORDER BY created_at DESC";
                                        $stmt = $conn->prepare($sql_follow_up);
                                        $stmt->bind_param("i", $foster_parent_id);
                                        $stmt->execute();
                                        $follow_up_result = $stmt->get_result();
                                     
                                        ?>
                                                <?php while ($row = $follow_up_result->fetch_assoc()): ?>
                                                <div class="post">
                                                    <div class="user-block">
                                                        <a href="#"><b>Admin</b></a>
                                                        <p><?php echo htmlspecialchars($row['created_at']); ?>
                                                        </p>
                                                    </div>
                                                    <p><?php echo htmlspecialchars($row['details']); ?></p>
                                                </div>
                                                <?php endwhile; ?>

                                                <!-- Post -->
                                                <!-- Follow Up Form -->
                                                <form class="form-horizontal" method="POST">
                                                    <div class="input-group input-group-sm mb-0">
                                                        <input class="form-control form-control-sm"
                                                            id="follow_up_details" name="follow_up_details"
                                                            placeholder="Enter Follow up details" />

                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Add Follow Up</button>
                                                </form>


                                            </div>
                                            <!-- /.tab-pane -->

                                            <!-- /.tab-pane -->
                                            <div class="tab-pane" id="settings">
                                                <div class="post">

                                                    <?php if ($animals_result->num_rows > 0) { ?>
                                                    <div class="card-container">
                                                        <?php while ($animal = $animals_result->fetch_assoc()) { ?>
                                                        <div class="text-center">
                                                            <img class="profile-user-img img-fluid img-circle"
                                                                src="<?php echo htmlspecialchars($image_src); ?>"
                                                                alt="User profile picture">
                                                        </div>
                                                        <div class="card-body">
                                                            <h5 class="heading">
                                                                <?php echo htmlspecialchars($animal['name']); ?>
                                                            </h5>
                                                            <p class="category">
                                                                <?php echo htmlspecialchars($animal['animalType']); ?>
                                                            </p>
                                                            <div class="list-item">
                                                                <div>Age:</div>
                                                                <div><?php echo htmlspecialchars($animal['age']); ?>
                                                                </div>
                                                            </div>
                                                            <div class="list-item">
                                                                <div>Gender:</div>
                                                                <div>
                                                                    <?php echo htmlspecialchars($animal['animalSex']); ?>
                                                                </div>
                                                            </div>
                                                            <a href="animal_profile.php?id=<?php echo $animal['animal_id']; ?>"
                                                                class="view-animal">View Profile</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <?php } else { ?>
                                            <p>No animals found for this foster parent.</p>
                                            <?php } ?>
                                            </>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Footer -->
            <footer class="main-footer">
                <div class="float-right d-none d-sm-block">
                    <b>Version</b> 3.2.0
                </div>
                <strong>&copy; 2024 <a href="#">Your Company</a>.</strong> All rights reserved.
            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="../../plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../dist/js/adminlte.min.js"></script>
    </body>

</html>

<?php
// Close connection
$conn->close();
?>
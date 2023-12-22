<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
require('./connection.php');
$error = [];
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php require('./layout/menu.php'); ?>

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    <div class="row">
                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM khoHang";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Số lượng kho hàng</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM sanPham";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Số lượng sản phẩm</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM nhanVien";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Số lượng nhân viên</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM danhMuc";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Số lượng danh mục</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM nhaPhanPhoi";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Số lượng nhà phân phối</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM lichSuNhapHang";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Lịch sử nhập kho</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        require('./connection.php');
                        $error = [];
                        $sql = "SELECT COUNT(id) AS totalRecords FROM lichSuXuatHang";
                        $result = mysqli_query($conn, $sql);

                        if ($result) {
                            $row = mysqli_fetch_assoc($result);
                            $totalRecords = $row['totalRecords'];
                        } else {
                            echo "Lỗi trong truy vấn: " . mysqli_error($conn);
                        }
                        mysqli_close($conn);
                        ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Lịch sử xuất kho</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalRecords; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
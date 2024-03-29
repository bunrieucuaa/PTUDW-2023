<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}
require('../connection.php');
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Xem tài khoản</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">ADT Admin <sup>2</sup></div>
            </a>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Addons
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                </nav>
                <?php
                $id = $_GET['id'];
                require('../connection.php');
                $sql = "Select * from admin where id=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $hoTen = $row['tenTaiKhoan'];
                $taiKhoan = $row['taiKhoan'];
                $matKhau = $row['matKhau'];
                $email = $row['email'];
                $soDienThoai = $row['soDienThoai'];

                if (isset($_POST['submit'])) {
                    $id = $_POST['id'];
                    $hoTen = $_POST['tenTaiKhoan'];
                    $taiKhoan = $_POST['taiKhoan'];
                    $matKhau = $_POST['matKhau'];
                    $email = $_POST['email'];
                    $soDienThoai = $_POST['soDienThoai'];

                    $sql = "UPDATE admin SET tenTaiKhoan='$hoTen', taiKhoan = '$taiKhoan', matKhau='$matKhau' , email='$email', soDienThoai='$soDienThoai' WHERE id= $id ";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("Location: admin.php");
                        exit();
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
                mysqli_close($conn);
                ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Xem tài khoản</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id; ?> ">
                                    <div class="form-group">
                                        <label for="tenTaiKhoan">Họ và tên:</label>
                                        <input type="text" class="form-control" value="<?php echo $hoTen; ?>"
                                            id="tenTaiKhoan" name="tenTaiKhoan" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="taiKhoan">Tài khoản:</label>
                                        <input type="text" class="form-control" value="<?php echo $taiKhoan; ?>"
                                            id="taiKhoan" name="taiKhoan" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="matKhau">Mật khẩu:</label>
                                        <input type="password" class="form-control" value="<?php echo $matKhau; ?>"
                                            id="matKhau" name="matKhau" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" value="<?php echo $email; ?>"
                                            id="email" name="email" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="soDienThoai">Số điện thoại:</label>
                                        <input type="tel" class="form-control" value="<?php echo $soDienThoai; ?>"
                                            id="soDienThoai" name="soDienThoai" required readonly>
                                    </div>

                                    <button name="submit" type="submit" class="btn btn-primary">Xong</button>

                                </form>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; ATD Website 2023</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
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

    <title>Quản lý admin</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="wrapper">
        <?php
        include("../layout/menu.php");
        ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php
                include("../layout/header.php");
                ?>
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Quản lý tài khoản</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-end">
                            <a href="themtaikhoan.php" class="btn btn-success btn-icon-split">
                                <div class="icon">
                                    <i class="fas fa-plus"></i>
                                </div>
                                <span class="text">Thêm tài khoản</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <?php $status = isset($_GET["status"]) ? $_GET["status"] : ""; ?>
                            <?php if ($status == 'add_success'): ?>
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>Thêm thành công</strong>
                                </div>
                            <?php elseif ($status == 'add_fail'): ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>Thêm thất bại</strong>
                                </div>
                            <?php elseif ($status == 'del_success'): ?>
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>Xóa thành công</strong>
                                </div>
                            <?php elseif ($status == 'del_fail'): ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>Xóa thất bại</strong>
                                </div>
                            <?php elseif ($status == 'update_success'): ?>
                                <div class="alert alert-success" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>Sửa thành công</strong>
                                </div>
                            <?php elseif ($status == 'update_fail'): ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong>Sửa thất bại</strong>
                                </div>
                            <?php elseif ($status == 'id_not_found'): ?>
                                <div class="alert alert-danger" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <strong> Không có bản ghi này ! </strong>
                                </div>
                            <?php endif; ?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th> STT </th>
                                            <th> Họ tên </th>
                                            <th> Tài khoản </th>
                                            <th> Mật khẩu </th>
                                            <th> Email </th>
                                            <th> Số điện thoại </th>
                                            <th> Tác vụ </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        require('../connection.php');
                                        $title = "Quản lý Admin";
                                        $error = [];
                                        $sql = "SELECT * FROM admin";
                                        $admin = mysqli_query($conn, $sql);


                                        if (mysqli_num_rows($admin) > 0) {
                                            $counter = 1;
                                            foreach ($admin as $item) {
                                                $cnt = $counter;
                                                $counter++;
                                                $id = $item['id'];
                                                $hoTen = $item['tenTaiKhoan'];
                                                $taiKhoan = $item['taiKhoan'];
                                                $matKhau = $item['matKhau'];
                                                $email = $item['email'];
                                                $soDienThoai = $item['soDienThoai'];

                                                echo "<tr>
                                                <th>$cnt</th>
                                                
                                                <th>$hoTen</th>
                                                <th>$taiKhoan</th>
                                                <th>$matKhau </th>
                                                <th>$email</th>
                                                <th>$soDienThoai</th>
                                                <td style='text-align: center'>
                                                    <a href='xemtaikhoan.php?id=$id' style='color: blue;'>
                                                    <i class='fas fa-exclamation-circle'></i>
                                                    </a>
                                                    &nbsp;   
                                                    <a href='suataikhoan.php?id=$id' style='color: green;'><i class='fas fa-edit'></i></a>
                                                    &nbsp;
                                                    <a href='xoataikhoan.php?id=$id' style='color: red;'><i class='fas fa-trash'></i></a>
                                                    &nbsp; 
                                                </td>
                                            </tr>";
                                            }
                                        }
                                        ?>
                                    </tbody>

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
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
require('../connection.php');
$error = [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADT Admin 2 </title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <div id="wrapper">

        <?php require('../layout/menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php require('../layout/header.php'); ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="container">
                                    <?php $status = isset($_GET["status"]) ? $_GET["status"] : ""; ?>
                                    <?php if ($status == 'add_success') : ?>
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Thêm thành công</strong>
                                        </div>
                                    <?php elseif ($status == 'add_fail') : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Thêm thất bại</strong>
                                        </div>
                                    <?php elseif ($status == 'del_success') : ?>
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Xóa thành công</strong>
                                        </div>
                                    <?php elseif ($status == 'del_fail') : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Xóa thất bại</strong>
                                        </div>
                                    <?php elseif ($status == 'update_success') : ?>
                                        <div class="alert alert-success" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Sửa thành công</strong>
                                        </div>
                                    <?php elseif ($status == 'update_fail') : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <strong>Sửa thất bại</strong>
                                        </div>
                                    <?php endif; ?>

                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-auto">
                                        <a href="themlichsunhaphang.php" class="btn btn-success btn-icon-split">
                                            <div class="icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <span class="text">Thêm Lịch Sử Nhập Hàng</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nhân viên</th>
                                                    <th>Sản phẩm</th>
                                                    <th>Số lượng</th>
                                                    <th>Nhà phân phối</th>
                                                    <th>Đơn vị</th>
                                                    <th>Kho hàng</th>
                                                    <th>Thời gian</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require('../connection.php');
                                                $title = "Danh sách xuất kho";
                                                $error = [];
                                                $sql = "SELECT l.*, nv.tenNhanVien, sp.tenSanPham, np.tenNhaPhanPhoi, dv.tenDonVi, kh.tenKhoHang
                                                FROM lichsunhaphang l
                                                INNER JOIN nhanvien nv ON l.nhanVienId = nv.id
                                                INNER JOIN sanpham sp ON l.sanPhamId = sp.id
                                                INNER JOIN nhaphanphoi np ON l.nhaPhanPhoiId = np.id
                                                INNER JOIN donvi dv ON l.donViId = dv.id
                                                INNER JOIN khohang kh ON l.khoHangId = kh.id";
                                                $lichsunhaphang = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($lichsunhaphang) > 0) {
                                                    $stt = 1;
                                                    foreach ($lichsunhaphang as $item) {
                                                        echo "<tr>
                                                    <td>{$item['tenNhanVien']}</td>
                                                    <td>{$item['tenSanPham']}</td>
                                                    <td>{$item['soLuong']}</td>
                                                    <td>{$item['tenNhaPhanPhoi']}</td>
                                                    <td>{$item['tenDonVi']}</td>
                                                    <td>{$item['tenKhoHang']}</td>
                                                    <td>{$item['thoiGian']}</td>
                                                    <td style='text-align: center; display: flex'>
                                                        <a href='chitietlichsunhaphang.php?id={$item['id']}' style='color: blue;'><i class='fas fa-exclamation-circle'></i></a>
                                                        &nbsp;
                                                        <a href='sualichsunhaphang.php?id={$item['id']}' style='color: green;'><i class='fas fa-edit'></i></a>
                                                        &nbsp;
                                                        <a onclick=\"return checkDelete('{$item['id']}');\" href='xoalichsunhaphang.php?id={$item['id']}' style='color: red;'><i class='fas fa-trash'></i></a>
                                                    </td>

                                                </tr>";
                                                        $stt++;
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
                </div>
            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Thành An Dũng Website 2023</span>
                    </div>
                </div>
            </footer>

        </div>

    </div>

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<script type="text/javascript">
    function checkDelete(id) {
        if (!confirm('Bạn chắc chắn muốn xóa lịch sử nhập hàng này?')) {
            return false;
        } else {
            document.getElementById('deleteRecordLink').href = 'xoalichsunhaphang.php?id=' + id;
            $('#deleteModal').modal('show');
            return true;
        }
    }
</script>
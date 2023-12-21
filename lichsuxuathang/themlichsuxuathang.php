<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
require('../lichsunhaphang/connection.php');
$title = "Thêm lịch sử nhập hàng";
$error = [];

$queryNhanVien = "SELECT id, tenNhanVien FROM nhanvien";
$resultNhanVien = mysqli_query($conn, $queryNhanVien);

$querySanPham = "SELECT id, tenSanPham FROM sanpham";
$resultSanPham = mysqli_query($conn, $querySanPham);

$queryNhaPhanPhoi = "SELECT id, tenNhaPhanPhoi FROM nhaphanphoi";
$resultNhaPhanPhoi = mysqli_query($conn, $queryNhaPhanPhoi);

$queryDonVi = "SELECT id, tenDonVi FROM donvi";
$resultDonVi = mysqli_query($conn, $queryDonVi);

$queryKhoHang = "SELECT id, tenKhoHang FROM khohang";
$resultKhoHang = mysqli_query($conn, $queryKhoHang);

if (isset($_POST['submit'])) {
    $nhanVienId = mysqli_real_escape_string($conn, $_POST['nhanVienId']);
    $sanPhamId = mysqli_real_escape_string($conn, $_POST['sanPhamId']);
    $soLuong = mysqli_real_escape_string($conn, $_POST['soLuong']);
    $nhaPhanPhoiId = mysqli_real_escape_string($conn, $_POST['nhaPhanPhoiId']);
    $donViId = mysqli_real_escape_string($conn, $_POST['donViId']);
    $khoHangId = mysqli_real_escape_string($conn, $_POST['khoHangId']);
    $thoiGian = mysqli_real_escape_string($conn, $_POST['thoiGian']);


    if (empty($nhanVienId)  || empty($sanPhamId) ||  empty($nhaPhanPhoiId)) {
        $error[] = "Thông tin đang Trở về trống";
    }


    if (count($error) == 0) {
        $sql = "INSERT INTO lichsuxuathang (nhanVienId, sanPhamId, soLuong, nhaPhanPhoiId, donViId, khoHangId,thoiGian) VALUES ('$nhanVienId', '$sanPhamId', '$soLuong', '$nhaPhanPhoiId', '$donViId', '$khoHangId','$thoiGian')";

        if (mysqli_query($conn, $sql)) {
            header('Location: lichsuxuathang.php?status=add_success');
        } else {
            $error[] = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 </title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body id="page-top">

    <div id="wrapper">
        <?php require('../layout/menu.php'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="content" mx-2>
                <?php require('../layout/header.php'); ?>
                <div class="container">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nhanVienId">Nhân viên</label>
                            <select class="form-control" name="nhanVienId">
                                <option value="-1">Chọn nhân viên</option>
                                <?php while ($row = mysqli_fetch_assoc($resultNhanVien)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tenNhanVien']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="sanPhamId">Sản phẩm</label>
                            <select class="form-control" name="sanPhamId">
                                <option value="-1">Chọn sản phẩm</option>
                                <?php while ($row = mysqli_fetch_assoc($resultSanPham)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tenSanPham']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="soLuong">Số Lượng</label>
                            <input type="number" class="form-control" name="soLuong" placeholder="Nhập số lượng" required>
                        </div>
                        <div class="form-group">
                            <label for="nhaPhanPhoiId">Nhà phân phối</label>
                            <select class="form-control" name="nhaPhanPhoiId">
                                <option value="-1">Chọn nhà phân phối</option>
                                <?php while ($row = mysqli_fetch_assoc($resultNhaPhanPhoi)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tenNhaPhanPhoi']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donViId">Đơn vị</label>
                            <select class="form-control" name="donViId">
                                <option value="-1">Chọn đơn vị</option>
                                <?php while ($row = mysqli_fetch_assoc($resultDonVi)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tenDonVi']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="khoHangId">Kho hàng</label>
                            <select class="form-control" name="khoHangId">
                                <option value="-1">Chọn kho hàng</option>
                                <?php while ($row = mysqli_fetch_assoc($resultKhoHang)) : ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['tenKhoHang']; ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="thoiGian">Thời gian</label>
                            <input type="datetime-local" class="form-control" name="thoiGian" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit">Thêm</button>
                        <a href="lichsuxuathang.php" class="btn btn-secondary">Trở về</a>
                    </form>
                </div>
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
                        <a class="btn btn-primary" href="login.html">Logout</a>
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
    </div>
</body>

</html>
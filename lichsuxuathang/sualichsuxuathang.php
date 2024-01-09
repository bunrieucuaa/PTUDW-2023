<?php
session_start();
require('../connection.php');
$title = "Sửa lịch sử xuất hàng";
$error = [];

if (isset($_SESSION['user']) && isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $query = "SELECT l.*, n.tenNhanVien, s.tenSanPham, np.tenNhaPhanPhoi, d.tenDonVi, kh.tenKhoHang
              FROM lichsuxuathang l
              INNER JOIN nhanvien n ON l.nhanVienId = n.id
              INNER JOIN sanpham s ON l.sanPhamId = s.id
              INNER JOIN nhaphanphoi np ON l.nhaPhanPhoiId = np.id
              INNER JOIN donvi d ON l.donViId = d.id
              INNER JOIN khohang kh ON l.khoHangId = kh.id
              WHERE l.id = '$id'";

    $result = mysqli_query($conn, $query);

    if ($result && $row = mysqli_fetch_assoc($result)) {
        extract($row);
        $existingNhanVienId = $nhanVienId;
        $nhanVienName = $tenNhanVien;
        $existingSanPhamId = $sanPhamId;
        $sanPhamName = $tenSanPham;
        $existingSoLuong = $soLuong;
        $existingNhaPhanPhoiId = $nhaPhanPhoiId;
        $nhaPhanPhoiName = $tenNhaPhanPhoi;
        $existingDonViId = $donViId;
        $donViName = $tenDonVi;
        $existingKhoHangId = $khoHangId;
        $khoHangName = $tenKhoHang;
        $existingThoiGian = $thoiGian;
    } else {
        $error[] = "Không tìm thấy dữ liệu";
    }

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
        $newNhanVienId = mysqli_real_escape_string($conn, $_POST['nhanVienId']);
        $newSanPhamId = mysqli_real_escape_string($conn, $_POST['sanPhamId']);
        $newSoLuong = mysqli_real_escape_string($conn, $_POST['soLuong']);
        $newNhaPhanPhoiId = mysqli_real_escape_string($conn, $_POST['nhaPhanPhoiId']);
        $newDonViId = mysqli_real_escape_string($conn, $_POST['donViId']);
        $newKhoHangId = mysqli_real_escape_string($conn, $_POST['khoHangId']);
        $newThoiGian = mysqli_real_escape_string($conn, $_POST['thoiGian']);

        if (empty($newSoLuong) || !is_numeric($newSoLuong) || $newSoLuong <= 0) {
            $error[] = "Số lượng nhập không hợp lệ";
        }
        if (count($error) == 0) {
            $quantityDifference = $newSoLuong - $existingSoLuong;

            $updateQuantityQuery = "UPDATE sanpham SET soLuong = soLuong - $quantityDifference WHERE id = '$newSanPhamId'";
            if (!mysqli_query($conn, $updateQuantityQuery)) {
                $error[] = "Error updating product quantity: " . mysqli_error($conn);
            }
            $updateQuery = "UPDATE lichsuxuathang
                        SET nhanVienId = '$newNhanVienId', sanPhamId = '$newSanPhamId', soLuong = '$newSoLuong',
                            nhaPhanPhoiId = '$newNhaPhanPhoiId', donViId = '$newDonViId', khoHangId = '$newKhoHangId',
                            thoiGian = '$newThoiGian'
                        WHERE id = '$id'";

            if (mysqli_query($conn, $updateQuery)) {
                header("Location: lichsuxuathang.php?status=update_success");
                exit();
            } else {
                $error[] = "Update failed: " . mysqli_error($conn);
                header("Location: lichsuxuathang.php?status=update_fail");
            }
        }
    }
} else {
    header('Location: ../login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

</html>

<?php if (count($error) > 0): ?>
    <?php foreach ($error as $errMsg): ?>
        <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <strong>Error: </strong>
            <?php echo $errMsg; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ADT Admin 2 </title>

    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
                                <?php
                                echo "<option value=\"$existingNhanVienId\" selected>$nhanVienName</option>";
                                while ($row = mysqli_fetch_assoc($resultNhanVien)) {
                                    $optionId = $row['id'];
                                    $optionName = $row['tenNhanVien'];

                                    if ($optionId !== $existingNhanVienId) {
                                        echo "<option value=\"$optionId\">$optionName</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sanPhamId">Sản phẩm</label>
                            <select class="form-control" name="sanPhamId">
                                <?php
                                echo "<option value=\"$existingSanPhamId\" selected>$sanPhamName</option>";
                                while ($row = mysqli_fetch_assoc($resultSanPham)) {
                                    $optionId = $row['id'];
                                    $optionName = $row['tenSanPham'];

                                    if ($optionId !== $existingSanPhamId) {
                                        echo "<option value=\"$optionId\">$optionName</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="soLuong">Số Lượng</label>
                            <input type="number" class="form-control" name="soLuong"
                                value="<?php echo $existingSoLuong; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nhaPhanPhoiId">Nhà phân phối</label>
                            <select class="form-control" name="nhaPhanPhoiId">
                                <?php
                                echo "<option value=\"$existingNhaPhanPhoiId\" selected>$nhaPhanPhoiName</option>";
                                while ($row = mysqli_fetch_assoc($resultNhaPhanPhoi)) {
                                    $optionId = $row['id'];
                                    $optionName = $row['tenNhaPhanPhoi'];

                                    if ($optionId !== $existingNhaPhanPhoiId) {
                                        echo "<option value=\"$optionId\">$optionName</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="donViId">Đơn vị</label>
                            <select class="form-control" name="donViId">
                                <?php
                                echo "<option value=\"$existingDonViId\" selected>$donViName</option>";
                                while ($row = mysqli_fetch_assoc($resultDonVi)) {
                                    $optionId = $row['id'];
                                    $optionName = $row['tenDonVi'];

                                    if ($optionId !== $existingDonViId) {
                                        echo "<option value=\"$optionId\">$optionName</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="khoHangId">Kho hàng</label>
                            <select class="form-control" name="khoHangId">
                                <?php
                                echo "<option value=\"$existingKhoHangId\" selected>$khoHangName</option>";
                                while ($row = mysqli_fetch_assoc($resultKhoHang)) {
                                    $optionId = $row['id'];
                                    $optionName = $row['tenKhoHang'];

                                    if ($optionId !== $existingKhoHangId) {
                                        echo "<option value=\"$optionId\">$optionName</option>";
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="thoiGian">Thời gian</label>
                            <input type="datetime-local" class="form-control" name="thoiGian"
                                value="<?php echo date('Y-m-d\TH:i', strtotime($existingThoiGian)); ?>" required>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Cập nhật">&nbsp;
                        <input type="button" class="btn btn-primary" name="btnCancel" value="Trở về"
                            onclick="history.back(1)">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for editing here -->
                    <!-- For example, you can use input fields with the current values -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Record</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this record?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a id="deleteRecordLink" class="btn btn-danger" href="#">Delete</a>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>

<?php
?>
<!-- <script type="text/javascript">
    $(function() {
        $('#thoiGianPicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
        });
    });
</script> -->
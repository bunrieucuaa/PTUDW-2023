<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}
require('../connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chi tiết lịch sử nhập hàng</title>
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
                <h1>Chi tiết lịch sử nhập hàng</h1>
                <?php
                require('../connection.php');
                $title = "Chi tiết lịch sử nhập hàng";
                $error = [];
                if (!isset($_GET['id'])) {
                    header('Location: lichsunhaphang.php');
                    exit;
                }
                $id = mysqli_real_escape_string($conn, $_GET['id']);
                $queryDetail = "SELECT l.*, nv.tenNhanVien, sp.tenSanPham, np.tenNhaPhanPhoi, dv.tenDonVi, kh.tenKhoHang
                FROM lichsunhaphang l
                INNER JOIN nhanvien nv ON l.nhanVienId = nv.id
                INNER JOIN sanpham sp ON l.sanPhamId = sp.id
                INNER JOIN nhaphanphoi np ON l.nhaPhanPhoiId = np.id
                INNER JOIN donvi dv ON l.donViId = dv.id
                INNER JOIN khohang kh ON l.khoHangId = kh.id
                WHERE l.id = '$id'";
                $resultDetail = mysqli_query($conn, $queryDetail);
                if (mysqli_num_rows($resultDetail) === 0) {
                    header('Location: lichsunhaphang.php');
                    exit;
                }
                $rowDetail = mysqli_fetch_assoc($resultDetail);
                ?>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>
                            <?php echo $rowDetail['id']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nhân viên</th>
                        <td>
                            <?php echo $rowDetail['tenNhanVien']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Sản phẩm</th>
                        <td>
                            <?php echo $rowDetail['tenSanPham']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Số lượng</th>
                        <td>
                            <?php echo $rowDetail['soLuong']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Nhà phân phối</th>
                        <td>
                            <?php echo $rowDetail['tenNhaPhanPhoi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Đơn vị</th>
                        <td>
                            <?php echo $rowDetail['tenDonVi']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Kho hàng</th>
                        <td>
                            <?php echo $rowDetail['tenKhoHang']; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Thời gian</th>
                        <td>
                            <?php echo $rowDetail['thoiGian']; ?>
                        </td>
                    </tr>
                </table>
                <a href='sualichsunhaphang.php?id=<?php echo $rowDetail['id']; ?>' class='btn btn-primary'>Edit</a>
                <a href='lichsunhaphang.php' class='btn btn-secondary'>Back</a>

            </div>
        </div>

        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <script src="../js/sb-admin-2.min.js"></script>

        <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="../js/demo/datatables-demo.js"></script>
    </div>
</body>

</html>
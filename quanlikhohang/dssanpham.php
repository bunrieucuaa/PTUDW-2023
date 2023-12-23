<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
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

    <title>ADT Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("../layout/menu.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("../layout/header.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    require '../connection.php';
                    $sql = "SELECT sanpham.*, danhmuc.tenDanhMuc, danhmuc.maDanhMuc, donvi.tenDonVi,
                        nhaphanphoi.tenNhaPhanPhoi
                            FROM sanpham, danhmuc, donvi, nhaphanphoi
                            WHERE danhmuc.id = sanpham.danhMucId
                            AND donvi.id = sanpham.donViId
                            AND nhaphanphoi.id = sanpham.nhaPhanPhoiId
                    
                        ";

                    // $sql = "SELECT sanpham.*, danhmuc.tenDanhMuc, danhmuc.maDanhMuc, donvi.tenDonVi,
                    //     nhaphanphoi.tenNhaPhanPhoi
                    //         FROM sanpham, danhmuc, donvi, nhaphanphoi
                    //         WHERE danhmuc.id = sanpham.danhMucId
                    //         AND donvi.id = sanpham.donViId
                    //         AND nhaphanphoi.id = sanpham.nhaPhanPhoiId
                    //         AND sanpham.tenSanPham LIKE '%Panasonic%'
                    
                    //     ";

                    $sanpham = mysqli_query($conn, $sql);


                    $counter = 1;

                    if ($sanpham->num_rows == 0) {
                        echo "Chưa có danh sách sản phẩm.<a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    }
                    ;

                    ?>
                    <!-- Page Heading -->

                    <div class="card-header py-3 d-flex justify-content-start">

                        <h1 class="h3 text-gray-800 pl-3"> Sản phẩm </h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-end">
                            <a href="createsanpham.php" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text"> Thêm sản phẩm </span>
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
                                            <th> Tên sản phẩm </th>
                                            <th> Số lượng </th>
                                            <th> Đơn vị </th>
                                            <th> Danh mục </th>
                                            <th> Nhà Phân Phối </th>
                                            <th> Tác vụ </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($row = $sanpham->fetch_assoc()) {
                                            $cnt = $counter;
                                            $counter++;
                                            $id = $row['id'];
                                            $tenSanPham = $row['tenSanPham'];
                                            $soLuong = $row['soLuong'];
                                            $donVi = $row['tenDonVi'];
                                            $danhMuc = $row['tenDanhMuc'];
                                            $nhaPhanPhoi = $row['tenNhaPhanPhoi'];
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $cnt; ?>
                                                </td>
                                                <td>
                                                    <?php echo $tenSanPham; ?>
                                                </td>
                                                <td>
                                                    <?php echo $soLuong; ?>
                                                </td>
                                                <td>
                                                    <?php echo $donVi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $danhMuc; ?>
                                                </td>
                                                <td>
                                                    <?php echo $nhaPhanPhoi; ?>
                                                </td>
                                                <?php { ?>
                                                    <td>
                                                        <a href="updatesanpham.php?updateid=<?php echo $id; ?>"
                                                            style='color: blue'>
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="deletesanpham.php?deletedid=<?php echo $id; ?>"
                                                            style='color: red'>
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </td>
                                                <?php }
                                                ; ?>
                                            <?php } //Dóng while
                                        ; ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Quan Li Kho Hang 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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
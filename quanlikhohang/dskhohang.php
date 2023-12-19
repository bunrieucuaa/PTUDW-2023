<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

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
        include("sidebar.php");
        ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("topbar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"> Kho Hàng </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-end">
                            <a href="themkhohang.php" class="btn btn-success btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text"> Thêm kho hàng </span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên kho hàng</th>
                                            <th>Địa chỉ</th>
                                            <th>Tên Quản Lí</th>
                                            <th>Nhân viên quản lí kho</th>
                                            <th>Tác Vụ</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên kho hàng</th>
                                            <th>Địa chỉ</th>
                                            <th>Tên Quản Lí</th>
                                            <th>Nhân viên quản lí kho</th>
                                            <th>Tác Vụ</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        require "connect.php";
                                        $sql = "SELECT danhmuc_khohang.*, khohang.tenKhoHang, khohang.diaChi, khohang.*, admin.tenTaiKhoan, nhanvien.tenNhanVien
                                                    FROM danhmuc_khohang, khohang, admin, nhanvien
                                                    WHERE khohang.id = danhmuc_khohang.khoHangId
                                                    AND admin.id = khohang.taiKhoanId
                                                    AND nhanvien.id = khohang.nhanVienId
                                                ";

                                        $danhmuc_khohang = $conn->query($sql);
                                        ?>

                                        <?php while ($row = $danhmuc_khohang->fetch_assoc()) {
                                            $id = $row['id'];
                                            $tenKhoHang = $row['tenKhoHang'];
                                            $diaChi = $row['diaChi'];
                                            $tenQuanLi = $row['tenTaiKhoan'];
                                            $nhanVienQLKho = $row['tenNhanVien'];
                                            ?>

                                            <tr>
                                                <td>
                                                    <?php echo $id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $tenKhoHang; ?>
                                                </td>
                                                <td>
                                                    <?php echo $diaChi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $tenQuanLi; ?>
                                                </td>
                                                <td>
                                                    <?php echo $nhanVienQLKho; ?>
                                                </td>
                                                <?php { ?>
                                                    <td>
                                                        <button class='btn btn-primary'><a href='' class='text-light'>Cập
                                                                Nhật</a></button>
                                                        <button class='btn btn-danger'><a href=''
                                                                class='text-light'>Xóa</a></button>
                                                        <button class='btn btn-info'><a
                                                                href='dsdanhmuckhohang.php?khoHangId=<?php echo $id; ?>'
                                                                class='text-light'> Chi
                                                                tiết </a></button>
                                                    </td>
                                                <?php }
                                                ; ?>
                                            </tr>
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
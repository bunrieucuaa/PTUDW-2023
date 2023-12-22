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
                include("header.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                    if (isset($_GET['khoHangId'])) {
                        require 'connect.php';
                        $khoHangId = $_GET['khoHangId'];
                        $sql = "SELECT danhmuc_khohang.*, danhmuc.tenDanhMuc, danhmuc.maDanhMuc, khohang.tenKhoHang, khohang.diaChi 
                            FROM danhmuc_khohang, danhmuc, khohang
                            WHERE danhmuc_khohang.id = $khoHangId
                            AND danhmuc.id = danhmuc_khohang.danhMucId
                            AND khohang.id = danhmuc_khohang.khoHangId
                        ";

                        $danhmuc = $conn->query($sql);
                    } else {
                        header('Location: dskhohang.php?status=id_not_found');
                    }
                    ;

                    if ($danhmuc->num_rows == 0) {
                        echo "Kho hàng chưa có danh mục.<a href='javascript: history.go(-1)'>Trở lại</a>";
                        exit;
                    }
                    ?>


                    <!-- Page Heading -->

                    <div class="card-header py-3 d-flex justify-content-start">
                        <a href="javascript:history.back()" class="btn btn-warning btn-circle">
                            <i class="fas fa-backward"></i>
                        </a>
                        <?php while ($row = $danhmuc->fetch_assoc()) {
                            $id = $row['id'];
                            $tenKhoHang = $row['tenKhoHang'];
                            $tenDanhMuc = $row['tenDanhMuc'];
                            $maDanhMuc = $row['maDanhMuc'];
                            ?>
                            <h1 class="h3 text-gray-800 pl-3"> Danh Mục Của
                                <?php echo $tenKhoHang; ?>
                            </h1>
                        </div>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên danh mục</th>
                                                <th>Mã danh mục</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <?php echo $id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $tenDanhMuc; ?>
                                                </td>
                                                <td>
                                                    <?php echo $maDanhMuc; ?>
                                                </td>
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
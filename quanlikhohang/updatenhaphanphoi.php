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

    <style>
        .bg-image {
            background: url(../isset/nha-phan-phoi-la-gi.jpg);
            background-position: center;
            background-size: cover;
        }
    </style>

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

                <?php
                if (isset($_GET['updateid'])) {
                    require 'connect.php';
                    $id = $_GET['updateid'];
                    $sql = "SELECT * FROM nhaphanphoi WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    $row = $result->fetch_assoc();

                    $tenNhaPhanPhoi = $row['tenNhaPhanPhoi'];
                    $diaChi = $row['diaChi'];
                    $dienThoai = $row['dienThoai'];

                } else {
                    header('Location: dsnhaphanphoi.php?status=id_not_found');
                }

                if (isset($_POST['submit'])) {
                    $tenNhaPhanPhoi = $_POST['tenNhaPhanPhoi'];
                    $diaChi = $_POST['diaChi'];
                    $dienThoai = $_POST['dienThoai'];


                    //echo $lopid; return;
                    // if ($masv == "" || $tensv == "") {
                    //     $error[] = "Thông tin đang bỏ trống";
                    // }
                    // if (count($error) == 0) {
                    $sql = "UPDATE nhaphanphoi SET tenNhaPhanPhoi='$tenNhaPhanPhoi', diaChi='$diaChi' ,dienThoai='$dienThoai' WHERE id=$id";

                    // echo $sql;
                    // return;
                    if (mysqli_query($conn, $sql)) {
                        header('Location: dsnhaphanphoi.php?status=update_success');
                    } else {
                        header('Location: dsnhaphanphoi.php?status=update_fail');
                    }
                    // }
                }
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="card-header py-3 d-flex justify-content-start">
                        <a href="javascript:history.back()" class="btn btn-warning btn-circle">
                            <i class="fas fa-backward"></i>
                        </a>
                        <h1 class="h3 mb-2 text-gray-800"> Thêm Kho Hàng </h1>
                    </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="row">
                                    <div class="col-lg-5 d-none d-lg-block bg-image"></div>
                                    <div class="col-lg-7">
                                        <div class="p-5">
                                            <form class="user" action="" method="post">
                                                <h1 class="h4 text-gray-900 mb-2">Tên nhà phân phối</h1>
                                                <div class="form-group">
                                                    <input type="text" name="tenNhaPhanPhoi"
                                                        value="<?php echo $tenNhaPhanPhoi ?>" class="form-control" id=""
                                                        placeholder="Tên nhà phân phối">
                                                </div>
                                                <h1 class="h4 text-gray-900 mb-2">Địa chỉ</h1>
                                                <div class="form-group">
                                                    <input type="text" name="diaChi" value="<?php echo $diaChi ?>"
                                                        class="form-control" id="" name="diaChi" placeholder="Địa chỉ">
                                                </div>
                                                <h1 class="h4 text-gray-900 mb-2">Số điện thoại</h1>
                                                <div class="form-group">
                                                    <input type="text" name="dienThoai"
                                                        value="<?php echo $dienThoai ?>" class="form-control" id=""
                                                        name="dienThoai" placeholder="Số điện thoại">
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="submit" name="submit"
                                                            class="btn btn-primary btn-user btn-block" id=""
                                                            placeholder="Cập nhật nhà">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <a href="javascript:history.back()"
                                                            class="btn btn-danger btn-user btn-block">
                                                            Hủy bỏ
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

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
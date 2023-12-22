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
            background: url(../isset/Product_Marketing-1030x586.jpg);
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

                <?php
                if (isset($_GET['updateid'])) {
                    require 'connect.php';
                    $id = $_GET['updateid'];
                    $sql = "SELECT * FROM sanpham WHERE id=$id";
                    $result = mysqli_query($conn, $sql);
                    $row = $result->fetch_assoc();

                    $tenSanPham = $row['tenSanPham'];
                    $soLuong = $row['soLuong'];
                    $donViId = $row['donViId'];
                    $danhMucId = $row['danhMucId'];
                    $nhaPhanPhoiId = $row['nhaPhanPhoiId'];

                } else {
                    header('Location: dssanpham.php?status=id_not_found');
                }

                if (isset($_POST['submit'])) {
                    $tenSanPham = $_POST['tenSanPham'];
                    $soLuong = $_POST['soLuong'];
                    $donViId = $_POST['donViId'];
                    $danhMucId = $_POST['danhMucId'];
                    $nhaPhanPhoiId = $_POST['nhaPhanPhoiId'];

                    $sql = "UPDATE sanpham SET tenSanPham='$tenSanPham', soLuong='$soLuong' ,donViId='$donViId', danhMucId='$danhMucId', nhaPhanPhoiId='$nhaPhanPhoiId' WHERE id=$id";

                    if (mysqli_query($conn, $sql)) {
                        header('Location: dssanpham.php?status=update_success');
                    } else {
                        header('Location: dssanpham.php?status=update_fail');
                    }
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
                        <h1 class="h3 mb-2 text-gray-800"> Cập nhật sản phẩm </h1>
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
                                                <h1 class="h4 text-gray-900 mb-2">Tên sản phẩm </h1>
                                                <div class="form-group">
                                                    <input type="text" name="tenSanPham" class="form-control"
                                                        value="<?php echo $tenSanPham ?>" placeholder="Tên sản phẩm">
                                                </div>
                                                <h1 class="h4 text-gray-900 mb-2"> Số lượng </h1>
                                                <div class="form-group">
                                                    <input type="text" name="soLuong" class="form-control"
                                                        value="<?php echo $soLuong ?>" placeholder="Số lượng">
                                                </div>

                                                <h1 class="h4 text-gray-900 mb-2"> Danh Mục </h1>
                                                <div class="form-group">

                                                    <select name="danhMucId" class="form-control">
                                                        <?php
                                                        require "connect.php";
                                                        $select_danhmuc = "SELECT * FROM danhmuc";
                                                        $result_danhmuc = $conn->query($select_danhmuc);

                                                        while ($row_danhmuc = $result_danhmuc->fetch_assoc()) {
                                                            $tenDanhMuc = $row_danhmuc['tenDanhMuc'];

                                                            ?>
                                                            <option value="<?php echo $row_danhmuc['id'] ?>" <?php if ($row_danhmuc['id'] == $danhMucId)
                                                                   echo 'selected'; ?>>
                                                                <?php echo "$tenDanhMuc" ?>
                                                            </option>
                                                        <?php }
                                                        ; ?>
                                                    </select>
                                                </div>


                                                <h1 class="h4 text-gray-900 mb-2"> Đơn vị </h1>
                                                <div class="form-group">

                                                    <select name="donViId" class="form-control">
                                                        <?php
                                                        require "connect.php";
                                                        $select_donvi = "SELECT * FROM donvi";
                                                        $result_donvi = $conn->query($select_donvi);

                                                        while ($row_dv = $result_donvi->fetch_assoc()) {
                                                            $tenDv = $row_dv['tenDonVi'];

                                                            ?>
                                                            <option value="<?php echo $row_dv['id'] ?>" <?php if ($row_dv['id'] == $taiKhoanId)
                                                                   echo 'selected'; ?>>
                                                                <?php echo "$tenDv" ?>
                                                            </option>
                                                        <?php }
                                                        ; ?>
                                                    </select>
                                                </div>


                                                <h1 class="h4 text-gray-900 mb-2"> Nhà phân phối </h1>
                                                <div class="form-group">


                                                    <select class="form-control" name="nhaPhanPhoiId">
                                                        <?php
                                                        require "connect.php";
                                                        $select_nhapp = "SELECT * FROM nhaphanphoi";
                                                        $result_nhapp = mysqli_query($conn, $select_nhapp);

                                                        while ($row_NPP = $result_nhapp->fetch_assoc()) {
                                                            $tenNPP = $row_NPP['tenNhaPhanPhoi'];

                                                            ?>
                                                            <option value="<?php echo $row_NPP['id'] ?>" <?php if ($row_NPP['id'] == $nhaPhanPhoiId)
                                                                   echo 'selected'; ?>>
                                                                <?php echo "$tenNPP" ?>
                                                            </option>
                                                        <?php }
                                                        ; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                                        <input type="submit" name="submit"
                                                            class="btn btn-primary btn-user btn-block" id=""
                                                            placeholder="Cập nhật sản phẩm">
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
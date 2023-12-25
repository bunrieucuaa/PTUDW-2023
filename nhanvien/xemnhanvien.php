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
    <title>Xem nhân viên</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
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
                <?php
                $id = $_GET['id'];
                require('../connection.php');
                $sql = "Select * from nhanvien where id=$id";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $tenNhanVien = $row['tenNhanVien'];
                $soDienThoai = $row['soDienThoai'];
                $email = $row['email'];
                $diaChi = $row['diaChi'];
                $chucVu = $row['chucVu'];

                if (isset($_POST['submit'])) {

                    $id = $_POST['id'];
                    $tenNhanVien = $_POST['tenNhanVien'];
                    $soDienThoai = $_POST['soDienThoai'];
                    $email = $_POST['email'];
                    $diaChi = $_POST['diaChi'];
                    $chucVu = $_POST['chucVu'];

                    $sql = "UPDATE nhanvien SET tenNhanVien = '$tenNhanVien', soDienThoai='$soDienThoai' , email='$email', chucVu='$chucVu',diaChi='$diaChi' WHERE id= $id ";

                    $result = mysqli_query($conn, $sql);
                    if ($result) {
                        header("Location: nhanvien.php");
                        exit();
                    } else {
                        echo "Error updating record: " . mysqli_error($conn);
                    }
                }
                mysqli_close($conn);
                ?>

                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Xem tài khoản</h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="container">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">

                                        </div>
                                    </div>
                                </div>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $id; ?> ">
                                    <div class="form-group">
                                        <label for="tenNhanVien">Tên nhân viên:</label>
                                        <input type="text" class="form-control" value="<?php echo $tenNhanVien; ?>" id="tenNhanVien" name="tenNhanVien" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="soDienThoai">Số điện thoại:</label>
                                        <input type="soDienThoai" class="form-control" value="<?php echo $soDienThoai; ?>" id="soDienThoai" name="soDienThoai" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" value="<?php echo $email; ?>" id="email" name="email" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="chucVu">Chức vụ:</label>
                                        <input type="chucVu" class="form-control" value="<?php echo $chucVu; ?>" id="chucVu" name="chucVu" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="diaChi">Địa chỉ:</label>
                                        <input type="diaChi" class="form-control" value="<?php echo $diaChi; ?>" id="diaChi" name="diaChi" required readonly>
                                    </div>

                                    <button name="submit" type="submit" class="btn btn-primary">Xong</button>
                                </form>
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
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../js/sb-admin-2.min.js"></script>
    <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
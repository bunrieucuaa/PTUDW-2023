<?php
session_start();
require('./lichsunhaphang/connection.php');
$title = "Login";
$error = [];

if (isset($_POST['submit'])) {
    function sanitize($conn, $input)
    {
        return mysqli_real_escape_string($conn, $input);
    }

    $taikhoan = sanitize($conn, trim($_POST['TaiKhoan']));
    $matkhau = sanitize($conn, trim($_POST['MatKhau']));

    $sql = "SELECT * FROM admin WHERE taiKhoan = '$taikhoan' AND matKhau = '$matkhau' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row;
            header('Location: index.php');
            exit;
        } else {
            $error[] = "Đăng nhập thất bại";
        }
    } else {
        $error[] = "Query failed: " . mysqli_error($conn);
    }
}

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        <?php if (count($error) > 0) : ?>
                                            <?php foreach ($error as $errMsg) : ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <strong>Error: </strong><?php echo $errMsg; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <input type="text" name="TaiKhoan" class="form-control form-control-user" placeholder="Tên đăng nhập" value="<?php echo isset($_POST['TaiKhoan']) ? htmlspecialchars($_POST['TaiKhoan']) : ''; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="MatKhau" class="form-control form-control-user" placeholder="Mật khẩu">
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
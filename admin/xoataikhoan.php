<?php
require('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $taiKhoan = mysqli_real_escape_string($conn, $_GET['taiKhoan']);
    $sql = "DELETE FROM admin WHERE taiKhoan = '$taiKhoan'";

    if (mysqli_query($conn, $sql)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
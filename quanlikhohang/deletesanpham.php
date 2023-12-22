<?php
// session_start();
// if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
//     header('location:1-displayAdmin.php');
//     exit;
// }


if (isset($_GET['deletedid'])) {
    require 'connect.php';
    $id = $_GET['deletedid'];
    $sql = "DELETE FROM sanpham WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header('Location: dssanpham.php?status=del_success');
    } else {
        header('Location: dssanpham.php?status=del_fail');
    }
} else {
    header('Location: dssanpham.php?status=id_not_found');
}
?>
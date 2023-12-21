<?php
// session_start();
// if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
//     header('location:1-displayAdmin.php');
//     exit;
// }
if (isset($_GET['deletedid'])) {
    require 'connect.php';
    $id = $_GET['deletedid'];
    $sql = "DELETE FROM nhaphanphoi WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header('Location: dsnhaphanphoi.php?status=del_success');
    } else {
        header('Location: dsnhaphanphoi.php?status=del_fail');
    }
} else {
    header('Location: dsnhaphanphoi.php?status=id_not_found');
}
?>
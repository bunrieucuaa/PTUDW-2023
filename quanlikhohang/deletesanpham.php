<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}
require('../connection.php');
?>
<?php
if (isset($_GET['deletedid'])) {
    require '../connection.php';
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

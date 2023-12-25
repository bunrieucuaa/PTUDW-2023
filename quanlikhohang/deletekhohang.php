<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}
require('../connection.php');
?>
<?php
// session_start();
// if (!isset($_SESSION['username']) || $_SESSION['role'] != 1) {
//     header('location:1-displayAdmin.php');
//     exit;
// }


if (isset($_GET['deletedid'])) {
    require '../connection.php';
    $id = $_GET['deletedid'];
    $sql = "DELETE FROM khohang WHERE id='$id'";
    if (mysqli_query($conn, $sql)) {
        header('Location: dskhohang.php?status=del_success');
    } else {
        header('Location: dskhohang.php?status=del_fail');
    }
} else {
    header('Location: dskhohang.php?status=id_not_found');
}
?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: ../login.php');
    exit;
}
require('../connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteSql = "DELETE FROM lichsuxuathang WHERE id = ?";

    $stmt = mysqli_prepare($conn, $deleteSql);
    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {
        header('Location: lichsuxuathang.php?status=del_success');
        exit;
    } else {
        header('Location: lichsuxuathang.php?status=del_fail');

        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
} else {
    header('Location: lichsuxuathang.php');
    exit;
}

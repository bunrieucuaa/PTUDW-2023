<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}
require('../connection.php');
?>
<?php
$status = isset($_GET["status"]) ? $_GET["status"] : ""; ?>
<?php if ($status == 'add_success') : ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Thêm thành công</strong>
    </div>
<?php elseif ($status == 'add_fail') : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Thêm thất bại</strong>
    </div>
<?php elseif ($status == 'del_success') : ?>
    <div class="alert alert-success" role="alert">
        <button type="buDtton" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Xóa thành công</strong>
    </div>
<?php elseif ($status == 'del_fail') : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Xóa thất bại</strong>
    </div>
<?php elseif ($status == 'update_success') : ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sửa thành công</strong>
    </div>
<?php elseif ($status == 'update_fail') : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>Sửa thất bại</strong>
    </div>
<?php elseif ($status == 'id_not_found') : ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> Không có bản ghi này ! </strong>
    </div>
<?php endif;
require('../connection.php');
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "DELETE FROM nhanvien WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        header("Location: nhanvien.php? status=del_success");
    } else {
        header("Location: nhanvien.php? status=del_fail");
    }
    mysqli_close($conn);
}
?>
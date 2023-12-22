<?php
$server = "localhost";
$username = "root";
$password = "";
$database = 'quanlikhohang';
$conn = mysqli_connect($server, $username, $password, $database);
$conn->set_charset('utf8');

if ($conn->connect_error) {
    exit('Lỗi kết nối: ' . $conn->connect_error);
}

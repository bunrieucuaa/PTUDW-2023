<?php
$servername = "localhost:8887";
$username = "root";
$password = "root";
$db = "quanlikhohang";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully<br>";
?>
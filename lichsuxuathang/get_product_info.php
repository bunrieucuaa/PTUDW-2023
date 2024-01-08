<?php
require('../connection.php');

if (isset($_GET['id'])) {
    $productId = mysqli_real_escape_string($conn, $_GET['id']);

    $queryProductInfo = "SELECT nhaPhanPhoiId, donViId, soLuong FROM sanpham WHERE id = $productId";
    $resultProductInfo = mysqli_query($conn, $queryProductInfo);

    if ($rowProductInfo = mysqli_fetch_assoc($resultProductInfo)) {
        $response = array(
            'nhaPhanPhoiId' => $rowProductInfo['nhaPhanPhoiId'],
            'donViId' => $rowProductInfo['donViId'],
            'availableQuantity' => $rowProductInfo['soLuong']
        );

        echo json_encode($response);
    } else {
        echo json_encode(array());
    }
} else {
    echo json_encode(array());
}

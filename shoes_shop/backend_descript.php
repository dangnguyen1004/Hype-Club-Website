<?php

include "conn.php";

if (isset($_POST['addToCard'])) {
    $brand_id = $_POST['brand_id'];

    $sql = "SELECT * FROM cart WHERE brand_id = '$brand_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) { // co roi
        $record = mysqli_fetch_assoc($result);
        $amount = 1 + $record['amount'];
        $sql = "UPDATE cart
        SET amount = '$amount'
        WHERE brand_id = $brand_id;";
        if (mysqli_query($conn, $sql)){
            echo 'success update';
        }
        else{
            echo ' fail update';
        }
    } else { // chua co
        $sql = "INSERT INTO cart (number, brand_id, amount)
        VALUES (NULL, '$brand_id', 1)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo 'success add';
        } else {
            echo 'fail add';
        }
    }
}

<?php
include 'connect.php';

    $order_id = $_GET['id'];
    $query  = "UPDATE pesanan SET is_done = '1' WHERE order_id = '$order_id'";
    echo $order_id;
    echo $orders_id;
    $result = $mysqli -> query($query);
    if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                            " - ".mysqli_error($mysqli));
    } else {
        // echo "<script>alert('Done.');window.location='admin.php';</script>";
    }
?>
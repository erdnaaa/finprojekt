<?php
    session_start();
    include 'connect.php';
    $user_id = $_COOKIE['user_id'];
    $product_name = $_POST['product_name'];
    $total_price= $_POST['total_price'];
    $qty = $_POST['qty'];
    
    foreach($_SESSION["shopping_cart"] as $product) {

        $product_id = $product['id'];
        $price = $product['price'];
        // $query = "INSERT INTO pesanan (user_id, product_name, quantity, is_done, price) VALUES ('$user_id', '$product_name', '$qty', '0', '$price')";
        $query = "INSERT INTO pesanan (user_id, product_name, quantity, is_done) VALUES ('$user_id', '$product_name', '$qty', '0')";
        //pesanan user_id, product_id, quantity, is_done, price
            
        $result = $mysqli -> query($query); 
    }
    
    //error
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
        " - ".mysqli_error($mysqli));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        echo "<script>alert('Order Berhasil.');window.location='index.php';</script>";
    }
    $_SESSION = array();
?>
<?php
    session_start();
    include 'connect.php';
    //$user_id = $_COOKIE['user_id'];
    $product_id = $_POST['id'];
    $total_price= $_POST['total_price'];
    $qty = $_POST['qty'];
    
    foreach($_SESSION["shopping_cart"] as $product) {
        // echo "Price: " . $product_id['price'] . "<br><br>";
        // echo "<pre>"; print_r($_SESSION['shopping_cart']); echo "</pre>";
        $product_id = $product['id'];
        
        //$query = "INSERT INTO pesanan (user_id, product_id, total_amount, quantity, is_done) VALUES ('$nama_produk', '$id', '$total_price', '$qty', '0')";
        
        $query = "INSERT INTO pesanan (user_id, product_id, total_amount, quantity, is_done) VALUES ('1', '$product_id', '$total_price', '$qty', '0')";
        $result = $mysqli -> query($query); 
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
            }
        
        $query = "INSERT INTO order_history (user_id, product_id) VALUES ('1', '$product_id')";
        $result = $mysqli -> query($query);

        // $query = "INSERT INTO pesanan (user_id, product_id, total_amount, is_done) VALUES ('1', '$harga', '0', '0')";
        // $result = $mysqli -> query($query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
            }
    }
    
    // //chatgpt
    // $sql = "INSERT INTO orders (order_id, user_id, order_date, total_amount, shipping_address) 
    //         VALUES ('$orderId', '$userId', '$orderDate', '$totalAmount', '$shippingAddress')";

    // if (mysqli_query($conn, $sql)) {
    //     // Order saved successfully
    //     // Clear the cart or perform other necessary actions
    //     unset($_SESSION['cart']);
    //     echo "Order placed successfully. Your order ID is: $orderId";
    // } else {
    //     // Failed to save the order
    //     echo "Error: " . mysqli_error($conn);
    // }
    
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
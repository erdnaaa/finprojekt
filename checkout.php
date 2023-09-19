<?php
    session_start();
    include 'connect.php';
    $user_id = $_COOKIE['user_id'];
    $product_name = $_POST['product_name'];
    $total_price= $_POST['total_price'];
    $qty = $_POST['qty'];
    
    foreach($_SESSION["shopping_cart"] as $product) {
        // echo "Price: " . $product_id['price'] . "<br><br>";
        // echo "<pre>"; print_r($_SESSION['shopping_cart']); echo "</pre>";
        $product_id = $product['id'];
        $price = $product['price'];
        // $query = "INSERT INTO pesanan (user_id, product_name, quantity, is_done, price) VALUES ('$user_id', '$product_name', '$qty', '0', '$price')";
        $query = "INSERT INTO pesanan (user_id, product_name, quantity, is_done) VALUES ('$user_id', '$product_name', '$qty', '0')";
        //pesanan user_id, product_id, quantity, is_done, price
            
        $result = $mysqli -> query($query); 
        // $query = "INSERT INTO orders (user_id, total_amount) VALUES ('1', '$total_price')";
        // $result = $mysqli -> query($query);
        
        // $query = "INSERT INTO order_details (order_id, user_id, product_id) VALUES ('1', '$product_id')";
        // $result = $mysqli -> query($query);

        // $query = "INSERT INTO pesanan (user_id, product_id, total_amount, is_done) VALUES ('1', '$harga', '0', '0')";
        // $result = $mysqli -> query($query);
        // if(!$result){
        //     die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
        //     " - ".mysqli_error($mysqli));
        //     }
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
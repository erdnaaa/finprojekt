<?php
    session_start();
    include 'connect.php';
    foreach($_SESSION["shopping_cart"] as $product_id) {
        echo "Price: " . $product_id['price'] . "<br><br>";
        // echo "<pre>"; print_r($_SESSION['shopping_cart']); echo "</pre>";
        $harga = $product_id['id'];
        $query = "INSERT INTO pesanan (user_id, product_id, total_amount, is_done) VALUES ('1', '$harga', '0', '0')";
        $result = $mysqli -> query($query);
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
            " - ".mysqli_error($mysqli));
            }
    }
?>
<?php
    session_start();
    include 'connect.php';
    // foreach($_SESSION["shopping_cart"] as $product_id) {
    //     echo "Price: " . $product_id['price'] . "<br><br>";
    //     // echo "<pre>"; print_r($_SESSION['shopping_cart']); echo "</pre>";
    //     $harga = $product_id['id'];
    //     $query = "INSERT INTO pesanan (user_id, product_id, quantity, is_done, price, ratings) VALUES ('1', '$product_id', '$qty', '0')";
    //     // $query = "INSERT INTO pesanan (user_id, product_id, total_amount, is_done) VALUES ('1', '$harga', '0', '0')";
    //     $result = $mysqli -> query($query);
    //     if(!$result){
    //         die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
    //         " - ".mysqli_error($mysqli));
    //         }
    // }
    // $_SESSION = array();
    include("recommend.php");
    $product=mysqli_query($mysqli, "SELECT * from pesanan");
    $matrix=array();
        while($p=mysqli_fetch_array($product)){
            $users=mysqli_query($mysqli,"SELECT user_id from pesanan where user_id=$p[user_id]");
            
            $username=mysqli_fetch_array($users);
            $matrix[$username['user_id']][$p['product_name']]=$p['ratings'];
        }
    print_r($matrix);
?>
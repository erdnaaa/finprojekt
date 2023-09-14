<?php
include("connect.php");
include("recommend.php");
// $product=mysqli_query($mysqli, "SELECT * from pesanan");
// $matrix=array();

// while($p=mysqli_fetch_array($product))
// {
//     $users=mysqli_query($mysqli,"SELECT user_id from pesanan where user_id=$p[user_id]");
    
//     $username=mysqli_fetch_array($users);
//     $matrix[$username['user_id']][$p['product_name']]=$p['ratings'];

// }
// // echo '<pre>'; print_r($matrix); echo '</pre>';
// // echo '<pre>'; print_r($matrix); echo '</pre>';
// var_dump(getRecommendation($matrix, "3"));
print_r($_COOKIE);
$user = $_COOKIE['user_id'];
echo $user;
?>
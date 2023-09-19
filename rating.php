<?php
include 'connect.php';
    $nama_produk    = $_POST['nama_produk'];
    $user            = $_COOKIE['user_id'];
    $rating          = $_POST['rating'];
    $query  = "UPDATE pesanan SET ratings = '$rating' WHERE product_name = '$nama_produk' AND is_done = '1' AND user_id = '$user';";
      $result = $mysqli -> query($query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                             " - ".mysqli_error($mysqli));
      } else {
          echo "<script>alert('Ratings added.');window.location='index.php';</script>";
      }
?>
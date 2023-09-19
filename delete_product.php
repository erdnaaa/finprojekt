<?php
include 'connect.php';
$id = $_GET["id"];

    //jalankan DELETE untuk menghapus data
    $query = "DELETE FROM produk WHERE id='$id' ";
    $result = $mysqli -> query($query);

    //periksa query, apakah ada kesalahan
    if(!$result) {
      die ("Gagal menghapus data: ".mysqli_errno($mysqli).
       " - ".mysqli_error($mysqli));
    } else {
      echo "<script>alert('Data berhasil dihapus.');window.location='product.php';</script>";
    }
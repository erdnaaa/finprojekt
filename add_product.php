<?php
    include 'connect.php';

    $nama_produk    = $_POST['nama_produk'];
    $deskripsi      = $_POST['deskripsi_produk'];
    $harga          = $_POST['harga_produk'];
    $gambar_produk  = $_FILES['gambar_produk']['name'];
    $rekomendasi    = $_POST['rekomendasi'];
    $category       = $_POST['category'];

    if($gambar_produk != "") {
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya untuk menghindari nama file yang sama
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
        
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan
        $query = "INSERT INTO produk (nama_produk, deskripsi, harga, rekomendasi, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga', '$rekomendasi', '$nama_gambar_baru')";
        
        // menambah category
        // $query = "INSERT INTO produk (nama_produk, deskripsi, harga, rekomendasi, category, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga', '$rekomendasi', '$category','$nama_gambar_baru')";

        $result = $mysqli -> query($query);
        
        // periksa query apakah ada error
        if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
        " - ".mysqli_error($mysqli));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        echo "<script>alert('Data berhasil ditambah.');window.location='add_page.php';</script>";
        }

        } else {     
        //alert jika file ekstensi bukan jpg dan png
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='add_page.php';</script>";
        }
    } else {
    $query = "INSERT INTO produk (nama_produk, deskripsi, harga, rekomendasi, gambar_produk, rekomendasi, category) VALUES ('$nama_produk', '$deskripsi', '$harga', '$rekomendasi', null)";

    // menambah category
    // $query = "INSERT INTO produk (nama_produk, deskripsi, harga, rekomendasi, category, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga', '$rekomendasi', '$category', null)";

    $result = $mysqli -> query($query);
    // periksa query apakah ada error
    if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
    " - ".mysqli_error($mysqli));
    } else {
    //alert berhasil dan akan redirect ke halaman product
    echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
    }
    }
?>
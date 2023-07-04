<?php
    include 'connect.php';

    $nama_produk    = $_POST['nama_produk'];
    $deskripsi      = $_POST['deskripsi_produk'];
    $harga          = $_POST['harga_produk'];
    $gambar_produk  = $_FILES['gambar_produk']['name'];
    $rekomendasi    = $_POST['rekomendasi'];

    if($gambar_produk != "") {
        $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
        move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
        // jalankan query INSERT untuk menambah data ke database pastikan sesuai urutan (id tidak perlu karena dibikin otomatis)
        $query = "INSERT INTO produk (nama_produk, deskripsi, harga, rekomendasi, gambar_produk) VALUES ('$nama_produk', '$deskripsi', '$harga', '$rekomendasi', '$nama_gambar_baru')";
        $result = $mysqli -> query($query);
        // periska query apakah ada error
        if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
        }

        } else {     
        //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
        echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
        }
    } else {
    $query = "INSERT INTO produk (nama_produk, deskripsi, harga, rekomendasi, gambar_produk, rekomendasi) VALUES ('$nama_produk', '$deskripsi', '$harga', '$rekomendasi', null)";
    $result = $mysqli -> query($query);
    // periska query apakah ada error
    if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
    " - ".mysqli_error($koneksi));
    } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Data berhasil ditambah.');window.location='product.php';</script>";
    }
    }
?>
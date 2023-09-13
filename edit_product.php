<?php
include 'connect.php';

  $id = $_POST['id'];
  $nama_produk    = $_POST['nama_produk'];
  $deskripsi      = $_POST['deskripsi_produk'];
  $harga          = $_POST['harga_produk'];
  $gambar_produk  = $_FILES['gambar_produk']['name'];
  $rekomendasi    = $_POST['rekomendasi'];
  //cek dulu jika merubah gambar produk jalankan coding ini
  if($gambar_produk != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); //ekstensi file gambar yang bisa diupload 
    $x = explode('.', $gambar_produk); //memisahkan nama file dengan ekstensi yang diupload
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar_produk']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$gambar_produk; //menggabungkan angka acak dengan nama file sebenarnya
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'gambar/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                      
                    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                    $query  = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga = '$harga', rekomendasi = '$rekomendasi', gambar_produk = '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = $mysqli -> query($query);
                    // periska query apakah ada error
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                             " - ".mysqli_error($mysqli));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
               //jika file ekstensi tidak jpg dan png maka alert ini yang tampil
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_produk.php';</script>";
              }
    } else {
      // jalankan query UPDATE berdasarkan ID yang produknya kita edit
      $query  = "UPDATE produk SET nama_produk = '$nama_produk', deskripsi = '$deskripsi', harga = '$harga', rekomendasi = '$rekomendasi'";
      $query .= "WHERE id = '$id'";
      $result = $mysqli -> query($query);
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($mysqli).
                             " - ".mysqli_error($mysqli));
      } else {
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }
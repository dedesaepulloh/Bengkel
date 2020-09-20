<?php 
    include "koneksi.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_pelanggan WHERE id_pelanggan = '$_GET[id_pelanggan]'");

    if($hapus){
        header("location:../dataPelanggan.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataPelanggan.php'>Kembali</a>";
    }
?>
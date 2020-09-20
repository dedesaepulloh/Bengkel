<?php 
    include "koneksi.php";
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_jasa (nama_jasa, harga) VALUES ('$_POST[nama_jasa]', '$_POST[harga]')");

    if($simpan){
        header("location:../dataJasa.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataJasa.php'>Kembali</a>";
    }
?>
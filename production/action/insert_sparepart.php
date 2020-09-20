<?php 
    include "koneksi.php";
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_sparepart (nama_sparepart, harga_beli, harga_jual) VALUES ('$_POST[nama_sparepart]', '$_POST[harga_beli]','$_POST[harga_jual]')");

    if($simpan){
        header("location:../dataSparepart.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataSparepart.php'>Kembali</a>";
    }
?>
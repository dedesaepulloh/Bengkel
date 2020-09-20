<?php 
    include "koneksi.php";
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_supplier (nama_supplier, telepon, alamat) VALUES ('$_POST[nama_supplier]', '$_POST[telepon]', '$_POST[alamat]')");

    if($simpan){
        header("location:../dataSupplier.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataSupplier.php'>Kembali</a>";
    }
?>
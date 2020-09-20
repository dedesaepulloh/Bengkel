<?php 
    include "koneksi.php";
    $edit = mysqli_query($koneksi, "UPDATE tbl_supplier SET nama_supplier= '$_POST[nama_supplier]', telepon= '$_POST[telepon]', alamat= '$_POST[alamat]' WHERE id_supplier = '$_POST[id_supplier]'");

    if($edit){
        header("location:../dataSupplier.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataSupplier.php'>Kembali</a>";
    }
?>
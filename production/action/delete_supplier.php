<?php 
    include "koneksi.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_supplier WHERE id_supplier = '$_GET[id_supplier]'");

    if($hapus){
        header("location:../dataSupplier.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataSupplier.php'>Kembali</a>";
    }
?>
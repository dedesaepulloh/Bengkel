<?php 
    include "koneksi.php";
    $edit = mysqli_query($koneksi, "UPDATE tbl_sparepart SET nama_sparepart= '$_POST[nama_sparepart]', harga_beli= '$_POST[harga_beli]', harga_jual= '$_POST[harga_jual]' WHERE id_sparepart = '$_POST[id_sparepart]'");

    if($edit){
        header("location:../dataSparepart.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataSparepart.php'>Kembali</a>";
    }
?>
<?php 
    include "koneksi.php";
    $edit = mysqli_query($koneksi, "UPDATE tbl_jasa SET nama_jasa= '$_POST[nama_jasa]', harga= '$_POST[harga]' WHERE id_jasa = '$_POST[id_jasa]'");

    if($edit){
        header("location:../dataJasa.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataJasa.php'>Kembali</a>";
    }
?>
<?php 
    include "koneksi.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_jasa WHERE id_jasa = '$_GET[id_jasa]'");

    if($hapus){
        header("location:../dataJasa.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataJasa.php'>Kembali</a>";
    }
?>
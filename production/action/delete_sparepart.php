<?php 
    include "koneksi.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_sparepart WHERE id_sparepart = '$_GET[id_sparepart]'");

    if($hapus){
        header("location:../dataSparepart.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataSparepart.php'>Kembali</a>";
    }
?>
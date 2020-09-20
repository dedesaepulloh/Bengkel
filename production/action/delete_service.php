<?php 
    include "koneksi.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_service_head WHERE id_service = '$_GET[id_service]'");

    if($hapus){
        header("location:../service.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../service.php'>Kembali</a>";
    }
?>
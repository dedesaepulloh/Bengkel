<?php 
    include "koneksi.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_user WHERE id_user = '$_GET[id_user]'");

    if($hapus){
        header("location:../dataUser.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataUser.php'>Kembali</a>";
    }
?>
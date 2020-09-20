<?php 
    include "koneksi.php";
    $edit = mysqli_query($koneksi, "UPDATE tbl_user SET nama= '$_POST[nama]', password= '$_POST[password]', level= '$_POST[level]' WHERE id_user = '$_POST[id_user]'");

    if($edit){
        header("location:../dataUser.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataUser.php'>Kembali</a>";
    }
?>
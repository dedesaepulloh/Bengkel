<?php 
    include "koneksi.php";
    $pass = $_POST['password'];
    $md5 = md5 ($pass);
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_user (nama, password, level) VALUES ('$_POST[nama]', '$md5', '$_POST[level]')");

    if(simpan){
        header("location:../dataUser.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='dataUser.php'>Kembali</a>";
    }
?>
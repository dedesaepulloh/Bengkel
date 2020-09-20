<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "bengkel";
    $koneksi = new mysqli ($host,$user,$pass,$database);
        if (mysqli_connect_errno()){
            trigger_error("Koneksi Gagal :". mysqli_connect_error(), E_USER_ERROR);
        }
?>
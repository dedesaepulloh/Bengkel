<?php 
    session_start();
    include "koneksi.php";
    $password = md5 ($_POST['password']);
    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_user WHERE nama='$_POST[nama]' AND password='$password'");
    $data = mysqli_fetch_array($tampil);

    if (!empty($data['nama'])){ 
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['password'] = $data['password'];
        header('location:../index.php');
    }else{
        echo "<script>alert('Login Gagal Username & Password Tidak Cocok'); window.location = '../login.php'</script>";
    }
//Dede Saepulloh
?>
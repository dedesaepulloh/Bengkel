<?php 
    include "koneksi.php";
    $id_service = $_POST['id_service'];
    $edit = mysqli_query($koneksi, "UPDATE tbl_service_head SET status= 'Sudah Dibayar', bayar= '$_POST[bayar]', kembali= '$_POST[kembali]' WHERE id_service = '$_POST[id_service]'");

    if($edit){
        header("location:struk_service.php?id_service=$id_service");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../service.php'>Kembali</a>";
    }
?>
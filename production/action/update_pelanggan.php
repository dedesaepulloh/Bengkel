<?php 
    include "koneksi.php";
    $edit = mysqli_query($koneksi, "UPDATE tbl_pelanggan SET nama_pelanggan= '$_POST[nama_pelanggan]', telepon= '$_POST[telepon]', alamat= '$_POST[alamat]', type= '$_POST[type]', no_polisi= '$_POST[no_polisi]', no_rangka= '$_POST[no_rangka]', no_mesin= '$_POST[no_mesin]', kilometer= '$_POST[kilometer]' WHERE id_pelanggan = '$_POST[id_pelanggan]'");

    if($edit){
        header("location:../dataPelanggan.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataPelanggan.php'>Kembali</a>";
    }
?>
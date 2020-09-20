<?php 
    include "koneksi.php";
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_pelanggan (tanggal,nama_pelanggan,telepon,alamat,type,no_polisi,no_rangka,no_mesin,kilometer) VALUES (curdate(), '$_POST[nama_pelanggan]', '$_POST[telepon]', '$_POST[alamat]', '$_POST[type]', '$_POST[no_polisi]', '$_POST[no_rangka]', '$_POST[no_mesin]', '$_POST[kilometer]')");

    if($simpan){
        header("location:../dataPelanggan.php");
    }else{
        echo "<p>Gagal Menyimpan</p><a href='../dataPelanggan.php'>Kembali</a>";
    }
?>
<?php 
    include "koneksi.php";
    $add = $_POST['submit'];
    $temporary_value = json_decode($add);
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_service_head (id_service, tanggal, id_pelanggan, status) VALUES ('$_POST[id_service]', '$_POST[tanggal]', '$_POST[id_pelanggan]', 'Belum Dibayar')");

    if($simpan){
        foreach((array)$temporary_value as $row){
            $id_service 	= $row[0];
            $id_jasa 	= $row[1];
            $id_sparepart 	= $row[2]; 
            $qty 	= $row[3]; 
            $harga_total 	= $row[4]; 
            // query insert
            $simpan1 = mysqli_query($koneksi, "INSERT INTO tbl_service_det (id_service, id_jasa, id_sparepart, qty, harga_total) VALUES ('$id_service', '$id_jasa', $id_sparepart, $qty, $harga_total)");
            
            header("location:../service.php");
        }
}else{
    echo "<p>Gagal Menyimpan</p><a href='../service.php'>Kembali</a>";
}
?>
<?php 
    include "koneksi.php";
    $add = $_POST['submit'];
    $id_penjualan = $_POST['id_penjualan'];
    $temporary_value = json_decode($add);
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_penjualan_head (id_penjualan, tanggal, bayar, kembali) VALUES ('$_POST[id_penjualan]', '$_POST[tanggal]', '$_POST[bayar]','$_POST[kembali]')");

    if($simpan){
        foreach((array)$temporary_value as $row){
            $id_penjualan 	= $row[0];
            $id_sparepart 	= $row[1];
            $harga 	= $row[2]; 
            $qty 	= $row[3]; 
            $harga_total 	= $row[4]; 
            // query insert
            $simpan1 = mysqli_query($koneksi, "INSERT INTO tbl_penjualan_det (id_penjualan, id_sparepart, harga, qty, harga_total) VALUES ('$id_penjualan', '$id_sparepart', $harga, $qty, $harga_total)");
            
            
        }
        header("location:struk_penjualan.php?id_penjualan=$id_penjualan");
}else{
    echo "<p>Gagal Menyimpan</p><a href='../penjualan.php'>Kembali</a>";
}
?>
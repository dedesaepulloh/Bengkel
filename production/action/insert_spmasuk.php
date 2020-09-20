<?php 
include "koneksi.php";
    $add = $_POST['add'];
    $temporary_value = json_decode($add);
    foreach((array)$temporary_value as $row){
        $tanggal 	= $row[0]; // tr.td kolom ke 1
        $faktur 	= $row[1]; // tr.td kolom ke 2
        $supplier 	= $row[2]; // tr.td kolom ke 2
        $sparepart 	= $row[3]; // tr.td kolom ke 2
        $harga 	= $row[4]; // tr.td kolom ke 2
        $qty 	= $row[5]; // tr.td kolom ke 2
        $total 	= $row[6]; // tr.td kolom ke 2
    
        // query insert
        // $tanggal = date('d-M-Y');
        $simpan = mysqli_query($koneksi, "INSERT INTO tbl_sparepart_masuk (tanggal,faktur,id_supplier,id_sparepart,jumlah,harga_beli,harga_total) VALUES ($tanggal, '$faktur', '$supplier', '$sparepart', $qty, $harga, $total)");

        if($simpan){
            header("location:../sparepart_masuk.php");
        }else{
            echo "<p>Gagal Menyimpan</p><a href='../sparepart_masuk.php'>Kembali</a>";
        }
    }
?>
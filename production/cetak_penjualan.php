<?php

require_once __DIR__ . '/vendor/autoload.php';
include "action/koneksi.php";

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Laporan Penjualan</title>
</head>
<body>
    <h2>LAPORAN PENJUALAN</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Penjualan</th>
                <th>ID Pelanggan</th>
                <th>Tanggal</th>
                <th>ID Sparepart</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Harga Total</th>
            </tr>
        </thead>
        <tbody>';
            $no = 1; 
            if(isset($_POST['cetak'])){ 
                $awal = $_POST['tanggal_awal']; 
                $akhir = $_POST['tanggal_akhir']; 
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_penjualan_head INNER JOIN tbl_penjualan_det ON tbl_penjualan_head.id_penjualan = tbl_penjualan_det.id_penjualan WHERE tanggal BETWEEN '$awal' AND '$akhir'"); 
            }else{ $sql = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan_head INNER JOIN tbl_penjualan_det ON tbl_penjualan_head.id_penjualan = tbl_penjualan_det.id_penjualan"); 
            } 
            while($data=mysqli_fetch_array($sql)){ 

                $html .= '<tr>
                    <td>'. $no++ .'</td> 
                    <td>'. $data["id_penjualan"] .'</td>  
                    <td>'. $data["id_pelanggan"] .'</td>  
                    <td>'. $data["tanggal"] .'</td> 
                    <td>'. $data["id_sparepart"] .'</td> 
                    <td>'. $data["harga"] .'</td> 
                    <td>'. $data["qty"] .'</td> 
                    <td>'. $data["harga_total"] .'</td> 
                </tr>';
            }
$html .= '</tbody>
    </table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>
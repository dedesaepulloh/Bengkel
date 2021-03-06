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
<title>Laporan Service</title>
</head>
<body>
    <h2>LAPORAN SERVICE</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>No Transaksi</th>
                <th>Tanggal</th>
                <th>ID Pelanggan</th>
                <th>ID Jasa</th>
                <th>Harga</th>
                <th>Sparepart</th>
                <th>Qty</th>
                <th>Harga Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>';
            // $tampil2 = mysqli_query($koneksi, "SELECT * FROM t_penjualan_head INNER JOIN t_pelanggan ON t_penjualan_head.id_pelanggan = t_pelanggan.id_pelanggan");
            // $data2 = mysqli_fetch_array($tampil2);
            // $tampil3 = mysqli_query($koneksi, "SELECT * FROM t_penjualan_detail INNER JOIN t_tanaman ON t_penjualan_detail.id_tanaman = t_tanaman.id_tanaman");
            // $data3 = mysqli_fetch_array($tampil3);
            $no = 1; 
            if(isset($_POST['cetak'])){ 
                $awal = $_POST['tanggal_awal']; 
                $akhir = $_POST['tanggal_akhir']; 
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_service_head INNER JOIN tbl_service_det ON tbl_service_head.id_service = tbl_service_det.id_service WHERE tbl_service_head.tanggal BETWEEN '$awal' AND '$akhir'"); 
            }else{ $sql = mysqli_query($koneksi,"SELECT * FROM tbl_service_head INNER JOIN tbl_service_det ON tbl_service_head.id_service = tbl_service_det.id_service"); 
            } 
            while($data=mysqli_fetch_array($sql)){ 

                $html .= '<tr>
                    <td>'. $no++ .'</td> 
                    <td>'. $data["id_service"] .'</td>  
                    <td>'. $data["tanggal"] .'</td> 
                    <td>'. $data["id_pelanggan"] .'</td> 
                    <td>'. $data["id_jasa"] .'</td> 
                    <td>'. $data["harga"] .'</td> 
                    <td>'. $data["id_sparepart"] .'</td> 
                    <td>'. $data["qty"] .'</td> 
                    <td>'. $data["harga_total"] .'</td> 
                    <td>'. $data["status"] .'</td> 
                </tr>';
            }
$html .= '</tbody>
    </table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>
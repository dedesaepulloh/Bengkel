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
<title>LAPORAN DATA SPAREPART</title>
</head>
<body>
    <h2>LAPORAN DATA SPAREPART</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Sparepart</th>
                <th>Nama Sparepart</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>';

            $no = 1; 
        
                $sql = mysqli_query($koneksi, "SELECT * FROM tbl_sparepart"); 
            while($data=mysqli_fetch_array($sql)){ 

                $html .= '<tr>
                    <td>'. $no++ .'</td> 
                    <td>'. $data["id_sparepart"] .'</td> 
                    <td>'. $data["nama_sparepart"] .'</td> 
                    <td>'. $data["harga_beli"] .'</td> 
                    <td>'. $data["harga_jual"] .'</td> 
                    <td>'. $data["stok"] .'</td>
                </tr>';
            }
$html .= '</tbody>
    </table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();

?>
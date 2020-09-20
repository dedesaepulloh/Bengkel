<!DOCTYPE HTML>
<html>
    <head>
        <title>Cetak Struk</title>
    </head>
        <?php
        include "koneksi.php";
        $tampil=mysqli_query($koneksi, "SELECT * FROM tbl_service_det  WHERE id_service='$_GET[id_service]'");
        $data=mysqli_fetch_array($tampil);
        
        $tampil5 = mysqli_query($koneksi, "SELECT * FROM tbl_service_head inner join tbl_pelanggan on tbl_service_head.id_pelanggan=tbl_pelanggan.id_pelanggan  WHERE id_service='$_GET[id_service]'");
        $data5=mysqli_fetch_array($tampil5);
        ?>
        <body onload="print()">
            <center>
            <hr>
            <h2> Cetak Struk Service</h2>
            <h3> Helmi Hendra Motor </h3>
            <h4> Jl. RE Martadinata No.00 </h4>
            </center>
            <hr>
            <p>ID. Penjualan : <?php echo"$data[id_service]" ?></p>
            <p align="right">Tanggal : <?php echo date("d-m-Y") ?></p>
            <hr>
            <hr>
            <p>Nama : <?php echo "$data5[nama_pelanggan]" ?></p>
            <p>Alamat : <?php echo "$data5[alamat]" ?></p>
            <p>Type : <?php echo "$data5[type]" ?></p>
            <p>No. Polisi : <?php echo "$data5[no_polisi]" ?></p>
            <p>No. Rangka : <?php echo "$data5[no_rangka]" ?></p>
            <p>KM : <?php echo "$data5[kilometer]" ?></p>
            <hr>
            <h4> Jasa </h4>
            <table cellpadding="5" border="1px solid">
                <tr>
                
                <th>No</th>
                <th>Nama Jasa</th>
                <th>Harga</th>
                <tr>
                <?php 
                $i=1;
                    $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_service_det INNER JOIN tbl_jasa ON tbl_service_det.id_jasa=tbl_jasa.id_jasa WHERE id_service='$_GET[id_service]'");
                    while($data1 = mysqli_fetch_array($tampil1)){
                ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo"$data1[nama_jasa]" ?></td>
                <td><?php echo"$data1[harga]" ?></td>
                
                <tr>
                <?php } ?>
                <tr>
                <td colspan="2">Sub Total</td>
                <?php 
                    $tampil6 = mysqli_query($koneksi, "SELECT SUM(harga) AS total FROM tbl_jasa  WHERE id_jasa");
                    $data6 = mysqli_fetch_array($tampil6);
                ?>
                <td><?php echo "$data6[total]" ?></td>
                </tr>
            </table>
            <hr>
            <h4> Sparepart </h4>
            <table cellpadding="5" border="1px solid">
                <tr>
                
                <th>No</th>
                <th>Nama Sparepart</th>
                <th>Qty</th>
                <th>Harga Total</th>
                <tr>
                <?php 
                $i=1;
                    $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_service_det INNER JOIN tbl_jasa ON tbl_service_det.id_jasa=tbl_jasa.id_jasa WHERE id_service='$_GET[id_service]'");
                    while($data1 = mysqli_fetch_array($tampil1)){
                ?>
                <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo"$data1[id_sparepart]" ?></td>
                <td><?php echo"$data1[qty]" ?></td>
                <td><?php echo"$data1[harga_total]" ?></td>
                
                <tr>
                <?php } ?>
                <tr>
                <td colspan="3">Sub Total</td>
                <?php 
                    $tampil7 = mysqli_query($koneksi, "SELECT SUM(harga_total) AS total FROM tbl_service_det  WHERE id_service = '$_GET[id_service]'");
                    $data7 = mysqli_fetch_array($tampil7);
                ?>
                <td><?php echo "$data7[total]" ?></td>
                </tr>
            </table>
            <hr>
            <?php 
                $tampil2 = mysqli_query($koneksi, "SELECT * FROM tbl_service_head WHERE id_service = '$_GET[id_service]'");
                $data2 = mysqli_fetch_array($tampil2);
                $tampil4 = mysqli_query($koneksi, "SELECT SUM(harga_total + harga) AS total FROM tbl_service_det WHERE id_service = '$_GET[id_service]'");
                $data4 = mysqli_fetch_array($tampil4);
            ?>
                <p> Jumlah Bayar : <?php echo"$data4[total]" ?></p>
                <p> Bayar : <?php echo"$data2[bayar]" ?></p>
                <p> Kembalian : <?php echo"$data2[kembali]" ?></p> 
            <hr>
            <center>
            <p> Aplikasi Penjualan dan Service Motor </p>
            <script>
                    $date=new Date();
                    document.write($date);
                </script>
            </center>
            <hr>

            <h3><a href="../penjualan.php"> Kembali </a></h3>

        </body>
                    <script>
                        function print(){
                        window.print();
                    }
                        <script>

</html>
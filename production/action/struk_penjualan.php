<!DOCTYPE HTML>
<html>
    <head>
        <title>Cetak Struk</title>
    </head>
        <?php
        include "koneksi.php";
        $tampil=mysqli_query($koneksi, "SELECT * FROM tbl_penjualan_det  WHERE id_penjualan='$_GET[id_penjualan]'");
        $data=mysqli_fetch_array($tampil);
        ?>
        <body onload="print()">
            <center>
            <hr>
            <h2> Cetak Struk Penjualan</h2>
            <h3> Helmi Hendra Motor </h3>
            <h4> Jl. RE Martadinata No.00 </h4>
            </center>
            <hr>
            <p>ID. Penjualan : <?php echo"$data[id_penjualan]" ?></p>
            <p align="right">Tanggal : <?php echo date("d-m-Y") ?></p>
            <hr>
            
            <table align="center" border="1px solid">
                <tr>
                <th>Nama Sparepart</th>
                <th>Harga Jual</th>
                <th>Qty</th>
                <th>Harga Total</th>
                <tr>
                <?php 
                    $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_penjualan_det INNER JOIN tbl_sparepart ON tbl_penjualan_det.id_sparepart=tbl_sparepart.id_sparepart WHERE id_penjualan='$_GET[id_penjualan]'");
                    while($data1 = mysqli_fetch_array($tampil1)){
                ?>
                <tr>
                <td><?php echo"$data1[nama_sparepart]" ?></td>
                <td><?php echo"$data1[harga_jual]" ?></td>
                <td><?php echo"$data1[qty]" ?></td>
                <td><?php echo"$data1[harga_total]" ?></td>
                <tr>
                <?php } ?>
            </table>
            <hr>
            <?php 
                $tampil2 = mysqli_query($koneksi, "SELECT * FROM tbl_penjualan_head WHERE id_penjualan = '$_GET[id_penjualan]'");
                $data2 = mysqli_fetch_array($tampil2);
                $tampil4 = mysqli_query($koneksi, "SELECT SUM(harga_total) AS total FROM tbl_penjualan_det WHERE id_penjualan = '$_GET[id_penjualan]'");
                $data4 = mysqli_fetch_array($tampil4);
            ?>
                <p align="right"> Jumlah Bayar : </p> <p align="right"> <?php echo"$data4[total]" ?> </p>
                <p align="right"> Bayar : </p> <p align="right"> <?php echo"$data2[bayar]" ?> </p>
                <p align="right"> Kembalian : </p> <p align="right"> <?php echo"$data2[kembali]" ?> </p>
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
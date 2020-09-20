<?php
  include '../actionkoneksi.php';
?>
<style type="text/css">
  table.table {
    border-collapse: collapse;
  }
  table.table th,td {
    border: 1px solid;
    padding: 5px;
  }
</style>
<div class="box-body">
  <center>
    <h3>Laporan Data Penjualan</h3>
    <h1>Helmi Hendra Motor</h1>
    <hr>
  </center>
  <table class="table table-bordered table-hover" width="100%">
    <thead>
      <tr>
            <th>ID Penjualan</th>
              <th>Tanggal</th>
              <th>Nama Sparepart</th>
              <th>Harga</th>
              <th>Qty</th>
              <th>Harga Total</th>
      </tr>
    </thead>
    <tbody id="data">
      <?php
        $sql = mysqli_query($koneksi,"SELECT * FROM tbl_penjualan_head inner join tbl_penjualan_det on tbl_penjualan_head.id_penjualan=tbl_penjualan_det.id_penjualan where tanggal between '$_GET[tanggal_awal]' and '$_GET[tanggal_akhir]'");
        // $sql2 = mysqli_query($conn,"SELECT sum(total) as jml FROM tb_transaksi where tanggal between '$_GET[tanggal_awal]' and '$_GET[tanggal_akhir]'");
        // $jml = mysqli_fetch_array($sql2);
        while ($data = mysqli_fetch_array($sql)) {
          ?>

      <tr>
        <td><?= $data['id_penjualan']; ?></td>
        <td><?= $data['tanggal']; ?></td>
        <td><?= $data['id_sparepart']; ?></td>
        <td><?= $data['harga']; ?></td>
        <td><?= $data['qty']; ?></td>
        <td><?= $data['harga_total']; ?></td>
      </tr>

          <?php
        }
      ?>
      <tr>
        <td colspan="2"><strong>Total</strong></td>
        <td><?= "Rp. ".number_format($jml['jml']); ?></td>
      </tr>
    </tbody>
  </table>
</div>
<div class="box-footer">
  <table align="right" width="20%">
    <tr>
      <td style="text-align: center; border: none;">Mengetahui,</td>
    </tr>
    <tr>
      <td style="padding: 10px; border: none;"></td>
    </tr>
    <tr>
      <td style="padding: 10px; border: none;"></td>
    </tr>
    <tr>
      <td style="text-align: center; border: none; border-top: 1px solid;"><strong>Mang Aris</strong></td>
    </tr>
  </table>
</div>
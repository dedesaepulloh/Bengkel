<?php
    session_start();
    if(empty($_SESSION['nama']) AND empty($_SESSION['password'])){
        echo "<script>alert('Anda Harus Login Dulu !'); window.location = 'login.php'</script>";
    }else{
  include "template/header-table.php";
  include "action/koneksi.php";
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bengkel <small>Helmi Hendra Motor</small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <form method="post" action="cetak_sparepart_masuk.php">
            <div class="form-group row">
               <label class="control-label col-sm-2">Dari Tanggal</label>
               <div class="col-sm-4">
                 <input type="date" name="tanggal_awal" class="form-control" id="tanggal_awal" required="">
               </div>
               <label class="control-label col-sm-2">Sampai</label>
               <div class="col-sm-4">
                 <input type="date" name="tanggal_akhir" class="form-control" id="tanggal_akhir" required="">
               </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-2"></label>
              <div class="col-sm-2">
                <input type="submit" name="cetak" value="Cetak Laporan" class="btn btn-primary">           
              </div>
            </div>
          </form>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Sparepart Masuk</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>No</th>
                                    <th>No Masuk</th>
                                    <th>Tanggal</th>
                                    <th>Faktur</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Sparepart</th>
                                    <th>Jumlah</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Total</th>

                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                

                                  $i = 0;
                                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_sparepart_masuk inner join tbl_supplier on tbl_sparepart_masuk.id_supplier=tbl_supplier.id_supplier inner join tbl_sparepart on tbl_sparepart_masuk.id_sparepart=tbl_sparepart.id_sparepart");
                                  while($data=mysqli_fetch_array($tampil)){
                                $i++;
                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo "$data[id_masuk]"; ?></td>
                                    <td><?php echo "$data[tanggal]"; ?></td>
                                    <td><?php echo "$data[faktur]"; ?></td>
                                    <td><?php echo "$data[nama_supplier]"; ?></td>
                                    <td><?php echo "$data[nama_sparepart]"; ?></td>
                                    <td><?php echo "$data[jumlah]"; ?></td>
                                    <td><?php echo "$data[harga_beli]"; ?></td>
                                    <td><?php echo "$data[harga_total]"; ?></td>
                                  </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                            </div>
                      </div>
                  </div>
            </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "template/footer.php" ?>
        <!-- /footer content -->
      </div>
    </div>

          </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.php5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>
                                  <?php } ?>
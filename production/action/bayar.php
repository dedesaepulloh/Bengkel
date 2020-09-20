<?php 
  include "koneksi.php";
  include "../template/header-edit.php";
  

  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_service_head inner join tbl_pelanggan on tbl_service_head.id_pelanggan = tbl_pelanggan.id_pelanggan WHERE tbl_service_head.id_service = '$_GET[id_service]'");
  $data = mysqli_fetch_array($tampil);

?>


        <!-- page content -->
        <form method = "POST" action="update_service_head.php" id="pembayaran" data-parsley-validate class="form-horizontal form-label-left">
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Bayar Service</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pembayaran</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a class="dropdown-item" href="#">Settings 1</a>
                          </li>
                          <li><a class="dropdown-item" href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama_pelanggan">Nama <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo "$data[nama_pelanggan]"; ?>" required="required" class="form-control " readonly>
                          <input type="hidden"  name="id_pelanggan" value="<?php echo "$data[id_pelanggan]"; ?>" required="required" class="form-control " readonly>
                          <input type="hidden"  name="id_service" value="<?php echo "$data[id_service]"; ?>" required="required" class="form-control " readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="alamat">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <textarea name="alamat" cols="5" rows="5" class="form-control" readonly><?php echo "$data[alamat]"; ?></textarea>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="type">Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="type" name="type" value="<?php echo "$data[type]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_polisi">No Polisi <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="no_polisi" name="no_polisi" value="<?php echo "$data[no_polisi]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_rangka">No Rangka <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="no_rangka" name="no_rangka" value="<?php echo "$data[no_rangka]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_mesin">No Mesin <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="no_mesin" name="no_mesin" value="<?php echo "$data[no_mesin]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kilometer">No Kilometer <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="number" id="kilometer" name="kilometer" value="<?php echo "$data[kilometer]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="x_content">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_mesin">Jasa <span class="required">*</span>
                          </label>
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="card-box table-responsive">
                                <table id="sementara" class="table table-striped table-bordered" style="width:100%">

                                  <thead>
                                    <tr>
                                      <th>Nama Jasa</th>
                                      <th>Harga</th>
                                    </tr>
                                  </thead>
                                  
                                  <tbody>
                                  <?php 
                                    $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_service_det inner join tbl_jasa on tbl_service_det.id_jasa = tbl_jasa.id_jasa WHERE tbl_service_det.id_service = '$_GET[id_service]'");
                                    while($data1 = mysqli_fetch_array($tampil1)){
                                  ?>
                                  <tr>
                                    <td><?php echo "$data1[nama_jasa]"; ?></td>
                                    <td><?php echo "$data1[harga]"; ?></td>
                                  </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                        </div>
                        <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kilometer">Sub Total Jasa <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <?php 
                          $sql  =  mysqli_query ($koneksi,"SELECT SUM(harga) AS total FROM tbl_service_det WHERE id_service = '$_GET[id_service]' ")  ;
                          $data3 = mysqli_fetch_array ($sql);
                        ?>
                          <input type="text" id="sub_jasa" name="sub_jasa" value="<?php echo "$data3[total]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                  <div class="ln_solid"></div>
                  
                      
                  </div>
                </div>
              </div>
            </div>
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_mesin">Sparepart <span class="required">*</span>
                          </label>
                        <div class="row">
                            <div class="col-sm-12">
                              <div class="card-box table-responsive">
                                <table id="sementara" class="table table-striped table-bordered" style="width:100%">

                                  <thead>
                                    <tr>
                                      <th>Nama Sparepart</th>
                                      <th>Qty</th>
                                      <th>Harga Total</th>
                                    </tr>
                                  </thead>
                                  
                                  <tbody>
                                  <?php 
                                    $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_service_det inner join tbl_sparepart on tbl_service_det.id_sparepart = tbl_sparepart.id_sparepart WHERE tbl_service_det.id_service = '$_GET[id_service]'");
                                    while($data1 = mysqli_fetch_array($tampil1)){
                                  ?>
                                  <tr>
                                    <td><?php echo "$data1[nama_sparepart]"; ?></td>
                                    <td><?php echo "$data1[qty]"; ?></td>
                                    <td><?php echo "$data1[harga_jual]"; ?></td>
                                  </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                        </div>
                        <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="kilometer">Sub Total Sparepart <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                        <?php 
                          $sql  =  mysqli_query ($koneksi,"SELECT SUM(harga_total) AS total FROM tbl_service_det WHERE id_service = '$_GET[id_service]' ")  ;
                          $data4 = mysqli_fetch_array ($sql);
                        ?>
                          <input type="text" id="sub_sparepart" name="sub_sparepart" value="<?php echo "$data4[total]"; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
         
          </div>
        </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_mesin">Total Bayar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="total_bayar" name="total_bayar" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_mesin">Bayar <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="bayar" name="bayar" required="required" class="form-control">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="no_mesin">Kembali <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                          <input type="text" id="kembali" name="kembali" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
						              <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>

        <!-- /page content -->

        <!-- footer content -->
        <?php include "../template/footer.php"; ?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../vendors/moment/min/moment.min.js"></script>
    <script src="../../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="../../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="../../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="../../vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="../../vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="../../vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="../../vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="../vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="../../vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="../../vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../build/js/custom.min.js"></script>

    <script>
            $("#pembayaran").click(function(){
            var jasa = parseInt($("#sub_jasa").val())
            var sparepart = parseInt($("#sub_sparepart").val())
            
            var total = jasa + sparepart;
            $("#total_bayar").attr("value",total)
            
            });

            $("#pembayaran").keyup(function(){
            var total = parseInt($("#total_bayar").val())
            var bayar = parseInt($("#bayar").val())
            
            var kembali = bayar - total;
            $("#kembali").attr("value",kembali)
            
            });
    </script>
	
  </body>
</html>

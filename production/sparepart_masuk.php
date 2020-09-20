<?php
    session_start();
    if(empty($_SESSION['nama']) AND empty($_SESSION['password'])){
        echo "<script>alert('Anda Harus Login Dulu !'); window.location = 'login.php'</script>";
    }else{
  include "template/header-table.php";
  include "action/koneksi.php";

  $sql_no_transaksi = mysqli_query($koneksi,"SELECT max(faktur) as max from tbl_sparepart_masuk");
          $baca_no_transaksi = mysqli_fetch_array($sql_no_transaksi);
          $no_transaksi = $baca_no_transaksi['max'];
          $no_urut = (int) substr($no_transaksi, 3,7);
          $no_urut++;
          $char ="SM";
          $nomor_transaksi = $char.sprintf("%07s",$no_urut);

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

            <div class="clearfix">
            </div>
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
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal Masuk <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <input type="date" id="tanggal" name="tanggal" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="faktur">Faktur <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <input type="text" id="faktur" name="faktur" value="<?php echo $nomor_transaksi; ?>" required="required" class="form-control" readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_supplier">Supplier <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <select name="id_supplier" id="id_supplier" class="form-control">
                            <option value="">-- Pilih --</option>
                            <?php 
                              $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_supplier");
                              while($data1=mysqli_fetch_array($tampil1)){
                            ?> 
                            <option value="<?php echo "$data1[id_supplier]"; ?>"><?php echo "$data1[nama_supplier]"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_sparepart">Sparepart <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                        
                          <table id="sparepart_tambah" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>Nama Sparepart</th>
                                <th>Harga Beli</th>
                                <th>Qty</th>
                                <th>Harga Total</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <select name="sparepart[]" id="id_sparepart" class="form-control"> 
                                      <option value="">Pilih</option>
                                      <?php
                                        $con = mysqli_connect("localhost","root","","bengkel");
                                        $result = mysqli_query($con,"select * from tbl_sparepart");
                                        while($row = mysqli_fetch_assoc($result)){
                                          echo "<option value=$row[id_sparepart]>$row[nama_sparepart]</option>";
                                        } 
                                      ?>
                                    </select>
                                </td>
                                <td><input type="number" id="harga_beli" name="harga_beli" required="required" class="form-control" readonly></td>
                                <td><input type="number" id="qty" name="qty" required="required" class="form-control"> </td>
                                <td><input type="number" id="harga_total" name="harga_total" required="required" class="form-control"> </td>
                              </tr>
                            </tbody>
                          </table>
                          
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                          <button type="button" class="btn btn-info btn-sm" name="tambah" id="tambah">Add</button>
                        </div>
                      </div>
                    <div class="ln_solid"></div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <form method = "POST" action="action/insert_spmasuk.php" id="tsemen" data-parsley-validate class="form-horizontal form-label-left">
                              <table id="sementara" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th>Tanggal Masuk</th>
                                    <th>Faktur</th>
                                    <th>Nama Supplier</th>
                                    <th>Nama Sparepart</th>
                                    <th>Harga Beli</th>
                                    <th>Qty</th>
                                    <th>Harga Total</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>

                                <tbody>
                                
                                </tbody>
                              </table>
                              <div class="clearfix">
                                  <button type="submit" class="btn btn-info btn-sm" name="add" id="submit">Submit</button>
                              </div>
                            </form>
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

    
    <!-- jQuery -->
    <!-- <script src="../vendors/jquery/dist/jquery.js"></script> -->
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


<script>
  $(document).ready(function() {
  
  $("#tambah").click(function() {
    var tanggal = $("#tanggal").val();
    var faktur = $("#faktur").val();
    var supplier = $("#id_supplier").val();
    var nama = $("#id_sparepart").val();
    var harga = $("#harga_beli").val();
    var qty = $("#qty").val();
    var total = $("#harga_total").val();
    var baris_baru = "<tr><td>"+tanggal+"</td><td>"+faktur+"</td><td>"+supplier+"</td><td>"+nama+"</td><td>"+harga+"</td><td>"+qty+"</td><td>"+total+"</td><td><input type='button' class='btn btn-danger btn-sm' onclick='hapus(this)' id='delCol' value='x'></td></tr>";
    $("#sementara").append(baris_baru);
  })

});
$("#tsemen").submit(function(e) {
	var form = this;

	var temporary_tbl = $('table#sementara tbody tr').get().map(function(row) {
		return $(row).find('td').get().map(function(cell) {
			return $(cell).html();
		});
	});

	$("#submit").val(JSON.stringify(temporary_tbl));
});
</script>
<script>
function hapus(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("sementara").deleteRow(i);
}
</script>

    <script type="text/javascript">
      jQuery(function ($) {
        $("#id_sparepart").change(function(){
                
                var id_sparepart=$("#id_sparepart").val()
                console.log(id_sparepart);
            $.ajax({
              type:'GET',
              data:'id_sparepart='+id_sparepart,
              url:'json_sparepart_masuk.php',
              dataType:'json',
              success:function(data){
                for(var i=0; i < data.length; i++){
                  $("#harga_beli").val(data[i].harga_beli)
                }
              }
            });
          });


          });

          $("#sparepart_tambah").keyup(function(){
            var harga = parseInt($("#harga_beli").val())
            var qty = parseInt($("#qty").val())
            
            var total = harga * qty;
            $("#harga_total").attr("value",total)
            
            });
</script>

  </body>
</html>
          <?php } ?>
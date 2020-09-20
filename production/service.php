<?php
    session_start();
    if(empty($_SESSION['nama']) AND empty($_SESSION['password'])){
        echo "<script>alert('Anda Harus Login Dulu !'); window.location = 'login.php'</script>";
    }else{
  include "template/header-table.php";
  include "action/koneksi.php";

  $sql_no_transaksi = mysqli_query($koneksi,"SELECT max(id_service) as max from tbl_service_head");
          $baca_no_transaksi = mysqli_fetch_array($sql_no_transaksi);
          $no_transaksi = $baca_no_transaksi['max'];
          $no_urut = (int) substr($no_transaksi, 3,7);
          $no_urut++;
          $char ="SV";
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
            <form method = "POST" action="action/insert_service.php" id="tservice" data-parsley-validate class="form-horizontal form-label-left">
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transaksi Service</h2>
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
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">No Transaksi <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <input type="text" id="id_service" name="id_service" value="<?= $nomor_transaksi; ?>" required="required" class="form-control " readonly>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Tanggal <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <input type="date" id="tanggal" name="tanggal" required="required" class="form-control ">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">Nama Pelanggan <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <select name="id_pelanggan" id="id_pelanggan" class="form-control ">
                          <option value="">Pilih</option>
                          <?php 
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");
                            while($data=mysqli_fetch_array($tampil)){
                          ?>
                            <option value="<?php echo "$data[id_pelanggan]"; ?>"><?php echo "$data[nama_pelanggan]"; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="tanggal">No Kendaraan <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                          <input type="text" id="no_polisi" name="no_polisi" required="required" class="form-control " readonly>
                        </div>
                      </div>

                      
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_jasa">Jasa <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                        
                          <table id="tambah_jasa" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                              <tr>
                                <th>Nama Jasa</th>
                                <th>Harga</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <select name="jasa[]" id="id_jasa" class="form-control"> 
                                      <option value="">Pilih</option>
                                      <?php
                                        $con = mysqli_connect("localhost","root","","bengkel");
                                        $result = mysqli_query($con,"select * from tbl_jasa");
                                        while($row = mysqli_fetch_assoc($result)){
                                          echo "<option value=$row[id_jasa]>$row[nama_jasa]</option>";
                                        } 
                                      ?>
                                    </select>
                                </td>
                                <td><input type="number" id="harga" name="harga" required="required" class="form-control" readonly></td>
                                <td><button type="button" class="btn btn-info btn-sm" name="add_jasa" id="add_jasa">Add</button> </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="id_sparepart">Sparepart <span class="required">*</span>
                        </label>
                        <div class="col-md-7 col-sm-7 ">
                        
                          <table id="tambah_sparepart" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                              <tr>
                                <th>Nama Sparepart</th>
                                <th>Harga Jual</th>
                                <th>Qty</th>
                                <th>Harga Total</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <select id="id_sparepart" name="id_sparepart" class="form-control"> 
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
                                <td><input type="number" id="harga_jual" name="harga_jual" required="required" class="form-control" readonly></td>
                                <td><input type="number" id="qty" name="qty" required="required" class="form-control"> </td>
                                <td><input type="text" id="harga_total" name="harga_total" required="required" class="form-control"> </td>
                                <td><button type="button" class="btn btn-info btn-sm" name="add_sparepart" id="add_sparepart">Add</button></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-info btn-sm" name="submit" id="submit">Submit</button>
                        </div>
                      </div>
                    <div class="ln_solid"></div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table id="sementara" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                  <tr>
                                    <th>No Transaksi</th>
                                    <th>Tanggal</th>
                                    <th>Nama</th>
                                    <th>No Kendaraan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                <?php 
                                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_service_head inner join tbl_pelanggan on tbl_service_head.id_pelanggan = tbl_pelanggan.id_pelanggan ORDER BY id_service DESC");
                                  while($data = mysqli_fetch_array($tampil)){
                                ?>
                                <tr>
                                  <td><?php echo "$data[id_service]"; ?></td>
                                  <td><?php echo "$data[tanggal]"; ?></td>
                                  <td><?php echo "$data[nama_pelanggan]"; ?></td>
                                  <td><?php echo "$data[no_polisi]"; ?></td>
                                  <td><?php echo "$data[status]"; ?></td>
                                  <td class="project-actions text-center">
                                          <a class="btn btn-success btn-sm" href="action/bayar.php?id_service=<?php echo "$data[id_service]"; ?>">
                                              <i class="fa fa-check-square-o">
                                              </i>
                                              Bayar
                                          </a>
                                          <a class="btn btn-danger btn-sm" href="action/delete_service.php?id_service=<?php echo "$data[id_service]"; ?>">
                                              <i class="fa fa-trash">
                                              </i>
                                              Delete
                                          </a>
                                      </td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                              </table>
                              
                  </div>
                  </div>
                  <table id="sembunyi" class="table table-striped table-bordered" style="width:100%">

                                <thead>
                                  <tr>
                                    <th>id service</th>
                                    <th>id_jasa</th>
                                    <th>id_sparepart</th>
                                    <th>qty</th>
                                    <th>harga_total</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                
                                </tbody>
                              </table>
              </div>
          </form>
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
  
    $("#add_jasa").click(function() {
      var id_jasa = $("#id_jasa").val();
      var harga = $("#harga").val();
      var baris_baru = "<tr><td>"+id_jasa+"</td><td>"+harga+"</td><td><input type='button' class='btn btn-danger btn-sm' onclick='hapus_jasa(this)' id='delCol' value='x'></td></tr>";
      $("#tambah_jasa").append(baris_baru);
    })
    $("#add_sparepart").click(function() {
      var id_sparepart = $("#id_sparepart").val();
      var harga = $("#harga_jual").val();
      var qty = $("#qty").val();
      var total = $("#harga_total").val();
      var baris_baru = "<tr><td>"+id_sparepart+"</td><td>"+harga+"</td><td>"+qty+"</td><td>"+total+"</td><td><input type='button' class='btn btn-danger btn-sm' onclick='hapus_sparepart(this)' id='delCol' value='x'></td></tr>";
      $("#tambah_sparepart").append(baris_baru);
    })
    
    $("#add_sparepart").click(function() {
      var id_service = $("#id_service").val();
      var id_jasa = $("#id_jasa").val();
      var id_sparepart = $("#id_sparepart").val();
      var qty = $("#qty").val();
      var total = $("#harga_total").val();
      var baris_baru = "<tr><td>"+id_service+"</td><td>"+id_jasa+"</td><td>"+id_sparepart+"</td><td>"+qty+"</td><td>"+total+"</td></tr>";
      $("#sembunyi").append(baris_baru);
    })

  });
$("#tservice").submit(function(e) {
	var form = this;

	var temporary_tbl = $('table#sembunyi tbody tr').get().map(function(row) {
		return $(row).find('td').get().map(function(cell) {
			return $(cell).html();
		});
	});

	$("#submit").val(JSON.stringify(temporary_tbl));
});

</script>
<script>
function hapus_jasa(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("tambah_jasa").deleteRow(i);
}
function hapus_sparepart(r) {
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("tambah_sparepart").deleteRow(i);
}
</script>

    <script type="text/javascript">
      jQuery(function ($) {
        $("#id_pelanggan").change(function(){
                
                var id_pelanggan=$("#id_pelanggan").val()
                console.log(id_pelanggan);
            $.ajax({
              type:'GET',
              data:'id_pelanggan='+id_pelanggan,
              url:'json_pelanggan.php',
              dataType:'json',
              success:function(data){
                for(var i=0; i < data.length; i++){
                  $("#no_polisi").val(data[i].no_polisi)
                }
              }
            });
          });
        $("#id_jasa").change(function(){
                
                var id_jasa=$("#id_jasa").val()
                console.log(id_jasa);
            $.ajax({
              type:'GET',
              data:'id_jasa='+id_jasa,
              url:'json_jasa.php',
              dataType:'json',
              success:function(data){
                for(var i=0; i < data.length; i++){
                  $("#harga").val(data[i].harga)
                }
              }
            });
          });
        $("#id_sparepart").change(function(){
                
                var id_sparepart=$("#id_sparepart").val()
                console.log(id_sparepart);
            $.ajax({
              type:'GET',
              data:'id_sparepart='+id_sparepart,
              url:'json_sparepart.php',
              dataType:'json',
              success:function(data){
                for(var i=0; i < data.length; i++){
                  $("#harga_jual").val(data[i].harga_jual)
                }
              }
            });
          });
        


          });

          $("#tambah_sparepart").keyup(function(){
            var harga = parseInt($("#harga_jual").val())
            var qty = parseInt($("#qty").val())
            
            var total = harga * qty;
            $("#harga_total").attr("value",total)
            
            });
</script>

  </body>
</html>
          <?php } ?>
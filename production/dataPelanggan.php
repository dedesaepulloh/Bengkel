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

            <div class="clearfix">
            <button type="button" class="btn btn-info" id="create" data-toggle="modal" data-target="#modal-lg"><i class="fa fa-plus-square"></i> Tambah</button>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Data Pelanggan</h2>
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
                                    <th>Tanggal</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Type</th>
                                    <th>No Polisi</th>
                                    <th>No Rangka</th>
                                    <th>No Mesin</th>
                                    <th>Kilometer</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php 
                                  $i = 0;
                                  $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_pelanggan");
                                  while($data=mysqli_fetch_array($tampil)){
                                $i++;
                                ?>
                                  <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo "$data[tanggal]"; ?></td>
                                    <td><?php echo "$data[nama_pelanggan]"; ?></td>
                                    <td><?php echo "$data[telepon]"; ?></td>
                                    <td><?php echo "$data[alamat]"; ?></td>
                                    <td><?php echo "$data[type]"; ?></td>
                                    <td><?php echo "$data[no_polisi]"; ?></td>
                                    <td><?php echo "$data[no_rangka]"; ?></td>
                                    <td><?php echo "$data[no_mesin]"; ?></td>
                                    <td><?php echo "$data[kilometer]"; ?></td>
                                    <td class="project-actions text-center">
                                        <a class="btn btn-info btn-sm" href="action/edit_pelanggan.php?id_pelanggan=<?php echo "$data[id_pelanggan]"; ?>">
                                            <i class="fa fa-edit">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="action/delete_pelanggan.php?id_pelanggan=<?php echo "$data[id_pelanggan]"; ?>">
                                            <i class="fa fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                        <a class="btn btn-success btn-sm" href="action/delete_pelanggan.php?id_pelanggan=<?php echo "$data[id_pelanggan]"; ?>">
                                            <i class="fa fa-notes">
                                            </i>
                                            Service
                                        </a>
                                    </td>
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

    <div class="modal fade" id="modal-lg">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Tambah Pelanggan</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form role="form" method="POST" action="action/insert_pelanggan.php" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for=>Nama Pelanggan</label>
                        <input type="text" class="form-control" name="nama_pelanggan" placeholder="Nama Pelanggan">
                      </div>
                      <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" name="telepon" placeholder="Telepon">
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" id="alamat" cols="5" rows="5" class="form-control" placeholder="Alamat"></textarea>
                      </div>
                      <div class="form-group">
                        <label for=>Type Motor</label>
                        <input type="text" class="form-control" name="type" placeholder="Type Motor">
                      </div>
                      <div class="form-group">
                        <label for=>No Polisi</label>
                        <input type="text" class="form-control" name="no_polisi" placeholder="No Polisi">
                      </div>
                      <div class="form-group">
                        <label for=>No Rangka</label>
                        <input type="text" class="form-control" name="no_rangka" placeholder="No Rangka">
                      </div>
                      <div class="form-group">
                        <label for=>No Mesin</label>
                        <input type="text" class="form-control" name="no_mesin" placeholder="No Mesin">
                      </div>
                      <div class="form-group">
                        <label for=>Kilometer</label>
                        <input type="number" class="form-control" name="kilometer" placeholder="Kilometer">
                      </div>
                      
                    <!-- /.card-body -->
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                    </div>
                  </form>
                </div>
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
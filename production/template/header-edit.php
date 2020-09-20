<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  
    <title>Bengkel</title>

    <!-- Bootstrap -->
    <link href="../../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="../../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../../vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="../index.php" class="site_title"><i class="fa fa-lastfm"></i> <span>Bengkel</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="../images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>Dede Saepulloh</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="../index.php"><i class="fa fa-home"></i> Home </a></li>
                  <li><a><i class="fa fa-book"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="../dataJasa.php"><i class="fa fa-gavel"></i> Data Jasa</a>
                      <li><a href="../dataPelanggan.php"><i class="fa fa-users"></i> Data Pelanggan</a></li>
                      <li><a href="../dataSparepart.php"><i class="fa fa-cogs"></i> Data Sparepart</a></li>
                      <li><a href="../dataSupplier.php"><i class="fa fa-cube"></i> Data Supplier</a></li>
                      <li><a href="../dataUser.php"><i class="fa fa-user"></i> Data User</a>
                    </ul>
                    <li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="../penjualan.php"><i class="fa fa-shopping-cart"></i>Penjualan</a></li>
                        <li><a href="../service.php"><i class="fa fa-gear"></i>Service</a></li>
                        <li><a href="../sparepart_masuk.php"><i class="fa fa-inbox"></i>Sparepart Masuk</a></li>
                      </ul>
                      <li><a><i class="fa fa-file-text"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="laporan_sparepart.php" target="_blank"><i class="fa fa-cogs"></i>Laporan Data Sparepart</a></li>
                          <li><a href="laporan_penjualan.php" ><i class="fa fa-shopping-cart"></i>Laporan Penjualan</a></li>
                          <li><a href="laporan_service.php" ><i class="fa fa-gear"></i>Laporan Service</a></li>
                          <li><a href="laporan_sparepart_masuk.php"><i class="fa fa-inbox"></i>Laporan Sparepart Masuk</a></li>
                        </ul> 
                  </ul>
                </div>
              </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="../images/img.jpg" alt="">Dede Saepulloh
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                      <a class="dropdown-item"  href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                  <a class="dropdown-item"  href="javascript:;">Help</a>
                    <a class="dropdown-item"  href="login.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
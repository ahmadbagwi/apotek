<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/font-awesome/css/'); ?>font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/ionicons/css/'); ?>ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/jvectormap/'); ?>jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/'); ?>AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url('assets/adminlte/dist/css/skins/'); ?>_all-skins.min.css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<title>Apotek Budi Farma</title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">

      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Budi Farma</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Apotek Budi Farma</span>
          </a>

          <!-- Header Navbar: style can be found in header.less -->
          <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
              <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o"></i>
                    <span class="label label-success">4</span>
                  </a>

                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?php echo base_url('assets/adminlte/dist'); ?>/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">Alexander Pierce</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="<?php echo base_url('assets/adminlte/dist'); ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                      <p>
                        Ahmad Bagwi - Web Developer
                        <small>Member since Nov. 2018</small>
                      </p>
                    </li>
                    <!-- Menu Body -->

                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo base_url('User/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <li>
                  <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
              </ul>
            </div>

          </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
          <!-- sidebar: style can be found in sidebar.less -->
          <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
              <div class="pull-left image">
                <img src="<?php echo base_url('assets/adminlte/dist'); ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image">
              </div>
              <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
              </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                  <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
              <li class="header">MAIN NAVIGATION</li>
              <li class="active treeview menu-open">
                <a href="#">
                  <i class="fa fa-dashboard"></i> <span>Produk</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="index.html"><i class="fa fa-circle-o"></i> Produk Masuk</a></li>
                  <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Stok Produk</a></li>
                </ul>
              </li>
              <li class="treeview">
                <a href="#">
                  <i class="fa fa-files-o"></i>
                  <span>Laporan</span>
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">4</span>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Laporan harian</a></li>
                  <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Laporan mingguan</a></li>
                  <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Laporan bulanan</a></li>
                </ul>
              </li>
              <li>
                <a href="pages/widgets.html">
                  <i class="fa fa-th"></i> <span>Pengaturan</span>
                  <span class="pull-right-container">
                    <small class="label pull-right bg-green">new</small>
                  </span>
                </a>
              </li>
            </ul>
          </section>
          <!-- /.sidebar -->
        </aside>
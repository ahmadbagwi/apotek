<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            $idadmin = $_SESSION['user_id'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title." | POS Apotek Budi Farma"; ?></title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/template/'); ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/template/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url('assets/template/'); ?>vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/template/'); ?>css/sb-admin.css" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>material-fullpalette.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>jquery-ui.css">
    <script src="<?php echo base_url('assets/js/'); ?>jquery-3.3.1.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/'); ?>bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>material.min.js"></script>

  </head>
  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('assets/images/')."6cfa16cb13331e34aa6efbe2b5b48655.png";?>" height="55px" width="auto"><?php echo " ".$_SESSION['username']; ?></a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
      <div class="col-md-9">
        <a href="<?php echo base_url('penjualan'); ?>"><i class="fas fa-cart-plus fa-2x"></i></a>&emsp; 
        <a href="<?php echo base_url('PembatalanTransaksi'); ?>"><i class="fas fa-history fa-2x"></i><a>&emsp;
        <a href="<?php echo base_url('laporan/detailHarian'); ?>"><i class="fas fa-list-ol fa-2x"></i><a>
      </div>
      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?php echo base_url('User/logout'); ?>" data-toggle="" data-target="">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

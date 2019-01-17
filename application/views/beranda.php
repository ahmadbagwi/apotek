<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            $idadmin = $_SESSION['user_id'];
        }
    }
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Beranda | Apotek Budi Farma</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>material-fullpalette.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>jquery-ui.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="<?php echo base_url('assets/js/'); ?>jquery-3.3.1.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/'); ?>bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>material.min.js"></script>
</head>
<body>
	<div class="container">
    <div class="col-md-10 col-md-offset-1">
		<div class="row jumbotron" style="text-align: center;">
			<h2>Sistem Penjualan Apotek Budi Farma</h2>
            <p>Jl. Raya Tajur No. 287A</p>
		</div>
		<div class="row jumbotron">
				<div class="col-md-12">
                    <div class="header" style="text-align: center;">
					<i class="fas fa-lock"></i> Halaman Beranda Admin 
                    <i class="fas fa-user"></i> <?php echo $_SESSION['username'];?> 
                    <i class="fas fa-calendar-alt"> </i> <?php echo date('Y-m-d'); ?>
                    </div>
					<table style="width: 100%; text-align: center;" class="table">
                        <thead class="thead-light">
                            <tr>
                                <td></td>
                                <td><h4><strong>Transaksi</strong></h4></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="<?php echo site_url('penjualan') ?>" target="_blank"><i class="fas fa-cart-plus fa-3x"></i></a><br>Penjualan</td>
                                <td><a href="<?php echo site_url('nota') ?>" target="_blank"><i class="fas fa-list fa-3x"></i></a><br>Transaksi Terakhir</td>
                                <td><a href="<?php echo site_url('laporan/detailHarian') ?>" target="_blank"><i class="fas fa-list-ol fa-3x"></i></a><br>Detail Harian</td>
                            </tr>
                        <thead class="thead-light">
                            <tr>
                                <td></td>
                                <td><h4><strong>Produk</strong></h4></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="<?php echo site_url('stok') ?>" target="_blank"><i class="fas fa-clipboard-list fa-3x"></i></a><br>Daftar Produk</td>
                                <td><a href="<?php echo site_url('stok/create') ?>" target="_blank"><i class="fas fa-plus fa-3x"></i></a><br>Tambah</td>
                                <td onclick="return alert('belum tersedia')"><a href="#"><i class="fas fa-download fa-3x"></i></a><br>Barang Masuk</td>
                            </tr>
                        </tbody>
                        <thead class="thead-light">
                            <tr>
                                <td></td>
                                <td><h4><strong>Laporan</strong></h4></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="<?php echo site_url('laporan/labaBulanan') ?>" target="_blank"><i class="fas fa-th-list fa-3x"></i></a><br>Laporan Bulanan</td>
                                <td><a href="<?php echo site_url('laporan/labaHarian') ?>" target="_blank"><i class="fas fa-list-ul fa-3x"></i><br>Laporan Harian</td>
                                <td onclick="return alert('belum tersedia')"><a href="#"><i class="fas fa-list-ol fa-3x"></i></a><br>Daftar Barang Masuk</td>
                            </tr>
                        </tbody>
                    </table>
                        <div class="footer">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <tr>
                                        <td>&copy; Apotek Budi Farma 2019</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div><!--div-col-12-->
            <!--</form>form-->
	    </div><!--row jumbotron-->
    </div>
    </div><!--container-->    
</body>
</html>
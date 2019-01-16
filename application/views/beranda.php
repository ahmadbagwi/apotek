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
    <div class="col-md-8 col-md-offset-2">
		<div class="jumbotron">
			<h2>Apotek Budi Farma<small> | Jl Raya Tajur</small></h2>
			<p><a class="btn btn-primary btn-lg" href="#"><?php echo "Ahmad Bagwi | Shift 1"; ?> </a> 081288888888</p>
		</div>
		<div class="row jumbotron">
				<div class="col-md-12">
					<legend>Halaman Beranda Admin Apotek Budi Farma | <?php echo date('Y-m-d | h:i:j'); ?></legend>
					<table style="width: 100%; text-align: center;" class="table">
                        <thead class="thead-light">
                            <tr>
                                <td></td>
                                <td><strong>Transaksi</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><a href="<?php echo site_url('penjualan') ?>"><i class="fas fa-cart-plus fa-3x"></i></a><br>Penjualan</td>
                                <td><i class="fas fa-list fa-3x"></i><br>Transaksi Terakhir</td>
                                <td><i class="fas fa-list-ol fa-3x"></i><br>Detail Harian</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%; text-align: center;" class="table">
                        <thead class="thead-light">
                            <tr>
                                <td></td>
                                <td><strong>Produk</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-clipboard-list fa-3x"></i><br>Daftar Produk</td>
                                <td><i class="fas fa-plus fa-3x"></i><br>Tambah</td>
                                <td><i class="fas fa-download fa-3x"></i><br>Barang Masuk</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 100%; text-align: center;" class="table">
                        <thead class="thead-light">
                            <tr>
                                <td></td>
                                <td><strong>Laporan</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-th-list fa-3x"></i><br>Laporan Bulanan</td>
                                <td><i class="fas fa-list-ul fa-3x"></i><br>Laporan Harian</td>
                                <td><i class="fas fa-list-ol fa-3x"></i><br>Detail Harian</td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--div-col-12-->
            <!--</form>form-->
	    </div><!--row jumbotron-->
    </div>
    </div><!--container-->    
</body>
</html>
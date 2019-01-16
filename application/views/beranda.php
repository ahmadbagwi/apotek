<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            echo "anda user biasa 0"."<br>";
            $idadmin = $_SESSION['user_id'];
            echo $idadmin."<br>";
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
    <script src="<?php echo base_url('assets/js/'); ?>jquery-3.3.1.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/'); ?>bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>material.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2>Apotek Budi Farma<small> | Jl Raya Tajur</small></h2>
			<p><a class="btn btn-primary btn-lg" href="#"><?php echo "Ahmad Bagwi | Shift 1"; ?> </a> 081288888888</p>
		</div>
		<div class="row jumbotron"
				<div class="col-md-12">
					<fieldset><legend>Halaman Beranda Admin Apotek Budi Farma | <?php echo date('Y-m-d | h:i:j'); ?></legend>
					 <table style="width: 100%" class="table">
                        <tbody>
                            <tr>
                                <td></td>
                                <td>Transaksi</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Penjualan</td>
                                <td>Transaksi Terakhir</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div><!--div-col-12-->
            <!--</form>form-->
	    </div><!--row jumbotron-->
    	<div class="row">
    </div><!--container-->    
</body>
</html>
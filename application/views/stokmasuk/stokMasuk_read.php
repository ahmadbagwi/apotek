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
<!doctype html>
<html>
    <head>
        <title>Detail Transaksi Stok Masuk | Apotek Budi Farma</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>material-fullpalette.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>jquery-ui.css">
        <script src="<?php echo base_url('assets/js/'); ?>jquery-3.3.1.js"></script>
        <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
        <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/'); ?>bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/js/'); ?>material.min.js"></script>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="row jumbotron">
                    <h2 style="margin-top:0px">Detail Transaksi Stok Masuk</h2>
                    <table class="table">
            	    <tr><td>IdUser</td><td><?php echo $idUser; ?></td></tr>
            	    <tr><td>IdSuplier</td><td><?php echo $idSuplier; ?></td></tr>
            	    <tr><td>NamaProduk</td><td><?php echo $namaProduk; ?></td></tr>
            	    <tr><td>IdProduk</td><td><?php echo $idProduk; ?></td></tr>
            	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
            	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
            	    <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
            	    <tr><td></td><td><a href="<?php echo site_url('stokmasuk') ?>" class="btn btn-default">Cancel</a></td></tr>
            	    </table>
                </div>
            </div>
        </div>
    </body>
</html>
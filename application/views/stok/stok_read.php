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
        <title>Produk Detail | Apotek Budi Farma</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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
            <div class="col-md-12">
                <div class="row jumbotron">
                    <legend>Produk Detail | Apotek Budi Farma</legend>
                    <table class="table table-striped">
            	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
            	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
            	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
            	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
            	    <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
            	    <tr><td>Jual</td><td><?php echo $jual; ?></td></tr>
            	    <tr><td>Dibuat</td><td><?php echo $dibuat; ?></td></tr>
            	    <tr><td></td><td><a href="<?php echo site_url('stok') ?>" class="btn btn-default">Kembali</a></td></tr>
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
                </div>
            </div>
        </div>
    </body>
</html>
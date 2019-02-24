<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">BarangMasuk Read</h2>
        <table class="table">
	    <tr><td>IdUser</td><td><?php echo $idUser; ?></td></tr>
	    <tr><td>NamaSuplier</td><td><?php echo $namaSuplier; ?></td></tr>
	    <tr><td>IdProduk</td><td><?php echo $idProduk; ?></td></tr>
	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
	    <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barangmasuk') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
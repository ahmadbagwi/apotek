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
        <h2 style="margin-top:0px">Stok Read</h2>
        <table class="table">
	    <tr><td>Nama</td><td><?php echo $nama; ?></td></tr>
	    <tr><td>Kategori</td><td><?php echo $kategori; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
	    <tr><td>Jual</td><td><?php echo $jual; ?></td></tr>
	    <tr><td>Dibuat</td><td><?php echo $dibuat; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('stok') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
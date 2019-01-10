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
        <h2 style="margin-top:0px">Stok <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama <?php echo form_error('nama') ?></label>
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kategori <?php echo form_error('kategori') ?></label>
            <input type="text" class="form-control" name="kategori" id="kategori" placeholder="Kategori" value="<?php echo $kategori; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Deskripsi <?php echo form_error('deskripsi') ?></label>
            <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi" value="<?php echo $deskripsi; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stok <?php echo form_error('stok') ?></label>
            <input type="text" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo $stok; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Modal <?php echo form_error('modal') ?></label>
            <input type="text" class="form-control" name="modal" id="modal" placeholder="Modal" value="<?php echo $modal; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jual <?php echo form_error('jual') ?></label>
            <input type="text" class="form-control" name="jual" id="jual" placeholder="Jual" value="<?php echo $jual; ?>" />
        </div>
	    <div class="form-group">
            <label for="timestamp">Dibuat <?php echo form_error('dibuat') ?></label>
            <input type="text" class="form-control" name="dibuat" id="dibuat" placeholder="Dibuat" value="<?php echo $dibuat; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('stok') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
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
        <title>Buat/Edit Produk | Apotek Budi Farma</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>bootstrap.min.css">
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
            <div class="col-md-10 col-md-offset-1">
                <div class="row jumbotron">
                        <legend>Tambah Produk | Apotek Budi Farma</legend>
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
                                <input type="text" class="form-control" name="dibuat" id="dibuat" placeholder="Dibuat" value="<?php echo date('Y-m-d H:i:j') ?>" />
                            </div>
                    	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    	    <button type="submit" class="btn btn-primary"><?php echo "Buat Produk" ?></button> 
                    	    <a href="<?php echo site_url('stok') ?>" class="btn btn-default">Kembali</a>
                    	</form>
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
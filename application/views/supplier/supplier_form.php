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
        <title>Buat Supplier</title>
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
                    <h2 style="margin-top:0px">Tambah/Edit Supplier <?php echo $button ?></h2>
                    <form action="<?php echo $action; ?>" method="post">
            	    <div class="form-group">
                        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Hp <?php echo form_error('hp') ?></label>
                        <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
                    </div>
            	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            	    <a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a>
            	   </form>
                </div>
            </div>
        </div>
    </body>
</html>
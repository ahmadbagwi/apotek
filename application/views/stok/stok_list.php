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
        <title>Daftar Produk | Apotek Budi Farma</title>
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
            <div class="row jumbotron">
                <div class="col-md-12">
                    <legend>Daftar Produk | Apotek Budi Farma</legend>
                        <div class="col-md-12 text-right">
                            <form action="<?php echo site_url('stok/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('stok'); ?>" class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                        ?>
                                      <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <table style="width: 100%" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah Stok</th>
                                    <th>Harga Modal</th>
                                    <th>Harga Jual</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-details">
                                </tr><?php
                                foreach ($stok_data as $stok)
                                {
                                    ?>
                                    <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $stok->nama ?></td>
                                <td><?php echo $stok->kategori ?></td>
                                <td><?php echo $stok->deskripsi ?></td>
                                <td><?php echo $stok->stok ?></td>
                                <td><?php echo $stok->modal ?></td>
                                <td><?php echo $stok->jual ?></td>
                                <td><?php echo $stok->dibuat ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php 
                                    echo anchor(site_url('stok/read/'.$stok->id),'Read'); 
                                    echo ' | '; 
                                    echo anchor(site_url('stok/update/'.$stok->id),'Update'); 
                                    echo ' | '; 
                                    echo anchor(site_url('stok/delete/'.$stok->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                                    <?php
                                }
                                ?>
                        </table>
                            <div class="row" style="margin-bottom: 10px">
                                <div class="col-md-4">
                                    <?php echo anchor(site_url('stok/create'),'Baru', 'class="btn btn-primary"'); ?>
                                </div>
                                <div class="col-md-4 text-center">
                                    <div style="margin-top: 8px" id="message">
                                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                                </div>
                            </div>
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary">Total Produk : <?php echo $total_rows ?></a>
                    		<?php echo anchor(site_url('stok/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                    	       </div>
                                <div class="col-md-6 text-right">
                                    <?php echo $pagination ?>
                                </div>
                            </div>
                </div> 
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
    </body>
</html>
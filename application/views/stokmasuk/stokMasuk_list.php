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
        <title>Daftar Transaksi Stok Masuk | Apotek Budi Farma</title>
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
                    <h2 style="margin-top:0px">Daftar Transaksi Stok Masuk</h2>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('stokmasuk/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('stokmasuk/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('stokmasuk'); ?>" class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                        ?>
                                      <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-bordered" style="margin-bottom: 10px">
                        <tr>
                            <th>No</th>
            		<th>IdUser</th>
            		<th>IdSuplier</th>
            		<th>NamaProduk</th>
            		<th>IdProduk</th>
            		<th>Tanggal</th>
            		<th>Jumlah</th>
            		<th>Modal</th>
            		<th>Action</th>
                        </tr><?php
                        foreach ($stokmasuk_data as $stokmasuk)
                        {
                            ?>
                            <tr>
            			<td width="80px"><?php echo ++$start ?></td>
            			<td><?php echo $stokmasuk->idUser ?></td>
            			<td><?php echo $stokmasuk->idSuplier ?></td>
            			<td><?php echo $stokmasuk->namaProduk ?></td>
            			<td><?php echo $stokmasuk->idProduk ?></td>
            			<td><?php echo $stokmasuk->tanggal ?></td>
            			<td><?php echo $stokmasuk->jumlah ?></td>
            			<td><?php echo $stokmasuk->modal ?></td>
            			<td style="text-align:center" width="200px">
            				<?php 
            				echo anchor(site_url('stokmasuk/read/'.$stokmasuk->id),'Read'); 
            				echo ' | '; 
            				echo anchor(site_url('stokmasuk/update/'.$stokmasuk->id),'Update'); 
            				echo ' | '; 
            				echo anchor(site_url('stokmasuk/delete/'.$stokmasuk->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            				?>
            			</td>
            		</tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
            		<?php echo anchor(site_url('stokmasuk/excel'), 'Excel', 'class="btn btn-primary"'); ?>
            	    </div>
                        <div class="col-md-6 text-right">
                            <?php echo $pagination ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
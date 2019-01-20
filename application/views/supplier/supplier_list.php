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
        <title>Daftar Supplier | Apotek Budi Farma</title>
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
                    <h2 style="margin-top:0px">Daftar Supplier</h2>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('supplier/create'),'Create', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('supplier/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('supplier'); ?>" class="btn btn-default">Reset</a>
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
            		<th>Nama</th>
            		<th>Alamat</th>
            		<th>Hp</th>
            		<th>Jenis</th>
            		<th>Action</th>
                        </tr><?php
                        foreach ($supplier_data as $supplier)
                        {
                            ?>
                            <tr>
            			<td width="80px"><?php echo ++$start ?></td>
            			<td><?php echo $supplier->nama ?></td>
            			<td><?php echo $supplier->alamat ?></td>
            			<td><?php echo $supplier->hp ?></td>
            			<td><?php echo $supplier->jenis ?></td>
            			<td style="text-align:center" width="200px">
            				<?php 
            				echo anchor(site_url('supplier/read/'.$supplier->id),'Read'); 
            				echo ' | '; 
            				echo anchor(site_url('supplier/update/'.$supplier->id),'Update'); 
            				echo ' | '; 
            				echo anchor(site_url('supplier/delete/'.$supplier->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
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
        <h2 style="margin-top:0px">Transaction List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('transaksi_kontrol/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('transaksi_kontrol/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('transaksi_kontrol'); ?>" class="btn btn-default">Reset</a>
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
		<th>Transaction Date</th>
		<th>Transaction Type</th>
		<th>Id User</th>
		<th>Transaction Customer</th>
		<th>Id Product</th>
		<th>Stock Price</th>
		<th>Product Price</th>
		<th>Transaction Qty</th>
		<th>Action</th>
            </tr><?php
            foreach ($transaksi_kontrol_data as $transaksi_kontrol)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $transaksi_kontrol->transaction_date ?></td>
			<td><?php echo $transaksi_kontrol->transaction_type ?></td>
			<td><?php echo $transaksi_kontrol->id_user ?></td>
			<td><?php echo $transaksi_kontrol->transaction_customer ?></td>
			<td><?php echo $transaksi_kontrol->id_product ?></td>
			<td><?php echo $transaksi_kontrol->stock_price ?></td>
			<td><?php echo $transaksi_kontrol->product_price ?></td>
			<td><?php echo $transaksi_kontrol->transaction_qty ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('transaksi_kontrol/read/'.$transaksi_kontrol->id_transaction),'Read'); 
				echo ' | '; 
				echo anchor(site_url('transaksi_kontrol/update/'.$transaksi_kontrol->id_transaction),'Update'); 
				echo ' | '; 
				echo anchor(site_url('transaksi_kontrol/delete/'.$transaksi_kontrol->id_transaction),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
		<?php echo anchor(site_url('transaksi_kontrol/excel'), 'Excel', 'class="btn btn-primary"'); ?>
	    </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>
    </body>
</html>
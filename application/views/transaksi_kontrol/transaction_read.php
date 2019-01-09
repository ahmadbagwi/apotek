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
        <h2 style="margin-top:0px">Transaction Read</h2>
        <table class="table">
	    <tr><td>Transaction Date</td><td><?php echo $transaction_date; ?></td></tr>
	    <tr><td>Transaction Type</td><td><?php echo $transaction_type; ?></td></tr>
	    <tr><td>Id User</td><td><?php echo $id_user; ?></td></tr>
	    <tr><td>Transaction Customer</td><td><?php echo $transaction_customer; ?></td></tr>
	    <tr><td>Id Product</td><td><?php echo $id_product; ?></td></tr>
	    <tr><td>Stock Price</td><td><?php echo $stock_price; ?></td></tr>
	    <tr><td>Product Price</td><td><?php echo $product_price; ?></td></tr>
	    <tr><td>Transaction Qty</td><td><?php echo $transaction_qty; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi_kontrol') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
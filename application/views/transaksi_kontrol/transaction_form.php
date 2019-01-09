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
        <h2 style="margin-top:0px">Transaction <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="timestamp">Transaction Date <?php echo form_error('transaction_date') ?></label>
            <input type="text" class="form-control" name="transaction_date" id="transaction_date" placeholder="Transaction Date" value="<?php echo $transaction_date; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Transaction Type <?php echo form_error('transaction_type') ?></label>
            <input type="text" class="form-control" name="transaction_type" id="transaction_type" placeholder="Transaction Type" value="<?php echo $transaction_type; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id User <?php echo form_error('id_user') ?></label>
            <input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Transaction Customer <?php echo form_error('transaction_customer') ?></label>
            <input type="text" class="form-control" name="transaction_customer" id="transaction_customer" placeholder="Transaction Customer" value="<?php echo $transaction_customer; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Product <?php echo form_error('id_product') ?></label>
            <input type="text" class="form-control" name="id_product" id="id_product" placeholder="Id Product" value="<?php echo $id_product; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Stock Price <?php echo form_error('stock_price') ?></label>
            <input type="text" class="form-control" name="stock_price" id="stock_price" placeholder="Stock Price" value="<?php echo $stock_price; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Product Price <?php echo form_error('product_price') ?></label>
            <input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product Price" value="<?php echo $product_price; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Transaction Qty <?php echo form_error('transaction_qty') ?></label>
            <input type="text" class="form-control" name="transaction_qty" id="transaction_qty" placeholder="Transaction Qty" value="<?php echo $transaction_qty; ?>" />
        </div>
	    <input type="hidden" name="id_transaction" value="<?php echo $id_transaction; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi_kontrol') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
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
        <h2 style="margin-top:0px">Product Read</h2>
        <table class="table">
	    <tr><td>Product Name</td><td><?php echo $product_name; ?></td></tr>
	    <tr><td>Product Category</td><td><?php echo $product_category; ?></td></tr>
	    <tr><td>Product Description</td><td><?php echo $product_description; ?></td></tr>
	    <tr><td>Product Stock</td><td><?php echo $product_stock; ?></td></tr>
	    <tr><td>Stock Price</td><td><?php echo $stock_price; ?></td></tr>
	    <tr><td>Product Price</td><td><?php echo $product_price; ?></td></tr>
	    <tr><td>Created</td><td><?php echo $created; ?></td></tr>
	    <tr><td>Update</td><td><?php echo $update; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>
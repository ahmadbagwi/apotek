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
        <h2 style="margin-top:0px">Product <?php echo $button ?></h2>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Product Name <?php echo form_error('product_name') ?></label>
            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="<?php echo $product_name; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Product Category <?php echo form_error('product_category') ?></label>
            <input type="text" class="form-control" name="product_category" id="product_category" placeholder="Product Category" value="<?php echo $product_category; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Product Description <?php echo form_error('product_description') ?></label>
            <input type="text" class="form-control" name="product_description" id="product_description" placeholder="Product Description" value="<?php echo $product_description; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Product Stock <?php echo form_error('product_stock') ?></label>
            <input type="text" class="form-control" name="product_stock" id="product_stock" placeholder="Product Stock" value="<?php echo $product_stock; ?>" />
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
            <label for="timestamp">Created <?php echo form_error('created') ?></label>
            <input type="text" class="form-control" name="created" id="created" placeholder="Created" value="<?php echo $created; ?>" />
        </div>
	    <div class="form-group">
            <label for="datetime">Update <?php echo form_error('update') ?></label>
            <input type="text" class="form-control" name="update" id="update" placeholder="Update" value="<?php echo $update; ?>" />
        </div>
	    <input type="hidden" name="id_product" value="<?php echo $id_product; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('product') ?>" class="btn btn-default">Cancel</a>
	</form>
    </body>
</html>
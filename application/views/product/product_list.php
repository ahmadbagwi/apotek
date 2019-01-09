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
        <h2 style="margin-top:0px">Product List</h2>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('product/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('product/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('product'); ?>" class="btn btn-default">Reset</a>
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
		<th>Product Name</th>
		<th>Product Category</th>
		<th>Product Description</th>
		<th>Product Stock</th>
		<th>Stock Price</th>
		<th>Product Price</th>
		<th>Created</th>
		<th>Update</th>
		<th>Action</th>
            </tr><?php
            foreach ($product_data as $product)
            {
                ?>
                <tr>
			<td width="80px"><?php echo ++$start ?></td>
			<td><?php echo $product->product_name ?></td>
			<td><?php echo $product->product_category ?></td>
			<td><?php echo $product->product_description ?></td>
			<td><?php echo $product->product_stock ?></td>
			<td><?php echo $product->stock_price ?></td>
			<td><?php echo $product->product_price ?></td>
			<td><?php echo $product->created ?></td>
			<td><?php echo $product->update ?></td>
			<td style="text-align:center" width="200px">
				<?php 
				echo anchor(site_url('product/read/'.$product->id_product),'Read'); 
				echo ' | '; 
				echo anchor(site_url('product/update/'.$product->id_product),'Update'); 
				echo ' | '; 
				echo anchor(site_url('product/delete/'.$product->id_product),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
    </body>
</html>
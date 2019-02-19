				<div class="konten">
					<?php echo form_open('Laporan/detailHarian', array('method'=>'get'));?>
					<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal">
					<input type="submit" name="cari" value="Cari">
					<?php form_close();?>
                    <br><legend>Riwayat Transaksi Tanggal <?php echo $tanggal;?></legend>
                       
                    <table class="table table-striped table-responsive">
                    	<tr>
                    		<td>Kode Transaksi</td>
                    		<td>Tanggal</td>
                    		<td>Kasir</td>
                    		<td>Produk</td>
                    		<td>Id Produk</td>
                    		<td>Harga</td>
                    		<td>Jumlah</td>
                    		<td>Total</td>
                    		<td>Status</td>
                    	</tr>
                    	<?php foreach ($detailHarian as $detail) { ?> 
                    	<tr>
                    		<td><?php echo $detail['kode'];?></td>
                    		<td><?php echo $detail['tanggal'];?></td>
                    		<td><?php echo $detail['username'];?></td>
                    		<td><?php echo $detail['nama'];?></td>
                    		<td><?php echo $detail['idProduk'];?></td>
                    		<td><?php echo number_format($detail['jual']);?></td>
                    		<td><?php echo $detail['jumlah'];?></td>
                    		<td><?php echo number_format($detail['total']);?></td>
                    		<td><?php echo $detail['status'];?></td>
                    	</tr>
                    <?php } ?>
                    </table>  

            	</div>
            	<script type="text/javascript">
            		$("body").on('focus', ' .datepicker', function () {
		    			$(this).datepicker({
		    				dateFormat: "yy-mm-dd"
		    			});
		    		});
            	</script>
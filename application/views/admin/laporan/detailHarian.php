				<div class="col-md-12">
				    <h3>Detail transaksi harian</h3><br>
					<?php echo form_open('Laporan/detailHarian', array('method'=>'get'));?>
					<input type="text" name="tanggalCari" class="date datepicker" placeholder="cari tanggal">
					<input type="submit" name="cari" value="Cari">
					<?php form_close();?>
                    <?php echo $tanggal;?>
                        <?php
						$this->table->set_heading('Kode Transaksi', 'Tanggal', 'Kasir', 'Produk', 'Id Produk', 'Harga', 'Jumlah', 'Total', 'Status');
						$template = array (
									'table_open' => '<table border="0" cellpadding="2" cellspacing="2" style="width: 100%" class="table table-striped">',
									);
						$this->table->set_template($template);
						echo $this->table->generate($detailHarian);
                        ?>
                      
            	</div>
            	<script type="text/javascript">
            		$("body").on('focus', ' .datepicker', function () {
		    			$(this).datepicker({
		    				dateFormat: "yy-mm-dd"
		    			});
		    		});
            	</script>
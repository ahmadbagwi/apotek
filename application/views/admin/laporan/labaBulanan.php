					<div class="konten">	
                        <?php echo form_open('Laporan/labaBulanan', array('method'=>'get'));?>
						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari Bulan">
						<input type="submit" name="cari" value="Cari">
                        <br><legend>Daftar Transaksi Bulanan <?php echo $bulan;?></legend>
						<?php form_close(); ?>						
                        <?php
						$this->table->set_heading('Modal', 'Jual', 'Profit');
						$template = array (
									'table_open' => '<table border="1" cellpadding="2" cellspacing="2" style="width: 100%;font-size:12px;" class="table table-bordered">',
									);
						$this->table->set_template($template);
						//$this->table->add_row($totalLabaHarian);
						echo $this->table->generate($query);
						?>    
                </div><!--div-col-12-->
           
                <script>
            	$(document).ready(function (){
            		
            		$("body").on('focus', ' .datepicker', function () {
            			$(this).datepicker({
            				dateFormat: "yy-mm-dd"
            			});
            		});
            	
            	});
                </script>


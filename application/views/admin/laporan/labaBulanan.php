						<legend>Laba transaksi bulanan</h3><legend>	
						<?php echo form_open('Laporan/labaBulanan', array('method'=>'get'));?>
						<input type="text" name="tanggalCari" class="date datepicker">
						<input type="submit" name="cari" value="Cari">
						<?php form_close(); ?>						
                        <?php
                        echo "<p>Bulan "."<strong>".$tanggal."<strong>";
						$this->table->set_heading('Modal', 'Jual', 'Profit');
						$template = array (
									'table_open' => '<table border="1" cellpadding="2" cellspacing="2" style="width: 100%" class="table table-bordered">',
									);
						$this->table->set_template($template);
						//$this->table->add_row($totalLabaHarian);
						echo $this->table->generate($query)."<br>"; var_dump($query);
						?>
					   
                    </fieldset><!--fieldset-->      
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


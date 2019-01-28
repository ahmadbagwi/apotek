    					<div class="konten">
                            <?php echo form_open('Laporan/Konsinyasi', array('method'=>'get'));?>
    						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal">
    						<input type="submit" name="cari" value="Cari"><br>
    						<?php form_close();?>
                            Menampilkan data <?php echo $tanggal;?>
                            <h3>Konsinyasi</h3>
                            <?php
                            echo 
                            $this->table->set_heading('Kode', 'Tanggal', 'Kasir', 'Produk', 'Harga Modal/Konsinyasi', 'Jumlah');
                            $template = array (
                                        'table_open' => '<table border="0" cellpadding="0" style="width: 100%;font-size:12px;" class="table table-striped">',
                                        );
                            $this->table->set_template($template);
                            echo $this->table->generate($konsinyasi);
                            
                            echo '<div class="text-center">'.'Total Konsinyasi '.$totalKonsinyasi.'</div>';
                            ?>
                            
                            <a href="<?php echo site_url('Laporan/cetakKonsinyasi?tanggal='."$tanggal".'') ?>" target="_blank" class="btn btn-success">Cetak/PDF</a>
                            <script>
    		            	$(document).ready(function (){
    		            		
    		            		$("body").on('focus', ' .datepicker', function () {
    		            			$(this).datepicker({
    		            				dateFormat: "yy-mm-dd"
    		            			});
    		            		});
    		            	
    		            	});
    		                </script>
                        </div><!--/Konten-->
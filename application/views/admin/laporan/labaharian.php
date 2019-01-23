    					<div class="konten">
                            <?php echo form_open('Laporan/labaHarian', array('method'=>'get'));?>
    						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal">
    						<input type="submit" name="cari" value="Cari">
    						<?php form_close();?>
                            <br><legend>Daftar Transaksi Tanggal <?php echo $tanggal;?></legend>
                            <table class="table table-striped" style="font-size: 12px">
                                     <tr>
                                         <th>Kode</th>
                                         <th>Transaksi Modal</td>
                                         <th>Transaksi Jual</th>
                                         <th>Profit</th>
                                     </tr>
                                     <?php foreach ($labaHarian as $profitHarian) { ?>
                                     <tr>
                                         <td><?php echo $profitHarian['kode']; ?></td>
                                         <td><?php echo $profitHarian['jumlahModal'];?></td>
                                         <td><?php echo $profitHarian['jumlahJual'];?></td>
                                         <td><?php echo $profitHarian['profit'];?></td>
                                     </tr>
                                    <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td><strong>Total Profit</strong></td>
                                         <td><strong><?php echo $totalLabaHarian;?></strong></td>
                                     </tr>
                            </table>

                            <?php
                            echo "<br><legend>Daftar Pembatalan Transaksi</legend>";
                            $this->table->set_heading('Id Pembatalan', 'Id User', 'Tanggal', 'No. Transaksi', 'Id Produk', 'Nilai Transaksi', 'Jumlah Barang');
                            $template = array (
                                        'table_open' => '<table border="0" style="width: 100%;font-size:12px;" class="table table-striped">',
                                        );
                            $this->table->set_template($template);
                            echo $this->table->generate($dataPembatalan);
                            ?>
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
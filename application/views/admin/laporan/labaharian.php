    					<div class="konten">
                            <?php echo form_open('Laporan/labaHarian', array('method'=>'get'));?>
    						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal">
    						<input type="submit" name="cari" value="Cari"><br>
    						<?php form_close();?>
                            Menampilkan data <?php echo $tanggal;?>
                            <legend>Transaksi Sukses</legend>
                            <table class="table table-striped" style="font-size: 12px">
                                     <tr>
                                         <th>Kasir</th>
                                         <th>Kode</th>
                                         <th>Transaksi Modal</td>
                                         <th>Transaksi Jual</th>
                                         <th>Profit</th>
                                     </tr>
                                     <?php foreach ($labaHarian as $profitHarian) { ?>
                                     <tr>
                                         <td><?php echo $profitHarian['username']; ?></td>
                                         <td><?php echo $profitHarian['kode']; ?></td>
                                         <td><?php echo $profitHarian['jumlahModal'];?></td>
                                         <td><?php echo $profitHarian['jumlahJual'];?></td>
                                         <td><?php echo $profitHarian['profit'];?></td>
                                     </tr>
                                    <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td><strong>Total Profit</strong></td>
                                         <td><strong><?php echo $totalLabaHarian;?></strong></td>
                                     </tr>
                            </table>

                            <?php
                            echo "<br><legend>Transaksi Dibatalkan</legend>";
                            $this->table->set_heading('Kasir', 'Kode', 'Produk', 'Jumlah', 'Nilai');
                            $template = array (
                                        'table_open' => '<table border="0" style="width: 100%;font-size:12px;" class="table table-striped">',
                                        );
                            $this->table->set_template($template);
                            echo $this->table->generate($dataPembatalan);
                            ?>
                            <a href="<?php echo site_url('Laporan/cetakHarian') ?>" target="_blank" class="btn btn-success">Cetak/PDF</a>
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
					<div class="konten">	
                        <?php echo form_open('Laporan/labaBulanan', array('method'=>'get'));?>
						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari Bulan">
						<input type="submit" name="cari" value="Cari">
                        <br><legend>Daftar Transaksi Bulanan <?php echo $bulan;?></legend>
						<?php form_close(); ?>						
                        <?php /*
						$this->table->set_heading('Modal', 'Jual', 'Profit');
						$template = array (
									'table_open' => '<table border="1" cellpadding="2" cellspacing="2" style="width: 100%;font-size:12px;" class="table table-bordered">',
									);
						$this->table->set_template($template);
						//$this->table->add_row($totalLabaHarian);
						echo $this->table->generate($query);
						*/?>   

                        <table class="table table-striped table-responsive" border="0" cellpadding="0" style="font-size: 12px">
                           <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Modal</th>
                                <th>Jumlah Jual</td>
                                <th>Jumlah Profit</th>
                            </tr>
                               <?php foreach ($labaBulanan as $labaBulanan) { ?>
                                   <tr>
                                       <td><?php $tanggal = substr($labaBulanan['tanggal'], 0, 10) ; echo $tanggal; ?></td>
                                       <td><?php echo number_format($labaBulanan['jumlahModal']); ?></td>
                                       <td><?php echo number_format($labaBulanan['jumlahJual']);?></td>
                                       <td><?php echo number_format($labaBulanan['profit']);?></td>
                                   </tr>
                               <?php } ?>
                               <tr>
                                   <td><strong>Total</strong></td>
                                   <td><?php echo number_format($modalBulanan); ?></td>
                                   <td><?php echo number_format($jualBulanan); ?></td>
                                   <td><strong><?php echo number_format($profitBulanan); ?></strong></td>
                               </tr>
                           </table>
                           <a href="<?php echo site_url('Laporan/cetakBulanan?tanggal='."$bulan".''); ?>" target="_blank" class="btn btn-success">Cetak/PDF</a> 
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


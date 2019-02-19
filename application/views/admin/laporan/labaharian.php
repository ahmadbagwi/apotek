    					<div class="konten">
                            <?php echo form_open('Laporan/labaHarian', array('method'=>'get'));?>
    						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal" value="<?php echo date('Y-m-d');?>">
                            <select name="shift" class="form">
                                <option value="1">Shift 1</option>
                                <option value="2">Shift 2</option>
                            </select>
    						<input type="submit" name="cari" value="Cari"><br>
    						<?php form_close();?>
                            Menampilkan data <?php echo $tanggal; if ($jam1 == "07:30:00") echo " (Shift 1)"; else { echo " (Shift 2)"; } ?><br>
                            <?php //echo $jam1." ".$jam2;?>
                            <h3>Transaksi Sukses</h3>
                            <table class="table table-striped table-responsive" border="0" cellpadding="0" style="font-size: 12px">
                                     <tr>
                                         <th>Kasir</th>
                                         <th>Kode</th>
                                         <th>Harga Modal</td>
                                         <th>Harga Jual</th>
                                         <th>Profit</th>
                                     </tr>
                                     <?php foreach ($labaHarian as $profitHarian) { ?>
                                     <tr>
                                         <td><?php echo $profitHarian['username']; ?></td>
                                         <td><?php echo $profitHarian['kode']; ?></td>
                                         <td><?php echo number_format($profitHarian['jumlahModal']);?></td>
                                         <td><?php echo number_format($profitHarian['jumlahJual']);?></td>
                                         <td><?php echo number_format($profitHarian['profit']);?></td>
                                     </tr>
                                    <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td><strong>Total</strong></td>
                                         <td><?php echo number_format($totalModalHarian);?></td>
                                         <td><?php echo number_format($totalJualHarian);?></td>
                                         <td><strong><?php echo number_format($totalLabaHarian);?></strong></td>
                                     </tr>
                            </table>

                            <h4>Konsinyasi</h4>
                            <table class="table table-striped" border="0" cellpadding="0" style="font-size: 12px">
                                     <tr>
                                         <th>Kasir</th>
                                         <th>Kode</th>
                                         <th>Produk</td>
                                         <th>Jumlah</th>
                                         <th>Harga Modal</th>
                                         <th>Total</th>
                                     </tr>
                                     <?php $sum=0; foreach ($konsinyasi as $konsinyasi) { ?>
                                     <tr>
                                         <td><?php echo $konsinyasi['username']; ?></td>
                                         <td><?php echo $konsinyasi['kode']; ?></td>
                                         <td><?php echo $konsinyasi['nama'];?></td>
                                         <td><?php echo $konsinyasi['jumlah'];?></td>
                                         <td><?php echo number_format($konsinyasi['modal']);?></td>
                                         <td><?php $totalKonsinyasi = $konsinyasi['jumlah']*$konsinyasi['modal']; echo number_format($totalKonsinyasi); ?></td>
                                     </tr>
                                    <?php $sum += $totalKonsinyasi; } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td><?php echo number_format($sum); ?></td>
                                    </tr>
                            </table>
                            <a href="<?php echo site_url('Laporan/cetakHarian?tanggal='."$tanggal".'&jam1='."$jam1".'&jam2='."$jam2".''); ?>" target="_blank" class="btn btn-success">Cetak/PDF</a>
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
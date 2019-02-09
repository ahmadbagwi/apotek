    					<div class="konten">
                            <?php echo form_open('Laporan/transaksiBatal', array('method'=>'get'));?>
    						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal">
    						<input type="submit" name="cari" value="Cari"><br>
    						<?php form_close();?>
                            Menampilkan data <?php echo $tanggal;?>
                            <h3>Transaksi Dibatalkan</h3>
                            <table class="table table-striped" border="0" cellpadding="0" style="font-size: 12px">
                               <tr>
                                    <th>Tanggal</th>
                                    <th>Kode</th>
                                    <th>Kasir</td>
                                    <th>Nama</td>
                                    <th>Jumlah</th>
                                    <th>Nilai</th>
                                </tr>
                                 <?php foreach ($dataPembatalan as $batal) { ?>
                                <tr>
                                    <td><?php echo $batal['tanggal'];?></td>
                                    <td><?php echo $batal['kode']; ?></td>
                                    <td><?php echo $batal['username']; ?></td>
                                    <td><?php echo $batal['nama']; ?></td>
                                    <td><?php echo $batal['jumlah'];?></td>
                                    <td><?php echo $batal['nilai'];?></td>
                                </tr>
                                   <?php } ?>
                                </table>

                            <!--<a href="<?php echo site_url('Laporan/cetakHarian?tanggal='."$tanggal".'') ?>" target="_blank" class="btn btn-success">Cetak/PDF</a>-->
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
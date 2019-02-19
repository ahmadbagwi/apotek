				<div>
					<?php echo form_open('TutupKas/datakas', array('method'=>'get'));?>
						<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari Tanggal">
						<input type="submit" name="cari" value="Cari">   
					<?php form_close(); ?>
					<span>Data Tutup Kas</span>   	
					<table class="table table-striped table-responsive" cellpadding="5px">
						<tr>
							<td>Tanggal</td>
							<td>Jam tutup</td>
							<td>No. slip</td>
							<td>Ditutup oleh</td>
							<td>No. struk akhir</td>
							<td>Kas Awal</td>
							<td>Penjualan</td>
							<td>Bayar rawat inap</td>
							<td>Total transaksi</td>
							<td>Kas tersedia</td>
							<td>Kartu debit</td>
							<td>Belum dibayar</td>
							<td>Total kas</td>
							<td>SELISIH</td>
							<td>Cetak</td>
						</tr>
						<?php foreach ($tutupkas as $tutupkas) { ?>
						<tr>	
							<td><?php echo substr($tutupkas['tanggal'], 0,10) ;?></td>
							<td><?php echo $tutupkas['jamTutup'];?></td>
							<td><?php echo $tutupkas['noSlip'];?></td>
							<td><?php echo $tutupkas['username'];?></td>
							<td><?php echo $tutupkas['kodeAkhir'];?></td>
							<td><?php echo number_format($tutupkas['kasAwal']);?></td>
							<td><?php echo number_format($tutupkas['totalJual']);?></td>
							<td><?php echo number_format($tutupkas['rawatInap']);?></td>
							<td><?php echo number_format($tutupkas['totalTransaksi']);?></td>
							<td><?php echo number_format($tutupkas['kasTersedia']);?></td>
							<td><?php echo number_format($tutupkas['kartuDebit']);?></td>
							<td><?php echo number_format($tutupkas['belumDibayar']);?></td>
							<td><?php echo number_format($tutupkas['totalKas']);?></td>
							<td><?php echo number_format($tutupkas['selisih']);?></td> 
							<td><a href="<?php echo base_url('TutupKas/cetakkas?noSlip='); echo $tutupkas['noSlip'].'&tanggal='.$tutupkas['tanggal']; ?>" target="_blank">Cetak</a></td>
						</tr>
						<?php } ?>
					</table>
				</div>

				<script>
	            	$(document).ready(function (){
	            		
	            		$("body").on('focus', ' .datepicker', function () {
	            			$(this).datepicker({
	            				dateFormat: "yy-mm-dd"
	            			});
	            		});
	            	
	            	});
                </script>
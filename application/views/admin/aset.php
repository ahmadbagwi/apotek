<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		<?php echo form_open('Aset/index', array('method'=>'get'));?>
		<input type="text" name="tanggalCari" class="date datepicker" placeholder="Cari tanggal" value="<?php echo date('Y-m-d');?>">
		<input type="submit" name="cari" value="Cari"><br>
		<?php form_close();?>
		<table class="table table-striped table-responsive">
			<tr>
				<td>No</td>
				<td>Tanggal</td>
				<td>Nilai Aset</td>
				<td>Omset Shift 1</td>
				<td>Omset Shift 2</td>
				<td>Total Omset</td>
				<td>Struk Shift 1</td>
				<td>Struk Shift 2</td>
				<td>Total Struk</td>
				<td>Rata-rata Struk</td>
				<td>Profit</td>
				<td>Persentase Profit</td>
			</tr>
			<?php foreach ($dataAset as $dataAset) { ?>
			<tr>
				<td><?php echo $dataAset['id'];?></td>
				<td><?php echo $dataAset['tanggal'];?></td>
				<td><?php echo number_format($dataAset['aset']);?></td>
				<td><?php echo number_format($dataAset['omset1']);?></td>
				<td><?php echo number_format($dataAset['omset2']);?></td>
				<td><?php echo number_format($dataAset['totalOmset']);?></td>
				<td><?php echo $dataAset['nota1'];?></td>
				<td><?php echo $dataAset['nota2'];?></td>
				<td><?php echo $dataAset['totalNota'];?></td>
				<td><?php echo number_format($dataAset['avgNota']);?></td>
				<td><?php echo number_format($dataAset['profit']);?></td>
				<td><?php echo number_format($dataAset['persenProfit']);?></td>
			</tr>	

			<?php } ?>
				
		</table>

		<a href="<?php echo site_url('Aset/asetCetak?tanggal='."$tanggal".''); ?>" target="_blank" class="btn btn-success">Cetak/PDF</a>
		<script>
			$(document).ready(function (){

				$("body").on('focus', ' .datepicker', function () {
					$(this).datepicker({
						dateFormat: "yy-mm-dd"
					});
				});

			});
		</script>


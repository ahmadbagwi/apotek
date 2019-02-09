<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		<table class="table table-striped" style="font-size: 8px" border="1">
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


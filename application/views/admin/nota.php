        <div class="col-md-4 col-md-offset-4 nota">
    		<div class="row jumbotron" style="font-size: 12px">
    				<div class="col-md-12">
    					<h5 style="text-align: center">Apotek Budi Farma<br>Jl. Raya Tajur No. 287A<br>0813xxxxxxxx</h5>
    					<?php
                            foreach ($pembayaran->result_array() as $pembayaran) { }
                        ?>
                                <ul style="list-style: none;">
                                    <li>Kasir <strong><?php echo $_SESSION['username'];?></strong></li>
                                    <li>Tanggal <strong><?php echo $pembayaran['tanggal'];?></strong></li>
                                    <li>Kode Transaksi <strong><?php echo $pembayaran['kode']; ?></strong></li>
                                </ul>
                                 <table class="table table-striped" style="font-size: 12px">
                                     <tr>
                                         <th>Produk</th>
                                         <th>Harga</th>
                                         <th>Jumlah</th>
                                         <th style="display: none;">Diskon</td>
                                         <th>Total</th>
                                     </tr>
                                     <?php foreach ($penjualan->result_array() as $penjualan) { ?>
                                     <tr>
                                         <td><?php echo $penjualan['nama'];?></td>
                                         <td><?php echo $penjualan['jual'];?></td>
                                         <td><?php echo $penjualan['jumlah'];?></td>
                                         <td style="display: none;"><?php //echo $penjualan['diskon'];?></td>
                                         <td><?php echo $penjualan['total'];?></td>
                                     </tr>
                                    <?php } ?>
                                    <?php ?> 
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td><strong>Total</strong></td>
                                         <td><strong><?php echo $pembayaran['jumlahJual'];?></strong></td>
                                     </tr>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td><strong>Bayar</strong></td>
                                         <td><strong><?php echo $pembayaran['bayar'];?></strong></td>
                                     </tr>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td><strong>Kembali</strong></td>
                                         <td><strong><?php echo $pembayaran['kembali'];?></strong></td>
                                     </tr>
                                 </table>                                
                 </div><!--div-col-12-->
    	    </div><!--row jumbotron-->
        <div id="footer" class="row jumbotron tombolNavigasi">
            <a href="<?php echo site_url('penjualan') ?>" class="btn btn-success">Transaksi lagi</a>
            <button class="btn btn-warning" onclick="window.print();return false;">Cetak Nota</button>
        </div>
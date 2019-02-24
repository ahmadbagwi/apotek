        <div class="col-md-4 col-md-offset-4 nota">
    		<div class="row jumbotron" style="font-size: 12px">
                <div class="col-md-12">
                    <div id="nota">
    					<h5>Apotek Budi Farma</h5>
                    Jl. Raya Tajur No. 287A 0813xxxxxxxx<br>
                   
                    Kasir <?php echo $_SESSION['username'];?><br>
                    Kode Transaksi <?php echo $trx; ?><br>
                    <?php foreach ($penjualan as $tanggal) { ?>
                    Tanggal <?php echo $tanggal['tanggal']; break;}?><br>
                   
                    <table class="table table-striped" style="font-size: 12px">
                         <tr>
                         <th>Produk</th>
                         <th>Harga</th>
                         <th>Jumlah</th>

                         <th>Total</th>
                         </tr>
                        <?php foreach ($penjualan as $penjualan) { ?>
                             <tr>
                                 <td><?php echo $penjualan['nama'];?></td>
                                 <td><?php echo $penjualan['jual'];?></td>
                                 <td><?php echo $penjualan['jumlah'];?></td>
                
                                 <td><?php echo $penjualan['total'];?></td>
                             </tr>
                         <?php } ?>
                         <?php foreach ($pembayaran as $pembayaran) {?> 
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
                                 <td><strong><?php echo $pembayaran['kembali']; }?></strong></td>
                             </tr>
                         </table>
                      
                    </div>
                </div>                              
    	    </div><!--row jumbotron-->
        </div><!--col-md-4-->
        <div class="col-md-12">
            <div id="footer" class="row cetak">
                <a href="<?php echo site_url('penjualan') ?>" class="btn btn-success">Transaksi lagi</a>
                <button class="print btn btn-warning"><a href="<?php echo base_url('Nota/cetakNota');?>"> Cetak Nota</a></button>
            </div>
        </div>


             <div class="col-md-4 col-sm-4">
                <div id="nota" style="font-size: 12px">
                    <h5><?php echo $namaAplikasi; ?></h5>
                    <?php echo $alamat.' '.$kontak;?><br>
                    ====================<br>
                    Kasir <?php echo $_SESSION['username'];?><br>
                    Kode Transaksi <?php echo $trx; ?><br>
                    <?php foreach ($penjualan as $tanggal) { echo "Tanggal ".$tanggal['tanggal']."<br>"; break;}?>
                    ====================<br>
                    <table class="table table-striped" border="1|0" cellpadding="5" style="font-size:10px">
                         <tr>
                         <th>Produk</th>
                         <th>Harga</th>
                         <th>Jumlah</th>

                         <th>Total</th>
                         </tr>
                            <?php foreach ($penjualan as $penjualan) {?>
                             <tr>
                                 <td><?php echo $penjualan['nama'];?></td>
                                 <td><?php echo number_format($penjualan['jual']);?></td>
                                 <td><?php echo $penjualan['jumlah'];?></td>
                
                                 <td><?php echo number_format($penjualan['total']);?></td>
                             </tr>
                         <?php } ?>
                         <?php foreach ($pembayaran as $pembayaran) {?> 
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td><strong>Total</strong></td>
                                 <td><strong><?php echo number_format($pembayaran['jumlahJual']);?></strong></td>
                             </tr>
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td><strong>Bayar</strong></td>
                                 <td><strong><?php echo number_format($pembayaran['bayar']);?></strong></td>
                             </tr>
                             <tr>
                                 <td></td>
                                 <td></td>
                                 <td><strong>Kembali</strong></td>
                                 <td><strong><?php echo number_format($pembayaran['kembali']); }?></strong></td>
                             </tr>
                         </table>
                         ====================<br>
                 </div>                              
             </div>


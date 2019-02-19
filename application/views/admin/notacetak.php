             <div class="col-md-4 col-sm-4">
                <div id="nota" style="font-size: 12px">
                    <?php echo "<strong>".$namaAplikasi."</strong><br>"; ?>
                    <?php echo "<strong>".$alamat."</strong><br>";?>
                    <?php echo "<strong>".$kontak."</strong><br>";?>
                    ====================<br>
                    <?php echo "<strong>Kasir ".$_SESSION['username']."</strong>";?><br>
                    ====================<br>
                    <?php foreach ($penjualan as $tanggal) { echo "<strong>".$tanggal['tanggal']." ".$trx."<br></strong>"; break;}?>
                    ====================<br>
                    <table class="table table-striped" border="1|0" cellpadding="5" style="font-size:10px; font-weight: 10px">
                         <tr>
                         <th>Produk</th>
                         <th>Harga</th>
                         <th>Jumlah</th>
                         <th>Sub</th>
                         </tr>
                            <?php foreach ($penjualan as $penjualan) {?>
                             <tr>
                                 <td><strong><?php echo $penjualan['nama'];?></strong></td>
                                 <td><strong><?php echo number_format($penjualan['jual']);?></strong></td>
                                 <td><strong><?php echo $penjualan['jumlah'];?></strong></td>
                
                                 <td><strong><?php echo number_format($penjualan['total']);?></strong></td>
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
                         <span>Terima kasih atas kunjungan anda</span>
                 </div>                              
             </div>


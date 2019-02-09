    					<style>
                        @page konten { sheet-size: 120mm 200mm; }                            
                        </style>
  
                        <div class="konten">
                            <h4 style="font-size: 10px">Menampilkan data laporan <?php echo $tanggal; if ($jam1 == "07:30:00") echo " (Shift 1)"; else { echo " (Shift 2)"; }?></h4>
                            <p style="font-size: 8px">Transaksi Sukses</p>
                            <table class="table table-striped" border="1" cellpadding="2" style="font-size: 12px">
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

                            <p style="font-size: 8px">Konsinyasi</p>
                            <table class="table table-striped" border="1" cellpadding="2" style="font-size: 12px">
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
                        </div>
                         <div class="ttd" style="font-size: 10px">
                             Kasir <?php echo "<br><br><br>";




                             echo $_SESSION['username'];?>
                           </div>
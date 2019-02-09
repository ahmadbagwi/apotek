                        <h5 style="font-size: 10px">Daftar Transaksi Bulanan <?php echo $bulan;?></h5>
                        <table class="table table-striped" border="1" cellpadding="0" style="font-size: 10px">
                           <tr>
                                <th>Tanggal</th>
                                <th>Jumlah Modal</th>
                                <th>Jumlah Jual</td>
                                <th>Jumlah Profit</th>
                            </tr>
                               <?php foreach ($labaBulanan as $labaBulanan) { ?>
                                   <tr>
                                       <td><?php $tanggal = substr($labaBulanan['tanggal'], 0, 10) ; echo $tanggal; ?></td>
                                       <td><?php echo number_format($labaBulanan['jumlahModal']); ?></td>
                                       <td><?php echo number_format($labaBulanan['jumlahJual']);?></td>
                                       <td><?php echo number_format($labaBulanan['profit']);?></td>
                                   </tr>
                               <?php } ?>
                               <tr>
                                   <td><strong>Total</strong></td>
                                   <td><?php echo number_format($modalBulanan); ?></td>
                                   <td><?php echo number_format($jualBulanan); ?></td>
                                   <td><strong><?php echo number_format($profitBulanan); ?></strong></td>
                               </tr>
                           </table>
                           <div class="ttd" style="font-size: 10px">
                             Kasir <?php echo "<br><br><br>";




                             echo $_SESSION['username'];?>
                           </div>
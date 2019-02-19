            <div class="col-md-4 col-sm-4">
                <div id="nota" style="font-size: 12px">
                    <span  style="font-weight: bold">SLIP PENJUALAN</span><br>
                    ------------------------------------------
                    <table style="font-size: 12px" class="table table-stripped" cellpadding="2">
                        <?php foreach ($tutupkas as $tutupkas) { ?>
                        <tr>
                            <td>Tanggal</td>
                            <td><?php echo substr($tutupkas['tanggal'], 0,10); ?></td>
                        </tr>
                        <tr>
                            <td>Jam</td>
                            <td><?php echo $tutupkas['jamTutup']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Slip</td>
                            <td><?php echo $tutupkas['noSlip']; ?></td>
                        </tr>
                        <tr>
                            <td>Ditutup oleh</td>
                            <td><?php echo $tutupkas['username']; ?></td>
                        </tr>
                        <tr>
                            <td>No. Struk terakhir</td>
                            <td><?php echo $tutupkas['kodeAkhir']; ?></td>
                        </tr>
                    </table>
                    ------------------------------------------
                    <table style="font-size: 12px" class="table table-stripped" cellpadding="2">
                        <span><u>DATA KOMPUTER</u></span>
                        <tr>
                            <td>Kas awal</td>
                            <td><?php echo number_format($tutupkas['kasAwal']); ?></td>
                        </tr>
                        <tr>
                            <td>Penjualan</td>
                            <td><?php echo number_format($tutupkas['totalJual']); ?></td>
                        </tr>
                        <tr>
                            <td>Rawat inap</td>
                            <td><?php echo number_format($tutupkas['rawatInap']); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Total transaksi</td>
                            <td style="font-weight: bold"><?php echo number_format($tutupkas['totalTransaksi']); ?></td>
                        </tr>
                    </table>
                    ------------------------------------------
                    <table style="font-size: 12px" class="table table-stripped" cellpadding="2">
                        <u><span>AKTUAL KAS</span></u>
                        <tr>
                            <td>Kas tersedia</td>
                            <td><?php echo number_format($tutupkas['kasTersedia']); ?></td>
                        </tr>
                        <tr>
                            <td>Kartu debit</td>
                            <td><?php echo number_format($tutupkas['kartuDebit']); ?></td>
                        </tr>
                        <tr>
                            <td>Belum dibayar</td>
                            <td><?php echo number_format($tutupkas['belumDibayar']); ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold">Total kas</td>
                            <td style="font-weight: bold"><?php echo number_format($tutupkas['totalKas']); ?></td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td style="font-weight: bold">SELISIH</td>
                            <td style="font-weight: bold"><?php echo number_format($tutupkas['selisih']); ?></td>
                        </tr>
                   
                    </table>                                  
          
            <br><br><br>

            <span><?php echo $tutupkas['username']; ?> </span><br>
            ----------------------<br><br><br>
             <?php } ?>

             <span>KONSINYASI</span>
             <table class="table table-striped" border="0" cellpadding="5" style="font-size: 12px">
               <tr>
                   <th>Produk</td>
                       <th>Jumlah</th>
                       <th>Harga Modal</th>
                       <th>Total</th>
                   </tr>
                   <?php $sum=0; foreach ($konsinyasi as $konsinyasi) { ?>
                       <tr>
                           <td><?php echo $konsinyasi['nama'];?></td>
                           <td><?php echo $konsinyasi['jumlah'];?></td>
                           <td><?php echo number_format($konsinyasi['modal']);?></td>
                           <td><?php $totalKonsinyasi = $konsinyasi['jumlah']*$konsinyasi['modal']; echo number_format($totalKonsinyasi); ?></td>
                       </tr>
                       <?php $sum += $totalKonsinyasi; } ?>
                       <tr>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><?php echo number_format($sum); ?></td>
                    </tr>
                </table>

            </div>
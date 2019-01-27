    					<div class="konten">
                            <h2>Menampilkan data laporan <?php echo $tanggal;?></h2>
                            <h3>Transaksi Sukses</h3>
                            <table class="table table-striped" border="1" cellpadding="2" style="font-size: 12px">
                                     <tr>
                                         <th>Kasir</th>
                                         <th>Kode</th>
                                         <th>Transaksi Modal</td>
                                         <th>Transaksi Jual</th>
                                         <th>Profit</th>
                                     </tr>
                                     <?php foreach ($labaHarian as $profitHarian) { ?>
                                     <tr>
                                         <td><?php echo $profitHarian['username']; ?></td>
                                         <td><?php echo $profitHarian['kode']; ?></td>
                                         <td><?php echo $profitHarian['jumlahModal'];?></td>
                                         <td><?php echo $profitHarian['jumlahJual'];?></td>
                                         <td><?php echo $profitHarian['profit'];?></td>
                                     </tr>
                                    <?php } ?>
                                     <tr>
                                         <td></td>
                                         <td></td>
                                         <td></td>
                                         <td><strong>Total Profit</strong></td>
                                         <td><strong><?php echo $totalLabaHarian;?></strong></td>
                                     </tr>
                            </table>
                            <?php
                            echo "<br><h3>Transaksi Dibatalkan</h3>";
                            $this->table->set_heading('Kasir', 'Kode', 'Produk', 'Jumlah', 'Nilai');
                            $template = array (
                                        'table_open' => '<table border="1" cellpadding="2" style="width: 100%;font-size:12px;" class="table table-striped">',
                                        );
                            $this->table->set_template($template);
                            echo $this->table->generate($dataPembatalan);
                            ?>                           
                        </div>
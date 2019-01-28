    					<div class="konten">
                            <h2>Menampilkan data laporan <?php echo $tanggal;?></h2>
                            <h3>Konsinyasi</h3>
                            <?php
                            echo 
                            $this->table->set_heading('Kode', 'Tanggal', 'Kasir', 'Produk', 'Harga Modal/Konsinyasi', 'Jumlah');
                            $template = array (
                                        'table_open' => '<table border="1" cellpadding="2" style="width: 100%;font-size:12px;" class="table table-striped">',
                                        );
                            $this->table->set_template($template);
                            echo $this->table->generate($konsinyasi);
                            
                            echo '
                            <table border="1" cellpadding="2" style="width: 100%;font-size:12px;" class="table table-striped">
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total Konsinyasi</td>
                                    <td>'.$totalKonsinyasi.'</td>
                                </tr>
                            </table>';
                            ?>
                            
                        </div><!--/Konten-->
                <div class="col-md-12 col-lg-12">
                    
                    <div class="row">

                        <div class="col-md-4 nota" style="margin-right: 10px;">
                            <h4>Nota Terakhir</h4>
                    		<div class="row jumbotron" style="font-size: 12px">
                                <div class="col-md-12">
                                    <div id="nota">
                    					<h5><?php echo $namaAplikasi; ?></h5>
                                        <?php echo $alamat.' '.$kontak;?><br>
                                   
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
                                      
                                    </div>
                                </div>                              
                    	    </div><!--row jumbotron-->
                            <div id="footer" class="row cetak">
                                <a href="<?php echo site_url('penjualan') ?>" class="btn btn-success btn-sm">Transaksi lagi</a>
                                <a href="<?php echo site_url('Nota/cetakNota') ?>" target="_blank" class="btn btn-success btn-sm">Cetak/PDF</a>
                            </div>
                        </div><!--col-md-4-->

                        <div class="col-md-4 nota">
                            <h4>Cetak Ulang Nota</h4>
                            <div class="row jumbotron" style="font-size: 12px">
                                <div class="col-md-12">
                                    <?php echo form_open('Nota/cetakNota', array('method'=>'get'));?>
                                        <input type="text" class="form form-control" name="kode" id="kode" placeholder="Input kode transaksi trx_xxxx">
                                        <button type="submit" class="btn btn-warning btn-sm" target="_blank">Cetak Ulang</button>
                                    <?php form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                $(document).ready(function(){    
                   $("#kode").autocomplete({
                           source: function (request, response) {
                            $.get("<?php echo base_url('PembatalanTransaksi/cariData/?');?>", request,function(data){
                                jsonData = JSON.parse(data);
                                console.log(jsonData);
                                response($.map(jsonData, function (value, key) {
                                    return {
                                        label: value.id_transaksi,
                                        data: value,
                                    }
                                }));
                            });
                        },
                        select: function (event, ui){
                            $('[name="kode"]').val(ui.item.data.id_transaksi);
                        }
                        });
                })
                </script>


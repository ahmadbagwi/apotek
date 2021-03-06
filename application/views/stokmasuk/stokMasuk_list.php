                    <h2>Daftar Stok Masuk<h2>
                    <div class="row" style="margin-bottom: 10px">
                        <div class="col-md-4">
                            <?php echo anchor(site_url('stokmasuk/create'),'Baru', 'class="btn btn-primary"'); ?>
                        </div>
                        <div class="col-md-4 text-center">
                            <div style="margin-top: 8px" id="message">
                                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                            </div>
                        </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('stokmasuk/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('stokmasuk'); ?>" class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                        ?>
                                      <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table table-striped" style="margin-bottom: 10px;font-size:12px;">
                        <tr>
                            <th>No</th>
            		<th>Id User</th>
            		<th>Id Suplier</th>
            		<th>Nama Produk</th>
            		<th>Id Produk</th>
            		<th>Tanggal</th>
            		<th>Jumlah</th>
            		<th>Harga Modal</th>
                    <th>Harga Jual</th>
            		<th>Aksi</th>
                        </tr><?php
                        foreach ($stokmasuk_data as $stokmasuk)
                        {
                            ?>
                            <tr>
            			<td width="80px"><?php echo ++$start ?></td>
            			<td><?php echo $stokmasuk->idUser ?></td>
            			<td><?php echo $stokmasuk->idSuplier ?></td>
            			<td><?php echo $stokmasuk->namaProduk ?></td>
            			<td><?php echo $stokmasuk->idProduk ?></td>
            			<td><?php echo $stokmasuk->tanggal ?></td>
            			<td><?php echo $stokmasuk->jumlah ?></td>
            			<td><?php echo $stokmasuk->modal ?></td>
                        <td><?php echo $stokmasuk->jual ?></td>
            			<td style="text-align:center" width="200px">
            				<?php 
            				echo anchor(site_url('stokmasuk/read/'.$stokmasuk->id),'Read'); 
            				echo ' | '; 
            				echo anchor(site_url('stokmasuk/update/'.$stokmasuk->id),'Update'); 
            				echo ' | '; 
            				echo anchor(site_url('stokmasuk/delete/'.$stokmasuk->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
            				?>
            			</td>
            		</tr>
                            <?php
                        }
                        ?>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-primary">Total Data : <?php echo $total_rows ?></a>
            		<?php echo anchor(site_url('stokmasuk/excel'), 'Export ke Excel', 'class="btn btn-primary"'); ?>
            	    </div>
                        <div class="col-md-6 text-right">
                            <?php echo $pagination ?>
                        </div>
                    </div>
                    <legend>Daftar Produk</legend>
                    <div class="row" style="margin-bottom: 10px">
                            <div class="col-md-4">
                                <?php echo anchor(site_url('stok/create'),'Baru', 'class="btn btn-primary"'); ?>
                            </div>
                            <div class="col-md-4 text-center">
                                <div style="margin-top: 8px" id="message">
                                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                                    </div>
                            </div>
                        <div class="col-md-1 text-right">
                        </div>
                        <div class="col-md-3 text-right">
                            <form action="<?php echo site_url('stok/index'); ?>" class="form-inline" method="get">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                                    <span class="input-group-btn">
                                        <?php 
                                            if ($q <> '')
                                            {
                                                ?>
                                                <a href="<?php echo site_url('stok'); ?>" class="btn btn-default">Reset</a>
                                                <?php
                                            }
                                        ?>
                                      <button class="btn btn-primary" type="submit">Search</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                        <table style="width: 100%;font-size:12px;" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah Stok</th>
                                    <th>Harga Modal</th>
                                    <th>Harga Jual</th>
                                    <th>Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="table-details">
                                </tr><?php
                                foreach ($stok_data as $stok)
                                {
                                    ?>
                                    <tr>
                                <td width="80px"><?php echo ++$start ?></td>
                                <td><?php echo $stok->nama ?></td>
                                <td><?php echo $stok->kategori ?></td>
                                <td><?php echo $stok->deskripsi ?></td>
                                <td><?php echo $stok->stok ?></td>
                                <td><?php echo $stok->modal ?></td>
                                <td><?php echo $stok->jual ?></td>
                                <td><?php echo $stok->dibuat ?></td>
                                <td style="text-align:center" width="200px">
                                    <?php 
                                    echo anchor(site_url('stok/read/'.$stok->id),'Read'); 
                                    echo ' | '; 
                                    echo anchor(site_url('stok/update/'.$stok->id),'Update'); 
                                    echo ' | '; 
                                    echo anchor(site_url('stok/delete/'.$stok->id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                                    ?>
                                </td>
                            </tr>
                            </tbody>
                                    <?php
                                }
                                ?>
                        </table>
                                
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn-primary">Total Produk : <?php echo $total_rows ?></a>
                    		<?php echo anchor(site_url('stok/excel'), 'Excel', 'class="btn btn-primary"'); ?>
                    	       </div>
                                <div class="col-md-6 text-right">
                                    <?php echo $pagination ?>
                                </div>
                            </div>
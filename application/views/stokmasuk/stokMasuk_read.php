                    <h2 style="margin-top:0px">Detail Transaksi Stok Masuk</h2>
                    <table class="table">
            	    <tr><td>IdUser</td><td><?php echo $idUser; ?></td></tr>
            	    <tr><td>IdSuplier</td><td><?php echo $idSuplier; ?></td></tr>
            	    <tr><td>NamaProduk</td><td><?php echo $namaProduk; ?></td></tr>
            	    <tr><td>IdProduk</td><td><?php echo $idProduk; ?></td></tr>
            	    <tr><td>Tanggal</td><td><?php echo $tanggal; ?></td></tr>
            	    <tr><td>Jumlah</td><td><?php echo $jumlah; ?></td></tr>
            	    <tr><td>Modal</td><td><?php echo $modal; ?></td></tr>
            	    <tr><td></td><td><a href="<?php echo site_url('stokmasuk') ?>" class="btn btn-default">Cancel</a></td></tr>
            	    </table>
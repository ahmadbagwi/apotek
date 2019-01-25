                    <h2 style="margin-top:0px">Tambah/Edit Supplier <?php echo $button ?></h2>
                    <form action="<?php echo $action; ?>" method="post">
            	    <div class="form-group">
                        <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Hp <?php echo form_error('hp') ?></label>
                        <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                        <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" />
                    </div>
            	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            	    <a href="<?php echo site_url('supplier') ?>" class="btn btn-default">Cancel</a>
            	   </form>
            
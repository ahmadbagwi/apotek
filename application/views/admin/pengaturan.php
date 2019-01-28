                        <h3>Pengaturan</h3>
                            <form action="<?php echo $action; ?>" method="post">
                        	    <div class="form-group">
                                    <label for="varchar">Nama Aplikasi</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                </div>
                        	    <div class="form-group">
                                    <label for="varchar">Alamat</label>
                                    <textarea name="alamat" class="form-control"></textarea>
                                </div>
                        	    <div class="form-group">
                                    <label for="varchar">Telp/Hp</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $deskripsi; ?>" />
                                </div>
                        	    <div class="form-group">
                                    <label for="int">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo"/>
                                </div>
                        	    <button type="submit" class="btn btn-primary"><?php echo "Simpan" ?></button> 
                    	   </form>
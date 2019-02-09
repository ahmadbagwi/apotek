                        <h3>Pengaturan</h3>
                            <form id="submit">
                        	    <div class="form-group">
                                    <label for="varchar">Nama Aplikasi</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" />
                                </div>
                        	    <div class="form-group">
                                    <label for="varchar">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control"></textarea>
                                </div>
                        	    <div class="form-group">
                                    <label for="varchar">Telp/Hp</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" />
                                </div>
                        	    <div class="form-group">
                                    <label for="int">Logo</label>
                                    <input type="file" class="form-control" name="logo" id="logo"/>
                                </div>
                        	    <button type="submit" class="btn btn-primary">Simpan</button><br>
                            </form>

                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        $('#submit').submit(function(e){
                                            e.preventDefault(); 
                                                 $.ajax({
                                                    url:'<?php echo base_url();?>Pengaturan/do_upload',
                                                    type:"post",
                                                    data:new FormData(this),
                                                    processData:false,
                                                    contentType:false,
                                                    cache:false,
                                                    async:false,
                                                    success: function(data){
                                                        alert("Upload Image Berhasil.");
                                                    }
                                                });
                                        });
                                    });
                                </script>
                                                	   
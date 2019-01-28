                <h2 style="margin-top:0px">Retur produk</h2>
                <form action="<?php echo $action; ?>" method="post">
        	    <div class="form-group" style="display: none">
                    <label for="int">Id User <?php echo form_error('idUser') ?></label>
                    <input type="text" class="form-control" name="idUser" id="idUser" placeholder="IdUser" value="<?php echo $_SESSION['user_id']; ?>" />
                </div>
                 <div class="form-group">
                        <label for="int">Nama Supplier</label>
                        <input type="text" class="namaSupplier form-control" name="namaSupplier" id="namaSupplier" placeholder="Nama Suplier"/>
                    </div>
        	    <div class="form-group" style="display: none">
                    <label for="int">Id Suplier <?php echo form_error('idSuplier') ?></label>
                    <input type="text" class="form-control" name="idSuplier" id="idSuplier" placeholder="IdSuplier" value="<?php echo $idSuplier; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Nama Produk <?php echo form_error('namaProduk') ?></label>
                    <input type="text" class="form-control" name="namaProduk" id="namaProduk" placeholder="NamaProduk" value="<?php echo $namaProduk; ?>" />
                </div>
        	    <div class="form-group" style="display: none">
                    <label for="int">Id Produk <?php echo form_error('idProduk') ?></label>
                    <input type="text" class="form-control" name="idProduk" id="idProduk" placeholder="IdProduk" value="<?php echo $idProduk; ?>" />
                </div>
                <div class="form-group">
                        <label for="int">Stok yang Ada</label>
                        <input type="text" class="stok form-control" readonly="" name="stok" id="stok" class="stok" placeholder="Stok produk yang ada di gudang" />
                    </div>
        	    <div class="form-group">
                    <label for="datetime">Tanggal Retur<?php echo form_error('tanggal') ?></label>
                    <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php if($tanggal){ echo $tanggal; } else { echo date('Y-m-d H:i:s');} ?>" />
                </div>
        	    <div class="form-group">
                    <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                    <input type="text" class="jumlah form-control" name="jumlah" id="jumlah" placeholder="Jumlah barang yang diretur" value="<?php echo $jumlah; ?>" />
                </div>
                <div class="form-group">
                        <label for="int">Stok Akhir</label>
                        <input type="text" class="stokAkhir form-control" readonly="" name="stokAkhir" id="stokAkhir" class="stok" placeholder="Stok produk setelah diretur"  />
                    </div>
        	    <div class="form-group">
                    <label for="int">Modal <?php echo form_error('modal') ?></label>
                    <input type="text" class="form-control" name="modal" id="modal" placeholder="Harga modal produk yang diretur" value="<?php echo $modal; ?>" />
                </div>
        	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('retur') ?>" class="btn btn-default">Cancel</a>

                <script type="text/javascript">
                    $(document).ready(function(){    
                    $('[name="namaSupplier"]').each(function(i,e){   
                        $(this).autocomplete({
                            source: function (request, response) {
                                $.get("<?php echo base_url('Supplier/get_autocomplete/?');?>", request,function(data){
                                    jsonData = JSON.parse(data);
                                    console.log(jsonData);
                                    response($.map(jsonData, function (value, key) {
                                        return {
                                            label: value.name,
                                            data: value,
                                        }
                                    }));
                                });
                            },
                            select: function (event, ui){
                                //tr = $(this).parents('tr');
                                $('[name="namaSupplier"]').val(ui.item.data.name);
                                $('[name="idSuplier"]').val(ui.item.data.idSuplier);
                            }
                        })
                    })
                    })
                    </script>

                    <script type="text/javascript">
                    $(document).ready(function(){    
                    $('[name="namaProduk"]').each(function(i,e){   
                        $(this).autocomplete({
                            source: function (request, response) {
                                $.get("<?php echo base_url('Penjualan/get_autocomplete/?');?>", request,function(data){
                                    jsonData = JSON.parse(data);
                                    console.log(jsonData);
                                    response($.map(jsonData, function (value, key) {
                                        return {
                                            label: value.name,
                                            data: value,
                                        }
                                    }));
                                });
                            },
                            select: function (event, ui){
                                //tr = $(this).parents('tr');
                                $('[name="namaProduk"]').val(ui.item.data.name);
                                $('[name="idProduk"]').val(ui.item.data.idProduk);
                                $('[name="stok"]').val(ui.item.data.stokProduk);
                            }
                        })
                    })
                    })
                    </script>

                    <script type="text/javascript">
                       $(document).ready(function(){
                          //$(document).on("focus", ".jumlah", function(){
                              $(".jumlah").blur(function(){
                                var stokAwal = $(this).parent().parent().find(".stok");
                                var quantity = $(this).parent().parent().find(".jumlah");
                                if (stokAwal.val() !== "" && quantity.val() !== "")
                                  {
                                    $(this).parent().parent().find(".stokAkhir").val(parseInt(stokAwal.val())-parseInt(quantity.val()));
                                }
                                })
                            //})
                        });
                    </script>
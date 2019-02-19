				<?php echo form_open('PembatalanTransaksi/prosesPembatalan'); ?>
				<legend>Pembatalan Transaksi</legend>
					<div class="form-group">
                        <label for="int">Kode Transaksi</label>
                        <input type="text" class="kode_transaksi form-control" name="kode_transaksi" id="kode_transaksi" placeholder="trx_xxxxx" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Produk</label>
                        <input type="text" class="id_produk form-control" name="id_produk" id="id_produk"/>
                    </div>
                    <div class="form-group">
                        <label for="int">Nilai Transaksi</label>
                        <input type="text" class="modalTransaksi form-control" name="modalTransaksi" id="modalTransaksi" style="" placeholder="Modal yang dibatalkan" />
                        <input type="text" class="nilaiTransaksi form-control" name="nilaiTransaksi" id="nilaiTransaksi" placeholder="Penjualan yang dibatalkan"/>
                        <input type="text" class="nilaiProfit form-control" name="nilaiProfit" id="nilaiProfit" placeholder="Profit yang dibatalkan" />
                    </div>
                    <div class="form-group">
                        <label for="int">Jumlah</label>
                        <input type="text" class="jumlah form-control" name="jumlah" id="jumlah" placeholder="Jumlah pembelian"/>
                    </div>
                    <hr>
                    <input class="btn btn-primary pull-left" type="submit" value="PROSES" name="submit" onclick="return confirm('Proses transaksi?')">
                <?php echo form_close();
                 ?>

                <script type="text/javascript">
			    $(document).ready(function(){    
			    $('[name="kode_transaksi"]').each(function(i,e){   
			        $(this).autocomplete({
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
			                $('[name="kode_transaksi"]').val(ui.item.data.id_transaksi);
			                $('[name="id_produk"]').val(ui.item.data.id_produk);
			                $('[name="modalTransaksi"]').val(ui.item.data.modal);
			                $('[name="nilaiTransaksi"]').val(ui.item.data.total);
			                $('[name="jumlah"]').val(ui.item.data.jumlah);
			            }
			        })
			    })
			    })
			    </script>

			    <script type="text/javascript">
						$(document).ready(function(){
			          		$(document).on("blur", ".kode_transaksi", function(){
			          			var modal = $("#modalTransaksi").val();
			    				var jual = $("#nilaiTransaksi").val();
			          			$("input[type=text][name=nilaiProfit]").val(parseInt(jual) - parseInt(modal));	
			            	})
			        	});
					</script>
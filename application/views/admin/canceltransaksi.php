				<?php echo form_open('PembatalanTransaksi/index'); ?>
				<legend>Pembatalan Transaksi</legend>
					<div class="form-group">
                        <label for="int">Kode Transaksi</label>
                        <input type="text" class="kode_transaksi form-control" name="kode_transaksi" id="kode_transaksi" placeholder="trx_xxxxx" />
                    </div>
                    <div class="form-group">
                        <label for="int">Nilai Transaksi</label>
                        <input type="text" class="nilaiTransaksi form-control" name="nilaiTransaksi" id="nilaiTransaksi" placeholder="Total nilai penjualan"/>
                    </div>
                    <hr>
                    <input class="btn btn-primary pull-left" type="submit" value="PROSES" name="submit" onclick="return confirm('Proses transaksi?')">
                <?php echo form_close();?>

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
			                $('[name="nilaiTransaksi"]').val(ui.item.data.nilai);
			            }
			        })
			    })
			    })
			    </script>
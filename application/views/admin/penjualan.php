			<?php echo form_open('Penjualan/prosesTransaksi'); ?>
					<legend>Transaksi Penjualan | <?php echo date('Y-m-d'); ?></legend>
                       <label>Jenis</label><input type="text" name="jenis"  class="type form-control input-sm" value="umum">
                       <label>Pelanggan</label><input type="text" name="pelanggan" class="customer form-control input-sm" value="umum">
                       <input type="hidden" id="idUser" name="idUser" class="form-control input-sm" value="<?php echo $_SESSION['user_id'];?>">
					   <table style="width: 100%" class="table">
							<thead>
								<tr>
									<th>No</th>
                                    <th style="display: none" >Id</th>
                                    <th>Nama Produk</th>
                                    <th style="display: none">Modal</th>
                                    <th>Harga</th>
                                    <th style="display: none">Stok Awal</th>
                                    <th>Banyaknya</th>
                                    <th style="display: none">Stok Akhir</th>
                                    <th style="display: none">Total Modal</th>
                                    <th>Diskon (%)</th>
                                    <th>Sub total</th>
								</tr>
							</thead>
							<tbody id="table-details">
                                <tr id="row1" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">1</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td style="display: none" ><input type="text" id="idProduk" name="idProduk[]"  class="idProduk form-control input-sm"></td>
                                    <td><input type="text" id="nama" name="nama[]" autofocus=""  class="nama form-control input-sm"></td>
                                    <td  style="display: none" ><input type="text" name="hargaModal[]" class="hargaModal form-control input-sm" ></td>
                                    <td><input type="text" readonly="" name="jual[]" class="jual form-control input-sm" ></td>
                                    <td style="display: none"><input type="text" name="stokAwal[]" class="stokAwal form-control input-sm"></td>
                                    <td><input type="text" name="jumlah[]" class="jumlah form-control input-sm"></td>
                                    <td style="display: none"><input type="text" name="stokAkhir[]" class="stokAkhir form-control input-sm"></td>
                                    <td style="display: none"><input type="text" name="totalModal[]" class="totalModal form-control input-sm" readonly></td>
                                    <td><input type="text" name="diskon[]" class="diskon form-control input-sm" value="0"></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary btn-sm btn-add-more">Tambah</button>
                        <button class="btn btn-sm btn-warning btn-remove-detail-row"><i class="fas fa-minus-square"></i></button>
                        <table style="width: 100%" class="hitungan table">
                         <tr><td><input type="hidden"  required="" class="grandTotalModal form-control input-sm" placeholder="Grand Total modal" name="grandTotalModal" readonly></td></tr>
                         <tr><td><input type="text" required="" name="grand-total" class="grand-total form-control input-sm" placeholder="Grand Total" readonly></td></tr>
                         <tr><td><input type="text" class="bayar form-control input-sm" placeholder="Bayar" name="bayar"></td></tr>
                         <tr><td><input type="text"  required="" class="kembali form-control input-sm" placeholder="Kembali" name="kembali" readonly></td></tr>
                     </table>
                    <div class="col-md-12">
                        <hr>
                        <input class="btn btn-primary pull-left" type="submit" value="PROSES" name="submit" onclick="return confirm('Proses transaksi?')">
                    </div>
                <?php echo form_close();?>
                <div id="info" class="info"></div>
			    <script type="text/javascript">
			    $(document).on("focus", ".table", function(){    
			    $('[name="nama[]"]').each(function(i,e){   
			        $(this).autocomplete({
			            source: function (request, response) {
			                $.get("<?php echo base_url('Penjualan/get_autocomplete/?');?>", request,function(data){
			                    jsonData = JSON.parse(data);
			                    //console.log(jsonData);
			                    response($.map(jsonData, function (value, key) {
			                        return {
			                            label: value.name,
			                            data: value,
			                        }
			                    }));
			                });
			            },
			            select: function (event, ui){
			                tr = $(this).parents('tr');
			                tr.find('[name="nama[]"]').val(ui.item.data.name);
			                tr.find('[name="idProduk[]"]').val(ui.item.data.idProduk);
			                tr.find('[name="hargaModal[]"]').val(ui.item.data.modal);
			                tr.find('[name="jual[]"]').val(ui.item.data.jual);
			                tr.find('[name="stokAwal[]"]').val(ui.item.data.stokProduk);
			            }
			        })
			    })
			    })
			    </script>
			    
			    <script>
			    	$(document).ready(function (){
			    		$("body").on('click', '.btn-add-more', function (e) {
			    			e.preventDefault();
			    			var $sr = ($(".jdr1").length + 1);
			    			var rowid = Math.random();
			    			var $html = '<tr class="jdr1" id="' + rowid + '">' +
			    			'<td><span class="btn btn-sm btn-default">' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"></td>' + 
			                '<td style="display: none"><input type="text" name="idProduk[]" class="idProduk form-control input-sm"></td>'+
			                '<td><input type="text" id="nama" name="nama[]" autofocus="" class="nama form-control input-sm"></td>'+
			                '<td style="display: none"><input type="text" name="hargaModal[]" class="hargaModal form-control input-sm" ></td>'+
			                '<td><input type="text" readonly name="jual[]" class="jual form-control input-sm" ></td>'+
			                '<td style="display: none"><input type="text" name="stokAwal[]" class="stokAwal form-control input-sm"></td>'+
			                '<td><input type="text" name="jumlah[]" class="jumlah form-control input-sm"></td>'+
			                '<td style="display: none"><input type="text" name="stokAkhir[]" class="stokAkhir form-control input-sm"></td>'+
			                '<td style="display: none"><input type="text" name="totalModal[]" class="totalModal form-control input-sm" readonly></td>'+
			                '<td><input type="text" name="diskon[]" class="diskon form-control input-sm"></td>'+
			                '<td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>'+
			    			'</tr>';
			    			$("#table-details").append($html);
			    		});
			    		$("body").on('click', '.btn-remove-detail-row', function (e) {
			    			e.preventDefault();
			    			if($("#table-details tr:last-child").attr('id') != 'row1'){
			    				$("#table-details tr:last-child").remove();
			    			}
			    		});
			    		$("body").on('focus', ' .datepicker', function () {
			    			$(this).datepicker({
			    				dateFormat: "yy-mm-dd"
			    			});
			    		});
			    	});
			    </script>
			    <!--cari stok awal, kurangi dengan jumlah beli, simpan di stok akhir, update stok item belanja ke database dengan update_batch-->
			    <script type="text/javascript">
			       $(document).ready(function(){
			          $(document).on("focus", ".table", function(){
			              $(".jumlah").blur(function(){
			                var stokAwal = $(this).parent().parent().find(".stokAwal");
			                var quantity = $(this).parent().parent().find(".jumlah");
			                if (stokAwal.val() !== "" && quantity.val() !== "") {
			                    $(this).parent().parent().find(".stokAkhir").val(parseInt(stokAwal.val())-parseInt(quantity.val()));
			                }
			                //if (stokAwal.val() < quantity.val()) {
			                    //alert('Jumlah stok tidak cukup, tersisa ' + stokAwal.val());
			                //}
			                //console.log(quantity.val());
			                //console.log(stokAwal.val());
			                })
			            })
			        });
			    </script>
			    <!--Tampilkan notifikasi jika stok kurang-->

			    <!--Mencari total modal dan total belanja-->
			    <script type="text/javascript">
			        $(document).ready(function(){
			          $(document).on("focus", ".table", function(){
			          $(".diskon").blur(function(){
			            var hargaModalObj = $(this).parent().parent().find(".hargaModal");
			            var priceObj = $(this).parent().parent().find(".jual");
			            var quantityObj = $(this).parent().parent().find(".jumlah");
			            var nilaiDiskon = $(this).parent().parent().find(".diskon");
			            var diskon = parseInt(priceObj.val()) * parseInt(nilaiDiskon.val()) / 100 * parseInt(quantityObj.val());
			            //console.log(diskon);
			            if (priceObj.val() !== "" && quantityObj.val() !== "")
			              {
			                $(this).parent().parent().find(".total").val(parseInt(priceObj.val()) * parseInt(quantityObj.val()) - diskon);
			         
			                //$(this).parent().parent().find(".total").val(jumlahAhir);
			                $(this).parent().parent().find(".totalModal").val(parseInt(hargaModalObj.val()) * parseInt(quantityObj.val())); 
			              }
			            // mencari grand total;
			            var total = 0;
			            $(".total").each(function(i,e){
			              if (e.value !== "")
			                total += parseInt(e.value);
			            });
			            $(".grand-total").val(total);

			            // mencari total modal
			            var total_modal = 0;
			            $(".totalModal").each(function(i,e){
			              if (e.value !== "")
			                total_modal += parseInt(e.value);
			            });
			            $(".grandTotalModal").val(total_modal);

			          });
			          });
			        });
			    </script>
			    <!--mencari harga diskon-->
			    <script type="text/javascript">
			    	$(document).on("focus", ".table", function(){   
						var diskon = $( '[name="diskon[]"]' ).val();
			    		//console.log(diskon);
			    		$( '[name="diskon[]"]' ).each(function(i,e){
			    			//document.write("urutan"+i+"isinya"+e+"<br>");
			    			//console.log('urutan '+i+' isinya'+e);
			    			//console.log(".diskon");
			    		})
			    	});
			    	//$( '[name="diskon[]"]' ).each(function( index ) {
						  //console.log( index + ": " + $( this ).text() );
						//});
			    </script>

			    <!--Mencari uang kembali-->
			    <script type="text/javascript">
			        $(document).ready(function(){
			           $(document).on("focus", ".table", function(){
			            var grandTotalObj = $(this).parent().parent().find(".grand-total");
			            var bayarObj = $(this).parent().parent().find(".bayar");
			            if (grandTotalObj.val() !== "")
			              {     
			                $(this).parent().parent().find(".kembali").val(parseInt(bayarObj.val()) - parseInt(grandTotalObj.val()));
			              }
			          });
			        });
			    </script>
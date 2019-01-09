<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Transaksi | Apotek Budi Farma</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2>Apotek Budi Farma<small> | Jl Raya Tajur</small></h2>
			<p><a class="btn btn-primary btn-lg" href="#"><?php echo "Ahmad Bagwi | Shift 1"; ?> </a> 081288888888</p>
		</div>
		<div class="row jumbotron">
			<!--<form method="POST" action="" id="frm_submit">-->
                <?php echo form_open('Transaction/prosesTransaksi'); ?>
				<div class="col-md-12">
					<fieldset><legend>Transaksi Detail | <?php echo date('Y-m-d | h:i:j'); ?></legend>
						<input type="hidden" disabled="" value="<?php echo date('Y-m-d h:i:j'); ?>" name="transaction_date[]">
						<table style="width: 100%" class="table">
							<thead>
								<tr>
									<th>No</th>
                                    <th>ID Transaksi</th>
									<th>Nama Produk</th>
                                    <th>Tanggal</th>
                                    <th>Tipe</th>
                                    <th>User</th>
                                    <th>Customer</th>
                                    <th>ID Produk</th>
                                    <th>Harga Modal</th>
									<th>Harga</th>
									<th>Banyak</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody id="table-details">
                                <tr id="row1" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">1</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td><input type="text" name="idTransaksi[]" class="id form-control input-sm"></td>
                                    <td><input type="text" name="name[]" class="name form-control input-sm"></td>
                                    <td><input type="text" name="date[]"  class="date form-control input-sm datepicker" placeholder="Date"></td>
                                    <td><input type="text" name="type[]"  class="type form-control input-sm"></td>
                                    <td><input type="text" name="user[]"  class="user form-control input-sm"></td>
                                    <td><input type="text" name="customer[]"  class="customer form-control input-sm"></td>
                                    <td><input type="text" name="idProduct[]"  class="product form-control input-sm"></td>
                                    <td><input type="text" name="stockPrice[]"  class="customer form-control input-sm"></td>
                                    <td><input type="text" name="price[]" class="price form-control input-sm" ></td>
                                    <td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>
                                </tr>
                                <!--<tr id="row2" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">2</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td><input type="text" name="name[]" class="name form-control input-sm"></td>
                                    <td><input type="text" name="price[]" class="price form-control input-sm" ></td>
                                    <td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>
                                </tr>
                                <tr id="row3" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">3</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td><input type="text" name="name[]" class="name form-control input-sm"></td>
                                    <td><input type="text" name="price[]" class="price form-control input-sm" ></td>
                                    <td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>
                                </tr>
                                <tr id="row4" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">4</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td><input type="text" name="name[]" class="name form-control input-sm"></td>
                                    <td><input type="text" name="price[]" class="price form-control input-sm" ></td>
                                    <td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>
                                </tr>
                                <tr id="row5" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">5</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td><input type="text" name="name[]" class="name form-control input-sm"></td>
                                    <td><input type="text" name="price[]" class="price form-control input-sm" ></td>
                                    <td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>-->
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary btn-sm btn-add-more">Tambah</button>
                        <button class="btn btn-sm btn-warning btn-remove-detail-row"><i class="glyphicon glyphicon-remove"></i></button>
                        <table style="width: 100%" class="hitungan table">
                         <tr><td><input type="text" required="" name="grand-total" class="grand-total form-control input-sm" placeholder="Grand Total" readonly></td></tr>
                         <tr><td><input type="text" class="bayar form-control input-sm" placeholder="Bayar" name="bayar"></td></tr>
                         <tr><td><input type="text"  required="" class="kembali form-control input-sm" placeholder="Kembali" name="kembali" readonly></td></tr>
                     </table>
                    </fieldset><!--fieldset-->
                    <div class="col-md-12">
                        <hr>
                        <input class="btn btn-success pull-left" type="submit" value="PROSES" name="submit">
                    </div>
                </div><!--div-col-12-->
            <?php echo form_close();?>
            <!--</form>form-->
	    </div><!--row jumbotron-->
    	<div class="row">
    		<div class="alert alert-dismissable alert-success" style="display: none">
    			<button type="button" class="close" data-dismiss="alert">×</button>
    			<strong>Transaksi berhasil</strong>.
    		</div>
    		<div class="alert alert-dismissable alert-danger"  style="display: none">
    			<button type="button" class="close" data-dismiss="alert">×</button>
    			<strong>Transaksi gagal</strong>
    		</div>
    	</div><!--row alert-->
    </div><!--container-->    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js">
    </script>
    <script>
    	$(document).ready(function (){
    		$("body").on('click', '.btn-add-more', function (e) {
    			e.preventDefault();
    			var $sr = ($(".jdr1").length + 1);
    			var rowid = Math.random();
    			var $html = '<tr class="jdr1" id="' + rowid + '">' +
    			'<td><span class="btn btn-sm btn-default">' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"></td>' + 
    			/*'<td><input type="text" name="name[]" class="name form-control input-sm"></td>' +
    			'<td><input type="text" name="price[]" class="price form-control input-sm" ></td>' +
    			'<td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>' +
    			'<td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>' +
                */
    			'<td><input type="text" name="idTransaksi[]" class="id form-control input-sm"></td>' +
                '<td><input type="text" name="name[]" class="name form-control input-sm"></td>' +
                '<td><input type="text" name="date[]" class="date form-control input-sm datepicker"></td>' +
                '<td><input type="text" name="type[]"  class="type form-control input-sm"></td>' +
                '<td><input type="text" name="user[]"  class="user form-control input-sm"></td>' +
                '<td><input type="text" name="customer[]"  class="customer form-control input-sm"></td>' +
                '<td><input type="text" name="idProduct[]"  class="product form-control input-sm"></td>' +
                '<td><input type="text" name="stockPrice[]"  class="customer form-control input-sm"></td>' +
                '<td><input type="text" name="price[]" class="price form-control input-sm" ></td>' +
                '<td><input type="text" name="quantity[]" class="quantity form-control input-sm"></td>' +
                '<td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>' +
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
    		$("#frm_submit").on('submit', function (e) {
    			e.preventDefault();
    			$.ajax({
    				url: '<?php echo base_url() ?>Transaction/get_transaction',
    				type: 'POST',
    				data: $("#frm_submit").serialize()
    			}).always(function(response){
    				var r = (response.trim());
    				if(r == 1){
    					$(".alert-success").show();
    				}
    				else{
    					$(".alert-danger").show();
    				}
    			});
    		});
    	});
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $(document).on("change", ".jdr1", function(){
          $(".quantity").keyup(function(){
            var priceObj = $(this).parent().parent().find(".price");
            var quantityObj = $(this).parent().parent().find(".quantity");
            if (priceObj.val() !== "" && quantityObj.val() !== "")
              {
                $(this).parent().parent().find(".total").val(parseInt(priceObj.val()) * parseInt(quantityObj.val()));
              }
            // Update the grant total;
            var total = 0;
            $(".total").each(function(i,e){
              if (e.value !== "")
                total += parseInt(e.value);
            });
            $(".grand-total").val(total);
          });
          });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $(document).on("change", ".hitungan", function(){
          //$(".total").keyup(function(){
            var grandTotalObj = $(this).parent().parent().find(".grand-total");
            var bayarObj = $(this).parent().parent().find(".bayar");
            if (grandTotalObj.val() !== "")
              {     
                $(this).parent().parent().find(".kembali").val(parseInt(bayarObj.val()) - parseInt(grandTotalObj.val()));
              }
          });
        });
    </script>
</body>
</html>
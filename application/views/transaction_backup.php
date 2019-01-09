<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Transaksi | Apotek Budi Farma</title>
    <!--<script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2>Apotek Budi Farma<small> | Jl Raya Tajur</small></h2>
			<p><a class="btn btn-primary btn-lg" href="#"><?php echo "Ahmad Bagwi | Shift 1"; ?> </a> 081288888888</p>
		</div>
		<div class="row jumbotron">
			<form method="POST" action="" id="frm_submit">
				<div class="col-md-12">
					<fieldset><legend>Transaksi Detail | <?php echo date('Y-m-d | h:i:j'); ?></legend>
						<!-- Text input-->
						<input type="hidden" disabled="" value="<?php echo date('Y-m-d h:i:j'); ?>" name="transaction_date[]">
                        <div class="transaksi">
						<table style="width: 100%" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Produk</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>Sub Total</th><!--<th>Passenger</th><th>From</th><th>To</th><th>Ticket No.</th><th>Amount</th>-->
								</tr>
							</thead>
							<tbody id="table-details">
                            <div "class="transaksi_beli"">
                            <tr id="row1" class="jdr1">
								<td><span class="btn btn-sm btn-default">1</span><input type="hidden" value="6437" name="count[]"></td>
								<td><input type="text" required="" name="name[]" class="name form-control input-sm" placeholder="Ketik nama produk"></td>
								<td><input type="text" required="" name="price[]" class="price form-control input-sm" placeholder="Harga produk" ></td>
								<td><input type="text" required="" name="quantity[]" class="quantity form-control input-sm" placeholder="Jumlah beli" ></td>
								<td><input type="text" required="" class="form-control input-sm" name="total[]" class="total" placeholder="Total" ></td>
                                <!--<td><input type="text" required="" class="form-control input-sm datepicker" placeholder="Date" name="transaction_date[]"></td>-
								<td><input type="text" required="" class="form-control input-sm datepicker" placeholder="Date" name="jdate[]"></td>
								<td><input type="text" required="" class="form-control input-sm" placeholder="Travel by" name="jtype[]"></td>
								<td><input type="text" required="" data-parsley-type="number" class="form-control input-sm" placeholder="Paasenger count" name="jpassanger[]"></td>
								<td><input type="text" required="" class="form-control input-sm" placeholder="Depart from" name="jfrom[]"></td>
								<td><input type="text" required="" class="form-control input-sm" placeholder="Destination" name="jto[]"></td>
								<td><input type="text" required="" class="form-control input-sm" placeholder="Ticket No." name="jticket_no[]"></td>
								<td><input type="text" required="" data-parsley-type="digits" class="form-control input-sm" placeholder="Amount" name="jamount[]"></td>-->
							</tr>
                            </div>
						  </tbody>
					</table>
                </div>
                    <button class="btn btn-primary btn-sm btn-add-more">Tambah</button>
                    <button class="btn btn-sm btn-warning btn-remove-detail-row"><i class="glyphicon glyphicon-remove"></i></button>
					<table style="width: 100%" class="table">
							<tr><td><input type="text" required="" name="grand-total" class="grand-total form-control input-sm" placeholder="Grand Total" \></td></tr>
							<tr><td><input type="text" class="form-control input-sm" placeholder="Bayar" name="transaction_pay"></td></tr>
							<tr><td><input type="text" disabled="" required="" class="form-control input-sm" placeholder="Kembali" name="transaction_cash"></td></tr>
					</table>
					
				</fieldset>
			</div>
			<div class="col-md-12">
				<hr>
				<input class="btn btn-success pull-left" type="submit" value="PROSES" name="submit">
			</div>
		</form>
	</div>
	<div class="row">
		<div class="alert alert-dismissable alert-success" style="display: none">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Transaksi berhasil</strong>.
		</div>
		<div class="alert alert-dismissable alert-danger"  style="display: none">
			<button type="button" class="close" data-dismiss="alert">×</button>
			<strong>Transaksi gagal</strong>
		</div>
	</div>
</div>
<!--<script src="<?php //echo base_url('assets/js/'); ?>jquery-1.11.2.min.js"></script>-->

<!--<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>-->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
  $(".price, .quantity").keyup(function(){
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
</script>

<script type="text/javascript">
    /*masih failed hahah
    $(".transaksi_beli").on("change keyup keydown paste propertychange bind mouseover", function(){
        calculateSum();
    });

    function calculateSum() {
        var sum = 0;
        $(".subtotal").each(function() {
            if(!isNaN(this.value) && this.value.length!=0) {

                var quntity = $(this).closest("tr").find("input.quntity:text").val();
                var price = $(this).closest("tr").find("input.price:text").val();

                var subTot = (quntity * price);

                $(this).val(subTot.toFixed(2));

                sum += parseFloat(subTot.toFixed(2));
            }
        });
        $('#total').val(sum.toFixed(2));
    }

    add fields
    $( "#clicca" ).click(function() {
        $( "#foo" ).append(
            '<ul>' + '\n\r' +
            '<li>Quantità: <span><input type="text" name="product_quntity" value="" class="product_quntity"></span></li>' + '\n\r' +
            '<li>product_price unitario: <span><input type="text" name="product_priceUnitario" value="" class="product_price"></span></li>' + '\n\r' +
            '<li>product_price totale: <span><input type="text" name="product_priceTotale" value="0.00" class="somma"></span></li>' + '\n\r' +
            '</ul>' 
            );

        $(".somma").each(function() {
            $(this).keyup(function(){
                calculateSum();

            });
        });

    });
    */
    // function    
    

            /*
            var banyak = $("#product_quantity").serialize();
            var harga = $("#product_price").serialize();
            var jumlah = harga*banyak;
            $("#sub_total").serialize(jumlah);
            $("span").text(banyak);
            */
</script>
<!--
<script type="text/javascript">
    $("#product_quantity").on("input", function() {
            var banyak = $("#product_quantity[]").val();
            var harga = $("#product_price[]").val();
            var jumlah = harga*banyak;
            $("#sub_total[]").val(jumlah);
        });
</script> -->
<!--
<script type="text/javascript">
    $(".product_quantity[]").change(function(){
            var price = $('.product_price').val();
            var quantity = $('.product_quantity').val();
            var subtotal = $('.product_price').val(price)* $('.product_price').val(quantity);
            $(".sub_total[]").val(subtotal);
        });
        function updatePrice(val)
        {
            $(".product_quantity[]").val(val);
            $(".product_quantity[]").trigger('change');
        }
        updatePrice(2);

</script>
-->
<script>

	$(document).ready(function (){
		$("body").on('click', '.btn-add-more', function (e) {
			e.preventDefault();
			var $sr = ($(".jdr1").length + 1);
			var rowid = Math.random();
			var $html = '<tr class="jdr1" id="' + rowid + '">' +
			'<td><span class="btn btn-sm btn-default">' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"></td>' + 
			'<td><input type="text" id="product_name[]" name="product_name[]" placeholder="Ketik Nama produk" class="form-control input-sm"></td>' +
			'<td><input type="text" id="product_price[]" name="product_price[]" placeholder="Harga produk" class="form-control input-sm"></td>' +
			'<td><input type="text" id="product_quantity[]" name="product_quantity[]" placeholder="Jumlah beli" class="form-control input-sm" "></td>' +
			'<td><input type="text" readonly="readonly" id="sub_total[]" name="sub_total[]" onChange="updatePrice()" placeholder="Sub total" class="form-control input-sm"></td>' +
			/*
			'<td><input type="text" name="jdate[]" placeholder="Date" class="form-control input-sm datepicker"></td>' +
			'<td><input type="text" name="jtype[]" placeholder="Travel by" class="form-control input-sm"></td>' +
			'<td><input type="text" name="jpassanger[]" placeholder="Paasenger count" class="form-control input-sm"></td>' +
			'<td><input type="text" name="jfrom[]" placeholder="Depart from" class="form-control input-sm"></td>' +
			'<td><input type="text" name="jto[]" placeholder="Destination" class="form-control input-sm"></td>' +
			'<td><input type="text" name="jticket_no[]" placeholder="Ticket No." class="form-control input-sm"></td>' +
			'<td><input type="text" name="jamount[]" placeholder="Amount" class="form-control input-sm"></td>' +*/
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
			}).always(function (response){
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
</body>
</html>

<!--
<!DOCTYPE html>
<html>
    <head>
        <title>Transaksi Apotek Budi Farma</title>
        <style>
            body{
                padding: 15px
            }
            input[type="text"]{
                margin-bottom: 0px !important;
            }
        </style>
         <link rel="stylesheet" href="<?php// echo base_url('assets/adminlte/'); ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
    </head>
    <body>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6">
    				<?php// form_open('Transaction/proccess');?>
    				<table>
    					<tr>
    						<th>Produk</th>
    						<th>Qty</th>
    						<th>Harga</th>
    						<th>Sub-total</th>
    					</tr>
    					<tr>
    						<td><input type="text" name="produk[]"></td>
    						<td><input type="text" name="qty[]"></td>
    						<td><input type="text" name="harga[]"></td>
    						<td><input type="text" name="sub-total[]"></td>
    					</tr>
    					<tr>
    						<td><input type="text" name="produk[]"></td>
    						<td><input type="text" name="qty[]"></td>
    						<td><input type="text" name="harga[]"></td>
    						<td><input type="text" name="sub-total[]"></td>
    					</tr>
    					<tr>
    						<td><input type="text" name="produk[]"></td>
    						<td><input type="text" name="qty[]"></td>
    						<td><input type="text" name="harga[]"></td>
    						<td><input type="text" name="sub-total[]"></td>
    					</tr>
    				</table>
    				<?php //echo form_close(); ?>
    	
    	<div class="col-md-6">
        <div class="row">
            <div class="span6">
                <form action="index.php" method="post">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>Nama product</th>
                                <th>Banyak</th>
                                <th>product_price</th>
                                <th>amount</th>
                                <th ></th>
                            </tr>
                        </thead>
                        
                        <tbody id="itemlist">
                            <tr>
                                <td><input name="product_input[0]" class="input-block-level" autofocus="autofocus" /></td>
                                <td><input name="quantity_input[0]" class="input-block-level" /></td>
                                 <td><input name="product_price_input[0]" class="input-block-level" /></td>
                                  <td><input name="amount_input[0]" class="input-block-level" /></td>
                                <td></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button class="btn btn-small btn-default" onclick="additem(); return false"><i class="icon-plus"></i>+</button>
                                    <button name="submit" class="btn btn-small btn-primary"><i class="icon-ok"></i>Simpan</button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
 
 
            </div>
            <div class="span6">
               
                <p>
                    <?php/*
                    if (isset($_POST['submit'])) {
                        $product = $_POST['product_input'];
                        $quantity = $_POST['quantity_input'];
 						$product_price = $_POST['product_price_input'];
 						$amount = $_POST['amount_input'];
                        foreach ($jenis as $key => $j) {
                            echo "<p>" . $j . " : " . $amount[$key] . "</p>";
                        }
                    }*/
                    ?>
                </p> 
            </div>
        </div>
    </div>
    	
        <script>
            var i = 1;
            function additem() {
//                menentukan target append
                var itemlist = document.getElementById('itemlist');
                
//                membuat element
                var row = document.createElement('tr');
                var product = document.createElement('td');
                var quantity = document.createElement('td');
                var product_price = document.createElement('td');
                var amount = document.createElement('td');
                var aksi = document.createElement('td');
 
//                meng append element
                itemlist.appendChild(row);
                row.appendChild(product);
                row.appendChild(quantity);
                row.appendChild(product_price);
                row.appendChild(amount);
                row.appendChild(aksi);
 
//                membuat element input
                var product_input = document.createElement('input');
                product_input.setAttribute('name', 'product_input[' + i + ']');
                product_input.setAttribute('class', 'input-block-level');
 
                var quantity_input = document.createElement('input');
                quantity_input.setAttribute('name', 'quantity_input[' + i + ']');
                quantity_input.setAttribute('class', 'input-block-level');

                var product_price_input = document.createElement('input');
                product_price_input.setAttribute('name', 'product_price_input[' + i + ']');
                product_price_input.setAttribute('class', 'input-block-level');

                var amount_input = document.createElement('input');
                amount_input.setAttribute('name', 'amount_input[' + i + ']');
                amount_input.setAttribute('class', 'input-block-level');
 
                var hapus = document.createElement('span');
 
//                meng append element input
                product.appendChild(product_input);
                quantity.appendChild(quantity_input);
                price.appendChild(product_price_input);
                amount.appendChild(amount_input);
                aksi.appendChild(hapus);
 
                hapus.innerHTML = '<button class="btn btn-small btn-default"><i class="icon-trash"></i>X</button>';
//                membuat aksi delete element
                hapus.onclick = function () {
                    row.parentNode.removeChild(row);
                };
 
                i++;
            }
        </script>
    </body>
</html>-->
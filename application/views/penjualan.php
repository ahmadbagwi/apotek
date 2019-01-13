<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            echo "anda user biasa 0"."<br>";
            $idadmin = $_SESSION['user_id'];
            echo $idadmin."<br>";
        }
    }
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Transaksi | Apotek Budi Farma</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>material-fullpalette.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>jquery-ui.css">
    <script src="<?php echo base_url('assets/js/'); ?>jquery-3.3.1.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
    <script src="<?php echo base_url('assets/bootstrap/js/'); ?>bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>material.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<h2>Apotek Budi Farma<small> | Jl Raya Tajur</small></h2>
			<p><a class="btn btn-primary btn-lg" href="#"><?php echo "Ahmad Bagwi | Shift 1"; ?> </a> 081288888888</p>
		</div>
		<div class="row jumbotron">
                <?php echo form_open('Penjualan/prosesTransaksi'); ?>
				<div class="col-md-12">
					<fieldset><legend>Transaksi Detail | <?php echo date('Y-m-d | h:i:j'); ?></legend>
					   <?php
                            
                            $tanggal = date('Y-m-d H:i:s');
                       ?>
                       <input type="text" name="jenis"  class="type form-control input-sm" placeholder="Jenis transaksi" value="umum">
                       <input type="text" name="pelanggan" class="customer form-control input-sm" placeholder="Pelanggan" value="umum">
                       <input type="text" name="tanggal"  class="form-control input-sm"  value="<?php echo $tanggal; ?>">
                       <input type="text" name="idUser"  class="user form-control input-sm"  value="<?php echo $idadmin;?>">
					   <table style="width: 100%" class="table">
							<thead>
								<tr>
									<th>No</th>
                                    <th>Id</th>
                                    <th>Nama Produk</th>
                                    <th>Modal</th>
                                    <th>Jual</th>
                                    <th>Jumlah</th>
                                    <th>Total Modal</th>
                                    <th>Total</th>
								</tr>
							</thead>
							<tbody id="table-details">
                                <tr id="row1" class="jdr1">
                                    <td><span class="btn btn-sm btn-default">1</span><input type="hidden" value="6437" name="count[]"></td>
                                    <td><input type="text" id="idProduk" name="idProduk[]"  class="idProduk form-control input-sm"></td>
                                    <td><input type="text" id="nama" name="nama[]" autofocus=""  class="nama form-control input-sm"></td>
                                    <td><input type="text" name="hargaModal[]" class="hargaModal form-control input-sm" ></td>
                                    <td><input type="text" name="jual[]" class="jual form-control input-sm" ></td>
                                    <td><input type="text" name="jumlah[]" class="jumlah form-control input-sm"></td>
                                    <td><input type="text" name="totalModal[]" class="totalModal form-control input-sm" readonly></td>
                                    <td><input type="text" name="total[]" class="total form-control input-sm" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary btn-sm btn-add-more">Tambah</button>
                        <button class="btn btn-sm btn-warning btn-remove-detail-row"><i class="glyphicon glyphicon-remove"></i></button>
                        <table style="width: 100%" class="hitungan table">
                         <tr><td><input type="text"  required="" class="grandTotalModal form-control input-sm" placeholder="Grand Total modal" name="grandTotalModal" readonly></td></tr>
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
    
    <script type="text/javascript">
        $(document).on("focus", ".table", function(){
            $('[name="nama[]"]').each(function(i,e){
                $(this).autocomplete({
                  source: "<?php echo base_url('Penjualan/get_autocomplete/?');?>",
                  select: function (event, ui){
                    $('[name="idProduk[]"]').val(ui.item.idProduk);
                    $('[name="namaProduk[]"]').val(ui.item.namaProduk);
                    $('[name="hargaModal[]"]').val(ui.item.modal);
                    $('[name="jual[]"]').val(ui.item.jual);
                  }
                })
            })
        });
    </script>
    <!-- aslli autocomplete hanya nama
    <script type="text/javascript">
        $(document).on("focus", ".table", function(){
            $('[id="nama[]"]').each(function(key,value){
                $(this).autocomplete({
                  source: "<?php //echo base_url('Penjualan/get_autocomplete/?');?>",
                  /*select: function (event, ui){
                    $('[name="idProduk[]"]').val(ui.item.idProduk);
                    $('[name="nama[]"]').val(ui.item.nama);
                    $('[name="hargaModal[]"]').val(ui.item.modal);
                    $('[name="jual[]"]').val(ui.item.jual);
                  }*/
                })
            })
        });
    </script>-->
    <!--
     <script type="text/javascript">
        $(document).on("focusin",'[name="hargaModal[]"]', function(){
            $.ajax({
                url: '<?php// echo base_url() ?>Penjualan/ambil_harga',
                type: 'GET',
                data: $("#nama").serialize(),
                success: function(res) {
                }
             });
        });
    </script>-->
    <!--Menambah row baru-->  
    <script>
    	$(document).ready(function (){
    		$("body").on('click', '.btn-add-more', function (e) {
    			e.preventDefault();
    			var $sr = ($(".jdr1").length + 1);
    			var rowid = Math.random();
    			var $html = '<tr class="jdr1" id="' + rowid + '">' +
    			'<td><span class="btn btn-sm btn-default">' + $sr + '</span><input type="hidden" name="count[]" value="'+Math.floor((Math.random() * 10000) + 1)+'"></td>' + 
                '<td><input type="text" name="idProduk[]" class="idProduk form-control input-sm"></td>'+
                '<td><input type="text" id="nama" name="nama[]" autofocus="" class="nama form-control input-sm"></td>'+
                '<td><input type="text" name="hargaModal[]" class="hargaModal form-control input-sm" ></td>'+
                '<td><input type="text" name="jual[]" class="jual form-control input-sm" ></td>'+
                '<td><input type="text" name="jumlah[]" class="jumlah form-control input-sm"></td>'+
                '<td><input type="text" name="totalModal[]" class="totalModal form-control input-sm" readonly></td>'+
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
    <!--Mencari total modal dan total belanja-->
    <script type="text/javascript">
        $(document).ready(function(){
          $(document).on("focus", ".table", function(){
          $(".jumlah").blur(function(){
            var hargaModalObj = $(this).parent().parent().find(".hargaModal");
            var priceObj = $(this).parent().parent().find(".jual");
            var quantityObj = $(this).parent().parent().find(".jumlah");
            if (priceObj.val() !== "" && quantityObj.val() !== "")
              {
                $(this).parent().parent().find(".total").val(parseInt(priceObj.val()) * parseInt(quantityObj.val()));
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
</body>
</html>
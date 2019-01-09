<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            echo "anda user biasa 0"."<br>";
            $idadmin = $_SESSION['user_id'];
            echo $idadmin;
        }
    }
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Data Transaksi Harian | Apotek Budi Farma</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/adminlte/bower_components/bootstrap/dist/css/'); ?>bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>material-fullpalette.min.css">
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>jquery-ui.css">
    <script src="<?php echo base_url('assets/js/'); ?>jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.min.js"></script>
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
				<fieldset><legend>Detail transaksi harian<br>
					<label>Cari Detail Transaksi  </label>
					<?php echo form_open('Laporan/detailHarian', array('method'=>'get'));?>
					<input type="text" name="tanggalCari" class="date datepicker">
					<input type="submit" name="cari" value="Cari">
					<?php form_close();?>
                        <?php
						$this->table->set_heading('Kode Transaksi', 'Tanggal', 'Kasir', 'Produk', 'Id Produk', 'Harga', 'Jumlah', 'Total');
						$template = array (
									'table_open' => '<table border="1" cellpadding="2" cellspacing="2" style="width: 100%" class="table table-bordered">',
									);
						$this->table->set_template($template);
						echo $this->table->generate($query);

						?>
					   
                    </fieldset><!--fieldset-->      
                </div><!--div-col-12-->
            <!--</form>form-->
	    </div><!--row jumbotron-->
    </div><!--container-->    
    <script>
    	$(document).ready(function (){
    		
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
</body>
</html>




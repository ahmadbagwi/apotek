<?php
defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            $idadmin = $_SESSION['user_id'];
        }
    }
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Data Transaksi Harian | Apotek Budi Farma</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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
        <div class="col-md-10 col-md-offset-1">
        <div class="row jumbotron">
		    <div class="col-md-12">
				    <h3>Detail transaksi harian</h3><br>
					<?php echo form_open('Laporan/detailHarian', array('method'=>'get'));?>
					<input type="text" name="tanggalCari" class="date datepicker" placeholder="cari tanggal">
					<input type="submit" name="cari" value="Cari">
					<?php form_close();?>
                        <?php
						$this->table->set_heading('Kode Transaksi', 'Tanggal', 'Kasir', 'Produk', 'Id Produk', 'Harga', 'Jumlah', 'Total');
						$template = array (
									'table_open' => '<table border="0" cellpadding="2" cellspacing="2" style="width: 100%" class="table table-striped">',
									);
						$this->table->set_template($template);
						echo $this->table->generate($detailHarian);
                        ?>
                        <?php
                        foreach ($detailHarian->result_array() as $detail) { 
                            }
                        ?>
                      
            </div>
            <a href="<?php echo site_url('beranda') ?>" class="btn btn-success"><b><</b> Beranda</a>
            <div class="footer">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <tr>
                            <td>&copy; Apotek Budi Farma 2019</td>
                        </tr>
                    </table>
                </div>
            </div>
	    </div><!--row jumbotron-->
        </div>
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
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
	<title>Laba Harian | Apotek Budi Farma</title>
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
        <div class="col-md-10 col-md-offset-1">
		<div class="row jumbotron">
				<div class="col-md-12">
					<legend>Laba transaksi harian<br>
						<label>Cari Transaksi  </label>
						<?php echo form_open('Laporan/labaHarian', array('method'=>'get'));?>
						<input type="text" name="tanggalCari" class="date datepicker">
						<input type="submit" name="cari" value="Cari">
						<?php form_close();?>
					</legend>
                        <?php
                        foreach ($labaHarian->result_array() as $laba) { 
                            }
						?>
					   <p>Tanggal <strong><?php $tgl = $laba['tanggal']; echo substr($tgl, 0, 11);?></strong>
                        
                       <table class="table table-striped" style="font-size: 12px">
                                 <tr>
                                     <th>Kode</th>
                                     <th>Transaksi Modal</td>
                                     <th>Transaksi Jual</th>
                                     <th>Profit</th>
                                 </tr>
                                 <?php foreach ($labaHarian->result_array() as $keuntungan) { ?>
                                 <tr>
                                     <td><?php echo $keuntungan['kode'];?></td>
                                     <td><?php echo $keuntungan['jumlahModal'];?></td>
                                     <td><?php echo $keuntungan['jumlahJual'];?></td>
                                     <td><?php echo $keuntungan['profit'];?></td>
                                 </tr>
                                <?php } foreach ($totalLabaHarian->result_array() as $totalLaba) { }?>
                                 <tr>
                                     <td></td>
                                     <td></td>
                                     <td><strong>Total Profit</strong></td>
                                     <td><strong><?php echo $totalLaba['profit'];?></strong></td>
                                 </tr>
                             </table>                   
                </div><!--div-col-12-->
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




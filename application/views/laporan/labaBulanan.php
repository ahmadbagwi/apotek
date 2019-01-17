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
	<title>Laba Bulanan | Apotek Budi Farma</title>
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
						<h3>Laba transaksi bulanan</h3><br>	
						<?php echo form_open('Laporan/labaBulanan', array('method'=>'get'));?>
						<input type="text" name="tanggalCari" class="date datepicker">
						<input type="submit" name="cari" value="Cari">
						<?php form_close(); ?>						
                        <?php
                        echo "<p>Bulan "."<strong>".$tanggal."<strong>";
						$this->table->set_heading('Modal', 'Jual', 'Profit');
						$template = array (
									'table_open' => '<table border="1" cellpadding="2" cellspacing="2" style="width: 100%" class="table table-bordered">',
									);
						$this->table->set_template($template);
						//$this->table->add_row($totalLabaHarian);
						echo $this->table->generate($query);
						?>
					   
                    </fieldset><!--fieldset-->      
                </div><!--div-col-12-->
            <!--</form>form-->
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
    	
    	});
    </script>
</body>
</html>




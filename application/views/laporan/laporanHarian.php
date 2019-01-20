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
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Nota Penjualan | Apotek Budi Farma</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>bootstrap.min.css">
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
				<div class="col-md-12">
					<fieldset><legend>Data transaksi hari ini</legend>
					    <?php
                            $tanggal = date('Y-m-d H:i:s');
                        ?>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js">
    </script>

</body>
</html>




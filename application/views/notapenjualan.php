<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if ($_SESSION['user_id']==null) {
    header('location:/apotek/');
    } else {
        if ($_SESSION['is_admin']==0) {
            $idadmin = $_SESSION['user_id'];
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
        <div class="col-md-4 col-md-offset-4">
		<div class="row jumbotron" style="font-size: 12px">
				<div class="col-md-12">
					<h5 style="text-align: center">Apotek Budi Farma<br>Jl. Raya Tajur No. 287A<br>0813xxxxxxxx</h5>
					<?php
                        foreach ($pembayaran->result_array() as $pembayaran) { }
                    ?>
                            <ul style="list-style: none;">
                                <li>Kasir <strong><?php echo $_SESSION['username'];?></strong></li>
                                <li>Tanggal <strong><?php echo $pembayaran['tanggal'];?></strong></li>
                                <li>Kode Transaksi <strong><?php echo $pembayaran['kode']; ?></strong></li>
                            </ul>
                             <table class="table table-striped" style="font-size: 12px">
                                 <tr>
                                     <th>Produk</th>
                                     <th>Harga</th>
                                     <th>Jumlah</th>
                                     <th style="display: none;">Diskon</td>
                                     <th>Total</th>
                                 </tr>
                                 <?php foreach ($penjualan->result_array() as $penjualan) { ?>
                                 <tr>
                                     <td><?php echo $penjualan['nama'];?></td>
                                     <td><?php echo $penjualan['jual'];?></td>
                                     <td><?php echo $penjualan['jumlah'];?></td>
                                     <td style="display: none;"><?php //echo $penjualan['diskon'];?></td>
                                     <td><?php echo $penjualan['total'];?></td>
                                 </tr>
                                <?php } ?>
                                <?php ?> 
                                 <tr>
                                     <td></td>
                                     <td></td>
                                     <td><strong>Total</strong></td>
                                     <td><strong><?php echo $pembayaran['jumlahJual'];?></strong></td>
                                 </tr>
                                 <tr>
                                     <td></td>
                                     <td></td>
                                     <td><strong>Bayar</strong></td>
                                     <td><strong><?php echo $pembayaran['bayar'];?></strong></td>
                                 </tr>
                                 <tr>
                                     <td></td>
                                     <td></td>
                                     <td><strong>Kembali</strong></td>
                                     <td><strong><?php echo $pembayaran['kembali'];?></strong></td>
                                 </tr>
                             </table>                                
                </div><!--div-col-12-->
            <!--</form>form-->
	    </div><!--row jumbotron-->
        <div id="footer" class="row jumbotron tombolNavigasi">
            <a href="<?php echo site_url('penjualan') ?>" class="btn btn-success">Transaksi lagi</a>
            <button class="btn btn-warning" onclick="window.print();return false;">Cetak Nota</button>
        </div>
    </div>

    </div><!--container-->    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js">
    </script>

</body>
</html>
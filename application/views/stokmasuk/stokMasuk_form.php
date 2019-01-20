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
<!doctype html>
<html>
    <head>
        <title>Stok Masuk</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>material-fullpalette.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/'); ?>jquery-ui.css">
        <script src="<?php echo base_url('assets/js/'); ?>jquery-3.3.1.js"></script>
        <script src="<?php echo base_url('assets/js/'); ?>jquery-ui.js"></script>
        <script src="<?php echo base_url('assets/js/'); ?>simple.money.format.js"></script>
        <script src="<?php echo base_url('assets/bootstrap/js/'); ?>bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/js/'); ?>material.min.js"></script>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
                <div class="row jumbotron">
                    <h2 style="margin-top:0px">Stok Masuk <?php echo $button ?></h2>
                    <form action="<?php echo $action; ?>" method="post">
            	    <div class="form-group">
                        <label for="int">Id User <?php echo form_error('idUser') ?></label>
                        <input type="text" class="form-control" readonly="" name="idUser" id="idUser" placeholder="IdUser" value="<?php echo $idadmin; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Nama Supplier</label>
                        <input type="text" class="namaSupplier form-control" name="namaSupplier" id="namaSupplier" placeholder="NamaProduk"/>
                    </div>
            	    <div class="form-group">
                        <label for="int">Id Suplier <?php echo form_error('idSuplier') ?></label>
                        <input type="text" class="form-control" readonly="" name="idSuplier" id="idSuplier" placeholder="IdSuplier" value="<?php echo $idSuplier; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="int">Nama Produk <?php echo form_error('namaProduk') ?></label>
                        <input type="text" class="namaProduk form-control" name="namaProduk" id="namaProduk" placeholder="NamaProduk"/>
                    </div>
            	    <div class="form-group">
                        <label for="int">Id Produk <?php echo form_error('idProduk') ?></label>
                        <input type="text" class="idProduk form-control" readonly="" name="idProduk" id="idProduk" placeholder="IdProduk" value="<?php echo $idProduk; ?>" />
                    </div>
            	    <div class="form-group">
                        <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
                        <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo date('Y-m-d H:i:s'); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Stok yang Ada</label>
                        <input type="text" class="stok form-control" name="stok" id="stok" class="stok" placeholder="Stok produk yang ada" />
                    </div>
            	    <div class="form-group">
                        <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                        <input type="text" class="jumlah form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Stok Akhir</label>
                        <input type="text" class="stokAkhir form-control" name="stokAkhir" id="stokAkhir" class="stok" placeholder="Stok produk setelah ditambah jumlah produk masuk"  />
                    </div>
            	    <div class="form-group">
                        <label for="int">Harga<?php echo form_error('modal') ?></label>
                        <input type="text" class="form-control" name="modal" id="modal" placeholder="Harga modal/beli dari supplier" value="<?php echo $modal; ?>" />
                    </div>
            	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
            	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            	    <a href="<?php echo site_url('stokmasuk') ?>" class="btn btn-default">Cancel</a>
            	   </form>
                </div>
            </div>
        </div>

    <script type="text/javascript">
    $(document).ready(function(){    
    $('[name="namaProduk"]').each(function(i,e){   
        $(this).autocomplete({
            source: function (request, response) {
                $.get("<?php echo base_url('Penjualan/get_autocomplete/?');?>", request,function(data){
                    jsonData = JSON.parse(data);
                    console.log(jsonData);
                    response($.map(jsonData, function (value, key) {
                        return {
                            label: value.name,
                            data: value,
                        }
                    }));
                });
            },
            select: function (event, ui){
                //tr = $(this).parents('tr');
                $('[name="namaProduk"]').val(ui.item.data.name);
                $('[name="idProduk"]').val(ui.item.data.idProduk);
                $('[name="stok"]').val(ui.item.data.stokProduk);
            }
        })
    })
    })
    </script>
    <script type="text/javascript">
    $(document).ready(function(){    
    $('[name="namaSupplier"]').each(function(i,e){   
        $(this).autocomplete({
            source: function (request, response) {
                $.get("<?php echo base_url('Supplier/get_autocomplete/?');?>", request,function(data){
                    jsonData = JSON.parse(data);
                    console.log(jsonData);
                    response($.map(jsonData, function (value, key) {
                        return {
                            label: value.name,
                            data: value,
                        }
                    }));
                });
            },
            select: function (event, ui){
                //tr = $(this).parents('tr');
                $('[name="namaSupplier"]').val(ui.item.data.name);
                $('[name="idSuplier"]').val(ui.item.data.idProduk);
            }
        })
    })
    })
    </script>
    <script type="text/javascript">
       $(document).ready(function(){
          //$(document).on("focus", ".jumlah", function(){
              $(".jumlah").blur(function(){
                var stokAwal = $(this).parent().parent().find(".stok");
                var quantity = $(this).parent().parent().find(".jumlah");
                if (stokAwal.val() !== "" && quantity.val() !== "")
                  {
                    $(this).parent().parent().find(".stokAkhir").val(parseInt(stokAwal.val())+parseInt(quantity.val()));
                }
                })
            //})
        });
    </script>
    </body>
</html>
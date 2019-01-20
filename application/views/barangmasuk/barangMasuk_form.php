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
        <title>Barang Masuk | Apotek Budi Farma</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
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
            <div class="col-md-10 col-md-offset-1">
                <div class="row jumbotron">
                    <h2 style="margin-top:0px">Barang Masuk</h2>
                    <form action="<?php echo $action; ?>" method="post">
                       <div class="form-group" style="display: none">
                        <label for="int">IdUser <?php echo form_error('idUser') ?></label>
                        <input type="text" class="form-control" name="idUser" id="idUser" placeholder="IdUser" value="<?php echo $_SESSION['user_id'];; ?>" />
                        </div>
                    <div class="form-group">
                        <label for="varchar">Nama Suplier <?php echo form_error('namaSuplier') ?></label>
                        <input type="text" class="form-control" name="namaSuplier" id="namaSuplier" placeholder="NamaSuplier" value="<?php echo $namaSuplier; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Nama Produk</label>
                        <input type="text" class="form-control" name="namaProduk" id="namaProduk" class="namaProduk" placeholder="Nama Produk" />
                    </div>
                    <div class="form-group">
                        <label for="int">Id Produk <?php echo form_error('idProduk') ?></label>
                        <input type="text" class="form-control" name="idProduk" id="idProduk" class="idProduk" placeholder="IdProduk" value="<?php echo $idProduk; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Stok yang Ada</label>
                        <input type="text" class="form-control" name="stok" id="stok" class="stok" placeholder="Stok produk yang ada" value="<?php echo $idProduk; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="timestamp">Tanggal <?php echo form_error('tanggal') ?></label>
                        <input type="text" class="datepicker form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                        <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Stok Akhir</label>
                        <input type="text" class="stokAkhir form-control" name="stokAkhir" id="stokAkhir" class="stok" placeholder="Stok produk setelah ditambah jumlah produk masuk" value="<?php echo $idProduk; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="int">Harga Modal <?php echo form_error('modal') ?></label>
                        <input type="text" class="form-control" name="modal" id="modal" placeholder="Modal" value="<?php echo $modal; ?>" />
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                    <a href="<?php echo site_url('barangmasuk') ?>" class="btn btn-default">Cancel</a>
                </form>
                <div class="footer">
                    <div class="col-md-12">
                        <table class="table table-striped">
                            <tr>
                                <td>&copy; Apotek Budi Farma 2019</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $("#namaProduk").autocomplete({
              source: "<?php echo site_url('Barangmasuk/get_nama/?');?>",

              select: function (event, ui) {
                    $('[name="idProduk"]').val(ui.item.idproduk); 
                    $('[name="namaProduk"]').val(ui.item.produk); 
                }
            });

        });

         /*$(document).ready(function(){
 
            $('#title').autocomplete({
                source: "<?php //echo site_url('blog/get_autocomplete');?>",
      
                select: function (event, ui) {
                    $('[name="title"]').val(ui.item.label); 
                    $('[name="description"]').val(ui.item.description); 
                }
            });
 
        });*/
    </script>

    <script type="text/javascript">
        $("body").on('focus', ' .datepicker', function () {
                $(this).datepicker({
                    dateFormat: "yy-mm-dd"
                });
            });
    </script>
    </body>
</html>
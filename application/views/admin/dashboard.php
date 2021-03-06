		  <!-- Page Content -->
          <h3><?php echo $namaAplikasi;?></h3>
          <hr>
          <p>Selamat datang <?php echo $_SESSION['username']. " <br> 
          Pada halaman ini anda dapat mengelola Sistem Penjualan Apotek diantaranya
          <ul>
          	<li>Transaksi penjualan</li>
          	<li>Pembatalan transaksi penjualan</li>
          	<li>Mencetak ulang nota</li>
          	<li>Melihat dan membuat produk</li>
          	<li>Menambah stok baru</li>
          	<li>Melihat dan cetak laporan</li>
          </ul>";?> </p>

          </div>

          <!-- Icon Cards-->
          <style type="text/css">
          	.dashboard a, .dashboard a:hover, .dashboard a:focus {
			    color: #fff;
			}
          </style>
          	<div class="col-md-12 dashboard">
	          <div class="row ">
	            <div class="col-xl-3 col-sm-6 mb-3"><a href="<?php echo site_url('stok') ?>">
	              <div class="card text-white bg-primary o-hidden h-100 ">
	                <div class="card-body">
	                  <div class="card-body-icon">
	                    <i class="fas fa-fw fa-shopping-cart"></i>
	                  </div>
	                  <div class="mr-5"><?php echo $jumlahProduk; ?> Produk</div>
	                </div>
	                <a class="card-footer text-white clearfix small z-1" href="#">
	                  <span class="float-right">
	                    <i class="fas fa-angle-right"></i>
	                  </span>
	                </a>
	              </div>
	            </div></a>
	            <div class="col-xl-3 col-sm-6 mb-3"><a href="<?php echo site_url('laporan/LabaHarian') ?>">
	              <div class="card text-white bg-warning o-hidden h-100">
	                <div class="card-body">
	                  <div class="card-body-icon">
	                    <i class="fas fa-fw fa-comments"></i>
	                  </div>
	                  <div class="mr-5"><?php echo $jumlahTransaksi; ?> Transaksi Hari Ini</div>
	                </div>
	                <a class="card-footer text-white clearfix small z-1" href="#">
	                  <span class="float-right">
	                    <i class="fas fa-angle-right"></i>
	                  </span>
	                </a>
	              </div>
	            </div></a>
	            <div class="col-xl-3 col-sm-6 mb-3"><a href="<?php echo site_url('laporan/labaBulanan') ?>">
	              <div class="card text-white bg-success o-hidden h-100">
	                <div class="card-body">
	                  <div class="card-body-icon">
	                    <i class="fas fa-fw fa-list"></i>
	                  </div>
	                  <div class="mr-5"><?php $jumlahJual; ?>  Omset bulan ini</div>
	                </div>
	                <a class="card-footer text-white clearfix small z-1" href="#">
	                  <span class="float-right">
	                    <i class="fas fa-angle-right"></i>
	                  </span>
	                </a>
	              </div>
	            </div></a>
	          </div>
          </div>
        <!-- /.container-fluid -->
        <script>
		window.onload = function() {
		 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Gold Reserves"
			},
			axisY: {
				title: "Gold Reserves (in tonnes)"
			},
			data: [{
				type: "column",
				yValueFormatString: "#,##0.## tonnes",
				dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
			}]
		});
		chart.render();
		 
		}
		</script>
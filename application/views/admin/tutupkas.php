					<div class="col-md-12 col-lg-12">
						<div class="row">
							<h4>Tutup Kasir</h4>
							<ul>
								<li>Tutup kasir shift 1 adalah merekap semua transaksi yang dimulai pukul 07:30:00 - 15:00:59</li>
								<li>Tutup kasir shift 2 adalah merekap semua transaksi yang dimulai pukul 15:01:00 - 22:30:00</li>
								<li>Nilai penjualan yang muncul otomatis sesuai jumlah transaksi pada jam shift</li>
								<li>Nilai yang lain input manual</li>
								<li>Gunakan tombol Tab untuk berpindah antar form</li>
							</ul>
							<div class="col-md-6">
								<?php echo form_open('TutupKas/tutupKas'); ?>
								<h5>Data Komputer</h5>
								<div class="form-group">
									<label for="int">Tanggal</label>
									<input type="text" class="form-control" name="tanggal" value="<?php echo date('Y-m-d');?>"/>
								</div>
								<div class="form-group">
									<label for="int">Jam tutup kasir</label>
									<input type="text" class="form-control" name="jamTutup" value="<?php echo date('H:i:j');?>"/>
								</div>
								<div class="form-group">
									<label for="int">Kas awal</label>
									<input type="text" class="kasAwal form-control" id="kasAwal" name="kasAwal" value="0"/>
								</div>
								<div class="form-group">
									<label for="int">Penjualan</label>
									<input type="text" class="penjualan form-control" id="penjualan" name="penjualan" value="<?php echo $penjualan; ?>"/>
								</div>
								<div class="form-group">
									<label for="int">Rawat inap</label>
									<input type="text" class="rawatInap form-control" id="rawatInap" name="rawatInap" value="0"/>
								</div>
								<div class="form-group">
									<label for="int">Total transaksi</label>
									<input type="text" class="totalTransaksi form-control" id="totalTransaksi" name="totalTransaksi" value="<?php echo $penjualan; ?>"/>
								</div>  	
							</div>
							<div class="col-md-6">
								<h5>Aktual Kas</h5>
								<div class="form-group">
									<label for="int">Kas tersedia</label>
									<input type="text" class="kasTersedia form-control" id="kasTersedia" name="kasTersedia" value="0"/>
								</div>
								<div class="form-group">
									<label for="int">Kartu debit</label>
									<input type="text" class="kartuDebit form-control" id="kartuDebit" name="kartuDebit" value="0"/>
								</div>
								<div class="form-group">
									<label for="int">Belum dibayar</label>
									<input type="text" class="belumDibayar form-control" id="belumDibayar" name="belumDibayar" value="0"/>
								</div>
								<div class="form-group">
									<label for="int">Total kas</label>
									<input type="text" class="totalKas form-control" id="totalKas" name="totalKas" value=""/>
								</div>
								<div class="form-group">
									<label for="int">Selisih</label>
									<input type="text" class="selisih form-control" id="selisih" name="selisih" value=""/>
								</div>
								<button type="submit" class="btn btn-primary">Tutup Kasir</button> 
								<?php echo form_close();?>
							</div>	
						</div>
					</div>
					<!--Mencari nilai total transaksi yang ada pada satu shift-->
					<script type="text/javascript">
						$(document).ready(function(){
			          		$(document).on("blur", ".rawatInap", function(){
			          			var kasAwal = $("#kasAwal").val();
			          			var penjualan = $("#penjualan").val();
			          			var rawatInap = $("#rawatInap").val();
			          			$("input[type=text][name=totalTransaksi]").val(parseInt(kasAwal) + parseInt(penjualan) + parseInt(rawatInap));	
			            	})
			        	});
					</script>

					<!--Menginput nilai total aktual kas (data uang real) dan mencari total aktual kas yang ada pada satu shift-->
					<script type="text/javascript">
						$(document).ready(function(){
			          		$(document).on("keyup", ".belumDibayar", function(){
			          			var kasTersedia = $("#kasTersedia").val();
			          			var kartuDebit = $("#kartuDebit").val();
			          			var belumDibayar = $("#belumDibayar").val();
			          			$("input[type=text][name=totalKas]").val(parseInt(kasTersedia) + parseInt(kartuDebit) + parseInt(belumDibayar));	
			            	})
			        	});
					</script>

					<!--Mencari selisih yang ada pada satu shift-->
					<script type="text/javascript">
						$(document).ready(function(){
			          		$(document).on("blur", ".totalKas", function(){
			          			$("input[type=text][name=selisih]").val(parseInt($("input[type=text][name=totalKas]").val()) - parseInt($("input[type=text][name=totalTransaksi]").val()));
			            	})
			        	});
					</script>
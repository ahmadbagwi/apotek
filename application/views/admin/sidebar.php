    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item <?php if($title=='Dashboard'){echo 'active';}?>">
          <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kasir</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header" >Penjualan:</h6>
            <a class="dropdown-item <?php if($title=='Transaksi'){echo 'active';}?>" href="<?php echo site_url('penjualan') ?>">Transaksi</a>
            <a class="dropdown-item <?php if($title=='Pembatalan Transaksi'){echo 'active';}?>" href="<?php echo site_url('PembatalanTransaksi') ?>">Pembatalan Transaksi</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Data Transaksi:</h6>
            <a class="dropdown-item <?php if($title=='Riwayat Transaksi'){echo 'active';}?>" href="<?php echo site_url('laporan/detailHarian') ?>">Riwayat Transaksi</a>
            <a class="dropdown-item <?php if($title=='Cetak Nota'){echo 'active';}?>" href="<?php echo site_url('Nota') ?>">Cetak Nota</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="far fa-clock"></i>
            <span>Tutup Kasir</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header" >Tutup Kasir:</h6>
            <a class="dropdown-item <?php if($title=='Tutup Kasir'){echo 'active';}?>" href="<?php echo site_url('TutupKas') ?>">Tutup Kasir</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Data dan Cetak:</h6>
            <a class="dropdown-item <?php if($title=='Riwayat Transaksi'){echo 'active';}?>" href="<?php echo site_url('TutupKas/datakas') ?>">Data Tutup Kasir</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Master</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item <?php if($title=='Daftar Produk'){echo 'active';}?>" href="<?php echo site_url('stok') ?>">Produk</a>
          
            <div class="dropdown-divider"></div>
            <a class="dropdown-item <?php if($title=='Daftar Transaksi Stok Masuk'){echo 'active';}?>" href="<?php echo site_url('stokmasuk') ?>">Stok Masuk</a>
           
            <div class="dropdown-divider"></div>
            <a class="dropdown-item <?php if($title=='Daftar Transaksi Suplier'){echo 'active';}?>" href="<?php echo site_url('supplier') ?>">Suplier</a>
            
            <div class="dropdown-divider"></div>
            <a class="dropdown-item <?php if($title=='Daftar Retur Produk'){echo 'active';}?>" href="<?php echo site_url('retur') ?>">Retur Produk</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Tabel Laporan:</h6>
            <a class="dropdown-item <?php if($title=='Laporan Transaksi Harian'){echo 'active';}?>" href="<?php echo site_url('laporan/labaHarian') ?>">Laporan Harian</a>
            <a class="dropdown-item <?php if($title=='Laporan Transaksi Bulanan'){echo 'active';}?>" href="<?php echo site_url('laporan/labaBulanan') ?>">Laporan Bulanan</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Batal:</h6>
            <a class="dropdown-item <?php if($title=='Transaksi Batal'){echo 'active';}?>" href="<?php echo site_url('laporan/transaksiBatal') ?>">Transaksi Batal</a>
            
          </div>
        </li>

         <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-file-archive"></i>
            <span>Aset</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Aset:</h6>
            <a class="dropdown-item <?php if($title=='Data Aset'){echo 'active';}?>" href="<?php echo site_url('aset') ?>">Daftar Data Aset</a>
          </div>
        </li>
      
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-cogs"></i>
            <span>Pengaturan</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Akun:</h6>
            <a class="dropdown-item <?php if($title=='Daftar Akun'){echo 'active';}?>" href="<?php echo site_url('user/daftarAkun') ?>">Daftar Akun</a>
            <a class="dropdown-item <?php if($title=='Buat Akun'){echo 'active';}?>" href="<?php echo site_url('user/register') ?>">Buat Akun</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Aplikasi:</h6>
            <a class="dropdown-item <?php if($title=='Pengaturan Aplikasi'){echo 'active';}?>" href="<?php echo site_url('pengaturan') ?>">Pengaturan Aplikasi</a>
          </div>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.html">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>-->
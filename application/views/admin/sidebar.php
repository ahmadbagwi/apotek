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
            <h6 class="dropdown-header">Lihat Transaksi:</h6>
            <a class="dropdown-item <?php if($title=='Riwayat Transaksi'){echo 'active';}?>" href="<?php echo site_url('laporan/detailHarian') ?>">Riwayat Transaksi</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-table"></i>
            <span>Data Master</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Stok:</h6>
            <a class="dropdown-item <?php if($title=='Daftar Produk'){echo 'active';}?>" href="<?php echo site_url('stok') ?>">Daftar Produk</a>
            <a class="dropdown-item <?php if($title=='Tambah Produk'){echo 'active';}?>" href="<?php echo site_url('stok/create') ?>">Tambah Produk</a>
            <!--<a class="dropdown-item <?php// if($title=='Tambah Produk Masal'){echo 'active';}?>" href="#">Tambah Produk Masal</a>-->
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Stok Masuk:</h6>
            <a class="dropdown-item <?php if($title=='Daftar Transaksi Stok Masuk'){echo 'active';}?>" href="<?php echo site_url('stokmasuk') ?>">Daftar Transaksi Stok Masuk</a>
            <a class="dropdown-item <?php if($title=='Tambah Stok Masuk'){echo 'active';}?>" href="<?php echo site_url('stokmasuk/create') ?>">Tambah Stok Masuk</a>
            <!--<a class="dropdown-item <?php // if($title=='Tambah Stok Masuk Masal'){echo 'active';}?>" href="#">Tambah Stok Masuk Masal</a>-->
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Laporan</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Tabel Laporan:</h6>
            <a class="dropdown-item <?php if($title=='Laporan Transaksi Harian'){echo 'active';}?>" href="<?php echo site_url('laporan/labaHarian') ?>">Laporan Transaksi Harian</a>
            <a class="dropdown-item <?php if($title=='Laporan Transaksi Bulanan'){echo 'active';}?>" href="<?php echo site_url('laporan/labaBulanan') ?>">Laporan Transaksi Bulanan</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Konsinyasi:</h6>
            <a class="dropdown-item <?php if($title=='Daftar Transaksi Konsinyasi'){echo 'active';}?>" href="#" onClick="alert('belum tersedia')">Daftar Transaksi Konsinyasi</a>
            <a class="dropdown-item <?php if($title=='Retur Produk'){echo 'active';}?>" href="#" onClick="alert('belum tersedia')">Retur Produk</a>
          </div>
        </li>
      
       <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pengaturan</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <h6 class="dropdown-header">Akun:</h6>
            <a class="dropdown-item <?php if($title=='Daftar Akun'){echo 'active';}?>" href="<?php echo site_url('user/list') ?>">Daftar Akun</a>
            <a class="dropdown-item <?php if($title=='Buat Akun'){echo 'active';}?>" href="<?php echo site_url('user/register') ?>">Buat Akun</a>
            <div class="dropdown-divider"></div>
            <h6 class="dropdown-header">Aplikasi:</h6>
            <a class="dropdown-item <?php if($title=='Daftar Transaksi Konsinyasi'){echo 'active';}?>" href="#" onClick="alert('belum tersedia')">Pengaturan Aplikasi</a>
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
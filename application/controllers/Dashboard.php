<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                $this->load->model('LaporanModel');
				$this->load->model('DashboardModel');
				$this->load->model('PengaturanModel');
        }

	function index() {
		$tanggal = date('Y-m-d');
		
		$jam1 = null;
		$jam2 = null;

		$data['logo'] = $this->PengaturanModel->logo();
		$data['namaAplikasi'] = $this->PengaturanModel->namaAplikasi();
		$data['jumlahProduk'] = $this->DashboardModel->jumlahProduk();
		$data['jumlahTransaksi'] = $this->DashboardModel->jumlahTransaksi();
		$data['profitBulanan'] = $this->LaporanModel->laba_bulanan($tanggal, $jam1, $jam2);
		$data['title'] = "Dashboard";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');
	}

}
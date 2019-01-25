<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Dashboard extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->model('LaporanModel');
				$this->load->model('DashboardModel');
        }

	public function index() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-');
		}
		$data['tanggal'] = $tanggal;
		$data['jumlahProduk'] = $this->DashboardModel->jumlahProduk();
		$data['jumlahTransaksi'] = $this->DashboardModel->jumlahTransaksi();
		$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal);
		$data['profitBulanan'] = $this->LaporanModel->laba_bulanan($tanggal);
		$data['title'] = "Dashboard";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer');
	}
}
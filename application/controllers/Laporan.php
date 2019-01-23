<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('LaporanModel');
        
      }

	function detailHarian() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-d');
		}
		$data['tanggal'] = $tanggal;
		$data['title'] = "Riwayat Transaksi";
		$data['detailHarian'] = $this->LaporanModel->detailHarian($tanggal);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/detailHarian');
		$this->load->view('admin/footer');	
	}

	function labaHarian() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-d');
		}
		$this->load->model('PembatalantransaksiModel');
		$data['dataPembatalan'] = $this->PembatalantransaksiModel->daftarPembatalan($tanggal);

		$data['tanggal'] = $tanggal;
		$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal);
		$data['totalLabaHarian'] = $this->LaporanModel->totalLabaHarian($tanggal);
		$data['title'] = "Laporan Transaksi Harian";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/labaharian', $data);
		$this->load->view('admin/footer');
	}

	function labaBulanan() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m-d');
		} else {
			$tanggal = $this->input->get('tanggalCari');
		}
		$tanggal = substr($tanggal, 0,7);
		$data['query'] = $this->LaporanModel->laba_bulanan($tanggal);
		$data['tanggal'] = substr($tanggal, 0,8);
		$data['title'] = "Laporan Transaksi Bulanan";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/labaBulanan', $data);
		$this->load->view('admin/footer');
		

	}
}


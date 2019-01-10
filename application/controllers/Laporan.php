<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('LaporanModel');
        
      }

	function detailHarian() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m-d');
		} else {
			$tanggal = $this->input->get('tanggalCari');
		}
		$data['query'] = $this->LaporanModel->detail_harian($tanggal);
		$this->load->view('laporan/detailHarian', $data);	
	}

	function labaHarian() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m-d');
		} else {
			$tanggal = $this->input->get('tanggalCari');
		}
		
		$data['query'] = $this->LaporanModel->laba_harian($tanggal);
		//$data['totalLabaHarian'] = $this->LaporanModel->laba_harian($tanggal);
		$this->load->view('laporan/labaHarian', $data);

	}

	function labaBulanan() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m-d');
		} else {
			$tanggal = $this->input->get('tanggalCari');
		}
		$tanggal = substr($tanggal, 0,8);
		//$data['query'] = $this->LaporanModel->laba_bulanan($tanggal);
		//$data['totalLabaHarian'] = $this->LaporanModel->laba_harian($tanggal);
		$data['query'] = $this->LaporanModel->laba_bulanan($tanggal);
		$this->load->view('laporan/labaBulanan', $data);
		
		

	}

	/*function cariLabaHarian() {
		$tanggal = $this->input->get('tanggalCari');
		$data['query'] = $this->LaporanModel->laba_harian($tanggal);
		//$data['totalLabaHarian'] = $this->LaporanModel->laba_harian($tanggal);
		$this->load->view('laporan/labaHarian', $data);

	}*/

}


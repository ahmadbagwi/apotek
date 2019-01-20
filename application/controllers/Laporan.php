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
		$data['detailHarian'] = $this->LaporanModel->detailHarian($tanggal);
		$this->load->view('laporan/detailHarian', $data);	
	}

	function labaHarian() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-d');
		}

		$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal);
		$data['totalLabaHarian'] = $this->LaporanModel->totalLabaHarian($tanggal);
		$this->load->view('laporan/labaHarian', $data);

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
		$this->load->view('laporan/labaBulanan', $data);
		
		

	}
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Nota extends CI_Controller {
	function index() {
		$this->load->model('NotaModel');
		//$this->load->library('pdfgenerator');
		$kode = $this->NotaModel->kodeTerakhir();
		$data['title'] = "Nota";
		$data['penjualan'] = $this->NotaModel->transaksiTerakhir($kode);
		$data['pembayaran'] = $this->NotaModel->pembayaranTerakhir($kode);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/nota', $data);
		//$this->load->view('admin/footer');
	
		//$this->pdfgenerator->generate($html,'nota');
	}
}
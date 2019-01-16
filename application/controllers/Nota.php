<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Nota extends CI_Controller {
	function index() {
		$this->load->model('NotaModel');
		$kode = $this->NotaModel->kodeTerakhir();
		$data['penjualan'] = $this->NotaModel->transaksiTerakhir($kode);
		$data['pembayaran'] = $this->NotaModel->pembayaranTerakhir($kode);
		$this->load->view('notapenjualan', $data);
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Notapenjualan extends CI_Controller {
  	public function index() {
  		$this->load->model('NotapenjualanModel');
  		$this->NotapenjualanModel->transaksiTerakhir();
  		$this->load->view('notapenjualan', $querynota);
  	}


} 
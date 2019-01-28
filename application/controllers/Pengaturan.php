<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pengaturan extends CI_Controller {

	function index() {
		$data['title'] = "Pengaturan Aplikasi";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/pengaturan');
		$this->load->view('admin/footer');
	}
}
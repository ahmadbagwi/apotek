<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Tes extends CI_Controller {
	function index(){
		if (isset($_GET['term'])) {
		  	$result = $this->PenjualanModel->cariProduk($_GET['term']);
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					//'label'			=> $row->nama,
					//'description'	=> $row->jual,
					'name' => $row->nama,
					'idProduk' => $row->id,
            		'modal' => $row->modal,
            		'jual' => $row->jual,
				);
		     	echo json_encode($arr_result);
		   	}
		}
		$this->load->view('tesjson');
	}
}
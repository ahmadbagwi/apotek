<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Transaction extends CI_Controller {
	public function construct(){
		parent::__construct();
		$this->load->model('TransactionModel');
	}

	public function index() {
		//$this->load->model('Transaction_model');
		$this->load->library('form_validation');
		$this->load->view('transaction');
	}

	public function prosesTransaksi() {
		$count = $_POST['count'];
		$id_transaction = $_POST['idTransaksi'];
		$transaction_date = $_POST['date'];
		$transaction_type = $_POST['type'];
		$id_user = $_POST['user'];
		$transaction_customer = $_POST['customer'];
		$id_product = $_POST['idProduct'];
		$stock_price = $_POST['stockPrice'];
		$product_price = $_POST['price'];
		$transaction_qty = $_POST['quantity'];
		$data = array();
		$index = 0;

		foreach ($count as $banyakData) {
			array_push($data, array(
				'id_transaction' => $id_transaction[$index],
				'transaction_date' => $transaction_date[$index],
				'transaction_type' => $transaction_type[$index],
				'id_user' => $id_user[$index],
				'transaction_customer' => $transaction_customer[$index],
				'id_product' => $id_product[$index],
				'stock_price' => $stock_price[$index],
				'product_price' => $product_price[$index],
				'transaction_qty' => $transaction_qty[$index], ));
			$index++;
		}
		$this->load->model('TransactionModel');
		$result = $this->TransactionModel->simpanTransaksi($data);
		if($result){
			echo 1;
			$this->load->view('batch_view');
		}
		else{
			$this->load->view('dashboard');
		}
		exit;
    }



}
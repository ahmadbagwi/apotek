<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Penjualan extends CI_Controller {
	public function construct(){
		parent::__construct();
		$this->load->model('PenjualanModel');
		
	}

	public function index() {
		//$this->load->model('Transaction_model');
		$this->load->library('form_validation');
		$this->load->view('penjualan');
	}

	public function get_autocomplete(){
		$this->load->model('PenjualanModel');
        if (isset($_GET['term'])) {
            $result = $this->PenjualanModel->cariProduk($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
            	$arr_result[] = array(
            		'idProduk' => $row->id,
            		'namaProduk' => $row->nama,
            		'modal' => $row->modal,
            		'jual' => $row->jual,
            	);
                //$arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
    }

    public function ambil_harga(){
		$this->load->model('PenjualanModel');
        if (isset($_GET['term'])) {
            $result = $this->PenjualanModel->cariHarga($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
            	$arr_result[] = array(
            		'idProduk' => $row->id,
            		//'nama' => $row->nama,
            		'modal' => $row->modal,
            		'jual' => $row->jual,
            	);
                //$arr_result[] = $row->nama;
                echo json_encode($arr_result);
            }
        }
    }

	public function cariProduk(){
        $keyword=$this->input->post('idProduk');
        $cariData=$this->PenjualanModel->GetRow($keyword);        
        echo json_encode($cariData);
    }

	public function prosesTransaksi() {
		$awal = 'trx_';
        $akhir = date('YmdHis');
        
		$count = $_POST['count'];
		$kode = $awal.$akhir;
		$tanggal = date('Y-m-d H:i:s');
		$jenis = $_POST['jenis'];
		$idUser = $_POST['idUser'];
		$pelanggan = $_POST['pelanggan'];
		$idProduk = $_POST['idProduk'];
		$hargaModal = $_POST['hargaModal'];
		$jual = $_POST['jual'];
		$jumlah = $_POST['jumlah'];
		$total = $_POST['total'];
		$jumlahModal = $_POST['grandTotalModal'];
		$jumlahJual = $_POST['grand-total'];
		$bayar = $_POST['bayar'];
		$kembali = $_POST['kembali'];
		$profit = $jumlahJual-$jumlahModal;
		
		$data = array();
		$index = 0;

		foreach ($count as $banyakData) {
			array_push($data, array(
				'kode' => $kode,
				'tanggal' => $tanggal,
				'jenis' => $jenis,
				'idUser' => $idUser,
				'pelanggan' => $pelanggan,
				'idProduk' => $idProduk[$index],
				'modal' => $hargaModal[$index],
				'jual' => $jual[$index],
				'jumlah' => $jumlah[$index], 
				'total' => $total[$index] ));
			$index++;
		}
		$this->load->model('PenjualanModel');
		$prosesJual = $this->PenjualanModel->simpanTransaksi($data);

		$pembayaran = array(
						'kode' => $kode,
						//'id' => $idUser,
						'tanggal' => $tanggal,
						'jumlahModal' => $jumlahModal,
						'jumlahJual' => $jumlahJual,
						'bayar' => $bayar,
						'kembali' => $kembali,
						'profit' => $profit
					);

		$prosesBayar = $this->PenjualanModel->simpanPembayaran($pembayaran);

		if($prosesJual != null && $prosesBayar !=null){
			$this->load->view('notapenjualan', $data);
		}
		else{
			$this->load->view('dashboard');
		}

		
		
    }



}
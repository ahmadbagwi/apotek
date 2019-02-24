<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Penjualan extends CI_Controller {
	public function construct(){
		parent::__construct();
		$this->load->model('PenjualanModel');
	}

	public function index() {
		$data['title'] = "Transaksi";
		$this->load->library('form_validation');
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/penjualan');
		$this->load->view('admin/footer');
	}

    public function get_autocomplete(){
		if (isset($_GET['term'])) {
			$this->load->model('PenjualanModel');
		  	$query = $this->PenjualanModel->cariProduk($_GET['term']);
		   	if (count($query) > 0) {
		    foreach ($query as $row)
		     	$result[] = array(
					'name' => $row->nama,
					'idProduk' => $row->id,
            		'modal' => $row->modal,
            		'jual' => $row->jual,
            		'stokProduk' => $row->stok,
				);
		     	$json = json_encode($result);
		   		echo $json;
		   	}
		}
	}

	function prosesTransaksi() {
		$awal = 'trx_';
        $akhir = date('YmdHis');
        
		$count = $this->input->post('count');
		$kodeTransaksi = $awal.$akhir;
		$tanggal = date('Y-m-d H:i:s');
		$jenis = $this->input->post('jenis');
		$idUser = $this->input->post('idUser');
		$pelanggan = $this->input->post('pelanggan');
		$idProduk = $this->input->post('idProduk');
		$hargaModal = $this->input->post('hargaModal');
		$jual = $this->input->post('jual');
		$jumlah = $this->input->post('jumlah');
		$total = $this->input->post('total');
		$jumlahModal = $this->input->post('grandTotalModal');
		$jumlahJual = $this->input->post('grand-total');
		$bayar = $this->input->post('bayar');
		$kembali = $this->input->post('kembali');
		$profit = $jumlahJual-$jumlahModal;
		$stokAkhir = $this->input->post('stokAkhir');
		$penjualan = array();
		$ambilStok = array();
		$index = 0;

		foreach ($count as $banyakData) {
			array_push($penjualan, array(
				'kode' => $kodeTransaksi,
				'tanggal' => $tanggal,
				'jenis' => $jenis,
				'idUser' => $idUser,
				'pelanggan' => $pelanggan,
				'idProduk' => $idProduk[$index],
				'modal' => $hargaModal[$index],
				'jual' => $jual[$index],
				'jumlah' => $jumlah[$index], 
				'total' => $total[$index] 
			));
			array_push($ambilStok, array(
				'id' => $idProduk[$index],
				'stok' => $stokAkhir[$index], 
			));
			$index++;
		}

		$pembayaran = array(
						'kode' => $kodeTransaksi,
						'idUser' => $idUser,
						'tanggal' => $tanggal,
						'jumlahModal' => $jumlahModal,
						'jumlahJual' => $jumlahJual,
						'bayar' => $bayar,
						'kembali' => $kembali,
						'profit' => $profit
					);

		$this->load->model('PenjualanModel');
		$prosesJual = $this->PenjualanModel->prosesPenjualan($penjualan);
		$prosesBayar = $this->PenjualanModel->prosesPembayaran($pembayaran);

		if($prosesJual != null && $prosesBayar !=null){
			$this->PenjualanModel->kurangiStok($ambilStok);
			redirect('nota');
		}
		else{
			$this->load->view('admin/dashboard');
		}
    }
}
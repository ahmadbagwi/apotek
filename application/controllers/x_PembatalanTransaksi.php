<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class PembatalanTransaksi extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->model('PembatalantransaksiModel');
				$this->load->model('PenjualanModel');
        }

    function index() {
        $tanggal = date('Y-m');
        $data['dataPembatalan'] = $this->PembatalantransaksiModel->daftarPembatalan($tanggal);
    	$data['title'] = "Pembatalan Transaksi";
    	$this->load->view('admin/header', $data);
    	$this->load->view('admin/sidebar');
    	$this->load->view('admin/pembatalantransaksi');
    	$this->load->view('admin/footer');

    }

    function cariData() {
    	
    	if (isset($_GET['term'])) {
		  	$query = $this->PembatalantransaksiModel->cariTransaksi($_GET['term']);
		   	if (count($query) > 0) {
		    foreach ($query as $row)
		     	/*$result[] = array(
					'id_transaksi' => $row->kode,
                    'id_produk' => $row->idProduk,
                    'jumlah' => $row->jumlah,
                    'total' => $row->total,
				);
		     	$json = json_encode($result);
		   		echo $json;*/
                $kodeTransaksi[] = $row->kode;
                echo json_encode($kodeTransaksi);
		   	}
		}

    }

    function prosesPembatalan() {
        $idUser = $_SESSION['user_id'];
        $kode = $this->input->post('kode_transaksi');
        $cariPenjualan = $this->PembatalantransaksiModel->cariPenjualan($kode);
        $data2['cariPenjualan'] = $this->PembatalantransaksiModel->cariPenjualan($kode);
        foreach ($cariPenjualan as $penjualan) {
            $data = array(
                    'kode' => $penjualan['kode'],
                    'idProduk' => $penjualan['idProduk'],
                    'jumlah' => $penjualan['jumlah'] 
                    );
        $data2['hasil'] = $data;
        }
        $data2['hasil2'] =  array(
                    'kode' => $penjualan['kode'],
                    'idProduk' => $penjualan['idProduk'],
                    'jumlah' => $penjualan['jumlah'] 
                    );
        foreach ($cariPenjualan as $jualan) {
            $kode = $jualan['kode'];
            $id = $jualan['idProduk'];
            $jumlah = $jualan['jumlah'];
        }

        $data2['hasil3'] = $jualan;
        //$idProduk = $this->input->post('id_produk');
        //$nilai = $this->input->post('nilaiTransaksi');
        //$jumlah = $this->input->post('jumlah');
        
        //$data = array(
          //      'idUser' => $idUser,
            //    'kode' => $kode,
                //'idProduk' => $idProduk,
                //'nilai' => $nilai,
                //'jumlah' => $jumlah,   
            //);

        //$this->PembatalantransaksiModel->ambilPenjualan($kode);
        //$this->PembatalantransaksiModel->updateStok($kode);
        //$this->PembatalantransaksiModel->ubahStatus($kode, $idProduk);
        //$this->PembatalantransaksiModel->kurangiProfit($kode, $jumlah);
        //redirect('PembatalanTransaksi/');
        //$data['title'] = "Pembatalan Transaksi";
        //$this->load->view('admin/header', $data);
        //$this->load->view('admin/sidebar');
        $this->load->view('admin/testview', $data2);
        //$this->load->view('admin/footer');
    }

    /*function daftarPembatalan() {
        
    }*/
}
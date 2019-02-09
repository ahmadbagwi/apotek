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
		     	$result[] = array(
					'id_transaksi' => $row->kode,
                    'id_produk' => $row->idProduk,
                    'jumlah' => $row->jumlah,
                    'total' => $row->total,
				);
		     	$json = json_encode($result);
		   		echo $json;
		   	}
		}

    }

    function prosesPembatalan() {
        $idUser = $_SESSION['user_id'];
        $kode = $this->input->post('kode_transaksi');
        $idProduk = $this->input->post('id_produk');
        $nilai = $this->input->post('nilaiTransaksi');
        $jumlah = $this->input->post('jumlah');

        $data = array(
                'idUser' => $idUser,
                'kode' => $kode,
                'idProduk' => $idProduk,
                'nilai' => $nilai,
                'jumlah' => $jumlah,   
            );

        $this->PembatalantransaksiModel->buatPembatalan($data);
        $this->PembatalantransaksiModel->updateStok($idProduk, $jumlah);
        $this->PembatalantransaksiModel->ubahStatus($kode, $idProduk);
        $this->PembatalantransaksiModel->ubahStatusPembayaran($kode);
        $this->PembatalantransaksiModel->kurangiProfit($kode, $jumlah);
        redirect('PembatalanTransaksi/');
        //$data['title'] = "Pembatalan Transaksi";
        //$this->load->view('admin/header', $data);
        //$this->load->view('admin/sidebar');
        //$this->load->view('admin/pembatalantransaksi');
        //$this->load->view('admin/footer');
    }

    function daftarPembatalan() {
        $tanggal = $this->input->get('tanggalCari');
        if ($tanggal==null) {
            $tanggal = date('Y-m-d');
        }
        $data['tanggal'] = $tanggal;
        $data['dataPembatalan'] = $this->PembatalantransaksiModel->daftarPembatalan($tanggal);
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Nota extends CI_Controller {
	function __construct()
        {
            parent::__construct();
            $this->load->model('NotaModel');
           $this->load->model('PengaturanModel');
        }

	function index() {

		$kode = $this->NotaModel->kodeTerakhir();
		$data['namaAplikasi'] = $this->PengaturanModel->namaAplikasi();
		$data['alamat'] = $this->PengaturanModel->alamat();
		$data['kontak'] = $this->PengaturanModel->kontak();
		$data['trx'] = $this->NotaModel->kodeTerakhir();
		$data['title'] = "Nota";
		$data['penjualan'] = $this->NotaModel->transaksiTerakhir($kode);
		$data['pembayaran'] = $this->NotaModel->pembayaranTerakhir($kode);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/nota', $data);
		$this->load->view('admin/footer');
	}

	function cetakNota() {
		$kode = $this->input->get('kode');
		$data['trx'] = $kode;
		if ($kode==null) {
			$kode = $this->NotaModel->kodeTerakhir();
			$data['trx'] = $this->NotaModel->kodeTerakhir();
		}
		$data['namaAplikasi'] = $this->PengaturanModel->namaAplikasi();
		$data['alamat'] = $this->PengaturanModel->alamat();
		$data['kontak'] = $this->PengaturanModel->kontak();
		$data['title'] = "Cetak Nota";
        $data['penjualan'] = $this->NotaModel->transaksiTerakhir($kode);
		$data['pembayaran'] = $this->NotaModel->pembayaranTerakhir($kode);
		$panjang = 150;
		$html = $this->load->view('admin/notacetak', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
									'format' => [75, $panjang],
									'orientation' => 'P',
									'margin_left' => '5',
									'margin_right' => '5',
									'margin_top' => '5',
									'margin_bottom' => '0',
									'autoPageBreak' => 'false']);
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'I');
	}
}
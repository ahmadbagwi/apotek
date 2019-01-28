<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('LaporanModel');
        
      }

	function detailHarian() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-d');
		}
		$data['tanggal'] = $tanggal;
		$data['title'] = "Riwayat Transaksi";
		$data['detailHarian'] = $this->LaporanModel->detailHarian($tanggal);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/detailHarian');
		$this->load->view('admin/footer');	
	}

	public function labaHarian() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-d');
		}
		$this->load->model('PembatalantransaksiModel');
		$data['dataPembatalan'] = $this->PembatalantransaksiModel->daftarPembatalan($tanggal);

		$data['tanggal'] = $tanggal;
		$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal);
		$data['totalLabaHarian'] = $this->LaporanModel->totalLabaHarian($tanggal);
		$data['title'] = "Laporan Transaksi Harian";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/labaharian', $data);
		$this->load->view('admin/footer');
	}

	function cetakHarian() {
		$pdfFilePath = FCPATH."/assets/files/$filename.pdf";

		if (file_exists($pdfFilePath) == FALSE) {	

			$this->load->model('PembatalantransaksiModel');
			$tanggal = $this->input->get('tanggal');
			$data['tanggal'] = $tanggal;
			$data['dataPembatalan'] = $this->PembatalantransaksiModel->daftarPembatalan($tanggal);
			$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal);
			$data['totalLabaHarian'] = $this->LaporanModel->totalLabaHarian($tanggal);
		
			$html = $this->load->view('admin/laporan/labaharianCetak', $data, true);

			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->WriteHTML($html);
			$pdf->Output($pdfFilePath, 'I');
		}
		redirect("/assets/files/$filename.pdf");
	}

	function labaBulanan() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m');
		} else {
			$tanggal = $this->input->get('tanggalCari');
			$tanggal = substr($tanggal, 0,7);
		}
		
		//$data['tanggal'] = substr($tanggal, 0,8);
		$data['bulan'] = $tanggal;
		$data['title'] = "Laporan Transaksi Bulanan";
		$data['query'] = $this->LaporanModel->laba_bulanan($tanggal);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/labaBulanan', $data);
		$this->load->view('admin/footer');
	}

	function konsinyasi() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal===null) {
			$tanggal = date('Y-m-d');
		}
		$tanggal = substr($tanggal, 0,7);
		$data['tanggal'] = $tanggal;
		$data['konsinyasi'] = $this->LaporanModel->konsinyasi($tanggal);
		$data['totalKonsinyasi'] = $this->LaporanModel->totalKonsinyasi($tanggal);
		$data['title'] = "Laporan Konsinyasi";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/konsinyasi', $data);
		$this->load->view('admin/footer');
	}

	function cetakKonsinyasi() {
		$pdfFilePath = FCPATH."/assets/files/$filename.pdf";

		if (file_exists($pdfFilePath) == FALSE) {	

			$this->load->model('PembatalantransaksiModel');
			$tanggal = $this->input->get('tanggal');
			$data['tanggal'] = $tanggal;
			$tanggal = substr($tanggal, 0,7);
			$data['tanggal'] = $tanggal;
			$data['konsinyasi'] = $this->LaporanModel->konsinyasi($tanggal);
			$data['totalKonsinyasi'] = $this->LaporanModel->totalKonsinyasi($tanggal);

			$html = $this->load->view('admin/laporan/cetakKonsinyasi', $data, true);

			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->WriteHTML($html);
			$pdf->Output($pdfFilePath, 'I');
		}
		redirect("/assets/files/$filename.pdf");
	}
}


<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Laporan extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('LaporanModel');
        
      }

	function detailHarian() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal==null) {
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
		if ($tanggal==null) {
			$tanggal = date('Y-m-d');
		}
		$shift = $this->input->get('shift');
		if ($shift==null) {
			$shift = 1;
		}
		$shift = $this->input->get('shift');
		if ($shift == 1) { $jam1 = "07:30:00"; $jam2 = "15:00:59"; } else { $jam1 = "15:01:00"; $jam2 = "22:10:00"; }
		$data['tanggal'] = $tanggal;
		$data['jam1'] = $jam1;
		$data['jam2'] = $jam2;
		$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal, $jam1, $jam2);
		$data['totalModalHarian'] = $this->LaporanModel->totalModalHarian($tanggal, $jam1, $jam2);
		$data['totalJualHarian'] = $this->LaporanModel->totalJualHarian($tanggal, $jam1, $jam2);
		$data['totalLabaHarian'] = $this->LaporanModel->totalLabaHarian($tanggal, $jam1, $jam2);
		$data['konsinyasi'] = $this->LaporanModel->daftarKonsinyasi($tanggal, $jam1, $jam2);
		//$data['totalKonsinyasi'] = $this->LaporanModel->totalKonsinyasi($tanggal, $jam1, $jam2);
		$data['title'] = "Laporan Transaksi Harian";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/labaharian', $data);
		$this->load->view('admin/footer');
	}

	function cetakHarian() {
		$this->load->model('PembatalantransaksiModel');
		$tanggal = $this->input->get('tanggal');
		$jam1 = $this->input->get('jam1');
		$jam2 = $this->input->get('jam2');
		$data['jam1'] = $jam1;
		$data['jam2'] = $jam2;
		$data['tanggal'] = $tanggal;
		$data['labaHarian'] = $this->LaporanModel->labaHarian($tanggal, $jam1, $jam2);
		$data['totalModalHarian'] = $this->LaporanModel->totalModalHarian($tanggal, $jam1, $jam2);
		$data['totalJualHarian'] = $this->LaporanModel->totalJualHarian($tanggal, $jam1, $jam2);
		$data['totalLabaHarian'] = $this->LaporanModel->totalLabaHarian($tanggal, $jam1, $jam2);
		$data['konsinyasi'] = $this->LaporanModel->daftarKonsinyasi($tanggal, $jam1, $jam2);
		$panjang = 150;
		$html = $this->load->view('admin/laporan/labaharianCetak', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
									'format' => [75, $panjang],
									'orientation' => 'P',
									'margin_left' => '5',
									'margin_right' => '5',
									'margin_top' => '5',
									'margin_bottom' => '0',]);
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'I');
	}

	function transaksiBatal() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal == null) {
			$tanggal = date('Y-m-d');
		}
		$this->load->model('PembatalantransaksiModel');
		$data['title'] = "Transaksi Batal";
		$data['tanggal'] = $tanggal;	
		$data['dataPembatalan'] = $this->PembatalantransaksiModel->daftarPembatalan($tanggal);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/transaksiBatal', $data);
		$this->load->view('admin/footer');
	}


	function labaBulanan() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m');
		} else {
			$tanggal = $this->input->get('tanggalCari');
			$tanggal = substr($tanggal, 0,7);
		}

		$data['bulan'] = $tanggal;
		$data['title'] = "Laporan Transaksi Bulanan";
		$data['labaBulanan'] = $this->LaporanModel->labaBulanan($tanggal);
		$data['modalBulanan'] = $this->LaporanModel->modalBulanan($tanggal);
		$data['jualBulanan'] = $this->LaporanModel->jualBulanan($tanggal);
		$data['profitBulanan'] = $this->LaporanModel->profitBulanan($tanggal);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/laporan/labaBulanan', $data);
		$this->load->view('admin/footer');
		
	}

	function cetakBulanan() {
		if ($this->input->get('tanggalCari')==null) {
			$tanggal = date('Y-m');
		} else {
			$tanggal = $this->input->get('tanggalCari');
			$tanggal = substr($tanggal, 0,7);
		}

		$data['bulan'] = $tanggal;
		$data['title'] = "Laporan Transaksi Bulanan";
		$data['labaBulanan'] = $this->LaporanModel->labaBulanan($tanggal);
		$data['modalBulanan'] = $this->LaporanModel->modalBulanan($tanggal);
		$data['jualBulanan'] = $this->LaporanModel->jualBulanan($tanggal);
		$data['profitBulanan'] = $this->LaporanModel->profitBulanan($tanggal);

		$panjang = 150;
		$html = $this->load->view('admin/laporan/bulananCetak', $data, true);
		$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8',
									'format' => [75, $panjang],
									'orientation' => 'P',
									'margin_left' => '5',
									'margin_right' => '5',
									'margin_top' => '5',
									'margin_bottom' => '0',]);
		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, 'I');
	}

	function konsinyasi() {
		$tanggal = $this->input->get('tanggal'); //xxx
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal == null) {
			$tanggal = date('Y-m-d');
		}
		$jam1 = $this->input->get('jam1');
		$jam2 = $this->input->get('jam2');
		//$tanggal = substr($tanggal, 0,7);
		$data['tanggal'] = $tanggal;
		$data['konsinyasi'] = $this->LaporanModel->konsinyasi($tanggal, $jam1, $jam2);
		$data['totalKonsinyasi'] = $this->LaporanModel->totalKonsinyasi($tanggal, $jam1, $jam2);
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


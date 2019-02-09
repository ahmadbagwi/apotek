<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class Aset extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('AsetModel');
    }

	function index() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal==null) {
			$tanggal = date('Y-m-d');
		}
		$tanggal = substr($tanggal, 0,7);
		$data['jam1'] = "07:30:00";
		$data['jam2'] = "15:00:59";
		$data['jam3'] = "15:01:00";
		$data['jam4'] = "22:30:00";
		$data['tanggal'] = $tanggal;
		$data['title'] = "Data Aset";
		$data['dataAset'] = $this->AsetModel->dataAset($tanggal); 
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/aset', $data);
		$this->load->view('admin/footer');
		/*$tahun = '2019'.'-';
		$bulan = '02'.'-';
		$tanggal = '01';

		$waktu = $tahun.$bulan.$tanggal;
		$data['waktu'] = $waktu;

		for ($i=0; $i < 31; $i++) {
			
			//echo $waktu."<br>";
			$data['aset'] = $this->AsetModel->cariAset($waktu);
			echo $waktu++.' '.$data['aset']++."<br>";
		}
		$data['asetarray'] = $this->AsetModel->cariAsetArray($waktu);
		$data['title'] = "Aset";
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/aset', $data);
		$this->load->view('admin/footer');*/
	}

	function Cari() {
		$tahun = $this->input->get('tahun');
		$bulan = $this->input->get('bulan');
		$tanggal = $this->input->get('tanggal');

		$periode = $tahun.'-'.$bulan.'-'.$tanggal;
		print_r($periode);
		$data['aset'] = $this->AsetModel->cariAset($periode);

	}

	function cronAsetHarian() {
		$tanggal = date('Y-m-d');
		$jam1 = "07:30:00";
		$jam2 = "15:00:59";
		$jam3 = "15:01:00";
		$jam4 = "22:30:00";
		//$this->load->model('LaporanModel');
		
		$aset = $this->AsetModel->aset();
		$omset1 = $this->AsetModel->omset1($tanggal, $jam1, $jam2);
		$omset2 = $this->AsetModel->omset2($tanggal, $jam3, $jam4);
		$totalOmset = $omset1+$omset2;
		$nota1 = $this->AsetModel->nota1($tanggal, $jam1, $jam2);
		$nota2 = $this->AsetModel->nota2($tanggal, $jam3, $jam4);
		$totalNota = $nota1+$nota2;
		$avgNota = $totalOmset/$totalNota;
		$profit = $this->AsetModel->profit($tanggal);
		$persenProfit = $profit/$totalOmset;

		$data = array('tanggal' => $tanggal,
					  'aset' => $aset,
					  'omset1' => $omset1,
					  'omset2' => $omset2,
					  'totalOmset' => $totalOmset,
					  'nota1' => $nota1,
					  'nota2' => $nota2,
					  'totalNota' => $totalNota,
					  'avgNota' => $avgNota,
					  'profit' => $profit,
					  'persenProfit' => $persenProfit
					   );

		$this->AsetModel->simpanData($data);
		$data['title'] = "Data Aset";
		$data['dataAset'] = $this->AsetModel->dataAset(); 
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/aset', $data);
		$this->load->view('admin/footer');
	}

	function asetCetak() {
		$tanggal = $this->input->get('tanggalCari');
		if ($tanggal==null) {
			$tanggal = date('Y-m-d');
		}
		$tanggal = substr($tanggal, 0,7);
		$data['jam1'] = "07:30:00";
		$data['jam2'] = "15:00:59";
		$data['jam3'] = "15:01:00";
		$data['jam4'] = "22:30:00";
		$data['tanggal'] = $tanggal;
		$data['title'] = "Data Aset";
		$data['dataAset'] = $this->AsetModel->dataAset($tanggal); 

		$panjang = 150;
		$html = $this->load->view('admin/asetCetak', $data, true);
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
}
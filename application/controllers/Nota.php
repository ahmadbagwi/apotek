<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Nota extends CI_Controller {
	public function __construct()
        {
            parent::__construct();
            $this->load->model('NotaModel');
           
        }

	function index() {

		$kode = $this->NotaModel->kodeTerakhir();
		$data['trx'] = $this->NotaModel->kodeTerakhir();
		$data['title'] = "Nota";
		$data['penjualan'] = $this->NotaModel->transaksiTerakhir($kode);
		$data['pembayaran'] = $this->NotaModel->pembayaranTerakhir($kode);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('admin/nota', $data);
		$this->load->view('admin/footer');
	}

	public function cetak() {

		$html = $this->load->view('admin/notacetak', $data, true);
		$this->load->library('Cpdf');
		$pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
		$pdf->Cell(10,0,$html,0,1);
		$pdf->Output();
		//$this->pdfgenerator->generate($html,'nota');
	    }

	public function cetakNota() {
		$pdfFilePath = FCPATH."/assets/files/$filename.pdf";

		if (file_exists($pdfFilePath) == FALSE)
		{	
			$stylesheet = file_get_contents('assets/bootstrap/css/bootstrap.css');
			$kode = $this->NotaModel->kodeTerakhir();
			$data['trx'] = $this->NotaModel->kodeTerakhir();
            $data['penjualan'] = $this->NotaModel->transaksiTerakhir($kode);
            //$data['kasir'] = $this->NotaModel->kasir($kode);
            //$data['tanggalBayar'] = $this->NotaModel->tanggalBayar($kode);
			$data['pembayaran'] = $this->NotaModel->pembayaranTerakhir($kode);

			$html = $this->load->view('admin/notacetak', $data, true);
			$this->load->library('pdf');
			$pdf = $this->pdf->load();
			$pdf->WriteHTML($html);
			$pdf->Output($pdfFilePath, 'I');
		}
		redirect("/assets/files/$filename.pdf");

	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class TutupKas extends CI_Controller {
	function __construct(){
        parent::__construct();
        $this->load->model('TutupkasModel');
        $this->load->model('NotaModel');
        $this->load->model('LaporanModel');
        
      }

    function index() {
    	$data['title'] = "Tutup Kasir";
        if (date('H:i:j') < "15:01:00") {
            $jam1 = "05:30:00";
            $jam2 = "15:00:59";
        } else {
            $jam1 = "15:01:00";
            $jam2 = "23:59:00";
        }
        $tanggal = date('Y-m-d');
        $data['penjualan'] = $this->LaporanModel->totalJualHarian($tanggal, $jam1, $jam2);
    	$this->load->view('admin/header', $data);
    	$this->load->view('admin/sidebar');
    	$this->load->view('admin/tutupkas');
    	$this->load->view('admin/footer');
    }

    function tutupKas() {
    	$tanggal = $this->input->post('tanggal');
        if (date('H:i:j') < "15:01:00") { $jam1 = "07:30:00"; } else { $jam1 = "15:01:00"; } 
    	$jam2 = $this->input->post('jamTutup');
    	$idUser = $_SESSION['user_id'];
    	$kodeAkhir = $this->NotaModel->kodeTerakhir();
    	$kasAwal = $this->input->post('kasAwal');
    	$totalPenjualan = $this->LaporanModel->totalJualHarian($tanggal, $jam1, $jam2);

    	$rawatInap = $this->input->post('rawatInap');
    	$totalTransaksi = $this->input->post('totalTransaksi');
    	$kasTersedia = $this->input->post('kasTersedia');
    	$kartuDebit = $this->input->post('kartuDebit');
    	$belumDibayar = $this->input->post('belumDibayar');
    	$totalKas = $this->input->post('totalKas');

    	$selisih = $this->input->post('selisih');

    	$data = array('tanggal' => $tanggal,
    				  'jamTutup' => $jam2,
    				  'idUser' => $idUser,
    				  'kodeAkhir' => $kodeAkhir,
    				  'kasAwal' => $kasAwal,
    				  'totalJual' => $totalPenjualan,
    				  'rawatInap' => $rawatInap,
    				  'totalTransaksi' => $totalTransaksi,
    				  'kasTersedia' => $kasTersedia,
    				  'kartuDebit' => $kartuDebit,
    				  'belumDibayar' => $belumDibayar,
    				  'totalKas' => $totalKas,
    				  'selisih' => $selisih,
    					 );

    	$this->TutupkasModel->simpan($data);
        redirect('TutupKas/datakas');
    }

    function datakas() {
        $tanggal = $this->input->get('tanggalCari');
        if ($tanggal == null) { $tanggal = date('Y-m-d'); }
        $data['tutupkas'] = $this->TutupkasModel->dataKas($tanggal);
        $data['title'] = "Data Tutup Kas";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('admin/datakas', $data);
        $this->load->view('admin/footer');
    }

    function cetakkas() {
        $this->load->model('LaporanModel');

        if (date('H:i:j') < "15:01:00") {
            $jam1 = "05:30:00";
            $jam2 = "15:00:59";
        } else {
            $jam1 = "15:01:00";
            $jam2 = "23:59:00";
        }
        $noSlip = $this->input->get('noSlip');
        $tanggal = $this->input->get('tanggal');
        $data['tutupkas'] = $this->TutupkasModel->cetakkas($noSlip);
        $data['konsinyasi'] = $this->LaporanModel->konsinyasi($tanggal, $jam1, $jam2);
        $data['totalKonsinyasi'] = $this->LaporanModel->totalKonsinyasi($tanggal, $jam1, $jam2);
        $data['title'] = "Cetak Kas";
        $panjang = 185;
        
        $html = $this->load->view('admin/cetakkas', $data, true);
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
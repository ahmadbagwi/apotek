<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stokmasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('StokmasukModel');
        $this->load->library('form_validation');
    }

    function get_autocomplete(){
        if (isset($_GET['term'])) {
            $query = $this->StokmasukModel->cariProduk($_GET['term']);
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

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'stokmasuk/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'stokmasuk/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'stokmasuk/';
            $config['first_url'] = base_url() . 'stokmasuk/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->StokmasukModel->total_rows($q);
        $stokmasuk = $this->StokmasukModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'stokmasuk_data' => $stokmasuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Daftar Transaksi Stok Masuk";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('stokmasuk/stokMasuk_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->StokmasukModel->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idUser' => $row->idUser,
		'idSuplier' => $row->idSuplier,
		'namaProduk' => $row->namaProduk,
		'idProduk' => $row->idProduk,
		'tanggal' => $row->tanggal,
		'jumlah' => $row->jumlah,
		'modal' => $row->modal,
        'jual' => $row->jual,
	    );
            $data['title'] = "Detail Transaksi Stok Masuk";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('stokmasuk/stokMasuk_read', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('stokmasuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('stokmasuk/create_action'),
	    'id' => set_value('id'),
	    'idUser' => set_value('idUser'),
	    'idSuplier' => set_value('idSuplier'),
	    'namaProduk' => set_value('namaProduk'),
	    'idProduk' => set_value('idProduk'),
	    'tanggal' => set_value('tanggal'),
	    'jumlah' => set_value('jumlah'),
	    'modal' => set_value('modal'),
        'jual' => set_value('jual'),
	);
        $data['title'] = "Buat Transaksi Stok Masuk";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('stokmasuk/stokMasuk_form', $data);
        $this->load->view('admin/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idUser' => $this->input->post('idUser',TRUE),
		'idSuplier' => $this->input->post('idSuplier',TRUE),
		'namaProduk' => $this->input->post('namaProduk',TRUE),
		'idProduk' => $this->input->post('idProduk',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'modal' => $this->input->post('modal',TRUE),
        'jual' => $this->input->post('jual',TRUE),

	    );
    
        $id = $this->input->post('idProduk');
        $stok = $this->input->post('stokAkhir');
        $modal = $this->input->post('modal');
        $jual = $this->input->post('jual');
        

            $this->StokmasukModel->insert($data);
            $this->StokmasukModel->updateStok($id, $stok, $modal, $jual);
            $this->session->set_flashdata('message', 'Sukses menyimpan data');
            redirect(site_url('stokmasuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->StokmasukModel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('stokmasuk/update_action'),
		'id' => set_value('id', $row->id),
		'idUser' => set_value('idUser', $row->idUser),
		'idSuplier' => set_value('idSuplier', $row->idSuplier),
		'namaProduk' => set_value('namaProduk', $row->namaProduk),
		'idProduk' => set_value('idProduk', $row->idProduk),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'modal' => set_value('modal', $row->modal),
        'jual' => set_value('modal', $row->jual),
	    );
            $data['title'] = "Update Transaksi Stok Masuk";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('stokmasuk/stokMasuk_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('stokmasuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'idUser' => $this->input->post('idUser',TRUE),
		'idSuplier' => $this->input->post('idSuplier',TRUE),
		'namaProduk' => $this->input->post('namaProduk',TRUE),
		'idProduk' => $this->input->post('idProduk',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'modal' => $this->input->post('modal',TRUE),
        'jual' => $this->input->post('jual',TRUE),
	    );

            $this->StokmasukModel->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Sukses mengubah data');
            redirect(site_url('stokmasuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->StokmasukModel->get_by_id($id);

        if ($row) {
            $this->StokmasukModel->delete($id);
            $this->session->set_flashdata('message', 'sukses menghapus data');
            redirect(site_url('stokmasuk'));
        } else {
            $this->session->set_flashdata('message', 'Data tidak ditemukan');
            redirect(site_url('stokmasuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idUser', 'iduser', 'trim|required');
	$this->form_validation->set_rules('idSuplier', 'idsuplier', 'trim|required');
	$this->form_validation->set_rules('namaProduk', 'namaproduk', 'trim|required');
	$this->form_validation->set_rules('idProduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('modal', 'modal', 'trim|required');
    $this->form_validation->set_rules('jual', 'jual', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "stokMasuk.xls";
        $judul = "stokMasuk";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "IdUser");
	xlsWriteLabel($tablehead, $kolomhead++, "IdSuplier");
	xlsWriteLabel($tablehead, $kolomhead++, "NamaProduk");
	xlsWriteLabel($tablehead, $kolomhead++, "IdProduk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Modal");
    xlsWriteLabel($tablehead, $kolomhead++, "Jual");

	foreach ($this->StokmasukModel->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idUser);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idSuplier);
	    xlsWriteNumber($tablebody, $kolombody++, $data->namaProduk);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idProduk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->modal);
        xlsWriteNumber($tablebody, $kolombody++, $data->jual);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Stokmasuk.php */
/* Location: ./application/controllers/Stokmasuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-20 07:23:24 */
/* http://harviacode.com */
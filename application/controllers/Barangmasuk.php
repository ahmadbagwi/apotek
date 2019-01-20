<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barangmasuk extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BarangmasukModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'barangmasuk/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'barangmasuk/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'barangmasuk/index.html';
            $config['first_url'] = base_url() . 'barangmasuk/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->BarangmasukModel->total_rows($q);
        $barangmasuk = $this->BarangmasukModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'barangmasuk_data' => $barangmasuk,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('barangmasuk/barangMasuk_list', $data);
    }

    public function read($id) 
    {
        $row = $this->BarangmasukModel->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'idUser' => $row->idUser,
		'namaSuplier' => $row->namaSuplier,
		'idProduk' => $row->idProduk,
		'tanggal' => $row->tanggal,
		'jumlah' => $row->jumlah,
		'modal' => $row->modal,
	    );
            $this->load->view('barangmasuk/barangMasuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangmasuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barangmasuk/create_action'),
	    'id' => set_value('id'),
	    'idUser' => set_value('idUser'),
	    'namaSuplier' => set_value('namaSuplier'),
	    'idProduk' => set_value('idProduk'),
	    'tanggal' => set_value('tanggal'),
	    'jumlah' => set_value('jumlah'),
	    'modal' => set_value('modal'),
	);
        $this->load->view('barangmasuk/barangMasuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idUser' => $this->input->post('idUser',TRUE),
		'namaSuplier' => $this->input->post('namaSuplier',TRUE),
		'idProduk' => $this->input->post('idProduk',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'modal' => $this->input->post('modal',TRUE),
	    );

            $this->BarangmasukModel->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barangmasuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->BarangmasukModel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barangmasuk/update_action'),
		'id' => set_value('id', $row->id),
		'idUser' => set_value('idUser', $row->idUser),
		'namaSuplier' => set_value('namaSuplier', $row->namaSuplier),
		'idProduk' => set_value('idProduk', $row->idProduk),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'modal' => set_value('modal', $row->modal),
	    );
            $this->load->view('barangmasuk/barangMasuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangmasuk'));
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
		'namaSuplier' => $this->input->post('namaSuplier',TRUE),
		'idProduk' => $this->input->post('idProduk',TRUE),
		'tanggal' => $this->input->post('tanggal',TRUE),
		'jumlah' => $this->input->post('jumlah',TRUE),
		'modal' => $this->input->post('modal',TRUE),
	    );

            $this->BarangmasukModel->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barangmasuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->BarangmasukModel->get_by_id($id);

        if ($row) {
            $this->BarangmasukModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barangmasuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barangmasuk'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idUser', 'iduser', 'trim|required');
	$this->form_validation->set_rules('namaSuplier', 'namasuplier', 'trim|required');
	$this->form_validation->set_rules('idProduk', 'idproduk', 'trim|required');
	$this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
	$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');
	$this->form_validation->set_rules('modal', 'modal', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barangMasuk.xls";
        $judul = "barangMasuk";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NamaSuplier");
	xlsWriteLabel($tablehead, $kolomhead++, "IdProduk");
	xlsWriteLabel($tablehead, $kolomhead++, "Tanggal");
	xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");
	xlsWriteLabel($tablehead, $kolomhead++, "Modal");

	foreach ($this->BarangmasukModel->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idUser);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaSuplier);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idProduk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tanggal);
	    xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);
	    xlsWriteNumber($tablebody, $kolombody++, $data->modal);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    function get_nama(){
        if (isset($_GET['term'])) {
            $result = $this->BarangmasukModel->cari_nama($_GET['term']);
            if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'produk' => $row->nama,
                    'idproduk' => $row->id,
             );
                echo json_encode($arr_result);
            }
        }
    }

    function get_autocomplete(){
    if (isset($_GET['term'])) {
        $result = $this->blog_model->search_blog($_GET['term']);
        if (count($result) > 0) {
            foreach ($result as $row)
                $arr_result[] = array(
                    'label'         => $row->blog_title,
                    'description'   => $row->blog_description,
             );
                echo json_encode($arr_result);
            }
        }
    }

}

/* End of file Barangmasuk.php */
/* Location: ./application/controllers/Barangmasuk.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-17 21:26:12 */
/* http://harviacode.com */
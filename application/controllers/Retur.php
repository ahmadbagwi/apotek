<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Retur extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ReturModel');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'retur/?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'retur/?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'retur/';
            $config['first_url'] = base_url() . 'retur/';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->ReturModel->total_rows($q);
        $retur = $this->ReturModel->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'retur_data' => $retur,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $data['title'] = "Daftar Retur Produk";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('retur/retur_list', $data);
        $this->load->view('admin/footer');
    }

    public function read($id) 
    {
        $row = $this->ReturModel->get_by_id($id);
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
	    );
            $data['title'] = "Detail Retur Produk";
            $this->load->veiw('admin/header', $data);
            $this->load->veiw('admin/sidebar');
            $this->load->view('retur/retur_read', $data);
            $this->load->veiw('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('retur'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('retur/create_action'),
	    'id' => set_value('id'),
	    'idUser' => set_value('idUser'),
	    'idSuplier' => set_value('idSuplier'),
	    'namaProduk' => set_value('namaProduk'),
	    'idProduk' => set_value('idProduk'),
	    'tanggal' => set_value('tanggal'),
	    'jumlah' => set_value('jumlah'),
	    'modal' => set_value('modal'),
	);
        $data['title'] = "Buat Retur Produk";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sidebar');
        $this->load->view('retur/retur_form', $data);
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
	    );
            $idProduk = $this->input->post('idProduk',TRUE);
            $jumlah = $this->input->post('jumlah',TRUE);
            $this->ReturModel->insert($data);
            $this->ReturModel->updateStok($idProduk, $jumlah);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('retur'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->ReturModel->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('retur/update_action'),
		'id' => set_value('id', $row->id),
		'idUser' => set_value('idUser', $row->idUser),
		'idSuplier' => set_value('idSuplier', $row->idSuplier),
		'namaProduk' => set_value('namaProduk', $row->namaProduk),
		'idProduk' => set_value('idProduk', $row->idProduk),
		'tanggal' => set_value('tanggal', $row->tanggal),
		'jumlah' => set_value('jumlah', $row->jumlah),
		'modal' => set_value('modal', $row->modal),
	    );
            $data['title'] = "Update Retur Produk";
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar');
            $this->load->view('retur/retur_form', $data);
            $this->load->view('admin/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('retur'));
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
	    );

            $this->ReturModel->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('retur'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->ReturModel->get_by_id($id);

        if ($row) {
            $this->ReturModel->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('retur'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('retur'));
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

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "retur.xls";
        $judul = "retur";
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

	foreach ($this->ReturModel->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idUser);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idSuplier);
	    xlsWriteLabel($tablebody, $kolombody++, $data->namaProduk);
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

}

/* End of file Retur.php */
/* Location: ./application/controllers/Retur.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-27 12:56:55 */
/* http://harviacode.com */
<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Transaksi_kontrol extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'transaksi_kontrol/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'transaksi_kontrol/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'transaksi_kontrol/index.html';
            $config['first_url'] = base_url() . 'transaksi_kontrol/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Transaksi_model->total_rows($q);
        $transaksi_kontrol = $this->Transaksi_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'transaksi_kontrol_data' => $transaksi_kontrol,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('transaksi_kontrol/transaction_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_transaction' => $row->id_transaction,
		'transaction_date' => $row->transaction_date,
		'transaction_type' => $row->transaction_type,
		'id_user' => $row->id_user,
		'transaction_customer' => $row->transaction_customer,
		'id_product' => $row->id_product,
		'stock_price' => $row->stock_price,
		'product_price' => $row->product_price,
		'transaction_qty' => $row->transaction_qty,
	    );
            $this->load->view('transaksi_kontrol/transaction_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_kontrol'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('transaksi_kontrol/create_action'),
	    'id_transaction' => set_value('id_transaction'),
	    'transaction_date' => set_value('transaction_date'),
	    'transaction_type' => set_value('transaction_type'),
	    'id_user' => set_value('id_user'),
	    'transaction_customer' => set_value('transaction_customer'),
	    'id_product' => set_value('id_product'),
	    'stock_price' => set_value('stock_price'),
	    'product_price' => set_value('product_price'),
	    'transaction_qty' => set_value('transaction_qty'),
	);
        $this->load->view('transaksi_kontrol/transaction_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'transaction_date' => $this->input->post('transaction_date',TRUE),
		'transaction_type' => $this->input->post('transaction_type',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'transaction_customer' => $this->input->post('transaction_customer',TRUE),
		'id_product' => $this->input->post('id_product',TRUE),
		'stock_price' => $this->input->post('stock_price',TRUE),
		'product_price' => $this->input->post('product_price',TRUE),
		'transaction_qty' => $this->input->post('transaction_qty',TRUE),
	    );

            $this->Transaksi_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('transaksi_kontrol'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('transaksi_kontrol/update_action'),
		'id_transaction' => set_value('id_transaction', $row->id_transaction),
		'transaction_date' => set_value('transaction_date', $row->transaction_date),
		'transaction_type' => set_value('transaction_type', $row->transaction_type),
		'id_user' => set_value('id_user', $row->id_user),
		'transaction_customer' => set_value('transaction_customer', $row->transaction_customer),
		'id_product' => set_value('id_product', $row->id_product),
		'stock_price' => set_value('stock_price', $row->stock_price),
		'product_price' => set_value('product_price', $row->product_price),
		'transaction_qty' => set_value('transaction_qty', $row->transaction_qty),
	    );
            $this->load->view('transaksi_kontrol/transaction_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_kontrol'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_transaction', TRUE));
        } else {
            $data = array(
		'transaction_date' => $this->input->post('transaction_date',TRUE),
		'transaction_type' => $this->input->post('transaction_type',TRUE),
		'id_user' => $this->input->post('id_user',TRUE),
		'transaction_customer' => $this->input->post('transaction_customer',TRUE),
		'id_product' => $this->input->post('id_product',TRUE),
		'stock_price' => $this->input->post('stock_price',TRUE),
		'product_price' => $this->input->post('product_price',TRUE),
		'transaction_qty' => $this->input->post('transaction_qty',TRUE),
	    );

            $this->Transaksi_model->update($this->input->post('id_transaction', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('transaksi_kontrol'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Transaksi_model->get_by_id($id);

        if ($row) {
            $this->Transaksi_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('transaksi_kontrol'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('transaksi_kontrol'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('transaction_date', 'transaction date', 'trim|required');
	$this->form_validation->set_rules('transaction_type', 'transaction type', 'trim|required');
	$this->form_validation->set_rules('id_user', 'id user', 'trim|required');
	$this->form_validation->set_rules('transaction_customer', 'transaction customer', 'trim|required');
	$this->form_validation->set_rules('id_product', 'id product', 'trim|required');
	$this->form_validation->set_rules('stock_price', 'stock price', 'trim|required');
	$this->form_validation->set_rules('product_price', 'product price', 'trim|required');
	$this->form_validation->set_rules('transaction_qty', 'transaction qty', 'trim|required');

	$this->form_validation->set_rules('id_transaction', 'id_transaction', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "transaction.xls";
        $judul = "transaction";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Transaction Date");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaction Type");
	xlsWriteLabel($tablehead, $kolomhead++, "Id User");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaction Customer");
	xlsWriteLabel($tablehead, $kolomhead++, "Id Product");
	xlsWriteLabel($tablehead, $kolomhead++, "Stock Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Product Price");
	xlsWriteLabel($tablehead, $kolomhead++, "Transaction Qty");

	foreach ($this->Transaksi_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaction_date);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaction_type);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_user);
	    xlsWriteLabel($tablebody, $kolombody++, $data->transaction_customer);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_product);
	    xlsWriteNumber($tablebody, $kolombody++, $data->stock_price);
	    xlsWriteNumber($tablebody, $kolombody++, $data->product_price);
	    xlsWriteNumber($tablebody, $kolombody++, $data->transaction_qty);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

}

/* End of file Transaksi_kontrol.php */
/* Location: ./application/controllers/Transaksi_kontrol.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-07 15:56:43 */
/* http://harviacode.com */
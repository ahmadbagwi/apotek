<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'product/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'product/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'product/index.html';
            $config['first_url'] = base_url() . 'product/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Product_model->total_rows($q);
        $product = $this->Product_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'product_data' => $product,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('product/product_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Product_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_product' => $row->id_product,
		'product_name' => $row->product_name,
		'product_category' => $row->product_category,
		'product_description' => $row->product_description,
		'product_stock' => $row->product_stock,
		'stock_price' => $row->stock_price,
		'product_price' => $row->product_price,
		'created' => $row->created,
		'update' => $row->update,
	    );
            $this->load->view('product/product_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('product/create_action'),
	    'id_product' => set_value('id_product'),
	    'product_name' => set_value('product_name'),
	    'product_category' => set_value('product_category'),
	    'product_description' => set_value('product_description'),
	    'product_stock' => set_value('product_stock'),
	    'stock_price' => set_value('stock_price'),
	    'product_price' => set_value('product_price'),
	    'created' => set_value('created'),
	    'update' => set_value('update'),
	);
        $this->load->view('product/product_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'product_name' => $this->input->post('product_name',TRUE),
		'product_category' => $this->input->post('product_category',TRUE),
		'product_description' => $this->input->post('product_description',TRUE),
		'product_stock' => $this->input->post('product_stock',TRUE),
		'stock_price' => $this->input->post('stock_price',TRUE),
		'product_price' => $this->input->post('product_price',TRUE),
		'created' => $this->input->post('created',TRUE),
		'update' => $this->input->post('update',TRUE),
	    );

            $this->Product_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('product/update_action'),
		'id_product' => set_value('id_product', $row->id_product),
		'product_name' => set_value('product_name', $row->product_name),
		'product_category' => set_value('product_category', $row->product_category),
		'product_description' => set_value('product_description', $row->product_description),
		'product_stock' => set_value('product_stock', $row->product_stock),
		'stock_price' => set_value('stock_price', $row->stock_price),
		'product_price' => set_value('product_price', $row->product_price),
		'created' => set_value('created', $row->created),
		'update' => set_value('update', $row->update),
	    );
            $this->load->view('product/product_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_product', TRUE));
        } else {
            $data = array(
		'product_name' => $this->input->post('product_name',TRUE),
		'product_category' => $this->input->post('product_category',TRUE),
		'product_description' => $this->input->post('product_description',TRUE),
		'product_stock' => $this->input->post('product_stock',TRUE),
		'stock_price' => $this->input->post('stock_price',TRUE),
		'product_price' => $this->input->post('product_price',TRUE),
		'created' => $this->input->post('created',TRUE),
		'update' => $this->input->post('update',TRUE),
	    );

            $this->Product_model->update($this->input->post('id_product', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('product'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('product'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('product_name', 'product name', 'trim|required');
	$this->form_validation->set_rules('product_category', 'product category', 'trim|required');
	$this->form_validation->set_rules('product_description', 'product description', 'trim|required');
	$this->form_validation->set_rules('product_stock', 'product stock', 'trim|required');
	$this->form_validation->set_rules('stock_price', 'stock price', 'trim|required');
	$this->form_validation->set_rules('product_price', 'product price', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim');
	$this->form_validation->set_rules('update', 'update', 'trim');

	$this->form_validation->set_rules('id_product', 'id_product', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Product.php */
/* Location: ./application/controllers/Product.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-01 15:03:47 */
/* http://harviacode.com */
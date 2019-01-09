<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index.html';
            $config['first_url'] = base_url() . 'user/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->User_model->total_rows($q);
        $user = $this->User_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'user_data' => $user,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('user/user_list', $data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id_user' => $row->id_user,
		'username' => $row->username,
		'email' => $row->email,
		'password' => $row->password,
		'full_name' => $row->full_name,
		'phone' => $row->phone,
		'address' => $row->address,
		'level' => $row->level,
		'created' => $row->created,
	    );
            $this->load->view('user/user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('user/create_action'),
	    'id_user' => set_value('id_user'),
	    'username' => set_value('username'),
	    'email' => set_value('email'),
	    'password' => set_value('password'),
	    'full_name' => set_value('full_name'),
	    'phone' => set_value('phone'),
	    'address' => set_value('address'),
	    'level' => set_value('level'),
	    'created' => set_value('created'),
	);
        $this->load->view('user/user_form', $data);
    }
    
    
    
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/update_action'),
		'id_user' => set_value('id_user', $row->id_user),
		'username' => set_value('username', $row->username),
		'email' => set_value('email', $row->email),
		'password' => set_value('password', $row->password),
		'full_name' => set_value('full_name', $row->full_name),
		'phone' => set_value('phone', $row->phone),
		'address' => set_value('address', $row->address),
		'level' => set_value('level', $row->level),
		'created' => set_value('created', $row->created),
	    );
            $this->load->view('user/user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_user', TRUE));
        } else {
            $data = array(
		'username' => $this->input->post('username',TRUE),
		'email' => $this->input->post('email',TRUE),
		'password' => $this->input->post('password',TRUE),
		'full_name' => $this->input->post('full_name',TRUE),
		'phone' => $this->input->post('phone',TRUE),
		'address' => $this->input->post('address',TRUE),
		'level' => $this->input->post('level',TRUE),
		'created' => $this->input->post('created',TRUE),
	    );

            $this->User_model->update($this->input->post('id_user', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_rules('full_name', 'full name', 'trim|required');
	$this->form_validation->set_rules('phone', 'phone', 'trim|required');
	$this->form_validation->set_rules('address', 'address', 'trim|required');
	$this->form_validation->set_rules('level', 'level', 'trim|required');
	$this->form_validation->set_rules('created', 'created', 'trim|required');

	$this->form_validation->set_rules('id_user', 'id_user', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    /**
     * login function.
     * 
     * @access public
     * @return void
     */
    public function login() {
        
        // create the data object
        $data = new stdClass();
        
        // load form helper and validation library
        //$this->load->helper('form');
        //$this->load->library('form_validation');
        
        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == false) {
            
            // validation not ok, send validation errors to the view
            $this->load->view('home');
            //$this->load->view('user/login/login');
            //$this->load->view('footer');
            
        } else {
            
            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            if ($this->user_model->resolve_user_login($username, $password)) {
                
                $user_id = $this->user_model->get_user_id_from_username($username);
                $user    = $this->user_model->get_user($user_id);
                
                // set session user datas
                $_SESSION['user_id']      = (int)$user->id;
                $_SESSION['username']     = (string)$user->username;
                //$_SESSION['logged_in']    = (bool)true;
                //$_SESSION['is_confirmed'] = (bool)$user->is_confirmed;
                //$_SESSION['is_admin']     = (bool)$user->is_admin;
                
                // user login ok
                $this->load->view('dashboard');
                //$this->load->view('user/login/login_success', $data);
                //$this->load->view('footer');
                
            } else {
                
                // login failed
                $data->error = 'Wrong username or password.';
                
                // send error to the view
                $this->load->view('home');
                //$this->load->view('user/login/login', $data);
                //$this->load->view('footer');
                
            }
            
        }
        
    }
    
    /**
     * logout function.
     * 
     * @access public
     * @return void
     */
    public function logout() {
        
        // create the data object
        $data = new stdClass();
        
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            
            // remove session datas
            foreach ($_SESSION as $key => $value) {
                unset($_SESSION[$key]);
            }
            
            // user logout ok
            $this->load->view('home');
            //$this->load->view('user/logout/logout_success', $data);
            //$this->load->view('footer');
            
        } else {
            
            // there user was not logged in, we cannot logged him out,
            // redirect him to site root
            redirect('/');
            
        }
        
    }

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-01 10:24:30 */
/* http://harviacode.com */
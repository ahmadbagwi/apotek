<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model
{

    public $table = 'user';
    public $id = 'id_user';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_user', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('level', $q);
	$this->db->or_like('created', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_user', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('email', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('full_name', $q);
	$this->db->or_like('phone', $q);
	$this->db->or_like('address', $q);
	$this->db->or_like('level', $q);
	$this->db->or_like('created', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
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

            $this->User_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('user'));
        }
    }
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data

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

    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    /**
     * resolve_user_login function.
     * 
     * @access public
     * @param mixed $username
     * @param mixed $password
     * @return bool true on success, false on failure
     */
    public function resolve_user_login($username, $password) {
        
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('username', $username);
        $hash = $this->db->get()->row('password');
        
        return $this->verify_password_hash($password, $hash);
        
    }
    
    /**
     * get_user_id_from_username function.
     * 
     * @access public
     * @param mixed $username
     * @return int the user id
     */
    public function get_user_id_from_username($username) {
        
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where('username', $username);

        return $this->db->get()->row('id');
        
    }
    
    /**
     * get_user function.
     * 
     * @access public
     * @param mixed $user_id
     * @return object the user object
     */
    public function get_user($user_id) {
        
        $this->db->from('users');
        $this->db->where('id', $user_id);
        return $this->db->get()->row();
        
    }
    
    /**
     * hash_password function.
     * 
     * @access private
     * @param mixed $password
     * @return string|bool could be a string on success, or bool false on failure
     */
    private function hash_password($password) {
        
        return password_hash($password, PASSWORD_BCRYPT);
        
    }
    
    /**
     * verify_password_hash function.
     * 
     * @access private
     * @param mixed $password
     * @param mixed $hash
     * @return bool
     */
    private function verify_password_hash($password, $hash) {
        
        return password_verify($password, $hash);
        
    }

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-01-01 10:24:30 */
/* http://harviacode.com */
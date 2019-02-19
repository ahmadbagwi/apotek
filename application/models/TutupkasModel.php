<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class TutupkasModel extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function simpan($data) {
    	$this->db->insert('tutupKasir', $data);
    }

    function dataKas($tanggal) {
    	$this->db->select();
    	$this->db->select('users.username');
    	$this->db->like('tanggal', $tanggal, 'after');
    	$this->db->join('users', 'users.id = tutupKasir.idUser');
    	$this->db->from('tutupKasir');
    	return $this->db->get()->result_array();
    }


    function tanggal($noSlip) {
        $this->db->select('tanggal');
        $this->db->where('noSlip', $noSlip);
        $this->db->from('tutupKasir');
        return$this->db->get()->row()->tanggal;   
    }
    public function cetakkas($noSlip) {
    	$this->db->select();
    	$this->db->select('users.username');
    	$this->db->where('noSlip', $noSlip);
    	$this->db->join('users', 'users.id = tutupKasir.idUser');
    	$this->db->from('tutupKasir');
    	return $this->db->get()->result_array();
    }

}
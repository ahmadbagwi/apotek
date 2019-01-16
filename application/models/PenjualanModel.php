<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class PenjualanModel extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    function cariProduk($nama){
        $this->db->like('nama', $nama , 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('stok')->result();
    }

    /* public function cariHarga($nama){
        $this->db->select('id', 'modal', 'jual');
        $this->db->like('nama', $nama , 'both');
        //$this->db->like('id', $nama, 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(20);
        return $this->db->get('stok')->result();
    }*/
    function prosesPenjualan($penjualan) {
        return $this->db->insert_batch('penjualan', $penjualan);
        return $penjualan;
    }

    function prosesPembayaran($pembayaran) {
    	return $this->db->insert('pembayaran', $pembayaran);
    }

    public function GetRow($keyword) {        
        $this->db->order_by('id', 'DESC');
        $this->db->like("nama", $keyword);
        $this->db->like("id", $keyword);
        $this->db->from("stok");
        return $this->db->get('autocomplete')->result_array();
    }
}
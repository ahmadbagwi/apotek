<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class PenjualanModel extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function cariProduk($nama){
        $this->db->where('stok >', '0');
        $this->db->like('nama', $nama , 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('stok')->result();
    }

    function prosesPenjualan($penjualan) {
        return $this->db->insert_batch('penjualan', $penjualan);
    }

    function prosesPembayaran($pembayaran) {
    	return $this->db->insert('pembayaran', $pembayaran);
    }

    function kurangiStok($ambilStok) {
        return $this->db->update_batch('stok', $ambilStok, 'id');
    }

}
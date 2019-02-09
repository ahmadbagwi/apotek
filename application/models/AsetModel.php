<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class AsetModel extends CI_Model {

	function __construct() {
        parent::__construct();
    }

    function cariAset($waktu){
        $this->db->select_sum('jumlahJual');
        $this->db->like('tanggal', $waktu , 'after');
        $this->db->from('pembayaran');
        $query = $this->db->get();
        $row = $query->row();
        return $row->jumlahJual;
        //$query = $this->db->get();
        //return $row = $query->result_array();
    }

    function cariAsetArray($waktu){
        $this->db->select_sum('profit');
        $this->db->like('tanggal', $waktu , 'after');
        $this->db->from('pembayaran');
        $query = $this->db->get();
        $row = $query->row();
        return $row->profit;
        //return $row = $query->result_array();
    }

    function aset() {
        //$this->db->select_sum("jual*stok", 'aset');
        //$this->db->select('sum(`stok.stok*stok.jual`) as aset', FAlSE);
        //$this->db->from('stok');
        //$this->db->query("SELECT sum(stok*jual) as aset FROM stok");
        $query = $this->db->query("SELECT SUM(jual*stok) as aset FROM stok");
        //$query = $this->db->get();
        //$row = $query->row();
        return $query->row()->aset;
        //return $row->aset;
    }

    function omset1($tanggal, $jam1, $jam2){
        $this->db->select_sum('jumlahJual');
        $this->db->where('status', 'sukses');
        $this->db->where('tanggal >=', $tanggal.' '.$jam1);
        $this->db->where('tanggal <=', $tanggal.' '.$jam2);
        $this->db->from('pembayaran');
        $query = $this->db->get();
        $row = $query->row();
        return $row->jumlahJual;
    }

    function omset2($tanggal, $jam3, $jam4){
        $this->db->select_sum('jumlahJual');
        $this->db->where('status', 'sukses');
        $this->db->where('tanggal >=', $tanggal.' '.$jam3);
        $this->db->where('tanggal <=', $tanggal.' '.$jam4);
        $this->db->from('pembayaran');
        $query = $this->db->get();
        $row = $query->row();
        return $row->jumlahJual;
    }

    function nota1($tanggal, $jam1, $jam2){
        $this->db->where('status', 'sukses');
        $this->db->where('tanggal >=', $tanggal.' '.$jam1);
        $this->db->where('tanggal <=', $tanggal.' '.$jam2);
        return $this->db->count_all_results('pembayaran');;
    }

    function nota2($tanggal, $jam3, $jam4){
        $this->db->where('status', 'sukses');
        $this->db->where('tanggal >=', $tanggal.' '.$jam3);
        $this->db->where('tanggal <=', $tanggal.' '.$jam4);
        return $this->db->count_all_results('pembayaran');
    }

    function profit($tanggal) {
        $this->db->select_sum('profit');
        $this->db->where('status', 'sukses');
        $this->db->like('tanggal', $tanggal);
        $this->db->from('pembayaran');
        $query = $this->db->get();
        $row = $query->row();
        return $row->profit;
    }

    function simpanData($data) {
        $this->db->insert('aset', $data);
    }

    function dataAset($tanggal) {
        $this->db->like('tanggal', $tanggal, 'after');
        return $this->db->get('aset')->result_array();
    }
}
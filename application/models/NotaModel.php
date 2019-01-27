<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class NotaModel extends CI_Model {
	function kodeTerakhir() {
		$this->db->select('kode')->from('pembayaran')->order_by('id', 'DESC')->limit(1);
		$kode = $this->db->get();
		if ($kode->num_rows() > 0) {
         return $kode->row()->kode;
     	}
     	return false;
	}
	function transaksiTerakhir($kode) {
		$this->db->select('kode, tanggal, stok.nama, penjualan.jual, jumlah, total');
		$this->db->where('kode', $kode);
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		$this->db->from('penjualan');
		$query = $this->db->get();
		return $row = $query->result_array();
		//return $penjualan = $this->db->get('penjualan')->result_array();
	}

	function kasir($kode) {
		$this->db->select('kode');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		return $query->row->kode;
	}
	
	function pembayaranTerakhir($kode) {
		$this->db->select('tanggal, kode, jumlahJual, bayar, kembali');
		$this->db->where('kode', $kode);
		$this->db->from('pembayaran');
		$query = $this->db->get();
		return $row = $query->result_array();
	}
}

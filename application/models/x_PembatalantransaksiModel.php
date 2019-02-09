<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class PembatalantransaksiModel extends CI_Model {

	function cariTransaksi($kode) {
		$this->db->like('kode', $kode , 'both');
        $this->db->order_by('kode', 'ASC');
        $this->db->limit(10);
        return $this->db->get('penjualan')->result();
	}

	function buatPembatalan($data) {
		$this->db->insert('pembatalan', $data);
	}

	function cariPenjualan($kode) {
		$this->db->select('kode, idProduk, jumlah');
		$this->db->where('kode', $kode);
		$this->db->from('penjualan');
		$query = $this->db->get();
		return $query->result_array();
	}

	function updateStok($idProduk, $jumlah) {
		$this->db->set('stok', 'stok+' . (int) $jumlah, FALSE);
		$this->db->where('id', $idProduk);
		$this->db->update('stok');
	}

	function ubahStatus($kode, $idProduk) {
		//$this->db->set('status', 'batal', FALSE);
		$this->db->where('kode', $kode);
		$this->db->where('idProduk', $idProduk);
		$this->db->update('penjualan', array('status' => 'batal'));
	}

	function kurangiProfit($kode, $nilai) {
		$this->db->set('jumlahJual', 'jumlahJual-' . (int) $nilai, FALSE);
		$this->db->where('kode', $kode);
		$this->db->update('pembayaran');
	}

	function daftarPembatalan($tanggal) {
		$this->db->select('pembatalan.kode, pembatalan.tanggal, users.username, pembatalan.nilai');
		$this->db->like('pembatalan.tanggal', $tanggal, 'after');
		$this->db->from('pembatalan');
		$this->db->join('users', 'users.id = pembatalan.idUser');
		$this->db->join('stok', 'stok.id = pembatalan.idProduk');
		$query = $this->db->get();
		return $row = $query->result_array();
	}
}

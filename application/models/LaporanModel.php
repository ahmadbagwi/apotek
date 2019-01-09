<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class LaporanModel extends CI_Model {
	public function detail_harian($tanggal){
		//$this->db->get('penjualan');
		//$this->db->get_where('pembayaran' array('tanggal' => $tanggal));
		//$this->db->get('pembayaran');
		$this->db->select('kode, tanggal, users.username, stok.nama, idProduk, penjualan.jual, jumlah, total');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('penjualan');
		$this->db->join('users', 'users.id = penjualan.idUser');
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		return $query = $this->db->get();
		//return $query->result();
	}

	public function laba_harian($tanggal){
		//$this->db->get('penjualan');
		//$this->db->get_where('pembayaran' array('tanggal' => $tanggal));
		//$this->db->get('pembayaran');
		$this->db->select('kode, tanggal, 	jumlahModal, jumlahJual, profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		//$this->db->join('users', 'users.id = penjualan.idUser');
		//$this->db->join('stok', 'stok.id = penjualan.idProduk');
		return $query = $this->db->get();
		//return $query->result();
		$this->db->select_sum('profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		return $totalLabaHarian = $this->db->get();
	}

	public function laba_bulanan($tanggal){
		//$this->db->get('penjualan');
		//$this->db->get_where('pembayaran' array('tanggal' => $tanggal));
		//$this->db->get('pembayaran');
		$this->db->select('tanggal, 	jumlahModal, jumlahJual, profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		//$this->db->join('users', 'users.id = penjualan.idUser');
		//$this->db->join('stok', 'stok.id = penjualan.idProduk');
		return $query = $this->db->get();
		
	}


}
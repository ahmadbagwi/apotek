<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class LaporanModel extends CI_Model {
	public function detailHarian($tanggal){
		$this->db->select('kode, tanggal, users.username, stok.nama, idProduk, penjualan.jual, jumlah, total');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('penjualan');
		$this->db->join('users', 'users.id = penjualan.idUser');
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		return $detailHarian = $this->db->get();
	}

	function labaHarian($tanggal){
		$this->db->select('kode, tanggal, 	jumlahModal, jumlahJual, profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		return $labaHarian = $this->db->get();
	}

	function totalLabaHarian($tanggal){
		$this->db->select_sum('profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		return $totalLabaHarian = $this->db->get();
	}

	public function laba_bulanan($tanggal){
		for ($i=1; $i <= 31; $i++) { 
			//$this->db->select('tanggal');
			$this->db->select('SUM(jumlahModal)as total_modal');
			$this->db->select('SUM(jumlahJual)as total_jual');
			$this->db->select('SUM(profit)as total_profit');
			$this->db->like('tanggal', $tanggal, 'after');
			$this->db->from('pembayaran');
			$query = $this->db->get();
			if($query->num_rows() == 0) return false;
    		return $query->result_array();
			$tanggal++;
		}
	}


}
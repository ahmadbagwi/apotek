<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class LaporanModel extends CI_Model {

	function detailHarian($tanggal){
		$this->db->select('kode, tanggal, users.username, stok.nama, idProduk, penjualan.jual, jumlah, total, status');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('penjualan');
		$this->db->join('users', 'users.id = penjualan.idUser');
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function labaHarian($tanggal){
		$this->db->select('kode, tanggal, jumlahModal, jumlahJual, profit, status');
		$this->db->where('status', 'sukses');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		//$query = $this->db->query("SELECT kode, tanggal, jumlahModal, jumlahJual, profit FROM pembayaran WHERE tanggal LIKE '$tanggal%'");
		return $row = $query->result_array();
	}

	function totalLabaHarian($tanggal){
		//$query = $this->db->query("SELECT SUM(profit) AS Profit FROM pembayaran WHERE tanggal LIKE '$tanggal%'");
		$this->db->select_sum('profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->profit;
		
	}

	function laba_bulanan($tanggal){
		$data = array();
		for ($i=1; $i <= 12; $i++) { 
			$this->db->select('SUM(jumlahModal)as total_modal');
			$this->db->select('SUM(jumlahJual)as total_jual');
			$this->db->select('SUM(profit)as total_profit');
			$this->db->like('tanggal', $tanggal, 'after');
			$this->db->from('pembayaran');
			$query = $this->db->get();
			return $row = $query->result_array();
			//array_push($row, var)
			//if($query->num_rows() == 0) return false;
    		//return $query->result_array();
			$tanggal++;
		}
	}


}
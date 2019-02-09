<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class LaporanModel extends CI_Model {

	function detailHarian($tanggalJam){
		$this->db->select('kode, tanggal, users.username, stok.nama, idProduk, penjualan.jual, jumlah, total, status');
		$this->db->like('tanggal', $tanggalJam, 'after');
		$this->db->from('penjualan');
		$this->db->join('users', 'users.id = penjualan.idUser');
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function labaHarian($tanggal, $jam1, $jam2){
		$this->db->select('kode, users.username, jumlahModal, jumlahJual, profit, status');
		$this->db->where('status', 'sukses');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		//$this->db->like('tanggal', $tanggalJam, 'after');
		$this->db->from('pembayaran');
		$this->db->join('users', 'users.id = pembayaran.idUser');
		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function daftarKonsinyasi($tanggal, $jam1, $jam2){
		$this->db->select('penjualan.kode, penjualan.tanggal, users.username, stok.nama, penjualan.jumlah, penjualan.modal');
		//$this->db->select_sum('penjualan.modal', 'hargaModal');
		$this->db->where('penjualan.status', 'sukses');
		$this->db->where('stok.jenis', 'Konsinyasi');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		$this->db->from('penjualan');
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		$this->db->join('users', 'users.id = penjualan.idUser');
		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function totalModalHarian($tanggal, $jam1, $jam2){
		$this->db->select_sum('jumlahModal');
		$this->db->where('status', 'sukses');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->jumlahModal;
	}

	function totalJualHarian($tanggal, $jam1, $jam2){
		$this->db->select_sum('jumlahJual');
		$this->db->where('status', 'sukses');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->jumlahJual;
	}

	function totalLabaHarian($tanggal, $jam1, $jam2){
		$this->db->select_sum('profit');
		$this->db->where('status', 'sukses');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->profit;
	}

	function laba_bulanan($tanggal){ ///xxxx
		$this->db->select('tanggal');
		$this->db->select('jumlahModal');
		$this->db->select('jumlahJual');
		$this->db->select('profit');
		$this->db->where('status', 'sukses');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function labaBulanan($tanggal){
		$this->db->select('tanggal');
		$this->db->select('jumlahModal');
		$this->db->select('jumlahJual');
		$this->db->select('profit');
		$this->db->order_by('tanggal', 'ASC');
		$this->db->where('status', 'sukses');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		return $row = $query->result_array();
	}
	/*
	function labaBulananCoba {
		$this->db->select('tanggal, sum(jumlahModal), sum(jumlahJual), sum(profit)')->from('pembayaran');
	        ->group_start()
	                ->where('a', 'a')
	        ->group_end()
	        ->where('d', 'd')
		->get();
	}
	*/
	function modalBulanan($tanggal){
		$this->db->select_sum('jumlahModal');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->jumlahModal;
	}

	function jualBulanan($tanggal){
		$this->db->select_sum('jumlahJual');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->jumlahJual;
	}

	function profitBulanan($tanggal){
		$this->db->select_sum('profit');
		$this->db->like('tanggal', $tanggal, 'after');
		$this->db->from('pembayaran');
		$query = $this->db->get();
		$row = $query->row();
		return $row->profit;
	}

	function konsinyasi($tanggal, $jam1, $jam2) {
		$this->db->select('penjualan.kode, penjualan.tanggal, users.username, stok.nama, penjualan.modal, penjualan.jumlah, penjualan.status, penjualan.total');
		//$this->db->select_sum('penjualan.modal * penjualan.jumlah', ' konsinyasiTotal', FALSE); //Belum menghasilkan nilai
		$this->db->where('penjualan.status', 'sukses');
		$this->db->where('stok.jenis', 'konsinyasi');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		$this->db->from('penjualan');
		$this->db->join('users', 'users.id = penjualan.idUser');
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		$query = $this->db->get();
		return $row = $query->result_array();
	}

	function totalKonsinyasi($tanggal, $jam1, $jam2) {
		//$this->db->select_sum('penjualan.modal');
		$this->db->select('total');
		$this->db->where('penjualan.status', 'sukses');
		$this->db->where('stok.jenis', 'konsinyasi');
		$this->db->where('tanggal >=', $tanggal.' '.$jam1);
		$this->db->where('tanggal <=', $tanggal.' '.$jam2);
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		$this->db->from('penjualan');
		$query = $this->db->get();
		//$row = $query->row();
		return $row = $query->result_array();
	}

}
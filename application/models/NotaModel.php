<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class NotaModel extends CI_Model {
	function kodeTerakhir() {
		$this->db->select('kode')->from('pembayaran')->order_by('kode', 'DESC')->limit(1);
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
		return $penjualan = $this->db->get('penjualan');
	}

	function pembayaranTerakhir($kode) {
		$this->db->select('tanggal, kode, jumlahJual, bayar, kembali');
		$this->db->where('kode', $kode);
		return $pembayaran = $this->db->get('pembayaran');
	}
}

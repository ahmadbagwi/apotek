<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class NotaModel extends CI_Model {
	function kodeTerakhir() {
		//$this->db->select('kode');
		//return $kode = $this->db->get('pembayaran')->last_row();
		//return $this->db->order_by('id',"desc")->limit(1)->get('penjualan')->row();
		//return $kode = $this->db->query("SELECT kode FROM pembayaran ORDER BY kode DESC Limit 1");
		$this->db->select('kode')->from('pembayaran')->order_by('kode', 'DESC')->limit(1);
		$kode = $this->db->get();
		if ($kode->num_rows() > 0) {
         return $kode->row()->kode;
     	}
     	return false;
		//$this->db->order_by('kode',"desc");
		//$this->db->limit(1);
        //return $kode = $this->db->get('pembayaran')->row();
	}
	function transaksiTerakhir($kode) {
		$this->db->select('kode, tanggal, stok.nama, penjualan.jual, jumlah, total');
		//$kode = "trx_20190109140239";
		$this->db->where('kode', $kode);
		//$this->db->from('penjualan')
		$this->db->join('stok', 'stok.id = penjualan.idProduk');
		return $penjualan = $this->db->get('penjualan');
	}

	function pembayaranTerakhir($kode) {
		$this->db->select('tanggal, kode, jumlahJual, bayar, kembali');
		$this->db->where('kode', $kode);
		return $pembayaran = $this->db->get('pembayaran');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class NotapenjualanModel extends CI_Model {
	public function transaksiTerakhir() {
    	$this->db->select('kode, tanggal, idUser, pelanggan, idProduk, jual, jumlah, total');
    	//$this->db->where('kode', $kode);
    	$this->db->from('penjualan');
    	$querynota = $this->db->get();
    	return $querynota;
    }
}
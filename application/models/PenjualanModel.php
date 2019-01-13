<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
Class PenjualanModel extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    /*function search_product() {
    	if (isset($_REQUEST['query'])) {
    		$query = $_REQUEST['query'];
    		$find = $this->db->like('product_name', '$query');
			$array = array();
		    while ($row = mysql_fetch_array($find)) {
		        $array[] = array (
		            'label' => $row['city'].', '.$row['zip'],
		            'value' => $row['city'],
		        );
    	}
    //RETURN JSON ARRAY
    		echo json_encode ($array);
		}
    }*/
    function cariProduk($nama){
        //$this->db->select('nama', 'modal', 'jual');
        $this->db->like('nama', $nama , 'both');
        //$this->db->like('id', $nama, 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(10);
        return $this->db->get('stok')->result();
    }

     public function cariHarga($nama){
        $this->db->select('id', 'modal', 'jual');
        $this->db->like('nama', $nama , 'both');
        //$this->db->like('id', $nama, 'both');
        $this->db->order_by('nama', 'ASC');
        $this->db->limit(20);
        return $this->db->get('stok')->result();
    }

    function simpanPembayaran($pembayaran) {
    	return $this->db->insert('pembayaran', $pembayaran);
    }

    function simpanTransaksi($data) {
    	return $this->db->insert_batch('penjualan', $data);
    	/*$count = count($data['count']);
		for($i = 0; $i<$count; $i++){
			$entries[] = array(
				//'transaction_date'=>$data['transaction_date'][$i],
				'id_transaction'=>$data['itTransaction'][$i],
				'transaction_date'=>$data['date'][$i],
				'transaction_type'=>$data['type'][$i],
				'id_user'=>$data['user'][$i],
				'transaction_customer'=>$data['customer'][$i],
				'id_product'=>$data['idProduct'][$i],
				'stock_price'=>$data['stockPrice'][$i],
				'product_price'=>$data['Price'][$i],
				'transaction_qty'=>$data['quantity'][$i],
			);
		}
		$this->db->insert_batch('transaction', $entries); 
		if($this->db->affected_rows() > 0)
			return 1;
		else
			return 0;*/
    }
     public function GetRow($keyword) {        
        $this->db->order_by('id', 'DESC');
        $this->db->like("nama", $keyword);
        $this->db->like("id", $keyword);
        $this->db->from("stok");
        return $this->db->get('autocomplete')->result_array();
    }

}
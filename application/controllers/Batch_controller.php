<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Batch_controller extends CI_Controller {
	public function index()
	{
		$this->load->library('form_validation');
		$this->load->view('batch_view');
	}
	public function batchInsert()
	{
		$this->load->model('Batch');
		$result = $this->Batch->batchInsert($_POST);
		if($result){
			echo 1;
		}
		else{
			echo 0;
		}
		exit;
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
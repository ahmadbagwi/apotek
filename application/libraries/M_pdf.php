<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Xpdf {


	function Xpdf()

	{

		$CI = & get_instance();

		log_message('Debug', 'mPDF class is loaded.');

	}


	function load($param=NULL)

	{

		include_once APPPATH.'/third_party/mpdf/mpdf.php';


		if ($params == NULL)

		{

			$param = '"en-US-x","A4","","",10,10,10,10,6,3';

		}


		return new mPDF($param);

	}

}

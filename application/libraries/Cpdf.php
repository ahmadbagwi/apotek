<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

Class Cpdf {
 
    function __construct() {
        include_once APPPATH . '/third_party/fpdf/fpdf.php';
    }
}

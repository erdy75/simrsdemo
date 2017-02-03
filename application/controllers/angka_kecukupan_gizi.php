<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class angka_kecukupan_gizi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');	
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
			
		$this->load->view('gizi/v_angka_kecukupan_gizi');
		
	}
	
	
	
	
	
	
}

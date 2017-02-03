<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_ugd extends CI_Controller {

	public function index()
	{
		$this->load->model('m_ugd');
	}
	public function get_ugd_pas(){
		$rows = $this->m_ugd->get_ugd_pas();
	}
}

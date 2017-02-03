<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_j_pas extends CI_Controller {

	public function index()
	{
		$this->load->model('m_j_pas');
	}
	public function get_j_pas(){
		$rows = $this->m_j_pas->get_j_pas();
	}
}

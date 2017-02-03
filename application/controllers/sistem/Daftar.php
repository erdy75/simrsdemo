<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user','usr');
		$this->load->model('M_menu','menu');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	

		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/user', $data);
	}

}

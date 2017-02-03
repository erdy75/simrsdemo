<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tindakan extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_ugd');
		$this->load->model('m_j_pas');
		$this->load->model('m_pegawai');
		$this->load->model('m_gcs');
		$this->load->model('m_kesadaran');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_j_pass"]= $this->m_j_pas->get_j_pas();
		$data["dt_pegawais"]= $this->m_pegawai->get_pegawai();
		$data["dt_gcs_matas"]= $this->m_gcs->get_gcs('Respon Mata');
		$data["dt_gcs_ucapans"]= $this->m_gcs->get_gcs('Respon Ucapan');
		$data["dt_gcs_geraks"]= $this->m_gcs->get_gcs('Respon Gerak');
		$data["dt_kesadarans"]= $this->m_kesadaran->get_kesadaran();
		$data["dt_ugds"]= $this->m_ugd->get_ugd_pas('masuk');
		$this->load->view('igd/v_tindakan',$data);
		
	}
	function cari_norm(){
		$this->load->model('m_pasien');
		echo json_encode ($this->m_pasien ->get_pas());
	}
	function add_pas_ugd (){
		echo json_encode ($this->m_ugd->add_pas_ugd());
	}
}

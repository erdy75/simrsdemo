<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendaftaran extends CI_Controller {

	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$this->load->model('m_j_pas');
		$data["dt_j_pass"]= $this->m_j_pas->get_j_pas();
		$this->load->model('m_pegawai');
		$data["dt_pegawais"]= $this->m_pegawai->get_pegawai();
		$this->load->model('m_gcs');
		$data["dt_gcs_matas"]= $this->m_gcs->get_gcs('Respon Mata');
		$data["dt_gcs_ucapans"]= $this->m_gcs->get_gcs('Respon Ucapan');
		$data["dt_gcs_geraks"]= $this->m_gcs->get_gcs('Respon Gerak');
		$this->load->model('m_kesadaran');
		$data["dt_kesadarans"]= $this->m_kesadaran->get_kesadaran();
		$this->load->model('m_ugd');
		$data["dt_ugds"]= $this->m_ugd->get_ugd_pas('masuk');
		$this->load->view('igd/v_pendaftaran_igd',$data);
		
	}
	function cari_norm(){
		$this->load->model('m_pas');
		echo json_encode ($m_pas ->get_pas());
	}
}

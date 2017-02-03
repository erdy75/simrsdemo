<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class percobaan extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_ugd');
		$this->load->model('m_j_pas');
		$this->load->model('m_pegawai');
		$this->load->model('m_gcs');
		$this->load->model('m_kesadaran');
		$this->load->model('m_g_darah');
		$this->load->model('m_j_kel');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		$data["dt_g_darah"]= $this->m_g_darah->get_g_darah();		
		$data["dt_j_k"]= $this->m_j_kel->get_j_k();
		$data["dt_j_pass"]= $this->m_j_pas->get_j_pas();
		$data["dt_pegawais"]= $this->m_pegawai->get_pegawai();
		$data["dt_gcs_matas"]= $this->m_gcs->get_gcs('Respon Mata');
		$data["dt_gcs_ucapans"]= $this->m_gcs->get_gcs('Respon Ucapan');
		$data["dt_gcs_geraks"]= $this->m_gcs->get_gcs('Respon Gerak');
		$data["dt_kesadarans"]= $this->m_kesadaran->get_kesadaran();
		$data["dt_ugds"]= $this->m_ugd->get_ugd_pas('masuk');
		$this->load->view('igd/v_percobaan',$data);
		
	}
	function cari_norm(){
		$this->load->model('m_pasien');
		echo json_encode ($this->m_pasien ->get_pas());
	}
	function add_pas_ugd (){
		echo json_encode ($this->m_ugd->add_pas_ugd());
	}
	function insert(){
		echo json_encode ($this->m_ugd->insert());
	}
	function update(){
		echo json_encode ($this->m_ugd->update());
	}
	function cari(){
		echo json_encode ($this->m_ugd->cari());
	}
	function simpan(){
		echo json_encode ($this->m_ugd->simpan());
	}
	function edit(){
		echo json_encode ($this->m_ugd->edit());
	}
	function hapus(){
        echo json_encode ($this->m_ugd->hapus());    
    }
	function cari_nama(){
		echo json_encode ($this->m_ugd->cari_nama());
	}
	function list_datapribadi (){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama_lengkap', 1 => 'umur',2=> 'sekolah');
		
		$data = array();
		$rows = $this->m_ugd->list_datapribadi();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["nama_lengkap"];
			$nestedData[] = $row["umur"];
			$nestedData[] = $row["sekolah"];
			$nestedData[] = 0;
			$data[] = $nestedData;
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
		);

		echo json_encode($json_data); 
	}
	
}

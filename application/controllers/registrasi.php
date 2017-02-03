<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_ugd');
		$this->load->model('m_j_pas');
		$this->load->model('m_pegawai2');
		$this->load->model('m_gcs');
		$this->load->model('m_kesadaran');
		$this->load->model('m_tes');
		$this->load->model('m_daftar');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_j_pass"]= $this->m_j_pas->get_j_pas();
		$data["dt_pegawais"]= $this->m_pegawai2->get_pegawai();
		$data["dt_gcs_matas"]= $this->m_gcs->get_gcs('Respon Mata');
		$data["dt_gcs_ucapans"]= $this->m_gcs->get_gcs('Respon Ucapan');
		$data["dt_gcs_geraks"]= $this->m_gcs->get_gcs('Respon Gerak');
		$data["dt_kesadarans"]= $this->m_kesadaran->get_kesadaran();
		$data["dt_tess"]= $this->m_tes->get_nama_periksa();
		$data["dt_ugds"]= $this->m_ugd->get_ugd_pas('masuk');
		$this->load->view('registrasi/v_registrasi',$data);	
	}

	function cari_norm(){
		$this->load->model('m_pasien2');
		echo json_encode ($this->m_pasien2->get_pas());
	}

	function add_pas_ugd (){
		echo json_encode ($this->m_ugd->add_pas_ugd());
	}

	function get_barang (){
		$this->load->model('m_barang');
		echo json_encode ($this->m_barang->get_barang());
	}

	function get_pegawai (){
		$this->load->model('m_pegawai2');
		echo json_encode ($this->m_pegawai2->get_pegawai());
	}

	function get_poli (){
		$this->load->model('m_poli');
		echo json_encode ($this->m_poli->get_poli());
	}

	function update_pasien(){
		$this->load->model('m_daftar');
		echo $this->m_daftar->update_pasien();
	}

	function daftar_pasien(){
		$this->load->model('m_daftar');
		echo $this->m_daftar->daftar_pasien();
	}

	function daftar_booking(){
		$this->load->model('m_daftar');
		echo $this->m_daftar->daftar_booking();
	}

	function booking_pasien(){
		$this->load->model('m_daftar');
		echo $this->m_daftar->booking_pasien();
	}

    function antrianpasien(){
		$requestData= $_REQUEST;
		$rows =  $this->m_daftar->antrian_pasien($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot  =  $this->m_daftar->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}


private function renderDatatable($rows,$tot,$requestData){
		$data = array();
		foreach($rows as $row => $value) {  
			$nestedData=array(); 
			$nestedData[] = '';
			foreach($value as $nama => $fld){
				$nestedData[] = $fld;
			}	
			$data[] = $nestedData;
		}
		$totalData =$tot;
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
		);

		return $json_data; 
		
}

	function reset_antrian(){
		$this->load->model('m_daftar');
		echo json_encode($this->m_daftar->reset_antrian());
	}

	function batal_antrian(){
		$this->load->model('m_daftar');
		echo $this->m_daftar->batal_antrian();
	}

	function tarif(){
		$this->load->model('m_poli');
		echo json_encode($this->m_poli->tarif());
	}
}
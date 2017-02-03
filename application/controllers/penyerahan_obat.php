<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penyerahan_obat extends CI_Controller {
	
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
		$this->load->model('m_penyerahan_obat');
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
		
		$this->load->view('farmasi/v_penyerahan_obat',$data);
		
	}
	function update(){
		echo json_encode ($this->m_penyerahan_obat->update());
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
	function DataFaktur (){
		$requestData= $_REQUEST;
		$rows = $this->m_penyerahan_obat->DataFaktur($requestData['start'],$requestData['length']);
		$tot =$this->m_penyerahan_obat->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataDetail (){
		$requestData= $_REQUEST;
		$rows = $this->m_penyerahan_obat->DataDetail($requestData['start'],$requestData['length']);
		$tot =$this->m_penyerahan_obat->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
}

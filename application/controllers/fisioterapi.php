<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fisioterapi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_fisioterapi');
		$this->load->model('m_kesadaran');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_nama_dokter"]= $this->m_fisioterapi->get_nama_dokter();
		$data["dt_nama_perawat"]= $this->m_fisioterapi->get_nama_perawat();
		$data["dt_kesadarans"]=$this->m_kesadaran->get_kesadaran();
		$data["dt_icds"]=$this->m_fisioterapi->get_icd();
		$this->load->view('fisioterapi/v_fisioterapi',$data);	
	}

	function get_pas(){
		$this->load->model('m_pasienfisio');
		echo json_encode ($this->m_pasienfisio->get_pas());
	}

	function get_pas2(){
		$this->load->model('m_pasienfisio');
		echo json_encode ($this->m_pasienfisio->get_pas2());
	}

	function daftar_fisioterapi(){
		$this->load->model('m_fisioterapi');
		echo $this->m_fisioterapi->daftar_fisioterapi();
	}

	function antrian_fisioterapi (){
		$requestData= $_REQUEST;
		$rows = $this->m_fisioterapi->antrian_fisioterapi($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_fisioterapi->count_list_req();
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
	

	function get_dokter (){
		$this->load->model('m_fisioterapi');
		echo json_encode ($this->m_fisioterapi->get_dokter());
	}

	function get_perawat (){
		$this->load->model('m_fisioterapi');
		echo json_encode ($this->m_fisioterapi->get_perawat());
	}

	function simpan_medical_record(){
		$this->load->model('m_fisioterapi');
		echo $this->m_fisioterapi->simpan_medical_record();
	}

	function simpan_sementara(){
		$this->load->model('m_fisioterapi');
		echo $this->m_fisioterapi->simpan_sementara();
	}

	function update_pasien(){
		$this->load->model('m_fisioterapi');
		echo $this->m_fisioterapi->update_pasien();
	}	

	function simpan_pasien(){
		$this->load->model('m_fisioterapi');
		echo $this->m_fisioterapi->simpan_pasien();
	}	



	




}

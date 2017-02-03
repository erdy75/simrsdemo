<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_rawat_inap extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');	
		$this->load->model('m_pasien_rawat_inap');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
							
		$this->load->view('gizi/v_pasien_rawat_inap');
		
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
	function DataPRI(){
		$requestData= $_REQUEST;
		$rows = $this->m_pasien_rawat_inap->DataPRI($requestData['start'],$requestData['length']);
		$tot =$this->m_pasien_rawat_inap->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataPRI2(){
		$requestData= $_REQUEST;
		$rows = $this->m_pasien_rawat_inap->DataPRI2($requestData['start'],$requestData['length']);
		$tot =$this->m_pasien_rawat_inap->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
}

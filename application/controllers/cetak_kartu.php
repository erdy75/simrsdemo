<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetak_kartu extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('m_cetak_kartu');
		$this->load->model('m_registrasi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$this->load->view('registrasi/v_cetak_kartu');
		
	}
	
	function Simpan(){
		echo json_encode ($this->m_cetak_kartu->Simpan());
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
	function DataCetakKartu (){
		$requestData= $_REQUEST;
		$rows = $this->m_cetak_kartu->DataCetakKartu($requestData['start'],$requestData['length']);
		$tot =$this->m_cetak_kartu->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataHistory (){
		$requestData= $_REQUEST;
		$rows = $this->m_cetak_kartu->DataHistory($requestData['start'],$requestData['length']);
		$tot =$this->m_cetak_kartu->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
}

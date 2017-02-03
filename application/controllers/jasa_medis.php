<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class jasa_medis extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_jasa_medis');		
		$this->load->model('m_akutansi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_coas"]= $this->m_akutansi->get_coa();
		$data["dt_namadokter"]= $this->m_akutansi->get_nama_dokter();
		$this->load->view('akutansi/v_jasa_medis',$data);
		
	}
	
	function BatalRetur(){
		echo json_encode ($this->m_jasa_medis->BatalRetur());
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
	function DataPembayaran(){
		$requestData= $_REQUEST;
		$rows = $this->m_jasa_medis->DataPembayaran($requestData['start'],$requestData['length']);
		$tot =$this->m_jasa_medis->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataRincian(){
		$requestData= $_REQUEST;
		$rows = $this->m_jasa_medis->DataRincian($requestData['start'],$requestData['length']);
		$tot =$this->m_jasa_medis->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataRekapan(){
		$requestData= $_REQUEST;
		$rows = $this->m_jasa_medis->DataRekapan($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_jasa_medis->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
	
	
}

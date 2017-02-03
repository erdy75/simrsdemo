<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class purchasing extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_farmasi');
		$this->load->model('m_form_purchasing');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_barang"]= $this->m_farmasi->get_barang();
		$data["dt_kepalaunit"]= $this->m_farmasi->get_kepalaunit();
		$this->load->view('farmasi/v_form_purchasing',$data);
		
	}
	
	function cari_namabarang(){
		echo json_encode ($this->m_farmasi->cari_namabarang());
	}
	function get_namabarang(){
		echo json_encode ($this->m_farmasi->get_namabarang());
	}
	function simpan(){
		echo json_encode ($this->m_form_purchasing->simpan());
	}	
	function updaterequest(){
		echo json_encode ($this->m_form_purchasing->updaterequest());
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
	function DataPurchasing1 (){
		$requestData= $_REQUEST;
		$rows = $this->m_form_purchasing->DataPurchasing1($requestData['start'],$requestData['length']);
		$tot =$this->m_form_purchasing->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataPurchasing2(){
		$requestData= $_REQUEST;
		$rows = $this->m_form_purchasing->DataPurchasing2($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_form_purchasing->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class retur extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('m_retur');
		$this->load->model('m_transaksi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_nama_barang"]= $this->m_retur->get_nama_barang();
		$this->load->view('farmasi/v_retur',$data);
		
	}
	
	function CariBioUbl(){
		echo json_encode ($this->m_retur->get_bio_ubl());
	}
	function CariSubTotal1(){
		echo json_encode ($this->m_retur->Get_SubTotal1());
	}
	function SimpanReturUbl(){
		echo json_encode ($this->m_retur->SimpanReturUbl());
	}
	function get_stockrajal(){
		echo json_encode ($this->m_transaksi->get_stockrajal());
	}
	function get_stockranap(){
		echo json_encode ($this->m_transaksi->get_stockranap());
	}
	function UpdateStockRajal(){
		echo json_encode ($this->m_transaksi->UpdateStockRajal());
	}
	function UpdateStockRanap(){
		echo json_encode ($this->m_transaksi->UpdateStockRanap());
	}
	function CariBioLunas(){
		echo json_encode ($this->m_retur->get_bio_lunas());
	}
	function SimpanReturLunas(){
		echo json_encode ($this->m_retur->SimpanReturLunas());
	}
	function CariNoRM(){
		echo json_encode ($this->m_retur->get_norm());
	}
	function CariSubTotal2(){
		echo json_encode ($this->m_retur->Get_SubTotal2());
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
	function DataReturUbl1 (){
		$requestData= $_REQUEST;
		$rows = $this->m_retur->DataReturUbl1($requestData['start'],$requestData['length']);
		$tot =$this->m_retur->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataReturUbl2 (){
		$requestData= $_REQUEST;
		$rows = $this->m_retur->DataReturUbl2($requestData['start'],$requestData['length']);
		$tot =$this->m_retur->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataReturLunas1 (){
		$requestData= $_REQUEST;
		$rows = $this->m_retur->DataReturLunas1($requestData['start'],$requestData['length']);
		$tot =$this->m_retur->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataReturLunas2 (){
		$requestData= $_REQUEST;
		$rows = $this->m_retur->DataReturLunas2($requestData['start'],$requestData['length']);
		$tot =$this->m_retur->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataReturLunas3 (){
		$requestData= $_REQUEST;
		$rows = $this->m_retur->DataReturLunas3($requestData['start'],$requestData['length']);
		$tot =$this->m_retur->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
		
	
}

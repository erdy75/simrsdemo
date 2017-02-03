<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stock_apotek extends CI_Controller {
	
	function __construct() {
		parent::__construct();
				
		$this->load->model('m_farmasi');
		$this->load->model('m_stock_apotek');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){	
		
		
		$this->load->view('farmasi/v_stock_apotek');
		
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
	
	function DataStockBarang(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_apotek->DataStockBarang($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_apotek->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function CariRawatJalan(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama',1 => 'jumlah',2=> 'limit',3=> 'kemasan');
		
		$data = array();
		$rows = $this->m_stock_apotek->CariRawatJalan();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["Nama"];
			$nestedData[] = $row["Jumlah"];
			$nestedData[] = $row["Limit"];
			$nestedData[] = $row["Kemasan"];
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
	function CariRawatInap(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama',1 => 'jumlah',2=> 'limit',3=> 'kemasan');
		
		$data = array();
		$rows = $this->m_stock_apotek->CariRawatInap();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["Nama"];
			$nestedData[] = $row["Jumlah"];
			$nestedData[] = $row["Limit"];
			$nestedData[] = $row["Kemasan"];
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

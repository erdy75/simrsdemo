<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class set_fee_dokter extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');		
		$this->load->model('m_set_fee_dokter');
		$this->load->model('m_akutansi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
			
		$data["dt_poli"]= $this->m_akutansi->get_poli();
		$this->load->view('akutansi/v_set_fee_dokter',$data);
		
	}
	
	function SetFee(){
		echo json_encode ($this->m_set_fee_dokter->SetFee());
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
	function DataFeeDokter(){
		$requestData= $_REQUEST;
		$rows = $this->m_set_fee_dokter->DataFeeDokter($requestData['start'],$requestData['length']);
		$tot =$this->m_set_fee_dokter->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataFeeDokter2(){
		$requestData= $_REQUEST;
		$rows = $this->m_set_fee_dokter->DataFeeDokter2($requestData['start'],$requestData['length']);
		$tot =$this->m_set_fee_dokter->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataFeeDokter(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'id', 1 => 'nama', 2=> 'poli', 3=> 'fee');
		
		$data = array();
		$rows = $this->m_set_fee_dokter->DataFeeDokter();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["id"];
			$nestedData[] = $row["nama"];
			$nestedData[] = $row["poli"];
			$nestedData[] = $row["fee"].' item';				
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
	function DataFeeDokter2(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama_poli', 1 => 'nama', 2=> 'harga', 3=> 'feeValue', 4 => 'feeRefferal', 5 => 'tgl', 6=> 'user', 7=> 'id');
		
		$data = array();
		$rows = $this->m_set_fee_dokter->DataFeeDokter2();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["nama_poli"];
			$nestedData[] = $row["nama"];
			$nestedData[] = $row["harga"];
			$nestedData[] = $row["feeValue"];	
			$nestedData[] = $row["feeRefferal"];
			$nestedData[] = $row["tgl"];	
			$nestedData[] = $row["user"];
			$nestedData[] = $row["id"];				
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
	}*/
}

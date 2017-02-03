<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pasien_baru extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('m_pasien_baru');
		$this->load->model('m_registrasi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_jp"]= $this->m_registrasi->get_jp();
		$data["dt_kota"]= $this->m_registrasi->get_kota();		
		$data["dt_penjamin"]= $this->m_registrasi->get_penjamin();
		$this->load->view('registrasi/v_pasien_baru',$data);
		
	}
	
	function autonumber(){
		echo json_encode ($this->m_pasien_baru->autonumber());
	}
	function autonumber2(){
		echo json_encode ($this->m_pasien_baru->autonumber2());
	}
	function pasienpribadi(){
		echo json_encode ($this->m_pasien_baru->get_pasienpribadi());
	}
	function pasienkeluarga(){
		echo json_encode ($this->m_pasien_baru->get_pasienkeluarga());
	}
	function pasienmarketing(){
		echo json_encode ($this->m_pasien_baru->get_pasienmarketing());
	}
	function pasienaccount(){
		echo json_encode ($this->m_pasien_baru->get_pasienaccount());
	}
	function tambahpasien(){
		echo json_encode ($this->m_pasien_baru->tambahpasien());
	}
	function editpasien(){
		echo json_encode ($this->m_pasien_baru->editpasien());
	}
	function editkaryawan(){
		echo json_encode ($this->m_pasien_baru->editkaryawan());
	}
	function editasuransi(){
		echo json_encode ($this->m_pasien_baru->editasuransi());
	}
	function hapus(){
		echo json_encode ($this->m_pasien_baru->hapus());
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
	function DataPasienPribadi(){
		$requestData= $_REQUEST;
		$rows = $this->m_pasien_baru->DataPasienPribadi($requestData['start'],$requestData['length']);
		$tot =$this->m_pasien_baru->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataPasienPribadqi(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'id', 1 => 'nama', 2=> 'alamat', 3=> 'kota', 4=> 'tempat', 5 => 'umur', 6=> 'sex', 7=> 'no_kk', 8=> 'lain_lain', 9=> 'satuan', 10=> 'pangkat');
		
		$data = array();
		$rows = $this->m_pasien_baru->DataPasienPribadi();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["id"];
			$nestedData[] = $row["nama"];
			$nestedData[] = $row["alamat"]."/".$row["kota"];			
			$nestedData[] = $row["tempat"]."/".$row["umur"];
			$nestedData[] = $row["sex"];
			$nestedData[] = $row["no_kk"];			
			$nestedData[] = $row["lain_lain"].";".$row["satuan"].";".$row["pangkat"];
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

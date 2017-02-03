<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dietmakanan extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_dietmakanan');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		;
		$this->load->view('Gizi/v_dietmakanan');	
	}

	function tambah_diet(){
		$this->load->model('m_dietmakanan');
		echo json_encode ($this->m_dietmakanan->tambah_diet());
	}

	function ubah_diet(){
		$this->load->model('m_dietmakanan');
		echo json_encode ($this->m_dietmakanan->ubah_diet());
	}

	function delete_diet(){
		$this->load->model('m_dietmakanan');
		echo json_encode ($this->m_dietmakanan->delete_diet());
	}

	function get_kandungan_gizi(){
		echo json_encode ($this->m_dietmakanan->get_kandungan_gizi());
	}

	function get_nama_diet(){
		$requestData= $_REQUEST;
		$rows = $this->m_dietmakanan->get_nama_diet($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_dietmakanan->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_bahan_makanan(){
		$requestData= $_REQUEST;
		$rows = $this->m_dietmakanan->list_bahan_makanan($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_dietmakanan->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_gizi(){
		$requestData= $_REQUEST;
		$rows = $this->m_dietmakanan->list_gizi($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_dietmakanan->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_kandungangizi(){
		$requestData= $_REQUEST;
		$rows = $this->m_dietmakanan->list_kandungangizi($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_dietmakanan->count_list_req();
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


	function delete_gizi(){
		$this->load->model('m_dietmakanan');
		echo json_encode ($this->m_dietmakanan->delete_gizi());
	}

	function simpan_giziall(){
		$this->load->model('m_dietmakanan');
		echo json_encode ($this->m_dietmakanan->simpan_giziall());
	}




	


	
	


	




}

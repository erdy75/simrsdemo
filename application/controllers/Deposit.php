<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposit extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_deposit');
		$this->load->model('m_kesadaran');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		
		$this->load->view('akutansi/v_deposit');	
	}



   function list_lap_deposit (){
		$requestData= $_REQUEST;
		$rows = $this->m_deposit->list_lap_deposit($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_deposit->count_list_req();
		$this->total = $this->m_deposit->panggil_total('total',$this->m_deposit->querynya);
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
			"total"			  => $this->total,
			"data"            => $data   // total data array
		);

		return $json_data; 
		
    }

	function update_posting(){
		$this->load->model('m_deposit');
		echo json_encode ($this->m_deposit->update_posting());
	}

	function aktif_deposit(){
		$this->load->model('m_deposit');
		echo json_encode ($this->m_deposit->aktif_deposit());
	}

	function hapus_deposit(){
		$this->load->model('m_deposit');
		echo json_encode ($this->m_deposit->hapus_deposit());
	}




	




}

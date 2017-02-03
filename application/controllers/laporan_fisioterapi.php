<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_fisioterapi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_j_pas');
		$this->load->model('m_laporan_fisioterapi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_nama_per"]= $this->m_laporan_fisioterapi->nama_perawatan();
		$data["dt_j_pass"]= $this->m_j_pas->get_j_pas();
		$this->load->view('fisioterapi/v_laporan',$data);	
	}

function pas_fisioterapi (){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_fisioterapi->pas_fisioterapi($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_fisioterapi->count_list_req();
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





}

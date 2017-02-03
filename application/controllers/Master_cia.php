<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master_cia extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_master_cia');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_coas"]= $this->m_master_cia->get_coa();
		$data["dt_coas2"]= $this->m_master_cia->get_coa2();
		$this->load->view('akutansi/v_master_cia',$data);	
	}

	function tambah_chart_account(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->tambah_chart_account());
	}

	function delete_chart_account(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->delete_chart_account());
	}

	function update_neraca(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->update_neraca());
	}

	function update_level(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->update_level());
	}

	function update_level_akun(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->update_level_akun());
	}

	function get_chart(){
		$requestData= $_REQUEST;
		$rows = $this->m_master_cia->get_chart($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_master_cia->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
    
    function list_kas_bank(){
		$requestData= $_REQUEST;
		$rows = $this->m_master_cia->list_kas_bank($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_master_cia->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	 function list_aktivitas(){
		$requestData= $_REQUEST;
		$rows = $this->m_master_cia->list_aktivitas($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_master_cia->count_list_req();
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


	 function simpan_kas_bank(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->simpan_kas_bank());
	}


    function hapus_kas_bank(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->hapus_kas_bank());
	}

	 function simpan_aktivitas(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->simpan_aktivitas());
	}

	function hapus_aktivitas(){
		$this->load->model('m_master_cia');
		echo json_encode ($this->m_master_cia->hapus_aktivitas());
	}



	
	


	
	


	




}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class piutang_pasien extends CI_Controller {
	var $total = 0;

	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_piutang_pasien');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_pasnonapoteks"]= $this->m_piutang_pasien->pas_nonapotek();
		$this->load->view('akutansi/v_piutang_pasien',$data);	
	}

	function piutang_pasien(){
		$requestData= $_REQUEST;
		$rows = $this->m_piutang_pasien->piutang_pasien($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_piutang_pasien->count_list_req();
		$this->total = $this->m_piutang_pasien->panggil_total('total',$this->m_piutang_pasien->querynya);
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_piutang_pasien_detail(){
		$requestData= $_REQUEST;
		$rows = $this->m_piutang_pasien->list_piutang_pasien_detail($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_piutang_pasien->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

private function renderDatatable($rows,$tot,$requestData ){
		$data = array();
		$field  = array();
		$awal = 0;
		foreach($rows as $row => $value) {  
			$nestedData=array(); 
			$nestedField = array();
			$nestedData[] = '';
			$nestedField[] = '';
			foreach($value as $nama => $fld){
				$nestedData[] = $fld;
				
				$nestedField[] = $nama;
			   
			}	
			$data[] = $nestedData;
			if ($awal < 1)
			$field[] = $nestedField;
			 $awal++;
		}
		$totalData =$tot;
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"total"			  => $this->total,	
			"total_tag"       => $this->total,
			"data"            => $data  , // total data array
			"field"           => $field
		);

		return $json_data; 
		
	}


		function hapus_piutang(){
				echo json_encode ($this->m_piutang_pasien->hapus_piutang());
			}

	    function get_pas_nonapotek(){
		$this->load->model('m_piutang_pasien');
		echo json_encode ($this->m_piutang_pasien ->get_pas_nonapotek());
	}

	function detail_ubl(){
		$requestData= $_REQUEST;
		$rows = $this->m_piutang_pasien->detail_ubl($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_piutang_pasien->count_list_req();
		$this->total = $this->m_piutang_pasien->get_total('total_tag',$this->m_piutang_pasien->detail_ubl);
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function detail_ubl2(){
		$requestData= $_REQUEST;
		$rows = $this->m_piutang_pasien->detail_ubl2($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_piutang_pasien->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}


	function simpan_ubl(){
				$this->load->model('m_piutang_pasien');
					echo json_encode ($this->m_piutang_pasien->simpan_ubl());
			}

			





	
	


	
	


	




}

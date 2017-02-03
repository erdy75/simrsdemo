<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class gudang_fisioterapi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_gudang_fisioterapi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_barang"]= $this->m_gudang_fisioterapi->get_barang();
		$data["dt_kategori_items"]= $this->m_gudang_fisioterapi->get_kategori_item();
		$data["dt_kepala_units"]= $this->m_gudang_fisioterapi->get_kepala_unit();
		$this->load->view('fisioterapi/v_gudang_fisioterapi',$data);	
	}

	function get_nama_barang(){
		echo json_encode ($this->m_gudang_fisioterapi->get_nama_barang());
	}

	function get_satuan(){
		echo json_encode ($this->m_gudang_fisioterapi->get_satuan());
	}

	function simpan_order(){
		$this->load->model('m_gudang_fisioterapi');
		echo json_encode ($this->m_gudang_fisioterapi->simpan_order());
	}

	
	function delete_order(){
		$this->load->model('m_gudang_fisioterapi');
		echo json_encode ($this->m_gudang_fisioterapi->delete_order());
	}

	function delete_order_detail(){
		$this->load->model('m_gudang_fisioterapi');
		echo json_encode ($this->m_gudang_fisioterapi->delete_order_detail());
	}

	function daftar_permintaan (){
		$requestData= $_REQUEST;
		$rows = $this->m_gudang_fisioterapi->daftar_permintaan($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_gudang_fisioterapi->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_order_item(){
		$requestData= $_REQUEST;
		$rows = $this->m_gudang_fisioterapi->list_order_item($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_gudang_fisioterapi->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_order_detail(){
		$requestData= $_REQUEST;
		$rows = $this->m_gudang_fisioterapi->list_order_detail($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_gudang_fisioterapi->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_history_order(){
		$requestData= $_REQUEST;
		$rows = $this->m_gudang_fisioterapi->list_history_order($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_gudang_fisioterapi->count_list_req();
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

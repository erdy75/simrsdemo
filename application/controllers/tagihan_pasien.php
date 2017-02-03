<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tagihan_pasien extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_tagihan_pasien');		
		$this->load->model('m_fisiotherapy');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
							
		$data["dt_perawatan"]= $this->m_fisiotherapy->get_perawatan();
		$data["dt_namakelas"]= $this->m_fisiotherapy->get_nama_kelas();
		$data["dt_namadokter"]= $this->m_fisiotherapy->get_nama_dokter();
		$data["dt_namaperawat"]= $this->m_fisiotherapy->get_nama_perawat();
		$data["dt_penjamin"]= $this->m_fisiotherapy->get_penjamin();
		$data["dt_jp"]= $this->m_fisiotherapy->get_jp();
		$data["dt_bhp_obat"]= $this->m_fisiotherapy->get_barang();
		$this->load->view('fisioterapi/v_tagihan_pasien',$data);
		
	}
	
	function get_satuan(){
		echo json_encode ($this->m_fisiotherapy->get_satuan());
	}
	function get_tarif(){
		echo json_encode ($this->m_tagihan_pasien->get_tarif());
	}
	function TambahItem(){
		echo json_encode ($this->m_tagihan_pasien->TambahItem());
	}
	function HapusItem(){
		echo json_encode ($this->m_tagihan_pasien->HapusItem());
	}
	function TambahBHP(){
		echo json_encode ($this->m_tagihan_pasien->TambahBHP());
	}
	function HapusBHP(){
		echo json_encode ($this->m_tagihan_pasien->HapusBHP());
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
	function DataPasienFisioterapi(){
		$requestData= $_REQUEST;
		$rows = $this->m_tagihan_pasien->DataPasienFisioterapi($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_tagihan_pasien->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataFaktur(){
		$requestData= $_REQUEST;
		$rows = $this->m_tagihan_pasien->DataFaktur($requestData['start'],$requestData['length']);
		$tot =$this->m_tagihan_pasien->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('m_farmasi');
		$this->load->model('m_transaksi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_nama_dokter"]= $this->m_transaksi->get_nama_dokter();
		$data["dt_perawatan1"]= $this->m_transaksi->get_perawatan1();
		$this->load->view('farmasi/v_transaksi',$data);
		
	}
	
	function get_perawatan2(){
		$header = $this->input->post('header');
		$listdata = $this->m_transaksi->get_perawatan2($header);
		$text = "";
		$text.= "<select class='form-control' style='margin-left:4%;' id='combo_perawatan2'>";
		$text.= '<option value="'.'==PILIH=='.'">'.'==PILIH=='.'</option>';
		for ($i=0;$i<count($listdata);$i++){
			$text.= '<option value="'.$listdata[$i]['nama'].'">'.$listdata[$i]['nama']."</option>";
		}
		$text.= "</select>";
		echo $text;
	}
	
	function cari_namabarang(){
		echo json_encode ($this->m_transaksi->cari_namabarang());
	}
	function get_satuan(){
		echo json_encode ($this->m_transaksi->get_satuan());
	}
	function get_stockrajal(){
		echo json_encode ($this->m_transaksi->get_stockrajal());
	}
	function get_stockranap(){
		echo json_encode ($this->m_transaksi->get_stockranap());
	}
	function simpan(){
		echo json_encode ($this->m_transaksi->simpan());
	}
	function aoutonumber(){
		echo json_encode ($this->m_transaksi->aoutonumber());
	}
	function carinoreg(){
		echo json_encode ($this->m_transaksi->carinoreg());
	}
	function carinama(){
		echo json_encode ($this->m_transaksi->carinama());
	}
	function cariket(){
		echo json_encode ($this->m_transaksi->cariket());
	}
	function updateresep(){
		echo json_encode ($this->m_transaksi->updateresep());
	}
	function UpdateStockRajal(){
		echo json_encode ($this->m_transaksi->UpdateStockRajal());
	}
	function UpdateStockRanap(){
		echo json_encode ($this->m_transaksi->UpdateStockRanap());
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
	function DataTransaksi(){
		$requestData= $_REQUEST;
		$rows = $this->m_transaksi->DataTransaksi($requestData['start'],$requestData['length']);
		$tot =$this->m_transaksi->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataLayanan(){
		$requestData= $_REQUEST;
		$rows = $this->m_transaksi->DataLayanan($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_transaksi->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	
	
	
}

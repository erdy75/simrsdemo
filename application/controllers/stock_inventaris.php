<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stock_inventaris extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_stock_inventaris');		
		$this->load->model('m_fisiotherapy');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_barang"]= $this->m_fisiotherapy->get_barang();
		$data["dt_petugas"]= $this->m_fisiotherapy->get_petugas();	
		$this->load->view('fisioterapi/v_stock_inventaris',$data);
		
	}
	
	function get_satuan(){
		echo json_encode ($this->m_fisiotherapy->get_satuan());
	}
	function get_id_petugas(){
		echo json_encode ($this->m_fisiotherapy->get_id_petugas());
	}
	function Posting(){
		echo json_encode ($this->m_stock_inventaris->Posting());
	}
	function Mutasikan(){
		echo json_encode ($this->m_stock_inventaris->Mutasikan());
	}
	function Terima(){
		echo json_encode ($this->m_stock_inventaris->Terima());
	}
	function get_stockmasuk(){
		echo json_encode ($this->m_stock_inventaris->get_stockmasuk());
	}
	function get_stockkeluar(){
		echo json_encode ($this->m_stock_inventaris->get_stockkeluar());
	}
	function HapusTransaksi(){
		echo json_encode ($this->m_stock_inventaris->HapusTransaksi());
	}
	function HapusPenerimaan(){
		echo json_encode ($this->m_stock_inventaris->HapusPenerimaan());
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
	function DataStockUnit(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataStockUnit($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataBarangDiterima(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataBarangDiterima($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataStockMasuk(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataStockMasuk($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataStockKeluar(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataStockKeluar($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataHistoryTransaksi(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataHistoryTransaksi($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataHistoryPenerimaan(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataHistoryPenerimaan($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataDetailPenerimaan(){
		$requestData= $_REQUEST;
		$rows = $this->m_stock_inventaris->DataDetailPenerimaan($requestData['start'],$requestData['length']);
		$tot =$this->m_stock_inventaris->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}	
	
}

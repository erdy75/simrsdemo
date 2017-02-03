<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_akutansi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_report_akutansi');		
		$this->load->model('m_akutansi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_coas"]= $this->m_akutansi->get_coa();
		$data["dt_supplier"]= $this->m_akutansi->get_supplier();
		$this->load->view('akutansi/v_report_akutansi');
		
	}
	
	function Bayar(){
		echo json_encode ($this->m_bayar_hutang_cod->Bayar());
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
	function DataRekapanLPB (){
		$requestData= $_REQUEST;
		$rows = $this->m_report_akutansi->DataRekapanLPB($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_report_akutansi->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataRekapanLPB(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'tgl_faktur_supplier', 1 => 'supplier', 2=> 'no_faktur', 3=> 'pembayaran', 4=> 'PPN', 5 => 'total', 
							6=> 'tunai', 7=> 'kredit',8=> 'no_faktur_supplier');
		
		$pembayaran = 0;	
		$ppn = 0;	
		$total = 0;	
		$tunai = 0;			
		$kredit = 0;			
		$data = array();
		$rows = $this->m_report_akutansi->DataRekapanLPB();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["tgl_faktur_supplier"];
			$nestedData[] = $row["supplier"];
			$nestedData[] = $row["no_faktur"];
			$nestedData[] = number_format($row["pembayaran"]);
			$nestedData[] = number_format($row["PPN"]);
			$nestedData[] = number_format($row["total"]);
			$nestedData[] = number_format($row["tunai"]);
			$nestedData[] = number_format($row["kredit"]);
			$nestedData[] = $row["no_faktur_supplier"];	
			$nestedData[] = 0;
			$data[] = $nestedData;
			
			$pembayaran	= $pembayaran+$row["pembayaran"];	
			$ppn		= $total+$row["PPN"];	
			$total		= $total+$row["total"];	
			$tunai		= $tunai+$row["tunai"];	
			$kredit		= $kredit+$row["kredit"];	
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data,   // total data array
			"Pembayaran"	  => number_format($pembayaran),
			"PPN"			  => number_format($ppn),
			"Total"			  => number_format($total),
			"Tunai"			  => number_format($tunai),
			"Kredit"		  => number_format($kredit)
		);

		echo json_encode($json_data); 
	}*/
}

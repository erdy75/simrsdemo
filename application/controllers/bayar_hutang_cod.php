<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class bayar_hutang_cod extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_bayar_hutang_cod');		
		$this->load->model('m_akutansi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_coas"]= $this->m_akutansi->get_coa();
		$data["dt_supplier"]= $this->m_akutansi->get_supplier();
		$this->load->view('akutansi/v_bayar_hutang_cod',$data);
		
	}
	
	function Bayar(){
		echo json_encode ($this->m_bayar_hutang_cod->Bayar());
	}
	function BatalPembayaran(){
		echo json_encode ($this->m_bayar_hutang_cod->BatalPembayaran());
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
	function DataPembayaran(){
		$requestData= $_REQUEST;
		$rows = $this->m_bayar_hutang_cod->DataPembayaran($requestData['start'],$requestData['length']);
		$tot =$this->m_bayar_hutang_cod->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataDetailPembayaran(){
		$requestData= $_REQUEST;
		$rows = $this->m_bayar_hutang_cod->DataDetailPembayaran($requestData['start'],$requestData['length']);
		$tot =$this->m_bayar_hutang_cod->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataPembayaran(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'no_faktur', 1 => 'PO', 2=> 'supplier', 3=> 'tgl_faktur_supplier', 4=> 'no_faktur_supplier', 5 => 'ppn', 6=> 'jatuh_tempo', 7=> 'total',
							8=> 'kelompok_stock',9 => 'materai', 10=> 'user_id', 11=> 'isLunas');
		
		$total = 0;	
		$materai = 0;		
		$data = array();
		$rows = $this->m_bayar_hutang_cod->DataPembayaran();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["no_faktur"];
			$nestedData[] = $row["PO"];
			$nestedData[] = $row["supplier"];
			$nestedData[] = $row["tgl_faktur_supplier"];
			$nestedData[] = $row["no_faktur_supplier"];
			$nestedData[] = $row["ppn"];
			$nestedData[] = $row["jatuh_tempo"];
			$nestedData[] = number_format($row["total"]);	
			$nestedData[] = $row["kelompok_stock"];			
			$nestedData[] = number_format($row["materai"]);		
			$nestedData[] = $row["user_id"];
			$nestedData[] = $row["isLunas"];	
			$nestedData[] = 0;
			$data[] = $nestedData;
			
			$total		= $total+$row["total"];
			$materai	= $materai+$row["materai"];
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data,   // total data array
			"jatuhtempo"	  => number_format($total),
			"totalmaterai"	  => number_format($materai)
		);

		echo json_encode($json_data); 
	}
	function DataDetailPembayaran(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama', 1 => 'harga_beli', 2=> 'jumlah', 3=> 'disc', 4=> 'subtotal');
		
		$data = array();
		$rows = $this->m_bayar_hutang_cod->DataDetailPembayaran();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["nama"];
			$nestedData[] = number_format($row["harga_beli"]);
			$nestedData[] = $row["jumlah"];
			$nestedData[] = $row["disc"];
			$nestedData[] = number_format($row["subtotal"]);		
			$nestedData[] = 0;
			$data[] = $nestedData;
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
		);

		echo json_encode($json_data); 
	}*/
	function DataLaporanPembayaran(){
		$requestData= $_REQUEST;
		$rows = $this->m_bayar_hutang_cod->DataLaporanPembayaran($requestData['start'],$requestData['length']);
		$tot =$this->m_bayar_hutang_cod->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataLaporanPembayaran(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'kode_bayar', 1 => 'supplier', 2=> 'tanggal', 3=> 'jam', 4=> 'mode_bayar', 5 => 'remark', 6=> 'untuk', 7=> 'ref_kode_akun',
							8=> 'materai',9 => 'faktur_pajak', 10=> 'Total', 11=> 'nama');
		
		$total = 0;			
		$data = array();
		$rows = $this->m_bayar_hutang_cod->DataLaporanPembayaran();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["kode_bayar"];
			$nestedData[] = $row["supplier"];
			$nestedData[] = $row["tanggal"].' '.$row["jam"];
			$nestedData[] = $row["mode_bayar"].'('.$row["remark"].')';
			$nestedData[] = $row["untuk"];		
			$nestedData[] = $row["ref_kode_akun"];		
			$nestedData[] = number_format($row["materai"]);		
			$nestedData[] = $row["faktur_pajak"];
			$nestedData[] = number_format($row["Total"]);	
			$nestedData[] = $row["nama"];	
			$nestedData[] = $row["no_faktur_lpb"];	
			$nestedData[] = 0;
			$data[] = $nestedData;
			
			$total		= $total+$row["Total"];	
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data,   // total data array
			"TotalLaporan"	  => number_format($total)
		);

		echo json_encode($json_data); 
	}*/
	function DataRekapan(){
		$requestData= $_REQUEST;
		$rows = $this->m_bayar_hutang_cod->DataRekapan($requestData['start'],$requestData['length']);
		$tot =$this->m_bayar_hutang_cod->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataDetailRekapan(){
		$requestData= $_REQUEST;
		$rows = $this->m_bayar_hutang_cod->DataDetailRekapan($requestData['start'],$requestData['length']);
		$tot =$this->m_bayar_hutang_cod->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataRekapan(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama', 1 => 'hutang');
		
		$total = 0;			
		$data = array();
		$rows = $this->m_bayar_hutang_cod->DataRekapan();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["nama"];		
			$nestedData[] = number_format($row["hutang"]);		
			$nestedData[] = 0;
			$data[] = $nestedData;
			
			$total		= $total+$row["hutang"];	
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data,   // total data array
			"TotalHutang"	  => number_format($total)
		);

		echo json_encode($json_data); 
	}
	function DataDetailRekapan(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'no_faktur', 1 => 'PO', 2=> 'supplier', 3=> 'tgl_faktur_supplier', 4=> 'no_faktur_supplier', 5 => 'ppn', 6=> 'jatuh_tempo', 7=> 'total',
							8=> 'kelompok_stock',9 => 'materai', 10=> 'user_id', 11=> 'isLunas');
		
				
		$data = array();
		$rows = $this->m_bayar_hutang_cod->DataDetailRekapan();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["no_faktur"];
			$nestedData[] = $row["PO"];
			$nestedData[] = $row["supplier"];
			$nestedData[] = $row["tgl_faktur_supplier"];
			$nestedData[] = $row["no_faktur_supplier"];
			$nestedData[] = $row["ppn"];
			$nestedData[] = $row["jatuh_tempo"];
			$nestedData[] = number_format($row["total"]);	
			$nestedData[] = $row["kelompok_stock"];			
			$nestedData[] = number_format($row["materai"]);		
			$nestedData[] = $row["user_id"];
			$nestedData[] = $row["isLunas"];	
			$nestedData[] = 0;
			$data[] = $nestedData;
			
		}
		$totalData =count($data);
		$totalFiltered = $totalData;
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
		);

		echo json_encode($json_data); 
	}*/
}

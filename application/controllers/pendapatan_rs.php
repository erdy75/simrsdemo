<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pendapatan_rs extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_pendapatan_rs');		
		$this->load->model('m_akutansi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_coas"]= $this->m_akutansi->get_coa();
		$data["dt_jp"]= $this->m_akutansi->get_jp();
		$data["dt_poli"]= $this->m_akutansi->get_poli();
		$data["dt_namadokter"]= $this->m_akutansi->get_nama_dokter();
		$this->load->view('akutansi/v_pendapatan_rs',$data);
		
	}
	
	function BatalRetur(){
		echo json_encode ($this->m_pendapatan_rs->BatalRetur());
	}
	function BatalTransaksiP(){
		echo json_encode ($this->m_pendapatan_rs->BatalTransaksiP());
	}
	function BatalTransaksiA(){
		echo json_encode ($this->m_pendapatan_rs->BatalTransaksiA());
	}
	function HapusApotek(){
		echo json_encode ($this->m_pendapatan_rs->HapusApotek());
	}
	function KoreksiFeeP(){
		echo json_encode ($this->m_pendapatan_rs->KoreksiFeeP());
	}
	function HapusPoli(){
		echo json_encode ($this->m_pendapatan_rs->HapusPoli());
	}
	function PostingPelunasanPenjamin(){
		echo json_encode ($this->m_pendapatan_rs->PostingPelunasanPenjamin());
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
	function DataPendapatanPoli(){
		$requestData= $_REQUEST;
		$rows = $this->m_pendapatan_rs->DataPendapatanPoli($requestData['start'],$requestData['length']);
		$tot =$this->m_pendapatan_rs->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataPendapatanApotek(){
		$requestData= $_REQUEST;
		$rows = $this->m_pendapatan_rs->DataPendapatanApotek($requestData['start'],$requestData['length']);
		$tot =$this->m_pendapatan_rs->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataPendapatanPenjamin(){
		$requestData= $_REQUEST;
		$rows = $this->m_pendapatan_rs->DataPendapatanPenjamin($requestData['start'],$requestData['length']);
		$tot =$this->m_pendapatan_rs->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataPendapatanPenjamin2(){
		$requestData= $_REQUEST;
		$rows = $this->m_pendapatan_rs->DataPendapatanPenjamin2($requestData['start'],$requestData['length']);
		$tot =$this->m_pendapatan_rs->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataTransaksiRetur(){
		$requestData= $_REQUEST;
		$rows = $this->m_pendapatan_rs->DataTransaksiRetur($requestData['start'],$requestData['length']);
		$tot =$this->m_pendapatan_rs->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataPendapatanPoli(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'faktur', 1 => 'pasien_tampil', 2=> 'id', 3=> 'bayar_1', 4=> 'bayar_2', 5 => 'tanggal', 6=> 'jam', 7=> 'keterangan', 8=> 'harga_satuan', 
							9=> 'total', 10=> 'subtotal', 11 => 'disc', 12=> 'gratis', 13=> 'poli', 14=> 'id_dokter', 15=> 'tgl_dilakukan_tindakan', 16=> 'fee', 
							17 => 'dokterRefferal', 18=> 'feeRefferal', 19=> 'KelompokBeli', 20=> 'Penjamin', 21=> 'nama');
		
		$data = array();
		$rows = $this->m_pendapatan_rs->DataPendapatanPoli();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["faktur"];
			$nestedData[] = $row["pasien_tampil"].'('.$row["id"].')';
			$nestedData[] = $row["bayar_1"].'; '.$row["bayar_2"].';';
			$nestedData[] = $row["tanggal"].''.$row["jam"];		
			$nestedData[] = $row["keterangan"];
			$nestedData[] = $row["harga_satuan"];			
			$nestedData[] = $row["total"];
			$nestedData[] = number_format($row["subtotal"]);
			$nestedData[] = $row["disc"];			
			$nestedData[] = $row["gratis"];
			$nestedData[] = $row["poli"];
			$nestedData[] = $row["id_dokter"];			
			$nestedData[] = $row["tgl_dilakukan_tindakan"];		
			$nestedData[] = $row["fee"];	
			$nestedData[] = $row["dokterRefferal"];
			$nestedData[] = $row["feeRefferal"];
			$nestedData[] = $row["KelompokBeli"];			
			$nestedData[] = $row["Penjamin"];		
			$nestedData[] = $row["nama"];	
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
	}
	function DataPendapatanPenjamin(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'id', 1 => 'pasien_tampil', 2=> 'alamat_tampil', 3=> 'invoice1', 4=> 'invoice2', 5 => 'Penjamin', 6=> 'credit1', 7=> 'credit2', 8=> 'tanggal', 
							9=> 'jam');
		
		$data = array();
		$rows = $this->m_pendapatan_rs->DataPendapatanPenjamin();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["id"];
			$nestedData[] = $row["pasien_tampil"];
			$nestedData[] = $row["alamat_tampil"];
			$nestedData[] = $row["invoice1"];			
			$nestedData[] = $row["invoice2"];			
			$nestedData[] = $row["Penjamin"];		
			$nestedData[] = $row["credit1"].' - '.$row["credit2"];
			$nestedData[] = $row["tanggal"].'/'.$row["jam"];	
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
	}
	function DataPendapatanPenjamin2(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'id', 1 => 'pasien_tampil', 2=> 'alamat_tampil', 3=> 'invoice1', 4=> 'invoice2', 5 => 'Penjamin', 6=> 'credit1', 7=> 'credit2', 8=> 'tanggal', 
							9=> 'jam');
		
		$data = array();
		$rows = $this->m_pendapatan_rs->DataPendapatanPenjamin2();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["id"];
			$nestedData[] = $row["alamat_tampil"];
			$nestedData[] = $row["invoice1"];			
			$nestedData[] = $row["invoice2"];			
			$nestedData[] = $row["credit1"].' - '.$row["credit2"];
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
	}
	function DataPendapatanApotek(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'no_faktur', 1 => 'pasien_tampil', 2=> 'cib', 3=> 'tanggal', 4=> 'jam', 5 => 'nama_barang', 6=> 'harga', 7=> 'kuantitas', 8=> 'subtotal', 
							9=> 'tanggal_jam_diberikan_obatnya', 10=> 'dokter', 11 => 'inap_jalan', 12=> 'KelompokBeli', 13=> 'penjamin', 14=> 'nama', 15=> 'status');
		
		$data = array();
		$rows = $this->m_pendapatan_rs->DataPendapatanApotek();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["no_faktur"];
			$nestedData[] = $row["pasien_tampil"].'('.$row["cib"].')';
			$nestedData[] = $row["tanggal"].' / '.$row["jam"];
			$nestedData[] = $row["nama_barang"];
			$nestedData[] = number_format($row["harga"]);			
			$nestedData[] = $row["kuantitas"];
			$nestedData[] = number_format($row["subtotal"]);
			$nestedData[] = $row["tanggal_jam_diberikan_obatnya"];			
			$nestedData[] = $row["dokter"];
			$nestedData[] = $row["inap_jalan"];
			$nestedData[] = $row["KelompokBeli"];			
			$nestedData[] = $row["penjamin"];		
			$nestedData[] = $row["nama"];	
			$nestedData[] = $row["status"];
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
	}
	function DataTransaksiRetur(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'no_retur', 1 => 'Item', 2=> 'harga_kembali', 3=> 'kuantitas', 4=> 'total', 5 => 'tgl', 6=> 'jam', 7=> 'type_transaksi', 8=> 'referensi_kwitansi', 9=> 'id_kasir', 10=> 'nama');
		
		$data = array();
		$rows = $this->m_pendapatan_rs->DataTransaksiRetur();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["no_retur"];
			$nestedData[] = $row["Item"];
			$nestedData[] = number_format($row["harga_kembali"]);			
			$nestedData[] = $row["kuantitas"];
			$nestedData[] = number_format($row["total"]);
			$nestedData[] = $row["tgl"];			
			$nestedData[] = $row["jam"];
			$nestedData[] = $row["type_transaksi"];
			$nestedData[] = $row["referensi_kwitansi"];			
			$nestedData[] = $row["id_kasir"].' / '.$row["nama"];	
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

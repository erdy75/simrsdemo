<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paket extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('m_paket');
		$this->load->model('m_registrasi');
		
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_nama_dokter"]= $this->m_registrasi->get_nama_dokter();
		$data["dt_nama_paket"]= $this->m_paket->get_nama_paket();
		$this->load->view('registrasi/v_paket',$data);
		
	}
	
	function carinorm(){
		echo json_encode ($this->m_paket->get_norm());
	}
	function caripaket(){
		echo json_encode ($this->m_paket->get_paket());
	}
	function list_paket(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'dokter', 1 => 'tindakan', 2=> 'tarif', 3=> 'jenis', 4=> 'poli');
		
		$data = array();
		$rows = $this->m_paket->list_paket();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			//$nestedData[] = $row["dokter"];
			$nestedData[] = $row["tindakan"];
			$nestedData[] = number_format ($row["tarif"]);
			$nestedData[] = $row["jenis"];
			$nestedData[] = $row["poli"];
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
}






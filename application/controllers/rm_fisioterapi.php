<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rm_fisioterapi extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_rm_fisioterapi');		
		$this->load->model('m_fisiotherapy');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
							
		$data["dt_perawatan"]= $this->m_fisiotherapy->get_perawatan();
		$data["dt_namadokter"]= $this->m_fisiotherapy->get_nama_dokter();
		$data["dt_namaperawat"]= $this->m_fisiotherapy->get_nama_perawat();
		$data["dt_icd"]= $this->m_fisiotherapy->get_icd();
		$data["dt_kesadaran"]= $this->m_fisiotherapy->get_kesadaran();
		$this->load->view('fisioterapi/v_rm_fisioterapi',$data);
		
	}
	function Update(){
		echo json_encode ($this->m_rm_fisioterapi->Update());
	}
	function Hapus(){
		echo json_encode ($this->m_rm_fisioterapi->Hapus());
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
	function DataFisioterapi(){
		$requestData= $_REQUEST;
		$rows = $this->m_rm_fisioterapi->DataFisioterapi($requestData['start'],$requestData['length']);
		$tot =$this->m_rm_fisioterapi->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataFisioterapi(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'no_upf', 1 => 'nama', 2=> 'cib_pasien', 3=> 'tgl_rm', 4=> 'time_rm', 5 => 'dokter', 6=> 'poli', 7=> 'alamat', 8=> 'sex', 9=> 'umur', 10=> 'inap_jalan', 
						  11=> 'perawat', 12=> 'jenis_terapi', 13=> 'tgl_mulai', 14=> 'tgl_selesai', 15=> 'kode_icd_utama', 16=> 'Deskripsi', 17=> 'anamnesa', 18=> 'pemeriksaan', 
						  19=> 'keadaan_umum', 20=> 'kesadaran', 21=> 'terapi', 22=> 'nama_terapi', 23=> 'sistole', 24=> 'suhu', 25=> 'bb', 26=> 'tb', 27=> 'nadi', 28=> 'respiratory',
						  29=> 'jam_mulai', 30=> 'jam_selesai');
		
		$data = array();
		$rows = $this->m_rm_fisioterapi->DataFisioterapi();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["no_upf"];
			$nestedData[] = $row["nama"];
			$nestedData[] = $row["cib_pasien"];		
			$nestedData[] = $row["tgl_rm"];	
			$nestedData[] = $row["time_rm"];	
			$nestedData[] = $row["dokter"];
			$nestedData[] = $row["poli"];	
			$nestedData[] = $row["alamat"];	
			$nestedData[] = $row["sex"];	
			$nestedData[] = $row["umur"];
			$nestedData[] = $row["inap_jalan"];	
			$nestedData[] = $row["perawat"];	
			$nestedData[] = $row["jenis_terapi"];
			$nestedData[] = $row["tgl_mulai"];	
			$nestedData[] = $row["tgl_selesai"];	
			$nestedData[] = $row["kode_icd_utama"];	
			$nestedData[] = $row["Deskripsi"];	
			$nestedData[] = $row["anamnesa"];
			$nestedData[] = $row["pemeriksaan"];	
			$nestedData[] = $row["keadaan_umum"];	
			$nestedData[] = $row["kesadaran"];	
			$nestedData[] = $row["terapi"];	
			$nestedData[] = $row["nama_terapi"];
			$nestedData[] = $row["sistole"];
			$nestedData[] = $row["suhu"];	
			$nestedData[] = $row["bb"];	
			$nestedData[] = $row["tb"];	
			$nestedData[] = $row["nadi"];	
			$nestedData[] = $row["respiratory"];	
			$nestedData[] = $row["jam_mulai"];	
			$nestedData[] = $row["jam_selesai"];
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

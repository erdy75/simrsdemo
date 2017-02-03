<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class set_harga extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_set_harga');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$data["dt_trf_labs"]= $this->m_set_harga->tarif_laboratorium();
		$data["dt_tindakans"]= $this->m_set_harga->get_tindakan();
		$data["dt_layanans"]= $this->m_set_harga->combo_nama_paket();
		$data["dt_pricings"]= $this->m_set_harga->get_princing();
		$this->load->view('akutansi/v_set_harga',$data);	
	}

	function cari_poli(){
		echo json_encode ($this->m_set_harga->cari_poli());
	}

	function periksa_lab(){
		echo json_encode ($this->m_set_harga->periksa_lab());
	}
    
    function tindakan_poli(){
		echo json_encode ($this->m_set_harga->tindakan_poli());
	}

	function list_hargapoli(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_hargapoli($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function tambah_harga(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tambah_harga());
	}
	
	function update_kelompok(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_kelompok());
	}

	function hapus_harga(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->hapus_harga());
	}

	function update_harga(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_harga());
	}

	function update_include_harga(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_include_harga());
	}

	function simpan_daftarpkt(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->simpan_daftarpkt());
	}

	function hapus_paket(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->hapus_paket());
	}



	function tarif_bertingkat (){
		$requestData= $_REQUEST;
		$rows = $this->m_set_harga->tarif_bertingkat($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

private function renderDatatable($rows,$tot,$requestData){
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
			"data"            => $data  , // total data array
			"field"           => $field
		);

		return $json_data; 
		
}


	function tambah_nama_tarif(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tambah_nama_tarif());
	}

	function list_hrg_paket(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_hrg_paket($requestData['start'],$requestData['length']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_hrg_paket_detail(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_hrg_paket_detail($requestData['start'],$requestData['length']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function layanan_detail(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->layanan_detail($requestData['start'],$requestData['length'], $requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function tambah_tindakan(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tambah_tindakan());
	}

	function hapus_tindakan(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->hapus_tindakan());
	}

	function cari_bidang(){
		echo json_encode ($this->m_set_harga->cari_bidang());
	}

	function list_bidang(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_bidang($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function update_lab_all(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_lab_all());
	}

	function update_naik_hargaall(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_naik_hargaall());
	}

	function list_bid_rad(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_bid_rad($requestData['start'],$requestData['length'], $requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function tambah_periksa_rad(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tambah_periksa_rad());
	}

	function hapus_periksa_rad(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->hapus_periksa_rad());
	}

	function tambah_kel_rad(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tambah_kel_rad());
	}

	function update_rad_all(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_rad_all());
	}

	function list_nm_pricing(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_nm_pricing($requestData['start'],$requestData['length'], $requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function tbh_nama_pricing(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tbh_nama_pricing());
	}

	function hapus_nama_pricing(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->hapus_nama_pricing());
	}

	function update_nama_pricing(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->update_nama_pricing());
	}

	function list_base_pricing(){
		$requestData= $_REQUEST;
		$this->load->model('m_set_harga');
		$rows = $this->m_set_harga->list_base_pricing($requestData['start'],$requestData['length'], $requestData['search']['value']);
		$tot =$this->m_set_harga->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function tbh_set_pricing(){
		$this->load->model('m_set_harga');
		echo json_encode ($this->m_set_harga->tbh_set_pricing());
	}



	
	


	




}

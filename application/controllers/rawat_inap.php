<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rawat_inap extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->model('m_rawat_inap');
		$this->load->model('m_registrasi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
		
		$data["dt_jp"]= $this->m_registrasi->get_jp();
		$data["dt_nama_dokter"]= $this->m_registrasi->get_nama_dokter();
		$data["dt_kamar"]= $this->m_rawat_inap->get_kamar();
		$data["dt_poli"]= $this->m_rawat_inap->get_poli();
		$this->load->view('registrasi/v_rawat_inap',$data);
		
	}
	
	function get_bedkosong(){
		$kamar = $this->input->post('kamar');
		$listdata = $this->m_rawat_inap->get_bedkosong($kamar);
		$text = "";
		$text.= "<select class='form-control' style='margin-left:-20%;' id='combo_bedkosong'>";
		$text.= '<option value="'.'==PILIH=='.'">'.'==PILIH=='.'</option>';
		for ($i=0;$i<count($listdata);$i++){
			$text.= '<option value="'.$listdata[$i]['nama'].'">'.$listdata[$i]['nama']."</option>";
		}
		$text.= "</select>";
		echo $text;
	}
	function carinorm(){
		echo json_encode ($this->m_rawat_inap->get_norm());
	}
	function simpan(){
		echo json_encode ($this->m_rawat_inap->simpan());
	}
	function UpdateStatusKamar(){
		echo json_encode ($this->m_rawat_inap->UpdateStatusKamar());
	}
	
	function list_kamar(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama', 1 => 'bed_kosong', 2=> 'tarif', 3=> 'kelas', 4=> 'fasiliitas');
		
		$data = array();
		$rows = $this->m_rawat_inap->list_kamar();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["nama"];
			$nestedData[] = $row["bed_kosong"];
			$nestedData[] = number_format ($row["tarif"]);
			$nestedData[] = $row["kelas"];
			$nestedData[] = $row["fasilitas"];
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






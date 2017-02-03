<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi_sia extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');		
		$this->load->model('m_transaksi_sia');
		$this->load->model('m_akutansi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
			
		$data["dt_namakas"]= $this->m_akutansi->get_kas();
		$data["dt_namaaktivitas"]= $this->m_akutansi->get_aktivitas();
		$data["dt_coas"]= $this->m_akutansi->get_coa();
		$this->load->view('akutansi/v_transaksi_sia',$data);
		
	}
	
	function get_transaksi(){
		echo json_encode ($this->m_transaksi_sia->get_transaksi());
	}
	function get_total(){
		echo json_encode ($this->m_transaksi_sia->get_total());
	}
	function combo_transaksi(){
		$nokas = $this->input->post('nokas');
		$listdata = $this->m_transaksi_sia->combo_transaksi($nokas);
		$text = "";
		$text.= "<select class='form-control' id='combo_aktivitas'>";
		$text.= '<option value="'.'== PILIH =='.'">'.'== PILIH =='."</option>";
		for ($i=0;$i<count($listdata);$i++){
			$text.= '<option value="'.$listdata[$i]['aktivitas'].'">'.$listdata[$i]['aktivitas']."</option>";
		}
		$text.= "</select>";
		$text.= "<script>";
		$text.= '$("#combo_aktivitas").change(function () { 
			if($("#combo_aktivitas option:selected").text() == "== PILIH =="){
				$("#creditdebet2").text("?");
				$("#kodeaktivitas").val("");
				$("#namaaktivitas").val("");			
				$("#rincian").val("");
			}else{
				DataAktivitas();
				$("#rincian").val($("#combo_aktivitas option:selected").text());
			}
		
		
		});	
		function DataAktivitas(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_aktivitas option:selected").text()}, 
			url: "../get_aktivitas/",
			async: false, type:"POST",
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#creditdebet2").text(dt.DEBET_CREDIT);$("#kodeaktivitas").val(dt.kode_COA);$("#namaaktivitas").val(dt.nama);}, 
			error: function(){alert("Error Nih !!! ");}		
		});
		}';
		$text.= '</script>';
		echo $text;
	}
	function get_aktivitas(){
		echo json_encode ($this->m_transaksi_sia->get_aktivitas());
	}
	function Simpan(){
		echo json_encode ($this->m_transaksi_sia->Simpan());
	}
	function Hapus(){
		echo json_encode ($this->m_transaksi_sia->Hapus());
	}
	function Posting(){
		echo json_encode ($this->m_transaksi_sia->Posting());
	}
	function get_total_jurnal(){
		echo json_encode ($this->m_transaksi_sia->get_total_jurnal());
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
	function DataBKK(){
		$requestData= $_REQUEST;
		$rows = $this->m_transaksi_sia->DataBKK($requestData['start'],$requestData['length']);
		$tot =$this->m_transaksi_sia->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataJurnal(){
		$requestData= $_REQUEST;
		$rows = $this->m_transaksi_sia->DataJurnal($requestData['start'],$requestData['length']);
		$tot =$this->m_transaksi_sia->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataBKK(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'uraian', 1 => 'nilai', 2=> 'remark', 3=> 'kode_akun', 4=> 'id_jurnal');
		
		$data = array();
		$rows = $this->m_transaksi_sia->DataBKK();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["uraian"];
			$nestedData[] = $row["nilai"];
			$nestedData[] = $row["remark"];
			$nestedData[] = $row["kode_akun"];			
			$nestedData[] = $row["id_jurnal"];
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
	
	function DataJurnal(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'kode_akun', 1 => 'uraian', 2=> 'debet', 3=> 'credit', 4=> 'id_jurnal', 5=> 'idx');
		
		$data = array();
		$rows = $this->m_transaksi_sia->DataJurnal();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["kode_akun"];
			$nestedData[] = $row["uraian"];
			$nestedData[] = $row["debet"];
			$nestedData[] = $row["credit"];			
			$nestedData[] = $row["id_jurnal"];	
			$nestedData[] = $row["idx"];
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

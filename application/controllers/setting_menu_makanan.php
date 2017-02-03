<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class setting_menu_makanan extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		$this->load->library('encrypt');
		$this->load->helper('url');	
		$this->load->model('m_setting_menu_makanan');
		//$this->load->model('m_gizi');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){		
			
		$this->load->view('gizi/v_setting_menu_makanan');
		
	}
	
	function TambahMenu(){
		echo json_encode ($this->m_setting_menu_makanan->TambahMenu());
	}
	function UbahMenu(){
		echo json_encode ($this->m_setting_menu_makanan->UbahMenu());
	}
	function HapusMenu(){
		echo json_encode ($this->m_setting_menu_makanan->HapusMenu());
	}
	function TambahDiet(){
		echo json_encode ($this->m_setting_menu_makanan->TambahDiet());
	}
	function HapusDiet(){
		echo json_encode ($this->m_setting_menu_makanan->HapusDiet());
	}
	function TambahBahan(){
		echo json_encode ($this->m_setting_menu_makanan->TambahBahan());
	}
	function HapusBahan(){
		echo json_encode ($this->m_setting_menu_makanan->HapusBahan());
	}
	
	function combo_diet(){
		$menu = $this->input->post('menu');
		$listdata = $this->m_setting_menu_makanan->combo_diet($menu);
		$text = "";
		$text.= "<select class='form-control' id='combo_diet'>";
		//$text.= '<option value="'.'== PILIH =='.'">'.'== PILIH =='."</option>";
		for ($i=0;$i<count($listdata);$i++){
			$text.= '<option value="'.$listdata[$i]['diet'].'">'.$listdata[$i]['diet']."</option>";
		}
		$text.= "</select>";
		echo $text;
	}
	function combo_bahan(){
		$menu = $this->input->post('menu');
		$listdata = $this->m_setting_menu_makanan->combo_bahan($menu);
		$text = "";
		$text.= "<select class='form-control' id='combo_bahan'>";
		//$text.= '<option value="'.'== PILIH =='.'">'.'== PILIH =='."</option>";
		for ($i=0;$i<count($listdata);$i++){
			$text.= '<option value="'.$listdata[$i]['bahan'].'">'.$listdata[$i]['bahan']."</option>";
		}
		$text.= "</select>";
		echo $text;
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
	function DataDaftarMenu(){
		$requestData= $_REQUEST;
		$rows = $this->m_setting_menu_makanan->DataDaftarMenu($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_setting_menu_makanan->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataDiet(){
		$requestData= $_REQUEST;
		$rows = $this->m_setting_menu_makanan->DataDiet($requestData['start'],$requestData['length']);
		$tot =$this->m_setting_menu_makanan->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	function DataBahan(){
		$requestData= $_REQUEST;
		$rows = $this->m_setting_menu_makanan->DataBahan($requestData['start'],$requestData['length']);
		$tot =$this->m_setting_menu_makanan->Count_ListReq();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}
	/*function DataDaftarMenu(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'nama', 1 => 'harga_persajian', 2=> 'catatan');
		
		$data = array();
		$rows = $this->m_setting_menu_makanan->DataDaftarMenu();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["nama"];
			$nestedData[] = $row["harga_persajian"];
			$nestedData[] = $row["catatan"];
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
	
	function DataDiet(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'diet');
		
		$data = array();
		$rows = $this->m_setting_menu_makanan->DataDiet();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["diet"];
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
	
	function DataBahan(){
		$requestData= $_REQUEST;
		
		$columns = array( 0 => 'bahan');
		
		$data = array();
		$rows = $this->m_setting_menu_makanan->DataBahan();
		foreach($rows as $row) {  // preparing an array
			$nestedData=array(); 
			$nestedData[] = '';
			$nestedData[] = $row["bahan"];
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

 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan_sia extends CI_Controller {

	var $grandTot=0;
	var $fldHiding;
	var $keyfld;
	var $fldHidingCntn;
	var $totals=0;
	
	function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
		$this->load->helper('url');
		$this->load->model('m_laporan_sia');
	}
	public function index()
	{
		$this->load->view('dashboard1');
	}
	public function nm_unit($nm_unit){
		$this->load->view('akutansi/v_laporan_sia');	
	}

	function list_lap_penerima(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->list_lap_penerima($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_sia->count_list_req();
		$this->totals = $this->m_laporan_sia->panggil_total('total_penerima',$this->m_laporan_sia->querynya);
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_lap_penyetor(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->list_lap_penyetor($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_sia->count_list_req();
		$this->totals = $this->m_laporan_sia->panggil_total('total_penyetor',$this->m_laporan_sia->list_lap_penyetor);
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function rekap_lap_penyetor(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->rekap_lap_penyetor($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$this->setFldHide(array('no_kas','tanggal','kepada_dari','pembukuan'),'no_kas' ); 
		$tot =$this->m_laporan_sia->count_list_req();
		$this->totals = $this->m_laporan_sia->panggil_total('total_credit',$this->m_laporan_sia->rekap_lap_penyetor);
		$this->totals = $this->m_laporan_sia->panggil_total('total_debet',$this->m_laporan_sia->rekap_lap_penyetor);
		echo json_encode($this->renderDatatable($rows,$tot,$requestData,true,false));
	}

	function list_lap_jurnal(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->list_lap_jurnal($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_sia->count_list_req();
		$this->totals = $this->m_laporan_sia->panggil_total('debet',$this->m_laporan_sia->list_lap_jurnal);
		$this->totals = $this->m_laporan_sia->panggil_total('credit',$this->m_laporan_sia->list_lap_jurnal);
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_trial_balance(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->list_trial_balance($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_sia->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_trial_balance_detail(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->list_trial_balance_detail($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_sia->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}

	function list_nr_rl(){
		$requestData= $_REQUEST;
		$rows = $this->m_laporan_sia->list_nr_rl($requestData['start'],$requestData['length'],$requestData['search']['value']);
		$tot =$this->m_laporan_sia->count_list_req();
		echo json_encode($this->renderDatatable($rows,$tot,$requestData));
	}


		private function setFldHide($fld,$key){
			$this->fldHiding=$fld;
			$this->setFldHideKey($key);
		}
		private function setFldHideKey($fld){
			$this->keyfld=$fld;
			$this->fldHidingCntn[$fld]='';
		}

	private function renderDatatable($rows,$tot,$requestData,$hideDouble=false,$total=false ){
				$data = array();
				$cntnlws=false;
				foreach($rows as $row => $value) {  
					$nestedData=array(); 
					$nestedData[] = '';
					foreach($value as $nama => $fld){
						if($hideDouble==false){
							$cntn=$fld;
						}else{ 
							if (in_array($nama, $this->fldHiding) ) { 
								if($this->keyfld==$nama){ //echo  $this->keyfld.' = '.$nama.'<br>';
									if($this->fldHidingCntn[$this->keyfld] == $fld) $cntnlws=true; 
									else {$this->fldHidingCntn[$this->keyfld] = $fld; $cntnlws=false; }
								}
								if($cntnlws==true) $cntn=''; else $cntn=$fld;
							}else { $cntn=$fld;  }
						}
						$nestedData[] = $cntn;
					}	
					$data[] = $nestedData;
				}
				if($total==true){
					
				}
				$totalData =$tot;
				$totalFiltered = $totalData;
				$json_data = array(
					"draw"            	=> 	intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    	=> 	intval( $totalData ),  // total number of records
					"recordsFiltered" 	=> 	intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"totalnya"					=>	$this->grandTot ,
					"total_penerima"   		    =>  $this->totals,
					"total_penyetor"   		    =>  $this->totals,
					"total_credit"	            =>  $this->totals,
					"total_debet"	           	=>  $this->totals,
					"debet"						=>  $this->totals,
					"credit" 					=>  $this->totals,
					"data"            	        => 	$data   // total data array
				);

				return $json_data; 
				
		}
	
	function hapus_lap_jurnal(){
		echo json_encode ($this->m_laporan_sia->hapus_lap_jurnal());
	}


	
	


	
	


	




}

<?php

class m_form_purchasing extends CI_Model {
    
	var $querynya			= " SELECT nama_barang,jumlah,satuan,spesifikasi FROM purchasing_request_detail ";
	var $querypurchasing2	= " SELECT no_request,nama_barang,jumlah,satuan,tgl,unit,nama,nama_kepala_unit,remark,nama
								FROM v_purchasing WHERE status='waiting' and unit='APOTEK PELAYANAN' ";
							
    private function maxi($fld,$tbl){
		$query = $this->db->query (" SELECT MAX($fld) maxi FROM $tbl ");
		$hsl = $query->row();
		return $hsl->maxi;
	}
	private function tgl_skrg(){
		$tgl_catat = date_default_timezone_set("Asia/Jakarta");
		$tgl = $tgl_catat = date("Y-m-d");
		return $tgl;
	}
	
	private function jam_skrg(){		
		$tgl_catat = date_default_timezone_set("Asia/Jakarta");
		$jam = $tgl_catat = date("h:i:s");
		return $jam;
	}
	
	function simpan(){
		if ( $this->input->post('norequest')=="~Auto Number~")
			 return $this->add_simpan() ;
		else return  $this->add_simpan_detail();
	}
	function add_simpan(){
		$this->db->trans_begin();
		$maxi = $this->maxi('no_request','purchasing_request')+1;
		$this->db->query(" insert into purchasing_request values  ($maxi,'".$this->input->post('catatan')."','APOTEK PELAYANAN','2001',
						'".$this->tgl_skrg()."','".$this->jam_skrg()."','waiting','".$this->input->post('kepalaunit')."','','','') ");
						
		$this->db->query(" insert into purchasing_request_detail values  ($maxi,'".$this->input->post('namabarang')."','".$this->input->post('qty')."',
						'".$this->input->post('satuan')."','".$this->input->post('spesifikasi')."','','','') ");				
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('no_request','purchasing_request'); 
		}	
	}	
	function add_simpan_detail(){ 
		$maxi = $this->input->post('norequest');
		$this->db->query(" insert into purchasing_request_detail values  ($maxi,'".$this->input->post('namabarang')."','".$this->input->post('qty')."',
						'".$this->input->post('satuan')."','".$this->input->post('spesifikasi')."','','','') ");
						
		return $maxi;				
	}
	
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataPurchasing1($awal,$panjang){
		$no_req=$this->input->post('noreq');	
		$add_where = " WHERE no_request = '$no_req' ";
		$this->querynya = $this->querynya.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataPurchasing2($awal,$panjang,$srch = ''){		
		$add_where ="AND";
		if($srch !='')                                         
		$add_where  .= " (no_request LIKE '%$srch%' OR nama_barang LIKE '%$srch%') AND ";
		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
    	$this->querynya = $this->querypurchasing2.$add_where;
		$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
	function updaterequest() {
		$updatereq	= $this->input->post('no_req');
		$data = array(
			'status'=> 'cancel',
		);								
		$this->db->WHERE('no_request',$updatereq);
		$this->db->Update('purchasing_request',$data);
			
		return $this->db->trans_status();			
	}
	
	
		
};

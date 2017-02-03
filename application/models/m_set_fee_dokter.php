<?php

class m_set_fee_dokter extends CI_Model {
    
	var $querynya			= " SELECT a.id,a.nama,b.poli,CONCAT((SELECT COUNT(1) FROM master_fee c WHERE c.id_dokter=a.id),' item') fee FROM tdok_bio a LEFT JOIN tdok_kepeg b ON a.id=b.id ";
	var $queryfeedokter2	= "	SELECT nama_poli,a.nama,b.harga,c.feeValue,c.feeRefferal,c.tgl,d.nama user,a.id FROM layanan a LEFT JOIN harga b ON a.id=b.id_layanan ";
	
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
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataFeeDokter($awal,$panjang){
		$kategori	=$this->input->post('caridokter');
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (nama LIKE '%".$kategori."%' )";
		else	$add_where = '';	
		$this->querynya = $this->querynya.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataFeeDokter2($awal,$panjang){
		$iddokter	= $this->input->post('iddokter');
		$poli		= $this->input->post('poli');
		$kategori	= $this->input->post('caritindakan');
		$join		= " LEFT JOIN ( SELECT feeValue,feeRefferal,tgl,user_id,id_layanan FROM master_fee WHERE id_dokter='".$iddokter."')c ON b.id_layanan=c.id_layanan
						LEFT JOIN tkar_bio d ON c.user_id=d.id WHERE nama_poli LIKE '%".$poli."%' ";
		$add_where	= " AND";
		if($kategori != '') 
				$add_where .= " (a.nama LIKE '%".$kategori."%' )";
		else	$add_where = '';	
		$this->querynya = $this->queryfeedokter2.$join.$add_where." ORDER BY a.nama";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataFeeDokter() {
		$kategori	=$this->input->post('caridokter');
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (nama LIKE '%".$kategori."%' )";
		else	$add_where = '';		
		$query =$this->db->query("SELECT a.id,a.nama,b.poli,(SELECT COUNT(1) FROM master_fee c WHERE c.id_dokter=a.id) fee FROM tdok_bio a
									LEFT JOIN tdok_kepeg b ON a.id=b.id $add_where " );
        return 	$query->result_array();
    }
	function DataFeeDokter2() {
		$iddokter	=$this->input->post('iddokter');
		$poli	=$this->input->post('poli');
		$kategori	=$this->input->post('caritindakan');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (a.nama LIKE '%".$kategori."%' )";
		else	$add_where = '';		
		$query =$this->db->query("SELECT nama_poli,a.nama,b.harga,c.feeValue,c.feeRefferal,c.tgl,d.nama user,a.id FROM layanan a
									LEFT JOIN harga b ON a.id=b.id_layanan 
									LEFT JOIN ( SELECT feeValue,feeRefferal,tgl,user_id,id_layanan FROM master_fee WHERE id_dokter='".$iddokter."')c ON b.id_layanan=c.id_layanan
									LEFT JOIN tkar_bio d ON c.user_id=d.id WHERE nama_poli LIKE '%".$poli."%' $add_where ORDER BY a.nama " );
        return 	$query->result_array();
    }*/
	function SetFee(){
		if ($this->input->post('setfee') == "Pelaksana")
			 return $this->SetFeePelaksanana();
		else return $this->SetFeeRefferal();
	}
	function SetFeePelaksanana(){ 
		$maxi_mf = $this->input->post('iddokter');	
		$this->db->query(" insert into master_fee values  ($maxi_mf,'".$this->input->post('idtindakan')."','".$this->input->post('nilai')."',
							'0','".$this->tgl_skrg()."','2001') ");			
		return $maxi_mf;				
	}
	function SetFeeRefferal(){ 
		$maxi_mf = $this->input->post('iddokter');	
		$this->db->query(" insert into master_fee values  ($maxi_mf,'".$this->input->post('idtindakan')."','0','".$this->input->post('nilai')."',
							'".$this->tgl_skrg()."','2001') ");			
		return $maxi_mf;				
	}
	
	
};





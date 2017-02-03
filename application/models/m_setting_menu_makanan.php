<?php

class m_setting_menu_makanan extends CI_Model {
    
	var $querynya	= " SELECT * FROM menu";
	var $querydiet	= " SELECT diet FROM menu_diet";
	var $querybahan	= "	SELECT bahan FROM menu_bahan";
	
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
	function DataDaftarMenu($awal,$panjang,$srch = ''){
		$add_where = " WHERE";
		if($srch !='')                                         
		$add_where  .= " (nama LIKE '%$srch%') AND";
		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-4);
		$this->querynya = $this->querynya.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataDiet($awal,$panjang){
		$namamenu	= $this->input->post('nama_menu');
		$add_where = " WHERE menu='$namamenu' ";
		$this->querynya = $this->querydiet.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataBahan($awal,$panjang){
		$namamenu	= $this->input->post('nama_menu');
		$add_where = " WHERE menu='$namamenu' ";
		$this->querynya = $this->querybahan.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function combo_diet($menu) {
		$query = $this->db->query("SELECT a.diet FROM diet a WHERE a.diet NOT IN (
									SELECT b.diet FROM diet b
									LEFT JOIN menu_diet c ON b.diet=c.diet
									WHERE c.menu ='".$menu."') ORDER BY a.diet ");
		return $query->result_array();
    }
	function combo_bahan($menu) {
		$query = $this->db->query("SELECT a.bahan FROM bahan_makanan a WHERE a.bahan NOT IN (
									SELECT b.bahan FROM bahan_makanan b 
									LEFT JOIN menu_bahan c ON b.bahan=c.bahan
									WHERE c.menu ='".$menu."') GROUP BY a.bahan ");
		return $query->result_array();
    }
	function TambahMenu(){
		$this->db->trans_begin();
		$this->db->query(" insert into menu values  ('".$this->input->post('nama_menu')."','".$this->input->post('harga')."','".$this->input->post('cat')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function UbahMenu(){		
		$query = $this->db->query("DELETE FROM menu WHERE nama='".$this->input->post('nama_menu')."'");
		
		$this->db->trans_begin();
		$this->db->query(" insert into menu values  ('".$this->input->post('nama_menu')."','".$this->input->post('harga')."','".$this->input->post('cat')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function HapusMenu(){
		$nama_menu  = $this->input->post('nama_menu');
		
			$dt_m = array(	);
			$this->db->WHERE('nama',$nama_menu);
			$this->db->Delete('menu',$dt_m);

			$dt_md = array(	);
			$this->db->WHERE('menu',$nama_menu);
			$this->db->Delete('menu_diet',$dt_md);
			
			$dt_mb = array(	);
			$this->db->WHERE('menu',$nama_menu);
			$this->db->Delete('menu_bahan',$dt_mb);
			
		return $this->db->trans_status();
	}
	
	function TambahDiet(){
		$this->db->trans_begin();		
		$maxi = $this->maxi('idx','menu_diet')+1;
		$this->db->query(" insert into menu_diet values  ($maxi,'".$this->input->post('namamenu')."','".$this->input->post('diet')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('idx','menu_diet'); 
		}	
	}
	
	function HapusDiet(){
		$nama_menu  = $this->input->post('nama_menu');
		$diet  = $this->input->post('diet');
		
			$dt_md = array(	);
			$this->db->WHERE('menu',$nama_menu);
			$this->db->WHERE('diet',$diet);
			$this->db->Delete('menu_diet',$dt_md);
			
		return $this->db->trans_status();
	}
	
	function TambahBahan(){
		$this->db->trans_begin();
		$maxi = $this->maxi('idx','menu_bahan')+1;
		$this->db->query(" insert into menu_bahan values  ($maxi,'".$this->input->post('namamenu')."','".$this->input->post('bahan')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('idx','menu_bahan'); 
		}	
	}
		
	function HapusBahan(){
		$nama_menu  = $this->input->post('nama_menu');
		$bahan  = $this->input->post('bahan');
		
			$dt_mb = array(	);
			$this->db->WHERE('menu',$nama_menu);
			$this->db->WHERE('bahan',$bahan);
			$this->db->Delete('menu_bahan',$dt_mb);
			
		return $this->db->trans_status();
	}
	
};

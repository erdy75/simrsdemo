<?php

class m_transaksi_sia extends CI_Model {
    
	var $querynya	= " SELECT a.uraian,a.nilai,a.remark,a.kode_akun,b.id_jurnal FROM arus_kas_detail a 
						LEFT JOIN jurnal_umum b ON a.no_kas=b.if_exist_kode_BKK_BKM ";
	var $queryjurnal= " SELECT kode_akun,uraian,debet,credit,id_jurnal,idx FROM jurnal_umum_detail ";
	
	private function maxi($fld,$tbl){
		$query = $this->db->query (" SELECT MAX($fld) maxi FROM $tbl ");
		$hsl = $query->row();
		return $hsl->maxi;
	}
	private function idx($fld1,$tbl,$fld2,$id){
		$query = $this->db->query (" SELECT IFNULL(max($fld1),0) idx FROM $tbl WHERE $fld2=$id ");
		$hsl = $query->row();
		return $hsl->idx;
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
	function DataBKK($awal,$panjang){
		$nokas	= $this->input->post('no_kas');
		$add_where = " WHERE a.no_kas='$nokas' ";
		$this->querynya = $this->querynya.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataJurnal($awal,$panjang){
		$idjurnal=$this->input->post('id_jurnal');
		$add_where = " WHERE id_jurnal='$idjurnal' ";
		$this->querynya = $this->queryjurnal.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*unction DataBKK() {
		$nokas=$this->input->post('no_kas');
		$query =$this->db->query(" SELECT a.uraian,a.nilai,a.remark,a.kode_akun,b.id_jurnal FROM arus_kas_detail a 
									LEFT JOIN jurnal_umum b ON a.no_kas=b.if_exist_kode_BKK_BKM
									WHERE a.no_kas='$nokas' " );
        return 	$query->result_array();
    }
	function DataJurnal() {
		$idjurnal=$this->input->post('id_jurnal');
		$query =$this->db->query(" SELECT kode_akun,uraian,debet,credit,id_jurnal,idx FROM jurnal_umum_detail WHERE id_jurnal='$idjurnal' " );
        return 	$query->result_array();
    }*/
	function get_transaksi() {
		$id_master=$this->input->post('id_master');
		$query = $this->db->query("SELECT a.DEBET_CREDIT,a.kode_COA,b.nama FROM coa_aktivitas_kas_bank a
									LEFT JOIN chart_of_account b ON a.kode_COA=b.kode WHERE a.nama_kas_bank='$id_master' ");
		return $query->row();
    }
	function get_aktivitas() {
		$id_master=$this->input->post('id_master');
		$query = $this->db->query("SELECT a.DEBET_CREDIT,a.kode_COA,b.nama FROM coa_aktivitas_user a 
									LEFT JOIN chart_of_account b ON a.kode_COA=b.kode WHERE a.nama_aktivitas='$id_master' ");
		return $query->row();
    }
	
	function Simpan(){
		if ( $this->input->post('nobkk')=="~Auto Number~")
			 return $this->add_simpan() ;
		else return  $this->add_simpan_detail();
	}
	function add_simpan(){
		if ( $this->input->post('creditdebet')=="CREDIT")
			 return $this->simpan_credit() ;
		else return  $this->simpan_debet();
	}
	function simpan_credit(){
		$this->db->trans_begin();
		$maxi_ak = $this->maxi('no_kas','arus_kas')+1;		
		$this->db->query(" insert into arus_kas values  ($maxi_ak,'".$this->input->post('creditdebet')."','".$this->input->post('kodetransaksi')."',
							'".$this->jam_skrg()."','".$this->input->post('tglbkk')."','2001','".$this->input->post('uraian')."','".$this->input->post('kpddari')."',
							'".$this->input->post('nmengetahui')."','".$this->input->post('npembukuan')."','".$this->input->post('npenerima')."','','') ");
		
		$this->db->query(" insert into arus_kas_detail values  ($maxi_ak,'".$this->input->post('aktivitas')."','".$this->input->post('nilaibkk')."',
							'".$this->input->post('remark')."','".$this->input->post('kodeaktivitas')."','1','','','','') ");	

		$maxi_ju_id = $this->maxi('id_jurnal','jurnal_umum')+1;
		$this->db->query(" insert into jurnal_umum values  ($maxi_ju_id,'".$this->input->post('tglbkk')."','".$this->jam_skrg()."','','2001','Yes',$maxi_ak,'','','','','') ");
		
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_ju_id,'".$this->input->post('transaksi')."',
							'".$this->input->post('kodetransaksi')."','0','".$this->input->post('nilaibkk')."','1','','','') ");
		
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_ju_id,'".$this->input->post('aktivitas')." (".$this->input->post('remark').")',
							'".$this->input->post('kodeaktivitas')."','".$this->input->post('nilaibkk')."','0','2','','','') ");
							
							
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			echo '<script>'.'$("#nobkk").val("'.$this->maxi('no_kas','arus_kas').'");
							$("#idjurnal").val("'.$this->maxi('id_jurnal','jurnal_umum').'");'.'</script>';
		}	
	}	
	function simpan_debet(){
		$this->db->trans_begin();
		$maxi_ak = $this->maxi('no_kas','arus_kas')+1;
		
		$this->db->query(" insert into arus_kas values  ($maxi_ak,'".$this->input->post('creditdebet')."','".$this->input->post('kodetransaksi')."',
							'".$this->jam_skrg()."','".$this->input->post('tglbkk')."','2001','".$this->input->post('uraian')."','".$this->input->post('kpddari')."',
							'".$this->input->post('nmengetahui')."','".$this->input->post('npembukuan')."','".$this->input->post('npenerima')."','','') ");
		
		$this->db->query(" insert into arus_kas_detail values  ($maxi_ak,'".$this->input->post('aktivitas')."','".$this->input->post('nilaibkk')."',
							'".$this->input->post('remark')."','".$this->input->post('kodeaktivitas')."','1','','','','') ");	

		$maxi_ju_id = $this->maxi('id_jurnal','jurnal_umum')+1;
		$this->db->query(" insert into jurnal_umum values  ($maxi_ju_id,'".$this->input->post('tglbkk')."','".$this->jam_skrg()."','','2001','Yes',$maxi_ak,'','','','','') ");
		
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_ju_id,'".$this->input->post('transaksi')."',
							'".$this->input->post('kodetransaksi')."','".$this->input->post('nilaibkk')."','0','1','','','') ");
		
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_ju_id,'".$this->input->post('aktivitas')." (".$this->input->post('remark').")',
							'".$this->input->post('kodeaktivitas')."','0','".$this->input->post('nilaibkk')."','2','','','') ");
							
							
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			echo '<script>'.'$("#nobkk").val("'.$this->maxi('no_kas','arus_kas').'");
							$("#idjurnal").val("'.$this->maxi('id_jurnal','jurnal_umum').'");'.'</script>';
			
						 
		}	
	}	
	function add_simpan_detail(){
		if ( $this->input->post('creditdebet')=="CREDIT")
			 return $this->simpan_credit_detail() ;
		else return  $this->simpan_debet_detail();
	}
	function simpan_credit_detail(){ 
		$maxi_akd = $this->input->post('nobkk');
		$idx_akd = $this->idx('idx','arus_kas_detail','no_kas',$maxi_akd)+1;	
		$this->db->query(" insert into arus_kas_detail values  ($maxi_akd,'".$this->input->post('aktivitas')."','".$this->input->post('nilaibkk')."',
							'".$this->input->post('remark')."','".$this->input->post('kodeaktivitas')."',$idx_akd,'','','','') ");	
		
		$maxi_jud = $this->input->post('idjurnal');
		$idx_jud = $this->idx('idx','jurnal_umum_detail','id_jurnal',$maxi_jud)+1;
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_jud,'".$this->input->post('aktivitas')." (".$this->input->post('remark').")',
							'".$this->input->post('kodeaktivitas')."','".$this->input->post('nilaibkk')."','0',$idx_jud,'','','') ");					
						
		return $maxi_akd;				
	}
	function simpan_debet_detail(){ 
		$maxi_akd = $this->input->post('nobkk');
		$idx_akd = $this->idx('idx','arus_kas_detail','no_kas',$maxi_akd)+1;		
		$this->db->query(" insert into arus_kas_detail values  ($maxi_akd,'".$this->input->post('aktivitas')."','".$this->input->post('nilaibkk')."',
							'".$this->input->post('remark')."','".$this->input->post('kodeaktivitas')."',$idx_akd,'','','','') ");	
		
		$maxi_jud = $this->input->post('idjurnal');
		$idx_jud = $this->idx('idx','jurnal_umum_detail','id_jurnal',$maxi_jud)+1;
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_jud,'".$this->input->post('aktivitas')." (".$this->input->post('remark').")',
							'".$this->input->post('kodeaktivitas')."','0','".$this->input->post('nilaibkk')."',$idx_jud,'','','') ");					
		
		$query = $this->db->query("UPDATE jurnal_umum_detail SET debet = debet+'".$this->input->post('nilaibkk')."' WHERE id_jurnal='".$this->input->post('idjurnal')."' AND idx='1' ");
				
		return $maxi_akd;
	}
	
	
	function get_total() {
		$nokas=$this->input->post('no_kas');
		$query = $this->db->query("SELECT SUM(nilai) total FROM arus_kas_detail WHERE no_kas='$nokas' ");
		return $query->row();
    }
	
	function Hapus(){
		if ( $this->input->post('creditdebet')=="CREDIT")
			 return $this->hapus_credit() ;
		else return  $this->hapus_debet();
	}
	function hapus_credit(){
		$nobkk  = $this->input->post('nobkk');
		$kodeakun  = $this->input->post('kodeakun');
		$idjurnal  = $this->input->post('idjurnal');
		
			$dt_akd = array();
			$this->db->WHERE('no_kas',$nobkk);			
			$this->db->WHERE('kode_akun',$kodeakun);
			$this->db->Delete('arus_kas_detail',$dt_akd);	

			$dt_jud = array();
			$this->db->WHERE('id_jurnal',$idjurnal);
			$this->db->WHERE('kode_akun',$kodeakun);
			$this->db->Delete('jurnal_umum_detail',$dt_jud);	
		
		return $this->db->trans_status();
	}
	function hapus_debet(){
		$nobkk  = $this->input->post('nobkk');
		$kodeakun  = $this->input->post('kodeakun');
		$idjurnal  = $this->input->post('idjurnal');
		
			$dt_akd = array();
			$this->db->WHERE('no_kas',$nobkk);			
			$this->db->WHERE('kode_akun',$kodeakun);
			$this->db->Delete('arus_kas_detail',$dt_akd);	

			$dt_jud = array();
			$this->db->WHERE('id_jurnal',$idjurnal);
			$this->db->WHERE('kode_akun',$kodeakun);
			$this->db->Delete('jurnal_umum_detail',$dt_jud);	
		
		$nilai  = $this->input->post('nilai');
		$query = $this->db->query("UPDATE jurnal_umum_detail SET debet = debet-'$nilai' WHERE id_jurnal='$idjurnal' AND idx='1' ");
		
		return $this->db->trans_status();
	}
	function combo_transaksi($nokas) {
		$query = $this->db->query("SELECT nama_aktivitas aktivitas FROM coa_aktivitas_user WHERE nama_aktivitas NOT IN(
									SELECT a.uraian FROM arus_kas_detail a 
									LEFT JOIN jurnal_umum b ON a.no_kas=b.if_exist_kode_BKK_BKM
									WHERE a.no_kas='".$nokas."') ");
		return $query->result_array();
    }
	
	
	function Posting(){
		$maxi_ju = $this->maxi('id_jurnal','jurnal_umum')+1;
		$this->db->query(" insert into jurnal_umum values  ($maxi_ju,'".$this->input->post('tgljurnal')."','".$this->jam_skrg()."',
							'".$this->input->post('uraian')."','2001','Yes','','','','','','') ");		
		//Debet
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_ju,'".$this->input->post('remarkdebit')."',
							'".$this->input->post('kodeakundebit')."','".$this->input->post('nilaidebit')."','0','1','','','') ");
		//Credit
		$this->db->query(" insert into jurnal_umum_detail values  ($maxi_ju,'".$this->input->post('remarkcredit')."',
							'".$this->input->post('kodeakuncredit')."','0','".$this->input->post('nilaicredit')."','2','','','') ");
							
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('id_jurnal','jurnal_umum'); 
		}	
	}	
	
	function get_total_jurnal() {
		$idjurnal=$this->input->post('id_jurnal');
		$query = $this->db->query("SELECT SUM(debet) total_debet, SUM(credit) total_credit FROM jurnal_umum_detail WHERE id_jurnal='$idjurnal' ");
		return $query->row();
    }
	
};

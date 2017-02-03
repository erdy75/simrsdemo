<?php

class m_tagihan_pasien extends CI_Model {
    
	var $querynya		= " SELECT a.id_pasien,b.nama,a.no_upf,SUBSTR(a.tgl_jam,1,10) tanggal ,SUBSTR(a.tgl_jam,12,8) jam,a.`status`,b.alamat,b.sex,YEAR(CURDATE())-YEAR(b.tgl_lahir) umur,b.jenis
							FROM upf a INNER JOIN pasien_pribadi b ON a.id_pasien=b.id WHERE a.poli='POLI FISIOTHERAPY' AND a.`status`='waiting' ";
	var $queryfaktur	= " SELECT keterangan uraian,harga_satuan tarif,total qty,harga_satuan*total total,poli,id_dokter dokter,tgl,jam 
							FROM faktur_detail_prebayar ";	
							
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
	function DataPasienFisioterapi($awal,$panjang,$srch = ''){
		$add_where = "AND";
		if($srch !='')                                         
		$add_where  .= " (a.id_pasien LIKE '%$srch%' OR b.nama LIKE '%$srch%') AND";
		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-4);
		$this->querynya = $this->querynya.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataFaktur($awal,$panjang){
		$norm	= $this->input->post('carinorm');
		$add_where	= " WHERE cib = '$norm' UNION
						SELECT nama_barang uraian,harga tarif,kuantitas qty,harga*kuantitas total,SUBSTR(site_apotek,1,6) poli,id_dokter dokter,tanggal tgl,jam 
						FROM faktur_apotik_prebayar WHERE cib='$norm'";
		$this->querynya = $this->queryfaktur.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function get_tarif(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT id,tarif FROM kelas WHERE  nama='$id_master' ");
		return  $query->row();
	}	
	function TambahItem(){
		$this->db->trans_begin();
		$this->db->query(" insert into faktur_detail_prebayar values  ('-','102081','".$this->input->post('tarif')."','".$this->input->post('qty')."','".$this->input->post('dp')."',
						'".$this->input->post('poli')."','".$this->input->post('tindakan')."','".$this->input->post('inap_jalan')."','".$this->tgl_skrg()."','".$this->jam_skrg()."',
						'".$this->input->post('norm')."','".$this->input->post('nama')."','".$this->input->post('alamat')."','".$this->input->post('umur')."',
						'".$this->input->post('jk')."','200','','2001','','','','','','','') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function HapusItem(){
		$tgl  = $this->input->post('tgl');	
		$jam  = $this->input->post('jam');	
		
			$dt_fdp = array(	);			
			$this->db->WHERE('tgl',$tgl);
			$this->db->WHERE('jam',$jam);
			$this->db->Delete('faktur_detail_prebayar',$dt_fdp);
			
		return $this->db->trans_status();
	}
		
	function TambahBHP(){
		$this->db->trans_begin();
		$maxi = $this->maxi('id','stock_transaksi_log')+1;
		$this->db->query(" insert into stock_transaksi_log values  ($maxi,'POLI FISIOTHERAPY','Keluar / Pakai','".$this->input->post('bhpobat')."','".$this->input->post('qty')."',
						'N/A','PEMAKAIAN BHP PASIEN ".$this->input->post('norm')." / ".$this->input->post('nama')."','2001','".$this->tgl_skrg()."','".$this->jam_skrg()."') ");
		
		$this->db->query(" insert into faktur_detail_prebayar values  ('-','99999','".$this->input->post('harga')."','".$this->input->post('qty')."','','POLI FISIOTHERAPY (BHP)',
						'".$this->input->post('bhpobat')."','".$this->input->post('inap_jalan')."','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('norm')."',
						'".$this->input->post('nama')."','".$this->input->post('alamat')."','".$this->input->post('umur')."','".$this->input->post('jk')."','500','','2001','','','','','','','') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}	
	function HapusBHP(){
		$tgl  = $this->input->post('tgl');	
		$jam  = $this->input->post('jam');	
		
			$dt_fdp = array(	);			
			$this->db->WHERE('tgl',$tgl);
			$this->db->WHERE('jam',$jam);
			$this->db->Delete('faktur_detail_prebayar',$dt_fdp);
			
		return $this->db->trans_status();
	}
};

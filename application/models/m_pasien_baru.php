<?php

class m_pasien_baru extends CI_Model {
    
	var $querynya	= " SELECT id,nama,CONCAT(alamat,' ',kota) alamat,CONCAT(tempat,', (',YEAR(CURDATE())-YEAR(tgl_lahir),' Thn)') ttl,sex,no_kk,CONCAT(lain_lain,'; ',satuan,'; ',pangkat) dll
						FROM pasien_pribadi ";
	
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
	function get_pasienpribadi() {
		$query = $this->db->query("SELECT jenis,no_kk,suami_istri,satuan,pangkat,nama,alamat,kota,tempat,tgl_lahir,sex,darah,id_card,id_number,agama,telp,hp,lain_lain 
								   FROM pasien_pribadi WHERE id='".$this->input->post('no_rm')."'");
		return $query->result_array();
    }
	function get_pasienkeluarga() {
		$query = $this->db->query("SELECT hubungan FROM pasien_keluarga WHERE id_pasien='".$this->input->post('no_rm')."'");
		return $query->result_array();
    }
	function get_pasienmarketing() {
		$query = $this->db->query("SELECT tahu_dari_mana,dokter_pernah,rs_pernah,kunjungan_didampingi FROM pasien_marketing 
								   WHERE id='".$this->input->post('no_rm')."'");
		return $query->result_array();
    }
	function get_pasienaccount() {
		$query = $this->db->query("SELECT nama_perusahaan,no_jaminan_1,no_jaminan_2,no_jaminan_3,expired FROM pasien_account
								   WHERE id='".$this->input->post('no_rm')."'");
		return $query->result_array();
    }
	function autonumber(){			
		$query = $this->db->query(" SELECT MAX(id) id FROM pasien_pribadi");
		$hasil = $query->row();
		return $hasil->id+1;
	}
	function autonumber2(){			
		$query = $this->db->query(" SELECT SUBSTR(indeks_KK,4) indeks FROM pasien_keluarga WHERE indeks_KK LIKE 'RS.%'");
		$hasil = $query->row();
		return $hasil->indeks;
	}	
	function tambahpasien(){
		if 		($this->input->post('jenis') == "UMUM")
				return $this->tambahumum();
		else if ($this->input->post('jenis') == "KARYAWAN")
				return $this->tambahkaryawan();
		else	return $this->tambahasuransi();
	}
	function tambahumum(){
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi values  ('".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('kota')."','".$this->input->post('agama')."','".$this->input->post('jenis')."','".$this->input->post('idcard')."',
						'".$this->input->post('idnumber')."','".$this->input->post('telp')."','".$this->input->post('hp')."','".$this->input->post('tempatlahir')."',
						'".$this->input->post('tgllahir')."','".$this->input->post('jk')."','".$this->input->post('goldarah')."','".$this->input->post('lain2')."',
						'".$this->tgl_skrg()."','','','','','UNDERCONSTRUCTION','1','','','') ");	
		
		$this->db->query(" insert into pasien_marketing values  ('".$this->input->post('id')."','".$this->input->post('tahudarimana')."',
						'".$this->input->post('dokterpernah')."','".$this->input->post('rspernah')."','".$this->input->post('kunjungan')."') ");	
		
		$this->db->query(" insert into berkas_rekam_medis values  ('".$this->input->post('id')."','--- PASIEN BARU ---','".$this->tgl_skrg()."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function tambahkaryawan(){
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi values  ('".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('kota')."','".$this->input->post('agama')."','".$this->input->post('jenis')."','".$this->input->post('idcard')."',
						'".$this->input->post('idnumber')."','".$this->input->post('telp')."','".$this->input->post('hp')."','".$this->input->post('tempatlahir')."',
						'".$this->input->post('tgllahir')."','".$this->input->post('jk')."','".$this->input->post('goldarah')."','".$this->input->post('lain2')."',	'".$this->tgl_skrg()."',
						'".$this->input->post('indeks')."','".$this->input->post('area')."','".$this->input->post('kategori')."','".$this->input->post('keldari')."','UNDERCONSTRUCTION','1','','','') ");	
		
		$this->db->query(" insert into pasien_keluarga values  ('".$this->input->post('id')."','".$this->input->post('indeks')."','".$this->input->post('hub')."') ");	
		
		$this->db->query(" insert into pasien_marketing values  ('".$this->input->post('id')."','".$this->input->post('tahudarimana')."',
						'".$this->input->post('dokterpernah')."','".$this->input->post('rspernah')."','".$this->input->post('kunjungan')."') ");	
		
		$this->db->query(" insert into berkas_rekam_medis values  ('".$this->input->post('id')."','--- PASIEN BARU ---','".$this->tgl_skrg()."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function tambahasuransi(){
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi values  ('".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('kota')."','".$this->input->post('agama')."','".$this->input->post('jenis')."','".$this->input->post('idcard')."',
						'".$this->input->post('idnumber')."','".$this->input->post('telp')."','".$this->input->post('hp')."','".$this->input->post('tempatlahir')."',
						'".$this->input->post('tgllahir')."','".$this->input->post('jk')."','".$this->input->post('goldarah')."','".$this->input->post('lain2')."','".$this->tgl_skrg()."',
						'".$this->input->post('indeks')."','".$this->input->post('area')."','".$this->input->post('kategori')."','".$this->input->post('keldari')."','UNDERCONSTRUCTION','1','','','') ");	
		
		$this->db->query(" insert into pasien_account values  ('".$this->input->post('id')."','Corporate','".$this->input->post('penjamin')."','".$this->input->post('nopeserta')."',
						'".$this->input->post('nosep')."','".$this->input->post('nokartu')."','Corp None','AKTIF','".$this->input->post('expired')."','','','','') ");	
		
		$this->db->query(" insert into pasien_keluarga values  ('".$this->input->post('id')."','".$this->input->post('indeks')."','".$this->input->post('hub')."') ");	
		
		$this->db->query(" insert into pasien_marketing values  ('".$this->input->post('id')."','".$this->input->post('tahudarimana')."',
						'".$this->input->post('dokterpernah')."','".$this->input->post('rspernah')."','".$this->input->post('kunjungan')."') ");	
		
		$this->db->query(" insert into berkas_rekam_medis values  ('".$this->input->post('id')."','--- PASIEN BARU ---','".$this->tgl_skrg()."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function editpasien(){
		if 		($this->input->post('jenis') == "UMUM")
				return $this->editumum();
		else if ($this->input->post('jenis') == "KARYAWAN")
				return $this->editkaryawan();
		else	return $this->editasuransi();
	}
	function editumum(){		
		$query = $this->db->query("DELETE FROM pasien_pribadi WHERE id='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_keluarga WHERE id_pasien='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_marketing WHERE id='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_account WHERE id='".$this->input->post('id')."'");
		
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi values  ('".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('kota')."','".$this->input->post('agama')."','".$this->input->post('jenis')."','".$this->input->post('idcard')."',
						'".$this->input->post('idnumber')."','".$this->input->post('telp')."','".$this->input->post('hp')."','".$this->input->post('tempatlahir')."',
						'".$this->input->post('tgllahir')."','".$this->input->post('jk')."','".$this->input->post('goldarah')."','".$this->input->post('lain2')."',
						'".$this->tgl_skrg()."','','','','','UNDERCONSTRUCTION','1','','','') ");	
		
		$this->db->query(" insert into pasien_marketing values  ('".$this->input->post('id')."','".$this->input->post('tahudarimana')."',
						'".$this->input->post('dokterpernah')."','".$this->input->post('rspernah')."','".$this->input->post('kunjungan')."') ");	
		
		$maxi = $this->maxi('id_edit','pasien_pribadi_log_editing')+1;
		$this->db->query(" insert into pasien_pribadi_log_editing values  ($maxi,'2001','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('alasan')."','".$this->input->post('id')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function editkaryawan(){		
		$query = $this->db->query("DELETE FROM pasien_pribadi WHERE id='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_keluarga WHERE id_pasien='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_marketing WHERE id='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_account WHERE id='".$this->input->post('id')."'");
		
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi values  ('".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('kota')."','".$this->input->post('agama')."','".$this->input->post('jenis')."','".$this->input->post('idcard')."',
						'".$this->input->post('idnumber')."','".$this->input->post('telp')."','".$this->input->post('hp')."','".$this->input->post('tempatlahir')."',
						'".$this->input->post('tgllahir')."','".$this->input->post('jk')."','".$this->input->post('goldarah')."','".$this->input->post('lain2')."',	'".$this->tgl_skrg()."',
						'".$this->input->post('indeks')."','".$this->input->post('area')."','".$this->input->post('kategori')."','".$this->input->post('keldari')."','UNDERCONSTRUCTION','1','','','') ");	
		
		$this->db->query(" insert into pasien_keluarga values  ('".$this->input->post('id')."','".$this->input->post('indeks')."','".$this->input->post('hub')."') ");	
		
		$this->db->query(" insert into pasien_marketing values  ('".$this->input->post('id')."','".$this->input->post('tahudarimana')."',
						'".$this->input->post('dokterpernah')."','".$this->input->post('rspernah')."','".$this->input->post('kunjungan')."') ");	
		
		$maxi = $this->maxi('id_edit','pasien_pribadi_log_editing')+1;
		$this->db->query(" insert into pasien_pribadi_log_editing values  ($maxi,'2001','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('alasan')."','".$this->input->post('id')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	
	function editasuransi(){		
		$query = $this->db->query("DELETE FROM pasien_pribadi WHERE id='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_keluarga WHERE id_pasien='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_marketing WHERE id='".$this->input->post('id')."'");
		$query = $this->db->query("DELETE FROM pasien_account WHERE id='".$this->input->post('id')."'");
		
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi values  ('".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('kota')."','".$this->input->post('agama')."','".$this->input->post('jenis')."','".$this->input->post('idcard')."',
						'".$this->input->post('idnumber')."','".$this->input->post('telp')."','".$this->input->post('hp')."','".$this->input->post('tempatlahir')."',
						'".$this->input->post('tgllahir')."','".$this->input->post('jk')."','".$this->input->post('goldarah')."','".$this->input->post('lain2')."','".$this->tgl_skrg()."',
						'".$this->input->post('indeks')."','".$this->input->post('area')."','".$this->input->post('kategori')."','".$this->input->post('keldari')."','UNDERCONSTRUCTION','1','','','') ");	
		
		$this->db->query(" insert into pasien_account values  ('".$this->input->post('id')."','Corporate','".$this->input->post('penjamin')."','".$this->input->post('nopeserta')."',
						'".$this->input->post('nosep')."','".$this->input->post('nokartu')."','Corp None','AKTIF','".$this->input->post('expired')."','','','','') ");	
		
		$this->db->query(" insert into pasien_keluarga values  ('".$this->input->post('id')."','".$this->input->post('indeks')."','".$this->input->post('hub')."') ");	
		
		$this->db->query(" insert into pasien_marketing values  ('".$this->input->post('id')."','".$this->input->post('tahudarimana')."',
						'".$this->input->post('dokterpernah')."','".$this->input->post('rspernah')."','".$this->input->post('kunjungan')."') ");	
		
		$maxi = $this->maxi('id_edit','pasien_pribadi_log_editing')+1;
		$this->db->query(" insert into pasien_pribadi_log_editing values  ($maxi,'2001','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('alasan')."','".$this->input->post('id')."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
	function hapus(){
		$query = $this->db->query("DELETE FROM pasien_pribadi WHERE id='".$this->input->post('no_rm')."'");
		$query = $this->db->query("DELETE FROM pasien_keluarga WHERE id_pasien='".$this->input->post('no_rm')."'");
		$query = $this->db->query("DELETE FROM pasien_marketing WHERE id='".$this->input->post('no_rm')."'");
		$query = $this->db->query("DELETE FROM pasien_account WHERE id='".$this->input->post('no_rm')."'");
		$query = $this->db->query("DELETE FROM berkas_rekam_medis WHERE id_pasien='".$this->input->post('no_rm')."'");
		//return $query->trans_status();
	}
	
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataPasienPribadi($awal,$panjang){
		$kategori=$this->input->post('cari_nama');
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (nama LIKE '%".$kategori."%')";
		else	$add_where = '';
		$this->querynya = $this->querynya.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }	
		
};

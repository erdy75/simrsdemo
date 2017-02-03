<?php

class m_rm_fisioterapi extends CI_Model {
    
	var $querynya	= " SELECT a.no_upf,b.nama,a.cib_pasien,a.tgl_rm,a.time_rm,c.dokter,a.poli,a.inap_jalan,b.alamat,b.sex,
						YEAR(CURDATE())-YEAR(b.tgl_lahir) umur,a.inap_jalan,c.perawat,c.jenis_terapi,
						SUBSTR(c.tgl_jam_mulai,1,10) tgl_mulai,SUBSTR(c.tgl_jam_selesai,1,10) tgl_selesai,
						SUBSTR(c.tgl_jam_mulai,12,8) jam_mulai,SUBSTR(c.tgl_jam_selesai,12,8) jam_selesai,
						a.kode_icd_utama,d.Deskripsi,a.anamnesa,a.pemeriksaan,a.keadaan_umum,a.kesadaran,a.terapi,c.nama_terapi,
						SUBSTRING_INDEX(a.vital_sign,'#',1) sistole,SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',2),'#',-1) suhu,
						SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',3),'#',-1) bb,	SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',4),'#',-1) tb,
						SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',5),'#',-1) nadi,SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',6),'#',-1) respiratory

						FROM medical_record a 
						INNER JOIN pasien_pribadi b ON a.cib_pasien=b.id 
						INNER JOIN medical_record_fisioterapi c ON a.no_upf=c.no_upf
						LEFT JOIN icd d ON a.kode_icd_utama=d.ICD";
						
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataFisioterapi($awal,$panjang){
		$kategori=$this->input->post('norm_nama');
		$tgl_awal=$this->input->post('tgl_awal');
		$tgl_akhir=$this->input->post('tgl_akhir');
		$where1= " WHERE a.poli='POLI FISIOTHERAPY' AND DATE_FORMAT(tgl_jam_mulai,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(tgl_jam_selesai,'%Y-%m-%d')<='".$tgl_akhir."' ";
		$where2= "AND";
		if($kategori != '') 
				$where2 .= " (nama LIKE '%".$kategori."%' OR cib_pasien LIKE '%".$kategori."%')";
		else	$where2 = '';		
		
		$this->querynya = $this->querynya.$where1.$where2;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataFisioterapi() {
		$kategori=$this->input->post('norm_nama');
		$tgl_awal=$this->input->post('tgl_awal');
		$tgl_akhir=$this->input->post('tgl_akhir');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (nama LIKE '%".$kategori."%' OR cib_pasien LIKE '%".$kategori."%')";
		else	$add_where = '';		
		$query =$this->db->query(" SELECT a.no_upf,b.nama,a.cib_pasien,a.tgl_rm,a.time_rm,c.dokter,a.poli,a.inap_jalan,b.alamat,b.sex,
									YEAR(CURDATE())-YEAR(b.tgl_lahir) umur,a.inap_jalan,c.perawat,c.jenis_terapi,
									SUBSTR(c.tgl_jam_mulai,1,10) tgl_mulai,SUBSTR(c.tgl_jam_selesai,1,10) tgl_selesai,
									SUBSTR(c.tgl_jam_mulai,12,8) jam_mulai,SUBSTR(c.tgl_jam_selesai,12,8) jam_selesai,
									a.kode_icd_utama,d.Deskripsi,a.anamnesa,a.pemeriksaan,a.keadaan_umum,a.kesadaran,a.terapi,c.nama_terapi,
									SUBSTRING_INDEX(a.vital_sign,'#',1) sistole,SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',2),'#',-1) suhu,
									SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',3),'#',-1) bb,	SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',4),'#',-1) tb,
									SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',5),'#',-1) nadi,SUBSTRING_INDEX(SUBSTRING_INDEX(a.vital_sign,'#',6),'#',-1) respiratory

									FROM medical_record a 
									INNER JOIN pasien_pribadi b ON a.cib_pasien=b.id 
									INNER JOIN medical_record_fisioterapi c ON a.no_upf=c.no_upf
									LEFT JOIN icd d ON a.kode_icd_utama=d.ICD
									WHERE a.poli='POLI FISIOTHERAPY' AND DATE_FORMAT(tgl_jam_mulai,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(tgl_jam_selesai,'%Y-%m-%d')<='".$tgl_akhir."' $add_where" );
        return 	$query->result_array();
    }*/
	function Update(){
			$noupf  = $this->input->post('noupf');
			$namadokter = $this->input->post('namadokter');
			$poli = $this->input->post('poli');
			$kodeicdutama  = $this->input->post('kodeicdutama');
			$sistole = $this->input->post('sistole');
			$suhu = $this->input->post('suhu');
			$bb = $this->input->post('bb');
			$tb = $this->input->post('tb');
			$nadi = $this->input->post('nadi');
			$respiratory = $this->input->post('respiratory');
			$anamnesa = $this->input->post('anamnesa');
			$pemeriksaanfisik = $this->input->post('pemeriksaanfisik');
			$keadaan = $this->input->post('keadaan');
			$kesadaran = $this->input->post('kesadaran');
			$remark = $this->input->post('remark');			
			
			$jenisterapi = $this->input->post('jenisterapi');
			$namaterapi = $this->input->post('namaterapi');
			$tglmulai = $this->input->post('tglmulai');
			$tglselesai = $this->input->post('tglselesai');
			$jammulai = $this->input->post('jammulai');
			$jamselesai = $this->input->post('jamselesai');
			$perawat = $this->input->post('perawat');
			
			$dt_mr = array(
			'nama_dokter'=>$namadokter,
			'poli'=>$poli,
			'kode_icd_utama'=>$kodeicdutama,
			'vital_sign'=>$sistole.'#'.$suhu.'#'.$bb.'#'.$tb.'#'.$nadi.'#'.$respiratory,
			'anamnesa'=>$anamnesa,
			'pemeriksaan'=>$pemeriksaanfisik,
			'keadaan_umum'=>$keadaan,
			'kesadaran'=>$kesadaran,
			'terapi'=>$remark
			);	
			$this->db->WHERE('no_upf',$noupf);
			$this->db->Update('medical_record',$dt_mr);
			
			$dt_mrf = array(
			'jenis_terapi'=>$jenisterapi,
			'nama_terapi'=>$namaterapi,
			'tgl_jam_mulai'=>$tglmulai.' '.$jammulai,
			'tgl_jam_selesai'=>$tglselesai.' '.$jamselesai,
			'dokter'=>$namadokter,
			'perawat'=>$perawat,
			'user_id'=>'2001'
			);	
			$this->db->WHERE('no_upf',$noupf);
			$this->db->Update('medical_record_fisioterapi',$dt_mrf);
			
		return $this->db->trans_status();
    }
	function Hapus(){
		$noupf  = $this->input->post('noupf');
		
			$dt_mr = array(	);
			$this->db->WHERE('no_upf',$noupf);
			$this->db->Delete('medical_record',$dt_mr);
			
			$dt_mrf = array( );
			$this->db->WHERE('no_upf',$noupf);
			$this->db->Delete('medical_record_fisioterapi',$dt_mrf);
			
		return $this->db->trans_status();
	}
		
};

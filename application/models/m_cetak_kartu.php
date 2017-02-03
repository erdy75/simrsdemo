<?php

class m_cetak_kartu extends CI_Model {
    
	var $querynya		= " SELECT a.id,a.nama,CONCAT(a.alamat,' - ',a.kota) alamat,a.jenis,YEAR(CURDATE())-YEAR(a.tgl_lahir) umur,a.sex 
							FROM pasien_pribadi a ";
							
	var $queryhistory	= " SELECT a.id_pasien,b.pasien_tampil,a.tgl_jam,a.design_kartu,a.sisi_cetak,c.nama,a.host 
							FROM pasien_pribadi_log_cetak_kartu a 
							INNER JOIN faktur_detail_prebayar b on a.id_pasien=b.cib 
							INNER JOIN tkar_bio c on b.id_user=c.id WHERE b.poli='REGISTRASI'";
							
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
	function DataCetakKartu($awal,$panjang){
		$kategori=$this->input->post('cari_nama');
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (nama LIKE '%".$kategori."%')";
		else	$add_where 	= '';
		$this->querynya = $this->querynya.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataHistory($awal,$panjang){
		$kategori=$this->input->post('cari_nama');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (pasien_tampil LIKE '%".$kategori."%')";
		else	$add_where = '';
		$this->querynya = $this->queryhistory.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
   
	function Simpan(){
		$this->db->trans_begin();
		$this->db->query(" insert into pasien_pribadi_log_cetak_kartu values  ('".$this->tgl_skrg()." ".$this->jam_skrg()."','".$this->input->post('id')."',
						'2001','".$this->input->post('design')."','".$this->input->post('sisicetak')."','Taufik / 127.0.0.1') ");	
						
		$this->db->query(" insert into faktur_detail_prebayar values  ('-','99999','".$this->input->post('tarif')."','1','-','REGISTRASI','KARTU','Rawat Jalan',
						'".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('id')."','".$this->input->post('nama')."','".$this->input->post('alamat')."',
						'".$this->input->post('umur')."','".$this->input->post('jk')."','1000','','2001','','','','','','','') ");	
			
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
		}	
	}
		
		
};

<?php

class m_pasien_rawat_inap extends CI_Model {
    
	var $querynya	= " SELECT a.index_inap,a.nomor_bed,a.idpasien,b.nama,b.alamat,CONCAT(a.tgl_check_in,' / ',a.jam_check_in) tgl,CONCAT('Perkiraan +/- ',DATEDIFF(CURRENT_TIMESTAMP(),a.tgl_check_in)+1) hari,
						a.remark_resep,a.jenis,a.penjamin,b.sex,YEAR(CURDATE())-YEAR(b.tgl_lahir) umur,a.referensi_no_upf
						FROM kamarpakai a INNER JOIN pasien_pribadi b on a.idpasien=b.id";
	var $querypri2	= " SELECT a.referensi_no_upf,CONCAT(b.tgl_rm,' / ',b.time_rm) waktu,c.Deskripsi,b.nama_dokter,b.poli,b.inap_jalan,b.kode_diet FROM kamarpakai a 
						JOIN medical_record b ON a.idpasien=b.cib_pasien JOIN icd c ON b.kode_icd_utama=c.ICD ";
						
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataPRI($awal,$panjang){
		$kategori	= $this->input->post('nama');
		$order		= $this->input->post('order');
		$add_where= " WHERE";
		if($kategori != '') 
				$add_where .= " (nama LIKE '%".$kategori."%')";
		else	$add_where = '';
		$this->querynya = $this->querynya.$add_where." ORDER BY $order";		
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataPRI2($awal,$panjang){
		$norm		= $this->input->post('norm');
		$add_where	= " WHERE a.idpasien='$norm' ";
		$this->querynya = $this->querypri2.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
};

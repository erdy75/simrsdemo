
<?php

class m_laporan_fisioterapi extends CI_Model {


	var $querynya            = "SELECT pasien_pribadi.id,
								pasien_pribadi.nama,
								pasien_pribadi.jenis,
								upf_history.poli,
								upf_history.nama_dokter,
								SUBSTR(upf_history.tgl_jam,1,10) AS tgl,
								SUBSTR(upf_history.tgl_jam,12,8) AS jam,
								upf_history.inap_jalan,
								(SELECT CASE WHEN COUNT(1) > 1 THEN 'Pasien Lama' ELSE 'Pasein Baru' END from upf_history WHERE id_pasien=pasien_pribadi.id) tgl_daftar,
								tkar_bio.nama as petugas,
								upf_history.no_upf
								FROM
								upf_history
								INNER JOIN pasien_pribadi ON pasien_pribadi.id = upf_history.id_pasien
								INNER JOIN tkar_bio ON tkar_bio.id = upf_history.id_user
								WHERE upf_history.poli LIKE '%POLI FISIOTHERAPY%' ";

	function nama_perawatan(){
		$query = $this->db->query("SELECT * from c_perawatan1 where nama_perawatan1 LIKE '%Rawat Jalan%' or nama_perawatan1='Rawat Inap' ");
		return $query->result_array();
	}
	

	 function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }


	 function pas_fisioterapi($awal,$panjang,$srch =''){

    	$add_where = "AND";

		if($this->input->post('tgl_periode1')    != '')                      $add_where .= " date_format(upf_history.tgl_jam,'%Y-%m-%d')>='".$this->input->post('tgl_periode1')."' AND ";

    	if($this->input->post('tgl_periode2')    != '')                      $add_where .= " date_format(upf_history.tgl_jam,'%Y-%m-%d')<='".$this->input->post('tgl_periode2')."' AND "; 

    	if($this->input->post('jns_pasien')    != '')                         $add_where  .=" pasien_pribadi.jenis LIKE '%".$this->input->post('jns_pasien')."%' AND ";  

    	if($this->input->post('perawatan')    != '')                         $add_where  .=" upf_history.inap_jalan LIKE '%".$this->input->post('perawatan')."%' AND "; 




		if($srch !='')                                                       $add_where  .= " (pasien_pribadi.id LIKE '%$srch%' or pasien_pribadi.nama LIKE '%$srch%' or pasien_pribadi.jenis LIKE '%$srch%' or upf_history.nama_dokter LIKE '%$srch%') AND ";

		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);	
		$query = $this->db->query($this->querynya.$add_where." order by tgl_jam  DESC LIMIT $awal,$panjang" );
    	return $query->result_array();
	}



}




<?php

class m_pasienfisio extends CI_Model {

   
    function get_pas() {
		$query = $this->db->query("Select nama, alamat, jenis, sex, tgl_lahir, 
									YEAR(FROM_DAYS(DATEDIFF(CURRENT_DATE,tgl_lahir))) as thn
									FROM pasien_pribadi WHERE id='".$this->input->post('id_pasien')."'");
		return $query->result_array();
    }

    function get_pas2() {
    	$query = $this->db->query("SELECT pasien_pribadi.id, pasien_pribadi.nama, pasien_pribadi.alamat, pasien_pribadi.jenis
									FROM
									antrian
									INNER JOIN pasien_pribadi ON pasien_pribadi.id = antrian.id_pasien
									WHERE no_ref_upf='".$this->input->post('no_reg')."'");
		return $query->result_array();
    }


    

}

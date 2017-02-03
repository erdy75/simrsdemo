<?php

class m_pasien extends CI_Model {

   
    function get_pas() {
		$query = $this->db->query("Select nama,alamat,DATE_FORMAT(tgl_lahir,'%d-%m-%Y') tgl_lahir,telp,sex, darah,jenis 
				FROM pasien_pribadi WHERE id='".$this->input->post('no_rm')."'");
		return $query->result_array();
    }

    

}

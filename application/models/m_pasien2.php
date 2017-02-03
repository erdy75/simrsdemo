<?php

class m_pasien2 extends CI_Model {

   
    function get_pas() {
		$query = $this->db->query("Select nama, alamat, jenis, sex, tgl_lahir, 
									YEAR(FROM_DAYS(DATEDIFF(CURRENT_DATE,tgl_lahir))) as thn
									FROM pasien_pribadi WHERE id='".$this->input->post('id_pasien')."'");
		return $query->result_array();
    }

    

}

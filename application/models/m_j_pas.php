<?php

class m_j_pas extends CI_Model {

    private $table = "jenis_pasien";

    function get_j_pas() {
        return $this->db->get("jenis_pasien")->result_array();
    }

    

}

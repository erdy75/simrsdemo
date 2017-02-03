<?php

class m_j_kel extends CI_Model {

    private $table = "jenis_kelamin";

    function get_j_k() {
        return $this->db->get("jenis_kelamin")->result_array();
    }

    

}

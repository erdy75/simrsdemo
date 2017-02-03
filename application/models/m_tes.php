<?php

class m_tes extends CI_Model {

    private $table = "radiologi_periksa_detail";

    function get_nama_periksa() {
        return $this->db->get("radiologi_periksa_detail")->result_array();
    }

    

}
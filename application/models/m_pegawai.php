<?php

class m_pegawai extends CI_Model {

    private $table = "master_pegawai";

    function get_pegawai() {
        return $this->db->get("master_pegawai")->result_array();
    }

    

}

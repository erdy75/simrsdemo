<?php

class m_g_darah extends CI_Model {

    private $table = "gol_darah";

    function get_g_darah() {
        return $this->db->get("gol_darah")->result_array();
    }

    

}

<?php

class m_kesadaran extends CI_Model {

    private $table = "master_kesadaran";

    function get_kesadaran() {
        return $this->db->get("master_kesadaran")->result_array();
    }

    

}

<?php

class m_gcs extends CI_Model {

    private $table = "master_gcs";

    function get_gcs($parent) {
        //$this->db->where('keterangan', $parent);
		$str=" Select * From master_gcs WHERE id_parent_gcs= (Select id_gcs From master_gcs WHERE keterangan='$parent' )";
		$recs = $this->db->query($str);
		return $recs->result_array();
    }

    

}

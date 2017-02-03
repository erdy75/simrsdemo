<?php

class m_pegawai2 extends CI_Model {

    private $table = "master_pegawai";

    function get_pegawai() {
    	$add_where =" ";
        $fltr=$this->input->post('term');
        $poli=$this->input->post('poli');
		$kategori=$this->input->post('kategori');
		if($kategori != '') $add_where .= " AND nama ='$kategori' ";
		if($poli != '') $add_where .= " AND poli ='$poli' ";
		
		$query = $this->db->query(" Select id ,nama text, poli from v_masterpegawai WHERE nama LIKE '$fltr%' $add_where " );
        return $query->result_array();
    }

    

}


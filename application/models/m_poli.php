<?php

class m_poli extends CI_Model {

    private $table = "poli";

   function get_poli() {
		$fltr=$this->input->post('term');
		$kategori=$this->input->post('kategori');
		$kategori2=$this->input->post('kategori2');
		$kategori3=$this->input->post('kategori3');
		if($kategori != '') $add_where = " AND (atribut_obyek ='$kategori' OR atribut_obyek='$kategori2' OR atribut_obyek='$kategori3') ";
		else $add_where = '';
		$query = $this->db->query(" Select  poli.id,poli.nama text,atribut_obyek
					              FROM poli WHERE nama LIKE '$fltr%' $add_where " );
        return $query->result_array();
    }

    function tarif() {
   	    $nama_poli = $this->input->post('nama_poli');
		$query = $this->db->query (" SELECT nama_poli, IFNULL (max(harga),0) as harga from v_tarif WHERE nama_poli = '$nama_poli'  ");



		return  $query->row();
    }
 }   
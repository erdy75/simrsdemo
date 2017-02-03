<?php

class m_barang extends CI_Model {

    private $table = "barang";

   function get_barang() {
		$fltr=$this->input->post('term');
		$kategori=$this->input->post('kategori');
		$Alat_Medis=$this->input->post('Alat Medis');
		if($kategori != '') $add_where = " AND (kategori_item ='$kategori' OR kategori_item='$Alat_Medis') ";
		else $add_where = '';
		$query = $this->db->query(" Select  barang.id,barang.nama text,kategori_item,apotik_tblharga.harga
					FROM barang INNER JOIN apotik_tblharga ON barang.id = apotik_tblharga.id WHERE nama LIKE '$fltr%' $add_where 
					 " );
        return $query->result_array();
    }
 }   


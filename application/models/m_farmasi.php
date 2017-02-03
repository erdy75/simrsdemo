<?php

class m_farmasi extends CI_Model {
    
	function get_barang() {
        return $this->db->get('barang')->result_array();
    }
	function cari_namabarang() {
		$filter=$this->input->post('term');
		$kategori=$this->input->post('kategori');
		if($kategori != '') $add_where = " AND kategori_item ='$kategori' ";
		else $add_where = '';
		$query = $this->db->query(" Select id,nama text From barang where nama LIKE '$filter%' $add_where " );
        return $query->result_array();
    }
	function get_kepalaunit() {
		$query = $this->db->query(" Select nama From tkar_bio UNION Select nama From tdok_bio " );
        return $query->result_array();
    }
	function get_namabarang(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query (" SELECT a.nama,a.jenis,a.satuan,a.type,a.stock_limit FROM barang a WHERE  a.id=$id_master ");
		return  $query->row();
	}	
	
	
	
	
	
		
};

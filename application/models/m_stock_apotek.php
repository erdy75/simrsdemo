<?php

class m_stock_apotek extends CI_Model {
    
	var $querynya		= " SELECT Nama,Jumlah,`Limit`,Kemasan FROM stock_rajal ";
	var $querynya2		= " SELECT Nama,Jumlah,`Limit`,Kemasan FROM stock_ranap ";	
	
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataStockBarang($awal,$panjang){
		if 		( $this->input->post('perawatan')=="Rawat Jalan")
				return $this->RawatJalan($awal,$panjang);
		else 	return $this->RawatInap($awal,$panjang);		
    }
	function RawatJalan($awal,$panjang){
		$nama	= $this->input->post('cari_namabarang'); 
		$add_where= "WHERE";
		if($nama != '') 
				$add_where .= " (Nama LIKE '%".$nama."%'  )";
		else	$add_where = '';
    	$query = $this->db->query($this->querynya.$add_where." LIMIT $awal,$panjang" );
    	return $query->result_array();
	}
	function RawatInap($awal,$panjang){
		$nama	= $this->input->post('cari_namabarang'); 
		$add_where= "WHERE";
		if($nama != '') 
				$add_where .= " (Nama LIKE '%".$nama."%'  )";
		else	$add_where = '';
		$this->querynya = $this->querynya2;
    	$query = $this->db->query($this->querynya.$add_where." LIMIT $awal,$panjang" );
    	return $query->result_array();
	}
	function CariRawatJalan($awal,$panjang) {
		$kategori=$this->input->post('cari_namabarang'); 
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (Nama LIKE '%".$kategori."%'  )";
		else	$add_where = '';		
		$query =$this->db->query(" SELECT Nama,Jumlah,`Limit`,Kemasan
									FROM stock_rajal $add_where " );
        return 	$query->result_array();
    }
	function CariRawatInap() {
		$kategori=$this->input->post('cari_namabarang'); 
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (Nama LIKE '%".$kategori."%'  )";
		else	$add_where = '';		
		$query =$this->db->query(" SELECT Nama,Jumlah,`Limit`,Kemasan
									FROM stock_ranap $add_where " );
        return 	$query->result_array();
    }
		
};

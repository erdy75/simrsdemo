<?php

class m_history_transaksi extends CI_Model {
    
	var $querynya		= " SELECT cib,status,nama_barang,harga,kuantitas,harga*kuantitas sub_total,id_dokter,KelompokBeli,penjamin,CONCAT(tanggal,' - ',jam) tanggal,inap_jalan,faktur,site_apotek
							FROM faktur_apotik_prebayar ";
	var $queryobatlunas	= " SELECT cib,pasien_tampil,dokter,CONCAT(tanggal,' - ',jam) waktu,inap_jalan,CONCAT(KelompokBeli,' / ',penjamin) kelompok,nama_barang,harga,kuantitas,harga*kuantitas sub_total,referensi_no_upf,no_faktur
							FROM v_faktur_apotik ";
	var $queryreturubl	= " SELECT no_retur_ubl,cib,status,nama_barang,harga,qty,harga*qty sub_total,CONCAT(tanggal,' - ',jam) waktu,site_apotek,nama,faktur
							FROM v_faktur_retur_ubl ";
	var $queryreturlunas= "	SELECT no_retur_ubl,cib,pasien_tampil,nama_barang,harga,qty,harga*qty sub_total,CONCAT(tanggal,' - ',jam) waktu,site_apotek,nama
							FROM v_faktur_retur_pembelian_lunas ";
									
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataCariUBL($awal,$panjang){
		$kategori	= $this->input->post('cari'); 
		$field		= $this->input->post('combo_cari'); 
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " ( $field LIKE '%".$kategori."%'  )";
		else	$add_where = '';	
		$this->querynya = $this->querynya.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataObatLunas($awal,$panjang){
		$kategori=$this->input->post('carinamanorm'); 
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (cib LIKE '%".$kategori."%' or pasien_tampil LIKE '%".$kategori."%'  )";
		else	$add_where = '';	
		$this->querynya = $this->queryobatlunas.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataReturUBL($awal,$panjang){
		$kategori=$this->input->post('carinamanorm');
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (cib LIKE '%".$kategori."%' or status LIKE '%".$kategori."%'  )";
		else	$add_where = '';	
		$this->querynya = $this->queryreturubl.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataReturLunas($awal,$panjang){
		$kategori=$this->input->post('carinamanorm'); 
		$add_where= "WHERE";
		if($kategori != '') 
				$add_where .= " (cib LIKE '%".$kategori."%' or pasien_tampil LIKE '%".$kategori."%'  )";
		else	$add_where = '';
		$this->querynya = $this->queryreturlunas.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
	
	
	
	
		
};

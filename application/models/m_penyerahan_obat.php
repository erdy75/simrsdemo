<?php

class m_penyerahan_obat extends CI_Model {
    
	var $querynya		= "	SELECT no_faktur,CONCAT(tanggal,' - ',jam) waktu,pasien_tampil,cib,referensi_no_upf 
							FROM faktur_apotik WHERE tgl_penyerahan_obat_apotik='0000-00-00' ";
	var $querydetail	= "	SELECT nama_barang,harga,kuantitas,harga * kuantitas jumlah ,ket FROM faktur_apotik_detail  ";
							
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataFaktur($awal,$panjang){
		$kategori	= $this->input->post('carinokw');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (no_faktur LIKE '%".$kategori."%'  OR  pasien_tampil LIKE '%".$kategori."%' )";
		else	$add_where 	= '';	
		$this->querynya = $this->querynya.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataDetail($awal,$panjang){
		$nofak	= $this->input->post('no_faktur');
		$add_where = " WHERE no_faktur='$nofak' ";
		$this->querynya = $this->querydetail.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
	
	function update() {
		$updateobat	= $this->input->post('no_fak');
		date_default_timezone_set("Asia/Jakarta");
		$data = array(
			'id_user_apotik'=> '2001',
			'tgl_penyerahan_obat_apotik'=> date("Y-m-d"),
			'jam_penyerahan_obat_apotik'=> date("h:i:s")
		);								
		$this->db->WHERE('no_faktur',$updateobat);
		$this->db->Update('faktur_apotik',$data);
			
		return $this->db->trans_status();			
	}
			
};

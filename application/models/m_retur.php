<?php

class m_retur extends CI_Model {
    
	var $querynya			= "	SELECT nama_barang,harga,kuantitas,id_dokter,CONCAT(tanggal,'/',jam) waktu FROM faktur_apotik_prebayar";
	var $queryreturubl		= "	SELECT nama_barang,harga,qty,harga * qty subtotal FROM faktur_retur_apotek_ubl";
	var $queryreturlunas1	= "	SELECT no_faktur,tanggal,KelompokBeli FROM faktur_apotik";
	var $queryreturlunas2	= "	SELECT nama_barang,kuantitas,harga FROM faktur_apotik_detail";
	var $queryreturlunas3	= "	SELECT item,harga_kembali,kuantitas,harga_kembali * kuantitas subtotal,referensi_kwitansi
								FROM faktur_retur_detail";
	private function maxi($fld,$tbl){
		$query = $this->db->query (" SELECT MAX($fld) maxi FROM $tbl ");
		$hsl = $query->row();
		return $hsl->maxi;
	}
	private function tgl_skrg(){
		$tgl_catat = date_default_timezone_set("Asia/Jakarta");
		$tgl = $tgl_catat = date("Y-m-d");
		return $tgl;
	}
	private function jam_skrg(){		
		$tgl_catat = date_default_timezone_set("Asia/Jakarta");
		$jam = $tgl_catat = date("h:i:s");
		return $jam;
	}
	function get_nama_barang() {
		return $this->db->query("Select nama From barang where (kategori_item=('Obat (Medis)')or kategori_item=('Alat Medis'))")->result_array();
    }
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataReturUbl1($awal,$panjang){
		$norm	= $this->input->post('carinorm');
		$add_where = " WHERE cib = '$norm' ";
		$this->querynya = $this->querynya.$add_where;
    	$query 	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataReturUbl2($awal,$panjang){
		$noretur	= $this->input->post('no_retur');
		$add_where = " WHERE no_retur_ubl='$noretur' ";
		$this->querynya = $this->queryreturubl.$add_where;
    	$query 		= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataReturLunas1($awal,$panjang){
		$norm	= $this->input->post('carinorm');		
		$add_where = " WHERE cib='$norm' ";
		$this->querynya = $this->queryreturlunas1.$add_where;
    	$query 		= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataReturLunas2($awal,$panjang){
		$nofak	= $this->input->post('carinofak');	
		$add_where = " WHERE no_faktur='$nofak' ";
		$this->querynya = $this->queryreturlunas2.$add_where;
    	$query 		= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataReturLunas3($awal,$panjang){
		$noretur	= $this->input->post('no_retur');	
		$add_where = " WHERE no_retur='$noretur' ";
		$this->querynya = $this->queryreturlunas3.$add_where;
    	$query 		= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function get_bio_ubl() {
		$query = $this->db->query("Select status,KelompokBeli,isResep,inap_jalan
				FROM faktur_apotik_prebayar WHERE cib='".$this->input->post('carinorm')."'");
		return $query->result_array();
    }	
	function SimpanReturUbl(){
		$this->db->trans_begin();
		$maxi = $this->maxi('no_retur_ubl','faktur_retur_apotek_ubl')+1;
		$this->db->query(" insert into faktur_retur_apotek_ubl values  ($maxi,'".$this->input->post('norm')."','".$this->input->post('combo_barang')."','".$this->input->post('jumlah_retur')."',
							'".$this->input->post('uang_retur')."',	'".$this->tgl_skrg()."','".$this->jam_skrg()."','2001','APOTEK RAWAT INAP','-','','') ");	
		
		return $this->maxi('no_retur_ubl','faktur_retur_apotek_ubl'); 
			
	}
	
	function Get_SubTotal1() {
		$query = $this->db->query("Select harga*qty subtotal
									FROM faktur_retur_apotek_ubl WHERE no_retur_ubl='".$this->input->post('no_retur')."'");
		return $query->result_array();
    }
	function get_bio_lunas() {
		$query = $this->db->query("Select pasien_tampil,isdinas,inap_jalan
									FROM faktur_apotik WHERE cib='".$this->input->post('carinorm')."'");
		return $query->result_array();
    }
	
	function SimpanReturLunas(){
		if 	 ($this->input->post('noretur')=="~Auto Number~")
			 return $this->Simpan();
		else return $this->SimpanDetail();	
	}
	function Simpan(){
		$this->db->trans_begin();
		$maxi = $this->maxi('no_retur','faktur_retur')+1;
		$this->db->query(" insert into faktur_retur values  ($maxi,'2001','".$this->tgl_skrg()."','".$this->jam_skrg()."','Apotek','',
							'".$this->input->post('uraian')."','APOTEK RAWAT INAP','".$this->input->post('norm')."','') ");	
							
		$this->db->query(" insert into faktur_retur_detail values  ($maxi,'".$this->input->post('namabarang')."','".$this->input->post('qty')."',
						'".$this->input->post('harga')."','APOTEK RAWAT INAP','".$this->input->post('nofak')."','') ");	
						
		if ($this->db->trans_status() === FALSE) { 
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('no_retur','faktur_retur'); 
		}	
	}
	function SimpanDetail(){
		$maxi = $this->input->post('noretur');
		$this->db->query(" insert into faktur_retur_detail values  ($maxi,'".$this->input->post('namabarang')."','".$this->input->post('qty')."',
						'".$this->input->post('harga')."','APOTEK RAWAT INAP','".$this->input->post('nofak')."','') ");	
		return $maxi;
	}
	function get_norm() {
		$query = $this->db->query("Select id_pasien
									FROM faktur_retur WHERE no_retur='".$this->input->post('no_retur')."'");
		return $query->result_array();
    }
	function Get_SubTotal2() {
		$query = $this->db->query("Select harga_kembali * kuantitas subtotal
									FROM faktur_retur_detail WHERE no_retur='".$this->input->post('no_retur')."'");
		return $query->result_array();
    }
    	
	
	
		
};

<?php

class m_fisiotherapy extends CI_Model {
    
	function get_perawatan() {
		$query = $this->db->query("SELECT nama_perawatan1 nama FROM c_perawatan1 ");
		return $query->result_array();
    }
	function get_nama_dokter() {
		$query = $this->db->query("SELECT nama dokter FROM tdok_bio ");
		return $query->result_array();
    }
	function get_nama_perawat() {
		$query = $this->db->query("SELECT a.nama nama FROM tkar_bio a INNER JOIN tkar_kepeg b ON a.id=b.id WHERE a.`status`='Aktif' AND b.kategori='Paramedis Perawatan' ");
		return $query->result_array();
    }
	function get_icd() {
		$query = $this->db->query("SELECT ICD,Deskripsi,Deskripsi_ina,DTD FROM icd ");
		return $query->result_array();
    }
	function get_kesadaran() {
		$query = $this->db->query("SELECT keterangan nama FROM master_kesadaran ");
		return $query->result_array();
    }
	function get_jp() {
		$query = $this->db->query("SELECT nama FROM jenis_pasien ");
		return $query->result_array();
    }
	function get_penjamin() {
		$query = $this->db->query("SELECT nama FROM tblperusahaan ");
		return $query->result_array();
    }
	function get_satuan(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT a.nama,a.jenis,a.satuan,a.type,a.stock_limit,a.harga FROM v_tblharga a WHERE  a.nama='$id_master' ");
		return  $query->row();
	}
	function get_barang() {
		$query = $this->db->query(" SELECT id,nama barang FROM barang WHERE 
									(kategori_item=('Alat Medis') or 
									 kategori_item=('Alat Tulis Kantor (ATK)') or 
									 kategori_item=('Bahan Baku Farmasi') or 
									 kategori_item=('Bahan Hemodialisa') or 
									 kategori_item=('Bahan Laboratorium') or 
									 kategori_item=('Bahan OK (Kamar Operasi)') or 
									 kategori_item=('Bahan Radiologi') or 
									 kategori_item=('Cetakan') or 
									 kategori_item=('Listrik') or 
									 kategori_item=('Makanan Sehat') or 
									 kategori_item=('Obat (Medis)') or
									 kategori_item=('Rumah Tangga') or
									 kategori_item=('Susu') or 
									 kategori_item=('Vaksin')) ORDER BY nama" );
        return $query->result_array();
    }
	function get_nama_kelas() {
		$query = $this->db->query("SELECT nama kelas FROM kelas ");
		return $query->result_array();
    }
	function get_petugas() {
		$query = $this->db->query("SELECT id,nama FROM tkar_bio WHERE `status`='aktif' ORDER BY nama ");
		return $query->result_array();
    }
	function get_id_petugas(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT id FROM tkar_bio WHERE nama='$id_master' ");
		return  $query->row();
	}
	
	
};

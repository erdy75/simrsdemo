<?php

class m_registrasi extends CI_Model {
    
	function get_nama_dokter() {
		$query = $this->db->query("SELECT nama FROM tdok_bio ");
		return $query->result_array();
    }
	function get_jp() {
		$query = $this->db->query("SELECT nama FROM jenis_pasien ");
		return $query->result_array();
    }
	function get_kota() {
		$query = $this->db->query("SELECT kota FROM kota ");
		return $query->result_array();
    }
	function get_penjamin() {
		$query = $this->db->query("SELECT nama FROM tblperusahaan WHERE status = 'AKTIF' ");
		return $query->result_array();
    }
	
	
};

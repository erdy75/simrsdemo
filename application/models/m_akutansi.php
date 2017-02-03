<?php

class m_akutansi extends CI_Model {
    
	function get_kas() {
		$query = $this->db->query("SELECT nama_kas_bank kas FROM coa_aktivitas_kas_bank ");
		return $query->result_array();
    }
	function get_aktivitas() {
		$query = $this->db->query("SELECT nama_aktivitas aktivitas FROM coa_aktivitas_user ");
		return $query->result_array();
    }
	function get_coa() {
		$query = $this->db->query("SELECT kode,nama,level,NR_RL,isRekap FROM chart_of_account ");
		return $query->result_array();
    }
	function get_jp() {
		$query = $this->db->query("SELECT nama FROM jenis_pasien ");
		return $query->result_array();
    }
	function get_poli() {
		$query = $this->db->query("SELECT nama FROM poli ");
		return $query->result_array();
    }
	function get_nama_dokter() {
		$query = $this->db->query("SELECT nama dokter FROM tdok_bio ");
		return $query->result_array();
    }
	function get_supplier() {
		$query = $this->db->query("SELECT nama FROM supplier ");
		return $query->result_array();
    }
};

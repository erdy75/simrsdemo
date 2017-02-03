<?php

class m_paket extends CI_Model {
    
	function get_nama_paket() {
		$query = $this->db->query("SELECT nama FROM harga_paket ");
		return $query->result_array();
    }	
	function get_norm() {
		$query = $this->db->query("Select nama,alamat,kota,sex,YEAR(CURDATE())-YEAR(tgl_lahir) umur FROM pasien_pribadi 
								   WHERE id='".$this->input->post('n_rm')."'");
		return $query->result_array();
    }
	function get_paket() {
		$query = $this->db->query("SELECT auto_reg_poli1 poli1,auto_reg_poli2 poli2,SUM(harga_sub_paket) tarif FROM harga_paket a INNER JOIN harga_paket_detail b ON a.id_paket=b.id_paket 
									WHERE a.nama='".$this->input->post('nama')."'");
		return $query->result_array();
    }
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
	function list_paket() {
		$kategori=$this->input->post('nama');
		if($kategori != '') 
				$add_where = " AND (nama ='$kategori' )";
		else	$add_where = '';		
		$query =$this->db->query(" SELECT id_layanan tindakan,harga_sub_paket tarif,kelompok_beli_if_penunjang jenis,poli_penunjang poli 
									FROM harga_paket_detail a INNER JOIN harga_paket b ON a.id_paket=b.id_paket $add_where " );
       return 	$query->result_array();
    }
	function simpan(){
		$this->db->trans_begin();
		$maxi = $this->maxi('index_inap','kamarpakai')+1;
		$maxiupf = $this->maxi('no_upf','upf_history')+1;
		$this->db->query(" insert into kamarpakai values  ($maxi,'".$this->input->post('norm')."','".$this->input->post('kelas')."','".$this->input->post('kamar')."',
						'".$this->input->post('bedkosong')."','".$this->tgl_skrg()."','".$this->jam_skrg()."','1','MASUK','".$this->input->post('perkiraanmenginap')."',
						'','','0000-00-00','00:00:00','".$this->input->post('dokterPjawab')."','".$this->input->post('jenis')."','".$this->input->post('penjamin')."','2001','',
						'".$this->input->post('remarkapotek')."','Tidak','".$this->input->post('tarif')."','".$this->input->post('poli')."','0','".$this->input->post('Pjawabpasien')."',
						'".$this->input->post('alamatPjawab')."','".$this->input->post('telpPjawab')."','".$this->input->post('pekerjaan')."','".$this->input->post('hub')."',
						'".$this->input->post('suratjaminan')."',$maxiupf,'".$this->input->post('dokterpengirim')."','','','','','','','','') ");	
		
		$this->db->query(" insert into upf_history values  ($maxiupf,'".$this->input->post('norm')."','".$this->input->post('bedkosong')."','".$this->input->post('dokterPjawab')."',
						'".$this->tgl_skrg()."''".$this->jam_skrg()."','','','','DIPERIKSA','Tunggu dari RM','Rawat Inap','TIDAK DICETAK (RAWAT INAP)','2001','','','','') ");	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('index_inap','kamarpakai'); 
		}	
	}
	
	
};

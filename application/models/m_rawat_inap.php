<?php

class m_rawat_inap extends CI_Model {
    
	function get_kamar() {
        $query = $this->db->query("SELECT nama,IFNULL(b.jumlah,0)+IFNULL(c.jumlah,0)+IFNULL(d.jumlah,0)+IFNULL(e.jumlah,0)+IFNULL(f.jumlah,0) bed_kosong,tarif,kelas,fasilitas 
									FROM kamar a 
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7001' AND `status`='tidak dipakai')b ON a.id=b.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7002' AND `status`='tidak dipakai')c ON a.id=c.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7003' AND `status`='tidak dipakai')d ON a.id=d.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7004' AND `status`='tidak dipakai')e ON a.id=e.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7005' AND `status`='tidak dipakai')f ON a.id=f.id_kamar ");
		return $query->result_array();
    }	
	function get_poli() {
        $query = $this->db->query("SELECT nama FROM poli WHERE atribut_obyek='Penunjang Medis' or atribut_obyek='poli' or atribut_obyek='Fisioterapi' ");
		return $query->result_array();
    }    	
	function get_norm() {
		$query = $this->db->query("Select nama,alamat FROM pasien_pribadi 
								   WHERE id='".$this->input->post('n_rm')."'");
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
	function get_bedkosong($nama) {
		$query = $this->db->query(" SELECT nama_bed nama FROM v_bedkosong WHERE status='tidak dipakai' AND nama = '".$nama."' " );
        return $query->result_array();
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
	function UpdateStatusKamar(){
			$combo_bed  = $this->input->post('combo_bed');
			$dt = array(
			'status'=>'terpakai'
			);	
			$this->db->WHERE('nama_bed',$combo_bed);
			$this->db->Update('bed',$dt);
			
		return $this->db->trans_status();
    } 
	function list_kamar() {
		$kategori=$this->input->post('idkamar');
		if($kategori != '') 
				$add_where = " AND (id_kamar ='$kategori' )";
		else	$add_where = '';		
		$query =$this->db->query(" SELECT nama,IFNULL(b.jumlah,0)+IFNULL(c.jumlah,0)+IFNULL(d.jumlah,0)+IFNULL(e.jumlah,0)+IFNULL(f.jumlah,0) bed_kosong,tarif,kelas,fasilitas 
									FROM kamar a 
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7001' AND `status`='tidak dipakai')b ON a.id=b.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7002' AND `status`='tidak dipakai')c ON a.id=c.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7003' AND `status`='tidak dipakai')d ON a.id=d.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7004' AND `status`='tidak dipakai')e ON a.id=e.id_kamar
									LEFT JOIN (SELECT COUNT(nama_bed) jumlah,id_kamar FROM bed WHERE id_kamar='7005' AND `status`='tidak dipakai')f ON a.id=f.id_kamar $add_where " );
        return 	$query->result_array();
    }
};

<?php


class m_fisioterapi extends CI_Model {

	var $querynya			            = "SELECT b.id, b.nama, a.no_ref_upf, SUBSTR(c.tgl_jam,1,10) as tgl, SUBSTR(c.tgl_jam,12,8) as jam, 
                                        c.`status`
										from antrian a
										LEFT JOIN pasien_pribadi b on a.id_pasien=b.id
										LEFT JOIN upf c ON c.no_upf=a.no_ref_upf
										where a.poli LIKE '%POLI FISIOTHERAPY%' AND c.status='waiting' ";



	private function maxi($fld,$tbl,$where ='') {
		$query = $this->db->query ("SELECT IFNULL (MAX($fld),0)+1 maxi FROM $tbl $where");
		$hsl = $query->row();
		return $hsl->maxi;
	}

	

function terbilang($x) {
		$arr = array ("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", 
			"SEBELAS");
		if ($x < 12)
			return " " . $arr[$x];
		elseif ($x < 20)
			return $this->terbilang ($x - 10) . "BELAS";
		elseif ($x < 100)
			return $this->terbilang ($x / 10) . "PULUH" . $this->terbilang ($x % 10);
		elseif ($x < 200)
			return "SERATUS" .terbilang ($x-100);
		elseif ($x < 1000)
			return $this->terbilang ($x/100) ."RATUS". $this->terbilang ($x % 100);
		elseif ($x < 2000)
			return "SERIBU" .$this->terbilang($x - 1000);
		elseif ($x < 1000000)
			return $this->terbilang ($x/1000) ."RIBU". $this->terbilang ($x % 1000);
		elseif ($x < 1000000000)
			return $this->terbilang ($x/1000000) ."JUTA". $this->terbilang ($x % 1000000);

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

	function daftar_fisioterapi(){
		
		$no_urut 		= $this->maxi('no_urut','antrian');
		$textantrian 	= $this->terbilang($no_urut);
		$maxi 			= $this->maxi('no_upf','upf_history');


		$this->db->query(" insert into upf values  ($maxi,'".$this->input->post('id_pasien')."','',
						'POLI FISIOTHERAPY','-','".$this->tgl_skrg().' '.$this->jam_skrg()."','waiting','-') ");
										
		$this->db->query(" insert into upf_history values  ($maxi,'".$this->input->post('id_pasien')."',
						'POLI FISIOTHERAPY', '-', '".$this->tgl_skrg().' '.$this->jam_skrg()."', '', '', '', 'DIPERIKSA', 'Tunggu dari RM', 
						'".$this->input->post('inap_jalan')."', 'BELUM DICETAK', '2001', '', '', '', '') ");	

		$this->db->query ( "delete from ekspedisi_alert") ;

		$this->db->query ( "insert into ekspedisi_alert (status_alert) values ('ON')");	

		$this->db->query(" insert into antrian values  ($no_urut,'".$this->input->post('id_pasien')."',
						'POLI FISIOTHERAPY','".$this->tgl_skrg()."' ,'TUNGGU', 
						'$textantrian', '-', $maxi, '0', '', '', '', '') ");


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	
	}

	 function antrian_fisioterapi($awal,$panjang,$srch = ''){
	 	$add_where = "AND";
	 	
	 	if($srch != '')                                         $add_where  .=" (nama LIKE '%$srch%') AND ";
	 
    	
    	if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-4);

    	$query = $this->db->query($this->querynya.$add_where." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }

    function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }




    function get_nama_dokter(){
    	return $this->db->get("tdok_bio")->result_array();
    }

    function get_nama_perawat(){
    	return $this->db->get("v_perawat")->result_array();
    }

    function get_icd(){

    	$query = $this->db->query("SELECT ICD, Deskripsi, Deskripsi_ina, DTD from icd ");

    	return $query->result_array(); 

    	
    }

    function simpan_medical_record(){

    	$no_reg = $this->input->post('no_reg');
   
    	$this->db->query(" insert into medical_record values  ('".$this->input->post('no_reg')."','".$this->input->post('no_id')."','".$this->input->post('nama_dokter')."','POLI FISIOTHERAPY','".$this->tgl_skrg()."','".$this->jam_skrg()."', '".$this->input->post('inap_jalan2')."', '','".$this->input->post('sistole')."#".$this->input->post('suhu')."#".$this->input->post('berat_badan')."#".$this->input->post('tinggi_badan')."#".$this->input->post('nadi')."#".$this->input->post('respiratory_rate')."','".$this->input->post('pemeriksaan')."','','".$this->input->post('terapi')."', '".$this->input->post('kode_icd_utama')."', '','','2001','Belum', '".$this->input->post('anamnesa')."', '".$this->input->post('keadaan_umum')."','".$this->input->post('kesadaran')."','Tidak','','0','','','','','','') ");	
				
    	$this->db->query("insert into medical_record_fisioterapi values('".$this->input->post('no_reg')."', '".$this->input->post('jns_terapi')."', '".$this->input->post('nama_terapi')."', '".$this->input->post('tgl_mulai').' '.$this->input->post('jam_mulai')."', '".$this->input->post('tgl_selesai').' '.$this->input->post('jam_selesai')."','".$this->input->post('nama_dokter')."', '".$this->input->post('perawat')."','','','2001', '','','','','',''  )");

    	$this->db->query("DELETE from upf where no_upf = '$no_reg' ");

    	$this->db->query("UPDATE upf_history set kondisi_keluar = 'Pulang dan proses penyembuhan' where no_upf= '$no_reg' ");

    	$this->db->query(" UPDATE antrian set status = 'SELESAI' where no_ref_upf= '$no_reg' ");
				

    	if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	

	}

	function simpan_sementara(){

		$no_reg = $this->input->post('no_reg');	


    	$this->db->query(" insert into medical_record_temp values  ('".$this->input->post('no_reg')."','".$this->input->post('no_id')."','".$this->input->post('nama_dokter')."','POLI FISIOTHERAPY','".$this->tgl_skrg()."','".$this->jam_skrg()."', '".$this->input->post('inap_jalan2')."', '','".$this->input->post('sistole')."#".$this->input->post('suhu')."#".$this->input->post('berat_badan')."#".$this->input->post('tinggi_badan')."#".$this->input->post('nadi')."#".$this->input->post('respiratory_rate')."','".$this->input->post('pemeriksaan')."','','".$this->input->post('terapi')."', '".$this->input->post('kode_icd_utama')."', '','','2001','Belum', '".$this->input->post('anamnesa')."', '".$this->input->post('keadaan_umum')."','".$this->input->post('kesadaran')."','Tidak','','0','','','','','','') ");	
				
    	$this->db->query("insert into medical_record_fisioterapi_temp values('".$this->input->post('no_reg')."', '".$this->input->post('jns_terapi')."', '".$this->input->post('nama_terapi')."', '".$this->input->post('tgl_mulai').' '.$this->jam_skrg('jam_mulai')."', '".$this->input->post('tgl_selesai').' '.$this->jam_skrg('jam_selesai')."','".$this->input->post('nama_dokter')."', '".$this->input->post('perawat')."','','','2001', '','','','','',''  )");

    

    	if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	

	}

	/*function update_pasien(){

		$no_reg         = $this->input->post('no_reg');
		$pemeriksaan    = $this->input->post('pemeriksaan');
		$kode_icd_utama = $this->input->post('kode_icd_utama');
		$nama_dokter    = $this->input->post('nama_dokter');
		$terapi 	    = $this->input->post('terapi');
		$anamnesa       = $this->input->post('anamnesa');
		$keadaan_umum   = $this->input->post('keadaan_umum');
		$kesadaran      = $this->input->post('kesadaran');	
		$jns_terapi     = $this->input->post('jns_terapi');	
		$nama_terapi	= $this->input->post('nama_terapi');
		$tgl_mulai      = $this->input->post('tgl_mulai');	
		$tgl_mulai      = $this->input->post('tgl_mulai');	 
		$jam_mulai      = $this->input->post('jam_mulai');	
		$jam_selesai    = $this->input->post('jam_selesai');
		$perawat        = $this->input->post('perawat');	  	 


		$this->db->query("UPDATE medical_record set pemeriksaan='$pemeriksaan', kode_icd_utama = '$kode_icd_utama', nama_dokter = '$nama_dokter',  vital_sign = '100#100#100#100#100#100',  poli = 'POLI FISIOTHERAPY', terapi = '$terapi', anamnesa = '$anamnesa', keadaan_umum = '$keadaan_umum', kesadaran = '$kesadaran' where no_upf = '$no_reg' ");

		$this->db->query("UPDATE medical_record_fisioterapi set jenis_terapi = '$jns_terapi', nama_terapi = '$nama_terapi',  tgl_jam_mulai = '2016-07-13 00:30:00',  tgl_jam_selesai = '2016-07-13 00:25:00',  dokter = '$nama_dokter',  perawat = '$perawat',  user_id = '2001'  where no_upf = '$no_reg' ");
	}

	function simpan_pasien(){

		$no_reg = $this->input->post('no_reg');

		$this->db->query("DELETE from upf where no_upf = '$no_reg' ");

    	$this->db->query("UPDATE upf_history set kondisi_keluar = 'Pulang dan proses penyembuhan' where no_upf= '$no_reg' ");

    	$this->db->query(" UPDATE antrian set status = 'SELESAI' where no_ref_upf= '$no_reg' ");
    }*/

}




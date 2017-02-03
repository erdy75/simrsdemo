<?php

class m_deposit extends CI_Model {


	var $querynya                            = "SELECT uangmuka.id_dp,
												CONCAT(pasien_pribadi.nama,' / ',uangmuka.id_pasien)  pasien,
												uangmuka.dari,
												uangmuka.untuk,
												uangmuka.jumlah total,
												uangmuka.tanggal,
												uangmuka.jam,
												tkar_bio.nama AS user_kasir,
												uangmuka.keterangan,
												uangmuka.`status`,
												tkar_bio.nama AS user_posting,
												uangmuka.tgl_user_posting,
												uangmuka.no_ref_faktur_invoice,
												uangmuka.id_user_posting,
												uangmuka.id_pasien
												FROM
												uangmuka
												INNER JOIN pasien_pribadi ON uangmuka.id_pasien = pasien_pribadi.id
												INNER JOIN tkar_bio ON uangmuka.id_user_posting = tkar_bio.id AND tkar_bio.id = uangmuka.nama_kasir  ";

    private function maxi($fld,$tbl) {
		$query = $this->db->query ("SELECT IFNULL (MAX($fld),0)+1 maxi FROM $tbl");
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
	
	 function panggil_total($fld,$tbl){
    	$query = $this->db->query("SELECT format (sum($fld),0) totalNya from ($tbl) a ");
    	$hsl=$query->row();
    	return $hsl->totalNya;

    }


	 function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	

	function list_lap_deposit($awal,$panjang,$srch = ''){

		$add_where = "WHERE";

		if($this->input->post('tgl_deposit1')    != ' ')                      $add_where .= " date_format(uangmuka.tanggal,'%Y-%m-%d')>='".$this->input->post('tgl_deposit1')."' AND ";

    	if($this->input->post('tgl_deposit2')    != ' ')                      $add_where .= " date_format(uangmuka.tanggal,'%Y-%m-%d')<='".$this->input->post('tgl_deposit2')."' AND "; 

    	if($this->input->post('combo_status')    != '')                      $add_where  .=" uangmuka.`status` LIKE '%".$this->input->post('combo_status')."%' AND ";  


		if($srch !='')                                                       $add_where  .= " (pasien_pribadi.nama LIKE '%$srch%' or uangmuka.id_pasien LIKE '%$srch%' ) AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);	
		$query = $this->db->query($this->querynya.$add_where." GROUP BY pasien  DESC LIMIT $awal,$panjang" );
    	return $query->result_array();
	}

	function update_posting(){
		$id_user_posting       = $this->input->post('id_user_posting');
		$text_noref            = $this->input->post('text_noref');
		$id_dp                 = $this->input->post('id_dp');
		$tgl_skrg              = $this->tgl_skrg();
		

		$this->db->query("UPDATE uangmuka set status = 'POSTED', id_user_posting = '$id_user_posting', tgl_user_posting='$tgl_skrg',  no_ref_faktur_invoice= '$text_noref' where id_dp = '$id_dp' ");

	}

	
	

	function aktif_deposit() {

		$id_alasan 	            = $this->maxi('id_alasan','alasan_pembatalan');	
		$id_dp                  = $this->input->post('id_dp');	
	
		 
		$query = $this->db->query("INSERT INTO alasan_pembatalan values($id_alasan, 'FrmAkutansi',
			                      '".$this->input->post('text_aktif_deposit')."','Mengaktifkan Kembali Uang Muka', 
			                     '".$this->tgl_skrg()."', '".$this->jam_skrg()."','".$this->input->post('id_user_posting')."', '".$this->input->post('id_pasien')."','','','Nilai Deposit Diaktifkan : Rp.' '".$this->input->post('jumlah')."','N/A','','','','','','' )");

		$query = $this->db->query("UPDATE uangmuka set status = 'WAITING', no_ref_faktur_invoice= ' ' where id_dp = '$id_dp'");

		

	}	

	function hapus_deposit() {

		$id_alasan 	            = $this->maxi('id_alasan','alasan_pembatalan');	
		$id_dp                  = $this->input->post('id_dp');	
	
		 
		$query = $this->db->query("INSERT INTO alasan_pembatalan values($id_alasan, 'FrmAkutansi',
			                      '".$this->input->post('text_hps_deposit')."','Hapus Uang Muka Pasien', 
			                     '".$this->tgl_skrg()."', '".$this->jam_skrg()."','".$this->input->post('id_user_posting')."', '','','','','insert into uangmuka values(insert into uangmuka values)','','','','','','' )");

		$query = $this->db->query("DELETE from uangmuka where id_dp = '$id_dp'");

		

	}	


				
				


  

   


}




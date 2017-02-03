<?php

class m_daftar extends CI_Model {

	var $querynya                   = " SELECT a.poli, a.no_urut, CONCAT(b.nama,'/',b.id) nama, SUBSTR(c.tgl_jam,12,8) as jam, 
									d.nama_perusahaan, a.nama_dokter, a.`status`, a.no_ref_upf, b.id, c.no_upf from antrian a
									LEFT JOIN pasien_pribadi b on a.id_pasien=b.id
									LEFT JOIN upf_history c ON c.no_upf=a.no_ref_upf
									LEFT JOIN pasien_account d ON b.id=d.id ";


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
		

	function daftar_pasien(){
		
		$no_urut 		= $this->maxi('no_urut','antrian', "WHERE poli='".$this->input->post('poli') ."' ");
		$textantrian 	= $this->terbilang($no_urut);
		$maxi 			= $this->maxi('no_upf','upf_history');

		$this->db->query(" insert into upf values  ($maxi,'".$this->input->post('id_pasien')."','',
						'".$this->input->post('poli')."','".$this->input->post('nama_dokter')."','".$this->tgl_skrg().' '.$this->jam_skrg()."','waiting','-') ");
										
		$this->db->query(" insert into upf_history values  ($maxi,'".$this->input->post('id_pasien')."',
						'".$this->input->post('poli')."', '".$this->input->post('nama_dokter')."', '".$this->tgl_skrg().' '.$this->jam_skrg()."', '".$this->input->post('rujukan')."', '".$this->input->post('asal_rujukan')."', '".$this->input->post('kondisi_pasien')."', 'DIPERIKSA', 'Tunggu dari RM', 'RAWAT JALAN', 'BELUM DICETAK', '2001', '', '', '', '') ");	

		$this->db->query ( "delete from ekspedisi_alert") ;

		$this->db->query ( "insert into ekspedisi_alert (status_alert) values ('ON')");	

		$this->db->query(" insert into antrian values  ($no_urut,'".$this->input->post('id_pasien')."',
						'".$this->input->post('poli')."','".$this->tgl_skrg()."' ,'TUNGGU', 
						'$textantrian', '".$this->input->post('nama_dokter')."', $maxi, '0', '', '', '', '') ");


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	
	}

	
	function booking_pasien(){ 

		$no_urut 		= $this->maxi('no_urut','antrian', "WHERE poli='".$this->input->post('poli') ."' ");
		$textantrian 	= $this->terbilang($no_urut);

	

		$this->db->query(" insert into antrian values  ($no_urut,'".$this->input->post('id_pasien')."',
						'".$this->input->post('poli')."','".$this->tgl_skrg()."' ,'BOOKING', 
						'$textantrian', '".$this->input->post('nama_dokter')."', '', '0', '', '', '', '') ");
						
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}				
	}

	function daftar_booking(){
		
		$maxi 			= $this->maxi('no_upf','upf_history');


		$this->db->query (" insert into upf values  ($maxi,'".$this->input->post('id_pasien')."','',
						'".$this->input->post('poli')."','".$this->input->post('nama_dokter')."','".$this->tgl_skrg().' '.$this->jam_skrg()."','waiting','-') ");
										
		$this->db->query (" insert into upf_history values  ($maxi,'".$this->input->post('id_pasien')."',
						'".$this->input->post('poli')."', '".$this->input->post('nama_dokter')."', '".$this->tgl_skrg().' '.$this->jam_skrg()."', '".$this->input->post('rujukan')."', '".$this->input->post('asal_rujukan')."', '".$this->input->post('kondisi_pasien')."', 'DIPERIKSA', 'Tunggu dari RM', 'RAWAT JALAN', 'BELUM DICETAK', '2001', '', '', '', '') ");	

		$this->db->query ( "delete from ekspedisi_alert");

		$this->db->query ( "insert into ekspedisi_alert (status_alert) values ('ON')");	

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	
	}

	function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }

	function antrian_pasien($awal,$panjang, $srch ='') {

		$add_where = "WHERE";

		if($this->input->post('combo_poli2') != '' )                         $add_where  .= " a.poli LIKE '%".$this->input->post('combo_poli2')."%' AND ";

		if($this->input->post('combo_tampil_pas') != '' )                    $add_where  .= " a.status LIKE '%".$this->input->post('combo_tampil_pas')."%' AND ";

		if($srch !='')                                                       $add_where  .= " (b.nama LIKE '%$srch%' OR b.id LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);	
		$this->querynya = $this->querynya.$add_where;
		$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }

  
    function update_pasien() {	

    	$status = $this->input->post('status');

    	if ($status === 'BOOKING') {
    		$this->daftar_booking();
    	} 

		$id_pasien = $this->input->post('id_pasien');

		$query = $this->db->query("update antrian set status = (case when `status`='BOOKING' THEN 'TUNGGU'
																else 'PANGGIL' 
																end)
																where id_pasien= '$id_pasien' ");
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}			
	}


	function batal_antrian() {

		$id_alasan 	   = $this->maxi('id_alasan','alasan_pembatalan');		
		$id_pasien 	   = $this->input->post('id_pasien');
		$poli	       = $this->input->post('poli');
		$no_urut   	   = $this->input->post('no_urut');
		$no_upf        = $this->input->post('no_upf');  
		$query = $this->db->query("INSERT INTO alasan_pembatalan values($id_alasan, 'Registrasi',
			                      '".$this->input->post('text_alasan')."','Batalkan Antrian', 
			                     '".$this->tgl_skrg()."', '".$this->jam_skrg()."', '2001','','','','', 'insert into upf_history values','','','','','','')");

		$query = $this->db->query("DELETE FROM antrian where poli = '$poli' and id_pasien = '$id_pasien' and no_urut = $no_urut");

		$query = $this->db->query("DELETE from upf_history where no_upf = '$no_upf' ");

		$query = $this->db->query("DELETE from upf where no_upf = '$no_upf' ");


	return $this->db->trans_status();		
	}


    function reset_antrian() {

    	 $query =$this->db->query (" DELETE FROM antrian where CURDATE() and status <> 'BOOKING' ");


    }
	

}

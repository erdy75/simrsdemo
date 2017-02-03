
<?php

class m_piutang_pasien extends CI_Model {


	var $querynya           		= "SELECT a.cib,a.pasien_tampil,SUM(total) total, a.faktur,id, nama, alamat, id_card, 
										id_number, telp from(SELECT a.cib, a.pasien_tampil, sum(a.harga_satuan*a.total) total, a.faktur, b.id, b.nama, b.alamat, b.id_card, 
										b.id_number, b.telp   from faktur_detail_prebayar a
										LEFT JOIN pasien_pribadi b on a.cib=b.id
										GROUP BY cib
										UNION 
										select a.cib, a.status, sum(a.harga*a.kuantitas) total, a.faktur, a.cib, a.`status`, b.alamat, b.id_card, b.id_number, 
										b.telp  from faktur_apotik_prebayar a
										LEFT JOIN pasien_pribadi b ON a.cib=b.id
									    GROUP BY cib )a ";

    var $detail_ubl					=  "SELECT b.keterangan, b.harga_satuan , b.total qty, b.harga_satuan*b.total total_tag, b.poli, 
    									b.id_dokter,a.tanggal, c.nama, a.inap_jalan, a.id, a.pasien_tampil, a.alamat_tampil, a.umur_tampil, a.sex_tampil, b.inc, b.dokterRefferal, a.nama_kasir from faktur a 
										LEFT JOIN faktur_detail b ON a.faktur=b.faktur 
										LEFT JOIN tkar_bio c on a.nama_kasir=c.id ";

	 var $detail_ubl2				=  "SELECT b.keterangan, b.harga_satuan , b.total qty, b.harga_satuan*b.total total, b.poli, 
	 									b.id_dokter,b.dokterRefferal,a.tanggal, c.nama  from faktur a 
										LEFT JOIN faktur_detail b ON a.faktur=b.faktur 
										LEFT JOIN tkar_bio c on a.nama_kasir=c.id ";
	
     function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	//echo $query->num_rows();
    	return $query->num_rows();
    }


    function piutang_pasien($awal,$panjang, $srch =''){

    	$add_where = "WHERE";

		if($srch !='')                                                       $add_where  .= " (cib LIKE '%$srch%' OR pasien_tampil LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

		$this->querynya = $this->querynya.$add_where." GROUP BY cib";

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang " );

		return $query->result_array();			
	}



	function piutang_pasien_detail(){

		if($this->input->post('cib') != '') {
		$cib =$this->input->post('cib');
		}

		return "SELECT a.keterangan,a.harga_satuan, a.total qty,a.harga_satuan*a.total total,a.poli, a.inap_jalan, a.tgl,  
											c.nama from faktur_detail_prebayar a 
										LEFT JOIN pasien_pribadi b ON a.cib=b.id 
										LEFT JOIN tkar_bio c on a.id_user=c.id where a.cib='$cib'
										UNION
										SELECT d.nama_barang, d.harga, d.kuantitas qty, d.harga*d.kuantitas total_tag, 'Apotik', d.inap_jalan, d.tanggal, f.nama from faktur_apotik_prebayar d
										LEFT JOIN pasien_pribadi e ON d.cib=e.id 
										LEFT JOIN tkar_bio f on d.id_user=f.id where d.cib='$cib'
										";
	}

	

    function list_piutang_pasien_detail($awal,$panjang,$srch = ''){

    	$add_where ="AND";

		if($srch !='')                                                       $add_where  .= " (d.nama_barang LIKE '%$srch%') AND ";

		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
	

		$this->querynya = $this->piutang_pasien_detail().$add_where;

    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );

		return $query->result_array();			
	}

	function hapus_piutang(){

		$cib = $this->input->post('cib');

		$query = $this->db->query("DELETE from faktur_detail_prebayar where  cib = '$cib'");

		$query = $this->db->query("DELETE from faktur_apotik_prebayar where  cib = '$cib'");
	}

	function pas_nonapotek(){

		$query = $this->db->query("SELECT a.faktur, a.id, a.pasien_tampil,a.alamat_tampil,sum(b.harga_satuan) nilai, 
								   a.KelompokBeli, a.Penjamin, a.tanggal  from faktur a
									LEFT JOIN faktur_detail b ON a.faktur=b.faktur
									GROUP BY a.faktur");

		return $query->result_array();
	}

	  function get_pas_nonapotek() {
	  	$faktur = $this->input->post('faktur');

		$query = $this->db->query("SELECT id, pasien_tampil,alamat_tampil, umur_tampil, sex_tampil, KelompokBeli, Penjamin,inap_jalan, tanggal  from faktur   where faktur = '$faktur' ");
		return $query->result_array();
    }


    function panggil_total($fld,$tbl){

    	$query = $this->db->query("SELECT format (sum($fld),0) totalNya from ($tbl) a ");
    	$hsl=$query->row();
    	return $hsl->totalNya;

    }

     function get_total($fld,$tbl){

    	$query = $this->db->query("SELECT format (sum($fld),0) totalNya from ($tbl) b ");
    	$hsl=$query->row();
    	return $hsl->totalNya;

    }

     function detail_ubl($awal,$panjang,$srch =''){


    	$add_where ="WHERE";

    	if($this->input->post('faktur') != '' )     $add_where  .= " a.faktur LIKE '%".$this->input->post('faktur')."%' AND ";

    	if($srch !='')                              $add_where  .= " (b.keterangan LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->detail_ubl.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang " );

		return $query->result_array();			
	}

	function detail_ubl2($awal,$panjang,$srch =''){


    	$add_where ="WHERE";

    	if($this->input->post('faktur') != '' )     $add_where  .= " a.faktur LIKE '%".$this->input->post('faktur')."%' AND ";

    	if($srch !='')                              $add_where  .= " (b.keterangan LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->detail_ubl.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang " );

		return $query->result_array();			
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

	 function simpan_ubl() {

		     $ubl ='' ; 
			 $dtNya = $this->input->post('dt');//print_r($this->input->post('dt'));
			 for($a=0; $a<count($dtNya) ;$a++){
			 	$this->db->query( "insert into faktur_detail_prebayar values('-','-','".$dtNya[$a][2]."','".$dtNya[$a][3]."','".$dtNya[$a][6]."','".$dtNya[$a][5]."','".$dtNya[$a][1]."','".$dtNya[$a][9]."','".$this->tgl_skrg()."', '".$this->jam_skrg()."','".$dtNya[$a][10]."','".$dtNya[$a][11]."','".$dtNya[$a][12]."','".$dtNya[$a][13]."','".$dtNya[$a][14]."','".$dtNya[$a][15]."','".$dtNya[$a][16]."','".$dtNya[$a][17]."','','','','','','','');");	

         }

      

        

}
		
			





				


    

}




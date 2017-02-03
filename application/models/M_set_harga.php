
<?php

class m_set_harga extends CI_Model {

	var $querynya           = " SELECT a.id, a.nama, a.nama_poli, b.*, c.nama as user_id  from layanan a
											left JOIN harga b ON a.id=b.id_layanan
											LEFT JOIN tkar_bio c ON b.user_id=c.id ";

    var $harga_poli 		= "SELECT a.id, a.nama, a.keterangan, b.harga, b.persen_fee_max, a.nama_poli, a.kode_lokal,
									a.include_saat_registrasi, a.free_price_input, b.tgl_edit, c.nama as editor, a.urut, 
									b.user_id FROM layanan a
									LEFT JOIN harga b ON a.id=b.id_layanan
									LEFT JOIN tkar_bio c ON b.user_id=c.id";

	var $hrg_paket          = "SELECT a.id_paket, a.nama, SUM(b.harga_sub_paket) tarif, (SELECT count(1) FROM 
							    harga_paket_detail b WHERE a.id_paket=b.id_paket) jum_item_detail  FROM harga_paket a
								LEFT JOIN harga_paket_detail b ON a.id_paket=b.id_paket
								GROUP BY nama";

	var $hrg_paket_detail   = "SELECT poli_penunjang, id_layanan, kelompok_beli_if_penunjang, harga_sub_paket 
								FROM harga_paket_detail ";

	var $layanan_detail     = "SELECT nama_layanan, informasi, inc from layanan_detail_info";

	var $bidang             = "SELECT id_layanan, bidang, unit_cost, BETHANY, HEMODIALISA, KARYAWAN, UMUM from lab_detail";

	var $bid_rad            = "SELECT nama, BETHANY, UMUM, KARYAWAN from radiologi_detail ";

	var $nama_pricing       = "SELECT * from harga_based_diagnose";

	

	function cari_poli() {
		$filter=$this->input->post('term');
		$query = $this->db->query(" Select id ,nama text From poli where nama LIKE '$filter%'   " );
        return $query->result_array();
    }

   

    function tarif_laboratorium() {
    	$query = $this->db->query("SELECT kelompok_tarif from lab_default_kelompok_tarif_list GROUP BY kelompok_tarif");

    	return $query->result_array();
    }

    function periksa_lab() {
    	$filter=$this->input->post('term');
		$query = $this->db->query(" Select id_layanan id ,id_layanan text From lab_detail where id_layanan LIKE '$filter%'   " );
        return $query->result_array();
    }

     function periksa_radiologi() {
    	$filter=$this->input->post('term');
		$query = $this->db->query(" Select nama id ,nama text From radiologi_detail where nama LIKE '$filter%'   " );
        return $query->result_array();
    }

      function tindakan_poli() {
    	$add_where =" ";
        $fltr=$this->input->post('term');
        $poli=$this->input->post('poli');
		$kategori=$this->input->post('kategori');
		if($kategori != '') $add_where .= " AND nama ='$kategori' ";
		if($poli != '') $add_where .= " AND poli ='$poli' ";
		
		$query = $this->db->query(" Select id ,nama text, poli from v_polilayanan WHERE nama LIKE '$fltr%' $add_where " );
        return $query->result_array();
    }



    function list_hargapoli($awal,$panjang,$srch = ''){
    	$combo_poli1    = $this->input->post('combo_poli1');

    	$add_where =" WHERE";

    	if($combo_poli1   != '')                               $add_where  .=" (a.nama_poli LIKE '%".$combo_poli1."%') AND ";
    	

    	if($srch !='')                                         $add_where  .= " (a.id LIKE '%$srch%' OR a.nama LIKE '%$srch%') AND ";

    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

    	$this->querynya = $this->harga_poli.$add_where." ORDER BY nama";

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

    	return $query->result_array() ;

    
    }

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

    function tambah_harga(){

    	$id_master    	            = $this->maxi('id','layanan');	
		$id_layanan                 = $this->maxi('id_layanan','harga');
	

		 
		$query = $this->db->query("INSERT INTO layanan values($id_master,'".$this->input->post('nm_layanan')."',
			'".$this->input->post('select_kelompok')."', '".$this->input->post('combo_poli2')."','".$this->input->post('urut')."','','".$this->input->post('kode_lokal')."','','','','','','','')");

		$query = $this->db->query("DELETE from harga where id_layanan=$id_layanan");


		$query = $this->db->query("INSERT INTO harga values($id_layanan,'".$this->input->post('trf_biaya')."',
			'".$this->input->post('fee_disc')."', 'tidak','".$this->tgl_skrg()."','2001','0','0','0','0','0','0','0','0','0','0','0','0' )");

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	

    }

    function hapus_harga(){
    	$kode_layanan    = $this->input->post('kode_layanan');

    	$query = $this->db->query("DELETE from layanan where id=$kode_layanan");

    	$query = $this->db->query("DELETE from harga where id_layanan=$kode_layanan");

    }


    function update_kelompok(){
    	$select_kelompok = $this->input->post('select_kelompok');

    	$kode_layanan    = $this->input->post('kode_layanan');

    	$query = $this->db->query("UPDATE layanan set keterangan='$select_kelompok' where id='$kode_layanan' " );

    }


    function update_harga(){
    	$select_kelompok = $this->input->post('select_kelompok');
    	$nm_layanan      = $this->input->post('nm_layanan');
    	$kode_layanan    = $this->input->post('kode_layanan');
    	$kode_lokal      = $this->input->post('kode_lokal');
    	$trf_biaya       = $this->input->post('trf_biaya');
    	$fee_disc        = $this->input->post('fee_disc');
    	$combo_poli2     = $this->input->post('combo_poli2');
    	$tgl_skrg        = $this->tgl_skrg();
    	$user_id         = $this->input->post('user_id');

    	$query = $this->db->query(" UPDATE layanan set nama = '$nm_layanan', kode_lokal = '$kode_lokal', 
    		nama_poli = '$combo_poli2  ', keterangan = '$select_kelompok' where id = '$kode_layanan'	" );

    	$query = $this->db->query(" UPDATE harga set harga = '$trf_biaya', persen_fee_max = '$fee_disc', verifikasi = 'ya', tgl_edit ='$tgl_skrg', user_id = '$user_id' where id_layanan = '$kode_layanan'	" );


    }

     function update_include_harga(){
    	$kode_layanan    = $this->input->post('kode_layanan');
    

    	$query = $this->db->query(" UPDATE layanan SET include_saat_registrasi= 'Include' where id = '$kode_layanan' " );
    }

    function tarif_bertingkat($awal,$panjang,$srch = ''){

    	$add_where="WHERE";
    	

    	if($srch !='')                                         $add_where  .= " (a.id LIKE '%$srch%' OR a.nama LIKE '%$srch%') AND ";

    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

    	$this->querynya=$this->querynya.$add_where." ORDER BY a.nama_poli asc ";

    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }

    function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }

    function tambah_nama_tarif(){

    	$kls_group = $this->input->post('kls_group');

    	$query = $this->db->query(" ALTER TABLE `harga` ADD `$kls_group` INT(1)   UNSIGNED DEFAULT 0 NOT NULL ");

    }

    function list_hrg_paket($awal,$panjang){
    	$this->querynya = $this->hrg_paket;

    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );

    	return $query->result_array() ;

    
    }

    function list_hrg_paket_detail($awal,$panjang){

    	$add_where="WHERE";

		if($this->input->post('id_paket') != '' )                             $add_where .=" id_paket= '".$this->input->post('id_paket')."'  " ;

		$this->querynya = $this->hrg_paket_detail.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();			
	}

    private function maxis($fld,$tbl) {
		$query = $this->db->query ("SELECT MAX($fld) maxis FROM $tbl");
		$hsl = $query->row();
		return $hsl->maxis;
	}

    function simpan_daftarpkt(){

		$id_paket = $this->input->post('id_paket');

    	
    	if ($id_paket === '~~Auto Number~~') {
    		return $this->simpan_daftar();
    	}  else {
    		return $this->simpan_daftar_detail();
    	}
    	

	}

	function simpan_daftar(){

		$maxis = $this->maxis('id_paket','harga_paket')+1;
		

		$this->db->query(" insert into harga_paket values  ($maxis,'".$this->input->post('nm_pkt')."','2001','".$this->input->post('combo_poli6')."','".$this->input->post('combo_poli7')."','".$this->tgl_skrg()."') ");				
         if($this->input->post('hrg_pkt_lab') != '') 
										
		$this->db->query(" insert into harga_paket_detail values  ($maxis,'".$this->input->post('poli_lab')."',
						'".$this->input->post('combo_pkt_laboratorium')."', '".$this->input->post('combo_periksa_lab')."','".$this->input->post('hrg_pkt_lab')."') ");	

          if($this->input->post('hrg_pkt_rad') != '') 
		$this->db->query(" insert into harga_paket_detail values  ($maxis,'".$this->input->post('poli_rad')."',
						'".$this->input->post('combo_pkt_radiologi')."', '".$this->input->post('combo_periksa_radiologi')."','".$this->input->post('hrg_pkt_rad')."') ");

		  if($this->input->post('hrg_pkt_poli') != '') 
		$this->db->query(" insert into harga_paket_detail values  ($maxis,'".$this->input->post('combo_poli8')."',
						'".$this->input->post('tindakan_poli')."', '-','".$this->input->post('hrg_pkt_poli')."') ");	

	

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxis('id_paket','harga_paket');
		}	
	
	}


	function simpan_daftar_detail(){
		$maxis = $this->input->post('id_paket');

		if($this->input->post('hrg_pkt_lab') != '') 
		$this->db->query(" insert into harga_paket_detail values  ($maxis,'".$this->input->post('poli_lab')."',
						'".$this->input->post('combo_pkt_laboratorium')."', '".$this->input->post('combo_periksa_lab')."','".$this->input->post('hrg_pkt_lab')."') ");

		if($this->input->post('hrg_pkt_rad') != '') 
		$this->db->query(" insert into harga_paket_detail values  ($maxis,'".$this->input->post('poli_rad')."',
						'".$this->input->post('combo_pkt_radiologi')."', '".$this->input->post('combo_periksa_radiologi')."','".$this->input->post('hrg_pkt_rad')."') ");	

		 if($this->input->post('hrg_pkt_poli') != '') 
		$this->db->query(" insert into harga_paket_detail values  ($maxis,'".$this->input->post('combo_poli8')."',
						'".$this->input->post('tindakan_poli')."', '-','".$this->input->post('hrg_pkt_poli')."') ");		
		return $maxis;
				
	}

	function hapus_paket(){
    	$id_paket    = $this->input->post('id_paket');

    	$query = $this->db->query("DELETE FROM harga_paket where id_paket = '$id_paket' ");

    	$query = $this->db->query("DELETE FROM harga_paket_detail where id_paket = '$id_paket' " );

    }

    function layanan_detail($awal,$panjang,$srch =''){


    	$add_where =" WHERE";

    	if($this->input->post('combo_nama_paket') != '' )     $add_where  .= " nama_layanan LIKE '%".$this->input->post('combo_nama_paket')."%' AND ";

    	if($srch !='')                                         $add_where  .= " (nama_layanan LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->layanan_detail.$add_where;
    	$query = $this->db->query($this->querynya." ORDER BY nama_layanan,inc asc LIMIT $awal,$panjang " );

		return $query->result_array();			
	}


    function get_tindakan(){
		$query = $this->db->query(" SELECT id_paket, nama from harga_paket 
									UNION
									SELECT id,nama FROM layanan" );

        return $query->result_array();
	}

	 function tambah_tindakan(){

    	$id_inc    	            = $this->maxi('inc','layanan_detail_info');	

		$query = $this->db->query("INSERT INTO layanan_detail_info values('".$this->input->post('nama_layanan')."',
			'".$this->input->post('txt_informasi')."',$id_inc)");

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	

    }

     function hapus_tindakan(){

    	$nama_layanan    = $this->input->post('nama_layanan');

    	$inc             = $this->input->post('inc');

    	$query = $this->db->query("DELETE FROM layanan_detail_info where nama_layanan = '$nama_layanan' and inc ='$inc' " );
    }

    function combo_nama_paket() {
    	$query = $this->db->query("SELECT * FROM `layanan_detail_info` GROUP BY nama_layanan");

    	return $query->result_array();
    }

    function cari_bidang() {
		$filter=$this->input->post('term');
		$query = $this->db->query(" Select nama id ,nama text From lab_bidang where nama LIKE '$filter%'   " );
        return $query->result_array();
    }

     function list_bidang($awal,$panjang,$srch = ''){
     	$add_where =" WHERE";

    	if($this->input->post('combo_bidang') != '' )          $add_where  .= " bidang LIKE '%".$this->input->post('combo_bidang')."%' AND ";

    	if($srch !='')                                         $add_where  .= " (id_layanan LIKE '%$srch%') AND ";

    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

    	$this->querynya = $this->bidang.$add_where."  ORDER BY bidang, indexUrut";

    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );

    	return $query->result_array() ;

    
    }

    function update_lab_all(){

    	if($this->input->post('copy_trf_lab') == "BETHANY")
    		return $this->update_bethany();
    	else if ($this->input->post('copy_trf_lab') == "HEMODIALISA")
    		return $this->update_hemodialisa();
    	else if ($this->input->post('copy_trf_lab') == "KARYAWAN")
    		return $this->update_karyawan();
    	else return $this->update_umum;
	}


    function  update_bethany(){  		
		$copy_trf_lab               = $this->input->post('copy_trf_lab');
		$set_tarif                  = $this->input->post('set_tarif');
		$id_layanan                 = $this->input->post('id_layanan');
		$bidang                     = $this->input->post('bidang');
		$tgl_skrg                   = $this->tgl_skrg();
		

		$this->db->query("UPDATE lab_detail set tgl_edit = '$tgl_skrg', nama_user = 'SUPERADMIN', `BETHANY`= '$set_tarif' where id_layanan = '$id_layanan' AND bidang = '$bidang' ");	
	}

	function  update_hemodialisa(){  		
		$set_tarif                  = $this->input->post('set_tarif');
		$id_layanan                 = $this->input->post('id_layanan');
		$bidang                     = $this->input->post('bidang');
		$tgl_skrg                   = $this->tgl_skrg();
		

		$this->db->query("UPDATE lab_detail set tgl_edit = '$tgl_skrg', nama_user = 'SUPERADMIN', `HEMODIALISA`= '$set_tarif' where id_layanan = '$id_layanan' AND bidang = '$bidang' ");	
	}

	function  update_karyawan(){  		
		$set_tarif                  = $this->input->post('set_tarif');
		$id_layanan                 = $this->input->post('id_layanan');
		$bidang                     = $this->input->post('bidang');
		$tgl_skrg                   = $this->tgl_skrg();
		

		$this->db->query("UPDATE lab_detail set tgl_edit = '$tgl_skrg', nama_user = 'SUPERADMIN', `KARYAWAN`= '$set_tarif' where id_layanan = '$id_layanan' AND bidang = '$bidang' ");	
	}

	function  update_umum(){  		
		$set_tarif                  = $this->input->post('set_tarif');
		$id_layanan                 = $this->input->post('id_layanan');
		$bidang                     = $this->input->post('bidang');
		$tgl_skrg                   = $this->tgl_skrg();
		

		$this->db->query("UPDATE lab_detail set tgl_edit = '$tgl_skrg', nama_user = 'SUPERADMIN', `UMUM`= '$set_tarif' where id_layanan = '$id_layanan' AND bidang = '$bidang' ");	
	}

	function update_naik_hargaall(){

    	if($this->input->post('copy_trf_lab1') == "BETHANY")
    		return $this->update_naik_bethany();
    	else if ($this->input->post('copy_trf_lab1') == "HEMODIALISA")
    		return $this->update_naik_hemodialisa();
    	else if ($this->input->post('copy_trf_lab1') == "KARYAWAN")
    		return $this->update_naik_karyawan();
    	else return $this->update_umum;
	}

	function  update_naik_bethany(){  		
		$id_layanan                 = $this->input->post('id_layanan');
		$naik_harga                 = $this->input->post('naik_harga');
		$bethany				    = $this->input->post('bethany');
        $copy_trf_lab2				= $this->input->post('copy_trf_lab2');
	

		$this->db->query("UPDATE lab_detail SET $copy_trf_lab2='$bethany'*(100+'$naik_harga')/100 where id_layanan='$id_layanan'");	
	}

	function  update_naik_hemodialisa(){  		
		$id_layanan                 = $this->input->post('id_layanan');
		$naik_harga                 = $this->input->post('naik_harga');
		$hemodialisa				= $this->input->post('hemodialisa');
        $copy_trf_lab2				= $this->input->post('copy_trf_lab2');
	

		$this->db->query("UPDATE lab_detail SET $copy_trf_lab2='$hemodialisa'*(100+'$naik_harga')/100 where id_layanan='$id_layanan'");	
	}

	function  update_naik_karyawan(){  		
		$id_layanan                 = $this->input->post('id_layanan');
		$naik_harga                 = $this->input->post('naik_harga');
		$karyawan				    = $this->input->post('karyawan');
        $copy_trf_lab2				= $this->input->post('copy_trf_lab2');
	

		$this->db->query("UPDATE lab_detail SET $copy_trf_lab2='$karyawan'*(100+'$naik_harga')/100 where id_layanan='$id_layanan'");	
	}

	function  update_naik_umum(){  		
		$id_layanan                 = $this->input->post('id_layanan');
		$naik_harga                 = $this->input->post('naik_harga');
		$umum   				    = $this->input->post('umum');
        $copy_trf_lab2				= $this->input->post('copy_trf_lab2');
	

		$this->db->query("UPDATE lab_detail SET $copy_trf_lab2='$umum'*(100+'$naik_harga')/100 where id_layanan='$id_layanan'");	
	}

	 function list_bid_rad($awal,$panjang,$srch =''){


    	$add_where ="WHERE";

    	if($this->input->post('nama')    != '')                 $add_where  .=" nama LIKE '%".$this->input->post('nama')."%' AND "; 
    	if($srch != '')                                         $add_where  .=" (nama LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->bid_rad.$add_where;
    	$query = $this->db->query($this->querynya." ORDER BY nama LIMIT $awal, $panjang ");

		return $query->result_array();			
	}

	function tambah_periksa_rad(){

		$id_inc    	            = $this->maxi('inc','radiologi_detail');	

		$query = $this->db->query("INSERT INTO radiologi_detail values($id_inc,'".$this->input->post('text_tbh_periksa')."',
		'','0','0','0','0','0')");

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	
	}

	 function hapus_periksa_rad(){

    	$nama   = $this->input->post('nama');

    	$query = $this->db->query("DELETE FROM radiologi_detail where nama = '$nama' ");
    }

    function tambah_kel_rad(){

    	$text_tbh_tarif = $this->input->post('text_tbh_tarif');


		$query = $this->db->query("ALTER TABLE `radiologi_detail` ADD `$text_tbh_tarif` MEDIUMINT(1) UNSIGNED DEFAULT 0 NOT NULL");
	

	}

	 function update_rad_all(){

    	if($this->input->post('tarif_rad') == "BETHANY")
    		return $this->update_radbethany();
    	else if ($this->input->post('tarif_rad') == "UMUM")
    		return $this->update_radumum();
    	else return $this->update_radkaryawan();
	}


    function  update_radbethany(){  		
		$tarif_rad                      = $this->input->post('tarif_rad');
		$set_tarif_rad                  = $this->input->post('set_tarif_rad');
		$nama                           = $this->input->post('nama');
		

		$this->db->query("UPDATE radiologi_detail set  BETHANY='$set_tarif_rad' where nama='$nama' ");	
	}

	

	function  update_radumum(){  		
		$set_tarif_rad                  = $this->input->post('set_tarif_rad');
		$nama                           = $this->input->post('nama');

		$this->db->query("UPDATE radiologi_detail set  UMUM='$set_tarif_rad' where nama='$nama' ");	
	}

	function  update_radkaryawan(){  		
	    $set_tarif_rad                  = $this->input->post('set_tarif_rad');
		$nama                           = $this->input->post('nama');
		
		$this->db->query("UPDATE radiologi_detail set  KARYAWAN='$set_tarif_rad' where nama='$nama' ");	
	}

	   function get_princing() {
        return $this->db->get("harga_based_diagnose")->result_array();
    }

     function list_nm_pricing($awal,$panjang,$srch =''){


    	$add_where =" WHERE";

    	if($this->input->post('nama_pricing')    != '')         $add_where  .=" nama_pricing LIKE '%".$this->input->post('nama_pricing')."%' AND "; 
    	if($srch != '')                                         $add_where  .=" (nama_pricing LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->nama_pricing.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal, $panjang ");

		return $query->result_array();			
	}

	function tbh_nama_pricing(){


		$query = $this->db->query("INSERT INTO harga_based_diagnose values('".$this->input->post('nm_pntrf')."')");



		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	
	}


	function hapus_nama_pricing(){

		$name_pricing = $this->input->post('nama_pricing');


		$query = $this->db->query("DELETE from harga_based_diagnose_detail where nama_pricing ='$name_pricing'");

		$query = $this->db->query("DELETE from harga_based_diagnose where nama_pricing ='$name_pricing' ");

	}


	function update_nama_pricing(){

		$name_pricing = $this->input->post('nama_pricing');

		$nm_pntrf     = $this->input->post('nm_pntrf');


		$query = $this->db->query("UPDATE harga_based_diagnose_detail set nama_pricing = '$nm_pntrf' where nama_pricing ='$name_pricing' ");

		$query = $this->db->query("UPDATE harga_based_diagnose set nama_pricing = '$nm_pntrf' where nama_pricing ='$name_pricing' ");


	}

	function base_pricing(){

	    $add_where =" WHERE";

		if($this->input->post('combo_pricing')    != '')         $add_where  .=" nama_Pricing LIKE '%".$this->input->post('combo_pricing')."%'  "; 


    	return "SELECT a.icd, a.Deskripsi, a.Deskripsi_ina, IFNULL(b.tarif,0) tarif, IFNULL(c.nama,0) nama, 
							 IFNULL(b.tanggal,0) tanggal from icd a
							 LEFT JOIN 
							 (SELECT nama_Pricing,icd, tarif, user , tanggal from harga_based_diagnose_detail $add_where) b on a.icd=b.icd
							 LEFT JOIN tkar_bio c ON b.user=c.id";
    }

	function list_base_pricing($awal,$panjang,$srch = ''){

		$add_where =" WHERE";

    	if($this->input->post('deskripsi')    != '')         $add_where  .=" deskripsi LIKE '%".$this->input->post('deskripsi')."%' AND "; 
    	if($srch != '')                                      $add_where  .=" (deskripsi LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

	
		$this->querynya = $this->base_pricing().$add_where;
    	$query = $this->db->query($this->querynya." ORDER BY ICD LIMIT $awal, $panjang ");

		return $query->result_array();			
	}

	function tbh_set_pricing(){

		$combo_pricing   = $this->input->post('combo_pricing');
		$icd             = $this->input->post('icd');


		$query = $this->db->query("DELETE from harga_based_diagnose_detail where nama_pricing = '$combo_pricing' and ICD = '$icd' ");

		$query = $this->db->query("INSERT INTO harga_based_diagnose_detail values('".$this->input->post('combo_pricing')."','".$this->input->post('icd')."', '".$this->input->post('nm_pntrf2')."', '2001', '".$this->tgl_skrg()."', '', '', '', '', '')");


		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	
	}
					










						
			

				
					








	











						



  


	
    

}

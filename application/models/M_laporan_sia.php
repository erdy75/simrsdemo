
<?php

class m_laporan_sia extends CI_Model {

	var $querynya                   =   "SELECT arus_kas.no_kas,
											  CONCAT(arus_kas.tanggal,' ',arus_kas.jam)  tgl_jam,
											  arus_kas.uraian,
											  arus_kas_detail.nilai total_penerima,
											  CONCAT(arus_kas.kepada_dari,' (',arus_kas.user_partner,')')  penerima,
											  arus_kas.user_mengetahui,
											  arus_kas.user_pembukuan,
											  tkar_bio.nama
											  FROM
											  arus_kas
											  INNER JOIN arus_kas_detail ON arus_kas_detail.no_kas = arus_kas.no_kas
											  INNER JOIN tkar_bio ON arus_kas.user_id = tkar_bio.id
											  WHERE posisi_kas='DEBET' ";

	var $list_lap_penyetor          =   "SELECT   arus_kas.no_kas,
											CONCAT(arus_kas.tanggal,' ',arus_kas.jam) tgl_jam,
											arus_kas.uraian,
											arus_kas_detail.nilai total_penyetor,
											CONCAT(arus_kas.kepada_dari,' (',arus_kas.user_partner,')')  penyetor,
											arus_kas.user_mengetahui,
											arus_kas.user_pembukuan,
											tkar_bio.nama
											FROM
											arus_kas
											INNER JOIN arus_kas_detail ON arus_kas_detail.no_kas = arus_kas.no_kas
											INNER JOIN tkar_bio ON arus_kas.user_id = tkar_bio.id
											WHERE posisi_kas='CREDIT' ";

	var $rekap_lap_penyetor			=    "SELECT no_kas, tanggal,uraian, kode_akun_kas_transaksi,  case when posisi_kas='CREDIT' then nilai 
	                                      else 0 END total_credit, case when posisi_kas='DEBET' then nilai else 0 END total_debet , kepada_dari, pembukuan, 
	                                      posisi_kas from (SELECT a.no_kas, concat(a.tanggal,' ',a.jam) tanggal, a.uraian, 
										   a.kode_akun_kas_transaksi, b.nilai, a.kepada_dari,concat(a.user_pembukuan,' / ',c.nama) pembukuan, 
										   a.posisi_kas   
										   from arus_kas a
										   left join arus_kas_detail b on a.no_kas=b.no_kas 
										   left join tkar_bio c on a.user_id=c.id
										   union
										   select a.no_kas, concat(b.tanggal,' ',b.jam) tanggal, a.uraian, a.kode_akun, a.nilai, b.kepada_dari
										   , concat(b.user_pembukuan,' / ',c.nama) pembukuan,case when b.posisi_kas='CREDIT' then 'DEBET' else 
										   'CREDIT' END from arus_kas_detail a
											left join arus_kas b on a.no_kas=b.no_kas
											left join tkar_bio c on b.user_id=c.id) a ";

   var $list_lap_jurnal				=     "SELECT
											jurnal_umum.tanggal,
											jurnal_umum_detail.kode_akun,
											chart_of_account.nama,
											jurnal_umum_detail.debet,
											jurnal_umum_detail.credit,
											jurnal_umum_detail.uraian,
											jurnal_umum.remark,
											tkar_bio.nama  user,
											jurnal_umum.id_jurnal,
											jurnal_umum.if_exist_kode_BKK_BKM 
											FROM
											jurnal_umum
											INNER JOIN jurnal_umum_detail ON jurnal_umum.id_jurnal = jurnal_umum_detail.id_jurnal
											INNER JOIN chart_of_account ON jurnal_umum_detail.kode_akun = chart_of_account.kode
											INNER JOIN tkar_bio ON jurnal_umum.user_id = tkar_bio.id ";

    var $trial_balance_detail        =      "SELECT  tanggal,kode_akun_kas_transaksi,   case when posisi_kas='CREDIT' then nilai 
		                                      else 0 END total_credit, case when posisi_kas='DEBET' then nilai else 0 END total_debet , uraian from (SELECT a.no_kas, a.tanggal, a.uraian, 
											   a.kode_akun_kas_transaksi, b.nilai, a.kepada_dari,concat(a.user_pembukuan,' / ',c.nama) pembukuan, 
											   a.posisi_kas   
											   from arus_kas a
											   left join arus_kas_detail b on a.no_kas=b.no_kas 
											   left join tkar_bio c on a.user_id=c.id
											   union
											   select a.no_kas,  b.tanggal, a.uraian, a.kode_akun, a.nilai, b.kepada_dari
											   , concat(b.user_pembukuan,' / ',c.nama) pembukuan,case when b.posisi_kas='CREDIT' then 'DEBET' else 
											   'CREDIT' END from arus_kas_detail a
												left join arus_kas b on a.no_kas=b.no_kas
												left join tkar_bio c on b.user_id=c.id) a ";



	function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }

      function panggil_total($fld,$tbl){
    	$query = $this->db->query("SELECT format (sum($fld),0) totalNya from ($tbl) a");
    	$hsl=$query->row();
    	return $hsl->totalNya;

    }

	function list_lap_penerima($awal,$panjang,$srch =''){

		$add_where = "AND";

        if($this->input->post('tgl_bkkbkm1')          != ' ')                      $add_where .= " date_format(arus_kas.tanggal,'%Y-%m-%d')>='".$this->input->post('tgl_bkkbkm1')."' AND ";

    	if($this->input->post('tgl_bkkbkm2')          != ' ')                      $add_where .= " date_format(arus_kas.tanggal,'%Y-%m-%d')<='".$this->input->post('tgl_bkkbkm2')."' AND "; 

    	if($srch !='')                                                             $add_where  .= " (arus_kas.uraian LIKE '%$srch%' OR arus_kas.kepada_dari LIKE '%$srch%') AND ";

		

		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);	
		$query = $this->db->query($this->querynya.$add_where." LIMIT $awal,$panjang" );
    	return $query->result_array();
		
    }

    function list_lap_penyetor($awal,$panjang,$srch =''){

		$add_where = "AND";

        if($this->input->post('tgl_bkkbkm1')          != ' ')                      $add_where .= " date_format(arus_kas.tanggal,'%Y-%m-%d')>='".$this->input->post('tgl_bkkbkm1')."' AND ";

    	if($this->input->post('tgl_bkkbkm2')          != ' ')                      $add_where .= " date_format(arus_kas.tanggal,'%Y-%m-%d')<='".$this->input->post('tgl_bkkbkm2')."' AND "; 

    	if($srch !='')                                                             $add_where  .= " (arus_kas.uraian LIKE '%$srch%' OR arus_kas.kepada_dari LIKE '%$srch%') AND ";


		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->list_lap_penyetor.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();
    }

    function rekap_lap_penyetor($awal,$panjang,$srch =''){

    	$add_where = "WHERE";

        if($this->input->post('tgl_rekap1')          != ' ')                      $add_where .= " date_format(tanggal,'%Y-%m-%d')>='".$this->input->post('tgl_rekap1')."' AND ";

    	if($this->input->post('tgl_rekap2')          != ' ')                      $add_where .= " date_format(tanggal,'%Y-%m-%d')<='".$this->input->post('tgl_rekap2')."' AND "; 

    	if($srch !='')                                                            $add_where  .= " (uraian LIKE '%$srch%' OR kode_akun_kas_transaksi LIKE '%$srch%') AND ";


		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->rekap_lap_penyetor.$add_where;

    	$query = $this->db->query($this->querynya." order by no_kas asc LIMIT $awal,$panjang" );

		return $query->result_array();
    }

    function list_lap_jurnal($awal,$panjang,$srch =''){

    	$add_where = "WHERE";

        if($this->input->post('tgl_jurnal1')          != ' ')                      $add_where .= " date_format(jurnal_umum.tanggal,'%Y-%m-%d')>='".$this->input->post('tgl_jurnal1')."' AND ";

    	if($this->input->post('tgl_jurnal2')          != ' ')                      $add_where .= " date_format(jurnal_umum.tanggal,'%Y-%m-%d')<='".$this->input->post('tgl_jurnal2')."' AND "; 

    	if($srch !='')                                                            $add_where  .= " (jurnal_umum_detail.kode_akun LIKE '%$srch%' OR chart_of_account.nama LIKE '%$srch%') AND ";


		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->list_lap_jurnal.$add_where;

    	$query = $this->db->query($this->querynya." ORDER BY jurnal_umum.id_jurnal  LIMIT $awal,$panjang" );

		return $query->result_array();
    }

    function hapus_lap_jurnal(){
		$id_jurnal  = $this->input->post('id_jurnal');
		$id_jurnal = $this->input->post('id_jurnal');

		$this->db->query("DELETE from jurnal_umum where id_jurnal = '$id_jurnal' ");

		$this->db->query("DELETE from jurnal_umum_detail where id_jurnal = '$id_jurnal' ");	
	}

	  function trial_balance(){

    	$tgl_trial1 	  = $this->input->post('tgl_trial1');
		$tgl_trial2 	  = $this->input->post('tgl_trial2');

		return " SELECT kode, nama, debet_bln_lalu, credit_bln_lalu, SUM(IFNULL(mutasi_debet,0) ) mutasi_debet, SUM(IFNULL(mutasi_credit,0) ) mutasi_credit, IFNULL(mutasi_debet+debet_bln_lalu,0) saldo_debet, IFNULL(mutasi_credit+credit_bln_lalu,0) saldo_credit, IFNULL(mutasi_debet-mutasi_credit,0) saldo,  isRekap, level FROM (
            SELECT a.*,b.*, 

            IFNULL((SELECT SUM(c.debet)  from jurnal_umum_detail c,jurnal_umum d WHERE c.kode_akun =b.kode_akun  AND c.id_jurnal=d.id_jurnal AND date_format(d.tanggal,'%Y-%m-%d')<='$tgl_trial1'
															AND
															date_format(d.tanggal,'%Y-%m-%d')<=
															'$tgl_trial2' GROUP BY c.kode_akun),0) debet_bln_lalu, 

            IFNULL((SELECT SUM(c.credit) from jurnal_umum_detail c,jurnal_umum d WHERE c.kode_akun =b.kode_akun  AND c.id_jurnal=d.id_jurnal AND date_format(d.tanggal,'%Y-%m-%d')<='$tgl_trial1'
															AND
															date_format(d.tanggal,'%Y-%m-%d')<=
															'$tgl_trial2' GROUP BY c.kode_akun),0) credit_bln_lalu

            FROM (SELECT kode, nama, isRekap, level from chart_of_account) a
            LEFT JOIN (SELECT sum(b.debet) mutasi_debet,sum(b.credit) mutasi_credit,b.kode_akun from jurnal_umum_detail b,jurnal_umum c WHERE  b.id_jurnal=c.id_jurnal AND 
            date_format(c.tanggal,'%Y-%m-%d')>='$tgl_trial1' AND
															date_format(c.tanggal,'%Y-%m-%d')<='$tgl_trial2' GROUP BY b.kode_akun) b  ON  b.kode_akun LIKE concat (a.kode,'%') ) mutasi  
           ";
    }

    function list_trial_balance($awal,$panjang,$srch = ''){

    	$add_where = "WHERE";

    	if($srch !='')                                                            $add_where  .= " (kode LIKE '%$srch%' OR nama LIKE '%$srch%') AND ";


		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

		$this->querynya = $this->trial_balance().$add_where." GROUP BY kode";
    	$query = $this->db->query($this->querynya."  LIMIT $awal, $panjang ");

		return $query->result_array();			
	}


     function nr_rl(){

    	$tgl_nrrl 	  = $this->input->post('tgl_nrrl');
    	$combo_nrrl     = $this->input->post('combo_nrrl');
		


		return " SELECT kode, nama, IFNULL(mutasi_debet+debet_bln_lalu,0) saldo_debet, IFNULL(mutasi_credit+credit_bln_lalu,0) saldo_credit, IFNULL(mutasi_debet-mutasi_credit,0) saldo,  isRekap, level FROM (
            SELECT a.*,b.*, 

            IFNULL((SELECT SUM(c.debet)  from jurnal_umum_detail c,jurnal_umum d WHERE c.kode_akun =b.kode_akun  AND c.id_jurnal=d.id_jurnal AND date_format(d.tanggal,'%Y-%m-%d')>='$tgl_nrrl'
															AND
															date_format(d.tanggal,'%Y-%m-%d')<=
															'$tgl_nrrl' GROUP BY c.kode_akun),0) debet_bln_lalu, 

            IFNULL((SELECT SUM(c.credit) from jurnal_umum_detail c,jurnal_umum d WHERE c.kode_akun =b.kode_akun  AND c.id_jurnal=d.id_jurnal AND date_format(d.tanggal,'%Y-%m-%d')>='$tgl_nrrl'
															AND
															date_format(d.tanggal,'%Y-%m-%d')<=
															'$tgl_nrrl' GROUP BY c.kode_akun),0) credit_bln_lalu

            FROM (SELECT kode, nama, isRekap, level from chart_of_account where NR_RL='$combo_nrrl') a
            LEFT JOIN (SELECT sum(b.debet) mutasi_debet,sum(b.credit) mutasi_credit,b.kode_akun from jurnal_umum_detail b,jurnal_umum c WHERE  b.id_jurnal=c.id_jurnal AND 
            date_format(c.tanggal,'%Y-%m-%d')>='$tgl_nrrl' AND
															date_format(c.tanggal,'%Y-%m-%d')<='$tgl_nrrl' GROUP BY b.kode_akun) b  ON  b.kode_akun LIKE concat (a.kode,'%') ) mutasi  
            " ;

		
    }

      function list_trial_balance_detail($awal,$panjang,$srch =''){

    	$add_where = "WHERE";

        if($this->input->post('tgl_trial1')          != ' ')                      $add_where .= " date_format(tanggal,'%Y-%m-%d')>='".$this->input->post('tgl_trial1')."' AND ";

    	if($this->input->post('tgl_trial1')          != ' ')                      $add_where .= " date_format(tanggal,'%Y-%m-%d')<='".$this->input->post('tgl_trial2')."' AND "; 


    	if($this->input->post('kode_akun_kas_transaksi')          != ' ')       $add_where .= " kode_akun_kas_transaksi = '".$this->input->post('kode_akun_kas_transaksi')."' AND "; 

    	if($srch !='')                                                          $add_where  .= " (uraian LIKE '%$srch%' OR kode_akun_kas_transaksi LIKE '%$srch%') AND ";


		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->trial_balance_detail.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();
    }


     function list_nr_rl($awal,$panjang,$srch = ''){

    	$add_where = "WHERE";

    	if($srch !='')                                                            $add_where  .= " (kode LIKE '%$srch%' OR nama LIKE '%$srch%') AND ";


		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);

		$this->querynya = $this->nr_rl().$add_where." GROUP BY kode";
    	$query = $this->db->query($this->querynya."  LIMIT $awal, $panjang ");

		return $query->result_array();			
	}

}


<?php

class m_master_cia extends CI_Model {

	var $querynya                     = "SELECT kode, nama, NR_RL, level, isRekap FROM chart_of_account ";

	var $list_kas_bank                = "SELECT coa_aktivitas_kas_bank.nama_kas_bank,coa_aktivitas_kas_bank.DEBET_CREDIT,
								        coa_aktivitas_kas_bank.kode_COA,chart_of_account.nama
								        FROM
										coa_aktivitas_kas_bank
										INNER JOIN chart_of_account ON chart_of_account.kode = coa_aktivitas_kas_bank.kode_COA ";

	var $list_aktivitas               = "SELECT coa_aktivitas_user.nama_aktivitas, coa_aktivitas_user.DEBET_CREDIT,
										coa_aktivitas_user.kode_COA,chart_of_account.nama
										FROM
										coa_aktivitas_user
										INNER JOIN chart_of_account ON chart_of_account.kode = coa_aktivitas_user.kode_COA ";


	 function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }


	function get_chart($awal,$panjang,$srch ='') {
        $add_where = "WHERE";

		if($srch !='')                                                       $add_where  .= " (kode LIKE '%$srch%' OR nama LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);	
		$this->querynya=$this->querynya.$add_where." ORDER BY kode asc ";
		$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );
    	return $query->result_array();
    }

    function list_kas_bank($awal,$panjang,$srch ='') {

		$add_where = "WHERE";

		if($srch !='')                                                       $add_where  .= " (coa_aktivitas_kas_bank.nama_kas_bank LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->list_kas_bank.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();
    }

    function list_aktivitas($awal,$panjang,$srch ='') {

		$add_where = "WHERE";

		if($srch !='')                                                       $add_where  .= " (coa_aktivitas_user.nama_aktivitas LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->list_aktivitas.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();
    }

    function tambah_chart_account() {

    	$this->db->trans_begin();
		$this->db->query(" insert into chart_of_account values  ('".$this->input->post('kd_akun')."',
						'".$this->input->post('nm_akun')."', '".$this->input->post('lvl_akun')."','".$this->input->post('posisiakun')."','".$this->input->post('kategori')."','','','') ");	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';		
		}	

    }

    function delete_chart_account(){
		$kd_akun = $this->input->post('kd_akun');

		$this->db->query("DELETE from chart_of_account where kode = '$kd_akun' ");	
	}

	function update_neraca(){
		$kd_akun = $this->input->post('kd_akun');
		$neraca  = $this->input->post('neraca');

		$this->db->query("UPDATE chart_of_account set NR_RL='$neraca' where kode='$kd_akun' ");

	}

	function update_level(){
		$kd_akun = $this->input->post('kd_akun');
		$level   = $this->input->post('level');

		$this->db->query("UPDATE chart_of_account set isRekap='$level' where kode='$kd_akun' ");

	}

	function update_level_akun(){
		$kd_akun     = $this->input->post('kd_akun');
		$lvl_akun2   = $this->input->post('lvl_akun2');

		$this->db->query("UPDATE chart_of_account set level='$lvl_akun2' where kode='$kd_akun' ");

	}

	function get_coa() {
        $query = $this->db->query("SELECT kode, nama, NR_RL, level, isRekap FROM chart_of_account  ");
		return 	$query->result_array();
    }

    function get_coa2() {
        $query = $this->db->query("SELECT kode, nama, NR_RL, level, isRekap FROM chart_of_account  ");
		return 	$query->result_array();
    }

    

     function simpan_kas_bank() {

		$query = $this->db->query("insert into coa_aktivitas_kas_bank values ('".$this->input->post('nm_kasbank')."','".$this->input->post('kategori_trsk')."','".$this->input->post('kode_akun')."') " );


        if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	
    }

     function hapus_kas_bank() {
     	$nm_kasbank  = $this->input->post('nm_kasbank');

		$query = $this->db->query("DELETE from coa_aktivitas_kas_bank where nama_kas_bank = '$nm_kasbank'" );
       
    }

     

     function simpan_aktivitas() {

		$query = $this->db->query("insert into coa_aktivitas_user values ('".$this->input->post('nm_aktivitas')."','".$this->input->post('kategori_trsk2')."','".$this->input->post('kode_coa')."') " );


        if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	
    }

      function hapus_aktivitas() {
     	$nm_aktivitas  = $this->input->post('nm_aktivitas');

		$query = $this->db->query("DELETE from coa_aktivitas_user where nama_aktivitas = '$nm_aktivitas'" );
       
    }


    

}




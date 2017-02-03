
<?php

class m_gudang_fisioterapi extends CI_Model {

	var $querynya     				  = "SELECT nama,jumlah,unit FROM gu_order_detail ";

	var $list_order_item              = "SELECT gu_order.no_order,
											tkar_bio.nama,
											gu_order.nama_kepala_unit,
											gu_order.poli,
											gu_order.tgl,
											gu_order.waktu,
											gu_order.keterangan,
											(SELECT COUNT(1)  FROM gu_order_detail a WHERE a.no_order = gu_order.no_order) as jum_item
											FROM
											gu_order
											INNER JOIN tkar_bio ON gu_order.id_petugas = tkar_bio.id
											WHERE gu_order.poli LIKE '%POLI FISIOTHERAPY%' AND DATE_FORMAT(
											gu_order.tgl,'%Y-%m-%d') ";

	var $list_order_detail			  = "SELECT nama,jumlah,unit, no_order FROM gu_order_detail ";

	var $list_history_order			  = "SELECT gu_order.no_order, gu_order.poli, gu_order.tgl, gu_order.keterangan, 
										 tkar_bio.nama as petugas ,gu_order.nama_kepala_unit,gu_order.`status`,gu_order_detail.nama,
										 gu_order_detail.jumlah,gu_order_detail.unit FROM gu_order INNER JOIN gu_order_detail ON
										 gu_order.no_order = gu_order_detail.no_order INNER JOIN tkar_bio ON tkar_bio.id = gu_order.id_petugas 
										 WHERE gu_order.poli LIKE '%POLI FISIOTHERAPY%' ";



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

	function simpan_order(){

		$no_order = $this->input->post('no_order');

    	
    	if ($no_order === '~~Auto Number~~') {
    		return $this->simpan_item();
    	}  else {
    		return $this->simpan_item_detail();
    	}
    	

	}

	function simpan_item(){

		$maxi = $this->maxi('no_order','gu_order')+1;
		

		$this->db->query(" insert into gu_order values  ($maxi,'2001','".$this->input->post('waktu')."','".$this->input->post('keterangan')."','Open','".$this->tgl_skrg()."','".$this->input->post('nama_kepala_unit')."','POLI FISIOTHERAPY', '".$this->jam_skrg()."','','','','') ");				

										
		$this->db->query(" insert into gu_order_detail values  ($maxi,'".$this->input->post('nama')."',
						'".$this->input->post('jumlah')."', '".$this->input->post('unit')."','','','','') ");			
	

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('no_order','gu_order');
		}	
	
	}

	function simpan_item_detail(){
		$maxi = $this->input->post('no_order');
		$this->db->query(" insert into gu_order_detail values  ($maxi,'".$this->input->post('nama')."',
						'".$this->input->post('jumlah')."', '".$this->input->post('unit')."','','','','') ");	
		return $maxi;
				
	}

	function daftar_permintaan($awal,$panjang,$srch = ""){

		$add_where = "WHERE";

		if($this->input->post('no_order')      != '')                     $add_where .= " no_order= '".$this->input->post('no_order')."' AND ";

		if($srch !='')                                                    $add_where  .= " (nama LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya=$this->querynya.$add_where;	
		$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
	}

	 function list_order_item($awal,$panjang,$srch =''){


    	$add_where ="AND";

    	if($this->input->post('select_status')    != '')                 $add_where  .=" gu_order.status LIKE '%".$this->input->post('select_status')."%' AND "; 

    	if($srch != '')                                         		 $add_where  .=" (gu_order.no_order LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->list_order_item.$add_where;
    	$query = $this->db->query($this->querynya." ORDER BY gu_order.no_order DESC LIMIT $awal, $panjang ");

		return $query->result_array();			
	}

	function list_order_detail($awal,$panjang,$srch =''){

		$add_where ="WHERE";

    	if($this->input->post('no_order')    != '')                       $add_where .= " no_order= '".$this->input->post('no_order')."' AND "; 

    	if($srch != '')                                         		 $add_where  .=" (nama LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->list_order_detail.$add_where;
    	$query = $this->db->query($this->querynya." LIMIT $awal, $panjang ");

		return $query->result_array();			
	}

	 function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }


	

	function delete_order(){
		$no_order = $this->input->post('no_order');
		$this->db->query("DELETE from gu_order where no_order = '$no_order' ");

		$this->db->query("DELETE from gu_order_detail where no_order = '$no_order' ");	
	}

	function delete_order_detail(){
		$no_order = $this->input->post('no_order');
		$nama     = $this->input->post('nama');
	
		$this->db->query("DELETE from gu_order_detail where no_order = '$no_order' AND nama= '$nama' ");	 
	}

	 function get_barang() {
        return $this->db->get('barang')->result_array();
    }

    function get_kategori_item(){
    	$query = $this->db->query("SELECT nama from kategori_item");
    	return 	$query->result_array();
    }

    function get_nama_barang(){
    	$filter=$this->input->post('term');
		$query = $this->db->query(" Select id ,nama text From barang where nama LIKE '$filter%'   " );
        return $query->result_array();
    }

    function get_satuan(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT a.nama,a.jenis,a.satuan,a.type,a.stock_limit,a.harga FROM v_tblharga a WHERE  a.id=$id_master ");
		return  $query->row();
	}

	function get_kepala_unit(){
		return $this->db->get('v_kepala_unit')->result_array();
	}

	function list_history_order($awal,$panjang,$srch =''){
		$add_where ="AND";

    	if($this->input->post('tgl_periode1')    != ' ')                      $add_where .= " date_format(gu_order.tgl,'%Y-%m-%d')>='".$this->input->post('tgl_periode1')."' AND ";

    	if($this->input->post('tgl_periode2')    != ' ')                      $add_where .= " date_format(gu_order.tgl,'%Y-%m-%d')<='".$this->input->post('tgl_periode2')."' AND "; 

    	if($this->input->post('select_status2')    != '')                      $add_where  .=" gu_order.status LIKE '%".$this->input->post('select_status2')."%' AND "; 

    	if($srch != '')                                         		      $add_where  .=" (gu_order_detail.nama LIKE '%$srch%') AND ";
    	
    	if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		$this->querynya = $this->list_history_order.$add_where;
    	$query = $this->db->query($this->querynya." ORDER BY gu_order.no_order DESC LIMIT $awal, $panjang ");

		return $query->result_array();		
	}

}




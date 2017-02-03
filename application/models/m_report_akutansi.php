<?php

class m_report_akutansi extends CI_Model {
    
	var $querynya		= " SELECT tgl_faktur_supplier,supplier,c.no_faktur,IFNULL(d.pembayaran,0) pembayaran,IFNULL(d.pembayaran*ppn/100,0) PPN,IFNULL(SUM(d.pembayaran+d.pembayaran*ppn/100),0) total,
							CASE WHEN c.isLunas='Lunas' THEN IFNULL(SUM(d.pembayaran+d.pembayaran*ppn/100),0) ELSE 0 END tunai,
							CASE WHEN c.isLunas = '' THEN IFNULL(SUM(d.pembayaran+d.pembayaran*ppn/100),0) ELSE 0 END kredit,no_faktur_supplier
							FROM gudang_terima c
							LEFT JOIN (SELECT jumlah*harga_beli pembayaran,no_faktur FROM gudang_terima_detail) d ON c.no_faktur=d.no_faktur ";
							
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
	
    function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataRekapanLPB($awal,$panjang,$srch = ''){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$add_where 	= " WHERE DATE_FORMAT(tgl_faktur_supplier,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(tgl_faktur_supplier,'%Y-%m-%d')<='".$tgl_akhir."' ";
		$search		= "AND";
		if ($srch!= '')
		$search	 .= " (supplier LIKE '%$srch%') AND";		
		if(strlen($search)==3) $search=" "; else $search=substr($search,0,strlen($search)-4);
		$this->querynya = $this->querynya.$add_where.$search."GROUP BY c.no_faktur";
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
	
	
};















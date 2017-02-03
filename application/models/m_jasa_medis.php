<?php

class m_jasa_medis extends CI_Model {
    
	var $querynya 		= " SELECT no_bayar_jasmed,dokter,CONCAT(tanggal,' ',jam) waktu,b.nilai,kode_akun,pembayaran,remark,c.nama 
							FROM bayar_jasa_medis_dokter a
							LEFT JOIN (
							SELECT SUM(fee)+SUM(feeRefferal) nilai,no_bayar_jasmed_pelaksana from faktur_detail d
							LEFT JOIN bayar_jasa_medis_dokter e ON d.no_bayar_jasmed_pelaksana=e.no_bayar_jasmed OR d.no_bayar_jasmed_refferal=e.no_bayar_jasmed 
							WHERE d.no_bayar_jasmed_pelaksana=e.no_bayar_jasmed OR d.no_bayar_jasmed_refferal=e.no_bayar_jasmed ) b ON a.no_bayar_jasmed=b.no_bayar_jasmed_pelaksana
							LEFT JOIN tkar_bio c ON a.id_user=c.id ";
	var $queryrincian	= " SELECT a.faktur,CONCAT('(',b.id,') ',b.pasien_tampil) pasien,keterangan,harga_satuan,total,harga_satuan*total subtotal,fee,feeRefferal,Tgl_BayarPelaksana,tgl_dilakukan_tindakan,poli,a.inap_jalan
							FROM faktur_detail a LEFT JOIN faktur b ON a.faktur=b.faktur
							LEFT JOIN bayar_jasa_medis_dokter c ON a.no_bayar_jasmed_pelaksana=c.no_bayar_jasmed OR a.no_bayar_jasmed_refferal=c.no_bayar_jasmed ";			
	var $queryrekapan	= "	SELECT a.nama,b.poli,IFNULL(c.jasa,0) jasa FROM tdok_bio a
							LEFT JOIN tdok_kepeg b ON a.id=b.id LEFT JOIN (SELECT a.id,SUM(CASE WHEN fee <= 100 THEN (harga_satuan*total)*(fee/100) ELSE fee END) jasa
							FROM tdok_bio a LEFT JOIN faktur_detail c ON a.nama=c.id_dokter  ";
	
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
	function DataPembayaran($awal,$panjang){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$kategori	= $this->input->post('caridokter');
		$add_where1 = " WHERE DATE_FORMAT(tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(tanggal,'%Y-%m-%d')<='".$tgl_akhir."' ";
		$add_where2	= " AND";
		if($kategori != '') 
				$add_where2 .= " (dokter LIKE '%".$kategori."%' )";
		else	$add_where2 = '';
		$this->querynya = $this->querynya.$add_where1.$add_where2;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataRincian($awal,$panjang){
		$nojasmed	=$this->input->post('no_jasmed');	
		$add_where = " WHERE a.no_bayar_jasmed_pelaksana='".$nojasmed."' OR a.no_bayar_jasmed_refferal='".$nojasmed."' ";
		$this->querynya = $this->queryrincian.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataRekapan($awal,$panjang,$srch = ''){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$pelaksana	= $this->input->post('pelaksana');
		$perawatan	= $this->input->post('perawatan');
		$penjamin	= $this->input->post('penjamin');	
		$add_where1	= " WHERE DATE_FORMAT(SUBSTR(c.tgl_dilakukan_tindakan,1,10),'%Y-%m-d') >= '".$tgl_awal."' AND 
						DATE_FORMAT(SUBSTR(c.tgl_dilakukan_tindakan,1,10),'%Y-%m-d')<= '".$tgl_akhir."' GROUP BY a.id ORDER BY a.nama) c ON a.id=c.id ";
		$add_where2 = "WHERE";
		if($srch !='')                                         
		$add_where2  .= " (a.nama LIKE '%$srch%') AND";
		if(strlen($add_where2)==5) $add_where2=" "; else $add_where2=substr($add_where2,0,strlen($add_where2)-4);
		$this->querynya = $this->queryrekapan.$add_where1.$add_where2." GROUP BY a.id ORDER BY a.nama";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
};















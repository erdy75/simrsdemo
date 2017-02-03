<?php

class m_bayar_hutang_cod extends CI_Model {
    
	var $querynya				= " SELECT a.no_faktur,PO,supplier,tgl_faktur_supplier,no_faktur_supplier,ppn,jatuh_tempo,IFNULL(SUM(b.total+b.total*ppn/100),0) total,
									kelompok_stock,materai,user_id,isLunas 
									FROM gudang_terima a
									LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) b ON a.no_faktur=b.no_faktur ";
	var $querydetailpembayaran	= " SELECT b.nama,harga_beli,jumlah,disc,CASE WHEN disc = 0 THEN (jumlah*harga_beli) ELSE (jumlah*harga_beli)*disc/100 END subtotal
									FROM gudang_terima_detail a	LEFT JOIN barang b ON a.id=b.id ";
	var $querylaporan			= " SELECT a.kode_bayar,a.supplier,CONCAT(tanggal,' ',jam) waktu,CONCAT(mode_bayar,'(',remark,')') pembayaran,untuk,ref_kode_akun,a.materai,faktur_pajak,
									(d.jumlah*d.harga_beli)+(d.jumlah*d.harga_beli)*c.ppn/100 Total,e.nama,b.no_faktur_lpb
									FROM pembayaran a LEFT JOIN pembayaran_detail b ON a.kode_bayar=b.kode_bayar LEFT JOIN gudang_terima c ON b.no_faktur_lpb=c.no_faktur
									LEFT JOIN gudang_terima_detail d ON c.no_faktur=d.no_faktur LEFT JOIN tkar_bio e ON a.user_id=e.id ";	
	var $queryrekap				= " SELECT a.nama,IFNULL(b.total,0) hutang FROM supplier a
									LEFT JOIN(SELECT supplier,IFNULL(SUM(d.total+d.total*ppn/100),0) total FROM gudang_terima c
									LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) d ON c.no_faktur=d.no_faktur";
	var $querydetailrekap		= " SELECT a.no_faktur,PO,supplier,tgl_faktur_supplier,no_faktur_supplier,ppn,jatuh_tempo,
									IFNULL(SUM(b.total+b.total*ppn/100),0) total,kelompok_stock,materai,user_id,isLunas 
									FROM gudang_terima a LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) b ON a.no_faktur=b.no_faktur";
									
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
		$supplier	= $this->input->post('supp');
		$tampil		= $this->input->post('tampil');
		if ( $this->input->post('tampil')=="semua")
				$this->querynya .=" WHERE jatuh_tempo != '0000-00-00' AND supplier LIKE '%".$supplier."%' AND
									DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')<='".$tgl_akhir."'
									GROUP BY a.no_faktur ORDER BY a.no_faktur ";
		else 	$this->querynya .=" WHERE jatuh_tempo != '0000-00-00' AND supplier LIKE '%".$supplier."%' AND isLunas = '".$tampil."' AND
									DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')<='".$tgl_akhir."'
									GROUP BY a.no_faktur ORDER BY a.no_faktur";			
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataDetailPembayaran($awal,$panjang){
		$nofak		= $this->input->post('nofak');
		$add_where	= "WHERE a.no_faktur='".$nofak."' ORDER BY nama";
		$this->querynya	= $this->querydetailpembayaran.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataPembayaran(){
		if ($this->input->post('tampil')=='semua')
			 return $this->PembayaranSemua();
		else return $this->PembayaranLunasDanBelum();
	}
	function PembayaranSemua() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$supplier	=$this->input->post('supp');	
		$query =$this->db->query("SELECT a.no_faktur,PO,supplier,tgl_faktur_supplier,no_faktur_supplier,ppn,jatuh_tempo,IFNULL(SUM(b.total+b.total*ppn/100),0) total,
									kelompok_stock,materai,user_id,isLunas 
									FROM gudang_terima a
									LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) b ON a.no_faktur=b.no_faktur
									WHERE jatuh_tempo != '0000-00-00' AND supplier LIKE '%".$supplier."%' AND
									DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')<='".$tgl_akhir."'
									GROUP BY a.no_faktur ORDER BY a.no_faktur  " );
        return 	$query->result_array();
    }
	function PembayaranLunasDanBelum() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$supplier	=$this->input->post('supp');
		$tampil		=$this->input->post('tampil');		
		$query =$this->db->query("SELECT a.no_faktur,PO,supplier,tgl_faktur_supplier,no_faktur_supplier,ppn,jatuh_tempo,IFNULL(SUM(b.total+b.total*ppn/100),0) total,
									kelompok_stock,materai,user_id,isLunas 
									FROM gudang_terima a
									LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) b ON a.no_faktur=b.no_faktur
									WHERE jatuh_tempo != '0000-00-00' AND supplier LIKE '%".$supplier."%' AND isLunas = '".$tampil."' AND
									DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')<='".$tgl_akhir."'
									GROUP BY a.no_faktur ORDER BY a.no_faktur  " );
        return 	$query->result_array();
    }
	function DataDetailPembayaran() {
		$nofak		=$this->input->post('nofak');		
		$query =$this->db->query("SELECT b.nama,harga_beli,jumlah,disc,CASE WHEN disc = 0 THEN (jumlah*harga_beli) ELSE (jumlah*harga_beli)*disc/100 END subtotal
									FROM gudang_terima_detail a	LEFT JOIN barang b ON a.id=b.id
									WHERE a.no_faktur='".$nofak."' ORDER BY nama  " );
        return 	$query->result_array();
    }*/
	
	function Bayar(){ 
		$query = $this->db->query("UPDATE gudang_terima set isLunas = 'LUNAS', tgl_lunas = '".$this->tgl_skrg()."' where no_faktur = '".$this->input->post('nolpb')."' ");
		$query = $this->db->query("UPDATE purchasing_sp_final set faktur_pajak = '".$this->input->post('fakturpajak')."' where no_sp_final = '".$this->input->post('nospfinal')."' ");
		
		$maxi_p = $this->maxi('kode_bayar','pembayaran')+1;	
		$this->db->query(" insert into pembayaran values  ($maxi_p,'".$this->input->post('supplier')."','".$this->tgl_skrg()."','".$this->jam_skrg()."','2001',
							'".$this->input->post('bayar')."','".$this->input->post('kodeakun')."','".$this->input->post('materai')."','".$this->input->post('remark')."',
							'".$this->input->post('fakturpajak')."','".$this->input->post('untuk')."','','','','','','') ");
		
		$this->db->query(" insert into pembayaran_detail values  ($maxi_p,'".$this->input->post('nolpb')."','','','','','') ");
		
		return $maxi_p;				
	}
	function DataLaporanPembayaran($awal,$panjang){
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$supplier	=$this->input->post('supp');
		$add_where	= " WHERE a.supplier LIKE '%".$supplier."%' AND 
						DATE_FORMAT(a.tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(a.tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
						GROUP BY a.kode_bayar";
		$this->querynya	= $this->querylaporan.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataLaporanPembayaran() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$supplier	=$this->input->post('supp');	
		$query =$this->db->query("SELECT a.kode_bayar,a.supplier,tanggal,jam,mode_bayar,remark,untuk,ref_kode_akun,a.materai,faktur_pajak,
									(d.jumlah*d.harga_beli)+(d.jumlah*d.harga_beli)*c.ppn/100 Total,e.nama,b.no_faktur_lpb
									FROM pembayaran a
									LEFT JOIN pembayaran_detail b ON a.kode_bayar=b.kode_bayar
									LEFT JOIN gudang_terima c ON b.no_faktur_lpb=c.no_faktur
									LEFT JOIN gudang_terima_detail d ON c.no_faktur=d.no_faktur
									LEFT JOIN tkar_bio e ON a.user_id=e.id 
									WHERE a.supplier LIKE '%".$supplier."%' AND 
									DATE_FORMAT(a.tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(a.tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
									GROUP BY a.kode_bayar " );
        return 	$query->result_array();
    }*/
	
	function BatalPembayaran(){
		$kodebayar	= $this->input->post('kode_bayar');
		$nofaktur	= $this->input->post('no_faktur');
		
			$dt_p = array();
			$this->db->WHERE('kode_bayar',$kodebayar);			
			$this->db->Delete('pembayaran',$dt_p);		
			
			$dt_pd = array();
			$this->db->WHERE('kode_bayar',$kodebayar);			
			$this->db->Delete('pembayaran_detail',$dt_pd);	
	
		$query = $this->db->query("UPDATE gudang_terima set isLunas = '', tgl_lunas = '0000-00-00' where no_faktur ='$nofaktur' ");
		
		return $this->db->trans_status();
	}
	function DataRekapan($awal,$panjang){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$add_where	= " WHERE jatuh_tempo != '0000-00-00' AND isLunas = '' AND
						DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')<='".$tgl_akhir."'
						GROUP BY supplier ORDER BY supplier) b ON a.nama=b.supplier";
		$this->querynya	= $this->queryrekap.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataDetailRekapan($awal,$panjang){
		$supplier	=$this->input->post('nama');
		$add_where	= " WHERE jatuh_tempo != '0000-00-00' AND supplier = '".$supplier."' AND isLunas = '' GROUP BY a.no_faktur";
		$this->querynya	= $this->querydetailrekap.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataRekapan() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$query =$this->db->query("SELECT a.nama,IFNULL(b.total,0) hutang FROM supplier a
									LEFT JOIN(SELECT supplier,IFNULL(SUM(d.total+d.total*ppn/100),0) total FROM gudang_terima c
									LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) d ON c.no_faktur=d.no_faktur
									WHERE jatuh_tempo != '0000-00-00' AND isLunas = '' AND
									DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(jatuh_tempo,'%Y-%m-%d')<='".$tgl_akhir."'
									GROUP BY supplier ORDER BY supplier) b ON a.nama=b.supplier" );
									
        return 	$query->result_array();
    }
	function DataDetailRekapan() {
		$supplier	=$this->input->post('nama');
		$query =$this->db->query("SELECT a.no_faktur,PO,supplier,tgl_faktur_supplier,no_faktur_supplier,ppn,jatuh_tempo,
									IFNULL(SUM(b.total+b.total*ppn/100),0) total,kelompok_stock,materai,user_id,isLunas 
									FROM gudang_terima a
									LEFT JOIN (SELECT jumlah*harga_beli total,no_faktur FROM gudang_terima_detail) b ON a.no_faktur=b.no_faktur
									WHERE jatuh_tempo != '0000-00-00' AND supplier = '".$supplier."' AND isLunas = '' GROUP BY a.no_faktur" );
									
        return 	$query->result_array();
    }*/
};















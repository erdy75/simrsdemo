<?php

class m_pendapatan_rs extends CI_Model {
    
	var $querynya					= " SELECT a.faktur,CONCAT(b.pasien_tampil,' (',b.id,')') pasien,CONCAT(b.bayar_1,'; ',b.bayar_2,';') bayar,
										CONCAT(b.tanggal,' ',b.jam) waktu,a.keterangan,a.harga_satuan,a.total,a.harga_satuan*a.total subtotal,
										b.disc,a.gratis,a.poli,a.id_dokter,a.tgl_dilakukan_tindakan,a.fee,a.dokterRefferal,a.feeRefferal,
										b.KelompokBeli,b.Penjamin,c.nama FROM faktur_detail a 
										LEFT JOIN faktur b ON a.faktur=b.faktur LEFT JOIN tkar_bio c ON b.nama_kasir=c.id";
	var $querypendapatanpenjamin	= " SELECT id,pasien_tampil,alamat_tampil,faktur invoice1,faktur invoice2,Penjamin,
										CONCAT(CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',2),'#',-1) ELSE 0 END  ,' - ',
										CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',2),'#',-1) ELSE 0 END ) credit ,
										CONCAT(tanggal,'/',jam) waktu FROM faktur ";
	var $querypendapatanpenjamin2	= " SELECT id,alamat_tampil,faktur invoice1,faktur invoice2,
										CONCAT(CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',2),'#',-1) ELSE 0 END  ,' - ',
										CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',2),'#',-1) ELSE 0 END ) credit
										FROM faktur ";		
	var $querynyapendapatanapotek	= " SELECT a.no_faktur,CONCAT(b.pasien_tampil,' (',b.cib,')') pasien,CONCAT(b.tanggal,' / ',b.jam) waktu,nama_barang,harga,kuantitas,harga*kuantitas subtotal,
										tanggal_jam_diberikan_obatnya,b.dokter,b.inap_jalan,b.KelompokBeli,b.penjamin,IFNULL(c.nama,'-') nama,a.status
										FROM faktur_apotik_detail a
										LEFT JOIN faktur_apotik b ON a.no_faktur=b.no_faktur
										LEFT JOIN tkar_bio c ON b.nama_kasir=c.id ";
	var $querytransaksiretur		= " SELECT a.no_retur,a.Item,a.harga_kembali,a.kuantitas,a.harga_kembali*a.kuantitas total,b.tgl,b.jam,b.type_transaksi,a.referensi_kwitansi,CONCAT(b.id_kasir,'/',c.nama) petugas
										FROM faktur_retur_detail a LEFT JOIN faktur_retur b ON a.no_retur=b.no_retur LEFT JOIN tkar_bio c ON b.id_kasir=c.id ";									
										
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
	
	//PendapatanPoli	
	function DataPendapatanPoli($awal,$panjang){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$jenis		= $this->input->post('jenis');
		$poli		= $this->input->post('poli');
		$bayar		= $this->input->post('bayar');
		$sort		= $this->input->post('sort');
		$kategori	= $this->input->post('carinama');
		$add_where1	= " WHERE DATE_FORMAT(b.tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(b.tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
						AND b.KelompokBeli LIKE '%".$jenis."%' AND a.poli LIKE '%".$poli."%' AND b.bayar_1 LIKE '%".$bayar."%' ";
		$add_where2	= " AND";
		if($kategori != '') 
				$add_where2 .= " (b.pasien_tampil LIKE '%".$kategori."%' or a.faktur LIKE '%".$kategori."%')";
		else	$add_where2 = '';	
		$this->querynya = $this->querynya.$add_where1.$add_where2." ORDER BY a.faktur $sort";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
	/*function DataPendapatanPoli() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$jenis		=$this->input->post('jenis');
		$poli		=$this->input->post('poli');
		$bayar		=$this->input->post('bayar');
		$sort		=$this->input->post('sort');
		$kategori	=$this->input->post('carinama');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (b.pasien_tampil LIKE '%".$kategori."%' or a.faktur LIKE '%".$kategori."%')";
		else	$add_where = '';		
		$query =$this->db->query("SELECT a.faktur,b.pasien_tampil,b.id,b.bayar_1,b.bayar_2,b.tanggal,b.jam,a.keterangan,
									a.harga_satuan,a.total,a.harga_satuan*a.total subtotal,b.disc,a.gratis,a.poli,a.id_dokter,
									a.tgl_dilakukan_tindakan,a.fee,a.dokterRefferal,a.feeRefferal,b.KelompokBeli,b.Penjamin,c.nama
									FROM faktur_detail a
									LEFT JOIN faktur b ON a.faktur=b.faktur
									LEFT JOIN tkar_bio c ON b.nama_kasir=c.id
									WHERE DATE_FORMAT(b.tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(b.tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
									AND b.KelompokBeli LIKE '%".$jenis."%' AND a.poli LIKE '%".$poli."%' AND b.bayar_1 LIKE '%".$bayar."%' $add_where 
									ORDER BY a.faktur $sort " );
        return 	$query->result_array();
    }*/
	function BatalTransaksiP(){
		$nofaktur  = $this->input->post('no_faktur');	
			$query = $this->db->query("UPDATE faktur_detail SET total='0', id_dokter=concat(id_dokter,'-batal'), fee='0' WHERE faktur='$nofaktur' ");
			$query = $this->db->query("UPDATE faktur SET no_reg_by_poli = concat('batal-', no_reg_by_poli,'-', faktur), pasien_tampil = concat(pasien_tampil,'-batal'),  id=concat(id, '-batal') WHERE faktur='$nofaktur' ");
			
			$dt_fpa = array();
			$this->db->WHERE('no_faktur',$nofaktur);			
			$this->db->Delete('faktur_program_angsuran ',$dt_fpa);		
	
		return $this->db->trans_status();
	}
	function KoreksiFeeP(){
		if ($this->input->post('koreksi')=="Pelaksana")
				return $this->KoreksiFee();
		else 	return $this->KoreksiFeeRefferal();
		
	}
	function KoreksiFee(){
		$nofaktur 	= $this->input->post('no_faktur');
		$dokter  	= $this->input->post('dokter');
		$fee		= $this->input->post('fee');
		$ket  		= $this->input->post('ket');
		$harga  	= $this->input->post('harga');
		$poli  		= $this->input->post('poli');
		$waktu 		= $this->input->post('waktu');
		$penjamin 	= $this->input->post('penjamin');
		$query		= $this->db->query("UPDATE faktur_detail set fee = '$fee', id_dokter = '$dokter' 
									WHERE faktur ='$nofaktur' AND keterangan ='$ket' AND harga_satuan ='$harga' AND 
									poli ='$poli' AND tgl_dilakukan_tindakan ='$waktu' ");
		 
		$query = $this->db->query("UPDATE faktur set penjamin = '$penjamin' where faktur = '$nofaktur' ");
		
		return ;
	}
	function KoreksiFeeRefferal(){
		$nofaktur 	= $this->input->post('no_faktur');
		$dokter  	= $this->input->post('dokter');
		$feeR		= $this->input->post('fee');
		$ket  		= $this->input->post('ket');
		$harga  	= $this->input->post('harga');
		$poli  		= $this->input->post('poli');
		$waktu 		= $this->input->post('waktu');
		$penjamin 	= $this->input->post('penjamin');
		$query		= $this->db->query("UPDATE faktur_detail set feeRefferal = '$feeR', dokterRefferal = '$dokter' 
									WHERE faktur ='$nofaktur' AND keterangan ='$ket' AND harga_satuan ='$harga' AND 
									poli ='$poli' AND tgl_dilakukan_tindakan ='$waktu' ");
		 
		$query = $this->db->query("UPDATE faktur set penjamin = '$penjamin' where faktur = '$nofaktur' ");
		
		return ;
	}
	function HapusPoli(){
		$faktur  = $this->input->post('faktur');
		$ket 	 = $this->input->post('ket');
		$harga 	 = $this->input->post('harga');
		$qty 	 = $this->input->post('qty');
		$dokter  = $this->input->post('dokter');
		$tgl	 = $this->input->post('tgl');
		$poli  	 = $this->input->post('poli');
		
			$dt_fd = array();
			$this->db->WHERE('faktur',$faktur);
			$this->db->WHERE('keterangan',$ket);			
			$this->db->WHERE('harga_satuan',$harga);	
			$this->db->WHERE('total',$qty);			
			$this->db->WHERE('id_dokter',$dokter);			
			$this->db->WHERE('tgl_dilakukan_tindakan',$tgl);		
			$this->db->WHERE('poli',$poli);			
			$this->db->Delete('faktur_detail',$dt_fd);
			
		return $this->db->trans_status();
	}
	//PendapatanApotek
	function DataPendapatanApotek($awal,$panjang){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');
		$jenis		= $this->input->post('jenis');
		$penjamin	= $this->input->post('penjamin');
		$sort		= $this->input->post('sort');
		$kategori	= $this->input->post('carinama');
		$add_where1	= " WHERE DATE_FORMAT(b.tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(b.tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
						AND b.isdinas LIKE '%".$jenis."%' AND b.penjamin LIKE '%".$penjamin."%' ";
		$add_where2	= " AND";
		if($kategori != '') 
				$add_where2 .= " (pasien_tampil LIKE '%".$kategori."%' )";
		else	$add_where2 = '';	
		$this->querynya = $this->querynyapendapatanapotek.$add_where1.$add_where2." ORDER BY a.no_faktur $sort";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataPendapatanApotek() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$jenis		=$this->input->post('jenis');
		$penjamin	=$this->input->post('penjamin');
		$sort		=$this->input->post('sort');
		$kategori	=$this->input->post('carinama');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (pasien_tampil LIKE '%".$kategori."%' )";
		else	$add_where = '';		
		$query =$this->db->query("SELECT a.no_faktur,b.pasien_tampil,b.cib,b.tanggal,b.jam,nama_barang,harga,kuantitas,harga*kuantitas subtotal,
									tanggal_jam_diberikan_obatnya,b.dokter,b.inap_jalan,b.KelompokBeli,b.penjamin,IFNULL(c.nama,'-') nama,a.status
									FROM faktur_apotik_detail a
									LEFT JOIN faktur_apotik b ON a.no_faktur=b.no_faktur
									LEFT JOIN tkar_bio c ON b.nama_kasir=c.id
									WHERE DATE_FORMAT(b.tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(b.tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
									AND b.isdinas LIKE '%".$jenis."%' AND b.penjamin LIKE '%".$penjamin."%' $add_where ORDER BY a.no_faktur $sort " );
        return 	$query->result_array();
    }*/
	function BatalTransaksiA(){
		$nofaktur  = $this->input->post('no_faktur');
		$query = $this->db->query("UPDATE faktur_apotik_detail SET status='BATAL', kuantitas ='0', harga='0', nama_barang = concat('BATAL_',nama_barang) WHERE no_faktur='$nofaktur' ");
		$query = $this->db->query("UPDATE faktur_apotik SET dokter='BATAL', pasien_tampil =concat(pasien_tampil,'_Batal'), nama_kasir=concat(nama_kasir,'_Batal'), cib=concat(cib,'_Batal') WHERE no_faktur='$nofaktur' ");
		
		return ;
	}
	function HapusApotek(){
		$nofaktur  = $this->input->post('no_faktur');
		$tgl  = $this->input->post('tgl');
		$barang  = $this->input->post('barang');
		$harga  = $this->input->post('harga');
		$qty  = $this->input->post('qty');
		
			$dt_frd = array();
			$this->db->WHERE('no_faktur',$nofaktur);
			$this->db->WHERE('tanggal_jam_diberikan_obatnya',$tgl);			
			$this->db->WHERE('nama_barang',$barang);	
			$this->db->WHERE('harga',$harga);			
			$this->db->WHERE('kuantitas',$qty);		
			$this->db->Delete('faktur_apotik_detail',$dt_frd);
			
		return $this->db->trans_status();
	}
	//PendapatanPenjamin
	function DataPendapatanPenjamin($awal,$panjang){
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$penjamin	=$this->input->post('penjamin');
		$sort		=$this->input->post('tampil');
		$kategori	=$this->input->post('norm_nama');
		$add_where1	= " WHERE Penjamin !='-' 
						AND DATE_FORMAT(tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
						AND Penjamin LIKE '%".$penjamin."%' ";
		$add_where2	= " AND";
		if($kategori != '') 
				$add_where2 .= " (id LIKE '%".$kategori."%' OR pasien_tampil LIKE '%".$kategori."%' )";
		else	$add_where2 = '';
		$this->querynya = $this->querypendapatanpenjamin.$add_where1.$add_where2;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataPendapatanPenjamin2($awal,$panjang){
		$norm	=$this->input->post('norm');	
		$faktur	=$this->input->post('faktur');
		$add_where	= " WHERE id ='".$norm."' AND faktur ='".$faktur."' ";
		$this->querynya = $this->querypendapatanpenjamin2.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataPendapatanPenjamin() {
		$tgl_awal	=$this->input->post('tgl_awal');
		$tgl_akhir	=$this->input->post('tgl_akhir');
		$penjamin	=$this->input->post('penjamin');
		$sort		=$this->input->post('tampil');
		$kategori	=$this->input->post('norm_nama');
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (id LIKE '%".$kategori."%' OR pasien_tampil LIKE '%".$kategori."%' )";
		else	$add_where = '';		
		$query =$this->db->query("SELECT id,pasien_tampil,alamat_tampil,faktur invoice1,faktur invoice2,Penjamin,
									CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',2),'#',-1) ELSE 0 END credit1 ,
									CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',2),'#',-1) ELSE 0 END credit2 ,
									tanggal,jam
									FROM `faktur` WHERE Penjamin !='-' 
									AND DATE_FORMAT(tanggal,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(tanggal,'%Y-%m-%d')<='".$tgl_akhir."'
									AND Penjamin LIKE '%".$penjamin."%'  $add_where  " );
        return 	$query->result_array();
    }
	function DataPendapatanPenjamin2() {
		$norm	=$this->input->post('norm');	
		$faktur	=$this->input->post('faktur');		
		$query =$this->db->query("SELECT id,alamat_tampil,faktur invoice1,faktur invoice2,
									CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_1,'#',2),'#',-1) ELSE 0 END credit1 ,
									CASE WHEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',1),'#',-1) ='Credit' THEN SUBSTRING_INDEX(SUBSTRING_INDEX(bayar_2,'#',2),'#',-1) ELSE 0 END credit2
									FROM faktur WHERE id ='".$norm."' AND faktur ='".$faktur."'  " );
        return 	$query->result_array();
    }*/
	function PostingPelunasanPenjamin(){ 
		$maxi_pp = $this->maxi('kode_pelunasan_penjamin','pelunasan_penjamin')+1;	
		$this->db->query(" insert into pelunasan_penjamin values  ($maxi_pp,'".$this->input->post('penjamin')."','".$this->tgl_skrg()."',
							'".$this->jam_skrg()."','2001','".$this->input->post('pembayaran')."','".$this->input->post('kodeakun')."',
							'".$this->input->post('remark')."','','','','','','','','') ");	
						
		return $maxi_pp;				
	}
	
	//TransaksiRetur

	function DataTransaksiRetur($awal,$panjang){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');	
		$add_where	= " WHERE DATE_FORMAT(b.tgl,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(b.tgl,'%Y-%m-%d')<='".$tgl_akhir."' ";
		$this->querynya = $this->querytransaksiretur.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	/*function DataTransaksiRetur() {
		$tgl_awal=$this->input->post('tgl_awal');
		$tgl_akhir=$this->input->post('tgl_akhir');		
		$query =$this->db->query(" SELECT a.no_retur,a.Item,a.harga_kembali,a.kuantitas,a.harga_kembali*a.kuantitas total,b.tgl,b.jam,b.type_transaksi,a.referensi_kwitansi,b.id_kasir,c.nama
									FROM faktur_retur_detail a
									LEFT JOIN faktur_retur b ON a.no_retur=b.no_retur
									LEFT JOIN tkar_bio c ON b.id_kasir=c.id
									WHERE DATE_FORMAT(b.tgl,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(b.tgl,'%Y-%m-%d')<='".$tgl_akhir."' " );
        return 	$query->result_array();
    }*/
	function BatalRetur(){
		$noretur  = $this->input->post('no_retur');
		
			$dt_frd = array();
			$this->db->WHERE('no_retur',$noretur);			
			$this->db->Delete('faktur_retur_detail',$dt_frd);		
	
		$query = $this->db->query("UPDATE faktur_retur SET id_kasir= concat(id_kasir,'_'), uraian = 'BATAL' WHERE no_retur='$noretur' ");
		
		return $this->db->trans_status();
	}
	
};















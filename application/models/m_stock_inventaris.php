<?php

class m_stock_inventaris extends CI_Model {
    
	var $querynya				= " SELECT e.id,a.nama_barang,(IFNULL(d.jumlahstock,0)+IFNULL(c.j_masuk,0))-IFNULL(
									b.j_keluar,0) jumlah,IFNULL(d.harga_terima,0) harga_terima,
									((IFNULL(d.jumlahstock,0)+IFNULL(c.j_masuk,0))-IFNULL(b.j_keluar,0))*IFNULL(d.harga_terima,0) sub,e.satuan,e.kategori_item type,e.jenis,e.generik,e.principal 
									FROM stock_transaksi_log a
									LEFT JOIN (	SELECT nama_barang,SUM(jumlah) j_keluar FROM stock_transaksi_log WHERE poli = 'Fisioterapi' AND transaksi = 'Keluar / Pakai' GROUP BY nama_barang) b ON a.nama_barang=b.nama_barang
									LEFT JOIN (SELECT nama_barang,SUM(jumlah) j_masuk FROM stock_transaksi_log WHERE poli = 'Fisioterapi' AND transaksi = 'Masuk / Retur' GROUP BY nama_barang) c ON a.nama_barang=c.nama_barang
									LEFT JOIN (	SELECT b.nama_barang,a.poli,b.harga_terima,SUM(b.jumlah_terima) jumlahstock 
									FROM stock_poli a 
									LEFT JOIN stock_poli_detail b ON a.no_kirim=b.no_kirim 
									WHERE a.poli='fisioterapi' GROUP BY b.nama_barang) d ON a.poli=d.poli AND a.nama_barang=d.nama_barang
									LEFT JOIN barang e ON a.nama_barang=e.nama WHERE a.poli = 'fisioterapi' ";
	var $querybarangditerima	= " SELECT nama_barang,harga_terima,jumlah_terima,satuan,batch,expired FROM stock_poli_detail";
	var $querystockmasuk		= " SELECT expired,jumlah_terima,satuan,batch,CONCAT('IN-',no_kirim) no FROM stock_poli_detail ";
	var $querystockkeluar		= " SELECT a.tgl,a.jumlah,b.satuan,a.batch_mutasi,CONCAT('TR OUT-',a.id) id FROM stock_transaksi_log a LEFT JOIN barang b ON a.nama_barang=b.nama
									WHERE a.poli='Fisioterapi' ";
	var $queryhistorytransaksi	= " SELECT a.transaksi,a.nama_barang,a.jumlah,b.satuan,a.remark,a.batch_mutasi,a.tgl,a.jam,c.nama,a.id FROM stock_transaksi_log a
									LEFT JOIN barang b ON a.nama_barang=b.nama LEFT JOIN tkar_bio c ON a.user_id=c.id
									WHERE a.poli='Fisioterapi' ";						
	var $queryhistorypenerimaan	= " SELECT a.no_kirim,a.tgl,a.catatan,b.nama pengirim,c.nama penerima FROM `stock_poli` a
									LEFT JOIN tkar_bio b ON a.pengirim=b.id LEFT JOIN tkar_bio c ON a.id_user=c.id
									WHERE a.poli='Fisioterapi' ";
	var $querydetailpenerimaan	= " SELECT nama_barang,harga_terima,jumlah_terima,satuan,batch FROM stock_poli_detail ";
	
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
	function auotonumber(){
		$query = $this->db->query (" SELECT SUBSTR(no_faktur_supplier,1,2)+1 nofak FROM gudang_terima a WHERE a.no_faktur=(SELECT MAX(no_faktur) FROM gudang_terima) ");
		$hasil = $query->row();
		return $hasil->nofak;
	}
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataStockUnit($awal,$panjang){
		$kategori=$this->input->post('nama');			
		$add_where= "AND";
		if($kategori != '') 
				$add_where .= " (a.nama_barang LIKE '%".$kategori."%') ";
		else	$add_where = '';	
		$this->querynya = $this->querynya.$add_where." GROUP BY a.nama_barang";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataBarangDiterima($awal,$panjang){
		$nokirim	= $this->input->post('nokirim');		
		$add_where 	= " WHERE no_kirim='$nokirim' ";
		$this->querynya = $this->querybarangditerima.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataStockMasuk($awal,$panjang){
		$nama	= $this->input->post('nama');		
		$add_where 	= " WHERE nama_barang='$nama' ";
		$this->querynya = $this->querystockmasuk.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataStockKeluar($awal,$panjang){
		$nama	= $this->input->post('nama');		
		$add_where 	= " AND a.nama_barang='$nama' ";
		$this->querynya = $this->querystockkeluar.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataHistoryTransaksi($awal,$panjang){
		$kategori	= $this->input->post('nama');
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');	
		$add_where1 = " AND DATE_FORMAT(a.tgl,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(a.tgl,'%Y-%m-%d')<='".$tgl_akhir."' ";
		$add_where2	= " AND";
		if($kategori != '') 
				$add_where2 .= " (nama_barang LIKE '%".$kategori."%' )";
		else	$add_where2 = '';	
		$this->querynya = $this->queryhistorytransaksi.$add_where1.$add_where2." ORDER BY a.id";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataHistoryPenerimaan($awal,$panjang){
		$tgl_awal	= $this->input->post('tgl_awal');
		$tgl_akhir	= $this->input->post('tgl_akhir');	
		$add_where1 = " AND DATE_FORMAT(a.tgl,'%Y-%m-%d')>='".$tgl_awal."' AND DATE_FORMAT(a.tgl,'%Y-%m-%d')<='".$tgl_akhir."' ";
			
		$this->querynya = $this->queryhistorypenerimaan.$add_where1." ORDER BY a.no_kirim";
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataDetailPenerimaan($awal,$panjang){
		$nokirim	= $this->input->post('nokirim');
		$add_where 	= " WHERE no_kirim='$nokirim' ";
		$this->querynya = $this->querydetailpenerimaan.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function Posting(){
		$this->db->trans_begin();
		$maxi = $this->maxi('id','stock_transaksi_log')+1;
		$this->db->query(" insert into stock_transaksi_log values  ($maxi,'Fisioterapi','".$this->input->post('transaksi')."','".$this->input->post('item')."',
							'".$this->input->post('jumlah')."','0','".$this->input->post('ket')."','2001','".$this->tgl_skrg()."','".$this->jam_skrg()."') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('id','stock_transaksi_log'); 
		}	
	}
	function Mutasikan(){
		$this->db->trans_begin();
		$maxistl = $this->maxi('id','stock_transaksi_log')+1;
		$maxigt = $this->maxi('no_faktur','gudang_terima')+1;		
		$nofak_sup = $this->auotonumber();
		$this->db->query(" insert into stock_transaksi_log values  ($maxistl,'Fisioterapi','Keluar / Pakai','".$this->input->post('item')."','".$this->input->post('jumlah')."',
							'4001','DIMUTASI KE GUDANG (PELAYANAN) : ".$this->input->post('mutasi')."','2001','".$this->tgl_skrg()."','".$this->jam_skrg()."') ");	
					
		$this->db->query(" insert into gudang_terima values  ($maxigt,'MUTASI DARI Fisioterapi    [remark : POLI FISIOTHERAPY]','$nofak_sup;','".$this->tgl_skrg()."',
							'0','".$this->input->post('mutasi')."','0','MUTASI DARI Fisioterapi    [remark : POLI FISIOTHERAPY]','0000-00-00','Lunas',
							'".$this->tgl_skrg()."','".$this->tgl_skrg()."','2001','Tidak','0','".$this->jam_skrg()."','') ");	
							
		$this->db->query(" insert into gudang_terima_detail values  ($maxigt,'".$this->input->post('kode')."','".$this->input->post('jumlah')."','0','0000-00-00','','0') ");	
		
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('id','stock_transaksi_log'); 
		}	
	}
	
	function Terima(){
		$this->db->trans_begin();
		$maxi = $this->maxi('no_kirim','stock_poli')+1;
		$this->db->query(" insert into stock_poli values  ($maxi,'".$this->input->post('idpetugas')."','Fisioterapi','".$this->input->post('tglkirim')."','".$this->jam_skrg()."',
							'".$this->input->post('catatan')."','2001','".$this->input->post('nokirim')."','','','') ");	
					
		$this->db->query(" insert into stock_poli_detail values  ($maxi,'".$this->input->post('barang')."','".$this->input->post('harga')."','".$this->input->post('jumlah')."',
							'".$this->input->post('satuan')."','".$this->input->post('nobatch')."','".$this->input->post('expired')."','','') ");	
							
		$this->db->query(" UPDATE gudang_kirim set status = 'SUDAH DITERIMA' WHERE no_kirim='".$this->input->post('nokirim')."' ");	
							
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('no_kirim','stock_poli'); 
		}	
	}
		
	
	function get_stockmasuk(){
		$nama=$this->input->post('nama');
		$query = $this->db->query ("SELECT SUM(jumlah_terima) stockmasuk FROM stock_poli_detail WHERE nama_barang='$nama' ");
		return  $query->row();
	}
	function get_stockkeluar(){
		$nama=$this->input->post('nama');
		$query = $this->db->query ("SELECT SUM(jumlah) stockkeluar FROM stock_transaksi_log WHERE poli='Fisioterapi' AND nama_barang='$nama' ");
		return  $query->row();
	}
	
	
	function HapusTransaksi(){
		$id  = $this->input->post('id');
		
			$dt_stl = array(	);
			$this->db->WHERE('id',$id);
			$this->db->Delete('stock_transaksi_log',$dt_stl);			
			
		return $this->db->trans_status();
	}
	
	function HapusPenerimaan(){
		$nokirim  = $this->input->post('nokirim');
		
			$dt_sp = array();
			$this->db->WHERE('no_kirim',$nokirim);
			$this->db->Delete('stock_poli',$dt_sp);	

			$dt_spd = array();
			$this->db->WHERE('no_kirim',$nokirim);
			$this->db->Delete('stock_poli_detail',$dt_spd);	
			
		return $this->db->trans_status();
	}
	
	
};

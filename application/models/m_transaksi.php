<?php

class m_transaksi extends CI_Model {
    
	var $querynya			= " SELECT nama_barang,harga-(harga*disc/100) harga,kuantitas,harga * kuantitas jumlah ,CONCAT(disc,' %') diskon 
								FROM faktur_apotik_prebayar WHERE nama_barang !='EMBALASE' ";
	var $querylayanan		= " SELECT poli,cib_pasien,nama,sex,YEAR(CURDATE()) - YEAR(tgl_lahir) AS umur,nama_dokter,tgl_rm,no_upf,inap_jalan 
								FROM v_medical WHERE 1=1 ";
	
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
	private function maxi($fld,$tbl){
		$query = $this->db->query (" SELECT MAX($fld) maxi FROM $tbl ");
		$hsl = $query->row();
		return $hsl->maxi;
	}
	function aoutonumber(){			
		$query = $this->db->query(" SELECT SUBSTR(cib,3) cib FROM faktur_apotik_prebayar a WHERE a.no_resep_transaksi_apotik =(
									SELECT MAX(no_resep_transaksi_apotik) FROM faktur_apotik_prebayar  WHERE cib LIKE 'HV%' AND LENGTH(cib) > 4)");
		$hasil = $query->row();
		return $hasil->cib+1;
	}	
	function get_nama_dokter() {
		$query = $this->db->query("SELECT nama FROM tdok_bio ");
		return $query->result_array();
    }
	function get_perawatan1() {
		$query = $this->db->query("	SELECT header_name_billing nama FROM poli
									WHERE header_name_billing = 'RAWAT JALAN' OR 
									header_name_billing = 'RAWAT INAP' OR 
									header_name_billing = 'UGD/IGD' 
									GROUP BY header_name_billing ");
		return $query->result_array();
    }
	function get_perawatan2($header) {
		$query = $this->db->query("SELECT * FROM (SELECT CASE WHEN header_name_billing <> 'RAWAT JALAN' THEN 'RAWAT JALAN' ELSE header_name_billing END header,nama
									FROM poli WHERE header_name_billing = 'RAWAT JALAN' OR atribut_obyek = 'Penunjang Medis' OR atribut_obyek = 'poli'
									UNION
									SELECT b.header_name_billing,a.nama	FROM kamar a LEFT JOIN poli b ON a.nurse_station=b.nama
									WHERE header_name_billing = 'RAWAT INAP' AND atribut_obyek = 'Nurse Station'
									UNION
									SELECT header_name_billing,nama FROM poli WHERE header_name_billing = 'UGD/IGD') a WHERE a.header = '".$header."' ORDER BY a.nama ");
		return $query->result_array();
    }
	function cari_namabarang() {
		$filter=$this->input->post('term');
		$query = $this->db->query(" Select id ,nama text From barang where (kategori_item=('Obat (Medis)')or kategori_item=('Alat Medis')) AND nama LIKE '$filter%'   " );
        return $query->result_array();
    }
	function get_satuan(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT a.nama,a.jenis,a.satuan,a.type,a.stock_limit,a.harga FROM v_tblharga a WHERE  a.id=$id_master ");
		return  $query->row();
	}
	function get_stockrajal(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT a.nama,a.jumlah FROM stock_rajal a WHERE  a.nama='$id_master' ");
		return  $query->row();
	}
	function get_stockranap(){
		$id_master=$this->input->post('id_master');
		$query = $this->db->query ("SELECT a.nama,a.jumlah FROM stock_ranap a WHERE  a.nama='$id_master' ");
		return  $query->row();
	}	
	function carinoreg() {
		$query = $this->db->query("Select cib_pasien,nama FROM v_medical 
								   WHERE no_upf='".$this->input->post('n_reg')."'");
		return $query->result_array();
    }
	function carinama() {
		$query = $this->db->query("Select nama namaP FROM pasien_pribadi 
								   WHERE id='".$this->input->post('n_rm')."'");
		return $query->result_array();
    }
	
	function simpan(){
		if 		($this->input->post('combo_perawatan1') == 'BELI BEBAS')
				return $this->simpan1();
		else 	return $this->simpan2();		
	}	
	function simpan1(){
		$this->db->trans_begin();
		$maxi = $this->maxi('no_resep_transaksi_apotik','faktur_apotik_prebayar')+1;
		$this->db->query(" insert into faktur_apotik_prebayar values  ('','".$this->input->post('norm')."','".$this->input->post('combo_barang')."','".$this->input->post('harga')."',
						'".$this->input->post('qty')."','1','".$this->input->post('nama')."','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('combo_dokter')."',
						'".$this->input->post('combo_perawatan1')."','no','".$this->input->post('combo_pembayaran2')."','".$this->input->post('combo_jenispx')."',
						'".$this->input->post('combo_pembayaran1')."','".$this->input->post('diskon')."','2001','".$this->input->post('upf')."','','','".$this->input->post('remark')."','APOTEK RAWAT INAP',$maxi,'','') ");	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('no_resep_transaksi_apotik','faktur_apotik_prebayar'); 
		}	
	}	
	function simpan2(){
		$this->db->trans_begin();
		$maxi = $this->maxi('no_resep_transaksi_apotik','faktur_apotik_prebayar')+1;
		$this->db->query(" insert into faktur_apotik_prebayar values  ('','".$this->input->post('norm')."','".$this->input->post('combo_barang')."','".$this->input->post('harga')."',
						'".$this->input->post('qty')."','1','".$this->input->post('nama')."','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('combo_dokter')."',
						'".$this->input->post('combo_perawatan1')."','no','".$this->input->post('combo_pembayaran2')."','".$this->input->post('combo_jenispx')."',
						'".$this->input->post('combo_pembayaran1')."','".$this->input->post('diskon')."','2001','".$this->input->post('upf')."','','','".$this->input->post('remark')."','APOTEK RAWAT INAP',$maxi,'','') ");	
		
		$this->db->query(" insert into faktur_apotik_prebayar values  ('','".$this->input->post('norm')."','EMBALASE','3000','".$this->input->post('qty2')."','1',
						'".$this->input->post('nama')."','".$this->tgl_skrg()."','".$this->jam_skrg()."','".$this->input->post('combo_dokter')."','".$this->input->post('combo_perawatan1')."',
						'no','".$this->input->post('combo_pembayaran2')."','".$this->input->post('combo_jenispx')."','".$this->input->post('combo_pembayaran1')."',
						'0','2001','".$this->input->post('upf')."','','','".$this->input->post('remark')."','APOTEK RAWAT INAP',$maxi,'','') ");	
		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return $this->maxi('no_resep_transaksi_apotik','faktur_apotik_prebayar'); 
		}	
	}
	function Count_ListReq(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }
	function DataTransaksi($awal,$panjang){
		$norm	= $this->input->post('n_rm');
		$add_where = " AND cib='$norm' ";
		$this->querynya = $this->querynya.$add_where;
    	$query	= $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	function DataLayanan($awal,$panjang,$srch = ''){
		$add_where = "AND";
		if($srch !='')                                         
		$add_where  .= " (nama LIKE '%$srch%') AND";
		if(strlen($add_where)==3) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-4);
		
		$this->querynya = $this->querylayanan.$add_where;		
		if 		( $this->input->post('layanan')=="R/ Hari Ini Belum Dilayani")
				$this->querynya .= " AND isresep_diambil='belum' AND tgl_rm='".$this->tgl_skrg()."' ";
		else if ( $this->input->post('layanan')=="R/ Hari Ini Sudah Dilayani")
				$this->querynya .= " AND isresep_diambil='sudah' AND tgl_rm='".$this->tgl_skrg()."' ";
		else if ( $this->input->post('layanan')=="Semua R/ Hari Ini")
				$this->querynya .= " AND tgl_rm='".$this->tgl_skrg()."' ";
		else if ( $this->input->post('layanan')=="Semua R/ Belum Dilayani")
				$this->querynya .= " AND isresep_diambil='belum'  ";
		else if ( $this->input->post('layanan')=="Semua R/ Sudah Dilayani")
				$this->querynya .= " AND isresep_diambil='sudah' ";
		else 	$this->querynya;	
		
    	$query = $this->db->query($this->querynya." LIMIT $awal,$panjang" );
    	return $query->result_array();
    }
	
	function cariket() {
		$query = $this->db->query("Select resep ketresep FROM medical_record WHERE no_upf='".$this->input->post('no_reg')."'");
		return $query->result_array();
    }
	function updateresep() {
		$updatereg	= $this->input->post('no_reg');
		$data = array(
			'isresep_diambil'=> 'Sudah',
		);								
		$this->db->WHERE('no_upf',$updatereg);
		$this->db->Update('medical_record',$data);
			
		return $this->db->trans_status();			
	}
	function UpdateStockRajal(){
			$combo_barang  = $this->input->post('combo_barang');
			$qty = $this->input->post('qty');
			$dt = array(
			'jumlah'=>$qty
			);	
			$this->db->WHERE('nama',$combo_barang);
			$this->db->Update('stock_rajal',$dt);
			
		return $this->db->trans_status();
    }
	function UpdateStockRanap(){
			$combo_barang  = $this->input->post('combo_barang');
			$qty = $this->input->post('qty');
			$dt = array(
			'jumlah'=>$qty
			);	
			$this->db->WHERE('nama',$combo_barang);
			$this->db->Update('stock_ranap',$dt);
			
		return $this->db->trans_status();
    } 
		
};

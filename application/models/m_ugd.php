<?php

class m_ugd extends CI_Model {

    private $table = 'ugd';

    function get_ugd_pas($stat) {
		$this->db->where('status', $stat);
        return $this->db->get('ugd')->result_array();
    }
	private function max_ugd(){
		$query = $this->db->query (" SELECT MAX(no_ugd)+1 no_ugd FROM ugd ");
		$hsl = $query->row();
		return $hsl->no_ugd;
	}
	function add_pas_ugd (){
		$tgl_catat=getdate();
		$tgl= $tgl_catat['mday'] < 10 ? '0'.$tgl_catat['mday'] :$tgl_catat['mday'];  
		$tgl = $tgl_catat['mon'] < 10 ? $tgl_catat['year'].'-0'.$tgl_catat['mon'].'-'.$tgl : $tgl_catat['year'].'-'.$tgl_catat['mon'].'-'.$tgl;
		$jam = $tgl_catat['hours'].':'.$tgl_catat['minutes'].':'.$tgl_catat['seconds'];
		$dt= array('no_ugd' => $this->max_ugd(), 'isMrX' => $this->input->post('isMrX') ,'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat') ,'telp' => $this->input->post('telp'),'sex' => $this->input->post('sex')
			,'darah' => $this->input->post('darah'),'tanggal' => $tgl ,'jam' => $jam,'pengantar' => $this->input->post('pengantar'),
			'pengantar_nama' => $this->input->post('pengantar_nama'),'pengantar_alamat' => $this->input->post('pengantar_alamat'),
			'pengantar_telp' => $this->input->post('pengantar_telp'),'pengantar_hubungan' => $this->input->post('pengantar_hubungan'),
			'catatan' => $this->input->post('catatan'),'dokter' => $this->input->post('dokter'),'GCS_Eye' => $this->input->post('GCS_Eye'),
			'GCS_Verbal' => $this->input->post('GCS_Verbal'),'GCS_Motorik' => $this->input->post('GCS_Motorik'));
			
		$this->db->insert('ugd', $dt);
		return $this->db->trans_status();
	
    }
	function insert(){
			$dt= array(
			'jenis_kelamin' => $this->input->post ('j_kel'), 
			'golongan_darah' => $this->input->post ('g_darah'),
			'jenis_pasien' => $this->input->post ('j_pasien'));
			$this->db->insert('pengantar',$dt);
						
         return $this->db->trans_status();
	}	 
	function update(){
			$jenis_kelamin  = $this->input->post('j_kel');
			$golongan_darah = $this->input->post('g_darah');
			$jenis_pasien = $this->input->post('j_pasien');
			$dt = array(
			'jenis_kelamin'=>$jenis_kelamin,
			'golongan_darah'=>$golongan_darah,
			'jenis_pasien'=>$jenis_pasien
			);	
			$this->db->where('jenis_kelamin',$jenis_kelamin);
			$this->db->update('pengantar',$dt);
			
		return $this->db->trans_status();
	}
	function simpan(){
			$dt= array(
			'nama_lengkap' => $this->input->post ('namaL'), 
			'umur' => $this->input->post ('umur'),
			'sekolah' => $this->input->post ('sekolah'));
			$this->db->insert('data_pribadi',$dt);
						
         return $this->db->trans_status();
				
    } 
	function edit(){
			$nama_lengkap  = $this->input->post('namaL');
			$umur = $this->input->post('umur');
			$sekolah = $this->input->post('sekolah');
			$dt = array(
			'nama_lengkap'=>$nama_lengkap,
			'umur'=>$umur+$umur,
			'sekolah'=>$sekolah
			);	
			$this->db->WHERE('nama_lengkap',$nama_lengkap);
			$this->db->Update('data_pribadi',$dt);
			
		return $this->db->trans_status();
    }
	function hapus(){ //delete data berdasarkan nama
			$nama_lengkap  = $this->input->post('namaL');
			$dt = array(
			'nama_lengkap'=>$nama_lengkap
			);
			$this->db->WHERE('nama_lengkap',$nama_lengkap);
			$this->db->Delete('data_pribadi',$dt); //query delete data pribadi
			
		return $this->db->trans_status();
	 }
	
	function cari() {
		$query = $this->db->query("Select nama_lengkap namaL,umur,sekolah 
				FROM data_pribadi WHERE nama_lengkap='".$this->input->post('namaL')."'");
		return $query->result_array();
    }
	function cari_nama() {
		$fltr=$this->input->post('term');
		$kategori=$this->input->post('kategori');
		if($kategori != '') $add_where = " AND nama_lengkap ='$kategori' ";
		else $add_where = '';
		$query = $this->db->query(" Select nama_lengkap id,nama_lengkap text,umur,sekolah 
					FROM data_pribadi WHERE nama_lengkap LIKE '$fltr%' $add_where " );
        return $query->result_array();
    }
	function list_datapribadi($namalengkap=''){
		$nama_lengkap = $this->input->post('nama_lengkap');
		if ($this->input->post('status') !='') 
				$add_where=" a.status = '".$this->input->post('status')."' AND " ;
		else	$add_where=" ";
		$query = $this->db->query(" SELECT a.nama_lengkap,a.umur,a.sekolah
					FROM data_pribadi a ");
		return $query->result_array();		
	}
			
};

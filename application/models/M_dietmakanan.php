
<?php

class m_dietmakanan extends CI_Model {


	var $querynya             =  "SELECT diet from diet ";

	var $bahan_makanan        =  "SELECT bahan from bahan_makanan  ";

	var $list_gizi            =  "SELECT kandungan, jumlah, satuan FROM bahan_makanan ";

	var $kandungan_gizi       =  "SELECT kandungan, jumlah, satuan FROM bahan_makanan ";


	 function count_list_req(){
    	$query = $this->db->query($this->querynya);
    	return $query->num_rows();
    }


	 function get_nama_diet($awal,$panjang,$srch =''){

    	$add_where = "WHERE";

		if($srch !='')                                                       $add_where  .= " (diet LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);	
		$query = $this->db->query($this->querynya.$add_where." LIMIT $awal,$panjang" );
    	return $query->result_array();
	}

	 function list_bahan_makanan($awal,$panjang,$srch =''){

	 	$add_where = "WHERE";

		if($srch !='')                                                       $add_where  .= " (bahan LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5);
		
		$this->querynya = $this->bahan_makanan.$add_where." group BY bahan";

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();

	}

	function list_gizi($awal,$panjang,$srch =''){

		$add_where = "WHERE";

		if($this->input->post('bahan_makan')      != '')                     $add_where .= " bahan= '".$this->input->post('bahan_makan')."' AND "; 

		if($srch !='')                                                       $add_where  .= " (kandungan LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5); 

		$this->querynya = $this->list_gizi.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();			
	}

		function list_kandungangizi($awal,$panjang,$srch =''){
		$add_where = "WHERE";

		if($this->input->post('bahan_makan')      != '')                     $add_where .= " bahan= '".$this->input->post('bahan_makan')."' AND "; 

		if($srch !='')                                                       $add_where  .= " (kandungan LIKE '%$srch%') AND ";

		if(strlen($add_where)==5) $add_where=" "; else $add_where=substr($add_where,0,strlen($add_where)-5); 

		$this->querynya = $this->list_gizi.$add_where;

    	$query = $this->db->query($this->querynya."  LIMIT $awal,$panjang" );

		return $query->result_array();			
	}

    function tambah_diet(){
    	{
    		$this->db->query(" insert into diet values  ('".$this->input->post('nama_diet')."') ");
    	}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	
    }

     function ubah_diet(){

     	$nama_diet      = $this->input->post('nama_diet');
     	$nama_diet_baru = $this->input->post('nama_diet_baru');
     	
     	
    	{
    		$this->db->query(" UPDATE diet SET  diet = '$nama_diet_baru' where diet = '$nama_diet' ");
    	}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	
    }

     function delete_diet(){

     	$nama_diet = $this->input->post('nama_diet');

    	{
    		$this->db->query(" DELETE from diet where diet = '$nama_diet' ");
    	}

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke'; 
		}	
    }

     function get_kandungan_gizi(){
    	$filter=$this->input->post('term');

		$query = $this->db->query("Select nama id, nama text From kandungan_gizi where nama LIKE '$filter%'" );
        return $query->result_array();
    }

	function delete_gizi(){
		$bahan = $this->input->post('bahan');

		$query = $this->db->query("DELETE from bahan_makanan where bahan='$bahan'");
	}

	function simpan_giziall(){

		$bahan = $this->input->post('bahan');

    	
    	if ($bahan === '') {
    		return $this->simpan_gizi();
    	}  else {
    		return $this->simpan_gizi2();
    	}
    	

	}

	function simpan_gizi(){

		
		$this->db->query(" insert into bahan_makanan values  ('".$this->input->post('bahan_makan')."','".$this->input->post('kdg_gizi')."','".$this->input->post('jml_gizi')."','".$this->input->post('satuan')."') ");						
	

		if ($this->db->trans_status() === FALSE) {
			$this->db->trans_rollback();
			return 'Not Oke';
		}
		else {
			$this->db->trans_commit();
			return 'Oke';
		}	
	
	}

	function simpan_gizi2(){
		$bahan = $this->input->post('bahan_makan');
		$this->db->query(" insert into bahan_makanan values  ('".$this->input->post('bahan_makan')."','".$this->input->post('kdg_gizi')."','".$this->input->post('jml_gizi')."','".$this->input->post('satuan')."') ");	

		return $bahan;
				
	}


    

}




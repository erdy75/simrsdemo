<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_pasien_pribadi extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'pasien_pribadi';
    return $table;
  }

  function get($order_by)
  {
    $table = $this->get_table();
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
  }

  function get_with_limit($limit, $offset, $order_by) 
  {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    $this->db->order_by($order_by);
    $query=$this->db->get($table);
    return $query;
  }

  function get_where($id)
  {
    $data = $this->db->get_where('pasien_pribadi',array('id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('id, nama_prov');
    $this->db->like('nama_prov', $nama, 'both');
    $this->db->order_by('id','asc');
    //$this->db->limit(10, 0);
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom2($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('id','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'pasien_pribadi';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'pasien_pribadi';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'pasien_pribadi';
    $this->db->where('id', $id);
    $this->db->delete($table);
  }

  function count_where($column, $value) 
  {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function count_filter_where($filter) 
  {
    $mydate=getdate(date("U"));
    $bln_srkg = $mydate['mon'];    
    $out =  $this->db->query("SELECT `id`, `status`, `cib`, `dokter`, `tanggal`, `jam`, `KelompokBeli`, `penanggung_jawab`, `pemeriksa`, `nama_manual_edit`, `umur_manual_edit`, `alamat_manual_edit`, `sex_manual_edit`, `petugas_entry`, `penjamin_manual_edit`, `jalan_inap`, `kamar_if_ranap`, `remark`, `isApproved`, `catatan_hasil_periksa`, `no_reg_lab_internal`, `not_used_2`, `not_used_3`, `not_used_4`, `not_used_5`, `not_used_6` FROM `pasien_pribadi` WHERE month(tanggal) = '".$bln_srkg."' AND `status` in ('waiting','sementara')");
    $num_rows = $out->num_rows();
    return $num_rows;
  }


  function count_all() 
  {
    $table = $this->get_table();
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function get_max() 
  {
    $table = $this->get_table();
    $this->db->select_max('id');
    $query = $this->db->get($table);
    $row=$query->row();
    $id=$row->id;
    return $id;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $query = $this->db->get('pasien_pribadi');
    return $query->result_array();
  }


  public function fetch_pasien_pribadi($limit, $start,$filter) 
  {
    $mydate=getdate(date("U"));
    $bln_srkg = $mydate['mon'];


    $out =  $this->db->query("SELECT `id`, `status`, `cib`, `dokter`, `tanggal`, `jam`, `KelompokBeli`, `penanggung_jawab`, `pemeriksa`, `nama_manual_edit`, `umur_manual_edit`, `alamat_manual_edit`, `sex_manual_edit`, `petugas_entry`, `penjamin_manual_edit`, `jalan_inap`, `kamar_if_ranap`, `remark`, `isApproved`, `catatan_hasil_periksa`, `no_reg_lab_internal`, `not_used_2`, `not_used_3`, `not_used_4`, `not_used_5`, `not_used_6` FROM `pasien_pribadi` WHERE month(tanggal) = '".$bln_srkg."' AND `status` in ('waiting','sementara')  ORDER BY `id` DESC LIMIT $start,$limit");

    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

}  

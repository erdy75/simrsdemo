<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_temp_lab_tarif extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'temp_lab_tarif';
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

  function get_where($no_order)
  {
    $data = $this->db->get_where('temp_lab_tarif',array('no_order'=>$no_order));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('no_order, nama_prov');
    $this->db->like('nama_prov', $nama, 'both');
    $this->db->order_by('no_order','asc');
    //$this->db->limit(10, 0);
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom2($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('inc','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'temp_lab_tarif';
    $this->db->insert($table, $data);
  }


  function _update($no_order, $data)
  {
    $table = 'temp_lab_tarif';
    $this->db->where('no_order', $no_order);
    $this->db->update($table, $data);
  }

  function _delete($no_order)
  {
    $table = 'temp_lab_tarif';
    $this->db->where('no_order', $no_order);
    $this->db->delete($table);
  }

  function _delete_id($id)
  {
    $table = 'temp_lab_tarif';
    $this->db->where('id', $id);
    $this->db->delete($table);
  }

  function _truncate()
  {
    $this->db->from('temp_lab_tarif'); 
    $this->db->truncate(); 
  }

  function count_where($column, $value) 
  {
    $table = $this->get_table();
    $this->db->where($column, $value);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function count_where_nama_lab($nama_lab, $no_order) 
  {
    $table = $this->get_table();
    $this->db->where('nama_lab', $nama_lab);
    $this->db->where('no_order', $no_order);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function count_filter_where($filter) 
  {
    $mydate=getdate(date("U"));
    $bln_srkg = $mydate['mon'];    
    $out =  $this->db->query("SELECT `no_order`, `status`, `cib`, `dokter`, `tanggal`, `jam`, `KelompokBeli`, `penanggung_jawab`, `pemeriksa`, `nama_manual_edit`, `umur_manual_edit`, `alamat_manual_edit`, `sex_manual_edit`, `petugas_entry`, `penjamin_manual_edit`, `jalan_inap`, `kamar_if_ranap`, `remark`, `isApproved`, `catatan_hasil_periksa`, `no_reg_lab_internal`, `not_used_2`, `not_used_3`, `not_used_4`, `not_used_5`, `not_used_6` FROM `temp_lab_tarif` WHERE month(tanggal) = '".$bln_srkg."' AND `status` in ('waiting','sementara')");
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
    $this->db->select_max('no_order');
    $query = $this->db->get($table);
    $row=$query->row();
    $no_order=$row->no_order;
    return $no_order;
  }

  function get_max_inc($no_order) 
  {
    $table = $this->get_table();
    $this->db->where('no_order',$no_order);
    $this->db->select_max('inc');
    $query = $this->db->get($table);
    $row=$query->row();
    $inc=$row->inc;
    return $inc;
  }

  function get_max_cib() 
  {
    $table = $this->get_table();
    $this->db->select_max('cib');
    $query = $this->db->get($table);
    $row=$query->row();
    $cib=$row->cib;
    return $cib;
  }


  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $query = $this->db->get('temp_lab_tarif');
    return $query->result_array();
  }


  public function fetch_temp_lab_tarif($limit, $start,$no_order) 
  {
    $out =  $this->db->query("SELECT `id`,`no_order`, `nama_lab`, `tarif`, `rujukan` FROM `temp_lab_tarif` WHERE `no_order` = '".$no_order."' ORDER BY `no_order` DESC LIMIT $start,$limit");

    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

}  

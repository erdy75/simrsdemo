<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_lab_detail_spesimen extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'lab_detail_spesimen';
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
    $data = $this->db->get_where('lab_detail_spesimen',array('id_layanan'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->where('id_layanans', $nama);
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom2($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('indexUrut','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom3($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('indexUrut','asc');
    $query=$this->db->get($table);
    return $query->row_array();
  }

  function _insert($data)
  {
    $table = 'lab_detail_spesimen';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'lab_detail_spesimen';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _update_where($column,$value,$data)
  {
    $table = 'lab_detail_spesimen';
    $this->db->where($column, $value);
    $this->db->update($table, $data);
  }

  function _update_inc($nama,$inc)
  {
    $table = 'lab_detail_spesimen';
    $this->db->where($column, $value);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'lab_detail_spesimen';
    $this->db->where('id_layanan', $id);
    $this->db->delete($table);
  }

  function _delete_where($column,$value)
  {
    $table = 'lab_detail_spesimen';
    $this->db->where($column, $value);
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

  function count_filter_where($id_layanan,$spesimen) 
  {
    $table = $this->get_table();
    $this->db->where('id_layanan', $id_layanan);
    $this->db->where('spesimen', $spesimen);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
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

  function get_max_inc() 
  {
    $table = $this->get_table();
    $this->db->select_max('inc');
    $query = $this->db->get($table);
    $row=$query->row();
    $inc=$row->inc;
    return $inc;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $this->db->order_by('spesimen','asc');
    $query = $this->db->get('lab_detail_spesimen');
    return $query->result_array();
  }

  function get_lab_detail_spesimen($bidang)
  {
    $this->db->select('indexUrut, id_layanan','bidang');
    $this->db->from('lab_detail_spesimen'); 
    $this->db->where('bidang', $bidang);
    $this->db->order_by('indexUrut','asc');
    return $this->db->get()->result_array();   
  }

  function get_harga_kel_tarif($kolom,$id_layanan)
  {
    $query = $this->db->query("select $kolom from lab_detail_spesimen where id_layanan = '".$id_layanan."'");
    return $query->result_array();   
  }

  public function fetch_lab_detail_spesimen($limit, $start,$filter,$bidang) 
  {
    $this->db->select('id_layanan,bidang,persiapan,unit_cost,metode');
    $this->db->from('lab_detail_spesimen');
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('nama', $filter, 'both');
    } 
    if($bidang!='')
    {
      $this->db->like('nama', $filter, 'both');
    } 
    $this->db->order_by('bidang','asc');
    return $this->db->get()->result_array();
  }

}  

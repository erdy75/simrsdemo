<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_lab_spesimen extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'lab_spesimen';
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
    $data = $this->db->get_where('lab_spesimen',array('id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('id, nama, inc');
    $this->db->like('nama', $nama, 'both');
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
    $table = 'lab_spesimen';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'lab_spesimen';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'lab_spesimen';
    $this->db->where('id', $id);
    $this->db->delete($table);
  }

  function _delete_layanan($id)
  {
    $table = 'lab_spesimen';
    $this->db->where('id_layanan', $id);
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

  function count_where_spesimen($id_layanan, $spesimen) 
  {
    $table = $this->get_table();
    $this->db->where('id_layanan', $id_layanan);
    $this->db->where('spesimen', $spesimen);
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function count_filter_where($filter,$bidang_id) 
  {
    $table = 'v_lab_spesimen';
    $this->db->where('id_bidang', $bidang_id);
    if($filter!='')
    {
      $this->db->like('layanan', $filter, 'both');
    } 
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
    $query = $this->db->get('lab_spesimen');
    return $query->result_array();
  }


  public function fetch_lab_spesimen($limit, $start,$filter,$bidang_id) 
  {
    $this->db->select('id, lab_spesimen');
    $this->db->from('lab_spesimen');
    $this->db->where('bidang', $bidang_id);
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('lab_spesimen', $filter, 'both');
    } 
    $this->db->order_by('id','asc');
    return $this->db->get()->result_array();
  }

}  

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_negara extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'negara';
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
    $data = $this->db->get_where('negara',array('id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('id, nama');
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
    $table = 'negara';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'negara';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'negara';
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
    $table = $this->get_table();
    if($filter!='')
    {
      $this->db->like('nama', $filter, 'both');
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

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $query = $this->db->get('negara');
    return $query->result_array();
  }


  public function fetch_negara($limit, $start,$filter) 
  {
    $this->db->select('id, nama, kode');
    $this->db->from('negara');
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('nama', $filter, 'both');
    } 
    $this->db->order_by('id','asc');
    return $this->db->get()->result_array();
  }

}  

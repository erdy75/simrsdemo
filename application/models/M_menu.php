<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'menu';
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
    $data = $this->db->get_where('menu',array('id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }

  function get_where_modul($id)
  {
    $data = $this->db->get_where('menu',array('modul_id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }

  function get_where_custom($col, $value, $status) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->where('status_konfirm', $status);
    $this->db->order_by('id','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'menu';
    $this->db->insert($table, $data);
  }

  function _update($id, $data)
  {
    $table = 'menu';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'menu';
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

  function count_all() 
  {
    $table = $this->get_table();
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function count_all_where($modul_id, $filter = null) 
  {
    $table = $this->get_table();
    $this->db->where('modul_id', $modul_id);
    if($filter!==null) {
      $this->db->like('nama_menu', $filter);
    }
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows;
  }

  function count_all_where_sub($parent_id,$modul_id, $filter = null) 
  {
    $table = $this->get_table();
    $this->db->where('parent_id', $parent_id);
    $this->db->where('modul_id', $modul_id);
    if($filter!==null) {
      $this->db->like('nama_menu', $filter);
    }
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

  function show_menu_parent()
  {
    $table = $this->get_table();
    $this->db->where('parent_id', 0);
    $query=$this->db->get($table);
    return $query->result_array();
  }
  function show_parent($id)
  { 
    $this->db->where('parent_id', $id);
    $this->db->order_by('id','asc');
    $query=$this->db->get('menu');
    if($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return FALSE;
    }      
  }

  function display_modul($modul_id)
  {
    $this->db->where('modul_id', $modul_id);
    $this->db->where('parent_id', 0); 
    $this->db->order_by('id','asc');
    $query=$this->db->get('menu');
    if($query->num_rows() > 0){
        return $query->result_array();
    }else{
        return FALSE;
    }     
  }

  function fetch_menu($limit, $start,$filter, $modul_id) 
  {
    $this->db->select('id, nama_menu , link_menu, parent_id, is_parent, modul_id, attr_id');
    $this->db->from('menu');
    $this->db->where('modul_id', $modul_id);
    $this->db->where('parent_id', 0);
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('nama_menu', $filter, 'both');
    } 
    $this->db->order_by('id','asc');
    return $this->db->get()->result_array();
  }

  function fetch_sub_menu($limit, $start,$filter, $modul_id, $parent_id) 
  {
    $this->db->select('id, nama_menu , link_menu, parent_id, is_parent, modul_id, attr_id');
    $this->db->from('menu');
    $this->db->where('modul_id', $modul_id);
    $this->db->where('parent_id', $parent_id);
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('nama_menu', $filter, 'both');
    } 
    $this->db->order_by('id','asc');
    return $this->db->get()->result_array();
  }
}  

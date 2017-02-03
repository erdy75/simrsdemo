<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_jenis_obat extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'jenis_obat';
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
    $this->db->order_by($order_by, 'asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where($no_sp_final)
  {
    $data = $this->db->get_where('jenis_obat',array('no_sp_final'=>$no_sp_final));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('nama','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'jenis_obat';
    $this->db->insert($table, $data);
  }


  function _update($nama, $data)
  {
    $table = 'jenis_obat';
    $this->db->where('nama', $nama);
    $this->db->update($table, $data);
  }

  function _delete($nama)
  {
    $table = 'jenis_obat';
    $this->db->where('nama', $nama);
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
    $this->db->order_by('nama','asc');
    $query = $this->db->get('jenis_obat');
    return $query->result_array();
  }
  

}  

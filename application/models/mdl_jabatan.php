<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_jabatan extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'jabatan';
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
    $data = $this->db->get_where('jabatan',array('id'=>$id));
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

  function get_where_custom2($col, $value, $order) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by($order,'asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'jabatan';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'jabatan';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'jabatan';
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
    $this->db->order_by('id','asc');
    $query = $this->db->get('jabatan');
    return $query->result_array();
  }

  function _show_jabatan_karywan($var1,$var2,$var3) 
  {
    $query = $this->db->query('SELECT nama from jabatan where atribut_obyek in ("'.$var1.'","'.$var2.'","'.$var3.'") order by nama');
    return $query->result_array();
  }
}  

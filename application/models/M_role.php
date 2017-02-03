<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_role extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'role';
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
    $data = $this->db->get_where('role',array('id'=>$id));
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
    $table = 'role';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'role';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'role';
    $this->db->where('id', $id);
    $this->db->delete($table);
  }

  function _delete_role($id)
  {
    $table = 'role_role';
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
    $query = $this->db->get('role');
    return $query->result_array();
  }

  function list_role_role($role_id)
  { 
    $out =  $this->db->query("SELECT * from rs_role 
              WHERE id in (
                SELECT role_id from rs_role_role where role_id = $role_id 
              )");

    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }


  function count_all_where($filter) 
  {
    if (!empty($filter))
    {
      $out =  $this->db->query("SELECT count(*) as jumlah from rs_role where role_name like '%".$filter."%'");      
    }
    else
    {
      $out =  $this->db->query("SELECT count(*) as jumlah from rs_role");
    }

    if($out->num_rows()>0)
    {
      return $out->row_array();
    }
  }

  public function fetch_role($limit, $start,$filter) 
  {
    $this->db->select('id, role_name');
    $this->db->from('role');
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('role_name', $filter, 'both');
    } 
    $this->db->order_by('id','asc');
    return $this->db->get()->result_array();
  }

}  

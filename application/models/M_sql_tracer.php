<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_sql_tracer extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'sql_tracer';
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
    $data = $this->db->get_where('v_sql_tracer',array('id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('kec_id, kec_nama');
    $this->db->like('kec_nama', $nama, 'both');
    $this->db->order_by('kec_id','asc');
    $this->db->limit(10, 0);
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
    $table = 'sql_tracer';
    $this->db->insert($table, $data);
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
    $table = 'v_sql_tracer';
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
    $query = $this->db->get('sql_tracer');
    return $query->result_array();
  }

  function str_method_sql($table, $data, $method, $id=null)
  {
    $text = '';
    $input_name = '';
    // even insert
    if($method == 'insert')
    {
      $text .= "INSERT INTO $table (";
    }
    // even update
    if ($method == 'update') {
      $text .= "UPDATE $table SET ";
    }
    // even delete
    if ($method == 'delete')
    {
      $text .= "DELETE FROM $table WHERE $id";
    }
    
    // even data no array
    if($data==0)
    {
      return $text;
    }
    else
    {
      if($method == 'insert')
      {
        $values = '';
        $values = " ) VALUES ( ";
        while ($input_name = current($data) !== FALSE) {
          $text .= "`".key($data)."`,";
          $values .= "'".current($data)."',";
          next($data);
        }
        $values .= ")";
        $text .= $text.$values;
        $text = str_replace(",)", ")", $text);
      }
      else
      {
        while ($input_name = current($data) !== FALSE) {
          $text.= "`".key($data)."`='".current($data)."',";
          next($data);
        }
        $text .= $text.") WHERE $id ";
        $text = str_replace(",)", "", $text);               
      }
      return $text;      
    }

  }

}  

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_gudang_terima extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'gudang_terima';
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
    $this->db->order_by($order_by, 'desc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where($no_faktur)
  {
    $data = $this->db->get_where('gudang_terima',array('no_faktur'=>$no_faktur));
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
    $this->db->order_by('id','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom2($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('no_faktur','asc');
    $query=$this->db->get($table);
    return $query->row_array();
  }

  function _insert($data)
  {
    $table = 'gudang_terima';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'gudang_terima';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'gudang_terima';
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
    $this->db->select_max('no_faktur');
    $query = $this->db->get($table);
    $row=$query->row();
    $no_faktur=$row->no_faktur;
    return $no_faktur;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $this->db->order_by('nama','asc');
    $query = $this->db->get('gudang_terima');
    return $query->result_array();
  }
  
  function hari_tempo($no_faktur)
  {
    $query = $this->db->query('SELECT 
      IF(DATEDIFF(jatuh_tempo,tgl_terima) is NULL,0,DATEDIFF(jatuh_tempo,tgl_terima)) as hari 
      from gudang_terima where no_faktur="'.$no_faktur.'"');
    return $query->row_array();    
  }
}  

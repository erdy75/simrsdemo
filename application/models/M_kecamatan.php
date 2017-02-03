<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kecamatan extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'kecamatan';
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
    $data = $this->db->get_where('kecamatan',array('kec_id'=>$id));
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
    $table = 'kecamatan';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'kecamatan';
    $this->db->where('kec_id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'kecamatan';
    $this->db->where('kec_id', $id);
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
      $this->db->like('nama_kec', $filter, 'both');
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
    $this->db->select_max('kec_id');
    $query = $this->db->get($table);
    $row=$query->row();
    $id=$row->kec_id;
    return $id;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $query = $this->db->get('kecamatan');
    return $query->result_array();
  }


  public function fetch_kecamatan($limit, $start,$filter) 
  {
    $this->db->select('kec_id, kabupaten_id, kec_nama');
    $this->db->from('kecamatan');
    $this->db->limit($limit, $start);
    if($filter!='')
    {
      $this->db->like('nama_kec', $filter, 'both');
    } 
    $this->db->order_by('kec_id','asc');
    return $this->db->get()->result_array();
  }

}  

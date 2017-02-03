<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_gu_order extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'gu_order';
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

  function get_where($no_order)
  {
    $data = $this->db->get_where('gu_order',array('no_order'=>$no_order));
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
    $table = 'gu_order';
    $this->db->insert($table, $data);
  }


  function _update($no_order, $data)
  {
    $table = 'gu_order';
    $this->db->where('no_order', $no_order);
    $this->db->update($table, $data);
  }

  function _delete($no_order)
  {
    $table = 'gu_order';
    $this->db->where('no_order', $no_order);
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
    $query = $this->db->get('gu_order');
    return $query->result_array();
  }

  function fetch_gu_order($limit,$offset,$unit) 
  {
    $text = '';
    if($unit!='*')
    {
      $text .= 'AND UPPER(a.poli) LIKE "%'.$unit.'%" ';
    }
    $query = $this->db->query('SELECT  
      a.no_order,
      a.id_petugas,
      a.poli,
      DATE_FORMAT(a.tgl,"%d-%m-%Y") tgl,
      a.jam,
      b.nama,
      a.nama_kepala_unit
      FROM gu_order a, 
        (SELECT id, nama 
        FROM tdok_bio
        UNION
        SELECT id, nama
        FROM tkar_bio) b
      WHERE
      a.id_petugas = b.id 
      and a.status = "Open" '.$text.'
      ORDER BY a.tgl asc LIMIT '.$offset.','.$limit );
    return $query->result_array();
  }

  function count_gu_order($unit)
  {
    $text = '';
    if($unit!='*')
    {
      $text .= 'AND UPPER(a.poli) LIKE "%'.$unit.'%" ';
    }
    $query = $this->db->query('SELECT  
      a.no_order,
      a.id_petugas,
      a.poli,
      DATE_FORMAT(a.tgl,"%d-%m-%Y") tgl,
      a.jam,
      b.nama,
      a.nama_kepala_unit
      FROM gu_order a, 
        (SELECT id, nama 
        FROM tdok_bio
        UNION
        SELECT id, nama
        FROM tkar_bio) b
      WHERE
      a.id_petugas = b.id 
      and a.status = "Open" '.$text.' 
      ORDER BY a.tgl asc' );
    return $query->num_rows();    
  }
}  

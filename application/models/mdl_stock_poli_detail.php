<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_stock_poli_detail extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'stock_poli_detail';
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
    $data = $this->db->get_where('stock_poli_detail',array('no_order'=>$no_order));
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
    $table = 'stock_poli_detail';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'stock_poli_detail';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'stock_poli_detail';
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
    $this->db->order_by('nama','asc');
    $query = $this->db->get('stock_poli_detail');
    return $query->result_array();
  }

  function get_harga_unit($nama)
  {
    $query = $this->db->query('
      SELECT
      nama_barang, 
      SUM(jumlah_terima) AS jumlah_terima,
      satuan 
      FROM
      stock_poli_detail 
      where
      nama_barang = "'.$nama.'" 
      GROUP BY
      nama_barang
    ');
    if($query->num_rows() > 0)
    {
      return $query->row_array();
    }
    else
    {
      $query = $this->db->query('
        SELECT 
        nama as nama_barang, 
        0 as jumlah_terima,
        satuan
        FROM barang 
        WHERE nama = "'.$nama.'"
      '); 
      return $query->row_array();
    }
  }
}  

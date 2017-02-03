<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_asset extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'asset';
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

  function get_where($no_asset)
  {
    $data = $this->db->get_where('asset',array('no_asset'=>$no_asset));
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
    $table = 'asset';
    $this->db->insert($table, $data);
  }


  function _update($no_asset, $data)
  {
    $table = 'asset';
    $this->db->where('no_asset', $no_asset);
    $this->db->update($table, $data);
  }

  function _delete($no_asset)
  {
    $table = 'asset';
    $this->db->where('no_asset', $no_asset);
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
    $this->db->select_max('no_asset');
    $query = $this->db->get($table);
    $row=$query->row();
    $no_asset=$row->no_asset;
    return $no_asset;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $this->db->order_by('nama','asc');
    $query = $this->db->get('asset');
    return $query->result_array();
  }
  
  public function fetch_asset($limit, $start,$inventaris,$lokasi_barang) 
  {
    $text = '';
    if($inventaris=='Inventaris Aktif'){
      $text .= ' and isWriteOff=""';
    } elseif($inventaris=='Hapus / Dimusnahkan') {
      $text .= ' and isWriteOff="DELETED "';
    } else {
      $text .= '';
    }

    if($lokasi_barang!='*')
    {
      $text .= ' and unit="'.$lokasi_barang.'"';
    }

    $query = $this->db->query('SELECT 
       *
      FROM asset
      WHERE 1=1 '.$text.' LIMIT '.$limit.' OFFSET '.$start);
    return $query->result_array();
  }

  public function count_asset($inventaris,$lokasi_barang) 
  {
    $text = '';
    if($inventaris=='Inventaris Aktif'){
      $text .= ' and isWriteOff=""';
    } elseif($inventaris=='Hapus / Dimusnahkan') {
      $text .= ' and isWriteOff="DELETED "';
    }

    if($lokasi_barang!='*')
    {
      $text .= ' and unit="'.$lokasi_barang.'"';
    }

    $query = $this->db->query('SELECT 
       *
      FROM asset
      WHERE 1=1 '.$text);
    return $query->num_rows();
  }
}  

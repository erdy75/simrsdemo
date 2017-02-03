<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_gudang_terima_detail extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'gudang_terima_detail';
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

  function get_where($id)
  {
    $data = $this->db->get_where('gudang_terima_detail',array('id'=>$id));
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

  function _insert($data)
  {
    $table = 'gudang_terima_detail';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'gudang_terima_detail';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'gudang_terima_detail';
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
    $query = $this->db->get('gudang_terima_detail');
    return $query->result_array();
  }
  
  function count_lpb_gudang_detail($no_faktur)
  {
    $query = $this->db->query('SELECT 
      a.no_faktur, 
      b.id, b.nama,b.satuan, 
      a.jumlah, 
      a.harga_beli, 
      a.kadaluwarsa, 
      a.batch_no, 
      a.disc,
      c.ppn
      FROM gudang_terima_detail a, barang b, gudang_terima c 
      WHERE a.id = b.id and a.no_faktur=c.no_faktur and a.no_faktur = "'.$no_faktur.'"');
    return $query->num_rows();    
  }

  function fetch_lpb_gudang_detail($limit, $start, $no_faktur)
  {
    $query = $this->db->query('SELECT 
      a.no_faktur, 
      b.id, b.nama,b.satuan, 
      a.jumlah, 
      a.harga_beli, 
      a.kadaluwarsa, 
      a.batch_no, 
      a.disc,
      c.ppn
      FROM gudang_terima_detail a, barang b, gudang_terima c 
      WHERE a.id = b.id and a.no_faktur=c.no_faktur and a.no_faktur = "'.$no_faktur.'" limit '.$start.','.$limit);  
    if ($query->num_rows()!=0)
    {
      return $query->result_array();
    }  
  } 
  function total_hasil($no_faktur)
  {
    $query = $this->db->query('SELECT
        SUM(a.total_harga) as total_hasil
      FROM
      (SELECT 
        a.no_faktur, 
        b.id, b.nama,b.satuan, 
        a.jumlah, 
        a.harga_beli, 
        a.kadaluwarsa, 
        a.batch_no, a.disc,
        (a.jumlah*a.harga_beli) as total_harga
      FROM gudang_terima_detail a, barang b WHERE a.id = b.id and a.no_faktur = "'.$no_faktur.'") a');  
    if ($query->num_rows()!=0)
    {
      return $query->row_array();
    }      
  }

  function _update_v2($no_faktur,$id, $data)
  {
    $table = 'gudang_terima_detail';
    $this->db->where('no_faktur', $no_faktur);
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }
}  

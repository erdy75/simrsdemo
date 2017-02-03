<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_purchasing_sp_final_detail extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'purchasing_sp_final_detail';
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

  function get_where($no_sp_final)
  {
    $data = $this->db->get_where('purchasing_sp_final_detail',array('no_sp_final'=>$no_sp_final));
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
    $this->db->order_by('no_sp_final','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_no_sp($limit, $offset, $value) 
  {
    $query = $this->db->query('
      select b.id, b.satuan, a.* FROM purchasing_sp_final_detail a, barang b
      WHERE a.nama = b.nama and a.no_sp_final='.$value.' order by a.nama limit '.$offset.','.$limit); 
    if($query->num_rows()==0) 
    {
    $query = $this->db->query('
      select CONCAT(a.nama,"") id,CONCAT(a.kemasan,"") satuan,  a.* FROM purchasing_sp_final_detail a
      WHERE a.no_sp_final='.$value.' order by a.nama limit '.$offset.','.$limit);      
    }   
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'purchasing_sp_final_detail';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'purchasing_sp_final_detail';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'purchasing_sp_final_detail';
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
    $query = $this->db->get('purchasing_sp_final_detail');
    return $query->result_array();
  }
  
  function tot_harga($no_sp_final)
  {
    $query = $this->db->query('
      SELECT SUM(harga*kuantitas) as tot_harga
      FROM purchasing_sp_final_detail 
      where no_sp_final = "'.$no_sp_final.'"
      ');
    return $query->row_array();    
  }
}  

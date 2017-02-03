<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_tdok_bio extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'tdok_bio';
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
    $data = $this->db->get_where('tdok_bio',array('id'=>$id));
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
    $table = 'tdok_bio';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'tdok_bio';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'tdok_bio';
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

  function count_daftar_dokter($cari_nama,$order_p)
  {
    $text = '';
    if($cari_nama!='')
    {
      $text .= ' and nama like "%'.$cari_nama.'%"';
    }
    if($order_p=='ID')
    {
      $text .= ' order by a.id asc';
    } elseif($order_p=='Nama') {
      $text .= ' order by a.nama asc';
    } else {
      $text .= ' order by b.poli asc';
    }
    $query = $this->db->query('SELECT 
      a.id,
      a.nama,
      a.`status`,
      b.poli,
      CONCAT(a.alamat,",") as alamat,
      a.telp,
      CONCAT(a.hp1,";",a.hp2) as no_hp,
      CONCAT(a.tempat,", ",DATE_FORMAT(a.tgl_lahir,"%d-%m-%Y")) as ttl
      FROM tdok_bio a, tdok_kepeg b
      WHERE a.id = b.id '.$text);
    return $query->num_rows();    
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
    $query = $this->db->get('tdok_bio');
    return $query->result_array();
  }
  
  public function fetch_daftar_dokter($limit, $start,$cari_nama,$order_p) 
  {
    $text = '';
    if($cari_nama!='')
    {
      $text .= ' and nama like "%'.$cari_nama.'%"';
    }
    if($order_p=='ID')
    {
      $text .= ' order by a.id asc';
    } elseif($order_p=='Nama') {
      $text .= ' order by a.nama asc';
    } else {
      $text .= ' order by b.poli asc';
    }   
    $query = $this->db->query('SELECT 
      a.id,
      a.nama,
      a.`status`,
      b.poli,
      CONCAT(a.alamat,",") as alamat,
      a.telp,
      CONCAT(a.hp1,";",a.hp2) as no_hp,
      CONCAT(a.tempat,", ",DATE_FORMAT(a.tgl_lahir,"%d-%m-%Y")) as ttl
      FROM tdok_bio a, tdok_kepeg b
      WHERE a.id = b.id '.$text.' LIMIT '.$limit.' OFFSET '.$start);
    return $query->result_array();
  }

  public function show_data_by_id($id)
  {
    $query = $this->db->query('SELECT 
      a.id,
      a.nama,
      a.`status`,
      b.poli,
      a.alamat,
      a.telp,
      a.hp1,a.hp2,
      a.tempat,
      a.id_no,
      a.id_card,
      a.lain,
      a.sex,
      a.darah,
      DATE_FORMAT(a.tgl_lahir,"%d-%m-%Y") as tgl_lahir 
      FROM tdok_bio a, tdok_kepeg b
      WHERE a.id = b.id  and a.id='.$id);
    if($query->num_rows()>0)
    {
      return $query->row_array();  
    }
         
  }
}  

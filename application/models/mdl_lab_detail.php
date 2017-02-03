<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_lab_detail extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }

  function get_table() 
  {
    $table = 'lab_detail';
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
    $data = $this->db->get_where('lab_detail',array('id_layanan'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('id, nama, inc');
    $this->db->like('nama', $nama, 'both');
    $this->db->order_by('id','asc');
    //$this->db->limit(10, 0);
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom2($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('indexUrut','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom3($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('indexUrut','asc');
    $query=$this->db->get($table);
    return $query->row_array();
  }

  function _insert($data)
  {
    $table = 'lab_detail';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'lab_detail';
    $this->db->where('id_layanan', $id);
    $this->db->update($table, $data);
  }

  function _update_tarif_lab($id_layanan, $bidang, $data)
  {
    $table = 'lab_detail';
    $this->db->where('id_layanan', $id_layanan);
    $this->db->where('bidang', $bidang);
    $this->db->update($table, $data);
  }

  function _update_where($column,$value,$data)
  {
    $table = 'lab_detail';
    $this->db->where($column, $value);
    $this->db->update($table, $data);
  }

  function _update_inc($nama,$inc)
  {
    $table = 'lab_detail';
    $this->db->where($column, $value);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'lab_detail';
    $this->db->where('id', $id);
    $this->db->delete($table);
  }

  function _delete_detail($bidang,$id_layanan)
  {
    $table = 'lab_detail';
    $this->db->where('bidang', $bidang);
    $this->db->where('id_layanan', $id_layanan);
    $this->db->delete($table);
  }

  function _delete_where($column,$value)
  {
    $table = 'lab_detail';
    $this->db->where($column, $value);
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

  function count_filter_where($bidang,$filter) 
  {
    $table = $this->get_table();
    if($filter!='')
    {
      $this->db->like('id_layanan', $filter, 'both');
    } 
    if($bidang!='')
    {
      $this->db->where('bidang', $bidang);
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
    $this->db->select_max('indexUrut');
    $query = $this->db->get($table);
    $row=$query->row();
    $indexUrut=$row->indexUrut;
    return $indexUrut;
  }

  function get_max_inc() 
  {
    $table = $this->get_table();
    $this->db->select_max('inc');
    $query = $this->db->get($table);
    $row=$query->row();
    $inc=$row->inc;
    return $inc;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $this->db->order_by('nama','asc');
    $query = $this->db->get('lab_detail');
    return $query->result_array();
  }

  function get_lab_detail($bidang)
  {
    $this->db->select('indexUrut, id_layanan','bidang');
    $this->db->from('lab_detail'); 
    $this->db->where('bidang', $bidang);
    $this->db->order_by('indexUrut','asc');
    return $this->db->get()->result_array();   
  }

  function get_harga_kel_tarif($kolom,$id_layanan)
  {
    $query = $this->db->query("select $kolom from lab_detail where id_layanan = '".$id_layanan."'");
    return $query->result_array();   
  }

  public function fetch_lab_detail($limit, $start,$filter,$bidang) 
   {
    $text = '';
    date_default_timezone_set("Asia/Jakarta");
    if($filter!='')
    {
      $text = $text.' and a.id_layanan like "%'.$filter.'%"';
    }
    if($bidang!='')
    {
      $text = $text.' and a.bidang ="'.$bidang.'"';
    }    
    $query = $this->db->query(" 
      SELECT a.* ,
      (SELECT GROUP_CONCAT(spesimen) spesimen FROM `lab_detail_spesimen` WHERE `id_layanan` = a.id_layanan) specimen,
      (SELECT concat('AVALIABLE [',COUNT(jenis),'] rows') hasil FROM lab_sub WHERE jenis = a.id_layanan ) setup_hasil
      FROM lab_detail a where 1=1 ".$text." ORDER BY a.bidang asc LIMIT ".$limit.' OFFSET '.$start);
    return $query->result_array();

  }

  public function fetch_lab_detail_v2() 
  {
    $text = '';
    date_default_timezone_set("Asia/Jakarta");
    $query = $this->db->query(" 
      SELECT a.* ,
      (SELECT GROUP_CONCAT(spesimen) spesimen FROM `lab_detail_spesimen` WHERE `id_layanan` = a.id_layanan) specimen,
      (SELECT concat('AVALIABLE [',COUNT(jenis),'] rows') hasil FROM lab_sub WHERE jenis = a.id_layanan ) setup_hasil
      FROM lab_detail a ORDER BY a.bidang asc ");
    return $query->result_array();

  }

  function fetch_tarif_lab($limit, $start,$filter,$bidang)
  {
    $table = 'lab_detail';
    if($filter!='')
    {
      $this->db->like('id_layanan', $filter, 'both');
    }
    if($bidang!='')
    {
      $this->db->where('bidang', $bidang);
    }      
    $this->db->order_by('bidang','asc');
    $this->db->limit($limit, $start);
    $query=$this->db->get($table);
    return $query->result_array();
  }
}  

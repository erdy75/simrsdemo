<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_gaji extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'gaji';
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
    $data = $this->db->get_where('gaji',array('kode_gaji'=>$id));
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
    $query=$this->db->get($table);
    return $query->row_array();
  }

  function _insert($data)
  {
    $table = 'gaji';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'gaji';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'gaji';
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
    $this->db->select_max('kode_gaji');
    $query = $this->db->get($table);
    $row=$query->row();
    $kode_gaji=$row->kode_gaji;
    return $kode_gaji;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $this->db->order_by('nama','asc');
    $query = $this->db->get('gaji');
    return $query->result_array();
  }

  function show_data_gaji($nama)
  {
    $query = $this->db->query('SELECT 
      a.id,
      a.nama,
      b.*
      from tdok_bio a, gaji b 
      WHERE a.id = b.id and a.nama = "'.$nama.'"');
    return $query->row_array();    
  }

  function count_rekapitulasi_gaji($periode_gaji)
  {
    $query = $this->db->query('SELECT 
      CONCAT(b.nama," [",b.id,"]") as nama,
      b.poli,
      b.alamat,
      (a.nilai_tambah - a.nilai_kurang) as tot_gaji,
      b.rekening,
      a.kode_gaji,
      a.periode
      FROM
      (SELECT 
      IF(a.kode_gaji is NULL,b.kode_gaji,a.kode_gaji) as kode_gaji,
      IF(a.id_personil is NULL,b.id_personil,a.id_personil) as id_personil,
      IF(a.nilai_kurang is NULL,0,a.nilai_kurang) as nilai_kurang,
      IF(b.nilai_tambah is NULL,0,b.nilai_tambah) as nilai_tambah,
      IF(a.periode_yyyymm is NULL,b.periode_yyyymm,a.periode_yyyymm) as periode
      FROM 
      (SELECT 
      a.kode_gaji,
      a.id_personil,
      a.periode_yyyymm, 
      IF(b.nilai=NULL,0,SUM(b.nilai)) as nilai_kurang 
      FROM gaji a, gaji_detail b WHERE a.kode_gaji = b.kode_gaji AND b.isTambah = "Tidak" GROUP BY a.kode_gaji) a
      RIGHT JOIN 
      (SELECT 
      a.kode_gaji,
      a.id_personil, 
      a.periode_yyyymm,
      IF(b.nilai=NULL,0,SUM(b.nilai)) as nilai_tambah 
      FROM gaji a, gaji_detail b WHERE a.kode_gaji = b.kode_gaji AND b.isTambah = "Ya" GROUP BY a.kode_gaji) b
      ON a.kode_gaji=b.kode_gaji) a,
      (SELECT 
        a.id, 
        a.nama, 
        c.poli, 
        a.alamat,
        CONCAT(c.bank," / ",c.cabang," / ",c.no_rek) as rekening
      from tdok_bio a, tdok_kepeg c 
      WHERE a.id = c.id 
      UNION SELECT 
        b.id, 
        b.nama, 
        d.bagian, 
        b.alamat as poli,
        CONCAT(d.bank," / ",d.cabang," / ",d.no_rek) as rekening
      from tkar_bio b, tkar_kepeg d 
      WHERE d.id = b.id) b
      WHERE a.id_personil = b.id and a.periode="'.$periode_gaji.'"');
    return $query->num_rows();    
  }

  function fetch_rekapitulasi_gaji($limit, $start, $periode_gaji)
  {
    $query = $this->db->query('SELECT 
      CONCAT(b.nama," [",b.id,"]") as nama,
      b.poli,
      b.alamat,
      (a.nilai_tambah - a.nilai_kurang) as tot_gaji,
      b.rekening,
      a.kode_gaji,
      a.periode
      FROM
      (SELECT 
      IF(a.kode_gaji is NULL,b.kode_gaji,a.kode_gaji) as kode_gaji,
      IF(a.id_personil is NULL,b.id_personil,a.id_personil) as id_personil,
      IF(a.nilai_kurang is NULL,0,a.nilai_kurang) as nilai_kurang,
      IF(b.nilai_tambah is NULL,0,b.nilai_tambah) as nilai_tambah,
      IF(a.periode_yyyymm is NULL,b.periode_yyyymm,a.periode_yyyymm) as periode
      FROM 
      (SELECT 
      a.kode_gaji,
      a.id_personil,
      a.periode_yyyymm, 
      IF(b.nilai=NULL,0,SUM(b.nilai)) as nilai_kurang 
      FROM gaji a, gaji_detail b WHERE a.kode_gaji = b.kode_gaji AND b.isTambah = "Tidak" GROUP BY a.kode_gaji) a
      RIGHT JOIN 
      (SELECT 
      a.kode_gaji,
      a.id_personil, 
      a.periode_yyyymm,
      IF(b.nilai=NULL,0,SUM(b.nilai)) as nilai_tambah 
      FROM gaji a, gaji_detail b WHERE a.kode_gaji = b.kode_gaji AND b.isTambah = "Ya" GROUP BY a.kode_gaji) b
      ON a.kode_gaji=b.kode_gaji) a,
      (SELECT 
        a.id, 
        a.nama, 
        c.poli, 
        a.alamat,
        CONCAT(c.bank," / ",c.cabang," / ",c.no_rek) as rekening
      from tdok_bio a, tdok_kepeg c 
      WHERE a.id = c.id 
      UNION SELECT 
        b.id, 
        b.nama, 
        d.bagian, 
        b.alamat as poli,
        CONCAT(d.bank," / ",d.cabang," / ",d.no_rek) as rekening
      from tkar_bio b, tkar_kepeg d 
      WHERE d.id = b.id) b
      WHERE a.id_personil = b.id and a.periode="'.$periode_gaji.'" LIMIT '.$start.','.$limit);
    return $query->result_array();    
  }
}  

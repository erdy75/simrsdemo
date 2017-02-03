<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class mdl_barang extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'barang';
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
    $data = $this->db->get_where('barang',array('id'=>$id));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }

  function get_where_v2($nama)
  {
    $data = $this->db->get_where('barang',array('nama'=>$nama));
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
    $table = 'barang';
    $this->db->insert($table, $data);
  }


  function _update($id, $data)
  {
    $table = 'barang';
    $this->db->where('id', $id);
    $this->db->update($table, $data);
  }

  function _delete($id)
  {
    $table = 'barang';
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
    $query = $this->db->get('barang');
    return $query->result_array();
  }
  
  public function fetch_barang($limit, $start,$kategori,$order_p, $nama) 
  {
    $text = '';
    if($kategori!='0')
    {
      $text .= ' and kategori_item="'.$kategori.'"';
    }

    if($nama!='')
    {
      $text .= ' and nama like "%'.$nama.'%"';
    }

    if($order_p=='Nama')
    {
      $text .= ' order by nama asc';
    } elseif($order_p=='Kemasan Kecil') {
      $text .= ' order by kemasan_kecil asc';
    } elseif($order_p=='Kemasan Sedang') {
      $text .= ' order by kemasan_sedang asc';
    } elseif($order_p=='Kemasan Besar') {
      $text .= ' order by kemasan_besar asc';
    } else {
      $text .= ' order by kategori_item asc';
    }   
    $query = $this->db->query('SELECT 
      id,
      nama,
      CONCAT(satuan,"") as kemasan_kecil,
      CONCAT(pengali_satuan_sedang," @ ", nama_satuan_sedang) as kemasan_sedang,
      CONCAT(pengali_satuan_besar," @ ", nama_satuan_besar) as kemasan_besar,
      kategori_item,
      jenis,
      generik,
      CONCAT(bentuk_sediaan," / ", dosis_sediaan) as sediaan,
      principal,
      barcode
      FROM barang
      WHERE 1=1 '.$text.' LIMIT '.$limit.' OFFSET '.$start);
    return $query->result_array();
  }

  public function count_barang($kategori,$order_p, $nama) 
  {
    $text = '';
    if($kategori!='0')
    {
      $text .= ' and kategori_item="'.$kategori.'"';
    }

    if($nama!='')
    {
      $text .= ' and nama like "%'.$nama.'%"';
    }

    if($order_p=='Nama')
    {
      $text .= ' order by nama asc';
    } elseif($order_p=='Kemasan Kecil') {
      $text .= ' order by kemasan_kecil asc';
    } elseif($order_p=='Kemasan Sedang') {
      $text .= ' order by kemasan_sedang asc';
    } elseif($order_p=='Kemasan Besar') {
      $text .= ' order by kemasan_besar asc';
    } else {
      $text .= ' order by kategori_item asc';
    }   
    $query = $this->db->query('SELECT 
      id,
      nama,
      CONCAT(satuan,"") as kemasan_kecil,
      CONCAT(pengali_satuan_sedang," @ ", nama_satuan_sedang) as kemasan_sedang,
      CONCAT(pengali_satuan_besar," @ ", nama_satuan_besar) as kemasan_besar,
      kategori_item,
      jenis,
      generik,
      CONCAT(bentuk_sediaan," / ", dosis_sediaan) as sediaan,
      principal,
      barcode
      FROM barang
      WHERE 1=1 '.$text);
    return $query->num_rows();
  }

  public function fetch_kartu_stock_keluar($nama)
  {
    $query = $this->db->query('SELECT 
      a.nama,
      DATE_FORMAT(c.expired,"%d-%m-%y") as tgl_nota,
      SUM(c.jumlah) as keluar,
      c.harga,
      CONCAT(c.no_kirim," / ",b.tujuan) as uraian,
      c.kelompok_stock
      FROM
      barang a,
      gudang_kirim b,
      gudang_kirim_detail c
      WHERE
      a.nama = c.nama_barang 
      AND b.no_kirim = c.no_kirim 
      and c.kelompok_stock = "GUDANG MEDIS"
      AND a.nama = "'.$nama.'"
      GROUP BY c.nama_barang');
    return $query->result_array();    
  }

  public function sum_kartu_stock_keluar ($nama)
  {
    $query = $this->db->query('
  SELECT SUM(a.keluar) as total
  FROM
  (
    SELECT 
      a.nama,
      DATE_FORMAT(c.expired,"%d-%m-%y") as tgl_nota,
      SUM(c.jumlah) as keluar,
      c.harga,
      CONCAT(c.no_kirim," / ",b.tujuan) as uraian,
      c.kelompok_stock
      FROM
      barang a,
      gudang_kirim b,
      gudang_kirim_detail c
      WHERE
      a.nama = c.nama_barang 
      AND b.no_kirim = c.no_kirim 
      and c.kelompok_stock = "GUDANG MEDIS"
      AND a.nama = "'.$nama.'"
      GROUP BY c.nama_barang 
  ) a' );
    return $query->row_array();    
  }  

  public function fetch_kartu_stock_masuk($nama)
  {
    $query = $this->db->query('SELECT 
      a.id,
      DATE_FORMAT(c.tgl_faktur_supplier,"%d-%m-%Y") as tgl_faktur,
      b.nama,
      a.jumlah as masuk,
      (a.harga_beli + (c.ppn * a.harga_beli) - (a.harga_beli*a.disc)/100) as harga,
      CONCAT(c.no_faktur," / ",c.supplier) as uraian,
      c.kelompok_stock
      from gudang_terima_detail a, barang b , gudang_terima c
      WHERE a.id = b.id and c.no_faktur = a.no_faktur and b.nama = "'.$nama.'" 
      ORDER BY tgl_faktur');
    return $query->result_array();    
  }

  public function sum_kartu_stock_masuk($nama)
  {
    $query = $this->db->query('
    SELECT SUM(a.masuk) as total
    FROM
    (
    SELECT 
      a.id,
      DATE_FORMAT(c.tgl_faktur_supplier,"%d-%m-%Y") as tgl_faktur,
      b.nama,
      a.jumlah as masuk,
      (a.harga_beli + (c.ppn * a.harga_beli) - (a.harga_beli*a.disc)/100) as harga,
      CONCAT(c.no_faktur," / ",c.supplier) as uraian,
      c.kelompok_stock
      from gudang_terima_detail a, barang b , gudang_terima c
      WHERE a.id = b.id and c.no_faktur = a.no_faktur and b.nama = "'.$nama.'" 
      ORDER BY tgl_faktur
    ) A');
    return $query->row_array();    
  }

  function count_barang_simple($nama)
  {
    $table = $this->get_table();
    if(!empty($nama))
    {
      $this->db->like('nama', $nama); 
    }
    $query=$this->db->get($table);
    $num_rows = $query->num_rows();
    return $num_rows; 
  }

  function get_nama_barang($limit, $offset, $nama) 
  {
    $table = $this->get_table();
    $this->db->limit($limit, $offset);
    if(!empty($nama))
    {
      $this->db->like('nama', $nama); 
    }
    $this->db->order_by('nama', 'asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }
}  

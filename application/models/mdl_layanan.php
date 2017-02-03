<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_layanan extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'layanan';
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
    $data = $this->db->get_where('lab_periksa',array('no_order'=>$no_order));
    if($data->num_rows()==1){
        return $data->row_array();
    }else{
        return FALSE;
    }
  }


  function get_where_custom($nama) 
  {
    $table = $this->get_table();
    $this->db->select('no_order, nama_prov');
    $this->db->like('nama_prov', $nama, 'both');
    $this->db->order_by('no_order','asc');
    //$this->db->limit(10, 0);
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function get_where_custom2($col, $value) 
  {
    $table = $this->get_table();
    $this->db->where($col, $value);
    $this->db->order_by('no_order','asc');
    $query=$this->db->get($table);
    return $query->result_array();
  }

  function _insert($data)
  {
    $table = 'lab_periksa';
    $this->db->insert($table, $data);
  }


  function _update($no_order, $data)
  {
    $table = 'lab_periksa';
    $this->db->where('no_order', $no_order);
    $this->db->update($table, $data);
  }

  function _delete($no_order)
  {
    $table = 'lab_periksa';
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

  function count_filter_where($id_pasien) 
  {
   $out =  $this->db->query("SELECT `faktur`, `id_layanan`, `harga_satuan`, `total`, `id_dokter`, `poli`, `keterangan`, `inap_jalan`, `tgl`, `jam`, `cib`, `pasien_tampil`, `alamat_tampil`, `umur_tampil`, `sex_tampil`, `inc`, `dokterRefferal`, `id_user`, `ip_baca`, `nama_paket_if_paket`, `gratis_disc`, `referensi_no_upf`, `type_Tindakan_Sewa_BHP`, `_not_used_6`, `_not_used_7` FROM `layanan` WHERE cib = $id_pasien and poli='LABORATORIUM'");
    $num_rows = $out->num_rows();
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
    $this->db->select_max('no_order');
    $query = $this->db->get($table);
    $row=$query->row();
    $no_order=$row->no_order;
    return $no_order;
  }

  function _custom_query($mysql_query) 
  {
    $query = $this->db->query($mysql_query);
    return $query;
  }

  function get_all()
  {
    $query = $this->db->get('lab_periksa');
    return $query->result_array();
  }


  public function fetch_layanan($limit, $start,$id_pasien) 
  {

    $out =  $this->db->query("SELECT `faktur`, `id_layanan`, `harga_satuan`, `total`, `id_dokter`, `poli`, `keterangan`, `inap_jalan`, `tgl`, `jam`, `cib`, `pasien_tampil`, `alamat_tampil`, `umur_tampil`, `sex_tampil`, `inc`, `dokterRefferal`, `id_user`, `ip_baca`, `nama_paket_if_paket`, `gratis_disc`, `referensi_no_upf`, `type_Tindakan_Sewa_BHP`, `_not_used_6`, `_not_used_7` FROM `layanan` WHERE cib = $id_pasien AND  poli='LABORATORIUM' ORDER BY `cib` DESC LIMIT $start,$limit");

    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function get_id_layanan($nama)
  {
    $table = $this->get_table();
    $this->db->select('id, nama, nama_poli');
    $this->db->where('nama', $nama);
    $this->db->where('nama_poli', 'laboratorium');
    $out=$this->db->get($table);

    if($out->num_rows()>0)
    {
      $data = $out->row_array();
      return $data;
    }    
  }

}  
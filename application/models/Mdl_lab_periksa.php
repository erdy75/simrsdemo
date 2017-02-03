<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mdl_lab_periksa extends CI_Model {

  function __construct() 
  {
    parent::__construct();
  }
  function get_table() 
  {
    $table = 'lab_periksa';
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

  function count_filter_where($filter) 
  {
    $mydate=getdate(date("U"));
    $bln_srkg = $mydate['mon'];    
    $out =  $this->db->query("SELECT `no_order`, `status`, `cib`, `dokter`, `tanggal`, `jam`, `KelompokBeli`, `penanggung_jawab`, `pemeriksa`, `nama_manual_edit`, `umur_manual_edit`, `alamat_manual_edit`, `sex_manual_edit`, `petugas_entry`, `penjamin_manual_edit`, `jalan_inap`, `kamar_if_ranap`, `remark`, `isApproved`, `catatan_hasil_periksa`, `no_reg_lab_internal`, `not_used_2`, `not_used_3`, `not_used_4`, `not_used_5`, `not_used_6` FROM `lab_periksa` WHERE month(tanggal) = '".$bln_srkg."' AND `status` in ('waiting','sementara')");
    $num_rows = $out->num_rows();
    return $num_rows;
  }

  function count_rek_transaksi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    $text = '';
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = 'order by a.no_order';
    } else {
      $order = 'order by nilai';
    }
    $out = $this->db->query('select 
      a.no_order, 
      CONCAT(a.nama_manual_edit," ",a.umur_manual_edit," thn / ",a.cib) as nama_pasien,
      a.dokter,
      a.KelompokBeli,
      a.penjamin_manual_edit,
      (SELECT SUM(tarif) from lab_periksa_detail where no_order=a.no_order) as nilai,
      (SELECT SUM(unit_cost) from lab_periksa_detail where no_order=a.no_order) as unit_cost,
      (SELECT SUM(tarif - unit_cost) from lab_periksa_detail where no_order=a.no_order) as total_cost,
      a.tanggal, a.jam,
      a.penanggung_jawab,
      a.jalan_inap,
      IF(a.isApproved="Yes",CONCAT("[Rjk] ", a.no_reg_lab_internal),a.no_reg_lab_internal) as no_urut
      from lab_periksa a WHERE "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" '.$text);
    $num_rows = $out->num_rows();
    return $num_rows;
  }

  function count_det_transaksi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    $text = '';
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = 'order by a.no_order';
    } else {
      $order = 'order by nilai';
    }
    $out = $this->db->query('select 
      a.no_order, 
      CONCAT(a.nama_manual_edit," ",a.umur_manual_edit," thn / ",a.cib) as nama_pasien,
      a.dokter,
      a.KelompokBeli,
      a.penjamin_manual_edit,
      b.nama_pemeriksaan,
      (b.tarif) as nilai,
      (b.unit_cost) as unit_cost,
      (b.tarif - b.unit_cost) as total_cost,
      a.tanggal, a.jam,
      a.penanggung_jawab,
      a.jalan_inap,
      IF(a.isApproved="Yes",CONCAT("[Rjk] ", a.no_reg_lab_internal),a.no_reg_lab_internal) as no_urut
      from lab_periksa a, lab_periksa_detail b 
      WHERE a.no_order = b.no_order AND "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'"'.$text);
    $num_rows = $out->num_rows();
    return $num_rows;
  }

  function total_tarif($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = 'order by a.no_order';
    } else {
      $order = 'order by nilai';
    }
    $out = $this->db->query('select sum(b.tarif) as tarif_total from lab_periksa a, lab_periksa_detail b 
      WHERE "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" AND
      a.no_order = b.no_order '.$text);
    return $out->row_array();
  }

  function total_unit_cost($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = 'order by a.no_order';
    } else {
      $order = 'order by nilai';
    }
    $out = $this->db->query('select sum(b.unit_cost) as total from lab_periksa a, lab_periksa_detail b 
      WHERE "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" AND
      a.no_order = b.no_order '.$text);
    return $out->row_array();
  }

  function total_laba_rugi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = 'order by a.no_order';
    } else {
      $order = 'order by nilai';
    }
    $out = $this->db->query('select sum(b.tarif - b.unit_cost) as total from lab_periksa a, lab_periksa_detail b 
      WHERE "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" AND
      a.no_order = b.no_order '.$text);
    return $out->row_array();
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

  function get_max_cib() 
  {
    $table = $this->get_table();
    $this->db->select_max('cib');
    $query = $this->db->get($table);
    $row=$query->row();
    $cib=$row->cib;
    return $cib;
  }

  function get_max_no_reg() 
  {
    $tgl = date('Y-m-d');
    $table = $this->get_table();
    $this->db->select_max('no_reg_lab_internal');
    $this->db->where('tanggal',$tgl);
    $query = $this->db->get($table);
    $row=$query->row();
    $no_reg_lab_internal=$row->no_reg_lab_internal;
    return $no_reg_lab_internal;
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


  public function fetch_lab_periksa($limit, $start,$filter) 
  {
    $mydate=getdate(date("U"));
    $bln_srkg = $mydate['mon'];


    $out =  $this->db->query("SELECT `no_order`, `status`, `cib`, `dokter`, `tanggal`, `jam`, `KelompokBeli`, `penanggung_jawab`, `pemeriksa`, `nama_manual_edit`, `umur_manual_edit`, `alamat_manual_edit`, `sex_manual_edit`, `petugas_entry`, `penjamin_manual_edit`, `jalan_inap`, `kamar_if_ranap`, `remark`, `isApproved`, `catatan_hasil_periksa`, `no_reg_lab_internal`, `not_used_2`, `not_used_3`, `not_used_4`, `not_used_5`, `not_used_6` FROM `lab_periksa` WHERE month(tanggal) = '".$bln_srkg."' AND `status` in ('waiting','sementara')  ORDER BY `no_order` DESC LIMIT $start,$limit");

    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function fetch_rek_transaksi($limit,$start,$periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = ' order by a.no_order';
    } else {
      $order = ' order by nilai';
    }
    $out = $this->db->query('select 
      a.no_order, 
      CONCAT(a.nama_manual_edit," ",a.umur_manual_edit," thn / ",a.cib) as nama_pasien,
      a.dokter,
      a.KelompokBeli,
      a.penjamin_manual_edit,
      (SELECT SUM(tarif) from lab_periksa_detail where no_order=a.no_order) as nilai,
      (SELECT SUM(unit_cost) from lab_periksa_detail where no_order=a.no_order) as unit_cost,
      (SELECT SUM(tarif - unit_cost) from lab_periksa_detail where no_order=a.no_order) as total_cost,
      a.tanggal, a.jam,
      a.penanggung_jawab,
      a.jalan_inap,
      IF(a.isApproved="Yes",CONCAT("[Rjk] ", a.no_reg_lab_internal),a.no_reg_lab_internal) as no_urut
      from lab_periksa a WHERE "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" '.$text.$order.' LIMIT '.$start.','.$limit);
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function fetch_det_transaksi($limit,$start,$periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if($jenis_pasien!='')
    {
      if($jenis_pasien=='UMUM') { 
        $text .= ' and a.KelompokBeli ="UMUM"'; 
      } elseif ($jenis_pasien=='ASURANSI') {
        $text .= ' and a.KelompokBeli ="ASURANSI"';
      } elseif ($jenis_pasien=='KARYAWAN') {
        $text .= ' and a.KelompokBeli ="KARYAWAN"';
      } else {
        $text .= '';
      }
    }
    if($penjamin!='-')
    {
      $text .= ' and a.penjamin_manual_edit = "'.$penjamin.'"';
    }
    if($rawat!='-')
    {
      $text .= ' and a.jalan_inap = "'.$rawat.'"';
    }
    if($filter_pencarian=='No RM / Nama') 
    {
      if($pencarian!='') {
        $text .= ' and a.nama_manual_edit like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Dr Pengirim') {
      if($pencarian!='') {
        $text .= ' and a.dokter like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Status') {
      if($pencarian!='') {
        $text .= ' and a.status like "%'.$pencarian.'%"';
      }
    } elseif ($filter_pencarian=='Analis Lab') {
      if($pencarian!='') {
        $text .= ' and a.pemeriksa like "%'.$pencarian.'%"';
      }
    } else {
      if($pencarian!='') {
        $text .= ' and a.petugas_entry like "%'.$pencarian.'%"';
      }
    }
    if($order_p=='pasien')
    {
      $order = ' order by a.no_order';
    } else {
      $order = ' order by nilai';
    }
    $out = $this->db->query('select 
      a.no_order, 
      CONCAT(a.nama_manual_edit," ",a.umur_manual_edit," thn / ",a.cib) as nama_pasien,
      a.dokter,
      a.KelompokBeli,
      a.penjamin_manual_edit,
      b.nama_pemeriksaan,
      (b.tarif) as nilai,
      (b.unit_cost) as unit_cost,
      (b.tarif - b.unit_cost) as total_cost,
      a.tanggal, a.jam,
      a.penanggung_jawab,
      a.jalan_inap,
      IF(a.isApproved="Yes",CONCAT("[Rjk] ", a.no_reg_lab_internal),a.no_reg_lab_internal) as no_urut
      from lab_periksa a, lab_periksa_detail b 
      WHERE a.no_order = b.no_order AND "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'"'.$text.$order.' LIMIT '.$start.','.$limit);
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function get_by_jenis()
  {
    $out = $this->db->query('SELECT KelompokBeli FROM lab_periksa GROUP BY KelompokBeli');
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }    
  }
  function count_by_jenis($tanggal,$jenis)
  {
    $out = $this->db->query("SELECT count(KelompokBeli) as jml from lab_periksa where tanggal = '".$tanggal."' and KelompokBeli = '".$jenis."'");
    if($out->num_rows()>0)
    {
      return $out->row()->jml;
    }    
  }

  function count_by_penjamin($tanggal,$penjamin)
  {
    $out = $this->db->query("SELECT count(penjamin_manual_edit) as jml from lab_periksa 
            where tanggal = '".$tanggal."' and penjamin_manual_edit = '".$penjamin."'");
    if($out->num_rows()>0)
    {
      return $out->row()->jml;
    }    
  }

  function jml_tot_penjamin($tgl_awal,$tgl_akhir,$penjamin)
  {
    $out = $this->db->query("SELECT count(penjamin_manual_edit) as jml 
      from lab_periksa where '".$tgl_awal."' <= tanggal and  tanggal <= '".$tgl_akhir."' 
      and penjamin_manual_edit = '".$penjamin."'");
    if($out->num_rows()>0)
    {
      return $out->row()->jml;
    }     
  }

  function q_by_pemeriksaan($tanggal)
  {
    $text = '';
    $out = $this->db->query('SELECT id_layanan FROM lab_detail');
    if($out->num_rows()>0)
    {
      $listdata = $out->result_array();
      $text .= "SELECT ";
      for ($i=0; $i < count($listdata) ; $i++) { 
        if ($i == 0)
        {
          $text .= "IFNULL(SUM(IF(a.nama_pemeriksaan='".$listdata[$i]['id_layanan']."',a.jumlah,0)),0) `".$listdata[$i]['id_layanan']."` ";
        } else {
          $text .= ",IFNULL(SUM(IF(a.nama_pemeriksaan='".$listdata[$i]['id_layanan']."',a.jumlah,0)),0) `".$listdata[$i]['id_layanan']."` ";  
        }
      }
      $text .= ",IFNULL(SUM(a.jumlah),0) `TOTAL` ";
      $text .= "FROM 
                (SELECT COUNT(1) jumlah, a.nama_pemeriksaan, b.tanggal 
                FROM lab_periksa_detail a, lab_periksa b 
                WHERE  a.no_order = b.no_order and b.tanggal = '".$tanggal."' GROUP BY a.nama_pemeriksaan) a;";
      return $text;          
    }    
  }

  function q_by_pemeriksaan_v2($periode,$rawat)
  {
    $text = '';$add_rawat='';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    $out = $this->db->query('SELECT id_layanan FROM lab_detail');
    if($rawat!='-')
    {
      $add_rawat = " and a.jalan_inap = '".$rawat."'";
    }
    if($out->num_rows()>0)
    {
      $listdata = $out->result_array();
      $text .= "SELECT a.KelompokBeli ,";
      for ($i=0; $i < count($listdata) ; $i++) { 
        if ($i == 0)
        {
          $text .= "IFNULL(SUM(IF(a.nama_pemeriksaan='".$listdata[$i]['id_layanan']."',a.jumlah,0)),0) `".$listdata[$i]['id_layanan']."` ";
        } else {
          $text .= ",IFNULL(SUM(IF(a.nama_pemeriksaan='".$listdata[$i]['id_layanan']."',a.jumlah,0)),0) `".$listdata[$i]['id_layanan']."` ";  
        }
      }
      $text .= "FROM (
                SELECT a.KelompokBeli,b.nama_pemeriksaan,COUNT(1) jumlah
                FROM `lab_periksa` a,lab_periksa_detail b 
                WHERE a.no_order=b.no_order 
                and '".$tgl_awal."' <= tanggal and  tanggal <= '".$tgl_akhir."'".$add_rawat. 
                "GROUP BY a.KelompokBeli,b.nama_pemeriksaan) a  
              GROUP BY a.KelompokBeli;";
      return $text;          
    }    
  }

  function q_by_pemeriksaan_v3($periode,$rawat)
  {
    $text = '';$add_rawat='';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    $out = $this->db->query('SELECT id_layanan FROM lab_detail');
    if($rawat!='-')
    {
      $add_rawat = " and a.jalan_inap = '".$rawat."'";
    }
    if($out->num_rows()>0)
    {
      $listdata = $out->result_array();
      $text .= "SELECT a.penjamin_manual_edit ,";
      for ($i=0; $i < count($listdata) ; $i++) { 
        if ($i == 0)
        {
          $text .= "IFNULL(SUM(IF(a.nama_pemeriksaan='".$listdata[$i]['id_layanan']."',a.jumlah,0)),0) `".$listdata[$i]['id_layanan']."` ";
        } else {
          $text .= ",IFNULL(SUM(IF(a.nama_pemeriksaan='".$listdata[$i]['id_layanan']."',a.jumlah,0)),0) `".$listdata[$i]['id_layanan']."` ";  
        }
      }
      $text .= "FROM (
                SELECT a.penjamin_manual_edit,b.nama_pemeriksaan,COUNT(1) jumlah
                FROM `lab_periksa` a,lab_periksa_detail b 
                WHERE a.no_order=b.no_order 
                and '".$tgl_awal."' <= tanggal and  tanggal <= '".$tgl_akhir."'".$add_rawat. 
                "GROUP BY a.penjamin_manual_edit,b.nama_pemeriksaan) a  
              GROUP BY a.penjamin_manual_edit;";
      return $text;          
    }    
  }

  function get_by_pemeriksaan($tanggal)
  {
    $out = $this->db->query($this->q_by_pemeriksaan($tanggal));
    if($out->num_rows()>0)
    {
      return $out->row_array();
    }
  }

  function rekap_hasil_lab_by_jenis_pasien($periode,$rawat)
  {
    $out = $this->db->query($this->q_by_pemeriksaan_v2($periode,$rawat));
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function rekap_hasil_lab_by_penjamin($periode,$rawat)
  {
    $out = $this->db->query($this->q_by_pemeriksaan_v3($periode,$rawat));
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function get_nama_pemeriksaan()
  {
    $out = $this->db->query('SELECT id_layanan FROM lab_detail');
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }
  }

  function get_detail_history($periode,$cari_nama)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if(trim($cari_nama)!='')
    {
      $text = ' and a.nama_manual_edit like "%'.$cari_nama.'%"';
    }
    $out = $this->db->query('
      SELECT 
      a.no_order,
      a.tanggal,
      CONCAT(a.nama_manual_edit," (",a.umur_manual_edit, " Thn)") as pasien,
      a.dokter,
      b.pemeriksaan,
      b.nilai,
      b.nilai_normal,
      c.metode,
      IF( b.pemeriksaan="","immunologi","") as spesimen
      FROM lab_periksa a, lab_medical_record b, (
        SELECT 
        a.no_order,
        b.nama,
        a.bidang,
        b.jenis,
        b.metode 
        FROM lab_periksa_detail a, lab_sub b
        where a.bidang = b.bidang and a.nama_pemeriksaan = b.jenis
      ORDER BY b.bidang) c
      WHERE a.no_order = b.no_order 
      and  "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" '.$text.
      'and b.no_order = c.no_order and b.pemeriksaan = c.nama
      ORDER BY a.no_order;
    ');
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }    
  }

  function get_rekapan($periode,$cari_nama)
  {
    $text = '';
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    if(trim($cari_nama)!='')
    {
      $text = ' and a.nama_manual_edit like "%'.$cari_nama.'%"';
    }
    $out = $this->db->query('
      SELECT 
      b.nama_pemeriksaan, COUNT(1) jumlah, c.metode
      from lab_periksa a, lab_periksa_detail b, lab_detail c
      WHERE a.no_order = b.no_order 
      and  "'.$tgl_awal.'" <= a.tanggal and  a.tanggal <= "'.$tgl_akhir.'" '.$text.'
      and b.nama_pemeriksaan = c.id_layanan and b.bidang = c.bidang 
      GROUP BY b.nama_pemeriksaan;
    ');
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }        
  }
  function get_rekap_lab_spesimen($periode)
  {
    $periode_split = explode(" - ", $periode);
    $tgl_awal = $this->date->konversi2b($periode_split[0]);
    $tgl_akhir = $this->date->konversi2b($periode_split[1]);
    $out = $this->db->query('
      SELECT
      a.no_order,
      a.nama_manual_edit,
      a.sex_manual_edit,
      a.umur_manual_edit,
      a.dokter,
      ("") as diagnosa,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="DL" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as DL,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="UL" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as UL,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="FL" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as FL,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Kimia Darah" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Kimia_Darah,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Kimia Cairan" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Kimia_Cairan,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Parasitologi" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Parasitologi,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Serologi" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Serologi,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Immunologi" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Immunologi,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Mikrobiologi" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Mikrobiologi,
      (SELECT count(spesimen) from lab_detail_spesimen  where spesimen="Narkoba" and id_layanan in (
        SELECT nama_pemeriksaan from lab_periksa_detail where a.no_order = no_order ) ) as Narkoba,
      ("Baik") as keadaan_spesimen,
      a.jam,
      a.petugas_entry
      from lab_periksa a
      where "2016-07-1" <= a.tanggal and  a.tanggal <= "2016-07-27"
      GROUP BY a.no_order;
    ');
    if($out->num_rows()>0)
    {
      return $out->result_array();
    }    
  }
}  

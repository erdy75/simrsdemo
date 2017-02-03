<?php defined('BASEPATH') OR exit('No direct script access allowed');

class gaji_dokter_n_karyawan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_tdok_kepeg','tdok_kepeg');
        $this->load->model('mdl_tkar_kepeg','tkar_kepeg');
        $this->load->model('mdl_tdok_bio','tdok_bio');
        $this->load->model('mdl_tkar_bio','tkar_bio');
        $this->load->model('mdl_gaji','gaji');
        $this->load->model('mdl_gaji_detail','gaji_detail');
        $this->load->model('mdl_poli','poli');
        $this->load->model('mdl_jabatan','jabatan');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_dokter'] = $this->tdok_bio->get('nama')->result_array();
        $data['list_kar'] = $this->tkar_bio->get('nama')->result_array();
        $this->admin_template_minor->display_with_sidebar('personalia/gaji_dokter_n_karyawan_view', $data);
	}

    public function ajax_show_data()
    {
        $pilih = $this->input->post('pilih');        
        $nama_dokter = $this->input->post('nama_dokter');
        $periode = $this->input->post('periode');
        $karyawan = $this->input->post('karyawan');
        $periode_gaji = $this->input->post('periode_gaji');
        $metod_pembayaran = $this->input->post('metod_pembayaran');
        $data['list_keterangan'] = array('Tunjangan Hari Raya','Tunjangan Tahun Baru', 'Tunjangan Lain-lain','Bonus / Reward', 'Potongan Pajak', 'Potongan Kas Bon', 'Potongan Koperasi', 'Potongan Dana Pensiun');
        $data['periode_gaji'] = $periode_gaji;
        $data['metod_pembayaran'] = $metod_pembayaran;
        
        if($pilih=='Dokter')
        {
            $data['list_data'] = $this->tdok_kepeg->show_data_gaji($nama_dokter); 
            //echo $nama_dokter;
        }
        else
        {
            //echo $nama_dokter;
            $data['list_data'] = $this->tkar_kepeg->get_where_custom2('nama', $karyawan); 
        }
        $this->load->view('personalia/ajax_show_data', $data);
    }

    public function ajax_total_gaji()
    {
        $tot_pengurangan = $this->input->post('tot_pengurangan');
        $tot_penambahan = $this->input->post('tot_penambahan');
        $total = $tot_penambahan - $tot_pengurangan;
        echo '<h3> Total Penambahan : Rp.'.$this->admin_template_minor->uang_format($tot_penambahan).'</h3><br />';
        echo '<h3> Total Pengurangan : Rp.'.$this->admin_template_minor->uang_format($tot_pengurangan).'</h3><br /><hr>';
        echo '<h3> Total Keselurhan : Rp.'.$this->admin_template_minor->uang_format($total).'</h3><br />';
        // konfigurasi pagination 

    }

    public function ubah()
    {
        $nama_m = '';
        $data['id_personil'] = $this->input->post('id');
        $bundle_data = $this->input->post('bundle_data');
        print_r($bundle_data);
        $data['periode_yyyymm'] = $this->input->post('periode_gaji');
        $data['pembayaran'] = $this->input->post('metod_pembayaran');
        $data['isSudahTerima'] = 'Belum';
        $data['kode_gaji'] = $this->gaji->get_max() + 1;
        $this->gaji->_insert($data);
        for ($i=0; $i < count($bundle_data) ; $i++) { 
            $arr_bund = explode('###', $bundle_data[$i]);
            if($arr_bund[0]!=$nama_m)
            {
                $data_det['kode_gaji'] = $data['kode_gaji'];
                $data_det['nama_item'] = $arr_bund[0];
                if(!empty($arr_bund[1]))
                {
                    $data_det['nilai'] = $arr_bund[1];
                    $data_det['isTambah'] = 'Ya';    
                }
                else
                {
                    $data_det['nilai'] = $arr_bund[2];
                    $data_det['isTambah'] = 'Tidak'; 
                }
                $data_det['inc'] = $i;
                $this->gaji_detail->_insert($data_det);
            }
            $nama_m = $arr_bund[0];
        }
        //redirect(base_url()."index.php/personalia/gaji_dokter_n_karyawan");
    }

    public function modal_daftar_karyawan($id=null)
    {
        $data['listpoli'] = $this->poli->_show_poli_karywan('poli','Penunjang Medis','Penunjang Non Medis');
        $data['listdarah'] = array("O","A","B","AB");
        $data['list_id'] = array("KTP","SIM","PASSPORT");
        $data['jenis_kelamin'] = array("Pria","Wanita");
        $data['list_kategori'] = array("Paramedis Perawatan","Paramedis Non Perawatan","Non Medis");
        $data['list_jabatan'] = $this->jabatan->get_all();

        $data['list_tahun']=array();$j=0;

        for ($i=1950; $i < 2051 ; $i++) { 
            $a = array($j => "$i");
            array_push($data['list_tahun'], $i);
            $j++;
        }
        // var_dump($data['list_tahun']);
        if(!empty($id))
        {
            $data['id'] = $id;
            $data['info_data'] = $this->tkar_bio->show_data_by_id($id);
            $data['info_data2'] = $this->tkar_kepeg->get_where_custom2('id', $id);   
        } else {
            $data['id'] = 0;
            $data['info_data'] = $this->tkar_bio->show_data_by_id(0);
            $data['info_data2'] = $this->tkar_kepeg->get_where_custom2('id', 0);
        }
        

        $this->load->view('/personalia/modal_daftar_karyawan',$data);
    }


    public function edit_data_karyawan() 
    {
        $id = $this->input->post('id');
        $data_bio['nama'] = $this->input->post('nama_lengkap');
        $data_bio['alamat'] = $this->input->post('alamat');
        $data_bio['tempat'] = $this->input->post('tempat_lahir');
        $data_bio['tgl_lahir'] = $this->date-> konversi2b($this->input->post('tanggal_lahir'));
        $data_bio['id_card'] = $this->input->post('list_id');
        $data_bio['id_no'] = $this->input->post('indentitas');
        $data_bio['telp'] = $this->input->post('no_telp');
        $data_bio['hp1'] = $this->input->post('hp');
        $data_bio['sex'] = $this->input->post('sex');
        $data_bio['darah'] = $this->input->post('darah');
        $data_bio['lain'] = $this->input->post('lain_lain');
        $data_bio['TMT_masuk'] = $this->input->post('tmt_masuk');
        $data_bio['status'] = "Aktif";


        $data_kepeg['kategori'] = $this->input->post('kategori');
        $data_kepeg['bagian'] = $this->input->post('poli');
        $data_kepeg['jabatan'] = $this->input->post('jabatan');
        $data_kepeg['gajipokok'] = $this->input->post('gaji_pokok');
        $data_kepeg['trans'] = $this->input->post('tj_transport');
        $data_kepeg['makan'] = $this->input->post('tj_makan');
        $data_kepeg['kehadiran'] = $this->input->post('tj_kehadiran');
        $data_kepeg['bank'] = $this->input->post('nama_bank');
        $data_kepeg['cabang'] = $this->input->post('cabang');
        $data_kepeg['no_rek'] = $this->input->post('kode_rek');
        

        $data_pass['password'] = '0101'.str_replace('-', '', $this->input->post('tanggal_lahir'));
        $data_pass['status'] = 'open';
        $data_pass['akses'] = '10000000000000000000000000';
        if ($id==0) 
        {
            $data_bio['id'] = intval($this->tkar_bio->get_max()) + 1;
            $data_kepeg['id'] = $data_bio['id'];
            $data_pass['id'] = $data_bio['id'];
            $this->tkar_bio->_insert($data_bio);
            $this->tkar_kepeg->_insert($data_kepeg);
            $this->tkar_passwd->_insert($data_pass);
        } else {
            $this->tkar_bio->_update($id,$data_bio);
            $this->tkar_kepeg->_update($id,$data_kepeg);
        }

        redirect(base_url()."index.php/personalia/daftar_karyawan");
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status'); 
        $cari_nama = $this->input->post('cari_nama');
        $order_p = $this->input->post('order_p');
        $page = $this->input->post('page');
        $this->tkar_bio->_delete($id);
        $this->tkar_kepeg->_delete($id);
        $this->tkar_passwd->_delete($id);
        if($page==0)
        {
            echo '<script> 
            var cari_nama = "'.$cari_nama.'";
            var order_p = "'.$order_p.'";
            $.ajax({
                type: "POST",
                data: "ajax=1&cari_nama="+cari_nama+"&order_p="+order_p,
                url: "'.base_url().'index.php/personalia/daftar_karyawan/ajax_daftar_karyawan",
                success: function(msg) {
                  $("div#show_list").html(msg);
                }
              });
            </script>';
        }
        else
        {
            echo '<script> 
            var cari_nama = "'.$cari_nama.'";
            var order_p = "'.$order_p.'";
            $.ajax({
                type: "POST",
                data: "ajax=1&cari_nama="+cari_nama+"&order_p="+order_p,
                url: "'.base_url().'index.php/personalia/daftar_karyawan/ajax_daftar_karyawan/'.$page.'",
                success: function(msg) {
                  $("div#show_list").html(msg);
                }
              });
            </script>';            
        }
    }
}
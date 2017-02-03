<?php defined('BASEPATH') OR exit('No direct script access allowed');

class daftar_karyawan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_tkar_bio','tkar_bio');
        $this->load->model('mdl_tkar_kepeg','tkar_kepeg');
        $this->load->model('mdl_tkar_passwd','tkar_passwd');
        $this->load->model('mdl_poli','poli');
        $this->load->model('mdl_jabatan','jabatan');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_urut'] = array("ID","Nama", "Poli/Unit");
        $this->admin_template_minor->display_with_sidebar('personalia/daftar_karyawan_view', $data);
	}


    public function ajax_daftar_karyawan()
    {
        $cari_nama = $this->input->post('cari_nama');
        $order_p = $this->input->post('order_p');
        $count = $this->tkar_bio->count_daftar_karyawan($cari_nama,$order_p);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/personalia/daftar_karyawan/ajax_daftar_karyawan";        
        $config["total_rows"] = $count;
        $config["per_page"] = 10;
        $config["uri_segment"] = 4;
        $config['use_page_numbers'] = TRUE;
        $config['cur_tag_open'] = ' ';
        $config['cur_tag_close'] = '';
        $config['next_link'] = 'Sesudah';   
        $config['prev_link'] = 'Sebelum';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['page'] = $page;
        if ($page!=0)
        {
            $page = $config["per_page"] * ($page-1);   
        }

        $listdata = $this->tkar_bio->fetch_daftar_karyawan($config["per_page"], $page, $cari_nama,$order_p);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/personalia/ajax_daftar_karyawan',$data);    
        } else {
            $this->load->view('/personalia/ajax_daftar_karyawan',$data);   
        }
    }

    public function update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status'); 
        $cari_nama = $this->input->post('cari_nama');
        $order_p = $this->input->post('order_p');
        $page = $this->input->post('page');

        if($status=="Aktif")
        {
            $data['status'] = "Non Aktif";
        } else {
            $data['status'] = "Aktif";
        }      
        $this->tkar_bio->_update($id,$data);
        
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
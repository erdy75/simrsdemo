<?php defined('BASEPATH') OR exit('No direct script access allowed');

class daftar_dokter extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_tdok_bio','tdok_bio');
        $this->load->model('mdl_tdok_kel','tdok_kel');
        $this->load->model('mdl_tdok_kepeg','tdok_kepeg');
        $this->load->model('mdl_tdok_passwd','tdok_passwd');
        $this->load->model('mdl_tdok_pend','tdok_pend');
        $this->load->model('mdl_poli','poli');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_urut'] = array("ID","Nama", "Poli/Unit");
        $this->admin_template_minor->display_with_sidebar('personalia/daftar_dokter_view', $data);
	}


    public function ajax_daftar_dokter()
    {
        $cari_nama = $this->input->post('cari_nama');
        $order_p = $this->input->post('order_p');
        $count = $this->tdok_bio->count_daftar_dokter($cari_nama,$order_p);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/personalia/daftar_dokter/ajax_daftar_dokter";        
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
        if ($page!=0)
        {
            $page = $config["per_page"] * ($page-1);   
        }

        $listdata = $this->tdok_bio->fetch_daftar_dokter($config["per_page"], $page, $cari_nama,$order_p);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/personalia/ajax_daftar_dokter',$data);    
        } else {
            $this->load->view('/personalia/ajax_daftar_dokter',$data);   
        }
    }

    public function update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('status'); 
        $cari_nama = $this->input->post('cari_nama');
        $order_p = $this->input->post('order_p');
        echo $status;
        if($status=="Aktif")
        {
            $data['status'] = "Non Aktif";
        } else {
            $data['status'] = "Aktif";
        }      
        $this->tdok_bio->_update($id,$data);
        
        echo '<script> 
        var cari_nama = "'.$cari_nama.'";
        var order_p = "'.$order_p.'";
        $.ajax({
            type: "POST",
            data: "ajax=1&cari_nama="+cari_nama+"&order_p="+order_p,
            url: "'.base_url().'index.php/personalia/daftar_dokter/ajax_daftar_dokter",
            success: function(msg) {
              $("div#show_list").html(msg);
            }
          });
        </script>';
    }

    public function modal_daftar_dokter($id=null)
    {
        $data['listpoli'] = $this->poli->get_where_custom('atribut_obyek', 'poli'); 
        $data['listdarah'] = array("O","A","B","AB");
        $data['list_id'] = array("KTP","SIM","PASSPORT");
        $data['jenis_kelamin'] = array("Pria","Wanita");
        $data['list_tj_kel'] = array("-","K0","K1","K2","K3");
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
            $data['info_data'] = $this->tdok_bio->show_data_by_id($id);
            $data['info_data2'] = $this->tdok_kepeg->get_where_custom2('id', $id);
            $data['info_data3'] = $this->tdok_pend->get_where_custom2('id', $id);   
        } else {
            $data['id'] = 0;
            $data['info_data'] = $this->tdok_bio->show_data_by_id(0);
            $data['info_data2'] = $this->tdok_kepeg->get_where_custom2('id', 0);
            $data['info_data3'] = $this->tdok_pend->get_where_custom2('id', 0);
        }
        

        $this->load->view('/personalia/modal_daftar_dokter',$data);
    }


    public function edit_data_dokter() 
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


        $data_kepeg['poli'] = $this->input->post('poli');
        $data_kepeg['persen_jasa_konsult'] = $this->input->post('jasa_konsul_persen');
        $data_kepeg['jasa_fix'] = $this->input->post('jasa_konsul_fix_siang');
        $data_kepeg['jasa_fix_malam'] = $this->input->post('jasa_konsul_fix_malam');
        $data_kepeg['jasa_tindakan'] = $this->input->post('fee_tindakan_poli');
        $data_kepeg['komisi_apotik_persen'] = $this->input->post('ref_fee_apotek');
        $data_kepeg['komisi_lab'] = $this->input->post('ref_fee_lab_rad');
        $data_kepeg['gajipokok'] = $this->input->post('gaji_pokok');
        $data_kepeg['trans'] = $this->input->post('tj_transport');
        $data_kepeg['makan'] = $this->input->post('tj_makan');
        $data_kepeg['kehadiran'] = $this->input->post('tj_kehadiran');
        $data_kepeg['type_kel'] = $this->input->post('type_kel');
        $data_kepeg['keluarga'] = $this->input->post('tj_keluarga');
        $data_kepeg['thr'] = $this->input->post('THR');
        $data_kepeg['bank'] = $this->input->post('nama_bank');
        $data_kepeg['cabang'] = $this->input->post('cabang');
        $data_kepeg['no_rek'] = $this->input->post('kode_rek');
        $data_kepeg['status'] = "Aktif";

        $data_pend['sd'] = $this->input->post('SD');
        $data_pend['smp'] = $this->input->post('SMP');
        $data_pend['sma'] = $this->input->post('SMU');    
        $data_pend['t1'] = $this->input->post('tahun_sd');
        $data_pend['t2'] = $this->input->post('tahun_smp');
        $data_pend['t3'] = $this->input->post('tahun_smu');
        $data_pend['d3'] = $this->input->post('diploma');
        $data_pend['s1'] = $this->input->post('strata1');
        $data_pend['s2'] = $this->input->post('strata3'); 
        $data_pend['s3'] = $this->input->post('strata3');    
        $data_pend['t4'] = $this->input->post('tahun_diploma');
        $data_pend['t5'] = $this->input->post('tahun_stata1');
        $data_pend['t6'] = $this->input->post('tahun_stata2');
        $data_pend['t7'] = $this->input->post('tahun_stata3'); 
        $data_pend['kursus1'] = $this->input->post('kursus1');
        $data_pend['kursus2'] = $this->input->post('kursus2');
        $data_pend['kursus3'] = $this->input->post('kursus3');    
        $data_pend['t8'] = $this->input->post('tahun_kursus1');
        $data_pend['t9'] = $this->input->post('tahun_kursus2');
        $data_pend['t10'] = $this->input->post('tahun_kursus3');
        $data_pend['lain'] = $this->input->post('lain_lain2');  

        $data_pass['password'] = '0101'.str_replace('-', '', $this->input->post('tanggal_lahir'));
        $data_pass['status'] = 'open';
        if ($id==0) 
        {
            $data_bio['id'] = intval($this->tdok_bio->get_max()) + 1;
            $data_kepeg['id'] = $data_bio['id'];
            $data_pend['id'] = $data_bio['id'];
            $data_pass['id'] = $data_bio['id'];
            $this->tdok_bio->_insert($data_bio);
            $this->tdok_kepeg->_insert($data_kepeg);
            $this->tdok_pend->_insert($data_pend);
            $this->tdok_passwd->_insert($data_pass);
        } else {
            $this->tdok_bio->_update($id,$data_bio);
            $this->tdok_kepeg->_update($id,$data_kepeg);
            $this->tdok_pend->_update($id,$data_pend);
        }

        redirect(base_url()."index.php/personalia/daftar_dokter");
    }

    public function hapus($id)
    {
        $this->tdok_bio->_delete($id);
        $this->tdok_kepeg->_delete($id);
        $this->tdok_pend->_delete($id);
        redirect(base_url()."index.php/personalia/daftar_dokter");
    }
}
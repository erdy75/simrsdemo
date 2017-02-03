<?php defined('BASEPATH') OR exit('No direct script access allowed');

class penerimaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_purchasing_sp_final','purchasing_sp_final');
        $this->load->model('mdl_purchasing_sp_final_detail','purchasing_sp_final_detail');
        $this->load->model('mdl_gudang_terima','gudang_terima');
        $this->load->model('mdl_gudang_terima_detail','gudang_terima_detail');
        $this->load->model('mdl_barang','barang');
        $this->load->model('mdl_supplier','supplier');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/penerimaan_view', $data);
	}

    public function ajax_lov_sp_final()
    {
        $count = $this->purchasing_sp_final->count_all();
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/penerimaan/ajax_lov_sp_final";        
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

        $listdata = $this->purchasing_sp_final->get_with_limit($config["per_page"], $page, 'no_sp_final');
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_lov_sp_final',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_lov_sp_final',$data);   
        }
    }

    public function ajax_lov_sp_final_detail()
    {
        $no_sp_final = $this->input->post('no_sp_final');
        $data['no_sp_final'] = $no_sp_final;
        $count = $this->purchasing_sp_final_detail->count_where('no_sp_final', $no_sp_final);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/penerimaan/ajax_lov_sp_final_detail";        
        $config["total_rows"] = $count;
        $config["per_page"] = 50;
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

        $listdata = $this->purchasing_sp_final_detail->get_where_no_sp($config["per_page"], $page, $no_sp_final);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        $data['tot_harga'] = $this->purchasing_sp_final_detail->tot_harga($no_sp_final);
        $data['ppn'] = $this->purchasing_sp_final->get_where($no_sp_final);
        $data['listbarang'] = $this->barang->get_all();
        

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_lov_sp_final_detail',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_lov_sp_final_detail',$data);   
        }
    }

    public function ajax_lov_no_lpb_gudang()
    {
        $count = $this->gudang_terima->count_all();
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/penerimaan/ajax_lov_no_lpb_gudang";        
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

        $listdata = $this->gudang_terima->get_with_limit($config["per_page"], $page, 'no_faktur');
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_lov_no_lpb_gudang',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_lov_no_lpb_gudang',$data);   
        }
    }

    public function ajax_no_lpb_gudang_detail()
    {
        $no_faktur = $this->input->post('no_faktur');
        $data['no_faktur'] = $no_faktur;
        $count = $this->gudang_terima_detail->count_lpb_gudang_detail($no_faktur);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/penerimaan/ajax_no_lpb_gudang_detail";        
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

        $listdata = $this->gudang_terima_detail->fetch_lpb_gudang_detail($config["per_page"], $page, $no_faktur);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        $data['total_hasil'] = $this->gudang_terima_detail->total_hasil($no_faktur);
        $data_gudang = $this->gudang_terima->get_where_custom2('no_faktur', $no_faktur);
        $data['ppn'] = $data_gudang['ppn'];

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_no_lpb_gudang_detail',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_no_lpb_gudang_detail',$data);   
        }
    }


    public function ajax_detail_gudang()
    {
        $no_sp_final = $this->input->post('no_sp_final');
        $data['datalist'] = $this->purchasing_sp_final->get_where($no_sp_final);
        $data['list_supp'] = $this->supplier->get_all();
        $data['cek_list_supp'] = $this->supplier->count_where('nama', $data['datalist']['supplier']);
        $data['list_klasifikasi'] = array('Konsinyasi','COD','Hutang Jatuh Tempo');
        $data['list_hari'] = array(0,7,14,21,30);
        $this->load->view('/gudang_logistik/ajax_detail_gudang',$data); 
    }

    public function ajax_detail_gudang_v2()
    {
        $no_faktur = $this->input->post('no_faktur');
        $data['datalist'] = $this->gudang_terima->get_where($no_faktur);
        $data['list_supp'] = $this->supplier->get_all();
        $data['cek_list_supp'] = $this->supplier->count_where('nama', $data['datalist']['supplier']);
        $data['list_klasifikasi'] = array('Konsinyasi','COD','Hutang Jatuh Tempo');
        $data['list_hari'] = array(0,7,14,21,30);
        $data['hari_tempo'] = $this->gudang_terima->hari_tempo($no_faktur);
        $this->load->view('/gudang_logistik/ajax_detail_gudang_v2',$data); 
    }

    public function update_batch_gudang()
    {
        $bundle_data = $this->input->post('bundle_data');
        $kadarluarsa = $this->input->post('kadarluarsa');
        $batch = $this->input->post('batch');
        $arr_bund = explode('###', $bundle_data);
        $no_faktur = $arr_bund[0];
        $id = $arr_bund[1];
        $data['kadaluwarsa'] = $this->date->konversi2b($kadarluarsa);
        $data['batch_no'] = $batch;
        $this->gudang_terima_detail->_update_v2($no_faktur,$id, $data);
        echo '<script>
            $.ajax({
              type: "POST",
              data: "ajax=1&no_faktur='.$no_faktur.'",
              url: "'.base_url().'index.php/gudang_logistik/penerimaan/ajax_no_lpb_gudang_detail",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            }); </script>';
    }
    function kosong()
    {
        echo '<script>  
            $("#btn_load_sp_final").removeAttr("disabled");
            $("#btn_no_lpg_gudang").removeAttr("disabled");
            $("#btn_koreksi_lpb").removeAttr("disabled");
            $("#no_lpb_gudang").val("");
            $("#no_lpb_gudang").removeAttr("readonly");
            $("#sp_po_final").val("");</script>';
    }

    public function tambah() {
        $tgl_faktur = $this->input->post('tgl_faktur');
        $hari = $this->input->post('hari');
        $date_faktur = strtotime($tgl_faktur);
        $klasifikasi = $this->input->post('klasifikasi');
        $data['supplier'] = $this->input->post('supplier');
        $data['tgl_faktur_supplier'] = $this->date->konversi2b($tgl_faktur);
        $data['no_faktur_supplier'] = $this->input->post('fakt_supplier'); 
        $data['ppn'] = $this->input->post('ppn');
        $data['kelompok_stock'] = 'GUDANG MEDIS';
        $data['materai'] = $this->input->post('materai');
        $data['PO'] = $this->input->post('sp_po_final');
        $data['jatuh_tempo'] = strtotime("+".$hari." day", $date_faktur);
        $data['tgl_terima'] = $this->input->post('tgl_terima');
        $data['user_id'] = '9999';
        if ($klasifikasi=='Konsinyasi') 
        {
            $data['konsinyasi'] = 'Ya';    
        }
        else 
        {
            $data['konsinyasi'] = 'Tidak';
        }
        $data['jam_terima'] = date('H:i:s');
        $data['no_faktur'] = $this->gudang_terima->get_max() + 1;
        $this->gudang_terima->_insert($data);

        $bunddle = $this->input->post('bunddle');
        for ($i=0; $i < count($bunddle) ; $i++) { 
            $data_detail['no_faktur'] = $data['no_faktur'];
            $arr_bund = explode('###', $bunddle[$i]);
            $data_detail['id'] = $arr_bund[0];
            $data_detail['jumlah'] = $arr_bund[1];
            $data_detail['harga_beli'] = $arr_bund[3];
            $data_detail['kadaluwarsa'] = $this->date->konversi2b($arr_bund[5]);
            $data_detail['batch_no'] = $arr_bund[6];
            $data_detail['disc'] = $arr_bund[4];
            $this->gudang_terima_detail->_insert($data_detail);
        }
    }
}
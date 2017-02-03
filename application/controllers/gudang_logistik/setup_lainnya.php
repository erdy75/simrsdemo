<?php defined('BASEPATH') OR exit('No direct script access allowed');

class setup_lainnya extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_barang','barang');
        $this->load->model('mdl_kategori_item','kategori_item');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/setup_lainnya_view', $data);
	}

    public function ajax_setup_lainnya()
    {
        $count = $this->kategori_item->count_all();
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/setup_lainnya/ajax_setup_lainnya";        
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

        $listdata = $this->kategori_item->get_with_limit($config["per_page"], $page, 'nama');
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();   

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_setup_lainnya',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_setup_lainnya',$data);   
        }
    }

    public function update_status()
    {
        $nama = $this->input->post('nama');
        $isBackOfficeShow = $this->input->post('isBackOfficeShow');
        $isApotekShow = $this->input->post('isApotekShow');
        $isUGDShow = $this->input->post('isUGDShow');
        $isRawatJalanShow = $this->input->post('isRawatJalanShow');
        $isRawatInapShow = $this->input->post('isRawatInapShow');
        $isRekamMedisShow = $this->input->post('isRekamMedisShow');
        $isKamarOperasiShow = $this->input->post('isKamarOperasiShow');
        $isGiziShow = $this->input->post('isGiziShow');

        if(!empty($isBackOfficeShow)) {
            $data['isBackOfficeShow'] = $isBackOfficeShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isBackOfficeShow');
        }
        if(!empty($isApotekShow)) {
            $data['isApotekShow'] = $isApotekShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isApotekShow');
        }
        if(!empty($isUGDShow)) {
            $data['isUGDShow'] = $isUGDShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isUGDShow');
        }
        if(!empty($isRawatJalanShow)) {
            $data['isRawatJalanShow'] = $isRawatJalanShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isRawatJalanShow');
        }
        if(!empty($isRawatInapShow)) {
            $data['isRawatInapShow'] = $isRawatInapShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isRawatInapShow');
        }
        if(!empty($isRekamMedisShow)) {
            $data['isRekamMedisShow'] = $isRekamMedisShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isRekamMedisShow');
        }
        if(!empty($isKamarOperasiShow)) {
            $data['isKamarOperasiShow'] = $isKamarOperasiShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isKamarOperasiShow');
        }
        if(!empty($isGiziShow)) {
            $data['isGiziShow'] = $isGiziShow;
            $this->kategori_item->_update($nama,$data);
            echo $this->return_ajax('isGiziShow');
        }
    }


    function tambah_item()
    {
        $data['nama'] = $this->input->post('nama');
        $this->kategori_item->_insert($data);
        echo $this->return_ajax($data['nama']);
    }

    function hapus()
    {
        $nama = $this->input->post('nama');
        $this->kategori_item->_delete($nama);
        echo $this->return_ajax($nama);        
    }
    function return_ajax($text)
    {
        return '<script>$.ajax({
          type: "POST",
          data: "ajax=1",
          url: "'.base_url().'index.php/gudang_logistik/setup_lainnya/ajax_setup_lainnya",
          success: function(msg) {
            alert("'.$text.'");
            $("div#show_list").html(msg);
          }
        });</script>';        
    }
}
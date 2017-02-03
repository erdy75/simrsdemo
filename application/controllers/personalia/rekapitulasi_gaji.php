<?php defined('BASEPATH') OR exit('No direct script access allowed');

class rekapitulasi_gaji extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_gaji','gaji');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $this->admin_template_minor->display_with_sidebar('personalia/rekapitulasi_gaji_view', $data);
	}

    public function ajax_rekapitulasi_gaji()
    {
        $periode_gaji = $this->input->post('periode_gaji');
        $data['periode_gaji'] = $periode_gaji;
        $count = $this->gaji->count_rekapitulasi_gaji($periode_gaji);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/personalia/rekapitulasi_gaji/ajax_rekapitulasi_gaji";        
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

        $listdata = $this->gaji->fetch_rekapitulasi_gaji($config["per_page"], $page, $periode_gaji);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/personalia/ajax_rekapitulasi_gaji',$data);    
        } else {
            $this->load->view('/personalia/ajax_rekapitulasi_gaji',$data);   
        }
    }

}
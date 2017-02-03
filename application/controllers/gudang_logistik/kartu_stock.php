<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kartu_stock extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_barang','barang');
        $this->load->model('mdl_gudang_terima','gudang_terima');
        $this->load->model('mdl_gudang_terima_detail','gudang_terima_detail');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';    
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/kartu_stock_view', $data);
	}

    public function ajax_nama_barang()
    {
        $nama = $this->input->post('nama');
        $count = $this->barang->count_barang_simple($nama);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/kartu_stock/ajax_nama_barang";        
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
        $data['nama'] = $nama;
        $listdata = $this->barang->get_nama_barang($config["per_page"], $page, $nama);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_nama_barang',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_nama_barang',$data);   
        }
    }

    function ajax_barang_masuk()
    {
        $nama = $this->input->post('nama');
        $listdata = $this->barang->fetch_kartu_stock_masuk($nama);
        $data['listdata'] = $listdata;
        $data['total'] =$this->barang->sum_kartu_stock_masuk($nama); 
        $this->load->view('/gudang_logistik/ajax_barang_masuk',$data);        
    }


    function ajax_barang_keluar()
    {
        $nama = $this->input->post('nama');
        $listdata = $this->barang->fetch_kartu_stock_keluar($nama);
        $data['listdata'] = $listdata;
        $data['total'] =$this->barang->sum_kartu_stock_keluar($nama);
        $this->load->view('/gudang_logistik/ajax_barang_keluar',$data);        
    }
}
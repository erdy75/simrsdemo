<?php defined('BASEPATH') OR exit('No direct script access allowed');

class nama_pemeriksaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_detail','lab_detail');
        $this->load->model('mdl_lab_bidang','lab_bidang');
        $this->load->model('mdl_lab_detail_spesimen','lab_detail_spesimen');
        $this->load->model('mdl_lab_sub','lab_sub');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['listbidang'] = $this->lab_bidang->get_all_v2();
        $this->admin_template_minor->display_with_sidebar('lab/nama_pemeriksaan_view', $data);
	}


    public function ajax_lab_detail()
    {
        $filter = $this->input->post('nama_pemeriksaan');
        $bidang = $this->input->post('bidang');
        $count = $this->lab_detail->count_filter_where($bidang,$filter);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/nama_pemeriksaan/ajax_lab_detail";        
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
        $page = $config["per_page"] * $page;

        $listdata = $this->lab_detail->fetch_lab_detail($config["per_page"],$page,$filter,$bidang);

        $data['listdata'] = $listdata;
        $data['listbidang'] = $this->lab_bidang->get_all_v2();
        $data['listpersiapan'] = array("---","Hubungi petugas","Puasa 12 Jam","Urine 24 Jam", "Feaces 24 Jam");
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_lab_detail',$data);    
        } else {
            $this->load->view('/lab/ajax_lab_detail',$data);   
        }
    }

    public function edit_detail()
    {
        $id_layanan_up = $this->input->post('id_layanan_up');
        $data['bidang'] = $this->input->post('bidang_modal');
        $data['persiapan'] = $this->input->post('persiapan');
        $data['id_layanan'] = $this->input->post('id_layanan');
        $data['unit_cost'] = $this->input->post('unit_cost');
        $data['metode'] = $this->input->post('metode');
        $data['tgl_edit'] = date('Y-m-d');
        $this->lab_detail_spesimen->_delete($data['id_layanan']);
        $data_spesimen = $this->input->post('spesimen');

        for ($i=0; $i < count($data_spesimen); $i++) { 
            $dataspes['id_layanan'] = $data['id_layanan'];
            $dataspes['spesimen'] = $data_spesimen[$i];
            $this->lab_detail_spesimen->_insert($dataspes);
        }

        if($id_layanan_up=='')
        {
            $data['indexUrut'] = $this->lab_detail->get_max() + 1;
            $this->lab_detail->_insert($data);
        }
        else 
        {
            $this->lab_detail->_update($id_layanan_up,$data);
        }

        redirect(base_url().'index.php/laboratorium/nama_pemeriksaan/');
    }

    public function hapus_detail()
    {
        $id_layanan = $this->input->post('id_layanan_up');
        $bidang = $this->input->post('bidang_modal');
        $this->lab_detail_spesimen->_delete($id_layanan);
        $this->lab_detail->_delete_detail($bidang,$id_layanan);
        redirect(base_url().'index.php/laboratorium/nama_pemeriksaan/');
    }
    public function ajax_spesimen()
    {
        $text = '';
        $id_layanan = $this->input->post('id_layanan');
        $cek = 0;
        $list = array('DL','UL', 'FL', 'Kimia Darah', 'Serologi', 'Parasitologi', 'Immunologi', 'Mikrobiologi', 'Narkoba');
        for ($i=0; $i < count($list) ; $i++) { 
            $cek = $this->lab_detail_spesimen->count_filter_where($id_layanan,$list[$i]);
            if ($cek != 0)
            {
                $text.= '<label class="btn btn-primary btn-sm active">';
                $text.= '<input name="spesimen[]" type="checkbox" value="'.$list[$i].'" checked>'.$list[$i];
                $text.= '</label>';
            } 
            else
            {
                $text.= '<label class="btn btn-primary btn-sm">';
                $text.= '<input name="spesimen[]" type="checkbox" value="'.$list[$i].'">'.$list[$i];
                $text.= '</label>';
            }
        }
        $data['text'] = $text;
        $this->load->view('/lab/ajax_lab_spesimen',$data);
    }

    public function cetak()
    {
        $this->load->helper('pdf_helper');
        date_default_timezone_set("Asia/Jakarta");
        $data['listdata'] =  $this->lab_detail->fetch_lab_detail_v2();
        $data['halo'] = 'halo';
        $this->load->view('/lab/print_nama_pemeriksaan',$data);
    }
}
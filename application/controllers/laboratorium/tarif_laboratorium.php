<?php defined('BASEPATH') OR exit('No direct script access allowed');

class tarif_laboratorium extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_detail','lab_detail');
        $this->load->model('mdl_lab_bidang','lab_bidang');
        $this->load->model('mdl_lab_detail_spesimen','lab_detail_spesimen');
        $this->load->model('mdl_lab_sub','lab_sub');
        $this->load->model('Mdl_lab_default_kelompok_tarif','lab_def_kel_tarif');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['listbidang'] = $this->lab_bidang->get_all_v2();
        $this->admin_template_minor->display_with_sidebar('lab/tarif_laboratorium_view', $data);
	}


    public function ajax_tarif_laboratorium()
    {
        $filter = $this->input->post('filter');
        $bidang = $this->input->post('bidang');
        $count = $this->lab_detail->count_filter_where($bidang,$filter);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/tarif_laboratorium/ajax_tarif_laboratorium";        
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
        

        $listdata = $this->lab_detail->fetch_tarif_lab($config["per_page"],$page,$filter,$bidang);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_tarif_laboratorium',$data);    
        } else {
            $this->load->view('/lab/ajax_tarif_laboratorium',$data);   
        }
    }

    public function select_lab_detail($bidang=null)
    {
        $bidang = $this->input->post('bidang');
        $text = '';
        $text .= '<select class="form-control input-sm" name="jenis" id="jenis">';
        if($bidang=='' || $bidang == null)
        {
            $text .= '<option value=""><option>';
        }
        else
        {
            $listdata = $this->lab_detail->get_where_custom2('bidang', $bidang);
            for ($i=0; $i < count($listdata) ; $i++) { 
                $text .= '<option value="'.$listdata[$i]['id_layanan'].'">'.$listdata[$i]['id_layanan'].'</option>';
            }
        }
        $text .= '</select>';
        echo $text;
    }


    public function edit()
    {
        $data['unit_cost'] = $this->input->post('unit_cost');
        $id_layanan = $this->input->post('id_layanan');
        $bidang = $this->input->post('bidang');
        $data['BETHANY'] = $this->input->post('BETHANY');
        $data['HEMODIALISA'] = $this->input->post('HEMODIALISA');
        $data['KARYAWAN'] = $this->input->post('KARYAWAN');
        $data['UMUM'] = $this->input->post('UMUM');

        $this->lab_detail->_update_tarif_lab($id_layanan, $bidang, $data);
        echo "update";
        
        redirect(base_url().'index.php/laboratorium/tarif_laboratorium/');
    }

    public function def_kel_tarif()
    {
        $data['nama'] = 'Administator';
        $data['listdata'] = $this->lab_def_kel_tarif->get_all();
        $data['kel_tarif'] = array("BETHANY","HEMODIALISA","KARYAWAN","UMUM");
        $this->admin_template_minor->display_with_sidebar('lab/def_kel_tarif_view', $data);       
        
    }

    public function edit_def_kel_tarif()
    {
        $perawatan = $this->input->post('perawatan');
        $data['kelompok_tarif'] = $this->input->post('kel_tarif');
        $this->lab_def_kel_tarif->_update($perawatan, $data);
        redirect(base_url().'index.php/laboratorium/tarif_laboratorium/def_kel_tarif');
    }
}
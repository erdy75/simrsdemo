<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaan_show extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_periksa', 'lab_periksa');
        $this->load->model('mdl_pasien_pribadi', 'pas_pribadi');
        $this->load->model('mdl_faktur_detail_prebayar', 'det_prebayar');
        $this->load->model('mdl_lab_periksa_detail', 'lab_periksa_det');
        $this->load->model('mdl_lab_medical_record', 'lab_medical_rec');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['nama'] = 'Administator';
		$this->admin_template_minor->display_with_sidebar('lab/pasien_lab_view', $data);
	}

	public function ajax_list_lab_periksa()
	{
		$filter = $this->input->get('filter');
		$count = $this->lab_periksa->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/Pemeriksaan_show/ajax_list_lab_periksa";        
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

     	$data["list_data"] = $this->lab_periksa->fetch_lab_periksa($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_lab_periksa',$data);    
        } else {
        	$this->load->view('/lab/ajax_lab_periksa',$data);	
        }
	}

    public function ajax_info_tagihan()
    {
        $id_pasien = $this->input->get('id_pasien');
        $count = $this->det_prebayar->count_filter_where($id_pasien);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/Pemeriksaan_show/ajax_info_tagihan";        
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

        $data["list_data"] = $this->det_prebayar->fetch_faktur_detail_prebayar($config["per_page"],$page,$id_pasien);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_info_tagihan',$data);    
        } else {
            $this->load->view('/lab/ajax_info_tagihan',$data);   
        }
    }

    public function ajax_item_pemeriksaan()
    {
        $no_order = $this->input->get('no_order');
        $count = $this->lab_periksa_det->count_filter_where($no_order);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/Pemeriksaan_show/ajax_item_pemeriksaan";        
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

        $data["list_data"] = $this->lab_periksa_det->fetch_item_pemeriksaan($config["per_page"],$page,$no_order);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_item_pemeriksaan',$data);    
        } else {
            $this->load->view('/lab/ajax_item_pemeriksaan',$data);   
        }
    }


    public function ajax_hasil_pemeriksaan()
    {
        $no_order = $this->input->get('no_order');
        $count = $this->lab_medical_rec->count_filter_where($no_order);
        $data['count'] = $count;
        $data['no_order'] = $no_order;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/Pemeriksaan_show/ajax_hasil_pemeriksaan";        
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

        $data["list_data"] = $this->lab_medical_rec->fetch_item_pemeriksaan($config["per_page"],$page,$no_order);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_hasil_pemeriksaan',$data);    
        } else {
            $this->load->view('/lab/ajax_hasil_pemeriksaan',$data);   
        }
    }

    public function print_label()
    {
        $this->load->helper('pdf_helper');
        $no_order = $this->input->get('no_order');
        $list_periksa = $this->lab_periksa->get_where($no_order);
        $data['no_order'] = $list_periksa['no_order'];
        $data['tgl'] = "[".str_replace('-', '.', $list_periksa['tanggal'])."]";
        $no_mr = substr($list_periksa['cib'], 0, 3).'.'.substr($list_periksa['cib'], 3, 2).'.'
                .substr($list_periksa['cib'], 5, 2).'.'.substr($list_periksa['cib'], 7, 9);
        $data['no_mr'] = $no_mr;
        $data['nama'] = $list_periksa['nama_manual_edit'];
        if ($list_periksa['sex_manual_edit']=='Laki-laki')
        {
            $data['jenis_kelamin'] = "(L)";
        }
        else
        {
            $data['jenis_kelamin'] = "(P)";   
        }
        $pas_pribadi = $this->pas_pribadi->get_where($list_periksa['cib']);
        $data['tgl_lahir'] = $this->date->konversi2a($pas_pribadi['tgl_lahir']);
        $data['umur'] = $list_periksa['umur_manual_edit'];
        $this->load->view('/lab/print_label_report',$data);  
    }

    public function cetak_struk()
    {
        $this->load->helper('pdf_helper');
        $no_order = $this->input->get('no_order');
        $data['nama_rs'] = "RS. NCR";
        $data['telp'] = "022-9090900";
        $list_periksa = $this->lab_periksa->get_where($no_order);
        $data['tgl_periksa_h'] = $this->date->konversi2a($list_periksa['tanggal']);
        $data['jam_periksa_h'] = $list_periksa['jam'];
        $data['no_order'] =  substr($list_periksa['no_order'], 0, 2).'-'.substr($list_periksa['no_order'], 2, 3).'-'
                            .substr($list_periksa['no_order'], 5, 3);
        $data['tgl_gabung'] = str_replace('-', '', $data['tgl_periksa_h']);
        $no_mr = substr($list_periksa['cib'], 0, 3).'.'.substr($list_periksa['cib'], 3, 2).'.'
                .substr($list_periksa['cib'], 5, 2).'.'.substr($list_periksa['cib'], 7, 9);
        $data['no_mr'] = $no_mr;
        $data['nama'] = $list_periksa['nama_manual_edit'];
        $data['alamat'] = strtoupper($list_periksa['alamat_manual_edit']);
        $data['jenis_rawat'] = strtoupper($list_periksa['jalan_inap']);
        $data['list_periksa_det'] = $this->lab_periksa_det->get_where_custom2('no_order', $list_periksa['no_order']);
        $this->load->view('/lab/cetak_struk_report2',$data);

    }

    public function selesai_proses()
    {
        $no_order = $this->input->post('no_order');
        $id_pasien = $this->input->post('id_pasien');
        $data['status'] = 'selesai';
        $this->lab_periksa->_update($no_order,$data);
    }
}
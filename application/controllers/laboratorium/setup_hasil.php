<?php defined('BASEPATH') OR exit('No direct script access allowed');

class setup_hasil extends CI_Controller {

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
        $data['listsub'] = $this->lab_bidang->get_all_v2();
        $this->admin_template_minor->display_with_sidebar('lab/setup_hasil_view', $data);
	}


    public function ajax_setup_hasil()
    {
        $filter = $this->input->post('filter');
        $count = $this->lab_sub->count_setup_hasil($filter);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/setup_hasil/ajax_setup_hasil";        
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
        

        $listdata = $this->lab_sub->fetch_setup_hasil($config["per_page"],$page,$filter);
        $data['listbidang'] = $this->lab_bidang->get_all_v2();
        $data['listmodel_hitung'] = array("Text","Antara Sama Dengan","Lebih Kecil Dari", "Lebih Kecil Sama Dengan", "Lebih Besar Sama Dengan",  "Lebih Besar Dari");
        $data['listnilai_normal'] = array('mg/dL', 'g/dL', 'µg/dL', 'U/L', '/lp', '/mL', 'IU/mL', 'mm/jam', 'mmol/L', '%', '/mm3', 'minute', 'seconds');
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_setup_hasil',$data);    
        } else {
            $this->load->view('/lab/ajax_setup_hasil',$data);   
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
        $nama_up = $this->input->post('nama_up');
        $data['bidang'] = $this->input->post('bidang_modal');
        $data['jenis'] = $this->input->post('jenis');
        $data['nama'] = $this->input->post('nama');
        $data['metode'] = $this->input->post('metode');
        $data['mode_hitung'] = $this->input->post('model_hitung');
        $data['laki_text'] = $this->input->post('text_lk');
        $data['perempuan_text'] = $this->input->post('text_pr');
        $data['laki_t1'] = $this->input->post('nilai_lk1');
        $data['perempuan_t1'] = $this->input->post('nilai_pr1');
        $data['laki_t2'] = $this->input->post('nilai_lk2');
        $data['perempuan_t2'] = $this->input->post('nilai_pr2');
        $data['text_depan'] = $this->input->post('text_depan');
        $data['satuan'] = $this->input->post('satuan');

        if($nama_up=='')
        {
            $data['inc'] = $this->lab_sub->get_max_setup_hasil($data['bidang'],$data['jenis']) + 1;
            $this->lab_sub->_insert($data);
            echo "insert";
        }
        else 
        {
            $this->lab_sub->_update_setup_data($nama_up, $data['bidang'], $data['jenis'], $data);
            echo "update";
        }
        redirect(base_url().'index.php/laboratorium/setup_hasil/');
    }

    public function hapus()
    {
        $bidang = $this->input->post('bidang_modal');
        $jenis = $this->input->post('jenis');
        $nama = $this->input->post('nama');
        $this->lab_sub->_delete_setup_data($nama, $bidang, $jenis);
        redirect(base_url().'index.php/laboratorium/setup_hasil/');
    }


    public function cetak()
    { 
        $data['listdata'] =  $this->lab_sub->print_setup_hasil();
    // $this->load->view('lab/print_setup_hasil', $data);

    //load the view, pass the variable and do not show it but "save" the output into $html variable
    $html=$this->load->view('lab/print_setup_hasil', $data, true); 

    //this the the PDF filename that user will get to download
    $pdfFilePath = "the_pdf_output.pdf";

    //load mPDF library
    $this->load->library('m_pdf');
    //actually, you can pass mPDF parameter on this load() function
    $pdf = $this->m_pdf->load();
        //generate the PDF!
    $pdf->WriteHTML($html);
    //offer it to user via browser download! (The PDF won't be saved on your server HDD)
    $pdf->Output($pdfFilePath, "D");
    

    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Lab_sub extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_lab_bidang','lab_bidang');
        $this->load->model('M_lab_detail','lab_detail');
        $this->load->model('M_lab_sub','lab_sub');
        $this->load->model('M_sql_tracer','tracer');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 3;	
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('laboratorium/lab_sub', $data);
	}

	public function ajax_lab_sub()
	{
		$filter = $this->input->get('filter');
        // tampilan select bidang
        $select_bidang = select2_v1('lab_bidang_id','rs_lab_bidang','id,nama');
        $data['select_bidang'] = field_kosong_v2('Bidang Lab', 'td_bidang_id', $select_bidang);
        // tampilan select 
        $select_pemeriksaan = select2_v1('lab_detail_id','rs_lab_detail','id,layanan', 'id=0');
        $data['select_pemeriksaan'] = field_kosong_v2('Pemeriksaan', 'td_detail_id', $select_pemeriksaan);
        // tampilan Perbandingan
        $select_perbandingan = select2_v1('Perbandingan','rs_perbandingan','perbandingan,perbandingan');
        $data['select_perbandingan'] = field_kosong_v3('Perbandingan', 'td_perbandingan_id', $select_perbandingan);
        // tampilan Nilai Satuan
        $select_nilai_satuan = select2_v1('satuan_nilai_id','rs_satuan_nilai','satuan_nilai,satuan_nilai');
        $data['select_nilai_satuan'] = field_kosong_v3('Nilai Satuan', 'td_nilai_satuan_id', $select_nilai_satuan);
        // pilihan penilaian
        $radio_pilih = '<input type="radio" name="nilai" id="numeric" value="numeric"> Numeric <input type="radio" name="nilai" id="teks" value="text"> Text';
        $data['radio_pilih'] = field_kosong_v2('', 'td_nilal_id', $radio_pilih);
		$count = $this->lab_sub->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/lab_sub/ajax_lab_sub";        
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

     	$data["list_data"] = $this->lab_sub->fetch_lab_sub($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/laboratorium/ajax_lab_sub',$data);    
        } else {
        	$this->load->view('/laboratorium/ajax_lab_sub',$data);	
        }
	}

    public function select_detail()
    {
        $id_bidang = $this->input->get('id_bidang');
        // tampilan select 
        $select_pemeriksaan = select2_v1('lab_detail_id','rs_lab_detail','id,layanan', "id_bidang=$id_bidang");
        echo $select_pemeriksaan;
    }

	public function edit()
	{
		$id = $this->input->post('id');
        $pilihan = $this->input->post('mode_hitung');
		$data['lab_bidang_id'] = $this->input->post('lab_bidang_id');
        $data['lab_detail_id'] = $this->input->post('lab_detail_id');
        $data['nama'] = $this->input->post('text_hasil');
        $data['metode'] = $this->input->post('metode');
        $data['inc'] = $this->input->post('index');
        if($pilihan=='text')
        {
            $data['mode_hitung'] = $pilihan;
        }
        else
        {
            $data['mode_hitung'] = $this->input->post('Perbandingan');   
        }
        $data['laki_text'] = $this->input->post('text_laki');
        $data['perempuan_text'] = $this->input->post('text_perempuan');
        $data['text_depan'] = $this->input->post('text_depan');
        $data['satuan'] = $this->input->post('satuan_nilai_id');
        $data['laki_t1'] = $this->input->post('nilai_lk1');
        $data['laki_t2'] = $this->input->post('nilai_lk2');
        $data['perempuan_t1'] = $this->input->post('nilai_pr1');
        $data['perempuan_t2'] = $this->input->post('nilai_pr2');

        $data_tracer['tgl_jam'] = date('Y-m-d H:i:s');
        $data_tracer['nama_host'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data_tracer['host_address'] = gethostbyname($_SERVER['HTTP_CLIENT_IP']);
        $data_tracer['user_id'] = $this->session->userdata('id');
        $data_tracer['module_name'] = 'laboratorium';

		if($id=='')
        {
        	$data['id'] = $this->lab_sub->get_max() + 1;
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_sub', $data, 'insert');
        	$this->lab_sub->_insert($data);
            $this->tracer->_insert($data_tracer);
        	echo "-->insert ";
        } 
        else 
    	{
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_sub', $data, 'update');
    		$this->lab_sub->_update($id, $data);
            $this->tracer->_insert($data_tracer);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/laboratorium/Set_pemeriksaan/');
	}

	function delete()
	{
		$id = $this->input->post('id');

        $data_tracer['tgl_jam'] = date('Y-m-d H:i:s');
        $data_tracer['nama_host'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data_tracer['host_address'] = gethostbyname($_SERVER['HTTP_CLIENT_IP']);
        $data_tracer['user_id'] = $this->session->userdata('id');
        $data_tracer['module_name'] = 'laboratorium';

        $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_bidang', 0, 'delete', "id=$id");
        $this->tracer->_insert($data_tracer);
		$this->lab_bidang->_delete($id);
		redirect(base_url().'index.php/laboratorium/set_pemeriksaan/');
	}
}
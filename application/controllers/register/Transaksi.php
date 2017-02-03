<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_pasien','pasien');
        $this->load->model('M_sql_tracer','tracer');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 2;	
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('register/pasien', $data);
	}

	public function ajax_pasien()
	{
		$filter = $this->input->get('filter');
		$count = $this->pasien->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/indentitas/ajax_pasien/";        
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

     	$data["list_data"] = $this->pasien->fetch_pasien($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/register/ajax_pasien',$data);    
        } else {
        	$this->load->view('/register/ajax_pasien',$data);	
        }
	}

    public function edit_pasien($id = NULL)
    {
        //tampil template sistem menu list
        $data['modul_id'] = 2;
        //tampil detail pasien 
        $data['data'] = $this->pasien->get_where($id); 
        //select data kota
        $split_tgl = explode('-', $data['data']['tgl_lahir']);
        if (empty($data['data']))
        {
            $data['tgl_lahir'] = null;   
        }
        else
        {
            $data['tgl_lahir'] = $split_tgl[2].'/'.$split_tgl[1].'/'.$split_tgl[0];    
        }
        $select_kota = select2_v3('tempat_lahir','rs_kabupaten','kab_nama,kab_nama',$data['data']['tempat_lahir']);
        $data['select_kota'] = field_kosong_v2('Tempat Lahir', 'td_kota_id', $select_kota); 
        //select data Gol Darah
        $select_darah = select2_v3('gol_id','rs_gol_darah','id,gol_darah',$data['data']['gol_darah_id']);
        $data['select_darah'] = field_kosong_v2('Golongan Darah', 'td_gol_darah', $select_darah); 
        //select data Agama
        $select_agama = select2_v3('agama_id','rs_agama','id,agama',$data['data']['agama_id']);
        $data['select_agama'] = field_kosong_v2('Agama', 'td_agama', $select_agama); 
        //select data Indentitas KTP, KK, SIM
        $select_indentitas = select2_v3('indentitas_id','rs_indentitas','id,nama_indentitas',$data['data']['indentitas_id']);
        $data['select_indentitas'] = field_kosong_v2('Indentitas Diri', 'td_indentitas', $select_indentitas); 
        //tampil display dengan side menu
        $this->admin_template->display_with_sidebar('register/edit_pasien', $data);
    }

	public function edit()
	{
		$id = $this->input->post('id');
		$data['pasien_id'] = $this->input->post('pasien_id');
        $data['nama'] = $this->input->post('nama');
        $data['alamat'] = $this->input->post('alamat');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['tempat_lahir'] = $this->input->post('tempat_lahir');
        $split_tgl = explode('/', $this->input->post('tgl_lahir'));
        $data['tgl_lahir'] = $split_tgl[2].'-'.$split_tgl[1].'-'.$split_tgl[0];
        $data['email'] = $this->input->post('email');
        $data['gol_darah_id'] = $this->input->post('gol_id');
        $data['agama_id'] = $this->input->post('agama_id');
        $data['indentitas_id'] = $this->input->post('indentitas_id');
        $data['no_indentitas'] = $this->input->post('no_indentitas');
        $data['lain-lain'] = $this->input->post('lain2');

        $data_tracer['tgl_jam'] = date('Y-m-d H:i:s');
        $data_tracer['nama_host'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data_tracer['host_address'] = gethostbyname($_SERVER['HTTP_CLIENT_IP']);
        $data_tracer['user_id'] = $this->session->userdata('id');
        $data_tracer['module_name'] = 'register';

		if($id=='')
        {
        	$data['id'] = $this->pasien->get_max() + 1;
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_pasien', $data, 'insert');
        	$this->pasien->_insert($data);
            $this->tracer->_insert($data_tracer);
        	echo "-->insert ";
        } 
        else 
    	{
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_pasien', $data, 'update');
    		$this->pasien->_update($id, $data);
            $this->tracer->_insert($data_tracer);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/register/pasien/');
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->pasien->_delete($id);
		redirect(base_url().'index.php/register/pasien/');
	}
}
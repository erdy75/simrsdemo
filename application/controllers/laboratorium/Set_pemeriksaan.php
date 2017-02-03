<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Set_pemeriksaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_lab_bidang','lab_bidang');
        $this->load->model('M_lab_detail','lab_detail');
        $this->load->model('M_lab_spesimen','lab_spesimen');
        $this->load->model('M_spesimen','spesimen');
        $this->load->model('M_sql_tracer','tracer');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 3;	
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('laboratorium/lab_bidang', $data);
	}

	public function ajax_lab_bidang()
	{
		$filter = $this->input->get('filter');
		$count = $this->lab_bidang->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/set_pemeriksaan/ajax_lab_bidang";        
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

     	$data["list_data"] = $this->lab_bidang->fetch_lab_bidang($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/laboratorium/ajax_lab_bidang',$data);    
        } else {
        	$this->load->view('/laboratorium/ajax_lab_bidang',$data);	
        }
	}


	public function edit()
	{
		$id = $this->input->post('id');
		$data['inc'] = $this->input->post('inc');
        if($data['inc']=='')
        {
            $data['inc'] = $this->lab_bidang->get_max_inc() + 1;
        }

        $data['nama'] = $this->input->post('nama');

        $data_tracer['tgl_jam'] = date('Y-m-d H:i:s');
        $data_tracer['nama_host'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data_tracer['host_address'] = gethostbyname($_SERVER['HTTP_CLIENT_IP']);
        $data_tracer['user_id'] = $this->session->userdata('id');
        $data_tracer['module_name'] = 'laboratorium';

		if($id=='')
        {
        	$data['id'] = $this->lab_bidang->get_max() + 1;
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_bidang', $data, 'insert');
        	$this->lab_bidang->_insert($data);
            $this->tracer->_insert($data_tracer);
        	echo "-->insert ";
        } 
        else 
    	{
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_bidang', $data, 'update');
    		$this->lab_bidang->_update($id, $data);
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

    /*======================================================== lab detail show =================================================================*/

    public function lab_detail($lab_bidang_id)
    {
        //tampil template sistem menu list
        $data['modul_id'] = 3;
        //set lab bidang id
        $data['bidang_id'] = $lab_bidang_id;
        //set bidang name
        $get_bidang = $this->lab_bidang->get_where($lab_bidang_id);
        $data['nama_bidang'] = $get_bidang['nama'];
        //select persiapan
        $select_persiapan = select2_v1('persiapan','rs_persiapan','persiapan,persiapan');
        $data['select_persiapan'] = field_kosong_v2('Persiapan', 'td_persiapan', $select_persiapan);   
        //tampil display dengan side menu
        $this->admin_template->display_with_sidebar('laboratorium/lab_detail', $data);
    } 

    public function ajax_lab_detail()
    {
        $filter = $this->input->get('filter');
        $bidang_id = $this->input->get('bidang_id');
        $data['bidang_id'] = $bidang_id;
        //select persiapan
        $select_persiapan = select2_v1('persiapan','rs_persiapan','persiapan,persiapan');
        $data['select_persiapan'] = field_kosong_v2('Persiapan', 'td_persiapan', $select_persiapan);
        $count = $this->lab_detail->count_filter_where($filter,$bidang_id);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/set_pemeriksaan/ajax_lab_detail";        
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

        $data["list_data"] = $this->lab_detail->fetch_lab_detail($config["per_page"],$page,$filter,$bidang_id);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/laboratorium/ajax_lab_detail',$data);    
        } else {
            $this->load->view('/laboratorium/ajax_lab_detail',$data);   
        }
    }

    public function edit_detail()
    {
        $id = $this->input->post('id');
        $data['id_bidang'] = $this->input->post('bidang_id');
        $data['persiapan'] = $this->input->post('persiapan');
        $data['layanan'] = $this->input->post('layanan');
        $data['unitcost'] = $this->input->post('unitcost');
        $data['metode'] = $this->input->post('metode');
        $data['tgl_edit'] = date('Y-m-d H:i:s');
        $data['nama_user'] = $this->session->userdata('id');

        $data_spesimen = $this->input->post('spesimen');

        $data_tracer['tgl_jam'] = date('Y-m-d H:i:s');
        $data_tracer['nama_host'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);
        $data_tracer['host_address'] = gethostbyname($_SERVER['HTTP_CLIENT_IP']);
        $data_tracer['user_id'] = $this->session->userdata('id');
        $data_tracer['module_name'] = 'laboratorium';

        if($id=='')
        {
            $data['id'] = $this->lab_detail->get_max() + 1;
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_detail', $data, 'insert');
            $this->lab_detail->_insert($data);
            $this->tracer->_insert($data_tracer);

            for ($i=0; $i < count($data_spesimen) ; $i++) { 
                $data_lab_spesimen['id'] = $this->lab_spesimen->get_max() + 1;
                $data_lab_spesimen['id_layanan'] = $data['id'];
                $data_lab_spesimen['spesimen'] = $data_spesimen[$i];
                $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_spesimen', $data, 'insert');
                $this->lab_spesimen->_insert($data_lab_spesimen);
                $this->tracer->_insert($data_tracer);
            }
            echo "-->insert ";
        } 
        else 
        {
            $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_detail', $data, 'update');
            $this->lab_detail->_update($id, $data);
            $this->tracer->_insert($data_tracer);
            $this->lab_spesimen->_delete_layanan($id);
            for ($i=0; $i < count($data_spesimen) ; $i++) { 
                $data_lab_spesimen['id'] = $this->lab_spesimen->get_max() + 1;
                $data_lab_spesimen['id_layanan'] = $id;
                $data_lab_spesimen['spesimen'] = $data_spesimen[$i];
                $data_tracer['sql_script'] = $this->tracer->str_method_sql('rs_lab_spesimen', $data, 'insert');
                $this->lab_spesimen->_insert($data_lab_spesimen);
                $this->tracer->_insert($data_tracer);
            }
            echo "-->update ";
        }
        redirect(base_url().'index.php/laboratorium/Set_pemeriksaan/lab_detail/'.$data['id_bidang']);
    }

    public function ajax_spesimen()
    {
        $text = '';
        $id = $this->input->get('id_layanan');
        $cek = 0;
        $list = $this->spesimen->get_all();
        for ($i=0; $i < count($list) ; $i++) { 
            $cek = $this->lab_spesimen->count_where_spesimen($id, $list[$i]['spesimen']);
            if ($cek != 0)
            {
                $text.= '<label class="btn btn-primary btn-sm active">';
                $text.= '<input name="spesimen[]" type="checkbox" value="'.$list[$i]['spesimen'].'" checked>'.$list[$i]['spesimen'];
                $text.= '</label>';
            } 
            else
            {
                $text.= '<label class="btn btn-primary btn-sm">';
                $text.= '<input name="spesimen[]" type="checkbox" value="'.$list[$i]['spesimen'].'">'.$list[$i]['spesimen'];
                $text.= '</label>';
            }
        }
        $data['text'] = $text;
        $this->load->view('/laboratorium/ajax_lab_spesimen',$data);
    }
}
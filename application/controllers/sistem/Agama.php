<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agama extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_agama','agama');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/agama', $data);
	}

	public function ajax_agama()
	{
		$filter = $this->input->get('filter');
		$count = $this->agama->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/agama/ajax_agama/";        
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

     	$data["list_data"] = $this->agama->fetch_agama($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_agama',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_agama',$data);	
        }
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data['agama'] = $this->input->post('agama');


		if($id=='')
        {
        	$data['id'] = $this->agama->get_max() + 1;
        	$this->agama->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->agama->_update($id, $data);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/sistem/agama');
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->agama->_delete($id);
		redirect(base_url().'index.php/sistem/agama');
	}
}

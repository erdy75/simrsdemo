<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_modul','modul');
		$this->load->model('M_role','role');
		$this->load->model('M_modul_role','modul_role');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/role', $data);
	}

	public function ajax_role()
	{
		$filter = $this->input->get('filter');
		$count = $this->role->count_all_where($filter);
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/role/ajax_role/";        
        $config["total_rows"] = $count['jumlah'];
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
     	
     	if ($page > 0) {
     		$page = $page-$config["per_page"];
     	};
     	$data["list_data"] = $this->role->fetch_role($config["per_page"], $page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_role',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_role',$data);	
        }
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data['role_name'] = $this->input->post('nama');
        if($id=='')
        {
        	$data['id'] = $this->role->get_max() + 1;
        	$this->role->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->role->_update($id, $data);
    		echo "-->update ";
    	}
        redirect(base_url().'index.php/sistem/role');    
		    
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->role->_delete($id);
		redirect(base_url().'index.php/sistem/role');
	}


	// begin manajemen modul dgn role
	function modul_role()
	{
		$role_id = $this->uri->segment(4);
		$data_role = $this->role->get_where($role_id);
		//role_id
		$data['role_id'] = $role_id;
		// tampil nama role
		$data['nama_role'] = $data_role['role_name'];
		//tampil template sistem menu list
		$data['modul_id'] = 1;	
		//tamppil select 
		$filter1 =  array(
					'kolom' => 'id,nama',
					'tabel' => 'rs_modul',
					'id_filter' => 'id'  
					);
		$filter2 =  array(
					'kolom' => 'modul_id',
					'tabel' => 'rs_modul_role',
					'filter' => "role_id=$role_id" 
					);
		$data['select1'] = select_input_not_in('modul_id',$filter1, $filter2);

		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/modul_role', $data);				
	}

	public function ajax_modul_role()
	{
		$filter = $this->input->get('filter');
		$role_id = $this->input->get('role_id');
		$data['role_id'] = $role_id;
		$count = $this->modul_role->count_all_where($role_id,$filter);
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/role/ajax_modul_role/";        
        $config["total_rows"] = $count['jumlah'];
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
     	$data["list_data"] = $this->modul_role->fetch_modul_role($role_id,$page, $config["per_page"],$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_modul_role',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_modul_role',$data);	
        }
	}	


	public function edit_modul_role()
	{
		$id = $this->input->post('id');
		$data['role_id'] = $this->input->post('role_id');
		$data['modul_id'] = $this->input->post('modul_id');
		$data['id'] = $this->modul_role->get_max() + 1;
        $this->modul_role->_insert($data);
        redirect(base_url().'index.php/sistem/role/modul_role/'.$data['role_id']);    
		    
	}

	function delete_modul_role()
	{
		$id = $this->uri->segment(4);
		$role_id = $this->input->post('role_id');
		$this->modul_role->_delete($id);
		redirect(base_url().'index.php/sistem/role/modul_role/'.$role_id);
	}
}

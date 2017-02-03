<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_menu','menu');
        $this->load->model('M_modul','modul');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;
        $data['modul_id2'] = $this->input->get('modul_id'); 	
		//daftar modul yang tersedia
		$data['list_data'] = $this->modul->get_where($data['modul_id2']);

		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/menu', $data);
	}

	public function ajax_menu()
	{
		$filter = $this->input->get('filter');
        $modul_id = $this->input->get('modul_id');
        $data['modul_id'] = $modul_id;
		$count = $this->menu->count_all_where($modul_id,$filter);
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/menu/ajax_menu/";        
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
     	
     	if ($page!=0)
     	{
     		$page = $config["per_page"] * ($page-1);
     	}

     	$data["list_data"] = $this->menu->fetch_menu($config["per_page"], $page,$filter, $modul_id);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_menu',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_menu',$data);	
        }
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data['nama_menu'] = $this->input->post('nama_menu');
		$data['modul_id'] = $this->input->post('modul_id');
		//porses attr id menu
		$data['attr_id'] = strtolower($data['nama_menu']);
		$data['attr_id'] = str_replace(' ', '_', $data['attr_id']);
        $data['link_menu'] = $this->input->post('link_menu');
        $data['parent_id'] = 0;

        if ($data['link_menu']=='#')
        {
        	$data['is_parent'] = 1;

        }
        else
        {
        	$data['is_parent'] = 0;
        }

		if($id=='')
        {
        	$this->menu->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->menu->_update($id, $data);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/sistem/menu?modul_id='.$data['modul_id']);
	}

	function delete()
	{
		$id = $this->input->post('id');
        $data['id'] = $id;
        $modul_id = $this->input->post('modul_id');
		$jumlah_menu = $this->menu->count_where('parent_id', $id);
		if($jumlah_menu != 0)
		{
			echo "id = $id dan jumlah = $jumlah_menu";
			//redirect(base_url().'index.php/sistem/menu');
		}
		else
		{
			$this->menu->_delete($data['id']);
			echo "terhapus";
			redirect(base_url().'index.php/sistem/menu?modul_id='.$modul_id);
		}
	}


// sub menu
	public function sub_menu($modul_id,$parent_id)
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	
        $data['modul_id2'] = $modul_id;     
        //daftar modul yang tersedia
        $data['list_data'] = $this->modul->get_where($data['modul_id2']);
		// tampil parent menu
		$data_filter = $this->menu->get_where($parent_id);
		$data['parent_id'] = $parent_id;
		$data['nama_parent'] = $data_filter['nama_menu'];

		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/sub_menu', $data);
	}

	public function ajax_sub_menu()
	{
		$filter = $this->input->get('filter');
        $modul_id = $this->input->get('modul_id');
        $data['modul_id'] = $modul_id;
		$parent_id = $this->input->get('parent_id');
        $data['parent_id'] = $parent_id;
		$count = $this->menu->count_all_where_sub($parent_id,$modul_id, $filter);
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/menu/ajax_sub_menu/";        
        $config["total_rows"] = $count['jumlah'];
        $config["per_page"] = 10;
        $config["uri_segment"] = 5;
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
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
     	$page = $config["per_page"] * $page;
     	
     	if ($page!=0)
     	{
     		$page = $config["per_page"] * ($page-1);
     	}

     	$data["list_data"] = $this->menu->fetch_sub_menu($config["per_page"], $page,$filter, $modul_id, $parent_id);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_sub_menu',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_sub_menu',$data);	
        }
	}

	public function edit_sub_menu()
	{
		$id = $this->input->post('id');
		$data['nama_menu'] = $this->input->post('nama_menu');
		$data['modul_id'] = $this->input->post('modul_id');
		//porses attr id menu
		$data['attr_id'] = strtolower($data['nama_menu']);
		$data['attr_id'] = str_replace(' ', '_', $data['attr_id']);
        $data['link_menu'] = $this->input->post('link_menu');
        $data['parent_id'] = $this->input->post('parent_id');;

        if ($data['link_menu']=='#')
        {
        	$data['is_parent'] = 1;

        }
        else
        {
        	$data['is_parent'] = 0;
        }

		if($id=='')
        {
        	$this->menu->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->menu->_update($id, $data);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/sistem/menu/sub_menu/'.$data['modul_id'].'/'.$data['parent_id']);
	}

	function delete_sub_menu()
	{
		$id = $this->input->post('id');
		$data['id'] = $id;
		$modul_id = $this->input->post('modul_id');
        $data['parent_id'] = $this->input->post('parent_id');
		$jumlah_menu = $this->menu->count_where('parent_id', $id);
		if($jumlah_menu != 0)
		{
			echo "id = $id dan jumlah = $jumlah_menu";
			//redirect(base_url().'index.php/sistem/menu');
		}
		else
		{
			$this->menu->_delete($data['id']);
			echo "terhapus";
			redirect(base_url().'index.php/sistem/menu/sub_menu/'.$modul_id.'/'.$data['parent_id']);
		}
	}
}

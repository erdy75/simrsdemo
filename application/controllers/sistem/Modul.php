<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modul extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_user','usr');
		$this->load->model('M_modul','modul');
		$this->load->model('M_menu','menu');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	
		//daftar modul yang tersedia
		$data['list_data'] = $this->modul->get_all();

		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/modul', $data);
	}

	public function ajax_modul()
	{
		$filter = $this->input->get('filter');
		$count = $this->modul->count_all_where($filter);
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/modul/ajax_modul/";        
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

     	$data["list_data"] = $this->modul->fetch_profil($config["per_page"], $page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_modul',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_modul',$data);	
        }
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
        $data['link'] = $this->input->post('link');
        $config['overwrite']=TRUE;
        $config['upload_path'] = 'assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '2048';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';

        if(!$_FILES['icon']['error']){
		    $this->load->library('upload', $config);
		    if ( !$this->upload->do_upload('icon'))
		    {
		        $error = $this->upload->display_errors('','');
		        //$this->session->set_flashdata('msg',$this->editor->alert_error($error));
		        echo $error.'data error_log';
		    }
		    else
		    {
		    	$error = $this->upload->display_errors('','');
		        $file_data=$this->upload->data();
		        $data['icon'] = $config['upload_path'].$file_data['file_name'];
		    	echo $data['icon'].$file_data['file_name'];
		        if($id=='')
		        {
		        	$this->modul->_insert($data);
		        	echo "-->insert ";
		        } 
		        else 
	        	{
	        		$this->modul->_update($id, $data);
	        		echo "-->update ";
	        	}
		        redirect(base_url().'index.php/sistem/modul');    
		    }
	    }
	    else
	    {
			if($id=='')
	        {
	        	$this->modul->_insert($data);
	        	echo "-->insert ";
	        } 
	        else 
	    	{
	    		$this->modul->_update($id, $data);
	    		echo "-->update ";
	    	}
	    	redirect(base_url().'index.php/sistem/modul');
	    }
	}

	function delete()
	{
		$id = $this->input->post('id');
		$data['id'] = $id;
		$modul_id = $id;
		$jumlah_menu = $this->menu->count_where('modul_id', $id);
		if($jumlah_menu != 0)
		{
			echo "id = $id dan jumlah = $jumlah_menu";
			redirect(base_url().'index.php/sistem/modul');
		}
		else
		{
			$this->modul->_delete($data['id']);
			$this->modul->_delete_role($data['id']);
			redirect(base_url().'index.php/sistem/modul');
		}
	}
}

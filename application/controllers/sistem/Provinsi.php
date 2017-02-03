<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Provinsi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_provinsi','prov');
		$this->load->model('M_negara','negara');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	

		$data_select2 = select2_v2('negara_id');
		$data['select2'] = field_kosong_v2('Negara', 'td_negara_id', $data_select2);
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/provinsi', $data);
	}

	public function ajax_provinsi()
	{
		$filter = $this->input->get('filter');
		$count = $this->prov->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/provinsi/ajax_provinsi/";        
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

     	$data["list_data"] = $this->prov->fetch_provinsi($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_provinsi',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_provinsi',$data);	
        }
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data['nama_prov'] = $this->input->post('nama');
        $data['negara_id'] = $this->input->post('negara_id');

		if($id=='')
        {
        	$data['id'] = $this->prov->get_max() + 1;
        	$this->prov->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->prov->_update($id, $data);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/sistem/provinsi');
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->prov->_delete($id);
		redirect(base_url().'index.php/sistem/provinsi');
	}

	public function show_negara()
	{
		$row = array();
		$return_arr = array();
		$row_array = array();

		$term = $this->input->get('term');

	 	$data = $this->negara->get_where_custom($term['term']);
	 	$data2 = array('results' => $data , 'more' => 'false' ); 

        echo json_encode($data);     
    }

	public function show_negara_by_id()
	{
		$id = $this->input->post('negara_id');
		$select = select2_v1('negara_id', 'rs_negara', 'id,nama', "id=$id");
        echo $select;
        ?>
        <script>
        	$(".select2").select2({
			    minimumInputLength: 2,
			    tags: [],
			    ajax: {
			        url: '<?=base_url()?>index.php/sistem/provinsi/show_negara/',
			        dataType: 'json',
			        type: "GET",
			        quietMillis: 50,
			        data: function (term) {
			            return {
			              term: term, //search term
			            };
			        },
			        processResults: function (data) {
			            return {
			                results: $.map(data, function (item) {
			                    return {
			                        text: item.nama,
			                        slug: item.slug,
			                        id: item.id
			                    }
			                })
			            };
			        },
			        cache : true
			    }
			});
        </script> 
        <?php

    }
}

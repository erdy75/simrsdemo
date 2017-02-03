<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kabupaten extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_kabupaten','kab');
		$this->load->model('M_provinsi','prov');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	

		$data_select2 = select2_v2('prov_id');
		$data['select2'] = field_kosong_v2('Provinsi', 'td_prov_id', $data_select2);
		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/kabupaten', $data);
	}

	public function ajax_kabupaten()
	{
		$filter = $this->input->get('filter');
		$count = $this->kab->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/kabupaten/ajax_kabupaten/";        
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

     	$data["list_data"] = $this->kab->fetch_kabupaten($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_kabupaten',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_kabupaten',$data);	
        }
	}

	public function edit()
	{
		$id = $this->input->post('id');
		$data['kab_nama'] = $this->input->post('nama');
        $data['prov_id'] = $this->input->post('prov_id');

		if($id=='')
        {
        	$data['id'] = $this->kab->get_max() + 1;
        	$this->kab->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->kab->_update($id, $data);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/sistem/kabupaten');
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->kab->_delete($id);
		redirect(base_url().'index.php/sistem/kabupaten');
	}

	public function show_provinsi()
	{
		$row = array();
		$return_arr = array();
		$row_array = array();

		$term = $this->input->get('term');

	 	$data = $this->prov->get_where_custom($term['term']);
	 	$data2 = array('results' => $data , 'more' => 'false' ); 

        echo json_encode($data);     
    }

	public function show_provinsi_by_id()
	{
		$id = $this->input->post('prov_id');
		$select = select2_v1('prov_id', 'rs_provinsi', 'id,nama_prov', "id=$id");
        echo $select;
        ?>
        <script>
        	$(".select2").select2({
			    minimumInputLength: 2,
			    tags: [],
			    ajax: {
			        url: '<?=base_url()?>index.php/sistem/Kabupaten/show_provinsi/',
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
			                        text: item.nama_prov,
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

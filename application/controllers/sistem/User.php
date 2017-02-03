<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('M_provinsi','prov');
        $this->load->model('M_kabupaten','kab');
        $this->load->model('M_kecamatan','kec');
		$this->load->model('M_desa','desa');
        $this->load->model('M_user','user');
		$this->load->library('pagination');
	}

	public function index()
	{
		//tampil template sistem menu list
		$data['modul_id'] = 1;	

		//tampil display dengan side menu
		$this->admin_template->display_with_sidebar('sistem_admin/user', $data);
	}

	public function ajax_user()
	{
		$filter = $this->input->get('filter');
		$count = $this->user->count_filter_where($filter);
		$data['count'] = $count;
		// konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/sistem/user/ajax_user/";        
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

     	$data["list_data"] = $this->user->fetch_user($config["per_page"],$page,$filter);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/sistem_admin/ajax_user',$data);    
        } else {
        	$this->load->view('/sistem_admin/ajax_user',$data);	
        }
	}

    public function edit_user($id=null)
    {
        //tampil template sistem menu list

        $data['modul_id'] = 1; 
        $data['data'] = $this->user->get_where($id); 
        $select_role = select2_v3('role_id', 'rs_role', 'id,role_name',$data['data']['role_id']);
        $data['select_role'] = field_kosong_v2('Role', 'td_role_id', $select_role );
        $select_prov = select2_v3('prov_id', 'rs_provinsi', 'id,nama_prov', $data['data']['propinsi_id']);
        $data['select_prov'] = field_kosong_v2('Provinsi', 'td_prov_id', $select_prov);
        if(empty($id))
        {
            $select_kota = select2_v1('kab_id','rs_kabupaten','id,kab_nama', 'id=0');
            $data['select_kota'] = field_kosong_v2('Kota / Kabupaten', 'td_kota_id', $select_kota );
            $select_kec = select2_v1('kec_id','rs_kecamatan','kec_id,kec_nama', 'kec_id=0');
            $data['select_kec'] = field_kosong_v2('Kecamatan', 'td_kec_id', $select_kec);
            $select_kel = select2_v1('kel_id','rs_desa','id,nama_desa', 'id=0');
            $data['select_kel'] = field_kosong_v2('Kelurahan', 'td_kel_id', $select_kel );
        }
        else
        {
            $select_kota = select2_v4('kab_id','rs_kabupaten','id,kab_nama', $data['data']['kota_id'] ,'prov_id='.$data['data']['propinsi_id']);
            $data['select_kota'] = field_kosong_v2('Kota / Kabupaten', 'td_kota_id', $select_kota );
            $select_kec = select2_v4('kec_id','rs_kecamatan','kec_id,kec_nama', $data['data']['kec_id'] ,'kabupaten_id='.$data['data']['kota_id']);
            $data['select_kec'] = field_kosong_v2('Kecamatan', 'td_kec_id', $select_kec);
            $select_kel = select2_v4('kel_id','rs_desa','id,nama_desa', $data['data']['kel_id'] ,'kec_id='.$data['data']['kec_id']);
            $data['select_kel'] = field_kosong_v2('Kelurahan', 'td_kel_id', $select_kel );           
        }
        if(empty($id))
        {
            $data['cek'] = 0;
        }
        else
        {
            $data['cek'] = 1;
        }

        $this->admin_template->display_with_sidebar('sistem_admin/edit_user', $data);
    }

	public function edit()
	{
		$cek = $this->input->post('cek');
        $id = $this->input->post('id');
		$data['nama'] = $this->input->post('nama');
        $data['role_id'] = $this->input->post('role_id');
        $password = $this->input->post('password');
        $data['jenis_kelamin'] = $this->input->post('jenis_kelamin');
        $data['no_hp'] = $this->input->post('no_hp');
        $data['email'] = $this->input->post('email');
        $data['alamat'] = $this->input->post('alamat');
        $data['propinsi_id'] = $this->input->post('prov_id');
        $data['kota_id'] = $this->input->post('kab_id');
        $data['kec_id'] = $this->input->post('kec_id');
        $data['kel_id'] = $this->input->post('kel_id');

		if($cek==0)
        {
            $data['id'] = $this->input->post('id');
            $pwd_encrypt = hash("haval256,5", $password);
            $data['password'] = $pwd_encrypt;
        	$this->user->_insert($data);
        	echo "-->insert ";
        } 
        else 
    	{
    		$this->user->_update($id, $data);
    		echo "-->update ";
    	}
    	redirect(base_url().'index.php/sistem/user');
	}

	function delete()
	{
		$id = $this->input->post('id');
		$this->user->_delete($id);
		redirect(base_url().'index.php/sistem/user');
	}

    public function show_kabupaten_by_id()
    {
        $id = $this->input->post('prov_id');
        $select = select2_v1('kab_id', 'rs_kabupaten', 'id,kab_nama', "prov_id=$id");
        echo $select;
        ?>
        <script>
        $('#kab_id').change(function(event) {
            var kab_id = $('#kab_id').val();
            $.ajax({
                url: '<?=base_url()?>index.php/sistem/user/show_kecamatan_by_id',
                type: 'POST',
                data: 'kab_id='+kab_id,
                success: function(msg) {
                    $("#td_kec_id").html(msg);
                }
            }); 
            $.ajax({
                url: '<?=base_url()?>index.php/sistem/user/show_kelurahan_by_id',
                type: 'POST',
                data: 'kec_id=0',
                success: function(msg) {
                    $("#td_kel_id").html(msg);
                }
            });  
        });
        </script> 
        <?php
    }

    public function show_kecamatan_by_id()
    {
        $id = $this->input->post('kab_id');
        $select = select2_v1('kec_id', 'rs_kecamatan', 'kec_id,kec_nama', "kabupaten_id=$id");
        echo $select;
        ?>
        <script>
        $('#kec_id').change(function(event) {
            var kec_id = $('#kec_id').val();
            $.ajax({
                url: '<?=base_url()?>index.php/sistem/user/show_kelurahan_by_id',
                type: 'POST',
                data: 'kec_id='+kec_id,
                success: function(msg) {
                    $("#td_kel_id").html(msg);
                }
            }); 
        });
        </script> 
        <?php
    }

    public function show_kelurahan_by_id()
    {
        $id = $this->input->post('kec_id');
        $select = select2_v1('kel_id', 'rs_desa', 'id,nama_desa', "kec_id=$id");
        echo $select;
    }
}

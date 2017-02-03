<?php defined('BASEPATH') OR exit('No direct script access allowed');

class daftar_inventaris extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_asset','asset');
        $this->load->model('mdl_poli','poli');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_inven'] = array('Semua Inventaris', 'Inventaris Aktif', 'Hapus / Dimusnahkan');
        $data['list_poli'] = $this->poli->get_all();        
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/daftar_inventaris_view', $data);
	}

    public function ajax_daftar_inventaris()
    {
        $inventaris = $this->input->post('inventaris');
        $lokasi_barang = $this->input->post('lokasi_barang');
        $count = $this->asset->count_asset($inventaris,$lokasi_barang);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/daftar_inventaris/ajax_daftar_inventaris";        
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
        $data['page'] = $page;
        if ($page!=0)
        {
            $page = $config["per_page"] * ($page-1);   
        }

        $listdata = $this->asset->fetch_asset($config["per_page"], $page, $inventaris,$lokasi_barang);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        $data['inventaris']  = $inventaris;
        $data['lokasi_barang']  = $lokasi_barang;
 

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_daftar_inventaris',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_daftar_inventaris',$data);   
        }
    }


    function hapus()
    {
        $no_asset = $this->input->post('no_asset');
        $alasan = $this->input->post('alasan');
        $data['isWriteOff'] = 'DELETED';
        $data['alasan_write_off'] = $alasan;
        $data['id_user_write_off'] = '2001';
        $data['tgl_write_off'] = date('Y-m-d');
        $this->asset->_update($no_asset,$data);

    }
    
    function hapus_obat()
    {
        $nama = $this->input->post('nama');
        $this->jenis_obat->_delete($nama);  
        echo '<script>  
            $.ajax({
                type: "POST",
                data: "ajax=1",
                url: "'.base_url().'index.php/gudang_logistik/daftar_inventaris/ajax_jenis_obat",
                success: function(msg) {
                    $("div#show_modal_2").html(msg);
                }
            }); </script>';     
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class master_item_barang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_barang','barang');
        $this->load->model('mdl_satuan','satuan');
        $this->load->model('mdl_kategori_item','kategori_item');
        $this->load->model('mdl_jenis_obat','jenis_obat');
        $this->load->model('mdl_principal','principal');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_kategori_item'] = $this->kategori_item->get('nama')->result_array();
        $data['list_order_by'] = array('Nama','Kemasan Kecil', 'Kemasan Sedang', 'Kemasan Besar', 'Kategori');
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/master_item_barang_view', $data);
	}

    public function ajax_master_item_barang()
    {
        $kategori_item = $this->input->post('kategori_item');
        $sort_by = $this->input->post('sort_by');
        $nama = $this->input->post('nama');
        $count = $this->barang->count_barang($kategori_item,$sort_by, $nama);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/master_item_barang/ajax_master_item_barang";        
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
       

        $listdata = $this->barang->fetch_barang($config["per_page"], $page, $kategori_item, $sort_by, $nama);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        $data['kategori_item']  = $kategori_item;
        $data['sort_by']  = $sort_by;
        $data['nama']  = $nama;      

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_master_item_barang',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_master_item_barang',$data);   
        }
    }

    public function ajax_edit_item_barang()
    {
        $id = $this->input->post('id');
        $data['data'] = $this->barang->get_where($id);
        $data['list_kategori_item'] = $this->kategori_item->get('nama')->result_array();
        $data['list_satuan'] = $this->satuan->get('nama')->result_array();
        $data['list_jenis_obat'] = $this->jenis_obat->get('nama')->result_array();
        $data['list_principal'] = $this->principal->get('name')->result_array();
        $data['list_dosis'] = array('mcg/1ml','mcg/5ml','mcg/10ml','mcg/20ml','mg/1ml','mg/5ml','mg/10ml','mg/20ml', 'g/liter', 'mg/liter');
        $this->load->view('/gudang_logistik/ajax_edit_item_barang',$data); 

    }

    public function simpan_barang()
    {
        $id = $this->input->post('id');
        $data['kategori_item'] = $this->input->post('kategori_item');
        $data['nama'] = $this->input->post('nama');
        $data['satuan'] = $this->input->post('satuan');
        $data['pengali_satuan_sedang'] = $this->input->post('pengali_satuan_sedang');
        $data['nama_satuan_sedang'] = $this->input->post('nama_satuan_sedang');
        $data['pengali_satuan_besar'] = $this->input->post('pengali_satuan_besar');
        $data['nama_satuan_besar'] = $this->input->post('nama_satuan_besar');
        $data['rak_penyimpanan'] = $this->input->post('rak_penyimpanan');
        $data['barcode'] = $this->input->post('barcode');
        $data['principal'] = $this->input->post('principal');
        $data['jenis'] = $this->input->post('jenis');
        $data['generik'] = $this->input->post('generik');
        $data['bentuk_sediaan'] = $this->input->post('bentuk_sediaan');
        $data['dosis_sediaan'] = $this->input->post('dosis_sediaan');
        $data['kekuatan_sediaan'] = $this->input->post('satuan_dosis_sediaan');
        $data['stock_limit'] = $this->input->post('mode_limit');
        $data['stock_limit_digudang'] = $this->input->post('limit_di_gudang');

        if(empty($id))
        {
            $this->barang->_insert($data);
        }
        else
        {
            $this->barang->_update($id,$data);
        }

        echo '<script>  
            $.ajax({
                type: "POST",
                data: "ajax=1&kategori_item=0",
                url: "'.base_url().'index.php/gudang_logistik/master_item_barang/ajax_master_item_barang",
                success: function(msg) {
                    $("div#show_list").html(msg);
                }
            }); </script>';
    }

    public function ajax_jenis_obat()
    {
        $kategori_item = $this->input->post('kategori_item');
        $sort_by = $this->input->post('sort_by');
        $nama = $this->input->post('nama');
        $count = $this->jenis_obat->count_all() ;
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/master_item_barang/ajax_jenis_obat";        
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

        $listdata = $this->jenis_obat->get_with_limit($config["per_page"], $page, 'nama');
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        $data['kategori_item']  = $kategori_item;
        $data['sort_by']  = $sort_by;
        $data['nama']  = $nama;      

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_jenis_obat',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_jenis_obat',$data);   
        }
    }

    function tambah_obat()
    {
        $data['nama'] = $this->input->post('nama');
        $this->jenis_obat->_insert($data);
        echo '<script>  
            $.ajax({
                type: "POST",
                data: "ajax=1",
                url: "'.base_url().'index.php/gudang_logistik/master_item_barang/ajax_jenis_obat",
                success: function(msg) {
                    $("div#show_modal_2").html(msg);
                }
            }); </script>';
    }

    function hapus_obat()
    {
        $nama = $this->input->post('nama');
        $this->jenis_obat->_delete($nama);  
        echo '<script>  
            $.ajax({
                type: "POST",
                data: "ajax=1",
                url: "'.base_url().'index.php/gudang_logistik/master_item_barang/ajax_jenis_obat",
                success: function(msg) {
                    $("div#show_modal_2").html(msg);
                }
            }); </script>';     
    }
}
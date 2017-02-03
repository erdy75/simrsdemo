<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kirim_stock extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_asset','asset');
        $this->load->model('mdl_poli','poli');
        $this->load->model('mdl_gu_order','gu_order');
        $this->load->model('mdl_gu_order_detail','gu_order_detail');
        $this->load->model('mdl_gudang_kirim','gudang_kirim');
        $this->load->model('mdl_gudang_kirim_detail','gudang_kirim_detail');
        $this->load->model('mdl_stock_poli','stock_poli');
        $this->load->model('mdl_stock_poli_detail','stock_poli_detail');
        $this->load->model('mdl_barang','barang');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_poli'] = $this->poli->get_all();        
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/kirim_stock_view', $data);
	}

    public function ajax_kirim_stock()
    {
        $unit = $this->input->post('unit');
        $data['unit'] = $unit;
        $count = $this->gu_order->count_gu_order($unit);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/kirim_stock/ajax_kirim_stock";        
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

        $listdata = $this->gu_order->fetch_gu_order($config["per_page"], $page, $unit);
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();

 

        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_kirim_stock',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_kirim_stock',$data);   
        }
    }

    function ajax_detail_kirim_stock()
    {
        $no_order = $this->input->post('no_order');
        $pemesan = $this->input->post('pemesan');
        $data['data'] = $this->gu_order->get_where($no_order);
        $data['listdata'] = $this->gu_order_detail->get_where_custom('no_order', $no_order);
        $data['pemesan'] = $pemesan; 
        $this->load->view('/gudang_logistik/ajax_detail_kirim_stock',$data);
    }

    function ajax_barang_info()
    {
        $nama = $this->input->post('nama');
        $data = $this->stock_poli_detail->get_harga_unit($nama); 
        echo '<script>  
            $("label#stock_kurang").text("Stock : -['.$data['jumlah_terima'].']");
            $("label#satuan").text("['.$data['satuan'].']");
            $("input[name=satuan_h]").val("'.$data['satuan'].'");
        </script>';     
    }

    function insert_kirim_stock()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl_kirim = $this->input->post('tgl_kirim');
        $poli_tujuan = $this->input->post('poli_tujuan');
        $catatan = $this->input->post('catatan');
        $data_bundle = $this->input->post('data_bundle');
        // echo "tgl_kirim = ".$tgl_kirim."<br>";
        // echo "poli_tujuan = ".$poli_tujuan."<br>";
        // echo "catatan = ".$catatan."<br>";
        // print_r($data_bundle);
        $data_gudang['no_kirim'] = $this->gudang_kirim->get_max() + 1;
        $data_gudang['tujuan'] = $poli_tujuan;
        $data_gudang['idpetugas_gudang'] = '1013';
        $data_gudang['tgl'] = date('Y-m-d');
        $data_gudang['jam'] = date('H:i:s');
        $data_gudang['status'] = 'PROSES KIRIM AJA';
        $data_gudang['remark_kirim'] = $catatan;
        $data_poli['no_kirim'] = $this->stock_poli->get_max() + 1;
        $data_poli['pengirim'] = '1013';
        $data_poli['poli'] = $poli_tujuan;
        $data_poli['tgl'] = date('Y-m-d');
        $data_poli['jam'] = date('H:i:s');
        $data_poli['catatan'] = 'AUTO-DEBET STOCK TRANSFER';
        $data_poli['id_user'] = '1013';
        $data_poli['no_ref_gudang'] = $data_gudang['no_kirim'];
        $this->gudang_kirim->_insert($data_gudang);
        $this->stock_poli->_insert($data_poli);
        $arr_data_bundle = explode('~~~',$data_bundle);
        for ($i=0; $i < count($arr_data_bundle) ; $i++) { 
            if($arr_data_bundle[$i]!='0')
            {
                $new_data_bundle = explode('###', $arr_data_bundle[$i]);
                $data_gudang_detail['no_kirim'] = $data_gudang['no_kirim'];
                $data_gudang_detail['nama_barang'] = $new_data_bundle[0];
                $data_gudang_detail['jumlah'] = $new_data_bundle[1];
                $data_gudang_detail['harga'] = $new_data_bundle[2];
                $data_gudang_detail['batch_no'] = $new_data_bundle[3];
                $data_gudang_detail['kelompok_stock'] = 'GUDANG MEDIS';
                $data_gudang_detail['satuan'] = $new_data_bundle[4];
                $data_gudang_detail['expired'] = $this->date->konversi2b($new_data_bundle[5]);
                $data_poli_detail['no_kirim'] = $data_poli['no_kirim'];
                $data_poli_detail['nama_barang'] = $data_gudang_detail['nama_barang'];
                $data_poli_detail['harga_terima'] = $data_gudang_detail['harga'];
                $data_poli_detail['jumlah_terima'] = $data_gudang_detail['jumlah'];
                $data_poli_detail['satuan'] = $data_gudang_detail['satuan'];
                $data_poli_detail['expired'] = $data_gudang_detail['expired'];
                $this->gudang_kirim_detail->_insert($data_gudang_detail);
                $this->stock_poli_detail->_insert($data_poli_detail);
            }
        }
    }

    function closing_order()
    {
        $no_order = $this->input->post('no_order');
        $data['status'] = "Closed";
        $this->gu_order->_update($no_order,$data);
    }

    function hapus_order()
    {
        $no_order = $this->input->post('no_order');
        $data['status'] = "Closed";
        $this->gu_order->_delete($no_order);
    }
}
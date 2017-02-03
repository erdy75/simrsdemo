<?php defined('BASEPATH') OR exit('No direct script access allowed');

class penyerahan_retur_supplier extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('mdl_gudang_terima','gudang_terima');
        $this->load->model('mdl_gudang_terima_detail','gudang_terima_detail');
        $this->load->model('mdl_gudang_retur','gudang_retur');
        $this->load->model('mdl_gudang_retur_detail','gudang_retur_detail');
        $this->load->model('mdl_supplier','supplier');
        $this->load->model('mdl_stock_poli_detail','stock_poli_detail');
        $this->load->model('mdl_barang','barang');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator'; 
        $data['list_supplier'] = $this->supplier->get_all();       
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/penyerahan_retur_supplier_view', $data);
	}

    public function ajax_retur_supplier()
    {
        $count = $this->gudang_retur->count_all();
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/gudang_logistik/penyerahan_retur_supplier/ajax_retur_supplier";        
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
        $listdata = $this->gudang_retur->get_with_limit($config["per_page"], $page, 'no_retur');
        $data['listdata'] = $listdata;
        $data["links"] = $this->pagination->create_links();
        if($this->input->get('ajax')) {
            $this->load->view('/gudang_logistik/ajax_retur_supplier',$data);    
        } else {
            $this->load->view('/gudang_logistik/ajax_retur_supplier',$data);   
        }        
    }

    function insert_retur()
    {
        date_default_timezone_set("Asia/Jakarta");
        $no_retur = $this->input->post('no_retur');
        $nama_supplier = $this->input->post('nama_supplier');
        $diterima_oleh = $this->input->post('diterima_oleh');
        $catatan = $this->input->post('catatan');
        $data_bundle = $this->input->post('data_bundle');


        $data_gudang['no_retur'] = $no_retur;
        $data_gudang['supplier'] = $nama_supplier;
        $data_gudang['petugas'] = '1013';
        $data_gudang['tgl'] = date('Y-m-d');
        $data_gudang['jam'] = date('H:i:s');
        $data_gudang['penerima'] = $diterima_oleh;
        $data_gudang['kelompok_stock'] = 'GUDANG MEDIS';
        $data_gudang['catatan'] = $catatan;
        $this->gudang_retur->_insert($data_gudang);
        $arr_data_bundle = explode('~~~',$data_bundle);
        for ($i=0; $i < count($arr_data_bundle) ; $i++) { 
            if($arr_data_bundle[$i]!='0')
            {
                $new_data_bundle = explode('###', $arr_data_bundle[$i]);
                $data_gudang_detail['no_retur'] = $data_gudang['no_retur'];
                $data_gudang_detail['nama_barang'] = $new_data_bundle[0];
                $data_gudang_detail['jumlah'] = $new_data_bundle[1];
                $data_gudang_detail['harga'] = $new_data_bundle[3];               
                $data_gudang_detail['batch'] = $new_data_bundle[4];
                $data_gudang_detail['alasan_retur'] = $new_data_bundle[5];
                $data_gudang_detail['tgl_terima_returan'] = '0000-00-00';
                $this->gudang_retur_detail->_insert($data_gudang_detail);
            }
        }

        echo '<script>  
                    alert("data berhasil dimasukkan");
                  $("#cari_retur_supp").removeAttr("disabled");
                  $("#btn_koreksi").removeAttr("disabled");
                  $("select[name=pilihan]").removeAttr("disabled");
                  $("#proses_baru").removeAttr("disabled"); 
                  $("input[name=no_retur]").val("~AUTO NUMBER~");
                  $("select[name=nama_supplier]").val("ACACIA, PT");
                  $("input[name=diterima_oleh]").val("");
                  $("textarea[name=catatan]").val("");
                  $("input[name=koreksi_retur]").val("");
                  $("input[name=nama]").val("");
                  $("label#satuan").text("[satuan]");
                  $("input[name=jumlah_dikirim]").val("");
                  $("input[name=harga_retur]").val("");
                  $("input[name=alasan_di_retur]").val("");
                  $("input[name=batch]").val(""); 
                  $(".show_detail_retur").hide();
                  $("tr.list_barang").remove();
        </script>';  
    }

    function ajax_barang_info()
    {
        $nama = $this->input->post('nama');
        $data = $this->stock_poli_detail->get_harga_unit($nama); 
        echo '<script>  
            $("input[name=satuan]").val("'.$data['satuan'].'");
        </script>';     
    }

    function new_no_faktur()
    {
        $new_no_faktur = $this->gudang_retur->get_max() + 1;
        echo '<script>  
            var no_retur = $("input[name=no_retur]").val("'.$new_no_faktur.'");
        </script>';         
    }

    function cek_supplier()
    {
        $supplier = $this->input->post('supplier');
        $barang = $this->input->post('barang');
        $jml_data = $this->gudang_retur->cek_retur($supplier,$barang);
        if($jml_data == 0)
        {
            echo '<script>  
                var r = confirm("Agen '.$supplier.' tidak pernah melakukan transaksi barang '.$barang.', mau melanjutkan ?");
                if(r==true) {
                    tambah_baris();
                } else {
                    alert("salah");
                }
            </script>';              
        } else {
            echo '<script>  
                tambah_baris();
            </script>';        
        }
    }

}
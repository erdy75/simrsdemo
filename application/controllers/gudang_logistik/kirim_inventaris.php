<?php defined('BASEPATH') OR exit('No direct script access allowed');

class kirim_inventaris extends CI_Controller {

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
        $this->admin_template_minor->display_with_sidebar('gudang_logistik/kirim_inventaris_view', $data);
	}


    function insert_kirim_inven()
    {
        date_default_timezone_set("Asia/Jakarta");
        $tgl_lampau = $this->input->post('tgl_lampau');
        $poli_tujuan = $this->input->post('poli_tujuan');
        $catatan = $this->input->post('catatan');
        $data_bundle = $this->input->post('data_bundle');
        // echo "tgl_kirim = ".$tgl_kirim."<br>";
        // echo "poli_tujuan = ".$poli_tujuan."<br>";
        // echo "catatan = ".$catatan."<br>";
        // print_r($data_bundle);
        // $i = 10;
        // $str = "+".$i." years";
        // $end = date('Y-m-d', strtotime($str));
        // echo $end;

        $data_gudang['no_kirim'] = $this->gudang_kirim->get_max() + 1;
        $data_gudang['tujuan'] = $poli_tujuan;
        $data_gudang['idpetugas_gudang'] = '1013';
        $data_gudang['tgl'] = date('Y-m-d');
        $data_gudang['jam'] = date('H:i:s');
        $data_gudang['status'] = 'PROSES KIRIM AJA';
        $data_gudang['remark_kirim'] = $catatan;
        $this->gudang_kirim->_insert($data_gudang);
        $arr_data_bundle = explode('~~~',$data_bundle);
        for ($i=0; $i < count($arr_data_bundle) ; $i++) { 
            if($arr_data_bundle[$i]!='0')
            {
                $new_data_bundle = explode('###', $arr_data_bundle[$i]);
                $data_asset['no_asset'] = $this->asset->get_max() + 1;
                $data_asset['unit'] = $poli_tujuan;
                $data_asset['tanggal_terima'] = date('Y-m-d');
                $data_asset['jam_terima'] = date('H:i:s');
                $data_asset['id_user'] = '1013';
                $data_asset['nama'] = $new_data_bundle[0];
                $data_asset['harga_beli'] = $new_data_bundle[1];
                $data_asset['warna'] = $new_data_bundle[2];
                $data_asset['spesifikasi'] = $new_data_bundle[3];
                $data_asset['batch_no'] = $new_data_bundle[4];
                $data_gudang_detail['no_kirim'] = $data_gudang['no_kirim'];
                $data_gudang_detail['nama_barang'] = $data_asset['nama'];
                $data_gudang_detail['jumlah'] = 1;
                $data_gudang_detail['harga'] = $data_asset['harga_beli'];               
                $data_gudang_detail['batch_no'] = $data_asset['batch_no'];
                $data_gudang_detail['kelompok_stock'] = 'GUDANG MEDIS';
                $data_gudang_detail['satuan'] = $new_data_bundle[6];
                $data_gudang_detail['no_asset_if_asset'] = $data_asset['no_asset'];
                $umur_barang = intval($new_data_bundle[5]);
                $str = "+".$umur_barang." years";
                $expired = date('Y-m-d', strtotime($str));
                $data_gudang_detail['expired'] = $expired;
                $this->asset->_insert($data_asset);
                $this->gudang_kirim_detail->_insert($data_gudang_detail);
            }
        }
    }

    function ajax_barang_info()
    {
        $nama = $this->input->post('nama');
        $data = $this->stock_poli_detail->get_harga_unit($nama); 
        echo '<script>  
            $("input[name=satuan]").val("'.$data['satuan'].'");
        </script>';     
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
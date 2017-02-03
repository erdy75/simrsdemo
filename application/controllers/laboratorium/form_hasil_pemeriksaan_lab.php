<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Form_hasil_pemeriksaan_lab extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_periksa', 'lab_periksa');
        $this->load->model('mdl_pasien_pribadi', 'pas_pribadi');
        $this->load->model('mdl_faktur_detail_prebayar', 'det_prebayar');
        $this->load->model('mdl_lab_periksa_detail', 'lab_periksa_det');
        $this->load->model('mdl_lab_medical_record', 'lab_medical_rec');
        $this->load->model('mdl_tdok_bio', 'tdok_bio');
        $this->load->model('mdl_lab_sub', 'lab_sub');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['nama'] = 'Administator';
		$this->admin_template_minor->display_with_sidebar('lab/pasien_lab_view', $data);
	}

    public function hasil($no_order=null)
    {
        $data['nama'] = 'Administator';
        $data['no_order'] = $no_order;
        $list_data_utama = $this->lab_periksa_det->get_where_custom2('no_order', $no_order);
        $data['data_pasien'] = $this->lab_periksa->get_where($no_order);
        $data['list_dokter'] = $this->tdok_bio->get_all();
        $data['data_sub'] = array();
        for ($i=0; $i < count($list_data_utama) ; $i++) { 
            $list_data_sub = $this->lab_sub->get_form_pemeriksaan($list_data_utama[$i]['bidang'], $list_data_utama[$i]['nama_pemeriksaan']);
            for ($j=0; $j < count($list_data_sub) ; $j++) { 
                array_push($data['data_sub'], $list_data_sub[$j]);
            }   
        }
        //var_dump($data['data_sub']);
        $this->admin_template_minor->display_with_sidebar('lab/form_hasil_periksa_view', $data);
    }

	public function ajax_periksa()
	{
        $no_order = $this->input->post('no_order');
        $data['no_order'] = $no_order;
        $data['data_sub'] = $this->lab_medical_rec->get_where_custom2('no_order', $no_order);
        $this->load->view('lab/ajax_hasil_periksa_lab',$data);        
	}

    public function approved_process()
    {
        $no_order = $this->input->post('no_order');
        $data['isApproved'] = 'Yes';
        $this->lab_periksa->_update($no_order, $data);
    }

    public function proses()
    {
        $no_order = $this->input->post('no_order');
        $dr_jawab = $this->input->post('dr_jawab');
        $pemeriksa = $this->input->post('pemeriksa');
        $catatan = $this->input->post('catatan');
        $data_colect = $this->input->post('data_colect');
        $sex = $this->input->post('sex');
        $alamat = $this->input->post('alamat');
        $data_update['penanggung_jawab'] = $dr_jawab;
        $data_update['pemeriksa'] = $pemeriksa;
        $data_update['catatan_hasil_periksa'] = $catatan;
        $data_update['sex_manual_edit'] = $sex;
        $data_update['alamat_manual_edit'] = $alamat;
        $data_update['status'] = 'sementara';
        $this->lab_periksa->_update($no_order, $data_update);
        $this->lab_medical_rec->_delete($no_order);
        $listdata = array();
        for ($i=0; $i < count($data_colect) ; $i++) { 
            $listdata = explode("###", $data_colect[$i]);
            $data_insert['no_order'] = $no_order;
            $data_insert['pemeriksaan'] = $listdata[0];
            $data_insert['nilai'] = $listdata[1];
            $data_insert['nilai_normal'] = $listdata[2];
            $data_insert['isNormal'] = $listdata[3];
            $data_insert['inc'] = $i; 
            $this->lab_medical_rec->_insert($data_insert);
        }
        redirect(base_url().'index.php/laboratorium/Pemeriksaan_show');
    }

    public function page_setup()
    {
        $str = file_get_contents('assets/data/results.json');
        $json = json_decode($str, true);
        $listdata = $json['data'];
        $data['data_colect'] = array();
        for ($i=0; $i < count($listdata) ; $i++) { 
            array_push($data['data_colect'], $listdata[$i]);
        }
        $data['pil_kertas'] = array(
                                    array('val'=> '1','text' => 'Kertas HVS Kosong'),
                                    array('val'=> '2','text' => 'Kertas HVS Dengan Cetakan')
                               ); 
        $data['angka_text'] = array(7,8,9,10);
        $data['angka_text_header'] = array(8,9,10,11,12);
        $data['abnormal'] = array(
                                    array('val'=> '*','text' => 'Tanda Bintang'),
                                    array('val'=> '**','text' => 'Tanda Double Bintang'),
                                    array('val'=> 'red','text' => 'Tanda Merah'),
                                    array('val'=> 'red~**','text' => 'Tanda Merah & Double Bintang')
                                );
        $data['ukuran_kertas'] = array('kuarto--','kuarto','A4','folio');
        $data['format_hasil'] = array(
                                    array('val'=> '3 kol','text' => '[3 kolom] Pemeriksaan, Hasil, Nilai Normal'),
                                    array('val'=> '4A kol','text' => '[4A kolom] Pemeriksaan, Hasil, Nilai Normal, Metode'),
                                    array('val'=> '4B kol','text' => '[4B kolom] Bidang, Pemeriksaan, Hasil, Nilai Normal'),
                                    array('val'=> '5 kol','text' => '[5 kolom] Bidang, Pemeriksaan, Hasil, Nilai Normal, Metode')
                                );        
        $data['nama'] = 'Administator';
        $this->admin_template_minor->display_with_sidebar('lab/page_setup_view', $data);
    }

    public function simpan_page_setup()
    {
        $data = array();
        $pil_kertas = $this->input->post('pil_kertas');
        $font_name_result_h = $this->input->post('font_name_result_h');
        $font_size_result_h = $this->input->post('font_size_result_h');
        $font_name_result_d = $this->input->post('font_name_result_d');
        $font_size_result_d = $this->input->post('font_size_result_d');
        $penanda_hasil_abnormal = $this->input->post('penanda_hasil_abnormal');
        $text_head_report_1 = $this->input->post('text_head_report_1');
        $text_head_report_2 = $this->input->post('text_head_report_2');
        $text_head_report_3 = $this->input->post('text_head_report_3');
        $text_head_report_4 = $this->input->post('text_head_report_4');
        $ukuran_kertas = $this->input->post('ukuran_kertas');
        $font_size_head_report = $this->input->post('font_size_head_report');
        $format_hasil = $this->input->post('format_hasil');
        $lebar_perkolom = $this->input->post('lebar_perkolom');
        $left_margin = $this->input->post('left_margin');
        $logo_width = $this->input->post('logo_width');
        $logo_height = $this->input->post('logo_height');

        $datlist = array_push($data, array('pil_kertas'=> $pil_kertas));
        $datlist = array_push($data, array('font_name_result_h'=> $font_name_result_h));
        $datlist = array_push($data, array('font_size_result_h'=> $font_size_result_h));
        $datlist = array_push($data, array('font_name_result_d'=> $font_name_result_d));
        $datlist = array_push($data, array('font_size_result_d'=> $font_size_result_d));
        $datlist = array_push($data, array('penanda_hasil_abnormal'=> $penanda_hasil_abnormal));
        $datlist = array_push($data, array('text_head_report_1'=> $text_head_report_1));
        $datlist = array_push($data, array('text_head_report_2'=> $text_head_report_2));
        $datlist = array_push($data, array('text_head_report_3'=> $text_head_report_3));
        $datlist = array_push($data, array('text_head_report_4'=> $text_head_report_4));
        $datlist = array_push($data, array('ukuran_kertas'=> $ukuran_kertas));
        $datlist = array_push($data, array('font_size_head_report'=> $font_size_head_report));
        $datlist = array_push($data, array('format_hasil'=> $format_hasil));
        $datlist = array_push($data, array('lebar_perkolom'=> $lebar_perkolom));
        $datlist = array_push($data, array('left_margin'=> $left_margin));
        $datlist = array_push($data, array('logo_width'=> $logo_width));
        $datlist = array_push($data, array('logo_height'=> $logo_height));

        $response['data'] = $data;
        $fp = fopen('assets/data/results.json', 'w');
        fwrite($fp, json_encode($response));
        fclose($fp);

        $str = file_get_contents('assets/data/results.json');
        $json = json_decode($str, true);
        $listdata = $json['data'];
        $data_colect = array();
        for ($i=0; $i < count($listdata) ; $i++) { 
            array_push($data_colect, $listdata[$i]);
        }
        echo '<pre>' . print_r($data_colect, true) . '</pre>';
        redirect(base_url().'index.php/laboratorium/Form_hasil_pemeriksaan_lab/page_setup');

    }

    public function cetak()
    {
        $this->load->helper('pdf_helper');
        $no_order = $this->input->get('no_order');
        $list_data_utama = $this->lab_periksa_det->get_where_custom2('no_order', $no_order);
        $data['list_data_utama']  = $list_data_utama;
        $data['nama_rs'] = "RS. NCR";
        $data['telp'] = "022-9090900";
        $list_periksa = $this->lab_periksa->get_where($no_order);
        $data['list_periksa'] = $list_periksa;
        $data['tgl_periksa_h'] = $this->date->konversi2a($list_periksa['tanggal']);
        $data['jam_periksa_h'] = $list_periksa['jam'];
        $data['no_order'] =  substr($list_periksa['no_order'], 0, 2).'-'.substr($list_periksa['no_order'], 2, 3).'-'
                            .substr($list_periksa['no_order'], 5, 3);
        $data['tgl_gabung'] = str_replace('-', '', $data['tgl_periksa_h']);
        $no_mr = substr($list_periksa['cib'], 0, 3).'.'.substr($list_periksa['cib'], 3, 2).'.'
                .substr($list_periksa['cib'], 5, 2).'.'.substr($list_periksa['cib'], 7, 9);
        $data['no_mr'] = $no_mr;
        $data['nama'] = $list_periksa['nama_manual_edit'];
        $data['alamat'] = strtoupper($list_periksa['alamat_manual_edit']);
        $data['jenis_rawat'] = strtoupper($list_periksa['jalan_inap']);
        $data['list_periksa_det'] = $this->lab_periksa_det->get_where_custom2('no_order', $list_periksa['no_order']);
        $data['data_sub'] = array();

        $str = file_get_contents('assets/data/results.json');
        $json = json_decode($str, true);
        $jsondata = $json['data'];
        $data['data_colect'] = array();
        for ($i=0; $i < count($jsondata) ; $i++) { 
            array_push($data['data_colect'], $jsondata[$i]);
        }

        if($list_periksa['status']=='sementara')
        {
            $data['data_sub'] = $this->lab_medical_rec->get_where_custom2('no_order', $no_order);
            if($data['data_colect'][12]['format_hasil'] == '3 kol')
            {
                $this->load->view('/lab/print_page_setup1a',$data);
            } elseif($data['data_colect'][12]['format_hasil'] == '4A kol') {
                $this->load->view('/lab/print_page_setup1b',$data);
            } elseif($data['data_colect'][12]['format_hasil'] == '4B kol') {
                $this->load->view('/lab/print_page_setup1c',$data);
            } else {
                $this->load->view('/lab/print_page_setup',$data);
            }          
        }
        else
        {
            for ($i=0; $i < count($list_data_utama) ; $i++) { 
                $list_data_sub = $this->lab_sub->get_form_pemeriksaan($list_data_utama[$i]['bidang'], $list_data_utama[$i]['nama_pemeriksaan']);
                for ($j=0; $j < count($list_data_sub) ; $j++) { 
                    array_push($data['data_sub'], $list_data_sub[$j]);
                }   
            }
            if($data['data_colect'][12]['format_hasil'] == '3 kol')
            {
                $this->load->view('/lab/print_page_setup2a',$data);
            } elseif($data['data_colect'][12]['format_hasil'] == '4A kol') {
                $this->load->view('/lab/print_page_setup2b',$data);
            } elseif($data['data_colect'][12]['format_hasil'] == '4B kol') {
                $this->load->view('/lab/print_page_setup2c',$data);
            } else {
                $this->load->view('/lab/print_page_setup2',$data);
            }
            
        }
        
    }
}
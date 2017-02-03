<?php defined('BASEPATH') OR exit('No direct script access allowed');

class rekap_lab_transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_periksa','lab_periksa');
        $this->load->model('mdl_lab_periksa_detail','lab_periksa_detail');
		$this->load->library('pagination');
	}

	public function index()
	{
        $data['nama'] = 'Administator';
        $data['list_transaksi'] = array("Rekap Transaksi","Detail Transaksi", "Lap.Harian dalam 1 bulan (By Jenis)","Lap.Harian dalam 1 bulan (By Penjamin)", "Lap.Harian dalam 1 bulan (By Pemeriksaan)");
        $data['list_jenispasien'] = array("SEMUA JENIS","UMUM", "ASURANSI", "KARYAWAN");
        $data['list_penjamin'] = array("-","ASURANSI (NOT REGISTERED)", "RS WILLIAM BOOTH");
        $data['list_rawat'] = array("-","Rawat Inap", "Rawat Jalan");
        $data['list_pencarian'] = array("No RM / Nama","Dr Pengirim", "Status", "Analis Lab", "Petugas Entry");
        $this->admin_template_minor->display_with_sidebar('lab/rekap_lab_transaksi_view', $data);
	}


    public function ajax_rekap_transaksi()
    {
        $periode = $this->input->post('periode');
        $jenis_pasien = $this->input->post('jenis_pasien');
        $penjamin = $this->input->post('penjamin');
        $rawat = $this->input->post('rawat');
        $filter_pencarian = $this->input->post('filter_pencarian');
        $pencarian = $this->input->post('pencarian');
        $order_p = $this->input->post('order_p');
        $count = $this->lab_periksa->count_rek_transaksi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/rekap_lab_transaksi/ajax_rekap_transaksi";        
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
        if ($page!=0)
        {
            $page = $config["per_page"] * ($page-1);    
        }
        $listdata = $this->lab_periksa->fetch_rek_transaksi($config["per_page"],$page,$periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['listdata'] = $listdata;
        $data['tot_tarif'] = $this->lab_periksa->total_tarif($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['tot_unit_cost'] = $this->lab_periksa->total_unit_cost($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['tot_laba_rugi'] = $this->lab_periksa->total_laba_rugi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_rekap_transaksi',$data);    
        } else {
            $this->load->view('/lab/ajax_rekap_transaksi',$data);   
        }
    }

    public function ajax_detail_transaksi()
    {
        $periode = $this->input->post('periode');
        $jenis_pasien = $this->input->post('jenis_pasien');
        $penjamin = $this->input->post('penjamin');
        $rawat = $this->input->post('rawat');
        $filter_pencarian = $this->input->post('filter_pencarian');
        $pencarian = $this->input->post('pencarian');
        $order_p = $this->input->post('order_p');
        $count = $this->lab_periksa->count_det_transaksi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/rekap_lab_transaksi/ajax_detail_transaksi";        
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
        if ($page!=0)
        {
            $page = $config["per_page"] * ($page-1);    
        }
        $listdata = $this->lab_periksa->fetch_det_transaksi($config["per_page"],$page,$periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['listdata'] = $listdata;
        $data['tot_tarif'] = $this->lab_periksa->total_tarif($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['tot_unit_cost'] = $this->lab_periksa->total_unit_cost($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data['tot_laba_rugi'] = $this->lab_periksa->total_laba_rugi($periode,$jenis_pasien,$penjamin,$rawat,$filter_pencarian,$pencarian,$order_p);
        $data["links"] = $this->pagination->create_links();
        

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_detail_transaksi',$data);    
        } else {
            $this->load->view('/lab/ajax_detail_transaksi',$data);   
        }
    }    

    public function ajax_rek_by_jenis()
    {
        $text = '';$jenis='';
        $hari_ini = date("Y-m-d"); 
        // Tanggal pertama pada bulan ini
        $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
        // Tanggal terakhir pada bulan ini
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
        $listdata = $this->lab_periksa->get_by_jenis();
        $text .= '<table class="table table-bordered table-striped">';
        $text .= '<tr>';
        $text .= '<td>Tanggal</td>';
        for ($i=0; $i < count($listdata) ; $i++) { 
            $text .= '<td>'.$listdata[$i]['KelompokBeli'].'</td>';
        }
        $text .= '</tr>';
        while (strtotime($tgl_pertama) <= strtotime($tgl_terakhir)) {
            $timestamp = strtotime($tgl_pertama);
            $day = date('D', $timestamp);
            $text .= '<tr>';
            $text .= '<td>'.$this->date->konversi2a($tgl_pertama).'</td>';
            for ($i=0; $i < count($listdata) ; $i++) { 
                $jenis = $listdata[$i]['KelompokBeli'];
                $text .= '<td>'.$this->lab_periksa->count_by_jenis($tgl_pertama,$jenis).'</td>';
                //$text .= '<td>'.$tgl_pertama.'--'.$listdata[$i]['KelompokBeli'].'</td>';
            }
            //echo "$tgl_pertama" . "<br>";
            $text .= '</tr>';
            $tgl_pertama = date ("Y-m-d", strtotime("+1 days", strtotime($tgl_pertama)));
        }
        $text .= '</table>';
        echo $text;
    }

    public function ajax_rek_by_penjamin()
    {
        $penjamin = array("ASURANSI (NOT REGISTERED)", "RS WILLIAM BOOTH");
        $text = '';$x='';
        $hari_ini = date("Y-m-d"); 
        // Tanggal pertama pada bulan ini
        $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
        // Tanggal terakhir pada bulan ini
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
        $listdata = $this->lab_periksa->get_by_jenis();
        $text .= '<table class="table table-bordered table-striped">';
        $text .= '<tr>';
        $text .= '<td>Tanggal</td>';
        for ($i=0; $i < count($penjamin) ; $i++) { 
            $text .= '<td>'.$penjamin[$i].'</td>';
        }
        $text .= '<td>Total</td>';
        $text .= '</tr>';
        while (strtotime($tgl_pertama) <= strtotime($tgl_terakhir)) {
            $timestamp = strtotime($tgl_pertama);
            $day = date('D', $timestamp);
            $text .= '<tr>';
            $text .= '<td>'.$this->date->konversi2a($tgl_pertama).'</td>';
            $jml_row = '';
            for ($i=0; $i < count($penjamin) ; $i++) { 
                $x = $this->lab_periksa->count_by_penjamin($tgl_pertama,$penjamin[$i]);
                $jml_row = $jml_row + $x;
                $text .= '<td>'.$x.'</td>';
                //$text .= '<td>'.$tgl_pertama.'--'.$listdata[$i]['KelompokBeli'].'</td>';
            }
            $text .= '<td>'.$jml_row.'</td>';
            //echo "$tgl_pertama" . "<br>";
            $text .= '</tr>';
            $tgl_pertama = date ("Y-m-d", strtotime("+1 days", strtotime($tgl_pertama)));
        }
        $text .= '<tr>';
        $text .= '<td>Total</td>';
        $tgl_awal = date('Y-m-01', strtotime($hari_ini));
        $tgl_akhir = date('Y-m-t', strtotime($hari_ini));
        $x = ''; $jml = '';
        for ($i=0; $i < count($penjamin) ; $i++) {
            $x = $this->lab_periksa->jml_tot_penjamin($tgl_awal,$tgl_akhir,$penjamin[$i]); 
            $text .= '<td>'.$x.'</td>';
            $jml = $jml + $x;
        }        
        $text .= '<td>'.$jml.'</td>';
        $text .= '</table>';
        echo $text;
    }

    public function ajax_rek_by_pemeriksaan()
    {
        $text = '';
        $hari_ini = date("Y-m-d"); 
        // Tanggal pertama pada bulan ini
        $tgl_pertama = date('Y-m-01', strtotime($hari_ini));
        // Tanggal terakhir pada bulan ini
        $tgl_terakhir = date('Y-m-t', strtotime($hari_ini));
        $listdata = $this->lab_periksa->get_nama_pemeriksaan();
        $text .= '<table>';
        $text .= '<tr>';
        $text .= '<td style="border:1px solid #000;font-weight:bolder;">Tanggal</td>';
        for ($i=0; $i < count($listdata) ; $i++) { 
            $text .= '<td style="border:1px solid #000;font-weight:bolder;">'.$listdata[$i]['id_layanan'].'</td>';
        }
        $text .= '</tr>';
        while (strtotime($tgl_pertama) <= strtotime($tgl_terakhir)) {
            $timestamp = strtotime($tgl_pertama);
            $day = date('D', $timestamp);
            $text .= '<tr>';
            $text .= '<td style="border:1px solid #000;">'.$this->date->konversi2a($tgl_pertama).'</td>';
            $displaydata = $this->lab_periksa->get_by_pemeriksaan($tgl_pertama);
            for ($i=0; $i < count($listdata) ; $i++) { 
                $x = $listdata[$i]['id_layanan'];
                $text .= '<td style="border:1px solid #000;">'.$displaydata[$x].'</td>';
            }
            //echo "$tgl_pertama" . "<br>";
            $text .= '</tr>';
            $tgl_pertama = date ("Y-m-d", strtotime("+1 days", strtotime($tgl_pertama)));
        }
        $text .= '</table>';
        echo $text;
    }
}
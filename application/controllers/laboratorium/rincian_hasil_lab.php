<?php defined('BASEPATH') OR exit('No direct script access allowed');

class rincian_hasil_lab extends CI_Controller {

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
        $data['list_jenispasien'] = array("Detail History","Rekapan");
        $this->admin_template_minor->display_with_sidebar('lab/rincian_hasil_lab_view', $data);
	}


    public function ajax_detail_history()
    {
        $periode = $this->input->post('periode');
        $cari_nama= $this->input->post('cari_nama');
        $data['listdata'] = $this->lab_periksa->get_detail_history($periode,$cari_nama);
        $this->load->view('lab/ajax_detail_history', $data);
    }

    public function ajax_rekapan()
    {
        $periode = $this->input->post('periode');
        $cari_nama= $this->input->post('cari_nama');
        $data['listdata'] = $this->lab_periksa->get_rekapan($periode,$cari_nama);
        $this->load->view('lab/ajax_rekapan', $data);
    }
}
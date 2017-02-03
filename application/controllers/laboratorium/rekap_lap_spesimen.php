<?php defined('BASEPATH') OR exit('No direct script access allowed');

class rekap_lap_spesimen extends CI_Controller {

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
        $this->admin_template_minor->display_with_sidebar('lab/rekap_lap_spesimen_view', $data);
	}


    public function ajax_rekap_lab_spesimen()
    {
        $periode = $this->input->post('periode');
        $data['listdata'] = $this->lab_periksa->get_rekap_lab_spesimen($periode);
        $this->load->view('lab/ajax_rekap_lab_spesimen', $data);
    }
}
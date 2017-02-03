<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of template
 *
 * @author Administrator
 * @develop Abdurrahman Hakim
 */
class Admin_template_minor {
    protected $ci;

    // Constructor
    function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->load->model('mdl_temp_lab_tarif','temp_lab_tarif');
        $this->_ci->load->model('mdl_lab_sub','lab_sub');
    }

    
    function display_with_sidebar($template, $data = null) {
        $data['title'] = 'Selamat Datang (Administrator)';
        //cek modul nama
        if(isset($data['title'])){
            $data['_title'] = $data['title'];
        }else{
            $data['_title'] = $this->_ci->session->userdata('detail');
        }
        $data['_header'] = $this->_ci->load->view('admin_template/Header', $data, true);
        $data['_sidebar'] = $this->_ci->load->view("admin_template/Menu", $data, true);
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->temp_lab_tarif->_truncate();
        $this->_ci->load->view('/admin_template/main', $data);
    }

    function uang_format($in) 
    {
        setlocale (LC_TIME, 'id_ID');
        if(empty($in))
        {
            return number_format(0, 2, ",", ".");;
        }
        else {
            return number_format($in, 2, ",", ".");;
        }
        
    }

    function metode($pemeriksaan,$bidang){
        $data_lab_sub = $this->_ci->lab_sub->get_metode($pemeriksaan,$bidang); 
        return $data_lab_sub['metode'];   
    }
    
}
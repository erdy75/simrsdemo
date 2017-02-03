<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Description of template
 *
 * @author Administrator
 * @develop Abdurrahman Hakim
 */
class Admin_template {
    protected $ci;

    // Constructor
    function __construct() {
        $this->_ci = &get_instance();
        $this->_ci->load->model('M_modul','modul');
        $this->_ci->load->model('M_menu','menu');
        $this->_ci->load->model('M_menu','menu');
    }

    // Default Template
    function display_utama($data = null) {

        //cek status login
        $status = $this->_ci->session->userdata('status');
        if($status != 1)
        {
            redirect(base_url());
        }
        //tampilan header
        $data['_header'] = $this->_ci->load->view('admin_template/Header', $data, true);
        //tampilan modul
        $data['_modul_bar'] = $this->_ci->load->view('admin_template/Modul_bar',$data, true);
        
        $this->_ci->load->view('/admin_template/main_modul', $data);
    }
    
    function display_with_sidebar($template, $data = null) {
        //cek status login
        $status = $this->_ci->session->userdata('status');
        $data['nama'] = $this->_ci->session->userdata('nama');
        $data['role_name'] = $this->_ci->session->userdata('role_name');
        $data['title'] = 'Selamat Datang '.$data['nama'].'('.$data['role_name'].')';
        if($status != 1)
        {
            redirect(base_url());
        }

        //cek modul nama
        $nama = $this->_ci->modul->get_where($data['modul_id']);
        $data['modul_nama'] = $nama['nama'];
        $data['show_menu'] = $this->show_menu($data['modul_id']);
        if(isset($data['title'])){
            $data['_title'] = $data['title'];
        }else{
            $data['_title'] = $this->_ci->session->userdata('detail');
        }
        $data['_header'] = $this->_ci->load->view('admin_template/Header', $data, true);
        $data['_sidebar'] = $this->_ci->load->view("admin_template/Menu", $data, true);
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('/admin_template/main', $data);
    }

    function display_lov($template,$data = null)
    {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('/lov/main.php', $data);
    }

    function show_menu($modul_id)
    {
        $text = '';
        $list_menu = $this->_ci->menu->display_modul($modul_id);
        for ($i=0; $i < count($list_menu) ; $i++) { 
            // tanpa tree
            if($list_menu[$i]['is_parent']==0)
            {
                if($i==0)
                {
                    $text .= '<li id="'.$list_menu[$i]['attr_id'].'">';
                }
                else
                {
                    $text .= '<li id="'.$list_menu[$i]['attr_id'].'">';
                }
                
                $text .= '<a href="'.base_url().$list_menu[$i]['link_menu'].'">';
                $text .= '<i class="fa fa-circle-o"></i> <span>'.$list_menu[$i]['nama_menu'].'</span>';
                $text .= '</a>';
                $text .= '</li>';
          
            }
            // dengan tree
            else
            {
                $text .= '<li id="'.$list_menu[$i]['attr_id'].'" class="treeview">';
                $text .= '<a href="#">';
                $text .= '<i class="fa fa fa-folder"></i> <span>'.$list_menu[$i]['nama_menu'].'</span>';
                $text .= '<i class="fa fa-angle-left pull-right"></i>';
                $text .= '</a>';
                $text .= $this->sub_menu($list_menu[$i]['id']);
                $text .= '</li>';                 
            }
        }
        return $text;

    }

    function sub_menu($paren_id)
    {
        $text = '';
        $list_menu = $this->_ci->menu->show_parent($paren_id);
        $text .= '<ul class="treeview-menu">';
        for ($i=0; $i < count($list_menu) ; $i++) { 
            if($list_menu[$i]['is_parent']==0)
            {
                $text .= '<li id="'.$list_menu[$i]['attr_id'].'">';
                $text .= '<a href="'.base_url().$list_menu[$i]['link_menu'].'">';
                $text .= '<i class="fa fa-circle-o"></i> <span>'.$list_menu[$i]['nama_menu'].'</span>';
                $text .= '</a>';
                $text .= '</li>';
          
            }
            // dengan tree
            else
            {
                $text .= '<li id="'.$list_menu[$i]['attr_id'].'">';
                $text .= '<a href="#">';
                $text .= '<i class="fa fa fa-folder"></i> <span>'.$list_menu[$i]['nama_menu'].'</span>';
                $text .= '<i class="fa fa-angle-left pull-right"></i>';
                $text .= '</a>';
                $text .= $this->sub_menu($parent_id);
                $text .= '</li>';                
            }
        }
        $text .= '</ul>';
        return $text;
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class bidang_pemeriksaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_bidang', 'lab_bidang');
        $this->load->model('mdl_lab_detail', 'lab_detail');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['nama'] = 'Administator';
		$this->admin_template_minor->display_with_sidebar('lab/bidang_pemeriksaan_view', $data);
	}

    public function ajax_bidang_pemeriksaan()
    {
        $data['listdata'] = $this->lab_bidang->get_all();
        $this->load->view('lab/ajax_bidang_pemeriksaan',$data);
    }

    public function tambah()
    {
        $bidang = $this->input->post("bidang");
        $jumlah = $this->lab_bidang->count_where('nama', $bidang);
        if($jumlah !== 0)
        {
            echo '<script>alert("data '.$bidang.' sudah ada ");</script>';
        } else {
            $data['nama'] = trim(strtoupper($bidang));
            $data['inc'] = $this->lab_bidang->get_max() + 1;
            $this->lab_bidang->_insert($data);
            echo '<script>alert("data '.$bidang.' berhasil Terisi");
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>';
        }
    }

    public function hapus()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $this->lab_bidang->_delete($bidang);
        $this->lab_detail->_delete_where('bidang',$bidang);
        echo '<script>alert("data '.$bidang.' berhasil dihapus..! ");            
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>';
    }

    public function update()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $bidang2 = $this->input->post("bidang2");
        $data_bidang['nama'] = $bidang;
        $this->lab_bidang->_update($bidang2, $data_bidang);
        $data_detail['bidang'] = $bidang;
        $this->lab_detail->_update_where('bidang',$bidang2,$data_detail);
        echo '<script>alert("data '.$bidang2.' berhasil diubah..! ");            
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>';
    }

    public function set_manual()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $inc = $this->input->post("inc");
        $data['inc'] = $inc;
        $this->lab_bidang->_update($bidang, $data);
        echo '<script>            
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>';
    }

    public function up()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $dataselect = $this->lab_bidang->get_where($bidang);
        if($dataselect['inc']==1)
        {
            echo '<script>alert("inc paling kecil adalah 1");</script>';
        }
        else
        {
            $inc = $dataselect['inc'] - 1;
            $data['inc'] = $inc;
            $this->lab_bidang->_update($bidang, $data);
            echo '<script>            
                $.ajax({
                  type: "POST",
                  url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
                  success: function(msg) {
                    $("div#show_list").html(msg);
                  }
                });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
                $("#tambah").show();
                $("#hapus").hide();
                $("#update").hide();
                $("#batal").hide();
                </script>';            
        }
    } 

    public function down()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $dataselect = $this->lab_bidang->get_where($bidang);
        $inc = $dataselect['inc'] + 1;
        $data['inc'] = $inc;
        $this->lab_bidang->_update($bidang, $data);
        echo '<script>            
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>'; 
    }    

    public function shift_up()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $dataselect = $this->lab_bidang->get_where($bidang);
        $inc = $dataselect['inc'];
        $data_update = $this->lab_bidang->get_where_custom2('inc <=', $inc);
        for ($i=0; $i < count($data_update) ; $i++) { 
            $bidang = $data_update[$i]['nama'];
            if($data_update[$i]['inc']!=1)
            {
                $data['inc'] = $data_update[$i]['inc'] - 1;    
            } else {
                $data['inc'] = 1;
            }
            $this->lab_bidang->_update($bidang, $data);
        }
        
        echo '<script>            
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>';        
    }

    public function shift_down()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $dataselect = $this->lab_bidang->get_where($bidang);
        $inc = $dataselect['inc'];
        $data_update = $this->lab_bidang->get_where_custom2('inc >=', $inc);
        for ($i=0; $i < count($data_update) ; $i++) { 
            $bidang = $data_update[$i]['nama'];
            $data['inc'] = $data_update[$i]['inc'] + 1;    
            $this->lab_bidang->_update($bidang, $data);
        }
        
        echo '<script>            
            $.ajax({
              type: "POST",
              url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
              success: function(msg) {
                $("div#show_list").html(msg);
              }
            });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
            $("#tambah").show();
            $("#hapus").hide();
            $("#update").hide();
            $("#batal").hide();
            </script>';        
    }

    public function switch_up()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $dataselect = $this->lab_bidang->get_where($bidang);
        $inc = $dataselect['inc'];
        $listdata = $this->lab_bidang->get_all();
        for ($i=0; $i < count($listdata) ; $i++) { 
            if($listdata[$i]['nama']==$bidang)
            {
                $nama1 = $listdata[$i]['nama'];
                $inc1 = $listdata[$i]['inc'];
                $nama2 = $listdata[$i-1]['nama'];
                $inc2 = $listdata[$i-1]['inc'];
            }
        }
        if($inc1==$inc2)
        {
            echo '<script>alert("data sama tidak bisa di switch");</script>>';
        } 
        else
        {
            $data1['inc'] = $inc2;
            $this->lab_bidang->_update($nama1,$data1);
            $data2['inc'] = $inc1;
            $this->lab_bidang->_update($nama2,$data2);
            echo '<script>            
                $.ajax({
                  type: "POST",
                  url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
                  success: function(msg) {
                    $("div#show_list").html(msg);
                  }
                });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
                $("#tambah").show();
                $("#hapus").hide();
                $("#update").hide();
                $("#batal").hide();
                </script>';            
        }   
    }

    public function switch_down()
    {
        $bidang = $this->input->post("bidang");
        $bidang = trim(strtoupper($bidang));
        $dataselect = $this->lab_bidang->get_where($bidang);
        $inc = $dataselect['inc'];
        $listdata = $this->lab_bidang->get_all();
        for ($i=0; $i < count($listdata) ; $i++) { 
            if($listdata[$i]['nama']==$bidang)
            {
                $nama1 = $listdata[$i]['nama'];
                $inc1 = $listdata[$i]['inc'];
                $nama2 = $listdata[$i+1]['nama'];
                $inc2 = $listdata[$i+1]['inc'];
            }
        }
        if($inc1==$inc2)
        {
            echo '<script>alert("data sama tidak bisa di switch");</script>>';
        } 
        else
        {
            $data1['inc'] = $inc2;
            $this->lab_bidang->_update($nama1,$data1);
            $data2['inc'] = $inc1;
            $this->lab_bidang->_update($nama2,$data2);
            echo '<script>            
                $.ajax({
                  type: "POST",
                  url: "'.base_url().'/index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
                  success: function(msg) {
                    $("div#show_list").html(msg);
                  }
                });$("#bidang2").val(" ");$("#inc").val(" ");$("#bidang").val(" ");
                $("#tambah").show();
                $("#hapus").hide();
                $("#update").hide();
                $("#batal").hide();
                </script>';            
        }   
    }

}
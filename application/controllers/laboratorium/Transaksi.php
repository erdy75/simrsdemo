<?php defined('BASEPATH') OR exit('No direct script access allowed');

class transaksi extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_lab_periksa', 'lab_periksa');
        $this->load->model('mdl_pasien_pribadi', 'pas_pribadi');
        $this->load->model('mdl_faktur_detail_prebayar', 'det_prebayar');
        $this->load->model('mdl_lab_periksa_detail', 'lab_periksa_det');
        $this->load->model('mdl_lab_medical_record', 'lab_medical_rec');
        $this->load->model('mdl_tdok_bio', 'tdok_bio');
        $this->load->model('mdl_poli', 'poli');
        $this->load->model('mdl_kamar', 'kamar');
        $this->load->model('mdl_lab_bidang', 'lab_bidang');
        $this->load->model('mdl_lab_detail', 'lab_detail');
        $this->load->model('mdl_temp_lab_tarif', 'temp_lab_tarif');
        $this->load->model('mdl_layanan','layanan');
        $this->load->model('mdl_faktur_detail','faktur_detail');
        $this->load->model('mdl_faktur','faktur');
		$this->load->library('pagination');
	}

	public function index()
	{
		$data['nama'] = 'Administator';
        $data['list_rawat_jalan'] = $this->poli->get_where_custom2('header_name_billing', 'RAWAT JALAN', 'nama');
        $data['list_dokter'] = $this->tdok_bio->get_all();
        $data['list_lab_bidang'] = $this->lab_bidang->get_all();
		$this->admin_template_minor->display_with_sidebar('lab/transaksi_view', $data);
	}

    public function generate_no_rm()
    {
        $get_max_cib = $this->lab_periksa->get_max_cib();
        $get_max_cib =  substr($get_max_cib, 3);
        $get_max_cib =  intval($get_max_cib);
        $text_mask = '';
        if ($get_max_cib < 440000)
        {

            $get_max_cib = 'LAB.44.00.01';
            echo '<input type="text" nama="no_rm" id="no_rm" class="new-form-control readonly" data-inputmask=\'"mask": "999.99.99.99"\' data-mask style="width:90px;" value="'.$get_max_cib.'" readonly="true">';
            echo '<script>$("[data-mask]").inputmask();</script>';
        }
        else
        {
            $get_max_cib = $get_max_cib + 1;
            $get_max_cib = 'LAB'.$get_max_cib;
            $get_max_cib = substr($get_max_cib, 0,3).".".substr($get_max_cib, 3,2).".".substr($get_max_cib, 5,2).".".substr($get_max_cib, 7,2);
            echo '<input type="text" nama="no_rm" id="no_rm" class="new-form-control readonly" data-inputmask=\'"mask": "999.99.99.99"\' data-mask style="width:90px;" value="'.$get_max_cib.'" readonly="true">'; 
            echo '<script>
                    $("#no_rm").keyup(function(event) {
                        $("[data-mask]").inputmask();
                    });
                </script>';           
        }
    }

    public function cek_no_rm()
    {
        $no_rm = $this->input->post('no_rm');
        $no_rm = str_replace('.', "", $no_rm);
        $list = $this->pas_pribadi->get_where($no_rm);
        $count = $this->pas_pribadi->count_where('id', $no_rm);
        if ($count == 0)
        {
            echo "<script>alert('Data tidak Ditemukan');</script>";
        }
        else
        {
            $tgl_lahir = new DateTime($list['tgl_lahir']);  //DateTime Object
            $interval = $tgl_lahir->diff(new DateTime);

            ?>
            <script>
            $("#nama").val("<?php echo strtoupper($list['nama']);?>");
            $("#alamat").val("<?php echo strtoupper($list['alamat']);?>");
            $("select#jenis_kelamin").val("<?php echo $list['sex'];?>");
            $("#age").val("<?php echo $interval->y.'('.$interval->m.')';?>");
            </script>
            <?php
        }
    }

    public function show_rawat_jalan() {
        $list_rawat_jalan = $this->poli->get_where_custom2('header_name_billing', 'RAWAT JALAN', 'nama');
        echo '<select name="perawatan" id="perawatan" class="new-form-control">
                <option value="Rawat Jalan">Rawat Jalan</option>
                <option value="Rawat Inap">Rawat Inap</option>
                <option value="UGD / IGD">UGD / IGD</option>
            </select>  ';
        echo '<select name="ruangan_dari" id="ruangan_dari" class="new-form-control">';
        echo '<option value="0">-</option>';
        for ($i=0; $i < count($list_rawat_jalan) ; $i++) { 
            echo '<option value="'.$list_rawat_jalan[$i]['nama'].'">'.$list_rawat_jalan[$i]['nama'].'</option>';
        }
        echo '</select>';
        echo $this->js_select_rawat();
    }

    public function show_rawat_inap() {
        $list_rawat_inap = $this->kamar->get_all();
        echo '<select name="perawatan" id="perawatan" class="new-form-control">
                <option value="Rawat Jalan">Rawat Jalan</option>
                <option value="Rawat Inap" selected>Rawat Inap</option>
                <option value="UGD / IGD">UGD / IGD</option>
            </select>  ';
        echo '<select name="ruangan_dari" id="ruangan_dari" class="new-form-control">';
        echo '<option value="0">-</option>';
        for ($i=0; $i < count($list_rawat_inap) ; $i++) { 
            $x = 1;
            for ($j=0; $j < $list_rawat_inap[$i]['jumlah_bed'] ; $j++) { 
                echo '<option value="'.$list_rawat_inap[$i]['nama'].'-'.$x.'">'.$list_rawat_inap[$i]['nama'].'-'.$x.'</option>';
                $x++;
            }
            
        }
        echo '</select>';
        echo $this->js_select_rawat();
    }

    public function show_ugd() 
    {
        echo '<select name="perawatan" id="perawatan" class="new-form-control">
                <option value="Rawat Jalan">Rawat Jalan</option>
                <option value="Rawat Inap" >Rawat Inap</option>
                <option value="UGD / IGD" selected>UGD / IGD</option>
            </select>';
        echo $this->js_select_rawat();
    }

    function js_select_rawat()
    {
        return '<script>
        $("#perawatan").change(function(event) {
              if ($(this).val()=="Rawat Jalan") {
                $.ajax({
                  type: "GET",
                  url: "'.base_url().'index.php/laboratorium/Transaksi/show_rawat_jalan",
                  success: function(msg) {
                    $("td#show_perawatan").html(msg);
                  }
                }); 
              } else if ($(this).val()=="Rawat Inap") {
                $.ajax({
                  type: "GET",
                  url: "'.base_url().'index.php/laboratorium/Transaksi/show_rawat_inap",
                  success: function(msg) {
                    $("td#show_perawatan").html(msg);
                  }
                }); 
              } else {
                $.ajax({
                  type: "GET",
                  url: "'.base_url().'index.php/laboratorium/Transaksi/show_ugd",
                  success: function(msg) {
                    $("td#show_perawatan").html(msg);
                  }
                }); 
              }
            });
            </script>';
    }

    function list_lab_detail()
    {
        $lab_bidang = $this->input->post('lab_bidang');
        $kel_tarif = $this->input->post('kel_tarif');
        $list_lab_detail = $this->lab_detail->get_lab_detail($lab_bidang);
        echo '<select name="list_lab_detail" id="list_lab_detail" class="new-form-control">';
        for ($i=0; $i < count($list_lab_detail) ; $i++) { 
            echo '<option value="'.$list_lab_detail[$i]['id_layanan'].'">'.$list_lab_detail[$i]['id_layanan'].'</option>';            
        }
        echo '</select>';
        echo '<script>
            //alert($("#list_lab_detail").val());
            $.ajax({
              type: "POST",
              data: "kel_tarif='.$kel_tarif.'&id_layanan="+$("#list_lab_detail").val(),
              url: "'.base_url().'index.php/laboratorium/Transaksi/get_tarif",
              success: function(msg) {
                $("td#show_tarif").html(msg);
              }
            }); 
            $("#list_lab_detail").change(function(event) {
              $.ajax({
                type: "POST",
                data: "kel_tarif='.$kel_tarif.'&id_layanan="+$("#list_lab_detail").val(),
                url: "'.base_url().'index.php/laboratorium/Transaksi/get_tarif",
                success: function(msg) {
                  $("td#show_tarif").html(msg);
                }
              }); 
            });
            </script>';
    }

    function get_tarif()
    {
        $id_layanan = $this->input->post('id_layanan');
        $kel_tarif = $this->input->post('kel_tarif');
        $get_tarif = $this->lab_detail->get_harga_kel_tarif($kel_tarif,$id_layanan);
        for ($i=0; $i < count($get_tarif) ; $i++) { 
        echo '<input type="text" name="tarif" id="tarif" class="new-form-control readonly" readonly style="width: 100px;" value="'.
        $get_tarif[$i]["$kel_tarif"].'">';
        }
    }

    function list_tarif_lab()
    {
        $nama_lab_detail = $this->input->post('nama_lab_detail');
        $keterangan = $this->input->post('keterangan');
        $dirujuk = $this->input->post('dirujuk');
        if($dirujuk==0)
        {
            $dirujuk = '';
        }
        $get_lab_detail = $this->lab_detail->get_where_custom3('id_layanan', $nama_lab_detail);
        $unit_cost = $get_lab_detail['unit_cost']; 
        $bidang = $get_lab_detail['bidang'];
        $diskon = $this->input->post('diskon');
        $tarif = $this->input->post('tarif');
        $data['no_order'] = $this->lab_periksa->get_max() + 1;
        $data['inc'] = $this->temp_lab_tarif->get_max_inc($data['no_order'])+1;
        $cek_nama_lab = $this->temp_lab_tarif->count_where_nama_lab($nama_lab_detail , $data['no_order']);

        if ($cek_nama_lab!=0)
        {
            echo '<script>alert("nama : '.$nama_lab_detail.' sudah ada");</script>';
        } 
        else
        {
            if ($diskon!=0 || !empty($diskon)) 
            {
                $hasil = 0;
                $hasil = ($tarif * $diskon) / 100;
                $hasil = $tarif - $hasil;    
                $data['tarif'] = $hasil;
                $data['nama_lab'] = $nama_lab_detail;
                $data['unit_cost'] = $unit_cost;
                $data['bidang'] = $bidang;
                $data['keterangan'] = $keterangan;
                $data['rujukan'] = $dirujuk;
                $this->temp_lab_tarif->_insert($data);
            } 
            else
            {
                $data['unit_cost'] = $unit_cost;
                $data['bidang'] = $bidang;
                $data['tarif'] = $tarif;
                $data['nama_lab'] = $nama_lab_detail;
                $data['keterangan'] = $keterangan;
                $data['rujukan'] = $dirujuk;
                $this->temp_lab_tarif->_insert($data);            
            }            
        }


        $count = $this->temp_lab_tarif->count_where('no_order', $data['no_order']) ;
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/transaksi/list_tarif_lab";        
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
        $page = $config["per_page"] * $page;

        $data["list_data"] = $this->temp_lab_tarif->fetch_temp_lab_tarif($config["per_page"],$page,$data['no_order']);
        $data["links"] = $this->pagination->create_links();
        
        $jml_tarif = 0;
        $list_data = $this->temp_lab_tarif->get_where_custom2('no_order', $data['no_order']);
        for ($i=0; $i < count($list_data) ; $i++) { 
            $jml_tarif = $jml_tarif + $list_data[$i]['tarif'];   
        }
        $data['jml_tarif'] = $jml_tarif;
        $data['rp_jml_tarif'] = $this->admin_template_minor->uang_format($jml_tarif);

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_list_tarif_lab',$data);    
        } else {
            $this->load->view('/lab/ajax_list_tarif_lab',$data);   
        }
    }

    public function hapus_list_tarif()
    {
        $id = $this->input->post('id');
        $no_order = $this->input->post('no_order');
        $this->temp_lab_tarif->_delete_id($id);
        $count = $this->temp_lab_tarif->count_where('no_order', $no_order) ;
        $data['count'] = $count;
        // konfigurasi pagination 
        $config = array();
        $config["base_url"] = base_url() . "index.php/laboratorium/transaksi/list_tarif_lab";        
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
        $page = $config["per_page"] * $page;

        $data["list_data"] = $this->temp_lab_tarif->fetch_temp_lab_tarif($config["per_page"],$page,$no_order);
        $data["links"] = $this->pagination->create_links();
        
        $jml_tarif = 0;
        $list_data = $this->temp_lab_tarif->get_where_custom2('no_order', $no_order);
        for ($i=0; $i < count($list_data) ; $i++) { 
            $jml_tarif = $jml_tarif + $list_data[$i]['tarif'];   
        }
        $data['jml_tarif'] = $jml_tarif;
        $data['rp_jml_tarif'] = $this->admin_template_minor->uang_format($jml_tarif);

        if($this->input->get('ajax')) {
            $this->load->view('/lab/ajax_list_tarif_lab',$data);    
        } else {
            $this->load->view('/lab/ajax_list_tarif_lab',$data);   
        }

    }

    public function submit_transaksi()
    {
        $no_order = $this->lab_periksa->get_max() + 1;
        $list_tarif_lab = $this->temp_lab_tarif->get_where_custom2('no_order', $no_order);
        for ($i=0; $i < count($list_tarif_lab) ; $i++) { 
            $data_tarif['no_order'] = $list_tarif_lab[$i]['no_order'];
            $data_tarif['nama_pemeriksaan'] = $list_tarif_lab[$i]['nama_lab'];
            $data_tarif['tarif'] = $list_tarif_lab[$i]['tarif'];
            $data_tarif['inc'] = $list_tarif_lab[$i]['inc'] - 1;
            $data_tarif['keterangan'] = $list_tarif_lab[$i]['keterangan'];
            $data_tarif['unit_cost'] = $list_tarif_lab[$i]['unit_cost'] - 1;
            $data_tarif['bidang'] = $list_tarif_lab[$i]['bidang'];
            $this->lab_periksa_det->_insert($data_tarif);
        }
        
        $cek_nomer = $this->input->post('cek_nomer');
        $no_rm = $this->input->post('no_rm');
        $nama_dokter = $this->input->post('nama_dokter');
        $jenis_pasien = $this->input->post('jenis_pasien');
        $nama = $this->input->post('nama');
        $age = $this->input->post('age');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $penjamin = $this->input->post('penjamin');
        $perawatan = $this->input->post('perawatan');
        $ruangan_dari = $this->input->post('ruangan_dari');
        $cek_no_reg = $this->lab_periksa->get_max_no_reg();
        if (empty($cek_no_reg)) 
        {
            $cek_no_reg = "1/".date('d-m-Y');
            $cek_no_reg = str_replace('-', '', $cek_no_reg);
        }
        else
        {
            $split_no_reg = explode('/', $cek_no_reg);
            $split_no_reg[0] = $split_no_reg[0] + 1;
            $cek_no_reg = $split_no_reg[0]."/".$split_no_reg[1];
        }
        $cib = str_replace('.', '', $no_rm);
        $data_lab_periksa['no_order'] = $no_order;
        $data_lab_periksa['cib'] = $cib;
        $data_lab_periksa['status'] = 'waiting';
        $data_lab_periksa['dokter'] = $nama_dokter;
        $data_lab_periksa['tanggal'] = date('Y-m-d');
        $data_lab_periksa['jam'] = date('H:i:s');
        $data_lab_periksa['kelompokBeli'] = $jenis_pasien;
        $data_lab_periksa['penanggung_jawab'] = '-';
        $data_lab_periksa['pemeriksa'] = '-';
        $data_lab_periksa['nama_manual_edit'] = $nama;
        $data_lab_periksa['umur_manual_edit'] = $age;
        $data_lab_periksa['alamat_manual_edit'] = $alamat;
        $data_lab_periksa['sex_manual_edit'] = $jenis_kelamin;
        $data_lab_periksa['petugas_entry'] = 'noname';
        $data_lab_periksa['penjamin_manual_edit'] = $penjamin;
        $data_lab_periksa['jalan_inap'] = $perawatan;
        $data_lab_periksa['kamar_if_ranap'] = $ruangan_dari;
        $data_lab_periksa['isApproved'] = 'No';
        $data_lab_periksa['no_reg_lab_internal'] = $cek_no_reg;
        $this->lab_periksa->_insert($data_lab_periksa);

        $no_faktur = $this->faktur_detail->get_max() + 1;
        $list_faktur_detail = $this->temp_lab_tarif->get_where_custom2('no_order', $no_order);
        for ($i=0; $i < count($list_faktur_detail) ; $i++) { 
            $data_faktur_detail['faktur'] = $no_faktur;
            $id_layanan = $this->layanan->get_id_layanan($list_faktur_detail[$i]['nama_lab']);
            if (empty($id_layanan))
            {
                $data_faktur_detail['id_layanan'] = '9999999';    
            }
            else
            {
                $data_faktur_detail['id_layanan'] = $id_layanan['id'];     
            }
            $data_faktur_detail['harga_satuan'] = $list_faktur_detail[$i]['tarif']; 
            $data_faktur_detail['total'] = 1;
            $data_faktur_detail['id_dokter'] = $nama_dokter;
            $data_faktur_detail['poli'] = 'LABORATORIUM';
            $data_faktur_detail['keterangan'] = $list_faktur_detail[$i]['nama_lab'];
            $data_faktur_detail['inap_jalan'] = $perawatan;
            $data_faktur_detail['fee'] = 0;
            $data_faktur_detail['dokterRefferal'] = $nama_dokter;
            $data_faktur_detail['feeRefferal'] = 0;
            $data_faktur_detail['gratis'] = '';
            $data_faktur_detail['inc'] = $list_faktur_detail[$i]['inc'] - 1;
            $data_faktur_detail['tgl_dilakukan_tindakan'] = date('Y-m-d H:i:s');
            $this->faktur_detail->_insert($data_faktur_detail);
        }

        $data_faktur['faktur'] = $no_faktur;
        $data_faktur['id'] = $cib;
        $data_faktur['tanggal'] = date('Y-m-d');
        $data_faktur['jam'] = date('H:i:s');
        $data_faktur['nama_kasir'] = 9999;
        $data_faktur['pasien_tampil'] = $nama;
        $data_faktur['alamat_tampil'] = $alamat;
        $data_faktur['umur_tampil'] = $age;
        $data_faktur['sex_tampil'] = $jenis_kelamin;
        $data_faktur['kelompokBeli'] = $jenis_pasien;
        $data_faktur['penjamin'] = $penjamin;
        $data_faktur['inap_jalan'] = $perawatan;
        $data_faktur['no_reg_by_poli'] = 'LABAutoNumber';
        $data_faktur['tgl_masuk'] = date('Y-m-d');
        $this->faktur->_insert($data_faktur);

        $this->temp_lab_tarif->_truncate();
        echo '<script>
            window.open("'.base_url().'index.php/laboratorium/pemeriksaan_show/cetak_struk/?no_order='.$no_order.'","_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no")
            </script>';
        redirect(base_url()."index.php/laboratorium/pemeriksaan_show");
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class rekap_hasil_lab extends CI_Controller {

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
        $data['list_jenispasien'] = array("Jenis Pasien","Penjamin");
        $data['list_penjamin'] = array("-","ASURANSI (NOT REGISTERED)", "RS WILLIAM BOOTH");
        $data['list_rawat'] = array("-","Rawat Inap", "Rawat Jalan");
        $data['list_pencarian'] = array("No RM / Nama","Dr Pengirim", "Status", "Analis Lab", "Petugas Entry");
        $this->admin_template_minor->display_with_sidebar('lab/rekap_hasil_lab_view', $data);
	}


    public function ajax_jenis_pasien()
    {
        $text = '';
        $periode = $this->input->post('periode');
        $rawat= $this->input->post('rawat');
        $text .= '<table>';
        $text .= '<tr>';
        $text .= '<td style="border:1px solid #000;font-weight:bolder;">Jenis Pasien </td>';
        $listdata = $this->lab_periksa->get_nama_pemeriksaan();
        for ($i=0; $i < count($listdata) ; $i++) { 
            $text .= '<td style="border:1px solid #000;font-weight:bolder;">'.$listdata[$i]['id_layanan'].'</td>';
        }
        $x = '';
        $text .= '</tr>';
        $display = $this->lab_periksa->rekap_hasil_lab_by_jenis_pasien($periode,$rawat);
        for ($i=0; $i < count($display); $i++) { 
            $text .= '<tr>';
            $text .= '<td style="border:1px solid #000;">'.$display[$i]['KelompokBeli'].'</td>';
            for ($j=0; $j < count($listdata) ; $j++) { 
                $x = $listdata[$j]['id_layanan'];
                $text .= '<td style="border:1px solid #000;">'.$display[$i][$x].'</td>';
            }            
            $text .= '</tr>';
        }
        $text .= '</table>';
        echo $text;
    }

    public function ajax_penjamin()
    {
        $text = '';
        $periode = $this->input->post('periode');
        $rawat= $this->input->post('rawat');
        $text .= '<table>';
        $text .= '<tr>';
        $text .= '<td style="border:1px solid #000;font-weight:bolder;">Penjamin </td>';
        $listdata = $this->lab_periksa->get_nama_pemeriksaan();
        for ($i=0; $i < count($listdata) ; $i++) { 
            $text .= '<td style="border:1px solid #000;font-weight:bolder;">'.$listdata[$i]['id_layanan'].'</td>';
        }
        $x = '';
        $text .= '</tr>';
        $display = $this->lab_periksa->rekap_hasil_lab_by_penjamin($periode,$rawat);
        for ($i=0; $i < count($display); $i++) { 
            $text .= '<tr>';
            $text .= '<td style="border:1px solid #000;">'.$display[$i]['penjamin_manual_edit'].'</td>';
            for ($j=0; $j < count($listdata) ; $j++) { 
                $x = $listdata[$j]['id_layanan'];
                $text .= '<td style="border:1px solid #000;">'.$display[$i][$x].'</td>';
            }            
            $text .= '</tr>';
        }
        $text .= '</table>';
        echo $text;
    }
}
<?php 
$this->load->view('template/head');
?>
<head>
        <link rel="stylesheet" href="../../../assets/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="../../../assets/select2/dist/css/select2.css">
        <link rel="stylesheet" href="../../../assets/DataTables/css/jquery.dataTables.css">
        <link rel="stylesheet" href="../../../assets/DataTables/css/dataTables.tableTools.css">
        <link rel="stylesheet" href="../../../assets/DataTables/css/font-awesome.css">
        <link rel="stylesheet" href="../../../assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.css">
        <style type="text/css">
             .display
                tr td:first-child {
                    text-align: center;
                }
             
                tr td:first-child:before {
                    content: "\f096"; /* fa-square-o */
                    font-family: FontAwesome;
                }
             
                tr.selected td:first-child:before {
                    content: "\f046"; /* fa-check-square-o */
                }
        </style>
</head>
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       Akutansi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Akutansi</a></li>
        <li class="active">Set Harga</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="row">
              <!-- Custom Tabs -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Set Harga</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                       <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Tarif Basic</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Tarif Bertingkat</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Tarif Paket</a></li>
                              <li><a href="#tab_4" data-toggle="tab">Info Detail Paket</a></li>
                              <li><a href="#tab_5" data-toggle="tab">Tarif Laboratorium</a></li>
                              <li><a href="#tab_6" data-toggle="tab">Tarif Radiologi</a></li>
                              <li><a href="#tab_7" data-toggle="tab">Diagnosed Based Pricing</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                   <form class="form-horizontal">
                                      <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-12">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Tampilkan di Poli / Unit </label>
                                                        <div class="col-sm-3" >
                                                          <select class="col-sm-2 form-control" name="combo_poli1" id="combo_poli1"></select>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: 10px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_setharga" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div>                                       
                                                </div>
                                              </div>
                                              <div class="col-md-12">
                                                <div class="box-body">
                                                  <div class="form-group">
                                                  <div class="row">
                                                              <table id="list_set_harga" class="table table-bordered table-hover display">
                                                                <thead>
                                                                  <tr>
                                                                    <th></th>
                                                                    <th>ID</th>
                                                                    <th>Nama</th>
                                                                    <th>Kelompok</th>
                                                                    <th>Rp Basic(Default)</th>
                                                                    <th>Fee/Disc Max %</th>
                                                                    <th>Poli</th>
                                                                    <th>Kode Lokal</th>
                                                                    <th>Include Reg</th>
                                                                    <th>Free Entry</th>
                                                                    <th>Tgl Edit</th>
                                                                    <th>Editor</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                              </table>
                                                    </div>
                                                  </div>                                 
                                                </div>
                                              </div>
                                            </div><hr>
                                          <div class="row">
                                            <div class="col-sm-12">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Poli / Unit / Group </label>
                                                        <div class="col-sm-3" >
                                                          <select class="col-sm-2 form-control" name="combo_poli2" id="combo_poli2"></select>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -10px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_ctk_sethrga" class="btn btn-primary"><i class="fa fa-fw fa-print"></i>Cetak</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label"> Kelompok</label>
                                                        <div class="col-sm-2" >
                                                           <select class="form-control" id="select_kelompok">
                                                              <option selected="selected">-</option>
                                                              <option>Jasa</option>
                                                              <option>Sewa Alat</option>
                                                            </select>
                                                        </div>
                                                        <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-10px;"> Kode Layanan</label>
                                                        <div class="col-sm-2" >
                                                          <input type="text" class="form-control" id="kode_layanan" value="Auto Number" disabled="true">
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -10px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_set_kelompok" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Set Kelompok</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label"> Nama Layanan</label>
                                                        <div class="col-sm-3" >
                                                          <input type="text" class="form-control" id="nm_layanan" >
                                                        </div>
                                                    </div>
                                                      <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label"> Kode Lokal</label>
                                                        <div class="col-sm-2" >
                                                          <input type="text" class="form-control" id="kode_lokal">
                                                        </div>
                                                        <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-10px;"> Maks Fee/Disc(%)</label>
                                                        <div class="col-sm-2" >
                                                          <input type="text" class="form-control" id="fee_disc" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label"> Tarif Biaya : (Rp)</label>
                                                        <div class="col-sm-3" >
                                                          <input type="text" class="form-control" id="trf_biaya" >
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                      <div class="input-group-btn">
                                                         <button type="button" id="tbl_tbh_harga" class="btn btn-primary" style="margin-left:192px;"><i class="fa fa-fw fa-plus"></i>Tambah</button>
                                                         <button type="button" id="tbl_edit_harga" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-edit"></i>Ubah</button>
                                                         <button type="button" id="tbl_hapus_harga" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                                      </div> 
                                                    </div>
                                                  </div>                                       
                                                </div>
                                              </div>
                                            </div><hr>
                                      </div><!-- /.box-body -->
                                   </form>
                                    <div class="row">
                                        <div class="col-md-7">
                                          <!-- Custom Tabs -->
                                          <div class="nav-tabs-custom">
                                            <ul class="nav nav-tabs">
                                              <li class="active"><a href="#trf_poli" data-toggle="tab">Copy Tarif Poli</a></li>
                                              <li><a href="#inc_registrasi" data-toggle="tab">Include Registrasi</a></li>
                                              <li><a href="#trf_labrad" data-toggle="tab">Sync tarif Lab & Rad</a></li>
                                              <li><a href="#hrga_bbs" data-toggle="tab">Harga Bebas Entry</a></li>
                                            </ul>
                                            <div class="tab-content">
                                              <div class="tab-pane active" id="trf_poli">
                                                <form class="form-horizontal">
                                                  <div class="box-body">
                                                    <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-4 control-label">Sumber Tarif Poli/Unit </label>
                                                        <div class="col-sm-5" >
                                                          <select class="col-sm-2 form-control" name="combo_poli3" id="combo_poli3"></select>
                                                        </div>
                                                        <label for="inputEmail3" class="col-sm-4 control-label" style="margin-left:-80px;">Terdapat : 0 tarif </label>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-4 control-label">Copy Ke Poli / Unit </label>
                                                        <div class="col-sm-5" >
                                                          <select class="col-sm-2 form-control" name="combo_poli4" id="combo_poli4"></select>
                                                        </div>
                                                         <label for="inputEmail3" class="col-sm-4 control-label" style="margin-left:-80px;">Terdapat : 0 tarif </label>
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                   <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-4 control-label"> Jika Tarif Sudah Ada</label>
                                                        <div class="col-sm-6" >
                                                           <select class="form-control" id="select_kelompok">
                                                              <option selected="selected">--Pilih Salah Satu--</option>
                                                              <option>Replace dengan tarif baru</option>
                                                              <option>Biarkan dengan tarif sebelumnya</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                  </div>
                                                  <div class="input-group-btn">
                                                         <button type="button" id="tbl_copy_tarif" class="btn btn-default" style="margin-left:192px;"><i class="fa fa-fw fa-refresh"></i>Copy Sekarang</button>
                                                  </div>
                                                </div>
                                              </form>    
                                              </div><!-- /.tab-pane -->
                                              <div class="tab-pane" id="inc_registrasi">
                                                <p>Pilihlah nama tarif diatas (gunakan tombol CLTR untuk memilih beberapa tarif).</p>
                                                <p>Tekan tombol dibawah untuk mengubah menjadi Default Tarif Registrasi atau sebaliknya.</p>
                                                <div class="input-group-btn">
                                                         <button type="button" id="tbl_incl_registrasi" class="btn btn-default" style="margin-left:10px;">Include saat registrasi</button>
                                                </div> 

                                              </div><!-- /.tab-pane -->
                                              <div class="tab-pane" id="trf_labrad">
                                                <p>Fitur ini akan mencopy setting tarif di Modul Laboratorium dan Radiologi ke Master Harga Tindakan, Apabila tarif sudah ada di Master Tindakan maka TIDAK AKAN DICOPY DAN HARGA TIDAK AKAN BERUBAH.</p>

                                              <div class="row"> 
                                              <div class="form-group">
                                                <div class="col-lg-6"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_labrad" id="r_tanpa_tarif" class="flat-red" value="DEBET" checked>Tanpa Tarif (seluruh tarif akan diisi nol/0)</label>
                                                </div>   
                                                <div class="col-lg-7"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_labrad" id="r_dgn_tarif" class="flat-red" value="DEBET">Dengan Tarif dan gunakan kelompok tarif</label>
                                                </div> 
                                              <div class="row">
                                                <div class="form-group">
                                                <div class="col-lg-7">
                                                  <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label"> Laboratorium</label>
                                                        <div class="col-sm-7" >
                                                          <select class="form-control" id="combo_trf_laboratorium" disabled="true">
                                                              <?php foreach ($dt_trf_labs as $dt_trf_lab) { ?>
                                                              <option ><?php echo $dt_trf_lab['kelompok_tarif']; ?></option>
                                                              <?php } ?>  
                                                          </select>
                                                        </div>
                                                   </div> 
                                                </div>  
                                              </div>
                                            </div>
                                              <div class="row">
                                                <div class="form-group">
                                                <div class="col-lg-7">
                                                  <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label"> Radiologi</label>
                                                        <div class="col-sm-7" >
                                                          <select class="form-control" id="combo_trf_radiologi" disabled="true">
                                                              <option>template_2</option>
                                                              <option>template_3</option>
                                                              <option>BETHANY</option>
                                                              <option>UMUM</option>
                                                              <option>KARYAWAN</option>
                                                          </select>
                                                        </div>
                                                   </div> 
                                                </div>  
                                              </div>
                                            </div>      
                                              </div>  
                                            </div>

                                              </div><!-- /.tab-pane -->
                                              <div class="tab-pane" id="hrga_bbs">
                                              <p>Fitur ini digunakan untuk mensetup apakah tagihan dapat dientry secara bebas nilai tarifnya, setting ini hanya berlaku di Modul Rawat Inap</p>

                                              <div class="input-group-btn">
                                                         <button type="button" id="tbl_free_entry" class="btn btn-default" style="margin-left:10px;">Free Entry</button>
                                                         <button type="button" id="tbl_mstr_trf" class="btn btn-default" style="margin-left:10px;">Sesuai Master Tarif</button>
                                              </div> 

                                              </div><!-- /.tab-pane -->
                                            </div><!-- /.tab-content -->
                                          </div><!-- nav-tabs-custom -->
                                        </div><!-- /.col -->
                                      </div>
                              </div><!-- /.tab-pane -->
  
                              <div class="tab-pane" id="tab_2">
                                    <form class="form-horizontal">
                                      <div class="box-body">
                                      <div class="row">
                                          <div class="col-md-7">
                                                  <div class="row">
                                                        <textarea class="form-control" rows="10" id="list_text_trf" ></textarea>
                                                    </div><hr>
                                                    <div class="row">
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label"> Kelas/Group</label>
                                                          <div class="col-sm-4" >
                                                            <input type="text" class="form-control" id="kls_group" >
                                                          </div>
                                                       </div>
                                                    </div>
                                                    <div class="row">
                                                       <div class="form-group" style="margin-bottom: 50px;">
                                                        <div class="input-group-btn">
                                                           <button type="button" id="tbl_refresh_tarif" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                           <button type="button" id="tbl_tbh_tarif" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-save"></i>Tambah</button>
                                                           <button type="button" id="tbl_update_tarif" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-edit"></i>Update</button>
                                                           <button type="button" id="tbl_hps_tarif" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                                        </div> 
                                                      </div><hr>
                                                  </div>
                                            </div>   
                                       <div class="row">
                                            <div class="col-sm-12">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Tampilkan di Poli / Unit /Dept</label>
                                                        <div class="col-sm-3" >
                                                          <select class="col-sm-2 form-control" name="combo_poli5" id="combo_poli5" style="width:100%"></select>
                                                        </div>
                                                        <div class="col-sm-" style="margin-left: 10px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_trf_bertingkat" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Cari Nama </label>
                                                        <div class="col-sm-3" >
                                                          <input type="text" class="form-control" id="text_cr_nama" >
                                                        </div>
                                                    </div>
                                                  </div> <hr>                                      
                                                </div>
                                              </div>
                                              <div class="col-md-12">
                                                <div class="box-body">
                                                  <div class="form-group">
                                                  <div class="row">
                                                          <table id="list_tarif_bertingkat" class="table table-bordered table-hover display">
                                                                <thead>
                                                                  <tr>
                                                                    <th></th>
                                                                    <th>ID</th>
                                                                    <th>Nama Layanan/Tindakan</th>
                                                                    <th>Poli/Unit/Dept</th>
                                                                    <th>Tarif Basic/Default(Rp)</th>
                                                                    <th>Tarif Basic/Default(Rp)</th>
                                                                    <th>KELAS 2 (Rp)</th>
                                                                    <th>KELAS 3 (Rp)</th>
                                                                    <th>Last Edit </th>
                                                                    <th>User ID</th>
                                                                    <th>KELAS I (Rp)</th>
                                                                    <th>KELAS 2 (Rp)</th>
                                                                    <th>KELAS 3 (Rp)</th>
                                                                    <th>KELAS VIP (Rp)</th>
                                                                    <th>MASPION (Rp)</th>
                                                                    <th>HARDLENT (Rp)</th>
                                                                    <th>AKSES_PENSIUNAN(Rp)</th>
                                                                    <th>RAMAMUZA MEDIKA (Rp)</th>
                                                                    <th>JAMSOSTEK (Rp)</th>
                                                                    <th>KARYAWAN (Rp)</th>
                                                                    <th>ISOLASI (Rp)</th>
                                                                    <th>ICU (Rp)</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                            </table>
                                                    </div>
                                                  </div>                                 
                                                </div>
                                              </div>
                                            </div><hr>
                                          <div class="row">
                                            <div class="col-sm-6" style="background-color:#C7B4D2;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Copy / Set Tarif</label>
                                                        <div class="col-sm-4" >
                                                             <select class="form-control" id="combo_copy_trf">
                                                                 <option></option>
                                                              </select>
                                                        </div>
                                                        <div class="input-group-btn">
                                                             <button type="button" id="tbl_simpan_trf" class="btn btn-default"><i class="fa fa-fw fa-save"></i>Simpan Tarif</button>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Rumusan Tarif : </label>
                                                          <label for="inputEmail3" class="col-sm-3 control-label" style="margin-left:-30px;">Tarif Basic +</label>
                                                        <div class="col-sm-3" >
                                                          <input type="number" class="form-control" id="trf_basic" >
                                                        </div>
                                                         <label for="inputEmail3" class="col-sm-1 control-label">%</label>
                                                    </div>
                                                    <p>*) Setelah proses Set Tarif Tekan tombol Simpan untuk proses penyimpanan</p>
                                                  </div>                                          
                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                      </div><!-- /.box-body -->
                                   </form>
                              </div>

                              <div class="tab-pane" id="tab_3">
                                              <form class="form-horizontal">
                                                <div class="box-body">
                                                    <div class="row">
                                                    <div class="col-sm-5">
                                                  <div class="box-body">
                                                     <div class="box-header with-border">
                                                        <h3 class="box-title">Daftar Harga Paket :</h3>
                                                     </div><!-- /.box-header -->
                                                    <div class="form-group">
                                                      <div class="row">
                                                          <div class="box-body">
                                                              <table id="list_trf_paket" class="table table-bordered table-hover display" >
                                                                <thead>
                                                                  <tr>
                                                                    <th></th>
                                                                    <th>ID Paket</th>
                                                                    <th>Nama Paket</th>
                                                                    <th>Tarif (Rp)</th>
                                                                    <th>Jum Item Detail</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                              
                                                                </tbody>
                                                              </table>
                                                          </div>
                                                      </div><hr>
                                                      </div> 
                                                      <div class="row">
                                                        <div class="input-group-btn">
                                                           <button type="button" id="refresh_daftar_paket" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Refresh</button>
                                                           <button type="button" id="hapus_daftar_paket" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-refresh"></i>Hapus</button>
                                                        </div> 
                                                      </div>             
                                                  </div>
                                                </div>
                                                <div class="col-sm-7">
                                                  <div class="box-body">
                                                    <div class="row">
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label"> Nama Paket</label>
                                                          <div class="col-sm-4" >
                                                            <input type="text" class="form-control" id="nm_pkt" >
                                                          </div>
                                                       </div>
                                                    </div>
                                                    <p>Nama Paket yang anda tuliskan diatas akan ditampilkan pada Invoice (Kwintansi), sedangkan nama komponennya tidak akan ditampilkan di Invoice, apabila ingin ditampilkan (atau diperinci) pada Invoice anda harus mensetup ulang di Fitur "Info Detail Paket"</p>
                  
                                                    <div class="form-group" >
                                                        <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-4 control-label">Auto Register di poli : 1</label>
                                                            <div class="col-sm-3" style="width:40%">
                                                              <select class="col-sm-2 form-control" name="combo_poli6" id="combo_poli6" style="width:100%"></select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                              <label for="inputEmail3" class="col-sm-4 control-label">Auto Register di poli : 2</label>
                                                            <div class="col-sm-3" style="width:40%">
                                                              <select class="col-sm-2 form-control" name="combo_poli7" id="combo_poli7" style="width:100%"></select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group" style="margin-bottom: 10px;">
                                                            <div class="col-sm-3">
                                                               <input type="hidden" class="form-control" id="id_paket" value="~~Auto Number~~" disabled="true">
                                                            </div>
                                                        </div>

                                                        <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Poli Penunjang</label>
                                                            <div class="col-sm-3">
                                                               <input type="text" class="form-control" id="poli_lab" value="LABORATORIUM" disabled="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Laboratorium</label>
                                                            <div class="col-sm-3" style="width:30%">
                                                          <select class="form-control" id="combo_pkt_laboratorium">
                                                              <?php foreach ($dt_trf_labs as $dt_trf_lab) { ?>
                                                              <option ><?php echo $dt_trf_lab['kelompok_tarif']; ?></option>
                                                              <?php } ?>  
                                                          </select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Pemeriksaan</label>
                                                            <div class="col-sm-3" style="width:40%">
                                                              <select class="col-sm-2 form-control" name="combo_periksa_lab" id="combo_periksa_lab" style="width:100%"></select>

                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                              <label for="inputEmail3" class="col-sm-4 control-label">Harga Untuk Paket : Rp</label>
                                                            <div class="col-sm-3">
                                                               <input type="text" class="form-control" id="hrg_pkt_lab" >
                                                            </div>
                                                        </div><hr>

                                                          <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Poli Penunjang</label>
                                                            <div class="col-sm-3">
                                                               <input type="text" class="form-control" id="poli_rad" value="RADIOLOGI" disabled="true">
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Radiologi</label>
                                                            <div class="col-sm-3" style="width:30%">
                                                            <select class="form-control" id="combo_pkt_radiologi" >
                                                                  <option>template_2</option>
                                                                  <option>template_3</option>
                                                                  <option>BETHANY</option>
                                                                  <option>UMUM</option>
                                                                  <option>KARYAWAN</option>
                                                             </select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Pemeriksaan</label>
                                                            <div class="col-sm-3" style="width:40%">
                                                              <select class="col-sm-2 form-control" name="combo_periksa_lab" id="combo_periksa_radiologi" style="width:100%"></select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                              <label for="inputEmail3" class="col-sm-4 control-label">Harga Untuk Paket : Rp</label>
                                                            <div class="col-sm-3">
                                                               <input type="text" class="form-control" id="hrg_pkt_rad" >
                                                            </div>
                                                        </div><hr>

                                                         <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Poli / Unit</label>
                                                            <div class="col-sm-3" style="width:40%">
                                                              <select class="col-sm-2 form-control" name="combo_poli8" id="combo_poli8" style="width:100%"></select>
                                                            </div>
                                                        </div>
                                                         <div class="form-group" style="margin-bottom: 10px;">
                                                              <label for="inputEmail3" class="col-sm-3 control-label">Tindakan</label>
                                                            <div class="col-sm-3" style="width:40%">
                                                              <select class="col-sm-2 form-control" name="tindakan_poli" id="tindakan_poli" style="width:100%"></select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                              <label for="inputEmail3" class="col-sm-4 control-label">Harga Untuk Paket : Rp</label>
                                                            <div class="col-sm-3">
                                                               <input type="text" class="form-control" id="hrg_pkt_poli" >
                                                            </div>
                                                        </div><hr>


                                                          <div class="row">
                                                              <div class="box-body">
                                                                  <table id="list_detail_paket" class="table table-bordered table-hover display" >
                                                                    <thead>
                                                                      <tr>
                                                                        <th></th>
                                                                        <th>Poli</th>
                                                                        <th>Komponen</th>
                                                                        <th>Kelompok Beli</th>
                                                                        <th>Tarif (Rp)</th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                  
                                                                    </tbody>
                                                                  </table>
                                                              </div>
                                                          </div><hr>
                                                        <div class="form-group" style="margin-bottom: 25px;">
                                                              <label for="inputEmail3" class="col-sm-2 control-label">Total : </label>
                                                              <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:10px;" id="total_paket">Rp - </label>
                                                        </div>
                                                        <div class="input-group-btn">
                                                           <button type="button" id="hapus_kom_paket" class="btn btn-danger pull-right" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus Komponen Paket</button>
                                                        </div> 
                                                      </div> 
                                                      <div class="row">
                                                        <div class="input-group-btn">
                                                           <button type="button" id="simpan_daftar_paket" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-save"></i>Simpan</button>
                                                           <button type="button" id="btl_daftar_paket" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Batal</button>
                                                        </div> 
                                                      </div>             
                                                  </div>
                                                </div>
                                              </div>
                                      </div><!-- /.box-body -->
                                   </form>
                              </div><!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_4">
                                    <div class="row">
                                     <div class="col-sm-12">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Nama Paket</label>
                                                        <div class="col-sm-4" >
                                                          <select class="col-sm-2 form-control" id="combo_nama_paket">
                                                              <option value=''>Tampilkan Semua</option>
                                                                  <?php foreach ($dt_layanans as $dt_layanan) { ?>
                                                              <option ><?php echo $dt_layanan['nama_layanan']; ?></option>
                                                              <?php } ?>  
                                                          </select>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: 25px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_paket" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div> 
                                                  <p>Modul ini dipergunakan untuk menampilkan Informasi pada Invoice (Kwitansi), setup pada Modul ini tidak akan berpengaruh pada unit lain seperti Laboratorium, Radiologi, Poli, UGD, dan lainya.</p><hr> 
                                                  <div class="row">
                                                              <div class="box-body">
                                                                  <table id="list_paket" class="table table-bordered table-hover display" >
                                                                    <thead>
                                                                      <tr>
                                                                        <th></th>
                                                                        <th>Nama Layanan</th>
                                                                        <th>Informasi</th>
                                                                        <th>Index</th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                  </table>
                                                              </div>
                                                    </div><hr>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Nama Layanan</label>
                                              <div class="col-sm-10" style="width : 30%;">
                                                <input type="text" class="form-control" id="nama_layanan" disabled="true">
                                              </div>
                                              <div class="input-group-btn">
                                                <button type="button" id="cari_nm_layanan" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-search"></i></button>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="width:800px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Cari Tindakan</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <table id="list_tindakan" class="table table-bordered table-hover display">
                                                            <thead>
                                                              <tr>
                                                                <th></th>
                                                                <th>Nama Tindakan/Layanan</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php foreach ($dt_tindakans as $dt_tindakan) { ?>
                                                              <tr>
                                                                <td></td>
                                                                <td><?php echo $dt_tindakan['nama']; ?></td>
                                                              </tr>
                                                              <?php } ?>
                                                            </tbody>
                                                          </table>                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 25px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Text Informasi</label>
                                              <div class="col-sm-10" style="width : 30%;">
                                                <input type="text" class="form-control" id="txt_informasi">
                                              </div>
                                            </div>
                                          </div>
                                      </div>
                                    </div> 
                                  </div>  
                                  <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="simpan_tindakan" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-save"></i>Simpan</button>
                                                 <button type="button" id="hps_tindakan" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                                 <button type="button" id="rst_tindakan" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-refresh"></i>Reset</button>
                                              </div> 
                                          </div>                     
                                     </div><!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_5">
                                    <div class="row">
                                     <div class="col-sm-12">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Bidang</label>
                                                        <div class="col-sm-3" >
                                                         <select class="col-sm-2 form-control" name="combo_bidang" id="combo_bidang" style="width:100%"></select>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: 25px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_bid_lab" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div> <hr>
                                                  <div class="row">
                                                    <div class="box-body">
                                                      <table id="list_bid_lab" class="table table-bordered table-hover display" >
                                                              <thead>
                                                                <tr>
                                                                  <th></th>
                                                                  <th>Nama Pemeriksaan</th>
                                                                  <th>Bidang</th>
                                                                  <th>Unit Cost(Rp)</th>
                                                                  <th>BETHANY</th>
                                                                  <th>HEMODIALISA</th>
                                                                  <th>KARYAWAN</th>
                                                                  <th>UMUM</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              </tbody>
                                                      </table>
                                                    </div>
                                                  </div><hr>
                                            </div>
                                          </div> 
                                           <div class="row">
                                              <div class="col-sm-4" style="background-color:#C0C098;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-7 control-label">Tambah Kelompok Tarif :</label>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-6 control-label">Kelompok Tarif</label>
                                                        <div class="col-sm-6";" >
                                                            <input type="text" class="form-control" id="text_kel_tarif">
                                                        </div> 
                                                    </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbh_kel_trf" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Tambah</button>
                                                             <button type="button" id="hps_kel_trf" class="btn btn-danger" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-times"></i>hapus</button>
                                                    </div> 
                                                      <p>*) Hanya Supervisor yang dapat menggunakan</p>
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-3" >
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Kelompok</label>
                                                        <div class="col-sm-7";" >
                                                             <select class="form-control" id="copy_trf_lab" >
                                                                   <?php foreach ($dt_trf_labs as $dt_trf_lab) { ?>
                                                              <option ><?php echo $dt_trf_lab['kelompok_tarif']; ?></option>
                                                              <?php } ?>  
                                                             </select>
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Tarif</label>
                                                        <div class="col-sm-7";" >
                                                            <input type="text" class="form-control" id="set_tarif">
                                                        </div> 
                                                    </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_save_trf" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Simpan Tarif</button>
                                                    </div> 
                                                  
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-4" style="background-color:#A7a6C9;margin-bottom:50px;margin-left: 10px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-6 control-label"><input type="checkbox" id="cek_aktf_fitur">Aktifkan Fitur</label>
                                                    </div>
                                                  </div>  
                                                  <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label">Copy Tarif</label>
                                                        <div class="col-sm-6";" >
                                                             <select class="form-control" id="copy_trf_lab1" disabled="true">
                                                                   <?php foreach ($dt_trf_labs as $dt_trf_lab) { ?>
                                                              <option ><?php echo $dt_trf_lab['kelompok_tarif']; ?></option>
                                                              <?php } ?>  
                                                             </select>
                                                        </div> 
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label">Ke dalam Tarif</label>
                                                        <div class="col-sm-6";" >
                                                             <select class="form-control" id="copy_trf_lab2" disabled="true">
                                                                   <?php foreach ($dt_trf_labs as $dt_trf_lab) { ?>
                                                              <option ><?php echo $dt_trf_lab['kelompok_tarif']; ?></option>
                                                              <?php } ?>  
                                                             </select>
                                                        </div> 
                                                    </div>
                                                  </div>
                                                   <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label">Ubah naikkan : +</label>
                                                       
                                                        <div class="col-sm-4";" >
                                                            <input type="number" class="form-control" id="naik_harga" disabled="true" value="0" min="0" max="100">
                                                        </div> 

                                                         <label for="inputEmail3" class="col-sm-1 control-label">%</label>
                                                    </div>
                                                  </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_cpy_harga" class="btn btn-default" disabled="true">Copy</button>
                                                    </div> 

                                                                                          
                                                </div>
                                              </div>
                                          </div>

                                        </div>  
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_6">
                                    <div class="row">
                                     <div class="col-sm-12">
                                                  <div class="row">
                                                    <div class="box-body">
                                                      <table id="list_bid_rad" class="table table-bordered table-hover display" >
                                                              <thead>
                                                                <tr>
                                                                  <th></th>
                                                                  <th>Nama</th>
                                                                  <th>BETHANY</th>
                                                                  <th>KARYAWAN</th>
                                                                  <th>UMUM</th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                              </tbody>
                                                      </table>
                                                    </div><hr>
                                                  </div>
                                          </div> 
                                           <div class="row">
                                              <div class="col-sm-4" style="background-color:#D4D09e;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-8 control-label">Tambah Nama Pemeriksaan :</label>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                        <div class="col-sm-8";" >
                                                            <input type="text" class="form-control" id="text_tbh_periksa">
                                                        </div> 
                                                    </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbh_periksa" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Tambah</button>
                                                             <button type="button" id="hps_periksa" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>hapus</button>
                                                    </div> 
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-4" style="background-color:#BEE6BE;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-8 control-label">Tambah Kelompok Tarif :</label>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                        <div class="col-sm-8";" >
                                                            <input type="text" class="form-control" id="text_tbh_tarif">
                                                        </div> 
                                                    </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbh_kelompok" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Tambah</button>
                                                             <button type="button" id="hps_kelompok" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>hapus</button>
                                                    </div> 
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-3" >
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Kelompok</label>
                                                        <div class="col-sm-7";" >
                                                             <select class="form-control" id="tarif_rad" >
                                                                <option>BETHANY</option>
                                                                <option>UMUM</option>
                                                                <option>KARYAWAN</option>
                                                             </select>
                                                        </div> 
                                                      </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Tarif</label>
                                                        <div class="col-sm-7";" >
                                                            <input type="text" class="form-control" id="set_tarif_rad">
                                                        </div> 
                                                    </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_save_rad" class="btn btn-primary"><i class="fa fa-fw fa-times"></i>Simpan Tarif</button>
                                                    </div> 
                                                  
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-4" style="background-color:#A7a6C9;margin-bottom:50px;margin-left: 10px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-6 control-label"><input type="checkbox" id="cek_aktf_rad">Aktifkan Fitur</label>
                                                    </div>
                                                  </div>  
                                                  <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label">Copy Tarif</label>
                                                        <div class="col-sm-6";" >
                                                              <select class="form-control" id="tarif_rad1"  disabled="true">
                                                                <option>BETHANY</option>
                                                                <option>UMUM</option>
                                                                <option>KARYAWAN</option>
                                                             </select>
                                                        </div> 
                                                    </div>
                                                  </div>
                                                  <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label">Ke dalam Tarif</label>
                                                        <div class="col-sm-6";" >
                                                              <select class="form-control" id="tarif_rad2"  disabled="true">
                                                                <option>BETHANY</option>
                                                                <option>UMUM</option>
                                                                <option>KARYAWAN</option>
                                                             </select>
                                                        </div> 
                                                    </div>
                                                  </div>
                                                   <div class="row">
                                                     <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-5 control-label">Ubah naikkan : +</label>
                                                       
                                                        <div class="col-sm-4";" >
                                                            <input type="number" class="form-control" id="naik_harga_rad" disabled="true" value="0" min="0" max="100">
                                                        </div> 

                                                         <label for="inputEmail3" class="col-sm-1 control-label">%</label>
                                                    </div>
                                                  </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_cpy_rad" class="btn btn-default" disabled="true">Copy</button>
                                                    </div> 

                                                                                          
                                                </div>
                                              </div>
                                          </div>

                                        </div>  
                                    </div><!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_7">
                                    <form class="form-horizontal">
                                    <div class="box-body">
                                    <div class="row">
                                     <div class="col-sm-4">
                                          <div class="row">
                                              <div class="box-body">
                                                  <table id="list_nm_pricing" class="table table-bordered table-hover display" >
                                                      <thead>
                                                          <tr>
                                                            <th></th>
                                                            <th>Nama Pricing</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div><hr>
                                           </div>
                                           <div class="row">
                                                  <div class="row">
                                                    <label for="inputEmail3" style="width:140px;margin-bottom:50px;" class="col-sm-2 control-label">Nama Pentarifan</label>
                                                    <div class="col-lg-7" >
                                                      <input type="text" class="form-control" name="catatan" id="nm_pntrf">
                                                      </div>
                                                  </div>  
                                           </div>
                                           <div class="row" style="margin-bottom:20px">
                                            <div class="input-group-btn">
                                                         <button type="button" id="refresh_pricing" class="btn btn-primary" style="margin-left:1px;"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                         <button type="button" id="tbh_pricing" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-save"></i>Tambah</button>
                                            </div> 
                                          </div>
                                           <div class="row">
                                            <div class="input-group-btn">
                                                         <button type="button" id="koreksi_pricing" class="btn btn-primary" style="margin-left:1px;"><i class="fa fa-fw fa-edit"></i>Koreksi</button>
                                                         <button type="button" id="hapus_pricing" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                            </div> 
                                          </div>
                                        </div> 
                                        <div class="col-sm-7" style="margin-left:70px;">
                                        <div class="box-body">
                                           <div class="row">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-4 control-label">Nama Pentarifan</label>
                                                        <div class="col-sm-3">
                                                         <select class="col-sm-2 form-control" id="combo_pricing" style="width:100%">
                                                                  <?php foreach ($dt_pricings as $dt_pricing) { ?>
                                                              <option ><?php echo $dt_pricing['nama_pricing']; ?></option>
                                                              <?php } ?>  
                                                          </select>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: 25px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_pricing" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                    <p> *) Apabila ICD atau kode diagnosa tidak ditemukan silahkan menghubungi bagian Rekam Medis</p>
                                           </div><hr>

                                          <div class="row">
                                                  <table id="list_base_pricing" class="table table-bordered table-hover display" >
                                                      <thead>
                                                          <tr>
                                                            <th></th>
                                                            <th>ICD</th>
                                                            <th>Deskripsi</th>
                                                            <th>Deskripsi INA</th>
                                                            <th>Tarif</th>
                                                            <th>Last User</th>
                                                            <th>Last Update</th>
                                                          </tr>
                                                      </thead>
                                                      <tbody>
                                                      </tbody>
                                                  </table>
                                              </div><hr>
                                           </div>
                                           <div class="row">
                                                    <div class="form-group" style="margin-bottom: 25px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Set Tarif</label>
                                                        <div class="col-sm-3" >
                                                         <input type="text" class="form-control" name="catatan" id="nm_pntrf2">
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: 25px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="set_pricing" class="btn btn-default"><i class="fa fa-fw fa-save"></i>Set Tarif</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                           </div>
                                        </div> 
                                        </div>
                                      </div>
                                      </form>  
                                    </div><!-- /.tab-pane -->
                                  </div><!-- /.tab-content -->
                                </div><!-- nav-tabs-custom -->
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                      </div><!-- nav-tabs-custom -->
                    </div>
          </div><!-- /.col -->

      </section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../../../assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../../assets/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="../../../assets/DataTables/js/dataTables.select.min.js"></script>
<script src="../../../assets/select2/dist/js/select2.js"></script>
<script src="../../../assets/Select-master/js/dataTables.select.js"></script>
<script src="../../../assets/DataTables/js/dataTables.tableTools.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript">

var dtrec;
$(function (){

   var cari_poli = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli1").select2(cari_poli);

   var  cari_poli2 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli2").select2(cari_poli2);

  var  cari_poli3 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli3").select2(cari_poli3);

  var  cari_poli4 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli4").select2(cari_poli4);

  var  cari_poli5 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli5").select2(cari_poli5);

  var  cari_poli6 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli6").select2(cari_poli6);

  var  cari_poli7 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli7").select2(cari_poli7);

  var  cari_poli8 = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_poli/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_poli8").select2(cari_poli8);

  var searchTerm = null;
  var remoteDataConfig = {
        placeholder: "Cari Tindakan...",
        minimumInputLength: 1,
        ajax: {
            url: "../tindakan_poli/",
            dataType: 'json',type:"POST",
            data: function (term) {  term['poli']= $('#combo_poli8 option:selected').text(); return term; },
            processResults: function (data, page) { return { results: data };
        } 
      }
  };
  $("#tindakan_poli").select2(remoteDataConfig);

  var  cari_lab = {
        placeholder: "Cari Pemeriksaan...",
        minimumInputLength: 1,
         ajax: {  
        url: "../periksa_lab/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_periksa_lab").select2(cari_lab);

  var  cari_rad = {
        placeholder: "Cari Pemeriksaan...",
        minimumInputLength: 1,
         ajax: {  
        url: "../periksa_lab/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_periksa_radiologi").select2(cari_rad);

   $("#tbl_car_setharga").click(function() { 
    list_hargapoli();
  });

    function list_hargapoli(){
        $('#list_set_harga').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,scrollX:true, searchable:true ,
        "ajax":{
          url :"../list_hargapoli/", // json datasource
          type: "post",  // method  , by default get
          data:{combo_poli1 : $("#combo_poli1 option:selected").text()},
          error: function(){  // error handling
            $(".list_set_harga-error").html("");
            $("#list_set_harga").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_set_harga").css("display","none");   
          }
        }
      });  
      }


      $('#list_set_harga').click(function() {  
      dtrec = $('#list_set_harga').DataTable().row('.selected').data();
      $("#nm_layanan").val(dtrec[2]);
      $("#kode_layanan").val(dtrec[1]);
      $("#trf_biaya").val(dtrec[4]);
      $("#fee_disc").val(dtrec[5]);
      
      });



     $("#tbl_tbh_harga").click(function() { 
   if($("#nm_layanan").val() == ""){
      alert(" Masukkan nama layanan / tindakan") 
    } else if ($("#select_kelompok").val() == "-"){ 
      alert(" Masukan kelompok layanan jasa/obat/alkes dengan benar") 
    } else {
            

        $.ajax({  datatype: "json",data:{

              nm_layanan                        : $("#nm_layanan").val(),
              select_kelompok                   : $("#select_kelompok option:selected").val(),
              kode_lokal                        : $("#kode_lokal").val(),
              trf_biaya                         : $("#trf_biaya").val(),   
              fee_disc                          : $("#fee_disc").val(),
              combo_poli2                       : $("#combo_poli2 option:selected").text(),
              urut                               :  urut},
              url                               : "../tambah_harga/",
                async: false, type:'POST',success: function(data){
                var dt=JSON.parse(data); alert("Penambahan tarif layanan " +dtrec[1]+ " telah berhasil ditambahkan");
              }, error: function(){alert('Error Nih !!! '); }    
            });list_hargapoli();
               $("#nm_layanan").val("");
               $("#select_kelompok").val("-");
               $("#kode_lokal").val("");
               $("#trf_biaya").val("");
               $("#fee_disc").val("");
              }  
            
            });

   $("#tbl_set_kelompok").click(function() { 

     if($("#select_kelompok").val() == "-"){
      alert(" Masukan kelompok layanan jasa/obat/alkes dengan benar") 
    } else { 
  if (confirm("Proses akan merubah item yang dipilih menjadi kelompok :" + $("#select_kelompok option:selected").val() + " ,Yakin akan melanjutkan proses tersebut?") == true) {  
        $.ajax({  datatype: "json",data:{
              kode_layanan        : dtrec[1],
              select_kelompok         : $("#select_kelompok option:selected").val()},
              url                 : "../update_kelompok/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Setting kelompok layanan telah berhasil");
      }, error: function(){alert('Error Nih !!! ');}    
    });   list_hargapoli();
      }
    }
  });

  $("#tbl_hapus_harga").click(function() { 
  if (confirm("yakin menghapus " + dtrec[2] + " di poli " +dtrec[6]) == true) {  
        $.ajax({  datatype: "json",data:{
              kode_layanan        : dtrec[1]},
              url                 : "../hapus_harga/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });   list_hargapoli();
    }
  });

  $("#tbl_edit_harga").click(function() { 
  
        $.ajax({  datatype: "json",data:{
              nm_layanan                        : $("#nm_layanan").val(),
              select_kelompok                   : $("#select_kelompok option:selected").val(),
              kode_lokal                        : $("#kode_lokal").val(),
              trf_biaya                         : $("#trf_biaya").val(),   
              fee_disc                          : $("#fee_disc").val(),
              combo_poli2                       : $("#combo_poli2 option:selected").text(),
              kode_layanan                      : dtrec[1],
              user_id                           : dtrec[13]},
              url                               : "../update_harga/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });  list_hargapoli();
       $("#nm_layanan").val("");
       $("#select_kelompok").val("-");
       $("#kode_lokal").val("");
       $("#trf_biaya").val("");
       $("#fee_disc").val("");
  });



  $("#tbl_incl_registrasi").click(function() { 
  
        $.ajax({  datatype: "json",data:{
              kode_layanan                      : dtrec[1]},
              url                               : "../update_include_harga/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });  list_hargapoli();
  });

  list_trf_bertingkat();
  

  function list_trf_bertingkat(){
        $('#list_tarif_bertingkat').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,scrollX:true,
          "columnDefs": [
            {
                "targets": [], "visible": true, "searchable": true
            },
            {
                "targets": [4,6,7], "visible": false, "searchable": false
            }
        ],

         "ajax":{
          url :"../tarif_bertingkat/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_tarif_bertingkat-error").html("");
            $("#list_tarif_bertingkat").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_tarif_bertingkat").css("display","none");   
          },dataSrc : function(json) { var dt =json.field[0];  drt='';
            for ( a =10 ; a < dt.length; a++){
              var i = a;
               $("#list_text_trf").val(drt+dt[a]+"\n" );
               drt = $("#list_text_trf").val( );
            }
             /*var tr = document.getElementById('list_tarif_bertingkat').tHead.children[0],
                  th = document.createElement('th');
              th.innerHTML = dt[i];
              tr.appendChild(th);*/


            

              return json.data; }
        }
      });  
      }


  $("#tbl_tbh_tarif").click(function() { 
  
        $.ajax({  datatype: "json",data:{
              kls_group                         : $("#kls_group").val()},
              url                               : "../tambah_nama_tarif/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });  list_trf_bertingkat();
     
         var tr = document.getElementById('list_tarif_bertingkat').tHead.children[0],
          th = document.createElement('th');
      th.innerHTML = $("#kls_group").val();
      tr.appendChild(th);

  });

   $("#refresh_daftar_paket").click(function() { 
    tarif_paket();
   });
  
  function tarif_paket(){
        $('#list_trf_paket').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,
        "ajax":{
          url :"../list_hrg_paket/", // json datasource
          type: "POST",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_trf_paket-error").html("");
            $("#list_trf_paket").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_trf_paket").css("display","none");
                  
          }
        }
      });  
      }

   $('#list_trf_paket').click(function() {   
    dtrec = $('#list_trf_paket').DataTable().row('.selected').data();
    list_hrg_paket_detail();
    $("#total_paket").text('Rp ' + dtrec[3]);

    });

   function list_hrg_paket_detail(){
        $('#list_detail_paket').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,
        "ajax":{
          url :"../list_hrg_paket_detail/", // json datasource
          type: "POST",  // method  , by default get
          data:{
                id_paket : dtrec[1]},
          error: function(){  // error handling
            $(".list_detail_paket-error").html("");
            $("#list_detail_paket").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_detail_paket").css("display","none");
                  
          }
        }
      });  
      }

  function list_hrg_paket_detail2(){
        $('#list_detail_paket').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,
        "ajax":{
          url :"../list_hrg_paket_detail/", // json datasource
          type: "POST",  // method  , by default get
          data:{id_paket : $("#id_paket").val()
          },
          error: function(){  // error handling
            $(".list_detail_paket-error").html("");
            $("#list_detail_paket").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_detail_paket").css("display","none");
                  
          }
        }
      });  
      }

$("#simpan_daftar_paket").click(function() { 

     if($("#nm_pkt").val() == ""){
      alert(" Masukan Nama Paket") 
    } else { 
  
        $.ajax({  datatype: "json",data:{
              id_paket                   : $("#id_paket").val(),
              nm_pkt                     : $("#nm_pkt").val(),
              poli_lab                   : $("#poli_lab").val(),
              poli_rad                   : $("#poli_rad").val(),
              combo_poli6                : $("#combo_poli6 option:selected").text(),
              combo_poli7                : $("#combo_poli7 option:selected" ).text(),
              combo_pkt_laboratorium     : $("#combo_pkt_laboratorium option:selected" ).val(),
              combo_periksa_lab          : $("#combo_periksa_lab option:selected").text(),
              hrg_pkt_lab                : $("#hrg_pkt_lab").val(),
              combo_pkt_radiologi        : $("#combo_pkt_radiologi option:selected").val(),
              combo_periksa_radiologi    : $("#combo_periksa_radiologi option:selected").text(),
              hrg_pkt_rad                : $("#hrg_pkt_rad").val(),
              combo_poli8                : $("#combo_poli8 option:selected").text(),
              tindakan_poli              : $("#tindakan_poli option:selected").text(),
              hrg_pkt_poli               : $("#hrg_pkt_poli").val()},
              url                        : "../simpan_daftarpkt/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); $("#id_paket").val(dt);
      }, error: function(){alert('Error Nih !!! ');} 
    });  list_hrg_paket_detail2();
         nm_pkt : $("#nm_pkt").prop('disabled',true);
         combo_pkt_laboratorium     : $("#combo_pkt_laboratorium option:selected" ).val("BETHANY");
         hrg_pkt_lab                : $("#hrg_pkt_lab").val("");
         combo_pkt_radiologi        : $("#combo_pkt_radiologi option:selected").val("template_2");
         hrg_pkt_rad                : $("#hrg_pkt_rad").val("");
         hrg_pkt_poli               : $("#hrg_pkt_poli").val("");
   }
  });

  $("#hapus_daftar_paket").click(function() { 
  if (confirm("Anda yakin akan menghapus PAKET : " + dtrec[2] ) == true) {  
        $.ajax({  datatype: "json",data:{
              id_paket            : dtrec[1]},
              url                 : "../hapus_paket/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);alert("Harga paket telah dihapus"); 
      }, error: function(){alert('Error Nih !!! ');}    
    });   tarif_paket();
    }
  });

  $("#btl_daftar_paket").click(function() { 
    nm_pkt : $("#nm_pkt").prop('disabled',false);
    nm_pkt     : $("#nm_pkt" ).val("");
    list_hrg_paket_detail2('Yes');
  });



  $("#refresh_daftar_paket").click(function() { 
    tarif_paket();
   });

$('#list_tindakan').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
        
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
    
    $('#list_tindakan').click(function() {   
    dtrec = $('#list_tindakan').DataTable().row('.selected').data();
    $("#nama_layanan").val(dtrec[1]);
    //$( "#tab_1" ).prop("class",true); 
    });

  $("#tbl_car_paket").click(function() { 

    list_paket();
   });

  function list_paket(){
        $('#list_paket').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../layanan_detail/", // json datasource
          type: "POST",  // method  , by default get
          data:{combo_nama_paket : $("#combo_nama_paket option:selected").val()},
          error: function(){  // error handling
            $(".list_paket-error").html("");
            $("#list_paket").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_paket").css("display","none");
                  
          }
        }
      });  
      }

   $("#simpan_tindakan").click(function() { 
  
        $.ajax({  datatype: "json",data:{
              nama_layanan  : $("#nama_layanan").val(),
              txt_informasi : $("#txt_informasi").val()},
              url           : "../tambah_tindakan/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Informasi dari : " + dtrec[1] +" telah berhasil ditambahkan"); 
      }, error: function(){alert('Error Nih !!! ');}    
    });  list_paket();
         nama_layanan  : $("#nama_layanan").val("");
         txt_informasi : $("#txt_informasi").val("");
  });

   $("#rst_tindakan").click(function() { 
         nama_layanan  : $("#nama_layanan").val("");
         txt_informasi : $("#txt_informasi").val("");
  });

   $('#list_paket').click(function() {   
    dtrec = $('#list_paket').DataTable().row('.selected').data();
    //$( "#tab_1" ).prop("class",true); 
    });

    $("#hps_tindakan").click(function() { 
        if (confirm("Anda yakin akan menghapus Informasi Text tersebut ?") == true) { 
        $.ajax({  datatype: "json",data:{
              nama_layanan  : dtrec[1],
              inc           : dtrec[3]},
              url           : "../hapus_tindakan/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);  
      }, error: function(){alert('Error Nih !!! ');}    
    });  list_paket();

      }
  });

    var  cari_bidang = {
        placeholder: "Cari Bidang...",
        minimumInputLength: 1,
         ajax: {  
        url: "../cari_bidang/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
  $("#combo_bidang").select2(cari_bidang);

   $("#tbl_car_bid_lab").click(function() { 

    list_bidang();
   });

  

  list_bidang();

  function list_bidang(){
        $('#list_bid_lab').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_bidang/", // json datasource
          type: "POST",  // method  , by default get
          data:{combo_bidang : $("#combo_bidang option:selected").val() },
          error: function(){  // error handling
            $(".list_bid_lab-error").html("");
            $("#list_bid_lab").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_bid_lab").css("display","none");
                  
          }
        }
      });  
      }

  $('#list_bid_lab').click(function() {   
    dtrec = $('#list_bid_lab').DataTable().row('.selected').data();
    //$( "#tab_1" ).prop("class",true); 
    });

   $("#tbl_save_trf").click(function() { 
        
        $.ajax({  datatype: "json",data:{
              copy_trf_lab    : $("#copy_trf_lab").val(),
              set_tarif       : $("#set_tarif").val(),
              id_layanan      : dtrec[1],
              bidang          : dtrec[2]
            },
              url             : "../update_lab_all/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Data Berhasil disimpan")
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_bidang();
        set_tarif       : $("#set_tarif").val("");
        copy_trf_lab    : $("#copy_trf_lab").val("BETHANY");

      
  });

  $("#cek_aktf_fitur").click(function() {  
     if ($( "#cek_aktf_fitur" ).prop( "checked"))  { 
      $( "#copy_trf_lab1" ).prop( "disabled", false );
      $( "#copy_trf_lab2" ).prop( "disabled", false );
      $( "#naik_harga" ).prop( "disabled", false );
      $( "#tbl_cpy_harga" ).prop( "disabled", false );
    }else{
      $( "#copy_trf_lab1" ).prop( "disabled", true );
      $( "#copy_trf_lab2" ).prop( "disabled", true );
      $( "#naik_harga" ).prop( "disabled", true );
      $( "#tbl_cpy_harga" ).prop( "disabled", true );
    }
    });

  $("#tbl_cpy_harga").click(function() { 

    if (confirm("Apakah anda yakin akan mengcopy tarif  " + $("#copy_trf_lab1").val() + " ke dalam tarif " +  $("#copy_trf_lab2").val() + " ?") == true) {      
        $.ajax({  datatype: "json",data:{
              bethany              : dtrec[4],
              hemodialisa          : dtrec[5],
              karyawan             : dtrec[6],
              umum                 : dtrec[7],
              copy_trf_lab1        : $("#copy_trf_lab1").val(),
              copy_trf_lab2        : $("#copy_trf_lab2").val(),
              naik_harga           : $("#naik_harga").val(),
              id_layanan           : dtrec[1]},
              url             : "../update_naik_hargaall/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Proses copy tarif selesai")
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_bidang();
        $("#copy_trf_lab1").val("BETHANY");
        $("#copy_trf_lab2").val("BETHANY");
        $("#naik_harga").val("");
       
      }
      
  });

  list_bidang_rad();

  $('#list_bid_rad').click(function() {   
    dtrec = $('#list_bid_rad').DataTable().row('.selected').data();
    //$( "#tab_1" ).prop("class",true); 
    });

   function list_bidang_rad(){
        $('#list_bid_rad').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_bid_rad/", // json datasource
          type: "POST",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_bid_rad-error").html("");
            $("#list_bid_rad").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_bid_rad").css("display","none");
                  
          }
        }
      });  
      }

    $("#tbh_periksa").click(function() { 

        $.ajax({  datatype: "json",data:{
              text_tbh_periksa     : $("#text_tbh_periksa").val()},
              url             : "../tambah_periksa_rad/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_bidang_rad();
        $("#text_tbh_periksa").val("");
      
  });

    $("#hps_periksa").click(function() { 

    if (confirm("Yakin akan menghapus pemeriksaan :  " + dtrec[1] + " ?") == true) {      
        $.ajax({  datatype: "json",data:{
              nama           : dtrec[1]},
              url             : "../hapus_periksa_rad/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);
      }, error: function(){alert('Error Nih !!! ');}    
    });   list_bidang_rad();
      }
      
  });


  $("#tbh_kelompok").click(function() { 

       
        $.ajax({  datatype: "json",data:{
              text_tbh_tarif     : $("#text_tbh_tarif").val()},
              url             : "../tambah_kel_rad/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_bidang_rad();
        $("#text_tbh_tarif").val("");
      
  });

  $("#hps_kelompok").click(function() { 

       
        $.ajax({  datatype: "json",data:{
              text_tbh_tarif     : $("#text_tbh_tarif").val()},
              url             : "../tambah_kel_rad/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_bidang_rad();
      
  });

    $("#tbl_save_rad").click(function() { 
        
        $.ajax({  datatype: "json",data:{
              tarif_rad       : $("#tarif_rad").val(),
              set_tarif_rad   : $("#set_tarif_rad").val(),
              nama            : dtrec[1]},
              url             : "../update_rad_all/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Data Berhasil disimpan")
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_bidang_rad();
        set_tarif_rad       : $("#set_tarif_rad").val("");
        tarif_rad           : $("#tarif_rad").val("BETHANY");
  });

list_nm_pricing();

  $("#combo_pricing").select2();

   function list_nm_pricing(){
        $('#list_nm_pricing').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_nm_pricing/", // json datasource
          type: "POST",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_nm_pricing-error").html("");
            $("#list_nm_pricing").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_nm_pricing").css("display","none");
                  
          }
        }
      });  
      }

    $('#list_nm_pricing').click(function() {   
    dtrec = $('#list_nm_pricing').DataTable().row('.selected').data();
    nm_pntrf        : $("#nm_pntrf").val(dtrec[1]);
    //$( "#tab_1" ).prop("class",true); 
    });

       $("#refresh_pricing").click(function() { 
        list_nm_pricing();
        
      });

       $("#tbh_pricing").click(function() { 
        
        $.ajax({  datatype: "json",data:{
              nm_pntrf        : $("#nm_pntrf").val()},
              url             : "../tbh_nama_pricing/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_nm_pricing();
        nm_pntrf       : $("#nm_pntrf").val("");
       
  });

    $("#hapus_pricing").click(function() { 
          if (confirm("Anda yakin akan menghapus " + dtrec[1] + " ?") == true) {    
        
        $.ajax({  datatype: "json",data:{
              nama_pricing        : dtrec[1]},
              url                 : "../hapus_nama_pricing/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_nm_pricing();
        nm_pntrf       : $("#nm_pntrf").val("");
       
      }
       
  });

     $("#koreksi_pricing").click(function() { 
          if (confirm("Anda yakin akan mengubah nama " + dtrec[1] + " menjadi " + $("#nm_pntrf").val() + " ?" ) == true) {    
        
        $.ajax({  datatype: "json",data:{
               nama_pricing        : dtrec[1],
               nm_pntrf        : $("#nm_pntrf").val()},
              url                 : "../update_nama_pricing/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_nm_pricing();
        nm_pntrf       : $("#nm_pntrf").val("");
      } 
  });

      $('#list_base_pricing').click(function() {   
    dtrec = $('#list_base_pricing').DataTable().row('.selected').data();
   
    //$( "#tab_1" ).prop("class",true); 
    });

      $("#tbl_car_pricing").click(function() { 
        list_base_pricing();
        
      });


      function list_base_pricing(){
        $('#list_base_pricing').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_base_pricing/", // json datasource
          type: "POST",  // method  , by default get
          data:{ combo_pricing        : $("#combo_pricing").val()},
          error: function(){  // error handling
            $(".list_base_pricing-error").html("");
            $("#list_base_pricing").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_base_pricing").css("display","none");
                  
          }
        }
      });  
      }


       $("#set_pricing").click(function() { 
        
        $.ajax({  datatype: "json",data:{
              nm_pntrf2       : $("#nm_pntrf2").val(),
              combo_pricing   : $("#combo_pricing").val(),
              icd             : dtrec[1]},
              url             : "../tbh_set_pricing/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_base_pricing();
        nm_pntrf       : $("#nm_pntrf2").val("");
       
     });


      


    

















       

       

     

   


      

   

});

</script>
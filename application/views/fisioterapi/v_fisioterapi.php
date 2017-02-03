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
       Fisioterapi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Fisioterapi</a></li>
        <li class="active">Fisioterapi</li>
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
                  <h3 class="box-title">Fisioterapi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">

                    <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">No Rm</label>
                      <div class="col-sm-10" style="width : 15%;">
                        <input type="text" class="form-control" id="id_pasien">
                      </div>
                      <div class="input-group-btn">
                        <button type="button" id="cari_pas" class="btn btn-danger"><i class="fa fa-fw fa-refresh"></i>Ok</button>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">Nama</label>
                      <div class="col-sm-10" style="width : 45%;">
                        <input type="text" class="form-control" id="nama" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">Alamat</label>
                      <div class="col-sm-10" style="width : 45%;">
                        <textarea class="form-control" rows="3" id="alamat" disabled="false"></textarea>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">Sex/Umur</label>
                      <div class="col-sm-10" style="width:20%;">
                        <input type="text" class="form-control" id="sex" disabled="false">
                      </div>
                      <div class="col-sm-10" style="width:10%;">
                        <input type="text" class="form-control" id="umur" disabled="false" style="margin-left:-25px">
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label" style="margin-left:-50px">Thn(Bln)</label>
                    </div>

                   <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">Jenis</label>
                      <div class="col-sm-10" style="width : 45%;">
                        <input type="text" class="form-control" id="jenis" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 25px;">
                      <label for="inputPassword3" class="col-sm-1 control-label">R.Inap/R.Jalan</label>
                      <div class="col-sm-10" style="margin-left:40px;width:15%;">
                        <select class="form-control" id="inap_jalan">
                            <option selected="selected">RAWAT JALAN</option>
                            <option>RAWAT INAP</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 25px;margin-left:50px;">
                      <button type="button" class="btn btn-primary" id="tbl_dftr" disabled="false">Daftar</button>
                      <button type="button" class="btn btn-danger" id="tbl_btl" disabled="false">Batal</button>
                    </div>

                    <div class="form-group" style="margin-bottom: 25px;margin-left: -30px;">
                      <label for="inputEmail3" class="col-sm-2 control-label"><input type="checkbox" id="cek_ctkstruk">
                      Cetak Struk Antrian</label>
                    </div><hr>

                     <div class="form-group" style="margin-bottom: 15px;margin-left: -115px;">
                      <label for="inputPassword3" class="col-sm-3 control-label">Daftar Pasien di Fisioterapi</label>
                      <div class="col-sm-10" style="margin-left:-20px;width:25%;">
                        <select class="form-control" id="dftr_pas">
                            <option selected="selected">Px Registrasi hari ini</option>
                            <option>Px kemarin yang belum di entry</option>
                        </select>
                      </div>
                    </div>

                     <div class="box-body">
                            <table id="antrian_poli" class="table table-bordered table-hover display">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>No.RM</th>
                                  <th>Nama</th>
                                  <th>No.Reg</th>
                                  <th>Tanggal</th>
                                  <th>Jam</th>
                                  <th>Status</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                      </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="tbl_refresh" class="btn btn-default"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              </div><!-- nav-tabs-custom -->

              <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                      <div class="form-group" style="margin-bottom: 10px;">
                          <label for="inputEmail3" class="col-sm-1 control-label">No Reg</label>
                          <div class="col-sm-10" style="width : 15%;">
                            <input type="text" class="form-control" id="no_reg">
                          </div>
                          <div class="input-group-btn">
                            <button type="button" id="cari_pas2" class="btn btn-danger"><i class="fa fa-fw fa-refresh"></i>Ok</button>
                          </div>
                      </div>

                      <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">Pasien</label>
                          <div class="col-sm-10" style="width:15%;">
                            <input type="text" class="form-control" id="no_id" disabled="false">
                          </div>
                          <div class="col-sm-10" style="width:30%;">
                            <input type="text" class="form-control" id="nama2" disabled="false" style="margin-left:-25px;">
                          </div>
                      </div>

                      <div class="form-group" style="margin-bottom: 10px;margin-left: -32px;">
                          <div class="col-sm-10" style="width:42%;">
                             <textarea class="form-control" rows="3" id="alamat2" disabled="false" style="margin-left:108px;"></textarea>
                          </div>
                      </div>

                      <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputEmail3" class="col-sm-1 control-label">Jenis</label>
                          <div class="col-sm-10" style="width:42.5%;">
                            <input type="text" class="form-control" id="jenis2" disabled="false">
                          </div>
                      </div><hr>

                  <div class="row">
                    <div class="col-md-6">
                     <div class="form-group" style="margin-bottom: 10px;margin-left: -30px;">
                          <label for="inputPassword3" class="col-sm-3 control-label">Jenis Terapi</label>
                          <div class="col-sm-10" style="width:55%;">
                            <select class="form-control" id="jns_terapi" disabled="false">
                                <option selected="selected">Exercise Therapy</option>
                                <option>Heating Therapy</option>
                                <option>Chest Phsyiotherapy</option>
                                <option>Orthopedhic & Rheumathoid Arthritis</option>
                                <option>Electrical Stimulation Therapy</option>
                                <option>Hydro Therapy</option>
                                <option>Cold Therapy</option>
                            </select>
                          </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputEmail3" class="col-sm-2 control-label">Mulai</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                                <input type="text" class="form-control"  style="width:25%;" id="tgl_mulai" disabled="false" data-inputmask="'alias': 'yyyy/mm/dd'"   data-mask />
                           
                            <div class="input-group">
                              <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                              </div>
                               <input type="text" id="jam_mulai" class="form-control" disabled="false" style="width:60%" placeholder="hh:ii:ss">
                            </div><!-- /.input group -->
                          
                          </div><!-- /.input group -->
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                     <div class="form-group" style="margin-bottom: 10px;margin-left: -30px;">
                          <label for="inputPassword3" class="col-sm-3 control-label">Nama Terapi</label>
                          <div class="col-sm-10" style="width:55%;">
                               <input type="text" class="form-control" id="nama_terapi">
                          </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputEmail3" class="col-sm-2 control-label">Selesai</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                                <input type="text" class="form-control"  style="width:25%;" id="tgl_selesai" disabled="false" data-inputmask="'alias': 'yyyy/mm/dd'"   data-mask /> 
                            
                              <div class="input-group">
                                <div class="input-group-addon">
                                  <i class="fa fa-clock-o"></i>
                                </div>
                                <input type="text" id="jam_selesai" class="form-control" disabled="false" style="width:60%" placeholder="hh:ii:ss">
                              </div>
                          </div><!-- /.input group -->
                      </div>
                    </div>
                  </div>
                      <div class="form-group" style="margin-bottom: 10px;margin-left:-85px;">
                          <label for="inputPassword3" class="col-sm-2 control-label">R.Jalan/Inap</label>
                          <div class="col-sm-10" style="width:15%;">
                            <select class="form-control" id="inap_jalan2" disabled="false">
                                <option selected="selected">Rawat Jalan</option>
                                <option>Rawat Inap</option>
                                <option>UGD/IGD</option>
                            </select>
                          </div>
                      </div>

                    <div class="col-md-6">
                      <div class="form-group" style="margin-bottom: 10px;margin-left: 10px;">
                        <label for="inputPassword3" class="col-sm-2 control-label">Dokter</label>
                        <div class="col-sm-10">
                          <select class="col-sm-2 form-control" id="nama_dokter" style="width:80%" disabled="false">
                            <option>==PILIH==</option>
                                    <?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
                                      <option ><?php echo $dt_namadokter['nama']; ?></option>
                                    <?php } ?>      
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group" style="margin-bottom: 10px;margin-left: 10px;">
                        <label for="inputPassword3" class="col-sm-2 control-label">Perawat</label>
                        <div class="col-sm-10">
                          <select class="col-sm-2 form-control" id="perawat" style="width:55%" disabled="false">
                            <option>==PILIH==</option>
                                    <?php foreach ($dt_nama_perawat as $dt_namaperawat) { ?>
                                      <option ><?php echo $dt_namaperawat['nama']; ?></option>
                                    <?php } ?>      
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -85px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Diagonsa</label>
                          <div class="col-sm-10" style="width:10%;">
                            <input type="text" class="form-control" id="kode_icd_utama" disabled="false">
                          </div>
                          <div class="col-sm-10" style="width:35%;">
                            <input type="text" class="form-control" id="nama_diagnosa" disabled="false" style="margin-left:-25px;">
                          </div>
                          <div class="input-group-btn">
                            <button type="button" id="cari_diagnosa" class="btn btn-primary" data-toggle="modal" data-target="#myModal" disabled="false"><i class="fa fa-fw fa-search"></i></button>
                          </div>
                    </div>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="width:800px">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Daftar ICD</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <table id="daftar_icd" class="table table-bordered table-hover display">
                                                            <thead>
                                                              <tr>
                                                                <th></th>
                                                               <th>ICD</th>
                                                                <th>Description ENG</th>
                                                                <th>Description INA</th>
                                                                <th>DTD</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php foreach ($dt_icds as $dt_icd) { ?>
                                                              <tr>
                                                                <td> </td>
                                                                <td><?php echo $dt_icd['ICD']; ?></td>
                                                                <td><?php echo $dt_icd['Deskripsi']; ?></td>
                                                                <td><?php echo $dt_icd['Deskripsi_ina']; ?></td>
                                                                <td><?php echo $dt_icd['DTD']; ?></td>
                                                              </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                          </table>                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                  <div class="row">
                   <div class="col-md-4">
                      <div class="form-group" style="margin-bottom: 10px;margin-left:-15px">
                        <label for="inputPassword3" class="col-sm-4 control-label">Vital Sign</label>
                        <label for="inputPassword3" class="col-sm-2 control-label">Sistole/Diastole</label>
                        <div class="col-sm-10" style="width:30%;margin-left:72px;">
                            <input type="text" class="form-control" id="sistole" disabled="false">
                        </div>
                      </div>
                    </div>

                     <div class="col-md-4">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left: 60px;">Suhu</label>
                        <div class="col-sm-10" style="width:30%;margin-left:-10px;">
                            <input type="text" class="form-control" id="suhu" disabled="false">
                        </div>
                        <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left:-25px;">Celcius</label>
                      </div>
                     </div>

                     <div class="col-md-4">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputPassword3" class="col-sm-4 control-label">Berat Badan</label>
                        <div class="col-sm-10" style="width:30%;margin-left:-10px;">
                            <input type="text" class="form-control" id="berat_badan" disabled="false">
                        </div>
                        <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left:-25px;">Kilogram</label>
                      </div>
                     </div>
                  </div>

                   <div class="row">
                   <div class="col-md-4">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputPassword3" class="col-sm-6 control-label" style="margin-left:72px;">Respiratory Rate</label>
                        <div class="col-sm-10" style="width:30%;">
                            <input type="text" class="form-control" id="respiratory_rate" disabled="false">
                        </div>
                      </div>
                    </div>

                     <div class="col-md-4">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left: 60px;">Nadi</label>
                        <div class="col-sm-10" style="width:30%;margin-left:-10px;">
                            <input type="text" class="form-control" id="nadi" disabled="false">
                        </div>
                      </div>
                     </div>

                     <div class="col-md-4">
                      <div class="form-group" style="margin-bottom: 10px;">
                        <label for="inputPassword3" class="col-sm-4 control-label">Tinggi Badan</label>
                        <div class="col-sm-10" style="width:30%;margin-left:-10px;">
                            <input type="text" class="form-control" id="tinggi_badan" disabled="false">
                        </div>
                        <label for="inputPassword3" class="col-sm-2 control-label" style="margin-left:-25px;">Centimeter</label>
                      </div>
                     </div>
                  </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -85px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Anamnesa</label>
                      <div class="col-sm-10" style="width : 45%;">
                        <textarea class="form-control" rows="3" id="anamnesa"></textarea>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -85px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Pemerik Fisik</label>
                      <div class="col-sm-10" style="width : 45%;">
                        <textarea class="form-control" rows="3" id="pemeriksaan"></textarea>
                      </div>
                    </div>

                     <div class="form-group" style="margin-bottom: 10px;margin-left: -85px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Keadaan Umum</label>
                          <div class="col-sm-10" style="width:22%;">
                            <input type="text" class="form-control" id="keadaan_umum" disabled="false">
                          </div>
                      <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-100px">Kesadaran</label>
                         <div class="col-sm-10" style="width:15%;">
                            <select class="form-control" id="kesadaran">
                             <?php foreach ($dt_kesadarans as $dt_kesadaran) { ?>
                              <option value ="<?php echo $dt_kesadaran['id_kesadaran']; ?>" ><?php echo $dt_kesadaran['keterangan']; ?></option>
                             <?php } ?>  
                            </select>
                          </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -85px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Remark</label>
                      <div class="col-sm-10" style="width : 45%;">
                        <textarea class="form-control" rows="3" id="terapi"></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="simpan_exit" class="btn btn-primary" disabled="false"><i class="fa fa-fw fa-save"></i>Simpan & Keluarkan Pasien</button>
                    <button type="button" id="simpan_sementara" class="btn btn-primary" disabled="false"><i class="fa fa-fw fa-save"></i>Simpan Sementara</button>
                    <button type="button" id="batal" class="btn btn-danger" disabled="false"><i class="fa fa-fw fa-times"></i>Batal</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
              </div><!-- nav-tabs-custom -->




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


      $("#cari_pas").click(function() {
      Enable();
      });

      antrianpoli();

      function Enable(){
        $( "#tbl_dftr" ).prop( "disabled", false );
        $( "#tbl_btl" ).prop( "disabled", false );  
       }

       $("#tbl_btl").click(function() {
        ClearData();  
        });
     
       function ClearData(){ 
       $( "#id_pasien" ).val("");       
       $( "#nama" ).val("");
       $( "#alamat" ).val("");
       $( "#sex" ).val("");
       $( "#umur" ).val("");
       $( "#jenis" ).val("");
       $( "#tbl_dftr" ).prop( "disabled", true );
       $( "#tbl_btl" ).prop( "disabled", true );
       }

       function ClearData2(){
           $("#no_reg").val("");
           $( "#no_id" ).val("");  
           $( "#nama2" ).val("");  
           $( "#alamat2" ).val("");  
           $( "#jenis2" ).val("");  
           $( "#jns_terapi" ).val("Exercise Therapy"); 
           $( "#nama_terapi" ).val("");  
           $( "#tgl_mulai" ).val("");  
           $( "#tgl_selesai" ).val(""); 
           $( "#inap_jalan2" ).val("Rawat Jalan"); 
           $( "#nama_dokter" ).val("==PILIH=="); 
           $( "#perawat" ).val("==PILIH==");
           $( "#kode_icd_utama" ).val("");  
           $( "#nama_diagnosa" ).val("");  
           $( "#sistole" ).val("");  
           $( "#suhu" ).val("");  
           $( "#nadi" ).val(""); 
           $( "#berat_badan" ).val(""); 
           $( "#tinggi_badan" ).val(""); 
           $( "#respiratory_rate" ).val(""); 
           $( "#anamnesa" ).val(""); 
           $( "#pemeriksaan" ).val(""); 
           $( "#keadaan_umum" ).val(""); 
           $( "#kesadaran" ).val("Compos Mentis"); 
           $( "#terapi" ).val("Compos Mentis"); 
       }

      $("#cari_pas2").click(function() { 
       if ($( "#cari_pas2" ).prop( "disabled", true)) {
        $( "#no_reg" ).prop( "disabled", true );
        $( "#jns_terapi" ).prop( "disabled", false );
        $( "#tgl_mulai" ).prop( "disabled", false );
        $( "#jam_mulai" ).prop( "disabled", false );
        $( "#tgl_selesai" ).prop( "disabled", false );
        $( "#jam_selesai" ).prop( "disabled", false );
        $( "#inap_jalan2" ).prop( "disabled", false );
        $( "#nama_dokter" ).prop( "disabled", false );
        $( "#perawat" ).prop( "disabled", false );
        $( "#kode_icd_utama" ).prop( "disabled", false );
        $( "#nama_diagnosa" ).prop( "disabled", false );
        $( "#sistole" ).prop( "disabled", false );
        $( "#suhu" ).prop( "disabled", false );
        $( "#nadi" ).prop( "disabled", false );
        $( "#berat_badan" ).prop( "disabled", false );
        $( "#tinggi_badan" ).prop( "disabled", false );
        $( "#respiratory_rate" ).prop( "disabled", false );
        $( "#keadaan_umum" ).prop( "disabled", false );
        $( "#simpan_exit" ).prop( "disabled", false );
        $( "#simpan_sementara" ).prop( "disabled", false );
        $( "#batal" ).prop( "disabled", false );
        $( "#cari_diagnosa" ).prop( "disabled", false );
      }else{
        $( "#no_reg" ).prop( "disabled", false );
        $( "#jns_terapi" ).prop( "disabled", true );
        $( "#tgl_mulai" ).prop( "disabled", true );
        $( "#jam_mulai" ).prop( "disabled", true );
        $( "#tgl_selesai" ).prop( "disabled", true );
        $( "#jam_selesai" ).prop( "disabled", true );
        $( "#inap_jalan2" ).prop( "disabled", true );
        $( "#nama_dokter" ).prop( "disabled", true );
        $( "#perawat" ).prop( "disabled", true );
        $( "#kode_icd_utama" ).prop( "disabled", true );
        $( "#nama_diagnosa" ).prop( "disabled", true );
        $( "#sistole" ).prop( "disabled", true );
        $( "#suhu" ).prop( "disabled", true );
        $( "#nadi" ).prop( "disabled", true );
        $( "#berat_badan" ).prop( "disabled", true );
        $( "#tinggi_badan" ).prop( "disabled", true );
        $( "#respiratory_rate" ).prop( "disabled", true );
        $( "#keadaan_umum" ).prop( "disabled", true );
        $( "#simpan_exit" ).prop( "disabled", true );
        $( "#simpan_sementara" ).prop( "disabled", true );
        $( "#batal" ).prop( "disabled", true );
        $( "#cari_diagnosa" ).prop( "disabled", true );
      }   
      });


       $("#batal").click(function() { 

        $( "#cari_pas2" ).prop( "disabled", false );
        $( "#no_reg" ).prop( "disabled", false );
        $( "#jns_terapi" ).prop( "disabled", true );
        $( "#tgl_mulai" ).prop( "disabled", true );
        $( "#jam_mulai" ).prop( "disabled", true );
        $( "#tgl_selesai" ).prop( "disabled", true );
        $( "#jam_selesai" ).prop( "disabled", true );
        $( "#inap_jalan2" ).prop( "disabled", true );
        $( "#nama_dokter" ).prop( "disabled", true );
        $( "#perawat" ).prop( "disabled", true );
        $( "#kode_icd_utama" ).prop( "disabled", true );
        $( "#nama_diagnosa" ).prop( "disabled", true );
        $( "#sistole" ).prop( "disabled", true );
        $( "#suhu" ).prop( "disabled", true );
        $( "#nadi" ).prop( "disabled", true );
        $( "#berat_badan" ).prop( "disabled", true );
        $( "#tinggi_badan" ).prop( "disabled", true );
        $( "#respiratory_rate" ).prop( "disabled", true );
        $( "#keadaan_umum" ).prop( "disabled", true );
        $( "#simpan_exit" ).prop( "disabled", true );
        $( "#simpan_sementara" ).prop( "disabled", true );
        $( "#batal" ).prop( "disabled", true );
        $( "#cari_diagnosa" ).prop( "disabled", true );
        ClearData2();
      });



      $("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
      $("[data-mask]").inputmask();

     
      $("#tbl_refresh").click(function() { 
        antrianpoli();
      });

      $("#cari_pas").click(function() {
         $.ajax({  datatype: "json",data:{id_pasien:$('#id_pasien').val()},
          url: "../get_pas/",async: false,
          type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $('#nama').val(dt[0].nama); $('#alamat').val(dt[0].alamat);$('#sex').val(dt[0].sex);$('#umur').val(dt[0].thn); $('#jenis').val(dt[0].jenis); }else{ alert('Masukkan No RM Pasien' );}
          }, error: function(){alert('Error Nih !!! ');}    
        });
      });

       $("#tbl_dftr").click(function() {
      
        $.ajax({  datatype        : "json",data: {
                  id_pasien       :$('#id_pasien').val(),
                  inap_jalan      :$('#inap_jalan').val()},
                  url             : "../daftar_fisioterapi/",
                  async           : false, 
                  type            :'POST',
                  success: function(data){ if (data=='Oke') { alert('Pendaftaran Pasien Telah Sukses');}  
                }, error: function() {alert('Error Nih !!! ');}    
        });antrianpoli();
            ClearData();  
        $( "#tbl_dftr" ).prop( "disabled", true );        
      });
   
      function antrianpoli(){
        $('#antrian_poli').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,searchable:true,paging:true,pagelength:10,
        "ajax":{
          url :"../antrian_fisioterapi/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".antrian_poli-error").html("");
            $("#antrian_poli").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#antrian_poli").css("display","none");
                  
          }
        }
      });  
      }

       $('#antrian_poli').click(function() {  
      dtrec = $('#antrian_poli').DataTable().row('.selected').data();
      $("#no_reg").val(dtrec[3]);
      });


      $('#daftar_icd').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
          
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

       $('#daftar_icd').click(function(){
        dtrec = $('#daftar_icd').DataTable().row('.selected').data(); 
         $("#kode_icd_utama").val(dtrec[1]);
         $("#nama_diagnosa").val(dtrec[2]);
      });

     
      $("#cari_pas2").click(function() {
         $.ajax({  datatype: "json",data:{no_reg:$('#no_reg').val()},
          url: "../get_pas2/",async: false,
          type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $('#no_id').val(dt[0].id); $('#nama2').val(dt[0].nama); $('#alamat2').val(dt[0].alamat); $('#jenis2').val(dt[0].jenis); }else{ alert('Masukkan No Reg Fisioterapi, ulangi ' );}
          }, error: function(){alert('Error Nih !!! ');}    
        });
      });
  


       $("#simpan_exit").click(function() {
      
        $.ajax({  datatype            : "json",data: {
                  no_reg              :$('#no_reg').val(),
                  no_id               :$('#no_id').val(),
                  nama_dokter         :$('#nama_dokter').val(),
                  inap_jalan2         :$('#inap_jalan2').val(),
                  sistole             :$('#sistole').val(),
                  suhu                :$('#suhu').val(),
                  berat_badan         :$('#berat_badan').val(),
                  respiratory_rate    :$('#respiratory_rate').val(),
                  nadi                :$('#nadi').val(),
                  tinggi_badan        :$('#tinggi_badan').val(),
                  pemeriksaan         :$('#pemeriksaan').val(),
                  terapi              :$('#terapi').val(),
                  kode_icd_utama      :$('#kode_icd_utama').val(),
                  anamnesa            :$('#anamnesa').val(),
                  keadaan_umum        :$('#keadaan_umum').val(),
                  kesadaran           :$('#kesadaran').val(),
                  jns_terapi          :$('#jns_terapi').val(),
                  nama_terapi         :$('#nama_terapi').val(),
                  perawat             :$('#perawat').val(),
                  tgl_mulai           :$('#tgl_mulai').val(),
                  tgl_selesai         :$('#tgl_selesai').val(),
                  jam_mulai           :$('#jam_mulai').val(),
                  jam_selesai         :$('#jam_selesai').val()},
                  url                 : "../simpan_medical_record/",
                  async               : false, 
                  type                :'POST',
                  success: function(data){ if (data=='Oke') { alert('Data telah berhasil disimpan dan pasien keluar dari Fisioterapi');}  
                }, error: function() {alert('Error Nih !!! ');}    
        });
                $( "#no_reg" ).prop( "disabled", false );
                $( "#jns_terapi" ).prop( "disabled", true );
                $( "#tgl_mulai" ).prop( "disabled", true );
                $( "#jam_mulai" ).prop( "disabled", true );
                $( "#tgl_selesai" ).prop( "disabled", true );
                $( "#jam_selesai" ).prop( "disabled", true );
                $( "#inap_jalan2" ).prop( "disabled", true );
                $( "#nama_dokter" ).prop( "disabled", true );
                $( "#perawat" ).prop( "disabled", true );
                $( "#kode_icd_utama" ).prop( "disabled", true );
                $( "#nama_diagnosa" ).prop( "disabled", true );
                $( "#sistole" ).prop( "disabled", true );
                $( "#suhu" ).prop( "disabled", true );
                $( "#nadi" ).prop( "disabled", true );
                $( "#berat_badan" ).prop( "disabled", true );
                $( "#tinggi_badan" ).prop( "disabled", true );
                $( "#respiratory_rate" ).prop( "disabled", true );
                $( "#keadaan_umum" ).prop( "disabled", true );
                $( "#simpan_exit" ).prop( "disabled", true );
                $( "#simpan_sementara" ).prop( "disabled", true );
                $( "#batal" ).prop( "disabled", true );
                $( "#cari_diagnosa" ).prop( "disabled", true );
                $( "#cari_pas2" ).prop( "disabled", false );
                ClearData2();
                antrianpoli();
        $( "#simpan_exit" ).prop( "disabled", true );        
      });

      $("#simpan_sementara").click(function() {
      
        $.ajax({  datatype            : "json",data: {
                  no_reg              :$('#no_reg').val(),
                  no_id               :$('#no_id').val(),
                  nama_dokter         :$('#nama_dokter').val(),
                  inap_jalan2         :$('#inap_jalan2').val(),
                  sistole             :$('#sistole').val(),
                  suhu                :$('#suhu').val(),
                  berat_badan         :$('#berat_badan').val(),
                  respiratory_rate    :$('#respiratory_rate').val(),
                  nadi                :$('#nadi').val(),
                  tinggi_badan        :$('#tinggi_badan').val(),
                  pemeriksaan         :$('#pemeriksaan').val(),
                  terapi              :$('#terapi').val(),
                  kode_icd_utama      :$('#kode_icd_utama').val(),
                  anamnesa            :$('#anamnesa').val(),
                  keadaan_umum        :$('#keadaan_umum').val(),
                  kesadaran           :$('#kesadaran').val(),
                  jns_terapi          :$('#jns_terapi').val(),
                  nama_terapi         :$('#nama_terapi').val(),
                  perawat             :$('#perawat').val(),
                  tgl_mulai           :$('#tgl_mulai').val(),
                  tgl_selesai         :$('#tgl_selesai').val(),
                  jam_mulai           :$('#jam_mulai').text(),
                  jam_selesai         :$('#jam_selesai').text()},
                  url                 : "../simpan_sementara/",
                  async               : false, 
                  type                :'POST',
                  success: function(data){ if (data=='Oke') { alert('Data telah berhasil disimpan dan dapat di-load kembali');}  
                }, error: function() {alert('Error Nih !!! ');}    
        });
                $( "#no_reg" ).prop( "disabled", false );
                $( "#jns_terapi" ).prop( "disabled", true );
                $( "#tgl_mulai" ).prop( "disabled", true );
                $( "#jam_mulai" ).prop( "disabled", true );
                $( "#tgl_selesai" ).prop( "disabled", true );
                $( "#jam_selesai" ).prop( "disabled", true );
                $( "#inap_jalan2" ).prop( "disabled", true );
                $( "#nama_dokter" ).prop( "disabled", true );
                $( "#perawat" ).prop( "disabled", true );
                $( "#kode_icd_utama" ).prop( "disabled", true );
                $( "#nama_diagnosa" ).prop( "disabled", true );
                $( "#sistole" ).prop( "disabled", true );
                $( "#suhu" ).prop( "disabled", true );
                $( "#nadi" ).prop( "disabled", true );
                $( "#berat_badan" ).prop( "disabled", true );
                $( "#tinggi_badan" ).prop( "disabled", true );
                $( "#respiratory_rate" ).prop( "disabled", true );
                $( "#keadaan_umum" ).prop( "disabled", true );
                $( "#simpan_exit" ).prop( "disabled", true );
                $( "#simpan_sementara" ).prop( "disabled", true );
                $( "#batal" ).prop( "disabled", true );
                $( "#cari_diagnosa" ).prop( "disabled", true );
                $( "#cari_pas2" ).prop( "disabled", false );
                ClearData2();
                antrianpoli();
                $( "#simpan_sementara" ).prop( "disabled", true );        
      });

      

      $("#nama_dokter ").select2();
      $("#perawat ").select2();

   

   

});

</script>
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
        <li class="active">Laporan SIA</li>
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
                  <h3 class="box-title">Laporan SIA</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                       <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Laporan BKK/BKM</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Rekap BKK/BKM</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Jurnal Umum</a></li>
                              <li><a href="#tab_4" data-toggle="tab">Trial Balance</a></li>
                              <li><a href="#tab_5" data-toggle="tab">Neraca & Rugi Laba</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                   <form class="form-horizontal">
                                      <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-7">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
                                                        <div class="col-sm-4" >
                                                            <div class="input-group">
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                  <input type="text" class="form-control" id="tgl_bkkbkm1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4" style="margin-left: -50px;" >
                                                            <div class="input-group" >
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                <input type="text" class="form-control" id="tgl_bkkbkm2" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%;"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -50px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_lap" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div>                                        
                                                </div>
                                              </div>
                                              <div class="col-sm-5" style="background-color:#9F9FFF;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Cetak</label>
                                                        <div class="col-sm-4" >
                                                             <select class="form-control" id="combo_cetak">
                                                                  <option selected="selected">Masuk</option>
                                                                  <option>Keluar</option>
                                                              </select>
                                                        </div>
                                                        <div class="input-group-btn">
                                                             <button type="button" id="tbl_ctk_lap" class="btn btn-default"><i class="fa fa-fw fa-print"></i>Cetak</button>
                                                        </div> 
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Cetak</label>
                                                        <div class="col-sm-5" >
                                                             <select class="form-control" id="combo_opsi">
                                                                  <option selected="selected">Tanda [COPY]</option>
                                                                  <option>Tanda Petik</option>
                                                                  <option>Tanpa Tanda</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-md-12">
                                                <div class="box-body">
                                                  <div class="form-group">
                                                  <div class="row">
                                                              <table id="list_penerima" class="table table-bordered table-hover display">
                                                                <thead>
                                                                  <tr>
                                                                    <th></th>
                                                                    <th>No.BKK</th>
                                                                    <th>Tgl/Jam</th>
                                                                    <th>Uraian</th>
                                                                    <th>Nilai</th>
                                                                    <th>Penerima</th>
                                                                    <th>Mengetahui</th>
                                                                    <th>Pembukuan</th>
                                                                    <th>User</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                              </table>
                                                    </div>
                                                  </div>                                 
                                                </div>
                                              </div>
                                              <div class="col-sm-12" style="background-color:#FF3737;margin-bottom:50px;height:50px">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;margin-left: -100px;font-size:20px;color:white;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Total :</label> 
                                                           <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-70px;" id="lbl_total_penerima">Rp 0</label>   
                                                    </div>
                                                  </div>                                          
                                                </div>
                                              </div>
                                             <div class="col-md-12">
                                                <div class="box-body">
                                                  <div class="form-group">
                                                  <div class="row">
                                                              <table id="list_penyetor" class="table table-bordered table-hover display">
                                                                <thead>
                                                                  <tr>
                                                                    <th></th>
                                                                    <th>No.BKK</th>
                                                                    <th>Tgl/Jam</th>
                                                                    <th>Uraian</th>
                                                                    <th>Nilai</th>
                                                                    <th>Penerima</th>
                                                                    <th>Mengetahui</th>
                                                                    <th>Pembukuan</th>
                                                                    <th>User</th>
                                                                  </tr>
                                                                </thead>
                                                                <tbody>
                                                                </tbody>
                                                              </table>
                                                    </div>
                                                  </div>                                 
                                                </div>
                                              </div>
                                              <div class="col-sm-12" style="background-color:#3737FF;margin-bottom:50px;height:50px">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;margin-left: -100px;font-size:20px;color:white;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Total :</label> 
                                                           <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-70px;" id="lbl_total_penyetor">Rp 0</label>   
                                                    </div>
                                                  </div>                                          
                                                </div>
                                              </div>
                                               <div class="col-sm-12" style="background-color:#7A7A7A;margin-bottom:50px;height:50px">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;margin-left: -100px;font-size:20px;color:white;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Saldo :</label> 
                                                           <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-70px;" id="lbl_saldo">Rp 0</label>   
                                                    </div>
                                                  </div>                                          
                                                </div>
                                              </div>
                                            </div>
                                      </div><!-- /.box-body -->
                                   </form>
                              </div><!-- /.tab-pane -->
  
                              <div class="tab-pane" id="tab_2">
                                    <form class="form-horizontal">
                                      <div class="box-body">
                                          <div class="row">
                                            <div class="col-sm-7">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
                                                        <div class="col-sm-4" >
                                                            <div class="input-group">
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                  <input type="text" class="form-control" id="tgl_rekap1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4" style="margin-left: -50px;" >
                                                            <div class="input-group" >
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                <input type="text" class="form-control" id="tgl_rekap2" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%;"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -50px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_rkp" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
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
                                                       <table id="list_lap_rekap" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>No Kas</th>
                                                              <th>Tanggal</th>
                                                              <th>Uraian</th>
                                                              <th>Kode Akun</th>
                                                              <th>Debit(Rp)</th>
                                                              <th>Credit(Rp)</th>
                                                              <th>Kepada/Dari</th>
                                                              <th>Pembukuan/User Entry</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                  </div>                                 
                                                </div>
                                              </div>
                                              <div class="col-md-4" style="background-color:#5A9B53;">
                                                  <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;color:white;">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Debit :</label>
                                                        <label for="inputEmail3" class="col-sm-2 control-label" id="lbl_total_debit">Rp </label>
                                                      </div>
                                                  </div>
                                              </div>
                                               <div class="col-md-4" style="background-color:#0098FF;margin-left:20px">
                                                  <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;color:white;">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Credit :</label>
                                                        <label for="inputEmail3" class="col-sm-2 control-label" id="lbl_total_credit">Rp </label>
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
                                            <div class="col-sm-7">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
                                                        <div class="col-sm-4" >
                                                            <div class="input-group">
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                  <input type="text" class="form-control" id="tgl_jurnal1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4" style="margin-left: -50px;" >
                                                            <div class="input-group" >
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                <input type="text" class="form-control" id="tgl_jurnal2" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%;"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -50px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_jrnl" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -10px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="hps_car_jrnl" class="btn btn-danger"><i class="fa fa-fw fa-times"></i>Jurnal</button>
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
                                                       <table id="list_lap_jurnal" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Tanggal</th>
                                                              <th>Kode Akun</th>
                                                              <th>Nama Akun</th>
                                                              <th>Debit(Rp)</th>
                                                              <th>Credit(Rp)</th>
                                                              <th>Remark</th>
                                                              <th>Uraian</th>
                                                              <th>User</th>
                                                              <th>ID Jurnal</th>
                                                              <th>Ref BKK/BKM</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                  </div>                                 
                                                </div>
                                              </div>
                                              <div class="col-md-4" style="background-color:#6F5345;">
                                                  <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;color:white;">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Debit :</label>
                                                        <label for="inputEmail3" class="col-sm-2 control-label" id="lbl_jrnl_debit">Rp </label>
                                                      </div>
                                                  </div>
                                              </div>
                                               <div class="col-md-4" style="background-color:#7D616F;margin-left:20px">
                                                  <div class="row">
                                                      <div class="form-group" style="margin-bottom: 10px;color:white;">
                                                        <label for="inputEmail3" class="col-sm-3 control-label">Credit :</label>
                                                        <label for="inputEmail3" class="col-sm-2 control-label" id="lbl_jrnl_credit">Rp </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div><!-- /.box-body -->
                                   </form>
                              </div><!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_4">
                                    <div class="row">
                                      <div class="col-sm-7">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
                                                        <div class="col-sm-4" >
                                                            <div class="input-group">
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                  <input type="text" class="form-control" id="tgl_trial1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4" style="margin-left: -50px;" >
                                                            <div class="input-group" >
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                <input type="text" class="form-control" id="tgl_trial2" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%;"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -50px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_trial" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div>                             
                                                </div>
                                              </div>
                                            </div>
                                      <div class="row">
                                          <div class="col-sm-12">
                                            <div class="box">
                                            <div class="box-header with-border">
                                              <h3 class="box-title"></h3>
                                            </div><!-- /.box-header --> 
                                            <div class="box-body">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <table id="list_trial_balance" class="table table-bordered table-hover display">
                                                    <thead>
                                                      <tr>
                                                        <th></th>
                                                        <th>Kode</th>
                                                        <th>Nama Akun</th>
                                                        <th>Debet Bln Lalu</th>
                                                        <th>Credit Bln Lalu</th>
                                                        <th>Mutasi Debet</th>
                                                        <th>Mutasi Credit</th>
                                                        <th>Saldo Debet</th>
                                                        <th>Saldo Credit</th>
                                                        <th>Saldo</th>
                                                        <th>Rekap</th>
                                                        <th>Level</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                  </table>
                                                  <!--<div id="lst_kiriman" style="display:none;"></div>
                                                  <div id="lst_stock" style="display:none;"></div>-->
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          </div>
                                           <div class="col-sm-12">
                                            <div class="box">
                                            <div class="box-header with-border">
                                              <h3 class="box-title"></h3>
                                            </div><!-- /.box-header --> 
                                            <div class="box-body">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <table id="list_trial_balance_detail" class="table table-bordered table-hover display">
                                                    <thead>
                                                      <tr>
                                                        <th></th>
                                                        <th>Tanggal</th>
                                                        <th>Kode Akun</th>
                                                        <th>Debet</th>
                                                        <th>Kredit</th>
                                                        <th>Remark</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          </div>
                                      </div>                        
                              </div><!-- /.tab-pane -->
                              <div class="tab-pane" id="tab_5">
                                    <div class="row">
                                      <div class="col-sm-7">
                                                <div class="box-body"> 
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Klasifikasi</label>
                                                        <div class="col-sm-3" >
                                                             <select class="form-control" id="combo_nrrl">
                                                                  <option selected="selected">NERACA</option>
                                                                  <option>RUGI LABA</option>
                                                              </select>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -10px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_nrrl" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div> 
                                                  </div>
                                                   <div class="box-body"> 
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Cut Off</label>
                                                        <div class="col-sm-4" >
                                                            <div class="input-group">
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                  <input type="text" class="form-control" id="tgl_nrrl" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%"   data-mask />
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>                             
                                                </div>
                                              </div>
                                            </div>
                                      <div class="row">
                                          <div class="col-sm-12">
                                            <div class="box">
                                            <div class="box-header with-border">
                                              <h3 class="box-title"></h3>
                                            </div><!-- /.box-header --> 
                                            <div class="box-body">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <table id="list_nr_rl" class="table table-bordered table-hover display">
                                                    <thead>
                                                      <tr>
                                                        <th></th>
                                                        <th>Kode</th>
                                                        <th>Nama Akun</th>
                                                        <th>Saldo Debet</th>
                                                        <th>Saldo Credit</th>
                                                        <th>Saldo</th>
                                                        <th>Rekap</th>
                                                        <th>Level</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                  </table>
                                                  <!--<div id="lst_kiriman" style="display:none;"></div>
                                                  <div id="lst_stock" style="display:none;"></div>-->
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          </div>
                                      </div>                        
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

   $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
   $("[data-mask]").inputmask();

    $("#tbl_car_lap").click(function() { 
    list_lap_penerima();
    list_lap_penyetor();

  });

    $('#list_penerima').click(function() {   
    dtrec = $('#list_penerima').DataTable().row('.selected').data();
    //$( "#tab_1" ).prop("class",true); 
    });


  function list_lap_penerima(){
        $('#list_penerima').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_lap_penerima/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_bkkbkm1      :$('#tgl_bkkbkm1').val(),
                tgl_bkkbkm2       :$('#tgl_bkkbkm2').val()},
          error: function(){  // error handling
            $(".list_penerima-error").html("");
            $("#list_penerima").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_penerima").css("display","none");
                  
          },dataSrc : function(json) { var dt =json.total_penerima; $("#lbl_total_penerima").text(dt);  return json.data; }
        }
      });  
      }

  function list_lap_penyetor(){
        $('#list_penyetor').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_lap_penyetor/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_bkkbkm1       :$('#tgl_bkkbkm1').val(),
                tgl_bkkbkm2       :$('#tgl_bkkbkm2').val()},
          error: function(){  // error handling
            $(".list_penyetor-error").html("");
            $("#list_penyetor").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_penyetor").css("display","none");
                  
          },dataSrc : function(json) { var dt =json.total_penyetor;  $("#lbl_total_penyetor").text(dt);   return json.data; }
        }
      });  
      }

  $("#tbl_car_rkp").click(function() { 
    rekap_lap_penyetor();
  });

  function rekap_lap_penyetor(){
        $('#list_lap_rekap').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../rekap_lap_penyetor/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_rekap1       :$('#tgl_rekap1').val(),
                tgl_rekap2       :$('#tgl_rekap2').val()},
          error: function(){  // error handling
            $(".list_lap_rekap-error").html("");
            $("#list_lap_rekap").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_lap_rekap").css("display","none");
                  
          },dataSrc : function(json) { var dt =json.total_credit; var dt2 =json.total_debet; $("#lbl_total_credit").text(dt); $("#lbl_total_debit").text(dt2);  return json.data; }
        }
      });  
      }

   $("#tbl_car_jrnl").click(function() { 
    list_lap_jurnal();
  });

    $('#list_lap_jurnal').click(function() {   
    dtrec = $('#list_lap_jurnal').DataTable().row('.selected').data();    
    });

   $("#hps_car_jrnl").click(function() {

   if (confirm("Anda yakin akan menghapus jurnal tersebut?") == true) {
      
        $.ajax({  datatype: "json",data:{ id_jurnal : dtrec[9]},
      url: "../hapus_lap_jurnal/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);
        alert('jurnal telah dihapus');
      }, error: function(){alert('Error Nih !!! ');}
    });     
    list_lap_jurnal();
    }  
  });



   function list_lap_jurnal(){
        $('#list_lap_jurnal').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_lap_jurnal/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_jurnal1       :$('#tgl_jurnal1').val(),
                tgl_jurnal2       :$('#tgl_jurnal2').val()},
          error: function(){  // error handling
            $(".list_lap_jurnal-error").html("");
            $("#list_lap_jurnal").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_lap_jurnal").css("display","none");
                  
          },dataSrc : function(json) { var dt =json.debet;  $("#lbl_jrnl_debit").text(dt); var dt2 =json.credit; $("#lbl_jrnl_credit").text(dt2); return json.data; }
            
        }
      });  
      }

       $("#tbl_car_trial").click(function() { 
        list_trial_balance();
      });

       function list_trial_balance(){
        $('#list_trial_balance').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_trial_balance/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_trial1       :$('#tgl_trial1').val(),
                tgl_trial2       :$('#tgl_trial2').val()},
          error: function(){  // error handling
            $(".list_trial_balance-error").html("");
            $("#list_trial_balance").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_trial_balance").css("display","none");
                  
          }
            
        }
      });  
      }

    $('#list_trial_balance').click(function() {   
    dtrec = $('#list_trial_balance').DataTable().row('.selected').data();  
     list_trial_balance_detail(dtrec[1]); 
    });

      function list_trial_balance_detail(){
        $('#list_trial_balance_detail').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_trial_balance_detail/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_trial1                        :$('#tgl_trial1').val(),
                tgl_trial2                      :$('#tgl_trial2').val(),
                kode_akun_kas_transaksi         : dtrec[1]},
          error: function(){  // error handling
            $(".list_trial_balance_detail-error").html("");
            $("#list_trial_balance_detail").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_trial_balance_detail").css("display","none");
                  
          }
            
        }
      });  
      }

       $("#tbl_car_nrrl").click(function() { 
        list_nr_rl();
      });

       function list_nr_rl(){
        $('#list_nr_rl').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,
        "ajax":{
          url :"../list_nr_rl/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_nrrl       :$('#tgl_nrrl').val(),
                combo_nrrl      :$('#combo_nrrl option:selected').val()},                     
          error: function(){  // error handling
            $(".list_nr_rl-error").html("");
            $("#list_nr_rl").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_nr_rl").css("display","none");
                  
          }
            
        }
      });  
      }


       

     

   


      

   

});

</script>
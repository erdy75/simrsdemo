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
        <li class="active">Master CIA</li>
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
                  <h3 class="box-title">Master CIA</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                       <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Chart Of Account</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Setup Kas & Bank Aktivitas</a></li>
                              <li><a href="#tab_3" data-toggle="tab">Pairing Table</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                   <form class="form-horizontal">
                                      <div class="box-body">
                                        <div class="col-md-5">
                                            <div class="row"> 
                                                <div class="form-group">
                                                    <label for="inputEmail3" style="margin-left:-30px;width:190px;margin-bottom:10px;" class="col-sm-1 control-label">Buat Kode Akun Baru :</label>
                                               </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                    <label for="inputEmail3" style="margin-left:-30px;width:120px;margin-bottom:10px;" class="col-sm-1 control-label">Posisi Akun</label>
                                                <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_posisiakun" id="r_neraca" class="flat-red"  value="NERACA" checked>NERACA</label>
                                                </div>
                                                 <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_posisiakun" id="r_rugilaba" class="flat-red" value="RUGI LABA">RUGI LABA</label>
                                                </div>        
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                    <label for="inputEmail3" style="margin-left:-30px;width:120px;margin-bottom:10px;" class="col-sm-1 control-label">Kategori</label>
                                                <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_kategori" id="r_rekap" class="flat-red" value="Ya">REKAP</label>
                                                </div>
                                                 <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_kategori" id="r_detail"  class="flat-red"  value="" checked>DETAIL</label>
                                                </div>        
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:-30px;width:120px;margin-bottom:10px;" class="col-sm-1 control-label">Kode Akun</label>
                                                <div class="col-lg-4" >
                                                      <input type="text" class="form-control" id="kd_akun">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:-30px;width:120px;margin-bottom:10px;" class="col-sm-1 control-label">Nama Akun</label>
                                                <div class="col-lg-6" >
                                                      <input type="text" class="form-control" id="nm_akun">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:-30px;width:120px;margin-bottom:10px;" class="col-sm-1 control-label">Level Akun</label>
                                                <div class="col-lg-3" >
                                                  <select class="form-control" id="lvl_akun">
                                                    <option selected="selected">1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                  </select>
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="tbh_akun" class="btn btn-primary" style="margin-left:90px;"><i class="fa fa-fw fa-plus"></i>Tambah</button>
                                                 <button type="button" id="hps_akun" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                              </div> 
                                            </div><hr>
                                            <div class="row">
                                              <div class="col-lg-5"> <!--Radio Buton 1-->
                                                <label ><input type="checkbox" id="cek_neraca" style="margin-left:-30px;margin-bottom:25px;">NERACA/RUGI LABA : </label>
                                              </div>                    
                                            </div>
                                            <div class="row">
                                              <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_nrlb" id="r_neraca2" class="flat-red"  value="NERACA" checked>NERACA</label>
                                              </div>
                                              <div class="input-group-btn">
                                                 <button type="button" id="tbl_neraca" class="btn btn-primary" disabled="true"><i class="fa fa-fw fa-save"></i>Set</button>
                                              </div> 
                                            </div>
                                            <div class="row">
                                              <div class="col-lg-4"> <!--Radio Buton 1-->
                                                     <label><input type="radio" name="r_nrlb" id="r_rugilaba2" class="flat-red"  value="RUGI LABA" checked>RUGI LABA</label>
                                              </div>
                                            </div><hr>
                                            <div class="row">
                                              <div class="col-lg-5"> <!--Radio Buton 1-->
                                                <label ><input type="checkbox" id="cek_level" style="margin-left:-30px;margin-bottom:25px;">Set Level : </label>
                                              </div>                    
                                            </div>
                                            <div class="row">
                                              <div class="col-lg-4"> <!--Radio Buton 1-->
                                                   <label><input type="radio" name="r_level" id="r_rekap2" class="flat-red"  value="Ya" checked>Rekap</label>
                                              </div>
                                              <div class="input-group-btn">
                                                 <button type="button" id="tbl_level" class="btn btn-primary" disabled="true"><i class="fa fa-fw fa-save"></i>Set</button>
                                              </div> 
                                            </div>
                                            <div class="row">
                                              <div class="col-lg-4"> <!--Radio Buton 1-->
                                                     <label><input type="radio" name="r_level" id="r_detail2" class="flat-red"  value="" checked>Detail</label>
                                              </div>
                                            </div><hr>
                                            <div class="row">
                                              <div class="col-lg-5"> <!--Radio Buton 1-->
                                                <label ><input type="checkbox" id="cek_level_akun" style="margin-left:-30px;margin-bottom:25px;">Set Level : </label>
                                              </div>                    
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:-30px;width:120px;margin-bottom:10px;" class="col-sm-1 control-label">Level Akun</label>
                                                <div class="col-lg-3" >
                                                  <select class="form-control" id="lvl_akun2">
                                                    <option selected="selected">1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                  </select>
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="tbl_akun" class="btn btn-primary" style="margin-left:90px;" disabled="true"><i class="fa fa-fw fa-save"></i>Set</button>
                                              </div> 
                                            </div><hr>
                                        </div>
                                        <div class="col-md-7">
                                           <div class="box-body">
                                           <div class="row">
                                                        <table id="list_daftar_akun" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Kode</th>
                                                              <th>Nama Akun</th>
                                                              <th>Neraca/Rugi Laba</th>
                                                              <th>Level</th>
                                                              <th>Rekap</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                       
                                                          </tbody>
                                                        </table>
                                                </div>
                                          </div>
                                        </div>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                               <div class="col-sm-10" style="width:10%;">
                                              </div>
                                            </div>
                                          </div>
                                      </div><!-- /.box-body -->
                                   </form>
                              </div><!-- /.tab-pane -->
  
                              <div class="tab-pane" id="tab_2">
                              <div class="row">
                                      <div class="col-sm-12">
                                        <div class="box-body">
                                           <div class="box-header with-border">
                                              <h3 class="box-title">Daftar Transaksi Kas & Bank</h3>
                                           </div><!-- /.box-header -->
                                          <div class="form-group">
                                            <div class="row">
                                                <div class="box-body">
                                                    <table id="list_kas_bank" class="table table-bordered table-hover display">
                                                      <thead>
                                                        <tr>
                                                          <th></th>
                                                          <th>Transaksi Kas-Bank</th>
                                                          <th>Posisi</th>
                                                          <th>Kode Akun</th>
                                                          <th>Nama Akun COA</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                    
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div><hr>
                                            <div class="row"> 
                                              <div class="form-group">
                                                    <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:20px;" class="col-sm-1 control-label">Kategori Transaksi</label>
                                                <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_kategori_trsk" id="r_debet" class="flat-red" value="DEBET" checked>DEBET</label>
                                                </div>
                                                 <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_kategori_trsk" id="r_kredit"  class="flat-red"  value="CREDIT" style="margin-left:-250px;">CREDIT</label>
                                                </div>        
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:25px;" class="col-sm-1 control-label">Nama Kas & Bank</label>
                                                <div class="col-lg-6" style="width:50%;">
                                                      <input type="text" class="form-control" id="nm_kasbank" style="width:50%;">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row">
                                              <div class="form-group">
                                                   <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:25px;" class="col-sm-1 control-label">Kaitkan dengan COA </label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="kode_akun" style="width:50%;">
                                                  </div>
                                                  <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nama_akun" style="margin-left:-90px;width:75%;">
                                                  </div>
                                                <div class="input-group-btn">
                                                    <button type="button" id="cari_coa" class="btn btn-default" data-toggle="modal" data-target="#myModal" style="margin-left:-200px;"><i class="fa fa-fw fa-search"></i></button>
                                                </div>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="width:800px">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <table id="list_coa" class="table table-bordered table-hover display">
                                                            <thead>
                                                              <tr>
                                                                <th></th>
                                                                <th>Kode Akun</th>
                                                                <th>Nama Akun</th>
                                                                <th>Neraca/Rugi Laba</th>
                                                                <th>Level</th>
                                                                <th>Rekap</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php foreach ($dt_coas as $dt_coa) { ?>
                                                              <tr>
                                                                <td> </td>
                                                                <td><?php echo $dt_coa['kode']; ?></td>
                                                                <td><?php echo $dt_coa['nama']; ?></td>
                                                                <td><?php echo $dt_coa['NR_RL']; ?></td>
                                                                <td><?php echo $dt_coa['level']; ?></td>
                                                                <td><?php echo $dt_coa['isRekap']; ?></td>
                                                              </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                          </table>                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                              </div>
                                            </div> 
                                            <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="tbh_kas" class="btn btn-primary" style="margin-left:185px;"><i class="fa fa-fw fa-plus"></i>Tambah</button>
                                                 <button type="button" id="hps_kas" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                                 <button type="button" id="refresh_kas" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                              </div> 
                                            </div><hr>            
                                        </div>
                                      </div>
                                    </div>

                                     <div class="col-sm-12">
                                        <div class="box-body">
                                           <div class="box-header with-border">
                                              <h3 class="box-title">Daftar Aktivitas</h3>
                                           </div><!-- /.box-header -->
                                          <div class="form-group">
                                            <div class="row">
                                                <div class="box-body">
                                                    <table id="list_aktivitas" class="table table-bordered table-hover display" >
                                                      <thead>
                                                        <tr>
                                                          <th></th>
                                                          <th>Aktivitas</th>
                                                          <th>Posisi</th>
                                                          <th>Kode Akun</th>
                                                          <th>Nama Akun COA</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                    
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div><hr>
                                            <div class="row"> 
                                              <div class="form-group">
                                                    <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:20px;" class="col-sm-1 control-label">Kategori Transaksi</label>
                                                <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_aktivitas" id="r_debet_aktivitas" class="flat-red" value="DEBET" checked>DEBET</label>
                                                </div>
                                                 <div class="col-lg-4"> <!--Radio Buton 1-->
                                                    <label><input type="radio" name="r_aktivitas" id="r_kredit_aktivitas"  class="flat-red"  value="CREDIT" style="margin-left:-250px;">CREDIT</label>
                                                </div>        
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:25px;" class="col-sm-1 control-label">Nama Kas & Bank</label>
                                                <div class="col-lg-6" style="width:50%;">
                                                      <input type="text" class="form-control" id="nm_aktivitas" style="width:50%;">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row">
                                              <div class="form-group">
                                                   <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:25px;" class="col-sm-1 control-label">Kaitkan dengan COA </label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="kode_coa" style="width:50%;">
                                                  </div>
                                                  <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="nama_coa" style="margin-left:-90px;width:75%;">
                                                  </div>
                                                <div class="input-group-btn">
                                                    <button type="button" id="cari_coa" class="btn btn-default" data-toggle="modal" data-target="#myModal2" style="margin-left:-200px;"><i class="fa fa-fw fa-search"></i></button>
                                                </div>
                                                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
                                                <div class="modal-dialog" style="width:800px">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel2">Chart Of Account (COA)</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <table id="list_coa2" class="table table-bordered table-hover display">
                                                            <thead>
                                                              <tr>
                                                                <th></th>
                                                                <th>Kode Akun</th>
                                                                <th>Nama Akun</th>
                                                                <th>Neraca/Rugi Laba</th>
                                                                <th>Level</th>
                                                                <th>Rekap</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php foreach ($dt_coas2 as $dt_coa2) { ?>
                                                              <tr>
                                                                <td> </td>
                                                                <td><?php echo $dt_coa2['kode']; ?></td>
                                                                <td><?php echo $dt_coa2['nama']; ?></td>
                                                                <td><?php echo $dt_coa2['NR_RL']; ?></td>
                                                                <td><?php echo $dt_coa2['level']; ?></td>
                                                                <td><?php echo $dt_coa2['isRekap']; ?></td>
                                                              </tr>
                                                            <?php } ?>
                                                            </tbody>
                                                          </table>                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                              </div>
                                            </div> 
                                            <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="tbh_aktivitas" class="btn btn-primary" style="margin-left:185px;"><i class="fa fa-fw fa-plus"></i>Tambah</button>
                                                 <button type="button" id="hps_aktivitas" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Hapus</button>
                                                 <button type="button" id="refresh_aktivitas" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                              </div> 
                                            </div>             
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <div class="tab-pane" id="tab_3">
                                
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

list_daftar_akun();

     function list_daftar_akun(){
        $('#list_daftar_akun').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,searchable:true,paging:true, pagelength:10,
        "ajax":{
          url :"../get_chart/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_daftar_akun-error").html("");
            $("#list_daftar_akun").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_daftar_akun").css("display","none");
                  
          }
        }
      });  
      }


    $("#cek_neraca").click(function() {  
     if ($( "#cek_neraca" ).prop( "checked"))  { 
      $( "#tbl_neraca" ).prop( "disabled", false );
    }else{
      $( "#tbl_neraca" ).prop( "disabled", true );
    }
    });

    $("#cek_level").click(function() {  
     if ($( "#cek_level" ).prop( "checked"))  { 
      $( "#tbl_level" ).prop( "disabled", false );
    }else{
      $( "#tbl_level" ).prop( "disabled", true );
    }
    });

    $("#cek_level_akun").click(function() {  
     if ($( "#cek_level_akun" ).prop( "checked"))  { 
      $( "#tbl_akun" ).prop( "disabled", false );
    }else{
      $( "#tbl_akun" ).prop( "disabled", true );
    }
    });

    $("#tbh_akun").click(function() { 
    if ($("#r_neraca" ).prop( "checked")) {
      var posisiakun = $('#r_neraca').val();      
    }else {
      var posisiakun =$('#r_rugilaba').val();
    }

    if ($("#r_rekap" ).prop( "checked")) {
      var kategori =$('#r_rekap').val();      
    }else {
      var kategori =$('#r_detail').val();
    }

    if ($("#kd_akun").val() == "" ,$("#nm_akun").val() == ""){
        alert("Masukan Nama Akun,ulangi")
    }else {   
        $.ajax({  datatype: "json",data:{
              posisiakun   : posisiakun,
              kategori     : kategori,
              kd_akun      : $('#kd_akun').val(),
              nm_akun      : $('#nm_akun').val(),
              lvl_akun     : $('#lvl_akun option:selected').val()},
              url          : "../tambah_chart_account/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Coa Berhasil Ditambahkan");
      }, error: function(){alert('Error Nih !!! ');}    
    });list_daftar_akun();
    $("#simpan" ).prop( "disabled", false );
    $("#kd_akun").val("");
    $("#nm_akun").val("");
    $("#lvl_akun").val("1");       
    }
  });


  $('#list_daftar_akun').click(function() {   
    dtrec = $('#list_daftar_akun').DataTable().row('.selected').data();
  }); 

  $("#hps_akun").click(function() { 

    if (confirm("Apakah anda yakin menghapus Chart Of Account (COA) tersebut ? ") == true) {  
        $.ajax({  datatype: "json",data:{
              kd_akun      : dtrec[1]},
              url          : "../delete_chart_account/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data);
      }, error: function(){alert('Error Nih !!! ');}    
    });list_daftar_akun();    
    }
  });

  $("#tbl_neraca").click(function() { 
    if ($("#r_neraca2" ).prop( "checked")) {
      var neraca = $('#r_neraca2').val();      
    }else {
      var neraca =$('#r_rugilaba2').val();
    }
  
        $.ajax({  datatype: "json",data:{
              neraca       : neraca,
              kd_akun      : dtrec[1]},
              url          : "../update_neraca/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });list_daftar_akun();     
    
  });

  $("#tbl_level").click(function() { 
    if ($("#r_rekap2" ).prop( "checked")) {
      var level =$('#r_rekap2').val();      
    }else {
      var level =$('#r_detail2').val();
    }
  
        $.ajax({  datatype: "json",data:{
              level       : level,
              kd_akun      : dtrec[1]},
              url          : "../update_level/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_daftar_akun();    
    
  });

   $("#tbl_akun").click(function() { 
  
        $.ajax({  datatype: "json",data:{
              lvl_akun2     : $('#lvl_akun2 option:selected').val(),
              kd_akun       : dtrec[1]},
              url           : "../update_level_akun/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_daftar_akun();    
    
  });


  
  $('#list_coa').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 5], "visible": true, "searchable": true
            },
            {
                "targets": [ 5], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_coa').click(function() {   
    dtrec = $('#list_coa').DataTable().row('.selected').data();
    $("#kode_akun").val(dtrec[1]);
    $("#nama_akun").val(dtrec[2]);
  }); 

   $('#list_coa2').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 5], "visible": true, "searchable": true
            },
            {
                "targets": [ 5], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_coa2').click(function() {   
    dtrec = $('#list_coa2').DataTable().row('.selected').data();
    $("#kode_coa").val(dtrec[1]);
    $("#nama_coa").val(dtrec[2]);
  }); 

 
list_kas_bank();

   function list_kas_bank(){
        $('#list_kas_bank').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,searchable:true,paging:true, pagelength:10,
        "ajax":{
          url :"../list_kas_bank/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_kas_bank-error").html("");
            $("#list_kas_bank").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_kas_bank").css("display","none");
                  
          }
        }
      });  
      }

  

  $("#tbh_kas").click(function() { 
    if ($("#r_debet" ).prop( "checked")) {
      var kategori_trsk = $('#r_debet').val();      
    }else {
      var kategori_trsk =$('#r_kredit').val();
    }
  
        $.ajax({  datatype: "json",data:{
              kategori_trsk       : kategori_trsk,
              kode_akun           : $("#kode_akun").val(),
              nm_kasbank          : $("#nm_kasbank").val()},
              url                 : "../simpan_kas_bank/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });   list_kas_bank();
          $("#kode_akun").val(""); 
          $("#nm_kasbank").val("");
          $("#nama_akun").val("");
  });

  $('#list_kas_bank').click(function() {   
    dtrec = $('#list_kas_bank').DataTable().row('.selected').data();
  }); 

  $("#hps_kas").click(function() { 
  if (confirm("Apakah anda yakin menghapus Transaksi Kas - Bank Bayar " + dtrec[1]+"?") == true) {  
        $.ajax({  datatype: "json",data:{
              nm_kasbank          : dtrec[1]},
              url                 : "../hapus_kas_bank/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });   list_kas_bank();
      }
  });

  $("#refresh_kas").click(function() { 
      list_kas_bank();
  });

   list_aktivitas();

  function list_aktivitas(){
        $('#list_aktivitas').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, searchable:true, paging:true, pagelength:10,
        "ajax":{
          url :"../list_aktivitas/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_aktivitas-error").html("");
            $("#list_aktivitas").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_aktivitas").css("display","none");     
          }
        }
      });  
      }

  $("#tbh_aktivitas").click(function() { 
    if ($("#r_debet_aktivitas" ).prop( "checked")) {
      var kategori_trsk2 = $('#r_debet_aktivitas').val();      
    }else {
      var kategori_trsk2 =$('#r_kredit_aktivitas').val();
    }
  
        $.ajax({  datatype: "json",data:{
              kategori_trsk2       : kategori_trsk2,
              kode_coa             : $("#kode_coa").val(),
              nm_aktivitas         : $("#nm_aktivitas").val()},
              url                 : "../simpan_aktivitas/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });    list_aktivitas();
          $("#kode_coa").val(""); 
          $("#nm_aktivitas").val("");
          $("#nama_coa").val("");
  });

  $('#list_aktivitas').click(function() {   
    dtrec = $('#list_aktivitas').DataTable().row('.selected').data();
  }); 

  $("#hps_aktivitas").click(function() { 
  if (confirm("Apakah anda yakin menghapus Aktivitas bernama : " + dtrec[1] + " ?") == true) {  
        $.ajax({  datatype: "json",data:{
              nm_aktivitas          : dtrec[1]},
              url                   : "../hapus_aktivitas/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); 
      }, error: function(){alert('Error Nih !!! ');}    
    });   list_aktivitas();
      }
  });

   $("#refresh_aktivitas").click(function() { 
      list_aktivitas();
  });





  



});

</script>
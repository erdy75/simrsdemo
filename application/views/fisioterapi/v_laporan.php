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
        <li class="active">Laporan Fisioterapi</li>
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
                  <h3 class="box-title">Lap. Pasien diregistrasi di Fisioterapi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                   <div class="row"> 
                      <div class="col-md-4" >
                        <div class="form-group" style="margin-bottom: 10px;margin-left:80px;">
                            <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
                         <div class="input-group" style= "margin-left:92px;">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                              <input type="text" class="form-control"  id="tgl_periode1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:102%"   data-mask />
                         </div>
                        </div>
                     </div>

                     <div class="col-md-4" >
                           <label for="inputEmail3" class="col-sm-2 control-label" style="margin-left:-25px">s/d</label>
                        <div class="form-group" style="margin-bottom:10px;">
                         <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                              <input type="text" class="form-control"  id="tgl_periode2" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:37%"   data-mask />
                              <button type="button" id="tbl_carpas" class="btn btn-primary" style="margin-left:10px"><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                         </div>
                        </div>
                     </div> 
                  </div>  
                  
                  <div class="row">
                    <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Jenis Pasien</label>
                      <div class="col-sm-10" style="width:15%;">
                        <select class="form-control" id="jns_pasien">
                            <option selected="selected" value=''>Semua Jenis</option>
                            <?php foreach ($dt_j_pass as $dt_j_pas) { ?>
                            <option ><?php echo $dt_j_pas['nama']; ?></option>
                            <?php } ?>  
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="row">
                    <div class="form-group" style="margin-bottom: 10px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">R.Inap/Jalan</label>
                      <div class="col-sm-10" style="width:20%;">
                        <select class="form-control" id="perawatan">
                            <option value=''>SEMUA PERAWATAN</option>
                            <?php foreach ($dt_nama_per as $dt_j_perawatan) { ?>
                            <option ><?php echo $dt_j_perawatan['nama_perawatan1']; ?></option>
                            <?php } ?>  
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="box-body">
                            <table id="list_pasien_fisioterapi" class="table table-bordered table-hover display">
                              <thead>
                                <tr>
                                  <th></th>                               
                                  <th>No.RM</th>
                                  <th>Nama</th>
                                  <th>Jenis</th>
                                  <th>Poli</th>
                                  <th>Dokter</th>
                                  <th>Tgl Kunj</th>
                                  <th>Jam Kunj</th>
                                  <th>R.Inap/Jalan</th>
                                  <th>Tgl Daftar</th>
                                  <th>Petugas</th>
                                  <th>No.Reg</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                    </div>
                  </div>
                </div>
              </div><!-- /.box-body -->
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


$(function (){

      $("#datemask").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
      $("[data-mask]").inputmask();


   $("#tbl_carpas").click(function() { 
    pas_fisioterapi();
  });

      function pas_fisioterapi(){
        $('#list_pasien_fisioterapi').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
        "ajax":{
          url :"../pas_fisioterapi/", // json datasource
          type: "post",  // method  , by default get
          data:{  tgl_periode1       :$('#tgl_periode1').val(),
                  tgl_periode2       :$('#tgl_periode2').val(),
                  jns_pasien         :$('#jns_pasien option:selected').val(),
                  perawatan          :$('#perawatan option:selected').val()},
          error: function(){  // error handling
            $(".list_pasien_fisioterapi-error").html("");
            $("#list_pasien_fisioterapi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_pasien_fisioterapi").css("display","none");   
          }
        }
      });  
      }


       

     

   


      

   

});

</script>
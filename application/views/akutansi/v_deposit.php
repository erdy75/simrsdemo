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
        <li class="active">Deposit</li>
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
                  <h3 class="box-title">Deposit/Uang Muka :</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                  <div class="row">
                     <div class="col-sm-7">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Tanggal</label>
                                                        <div class="col-sm-4" >
                                                            <div class="input-group">
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                  <input type="text" class="form-control" id="tgl_deposit1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4" style="margin-left: -50px;" >
                                                            <div class="input-group" >
                                                              <div class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                              </div>
                                                                <input type="text" class="form-control" id="tgl_deposit2" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:80%;"   data-mask />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-2" style="margin-left: -50px;" >
                                                          <div class="input-group-btn">
                                                             <button type="button" id="tbl_car_deposit" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Ok</button>
                                                          </div> 
                                                        </div>
                                                    </div>
                                                  </div>
                                                  
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-3 control-label">Status</label>
                                                        <div class="col-sm-4" >
                                                             <select class="form-control" id="combo_status">
                                                                  <option selected="selected" value=''>Semua Status</option>
                                                                  <option value="WAITING">Waiting (Menunggu)</option>
                                                                  <option value="POSTED">Posted(Selesai)</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                  </div>                                               
                                                </div>
                                              </div>

                                              <div class="col-sm-5" style="background-color:#FFFF76;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 1px;">
                                                          <label for="inputEmail3" class="col-sm-4 control-label" style="color:blue">No Kwitansi Deposit</label>
                                                        <div class="col-sm-6";" >
                                                            <input type="text" class="form-control" id="text_nokwi" >
                                                        </div> 
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                    <label for="inputEmail3" class="col-sm-9 control-label" style="color:blue;font-size:12px;"> *)Pastikan anda telah menerima kwitansi asli deposit </label>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 1px;">
                                                          <label for="inputEmail3" class="col-sm-4 control-label" style="color:blue">No Ref Invoice</label>
                                                        <div class="col-sm-6";" >
                                                            <input type="text" class="form-control" id="text_noref" >
                                                        </div>
                                                    </div>
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                    <label for="inputEmail3" class="col-sm-8 control-label" style="color:blue;font-size:12px;" >*)No.Ref ditulis dengan delimeter titik koma;  </label>
                                                    </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_posting_deposit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i>Posting/deposit uang muka pasien</button>
                                                    </div> 
                                                  </div>                                          
                                                </div>
                                              </div>
                                             </div> 
                                            <div class="row">
                                                <div class="box-body">
                                                        <table id="list_deposit" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                        <th>Kwitansi UM</th>
                                                        <th>Pasien</th>
                                                        <th>Terima Dari</th>
                                                        <th>Untuk</th>
                                                        <th>Jumlah</th>
                                                        <th>Tgl Terima</th>
                                                        <th>Jam</th>
                                                        <th>Keterangan</th>
                                                        <th>User Kasir</th>
                                                        <th>Status</th>
                                                        <th>User Posting</th>
                                                        <th>Tgl Posting</th>
                                                        <th>No Ref Invoice</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                </div>
                                        </div><hr>
                                          <div class="row">
                                             <div class="col-sm-3">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                    <label for="inputEmail3" class="col-sm-4 control-label" style="font-size:20px"> Total :</label>
                                                    <label for="inputEmail3" class="col-sm-4 control-label" style="font-size:20px" id="lbl_total_deposit"> Rp.0,00</label>
                                                    </div>
                                                  
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-4" style="background-color:#6F8571;margin-bottom:50px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-6 control-label"><input type="checkbox" id="cek_hps_deposit">Hapus Deposit dengan alasan</label>
                                                        <div class="col-sm-6";" >
                                                            <input type="text" class="form-control" id="text_hps_deposit" disabled="true">
                                                        </div> 
                                                    </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_hps_deposit" class="btn btn-danger" disabled="true"><i class="fa fa-fw fa-times"></i>Hapus Deposit</button>
                                                    </div> 
                                                  </div>                                          
                                                </div>
                                              </div>
                                              <div class="col-sm-4" style="background-color:#F0765A;margin-bottom:50px;margin-left: 10px;">
                                                <div class="box-body">
                                                  <div class="row">
                                                    <div class="form-group" style="margin-bottom: 10px;">
                                                          <label for="inputEmail3" class="col-sm-6 control-label"><input type="checkbox" id="cek_aktf_deposit">Aktifkan Deposit dengan alasan</label>
                                                        <div class="col-sm-6";" >
                                                            <input type="text" class="form-control" id="text_aktif_deposit" disabled="true">
                                                        </div> 
                                                    </div>
                                                    <div class="input-group-btn">
                                                             <button type="button" id="tbl_aktf_deposit" class="btn btn-primary" disabled="true"><i class="fa fa-fw fa-times"></i>Aktifkan Kembali</button>
                                                    </div> 
                                                  </div>                                          
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

var dtrec;
$(function (){


    

      $("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
      $("[data-mask]").inputmask();

     
    $("#tbl_posting_deposit").click(function() { 

    if($("#text_noref").val() == ""){
      alert(" Masukan No Referensi yang di bayar dari kwitansi deposit ini. Jika referensi lebih dari 1 invoice gunakan pembatas koma (misal:12000328,1003283,12000323) ") 
    } else { 
      if(confirm("Anda yakin akan posting Deposit dengan no kwitansi "+dtrec[1]+ " ?") == true);{

        $.ajax({  datatype: "json",data:{
              id_user_posting              : dtrec[14],
              text_noref                   : $("#text_noref").val(),
              id_dp                        : dtrec[1]},
              url                          : "../update_posting/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Posting deposit dari uang dengan no " +dtrec[1]+ " telah berhasil");
      }, error: function(){alert('Error Nih !!! ');}    
    });list_lap_deposit();
      $("#text_noref").val("");
       $("#text_nokwi").val("");
      }  
    }
    });

      $("#tbl_car_deposit").click(function() {
          list_lap_deposit();
      });

      $('#list_deposit').click(function() {  
      dtrec = $('#list_deposit').DataTable().row('.selected').data();
      $("#text_nokwi").val(dtrec[1]);
      });


     function list_lap_deposit(){
        $('#list_deposit').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,paging : true, pagelength : 10,searchAble: true,scrollX:true,
        "ajax":{
          url :"../list_lap_deposit/", // json datasource
          type: "post",  // method  , by default get
          data:{tgl_deposit1       :$('#tgl_deposit1').val(),
                tgl_deposit2       :$('#tgl_deposit2').val(),
                combo_status       :$('#combo_status').val() },
          error: function(){  // error handling
            $(".list_deposit-error").html("");
            $("#list_deposit").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_deposit").css("display","none");
                  
          },dataSrc : function(json) { var dt =json.total;  $("#lbl_total_deposit").text(dt);   return json.data; }
        }
      });  
      }
    

    $("#cek_aktf_deposit").click(function() {  
     if ($( "#cek_aktf_deposit" ).prop( "checked"))  { 
      $( "#text_aktif_deposit" ).prop( "disabled", false );
      $( "#tbl_aktf_deposit" ).prop( "disabled", false );
    }else{
      $( "#text_aktif_deposit" ).prop( "disabled", true );
       $( "#tbl_aktf_deposit" ).prop( "disabled", true );
    }
    });

    $("#cek_hps_deposit").click(function() {  
     if ($( "#cek_hps_deposit" ).prop( "checked"))  { 
      $( "#text_hps_deposit" ).prop( "disabled", false );
      $( "#tbl_hps_deposit" ).prop( "disabled", false );
    }else{
      $( "#text_hps_deposit" ).prop( "disabled", true );
       $( "#tbl_hps_deposit" ).prop( "disabled", true );
    }
    });

    $("#tbl_aktf_deposit").click(function() { 

    if($("#text_aktif_deposit").val() == ""){
      alert(" Masukan alasan anda mengaktifkan kembali deposit") 
    } else { 
      if(confirm(" Apakah Anda yakin mengaktifkan Deposit no "+dtrec[1]+ " ?") == true);{

        $.ajax({  datatype: "json",data:{
              id_user_posting          : dtrec[14],
              id_pasien                   : dtrec[15],
              jumlah                   : dtrec[5],
              text_aktif_deposit      : $("#text_aktif_deposit").val(),
              id_dp                    : dtrec[1]},
              url                      : "../aktif_deposit/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Deposit pasien telah diaktifkan");
      }, error: function(){alert('Error Nih !!! ');}    
    });list_lap_deposit();
        $("#text_aktif_deposit").val("");
      }  
    }
    });

     $("#tbl_hps_deposit").click(function() { 

    if($("#text_hps_deposit").val() == ""){
      alert(" Masukan alasan anda melalukan penghapusan Uang Muka, ulangi") 
    } else { 
      if(confirm(" Apakah Anda yakin menghapus uang muka no "+dtrec[1]+ " ?") == true);{

        $.ajax({  datatype: "json",data:{
              id_user_posting          : dtrec[14],
              text_hps_deposit         : $("#text_hps_deposit").val(),
              id_dp                    : dtrec[1]},
              url                      : "../hapus_deposit/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Data telah berhasil dihapus");
      }, error: function(){alert('Error Nih !!! ');}    
    });list_lap_deposit();
        $("#text_hps_deposit").val("");
      }  
    }
    });



   

   

});

</script>
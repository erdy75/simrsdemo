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
       Diet & Bahan Makanan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Gizi</a></li>
        <li class="active">Diet & Bahan Makanan</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
        <div class="row">
            <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Diet Makanan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                      <div class="row">
                        <div class="box-body">
                            <table id="daftar_diet" class="table table-bordered table-hover display">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Nama Diet</th>
                                </tr>
                              </thead>
                              <tbody>
                              
                              </tbody>
                            </table>
                        </div>
                      </div><hr>
                    <div class="form-group">
                      <div class="row"> 
                              <label for="inputEmail3" style="margin-left:10px;width:110px;margin-bottom:25px;" class="col-sm-2 control-label">Nama Diet</label>
                          <div class="col-lg-5" >
                              <input type="text" class="form-control" name="nama_diet" id="nama_diet">
                          </div>
                      </div>  
                    </div>
                    <div class="row">
                      <div class="input-group-btn">
                          <button type="button" id="tbh_diet" class="btn btn-primary" style="margin-left:10px;" ><i class="fa fa-fw fa-save"></i>Tambah</button>
                          <button type="button" id="refresh_diet" class="btn btn-primary" style="margin-left:10px;" ><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                          <button type="button" id="ubh_diet" class="btn btn-primary" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-edit"></i>Ubah</button>
                          <button type="button" id="hps_diet" class="btn btn-danger" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-times"></i>Hapus</button>
                      </div> 
                    </div><hr>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
        </div>
        <div class="col-md-6">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Daftar Bahan Makanan</h3>
                </div><!-- /.box-header -->
                <!-- form start -->   
                <form class="form-horizontal">
                  <div class="box-body">
                            <div class="row">
                                <div class="box-body">
                                    <table id="list_bhnmakanan" class="table table-bordered table-hover display">
                                      <thead>
                                        <tr>
                                          <th></th>
                                          <th>Bahan</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      </tbody>
                                    </table>
                                </div>
                            </div><hr>
                      <div class="row"> 
                          <div class="form-group">
                              <label for="inputEmail3" style="margin-left:10px;width:190px;margin-bottom:10px;" class="col-sm-1 control-label">Bahan Makanan</label>
                            <div class="col-lg-5" >
                                  <input type="text" class="form-control" id="bahan_makan">
                            </div>
                         </div>  
                      </div>
                      <div class="row"> 
                          <div class="form-group">
                              <label for="inputEmail3" style="margin-left:10px;width:190px;margin-bottom:10px;" class="col-sm-1 control-label">Kandungan Gizi</label>
                            <div class="col-lg-5">
                                <select class="col-sm-2 form-control"  id="kdg_gizi"></select>
                            </div>
                         </div>  
                      </div>
                      <div class="row"> 
                          <div class="form-group">
                              <label for="inputEmail3" style="margin-left:10px;width:190px;margin-bottom:10px;" class="col-sm-1 control-label">Jumlah Gizi Per 100gr</label>
                            <div class="col-lg-3" >
                                <input type="text" class="form-control"  id="jml_gizi">
                            </div>
                            <div class="col-lg-3" >
                                <select class="form-control" id="satuan">
                                    <option selected="selected">KKal</option>
                                    <option>g</option>
                                    <option>mg</option>
                                    <option>ug</option>
                                    <option>RE</option>
                                </select>
                            </div>
                         </div>  
                      </div>
                      <div class="row"> 
                          <div class="form-group">
                              <label for="inputEmail3" style="margin-left:10px;width:190px;margin-bottom:10px;" class="col-sm-1 control-label">List Kandungan Gizi :</label>
                         </div>  
                      </div>
                        <div class="row">
                          <div class="box-body">
                            <table id="list_gizi" class="table table-bordered table-hover display">
                                 <thead>
                                    <tr>
                                        <th></th>
                                        <th>Kandungan</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                            </table>
                          </div>
                      </div><hr>
                    <div class="row">
                      <div class="input-group-btn">
                          <button type="button" id="tbh_gizi" class="btn btn-primary" style="margin-left:10px;" ><i class="fa fa-fw fa-save"></i>Tambah</button>
                          <button type="button" id="ubh_gizi" class="btn btn-primary" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-edit"></i>Ubah</button>
                          <button type="button" id="hps_gizi" class="btn btn-danger" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-times"></i>Hapus</button>
                          <button type="button" id="btl_gizi" class="btn btn-danger" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-times"></i>Batal</button>
                      </div> 
                    </div><hr>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
        </div>
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Kandungan Gizi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->   
                <form class="form-horizontal">
                  <div class="box-body">
                       <div class="row"> 
                          <div class="form-group">
                              <label for="inputEmail3" style="margin-left:10px;width:200px;margin-bottom:10px;" class="col-sm-1 control-label">Kandungan Gizi Per 100gr :</label>
                            <div class="col-lg-3" >
                                  <input type="text" class="form-control" id="kandungan_gizi">
                            </div>
                         </div>  
                      </div>
                       <div class="row">
                          <div class="box-body">
                            <table id="list_kandungan_gizi" class="table table-bordered table-hover display">
                                 <thead>
                                    <tr>
                                        <th></th>
                                        <th>Kandungan</th>
                                        <th>Jumlah</th>
                                        <th>Satuan</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  </tbody>
                            </table>
                          </div>
                      </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
        </div>
      </div>

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

    daftar_diet();

    function daftar_diet(){
        $('#daftar_diet').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
        "ajax":{
          url :"../get_nama_diet/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".daftar_diet-error").html("");
            $("#daftar_diet").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#daftar_diet").css("display","none");
                  
          }
        }
      });  
      }

    $('#daftar_diet').click(function() {   
    dtrec = $('#daftar_diet').DataTable().row('.selected').data();
    $("#nama_diet").val(dtrec[1]);
    //$( "#tab_1" ).prop("class",true); 
    $( "#ubh_diet" ).prop( "disabled", false );   
    $( "#hps_diet" ).prop( "disabled", false );  

    });


    $("#tbh_diet").click(function() {
        if ($("#nama_diet").val() == "" ){
        alert("masukan nama diet")
         }else {   
      
        $.ajax({  datatype        : "json",data: {
                  nama_diet       :$('#nama_diet').val()},
                  url             : "../tambah_diet/",
                  async           : false, 
                  type            :'POST',
                  success: function(data){ var dt=JSON.parse(data);
        alert('Berhasil menambahkan daftar diet');
        }, error: function() {alert('Error Nih !!! ');}    
        });
        daftar_diet();
        $( "#tbh_diet" ).prop( "disabled", false );   
        $("#nama_diet").val("");    
        } 
    });

    $("#ubh_diet").click(function() {
        $.ajax({  datatype        : "json",data: {
                  nama_diet       : dtrec[1],
                  nama_diet_baru       : $("#nama_diet").val()},
                  url             : "../ubah_diet/",
                  async           : false, 
                  type            :'POST',
                  success: function(data){ var dt=JSON.parse(data);
        }, error: function() {alert('Error Nih !!! ');}    
        });
        daftar_diet();
        $( "#ubh_diet" ).prop( "disabled", true );   
        $( "#hps_diet" ).prop( "disabled", true );   
        $("#nama_diet").val("");    
    });

    $("#hps_diet").click(function() {
       if (confirm("Anda yakin akan menghapus diet kode "+ dtrec[1]+",yakin dilanjutkan?") == true) {
        $.ajax({  datatype        : "json",data: {
                  nama_diet       :$('#nama_diet').val()},
                  url             : "../delete_diet/",
                  async           : false, 
                  type            :'POST',
                  success: function(data){ var dt=JSON.parse(data);
        }, error: function() {alert('Error Nih !!! ');}    
        });
        daftar_diet();
        $( "#ubh_diet" ).prop( "disabled", true );   
        $( "#hps_diet" ).prop( "disabled", true );   
        $("#nama_diet").val("");  
        }  
    });

    list_bahan_makanan();

    var cari_kdggizi = {
        placeholder: "Cari Kandungan Gizi...",
        minimumInputLength: 1,
        ajax: {  
        url: "../get_kandungan_gizi/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
    $("#kdg_gizi").select2(cari_kdggizi);
   

      function list_bahan_makanan(){
        $('#list_bhnmakanan').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
        "ajax":{
          url :"../list_bahan_makanan/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_bhnmakanan-error").html("");
            $("#list_bhnmakanan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_bhnmakanan").css("display","none");
                  
          }
        }
      });  
      }

    $('#list_bhnmakanan').click(function() {  
    dtrec = $('#list_bhnmakanan').DataTable().row('.selected').data();
    list_kandungangizi(dtrec[1]); 
    list_gizi2(dtrec[1]);
    $("#kandungan_gizi").val(dtrec[1]);
    $( "#ubh_gizi" ).prop( "disabled", false );  
    $( "#hps_gizi" ).prop( "disabled", false );  
    $( "#btl_gizi" ).prop( "disabled", false ); 
    });

    function list_gizi(){
    $('#list_gizi').DataTable( {
    "destroy": true,"processing": true, "serverSide": true,select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
    "ajax":{
      url :"../list_gizi/", // json datasource
      type: "post",  // method  , by default get
      data:{ bahan_makan              :$('#bahan_makan').val(),
             kdg_gizi                 :$('#kdg_gizi option:selected').text(),
             jml_gizi                 :$('#jml_gizi').val(),
             satuan                   :$('#satuan').val()},
      error: function(){  // error handling
        $(".list_gizi-error").html("");
        $("#list_gizi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#list_gizi_processing").css("display","none");
        }
      }
    });   
  }

 function list_gizi2(){
    $('#list_gizi').DataTable( {
    "destroy": true,"processing": true, "serverSide": true,select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
    "ajax":{
      url :"../list_gizi/", // json datasource
      type: "post",  // method  , by default get
      data:{ bahan_makan              :dtrec[1]},
            
      error: function(){  // error handling
        $(".list_gizi-error").html("");
        $("#list_gizi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#list_gizi_processing").css("display","none");
        }
      }
    });   
  }

    function list_kandungangizi(){
    $('#list_kandungan_gizi').DataTable( {
    "destroy": true,"processing": true, "serverSide": true,select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
    "ajax":{
      url :"../list_kandungangizi/", // json datasource
      type: "post",  // method  , by default get
      data:{bahan_makan              :dtrec[1]},
      error: function(){  // error handling
        $(".list_kandungan_gizi-error").html("");
        $("#list_detailfakturr").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#list_kandungan_gizi_processing").css("display","none");
        }
      }
    });   
  }

  $("#tbh_gizi").click(function() {
        $.ajax({  datatype                 : "json",data: {
                  bahan_makan              :$('#bahan_makan').val(),
                  kdg_gizi                 :$('#kdg_gizi option:selected').text(),
                  jml_gizi                 :$('#jml_gizi').val(),
                  satuan                   :$('#satuan').val()},
                  url                      : "../simpan_giziall/",
                  async                    : false, 
                  type                     :'POST',
                  success: function(data){var dt=JSON.parse(data);}, error: function() {alert('Error Nih !!! ');}  
        });list_bahan_makanan();  
           list_gizi();
       $( "#bahan_makan" ).prop( "disabled", true ); 
       $( "#btl_gizi" ).prop( "disabled", false ); 
   });


  $("#hps_gizi").click(function() {
    if (confirm("Anda yakin akan menghapus " +dtrec[1]+", apakah dilanjutkan? ") == true) {
      
        $.ajax({  datatype: "json",data:{ bahan : dtrec[1]},
        url: "../delete_gizi/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);
      }, error: function(){alert('Error Nih !!! ');}
    });list_bahan_makanan();  
    $( "#ubh_gizi" ).prop( "disabled", true );  
    $( "#hps_gizi" ).prop( "disabled", true );
    $( "#btl_gizi" ).prop( "disabled", true );    
    } 
  });

  $("#btl_gizi").click(function() {
       $( "#bahan_makan" ).prop( "disabled", false );
      bahan_makan              :$('#bahan_makan').val("");
      jml_gizi                 :$('#jml_gizi').val("");
      satuan                   :$('#satuan').val("KKal");
      list_gizi("No");
      list_gizi2("No");
      
   });




 

});

</script>
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
        <li class="active">Gudang Fisioterapi</li>
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
                  <h3 class="box-title">Form Gudang Fisioterapi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                       <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">Form Permintaan Ke Gudang</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Daftar Permintaan</a></li>
                              <li><a href="#tab_3" data-toggle="tab">History Permintaan</a></li>
                              <li><a href="#tab_4" data-toggle="tab">Cari Barang</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                   <form class="form-horizontal">
                                      <div class="box-body">
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">No Order</label>
                                              <div class="col-sm-10" style="width : 19%;">
                                                <input type="text" class="form-control" id="no_order" disabled="true" value="~~Auto Number~~" >
                                              </div>
                                              <div class="input-group-btn">
                                                <button type="button" id="buat_order_baru" class="btn btn-primary"><i class="fa fa-fw fa-refresh"></i>Buat Order Baru</button>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Poli/Departement</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" id="poli" value="POLI FISIOTHERAPY" disabled="true" style="width : 20%;">
                                              </div>
                                            </div>
                                          </div><hr>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
                                              <div class="col-sm-10" style="width:25%;">
                                                <select class="form-control" id="kategori" disabled="true">
                                                    <option selected="selected">--Semua Kategori--</option>
                                                    <?php foreach ($dt_kategori_items as $dt_kategori_item) { ?>
                                                    <option ><?php echo $dt_kategori_item['nama']; ?></option>
                                                    <?php } ?>  
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Nama Barang</label>
                                              <div class="col-sm-10">
                                                <select class="col-sm-2 form-control"  id="nama" style="width: 27.5%;" disabled="true"></select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                               <label for="inputEmail3" class="col-sm-2 control-label">Jumlah Diminta</label>
                                                <div class="col-sm-10" style="width:10%;">
                                                  <input type="number" class="form-control" id="jumlah" min="1" max="100" disabled="true">
                                                </div>
                                                <div class="col-sm-10" style="width:15%;">
                                                  <input type="text" class="form-control" id="unit" disabled="false" value="[satuan]" style="margin-left:-25px">
                                                </div>
                                            </div>
                                          </div><hr>
                                          <div class="row">
                                                <div class="box-body">
                                                        <table id="dftr_permintaan" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Nama Barang</th>
                                                              <th>Jum.Minta</th>
                                                              <th>Satuan</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                </div>
                                          </div><hr>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Waktu Pemenuhan</label>
                                               <div class="col-sm-10" style="width:10%;">
                                                <select class="form-control" id="waktu" disabled="true">
                                                    <option selected="selected">1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                    <option>6</option>
                                                    <option>7</option>
                                                    <option>8</option>
                                                    <option>9</option>
                                                    <option>10</option>
                                                    <option>11</option>
                                                    <option>12</option>
                                                    <option>13</option>
                                                    <option>14</option>
                                                    <option>15</option>
                                                    <option>16</option>
                                                    <option>17</option>
                                                    <option>18</option>
                                                    <option>19</option>
                                                    <option>20</option>
                                                    <option>21</option>
                                                    <option>23</option>
                                                    <option>24</option> 
                                                    <option>25</option>
                                                    <option>26</option>
                                                    <option>27</option>
                                                    <option>28</option>
                                                    <option>29</option>
                                                    <option>30</option>
                                                    <option>31</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Catatan</label>
                                              <div class="col-sm-10">
                                                <textarea type="text" rows="3" class="form-control" id="keterangan" style="width : 30%;" disabled="true"></textarea>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Kepala Unit</label>
                                              <div class="col-sm-10" style="width : 19%;">
                                                <input type="text" class="form-control" id="nama_kepala_unit" disabled="true">
                                              </div>
                                              <div class="input-group-btn">
                                                <button type="button" id="cari_kpl_unit" class="btn btn-default" data-toggle="modal" data-target="#myModal" disabled="true"><i class="fa fa-fw fa-search"></i></button>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" style="width:800px">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Daftar Kepala Unit</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <table id="list_kepala_unit" class="table table-bordered table-hover display">
                                                            <thead>
                                                              <tr>
                                                                <th></th>
                                                                <th>Nama</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              <?php foreach ($dt_kepala_units as $dt_kepala_unit) { ?>
                                                              <tr>
                                                                <td></td>
                                                                <td><?php echo $dt_kepala_unit['nama']; ?></td>
                                                              </tr>
                                                              <?php } ?>
                                                            </tbody>
                                                          </table>                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                          <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="simpan_item" class="btn btn-primary" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-save"></i>Simpan</button>
                                                 <button type="button" id="btl_item" class="btn btn-danger" style="margin-left:10px;" disabled="true"><i class="fa fa-fw fa-times"></i>Batal</button>
                                              </div> 
                                          </div>
                                      </div><!-- /.box-body -->
                                   </form>
                              </div><!-- /.tab-pane -->
  
                              <div class="tab-pane" id="tab_2">
                                   <form class="form-horizontal">
                                    <div class="box-body">
                                       <div class="row">
                                               <div class="col-sm-10" style="width:15%;">
                                                <select class="form-control" id="select_status">
                                                    <option selected="selected">Open</option>
                                                    <option>Close</option>
                                                    <option value=''>Semua</option>
                                                </select>
                                               </div>
                                              <div class="input-group-btn">
                                                 <button type="button" id="refresh_order" class="btn btn-primary" style="margin-left:10px;" ><i class="fa fa-fw fa-refresh"></i>Refresh</button>
                                                 <button type="button" id="ubh_order" class="btn btn-primary" style="margin-left:10px;" ><i class="fa fa-fw fa-edit"></i>Ubah Order</button>
                                                 <button type="button" id="btl_order" class="btn btn-danger" style="margin-left:10px;" ><i class="fa fa-fw fa-times"></i>Batalkan Order</button>
                                                 <button type="button" id="ctk_lembar" class="btn btn-primary" style="margin-left:10px;" ><i class="fa fa-fw fa-print"></i>Cetak Lembar Permintaan</button>
                                              </div> 
                                       </div><hr>

                                       <div class="row">
                                                <div class="box-body">
                                                        <table id="list_order_item" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>No Order</th>
                                                              <th>Petugas/Yang Meminta </th>
                                                               <th>Kepala Unit </th>
                                                              <th>Poli/Departemen</th>
                                                              <th>Tgl Permintaan</th>
                                                              <th>Waktu</th>
                                                              <th>Keterangan</th>
                                                              <th>Jum Item</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                </div>
                                        </div><hr>

                                         <div class="row">
                                                <div class="box-body">
                                                        <table id="list_order_detail" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Nama Barang</th>
                                                              <th>Jum.Minta</th>
                                                              <th>Satuan</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                </div>
                                        </div>

                                        <div class="input-group-btn">
                                                 <button type="button" id="hps_item_order" class="btn btn-danger" style="margin-left:10px;" ><i class="fa fa-fw fa-times"></i>Hapus Item yang diorder</button>
                                              </div> 
                                        </div><!-- /.box-body -->
                                  </form>
                              </div>

                              <div class="tab-pane" id="tab_3">
                                  <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="row"> 
                                          <div class="col-md-4" >
                                            <div class="form-group" style="margin-bottom: 10px;margin-left:80px;">
                                                <label for="inputEmail3" class="col-sm-2 control-label">Periode</label>
                                             <div class="input-group" style= "margin-left:86px;">
                                              <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                              </div>
                                                  <input type="text" class="form-control" id="tgl_periode1" data-inputmask="'alias': 'yyyy-mm-dd'" style="width:102%"   data-mask />
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
                                                  <button type="button" id="tbl_carorder" class="btn btn-primary" style="margin-left:10px"><i class="fa fa-fw fa-refresh"></i>Ok</button>
                                             </div>
                                            </div>
                                         </div> 
                                      </div> 

                                      <div class="row">
                                            <div class="form-group" style="margin-bottom: 10px;">
                                              <label for="inputEmail3" class="col-sm-2 control-label">Poli/BackOffice</label>
                                              <div class="col-sm-10">
                                                <input type="text" class="form-control" id="poli2" value="POLI FISIOTHERAPY" disabled="true" style="width : 20%;">
                                              </div>
                                            </div>
                                      </div>

                                      <div class="row">
                                          <div class="form-group" style="margin-bottom: 10px;">
                                            <label for="inputEmail3" class="col-sm-2 control-label">Status</label>
                                            <div class="col-sm-10" style="width:15%;">
                                                <select class="form-control" id="select_status2">
                                                    <option selected="selected" value=''>Semua Status</option>
                                                    <option>Open</option>
                                                    <option>Close</option>
                                                </select>
                                            </div>
                                          </div>
                                      </div>  

                                      <div class="row">
                                                <div class="box-body">
                                                        <table id="list_history_order" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>No Order</th>
                                                              <th>Poli</th>
                                                              <th>Tanggal</th>
                                                              <th>Keterangan</th>
                                                              <th>Petugas</th>
                                                              <th>Kepala Unit</th>
                                                              <th>Status</th>
                                                              <th>Nama Barang</th>
                                                              <th>Jum.dipesan</th>
                                                              <th>Satuan</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                                </div>
                                        </div><hr>  
                                    </div><!-- /.box-body -->
                                  </form>
                              </div><!-- /.tab-pane -->

                              <div class="tab-pane" id="tab_4">
                                    <div class="box-body">
                                      <div class="row"> 
                                        *)Apabila Terdapat Kesalahan Penulisan Nama Atau Atribut Lainnya, Harap Hubungi Gudang Logistik
                                      </div>
                                    </div>  
                                      <div class="box-body">
                                        <div class="form-group">
                                          <div class="row">                       
                                            <div class="col-md-12">
                                              <table id="daftar_barang" class="table table-bordered table-hover display">
                                                <thead>
                                                  <tr>
                                                    <th></th>
                                                    <th>ID</th>
                                                    <th>Nama</th>
                                                    <th>Kemasan Kecil</th>
                                                    <th>Kemasan Sedang</th>             
                                                    <th>Kemasan Besar</th>
                                                    <th>Type</th>                     
                                                    <th>Jenis</th>
                                                    <th>Generik</th>
                                                    <th>Sediaan</th>
                                                    <th>Principal</th>
                                                    <th>Barcode</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php foreach ($dt_barang as $dt_brg) { ?>
                                                  <tr>
                                                    <td> </td>
                                                    <td><?php echo $dt_brg['id']; ?></td>
                                                    <td><?php echo $dt_brg['nama']; ?></td>
                                                    <td><?php echo $dt_brg['satuan']; ?></td>
                                                    <td><?php echo $dt_brg['pengali_satuan_sedang'].'@'.$dt_brg['nama_satuan_sedang']; ?></td>
                                                    <td><?php echo $dt_brg['pengali_satuan_besar'].'@'.$dt_brg['nama_satuan_besar']; ?></td>
                                                    <td><?php echo $dt_brg['kategori_item']; ?></td>
                                                    <td><?php echo $dt_brg['jenis']; ?></td>
                                                    <td><?php echo $dt_brg['generik']; ?></td>
                                                    <td><?php echo $dt_brg['bentuk_sediaan'].'/'.$dt_brg['dosis_sediaan'].''.$dt_brg['kekuatan_sediaan']; ?></td>
                                                    <td><?php echo $dt_brg['principal']; ?></td>
                                                    <td><?php echo $dt_brg['barcode']; ?></td>
                                                  </tr>
                                                  <?php } ?>
                                              </table>                        
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

   $( "#kategori" ).select2();
   $( "#waktu" ).select2();

   $("#buat_order_baru").click(function() {
      $( "#kategori" ).prop( "disabled", false );
      $( "#nama" ).prop( "disabled", false );  
      $( "#jumlah" ).prop( "disabled", false );
      $( "#waktu" ).prop( "disabled", false ); 
      $( "#keterangan" ).prop( "disabled", false ); 
      $( "#nama_kepala_unit" ).prop( "disabled", false ); 
      $( "#cari_kpl_unit" ).prop( "disabled", false ); 
      $( "#simpan_item" ).prop( "disabled", false ); 
      $( "#btl_item" ).prop( "disabled", false ); 
      });

    var cari_namabarang = {
        placeholder: "Cari Nama Barang...",
        minimumInputLength: 1,
        ajax: {  
        url: "../get_nama_barang/", 
        dataType: 'json',
        type:"POST", 
        data: function (term) {return term;},
        processResults: function (data, page) { return { results: data };}
        } 
    };
    $("#nama").select2(cari_namabarang);

    $("#nama").change(function () { 
    $.ajax({  datatype: "json",
      data:{id_master:$("#nama").val()}, 
      url: "../get_satuan/",
      async: false, type:'POST',
      success: function(data){ 
      var dt=JSON.parse(data);
      $("#unit").val(dt.satuan);}, 
      error: function(){alert('Error Nih !!! ');}   
    });
  });

    $("#btl_item").click(function() {
    Disable();
    Clear();  
  });

    function Clear(){       
    $( "#no_order" ).val("~Auto Number~");     
    $( "#waktu" ).val("1");
    $( "#keterangan" ).val("");
    $( "#nama_kepala_unit" ).val("");
    $( "#jumlah" ).val("");
   daftar_permintaan();
    }
  
  function Disable(){   
    $( "#buat_order_baru" ).prop( "disabled", false );    
    $( "#waktu" ).prop( "disabled", true );    
    $( "#keterangan" ).prop( "disabled", true );
    $( "#nama_kepala_unit" ).prop( "disabled", true );  
    $( "#nama" ).prop( "disabled", true );  
    $( "#jumlah" ).prop( "disabled", true );
    $( "#kategori" ).prop( "disabled", true ); 
    $( "#btl_item" ).prop( "disabled", true ); 
    $( "#cari_kpl_unit" ).prop( "disabled", true ); 
  }

 $("#refresh_order").click(function() { 
    list_order_item();
  });

    $("#simpan_item").click(function() {

        if ($("#nama_kepala_unit").val() == "" ,$("#waktu").val() == ""  ,$("#nama").text() == "" ,$("#jumlah").val() == ""){
        alert("Data Belum Lengkap")
        }else {   
      
        $.ajax({  datatype        : "json",data: {
                  no_order        :$('#no_order').val(),
                  waktu           :$('#waktu').val(),
                  keterangan      :$('#keterangan').val(),
                  nama_kepala_unit:$('#nama_kepala_unit').val(),
                  nama            :$('#nama option:selected').text(),
                  jumlah          :$('#jumlah').val(),
                  unit            :$('#unit').val()},
                  url             : "../simpan_order/",
                  async           : false, 
                  type            :'POST',
                  success: function(data){var dt=JSON.parse(data); $("#no_order").val(dt); if (data=='no_order') { alert('Pendaftaran Pasien Telah Sukses');}}, error: function() {alert('Error Nih !!! ');}    
        });daftar_permintaan(); 
        $( "#simpan_item" ).prop( "disabled", false );  
        $( "#waktu" ).val("1");
        $( "#keterangan" ).val("");
        $( "#nama_kepala_unit" ).prop( "disabled", true ); 
        $( "#jumlah" ).val("");
        $( "#buat_order_baru" ).prop( "disabled", true );  
        }      
      });

    function daftar_permintaan(){
        $('#dftr_permintaan').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
        "ajax":{
          url :"../daftar_permintaan/", // json datasource
          type: "post",  // method  , by default get
          data:{no_order        :$('#no_order').val()},
          error: function(){  // error handling
            $(".dftr_permintaan-error").html("");
            $("#dftr_permintaan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#dftr_permintaan").css("display","none");
                  
          }
        }
      });  
      }

     function list_order_item(){
        $('#list_order_item').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
        "ajax":{
          url :"../list_order_item/", // json datasource
          type: "post",  // method  , by default get
          data:{no_order        :$('#no_order').val(),
                select_status   :$('#select_status option:selected').val()},
          error: function(){  // error handling
            $(".list_order_item-error").html("");
            $("#dftr_permintaan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_order_item").css("display","none");
                  
          }
        }
      });  
      }
     
     function list_order_detail(){
    $('#list_order_detail').DataTable( {
    "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
    "ajax":{
      url :"../list_order_detail/", // json datasource
      type: "post",  // method  , by default get
      data:{no_order : dtrec[1]},
      error: function(){  // error handling
        $(".list_order_detail-error").html("");
        $("#list_order_detail").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#list_order_detail").css("display","none");
        }
      }
    });   
  }

  $("#btl_order").click(function() {
    if (confirm("Apakah anda yakin menghapus order no: "+ dtrec[1]) == true) {
      
        $.ajax({  datatype: "json",data:{ no_order : dtrec[1] },
      url: "../delete_order/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);
        alert('Penghapusan order barang telah berhasil');
      }, error: function(){alert('Error Nih !!! ');}
    });     
    list_order_item();
    } 
  });

  $('#list_order_item').click(function() {   
    dtrec = $('#list_order_item').DataTable().row('.selected').data();
    list_order_detail(dtrec[1]);    
    });

   $('#list_order_detail').click(function() {   
    dtrec = $('#list_order_detail').DataTable().row('.selected').data();    
    });

  $("#hps_item_order").click(function() {
    if (confirm("Yakin menghapus barang "+dtrec[1]+" untuk order no:"+dtrec[4]) == true) {
      
        $.ajax({  datatype: "json",data:{ nama : dtrec[1],
                                          no_order : dtrec[4] },
      url: "../delete_order_detail/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);
        alert('barang '+ dtrec[1]+'yang diorder telah dihapus');
      }, error: function(){alert('Error Nih !!! ');}
    });     
    list_order_item();
    } 
  });

    $('#daftar_barang').DataTable({
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

    $('#list_kepala_unit').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
        
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
    
    $('#list_kepala_unit').click(function() {   
    dtrec = $('#list_kepala_unit').DataTable().row('.selected').data();
    $("#nama_kepala_unit").val(dtrec[1]);
    //$( "#tab_1" ).prop("class",true); 
    });


  $("#tbl_carorder").click(function() { 
    list_history_order();
  });

    function list_history_order(){
        $('#list_history_order').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
        "ajax":{
          url :"../list_history_order/", // json datasource
          type: "post",  // method  , by default get
          data:{  tgl_periode1       :$('#tgl_periode1').val(),
                  tgl_periode2       :$('#tgl_periode2').val(),
                  select_status2     :$('#select_status2 option:selected').val()},
          error: function(){  // error handling
            $(".list_history_order-error").html("");
            $("#list_history_order").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_history_order").css("display","none");   
          }
        }
      });  
      }

      $("#ctk_lembar").click(function() { 
    print();
     });

        function print(){
         // window.open( "../../../assets/jasper/report/laporan_rinap/laporan_rekap_rinap.php");
            window.open( "../../../assets/jasper/report/laporan_gdgfisioterapi/laporan_permintaangudang_fisioterapi.php");
      }




       

     

   


      

   

});

</script>
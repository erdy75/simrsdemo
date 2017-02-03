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
       Piutang Pasien
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Akutansi</a></li>
        <li class="active">Piutang Pasien</li>
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
                  <h3 class="box-title">Daftar Piutang Pasien</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">
                       <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#tab_1" data-toggle="tab">UBL (Uang Belum Lunas)</a></li>
                              <li><a href="#tab_2" data-toggle="tab">Buat UBL baru berdasarkan tagihan pasien</a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="tab_1">
                                  <div class="row">
                                   <form class="form-horizontal">
                                      <div class="box-body">
                                        <div class="col-md-4">
                                           <div class="box-body">
                                           <div class="row">
                                                        <table id="list_piutang_pasien" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>No RM</th>
                                                              <th>Nama</th>
                                                              <th>Total</th>
                                                              <th>No.Piutang</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                          </tbody>
                                                        </table>
                                            </div><hr>
                                             <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:85px;margin-bottom:25px;font-size:20px;" class="col-sm-1 control-label">Total :</label>
                                                   <label for="inputEmail3" style="margin-left:5px;width:75px;margin-bottom:25px;font-size:20px;" class="col-sm-1 control-label" id="lbl_total_piutang">Rp 0</label>
                                              </div>  
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-7" style="margin-left:85px;">
                                           <div class="box-body">
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">No.RM</label>
                                                <div class="col-lg-6" style="width:50%;">
                                                      <input type="text" class="form-control" id="no_rm" style="width:50%;" disabled="true">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Nama Lengkap</label>
                                                <div class="col-lg-6" style="width:70%;">
                                                      <input type="text" class="form-control" id="nm_lengkap" style="width:50%;" disabled="true">
                                                </div>
                                              </div>  
                                            </div>
                                             <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Alamat</label>
                                                <div class="col-lg-6" style="width:70%;">
                                                      <textarea class="form-control" rows="5" disabled="true" id="alamat_pas"></textarea>
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row">
                                              <div class="form-group">
                                                   <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Identitas Diri</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="jns_id" style="width:100%;" disabled="true">
                                                  </div>
                                                  <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="no_id" style="width:75%;" disabled="true">
                                                  </div>
                                              </div>
                                            </div> 
                                             <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Telephone</label>
                                                <div class="col-lg-6" style="width:70%;">
                                                      <input type="text" class="form-control" id="telp_pas" style="width:50%;" disabled="true">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;font-size:20px;" class="col-sm-1 control-label">Total</label>
                                                <div class="col-lg-6" style="width:70%;">
                                                      <input type="text" class="form-control" id="total_piutang" style="width:50%;" disabled="true">
                                                </div>
                                              </div>  
                                            </div>
                                            <div class="row">
                                              <div class="input-group-btn">
                                                 <button type="button" id="hps_piutang" class="btn btn-danger" style="margin-left:145px;"><i class="fa fa-fw fa-times"></i>Hapus Piutang</button>
                                                 <button type="button" id="end_piutang" class="btn btn-primary" style="margin-left:10px;"><i class="fa fa-fw fa-refresh"></i>Selesai</button>
                                              </div> 
                                            </div> <hr>         
                                           <div class="row">
                                                        <table id="list_detail_piutang" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Nama</th>
                                                              <th>Tarif Harga</th>
                                                              <th>Qty</th>
                                                              <th>Total</th>
                                                              <th>Poli/Dept</th>
                                                              <th>R.inap/Jalan</th>
                                                              <th>Last Date</th>
                                                              <th>Last User</th>
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
                                  </div>
                              </div><!-- /.tab-pane -->
  
                              <div class="tab-pane" id="tab_2">
                              <div class="row">
                                    <form class="form-horizontal">
                                      <div class="box-body">
                                        <div class="col-md-8">
                                           <div class="box-body">
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:190px;margin-bottom:10px;" class="col-sm-2 control-label">Masukkan No. Faktur</label>
                                                <div class="col-lg-6" style="width:50%;">
                                                      <input type="text" class="form-control" id="load_faktur" style="width:50%;">
                                                </div>
                                                 <div class="input-group-btn">
                                                    <button type="button" id="load_transaksi" class="btn btn-primary" style="margin-left:-150px;"><i class="fa fa-fw fa-search"></i>Load Transaksi</button>
                                                </div>
                                                <p>*) Hanya di gunakan untuk transaksi non apotek</p>
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Pasien</label>
                                                  <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="rm_pas" style="width:100%;" disabled="true">
                                                  </div>
                                                  <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="nm_pas" style="width:100%;" disabled="true">
                                                  </div>
        
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <div class="col-sm-8" style="margin-left:140px;">
                                                    <input type="text" class="form-control" id="almt_pas" style="width:100%;" disabled="true">
                                                  </div>
                                              </div>  
                                            </div>
                                             <div class="row"> 
                                              <div class="form-group">
                                                  <div class="col-sm-3" style="margin-left:140px;">
                                                    <input type="text" class="form-control" id="umur_pas" style="width:100%;" disabled="true">
                                                  </div>
                                                  <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="kel_pas" style="width:100%;" disabled="true">
                                                  </div>
                                              </div>  
                                            </div>
                                            <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Transaksi</label>
                                                  <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="jns_trsk" style="width:100%;" disabled="true">
                                                  </div>
                                                  <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="jns_pnjmn" style="width:100%;" disabled="true">
                                                  </div>
                                              </div>  
                                            </div>
                                             <div class="row"> 
                                              <div class="form-group">
                                                  <label for="inputEmail3" style="margin-left:5px;width:135px;margin-bottom:10px;" class="col-sm-1 control-label">Perawatan</label>
                                                  <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="jns_prwt" style="width:100%;" disabled="true">
                                                  </div>
                                                  <div class="col-sm-3">
                                                    <input type="text" class="form-control" id="tgl_prwt" style="width:100%;" disabled="true">
                                                  </div>
                                              </div>  
                                            </div> 
                                             <div class="row"> 
                                              <div class="form-group">
                                                 <p style="color:blue"> Buat UBL (copy) Tagihan baru berdasarkan  transaksi tersebut menggunakan kelas tarif</p>
                                                <div class="col-lg-3">
                                                       <select class="col-sm-5 form-control" id="combo_kls_trf" style="width:110%">
                                                              <option>Tarif Basic(Default)</option>
                                                              <option >KELAS 1</option>
                                                              <option>KELAS 2</option>
                                                              <option>KELAS 3</option>
                                                              <option>KELAS VIP</option>
                                                              <option>MASPION</option>
                                                              <option>HARDLENT</option>
                                                              <option>AKSES_PENSIUNAN</option>
                                                              <option>RAMAMUZA_MEDIKA</option>
                                                              <option>JAMSOSTEK</option>
                                                              <option>KARYAWAN</option>
                                                              <option>ISOLASI</option>
                                                              <option>ICU</option>
                                                              <option>PERUSAHAAN</option>
                                                          </select>
                                                </div>
                                                <div class="input-group-btn">
                                                    <button type="button" id="tbl_ubl" class="btn btn-primary" style="margin-left:50px;"><i class="fa fa-fw fa-save"></i>Generate</button>
                                                </div>
                                              </div>  
                                            </div> <hr>         
                                          </div>
                                        </div>
                                        <div class="col-md-4" style="background-color:#F0F076">
                                                 <div class="row">
                                              <div class="form-group">
                                                   <label for="inputEmail3" style="margin-left:5px;width:165px;margin-bottom:25px;" class="col-sm-1 control-label">Cari Nama / Rm</label>
                                                <div class="col-sm-4">
                                                    <input type="text" class="form-control" id="cr_no_rm" style="width:100%;">
                                                  </div>
                                                <div class="input-group-btn">
                                                    <button type="button" id="cari_coa" class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-fw fa-search"></i></button>
                                                </div>
                                                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" style="width:900px">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Cari Transaksi Pasien (Non Apotek)</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                         <table id="list_trsk_pas" class="table table-bordered table-hover display">
                                                            <thead>
                                                              <tr>
                                                                <th></th>
                                                                <th>No Kwitansi</th>
                                                                <th>No Rm</th>
                                                                <th>Nama</th>
                                                                <th>Alamat</th>
                                                                <th>Nilai (Rp)</th>
                                                                <th>Jenis Pasien</th>
                                                                <th>Penjamin</th>
                                                                <th>Tanggal</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                             <?php foreach ($dt_pasnonapoteks as $dt_pasnonapotek) { ?>
                                                              <tr>
                                                                <td> </td>
                                                                <td><?php echo $dt_pasnonapotek['faktur']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['id']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['pasien_tampil']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['alamat_tampil']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['nilai']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['KelompokBeli']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['Penjamin']; ?></td>
                                                                <td><?php echo $dt_pasnonapotek['tanggal']; ?></td>
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
                                        </div>
                                          <div class="col-sm-12">
                                            <div class="box-body">
                                              <div class="form-group">
                                                <div class="row">
                                                    <div class="box-body">
                                                        <table id="list_ubl" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Nama</th>
                                                              <th>Tarif/Harga</th>
                                                              <th>Qty</th>
                                                              <th>Total</th>
                                                              <th>Poli/Unit/Penunj.Medis</th>
                                                              <th>Dokter Pelaksana</th>
                                                              <th>Refferal</th>
                                                              <th>Date</th>
                                                              <th>User</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                        
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                    <div class="box-body">
                                                        <table id="list_ubl2" class="table table-bordered table-hover display">
                                                          <thead>
                                                            <tr>
                                                              <th></th>
                                                              <th>Nama</th>
                                                              <th>Tarif/Harga</th>
                                                              <th>Qty</th>
                                                              <th>Total</th>
                                                              <th>Poli/Unit/Penunj.Medis</th>
                                                              <th>Dokter Pelaksana</th>
                                                              <th>Refferal</th>
                                                              <th>Date</th>
                                                              <th>User</th>
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                        
                                                          </tbody>
                                                        </table>
                                                    </div>
                                                </div><hr>
                                                <div class="row">
                                                  <div class="input-group-btn">
                                                     <button type="button" id="simpan_ubl" class="btn btn-primary" style="margin-left:25px;"><i class="fa fa-fw fa-plus"></i>Simpan Sebagai UBL</button>
                                                     <button type="button" id="btl_ubl" class="btn btn-danger" style="margin-left:10px;"><i class="fa fa-fw fa-times"></i>Batal Sebagai UBL</button>
                                                  </div> 
                                                </div>  
                                                <div class="row"> 
                                                  <div class="form-group">
                                                      <label for="inputEmail3" style="margin-left:5px;width:145px;margin-bottom:10px;font-size:18px;" class="col-sm-1 control-label">Total Awal :</label>
                                                      <label for="inputEmail3" style="margin-left:5px;width:50px;margin-bottom:10px;font-size:18px" class="col-sm-1 control-label" id="total_awal">Rp.0</label>
                                                  </div>  
                                                  <div class="form-group">
                                                      <label for="inputEmail3" style="margin-left:5px;width:145px;margin-bottom:10px;font-size:18px;" class="col-sm-1 control-label">Tagihan Baru :</label>
                                                      <label for="inputEmail3" style="margin-left:5px;width:50px;margin-bottom:10px;font-size:18px" class="col-sm-1 control-label" id="tag_baru">Rp.0</label>
                                                  </div>  
                                                </div>        
                                            </div>
                                          </div>
                                        </div>
                                      </div><!-- /.box-body -->
                                   </form>
                                  </div>
                                </div>
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
var dt;
var dtrec;
$(function (){

   $('#list_piutang_pasien').click(function() {   
    dtrec = $('#list_piutang_pasien').DataTable().row('.selected').data();
    list_piutang_pasien_detail();
     $('#no_rm').val(dtrec[5]);
     $('#nm_lengkap').val(dtrec[6]);
     $('#alamat_pas').val(dtrec[7]);
     $('#jns_id').val(dtrec[8]);
     $('#no_id').val(dtrec[9]);
     $('#telp_pas').val(dtrec[10]);
     $('#total_piutang').val(dtrec[3]);
  }); 

   list_piutang_pas();

   function list_piutang_pas(){
        $('#list_piutang_pasien').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchAble: true,autoWidth:false, 
        "ajax":{
          url :"../piutang_pasien/", // json datasource
          type: "post",  // method  , by default get
          data:{},
          error: function(){  // error handling
            $(".list_piutang_pasien-error").html("");
            $("#list_piutang_pasien").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_piutang_pasien").css("display","none");
                  
          },dataSrc : function(json) { var dt =json.total; $("#lbl_total_piutang").text(dt);  return json.data; }
        }
      });  
      }

  function list_piutang_pasien_detail(){
        $('#list_detail_piutang').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,scrollX:true, searchable:true,
        "ajax":{
          url :"../list_piutang_pasien_detail/", // json datasource
          type: "POST",  // method  , by default get
          data:{
                cib : dtrec[1]},
          error: function(){  // error handling
            $(".list_detail_piutang-error").html("");
            $("#list_detail_piutang").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_detail_piutang").css("display","none");
                  
          }
        }
      });  
      }

      $('#end_piutang').click(function() {  

     $('#no_rm').val("");
     $('#nm_lengkap').val("");
     $('#alamat_pas').val("");
     $('#jns_id').val("");
     $('#no_id').val("");
     $('#telp_pas').val(""); 

    });

      $("#hps_piutang").click(function() { 
         if (confirm("Apakah anda yakin menghapus tagihan/hutang Pasien : " + dtrec[1] + " /" + dtrec[2] + " ?" ) == true) {
           if (confirm("Proses ini bersifat permanen, tekan OK untuk melanjutkan" ) == true) {
        
        $.ajax({  datatype: "json",data:{
            cib : dtrec[1]},
              url             : "../hapus_piutang/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Data transaksi telah berhasil dibatalkan / dihapus ")
      }, error: function(){alert('Error Nih !!! ');}    
    }); list_piutang_pas();

      }
    }
       
     });

    $('#list_trsk_pas').DataTable({
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

   $('#list_trsk_pas').click(function() {   
    dtrec = $('#list_trsk_pas').DataTable().row('.selected').data();
    $("#load_faktur").val(dtrec[1]);

  }); 

   $("#load_transaksi").click(function() {
         if ($("#load_faktur").val() == "" ){
        alert("Masukan No Faktur yang hendak dibuatkan tagihan (baru/copy)")
        }else {   
         $.ajax({  datatype: "json",data:{faktur:$('#load_faktur').val()},
          url: "../get_pas_nonapotek/",async: false,
          type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $('#rm_pas').val(dt[0].id); $('#nm_pas').val(dt[0].pasien_tampil); $('#almt_pas').val(dt[0].alamat_tampil); $('#umur_pas').val(dt[0].umur_tampil);$('#kel_pas').val(dt[0].sex_tampil); $('#jns_trsk').val(dt[0].KelompokBeli);$('#jns_pnjmn').val(dt[0].Penjamin);  $('#jns_prwt').val(dt[0].inap_jalan); $('#tgl_prwt').val(dt[0].tanggal);  }
          }, error: function(){alert('Error Nih !!! ');}    
        });list_detail_ubl();
       }
      });

 $("#combo_kls_trf ").select2();



  function list_detail_ubl(){

        $('#list_ubl').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchable:true,
        "ajax":{
          url :"../detail_ubl/", // json datasource
          type: "POST",  // method  , by default get
          data:{
                faktur:$('#load_faktur').val()},
          error: function(){  // error handling
            $(".list_ubl-error").html("");
            $("#list_ubl").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_ubl").css("display","none");
                  
          },dataSrc : function(json) {  dt =json.data; var dt1 =json.total_tag; $("#total_awal").text(dt1); return json.data; }
        }
      });  
      }

      $("#tbl_ubl").click(function() {
       list_detail_ubl2();
      });



  function list_detail_ubl2(){
        $('#list_ubl2').DataTable( {
        "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true, paging : true, pagelength : 10,searchable:true,
        "ajax":{
          url :"../detail_ubl2/", // json datasource
          type: "POST",  // method  , by default get
          data:{
                faktur:$('#load_faktur').val()},
          error: function(){  // error handling
            $(".list_ubl2-error").html("");
            $("#list_ubl2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
            $("#list_ubl2").css("display","none");
                  
          }
        }
      });  
      }

   $("#btl_ubl").click(function() {
       $('#load_faktur').val("");
       $('#rm_pas').val("");
       $('#nm_pas').val("");
       $('#almt_pas').val("");
       $('#umur_pas').val("");
       $('#kel_pas').val("");
       $('#jns_trsk').val("");
       $('#jns_pnjmn').val("");
       $('#jns_prwt').val("");
       $('#tgl_prwt').val("");
      });

    $("#simpan_ubl").click(function() { 
        
        $.ajax({  datatype: "json",data:{dt : dt},
              url             : "../simpan_ubl/",
        async: false, type:'POST',success: function(data){
        var dt=JSON.parse(data); alert("Faktur Tagihan berhasil disimpan, untuk Posting atau Cetak Kwitansi  harus dilakukan melalui modul kasir  ")
      }, error: function(){alert('Error Nih !!! ');}    
    });$('#load_faktur').val("");
       $('#rm_pas').val("");
       $('#nm_pas').val("");
       $('#almt_pas').val("");
       $('#umur_pas').val("");
       $('#kel_pas').val("");
       $('#jns_trsk').val("");
       $('#jns_pnjmn').val("");
       $('#jns_prwt').val("");
       $('#tgl_prwt').val("");
       
     });



 
















  



});

</script>
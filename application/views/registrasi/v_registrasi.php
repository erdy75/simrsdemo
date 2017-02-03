<?php 
$this->load->view('template/head');
?>
<head>
        <link rel="stylesheet" href="../../../assets/select2/dist/css/select2.min.css">
        <link rel="stylesheet" href="../../../assets/select2/dist/css/select2.css">
        <link rel="stylesheet" href="../../../assets/DataTables/css/jquery.dataTables.css">
        <link rel="stylesheet" href="../../../assets/DataTables/css/dataTables.tableTools.css">
        <link rel="stylesheet" href="../../../assets/DataTables/css/font-awesome.css">
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
        Registrasi Rawat Jalan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rawat Jalan</a></li>
        <li class="active">Registrasi</li>
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
                  <h3 class="box-title">Registrasi</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">No Rm</label>
                      <div class="col-sm-10" style="width:15%;">
                        <input type="text" class="form-control" id="id_pasien">
                      </div>
                      <div class="input-group-btn">
                        <button type="button" id="cari" class="btn btn-danger"><i class="fa fa-fw fa-search"></i>Cari</button>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Poli</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="poli" style="width:250px">

                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tarif</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="trf" style="width:27%;" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Dokter</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="nama_dokter" style="width:250px">

                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Kondisi Pasien</label>
                      <div class="col-sm-10" style="width:21%;">
                        <select class="form-control" id="kondisi_pasien">
                            <option>Tampak Normal</option>
                            <option>Pucat dan Lemas</option>
                            <option>Pingsan atau Tidak Sadar</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Rujukan</label>
                      <div class="col-sm-10" style="width:15%;">
                        <select class="form-control" id="rujukan">
                            <option selected="selected">Non Rujukan</option>
                            <option>Rujukan</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Asal Rujukan</label>
                      <div class="col-sm-10" style="width:25%;">
                        <input type="text" class="form-control" id="asal_rujukan" disabled="false">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="button" id="cari2" class="btn btn-default"><i class="fa fa-fw fa-refresh"></i>Ok</button>
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
                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Nama Lengkap</label>
                      <div class="col-sm-10" style="width:25%;">
                        <input type="text" class="form-control" id="nama_L" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Alamat</label>
                      <div class="col-sm-10" style="width:40%;">
                        <textarea class="form-control" rows="3" id="alamat" disabled="false"></textarea>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Identitas Diri</label>
                      <div class="col-sm-2" style="width:10%;">
                        <input type="text" class="form-control" id="id" disabled="false">
                      </div>
                      <div class="col-sm-4" style="width:30%;">
                        <input type="text" class="form-control" id="no_id" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Telephone</label>
                      <div class="col-sm-4" style="width:20%;">
                        <input type="text" class="form-control" id="tlp" disabled="false">
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">Hp</label>
                      <div class="col-sm-4" style="width:20%;">
                        <input type="text" class="form-control" id="hp" disabled="false">
                      </div>
                    </div>

                     <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-4" style="width:20%;">
                        <input type="text" class="form-control" id="jns_kel" disabled="false">
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">Darah</label>
                      <div class="col-sm-4" style="width:20%;">
                        <input type="text" class="form-control" id="drh" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tgl Lahir</label>
                      <div class="col-sm-4" style="width:20%;">
                        <input type="text" class="form-control" id="tgl_lhr" disabled="false">
                      </div>
                      <label for="inputEmail3" class="col-sm-1 control-label">Umur</label>
                      <div class="col-sm-4" style="width:20%;">
                        <input type="text" class="form-control" id="umur" disabled="false">
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Lain-lain</label>
                      <div class="col-sm-10" style="width:40%;">
                        <textarea class="form-control" rows="3" id="etc" disabled="false"></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
              </div><!-- nav-tabs-custom -->

              <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group" style="margin-bottom: 25px;">
                      <label for="inputEmail3" class="col-sm-3 control-label">Cari No.Indeks Keluarga / No Anggota </label>
                      <div class="col-sm-10" style="width:15%;">
                        <input type="text" class="form-control" id="no_indeks">
                      </div>
                      <div class="input-group-btn">
                        <button type="button" id="cari3" class="btn btn-danger"><i class="fa fa-fw fa-search"></i>Cari</button>
                      </div>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tgl Booking</label>
                      <div class="col-sm-4" style="width:20%;">
                       <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                       </div>
                              <input type="text" class="form-control"  id="tgl_booking" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
                       </div><!-- /.input group -->
                      </div>

                   <div class="form-group" style="margin-bottom: 25px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label"><input type="checkbox" id="tgl_dftr">Tgl Daftar</label>
                      <div class="col-sm-4" style="width:20%;">
                       <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                              <input type="text" class="form-control"  id="tgl_dftr1" data-inputmask="'alias': 'dd/mm/yyyy'" disabled="false"  data-mask />
                          
                       </div><!-- /.input group -->
                      </div>
                    </div>

                      <div class="form-group" style="margin-bottom: 25px;margin-left: 60px;">
                            <button type="button" class="btn btn-primary" id="tbl_booking" disabled="false">Booking</button>
                            <button type="button" class="btn btn-primary" id="tbl_dftr" disabled="false">Daftar</button>
                            <button type="button" class="btn btn-danger" id="tbl_btl" disabled="false"><i class="fa fa-fw fa-times"></i>Batal</button>
                      </div>

                       <div class="form-group" style="margin-bottom: 5px;margin-left: -46px;">
                      <label for="inputEmail3" class="col-sm-3 control-label"><input type="checkbox" id="cek_ctkstruk">Cetak Struk Antrian di Poli</label>
                      </div>

                      <div class="form-group" style="margin-bottom: 25px;margin-left: -50px;">
                      <label for="inputEmail3" class="col-sm-4 control-label"><input type="checkbox" id="byr_konsul" disabled="false">Bag.Registrasi Terima Pembayaran Konsul</label>
                      </div>

                        <div class="form-group" style="margin-bottom: 25px;margin-left: 60px;">
                            <button type="button" class="btn btn-primary" id="Kasir" >Kasir</button>
                            <button type="button" class="btn btn-primary" id="Lab" >Laboratorium</button>
                            <button type="button" class="btn btn-primary" id="radiologi" ><i class="fa fa-fw fa-times"></i>Radiologi</button>
                      </div>
                      
                     </div><!-- /.form group -->
                  </div><!-- /.box-body -->
                </form>
              </div><!-- /.box -->
              </div><!-- nav-tabs-custom -->

              <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <!-- form start -->
                <form class="form-horizontal">
                  <div class="box-body">
                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-2 control-label">Tampilkan</label>
                      <div class="col-sm-10" style="width:20%;">
                        <select class="form-control" id="combo_tampil_pas">
                            <option value=''>Antrian Pasien Hari Ini</option>
                            <option value='BOOKING'>Daftar Booking Pasien</option>
                        </select>
                      </div>
                       <label for="inputEmail3" class="col-sm-3 control-label"><input type="checkbox" id="aktf_pnggl">Aktifkan fitur panggilan pasien</label>
                    </div>

                    <div class="form-group" style="margin-bottom: 10px;margin-left: -55px;">
                      <label for="inputPassword3" class="col-sm-2 control-label">Poli/Departement</label>
                      <div class="col-sm-10">
                        <select class="form-control" id="combo_poli2" style="width:250px">

                        </select>
                      </div>
                    </div>

                      <div class="form-group" style="margin-bottom: 25px;margin-left: 10px;">
                            <button type="button" class="btn btn-primary" id="cr_pas"><i class="fa fa-fw fa-refresh"></i>Cari/Refresh</button>
                            <button type="button" class="btn btn-danger" id="panggil_pas" disabled="false"><i class="fa fa-fw fa-play"></i>Panggil</button>
                            <button type="button" class="btn btn-primary" id="ctk_struk" disabled="false"><i class="fa fa-fw fa-print"></i>Cetak Struk</button>
                            <button type="button" class="btn btn-primary" id="ctk"><i class="fa fa-fw fa-print"></i>Cetak</button>
                      </div> 

                      <div class="box-body">
                            <table id="antrian_pasien" class="table table-bordered table-hover display">
                              <thead>
                                <tr>
                                  <th></th>
                                  <th>Poli</th>
                                  <th>Urut</th>
                                  <th>Pasien</th>
                                  <th>Jam</th>
                                  <th>Jenis/Penjamin</th>
                                  <th>Dokter</th>
                                  <th>Status</th>
                                  <th>No.Reg</th>
                                </tr>
                              </thead>
                              <tbody>
                              </tbody>
                            </table>
                      </div>
                </div>
                  <div class="box-footer">
                    <div class="form-group" style="margin-bottom: 25px;margin-left: -55px;">
                      <label for="inputEmail3" class="col-sm-4 control-label"><input type="checkbox" id="cek_antrian">Batalkan Registrasi/Antrian dengan alasan</label>
                      <div class="col-sm-10" style="width:28%;">
                        <select class="form-control" id="text_alasan" disabled="false">
                            <option>--Pilih Salah Satu--</option>
                            <option>Dokter Tidak Datang</option>
                            <option>Dokter Pulang Lebih Awal</option>
                            <option>Antrian Terlalu Panjang</option>
                            <option>Pasien Meminta Ganti Poli</option>
                            <option>Petugas Salah Entri</option>
                            <option>Pasien Pulang Bukan Karena Faktor RS</option>
                        </select>
                      </div>
                      <div class="input-group-btn">
                        <button type="button" id="btl_antrian" class="btn btn-danger" disabled="false"><i class="fa fa-fw fa-times"></i>Batal</button>
                        <button type="button" id="rst_antrian" class="btn btn-danger" style="margin-left:10px" ><i class="fa fa-fw fa-refresh"></i>Reset Antrian</button>
                      </div>
                      
                    </div>
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

<script type="text/javascript">

var dtrec;
$(function (){

     

      $("#rujukan").change(function () {
            if (this.value !='Non Rujukan'){
            $( "#asal_rujukan" ).prop( "disabled", false );
          }else{
            $( "#asal_rujukan" ).prop( "disabled", true );
          }
              
          });

antrianpasien();

      $("#cari2").click(function() {
      Enable();
      });
      function Enable(){
        $( "#tbl_booking" ).prop( "disabled", false );
        $( "#tbl_dftr" ).prop( "disabled", false );
        $( "#tbl_btl" ).prop( "disabled", false );  
       }

        $("#cr_pas").click(function() {
        antrianpasien();
        });

       $("#tbl_btl").click(function() {
        Reset();  
        });
       
       function Reset(){        
       $( "#id_pasien" ).val("");     
       $( "#poli" ).text("");
       $( "#nama_dokter" ).text("");
       $( "#kondisi_pasien" ).val("Tampak Normal");
       $( "#rujukan" ).val("Non Rujukan");
       $( "#asal_rujukan" ).val("");
       $( "#nama_L" ).val("");
       $( "#alamat" ).val("");
       $( "#id" ).val("");
       $( "#no_id" ).val("");
       $( "#tlp" ).val("");
       $( "#hp" ).val("");
       $( "#jns_kel" ).val("");
       $( "#drh" ).val("");
       $( "#tgl_lhr" ).val("");
       $( "#umur" ).val("");
       $( "#etc" ).val("");
        antrianpasien('no');
       }

      $("#cek_ctkstruk").click(function() { 
        if ($( "#cek_ctkstruk" ).prop( "checked")) {
        $( "#ctk_struk" ).prop( "disabled", false );
      }else{
        $( "#ctk_struk" ).prop( "disabled", true );
      }   
      });


      $("#aktf_pnggl").click(function() { 
       if ($( "#aktf_pnggl" ).prop( "checked")) {
        $( "#panggil_pas" ).prop( "disabled", false );
      }else{
        $( "#panggil_pas" ).prop( "disabled", true );
      }   
      });


      $("#cek_antrian").click(function() { 
       if ($( "#cek_antrian" ).prop( "checked")) {
        $( "#text_alasan" ).prop( "disabled", false );
        $( "#btl_antrian" ).prop( "disabled", false );
      }else{
        $( "#text_alasan" ).prop( "disabled", true );
        $( "#btl_antrian" ).prop( "disabled", true );
      }   
      });

      $('#tgl_dftr').click (function () {
      if($('#tgl_dftr').prop('checked')) {
        alert("Info : Perhatian Anda Akan Memasukan REGISTER Tanggal Lampau");
        $( "#tgl_dftr1" ).prop( "disabled", false );
      }else {
        $( "#tgl_dftr1" ).prop( "disabled", true );
      }
      });

      $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
      $("[data-mask]").inputmask();

      $("#cari2").click(function() {
         $.ajax({  datatype: "json",data:{id_pasien:$('#id_pasien').val()},
          url: "../cari_norm/",async: false,
          type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $('#nama_L').val(dt[0].nama); $('#alamat').val(dt[0].alamat); 
          $('#id').val(dt[0].id_card); $('#no_id').val(dt[0].id_number);$('#tlp').val(dt[0].telp); $('#hp').val(dt[0].hp); 
          $('#jns_kel').val(dt[0].sex);  $('#drh').val(dt[0].darah); $('#tgl_lhr').val(dt[0].tgl_lahir); $('#umur').val(dt[0].thn); $('#etc').val(dt[0].lain_lain); }else{ alert('No Register yang anda masukan salah, format nomor adalah 100.XX.XX.XX' );}
          }, error: function(){alert('Error Nih !!! ');}    
        });
      });

  var searchTerm = null;
  var remoteDataConfig = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
        ajax: {
            url: "../get_poli/",
            dataType: 'json',type:"POST",
            data: function (term) { term['kategori']='Penunjang Medis'; term['kategori2']='Poli'; term['kategori3']='Fisioterapi';return term; },
            processResults: function (data, page) { return { results: data };
        } 
      }
  };
  $("#poli").select2(remoteDataConfig);

  $("#poli").change(function () { 
    $.ajax({  datatype: "json",
      data:{nama_poli:$("#poli option:selected").text()}, 
      url: "../tarif/",
      async: false, type:'POST',
     success: function(data){ 
      var dt=JSON.parse(data);
      $("#trf").val(dt.harga);}, 
      error: function(){alert('Error Nih !!! ');}   
    });
  });

  var searchTerm = null;
  var remoteDataConfig = {
        placeholder: "Cari Dokter...",
        minimumInputLength: 1,
        ajax: {
            url: "../get_pegawai/",
            dataType: 'json',type:"POST",
            data: function (term) {  term['poli']= $('#poli option:selected').text(); return term; },
            processResults: function (data, page) { return { results: data };
        } 
      }
  };
  $("#nama_dokter").select2(remoteDataConfig);
    
   var searchTerm = null;
   var remoteDataConfig = {
        placeholder: "Cari Poli...",
        minimumInputLength: 1,
        ajax: {
            url: "../get_poli/",
            dataType: 'json',type:"POST",
            data: function (term) { term['kategori']='Penunjang Medis'; term['kategori2']='Poli'; term['kategori3']='Fisioterapi';return term; },
            processResults: function (data, page) { return { results: data };
        } 
      }
  };
  $("#combo_poli2").select2(remoteDataConfig);

   $("#tbl_dftr").click(function() { 
      if ($("#poli option:selected").text() == "" )   {
        alert("Masukan Poli yang dituju")
      } else if ($("#nama_dokter option:selected").text() == "") {
        alert("Masukan nama dokter, atau isilah Dr penanggungjawabnya") 
      } else {  
        $.ajax({ dataType       : "json",
                data:{
                id_pasien       :$('#id_pasien').val(),
                poli            :$('#poli option:selected').text(),
                nama_dokter     :$('#nama_dokter option:selected').text(),
                rujukan         :$('#rujukan option:selected').text(),
                asal_rujukan    :$('#asal_rujukan').val(),
                kondisi_pasien  :$('#kondisi_pasien option:selected').text()},   
                url             : "../daftar_pasien/",
                async           : false, 
                type            :'POST',
                success: function(data){ 
                var dt=JSON.parse(data);
                alert('Pendaftaran Pasien Telah Sukses'); 
                }, error: function() {alert('Error Nih !!! ');}    
        }); antrianpasien();
            Reset(); 
        $( "#tbl_dftr" ).prop( "disabled", true );  
        $( "#asal_rujukan" ).prop( "disabled", true ); 
      }
      });

   $("#tbl_booking").click(function() {
      if ($("#poli option:selected").text() == "" )   {
        alert("Masukan Poli yang dituju")
      } else if ($("#nama_dokter option:selected").text() == "") {
        alert("Masukan nama dokter, atau isilah Dr penanggungjawabnya") 
      } else {   
        $.ajax({  datatype        : "json",data: {
                  id_pasien       :$('#id_pasien').val(),
                  poli            :$('#poli option:selected').text(),
                  nama_dokter     :$('#nama_dokter option:selected').text(),
                  rujukan         :$('#rujukan option:selected').text(),
                  asal_rujukan    :$('#asal_rujukan').val(),
                  kondisi_pasien  :$('#kondisi_pasien option:selected').text()}, 
                  url             : "../booking_pasien/",
                  async           : false, 
                  type            :'POST',
                  success: function(data){ if (data=='Oke') { alert('Booking Pasien Berhasil');}  
                }, error: function() {alert('Error Nih !!! ');}    
    });antrianpasien(); 
       Reset(); 
    $( "#tbl_booking" ).prop( "disabled", true );  
     $( "#asal_rujukan" ).prop( "disabled", true );       
    }
  });
   
  function antrianpasien(){
    $('#antrian_pasien').DataTable( {
    "destroy": true,"processing": true, "serverSide": true, select : true, searching: true, ordering: true,pagelength:10, paging:true, searchable:true,
    "ajax":{
      url :"../antrianpasien/", // json datasource
      type: "post",  // method  , by default get
      data:{ combo_tampil_pas            :$('#combo_tampil_pas option:selected').val(),
             combo_poli2                 :$('#combo_poli2 option:selected').text()},
      error: function(){  // error handling
        $(".antrian_pasien-error").html("");
        $("#antrian_pasien").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
        $("#antrian_pasien_processing").css("display","none");
              
      }
    }
  });  
  }

  $('#antrian_pasien').click(function(){
    dtrec = $('#antrian_pasien').DataTable().row('.selected').data(); 
    console.log(dtrec)
  });

 $("#panggil_pas").click(function() {

       $.ajax({   datatype         : "json",data: {
                  status           : dtrec[7],
                  id_pasien        : dtrec[9],
                  no_urut          : dtrec[2],
                  poli             : dtrec[1],
                  nama_dokter      : dtrec[6]}, 
                  url              : "../update_pasien/",
                  async            : false, 
                  type             :'POST',
                  success: function(data){if (data=='Oke') { alert('Pendaftaran Pasien Telah Sukses');
                   antrianpasien();  
                }   
                  }, error: function() {alert('Error Nih !!! ');}    
    });
    
  });

    
   $("#btl_antrian").click(function() {
    if($("#text_alasan").val() == "--Pilih Salah Satu--"){
      alert("Masukan alasan pembatalan Antrian/Registrasi") 
    } else { 
      if(confirm("Anda yakin menghapus registrasi/antrian pasien ?")==true);{
      $.ajax({ dataType                : "json",
                data:{
                text_alasan            :$('#text_alasan option:selected').text(),
                id_pasien              : dtrec[9],
                poli                   : dtrec[1],
                no_urut                : dtrec[2],
                no_upf                 : dtrec[10]},  
                url                    : "../batal_antrian/",
                async                  : false, 
                type                   :'POST',
                success: function(data){ if (data=='Oke') { alert('Data Telah Di Batalkan');} antrianpasien();     
                }, error: function() {alert('Error Nih !!! ');} 
        });
    }
  }

  });

   $("#rst_antrian").click(function() {
    if (confirm("Anda Yakin menghapus (Reset) antrian pasien hari ini?") == true) {

        $.ajax({  
                  datatype: "json",
                  data:{},
                  url: "../reset_antrian/",
                  async: false, 
                  type:'POST'
    });antrianpasien();   
    }
    });

    $('#ctk').click(function() { 
    Print();    
    }); 

  function Print(){ 
    var win = "../../../assets/jasper/report/laporan_regjalan/antrian_pasien.php?id_pasien="+dtrec[9]+"";
    window.open(win); 
  }





   

});

</script>
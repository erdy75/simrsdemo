<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Kirim Inventaris</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Kirim Inventaris</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Begin Table -->
      <div class="col-md-12">
        <div class="box box-success">

          <!-- begin box-header -->
          <div class="box-header">
            <h3 class="box-title">Kirim Inventaris</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div id="info"></div>
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body">
            <div class="row">

              <!-- begin show Kirim Inventaris -->
              <div class="col-md-12">
                <table width="100%">
                  <tbody>
                    <tr>
                      <td style="padding:5px;font-weight:bold;">No Pengiriman : </td>
                      <td style="padding:5px;">
                        <input type="text" class="new-form-control readonly" name="no_pengiriman" value="~ Auto Number ~" readonly="true">
                      </td>
                      <td style="padding:5px;">Nama Barang : </td>
                      <td style="padding:5px;">
                        <input type="text" name="nama" class="new-form-control readonly" readonly="true" style="width:250px;">
                        <button type="button" class="btn btn-info btn-sm" id="cari_nama" data-toggle="modal" data-target="#modal_cari_barang">
                          <i class="fa fa-fw fa-search"></i>
                        </button>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;font-weight:bold;">Poli Tujuan : </td>
                      <td style="padding:5px;">
                        <select class="new-form-control readonly" name="poli_tujuan" id="poli_tujuan">
                          <option value="*">Pilih Salah Satu</option>
                          <?php for ($i=0; $i < count($list_poli) ; $i++) { ?>
                            <option value="<?=$list_poli[$i]['nama']?>"><?=$list_poli[$i]['nama']?></option>
                          <?php } ?>
                        </select>
                      </td>
                      <td style="padding:5px;">Harga Satuan : </td>
                      <td style="padding:5px;">
                        <input type="text" class="new-form-control" name="harga_satuan"> 
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;font-weight:bold;">Catatan : </td>
                      <td style="padding:5px;">
                        <input type="text" class="new-form-control" name="catatan"> 
                      </td>
                      <td style="padding:5px;">Warna : </td>
                      <td style="padding:5px;">
                        <input type="text" class="new-form-control" name="warna"> 
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Tanggal Lampau : </td>
                      <td style="padding:5px;">
                        <input type="text" class="new-form-control readonly" name="tgl_lampau" readonly="true" value="<?=date('d-m-Y')?>">
                      </td>
                      <td style="padding:5px;">Umur Barang : </td>
                      <td style="padding:5px;">
                        <input type="hidden" name="satuan">
                        <input type="text" class="new-form-control" name="umur_barang"> Tahun 
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;">Batch : </td>
                      <td style="padding:5px;">
                        <input type="text" class="new-form-control" name="batch" style="width:250px;"> 
                      </td>
                    </tr> 
                    <tr>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;"></td>

                      <td style="padding:5px;">Spesifikasi : </td>
                      <td style="padding:5px;">
                        <textarea name="spesifikasi" class="new-form-control" style="margin: 0px; height: 104px; width: 289px;"></textarea> 
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;" colspan="4">
                        <button type="button" class="btn btn-success btn-sm" id="btn_plus">
                          <i class="fa fa-fw fa-plus"></i>
                          Tambah   
                        </button>
                      </td>
                    </tr>                          
                  </tbody>
                </table>                      
              </div> 
              <div class="col-md-12" id="show_list2">
                <table id="table_show_input" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Harga Satuan</th>
                      <th>Warna</th>
                      <th>Spesifikasi Teknis</th>
                      <th>Barch</th>
                      <th>Umur Barang</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12">
                <button type="button" class="btn btn-info btn-sm" id="btn_simpan"> 
                  Kirim
                </button>
                <button type="button" class="btn btn-info btn-sm" id="btn_batal">
                  Batal
                </button>                 
              </div>
              <!-- end kirim list Inventaris-->


            </div>
          </div>
          <!-- end box-body -->

        </div>

      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<div id="modal_cari_barang" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nama Barang</h4>
      </div>
      <div class="modal-body" id="show_modals">
      </div>
      <div class="modal-footer">
        <input type="text" class="new-form-control" name="nama_v2">
        <button type="button" class="btn btn-info btn-sm" id="update_batch" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$("li#kirim-ke-unit").addClass('active');
$("li#kirim-inventaris").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');
$(".kirim_Inventaris").hide();

$("#cari_nama").click(function(event) {
  var nama = $("input[name=nama]").val();
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/kartu_stock/ajax_nama_barang",
    success: function(msg) {
      $("div#show_modals").html(msg);
    }
  }); 
});

$("input[name=nama_v2]").keyup(function(event) {
    var nama = $(this).val();
    $.ajax({
      type: "POST",
      data: "ajax=1&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/kartu_stock/ajax_nama_barang",
      success: function(msg) {
        $("div#show_modals").html(msg);
      }
    });
});

$("[data-mask]").inputmask();

$('input[name=tgl_expired]').datepicker({
  format: 'dd-mm-yyyy'
});
$("input[name=umur_barang]").click(function(event) {
  var nama = $("input[name=nama]").val();
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/kirim_inventaris/ajax_barang_info",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});
$("#btn_plus").click(function(event) {
  var nama_barang = $("input[name=nama]").val();
  var harga_satuan = $("input[name=harga_satuan]").val();
  var warna = $("input[name=warna]").val();
  var spesifikasi = $("textarea[name=spesifikasi]").val();
  var batch = $("input[name=batch]").val();
  var umur_barang = $("input[name=umur_barang]").val();
  var satuan = $("input[name=satuan]").val();
  var text = '';
  var textalert = '';

  if(harga_satuan=='')
  {
    harga_satuan = "0";
  }
  var textvalue = nama_barang+"###"+harga_satuan+"###"+warna+"###"+spesifikasi+"###"+batch+"###"+umur_barang+"###"+satuan;
  if(nama_barang=='')
  {
    textalert += "Harap pilih barang terlebih dahulu..\n ";
  }

  if(umur_barang=='')
  {
    textalert += "Harap isi umur barang satuan ..\n ";
  }


  if(textalert==''){
    text += '<tr class="list_barang">';
    text += '<td>'+nama_barang+'</td>';
    text += '<td>'+harga_satuan+'</td>';
    text += '<td>'+warna+'</td>';
    text += '<td>'+spesifikasi+'</td>';
    text += '<td>'+batch+'</td>';
    text += '<td>'+umur_barang+'</td>';
    text += '<td>';
    text += '<button type="button" class="btn btn-danger btn-sm btn_minus"><i class="fa fa-fw fa-trash"></i></button>';
    text += '<input type="hidden" name="data_bundle[]" class="data_bundle" value="'+textvalue+'">';
    text += '</td>';
    text += '</tr>';
    $("#table_show_input").append(text);
    $("input[name=nama]").val("");
    $("input[name=harga_satuan]").val("");
    $("input[name=warna]").val("");
    $("textarea[name=spesifikasi]").text("");
    $("input[name=batch]").val("");
    $("input[name=umur_barang]").val("");
  } else {
    alert(textalert);
  }
});

$("#table_show_input").on('click','.btn.btn-danger.btn-sm.btn_minus',function(){
  $(this).parent().parent().remove();
});

$("#btn_simpan").click(function(event) {
  var tgl_lampau = $("input[name=tgl_lampau]").val();
  var poli_tujuan = $("select[name=poli_tujuan]").val();
  var catatan = $("input[name=catatan]").val();
  var data_bundle = "0";
  $("input.data_bundle").each(function(index, value) {
    var a = $(this).val();
    data_bundle += '~~~' + a;
  });
  var textalert = '';
  var text = ''; 
  if(poli_tujuan=='*') {
    textalert += 'Harap Memilih poli tujuan...!!! \n ';
  }
  if(data_bundle=='0') {
    textalert += 'Harap Mengisi barang yang akan dikirim...!!! \n '; 
  }

  if(textalert=='')
  {
    text += "&tgl_lampau="+tgl_lampau;
    text += "&poli_tujuan="+poli_tujuan;
    text += "&catatan="+catatan; 
    text += "&data_bundle="+data_bundle; 
    $.ajax({
      type: "POST",
      data: "ajax=1"+text,
      url: "<?=base_url()?>index.php/gudang_logistik/kirim_inventaris/insert_kirim_inven",
      dataType: "html",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
    $("input[name=nama]").val("");
    $("input[name=harga_satuan]").val("");
    $("input[name=warna]").val("");
    $("textarea[name=spesifikasi]").val("");
    $("input[name=batch]").val("");
    $("input[name=umur_barang]").val("");
    $("input[name=catatan]").val("");
    $("input[name=tgl_lampau]").val("<?=date('d-m-Y')?>"); 
    $("tr.list_barang").remove();
    $("select[name=poli_tujuan]").val("*");
  } else {
    alert(textalert+'###'+data_bundle);
  }
 
});
$("#btn_batal").click(function(event) {
  $("input[name=nama]").val("");
  $("input[name=harga_satuan]").val("");
  $("input[name=warna]").val("");
  $("textarea[name=spesifikasi]").val("");
  $("input[name=batch]").val("");
  $("input[name=umur_barang]").val("");
  $("input[name=catatan]").val("");
  $("input[name=tgl_lampau]").val("<?=date('d-m-Y')?>"); 
  $("tr.list_barang").remove();
  $("select[name=poli_tujuan]").val("*");;  
});

</script>
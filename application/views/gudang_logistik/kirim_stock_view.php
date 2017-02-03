<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Kirim Stock</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Kirim Stock</a></li>
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
            <h3 class="box-title">Kirim Stock</h3>
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
              <div col="col-md-12" style="padding:15px;">
                <button type="button" class="btn btn-info btn-sm" id="btn_tampil_stock">
                  Tampil List Stock Barang
                </button>
                <button type="button" class="btn btn-info btn-sm" id="btn_kirim_stock">
                  Kirim Stock Barang
                </button>
              </div>

              <!-- begin show list Stock -->
              <div class="col-md-12 list_stock">
                <table style="width:100%;">
                  <tbody>
                  <tr>
                    <td width="50%" valign="top">
                      <table>
                        <tbody>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;">Daftar Pesanan Dari Poli / Unit : </td>
                            <td style="padding:5px;">
                              <select  class="new-form-control" name="pesanan_poli" id="pesanan_poli">
                                <option value="*">SEMUA TAMPIL</option>
                                <?php for ($i=0; $i < count($list_poli) ; $i++) { ?>
                                  <option value="<?=$list_poli[$i]['nama']?>"><?=$list_poli[$i]['nama']?></option>
                                <?php } ?>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>                      
                    </td>
                    <td width="50%" valign="top">
                    </td>
                  </tr>
                  <tr>
                    <td width="50%" valign="top" id="data_detail_gudang" colspan="2">
                      <button type="button" class="btn btn-info btn-sm" id="btn_cari_list_stock">
                        <i class="fa fa-fw fa-refresh"></i>
                        Cari
                      </button>
                    </td>                                        
                  </tr>
                  </tbody>
                </table>
              </div> 
              <div class="col-md-12 list_stock" id="show_list1">
              </div>
              <!-- end  show list Stock-->

              <!-- begin show Kirim Stock -->
              <div class="col-md-12 kirim_stock">
                <table style="width:100%;">
                  <tbody>
                  <tr>
                    <td width="70%" valign="top">
                      <table>
                        <tbody>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;">No Pengiriman : </td>
                            <td style="padding:5px;">
                              <input type="text" class="new-form-control readonly" name="no_pengiriman" value="~ Auto Number ~" readonly="true">
                            </td>
                            <td style="padding:5px;"><input type="checkbox" name="cek_tgl_kirim"> Tanggal Kirim : </td>
                            <td style="padding:5px;">
                              <input type="text" class="new-form-control readonly" name="tgl_kirim" readonly="true" value="<?=date('d-m-Y')?>" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;">Poli Tujuan : </td>
                            <td style="padding:5px;" colspan="3">
                              <select class="new-form-control readonly" name="poli_tujuan" id="poli_tujuan">
                                <option value="*">Pilih Salah Satu</option>
                                <?php for ($i=0; $i < count($list_poli) ; $i++) { ?>
                                  <option value="<?=$list_poli[$i]['nama']?>"><?=$list_poli[$i]['nama']?></option>
                                <?php } ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;"></td>
                            <td style="padding:5px;" colspan="3">
                              <input type="radio" name="pilihan" value="1" checked="true"> Apotek Back Office  
                              <input type="radio" name="pilihan" value="2"> Apotek Front Office (Pelayana Penuh) 
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;">Catatan</td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="catatan"> 
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold">Nama Barang : </td>
                            <td style="padding:5px;">
                              <input type="text" name="nama" class="new-form-control readonly" readonly="true" style="width:250px;">
                            </td>
                            <td style="padding:5px;" colspan="2">
                              <button type="button" class="btn btn-info btn-sm" id="cari_nama" data-toggle="modal" data-target="#modal_cari_barang">
                                <i class="fa fa-fw fa-search"></i>
                              </button>           
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;">Jumlah Dikirim : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="jumlah_dikirim">
                              <input type="hidden" name="satuan_h"> 
                              <label id="satuan">[satuan]</label>&nbsp;<label id="stock_kurang"></label>
                            </td>
                          </tr> 
                          <tr>
                            <td style="padding:5px;">Harga Satuan : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="harga_satuan"> 
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;">Expired : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control readonly" name="tgl_expired"  readonly="true" value="<?=date('d-m-Y')?>" 
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;">Batch : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="batch" style="width:250px;"> 
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
                    </td>
                    <td width="30%" valign="top">
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div> 
              <div class="col-md-12 kirim_stock" id="show_list2">
                <table id="table_show_input" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Item</th>
                      <th>Qty</th>
                      <th>Harga (Rp)</th>
                      <th>Batch No</th>
                      <th>Satuan</th>
                      <th>Kel Stock</th>
                      <th>Expired</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <div class="col-md-12 kirim_stock">
                <button type="button" class="btn btn-info btn-sm" id="btn_kirim">
                  <i class="fa fa-fw fa-shopping-cart"></i>  
                  Kirim
                </button>
                <button type="button" class="btn btn-info btn-sm" id="btn_tidak_kirim">
                  <i class="fa fa-fw fa-shopping-cart"></i>
                  <i class="fa fa-fw fa-close"></i>  
                  Batal
                </button>                 
              </div>
              <!-- end kirim list Stock-->


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
$("li#kirim-stock").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');
$(".kirim_stock").hide();

$("#btn_tampil_stock").click(function(event) {
  $(".list_stock").show();
  $(".kirim_stock").hide();
});
$("#btn_kirim_stock").click(function(event) {
  $(".list_stock").hide();
  $(".kirim_stock").show();
});
$.ajax({
  type: "POST",
  data: "ajax=1&",
  url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/ajax_kirim_stock",
  success: function(msg) {
    $("div#show_list1").html(msg);
  }
});

$('#btn_cari_list_stock').click(function(event) {
var unit = $("select#pesanan_poli").val();

  $.ajax({
    type: "POST",
    data: "ajax=1&unit="+unit,
    url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/ajax_kirim_stock",
    success: function(msg) {
      $("div#show_list1").html(msg);
    }
  });     
});

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
$("input[name=jumlah_dikirim]").click(function(event) {
  var nama = $("input[name=nama]").val()
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/ajax_barang_info",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });
});
$('input[name=tgl_expired]').datepicker({
  format: 'dd-mm-yyyy'
});

$("#btn_plus").click(function(event) {
  var nama_barang = $("input[name=nama]").val();
  var jumlah_dikirim = $("input[name=jumlah_dikirim]").val();
  var harga_satuan = $("input[name=harga_satuan]").val();
  var batch = $("input[name=batch]").val();
  var satuan_h = $("input[name=satuan_h]").val();
  var tgl_expired = $("input[name=tgl_expired]").val();
  var text = '';
  var textalert = '';
  var textvalue = nama_barang+"###"+jumlah_dikirim+"###"+harga_satuan+"###"+batch+"###"+satuan_h+"###"+tgl_expired;
  if(nama_barang=='')
  {
    textalert += "Harap pilih barang terlebih dahulu..\n ";
  }
  if(batch=='')
  {
    textalert += "Harap isi batch terlebih dahulu..\n ";
  }
  if(jumlah_dikirim=='')
  {
    textalert += "Harap isi jumlah ..\n ";
  }
  if(harga_satuan=='')
  {
    textalert += "Harap isi harga satuan ..\n ";
  }


  if(textalert==''){
    text += '<tr class="list_barang">';
    text += '<td>'+nama_barang+'</td>';
    text += '<td>'+jumlah_dikirim+'</td>';
    text += '<td>'+harga_satuan+'</td>';
    text += '<td>'+batch+'</td>';
    text += '<td>'+satuan_h+'</td>';
    text += '<td>GUDANG MEDIS</td>';
    text += '<td>'+tgl_expired+'</td>';
    text += '<td>';
    text += '<button type="button" class="btn btn-danger btn-sm btn_minus"><i class="fa fa-fw fa-trash"></i></button>';
    text += '<input type="hidden" name="data_bundle[]" class="data_bundle" value="'+textvalue+'">';
    text += '</td>';
    text += '</tr>';
    $("#table_show_input").append(text);
    $("input[name=nama]").val("");
    $("input[name=jumlah_dikirim]").val("");
    $("input[name=harga_satuan]").val("");
    $("input[name=batch]").val("");
    $("input[name=satuan_h]").val("");
    $("input[name=tgl_expired]").val("<?=date('d-m-Y')?>");
  } else {
    alert(textalert);
  }
});

$("#table_show_input").on('click','.btn.btn-danger.btn-sm.btn_minus',function(){
  $(this).parent().parent().remove();
});

$("#btn_kirim").click(function(event) {
  var tgl_kirim = $("input[name=tgl_kirim]").val();
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
  if(data_bundle=='') {
    textalert += 'Harap Mengisi barang yang akan dikirim...!!! \n '; 
  }

  if(textalert=='')
  {
    text += "&tgl_kirim="+tgl_kirim;
    text += "&poli_tujuan="+poli_tujuan;
    text += "&catatan="+catatan; 
    text += "&data_bundle="+data_bundle; 
    $.ajax({
      type: "POST",
      data: "ajax=1"+text,
      url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/insert_kirim_stock",
      dataType: "html",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    alert(textalert+'###'+data_bundle);
  }
  $("input[name=nama]").val("");
  $("input[name=jumlah_dikirim]").val("");
  $("input[name=harga_satuan]").val("");
  $("input[name=batch]").val("");
  $("input[name=satuan_h]").val("");
  $("input[name=tgl_expired]").val("<?=date('d-m-Y')?>"); 
  $("tr.list_barang").remove();
  $("select[name=poli_tujuan]").val("*"); 
});
$("#btn_tidak_kirim").click(function(event) {
  $("input[name=nama]").val("");
  $("input[name=jumlah_dikirim]").val("");
  $("input[name=harga_satuan]").val("");
  $("input[name=batch]").val("");
  $("input[name=satuan_h]").val("");
  $("input[name=tgl_expired]").val("<?=date('d-m-Y')?>"); 
  $("tr.list_barang").remove();
  $("select[name=poli_tujuan]").val("*"); 
  $("input[name=catatan]").val("");  
});

</script>
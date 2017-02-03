<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Penyerahan Retur Supplier</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Penyerahan Retur Supplier</a></li>
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
            <h3 class="box-title">Penyerahan Retur Supplier</h3>
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
                <table>
                  <tbody>
                    <tr>
                      <td style="padding:5px;font-weight:bold;">Pilihan : </td>
                      <td style="padding:5px;">
                        <select name="pilihan" class="new-form-control readonly">
                          <option value="baru">Baru</option>
                          <option value="koreksi">Koreksi</option>
                        </select>
                      </td>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;">
                      </td>
                    </tr>
                    <tr id="baru">
                      <td style="padding:5px;font-weight:bold;">No Retur : </td>
                      <td style="padding:5px;">
                        <input type="text" name="no_retur" class="new-form-control readonly" value="~AUTO NUMBER~" readonly="true">
                        <button type="button" class="btn btn-success btn-sm" id="proses_baru">Proses Baru</button>
                      </td>
                      <td style="padding:5px;"></td>
                      <td style="padding:5px;">
                      </td>
                    </tr>
                    <tr id="koreksi">
                      <td style="padding:5px;font-weight:bold;">Koreksi Retur : </td>
                      <td style="padding:5px;">
                        <input type="text" name="koreksi_retur" class="new-form-control readonly">
                        <button type="button" class="btn btn-info btn-sm" id="cari_retur_supp" data-toggle="modal" data-target="#modal_retur_supp" readonly="true">
                          <i class="fa fa-fw fa-search"></i>
                        </button>
                        <button type="button" class="btn btn-success btn-sm" id="btn_koreksi">Koreksi</button>
                      </td>
                      <td style="padding:5px;">
                        
                      </td>
                      <td style="padding:5px;">
                      </td>
                    </tr>                        
                  </tbody>
                </table>

                <table width="100%" class="show_detail_retur">
                  <tr>
                    <td width="50%" valign="top">
                      <table>
                        <tr>
                          <td style="padding:5px;font-weight:bold;">Supplier : </td>
                          <td style="padding:5px;">
                            <select name="nama_supplier" class="new-form-control">
                            <?php for ($i=0; $i < count($list_supplier); $i++) { ?>
                              <option value="<?=$list_supplier[$i]['nama']?>"><?=$list_supplier[$i]['nama']?></option>
                            <?php } ?>
                            </select>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:5px;">Diterima Oleh : </td>
                          <td style="padding:5px;">
                            <input type="text" name="diterima_oleh" class="new-form-control" style="width:300px;">
                          </td>
                        </tr>
                        <tr>
                          <td style="padding:5px;">Catatan : </td>
                          <td style="padding:5px;">
                            <textarea type="text" name="catatan" class="new-form-control" style="margin: 0px; height: 111px; width: 340px;">
                            </textarea>
                          </td>
                        </tr>
                      </table>                      
                    </td>
                    <td width="50%" valign="top">
                      <table>
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
                              <label id="satuan">[satuan]</label>&nbsp;<label id="stock_kurang" style="display:none;"></label>
                            </td>
                          </tr> 
                          <tr>
                            <td style="padding:5px;">Harga retur : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="harga_retur"> 
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;">Alasan di Retur : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="alasan_di_retur" style="width:300px;"> 
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;">Batch : </td>
                            <td style="padding:5px;" colspan="3">
                              <input type="text" class="new-form-control" name="batch" style="width:300px;"> 
                            </td>
                          </tr>
                      </table>  
                    </td>
                  </tr>
                  <tr>
                    <td style="padding:5px;" colspan="2">
                      <button type="button" class="btn btn-success btn-sm" id="btn_plus">
                        <i class="fa fa-fw fa-plus"></i>
                        Tambah   
                      </button>
                    </td>
                  </tr>
                </table>                      
              </div> 
              <div class="col-md-12 show_detail_retur">  
                <table id="retur_detail" class="table">
                  <thead>
                    <tr>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Harga</th>
                      <th>Batch</th>
                      <th>Alasan Retur</th>
                      <th></th>
                    </tr>
                  </thead>
                </table>            
              </div>
              <div class="col-md-12 show_detail_retur">
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
        <h5 style="display:inline;">Cari Nama Barang : </h5>
        <input type="text" class="new-form-control" name="nama_v2">
      </div>
      <div class="modal-body" id="show_modals">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<div id="modal_retur_supp" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Retur Supplier</h4>
      </div>
      <div class="modal-body" id="show_retur_supp">
      </div>
      <div class="modal-footer">
        <input type="text" class="new-form-control" name="nama_v2">
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
$("li#retur-supplier").addClass('active');
$("li#penyerahan_retur_supplier").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');
$("#koreksi").hide();
$(".show_detail_retur").hide();

$("select[name=pilihan]").change(function(event) {
  if($(this).val()=='koreksi') {
    $("#koreksi").show();
    $("#baru").hide();
    $("input[name=no_retur]").val("~AUTO NUMBER~");
  } else {
    $("#koreksi").hide();
    $("#baru").show();
    $("input[name=koreksi_retur]").val("");    
  }
});

$("#cari_retur_supp").click(function(event) {
  $.ajax({
    type: "POST",
    data: "ajax=1",
    url: "<?=base_url()?>index.php/gudang_logistik/penyerahan_retur_supplier/ajax_retur_supplier",
    success: function(msg) {
      $("div#show_retur_supp").html(msg);
    }
  }); 
});

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

$("#proses_baru").click(function(event) {
  $("#cari_retur_supp").attr('disabled', 'true');
  $("#btn_koreksi").attr('disabled', 'true');
  $("select[name=pilihan]").attr('disabled', 'true');
  $(".show_detail_retur").show();
  $(this).attr('disabled', 'true');
  $.ajax({
    type: "POST",
    data: "ajax=1",
    url: "<?=base_url()?>index.php/gudang_logistik/penyerahan_retur_supplier/new_no_faktur",
    success: function(msg) {
      $("div#info").html(msg);
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

$("#btn_batal").click(function(event) {
  $("#cari_retur_supp").removeAttr('disabled');
  $("#btn_koreksi").removeAttr('disabled');
  $("select[name=pilihan]").removeAttr('disabled');
  $("#proses_baru").removeAttr('disabled'); 
  $("input[name=no_retur]").val("~AUTO NUMBER~");
  $("select[name=nama_supplier]").val("ACACIA, PT");
  $("input[name=diterima_oleh]").val("");
  $("textarea[name=catatan]").val("");
  $("input[name=koreksi_retur]").val("");
  $("input[name=nama]").val("");
  $("label#satuan").text("[satuan]");
  $("input[name=jumlah_dikirim]").val("");
  $("input[name=harga_retur]").val("");
  $("input[name=alasan_di_retur]").val("");
  $("input[name=batch]").val(""); 
  $(".show_detail_retur").hide();
  $("tr.list_barang").remove();
});

$("#btn_simpan").click(function(event) {
  var no_retur = $("input[name=no_retur]").val();
  var nama_supplier = $("select[name=nama_supplier]").val();
  var diterima_oleh = $("input[name=diterima_oleh]").val();
  var catatan = $("textarea[name=catatan]").val(); 
  var data_bundle = "0";
  $("input.data_bundle").each(function(index, value) {
    var a = $(this).val();
    data_bundle += '~~~' + a;
  });

  var text = '';
  text += "&no_retur="+no_retur;
  text += "&nama_supplier="+nama_supplier;
  text += "&diterima_oleh="+diterima_oleh; 
  text += "&catatan="+catatan; 
  text += "&data_bundle="+data_bundle; 
  $.ajax({
    type: "POST",
    data: "ajax=1"+text,
    url: "<?=base_url()?>index.php/gudang_logistik/penyerahan_retur_supplier/insert_retur",
    dataType: "html",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });
  

});

function tambah_baris()
{
  var nama_barang = $("input[name=nama]").val();
  var jumlah_dikirim = $("input[name=jumlah_dikirim]").val();
  var satuan_h = $("input[name=satuan_h]").val();
  var harga_satuan = $("input[name=harga_retur]").val();
  var batch = $("input[name=batch]").val();
  var alasan_di_retur = $("input[name=alasan_di_retur]").val();
  var text = '';
  var textalert = '';
  var textvalue = nama_barang+"###"+jumlah_dikirim+"###"+satuan_h+"###"+harga_satuan+"###"+batch+"###"+alasan_di_retur;
  text += '<tr class="list_barang">';
  text += '<td>'+nama_barang+'</td>';
  text += '<td>'+jumlah_dikirim+'</td>';
  text += '<td>'+satuan_h+'</td>';
  text += '<td>'+harga_satuan+'</td>';
  text += '<td>'+batch+'</td>';
  text += '<td>'+alasan_di_retur+'</td>';
  text += '<td>';
  text += '<button type="button" class="btn btn-danger btn-sm btn_minus"><i class="fa fa-fw fa-trash"></i></button>';
  text += '<input type="hidden" name="data_bundle[]" class="data_bundle" value="'+textvalue+'">';
  text += '</td>';
  text += '</tr>';
  $("#retur_detail").append(text);
  $("input[name=nama]").val("");
  $("label#satuan").text("[satuan]");
  $("input[name=jumlah_dikirim]").val("");
  $("input[name=harga_retur]").val("");
  $("input[name=alasan_di_retur]").val("");
  $("input[name=batch]").val("");   
}

$("#retur_detail").on('click','.btn.btn-danger.btn-sm.btn_minus',function(){
  $(this).parent().parent().remove();
});

$("#btn_plus").click(function(event) {
  var text = '';
  var supplier = $("select[name=nama_supplier]").val();
  var barang = $("input[name=nama]").val();
  if($("input[name=diterima_oleh]").val()==""){
    text += 'Harap isi kolom diterima oleh... \n';
  }
  if($("input[name=nama]").val()==""){
    text += "Harap isi kolom Nama Barang... \n";
  }
  if($("input[name=jumlah_dikirim]").val()==""){
    text += "Harap isi kolom Jumlah di Kirim... \n";
  }
  if($("input[name=harga_retur]").val()==""){
    text += "Harap isi kolom Harga Retur... \n";
  }
  if($("input[name=alasan_di_retur]").val()==""){
    text += "Harap isi kolom Alasan Retur... \n";
  }
  if($("input[name=batch]").val()==""){
    text += "Harap isi kolom Batch... \n";
  }
  if(text != "") {
    alert(text);
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&supplier="+supplier+"&barang="+barang,
      url: "<?=base_url()?>index.php/gudang_logistik/penyerahan_retur_supplier/cek_supplier",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});
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
</script>
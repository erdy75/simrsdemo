<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Pemriksaan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Pemeriksaan</a></li>
      <li class="active">Daftar Pasien Laboratorium</li>
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
            <h3 class="box-title">Daftar Pasien Laboratorium</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->
          <div class="box-header">
            <table>
              <tr>
                <td><b>Kunjungan Pasien : </b></td>
                <td style="padding-left: 5px; padding-bottom: 5px;">
                  <input type="text" id="tgl_awal" readonly="true" value="<?php echo date('01-m-Y')?>"/> s.d 
                  <input type="text" id="tgl_akhir" readonly="true" value="<?php echo date('d-m-Y')?>"/>
                  <select name="status" style="padding: 2.5px;">
                    <option value="1">Proses</option>
                    <option value="2">Selesai</option>
                    <option value="3">Proses & Selesai</option>
                  </select>
                  <button class="btn btn-sm btn-info" style="background-color: #D60059;border-color: #D60059;padding: 2.6px 10px;">Cari</button>
                </td>
              </tr>
              <tr style="padding-bottom: 5px;">
                <td>NO Pasien : </td>
                <td style="padding-left: 5px; "><input type="text"> <button class="btn btn-sm btn-info" style="padding: 2.6px 10px;">Cari</button></td>
              </tr>
              <tr>
                <td colspan="2" style="padding-bottom: 5px;padding-top:5px;">
                  <input type="hidden" id="no_reg_lab">
                  <input type="hidden" id="id_pasien">
                  <button id="btn_info_tagihan" class="btn btn-sm btn-rs" data-toggle="modal" data-target="#modal_si">Info Tagihan</button>
                  <button id="btn_hasil_pemeriksaan" class="btn btn-sm btn-rs" data-toggle="modal" data-target="#modal_si">Hasil Pemeriksaan</button>
                  <button id="btn_item_pemeriksaan" class="btn btn-sm btn-rs" data-toggle="modal" data-target="#modal_si">Item Pemeriksaan</button>
                  <button id="btn_cetak_struk" class="btn btn-sm btn-rs">Cetak Struk</button>
                  <button id="btn_print_label" class="btn btn-sm btn-rs" >Print Label</button>
                  <button id="btn_selesai" class="btn btn-sm btn-rs" >Selesai</button>
                  <button class="btn btn-sm btn-rs">Cetak Kwintansi</button>
                  <button id="btnrefresh" class="btn btn-sm btn-rs"><i class="fa fa-fw fa-refresh"></i></button>
                </td>
              </tr>              
            </table>
          </div>
          <!-- begin box-body -->
          <div class="box-body" id="ajax_lab_periksa">
          </div>
          <!-- end box-body -->
        
        </div>
      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Begin Modal -->
<div class="modal fade" id="modal_si" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header modal-begie">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="modal_show">
      </div>
      <div class="modal-footer modal-begie">
        <button type="button" class="btn btn-sm btn-rs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<script>
function printlabel()
{
  var no_reg_lab = $('#no_reg_lab').val();
  var childWin = window.open("<?=base_url()?>index.php/laboratorium/pemeriksaan_show/print_label/?no_order="+no_reg_lab, "_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no"); 
}
function cetak_struk()
{
  var no_reg_lab = $('#no_reg_lab').val();
  var childWin = window.open("<?=base_url()?>index.php/laboratorium/pemeriksaan_show/cetak_struk/?no_order="+no_reg_lab, "_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no"); 
}

$("li#pemeriksaan").addClass('active');
$("li#pasien-laboratorium").addClass('active');
$("li#LABORTORIUM").addClass('active');
var filter = $('input#filter').val();
$.ajax({
  type: "GET",
  data: "ajax=1&filter="+filter,
  url: "<?=base_url()?>index.php/laboratorium/pemeriksaan_show/ajax_list_lab_periksa",
  success: function(msg) {
    $("div#ajax_lab_periksa").html(msg);
  }
});

$('#tgl_awal').datepicker({
  format: 'dd-mm-yyyy'
});
$('#tgl_akhir').datepicker({
  format: 'dd-mm-yyyy'
});

/*=================================================== button hijau on klik ===============================================*/
$('#btnrefresh').click(function(event) {
  $.ajax({
    type: "GET",
    data: "ajax=1&filter="+filter,
    url: "<?=base_url()?>index.php/laboratorium/pemeriksaan_show/ajax_list_lab_periksa",
    success: function(msg) {
      $("div#ajax_lab_periksa").html(msg);
    }
  });  
});

$("#btn_info_tagihan").click(function(event) {
  $("h4.modal-title").text("Info Tagihan");
  var id_pasien = $("input#id_pasien").val();
  ///alert(no_reg_lab);
  $.ajax({
    type: "GET",
    data: "ajax=1&id_pasien="+id_pasien,
    url: "<?=base_url()?>index.php/laboratorium/pemeriksaan_show/ajax_info_tagihan",
    success: function(msg) {
      $("div#modal_show").html(msg);
    }
  });
});

$("#btn_item_pemeriksaan").click(function(event) {
  $("h4.modal-title").text("Item Pemeriksaan");

  var no_reg_lab = $("input#no_reg_lab").val();
  //alert(no_reg_lab);
  $.ajax({
    type: "GET",
    data: "ajax=1&no_order="+no_reg_lab,
    url: "<?=base_url()?>index.php/laboratorium/pemeriksaan_show/ajax_item_pemeriksaan",
    success: function(msg) {
      $("div#modal_show").html(msg);
    }
  });
});

$("#btn_hasil_pemeriksaan").click(function(event) {
  $("h4.modal-title").text("Item Pemeriksaan");

  var no_reg_lab = $("input#no_reg_lab").val();
  //alert(no_reg_lab);
  $.ajax({
    type: "GET",
    data: "ajax=1&no_order="+no_reg_lab,
    url: "<?=base_url()?>index.php/laboratorium/pemeriksaan_show/ajax_hasil_pemeriksaan",
    success: function(msg) {
      $("div#modal_show").html(msg);
    }
  });
});

$("#btn_print_label").click(function(event) {
  printlabel();
});

$("#btn_cetak_struk").click(function(event) {
  cetak_struk();
});

$("#btn_selesai").click(function(event) {
    var no_order = $("#no_reg_lab").val();
    var cib = $("#id_pasien").val();
      var r = confirm("Apakah yakin data "+no_order+" telah selesai ?");
      if (r == true) {
            $.ajax({
              type: "POST",
              data: "no_order="+no_order+"&cib="+cib,
              url: "<?=base_url()?>index.php/laboratorium/pemeriksaan_show/selesai_proses",
              success: function(msg) {
                alert("data telah selesai");
                //location.reload();
              }
            });            
            return false;
      } else {
            return false;
      } 
});
</script>
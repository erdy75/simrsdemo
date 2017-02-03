<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Lab Bidang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Laboratorium</a></li>
      <li class="active">Lab Bidang</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Begin Table -->
      <div class="col-md-6">
        <div class="box box-success">

          <!-- begin box-header -->
          <div class="box-header">
            <h3 class="box-title">Lab Bidang</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body" id="ajax_lab_bidang">

          </div>
          <!-- end box-body -->
        
        </div>
      </div>
      <!-- End Table -->

      <!-- Begin Table -->
      <div class="col-md-6">
        <div class="box box-success">

          <!-- begin box-header -->
          <div class="box-header">
            <h3 class="box-title">Edit dan Tambah Lab Bidang</h3>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body">
          <form id="form_modul" action="<?=base_url()?>index.php/laboratorium/set_pemeriksaan/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <table width="100%">
              <tbody>
                <?php echo input_text_1('Bidang', 'Masukkan Bidang', 'nama'); ?>
                <?php echo input_text_1('Inc', 'Kosongkan apabila no akan automatis', 'inc'); ?>
                <tr>
                  <td colspan="2" align="right" style="padding-top:5px">
                    <?php echo form_hidden('id') ?>
                    <button type="submit" class="btn btn-success btn-sm" id="simpan">Simpan</button>
                    <button type="submit" class="btn btn-success btn-sm" id="ubah">Ubah</button>
                    <button type="submit" class="btn btn-danger btn-sm" id="hapus">Hapus</button>
                    <a class="btn btn-success btn-sm" id="batal">Batal</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
          </div>
          <!-- end box-body -->
        
        </div>
      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
// begin cari
$('#role').addClass('active');
$("button#btn_ajax_cari").click(function() {
  var filter = $('input#filter').val();
  $.ajax({
    type: "GET",
    data: "ajax=1&filter="+filter,
    url: "<?=base_url()?>index.php/laboratorium/set_pemeriksaan/ajax_lab_bidang",
    success: function(msg) {
      $("div#ajax_lab_bidang").html(msg);
    }
  });
});
// end cari

// begin load ajax table
$.ajax({
  type: "GET",
  data: "ajax=1&filter=",
  url: "<?=base_url()?>index.php/laboratorium/set_pemeriksaan/ajax_lab_bidang",
  success: function(msg) {
    $("div#ajax_lab_bidang").html(msg);
  }
});
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var filter = $('input#filter').val();
    var url = $(this).attr("href");  
    $.ajax({
      type: "GET",
      data: "ajax=1&filter="+filter,
      url: url,
      success: function(msg) {
        $("div#ajax_lab_bidang").html(msg);
      }
    });
    return false;
  });
}
// end load ajax table

// begin delete table
$("button#hapus").click(function() {
  var txt;
  var r = confirm("Press a button!");
  if (r == true) {
      $("#form_modul").attr("action", "<?=base_url()?>index.php/laboratorium/set_pemeriksaan/delete/");
      // txt = "You pressed OK!";
      // alert(txt);
  } else {
      // txt = "You pressed Cancel!";
      // alert(txt);
      return false;
  }
});
// end delete

</script>
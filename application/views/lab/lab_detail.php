<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Lab Detail</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Laboratorium</a></li>
      <li><a href="<?=base_url()?>index.php/laboratorium/set_pemeriksaan"> Lab Bidang</a></li>
      <li class="active">Lab Detail <?=$nama_bidang;?></li>
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
            <h3 class="box-title">Lab Detail <?=$bidang_id?></h3>
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
          <div class="box-body" id="ajax_lab_detail">

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
    data: "ajax=1&bidang_id=<?=$bidang_id?>&filter="+filter,
    url: "<?=base_url()?>index.php/laboratorium/set_pemeriksaan/ajax_lab_detail",
    success: function(msg) {
      $("div#ajax_lab_detail").html(msg);
    }
  });
});
// end cari

// begin load ajax table
$.ajax({
  type: "GET",
  data: "ajax=1&bidang_id=<?=$bidang_id?>&filter=",
  url: "<?=base_url()?>index.php/laboratorium/set_pemeriksaan/ajax_lab_detail",
  success: function(msg) {
    $("div#ajax_lab_detail").html(msg);
  }
});
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var filter = $('input#filter').val();
    var url = $(this).attr("href");  
    $.ajax({
      type: "GET",
      data: "ajax=1&bidang_id=<?=$bidang_id?>&filter="+filter,
      url: url,
      success: function(msg) {
        $("div#ajax_lab_detail").html(msg);
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
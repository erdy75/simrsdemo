<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Golongan Darah</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Sistem</a></li>
      <li class="active">Golongan Darah</li>
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
            <h3 class="box-title">Gol Darah</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body" id="ajax_gol_darah">

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
            <h3 class="box-title">Edit dan Tambah Golongan Darah</h3>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body">
          <form id="form_modul" action="<?=base_url()?>index.php/sistem/gol_darah/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <table width="100%">
              <tbody>
                <?php echo input_text_1('Gol Darah', 'golongan darah', 'gol_darah'); ?>
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
// begin load ajax table
$('#gol_darah').addClass('active');
$.ajax({
  type: "GET",
  data: "ajax=1&filter=",
  url: "<?=base_url()?>index.php/sistem/gol_darah/ajax_gol_darah",
  success: function(msg) {
    $("div#ajax_gol_darah").html(msg);
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
        $("div#ajax_gol_darah").html(msg);
      }
    });
    return false;
  });
}
// end load ajax table
$("button#hapus").click(function() {
  var txt;
  var r = confirm("Press a button!");
  if (r == true) {
      $("#form_modul").attr("action", "<?=base_url()?>index.php/sistem/gol_darah/delete/");
      txt = "You pressed OK!";
      alert(txt);
  } else {
      txt = "You pressed Cancel!";
      alert(txt);
      return false;
  }
});
</script>
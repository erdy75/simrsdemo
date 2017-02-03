<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Menu</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Sistem</a></li>
      <li class="active">Manajemen Modul untuk <?=$list_data['nama']?></li>
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
            <h3 class="box-title">Menu</h3>
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
          <div class="box-body" id="ajax_menu">

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
            <h3 class="box-title">Edit dan Tambah Menu</h3>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body">
          <form id="form_menu" action="<?=base_url()?>index.php/sistem/Menu/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <table width="100%">
              <tbody>
                <?php echo input_text_1('Nama Menu', 'Nama menu', 'nama_menu'); ?>
                <?php echo input_text_1('Link Modul', 'Link menu baru', 'link_menu'); ?>
                <tr>
                  <td colspan="2" align="right" style="padding-top:5px">
                    <?php echo form_hidden('id') ?>
                    <?php echo form_hidden('modul_id', $modul_id2) ?>
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
$.ajax({
  type: "GET",
  data: "ajax=1&modul_id=<?=$modul_id2;?>&filter=",
  url: "<?=base_url()?>index.php/sistem/menu/ajax_menu",
  success: function(msg) {
    $("div#ajax_menu").html(msg);
  }
});
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var filter = $('input#filter').val();
    var url = $(this).attr("href");  
    $.ajax({
      type: "GET",
      data: "ajax=1&modul_id=<?=$modul_id2;?>&filter="+filter,
      url: url,
      success: function(msg) {
        $("div#ajax_menu").html(msg);
      }
    });
    return false;
  });
}
// end load ajax table
$("button#hapus").click(function() {
  var txt;
  var r = confirm("Dat menu akan dihapus?");
  if (r == true) {
      $("#form_menu").attr("action", "<?=base_url()?>index.php/sistem/menu/delete/");
      txt = "Kamu menekan OK!";
      alert(txt);
  } else {
      txt = "Kamu menekan Cancel!";
      alert(txt);
      return false;
  }
});
// begin delete table


// end delete

</script>
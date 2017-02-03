<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Kabupaten / Kota</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Sistem</a></li>
      <li class="active">Kabupaten / Kota </li>
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
            <h3 class="box-title">Kabupaten / Kota</h3>
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
          <div class="box-body" id="ajax_kabupaten">

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
            <h3 class="box-title">Edit dan Tambah Kabupatan atau Kota</h3>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body">
          <form id="form_modul" action="<?=base_url()?>index.php/sistem/kabupaten/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">
            <table width="100%">
              <tbody>
                <?php echo $select2 ?>
                <?php echo input_text_1('Nama Kabupatan', 'nama kabupatan', 'nama'); ?>
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
$('#kelurahan').addClass('active');
$(".select2").select2();
$.ajax({
  type: "GET",
  data: "ajax=1&filter=",
  url: "<?=base_url()?>index.php/sistem/Kabupaten/ajax_kabupaten",
  success: function(msg) {
    $("div#ajax_kabupaten").html(msg);
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
        $("div#ajax_kabupaten").html(msg);
      }
    });
    return false;
  });
}
// end load ajax table
$("button#hapus").click(function() {
  var txt;
  var r = confirm("Data Kabupaten Akan Di Hapus?");
  if (r == true) {
      $("#form_modul").attr("action", "<?=base_url()?>index.php/sistem/Kabupaten/delete/");
      txt = "You pressed OK!";
      alert(txt);
  } else {
      txt = "You pressed Cancel!";
      alert(txt);
      return false;
  }
});

$(".select2").select2({
    minimumInputLength: 2,
    tags: [],
    ajax: {
        url: '<?=base_url()?>index.php/sistem/kabupaten/show_provinsi/',
        dataType: 'json',
        type: "GET",
        quietMillis: 50,
        data: function (term) {
            return {
              term: term, //search term
            };
        },
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.nama_prov,
                        slug: item.slug,
                        id: item.id
                    }
                })
            };
        },
        cache : true
    }
});

</script>
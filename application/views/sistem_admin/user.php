<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Manajemen User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Sistem</a></li>
      <li class="active">User</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-success">

          <!-- begin box-header -->
          <div class="box-header">
            <h3 class="box-title">Daftar User</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;">
                <input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->
          <!-- begin box-body -->
          <div class="box-body table-responsive no-padding" id="ajax_user">
          </div>
          <!-- end box-body -->
        
        </div>
      </div>
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
$('#manajemen_user').addClass('active');
//begin ajax load
$.ajax({
  type: "GET",
  data: "ajax=1&filter=",
  url: "<?=base_url()?>index.php/sistem/user/ajax_user",
  success: function(msg) {
    $("div#ajax_user").html(msg);
  }
});
//end ajax load

</script>
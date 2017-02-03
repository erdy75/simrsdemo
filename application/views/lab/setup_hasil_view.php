<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Setup Hasil</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Setup Hasil</a></li>
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
            <h3 class="box-title">Setup Hasil</h3>
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
              <!-- begin show list -->
              <div class="col-md-12">
                <table>
                  <tbody>
                    <tr>
                      <td style="padding:5px;">Cari Text Hasil : </td>
                      <td style="padding:5px;">
                        <input type="text" name="text_filter" id="text_filter">
                      </td>
                      <td style="padding:5px;"><a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- end show list-->
              <!-- begin edit list -->
              <div class="col-md-12" id="show_list">
              </div>
              <!-- end edit list-->
            </div>
          </div>
          <!-- end box-body -->
        </div>
      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
$("li#setup-hasil").addClass('active');
$("li#LABORTORIUM").addClass('active');

  $.ajax({
    type: "POST",
    data: "filter="+$("#text_filter").val(),
    url: "<?=base_url()?>index.php/laboratorium/setup_hasil/ajax_setup_hasil",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });

$("#cari").click(function(event) {
  var bidang = $("select#bidang option:selected").val();
  var nama_pemeriksaan = $("#filter_nama").val();  
  $.ajax({
    type: "POST",
    data: "bidang="+bidang+"&nama_pemeriksaan="+nama_pemeriksaan,
    url: "<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/ajax_lab_detail",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });  
});
$("#text_filter").keyup(function(event) {
  //alert($("#text_filter").val());
  $.ajax({
    type: "POST",
    data: "filter="+$("#text_filter").val(),
    url: "<?=base_url()?>index.php/laboratorium/setup_hasil/ajax_setup_hasil",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });
});
</script>
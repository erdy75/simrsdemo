<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Tarif Laboratorium</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Tarif Laboratorium</a></li>
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
            <h3 class="box-title">Tarif Laboratorium</h3>
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
                      <td style="padding:5px;">Bidang : </td>
                      <td style="padding:5px;">
                        <select name="bidang" id="bidang">
                          <option value=""></option>
                          <?php for ($i=0; $i < count($listbidang) ; $i++) { ?>
                            <option value="<?=$listbidang[$i]['nama']?>"><?=$listbidang[$i]['nama']?></option>}
                            option
                          <?php } ?>
                        </select>
                      </td>
                      <td style="padding:5px;"><a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a></td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Cari Pemeriksaan : </td>
                      <td style="padding:5px;">
                        <input type="text" name="text_filter" id="text_filter">
                      </td>
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
$("li#tarif-lab").addClass('active');
$("li#tarif-laboratorium").addClass('active')
$("li#LABORTORIUM").addClass('active');
var bidang = $("select#bidang option:selected").val();
  $.ajax({
    type: "POST",
    data: "filter="+$("#text_filter").val()+"&bidang="+bidang,
    url: "<?=base_url()?>index.php/laboratorium/tarif_laboratorium/ajax_tarif_laboratorium",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });

$("#cari").click(function(event) {
  var bidang = $("select#bidang option:selected").val();
  $.ajax({
    type: "POST",
    data: "filter="+$("#text_filter").val()+"&bidang="+bidang,
    url: "<?=base_url()?>index.php/laboratorium/tarif_laboratorium/ajax_tarif_laboratorium",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });  
});


$("#text_filter").keyup(function(event) {
  var bidang = $("select#bidang option:selected").val();
  $.ajax({
    type: "POST",
    data: "filter="+$("#text_filter").val()+"&bidang="+bidang,
    url: "<?=base_url()?>index.php/laboratorium/tarif_laboratorium/ajax_tarif_laboratorium",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });
});
</script>
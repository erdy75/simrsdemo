<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Nama Pemeriksaan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Set Pemeriksaan</a></li>
      <li class="active">Nama Pemeriksaan</li>
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
            <h3 class="box-title">Nama Pemeriksaan</h3>
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
                      <td style="padding:5px;">Tampilan Bidang : </td>
                      <td style="padding:5px;">
                        <select name="bidang" id="bidang">
                          <option value="">SEMUA BIDANG</option>
                        <?php for ($i=0; $i < count($listbidang) ; $i++) { ?>
                          <option value="<?=$listbidang[$i]['nama']?>"><?=$listbidang[$i]['nama']?></option>
                        <?php } ?>
                        </select>
                      </td style="padding:5px;">
                      <td rowspan="2"><a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a></td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Cari Pemriksaan : </td>
                      <td style="padding:5px;"><input type="text" class="input-sm" id="filter_nama" name="filter_nama" ></td>
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
$("li#bidang-pemeriksaan").addClass('active');
$("li#set-pemeriksaan").addClass('active');
$("li#LABORTORIUM").addClass('active');
$("#tambah").show();
$("#hapus").hide();
$("#update").hide();
$("#batal").hide();
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
</script>
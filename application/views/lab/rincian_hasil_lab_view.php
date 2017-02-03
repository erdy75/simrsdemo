<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Rincian Hasil Lab</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Rincian Hasil Lab</a></li>
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
            <h3 class="box-title">Rincian Hasil Lab</h3>
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
                      <td style="padding:5px;">Periode : </td>
                      <td style="padding:5px;">
                        <input type="text" name="periode" id="periode" style="width:150px;padding-left:5px;" >
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Tampilkan Bedasarkan : </td>
                      <td style="padding:5px;">
                        <select name="jenis_pasien" id="jenis_pasien" >
                        <?php for ($i=0; $i < count($list_jenispasien) ; $i++) { ?>
                          <option value="<?=$list_jenispasien[$i]?>"><?=$list_jenispasien[$i]?></option>
                        <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Cari Nama : </td>
                      <td style="padding:5px;">
                      <input type="text" name="cari_nama" id="cari_nama">
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;" colspan="2"><a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a></td>
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
$("li#laporan").addClass('active');
$("li#rincian-hasil-lab").addClass('active');
$("li#LABORTORIUM").addClass('active');
//Date range picker with time picker
$('#periode').daterangepicker({timePicker: false, format: 'DD-MM-YYYY'});

$('#cari').click(function(event) {
  var periode = $("#periode").val();
  alert(periode);
  var jenis_pasien = $("#jenis_pasien").val();
  var cari_nama = $("#cari_nama").val();
  if(jenis_pasien=='Detail History') {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&cari_nama="+cari_nama,
        url: "<?=base_url()?>index.php/laboratorium/rincian_hasil_lab/ajax_detail_history",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  } else  {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&cari_nama="+cari_nama,
        url: "<?=base_url()?>index.php/laboratorium/rincian_hasil_lab/ajax_rekapan",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  }   
});


</script>
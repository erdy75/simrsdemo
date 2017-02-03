<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Rekap Lab Transaksi</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Rekap Lab Transaksi</a></li>
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
            <h3 class="box-title">Rekap Lab Transaksi</h3>
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
                      <td style="padding:5px;">Rekap Transaksi : </td>
                      <td style="padding:5px;">
                        <select name="rekap_transaksi" id="rekap_transaksi" >
                        <?php for ($i=0; $i < count($list_transaksi) ; $i++) { ?>
                          <option value="<?=$list_transaksi[$i]?>"><?=$list_transaksi[$i]?></option>
                        <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Periode : </td>
                      <td style="padding:5px;">
                        <input type="text" name="periode" id="periode" style="width:150px;padding-left:5px;" >
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Jenis Pasien : </td>
                      <td style="padding:5px;">
                        <select name="jenis_pasien" id="jenis_pasien" >
                        <?php for ($i=0; $i < count($list_jenispasien) ; $i++) { ?>
                          <option value="<?=$list_jenispasien[$i]?>"><?=$list_jenispasien[$i]?></option>
                        <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Penjamin : </td>
                      <td style="padding:5px;">
                        <select name="penjamin" id="penjamin" >
                        <?php for ($i=0; $i < count($list_penjamin) ; $i++) { ?>
                          <option value="<?=$list_penjamin[$i]?>"><?=$list_penjamin[$i]?></option>
                        <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">R.Inap / Jalan : </td>
                      <td style="padding:5px;">
                        <select name="rawat" id="rawat" >
                        <?php for ($i=0; $i < count($list_rawat) ; $i++) { ?>
                          <option value="<?=$list_rawat[$i]?>"><?=$list_rawat[$i]?></option>
                        <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Pencarian : </td>
                      <td style="padding:5px;">
                        <select name="filter_pencarian" id="filter_pencarian" >
                        <?php for ($i=0; $i < count($list_pencarian) ; $i++) { ?>
                          <option value="<?=$list_pencarian[$i]?>"><?=$list_pencarian[$i]?></option>
                        <?php } ?>
                        </select>
                        <input type="text" name="pencarian" id="pencarian">
                        <select name="order_p" id="order_p">
                          <option value="pasien">By Jumlah Pasien</option>
                          <option value="tarif">By Nominal Transaksi</option>
                        </select>
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
$("li#rekap-transaksi-lab").addClass('active');
$("li#LABORTORIUM").addClass('active');
//Date range picker with time picker
$('#periode').daterangepicker({timePicker: false, format: 'DD-MM-YYYY'});

$('#cari').click(function(event) {
  var rekap_transaksi = $("#rekap_transaksi").val();
  var periode = $("#periode").val();
  alert(periode);
  var jenis_pasien = $("#jenis_pasien").val();
  var penjamin = $("#penjamin").val();
  var rawat = $("#rawat").val();
  var filter_pencarian = $("#filter_pencarian").val();
  var pencarian = $("#pencarian").val();
  var order_p = $("#order_p").val();
  if(rekap_transaksi=='Rekap Transaksi') {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&rawat="+rawat+"&filter_pencarian="+filter_pencarian+"&pencarian="+pencarian+"&order_p="+order_p,
        url: "<?=base_url()?>index.php/laboratorium/rekap_lab_transaksi/ajax_rekap_transaksi",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  } else if(rekap_transaksi=='Detail Transaksi') {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&rawat="+rawat+"&filter_pencarian="+filter_pencarian+"&pencarian="+pencarian+"&order_p="+order_p,
        url: "<?=base_url()?>index.php/laboratorium/rekap_lab_transaksi/ajax_detail_transaksi",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  } else if(rekap_transaksi=='Lap.Harian dalam 1 bulan (By Jenis)') {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&rawat="+rawat+"&filter_pencarian="+filter_pencarian+"&pencarian="+pencarian+"&order_p="+order_p,
        url: "<?=base_url()?>index.php/laboratorium/rekap_lab_transaksi/ajax_rek_by_jenis",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  } else if(rekap_transaksi=='Lap.Harian dalam 1 bulan (By Penjamin)') {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&rawat="+rawat+"&filter_pencarian="+filter_pencarian+"&pencarian="+pencarian+"&order_p="+order_p,
        url: "<?=base_url()?>index.php/laboratorium/rekap_lab_transaksi/ajax_rek_by_penjamin",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  } else {
    if(periode=='')
    {
      alert("Isi Periode terlebih dahulu..");
    } else {
      $.ajax({
        type: "POST",
        data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&rawat="+rawat+"&filter_pencarian="+filter_pencarian+"&pencarian="+pencarian+"&order_p="+order_p,
        url: "<?=base_url()?>index.php/laboratorium/rekap_lab_transaksi/ajax_rek_by_pemeriksaan",
        success: function(msg) {
          $("div#show_list").html(msg);
        }
      });      
    }
  }  
});


</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Gaji Dokter dan Karywan</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Gaji Dokter dan Karyawan</a></li>
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
            <h3 class="box-title">Gaji Dokter dan Karyawan</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div id="info"></div>
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i><div id="show_ubah">
                    
                  </div></button>
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
                <table style="width:100%;">
                  <tbody>
                  <tr>
                    <td width="50%" valign="top">
                      <table>
                        <tbody>
                          <tr>
                            <td style="padding:5px;">Pilih : </td>
                            <td style="padding:5px;">
                              <select name="pilih" id="pilih">
                                <option value="Dokter">Dokter</option>
                                <option value="Karyawan">Karyawan</option>
                              </select>
                            </td>
                          </tr>
                          <tr class="dokter">
                            <td style="padding:5px;">Dokter : </td>
                            <td style="padding:5px;">
                              <select name="nama_dokter" id="nama_dokter" >
                              <?php for ($i=0; $i < count($list_dokter) ; $i++) { ?>
                                <option value="<?=$list_dokter[$i]['nama']?>"><?=$list_dokter[$i]['nama']?></option>
                              <?php } ?>
                              </select>
                            </td>
                          </tr>
                          <tr class="dokter">
                            <td style="padding:5px;">Periode Jas Med : </td>
                            <td style="padding:5px;">
                              <input type="text" name="periode" id="periode" style="width:150px;padding-left:5px;" >
                            </td>
                          </tr>
                          <tr class="karyawan">
                            <td style="padding:5px;">Karyawan : </td>
                            <td style="padding:5px;">
                              <select name="karyawan" id="karyawan" >
                              <?php for ($i=0; $i < count($list_kar) ; $i++) { ?>
                                <option value="<?=$list_kar[$i]['nama']?>"><?=$list_kar[$i]['nama']?></option>
                              <?php } ?>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>                      
                    </td>
                    <td width="50%" valign="top">
                      <table>
                        <tbody>
                          <tr>
                            <td style="padding:5px;">Period Gaji : </td>
                            <td style="padding:5px;">
                               <select name="bln" id="bln">
                                <?php for ($i=0; $i < 13 ; $i++) { ?>
                                  <?php if('0'.$i==date('m') || $i==date('m')) { ?>
                                    <?php if($i > 9) { ?>
                                      <option value="<?=$i?>" selected="true"><?=$i?></option>
                                    <?php } else { ?>
                                      <option value="<?='0'.$i?>" selected="true"><?='0'.$i?></option>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <?php if($i > 9) { ?>
                                      <option value="<?=$i?>"><?=$i?></option>
                                    <?php } else { ?>
                                      <option value="<?='0'.$i?>"><?='0'.$i?></option>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } ?>
                              </select> - 
                              <select name="tahun" id="tahun">
                                <?php for ($i=2012; $i < 2100 ; $i++) { ?>
                                  <?php if($i==date('Y')) { ?>
                                    <option value="<?=$i?>" selected="true"><?=$i?></option>
                                  <?php } else { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                  <?php } ?>
                                <?php } ?>
                              </select>                             
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;">Metode Pembayaran : </td>
                            <td style="padding:5px;">
                              <select name="metod_pembayaran" id="metod_pembayaran">
                                <option value="Cash">Cash</option>
                                <option value="Transfer">Transfer</option>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;" colspan="2"><a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a></td>
                          </tr>
                        </tbody>
                      </table>                      
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
$("li#gaji-dokter-n-karyawan").addClass('active');
$("li#PERSONALIA").addClass('active');
$("tr.dokter").show();
$("tr.karyawan").hide();
$('#periode').daterangepicker({timePicker: false, format: 'DD-MM-YYYY'});
$("#pilih").change(function(event) {
  var pilih = $(this).val();
  if(pilih=='Dokter')
  {
    $("tr.dokter").show();
    $("tr.karyawan").hide();
  } else {
    $("tr.dokter").hide();
    $("tr.karyawan").show();    
  }
});
$('#cari').click(function(event) {

  var pilih = $("select#pilih").val();
  var nama_dokter = $("#nama_dokter").val();
  var periode = $("#periode").val();
  var karyawan = $("#karyawan").val();
  var periode = $("#periode").val();
  var bln = $("#bln").val();
  var thn = $("#thn").val();
  var tahun = $("#tahun").val();
  var metod_pembayaran = $("#metod_pembayaran").val();
  alert(tahun);
  if(pilih=='Dokter')
  {
    $.ajax({
      type: "POST",
      data: "ajax=1&nama_dokter="+nama_dokter+"&periode="+periode+"&periode_gaji="+tahun+"-"+bln+"&metod_pembayaran="+metod_pembayaran+"&pilih="+pilih,
      url: "<?=base_url()?>index.php/personalia/gaji_dokter_n_karyawan/ajax_show_data",
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=2&karyawan="+karyawan+"&periode_gaji="+tahun+"-"+bln+"&metod_pembayaran="+metod_pembayaran+"&pilih="+pilih,
      url: "<?=base_url()?>index.php/personalia/gaji_dokter_n_karyawan/ajax_show_data",
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
  }      
});


</script>
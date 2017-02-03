<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Daftar Inventaris</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Daftar Inventaris</a></li>
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
            <h3 class="box-title">Daftar Inventaris</h3>
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
                            <td style="padding:5px;font-weight:bold">Tampilan Inventaris : </td>
                            <td style="padding:5px;">
                              <select name="inventaris" id="inventaris">
                                <?php for ($i=0; $i < count($list_inven) ; $i++) { ?>
                                  <option value="<?=$list_inven[$i]?>"><?=$list_inven[$i]?></option>
                                <?php } ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold">Lokasi Barang : </td>
                            <td style="padding:5px;">
                              <select name="lokasi_barang" id="lokasi_barang">
                                <option value="*">SEMUA UNIT / POLI</option>
                                <?php for ($i=0; $i < count($list_poli) ; $i++) { ?>
                                  <option value="<?=$list_poli[$i]['nama']?>"><?=$list_poli[$i]['nama']?></option>
                                <?php } ?>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>                      
                    </td>
                    <td width="50%" valign="top">
                    </td>
                  </tr>
                  <tr>
                    <td width="50%" valign="top" id="data_detail_gudang" colspan="2">
                      <button type="button" class="btn btn-info btn-sm" id="btn_cari">
                        <i class="fa fa-fw fa-refresh"></i>
                        Cari
                      </button>
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
$("li#daftar-inventaris").addClass('active');
$("li#stock-n-inventaris").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');


$('#btn_cari').click(function(event) {
var inventaris = $("select#inventaris").val();
var lokasi_barang = $("#lokasi_barang").val();
  $.ajax({
    type: "POST",
    data: "ajax=1&inventaris="+inventaris+"&lokasi_barang="+lokasi_barang,
    url: "<?=base_url()?>index.php/gudang_logistik/daftar_inventaris/ajax_daftar_inventaris",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });     
});

</script>
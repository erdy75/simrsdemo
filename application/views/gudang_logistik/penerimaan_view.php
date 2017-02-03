<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Penerimaan</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Penerimaan</a></li>
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
            <h3 class="box-title">Penerimaan</h3>
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
        <form action="<?=base_url()?>index.php/gudang_logistik/penerimaan/tambah" method="post">
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
                            <td style="padding:5px;font-weight:bold">Entry Dengan SP Final : </td>
                            <td style="padding:5px;">
                              <select name="entry_final" id="entry_final">
                                <option value="Ya">Ya</option>
                                <option value="Tidak">Tidak</option>
                              </select>
                            </td>
                            <td style="padding:5px;">
                              <button type="button" class="btn btn-block btn-info btn-sm">
                                <i class="fa fa-fw fa-sign-out"></i>
                                Tools Upgrade SP Sementara Ke Final
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold;">SP / PO Final : </td>
                            <td style="padding:5px;">
                              <input type="text" name="sp_po_final" id="sp_po_final">
                            </td>
                            <td style="padding:5px;">
                              <button type="button" class="btn btn-info btn-sm" id="btn_sp_po_final" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-fw fa-search"></i>
                              </button>
                              <button type="button" class="btn btn-info btn-sm" id="btn_load_sp_final">
                                <i class="fa fa-fw fa-refresh"></i>
                                Load SP Final 
                              </button>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;">No LPB Gudang : </td>
                            <td style="padding:5px;">
                              <input type="text" name="no_lpb_gudang" id="no_lpb_gudang">
                            </td>
                            <td style="padding:5px;">
                              <button type="button" class="btn btn-info btn-sm" id="btn_no_lpg_gudang" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-fw fa-search"></i>
                              </button>
                              <button type="button" class="btn btn-info btn-sm" id="btn_koreksi_lpb">
                                <i class="fa fa-fw fa-refresh"></i>
                                Koreksi LPB
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>                      
                    </td>
                    <td width="50%" valign="top">
                      <a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a>
                    </td>
                  </tr>
                  <tr>
                    <td width="50%" valign="top" id="data_detail_gudang" colspan="2">
                      
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
        </form>

        </div>

      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog larges">
   
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set Up Hasil</h4>
        </div>
        <div class="modal-body" id="show_modals">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>

  </div>
</div>
<script>
$("li#penerimaan").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');

$('#btn_sp_po_final').click(function(event) {
  $('h4.modal-title').text('SP PURCHASING');
  $.ajax({
    type: "POST",
    data: "ajax=1",
    url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/ajax_lov_sp_final",
    success: function(msg) {
      $("div#show_modals").html(msg);
    }
  });     
});

$('#btn_no_lpg_gudang').click(function(event) {
  $('h4.modal-title').text('PENERIMAAN GUDANG');
  $.ajax({
    type: "POST",
    data: "ajax=1",
    url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/ajax_lov_no_lpb_gudang",
    success: function(msg) {
      $("div#show_modals").html(msg);
    }
  });     
});

$('#btn_load_sp_final').click(function(event) {
  var no_sp_final = $("#sp_po_final").val();
  if(no_sp_final==''){
    alert('harap pilih data terlebih dahulu');
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&no_sp_final="+no_sp_final,
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/ajax_detail_gudang",
      success: function(msg) {
        $("td#data_detail_gudang").html(msg);
      }
    });
    $.ajax({
      type: "POST",
      data: "ajax=1&no_sp_final="+no_sp_final,
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/ajax_lov_sp_final_detail",
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });    
  }
});
$('#btn_koreksi_lpb').click(function(event) {
  var no_faktur = $("#no_lpb_gudang").val();
  if(no_faktur==''){
    alert('harap pilih data terlebih dahulu');
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&no_faktur="+no_faktur,
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/ajax_detail_gudang_v2",
      success: function(msg) {
        $("td#data_detail_gudang").html(msg);
      }
    });
    $.ajax({
      type: "POST",
      data: "ajax=1&no_faktur="+no_faktur,
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/ajax_no_lpb_gudang_detail",
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });    
  }
});
</script>
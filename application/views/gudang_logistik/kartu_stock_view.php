<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Kartu Stock</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Kartu Stock</a></li>
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
            <h3 class="box-title">Kartu Stock</h3>
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
                            <td style="padding:5px;font-weight:bold">Nama Barang : </td>
                            <td style="padding:5px;">
                              <input type="text" name="nama" class="new-form-control readonly" readonly="true" style="width:250px;">
                            </td>
                            <td style="padding:5px;">
                              <button type="button" class="btn btn-info btn-sm" id="cari_nama" data-toggle="modal" data-target="#modal_cari_barang">
                                <i class="fa fa-fw fa-search"></i>
                              </button>           
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
              <div class="col-md-6" id="show_list_masuk">
              </div>
              <div class="col-md-6" id="show_list_keluar">
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


<div id="modal_cari_barang" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nama Barang</h4>
      </div>
      <div class="modal-body" id="show_modals">
      </div>
      <div class="modal-footer">
        <input type="text" class="new-form-control" name="nama_v2">
        <button type="button" class="btn btn-info btn-sm" id="update_batch" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
$("li#kartu-stock").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');


$('#btn_cari').click(function(event) {
  var nama = $("input[name=nama]").val();
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/kartu_stock/ajax_barang_masuk",
    success: function(msg) {
      $("div#show_list_masuk").html(msg);
    }
  }); 
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/kartu_stock/ajax_barang_keluar",
    success: function(msg) {
      $("div#show_list_keluar").html(msg);
    }
  });   
});

$("#cari_nama").click(function(event) {
  var nama = $("input[name=nama]").val();
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/kartu_stock/ajax_nama_barang",
    success: function(msg) {
      $("div#show_modals").html(msg);
    }
  }); 
});

$("input[name=nama_v2]").keyup(function(event) {
    var nama = $(this).val();

    $.ajax({
      type: "POST",
      data: "ajax=1&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/kartu_stock/ajax_nama_barang",
      success: function(msg) {
        $("div#show_modals").html(msg);
      }
    });
});


</script>
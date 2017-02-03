<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Master Item / Barang</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Master Item / Barang</a></li>
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
            <h3 class="box-title">Master Item / Barang</h3>
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
                            <td style="padding:5px;font-weight:bold">Kategori : </td>
                            <td style="padding:5px;">
                              <select name="kategori_item" id="kategori_item">
                                <option value="0">-</option>
                                <?php for ($i=0; $i < count($list_kategori_item) ; $i++) { ?>
                                  <option value="<?=$list_kategori_item[$i]['nama']?>"><?=$list_kategori_item[$i]['nama']?></option>
                                <?php } ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold">Sort By : </td>
                            <td style="padding:5px;">
                              <select name="sort_by" id="sort_by">
                                <?php for ($i=0; $i < count($list_order_by) ; $i++) { ?>
                                  <option value="<?=$list_order_by[$i]?>"><?=$list_order_by[$i]?></option>
                                <?php } ?>
                              </select>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding:5px;font-weight:bold;color:blue;">Nama : </td>
                            <td style="padding:5px;">
                            <input type="text" name="nama" id="nama">
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
$("li#master-item-barang2").addClass('active');
$("li#master-item-barang1").addClass('active');
$("li#GUDANG_LOGISTIK").addClass('active');


$('#btn_cari').click(function(event) {
var kategori_item = $("select#kategori_item").val();
var sort_by = $("#sort_by").val();
var nama = $("#nama").val();
alert(kategori_item);
  $.ajax({
    type: "POST",
    data: "ajax=1&kategori_item="+kategori_item+"&sort_by="+sort_by+"&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/ajax_master_item_barang",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });     
});

</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Daftar Karyawan</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Daftar Karyawan</a></li>
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
            <h3 class="box-title">Daftar Karyawan</h3>
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
                <table>
                  <tbody>
                    <tr>
                      <td style="padding:5px;">Cari Nama : </td>
                      <td style="padding:5px;">
                        <input type="text" name="cari_nama" id="cari_nama" style="width:150px;padding-left:5px;" >
                      </td>
                    </tr>
                    <tr>
                      <td style="padding:5px;">Urutkan : </td>
                      <td style="padding:5px;">
                        <select name="order_p" id="order_p" >
                        <?php for ($i=0; $i < count($list_urut) ; $i++) { ?>
                          <option value="<?=$list_urut[$i]?>"><?=$list_urut[$i]?></option>
                        <?php } ?>
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
$("li#daftar-karyawan").addClass('active');
$("li#PERSONALIA").addClass('active');


$('#cari').click(function(event) {
  var cari_nama = $("#cari_nama").val();
  var order_p = $("#order_p").val();
  alert(order_p);
  $.ajax({
    type: "POST",
    data: "ajax=1&cari_nama="+cari_nama+"&order_p="+order_p,
    url: "<?=base_url()?>index.php/personalia/daftar_karyawan/ajax_daftar_karyawan",
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });      
     
});


</script>
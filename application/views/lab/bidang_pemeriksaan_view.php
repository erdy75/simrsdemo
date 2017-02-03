<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Bidang Pemeriksaan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i>Set Pemeriksaan</a></li>
      <li class="active">Bidang Pemeriksaan</li>
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
            <h3 class="box-title">Bidang Pemeriksaan</h3>
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
              <div class="col-md-6" id="show_list">
                
              </div>
              <!-- end show list-->
              <!-- begin edit list -->
              <div class="col-md-6">
                <table width="50%" style="border: 1px solid #ccc;">
                  <caption style="font-weight:bolder;">Master</caption>
                  <tbody>
                    <tr style="border: 1px solid #ccc;">
                      <td style="padding:5px;">Bidang : </td>
                      <td style="padding:5px;"><input class="input-sm" type="text" name="bidang" id="bidang" style="width:100%;"></td>
                    </tr>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td colspan="2" style="text-align:right;padding:10px;">
                        <a id="tambah" href="#" class="btn btn-sm btn-rs">Tambah</a>
                        <a id="hapus" href="#" class="btn btn-sm btn-rs">Hapus</a>
                        <a id="update" href="#" class="btn btn-sm btn-rs">Update</a>
                        <a id="batal" href="#" class="btn btn-sm btn-rs">Batal</a>
                      </td>
                    </tr>
                  </tfoot>
                </table>

                <table width="100%" style="border: 1px solid #ccc;">
                  <caption style="font-weight:bolder;">Set Inc</caption>
                  <tbody>
                    <tr  style="border: 1px solid #ccc;">
                      <td width="20%" style="padding:5px;">inc : </td>
                      <td width="30%" style="padding:5px;">
                        <input class="input-sm" type="text" name="inc" id="inc">
                        <input type="hidden" name="bidang2" id="bidang2">
                      </td>
                      <td rowspan="2" style="padding:5px;border: 1px solid #ccc;" >
                        <a id="up" href="#" class="btn btn-sm btn-rs">Up</a><br>
                        <a id="shift_up" href="#" class="btn btn-sm btn-rs">Shift Up</a><br>
                        <a id="switch_up" href="#" class="btn btn-sm btn-rs">Switch Up</a>
                      <td rowspan="2" style="padding:5px;border: 1px solid #ccc;">
                        <a id="down" href="#" class="btn btn-sm btn-rs">Down</a><br>
                        <a id="shift_down" href="#" class="btn btn-sm btn-rs">Shift Down</a><br>
                        <a id="switch_down" href="#" class="btn btn-sm btn-rs">Switch Down</a>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" style="text-align:right;padding:10px;">
                        <a id="set_manual" href="#" class="btn btn-sm btn-rs">Set Manual</a>
                      </td>
                    </tr>
                  </tbody>


                </table>
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


$("#batal").click(function(event) {
  $("#bidang").val('');
  $("#tambah").show();
  $("#hapus").hide();
  $("#update").hide();
  $("#batal").hide();  
});

$("#tambah").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/tambah",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#hapus").click(function(event) {
  alert("PERHATIAN : proses ini akan menghapus pula nama pemeriksaan pada bidang tersebut!!!");
  var r = confirm("Proses akan menghapus bidang berserta detail dan sub detail pemeriksaan, yakin akan menghapus?");
  if (r == true) {
    $.ajax({
      type: "POST",
      data: "bidang="+$("#bidang").val(),
      url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/hapus",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
    return false; 
  } else {
    return false;
  } 
});

$("#update").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang").val()+"&bidang2="+$("#bidang2").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/update",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#set_manual").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/set_manual",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#up").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/up",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#down").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/down",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#shift_up").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/shift_up",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#shift_down").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/shift_down",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#switch_up").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/switch_up",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#switch_down").click(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang2").val()+"&inc="+$("#inc").val(),
    url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/switch_down",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$.ajax({
  type: "POST",
  url: "<?=base_url()?>index.php/laboratorium/bidang_pemeriksaan/ajax_bidang_pemeriksaan",
  success: function(msg) {
    $("div#show_list").html(msg);
  }
});

$("#cetak").click(function(event) {
  cetak();
});

function cetak()
{
  var no_reg_lab = $('#no_order').val();
  alert(no_reg_lab);
  var childWin = window.open("<?=base_url()?>index.php/laboratorium/form_hasil_pemeriksaan_lab/cetak/?no_order="+no_reg_lab, "_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no"); 
}
</script>
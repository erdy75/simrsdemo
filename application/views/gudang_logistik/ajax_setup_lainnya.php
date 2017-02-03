<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Kategori</th>
      <th>Back Office</th>
      <th>Apotek</th>
      <th>UGD / IGD</th>
      <th>Rawat Jalan</th>
      <th>Rawat Inap</th>
      <th>Rekam Medis</th>
      <th>Kamar Operasi</th>
      <th>Gizi (Dapur)</th>
      <th>Kode Akun</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['nama']?></td>
      <td>
      <?php
        if($listdata[$i]['isBackOfficeShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isBackOfficeShow">';
        }else{
          echo '<input type="checkbox" class="isBackOfficeShow">';
        }
      ?>        
      </td> 
      <td>
      <?php
        if($listdata[$i]['isApotekShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isApotekShow">';
        }else{
          echo '<input type="checkbox" class="isApotekShow">';
        }
      ?>        
      </td> 
      <td>
      <?php
        if($listdata[$i]['isUGDShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isUGDShow">';
        }else{
          echo '<input type="checkbox" class="isUGDShow">';
        }
      ?>        
      </td>
      <td>
      <?php
        if($listdata[$i]['isRawatJalanShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isRawatJalanShow">';
        }else{
          echo '<input type="checkbox" class="isRawatJalanShow">';
        }
      ?>        
      </td>
      <td>
      <?php
        if($listdata[$i]['isRawatInapShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isRawatInapShow">';
        }else{
          echo '<input type="checkbox" class="isRawatInapShow">';
        }
      ?>        
      </td> 
      <td>
      <?php
        if($listdata[$i]['isRekamMedisShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isRekamMedisShow">';
        }else{
          echo '<input type="checkbox" class="isRekamMedisShow">';
        }
      ?>        
      </td>
      <td>
      <?php
        if($listdata[$i]['isKamarOperasiShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isKamarOperasiShow">';
        }else{
          echo '<input type="checkbox" class="isKamarOperasiShow">';
        }
      ?>        
      </td> 
      <td>
      <?php
        if($listdata[$i]['isGiziShow']=='Yes'){
          echo '<input type="checkbox" checked="checked" class="isGiziShow">';
        }else{
          echo '<input type="checkbox" class="isGiziShow">';
        }
      ?>        
      </td> 
      <td><?=$listdata[$i]['kode_akun_persediaan']?></td> 
      <td>
        <button type="button" class="btn btn-danger btn-sm hapus" >
          <i class="fa fa-fw fa-trash"></i>
        </button>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="3">
        <button type="button" class="btn btn-info btn-sm tambah" data-toggle="modal" data-target="#modal_show" >
          Tambah
        </button>        
      </td>
      <td colspan="6">
        <ul class="pagination pull-right" id="ajax_pagingsearci" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>

<div id="modal_show" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Item Kategori</h4>
      </div>
      <div class="modal-body" id="show_modals">
      <table>
        <tbody>
          <tr>
            <td style="padding:5px;">Nama : </td>
            <td style="padding:5px;"><input type="text" class="new-form-control"  name="nama_item" id="nama_item" width="150px;" ></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" id="tambah_item" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
applyPagination2()
function applyPagination2(){
  $("#ajax_pagingsearci a").click(function() {
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1",
      url: url,
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
    return false;
  });
}
$("#tambah").click(function(event) {
  $("#nama_item").val('');
});

$("#tambah_item").click(function(event) {
  var nama = $("#nama_item").val();
    $.ajax({
      type: "POST",
      data: "ajax=1&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/tambah_item",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });  
});

$(".isBackOfficeShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isBackOfficeShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isBackOfficeShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});

$(".isApotekShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isApotekShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isApotekShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});

$(".isUGDShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isUGDShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isUGDShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});

$(".isRawatJalanShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isRawatJalanShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isRawatJalanShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});

$(".isRawatInapShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isRawatInapShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isRawatInapShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});


$(".isRekamMedisShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isRekamMedisShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isRekamMedisShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});


$(".isKamarOperasiShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isKamarOperasiShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isKamarOperasiShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});

$(".isGiziShow").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  if($(this).is(':checked')) {
    $.ajax({
      type: "POST",
      data: "ajax=1&isGiziShow=Yes&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    $.ajax({
      type: "POST",
      data: "ajax=1&isGiziShow=No&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/update_status",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  }
});

$('.hapus').click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  var r = confirm("Apakah Data "+ nama + " akan dihapus ? ");
  if(r==true){
    $.ajax({
      type: "POST",
      data: "ajax=1&nama="+nama,
      url: "<?=base_url()?>index.php/gudang_logistik/setup_lainnya/hapus",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });
  } else {
    return false;
  }
});
</script>
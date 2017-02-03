<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama</th>
      <th>Kemasan Pakai(Kecil)</th>
      <th>Kemasan Sedang</th>
      <th>Kemasan Besar</th>
      <th>Kategori</th>
      <th>Jenis</th>
      <th>Generik</th>
      <th>Seidaan</th>
      <th>Principal</th>
      <th>Barcode</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['id']?></td>
      <td><?=$listdata[$i]['nama']?></td>
      <td><?=$listdata[$i]['kemasan_kecil']?></td>
      <td><?=$listdata[$i]['kemasan_sedang']?></td>
      <td><?=$listdata[$i]['kemasan_besar']?></td>
      <td><?=$listdata[$i]['kategori_item']?></td>
      <td><?=$listdata[$i]['jenis']?></td>  
      <td><?=$listdata[$i]['generik']?></td>  
      <td><?=$listdata[$i]['sediaan']?></td>
      <td><?=$listdata[$i]['principal']?></td>
      <td><?=$listdata[$i]['barcode']?></td>
      <td>
        <button type="button" class="btn bg-navy btn-sm edit"  data-toggle="modal" data-target="#modal_barang">
          <i class="fa fa-fw fa-edit"></i>
        </button>
      </td>    
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="9">
        <ul class="pagination pull-right" id="ajax_pagingsearci" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
      <td colspan="3" style="text-align:center;">
        <button type="button" class="btn btn-info btn-sm" id="tambah_item_barang" data-toggle="modal" data-target="#modal_barang">Tambah</button>
        <button type="button" class="btn btn-info btn-sm" id="tambah_jenis_obat" data-toggle="modal" data-target="#modal_jenis_obat">Jenis Obat</button>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>




<div id="modal_barang" class="modal fade" role="dialog">
  <div class="modal-dialog large">

   
    <!-- Modal content-->
    <div class="modal-content size-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body" id="show_modal">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-sm" id="simpan_barang" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_jenis_obat" class="modal fade" role="dialog">
  <div class="modal-dialog large">

   
    <!-- Modal content-->
    <div class="modal-content size-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Jenis Obat</h4>
      </div>
      <div class="modal-body" id="show_modal_2">

      </div>
      <div class="modal-footer">
        <input type="text" name="jenis_obat" class="new-form-control">
        <button type="submit" class="btn btn-info btn-sm" id="simpan_jenis_obat" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>
var kategori_item = "<?=$kategori_item?>";
var sort_by = "<?=$sort_by?>";
var nama = "<?=$nama?>";
applyPagination2()
function applyPagination2(){
  $("#ajax_pagingsearci a").click(function() {
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1&kategori_item="+kategori_item+"&sort_by="+sort_by+"&nama="+nama,
      url: url,
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
    return false;
  });
}

$('button.btn.bg-navy.btn-sm.edit').click(function(event) {
  var id = $(this).parent().parent().children().eq(0).text();
  $.ajax({
    type: "POST",
    data: "ajax=1&id="+id,
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/ajax_edit_item_barang",
    success: function(msg) {
      $("div#show_modal").html(msg);
    }
  }); 
});

$('button#simpan_barang').click(function(event) {
  var text = '';
  var id =  $('input[name=id_m]').val();
  var kategori_item = $('select[name=kategori_item_m]').val();
  var nama = $('input[name=nama_m]').val();
  var satuan = $('select[name=satuan_m]').val();
  var pengali_satuan_sedang = $('input[name=pengali_satuan_sedang_m]').val();
  var nama_satuan_sedang =  $('select[name=nama_satuan_sedang_m]').val();
  var pengali_satuan_besar =  $('input[name=pengali_satuan_besar_m]').val();
  var nama_satuan_besar = $('select[name=nama_satuan_besar_m]').val();
  var rak_penyimpanan = $('input[name=penyimpanan_m]').val();
  var barcode = $('input[name=barcode_m]').val();
  var principal =  $('select[name=principal_m]').val();
  var jenis =  $('select[name=jenis_m]').val();
  var generik = $('input[name=generik_m]').val();
  var bentuk_sediaan =  $('select[name=bentuk_sediaan_m]').val();
  var dosis_sediaan = $('input[name=dosis_sediaan_m]').val();
  var satuan_dosis_sediaan = $('select[name=satuan_dosis_sediaan_m]').val();
  var mode_limit =  $('input[name=limit_di_apotek_m]').val();
  var limit_di_gudang = $('input[name=limit_di_gudang_m]').val();
  $.ajax({
    type: "POST",
    data: "ajax=1&id="+id+"&kategori_item="+kategori_item+"&nama="+nama+"&satuan="+satuan+"&pengali_satuan_sedang="+pengali_satuan_sedang+"&nama_satuan_sedang="+nama_satuan_sedang+"&pengali_satuan_besar="+pengali_satuan_besar+"&nama_satuan_besar="+nama_satuan_besar+"&rak_penyimpanan="+"&barcode="+barcode+"&principal="+principal+"&jenis="+jenis+"&generik="+generik+"&bentuk_sediaan="+bentuk_sediaan+"&dosis_sediaan="+dosis_sediaan+"&satuan_dosis_sediaan="+satuan_dosis_sediaan+"&mode_limit="+mode_limit+"&limit_di_gudang="+limit_di_gudang,
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/simpan_barang",
    success: function(msg) {
      $("div#info").html(msg);
    }
  });  
});

$("#tambah_item_barang").click(function(event) {
  var id = 0;
  $.ajax({
    type: "POST",
    data: "ajax=1&id="+id,
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/ajax_edit_item_barang",
    success: function(msg) {
      $("div#show_modal").html(msg);
    }
  }); 
});

$("#tambah_jenis_obat").click(function(event) {
  $.ajax({
    type: "POST",
    data: "ajax=1",
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/ajax_jenis_obat",
    success: function(msg) {
      $("div#show_modal_2").html(msg);
    }
  }); 
});
</script>


<style>
.modal-content.size-custom {
     width: 1000px;
    margin-left: -200px; 
}
.datepicker{z-index:1151 !important;}
</style>
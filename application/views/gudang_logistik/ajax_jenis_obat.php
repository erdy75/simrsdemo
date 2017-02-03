<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['nama']?></td>
      <td>
        <button type="button" class="btn bg-danger btn-sm hapus">
          <i class="fa fa-fw fa-trash"></i>
        </button>
      </td>    
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="2">
        <ul class="pagination pull-right" id="ajax_pagingsearca" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
    <!-- end footer -->
  </tfoot>
</table>




<script>
var kategori_item = "<?=$kategori_item?>";
var sort_by = "<?=$sort_by?>";
var nama = "<?=$nama?>";
applyPagination3()
function applyPagination3(){
  $("#ajax_pagingsearca a").click(function() {
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

$("button.btn.bg-danger.btn-sm.hapus").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  var r = confirm("Apakah jenis obat "+nama+" akan dihapus ?");
  if (r==true){
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/hapus_obat",
    success: function(msg) {
      $("div#show_modal_2").html(msg);
    }
  }); 
  } else {
    return false;
  }

});

$("button#simpan_jenis_obat").click(function(event) {
  var nama = $('input[name=jenis_obat]').val();
  $.ajax({
    type: "POST",
    data: "ajax=1&nama="+nama,
    url: "<?=base_url()?>index.php/gudang_logistik/master_item_barang/tambah_obat",
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
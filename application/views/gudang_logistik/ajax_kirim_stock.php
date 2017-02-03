<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No Unit</th>
      <th>Unit</th>
      <th>Tanggal</th>
      <th>Jam</th>
      <th>Pemesanan</th>
      <th>Kepala Unit</th>
      <th><?=$count;?></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['no_order']?></td>
      <td><?=$listdata[$i]['poli']?></td>
      <td><?=$listdata[$i]['tgl']?></td>
      <td><?=$listdata[$i]['jam']?></td>
      <td><?=$listdata[$i]['nama']?></td>
      <td><?=$listdata[$i]['nama_kepala_unit']?></td>
      <td>
        <button class="btn btn-info btn-sm detail_stock" data-toggle="modal" data-target="#modal_detail_stock">
          Detail
        </button>
      </td>     
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="6">
        <ul class="pagination pull-right" id="ajax_pagingsearc" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>

<div id="modal_detail_stock" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Detail Stock</h4>
      </div>
      <div class="modal-body" id="show_detail_kirim_stock">
      </div>
      <div class="modal-footer">
        <input type="hidden" name="no_order_cek">
        <button type="button" class="btn btn-info btn-sm" id="closing_order">Closing Order</button>
        <button type="button" class="btn btn-danger btn-sm" id="closing_order">Hapus Order</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var unit = "<?=$unit?>";
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1&data_1=1",
      url: url,
      success: function(msg) {
        $("div#show_list1").html(msg);
      }
    });
    return false;
  });
}

$("button.btn.btn-info.btn-sm.detail_stock").click(function(event) {
  var no_order = $(this).parent().parent().children().eq(0).text();
  var pemesan = $(this).parent().parent().children().eq(4).text();
  $("input[name=no_order_cek]").val(no_order);
  $.ajax({
    type: "POST",
    data: "no_order="+no_order+"&pemesan="+pemesan,
    url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/ajax_detail_kirim_stock",
    success: function(msg) {
      $("div#show_detail_kirim_stock").html(msg);
    }
  });  
});
$("#closing_order").click(function(event) {
  var no_order = $("input[name=no_order_cek]").val();
  $.ajax({
    type: "POST",
    data: "no_order="+no_order,
    url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/closing_order",
    success: function(msg) {
      alert("Data "+no_order+" Berhasil DiClosing");
    }
  });
});

$("#hapus_order").click(function(event) {
  var no_order = $("input[name=no_order_cek]").val();
  $.ajax({
    type: "POST",
    data: "no_order="+no_order,
    url: "<?=base_url()?>index.php/gudang_logistik/kirim_stock/hapus_order",
    success: function(msg) {
      alert("Data "+no_order+" Telah Dihapus");
    }
  });
});
// end form event
</script>
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Tgl Faktur</th>
      <th>Masuk</th>
      <th>Harga</th>
      <th>Uraian</th>
      <th>Kel.Stock</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['tgl_faktur']?></td>
      <td><?=$listdata[$i]['masuk']?></td>
      <td><?=$listdata[$i]['harga']?></td>
      <td><?=$listdata[$i]['uraian']?></td>
      <td><?=$listdata[$i]['kelompok_stock']?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5" style="color:green;">Total Barang Keluar : <?=$total['total']?></td>
    </tr>
  </tfoot>
</table>




<script>
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1&nama="+nama,
      url: url,
      success: function(msg) {
        $("div#show_modals").html(msg);
      }
    });
    return false;
  });
}

$("button.btn.bg-danger.btn-sm.hapus").click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  $("input[name=nama]").val(nama);
});


</script>
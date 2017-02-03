<table id="example1" class="table table-bordered table-lab">
    <thead>
      <tr>
        <th>Uraian / Nama</th>
        <th>Tarif</th>
        <th>QTY</th>
        <th>Sub Tot</th>
        <th>Poli/Unit/Dept</th>
        <th>Dokter</th>
      </tr>
    </thead>
    <tbody>

      <?php for ($i=0; $i < count($list_data); $i++) {  ?>
        <tr class="data_lab_periksa">
          <td><?=$list_data[$i]['keterangan'];?></td>
          <td><?=$list_data[$i]['harga_satuan'];?></td>
          <td><?=$list_data[$i]['total'];?></td>
          <td>0</td>
          <td><?=$list_data[$i]['poli'];?></td>
          <td><?=$list_data[$i]['id_dokter'];?></td> 
        </tr>
      <?php } ?>

    </tbody>
    <tfoot> 
      <!-- begin footer -->
      <tr>
        <td colspan="7">
          <ul class="pagination pull-right" id="ajax_pagingsearc" style="margin:-10px 0px">
            <p><?php echo $links; ?></p>
          </ul>
        </td>
      </tr> 
      <!-- end footer -->
    </tfoot>
  </table>

<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
  var filter = $('input#filter').val();
  var url = $(this).attr("href");  
  $.ajax({
    type: "GET",
    data: "ajax=1&filter="+filter,
    url: url,
    success: function(msg) {
      $("div#modal_show").html(msg);
    }
  });
  return false;
  });
}
</script>

  <table id="example1" class="table table-bordered table-lab">
    <thead>
      <tr>
        <th>Uraian / Nama</th>
        <th>Tarif</th>
        <th>Qty</th>
        <th>Sub Tot</th>
        <th>Poli/Unit/Dept</th>
        <th>Dokter</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td><?=$list_data[$i]['Keterangan'];?></td>
          <td><?=$list_data[$i]['harga_satuan'];?></td>
          <td><?=$list_data[$i]['KelompokBeli'].' / '.$list_data[$i]['penjamin_manual_edit'];?></td>
          <td><?=$list_data[$i]['jalan_inap'];?></td>
          <td><?=$list_data[$i]['no_reg_lab_internal'];?></td>
          <td/></td>
        </tr>
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
      $("div#ajax_lab_periksa").html(msg);
    }
  });
  return false;
  });
}

</script>
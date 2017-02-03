<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No SP Purchashing</th>
      <th>Supplier</th>
      <th>No Faktur Supplier</th>
      <th>Tanggal Faktur</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['no_sp_final']?></td>
      <td><?=$listdata[$i]['supplier']?></td>
      <td><?=$listdata[$i]['no_sp_sementara']?></td>
      <td><?=$this->date->konversi2b($listdata[$i]['tgl'])?></td>     
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




<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
  $.ajax({
    type: "POST",
    data: "ajax=1",
    url: url,
    success: function(msg) {
      $("div#modal-body").html(msg);
    }
  });
  return false;
  });
}



// end form event
</script>
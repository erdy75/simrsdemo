<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No SP Purchashing</th>
      <th>Supplier</th>
      <th>No Faktur Supplier</th>
      <th>Tanggal Faktur</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['no_sp_final']?></td>
      <td><?=$listdata[$i]['supplier']?></td>
      <td><?=$listdata[$i]['no_sp_sementara']?></td>
      <td><?=$this->date->konversi2a($listdata[$i]['tgl'])?></td>
      <td>
        <button class="btn btn-info btn-sm" data-dismiss="modal" onclick="insert_text(<?=$listdata[$i]['no_sp_final']?>);">
          Pilih 
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




<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1&data_1=1",
      url: url,
      success: function(msg) {
        $("div#show_modals").html(msg);
      }
    });
    return false;
  });
}

function insert_text(no_sp_final)
{
  $('#sp_po_final').val(no_sp_final);
}
// end form event
</script>
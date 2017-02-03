<table id="example1" class="table">
  <thead>
    <tr>
      <th>Supplier</th>
      <th>Penerima</th>
      <th>Tanggal Retur</th>
      <th>No Retur</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['supplier']?></td>
      <td><?=$listdata[$i]['penerima']?></td>
      <td><?=$this->date->konversi2a($listdata[$i]['tgl'])?></td>
      <td><?=$listdata[$i]['no_retur']?></td>
      <td>
        <button type="button" class="btn bg-danger btn-sm hapus" data-dismiss="modal">
          Pilih
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
applyPagination3()
function applyPagination3(){
  $("#ajax_pagingsearca a").click(function() {
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1",
      url: url,
      success: function(msg) {
        $("div#show_retur_supp").html(msg);
      }
    });
    return false;
  });
}

$("button.btn.bg-danger.btn-sm.hapus").click(function(event) {
  var no_retur = $(this).parent().parent().children().eq(3).text();
  $("input[name=koreksi_retur]").val(no_retur);
});


</script>


<style>
.modal-content.size-custom {
     width: 1000px;
    margin-left: -200px; 
}
.datepicker{z-index:1151 !important;}
</style>
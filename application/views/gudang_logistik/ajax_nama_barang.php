<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama </th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['nama']?></td>
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
    var nama = "<?=$nama;?>";
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


<style>
.modal-content.size-custom {
     width: 1000px;
    margin-left: -200px; 
}
.datepicker{z-index:1151 !important;}
</style>
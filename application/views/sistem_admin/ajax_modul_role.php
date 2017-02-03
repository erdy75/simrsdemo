<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Id</th>
      <th>Nama Role</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($list_data); $i++) {  ?>
    <tr>
      <td>
          <?=$i?>
      </td>
      <td><?=$list_data[$i]['nama']?></td>
      <td>
        <form action="<?=base_url()?>index.php/sistem/role/delete_modul_role/<?=$list_data[$i]['id']?>" method="POST" accept-charset="utf-8">
          <?php echo form_hidden('role_id', $role_id) ?>
          <button type="submit" class="btn btn-danger btn-sm" id="hapus">Hapus</button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="3">
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
  var role_id = "<?=$role_id?>" ;
  var url = $(this).attr("href");  
  $.ajax({
    type: "GET",
    data: "ajax=1&role_id="+role_id+"&filter="+filter,
    url: url,
    success: function(msg) {
      $("div#ajax_modul_role").html(msg);
    }
  });
  return false;
  });
}

// begin form event
$('button#ubah').hide();
$('a#batal').click(function() {
  $("input[name='nama']").val('');
  $("input[name='id']").val('');
  $("button#simpan").show();
});
// end form event
</script>
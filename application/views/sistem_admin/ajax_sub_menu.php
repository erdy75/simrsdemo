<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Menu</th>
      <th>Link</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($list_data); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="<?=$list_data[$i]['id']?>">
          <?=$list_data[$i]['nama_menu']?>
        </a>
      </td>
      <td><?=$list_data[$i]['link_menu']?></td>
      <td>
        <?php if($list_data[$i]['link_menu']=='#') { ?>
          <a class="btn btn-info btn-sm" href="<?=base_url()?>index.php/sistem/menu/sub_menu/<?=$list_data[$i]['modul_id']?>/<?=$list_data[$i]['id']?>/" title="">  
            Sub Menu
          </a>
        <?php } ?>
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
  var url = $(this).attr("href");  
  $.ajax({
    type: "GET",
    data: "ajax=1&modul_id=<?=$modul_id;?>&parent_id=<?=$parent_id;?>&filter="+filter,
    url: url,
    success: function(msg) {
      $("div#ajax_sub_menu").html(msg);
    }
  });
  return false;
  });
}

// begin form event
$('button#ubah').hide();
$('button#hapus').hide();
$('a#batal').click(function() {
  $("input[name='nama_menu']").val('');
  $("input[name='link_menu']").val('');
  $("input[name='id']").val('');
  $("input[name='parent_id']").val('');
  $("button#simpan").show();
  $("button#ubah").hide();
  $('button#hapus').hide();
});
<?php for ($i=0; $i < count($list_data); $i++) {  ?>
$("a#<?=$list_data[$i]['id']?>").click(function() {
  $("input[name='nama_menu']").val("<?=$list_data[$i]['nama_menu']?>");
  $("input[name='link_menu']").val("<?=$list_data[$i]['link_menu']?>");
  $("input[name='id']").val("<?=$list_data[$i]['id']?>");
  $("input[name='parent_id']").val("<?=$list_data[$i]['parent_id']?>");
  $("button#simpan").hide();
  $("button#ubah").show();
  $('button#hapus').show();
});
<?php } ?>
// end form event
</script>
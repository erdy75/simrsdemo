<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Inc</th>
      <th>Bidang</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($list_data); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="<?=$list_data[$i]['id']?>">
          <?=$list_data[$i]['inc']?>
        </a>
      </td>
      <td><?=$list_data[$i]['nama']?></td>
      <td><a href="<?=base_url()?>index.php/laboratorium/set_pemeriksaan/lab_detail/<?=$list_data[$i]['id']?>" class="btn btn-info btn-sm">Lab Detail</a></td>
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
    data: "ajax=1&filter="+filter,
    url: url,
    success: function(msg) {
      $("div#ajax_lab_bidang").html(msg);
    }
  });
  return false;
  });
}

// begin form event
$('button#ubah').hide();
$('button#hapus').hide();
$('a#batal').click(function() {
  $("input[name='nama']").val('');
  $("input[name='inc']").val('');
  $("input[name='id']").val('');
  $("button#simpan").show();
  $("button#ubah").hide();
  $('button#hapus').hide();
});
<?php for ($i=0; $i < count($list_data); $i++) {  ?>
$("a#<?=$list_data[$i]['id']?>").click(function() {
  $("input[name='nama']").val("<?=$list_data[$i]['nama']?>");
  $("input[name='inc']").val("<?=$list_data[$i]['inc']?>");
  $("input[name='id']").val("<?=$list_data[$i]['id']?>");
  $("button#simpan").hide();
  $("button#ubah").show();
  $('button#hapus').show();
});
<?php } ?>
// end form event
</script>
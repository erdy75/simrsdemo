<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Desa</th>
      <th>Kode Pos</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($list_data); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="<?=$list_data[$i]['id']?>">
          <?=$list_data[$i]['nama_desa']?>
        </a>      
      </td>
      <td>
        <?=$list_data[$i]['kodepos']?>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="3">
        <ul class="pagination pull-right" id="ajax_pagingsearc" style="margin:-10px 0px">
          <p><?php echo $links;?> </p>
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
      $("div#ajax_desa").html(msg);
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
  $("input[name='kodpos']").val('');
  $("input[name='id']").val('');
  $("button#simpan").show();
  $("button#ubah").hide();
  $('button#hapus').hide();
});
<?php for ($i=0; $i < count($list_data); $i++) {  ?>
$("a#<?=$list_data[$i]['id']?>").click(function() {
  $("input[name='nama']").val("<?=$list_data[$i]['nama_desa']?>");
  $("input[name='kodepos']").val("<?=$list_data[$i]['kodepos']?>");
  $.ajax({
    type: "POST",
    data: "kec_id=<?=$list_data[$i]['kec_id']?>",
    url: "<?=base_url()?>index.php/sistem/desa/show_kecamatan_by_id/",
    success: function(msg) {
      $("#td_kec_id").html(msg);
    }
  });
  $("input[name='id']").val("<?=$list_data[$i]['id']?>");
  $("button#simpan").hide();
  $("button#ubah").show();
  $('button#hapus').show();
});
<?php } ?>
// end form event
</script>
<table class="table table-bordered table-lab">
  <thead>
    <tr>
      <th>Nama Pemeriksaan</th>
      <th>Tarif</th>
      <th>Rujukan</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php for ($i=0; $i < count($list_data) ; $i++) { ?>
    <tr>
      <td><?=$list_data[$i]['nama_lab']?></td>
      <td><?=$this->admin_template_minor->uang_format($list_data[$i]['tarif'])?></td>
      <td><?=$list_data[$i]['rujukan']?></td>
      <td>
        <a href="#" class="btn btn-danger btn-sm" onclick="hapus(<?=$list_data[$i]['id']?>,<?=$list_data[$i]['no_order']?>)"><i class="fa fa-fw fa-trash"></i></a>
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
    data: "ajax=1",
    url: url,
    success: function(msg) {
      $("div#show_list_tarif").html(msg);
    }
  });
  return false;
  });
}

function hapus(id,no_order) {
  alert(id+","+no_order);
  $.ajax({
    type: "POST",
    data: "no_order="+no_order+"&id="+id,
    url: "<?=base_url()?>index.php/laboratorium/Transaksi/hapus_list_tarif",
    success: function(msg) {
      $("div#show_list_tarif").html(msg);
    }
  }); 
}

$("span#total_tarif").text("Total Rp.<?=$rp_jml_tarif;?>");
$("#tot_tarif").val("<?=$jml_tarif;?>");
$("#cek_list_tarif").val("<?=$count;?>");
</script>
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Dokter / Karyawan</th>
      <th>Poli / Unit / Bagian</th>
      <th>Alamat</th>
      <th>Total Gaji</th>
      <th>Rekening</th>
      <th>Kode Gaji</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['nama']?></td>
      <td><?=$listdata[$i]['poli']?></td>
      <td><?=$listdata[$i]['alamat']?></td>
      <td>Rp.<?=$this->admin_template_minor->uang_format($listdata[$i]['tot_gaji'])?></td>
      <td><?=$listdata[$i]['rekening']?></td>
      <td><?=$listdata[$i]['kode_gaji']?></td>     
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
    data: "ajax=1&periode_gaji=<?=$periode_gaji?>",
    url: url,
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });
  return false;
  });
}



// end form event
</script>
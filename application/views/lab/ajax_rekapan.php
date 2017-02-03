<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Pemeriksaan</th>
      <th>Jumlah Pasien</th>
      <th>Metode</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$i+1?></td>
      <td><?=$listdata[$i]['nama_pemeriksaan']?></td>
      <td><?=$listdata[$i]['jumlah']?></td>
      <td><?=$listdata[$i]['metode']?></td>     
    </tr>
    <?php  } ?>
  </tbody>
</table>




<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
  var url = $(this).attr("href"); 
  var rekap_transaksi = $("#rekap_transaksi").val();
  var periode = $("#periode").val();
  alert(periode);
  var jenis_pasien = $("#jenis_pasien").val();
  var penjamin = $("#penjamin").val();
  var rawat = $("#rawat").val();
  var filter_pencarian = $("#filter_pencarian").val();
  var pencarian = $("#pencarian").val();
  var order_p = $("#order_p").val(); 
  $.ajax({
    type: "POST",
    data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&cari_nama="+cari_nama,
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
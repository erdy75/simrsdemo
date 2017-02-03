<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>No Order</th>
      <th>Tanggal</th>
      <th>Pasien</th>
      <th>Dokter</th>
      <th>Pemeriksaan</th>
      <th>Hasil</th>
      <th>Nilai Normal</th>
      <th>Metode</th>
      <th>Spesimen</th>
    </tr>
  </thead>
  <tbody>
    <?php $x='';$cek_no_order=''; for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <?php if($listdata[$i]['no_order']==$cek_no_order) { ?>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      <?php } else { $x=$x+1;?>
        <td><?=$x;?></td>
        <td><?=$listdata[$i]['no_order']?></td>
        <td><?=$this->date->konversi2a($listdata[$i]['tanggal'])?></td>
        <td><?=$listdata[$i]['pasien']?></td>
        <td><?=$listdata[$i]['dokter']?></td>
      <?php } ?>

      <td><?=str_replace(' ', '&nbsp;', $listdata[$i]['pemeriksaan'])?></td>
      <td><?=$listdata[$i]['nilai']?></td>
      <td><?=$listdata[$i]['nilai_normal']?></td>
      <td><?=$listdata[$i]['metode']?></td>
      <td><?=$listdata[$i]['spesimen']?></td>     
    </tr>
    <?php $cek_no_order = $listdata[$i]['no_order']; } ?>
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
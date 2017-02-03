<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No Reg</th>
      <th>Pasien</th>
      <th>Dr Pengirim</th>
      <th>Jenis Pasien</th>
      <th>Penjamin</th>
      <th>Nilai(Rp)</th>
      <th>Unit Cost</th>
      <th>R / L (Rp)</th>
      <th>Tgl / Jam</th>
      <th>Analis</th>
      <th>Jalan / Inap</th>
      <th>No Urut</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['no_order']?></td>
      <td><?=$listdata[$i]['nama_pasien']?></td>
      <td><?=$listdata[$i]['dokter']?></td>
      <td><?=$listdata[$i]['KelompokBeli']?></td>
      <td><?=$listdata[$i]['penjamin_manual_edit']?></td>
      <td>Rp.<?=$this->admin_template_minor->uang_format($listdata[$i]['nilai'])?></td>
      <td>Rp.<?=$this->admin_template_minor->uang_format($listdata[$i]['unit_cost'])?></td>
      <td>Rp.<?=$this->admin_template_minor->uang_format($listdata[$i]['total_cost'])?></td>
      <td><?=$this->date->konversi2a($listdata[$i]['tanggal'])?> / <?=$listdata[$i]['jam']?></td>
      <td><?=$listdata[$i]['penanggung_jawab']?></td>
      <td><?=$listdata[$i]['jalan_inap']?></td>
      <td><?=$listdata[$i]['no_urut']?></td>      
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="4">
        <h5><b>Total Transaksi : Rp.<?=$this->admin_template_minor->uang_format($tot_tarif['tarif_total'])?></b></h5>
        <br>
        <h5><b>Total Unit Cost : Rp.<?=$this->admin_template_minor->uang_format($tot_unit_cost['total'])?></b></h5>
        <hr>
        <h5><b>Total Laba / Rugi : Rp.<?=$this->admin_template_minor->uang_format($tot_laba_rugi['total'])?></b></h5>
      </td>
      <td colspan="8">
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
    data: "ajax=1&periode="+periode+"&jenis_pasien="+jenis_pasien+"&penjamin="+penjamin+"&rawat="+rawat+"&filter_pencarian="+filter_pencarian+"&pencarian="+pencarian+"&order_p="+order_p,
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
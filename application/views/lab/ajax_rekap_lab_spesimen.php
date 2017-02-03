<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No</th>
      <th>No Reg Lab</th>
      <th>Nama</th>
      <th>L/P</th>
      <th>Umur Thn(bln)</th>
      <th>Alamat</th>
      <th>Dokter</th>
      <th>Diagnosa</th>
      <th>DL</th>
      <th>UL</th>
      <th>FL</th>
      <th>Kimia Darah</th>
      <th>Kimia Cairan</th>
      <th>Kimia Cairan</th>
      <th>Parasitologi</th>
      <th>Serologi</th>
      <th>Immunologi</th>
      <th>Mikrobiologi</th>
      <th>Narkoba</th>
      <th>Keadaan Spesimen</th>
      <th>Waktu Terima</th>
      <th>Waktu Selesai</th>
      <th>Petugas</th>
      <th>Keterangan</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$i+1?></td>
      <td><?=$listdata[$i]['no_order']?></td>
      <td><?=$listdata[$i]['nama_manual_edit']?></td>
      <td><?=$listdata[$i]['sex_manual_edit']?></td>
      <td><?=$listdata[$i]['umur_manual_edit']?></td>
      <td><?=$listdata[$i]['dokter']?></td> 
      <td><?=$listdata[$i]['diagnosa']?></td> 
      <td><?=$listdata[$i]['DL']?></td> 
      <td><?=$listdata[$i]['UL']?></td>
      <td><?=$listdata[$i]['FL']?></td>
      <td><?=$listdata[$i]['Kimia_Darah']?></td>
      <td><?=$listdata[$i]['Kimia_Cairan']?></td> 
      <td><?=$listdata[$i]['Parasitologi']?></td>
      <td><?=$listdata[$i]['Immunologi']?></td>
      <td><?=$listdata[$i]['Mikrobiologi']?></td>
      <td><?=$listdata[$i]['Narkoba']?></td>
      <td><?=$listdata[$i]['keadaan_spesimen']?></td>
      <td><?=$listdata[$i]['jam']?></td> 
      <td></td>
      <td><?=$listdata[$i]['petugas_entry']?></td>
      <td></td>     
    </tr>
    <?php  } ?>
  </tbody>
</table>




<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
  var url = $(this).attr("href"); 

  var periode = $("#periode").val();
  alert(periode);
  $.ajax({
    type: "POST",
    data: "ajax=1&periode="+periode,
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
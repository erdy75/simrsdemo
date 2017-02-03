<table id="example1" class="table table-bordered table-lab">
    <thead>
      <tr>
        <th>No Reg</th>
        <th>No / Nama Pasien</th>
        <th>Tgl / jam</th>
        <th>Jenis Penjamin</th>
        <th>Rawat Inap / Jalan</th>
        <th>No Urut</th>
        <th>Remark</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>

      <?php for ($i=0; $i < count($list_data); $i++) {  ?>
        <?php if($list_data[$i]['status']==='waiting') {?>
        <tr class="data_lab_periksa">
          <td><?=$list_data[$i]['no_order'];?></td>
          <td><?=$list_data[$i]['cib'].' / '.$list_data[$i]['nama_manual_edit'];?></td>
          <td><?=$this->date->konversi2($list_data[$i]['tanggal']).' / '.$list_data[$i]['jam'];?></td>
          <td><?=$list_data[$i]['KelompokBeli'].' / '.$list_data[$i]['penjamin_manual_edit'];?></td>
          <td><?=$list_data[$i]['jalan_inap'];?></td>
          <td><?=$list_data[$i]['no_reg_lab_internal'];?></td>
          <td></td>
          <td><a href="<?=base_url()?>index.php/laboratorium/form_hasil_pemeriksaan_lab/hasil/<?=$list_data[$i]['no_order']?>" class="btn btn-sm btn-rs" title="">Proses Lab</a></td> 
        </tr>
        <?php } else { ?>
        <tr class="data_lab_periksa_blue">
          <td><?=$list_data[$i]['no_order'];?></td>
          <td><?=$list_data[$i]['cib'].' / '.$list_data[$i]['nama_manual_edit'];?></td>
          <td><?=$this->date->konversi2($list_data[$i]['tanggal']).' / '.$list_data[$i]['jam'];?></td>
          <td><?=$list_data[$i]['KelompokBeli'].' / '.$list_data[$i]['penjamin_manual_edit'];?></td>
          <td><?=$list_data[$i]['jalan_inap'];?></td>
          <td><?=$list_data[$i]['no_reg_lab_internal'];?></td>
          <td/></td>
          <td><a href="<?=base_url()?>index.php/laboratorium/form_hasil_pemeriksaan_lab/hasil/<?=$list_data[$i]['no_order']?>" class="btn btn-sm btn-rs" title="">Proses Lab</a></td>
        </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
    <tfoot> 
      <!-- begin footer -->
      <tr>
        <td colspan="7">
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
      $("div#ajax_lab_periksa").html(msg);
    }
  });
  return false;
  });
}

jQuery('.data_lab_periksa').on('click', function() {
    jQuery('.data_lab_periksa',$(this).parent()).removeClass('data_lab_periksa_fix');
    jQuery('.data_lab_periksa_blue',$(this).parent()).removeClass('data_lab_periksa_blue_fix');
    $(this).addClass('data_lab_periksa_fix');
    var $row = jQuery(this).closest('tr');
    var $columns = $row.find('td');

    $columns.addClass('row-highlight');
    var values = "";

    jQuery.each($columns, function(i, item) {
        // values = values + 'td' + (i + 1) + ':' + item.innerHTML + '<br/>';
        // alert(values);
      if (i==0)
      {
        values = item.innerHTML;
        $('#no_reg_lab').val(values);
        //alert(getid[0]);
      }
      if (i==1)
      {
        values = item.innerHTML;
        var getid = values.split(" / ");
        $('#id_pasien').val(getid[0]);
        //alert(getid[0]);
      }
    });
    console.log(values);
});


jQuery('.data_lab_periksa_blue').on('click', function() {
    jQuery('.data_lab_periksa',$(this).parent()).removeClass('data_lab_periksa_fix');
    jQuery('.data_lab_periksa_blue',$(this).parent()).removeClass('data_lab_periksa_blue_fix');
    $(this).addClass('data_lab_periksa_blue_fix');
    var $row = jQuery(this).closest('tr');
    var $columns = $row.find('td');

    $columns.addClass('row-highlight');
    var values = "";

    jQuery.each($columns, function(i, item) {
        // values = values + 'td' + (i + 1) + ':' + item.innerHTML + '<br/>';
        // alert(values);
      if (i==0)
      {
        values = item.innerHTML;
        $('#no_reg_lab').val(values);
        //alert(getid[0]);
      }
      if (i==1)
      {
        values = item.innerHTML;
        var getid = values.split(" / ");
        $('#id_pasien').val(getid[0]);
        //alert(getid[0]);
      }
    });
    console.log(values);
});
// begin form event

// end form event
</script>
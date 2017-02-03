<table id="example1" class="table table-bordered table-lab">
    <thead>
      <tr>
        <th>Bidang</th>
        <th>inc</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i=0; $i < count($listdata); $i++) {  ?>
        <tr class="data_lab_periksa">
          <td><?=$listdata[$i]['nama']?></td>
          <td><?=$listdata[$i]['inc']?></td>
        </tr>
      <?php } ?>
    </tbody>
    <tfoot> 
    </tfoot>
  </table>

<script>  
jQuery('.data_lab_periksa').on('click', function() {
    jQuery('.data_lab_periksa',$(this).parent()).removeClass('data_lab_periksa_fix');
    jQuery('.data_lab_periksa_blue',$(this).parent()).removeClass('data_lab_periksa_blue_fix');
    $(this).addClass('data_lab_periksa_fix');
    var $row = jQuery(this).closest('tr');
    var $columns = $row.find('td');

    $("#tambah").hide();
    $("#hapus").show();
    $("#update").show();
    $("#batal").show();

    $columns.addClass('row-highlight');
    var values = "";

    jQuery.each($columns, function(i, item) {
        // values = values + 'td' + (i + 1) + ':' + item.innerHTML + '<br/>';
        // alert(values);
      if (i==0)
      {
        values = item.innerHTML;
        $('#bidang').val(values);
        $('#bidang2').val(values);
        //alert(getid[0]);
      }
      if (i==1)
      {
        values = item.innerHTML;
        $('#inc').val(values);
        //alert(getid[0]);
      }
    });
    console.log(values);
});

// begin form event

// end form event
</script>
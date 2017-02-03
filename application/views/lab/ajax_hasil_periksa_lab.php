<table class="table table-bordered table-lab">
  <thead>
    <tr>
      <th>Pemeriksaan</th>
      <th>Hasil Pemeriksaan</th>
      <th>Nilai Pemeriksaan</th>
      <th>Apakah Abnormal ?</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($data_sub) ; $i++) { ?>
      <tr class="<?=$i?>">
        <td><?=$data_sub[$i]['pemeriksaan']?></td>
        <td><?=$data_sub[$i]['nilai']?></td>
        <td><?=$data_sub[$i]['nilai_normal']?></td>
        <td><?=$data_sub[$i]['isNormal']?></td>
        <td>
          <input type="hidden" value="<?=$i?>">
          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['pemeriksaan'].'###'.$data_sub[$i]['nilai'].'###'.$data_sub[$i]['nilai_normal'].'###'.$data_sub[$i]['isNormal']?>">
          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
        </td>
      </tr>
    <?php } ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="5">
        <input type="hidden" id="no_order"  name="no_order" value="<?=$no_order?>">
      </td>
    </tr>
  </tfoot>
</table>
</form>
<script>
  $('button.btn.btn-sm.btn-rs.proc').click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  var hasil = $(this).parent().parent().children().eq(1).text();
  var nilai = $(this).parent().parent().children().eq(2).text();
  var abnormal = $(this).parent().parent().children().eq(3).text();
  var id = $(this).parent().parent().children().eq(4).children().eq(0).val();

  $('#nama').val(nama);
  $('#hasil').val(hasil);
  $('#nilai').val(nilai);
  $('#abnormal').val(abnormal);  
  $('#td_id').val(id);

});

$('button#ubah').click(function(event) {
  var nama = $('#nama').val();
  var hasil = $('#hasil').val();
  var nilai = $('#nilai').val();
  var abnormal = $('#abnormal').val(); 
  var td_id = $('#td_id').val(); 
  var data_colect = nama + '###' + hasil + '###' + nilai + '###' + abnormal;
  $('tr.'+td_id).children().eq(1).text(hasil);
  $('tr.'+td_id).children().eq(2).text(nilai);
  $('tr.'+td_id).children().eq(3).text(abnormal);
  $('tr.'+td_id).children().eq(4).children().eq(1).val(data_colect);
});
</script>
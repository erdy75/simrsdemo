<table>
  <tbody>
    <tr>
      <td>No Order : </td>
      <td><?=$data['no_order']?> / <?=$data['tgl']?> / <?=$this->date->konversi2a($data['tgl'])?></td>
    </tr>
    <tr>
      <td>Pemesan : </td>
      <td><?=$pemesan;?></td>
    </tr>
    <tr>
      <td>Kepala : </td>
      <td><?=$data['nama_kepala_unit']?></td>
    </tr>
  </tbody>
</table>
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Item</th>
      <th>Jumlah</th>
      <th>Satuan</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['nama']?></td>
      <td><?=$listdata[$i]['jumlah']?></td>
      <td><?=$listdata[$i]['unit']?></td>     
    </tr>
    <?php } ?>
  </tbody>
</table>


<script>  
// end form event
</script>
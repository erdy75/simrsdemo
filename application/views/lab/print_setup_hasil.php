
<table style="width:100%">
	<tbody>
		<tr>
			<td style="width:30%">RS.Hasan Sadikun</td>
			<td rowspan="3" style="width:70%"><h2>LAB</h2></td>
		</tr>
		<tr>
			<td>TELP : 022-03121123</td>
		</tr>
		<tr>
			<td></td>
			
		</tr>
	</tbody>
</table>
<br><br><br>
<table style="border:1px solid #ccc;">
  <thead>
    <tr>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Text Hasil</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Nama Pemeriksaan</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Bidang</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Model Hitung</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Text Reference</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Normal Laki</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Normal Perempuan</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Metode</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Index</th
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td style="border:1px solid #ccc;padding:5px;"><?=str_replace(' ', '&nbsp;', $listdata[$i]['nama'])?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['jenis']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['bidang']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['mode_hitung']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['text_depan']?></td>
      <?php 
      if($listdata[$i]['mode_hitung']=='Text') { 
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['laki_text'].'</td>';
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['perempuan_text'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Antara Sama Dengan') {
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['laki_t1'].' - '.$listdata[$i]['laki_t2'].$listdata[$i]['satuan'].'</td>';
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['perempuan_t1'].' - '.$listdata[$i]['perempuan_t2'].$listdata[$i]['satuan'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Lebih Kecil Dari') {
        echo '<td style="border:1px solid #ccc;padding:5px;"> <'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].'</td>';
        echo '<td style="border:1px solid #ccc;padding:5px;"> <'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Lebih Kecil Dari Sama Dengan') {
        echo '<td style="border:1px solid #ccc;padding:5px;"> =<'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].'</td>';
        echo '<td style="border:1px solid #ccc;padding:5px;"> =<'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Lebih Besar Dari Sama Dengan') {
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].' >= </td>';
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].' >= </td>';
      } else {
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].' > </td>';
        echo '<td style="border:1px solid #ccc;padding:5px;">'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].' > </td>';
      }
      ?>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['metode']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['inc']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
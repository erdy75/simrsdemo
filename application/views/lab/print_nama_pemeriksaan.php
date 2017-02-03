<?php
	tcpdf();
	$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$title = "Print Label";
	$obj_pdf->SetTitle($title);	
	// $obj_pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $title, "Monthly Report");
	// $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	// $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
	// $obj_pdf->SetDefaultMonospacedFont('helvetica');
	// $obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	// $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
	// $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);;
	$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$obj_pdf->SetFont('helvetica', '', 9);
	$obj_pdf->setFontSubsetting(true);
	$obj_pdf->AddPage('L', 'A4');
	ob_start();
?>
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
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Nama Pemeriksaan</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Bidang</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Persiapan</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Unit Cost(Rp)</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Metode</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Spesiment</th>
      <th style="border:1px solid #ccc;font-weight:bolder;padding:5px;">Setup Hasil</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td style="border:1px solid #ccc;padding:5px;">
          <?=$listdata[$i]['id_layanan']?>
      </td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['bidang']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['persiapan']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['unit_cost']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['metode']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['specimen']?></td>
      <td style="border:1px solid #ccc;padding:5px;"><?=$listdata[$i]['setup_hasil']?></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	$obj_pdf->writeHTML($content, true, false, true, false, '');
	$obj_pdf->Output('cek_for.pdf', 'I');
?>
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
	// $obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	// $obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$obj_pdf->SetFont('helvetica', '', 9);
	$obj_pdf->setFontSubsetting(false);
	$obj_pdf->AddPage();
	ob_start();
?>
<table style="width:100%">
	<tbody>
		<tr>
			<td style="width:30%"><?=$nama_rs;?></td>
			<td rowspan="3" style="width:70%"><h2>LAB</h2></td>
		</tr>
		<tr>
			<td>TELP : <?=$telp;?></td>
		</tr>
		<tr>
			<td><?=$tgl_periksa_h;?> / <?=$jam_periksa_h;?></td>
			
		</tr>
	</tbody>
</table>
<br><br><br>
REG. <?=$no_order;?> [ / <?=$tgl_gabung;?>] <br>
PASIEN : <?=$no_mr;?> [<?=$nama;?>] <br>
<?=$alamat;?> <br>
<h3><?=$jenis_rawat;?></h3>

<table style="border-bottom:3px solid #ccc;border-top:3px solid #ccc;">
	<tr>
		<td style="border-bottom:3px solid #ccc;padding-top:3px;padding-bottom:3px;font-weight:bolder;">Pemeriksaan</td>
		<td style="border-bottom:3px solid #ccc;padding-top:3px;padding-bottom:3px;font-weight:bolder;">Tarif</td>
	</tr>
	<?php for ($i=0; $i < count($list_periksa_det) ; $i++) { ?>
	<tr>
		<td><?=$list_periksa_det[$i]['nama_pemeriksaan'];?></td>
		<td><?php echo number_format($list_periksa_det[$i]['tarif']);?></td>
	</tr>
	<?php } ?>
</table>
<?php
	$content = ob_get_contents();
	ob_end_clean();
	$obj_pdf->writeHTML($content, true, false, true, false, '');
	$obj_pdf->Output('output.pdf', 'I');
?>
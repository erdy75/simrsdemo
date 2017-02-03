<?php
	tcpdf();
	$obj_pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$obj_pdf->SetCreator(PDF_CREATOR);
	$title = $data_colect[6]['text_head_report_1'];
	$obj_pdf->SetTitle($title);	
	$teks_sambung1 = '';$teks_sambung2='';$teks_sambung3='';
	$teks_sambung1 = $data_colect[7]['text_head_report_2'];
	$teks_sambung2 = $data_colect[8]['text_head_report_3'];
	$teks_sambung3 = $data_colect[9]['text_head_report_4'];
	$teks_gabung = $teks_sambung1."\n".$teks_sambung2."\n".$teks_sambung3;
	// remove default header/footer
	$obj_pdf->setPrintHeader(true);
	$obj_pdf->setPrintFooter(false);
	$obj_pdf->SetHeaderData(PDF_HEADER_LOGO, 20, $title, "$teks_gabung");
	// set header and footer fonts
	$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
	$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

	// set default monospaced font
	//$obj_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

	// set margins
	$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
	//$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
	//$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

	// set auto page breaks
	$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$obj_pdf->SetFont('helvetica', '', 7);
	$obj_pdf->setFontSubsetting(false);
	$obj_pdf->AddPage('P', 'A4');	
	ob_start();
?>


<table style="padding-top:5px;">
	<tbody>
		<tr>
			<td style="width:10%">No Lab</td>
			<td style="width:2%">:</td>
			<td style="width:38%"><?=$no_order;?></td>
			<td style="width:10%">Dr.Pengirim</td>
			<td style="width:2%">:</td>
			<td style="width:38%"><?=$list_periksa['penanggung_jawab'];?></td>
		</tr>
		<tr>
			<td>No Pasien</td>
			<td>:</td>
			<td><?=$no_mr;?></td>
			<td>Tanggal</td>
			<td>:</td>
			<td><?=$tgl_periksa_h;?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>:</td>
			<td><?=$nama;?></td>
			<td>Status</td>
			<td>:</td>
			<td><?=$list_periksa['KelompokBeli'];?>(<?=$list_periksa['penjamin_manual_edit'];?>)</td>
		</tr>
		<tr>
			<td>Umur</td>
			<td>:</td>
			<td colspan="4"><?=$list_periksa['umur_manual_edit'];?> thn (bln) <?=$list_periksa['sex_manual_edit'];?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>:</td>
			<td colspan="4"><?=$alamat;?></td>
		</tr>
	</tbody>
</table>
<br><br>
<table style="border:1px solid #ccc;">
	<thead>
	  <tr style="padding:3px;">
	    <th style="border:1px solid #ccc;font-weight:bolder;text-align:center;padding:3px;">Pemeriksaan</th>
	    <th style="border:1px solid #ccc;font-weight:bolder;text-align:center;padding:3px;">Hasil Pemeriksaan</th>
	    <th style="border:1px solid #ccc;font-weight:bolder;text-align:center;padding:3px;">Nilai Normal</th>
	  </tr>
	</thead>
	<tbody>
		<?php $j=0; for ($i=0; $i < count($data_sub) ; $i++) { ?>
			<?php if($data_sub[$i]['mode_hitung']=='Text'){?>				
				<?php $pemeriksaan = str_replace(' ','#', $data_sub[$i]['nama']);?>
				<tr>
		            <td style="border:1px solid #ccc;padding-top:5px;"><?=$data_sub[$i]['nama']?></td>
		            <td style="border:1px solid #ccc;padding-top:5px;"></td>
		            <?php if($list_periksa['sex_manual_edit']=='Laki-laki'){?>
		            	<td style="border:1px solid #ccc;padding-top:5px;"><?=$data_sub[$i]['laki_text']?></td>
		            <?php } else { ?>
		            	<td style="border:1px solid #ccc;padding-top:5px;"><?=$data_sub[$i]['perempuan_text']?></td>
		            <?php } ?>
				</tr>
			<?php } elseif ($data_sub[$i]['mode_hitung']=='Antara Sama Dengan') { ?>
				<?php $pemeriksaan = str_replace(' ','#', $data_sub[$i]['nama']);?>
				<tr>	
		            <td style="border:1px solid #ccc;padding-top:5px;"><?=$data_sub[$i]['nama']?></td>
		            <td style="border:1px solid #ccc;padding-top:5px;"></td>
		            <?php if($list_periksa['sex_manual_edit']=='Laki-laki'){?>
		            	<td style="border:1px solid #ccc;padding-top:5px;">LK : <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1'].'-'.$data_sub[$i]['laki_t2']?> <?=$data_sub[$i]['satuan']?></td>
		            <?php } else { ?>
		            	<td style="border:1px solid #ccc;padding-top:5px;">Pr : <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1'].'-'.$data_sub[$i]['perempuan_t2']?> <?=$data_sub[$i]['satuan']?></td>
		            <?php } ?>
				</tr>
			<?php } elseif($data_sub[$i]['mode_hitung']=='Lebih Kecil Dari') { ?>
				<?php $pemeriksaan = str_replace(' ','#', $data_sub[$i]['nama']);?>
				<tr>
		            <td style="border:1px solid #ccc;padding-top:5px;"><?=$data_sub[$i]['nama']?></td>
		            <td style="border:1px solid #ccc;padding-top:5px;"></td>
		            <?php if($list_periksa['sex_manual_edit']=='Laki-laki'){?>
		            	<td style="border:1px solid #ccc;padding-top:5px;">LK : < <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1']?> <?=$data_sub[$i]['satuan']?></td>
		            <?php } else { ?>
		            	<td style="border:1px solid #ccc;padding-top:5px;">Pr : < <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1']?> <?=$data_sub[$i]['satuan']?></td>
		            <?php } ?>
				</tr>
			<?php } else { ?>
				<?php $pemeriksaan = str_replace(' ','#', $data_sub[$i]['nama']);?>
				<tr>	
		            <td style="border:1px solid #ccc;padding-top:5px;"><?=$data_sub[$i]['nama']?></td>
		            <td style="border:1px solid #ccc;padding-top:5px;"></td>
		            <?php if($list_periksa['sex_manual_edit']=='Laki-laki'){ ?>
		            	<td style="border:1px solid #ccc;padding-top:5px;">LK : > <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1']?> <?=$data_sub[$i]['satuan']?></td>
		            <?php } else { ?>
		            	<td style="border:1px solid #ccc;padding-top:5px;">Pr : > <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1']?> <?=$data_sub[$i]['satuan']?></td>
		            <?php } ?>
				</tr>
			<?php } ?>
		<?php } ?>
	</tbody>
</table>
<br><br>
<hr>
Bandung, <?=date('d-m-Y')?> / <?php date_default_timezone_set("Asia/Jakarta"); echo date('h:i:s');?>
<br><br><br>
<?=$list_periksa['petugas_entry'];?>


<?php
	$content = ob_get_contents();
	ob_end_clean();
	$obj_pdf->writeHTML($content, true, false, true, false, '');
	$obj_pdf->Output('output.pdf', 'I');
?>
<!DOCTYPE html>
<html>
<head>
	<title>CETAK STRUK NO MR.<?=$no_mr;?></title>
	<style type="text/css" media="screen">
		body {
			-moz-osx-font-smoothing: grayscale;
			font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
			font-weight: 400;
			font-size: 12px;
		}
	</style>
</head>
<body onload="window.print();">

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
</body>
</html>
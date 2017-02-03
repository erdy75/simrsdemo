<table width="100%">
	<tbody>
		<tr>
			<td width="50%">

				<table>
					<tr>
						<td style="padding:5px;">Kategori Item : </td>
						<td colspan="2" style="padding:5px;">
							<input type="hidden" name="id_m" value="<?=$data['id']?>">
							<select name="kategori_item_m" class="new-form-control">
							<?php for($i=0; $i<count($list_kategori_item); $i++){ ?>
								<?php if(strtoupper($list_kategori_item[$i]['nama'])==strtoupper($data['kategori_item'])) { ?>
									<option value="<?=$list_kategori_item[$i]['nama']?>" selected="true"><?=$list_kategori_item[$i]['nama']?></option>
								<?php } else { ?>
									<option value="<?=$list_kategori_item[$i]['nama']?>"><?=$list_kategori_item[$i]['nama']?></option>
								<?php }?>	
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Nama : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="nama_m" class="new-form-control" value="<?=$data['nama']?>">
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Kemasan Terkecil : </td>
						<td colspan="2" style="padding:5px;">
							<select name="satuan_m" class="new-form-control">
							<?php for($i=0; $i<count($list_satuan); $i++){ ?>
								<?php if(strtoupper($list_satuan[$i]['nama'])==strtoupper($data['satuan'])) { ?>
									<option value="<?=$list_satuan[$i]['nama']?>" selected="true"><?=$list_satuan[$i]['nama']?></option>
								<?php } else { ?>
									<option value="<?=$list_satuan[$i]['nama']?>"><?=$list_satuan[$i]['nama']?></option>
								<?php }?>	
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Kemasan Sedang : </td>
						<td style="padding:5px;"> Ada 
							<input type="text" name="pengali_satuan_sedang_m" class="new-form-control" value="<?=$data['pengali_satuan_sedang']?>" style="width:40px;">
						</td>
						<td style="padding:5px;"> Ampul Dalam 1
							<select name="nama_satuan_sedang_m" class="new-form-control">
							<?php for($i=0; $i<count($list_satuan); $i++){ ?>
								<?php if(strtoupper($list_satuan[$i]['nama'])==strtoupper($data['nama_satuan_sedang'])) { ?>
									<option value="<?=$list_satuan[$i]['nama']?>" selected="true"><?=$list_satuan[$i]['nama']?></option>
								<?php } else { ?>
									<option value="<?=$list_satuan[$i]['nama']?>"><?=$list_satuan[$i]['nama']?></option>
								<?php }?>	
							<?php } ?>
							</select>							
						</td>
					</tr>
					<tr style="padding:5px;">
						<td style="padding:5px;">Kemasan Besar : </td>
						<td style="padding:5px;"> Ada 
							<input type="text" name="pengali_satuan_besar_m" class="new-form-control" value="<?=$data['pengali_satuan_besar']?>" style="width:40px;">
						</td>
						<td style="padding:5px;"> Ampul Dalam 1
							<select name="nama_satuan_besar_m" class="new-form-control">
							<?php for($i=0; $i<count($list_satuan); $i++){ ?>
								<?php if(strtoupper($list_satuan[$i]['nama'])==strtoupper($data['nama_satuan_besar'])) { ?>
									<option value="<?=$list_satuan[$i]['nama']?>" selected="true"><?=$list_satuan[$i]['nama']?></option>
								<?php } else { ?>
									<option value="<?=$list_satuan[$i]['nama']?>"><?=$list_satuan[$i]['nama']?></option>
								<?php }?>	
							<?php } ?>
							</select>							
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Penyimpanan : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="penyimpanan_m" class="new-form-control" value="<?=$data['rak_penyimpanan']?>">
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Barcode : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="barcode_m" class="new-form-control" value="<?=$data['barcode']?>">
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Prinicipal : </td>
						<td colspan="2" style="padding:5px;">
							<select name="principal_m" class="new-form-control">
							<?php for($i=0; $i<count($list_principal); $i++){ ?>
								<?php if(strtoupper($list_principal[$i]['name'])==strtoupper($data['principal'])) { ?>
									<option value="<?=$list_principal[$i]['name']?>" selected="true"><?=$list_principal[$i]['name']?></option>
								<?php } else { ?>
									<option value="<?=$list_principal[$i]['name']?>"><?=$list_principal[$i]['name']?></option>
								<?php }?>	
							<?php } ?>
							</select>
						</td>
					</tr>
				</table>

			</td>
			<td width="50%">
				
				<table>
					<tr>
						<td style="padding:5px;">jenis : </td>
						<td colspan="2" style="padding:5px;">
							<select name="jenis_m" class="new-form-control">
							<?php for($i=0; $i<count($list_jenis_obat); $i++){ ?>
								<?php if(strtoupper($list_jenis_obat[$i]['nama'])==strtoupper($data['jenis'])) { ?>
									<option value="<?=$list_jenis_obat[$i]['nama']?>" selected="true"><?=$list_jenis_obat[$i]['nama']?></option>
								<?php } else { ?>
									<option value="<?=$list_jenis_obat[$i]['nama']?>"><?=$list_jenis_obat[$i]['nama']?></option>
								<?php }?>	
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Generik : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="generik_m" class="new-form-control" value="<?=$data['generik']?>">
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Bentuk Sediaan : </td>
						<td colspan="2" style="padding:5px;">
							<select name="bentuk_sediaan_m" class="new-form-control">
								<option value="P" selected="true">Padat [P]</option>
								<option value="G">Gas [G]</option>
								<option value="C">Cari [C]</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Dosis Sediaan : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="dosis_sediaan_m" class="new-form-control" value="<?=$data['dosis_sediaan']?>">
							<select name="satuan_dosis_sediaan_m" class="new-form-control">
							<?php for($i=0; $i<count($list_dosis); $i++){ ?>
								<?php if(strtoupper($list_dosis[$i])==strtoupper($data['kekuatan_sediaan'])) { ?>
									<option value="<?=$list_dosis[$i]?>" selected="true"><?=$list_dosis[$i]?></option>
								<?php } else { ?>
									<option value="<?=$list_dosis[$i]?>"><?=$list_dosis[$i]?></option>
								<?php }?>	
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Mode Limit : </td>
						<td colspan="2" style="padding:5px;">
							<select name="mode_limit_m" class="new-form-control">
								<option value="Manual" selected="true">Manual</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Limit Di Apotek : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="limit_di_apotek_m" class="new-form-control" value="<?=$data['stock_limit']?>">
						</td>
					</tr>
					<tr>
						<td style="padding:5px;">Limit Di Gudang : </td>
						<td colspan="2" style="padding:5px;">
							<input type="text" name="limit_di_gudang_m" class="new-form-control" value="<?=$data['stock_limit_digudang']?>">
						</td>
					</tr>
				</table>


			</td>
		</tr>
	</tbody>
</table>
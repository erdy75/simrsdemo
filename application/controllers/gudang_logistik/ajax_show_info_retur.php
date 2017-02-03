<table>
	<tbody>
		<tr>
			<td style="padding:5px;font-weight:bold;">Supplier : </td>
			<td style="padding:5px;">
				<select name="nama_supplier" class="new-form-control readonly">
				<?php for ($i=0; $i < count($list_supplier); $i++) { ?>
					<?php if($list_supplier[$i]['nama']==$data['supplier']) { ?>
						<option value="<?=$list_supplier[$i]['nama']?>" selected="true"><?=$list_supplier[$i]['nama']?></option>
					<?php } else { ?>
						<option value="<?=$list_supplier[$i]['nama']?>"><?=$list_supplier[$i]['nama']?></option>
					<?php } ?>
				<?php } ?>
				</select>
			</td>
			<td style="padding:5px;font-weight:bold;">Supplier : </td>
			<td style="padding:5px;">
				<input type="text" name="nama" class="new-form-control readonly" readonly="true" style="width:250px;">
                <button type="button" class="btn btn-info btn-sm" id="cari_nama" data-toggle="modal" data-target="#modal_cari_barang">
                    <i class="fa fa-fw fa-search"></i>
                </button>
			</td>
		</tr>
	</tbody>
</table>
<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab">Biodata Karyawan</a></li>
		<li><a href="#tab_2" data-toggle="tab">Status Karyawan</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab_1">
			<table width="100%">
				<tr>
					<td width="50%">
						<table width="100%">

							<tr>
								<td width="35%" style="padding-top:5px;color:red;">Nama Lengkap :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="nama_lengkap" id="nama_lenkgap" value="<?=$info_data['nama']?>">
								</td>
							</tr>	
							<tr>
								<td width="35%" style="padding-top:5px;color:red;">Alamat :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="alamat" id="alamat" value="<?=$info_data['alamat']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:red;">Tempat Lahir :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="45%" style="padding-right:5px;">
											<input type="text" class="form-control input-sm" name="tempat_lahir" id="tempat_lahir" value="<?=$info_data['tempat']?>">
											</td>
											<td width="55%">
												<input type="text" class="form-control input-sm" name="tanggal_lahir" id="tanggal_lahir" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask value="<?=$info_data['tgl_lahir']?>">
											</td>
										</tr>
									</table>
								
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:red;">Indentitas Diri :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="40%" style="padding-right:5px;">
											<select class="form-control input-sm" name="list_id" id="list_id">
												<?php for ($i=0; $i < count($list_id) ; $i++) { ?>
													<?php if($list_id[$i]==$info_data['id_card']) {  ?>
														<option value="<?=$list_id[$i]?>" selected="true"><?=$list_id[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_id[$i]?>" ><?=$list_id[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
											<td width="60%">
												<input type="text" class="form-control input-sm" name="indentitas" id="indentitas" value="<?=$info_data['id_no']?>">
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:red;">No Telepon :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="no_telp" id="no_telp" value="<?=$info_data['telp']?>">
								</td>
							</tr>							
						</table>
					</td>
					<td width="50%" valign="top" style="padding-left:5px;">
						<table width="100%">
							<tr>
								<td width="35%" style="padding-top:5px;">Handphone :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="hp" id="hp" value="<?=$info_data['hp1']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Jenis Kelamin :</td>
								<td width="65%" style="padding-top:5px">
									<select class="form-control input-sm" name="sex" id="sex">
										<?php for ($i=0; $i < count($jenis_kelamin) ; $i++) { ?>
											<?php if($jenis_kelamin[$i]==$info_data['sex']) {  ?>
												<option value="<?=$jenis_kelamin[$i]?>" selected="true"><?=$jenis_kelamin[$i]?></option>
											<?php } else { ?>
												<option value="<?=$jenis_kelamin[$i]?>" ><?=$jenis_kelamin[$i]?></option>
											<?php } ?>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Darah :</td>
								<td width="65%" style="padding-top:5px">
								<select class="form-control input-sm" name="darah" id="darah">
								<?php for ($i=0; $i < count($listdarah) ; $i++) { ?>
									<?php if($listdarah[$i]==$info_data['darah']) {  ?>
										<option value="<?=$listdarah[$i]?>" selected="true"><?=$listdarah[$i]?></option>
									<?php } else { ?>
										<option value="<?=$listdarah[$i]?>" ><?=$listdarah[$i]?></option>
									<?php } ?>
								<?php } ?>
								</select>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Lain-lain :</td>
								<td width="65%" style="padding-top:5px">
								<textarea class="form-control input-sm" name="lain_lain" id="lain_lain" ><?=$info_data['lain']?></textarea> 
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div><!-- /.tab-pane -->
		<div class="tab-pane" id="tab_2">
			<table width="100%">
				<tr>
					<td width="50%">
						<table width="100%">
							<tr>
								<td width="35%" style="padding-top:5px;">Kategori :</td>
								<td width="65%" style="padding-top:5px">
								<select class="form-control input-sm" name="kategori" id="kategori">
								<?php for ($i=0; $i < count($list_kategori) ; $i++) { ?>
									<?php if($list_kategori[$i]==$info_data['kategori']) {  ?>
										<option value="<?=$list_kategori[$i]?>" selected="true"><?=$list_kategori[$i]?></option>
									<?php } else { ?>
										<option value="<?=$list_kategori[$i]?>" ><?=$list_kategori[$i]?></option>
									<?php } ?>
								<?php } ?>
								<input type="hidden" name="id" value="<?=$id?>">
								</select>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">TMT Masuk :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="tmt_masuk" id="tmt_masuk"  value="<?=$info_data['TMT_masuk']?>"> 
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Poli Unit / Jaga :</td>
								<td width="65%" style="padding-top:5px">
								<select class="form-control input-sm" name="poli" id="poli">
								<?php for ($i=0; $i < count($listpoli) ; $i++) { ?>
									<?php if($listpoli[$i]['nama']==$info_data2['bagian']) {  ?>
										<option value="<?=$listpoli[$i]['nama']?>" selected="true"><?=$listpoli[$i]['nama']?></option>
									<?php } else { ?>
										<option value="<?=$listpoli[$i]['nama']?>" ><?=$listpoli[$i]['nama']?></option>
									<?php } ?>
								<?php } ?>
								<input type="hidden" name="id" value="<?=$id?>">
								</select>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Jabatan :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="jabatan" id="jabatan" value="<?=$info_data2['jabatan']?>">
								</td>
							</tr>
							<tr>
								<td width="100%" colspan="2" style="padding-top:5px;font-weight:bolder;">Tunjangan dan Gaji Pokok :</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Gaji Pokok :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="gaji_pokok" id="gaji_pokok" value="<?=$info_data2['gajipokok']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">TJ Transport :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="tj_transport" id="tj_transport" value="<?=$info_data2['trans']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">TJ Makan :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="tj_makan" id="tj_makan" value="<?=$info_data2['makan']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">TJ kehadiran :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="tj_kehadiran" id="tj_kehadiran" value="<?=$info_data2['kehadiran']?>">
								</td>
							</tr>							
						</table>
					</td>
					<td width="50%" valign="top" style="padding-left:5px;">
						<table width="100%">
							<tr>
								<td width="100%" colspan="2" style="padding-top:5px;font-weight:bolder;">Rekening Bank :</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">Nama Bank :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="nama_bank" id="nama_bank" value="<?=$info_data2['bank']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">Cabang :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="cabang" id="cabang" value="<?=$info_data2['cabang']?>">
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">Kode Rekening :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="kode_rek" id="kode_rek" value="<?=$info_data2['no_rek']?>">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>		
		</div><!-- /.tab-pane -->
	</div>
</div>

<script>
$("#tanggal_lahir").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
$("#tmt_masuk").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"});
</script>
<style>
.datepicker{z-index:1151 !important;}
</style>
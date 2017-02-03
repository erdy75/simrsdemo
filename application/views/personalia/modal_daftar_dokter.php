<div class="nav-tabs-custom">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#tab_1" data-toggle="tab">Biodata</a></li>
		<li><a href="#tab_2" data-toggle="tab">Status Dokter</a></li>
		<li><a href="#tab_3" data-toggle="tab">Pendidikan</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane active" id="tab_1">
			<table width="100%">
				<tr>
					<td width="50%">
						<table width="100%">
							<tr>
								<td width="35%" style="padding-top:5px;color:red;">Poli Unit / Jaga :</td>
								<td width="65%" style="padding-top:5px">
								<select class="form-control input-sm" name="poli" id="poli">
								<?php for ($i=0; $i < count($listpoli) ; $i++) { ?>
									<?php if($listpoli[$i]['nama']==$info_data['poli']) {  ?>
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
								<td width="35%" style="padding-top:5px;">Jasa Konsul (Persen) :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="jasa_konsul_persen" id="jasa_konsul_persen" style="width:60%;display: inline;" value="<?=$info_data2['persen_jasa_konsult']?>">%
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Jasa Konsul Fix :</td>
								<td width="65%" style="padding-top:5px">Rp.
								<input type="text" class="form-control input-sm" name="jasa_konsul_fix_siang" id="jasa_konsul_fix_siang" style="width:60%;display: inline;" value="<?=$info_data2['jasa_fix']?>"> Siang
								</td>
							</tr>	
							<tr>
								<td width="35%" style="padding-top:5px;"></td>
								<td width="65%" style="padding-top:5px">Rp.
								<input type="text" class="form-control input-sm" name="jasa_konsul_fix_malam" id="jasa_konsul_fix_malam" style="width:60%;display:inline;" value="<?=$info_data2['jasa_fix_malam']?>"> Malam
								</td>
							</tr>	
							<tr>
								<td width="100%" colspan="2" style="padding-top:5px;font-weight:bolder;">Default Fee Dokter :</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Fee Tindakan Di Poli/unit :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="fee_tindakan_poli" id="fee_tindakan_poli"  style="width:90%;display:inline;" value="<?=$info_data2['jasa_tindakan']?>"> %
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Refereal Fee Apotek :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="ref_fee_apotek" id="ref_fee_apotek"  style="width:90%;display:inline;" value="<?=$info_data2['komisi_apotik_persen']?>"> %
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Refereal Fee Laborat & Radiolog :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="ref_fee_lab_rad" id="ref_fee_lab_rad" style="width:90%;display:inline;" value="<?=$info_data2['komisi_lab']?>"> %
								</td>
							</tr>							
						</table>
					</td>
					<td width="50%" valign="top" style="padding-left:5px;">
						<table width="100%">
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
							<tr>
								<td width="35%" style="padding-top:5px;">TJ Keluarga :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="40%" style="padding-right:5px;">
											<select class="form-control input-sm" name="type_kel" id="type_kel">
												<?php for ($i=0; $i < count($list_tj_kel) ; $i++) { ?>
													<?php if($list_tj_kel[$i]==$info_data2['type_kel']) {  ?>
														<option value="<?=$list_tj_kel[$i]?>" selected="true"><?=$list_tj_kel[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tj_kel[$i]?>" ><?=$list_tj_kel[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
											<td width="60%">
												<input type="text" class="form-control input-sm" name="tj_keluarga" id="tj_keluarga" value="<?=$info_data2['keluarga']?>">
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;color:blue;">THR :</td>
								<td width="65%" style="padding-top:5px">
								<input type="text" class="form-control input-sm" name="THR" id="THR" value="<?=$info_data2['thr']?>">
								</td>
							</tr>
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
		<div class="tab-pane"  id="tab_3">
			<table width="100%">
				<tr>
					<td width="50%">
						<table width="100%">
							<tr>
								<td width="35%" style="padding-top:5px;">Sekolah Dasar:</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%"  style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="SD" id="SD" value="<?=$info_data3['sd']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_sd" id="tahun_sd">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t1']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">SMP / SLTP :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%"  style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="SMP" id="SMP" value="<?=$info_data3['smp']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_smp" id="tahun_smp">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t2']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>	
							<tr>
								<td width="35%" style="padding-top:5px;">SMU :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="SMU" id="SMU" value="<?=$info_data3['sma']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_smu" id="tahun_smu">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t3']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>	
							<tr>
								<td width="100%" colspan="2" style="padding-top:5px;font-weight:bolder;">&nbsp;</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Diploma :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="diploma" id="diploma" value="<?=$info_data3['d3']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_diploma" id="tahun_diploma">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t4']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Stata 1 :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="strata1" id="strata1" value="<?=$info_data3['s1']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_stata1" id="tahun_stata1">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t5']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Stata 2 :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="strata2" id="strata2" value="<?=$info_data3['s2']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_stata2" id="tahun_stata2">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t6']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Stata 3 :</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="strata3" id="strata3" value="<?=$info_data3['s3']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_stata3" id="tahun_stata3">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t7']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>								
						</table>
					</td>
					<td width="50%" valign="top" style="padding-left:5px;">
						<table width="100%">
							<tr>
								<td width="35%" style="padding-top:5px;">Kursus / Pelatihan:</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="kursus1" id="kursus1" value="<?=$info_data3['kursus1']?>">
											</td>
											<td width="40%">
											<select class="form-control input-sm" name="tahun_kursus1" id="tahun_kursus1">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t8']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Kursus / Pelatihan:</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="kursus2" id="kursus2" value="<?=$info_data3['kursus2']?>">
											</td>
											<td width="40%" >
											<select class="form-control input-sm" name="tahun_kursus2" id="tahun_kursus2">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t9']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Kursus / Pelatihan:</td>
								<td width="65%" style="padding-top:5px">
									<table>
										<tr>
											<td width="60%" style="padding-right:5px;">
												<input type="text" class="form-control input-sm" name="kursus3" id="kursus3" value="<?=$info_data3['kursus3']?>">
											</td>
											<td width="40%" >
											<select class="form-control input-sm" name="tahun_kursus3" id="tahun_kursus3">
												<?php for ($i=0; $i < count($list_tahun) ; $i++) { ?>
													<?php if($list_tahun[$i]==$info_data3['t10']) {  ?>
														<option value="<?=$list_tahun[$i]?>" selected="true"><?=$list_tahun[$i]?></option>
													<?php } else { ?>
														<option value="<?=$list_tahun[$i]?>" ><?=$list_tahun[$i]?></option>
													<?php } ?>
												<?php } ?>
											</select>
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td width="35%" style="padding-top:5px;">Lain-lain :</td>
								<td width="65%" style="padding-top:5px">
									<textarea  class="form-control input-sm" name="lain_lain2" id="lain_lain2"><?=$info_data3['lain']?></textarea> 
								</td>
						</table>
					</td>
				</tr>
			</table>
		</div><!-- /.tab-pane -->
	</div>
</div>

<script>
$("#tanggal_lahir").inputmask("dd-mm-yyyy", {"placeholder": "dd-mm-yyyy"})
</script>
<style>
.datepicker{z-index:1151 !important;}
</style>
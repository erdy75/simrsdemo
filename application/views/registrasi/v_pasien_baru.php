<head>
<link rel="stylesheet" href="../../../assets/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="../../../assets/select2/dist/css/select2.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/jquery.dataTables.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/dataTables.tableTools.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/font-awesome.css">
<style type="text/css">
 .display
    tr td:first-child {
        text-align: center;
    }
 
    tr td:first-child:before {
        content: "\f096"; /* fa-square-o */
        font-family: FontAwesome;
    }
 
    tr.selected td:first-child:before {
        content: "\f046"; /* fa-check-square-o */
    }
</style>
</head>

<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
		Form Pasien Baru
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">REGISTRASI</a></li>
        <li class="active">Pasien Baru</li>
    </ol>
</section>

<!-- Main content -->

<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->
				
				<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<div class="nav-tabs-custom" id="tab_pasienbaru">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Data Pasien Baru</a></li>
								<li><a href="#tab_2" data-toggle="tab">Setup Data Pasien</a></li>
							</ul>	
							
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">
											
												<div class="col-sm-6">
													<div class="form-group">
														
														
														<div class="row">
															<div class="col-lg-4" >
																<label><input type="checkbox" style="width:50px;" name="cek_norm" id="cek_norm">No RM Pasien</label>
															</div>
															<div class="col-lg-4" >
																<input type="text" style="margin-left:-20%;" class="form-control" name="norm" id="norm" disabled=false placeholder=". . . .">
															</div>
																<button type="button" style="margin-left:-5%;" id="btn_ok" disabled=false class="btn btn-danger"><i class="fa fa-refresh"></i>	OK</button>		
																<button type="button" style="margin-left:1%;" id="btn_search" disabled=false class="btn btn-primary"><i class="fa fa-search"></i>	 Search</button>	
														</div>	
																
														<div class="row">	
															<label for="inputEmail3" style="margin-left:3%;width:25%;" class="col-sm-2 control-label">Berikan Alasannya</label>
															<div class="col-xs-1" >
																<textarea style="margin-left:-2px;" rows="2" cols="35" name="alasan" id="alasan" disabled=false ></textarea>
															</div>																								
														</div>
													</div>					
													
													<div class="form-group">	
														<div class="row">	
															<label for="inputEmail3" style="width:33%;" class="col-sm-2 control-label">Jenis Pasien</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_jenispx" id="combo_jenispx" style="width: 120%;"	>
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_jp as $jp) { ?>	
																		<option value="<?php echo $jp["nama"]; ?>"><?php echo $jp["nama"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>																
																<button type="button" style="margin-left:4%;" id="btn_auto" disabled=false class="btn btn-info"><i class="fa fa-refresh"></i>	Auto Indeks</button>
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:33%;" class="col-sm-2 control-label">No Anggota/Index Keluarga</label>
															<div class="col-lg-5" >
																<input type="text" style="margin-left:%;" class="form-control" name="noanggota" id="noanggota"  disabled=false>
															</div>		
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:33%;" class="col-sm-2 control-label">Hubungan Keluarga</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_hubkeluarga" id="combo_hubkeluarga" disabled=false style="width: 120%;"	>
																	<option selected="selected">Peserta</option>
																	<option>Suami</option>
																	<option>Istri</option>
																	<option>Anak Ke-1</option>
																	<option>Anak Ke-2</option>
																	<option>Anak Ke-3</option>
																	<option>Anak Ke-4</option>
																	<option>Anak Ke-5</option>
																	<option>Lain-lain</option>
																</select>																		
															</div>									
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:33%;" class="col-sm-2 control-label">Keluarga Dari</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="keluargadari" id="keluargadari" disabled=false >
															</div>	
																
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:33%;" class="col-sm-2 control-label">Area</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_area" id="combo_area" disabled=false style="width: 120%;"	>
																	<option selected="selected">==PILIH==</option>
																	<option>Surabaya</option>
																	<option>Kediri</option>
																	<option>Malang</option>
																</select>																		
															</div>
																
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:33%;" class="col-sm-2 control-label">Kategori</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_kategori" id="combo_kategori" disabled=false style="width: 120%;"	>
																	<option selected="selected">-</option>
																	<option>Pegawai</option>
																	<option>Kontraktor</option>
																	<option>Out Source</option>
																</select>																		
															</div>
														</div>
															
													</div>
													
													
													<div class="form-group">
														<div class="row">
															<div class="col-lg-4" >
																<label><input type="checkbox" style="width:50px;" name="cek_khususmigrasi" id="cek_khususmigrasi">Khusus Migrasi</label>
															</div>
															<div class="col-lg-4" >
																<input type="text" style="margin-left:-20%;" class="form-control" name="normmigrasi" id="normmigrasi" disabled=false placeholder="Masukan No RM">
															</div>
																<button type="button" style="margin-left:-5%;" id="btn_nobaru" class="btn btn-info"><i class="fa fa-refresh"></i>	No Baru</button>		
														</div>
													</div>	
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Nama</label>
															<div class="col-lg-5" >
																<input type="text"  class="form-control" name="nama" id="nama"  placeholder="">
															</div>								
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Alamat</label>
															<div class="col-xs-5" >
																<textarea  rows="3" cols="30" name="alamat" id="alamat"  ></textarea>
															</div>	
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_alamat" id="combo_alamat" style="margin-left:-15%;width:100%;"	>
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_kota as $kota) { ?>	
																		<option value="<?php echo $kota["kota"]; ?>"><?php echo $kota["kota"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Tempat Tgl Lahir</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_ttl" id="combo_ttl" style="width: 129%;"	>
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_kota as $kota) { ?>	
																		<option value="<?php echo $kota["kota"]; ?>"><?php echo $kota["kota"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>
															<div class="col-lg-3" >
																<input type="text" style="margin-left:26%;" name="tgllahir" id="tgllahir"  class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
																
															</div>							
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Jenis Kelamin</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_jk" id="combo_jk" style="width: 120%;"	>
																	<option selected="selected">==PILIH==</option>
																	<option>Laki-laki</option>
																	<option>Perempuan</option>
																</select>																		
															</div>
															<label for="inputEmail3" style="margin-left:4%;width:15%;" class="col-sm-2 control-label">Gol Darah</label>
															<div class="col-lg-2" >
																<select class="col-sm-2 form-control"  name="combo_goldarah" id="combo_goldarah" style="width: 125%;"	>
																	<option selected="selected">?</option>
																	<option>O</option>
																	<option>A</option>
																	<option>B</option>
																	<option>AB</option>
																</select>																		
															</div>							
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Identitas Diri</label>
															<div class="col-lg-2" >
																<select class="col-sm-2 form-control"  name="combo_identitasdiri" id="combo_identitasdiri" style="width: 130%;"	>
																	<option selected="selected">KTP</option>
																	<option>SIM</option>
																	<option>PASSPORT</option>
																	<option>KSK</option>
																	<option>KIPEMS</option>
																</select>																		
															</div>
															<div class="col-lg-6" >
																<input type="text" style="width:93%;" class="form-control" name="identitasdiri" id="identitasdiri"  placeholder="">
															</div>							
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Agama</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_agama" id="combo_agama" style="width: 120%;"	>
																	<option selected="selected">-</option>
																	<option>Islam</option>
																	<option>Kristen</option>
																	<option>Katolik</option>
																	<option>Hindu</option>
																	<option>Budha</option>
																	<option>Konghucu</option>
																	<option>Lainnya</option>
																</select>																		
															</div>
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Telepon</label>
															<div class="col-lg-3" >
																<input type="text" style="width:%;" class="form-control" name="telepon" id="telepon"  placeholder="">
															</div>
															
															<label for="inputEmail3" style="margin-left:-3%;" class="col-sm-2 control-label">Hanphone</label>
															<div class="col-lg-3" >
																<input type="text" style="margin-left:-20%;width:120%;" class="form-control" name="handphone" id="handphone"  placeholder="">
															</div>
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Lain-lain</label>
															<div class="col-xs-1" >
																<textarea  rows="2" cols="51" name="lainlain" id="lainlain"  ></textarea>
															</div>	
														</div>
													</div>
													
													<div class="form-group">	
														<button type="button" style="margin-left:15%;" id="btn_tambah" class="btn btn-danger"><i class="fa fa-plus"></i>	Tambah</button>
														<button type="button" style="margin-left:3%;" id="btn_edit" disabled=false class="btn btn-danger"><i class="fa fa-pencil"></i>	Edit</button>
														<button type="button" style="margin-left:3%;" id="btn_hapus" disabled=false class="btn btn-danger"><i class="fa fa-recycle"></i>	Hapus</button>
														<button type="button" style="margin-left:3%;" id="btn_batal" disabled=false class="btn btn-danger"><i class="fa fa-reply"></i>	Batal</button>
													</div>
												</div>
												
												<div class="col-sm-6">	
												
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_penjamin" id="combo_penjamin" style="width: 117%;"	>
																	<option selected="selected">Tanpa Penjamin</option>
																	<option>Dengan Penjamin</option>
																</select>																		
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Nama Penjamin</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_namapenjamin" id="combo_namapenjamin" style="width: 120%;" disabled=false>
																	<?php foreach ($dt_penjamin as $penjamin) { ?>	
																		<option value="<?php echo $penjamin["nama"]; ?>"><?php echo $penjamin["nama"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Expired</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:170px;" name="tglexpired" id="tglexpired"  disabled=false  class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask>
																</div> 
															</div>																					
														</div>
													</div>													
													<div class="form-group">	
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">No Peserta</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="nopeserta" id="nopeserta"  disabled=false>
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">No SEP</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="nosep" id="nosep"  disabled=false>
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">No Kartu</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="nokartu" id="nokartu" disabled=false>
															</div>																					
														</div>
													</div>													
													<div class="form-group">	
														<div class="row">	
															<label for="inputEmail3" style="width:60%;" class="col-sm-2 control-label">1) Pasien Corporate: Identitas No Jaminan harus diisi.</label>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:100%;" class="col-sm-2 control-label">2) Bila Nama Penjamin tidak tersedia, pastikan sudah di Aktifkan oleh Bag. Corporate.</label>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:80%;" class="col-sm-2 control-label">3) Bag. Registrasi harus memastikan ulang identitas Pasien Adalah Benar.</label>
														</div>
														<div class="row">	
															<div class="col-xs-1" >
																<textarea  rows="12" cols="80" name="ketpenjamin" id="ketpenjamin"  ></textarea>
															</div>	
														</div>
													</div>													
													<div class="form-group">	
														<div class="row">	
															<label for="inputEmail3" style="width:50%;" class="col-sm-2 control-label">Referral pasien (Tahu dari mana)</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_referral" id="combo_referral" style="width: 120%;"	>
																	<option selected="selected">-</option>
																	<option>Gunawan Tri Pangesti ,drg</option>
																</select>																		
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:50%;" class="col-sm-2 control-label">Dokter (Praktek) yang pernah dikunjungi</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="dokter" id="dokter"  placeholder="">
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:50%;" class="col-sm-2 control-label">RS/Klinik lain yang pernah dikunjungi</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="rsklinik" id="rsklinik"  placeholder="">
															</div>																					
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:50%;" class="col-sm-2 control-label">Kunjungan pertama didampingi siapa</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_kunjungan" id="combo_kunjungan" style="width: 120%;"	>
																	<option selected="selected">Datang Sendiri</option>
																	<option>Orang Tua</option>
																	<option>Suami/Istri</option>
																	<option>Anak/Keluarga Lain</option>
																	<option>Tetangga</option>
																	<option>Rekan Kerja</option>
																	<option>Polisi</option>
																</select>																		
															</div>																					
														</div>
													</div>
													
												</div>
											
											</div>
										</div>									
																															
									</div>
								</div>					
																							
								<div class="tab-pane" id="tab_2" style="position: relative; height: 800px;">
									
									<div class="box-body">					
										<div class="row">
											<div class="form-group">
												<div class="col-sm-7">
												
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Penggunaan Petunjuk</h3>
																<div class="box-tools pull-right">
																	<span class="label label-primary"></span>
																</div>
														</div>														
													</div>	
													
													
													<div class="row">
														<div class="col-sm-12">
															<div class="box-body">
																<div class="form-group">
																	<div class="row">	
																		<label for="inputEmail3" style="width:110%;" class="col-sm-2 control-label">Panel ini digunakan untuk melakukan migrasi database pasien yang saat ini telah berjalan (jika sebelumnya telah menggunakan SIM RS) ke program CMSM, ada 2 cara untuk melakukan migrasi data yaitu :</label>
																	</div>
																</div>
																<div class="form-group">
																	<div class="row">	
																		<label for="inputEmail3" style="width:110%;" class="col-sm-2 control-label">1) Cara Pertama yaitu dengan melakukan IMPORT DATABASE lama dalam file berformat CSV (tab delimited atau comma delimited).</label>
																	</div>
																	<div class="row">	
																		<label for="inputEmail3" style="width:110%;" class="col-sm-2 control-label">2) Cara Kedua yaitu dengan cara memindahkan manual ketika pasien lama melakukan kunjungan ulang, dan pada saat melakukan kunjungan ulang No. RM yang lama juga ikut dimasukkan, apabila pasien adalah pasien baru (belum pernah berkunjung) maka sistem akan secara otomatis memberi no terakhir berdasarkan No. RM database lama (sudah diset pada saat awal program).</label>
																	</div>
																</div>
																<div class="form-group">	
																	<div class="row">
																		<div class="col-lg-4" >
																			<label><input type="radio" style="width:50px;" name="radio" id="radio_import" checked >Import Database</label>
																		</div>
																		<div class="col-lg-4" >
																			<select class="col-sm-2 form-control" style="margin-left:-21%;" name="combo_import" id="combo_import" style="width: 120%;"	>
																			
																			</select>																		
																		</div>
																			<button type="button" style="margin-left:-6%;" id="btn_import" class="btn btn-danger"><i class="fa  fa-sign-in"></i>	Import</button>
																	</div>
																		
																</div>
																<div class="form-group">	
																	<div class="row">
																		<div class="col-lg-4" >
																			<label><input type="radio" style="width:50px;" name="radio" id="radio_migrasi">Migrasi Manual</label>
																		</div>
																	</div>
																	<div class="row">
																		<label for="inputEmail3" style="margin-left:7%;width:20%;" class="col-sm-2 control-label">No RM Terakhir</label>
																		<div class="col-lg-4" >
																			<input type="text" style="" class="form-control" name="normterakhir" id="normterakhir"  disabled=false>
																		</div>
																			<button type="button" id="btn_simpan" class="btn btn-danger" disabled=false><i class="fa fa-save"></i>	Simpan</button>
																	</div>
																		
																</div>
															</div>
														</div>
													</div>
													
												</div>
												<div class="col-sm-5">
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Jenis Pasien</h3>
																<div class="box-tools pull-right">
																	<span class="label label-primary"></span>
																</div>
														</div>														
													</div>	
													
													<div class="row">
														<div class="col-sm-12">
															<div class="box-body">
																<div class="form-group">
																	<div class="row">	
																		<div class="col-xs-1" >
																			<textarea  rows="6" cols="60" name="alamat" id="alamat"  ></textarea>
																		</div>		
																	</div>																		
																</div>
																<div class="form-group">	
																	<div class="row">
																		<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Jenis Pasien</label>
																		<div class="col-lg-6" >
																			<input type="text" style="" class="form-control" name="jenispasien" id="jenispasien"  placeholder="">
																		</div>																		
																	</div>
																	<div class="row">
																		<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Penjamin</label>
																		<div class="col-lg-5" >
																			<select class="col-sm-2 form-control" name="combo_penjamin2" id="combo_penjamin2" style="width: 124%;"	>
																			<option selected="selected">Tanpa Penjamin</option>
																			<option>Dengan Penjamin</option>
																			</select>																		
																		</div>																	
																	</div>
																</div>
																<div class="form-group">	
																	<button type="button" style="margin-left:20%;" id="btn_tambah2" class="btn btn-danger"><i class="fa fa-plus"></i>	Tambah</button>
																	<button type="button" style="margin-left:3%;" id="btn_edit2" class="btn btn-danger"><i class="fa fa-pencil"></i>	Edit</button>
																	<button type="button" style="margin-left:3%;" id="btn_hapus2" class="btn btn-danger"><i class="fa fa-recycle"></i>	Hapus</button>
																</div>
															</div>
														</div>
													</div>
													
												</div>
												<div class="col-sm-5">
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Setup (text) Identitas Pasien Penjamin</h3>
																<div class="box-tools pull-right">
																	<span class="label label-primary"></span>
																</div>
														</div>														
													</div>	
													
													<div class="row">
														<div class="col-sm-12">
															<div class="box-body">
																<div class="form-group">
																	<div class="row">	
																		<div class="col-lg-4" >
																			<label><input type="checkbox" style="width:50px;" name="cek_identitas1" checked disabled=false id="cek_identitas1">Identitas 1</label>
																		</div>
																		<div class="col-lg-5" >
																			<input type="text"  class="form-control" name="identitas1" id="identitas1"  value="No Peserta" >
																		</div>		
																	</div>
																	<div class="row">	
																		<div class="col-lg-4" >
																			<label><input type="checkbox" style="width:50px;" name="cek_identitas2" checked id="cek_identitas2">Identitas 2</label>
																		</div>
																		<div class="col-lg-5" >
																			<input type="text"  class="form-control" name="identitas2" id="identitas2"  value="No SEP" >
																		</div>		
																	</div>
																	<div class="row">	
																		<div class="col-lg-4" >
																			<label><input type="checkbox" style="width:50px;" name="cek_identitas3" checked id="cek_identitas3">Identitas 3</label>
																		</div>
																		<div class="col-lg-5" >
																			<input type="text"  class="form-control" name="identitas3" id="identitas3"  value="No Kartu" >
																		</div>		
																	</div>
																</div>
																<div class="form-group">
																	<button type="button" style="margin-left:36%;" id="btn_simpan2" class="btn btn-danger"><i class="fa fa-save"></i>	Simpan</button>
																</div>
																
																
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>	
												
								</div>											
								
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">	
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">List Pasien Yang Telah Terdaftar</h3>
						</div><!-- /.box-header -->		
						<div class="form-group">
							<div class="row">
								<div class="col-md-12">
									<table id="list_pasien" class="table table-bordered table-hover display">
										<thead>
											<tr>
											<th></th>
											<th>No RM</th>
											<th>Nama</th>	
											<th>Alamat</th>											
											<th>TTL/Umur</th>
											<th>Sex</th>											
											<th>No Keluarga/Anggota</th>
											<th>Lainnya</th>
											</tr>
										</thead>
									</table>												
								</div>								
							</div>									
						</div>
					</div>
				</div>
			</div>
		</div>
			
	</div>	

</section>


<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
<?php
$this->load->view('template/foot');
?>

<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../../../assets/AdminLTE-2.0.5/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="../../../assets/datatables/js/jquery.dataTables.min.js"></script>
<script src="../../../assets/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="../../../assets/DataTables/js/dataTables.select.min.js"></script>
<script src="../../../assets/select2/dist/js/select2.js"></script>
<script src="../../../assets/Select-master/js/dataTables.select.js"></script>
<script src="../../../assets/DataTables/js/dataTables.tableTools.js"></script>
<script type="text/javascript">

	
	var dtrec;	
	
$(function () {	

	$("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
	$("[data-mask]").inputmask();
	
	$('#list_pasien').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	
	$("#cek_norm").click(function(){
		if ($("#cek_norm").prop("checked")){
			$("#norm").prop("disabled", false);
			$("#alasan").prop("disabled", false);
			$("#btn_ok").prop("disabled", false);
			$("#btn_search").prop("disabled", false);
		}else{
			$("#norm").prop("disabled", true);
			$("#alasan").prop("disabled", true);
			$("#btn_ok").prop("disabled", true);
			$("#btn_search").prop("disabled", true);
		}
	});
	$("#cek_khususmigrasi").click(function(){
		if ($("#cek_khususmigrasi").prop("checked")){
			$("#normmigrasi").prop("disabled", false);
		}else{
			$("#normmigrasi").prop("disabled", true);
		}
	});
	$('input[id="radio_import"]').on("change", function () {	
		$("#combo_import").prop("disabled", false);
		$("#btn_import").prop("disabled", false);
		$("#normterakhir").prop("disabled", true);
		$("#btn_simpan").prop("disabled", true);
	});
	$('input[id="radio_migrasi"]').on("change", function () {	
		$("#combo_import").prop("disabled", true);
		$("#btn_import").prop("disabled", true);
		$("#normterakhir").prop("disabled", false);
		$("#btn_simpan").prop("disabled", false);
	});
	
	$("#combo_jenispx").change(function(){
		if (this.value == "UMUM"){
			$("#noanggota").prop("disabled", true);
			$("#combo_hubkeluarga").prop("disabled", true);
			$("#keluargadari").prop("disabled", true);
			$("#combo_area").prop("disabled", true);
			$("#combo_kategori").prop("disabled", true);			
			$("#btn_auto").prop("disabled", true);
			$("#combo_penjamin").val("Tanpa Penjamin");
			$("#combo_namapenjamin").prop("disabled", true);	
			$("#tglexpired").prop("disabled", true);	
			$("#nopeserta").prop("disabled", true);	
			$("#nosep").prop("disabled", true);	
			$("#nokartu").prop("disabled", true);	
			$("#combo_namapenjamin").val("ASURANSI (NOT REGISTERED)");
			$("#ketpenjamin").val("");
		}else if (this.value == "==PILIH=="){
			$("#noanggota").prop("disabled", true);
			$("#combo_hubkeluarga").prop("disabled", true);
			$("#keluargadari").prop("disabled", true);
			$("#combo_area").prop("disabled", true);
			$("#combo_kategori").prop("disabled", true);			
			$("#btn_auto").prop("disabled", true);
			$("#combo_penjamin").val("Tanpa Penjamin");
			$("#combo_namapenjamin").prop("disabled", true);	
			$("#tglexpired").prop("disabled", true);	
			$("#nopeserta").prop("disabled", true);	
			$("#nosep").prop("disabled", true);	
			$("#nokartu").prop("disabled", true);	
			$("#combo_namapenjamin").val("ASURANSI (NOT REGISTERED)");
			$("#ketpenjamin").val("");
		}else if (this.value == "ASURANSI"){
			$("#noanggota").prop("disabled", false);
			$("#combo_hubkeluarga").prop("disabled", false);
			$("#keluargadari").prop("disabled", false);
			$("#combo_area").prop("disabled", false);
			$("#combo_kategori").prop("disabled", false);		
			$("#btn_auto").prop("disabled", false);	
			$("#combo_penjamin").val("Dengan Penjamin");
			$("#combo_namapenjamin").prop("disabled", false);	
			$("#tglexpired").prop("disabled", false);	
			$("#nopeserta").prop("disabled", false);	
			$("#nosep").prop("disabled", false);	
			$("#nokartu").prop("disabled", false);	
			
			var a = "Nama Penjamin : ASURANSI (NOT REGISTERED) (SURABAYA) \nTelp/Fax: -/ \n-------------------- \nTambahan Apotek Pagi (Resep & Beli Bebas) : 0% \nTambahan Apotek Malam (Resep & Beli Bebas) : 0% \nTambahan Tindakan Poli / Departement : 0% \nTambahan Penunjang (Laboratorium & Radiologi) : 0% \n-------------------- \nTipe Verifikasi : - \nJenis : Perusahaan Swasta \nPlafond Rp : 22.222.222.222 \nKonfirmasi bila ke spesialis : Ya \nKonfirmasi tindakan di atas Rp : 0 \nKonfirmasi obat di atas Rp : 0 \nKonfirmasi penunjang di atas Rp : 0 \nIstri : Tidak Ditanggung \nAnak ditanggung : Tidak Ditanggung \n-------------------- \nSyarat yg dibawa saat berobat (1) : Menunjukkan Kartu Pasien \nSyarat yg dibawa saat berobat (2) : - \nSyarat yg dibawa saat berobat (3) : -";
			var b = "Nama Penjamin : RS WILLIAM BOOTH (SURABAYA) \nTelp/Fax: -/ \n-------------------- \nTambahan Apotek Pagi (Resep & Beli Bebas) : 0% \nTambahan Apotek Malam (Resep & Beli Bebas) : 0% \nTambahan Tindakan Poli / Departement : 0% \nTambahan Penunjang (Laboratorium & Radiologi) : 0% \n-------------------- \nTipe Verifikasi : - \nJenis : Perusahaan Swasta \nPlafond Rp : 0 \nKonfirmasi bila ke spesialis : Ya \nKonfirmasi tindakan di atas Rp : 0 \nKonfirmasi obat di atas Rp : 0 \nKonfirmasi penunjang di atas Rp : 0 \nIstri : Tidak Ditanggung \nAnak ditanggung : Tidak Ditanggung \n-------------------- \nSyarat yg dibawa saat berobat (1) : Menunjukkan Kartu Pasien \nSyarat yg dibawa saat berobat (2) : - \nSyarat yg dibawa saat berobat (3) : -"; 
			if($("#combo_namapenjamin").val() == " ASURANSI (NOT REGISTERED)"){
				$("#ketpenjamin").val(b);		
			}else{
				$("#ketpenjamin").val(a);	
			}
		}else{
			$("#noanggota").prop("disabled", false);
			$("#combo_hubkeluarga").prop("disabled", false);
			$("#keluargadari").prop("disabled", false);
			$("#combo_area").prop("disabled", false);
			$("#combo_kategori").prop("disabled", false);		
			$("#btn_auto").prop("disabled", false);	
			$("#combo_penjamin").val("Tanpa Penjamin");
			$("#combo_namapenjamin").prop("disabled", true);	
			$("#tglexpired").prop("disabled", true);	
			$("#nopeserta").prop("disabled", true);	
			$("#nosep").prop("disabled", true);	
			$("#nokartu").prop("disabled", true);	
			$("#combo_namapenjamin").val("ASURANSI (NOT REGISTERED)");
			$("#ketpenjamin").val("");
		}
	});
	$("#combo_penjamin").change(function(){
		if (this.value == "Dengan Penjamin"){
			$("#combo_namapenjamin").prop("disabled", false);
			$("#tglexpired").prop("disabled", false);
			$("#nopeserta").prop("disabled", false);
			$("#nosep").prop("disabled", false);
			$("#nokartu").prop("disabled", false);							
		}else{	
			$("#combo_namapenjamin").prop("disabled", true);
			$("#tglexpired").prop("disabled", true);
			$("#nopeserta").prop("disabled", true);
			$("#nosep").prop("disabled", true);
			$("#nokartu").prop("disabled", true);
		}
		var a = "Nama Penjamin : ASURANSI (NOT REGISTERED) (SURABAYA) \nTelp/Fax: -/ \n-------------------- \nTambahan Apotek Pagi (Resep & Beli Bebas) : 0% \nTambahan Apotek Malam (Resep & Beli Bebas) : 0% \nTambahan Tindakan Poli / Departement : 0% \nTambahan Penunjang (Laboratorium & Radiologi) : 0% \n-------------------- \nTipe Verifikasi : - \nJenis : Perusahaan Swasta \nPlafond Rp : 22.222.222.222 \nKonfirmasi bila ke spesialis : Ya \nKonfirmasi tindakan di atas Rp : 0 \nKonfirmasi obat di atas Rp : 0 \nKonfirmasi penunjang di atas Rp : 0 \nIstri : Tidak Ditanggung \nAnak ditanggung : Tidak Ditanggung \n-------------------- \nSyarat yg dibawa saat berobat (1) : Menunjukkan Kartu Pasien \nSyarat yg dibawa saat berobat (2) : - \nSyarat yg dibawa saat berobat (3) : -";
		var b = "Nama Penjamin : RS WILLIAM BOOTH (SURABAYA) \nTelp/Fax: -/ \n-------------------- \nTambahan Apotek Pagi (Resep & Beli Bebas) : 0% \nTambahan Apotek Malam (Resep & Beli Bebas) : 0% \nTambahan Tindakan Poli / Departement : 0% \nTambahan Penunjang (Laboratorium & Radiologi) : 0% \n-------------------- \nTipe Verifikasi : - \nJenis : Perusahaan Swasta \nPlafond Rp : 0 \nKonfirmasi bila ke spesialis : Ya \nKonfirmasi tindakan di atas Rp : 0 \nKonfirmasi obat di atas Rp : 0 \nKonfirmasi penunjang di atas Rp : 0 \nIstri : Tidak Ditanggung \nAnak ditanggung : Tidak Ditanggung \n-------------------- \nSyarat yg dibawa saat berobat (1) : Menunjukkan Kartu Pasien \nSyarat yg dibawa saat berobat (2) : - \nSyarat yg dibawa saat berobat (3) : -"; 
		if($("#combo_namapenjamin").val() == " ASURANSI (NOT REGISTERED)"){
			$("#ketpenjamin").val(b);		
		}else{
			$("#ketpenjamin").val(a);	
		}
	});
	$("#combo_namapenjamin").change(function(){
		var a = "Nama Penjamin : ASURANSI (NOT REGISTERED) (SURABAYA) \nTelp/Fax: -/ \n-------------------- \nTambahan Apotek Pagi (Resep & Beli Bebas) : 0% \nTambahan Apotek Malam (Resep & Beli Bebas) : 0% \nTambahan Tindakan Poli / Departement : 0% \nTambahan Penunjang (Laboratorium & Radiologi) : 0% \n-------------------- \nTipe Verifikasi : - \nJenis : Perusahaan Swasta \nPlafond Rp : 22.222.222.222 \nKonfirmasi bila ke spesialis : Ya \nKonfirmasi tindakan di atas Rp : 0 \nKonfirmasi obat di atas Rp : 0 \nKonfirmasi penunjang di atas Rp : 0 \nIstri : Tidak Ditanggung \nAnak ditanggung : Tidak Ditanggung \n-------------------- \nSyarat yg dibawa saat berobat (1) : Menunjukkan Kartu Pasien \nSyarat yg dibawa saat berobat (2) : - \nSyarat yg dibawa saat berobat (3) : -";
		var b = "Nama Penjamin : RS WILLIAM BOOTH (SURABAYA) \nTelp/Fax: -/ \n-------------------- \nTambahan Apotek Pagi (Resep & Beli Bebas) : 0% \nTambahan Apotek Malam (Resep & Beli Bebas) : 0% \nTambahan Tindakan Poli / Departement : 0% \nTambahan Penunjang (Laboratorium & Radiologi) : 0% \n-------------------- \nTipe Verifikasi : - \nJenis : Perusahaan Swasta \nPlafond Rp : 0 \nKonfirmasi bila ke spesialis : Ya \nKonfirmasi tindakan di atas Rp : 0 \nKonfirmasi obat di atas Rp : 0 \nKonfirmasi penunjang di atas Rp : 0 \nIstri : Tidak Ditanggung \nAnak ditanggung : Tidak Ditanggung \n-------------------- \nSyarat yg dibawa saat berobat (1) : Menunjukkan Kartu Pasien \nSyarat yg dibawa saat berobat (2) : - \nSyarat yg dibawa saat berobat (3) : -"; 
		if (this.value == "ASURANSI (NOT REGISTERED)"){
			$("#tglexpired").val("2017/11/17");
			$("#ketpenjamin").val(a);							
		}else{	
			$("#tglexpired").val("2018/10/10");
			$("#ketpenjamin").val(b);	
		}
	});
	$("#cek_identitas2").click(function(){
		if($("#cek_identitas2").prop("checked")){
			$("#identitas2").prop("disabled", false);
			$("#identitas2").val("No SEP");
		}else{
			$("#identitas2").prop("disabled", true);
			$("#identitas2").val("");
		}
	});
	$("#cek_identitas3").click(function(){
		if($("#cek_identitas3").prop("checked")){
			$("#identitas3").prop("disabled", false);
			$("#identitas3").val("No Kartu");
		}else{
			$("#identitas3").prop("disabled", true);
			$("#identitas3").val("");
		}
	});
	$("#btn_batal").click(function(){
		Clear();
	});
	function Clear(){
		$("#norm").val("");
		$("#alasan").val("");
		$("#combo_jenispx").val("==PILIH==");
		$("#noanggota").val("");
		$("#combo_hubkeluarga").val("Peserta");
		$("#keluargadari").val("");
		$("#combo_area").val("==PILIH==");
		$("#combo_kategori").val("-");
		$("#normmigrasi").val("");
		$("#nama").val("");		
		$("#alamat").val("");
		$("#combo_alamat").val("==PILIH==");
		$("#combo_ttl").val("==PILIH==");
		$("#tgllahir").val("");		
		$("#combo_jk").val("==PILIH==");
		$("#combo_goldarah").val("?");
		$("#combo_identitasdiri").val("KTP");
		$("#identitasdiri").val("");
		$("#combo_agama").val("-");
		$("#telepon").val("");
		$("#handphone").val("");
		$("#lainlain").val("");
		
		$("#combo_penjamin").val("Tanpa Penjamin");
		$("#tglexpired").val("");
		$("#nopeserta").val("");
		$("#nosep").val("");
		$("#nokartu").val("");
		
		$("#combo_referral").val("-");
		$("#dokter").val("");
		$("#rsklinik").val("");
		$("#combo_kunjungan").val("Datang Sendiri");
		
		$("#norm").prop("disabled", true);
		$("#alasan").prop("disabled", true);
		$("#btn_ok").prop("disabled", true);
		$("#btn_search").prop("disabled", true);
		$("#btn_auto").prop("disabled", true);
		$("#noanggota").prop("disabled", true);
		$("#combo_hubkeluarga").prop("disabled", true);
		$("#keluargadari").prop("disabled", true);
		$("#combo_area").prop("disabled", true);
		$("#combo_kategori").prop("disabled", true);
		$("#normmigrasi").prop("disabled", true);
		$("#btn_tambah").prop("disabled", false);
		$("#btn_edit").prop("disabled", true);
		$("#btn_hapus").prop("disabled", true);
		$("#btn_batal").prop("disabled", true);
		
		$("#combo_namapenjamin").prop("disabled", true);
		$("#tglexpired").prop("disabled", true);
		$("#nopeserta").prop("disabled", true);
		$("#nosep").prop("disabled", true);
		$("#nokartu").prop("disabled", true);
	}
	function BtnAktif(){
		$("#norm").prop("disabled", true);
		$("#btn_tambah").prop("disabled", true);		
		$("#btn_edit").prop("disabled", false);
		$("#btn_hapus").prop("disabled", false);
		$("#btn_batal").prop("disabled", false);
	};
	$("#btn_ok").click(function(){
		cari_pasienpribadi();
		cari_pasienkeluarga();
		cari_pasienmarketing();
		cari_pasienaccount();		
	});
	function cari_pasienpribadi(){
		$.ajax({  datatype: "json",data:{no_rm:$('#norm').val()},
			url: "../pasienpribadi/",async: false,
			type:'POST',success: function(data){
			var dt=JSON.parse(data);if (dt.length > 0){ $('#combo_jenispx').val(dt[0].jenis);$('#noanggota').val(dt[0].no_kk);$('#keluargadari').val(dt[0].suami_istri);$('#combo_area').val(dt[0].satuan);
														$('#combo_kategori').val(dt[0].pangkat);$('#nama').val(dt[0].nama);$('#alamat').val(dt[0].alamat);$('#combo_alamat').val(dt[0].kota);
														$('#combo_ttl').val(dt[0].tempat);$('#tgllahir').val(dt[0].tgl_lahir);$('#combo_jk').val(dt[0].sex);$('#combo_goldarah').val(dt[0].darah);
														$('#combo_identitasdiri').val(dt[0].id_card);$('#identitasdiri').val(dt[0].id_number);$('#combo_agama').val(dt[0].agama);$('#telepon').val(dt[0].telp);
														$('#handphone').val(dt[0].hp);$('#lainlain').val(dt[0].lain_lain);
			BtnAktif();											
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	function cari_pasienkeluarga(){
		$.ajax({  datatype: "json",data:{no_rm:$('#norm').val()},
			url: "../pasienkeluarga/",async: false,
			type:'POST',success: function(data){
			var dt=JSON.parse(data);if (dt.length > 0){ $('#combo_hubkeluarga').val(dt[0].hubungan);														
			BtnAktif();	
			}else{ }
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	function cari_pasienmarketing(){
		$.ajax({  datatype: "json",data:{no_rm:$('#norm').val()},
			url: "../pasienmarketing/",async: false,
			type:'POST',success: function(data){
			var dt=JSON.parse(data);if (dt.length > 0){ $('#combo_referral').val(dt[0].tahu_dari_mana);$('#dokter').val(dt[0].dokter_pernah);$('#rsklinik').val(dt[0].rs_pernah);$('#kunjungan').val(dt[0].kunjungan_didampingi);														
			BtnAktif();	
			}else{ }
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	function cari_pasienaccount(){
		$.ajax({  datatype: "json",data:{no_rm:$('#norm').val()},
			url: "../pasienaccount/",async: false,
			type:'POST',success: function(data){
			var dt=JSON.parse(data);if (dt.length > 0){ $('#combo_penjamin').val(dt[0].nama_perusahaan);$('#nopeserta').val(dt[0].no_jaminan_1);$('#nosep').val(dt[0].no_jaminan_2);
														$('#nokartu').val(dt[0].no_jaminan_3);$('#tglexpired').val(dt[0].expired);														
			BtnAktif();	
			}else{ }
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#btn_nobaru").click(function(){
		Autonumber();
		$("#btn_batal").prop("disabled", false);
	});
	function Autonumber(){
		$.ajax({  datatype: "json",
				url: "../autonumber/",async: false, type:'POST',
				success: function(data){ 
				var dt=JSON.parse(data);
				$("#normmigrasi").val(dt);},
				error: function(){alert('Error Nih !!! ');}
		});	
	}
	$("#btn_auto").click(function(){
		Autonumber2();
	});
	function Autonumber2(){
		$.ajax({  datatype: "json",
				url: "../autonumber2/",async: false, type:'POST',
				success: function(data){ 
				var dt=JSON.parse(data);
				$("#noanggota").val('RS.'+dt);},
				error: function(){alert('Error Nih !!! ');}
		});	
	}
	$("#btn_tambah").click(function(){
		TambahPasien();	
	});
	function TambahPasien(){
		if ($("#normmigrasi").val() == ""){
			alert("Masukan No RM!");
		}else if($("#nama").val() == "" || $("#alamat").val() == "" || $("#combo_alamat option:selected").text() == "==PILIH==" ||
			$("#combo_ttl option:selected").text() == "==PILIH==" || $("#tgllahir").val() == "" || $("#combo_jk option:selected").text() == "==PILIH==" ||
			$("#combo_goldarah option:selected").text() == "?"){
			alert("Data Belum Lengkap");
		}else if ($("#combo_jenispx option:selected").text() == "==PILIH=="){
			alert("Masukan Jenis Pasien");
		}else if ($("#combo_jenispx option:selected").text() == "ASURANSI" && $("#nopeserta").val() == ""){
			alert("Lengkapi No Jaminan untuk type Pasien Corporate");
		}else if ($("#combo_jenispx option:selected").text() == "ASURANSI" && $("#tglexpired").val() == ""){
			alert("Masukan Expired");		
		}else {
				$.ajax({  datatype: "json",data:{
					indeks :$('#noanggota').val(),
					hub :$('#combo_hubkeluarga option:selected').text(),
					area :$('#combo_area option:selected').text(),
					kategori :$('#combo_kategori option:selected').text(),	
					keldari :$('#keluargadari').val(),
					
					id :$('#normmigrasi').val(),	
					nama :$('#nama').val(),	
					jenis :$('#combo_jenispx option:selected').text(),	
					alamat :$('#alamat').val(),
					kota :$('#combo_alamat option:selected').text(),
					tempatlahir :$('#combo_ttl option:selected').text(),
					tgllahir :$('#tgllahir').val(),	
					jk :$('#combo_jk option:selected').text(),				
					goldarah :$('#combo_goldarah option:selected').text(),
					idcard :$('#combo_identitasdiri option:selected').text(),
					idnumber :$('#identitasdiri').val(),						
					agama :$('#combo_agama option:selected').text(),												
					telp :$('#telepon').val(),														
					hp :$('#handphone').val(),												
					lain2 :$('#lainlain').val(),	
					
					penjamin :$('#combo_namapenjamin option:selected').text(),												
					nopeserta :$('#nopeserta').val(),														
					nosep :$('#nosep').val(),												
					nokartu :$('#nokartu').val(),
					expired :$('#tglexpired').val(),	
					
					tahudarimana :$('#combo_referral option:selected').text(),													
					dokterpernah :$('#dokter').val(),												
					rspernah :$('#rsklinik').val(),
					kunjungan :$('#combo_kunjungan option:selected').text()},
				url: "../tambahpasien/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Panambahaan Pasien baru telah berhasil');
				Clear();}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});			 			
		}
		
	}
	
	$("#btn_edit").click(function(){
		EditPasien();
		/*if($("#combo_jenispx").val() == "UMUM"){
			EditUmum();
		}else if($("#combo_jenispx").val() == "KARYAWAN"){
			EditKaryawan();
		}else{
			EditAsuransi();
		}*/	 	
	});
	function EditPasien(){
		if($("#nama").val() == "" || $("#alamat").val() == "" || $("#combo_alamat option:selected").text() == "==PILIH==" ||
			$("#combo_ttl option:selected").text() == "==PILIH==" || $("#tgllahir").val() == "" || $("#combo_jk option:selected").text() == "==PILIH==" ||
			$("#combo_goldarah option:selected").text() == "?"){
			alert("Data Belum Lengkap");
		}else if ($("#alasan").val() == ""){
			alert("Masukan Alasan Editing Data");
		}else if ($("#combo_jenispx option:selected").text() == "==PILIH=="){
			alert("Masukan Jenis Pasien");
		}else if ($("#combo_jenispx option:selected").text() == "ASURANSI" && $("#nopeserta").val() == ""){
			alert("Lengkapi No Jaminan untuk type Pasien Corporate");
		}else if ($("#combo_jenispx option:selected").text() == "ASURANSI" && $("#tglexpired").val() == ""){
			alert("Masukan Expired");		
		}else {
				$.ajax({  datatype: "json",data:{
					indeks :$('#noanggota').val(),
					hub :$('#combo_hubkeluarga option:selected').text(),
					area :$('#combo_area option:selected').text(),
					kategori :$('#combo_kategori option:selected').text(),	
					keldari :$('#keluargadari').val(),
					
					id :$('#norm').val(),
					alasan :$('#alasan').val(),		
					nama :$('#nama').val(),	
					jenis :$('#combo_jenispx option:selected').text(),	
					alamat :$('#alamat').val(),
					kota :$('#combo_alamat option:selected').text(),
					tempatlahir :$('#combo_ttl option:selected').text(),
					tgllahir :$('#tgllahir').val(),	
					jk :$('#combo_jk option:selected').text(),				
					goldarah :$('#combo_goldarah option:selected').text(),
					idcard :$('#combo_identitasdiri option:selected').text(),
					idnumber :$('#identitasdiri').val(),						
					agama :$('#combo_agama option:selected').text(),												
					telp :$('#telepon').val(),														
					hp :$('#handphone').val(),												
					lain2 :$('#lainlain').val(),		
					
					penjamin :$('#combo_namapenjamin option:selected').text(),												
					nopeserta :$('#nopeserta').val(),														
					nosep :$('#nosep').val(),												
					nokartu :$('#nokartu').val(),
					expired :$('#tglexpired').val(),	
					
					tahudarimana :$('#combo_referral option:selected').text(),													
					dokterpernah :$('#dokter').val(),												
					rspernah :$('#rsklinik').val(),
					kunjungan :$('#combo_kunjungan option:selected').text()},
				url: "../editpasien/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Perubahan Data Pasien telah berhasil');
				Clear();}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});			 			
		}
		
	}
	function EditKaryawan(){
		if ($("#nama").val() == "",$("#alamat").val() == "",$("#combo_alamat option:selected").text() == "==PILIH==",
			$("#combo_ttl option:selected").text() == "==PILIH==",$("#tgllahir").val() == "",$("#combo_jk option:selected").text() == "==PILIH==",
			$("#combo_goldarah option:selected").text() == "?"){
			alert("Data Belum Lengkap");
		}else if ($("#alasan").val() == ""){
			alert("Masukan Alasan Editing Data");
		}else if ($("#combo_jenispx option:selected").text() == "==PILIH=="){
			alert("Masukan Jenis Pasien");
		}else {
				$.ajax({  datatype: "json",data:{
					indeks :$('#noanggota').val(),
					hub :$('#combo_hubkeluarga option:selected').text(),
					area :$('#combo_area option:selected').text(),
					kategori :$('#combo_kategori option:selected').text(),	
					keldari :$('#keluargadari').val(),
					
					id :$('#norm').val(),
					alasan :$('#alasan').val(),		
					nama :$('#nama').val(),	
					jenis :$('#combo_jenispx option:selected').text(),	
					alamat :$('#alamat').val(),
					kota :$('#combo_alamat option:selected').text(),
					tempatlahir :$('#combo_ttl option:selected').text(),
					tgllahir :$('#tgllahir').val(),	
					jk :$('#combo_jk option:selected').text(),				
					goldarah :$('#combo_goldarah option:selected').text(),
					idcard :$('#combo_identitasdiri option:selected').text(),
					idnumber :$('#identitasdiri').val(),						
					agama :$('#combo_agama option:selected').text(),												
					telp :$('#telepon').val(),														
					hp :$('#handphone').val(),												
					lain2 :$('#lainlain').val(),	
					
					tahudarimana :$('#combo_referral option:selected').text(),													
					dokterpernah :$('#dokter').val(),												
					rspernah :$('#rsklinik').val(),
					kunjungan :$('#combo_kunjungan option:selected').text()},
				url: "../editkaryawan/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Perubahan Data Pasien telah berhasil');
				Clear();}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});			 			
		}
		
	}
	function EditAsuransi(){
		if ($("#nama").val() == "",$("#alamat").val() == "",$("#combo_alamat option:selected").text() == "==PILIH==",
			$("#combo_ttl option:selected").text() == "==PILIH==",$("#tgllahir").val() == "",$("#combo_jk option:selected").text() == "==PILIH==",
			$("#combo_goldarah option:selected").text() == "?"){
			alert("Data Belum Lengkap");
		}else if ($("#alasan").val() == ""){
			alert("Masukan Alasan Editing Data");
		}else if ($("#combo_jenispx option:selected").text() == "==PILIH=="){
			alert("Masukan Jenis Pasien");
		}else if ($("#nopeserta").val() == ""){
			alert("Lengkapi No Jaminan untuk type Pasien Corporate");
		}else if ($("#tglexpired").val() == ""){
			alert("Masukan Expired");
		}else {
				$.ajax({  datatype: "json",data:{
					indeks :$('#noanggota').val(),
					hub :$('#combo_hubkeluarga option:selected').text(),
					area :$('#combo_area option:selected').text(),
					kategori :$('#combo_kategori option:selected').text(),	
					keldari :$('#keluargadari').val(),	
					
					id :$('#norm').val(),	
					alasan :$('#alasan').val(),	
					nama :$('#nama').val(),	
					jenis :$('#combo_jenispx option:selected').text(),	
					alamat :$('#alamat').val(),
					kota :$('#combo_alamat option:selected').text(),
					tempatlahir :$('#combo_ttl option:selected').text(),
					tgllahir :$('#tgllahir').val(),	
					jk :$('#combo_jk option:selected').text(),				
					goldarah :$('#combo_goldarah option:selected').text(),
					idcard :$('#combo_identitasdiri option:selected').text(),
					idnumber :$('#identitasdiri').val(),						
					agama :$('#combo_agama option:selected').text(),												
					telp :$('#telepon').val(),														
					hp :$('#handphone').val(),												
					lain2 :$('#lainlain').val(),
					
					penjamin :$('#combo_namapenjamin option:selected').text(),												
					nopeserta :$('#nopeserta').val(),														
					nosep :$('#nosep').val(),												
					nokartu :$('#nokartu').val(),
					expired :$('#tglexpired').val(),	
					
					tahudarimana :$('#combo_referral option:selected').text(),													
					dokterpernah :$('#dokter').val(),												
					rspernah :$('#rsklinik').val(),
					kunjungan :$('#combo_kunjungan option:selected').text()},
				url: "../editasuransi/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Perubahan Data Pasien telah berhasil');
				Clear();}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});			 			
		}
		
	}
	$("#btn_hapus").click(function(){
		Delete();
		Clear();
	});
	function Delete(){
		$.ajax({  datatype: "json",data:{no_rm:$('#norm').val() },
			url: "../hapus/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Data Sudah Dihapus' );}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	$(document).ready(function(){
		$("#nama").keyup(function(){
			DataPasien()
		});
	});
	function DataPasien(){
    $('#list_pasien').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPasienPribadi/", // json datasource
			type: "post",  // method  , by default get
			data:{ cari_nama:$('#nama').val() },
			error: function(){  // error handling
				$(".list_pasien-error").html("");
				$("#list_pasien").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_pasien_processing").css("display","none");
							
			}
		}
	});		
	}
});	



</script>








<head>
<link rel="stylesheet" href="../../../assets/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="../../../assets/select2/dist/css/select2.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/jquery.dataTables.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/dataTables.tableTools.css">
<link rel="stylesheet" href="../../../assets/DataTables/css/font-awesome.css">
<link rel="stylesheet" href="../../../assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.css">
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
		Stock & Inventaris
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FISIOTERAPI</a></li>
        <li class="active">Stock Inventaris</li>
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
							<div class="nav-tabs-custom" id="tab_stockinventaris">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Stock Unit: "FISIOTERAPI"</a></li>
									<li><a href="#tab_2" data-toggle="tab">Daftar Inventaris</a></li>
									<li><a href="#tab_3" data-toggle="tab">Penerimaan Stock</a></li>
									<li><a href="#tab_4" data-toggle="tab">Kartu Stock</a></li>
									<li><a href="#tab_5" data-toggle="tab">History Transaksi Gudang Kecil</a></li>
									<li><a href="#tab_6" data-toggle="tab">History Penerimaan</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" style="margin-left:-2%;width:20%;" class="col-sm-2 control-label">Cari Nama</label>
															<div class="col-lg-5" >
																<input type="text" style="" class="form-control" name="carinama1" id="carinama1" placeholder="Masukan Nama ...">
															</div>																
																<button type="button" id="btn_refresh1" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>																															
																<button type="button" style="margin-left:1%;" id="btn_cetak1" class="btn btn-primary" disabled=false><i class="fa fa-print"></i>	 Cetak</button>
														</div>
																		
													</div>
													<div class="form-group">
														<div class="row">															
															*) Bila ada kesalahan atribut barang (Type, Jenis atau Principal) hubungi Bag. Gudang.									
														</div>																		
													</div>
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="font-size:30px;color:purple;width:85%;" class="col-sm-2 control-label">Dikelola oleh : "FISIOTERAPI"</label>
														</div>
													</div>
												</div>
												<div class="col-sm-7">
													<div class="nav-tabs-custom" id="tab_transfer">
														<ul class="nav nav-tabs">
															<li class="active"><a href="#tab1" data-toggle="tab">Trans PerList(1)</a></li>
															<li><a href="#tab2" data-toggle="tab">Trans PerItem(2)</a></li>
															<li><a href="#tab3" data-toggle="tab">Mutasi(3)</a></li>
														</ul>	
													
														<div class="tab-content">
															<div class="tab-pane active" id="tab1" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Item</label>
																					<div class="col-lg-6" >
																						<select class="col-sm-2 form-control"  name="combo_item1" id="combo_item1" style="width: 100%;"	>
																							<?php foreach ($dt_barang as $barang) { ?>	
																								<option value="<?php echo $barang["barang"]; ?>"><?php echo $barang["barang"]; ?></option>
																							<?php } ?>
																						</select>																		
																					</div>																								
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Jumlah</label>
																					<div class="col-lg-2" >
																						<input type="number" style="" class="form-control" name="jumlah1" id="jumlah1" min=1>
																					</div>
																					<label for="inputEmail3" style="margin-left:-4%;" name="satuan1" id="satuan1" class="col-sm-2 control-label">[satuan]</label>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Transaksi</label>
																					<div class="col-lg-4" >
																						<select class="col-sm-2 form-control"  name="combo_transaksi1" id="combo_transaksi1" style="width: 100%;"	>
																							<option selected="selected">-</option>
																							<option>Keluar / Pakai</option>
																							<option>Masuk / Retur</option>
																						</select>																		
																					</div>																								
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Keterangan</label>
																					<div class="col-xs-1" >
																						<textarea rows="2" cols="42" name="ket1" id="ket1" ></textarea>
																					</div>																							
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:18%;" id="btn_posting1" class="btn btn-danger" ><i class="fa fa-check"></i>	Posting</button>
																					<button type="button" style="margin-left:1%;" id="btn_batal1" class="btn btn-danger" ><i class="fa fa-times"></i>	Batal</button>												
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>	
															<div class="tab-pane" id="tab2" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">															
																					*) Pilih Item untuk melakukan transaksi dengan mengklik item dibawah								
																				</div>																								
																			</div>
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Item</label>
																					<div class="col-lg-6" >
																						<input type="text" style="" class="form-control" name="item" id="item" disabled=false>
																					</div>																							
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Keterangan</label>
																					<div class="col-xs-1" >
																						<textarea rows="2" cols="42" name="ket2" id="ket2" ></textarea>
																					</div>																							
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Transaksi</label>
																					<div class="col-lg-4" >
																						<select class="col-sm-2 form-control"  name="combo_transaksi2" id="combo_transaksi2" style="width: 100%;"	>
																							<option selected="selected">-</option>
																							<option>Keluar / Pakai</option>
																							<option>Masuk / Retur</option>
																						</select>																		
																					</div>																								
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Jumlah</label>
																					<div class="col-lg-2" >
																						<input type="number" style="" class="form-control" name="jumlah2" id="jumlah2" min=1>
																					</div>
																					<label for="inputEmail3" style="margin-left:-4%;" name="satuan2" id="satuan2" class="col-sm-2 control-label">[satuan]</label>
																				</div>																				
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:18%;" id="btn_posting2" class="btn btn-danger" disabled=false><i class="fa fa-check"></i>	Posting</button>
																				</div>
																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="tab3" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Item</label>
																					<div class="col-lg-6" >
																						<select class="col-sm-2 form-control"  name="combo_item3" id="combo_item3" style="width: 100%;"	>
																							<?php foreach ($dt_barang as $barang) { ?>	
																								<option value="<?php echo $barang["id"]; ?>"><?php echo $barang["barang"]; ?></option>
																							<?php } ?>
																						</select>																		
																					</div>																								
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Jumlah</label>
																					<div class="col-lg-2" >
																						<input type="number" style="" class="form-control" name="jumlah3" id="jumlah3" min=1>
																					</div>
																					<label for="inputEmail3" style="margin-left:-4%;" name="satuan3" id="satuan3" class="col-sm-2 control-label">[satuan]</label>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Mutasi Ke</label>
																					<div class="col-lg-4" >
																						<select class="col-sm-2 form-control"  name="combo_mutasi" id="combo_mutasi" style="width: 100%;"	>
																							<option selected="selected">-</option>
																							<option>GUDANG MEDIS</option>
																							<option>GUDANG NON MEDIS</option>
																						</select>																		
																					</div>																								
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:18%;" id="btn_mutasikan" class="btn btn-danger" ><i class="fa fa-check"></i>	Mutasikan</button>
																					<button type="button" style="margin-left:1%;" id="btn_batalmutasi" class="btn btn-danger" ><i class="fa fa-times"></i>	Batalkan Mutasi</button>												
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
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<table id="list_stockunit" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																		<th></th>
																		<th>Kode</th>
																		<th>Nama Item</th>
																		<th>Jumlah</th>	
																		<th>Harga Terima(Rp)</th>
																		<th>Sub Total(Rp)</th>																	
																		<th>Satuan</th>
																		<th>Type</th>	
																		<th>Jenis</th>
																		<th>Generik</th>																	
																		<th>Principal</th>
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
									<div class="tab-pane" id="tab_2" style="position: relative; ">									
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:3%;" id="btn_refresh2" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
														</div>																								
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<table id="list_daftarinventaris" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																		<th></th>
																		<th>No Asset</th>
																		<th>Tgl Terima</th>
																		<th>Jam Terima</th>	
																		<th>User Kirim</th>
																		<th>Nama Barang</th>																	
																		<th>Harga Beli</th>
																		<th>Warna</th>	
																		<th>Spesifikasi</th>
																		<th>Batch No</th>																	
																		<th>Umur Pakai</th>																
																		<th>Ref Kirim Gudang<th>
																		<th>Status</th>	
																		<th>Tgl Hapus</th>
																		<th>User Hapus</th>																	
																		<th>Alasan Hapus</th>
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
									<div class="tab-pane" id="tab_3" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" style="margin-left:-2%;width:20%;" class="col-sm-2 control-label">Tampilkan</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_tampilkan" id="combo_tampilkan" style="width: 100%;">																	
																	<option>TAMPILKAN SEMUA</option>
																	<option selected="selected">PROSES KIRIM</option>
																	<option>SUDAH DITERIMA</option>
																</select>																		
															</div>																
																<button type="button" id="btn_refresh3" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>																															
																<button type="button" style="margin-left:1%;" id="btn_masukanitem" class="btn btn-danger"><i class="fa fa-check"></i>	 Masukan Item</button>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															*) Pengirimiman Gudang Selesai apabila sudah di Entry petugas Poli/Unit.								
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">
															<div class="box-header with-border">
																<h3 class="box-title">Daftar Pengiriman Gudang :</h3>
															</div><!-- /.box-header -->	
															<div class="box-body">
																<div class="col-md-15">
																	<table id="list_datapengirimangudang" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																			<th></th>
																			<th>No Kirim Gudang</th>
																			<th>Tgl/Jam Kirim</th>
																			<th>Jumlah Item</th>	
																			<th>Staf Entry Gudang</th>
																			<th>Status</th>	
																			</tr>
																		</thead>
																	</table>												
																</div>								
															</div>									
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Nama Barang</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_namabarang1" id="combo_namabarang1" style="width: 100%;"	>
																	<?php foreach ($dt_barang as $barang) { ?>	
																		<option value="<?php echo $barang["barang"]; ?>"><?php echo $barang["barang"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>	
														</div>	
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Harga Satuan Rp</label>
															<div class="col-lg-3" >
																<input type="number" style="" class="form-control" name="hargasatuan" id="hargasatuan" min=1>
															</div>
																<label for="inputEmail3" id="satuan4" name="satuan4" style="margin-left:-3%;width:25%;" class="col-sm-2 control-label">[satuan]</label>
														</div>	
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Jumlah Diterima</label>
															<div class="col-lg-2" >
																<input type="number" style="" class="form-control" name="jumlahditerima" id="jumlahditerima" min=1>
															</div>	
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Expired</label>
															<div class="col-lg-5" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglexpired" id="tglexpired"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>															
														</div>
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Batch No</label>
															<div class="col-lg-3" >
																<input type="text" style="" class="form-control" name="batchno" id="batchno" >
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															*) Jika tidak ada Expired maka isi dengan Life Time barang.
														</div>
													</div>
													
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">No Terima Unit</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="noterimaunit" id="noterimaunit" value="~Auto Number~" disabled=false>
															</div>
														</div>	
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">No Kirim Barang</label>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="nokirimbarang" id="nokirimbarang" >
															</div>	
														</div>
													</div>
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Tanggal Kirim</label>
															<div class="col-lg-5" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglkirim" id="tglkirim"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>															
														</div>
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Petugas Pengirim</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_petugas" id="combo_petugas" style="width: 100%;"	>
																	<option select="selected">-</option>
																	<?php foreach ($dt_petugas as $petugas) { ?>	
																		<option value="<?php echo $petugas["id"]; ?>"><?php echo $petugas["nama"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:10%;" name="idpetugas" id="idpetugas" class="col-sm-2 control-label">[kode]</label>
														</div>
														<div class="row">															
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Catatan</label>
															<div class="col-xs-1" >
																<textarea rows="3" cols="35" name="catatan" id="catatan" ></textarea>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">																														
															<button type="button" style="margin-left:28%;" id="btn_terima" class="btn btn-danger"><i class="fa fa-check"></i>	 Terima</button>																															
															<button type="button" style="margin-left:1%;" id="btn_batalterima" class="btn btn-danger"><i class="fa fa-reply"></i>	Batal</button>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															*) Pastikan Item dan Jumlah yang diterima sesuai dengan yang ada entry.
														</div>
													</div>													
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">
															<div class="box-header with-border">
																<h3 class="box-title">Barang yang diterima :</h3>
															</div><!-- /.box-header -->	
															<div class="box-body">
																<div class="col-md-15">
																	<table id="list_barangyangditerima" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																			<th></th>
																			<th>Nama Barang</th>
																			<th>Harga</th>
																			<th>Qty</th>	
																			<th>Satuan</th>
																			<th>Batch No</th>
																			<th>Expired</th>	
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
									<div class="tab-pane" id="tab_4" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="margin-left:%;width:10%;" class="col-sm-2 control-label">Nama Barang</label>
																<div class="col-lg-3" >
																	<select class="col-sm-2 form-control"  name="combo_namabarang2" id="combo_namabarang2" style="width: 100%;"	>
																		<option select="selected">-</option>
																		<?php foreach ($dt_barang as $barang) { ?>	
																			<option value="<?php echo $barang["barang"]; ?>"><?php echo $barang["barang"]; ?></option>
																		<?php } ?>
																	</select>																		
																</div>														
																<button type="button" style="margin-left:%;" id="btn_refresh4" class="btn btn-primary"><i class="fa fa-Refresh"></i>	Refresh</button>																				
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Stock Masuk : </label>
															<label for="inputEmail3" style="margin-left:-3%;" id="labelstockmasuk" name="labelstockmasuk" class="col-sm-2 control-label">-</label>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="box-body">
																<div class="col-md-15">
																	<table id="list_stockmasuk" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																			<th></th>
																			<th>Tanggal</th>
																			<th>Jumlah</th>
																			<th>Satuan</th>	
																			<th>Batch</th>
																			<th>Remark</th>	
																		</thead>
																	</table>												
																</div>								
															</div>									
														</div>
													</div>	
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Stock Keluar : </label>
															<label for="inputEmail3" style="margin-left:-3%;" id="labelstockkeluar" name="labelstockkeluar" class="col-sm-2 control-label">-</label>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<table id="list_stockkeluar" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																		<th></th>
																		<th>Tanggal</th>
																		<th>Jumlah</th>
																		<th>Satuan</th>	
																		<th>Batch</th>
																		<th>Remark</th>	
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
									<div class="tab-pane" id="tab_5" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiode1_awal" id="tglperiode1_awal"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiode1_akhir" id="tglperiode1_akhir"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>																					
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Pencarian</label>
															<div class="col-lg-5" >
																<input type="text" style="width:97%;" class="form-control" name="pencarian" id="pencarian" placeholder="Masukan Nama Barang ...">
															</div>
														</div>													
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refresh5" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_hapus" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Hapus</button>	
															<button type="button" style="margin-left:1%;" id="btn_cetakTT" class="btn btn-primary" disabled=false><i class="fa fa-print"></i>	Cetak TT Mutasi Keluar</button>												
														</div>																								
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<table id="list_historytransaksi" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																		<th></th>
																		<th>Transaksi</th>
																		<th>Nama Barang</th>
																		<th>Jumlah</th>
																		<th>Satuan</th>	
																		<th>Keterangan</th>
																		<th>Batch Mutasi</th>	
																		<th>Tanggal</th>
																		<th>Jam</th>	
																		<th>Petugas</th>
																		<th>IDx</th>	
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
									<div class="tab-pane" id="tab_6" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-7">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiode2_awal" id="tglperiode2_awal"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiode2_akhir" id="tglperiode2_akhir"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>														
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refresh6" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_hapuspenerimaan" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Hapus Penerimaan</button>													
														</div>																								
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">
															<div class="col-md-12">
																<table id="list_historypenerimaan" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																		<th></th>
																		<th>No Terima Unit</th>
																		<th>Tanggal</th>
																		<th>Ref No</th>
																		<th>Pengirim</th>	
																		<th>Penerima</th>
																		</tr>
																	</thead>
																</table>												
															</div>								
														</div>
													</div>												
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">
															<div class="box-header with-border">
																<h3 class="box-title">Detail Penerimaan :</h3>
															</div><!-- /.box-header -->	
															<div class="box-body">
																<div class="col-md-15">
																	<table id="list_detailpenerimaan" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																			<th></th>
																			<th>Nama</th>
																			<th>Harga Terima (Rp)</th>
																			<th>Jumlah Terima (Rp)</th>
																			<th>Satuan</th>	
																			<th>Batch No</th>
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
<script src="../../../assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="../../../assets/DataTables/js/dataTables.select.min.js"></script>
<script src="../../../assets/select2/dist/js/select2.js"></script>
<script src="../../../assets/Select-master/js/dataTables.select.js"></script>
<script src="../../../assets/DataTables/js/dataTables.tableTools.js"></script>
<script type="text/javascript">

	
	var dtrec;	
	
$(function () {	
	
	$('#list_stockunit').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_historytransaksi').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_historypenerimaan').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_detailpenerimaan').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
	$("[tgl-mask]").inputmask();
	
	$("#combo_item1").select2();
	$("#combo_item3").select2();
	$("#combo_namabarang1").select2();
	$("#combo_namabarang2").select2();
	$("#combo_petugas").select2();
	SatuanItem1();		
	SatuanItem3();		
	SatuanNamaBarang1();		
	
	function SatuanItem1(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_item1").val()}, 
			url: "../get_satuan/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#satuan1").text(dt.satuan);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_item1").change(function () { 
		SatuanItem1();		
	});	
	function SatuanItem2(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#item").val()}, 
			url: "../get_satuan/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#satuan2").text(dt.satuan);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	function SatuanItem3(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_item3 option:selected").text()}, 
			url: "../get_satuan/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#satuan3").text(dt.satuan);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_item3").change(function () { 
		SatuanItem3();		
	});	
	function IdPetugas(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_petugas option:selected").text()}, 
			url: "../get_id_petugas/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#idpetugas").text(dt.id);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_petugas").change(function () { 
		IdPetugas();		
	});	
	function SatuanNamaBarang1(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_namabarang1").val()}, 
			url: "../get_satuan/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#satuan4").text(dt.satuan);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_namabarang1").change(function () { 
		SatuanNamaBarang1();		
	});	
	$("#carinama1").keyup(function(){
		ListStockUnit();
	});
	$("#btn_refresh1").click(function(){
		ListStockUnit();
	});
	function ListStockUnit(){
    $('#list_stockunit').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataStockUnit/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama:$('#carinama1').val() },
			error: function(){  // error handling
				$(".list_stockunit-error").html("");
				$("#list_stockunit").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_stockunit_processing").css("display","none");
			}
		}
	});		
	}
	$('#list_stockunit').click(function() { 
		dtrec = $('#list_stockunit').DataTable().row('.selected').data();	
		$("#item").val(dtrec[2]);
		$("#btn_posting2").prop("disabled", false);
		SatuanItem2();
	});
	
	$("#btn_posting1").click(function(){		
		if ($("#jumlah1").val() == ""){
			alert("Masukkan jumlah Barang");
		}else if ($("#combo_transaksi1 option:selected").text() == "-"){
			alert("Masukkan mode Transaksi");
		}else if ($("#ket1").val() == ""){
			alert("Anda harus memasukan Keterangan");
		}else{
			$.ajax({  datatype: "json",data:{
						item: $('#combo_item1 option:selected').text(),
						jumlah: $('#jumlah1').val(),
						transaksi: $('#combo_transaksi1 option:selected').text(),
						ket: $('#ket1').val()},
				url: "../Posting/",
				async: false, type:'POST',success: function(data){alert('Jumlah Stock Medis telah diubah.');
				ListStockUnit();
				$("#jumlah1").val("");
				$("#combo_transaksi1").val("-");
				$("#ket1").val("");				
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	$("#btn_batal1").click(function(){
		$("#jumlah1").val("");
		$("#combo_transaksi1").val("-");
		$("#ket1").val("");	
	});
	
	$("#btn_posting2").click(function(){		
		if ($("#jumlah2").val() == ""){
			alert("Masukkan jumlah Barang");
		}else if ($("#combo_transaksi2 option:selected").text() == "-"){
			alert("Masukkan mode Transaksi");
		}else if ($("#ket2").val() == ""){
			alert("Anda harus memasukan Keterangan");
		}else{
			$.ajax({  datatype: "json",data:{
						item: $('#item').val(),
						jumlah: $('#jumlah2').val(),
						transaksi: $('#combo_transaksi2 option:selected').text(),
						ket: $('#ket2').val()},
				url: "../Posting/",
				async: false, type:'POST',success: function(data){alert('Jumlah Stock Medis telah diubah.');
				ListStockUnit();
				$("#jumlah2").val("");
				$("#combo_transaksi2").val("-");
				$("#ket2").val("");				
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	$("#btn_mutasikan").click(function(){		
		if ($("#jumlah3").val() == ""){
			alert("Masukkan jumlah Barang");
		}else if ($("#combo_mutasi option:selected").text() == "-"){
			alert("Pilih Mutasi");
		}else{
			$.ajax({  datatype: "json",data:{
						kode: $('#combo_item3').val(),
						item: $('#combo_item3 option:selected').text(),
						jumlah: $('#jumlah3').val(),
						mutasi: $('#combo_mutasi option:selected').text()},
				url: "../Mutasikan/",
				async: false, type:'POST',success: function(data){alert('Proses Mutasi telah Berhasil.');
				ListStockUnit();
				$("#jumlah3").val("");
				$("#combo_mutasi").val("-");			
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	$("#btn_batalmutasi").click(function(){
		$("#jumlah3").val("");
		$("#combo_mutasi").val("-");
	});
	$("#btn_terima").click(function(){		
		if ($("#hargasatuan").val() == ""){alert("Masukkan Harga satuan");
		}else if ($("#jumlahditerima").val() == ""){alert("Masukkan Jumlah diterima");
		}else if ($("#tglexpired").val() == ""){alert("Masukkan tanggal Expired");
		}else if ($("#batchno").val() == ""){alert("Masukkan No Batch");
		}else if ($("#jumlahditerima").val() == ""){alert("Masukkan Jumlah diterima");
		}else if ($("#nokirimbarang").val() == ""){alert("Masukkan No Kirim Barang");
		}else if ($("#tglkirim").val() == ""){alert("Masukkan Tanggal Kirim");
		}else if ($("#idpetugas").text() == "[kode]"){alert("Masukkan Nama Petugas");
		}else if ($("#catatan").val() == ""){alert("Masukkan Catatan");
		}else{
			$.ajax({  datatype: "json",data:{
						barang: $('#combo_namabarang1 option:selected').text(),
						harga: $('#hargasatuan').val(),
						jumlah: $('#jumlahditerima').val(),
						satuan: $('#satuan4').text(),
						expired: $('#tglexpired').val(),
						nobatch: $('#batchno').val(),
						nokirim: $('#nokirimbarang').val(),
						tglkirim: $('#tglkirim').val(),
						idpetugas: $('#idpetugas').text(),
						catatan: $('#catatan').val()},
				url: "../Terima/",
				async: false, type:'POST',success: function(data){alert('Penerimaan Barang telah selesai.');
				var dt=JSON.parse(data);$("#noterimaunit").val(dt); 
				ListBarangDiterima();
				$("#btn_terima").prop("disabled", true);}, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	$("#btn_batalterima").click(function(){
		$("#hargasatuan").val("");
		$("#jumlahditerima").val("");
		$("#tglexpired").val("");
		$("#batchno").val("");
		$("#noterimaunit").val("~Auto Number~");
		$("#nokirimbarang").val("");
		$("#tglkirim").val("");
		$("#combo_petugas option:selected").text("-");
		$("#catatan").val("");
		
		$("#btn_terima").prop("disabled", false);
		ListBarangDiterima();
	});
	function ListBarangDiterima(){
    $('#list_barangyangditerima').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataBarangDiterima/", // json datasource
			type: "post",  // method  , by default get
			data:{ nokirim:$('#noterimaunit').val() },
			error: function(){  // error handling
				$(".list_barangyangditerima-error").html("");
				$("#list_barangyangditerima").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_barangyangditerima_processing").css("display","none");
			}
		}
	});		
	}
	$("#btn_refresh4").click(function(){
		ListStockMasuk();
		ListStockKeluar();
		StockMasuk();
		StockKeluar();
	});
	
	function ListStockMasuk(){
    $('#list_stockmasuk').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataStockMasuk/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama:$('#combo_namabarang2 option:selected').text() },
			error: function(){  // error handling
				$(".list_stockmasuk-error").html("");
				$("#list_stockmasuk").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_stockmasuk_processing").css("display","none");
			}
		}
	});		
	}	
	function ListStockKeluar(){
    $('#list_stockkeluar').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataStockKeluar/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama:$('#combo_namabarang2 option:selected').text() },
			error: function(){  // error handling
				$(".list_stockkeluar-error").html("");
				$("#list_stockkeluar").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_stockkeluar_processing").css("display","none");
			}
		}
	});		
	}
	function StockMasuk(){
		$.ajax({  datatype: "json",
			data:{nama:$('#combo_namabarang2 option:selected').text()}, 
			url: "../get_stockmasuk/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#labelstockmasuk").text(dt.stockmasuk);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	function StockKeluar(){
		$.ajax({  datatype: "json",
			data:{nama:$('#combo_namabarang2 option:selected').text()}, 
			url: "../get_stockkeluar/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#labelstockkeluar").text(dt.stockkeluar);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$(document).ready(function(){
		$("#pencarian").keyup(function(){
			ListHistoryTransaksi();
		});
	});
	$("#btn_refresh5").click(function(){
		ListHistoryTransaksi();
	});	
	function ListHistoryTransaksi(){
    $('#list_historytransaksi').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataHistoryTransaksi/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama:$('#pencarian').val(),tgl_awal:$('#tglperiode1_awal').val(),tgl_akhir:$('#tglperiode1_akhir').val() },
			error: function(){  // error handling
				$(".list_historytransaksi-error").html("");
				$("#list_historytransaksi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_historytransaksi_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_historytransaksi').click(function() { 
		dtrec = $('#list_historytransaksi').DataTable().row('.selected').data();		
		$("#btn_hapus").prop("disabled", false);
		$("#btn_cetakTT").prop("disabled", false);
	});
	$("#btn_hapus").click(function(){
		if (confirm("Stock akan berubah, Anda yakin akan Menghapus transaksi tersebut ?") == true) {			
		$.ajax({  datatype: "json",data:{id: dtrec[10]},
			url: "../HapusTransaksi/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert("Transaksi dengan ID "+dtrec[10]+" telah berhasil dihapus." );
			ListHistoryTransaksi();}
			}, error: function(){alert('Error Nih !!!');}
		});			
		
		} 
	});
	$("#btn_cetakTT").click(function(){
		PrintHistoryTransaksi();
	});
	function PrintHistoryTransaksi(){		
		var win = "../../../assets/jasper/reports/fisioterapi/stock_inventaris/StockInventaris.php?idx="+dtrec[10]+"";
		window.open(win);	
	}
	$("#btn_refresh6").click(function(){
		ListPenerimaan();
	});	
	function ListPenerimaan(){
    $('#list_historypenerimaan').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataHistoryPenerimaan/", // json datasource
			type: "post",  // method  , by default get
			data:{ tgl_awal:$('#tglperiode2_awal').val(),tgl_akhir:$('#tglperiode2_akhir').val() },
			error: function(){  // error handling
				$(".list_historypenerimaan-error").html("");
				$("#list_historypenerimaan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_historypenerimaan_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_historypenerimaan').click(function() { 
		dtrec = $('#list_historypenerimaan').DataTable().row('.selected').data();
		ListDetailPenerimaan();
		$("#btn_hapuspenerimaan").prop("disabled", false);
	});
	function ListDetailPenerimaan(){
    $('#list_detailpenerimaan').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataDetailPenerimaan/", // json datasource
			type: "post",  // method  , by default get
			data:{ nokirim:dtrec[1] },
			error: function(){  // error handling
				$(".list_detailpenerimaan-error").html("");
				$("#list_detailpenerimaan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_detailpenerimaan_processing").css("display","none");
							
			}
		}
	});		
	}
	$("#btn_hapuspenerimaan").click(function(){
		if (confirm("Stock akan berkurang sesuai penerimaan tersebut, Anda yakin akan Menghapus Penerimaan unit ?") == true) {			
		$.ajax({  datatype: "json",data:{nokirim: dtrec[1]},
			url: "../HapusPenerimaan/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert("Penerimaan dengan No Terima Unit "+dtrec[1]+" telah berhasil dihapus." );
			ListPenerimaan();
			ListDetailPenerimaan();}
			}, error: function(){alert('Error Nih !!!');}
		});			
		
		} 
	});
	
});	



</script>








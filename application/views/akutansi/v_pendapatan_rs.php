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
		Pendapatan RS
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">AKUTANSI</a></li>
        <li class="active">Pendapatan RS</li>
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
							<div class="nav-tabs-custom" id="tab_pendapatan_rs">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Pendapatan Poli & Penunjang</a></li>
									<li><a href="#tab_2" data-toggle="tab">Pendapatan Apotek</a></li>
									<li><a href="#tab_3" data-toggle="tab">Pendapatan Penjamin</a></li>
									<li><a href="#tab_4" data-toggle="tab">Transaksi Retur</a></li>
									<li><a href="#tab_5" data-toggle="tab">Pasien Paling Berkontribusi</a></li>
									<li><a href="#tab_6" data-toggle="tab">Pendapan Group Poli</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeP1" id="tglperiodeP1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeP2" id="tglperiodeP2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>	
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_jenisP" id="combo_jenisP" style="width: 100%;"	>
																	<option value="" selected="selected">Semua Jenis</option>
																	<?php foreach ($dt_jp as $jp) { ?>	
																		<option value="<?php echo $jp["nama"]; ?>"><?php echo $jp["nama"]; ?></option>
																	<?php } ?>						
																</select>																		
															</div>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control" style="margin-left:7%;" name="combo_sortP" id="combo_sortP" style="width: 100%;"	>
																	<option value="asc" selected="selected">ASCENDING</option>
																	<option value="desc">DESCENDING</option>
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Poli/Unit</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_poliP" id="combo_poliP" style="width: 97%;"	>
																	<option value="" selected="selected">Semua Jenis</option>
																	<?php foreach ($dt_poli as $poli) { ?>	
																		<option value="<?php echo $poli["nama"]; ?>"><?php echo $poli["nama"]; ?></option>
																	<?php } ?>							
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_kategoriP" id="combo_kategoriP" style="width: 97%;"	>
																	<option value="" selected="selected">Semua Kategori</option>
																	<option value="Cash">Cash</option>	
																	<option value="Credit Card">Credit Card</option>	
																	<option value="Debit Card">Debit Card</option>	
																	<option value="Credit">Credit</option>	
																</select>																		
															</div>
														</div>						
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Pencarian</label>
															<div class="col-lg-6" >
																<input type="text" style="width:97%;" class="form-control" name="cariP" id="cariP" placeholder="Masukan No Faktur / Nama ...">
															</div>
														</div>
													
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshP" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
															<button type="button" style="margin-left:1%;" id="btn_printP" class="btn btn-danger" disabled=true ><i class="fa fa-print"></i>	 Print</button>											
														</div>
																		
													</div>
												</div>
												<div class="col-sm-6">
													<div class="nav-tabs-custom" id="tab_transfer">
														<ul class="nav nav-tabs">
															<li class="active"><a href="#pp_1" data-toggle="tab">General</a></li>
															<li><a href="#pp_2" data-toggle="tab">Koreksi Fee</a></li>
															<li><a href="#pp_3" data-toggle="tab">Hapus Item Transaksi</a></li>
															<li><a href="#pp_4" data-toggle="tab">Posting Jurnal</a></li>
															<li><a href="#pp_5" data-toggle="tab">Grafik</a></li>
														</ul>	
													
														<div class="tab-content">
															<div class="tab-pane active" id="pp_1" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Selected Rp</label>
																					<div class="col-lg-4" >
																						<input type="text" style="margin-left:2px;" class="form-control" name="selectedP" id="selectedP" disabled=false>
																					</div>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:17%;" class="col-sm-2 control-label">No Faktur</label>
																					<div class="col-lg-1" >
																						<input type="checkbox" style="margin-left:px;width:50px;" name="cek_nofakP" id="cek_nofakP" >
																					</div>
																					<div class="col-lg-4" >
																						<input type="text" style="" class="form-control" name="nofakP" id="nofakP"disabled=false >
																					</div>
																				</div>
																			
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:28%;" id="btn_bataltransaksiP" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Batalkan Transaksi</button>										
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>	
															<div class="tab-pane" id="pp_2" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Koreksi</label>
																					<div class="col-lg-3" >
																						<select class="col-sm-2 form-control"  name="combo_koreksiP" id="combo_koreksiP" style="width: 100%;"	>
																							<option selected="selected">Pelaksana</option>
																							<option>Refferal</option>
																						</select>																		
																					</div>																								
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Transaksi</label>
																					<div class="col-lg-3" >
																						<input type="text" style="" class="form-control" name="invoiceP" id="invoiceP" disabled=false>
																					</div>
																					<div class="col-lg-4" >
																						<input type="text" style="margin-left:-13%;" class="form-control" name="namaP" id="namaP" disabled=false>
																					</div>
																					<div class="col-lg-3" >
																						<input type="text" style="margin-left:-37%;" class="form-control" name="tarifP" id="tarifP" disabled=false>
																					</div>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label"></label>
																					<div class="col-lg-5" >
																						<input type="text" style="" class="form-control" name="poliP" id="poliP" disabled=false>
																					</div>
																					<div class="col-lg-5" >
																						<input type="text" style="margin-left:-10%;" class="form-control" name="waktuP" id="waktuP" disabled=false>
																					</div>
																				</div>
																			
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Dokter</label>
																					<div class="col-lg-6" >
																						<select class="col-sm-2 form-control"  name="combo_dokterP" id="combo_dokterP" style="width: 100%;"	>
																							<option selected="selected">-</option>
																							<?php foreach ($dt_namadokter as $namadokter) { ?>	
																								<option value="<?php echo $namadokter["dokter"]; ?>"><?php echo $namadokter["dokter"]; ?></option>
																							<?php } ?>	
																						</select>																		
																					</div>
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Nilai Fee % /Rp :</label>
																					
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Penjamin</label>
																					<div class="col-lg-6" >
																						<select class="col-sm-2 form-control"  name="combo_penjaminP" id="combo_penjaminP" style="width: 100%;"	>
																							<option selected="selected">-</option>
																							<option>ASURANSI (NOT REGISTERED)</option>
																							<option>RS WILLIAM BOOTH</option>
																						</select>																		
																					</div>
																					<div class="col-lg-3" >
																						<input type="text" style="" class="form-control" name="nilaifeeP" id="nilaifeeP" value="0">
																					</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					*) Koreksi hanya dilakukan per Invoice dan per Tindakan								
																				</div>																								
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:18%;" id="btn_koreksifeeP" class="btn btn-danger"><i class="fa fa-sign-in"></i>	Koreksi Fee</button>
																				</div>
																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="pp_3" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3"  class="col-sm-2 control-label">No Faktur</label>
																					<div class="col-lg-4" >
																						<input type="text" style="" class="form-control" name="nofakP2" id="nofakP2" disabled=false>
																					</div>																							
																				</div>
																				<div class="row">	
																					<label for="inputEmail3"  class="col-sm-2 control-label">Transaksi</label>
																					<div class="col-lg-5" >
																						<input type="text" style="" class="form-control" name="transaksiP" id="transaksiP" disabled=false>
																					</div>
																					<label for="inputEmail3" style="margin-left:-3%;width:10%;" class="col-sm-2 control-label">Harga</label>
																					<div class="col-lg-3" >
																						<input type="text" style="" class="form-control" name="hargaP" id="hargaP" disabled=false>
																					</div>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3"  class="col-sm-2 control-label">Dokter</label>
																					<div class="col-lg-5" >
																						<input type="text" style="" class="form-control" name="dokterP" id="dokterP" disabled=false>
																					</div>	
																					<label for="inputEmail3" style="margin-left:-3%;width:10%;" class="col-sm-2 control-label">Qty</label>
																					<div class="col-lg-2" >
																						<input type="text" style="" class="form-control" name="qtyP" id="qtyP" disabled=false>
																					</div>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3"  class="col-sm-2 control-label">Poli</label>
																					<div class="col-lg-5" >
																						<input type="text" style="" class="form-control" name="poliP2" id="poliP2" disabled=false>
																					</div>
																					<label for="inputEmail3" style="margin-left:-3%;width:10%;" class="col-sm-2 control-label">Waktu</label>
																					<div class="col-lg-4" >
																						<input type="text" style="" class="form-control" name="waktuP2" id="waktuP2" disabled=false>
																					</div>
																				</div>
																				
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:82%;" id="btn_hapusP" class="btn btn-danger" ><i class="fa fa-times"></i>	Hapus</button>												
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="pp_4" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Faktur yang di Posting</label>
																					<div class="col-xs-1" >
																						<textarea rows="3" cols="47" name="fakturP" id="fakturP"  ></textarea>
																					</div>	
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Kode Kas / Bank</label>
																					<div class="col-lg-2" >
																						<input type="text"  class="form-control" name="kodekasP" id="kodekasP" disabled=false>
																					</div>
																					<div class="col-lg-5" >
																						<input type="text" style="margin-left:-10%;" class="form-control" name="namakasP" id="namakasP" >
																					</div>	
																						<button type="button" data-toggle="modal" data-target="#ModalP" style="margin-left:-3%;" id="btn_cariP" class="btn btn-primary" ><i class="fa fa-search"></i> </button>										
																						
																						<div class="modal fade" id="ModalP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																							<div class="modal-dialog" style="width:800px">
																								<div class="modal-content">
																									<div class="modal-header">
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										<h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
																									</div>
																									<div class="modal-body">
																										<table id="list_coaP" class="table table-bordered table-hover display">
																											<thead>
																											  <tr>
																												<th></th>
																												<th>Kode Akun</th>
																												<th>Nama Akun</th>
																												<th>Neraca/Rugi Laba</th>
																												<th>Level</th>
																												<th>Rekap</th>
																											  </tr>
																											</thead>
																											<tbody>
																												 <?php foreach ($dt_coas as $dt_coa) { ?>
																												  <tr>
																													<td> </td>
																													<td><?php echo $dt_coa['kode']; ?></td>
																													<td><?php echo $dt_coa['nama']; ?></td>
																													<td><?php echo $dt_coa['NR_RL']; ?></td>
																													<td><?php echo $dt_coa['level']; ?></td>
																													<td><?php echo $dt_coa['isRekap']; ?></td>
																												  </tr>
																												<?php } ?>
																											</tbody>
																										</table>                                    
																									</div>
																								</div>
																							</div>
																						</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">
																					*) Sesuaikan Kode Akun dengan Cara Bayarnya.
																				</div>
																				<div class="row">															
																					<button type="button" style="margin-left:67%;" id="btn_postingP" class="btn btn-danger" ><i class="fa fa-sign-in"></i>	Posting Ke Jurnal</button>										
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="pp_5" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Grafik Pendapatan :</label>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Pendapatan Selama</label>
																					<div class="col-lg-3" >
																						<select class="col-sm-2 form-control"  name="combo_grafikP" id="combo_grafikP" style="width: 100%;"	>
																							<option selected="selected">Tahun</option>
																							<option>Bulan</option>
																						</select>																		
																					</div>
																					<div class="col-lg-2" >
																						<input type="text"  class="form-control" name="bulanP" id="bulanP" >
																					</div>
																					<div class="col-lg-2" >
																						<input type="text" style="margin-left:-10%;" class="form-control" name="tahunP" id="tahunP" >
																					</div>	
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:33%;" id="btn_grafikP" class="btn btn-danger" ><i class="fa fa-bar-chart-o"></i>	Grafik</button>										
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
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																		<table id="list_poli" class="table table-bordered table-hover display">
																			<thead>
																				<tr>
																					<th></th>
																					<th>Invoice</th>
																					<th>Pasien</th>
																					<th>Cara Bayar</th>	
																					<th>Tanggal/Jam</th>
																					<th>Nama Item</th>																	
																					<th>Tarif</th>
																					<th>Qty</th>	
																					<th>Sub(Rp)</th>
																					<th>Pot(Rp)</th>
																					<th>Gratis(Rp)</th>
																					<th>Poli</th>																	
																					<th>Dr Pelaksana</th>														
																					<th>Tgl Pelaksana</th>
																					<th>Fee Pelaksana(Rp)</th>
																					<th>Refferal</th>
																					<th>Fee Refferal(Rp)</th>
																					<th>Jenis</th>																	
																					<th>Penjamin</th>														
																					<th>Petugas</th>
																				</tr>
																			</thead>
																			<tbody>
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
												<div class="col-sm-6">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeA1" id="tglperiodeA1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeA2" id="tglperiodeA2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>	
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Jenis</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_jenisA" id="combo_jenisA" style="width: 100%;"	>
																	<option value="" selected="selected">Semua Jenis</option>
																	<?php foreach ($dt_jp as $jp) { ?>	
																		<option value="<?php echo $jp["nama"]; ?>"><?php echo $jp["nama"]; ?></option>
																	<?php } ?>						
																</select>																		
															</div>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control" style="margin-left:7%;" name="combo_sortA" id="combo_sortA" style="width: 100%;"	>
																	<option value="asc" selected="selected">ASCENDING</option>
																	<option value="desc">DESCENDING</option>
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_penjaminA" id="combo_penjaminA" style="width: 97%;"	>
																	<option value="" selected="selected">SEMUA PENJAMIN</option>
																	<option>ASURANSI (NOT REGISTERED)</option>
																	<option>RS WILLIAM BOOTH</option>							
																</select>																		
															</div>
														</div>
																				
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Pencarian</label>
															<div class="col-lg-6" >
																<input type="text" style="width:97%;" class="form-control" name="cariA" id="cariA" placeholder="Masukan Nama ...">
															</div>
														</div>
													
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshA" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
															<button type="button" style="margin-left:1%;" id="btn_printA" class="btn btn-danger" disabled=true><i class="fa fa-print"></i>	 Print</button>											
														</div>																		
													</div>
													<div class="form-group">
														<div class="row">
															*) Nilai Total dibawah Termasuk Embalase & Tanpa Retur.
														</div>
														<div class="row">
															*) Fee Dokter tertera dihitung tanpa menyertakan Embalase.
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="nav-tabs-custom" id="tab_transfer">
														<ul class="nav nav-tabs">
															<li class="active"><a href="#pa_1" data-toggle="tab">General</a></li>
															<li><a href="#pa_2" data-toggle="tab">Hapus Item Transaksi</a></li>
															<li><a href="#pa_3" data-toggle="tab">Posting Jurnal</a></li>
															<li><a href="#pa_4" data-toggle="tab">Grafik</a></li>
														</ul>	
													
														<div class="tab-content">
															<div class="tab-pane active" id="pa_1" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Selected Rp</label>
																					<div class="col-lg-4" >
																						<input type="text" style="margin-left:2px;" class="form-control" name="selectedA" id="selectedA" disabled=false>
																					</div>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:17%;" class="col-sm-2 control-label">No Faktur</label>
																					<div class="col-lg-1" >
																						<input type="checkbox" style="margin-left:px;width:50px;" name="cek_nofakA" id="cek_nofakA" >
																					</div>
																					<div class="col-lg-4" >
																						<input type="text" style="" class="form-control" name="nofakA" id="nofakA"disabled=false >
																					</div>
																				</div>
																			
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:28%;" id="btn_bataltransaksiA" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Batalkan Transaksi</button>										
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>	
															
															<div class="tab-pane" id="pa_2" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">No Faktur</label>
																					<div class="col-lg-5" >
																						<input type="text" style="" class="form-control" name="nofakA2" id="nofakA2" disabled=false>
																					</div>
																				</div>
																				<div class="row">
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Tgl Diberikan Obat</label>
																					<div class="col-lg-4" >
																						<input type="text" style="" class="form-control" name="tgldiberikanA" id="tgldiberikanA" disabled=false>
																					</div>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Nama Item</label>
																					<div class="col-lg-8" >
																						<input type="text" style="" class="form-control" name="namaA" id="namaA"disabled=false >
																					</div>	
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Harga</label>
																					<div class="col-lg-4" >
																						<input type="text" style="" class="form-control" name="hargaA" id="hargaA" disabled=false>
																					</div>
																					<label for="inputEmail3" style="margin-left:-2%;width:10%;" class="col-sm-2 control-label">Jumlah</label>
																					<div class="col-lg-3" >
																						<input type="text" style="margin-left:1px;" class="form-control" name="jumlahA" id="jumlahA" disabled=false>
																					</div>
																				</div>
																				
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:33%;" id="btn_hapusA" class="btn btn-danger" ><i class="fa fa-times"></i>	Hapus</button>												
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="pa_3" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Faktur yang di Posting</label>
																					<div class="col-xs-1" >
																						<textarea rows="3" cols="47" name="fakturA" id="fakturA"  ></textarea>
																					</div>	
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Kode Kas / Bank</label>
																					<div class="col-lg-2" >
																						<input type="text"  class="form-control" name="kodekasA" id="kodekasA" disabled=false>
																					</div>
																					<div class="col-lg-5" >
																						<input type="text" style="margin-left:-10%;" class="form-control" name="namakasA" id="namakasA" >
																					</div>	
																						<button type="button" data-toggle="modal" data-target="#ModalA" style="margin-left:-3%;" id="btn_cariA" class="btn btn-primary" ><i class="fa fa-search"></i> </button>										
																						
																						<div class="modal fade" id="ModalA" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																							<div class="modal-dialog" style="width:800px">
																								<div class="modal-content">
																									<div class="modal-header">
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										<h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
																									</div>
																									<div class="modal-body">
																										<table id="list_coaA" class="table table-bordered table-hover display">
																											<thead>
																											  <tr>
																												<th></th>
																												<th>Kode Akun</th>
																												<th>Nama Akun</th>
																												<th>Neraca/Rugi Laba</th>
																												<th>Level</th>
																												<th>Rekap</th>
																											  </tr>
																											</thead>
																											<tbody>
																												 <?php foreach ($dt_coas as $dt_coa) { ?>
																												  <tr>
																													<td> </td>
																													<td><?php echo $dt_coa['kode']; ?></td>
																													<td><?php echo $dt_coa['nama']; ?></td>
																													<td><?php echo $dt_coa['NR_RL']; ?></td>
																													<td><?php echo $dt_coa['level']; ?></td>
																													<td><?php echo $dt_coa['isRekap']; ?></td>
																												  </tr>
																												<?php } ?>
																											</tbody>
																										</table>                                    
																									</div>
																								</div>
																							</div>
																						</div>
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">
																					*) Sesuaikan Kode Akun dengan Cara Bayarnya.
																				</div>
																				<div class="row">															
																					<button type="button" style="margin-left:67%;" id="btn_postingA" class="btn btn-danger" ><i class="fa fa-sign-in"></i>	Posting Ke Jurnal</button>										
																				</div>																								
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="tab-pane" id="pa_4" style="position: relative; ">
																<div class="box-body">					
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Grafik Pendapatan :</label>
																				</div>
																				<div class="row">	
																					<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Pendapatan Selama</label>
																					<div class="col-lg-3" >
																						<select class="col-sm-2 form-control"  name="combo_grafikA" id="combo_grafikA" style="width: 100%;"	>
																							<option selected="selected">Tahun</option>
																							<option>Bulan</option>
																						</select>																		
																					</div>
																					<div class="col-lg-2" >
																						<input type="text"  class="form-control" name="bulanA" id="bulanA" >
																					</div>
																					<div class="col-lg-2" >
																						<input type="text" style="margin-left:-10%;" class="form-control" name="tahunA" id="tahunA" >
																					</div>	
																				</div>
																			</div>
																			<div class="form-group">
																				<div class="row">															
																					<button type="button" style="margin-left:33%;" id="btn_grafikA" class="btn btn-danger" ><i class="fa fa-bar-chart-o"></i>	Grafik</button>										
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
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_apotek" class="table table-bordered table-hover display">
																	<tbody>
																	<thead>
																		<tr>
																			<th></th>
																			<th>No Faktur</th>
																			<th>Pasien</th>
																			<th>Tanggal/Jam</th>
																			<th>Nama Item</th>																	
																			<th>Harga</th>
																			<th>Qty</th>	
																			<th>Sub Total</th>
																			<th>Tanggal Diberikan</th>
																			<th>Dokter</th>
																			<th>R.Inap/Jalan</th>																	
																			<th>Jenis</th>																	
																			<th>Penjamin</th>														
																			<th>Petugas</th>
																		</tr>
																	</thead>
																	</tbody>
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
												<div class="col-sm-7">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodePP1" id="tglperiodePP1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodePP2" id="tglperiodePP2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_penjaminPP" id="combo_penjaminPP" style="width: 100%;"	>
																	<option value="" selected="selected">SEMUA PENJAMIN</option>
																	<option>ASURANSI (NOT REGISTERED)</option>
																	<option>RS WILLIAM BOOTH</option>							
																</select>																		
															</div>
														</div>															
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Tampilkan</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_tampilPP" id="combo_tampilPP" style="width: 100%;"	>
																	<option value="" selected="selected">Tampilkan Semua</option>
																	<option>Belum Posting</option>	
																	<option>Sudah Posting</option>																						
																</select>																		
															</div>
															
														</div>						
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Pencarian</label>
															<div class="col-lg-6" >
																<input type="text" style="width:97%;" class="form-control" name="cariPP" id="cariPP" placeholder="Masukan No RM / Nama">
															</div>
														</div>
													
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshPP" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
														</div>																		
													</div>
													
												</div>
												
												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_penjamin1" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No RM</th>
																			<th>Nama</th>
																			<th>Alamat</th>
																			<th>No Invoice(1)</th>	
																			<th>No Invoice(2)</th>																		
																			<th>Penjamin</th>														
																			<th>Credit(Rp)</th>
																			<th>Tgl/Jam Faktur</th>	
																		</tr>
																	</thead>
																	<tbody>
																</table>							
															</div>	
														</div>
													</div>
												</div>

												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_penjamin2" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No RM</th>
																			<th>Pasien</th>
																			<th>No Invoice(1)</th>	
																			<th>No Invoice(2)</th>														
																			<th>Credit(Rp)</th>
																		</tr>
																	</thead>
																	<tbody>
																</table>							
															</div>	
														</div>
													</div>
												</div>
												
												<div class="col-sm-7">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3"  class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-5" >
																<input type="text"  class="form-control" name="penjaminPP" id="penjaminPP" disabled=false>
															</div>
														</div>
														<div class="row">	
															<label for="inputEmail3" " class="col-sm-2 control-label">Pembayaran</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_pembayaranPP" id="combo_pembayaranPP" style="width: 100%;"	>
																	<option selected="selected">-</option>
																	<option>Cash</option>
																	<option>Cheque</option>
																	<option>Bilyet Giro</option>
																	<option>Transfer Bank</option>
																</select>																		
															</div>
														</div>
														<div class="row">	
															<label for="inputEmail3"  class="col-sm-2 control-label">Kode Akun</label>
															<div class="col-lg-2" >
																<input type="text"  class="form-control" name="kodeakunPP" id="kodeakunPP" disabled=false>
															</div>
															<div class="col-lg-4" >
																<input type="text" style="margin-left:-10%;" class="form-control" name="namaakunPP" id="namaakunPP" disabled=false>
															</div>
																<button type="button" data-toggle="modal" data-target="#ModalPP" style="margin-left:-4%;" id="btn_cariPP" class="btn btn-primary"><i class="fa fa-search"></i>	</button>	
																
																<div class="modal fade" id="ModalPP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog" style="width:800px">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
																			</div>
																			<div class="modal-body">
																				<table id="list_coaPP" class="table table-bordered table-hover display">
																					<thead>
																					  <tr>
																						<th></th>
																						<th>Kode Akun</th>
																						<th>Nama Akun</th>
																						<th>Neraca/Rugi Laba</th>
																						<th>Level</th>
																						<th>Rekap</th>
																					  </tr>
																					</thead>
																					<tbody>
																						 <?php foreach ($dt_coas as $dt_coa) { ?>
																						  <tr>
																							<td> </td>
																							<td><?php echo $dt_coa['kode']; ?></td>
																							<td><?php echo $dt_coa['nama']; ?></td>
																							<td><?php echo $dt_coa['NR_RL']; ?></td>
																							<td><?php echo $dt_coa['level']; ?></td>
																							<td><?php echo $dt_coa['isRekap']; ?></td>
																						  </tr>
																						<?php } ?>
																					</tbody>
																				</table>                                    
																			</div>
																		</div>
																	</div>
																</div>
														</div>
														<div class="row">	
															<label for="inputEmail3"  class="col-sm-2 control-label">Remark</label>
															<div class="col-lg-4" >
																<input type="text"  class="form-control" name="remarkPP" id="remarkPP" >
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_postingPP" class="btn btn-danger" disabled=false><i class="fa fa-save"></i>	Posting</button>	
															<button type="button" style="margin-left:1%;" id="btn_batalPP" class="btn btn-danger"><i class="fa fa-reply"></i>	Batal</button>	
														</div>																		
													</div>
												</div>
												
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_4" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-7">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeR1" id="tglperiodeR1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeR2" id="tglperiodeR2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshR" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
															<button type="button" style="margin-left:1%;" id="btn_printR" class="btn btn-danger"><i class="fa fa-print"></i>	 Print</button>											
														</div>																		
													</div>
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="row">
															<div class="form-group">
																<table id="list_retur" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No Retur</th>
																			<th>Nama/Item</th>
																			<th>Harga Retur</th>	
																			<th>Qty</th>														
																			<th>Total</th>
																			<th>Tanggal</th>
																			<th>Jam</th>
																			<th>Transaksi</th>	
																			<th>Ref</th>														
																			<th>Petugas</th>
																		</tr>
																	</thead>
																	<tbody>
																</table>							
															</div>	
														</div>
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" class="col-sm-2 control-label">No Retur</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:px;width:50px;" name="cek_noretur" id="cek_noretur" >
															</div>
															<div class="col-lg-4" >
																<input type="text" style="" class="form-control" name="noretur" id="noretur"disabled=false >
															</div>
																<button type="button"  id="btn_batalretur" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Batalkan Retur</button>										
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
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Transaksi</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_transaksiB" id="combo_transaksiB" style="width: 100%;"	>
																	<option selected="selected">==PILIH==</option>
																	<option>Poli & Penunjang</option>
																	<option>Apotek</option>
																</select>																		
															</div>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeB1" id="tglperiodeB1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeB2" id="tglperiodeB2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>					
													</div>
													<div class="form-group">
														<div class="row">
															<button type="button" style="margin-left:19%;" id="btn_refreshB" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															*) 50 Teratas Pasien yang paling berkontribusi.
														</div>
													</div>
													
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="row">
															<div class="form-group">
																<table id="list_berkontribusi" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No RM</th>
																			<th>Nama</th>
																			<th>Alamat</th>	
																			<th>Telepon</th>														
																			<th>Kelompok Beli</th>
																			<th>Penjamin</th>
																			<th>Nilai Kontribusi(Rp)</th>
																			<th>Persen(%)</th>	
																			<th>Akumulasi</th>
																		</tr>
																	</thead>
																	<tbody>
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
																	<input type="text" style="width:100%;" name="tglperiodeG1" id="tglperiodeG1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeG2" id="tglperiodeG2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>	
														<div class="row">
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Jenis Pasien</label>
															<div class="col-lg-4">
																<select class="col-sm-2 form-control"  name="combo_jenisG" id="combo_jenisG" style="width: 100%;"	>
																	<option value="" selected="selected">Semua Jenis</option>
																		<?php foreach ($dt_jp as $jp) { ?>	
																			<option value="<?php echo $jp["nama"]; ?>"><?php echo $jp["nama"]; ?></option>
																		<?php } ?>						
																</select>	
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshG" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_printG" class="btn btn-danger" ><i class="fa fa-print"></i>	Print</button>													
														</div>																								
													</div>
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="row">
															<div class="form-group">
																<table id="list_grouppoli" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Poli/Unit/Pos</th>
																			<th>Nilai Transaksi (Rp)</th>
																			<th>Persentase</th>	
																		</tr>
																	</thead>
																	<tbody>
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
	
	$("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
	$("[tgl-mask]").inputmask();
	
	$("#combo_poliP").select2();
	
	//PendapatanPoli
	$('#list_coaP').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 5], "visible": true, "searchable": true
            },
            {
                "targets": [ 5], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_coaP').click(function() {   
		dtrec = $('#list_coaP').DataTable().row('.selected').data();
		$("#kodekasP").val(dtrec[1]);
		$("#namakasP").val(dtrec[2]);
	}); 
	$('#list_poli').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$(document).ready(function(){
		$("#cariP").keyup(function(){
			ListPendapatanPoli();
		});
	});
	$("#combo_jenisP").change(function(){
		ListPendapatanPoli();
	});
	$("#combo_poliP").change(function(){
		ListPendapatanPoli();
	});
	$("#combo_kategoriP").change(function(){
		ListPendapatanPoli();
	});
	$("#combo_sortP").change(function(){
		ListPendapatanPoli();
	});
	$("#btn_refreshP").click(function(){
		ListPendapatanPoli();
	});
	
	function ListPendapatanPoli(){
    $('#list_poli').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10, scrollX: true,
		"ajax":{
			url :"../DataPendapatanPoli/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeP1').val(), 
					tgl_akhir:$('#tglperiodeP2').val(),
					jenis:$('#combo_jenisP').val(),
					poli:$('#combo_poliP').val(),
					bayar:$('#combo_kategoriP').val(),
					sort:$('#combo_sortP').val(),
					carinama:$('#cariP').val()},
			error: function(){  // error handling
				$(".list_poli-error").html("");
				$("#list_poli").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_poli_processing").css("display","none");
							
			}
		}
	});	
	}
	$('#list_poli').click(function() { 
		dtrec = $('#list_poli').DataTable().row('.selected').data();			
		$("#selectedP").val(dtrec[6]);
		$("#nofakP").val(dtrec[1]);
		
		$("#invoiceP").val(dtrec[1]);
		$("#namaP").val(dtrec[5]);
		$("#tarifP").val(dtrec[6]);
		$("#poliP").val(dtrec[11]);
		$("#waktuP").val(dtrec[13]);
		$("#combo_dokterP option:selected").text(dtrec[12]);
		$("#combo_penjaminP").val(dtrec[18]);
		
		$("#nofakP2").val(dtrec[1]);
		$("#transaksiP").val(dtrec[5]);
		$("#hargaP").val(dtrec[6]);
		$("#dokterP").val(dtrec[12]);
		$("#qtyP").val(dtrec[7]);
		$("#poliP2").val(dtrec[11]);
		$("#waktuP2").val(dtrec[13]);
		
		$("#fakturP").val(dtrec[1]+';');
		
		$("#btn_printP").prop("disabled", false);
	});
	$("#cek_nofakP").click(function(){
		if($("#cek_nofakP").prop("checked")){
			$("#nofakP").prop("disabled", false);
			$("#btn_bataltransaksiP").prop("disabled", false);
		}else{
			$("#nofakP").val("");
			$("#nofakP").prop("disabled", true);
			$("#btn_bataltransaksiP").prop("disabled", true);
		}
	});
	$("#btn_bataltransaksiP").click(function(){				
		if (confirm("Apakah anda yakin akan membatalkan Transaksi No Faktur : "+dtrec[1]+", perubahan akan bersifat permanen !") == true) {	
			if(dtrec[7] == '0'){
				alert("Transaksi tersebut telah dibatalkan lebih dahulu, mohon ulangi !");
			}else{
				$.ajax({  datatype: "json",
					data:{no_faktur: dtrec[1] },
					url: "../BatalTransaksiP/",
					async: false, type:'POST',success: function(data){alert("No Faktur "+dtrec[1]+", telah berhasil dibatalkan");		
					ListPendapatanPoli();
					var dt=JSON.parse(data);},
					error: function(){alert('Error Nih !!!');}
				});	
			}
		}
	});
	$("#btn_koreksifeeP").click(function(){				
		$.ajax({  datatype: "json",
			data:{koreksi:$('#combo_koreksiP').val(),
				  no_faktur:$('#invoiceP').val(),
				  dokter:$('#combo_dokterP option:selected').text(),
				  fee:$('#nilaifeeP').val(),
				  ket:$('#namaP').val(),
				  harga:$('#tarifP').val(),
				  poli:$('#poliP').val(),
				  waktu:$('#waktuP').val(),
				  penjamin:$('#combo_penjaminP option:selected').text()},
			url: "../KoreksiFeeP/",
			async: false, type:'POST',success: function(data){alert("Data telah berhasil dikoreksi");		
			ListPendapatanPoli()
			$('#combo_koreksiP').val("Pelaksana");
			$('#invoiceP').val("");
			$('#combo_dokterP').val("-");
			$('#nilaifeeP').val("0");
			$('#namaP').val("");
			$('#tarifP').val("");
			$('#poliP').val("");
			$('#waktuP').val("");
			$('#combo_penjaminP option:selected').text("-");
			var dt=JSON.parse(data);},
			error: function(){alert('Error Nih !!!');}
		});	
			
	});
	$("#btn_hapusP").click(function(){				
		if (confirm("Apakah anda yakin akan menghapus Transaksi "+dtrec[1]+"/"+dtrec[5]+" ?") == true) {	
			
				$.ajax({  datatype: "json",
					data:{faktur:$('#nofakP2').val(),
						  ket:$('#transaksiP').val(),
						  harga:$('#hargaP').val(),
						  dokter:$('#dokterP').val(),
						  qty:$('#qtyP').val(),
						  poli:$('#poliP2').val(),
						  tgl:$('#waktuP2').val()
						  },
					url: "../HapusPoli/",
					async: false, type:'POST',success: function(data){alert("No Faktur "+dtrec[1]+", telah berhasil dihapus");		
					ListPendapatanPoli();
					var dt=JSON.parse(data);},
					error: function(){alert('Error Nih !!!');}
				});	
			
		}
	});
	$("#btn_printP").click(function(){
		PrintPendapatanPoli();
	})
	function PrintPendapatanPoli(){		
		var win = "../../../assets/jasper/reports/akutansi/pendapatan_rs/PendapatanPoli.php?invoice="+dtrec[1]+"";
		window.open(win);	
	}
	//PendapatanApotek
	$('#list_coaA').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 5], "visible": true, "searchable": true
            },
            {
                "targets": [ 5], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_coaA').click(function() {   
		dtrec = $('#list_coaA').DataTable().row('.selected').data();
		$("#kodekasA").val(dtrec[1]);
		$("#namakasA").val(dtrec[2]);
	}); 
	$('#list_apotek').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$(document).ready(function(){
		$("#cariA").keyup(function(){
			ListPendapatanApotek();
		});
	});
	$("#combo_jenisA").change(function(){
		ListPendapatanApotek();
	});
	$("#combo_penjaminA").change(function(){
		ListPendapatanApotek();
	});
	$("#combo_sortA").change(function(){
		ListPendapatanApotek();
	});
	$("#btn_refreshA").click(function(){
		ListPendapatanApotek();
	});
	function ListPendapatanApotek(){
    $('#list_apotek').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPendapatanApotek/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeA1').val(), 
					tgl_akhir:$('#tglperiodeA2').val(),
					jenis:$('#combo_jenisA').val(),
					penjamin:$('#combo_penjaminA').val(),
					sort:$('#combo_sortA').val(),
					carinama:$('#cariA').val()
					},
			error: function(){  // error handling
				$(".list_apotek-error").html("");
				$("#list_apotek").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_apotek_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_apotek').click(function() { 
		dtrec = $('#list_apotek').DataTable().row('.selected').data();			
		$("#selectedA").val(dtrec[5]);
		$("#nofakA").val(dtrec[1]);
		$("#nofakA2").val(dtrec[1]);
		$("#tgldiberikanA").val(dtrec[8]);
		$("#namaA").val(dtrec[4]);
		$("#hargaA").val(dtrec[5]);
		$("#jumlahA").val(dtrec[6]);
		$("#fakturA").val(dtrec[1]+';');
		$("#btn_printA").prop("disabled", false);
	});
	$("#cek_nofakA").click(function(){
		if($("#cek_nofakA").prop("checked")){
			$("#nofakA").prop("disabled", false);
			$("#btn_bataltransaksiA").prop("disabled", false);
		}else{
			$("#nofakA").val("");
			$("#nofakA").prop("disabled", true);
			$("#btn_bataltransaksiA").prop("disabled", true);
		}
	});
	$("#btn_bataltransaksiA").click(function(){				
		if (confirm("Apakah anda yakin akan membatalkan Transaksi Apotek No Faktur : "+dtrec[1]+", perubahan akan bersifat permanen !") == true) {	
			if(dtrec[14] == 'BATAL'){
				alert("Transaksi tersebut telah dibatalkan lebih dahulu, mohon ulangi !");
			}else{
				$.ajax({  datatype: "json",data:{no_faktur: dtrec[1]},
					url: "../BatalTransaksiA/",
					async: false, type:'POST',success: function(data){alert("No Faktur "+dtrec[1]+", telah berhasil dibatalkan");		
					ListPendapatanApotek();
					var dt=JSON.parse(data);},
					error: function(){alert('Error Nih !!!');}
				});	
			}
		}
	});
	$("#btn_hapusA").click(function(){				
		if (confirm("Apakah anda yakin akan menghapus "+dtrec[4]+" ("+dtrec[1]+"/"+dtrec[8]+") ?") == true) {	
			
				$.ajax({  datatype: "json",data:{no_faktur: dtrec[1],tgl: dtrec[8],barang: dtrec[4],harga: dtrec[5],qty: dtrec[6]},
					url: "../HapusApotek/",
					async: false, type:'POST',success: function(data){alert("No Faktur "+dtrec[1]+", telah berhasil dihapus");		
					ListPendapatanApotek();
					var dt=JSON.parse(data);},
					error: function(){alert('Error Nih !!!');}
				});	
			
		}
	});
	$("#btn_printA").click(function(){
		PrintPendapatanApotek();
	})
	function PrintPendapatanApotek(){		
		var win = "../../../assets/jasper/reports/akutansi/pendapatan_rs/PendapatanApotek.php?nofak="+dtrec[1]+"";
		window.open(win);	
	}
	//PendapatanPenjamin
	$('#list_coaPP').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 5], "visible": true, "searchable": true
            },
            {
                "targets": [ 5], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_coaPP').click(function() {   
		dtrec = $('#list_coaPP').DataTable().row('.selected').data();
		$("#kodeakunPP").val(dtrec[1]);
		$("#namaakunPP").val(dtrec[2]);
	});
	$('#list_penjamin1').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_penjamin2').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$(document).ready(function(){
		$("#cariPP").keyup(function(){
			ListPendapatanPenjamin();
		});
	});
	$("#combo_penjaminPP").change(function(){
		ListPendapatanPenjamin();
	});
	$("#combo_tampilPP").change(function(){
		ListPendapatanPenjamin();
	});
	$("#btn_refreshPP").click(function(){
		ListPendapatanPenjamin();
	});
	function ListPendapatanPenjamin(){
    $('#list_penjamin1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPendapatanPenjamin/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodePP1').val(), 
					tgl_akhir:$('#tglperiodePP2').val(),
					penjamin:$('#combo_penjaminPP').val(),
					tampil:$('#combo_tampilPP').val(),
					norm_nama:$('#cariPP').val()},
			error: function(){  // error handling
				$(".list_penjamin1-error").html("");
				$("#list_penjamin1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_penjamin1_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_penjamin1').click(function() { 
		dtrec = $('#list_penjamin1').DataTable().row('.selected').data();	
		ListPendapatanPenjamin2();
		$("#penjaminPP").val(dtrec[6]);
		$("#btn_postingPP").prop("disabled", false);
	});
	
	function ListPendapatanPenjamin2(){
    $('#list_penjamin2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPendapatanPenjamin2/", // json datasource
			type: "post",  // method  , by default get
			data:{	norm:dtrec[1],faktur:dtrec[4] },
			error: function(){  // error handling
				$(".list_penjamin2-error").html("");
				$("#list_penjamin2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_penjamin2_processing").css("display","none");
							
			}
		}
	});		
	}
	$("#btn_postingPP").click(function(){
		if($("#combo_pembayaranPP option:selected").text() == "-"){
			alert("Pilih salah satu Pembayaran!");
		}else if($("#kodeakunPP").val() == ""){
			alert("Masukan Kode Akun!");
		}else{
			$.ajax({  datatype: "json",data:{
					penjamin :$('#penjaminPP').val(),
					pembayaran :$('#combo_pembayaranPP option:selected').text(),
					kodeakun :$('#kodeakunPP').val(),
					remark :$('#remarkPP').val()			
					},
				url: "../PostingPelunasanPenjamin/",
				async: false, type:'POST',success: function(data){alert("Proses posting pembayaran supplier selesai.");
				var dt=JSON.parse(data);
				ListPendapatanPenjamin();
				ListPendapatanPenjamin2();				
				$("#penjaminPP").val("");
				$("#combo_pembayaranPP").val("-");
				$("#kodeakunPP").val("");
				$("#namaakunPP").val("");
				$("#remarkPP").val("");
				$("#btn_postingPP").prop("disabled", true);
				}, 
				error: function(){alert('Error Nih !!! ');}		
			});
		}
	});
	$("#btn_batalPP").click(function(){
		$("#penjaminPP").val("");
		$("#combo_pembayaranPP").val("-");
		$("#kodeakunPP").val("");
		$("#namaakunPP").val("");
		$("#remarkPP").val("");
		$("#btn_postingPP").prop("disabled", true);
	});
	
	//TransaksiRetur
	$('#list_retur').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#btn_refreshR").click(function(){
		ListTransaksiRetur();
	});
	function ListTransaksiRetur(){
    $('#list_retur').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataTransaksiRetur/", // json datasource
			type: "post",  // method  , by default get
			data:{ tgl_awal:$('#tglperiodeR1').val(), tgl_akhir:$('#tglperiodeR2').val() },
			error: function(){  // error handling
				$(".list_retur-error").html("");
				$("#list_retur").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_retur_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_retur').click(function() { 
		dtrec = $('#list_retur').DataTable().row('.selected').data();			
		$("#noretur").val(dtrec[1]);
	});
	$("#cek_noretur").click(function(){
		if($("#cek_noretur").prop("checked")){
			$("#noretur").prop("disabled", false);
			$("#btn_batalretur").prop("disabled", false);
		}else{
			$("#noretur").val("");
			$("#noretur").prop("disabled", true);
			$("#btn_batalretur").prop("disabled", true);
		}
	});
	$("#btn_batalretur").click(function(){				
		if (confirm("Anda yakin akan membatalkan Retur No : "+dtrec[1]+", perubahan akan bersifat permanen !") == true) {	
			$.ajax({  datatype: "json",data:{no_retur: dtrec[1]},
				url: "../BatalRetur/",
				async: false, type:'POST',success: function(data){alert("No Retur "+dtrec[1]+", telah berhasil dibatalkan");		
				ListTransaksiRetur();
				var dt=JSON.parse(data);},
				error: function(){alert('Error Nih !!!');}
			});	
		}
	});
	$("#btn_printR").click(function(){
		PrintTransaksiRetur();
	})
	function PrintTransaksiRetur(){		
		var win = "../../../assets/jasper/reports/akutansi/pendapatan_rs/TransaksiRetur.php?noretur="+dtrec[1]+"";
		window.open(win);	
	}
	
});	



</script>








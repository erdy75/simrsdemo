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
		Jasa Medis
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">AKUTANSI</a></li>
        <li class="active">Jasa Medis</li>
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
							<div class="nav-tabs-custom" id="tab_jasa_medis">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Laporan Jasa Medis</a></li>
									<li><a href="#tab_2" data-toggle="tab">Laporan Pembayaran Jasa Medis</a></li>
									<li><a href="#tab_3" data-toggle="tab">Rekapan Jasa Medis Dokter</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-8">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeL1" id="tglperiodeL1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeL2" id="tglperiodeL2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>	
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Nama Dokter</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_dokterL" id="combo_dokterL" style="width: 100%;"	>
																	<?php foreach ($dt_namadokter as $namadokter) { ?>	
																		<option value="<?php echo $namadokter["dokter"]; ?>"><?php echo $namadokter["dokter"]; ?></option>
																	<?php } ?>							
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Pelaksana</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_pelaksanaL" id="combo_pelaksanaL" style="width: 100%;"	>
																	<option value="" selected="selected">Semua</option>
																	<option>Sudah Dilaksanakan</option>
																	<option>Belum Dilaksanakan</option>
																</select>																		
															</div>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control" style="margin-left:2%;" name="combo_perawatanL" id="combo_perawatanL" style="width: 100%;"	>
																	<option selected="selected">Semua Perawatan</option>
																	<option>Rawat Jalan</option>
																	<option>Rawat Inap</option>
																	<option>UGD/IGD</option>
																	<option>Kamar Operasi</option>
																	<option>Forensik</option>
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_penjaminL" id="combo_penjaminL" style="width: 100%;"	>
																	<option value="" selected="selected">Semua Penjamin</option>
																	<option>Dengan Penjamin</option>
																	<option>Tanpa Penjamin</option>																							
																</select>																		
															</div>
														</div>		
													
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshL" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
															<button type="button" style="margin-left:1%;" id="btn_cetaklaporan" class="btn btn-danger"><i class="fa fa-print"></i>	 Cetak Laporan</button>		
															<button type="button" style="margin-left:1%;" id="btn_cetakprintout" class="btn btn-danger"><i class="fa fa-print"></i>	 Cetak PrintOut</button>										
														</div>
																		
													</div>
												</div>
												
												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_laporan" class="table table-bordered table-hover display">
																			<thead>
																				<tr>
																					<th></th>
																					<th>No Faktur</th>
																					<th>Poli</th>
																					<th>Tarif</th>	
																					<th>Qty</th>
																					<th>Total</th>																	
																					<th>Tgl/Jam</th>
																					<th>Nama/ID</th>	
																					<th>Disc %</th>
																					<th>Pelaksanaan</th>
																					<th>Fee Pelaksana(Rp)</th>
																					<th>Pelaksana Dibayar</th>	
																					<th>Fee Refferal(Rp)</th>
																					<th>Refferal Dibayar</th>														
																					<th>Penjamin</th>
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
															<div class="col-lg-5" >
																<label><input type="checkbox" style="margin-left:px;width:50px;" name="cek_ubahstatus" id="cek_ubahstatus" >Ubah Status</label>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:11%;" id="btn_sudah" class="btn btn-danger" disabled=false><i class="fa fa-check"></i>	 Sudah Dilaksanakan</button>	
															<button type="button" style="margin-left:1%;" id="btn_belum" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	 Belum Dilaksanakan</button>											
														</div>		
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Dibayarkan :</label>
															<label for="inputEmail3" style="width:25%;" id="dibayarkan" class="col-sm-2 control-label">Rp 0,00</label>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Belum Dibayarkan :</label>
															<label for="inputEmail3" style="width:25%;" id="belumdibayarkan" class="col-sm-2 control-label">Rp 0,00</label>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:55%;" class="col-sm-2 control-label">----------------------------------------------------------</label>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Total Jasa Medis :</label>
															<label for="inputEmail3" style="width:25%;" id="total" class="col-sm-2 control-label">Rp 0,00</label>
															<button type="button" style="margin-left:1%;" id="btn_masukanpilihan" class="btn btn-primary"><i class="fa fa-sign-in"></i>	Masukan Pilihan</button>	
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">
														
														</div>
													</div>
												</div>
												<div class="col-sm-8">
													<div class="form-group">
														<div class="row">
															<div class="col-lg-3" >
																<label><input type="checkbox" style="margin-left:px;width:50px;" name="cek_bayarjasa" id="cek_bayarjasa" >Bayar Jasa</label>
															</div>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_drL" id="combo_drL" style="width: 100%;" disabled=false>
																	<option value="" selected="selected">Dr Pelaksana</option>
																	<option>Dr Refferal</option>
																</select>																		
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3"  class="col-sm-2 control-label">Dokter</label>
															<div class="col-lg-5" >
																<input type="text" name="dokterL" id="dokterL"  class="form-control" >
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Pembayaran</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_pembayaranL" id="combo_pembayaranL" style="width: 100%;"	>
																	<option selected="selected">-</option>
																	<option>Cash</option>
																	<option>Cheque</option>
																	<option>Bilyet Giro</option>
																	<option>Transfer Bank</option>																		
																</select>																		
															</div>
														</div>	
														<div class="row">	
															<label for="inputEmail3" class="col-sm-2 control-label">Kode Akun</label>
															<div class="col-lg-2" >
																<input type="text"  class="form-control" name="kodeakunL" id="kodeakunL" disabled=false>
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label"></label>
															<div class="col-lg-5" >
																<input type="text"  class="form-control" name="namaakunL" id="namaakunL" disabled=false>
															</div>	
																<button type="button" data-toggle="modal" data-target="#ModalL" style="margin-left:%;" id="btn_cariL" class="btn btn-primary" ><i class="fa fa-search"></i> </button>										
																<div class="modal fade" id="ModalL" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog" style="width:800px">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
																			</div>
																			<div class="modal-body">
																				<table id="list_coaL" class="table table-bordered table-hover display">
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
																<input type="text" name="remark" id="remark"  class="form-control" >
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">DPP = Total JasMed x 0,5 =</label>
															<div class="col-lg-3" >
																<input type="text" style="width:60%;" name="dpp" id="dpp"  class="form-control"  value="0" disabled=false>
															</div>
																<button type="button" style="margin-left:-8%;" id="btn_hitung" class="btn btn-primary" ><i class="fa fa-refresh"></i> Hitung</button>										
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label"> Pajak = DPP x </label>
															<div class="col-lg-2" >
																<input type="text" style="width:60%;" name="pajak1" id="pajak1"  class="form-control" >
															</div>
															<label for="inputEmail3" style="margin-left:-7%;width:7%;" class="col-sm-2 control-label"> % = </label>
															<div class="col-lg-3" >
																<input type="text" style="margin-left:-8%;width:60%;" name="pajak2" id="pajak2"  class="form-control" value="0" disabled=false >
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Dansos = (JasMed - Pajak) x</label>
															<div class="col-lg-2" >
																<input type="text" style="width:60%;" name="dansos1" id="dansos1"  class="form-control">
															</div>
															<label for="inputEmail3" style="margin-left:-7%;width:7%;" class="col-sm-2 control-label"> % = </label>
															<div class="col-lg-3" >
																<input type="text" style="margin-left:-8%;width:60%;" name="dansos2" id="dansos2"  class="form-control"  value="0" disabled=false>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:18%;" id="btn_posting" class="btn btn-danger" disabled=false><i class="fa fa-sign-in"></i>	Posting</button>	
															<button type="button" style="margin-left:1%;" id="btn_bayarkan" class="btn btn-danger" disabled=false><i class="fa fa-check"></i>	 Bayarkan</button>		
															<button type="button" style="margin-left:1%;" id="btn_Batal" class="btn btn-danger" disabled=false><i class="fa fa-reply"></i>	 Batal</button>										
														</div>		
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_2" style="position: relative; ">									
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-7">
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
															<label for="inputEmail3" style="" class="col-sm-2 control-label">Cari Dokter</label>
															<div class="col-lg-6" >
																<input type="text" style="width:88%;" name="caridokter" id="caridokter"  class="form-control" placeholder="Masukan Nama Dokter ..." >
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshP" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_cetakTTP" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	Cetak TT Pembayaran</button>													
														</div>																								
													</div>
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_pembayaran" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No Bayar Jasmed</th>
																			<th>Dokter</th>
																			<th>Waktu Bayar</th>
																			<th>Nilai (Rp)</th>	
																			<th>Kode Akun</th>
																			<th>Pembayaran</th>
																			<th>Remark</th>
																			<th>User</th>	
																		</tr>
																	</thead>
																</table>												
															</div>	
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="box-header with-border">
															<h3 class="box-title">Rincian Tindakan Dokter :</h3>
														</div><!-- /.box-header -->	
														<div class="form-group">
															<div class="row">
																<table id="list_rincian" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No Faktur</th>
																			<th>Pasien</th>
																			<th>Pemeriksaan</th>
																			<th>Harga</th>	
																			<th>Qty</th>
																			<th>Sub Total</th>
																			<th>JasMed Pelaksana</th>
																			<th>JasMed Refferal</th>	
																			<th>Tgl Bayar</th>
																			<th>Tgl Tindakan</th>
																			<th>Poli/Unit/Dept</th>
																			<th>R.Inap/Jalan</th>
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
												<div class="col-sm-8">
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
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Pelaksana</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_pelaksanaR" id="combo_pelaksanaR" style="width: 100%;"	>
																	<option value="" selected="selected">Semua</option>
																	<option>Sudah Dilaksanakan</option>
																	<option>Belum Dilaksanakan</option>
																</select>																		
															</div>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control" style="margin-left:2%;" name="combo_perawatanR" id="combo_perawatanR" style="width: 100%;"	>
																	<option selected="selected">Semua Perawatan</option>
																	<option>Rawat Jalan</option>
																	<option>Rawat Inap</option>
																	<option>UGD/IGD</option>
																	<option>Kamar Operasi</option>
																	<option>Forensik</option>
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_penjaminR" id="combo_penjaminR" style="width: 100%;"	>
																	<option value="" selected="selected">Semua Penjamin</option>
																	<option>Dengan Penjamin</option>
																	<option>Tanpa Penjamin</option>																							
																</select>																		
															</div>
														</div>		
													
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshR" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
														</div>
																		
													</div>
												</div>
												<div class="col-sm-8">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_rekapan" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Nama Dokter</th>
																			<th>Poli</th>
																			<th>Jasa Medis (Rp)</th>	
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
	
	$('#list_coaL').DataTable({
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

   $('#list_coaL').click(function() {   
		dtrec = $('#list_coaL').DataTable().row('.selected').data();
		$("#kodeakunL").val(dtrec[1]);
		$("#namaakunL").val(dtrec[2]);
	});
	$('#list_pembayaran').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_rekapan').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$(document).ready(function(){
		$("#caridokter").keyup(function(){
			ListLaporanPembayaran();
		});
	});
	$("#btn_refreshP").click(function(){
		ListLaporanPembayaran();
	});
	function ListLaporanPembayaran(){
    $('#list_pembayaran').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPembayaran/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeP1').val(), 
					tgl_akhir:$('#tglperiodeP2').val(),
					caridokter:$('#caridokter').val()
					},
			error: function(){  // error handling
				$(".list_pembayaran-error").html("");
				$("#list_pembayaran").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_pembayaran_processing").css("display","none");
							
			}
		}
	});		
	}
	$("#list_pembayaran").click(function(){
		dtrec = $("#list_pembayaran").DataTable().row('.selected').data();
		ListRincianTindakanDokter();
	});
	 
	function ListRincianTindakanDokter(){
    $('#list_rincian').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataRincian/", // json datasource
			type: "post",  // method  , by default get
			data:{	no_jasmed:dtrec[1]},
			error: function(){  // error handling
				$(".list_rincian-error").html("");
				$("#list_rincian").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_rincian_processing").css("display","none");
							
			}
		}
	});		
	}
	$("#btn_refreshR").click(function(){
		ListRekapan();
	});
	function ListRekapan(){
    $('#list_rekapan').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:true, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataRekapan/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeR1').val(), 
					tgl_akhir:$('#tglperiodeR2').val(),
					pelaksanaan:$('#combo_pelaksanaR option:selected').text(),
					perawatan:$('#combo_perawatanR option:selected').text(),
					penjamin:$('#combo_penjaminR option:selected').text()
					},
			error: function(){  // error handling
				$(".list_rekapan-error").html("");
				$("#list_rekapan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_rekapan_processing").css("display","none");
							
			}
		}
	});		
	}
});	



</script>








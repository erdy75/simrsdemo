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
		Bayar Hutang & COD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">AKUTANSI</a></li>
        <li class="active">Bayar Hutang & COD</li>
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
							<div class="nav-tabs-custom" id="tab_bayar_hutang">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Pembayaran</a></li>
									<li><a href="#tab_2" data-toggle="tab">Laporan Pembayaran/Pelunasan</a></li>
									<li><a href="#tab_3" data-toggle="tab">Rekap Hutang Supplier</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-7">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Periode J.Tempo</label>
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
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Supplier</label>
															<div class="col-lg-7" >
																<select class="col-sm-2 form-control"  name="combo_supplierP" id="combo_supplierP" style="width: 100%;"	>
																	<option value=" " selected="selected">-</option>
																	<?php foreach ($dt_supplier as $supplier) { ?>	
																		<option value="<?php echo $supplier["nama"]; ?>"><?php echo $supplier["nama"]; ?></option>
																	<?php } ?>							
																</select>																		
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Tampilkan</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_tampilkan" id="combo_tampilkan" style="width: 100%;"	>
																	<option value="semua" selected="selected">Semua</option>
																	<option value="lunas">Sudah Lunas</option>
																	<option value="">Belum Lunas</option>
																</select>																		
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:22%;" id="btn_refreshP" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
														</div>																		
													</div>
													<div class="form-group">
														<div class="row">
															*) Dianggap Hutang bila barang sudah diterima (ada LBP) dan Jatuh Tempo diambil berdasarkan LPB Gudang.
														</div>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="font-size:20px;width:45%;" class="col-sm-2 control-label">Jumlah SP/PO Final :</label>
															<label for="inputEmail3" style="font-size:20px;width:30%;" name="lembar" id="lembar" class="col-sm-2 control-label">- Lembar</label>
														</div>
														<div class="row">
															<label for="inputEmail3" style="font-size:20px;width:45%;" class="col-sm-2 control-label">Total Jatuh Tempo :</label>
															<label for="inputEmail3" style="font-size:20px;width:25%;" name="rupiah" id="rupiah" class="col-sm-2 control-label">Rp 0,00</label>
														</div>
														<div class="row">
															*) Termasuk PPN dan Discount tidak termasuk bea Materai.
														</div>
													</div>
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="font-size:15px;width:45%;" class="col-sm-2 control-label">Materai :</label>
															<label for="inputEmail3" style="font-size:15px;width:25%;" name="materai" id="materai" class="col-sm-2 control-label">Rp 0,00</label>
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
																			<th>No LPB</th>
																			<th>No SP Final</th>
																			<th>Supplier</th>	
																			<th>Tgl Fakt Supp</th>
																			<th>No Fakt Supp</th>
																			<th>PPN %</th>																	
																			<th>J.Tempo</th>
																			<th>Total(Rp)</th>	
																			<th>Stock</th>
																			<th>Materai</th>
																			<th>User</th>
																			<th>Lunas</th>
																		</tr>
																	</thead>
																</table>												
															</div>	
														</div>
													</div>
												</div>
												
												<div class="col-sm-7">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<label for="inputEmail3" style="width:35%;" class="col-sm-2 control-label">LPB yang dilunasi dari Supplier</label>
																<div class="col-lg-5" >
																	<input type="text" name="lpb" id="lpb"  class="form-control" disabled=false>
																</div>
															</div>
															<div class="row">
																<div class="col-lg-2" >
																	<input type="hidden" name="nolpb" id="nolpb"  class="form-control" disabled=false>
																</div>
																<div class="col-lg-2" >
																	<input type="hidden" name="nospfinal" id="nospfinal"  class="form-control" disabled=false>
																</div>
															</div>
															<div class="row">
																<label for="inputEmail3" style="width:35%;font-size:25px;" class="col-sm-2 control-label">Total	:</label>																
																<label for="inputEmail3" style="width:35%;font-size:25px;" name="rp" id="rp" class="col-sm-2 control-label">Rp 0,00</label>															
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<label for="inputEmail3"  style="width:22%;" class="col-sm-2 control-label">Faktur Pajak</label>
																<div class="col-lg-5" >
																	<input type="text" name="fakturpajak" id="fakturpajak"  class="form-control" >
																</div>
															</div>
															<div class="row">	
																<label for="inputEmail3"  style="width:22%;" class="col-sm-2 control-label">Kode Akun Bayar</label>
																<div class="col-lg-2" >
																	<input type="text"  class="form-control" name="kodeakun" id="kodeakun" disabled=false>
																</div>															
																<div class="col-lg-5" >
																	<input type="text" style="margin-left:-6%;" class="form-control" name="namaakun" id="namaakun" disabled=false>
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
															<div class="row">
																<label for="inputEmail3"  style="width:22%;" class="col-sm-2 control-label">Pembayaran</label>
																<div class="col-lg-3" >
																	<select class="col-sm-2 form-control"  name="combo_pembayaranP" id="combo_pembayaranP" style="width: 100%;"	>
																		<option selected="selected">-</option>
																		<option>Cash</option>
																		<option>Cheque</option>
																		<option>Bilyet Giro</option>
																		<option>Transfer Bank</option>																		
																	</select>																		
																</div>
																<div class="col-lg-4" >
																	<input type="text" style="margin-left:-8%;" class="form-control" name="pembayaranP" id="pembayaranP" >
																</div>	
															</div>
															<div class="row">
																<label for="inputEmail3" style="width:22%;" class="col-sm-2 control-label">Untuk Pembayaran</label>
																<div class="col-lg-5" >
																	<input type="text" name="untukpembayaranP" id="untukpembayaranP"  class="form-control" >
																</div>
															</div>
															<div class="row">
																<label for="inputEmail3"  style="width:22%;" class="col-sm-2 control-label">Materai</label>
																<div class="col-lg-3" >
																	<select class="col-sm-2 form-control"  name="combo_materai" id="combo_materai" style="width: 100%;"	>
																		<option selected="selected">0</option>
																		<option>3000</option>
																		<option>6000</option>																	
																	</select>																		
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="row">
																<button type="button" style="margin-left:24%;" id="btn_bayarP" class="btn btn-danger" disabled=false><i class="fa fa-money"></i>	Bayar</button>	
																<button type="button" style="margin-left:1%;" id="btn_batalP" class="btn btn-danger"><i class="fa fa-reply"></i>	Batal</button>	
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-5">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_detail" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Nama Barang</th>
																			<th>Harga</th>
																			<th>Qty</th>		
																			<th>Disc</th>																	
																			<th>SubTotal</th>
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
												<div class="col-sm-7">
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
															<label for="inputEmail3" class="col-sm-2 control-label">Supplier</label>
															<div class="col-lg-7" >
																<select class="col-sm-2 form-control"  name="combo_supplierL" id="combo_supplierL" style="width: 100%;"	>
																	<option value="" selected="selected">-</option>
																	<?php foreach ($dt_supplier as $supplier) { ?>	
																		<option value="<?php echo $supplier["nama"]; ?>"><?php echo $supplier["nama"]; ?></option>
																	<?php } ?>							
																</select>																		
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_refreshL" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_cetakinvoice" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	Cetak Invoice</button>													
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
																			<th>Kode Bayar</th>
																			<th>Supplier</th>
																			<th>Tanggal Bayar</th>
																			<th>Pembayaran</th>	
																			<th>Untuk</th>	
																			<th>Kode Akun</th>
																			<th>Materai</th>
																			<th>Faktur Pajak</th>
																			<th>Nilai(Rp)</th>	
																			<th>User</th>	
																		</tr>
																	</thead>
																</table>												
															</div>	
														</div>
														<div class="form-group">
															<div class="row">
																<label for="inputEmail3" style="width:10%;font-size:25px;" class="col-sm-2 control-label">Total	:</label>																
																<label for="inputEmail3" style="width:25%;font-size:25px;" name="totallaporanrp" id="totallaporanrp" class="col-sm-2 control-label">Rp 0,00</label>															
															</div>
														</div>
														<div class="form-group">
															<div class="row">															
																<button type="button" style="margin-left:1%;" id="btn_batalkanpembayaran" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Batalkan Pembayaran/Pelunasan</button>
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
												<div class="col-sm-9">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="width:13%;" class="col-sm-2 control-label">Jatuh Tempo</label>
															<div class="col-lg-3" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeR1" id="tglperiodeR1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
															<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
															<div class="col-lg-3" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tglperiodeR2" id="tglperiodeR2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
																<button type="button" style="margin-left:1%;" id="btn_refreshR" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>	
														</div>												
													</div>
													
												</div>
												<div class="col-sm-4">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_rekap1" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Supplier</th>
																			<th>Hutang (Rp)</th>
																		</tr>
																	</thead>
																</table>												
															</div>	
														</div>
														
													</div>
												</div>
												<div class="col-sm-8">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_rekap2" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No LPB</th>
																			<th>No SP Final</th>
																			<th>Supplier</th>	
																			<th>Tgl Fakt Supp</th>
																			<th>PPN %</th>																	
																			<th>J.Tempo</th>
																			<th>Total(Rp)</th>	
																			<th>Stock</th>
																			<th>Materai</th>
																			<th>User</th>
																			<th>Lunas</th>
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
															<label for="inputEmail3" style="width:30%;font-size:25px;" class="col-sm-2 control-label">Total	Hutang:</label>																
															<label for="inputEmail3" style="width:35%;font-size:25px;" name="totalrekapanrp" id="totalrekapanrp" class="col-sm-2 control-label">Rp 0,00</label>															
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
	
	$("#combo_supplierP").select2();
	$("#combo_supplierL").select2();
	
	$('#list_pembayaran').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_detail').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_laporan').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_rekap1').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	
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
		$("#kodeakun").val(dtrec[1]);
		$("#namaakun").val(dtrec[2]);
	});
	function Refresh(){
		$("#lpb").val("");
		$("#nolpb").val("");
		$("#nospfinal").val("");
		$("#rp").text("Rp 0,00");
		ListPembayaran();
		ListDetailPembayaran();
	}
	function Clear(){
		$("#tglperiodeP1").val("");
		$("#tglperiodeP2").val("");
		$("#fakturpajak").val("");
		$("#combo_pembayaranP").val("-");
		$("#kodeakun").val("");
		$("#namaakun").val("");
		$("#pembayaranP").val("");
		$("#untukpembayaranP").val("");
		$("#combo_materai").val("0");
		$("#btn_bayarP").prop("disabled", true);
	}
	$("#btn_batalP").click(function(){
		Refresh();				
		Clear();
	});
	$("#combo_supplierP").change(function(){
		Refresh();
	});
	$("#combo_tampilkan").change(function(){
		Refresh();
	});
	$("#btn_refreshP").click(function(){
		Refresh();
	});
	function ListPembayaran(){
    $('#list_pembayaran').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPembayaran/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeP1').val(), 
					tgl_akhir:$('#tglperiodeP2').val(),
					supp:$('#combo_supplierP').val(),
					tampil:$('#combo_tampilkan').val()
					},
			error: function(){  // error handling
				$(".list_pembayaran-error").html("");
				$("#list_pembayaran").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_pembayaran_processing").css("display","none");
			}
			,dataSrc : function(json) {var dt1 = json.jatuhtempo; $("#rupiah").text('Rp '+dt1);
										var dt2 = json.totalmaterai; $("#materai").text('Rp '+dt2);
										var dt3 = json.recordsFiltered; $("#lembar").text(dt3+' Lembar'); return json.data;}
		}
	});		
	}
	$("#list_pembayaran").click(function(){
		dtrec = $("#list_pembayaran").DataTable().row('.selected').data();
		$("#lpb").val(dtrec[3]);
		$("#nolpb").val(dtrec[1]);
		$("#nospfinal").val(dtrec[2]);
		$("#rp").text('Rp '+dtrec[8]);
		$("#btn_bayarP").prop("disabled",false);
		ListDetailPembayaran();
		
	});
	function ListDetailPembayaran(){
    $('#list_detail').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataDetailPembayaran/", // json datasource
			type: "post",  // method  , by default get
			data:{	nofak:$("#nolpb").val()},
			error: function(){  // error handling
				$(".list_detail-error").html("");
				$("#list_detail").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_detail_processing").css("display","none");
							
			}
		}
	});		
	}
	$("#btn_bayarP").click(function(){
		if($("#fakturpajak").val() == ""){
			alert("Masukan Faktur Pajak!");
		}else if($("#kodeakun").val() == ""){
			alert("Masukan Kode Akun!");
		}else if($("#combo_pembayaranP option:selected").text() == "-"){
			alert("Pilih Jenis Pembayaran!");
		}else{
			$.ajax({  datatype: "json",data:{
					nolpb :$('#nolpb').val(),
					nospfinal :$('#nospfinal').val(),
					supplier :$('#lpb').val(),
					fakturpajak :$('#fakturpajak').val(),
					kodeakun :$('#kodeakun').val(),
					bayar :$('#combo_pembayaranP option:selected').text(),
					remark :$('#pembayaranP').val(),
					untuk :$('#untukpembayaranP').val(),
					materai :$('#combo_materai option:selected').text()},
				url: "../Bayar/",
				async: false, type:'POST',success: function(data){alert("Faktur telah berhasil dilunasi, Refresh untuk melihat perubahan");
				var dt=JSON.parse(data);
				Refresh();				
				Clear();
				}, 
				error: function(){alert('Error Nih !!! ');}		
			});
		}
	});
	$("#combo_supplierL").change(function(){
		ListLaporanPembayaran();
	});
	$("#btn_refreshL").click(function(){
		ListLaporanPembayaran();
	});
	function ListLaporanPembayaran(){
    $('#list_laporan').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataLaporanPembayaran/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeL1').val(), 
					tgl_akhir:$('#tglperiodeL2').val(),
					supp:$('#combo_supplierL').val()
					},
			error: function(){  // error handling
				$(".list_laporan-error").html("");
				$("#list_laporan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_laporan_processing").css("display","none");
			}
			,dataSrc : function(json) {var dt = json.TotalLaporan; $("#totallaporanrp").text('Rp '+dt);return json.data;}
		}
	});		
	}
	$("#list_laporan").click(function(){
		dtrec = $("#list_laporan").DataTable().row('.selected').data();
		$("#btn_batalkanpembayaran").prop("disabled", false);
	});
	$("#btn_batalkanpembayaran").click(function(){				
		if (confirm("Apakah anda yakin akan membatalkan Pembayaran dari "+dtrec[2]+", kode bayar: "+dtrec[1]+" ?") == true) {	
			
				$.ajax({  datatype: "json",data:{no_faktur: dtrec[11],kode_bayar: dtrec[1]},
					url: "../BatalPembayaran/",
					async: false, type:'POST',success: function(data){alert("Pembayaran dengan kode bayar "+dtrec[1]+", telah berhasil dibatalkan");		
					ListLaporanPembayaran();
					var dt=JSON.parse(data);},
					error: function(){alert('Error Nih !!!');}
				});	
			
		}
	});
	$("#btn_refreshR").click(function(){
		ListRekapan();
	});
	function ListRekapan(){
    $('#list_rekap1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataRekapan/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeR1').val(), 
					tgl_akhir:$('#tglperiodeR2').val()
					},
			error: function(){  // error handling
				$(".list_rekap1-error").html("");
				$("#list_rekap1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_rekap1_processing").css("display","none");
			}
			,dataSrc : function(json) {var dt = json.TotalHutang; $("#totalrekapanrp").text('Rp '+dt);return json.data;}
		}
	});		
	}
	
	$("#list_rekap1").click(function(){
		dtrec = $("#list_rekap1").DataTable().row('.selected').data();
		ListDetailRekapan();
	});
	function ListDetailRekapan(){
    $('#list_rekap2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataDetailRekapan/", // json datasource
			type: "post",  // method  , by default get
			data:{	nama:dtrec[1]},
			error: function(){  // error handling
				$(".list_rekap2-error").html("");
				$("#list_rekap2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_rekap2_processing").css("display","none");
			}
		}
	});		
	}
	
});	



</script>








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
		Form History Transaksi Obat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FARMASI</a></li>
        <li class="active">History Transaksi Obat</li>
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
						<div class="nav-tabs-custom" id="tab_transaksi">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">History Pengambilan Obat UBL</a></li>
								<li><a href="#tab_2" data-toggle="tab">History Pembelian Obat Lunas</a></li>
								<li><a href="#tab_3" data-toggle="tab">History Retur UBL</a></li>
								<li><a href="#tab_4" data-toggle="tab">History Retur Pembelian Lunas</a></li>
							</ul>	
							
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">											
												
												<div class="form-group">
													<div class="box-body">	
														<div class="row">
															<label for="inputEmail3" style="margin-left:2%;width:10%;" class="col-sm-2 control-label">Pencarian</label>
															<div class="row">	
																<div class="col-lg-2" >
																	<select class="col-sm-2 form-control" style="" name="combo_pencarian" id="combo_pencarian" style="width:100%;">
																		<option value="cib" selected="selected">No RM</option>
																		<option value="status">Nama</option>
																		<option value="nama_barang">Nama Barang/Obat</option>
																		<option value="id_dokter">Dokter</option>
																		<option value="faktur">Penjamin</option>
																	</select>
																</div>
																<div class="col-lg-2" >
																	<input type="text" class="form-control" style="margin-left:-8%;" name="pencarian" id="pencarian" >																	
																</div>
																	<button type="button" style="margin-left:-1%;" id="btn_Cari" class="btn btn-primary"><i class="fa fa-search"></i>	Cari</button>
															</div>
														</div>	
													</div>	
												</div>																							
																						
											</div>						
																							
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<table id="list_1" class="table table-bordered table-hover display"	>
															<thead>
																<tr>
																	<th></th>
																	<th>No RM</th>
																	<th>Nama Pasien</th>
																	<th>Nama Barang</th>
																	<th>Harga</th>
																	<th>Qty</th>
																	<th>Sub Total</th>
																	<th>Dokter</th>
																	<th>Jenis Px</th>
																	<th>Penjamin</th>
																	<th>Tanggal/Jam</th>
																	<th>R.Inap/Jalan</th>
																	<th>No Piutang</th>
																	<th>Site Apotek</th>
																</tr>
															</thead>
														</table>												
													</div>								
												</div>
											</div>	
												
										</div>									
																															
									</div>
								</div>
								
								<div class="tab-pane" id="tab_2" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
												Transaksi yang ditampilkan adalah transaksi sudah Bayar di Kasir
											<div class="row">											
												
												<div class="form-group">
													<div class="box-body">	
														<div class="row">
															<label for="inputEmail3" style="margin-left:2%;width:15%;" class="col-sm-2 control-label">Cari Nama / No RM</label>
															<div class="row">	
																<div class="col-lg-2" >
																	<input type="text" class="form-control"  name="pencarian2" id="pencarian2" >																	
																</div>
																	<button type="button"  id="btn_Cari2" class="btn btn-primary"><i class="fa fa-search"></i>	Cari</button>		
															</div>
														</div>	
													</div>	
												</div>																							
																						
											</div>						
																							
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<table id="list_2" class="table table-bordered table-hover display"	>
															<thead>
																<tr>
																	<th></th>
																	<th>No RM</th>
																	<th>Nama Pasien</th>
																	<th>Dokter</th>
																	<th>Tanggal</th>
																	<th>R.Inap/Jalan</th>
																	<th>Kelompok Beli/Penjamin</th>																	
																	<th>Nama Obat</th>
																	<th>Harga</th>
																	<th>Qty</th>
																	<th>Sub Total</th>
																	<th>Ref.Reg Poli</th>
																	<th>No Kwitansi</th>
																</tr>
															</thead>
														</table>												
													</div>								
												</div>
											</div>	
												
										</div>									
																															
									</div>
								</div>
								
								<div class="tab-pane" id="tab_3" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">											
												
												<div class="form-group">
													<div class="box-body">	
														<div class="row">
															<label for="inputEmail3" style="margin-left:2%;width:15%;" class="col-sm-2 control-label">Cari Nama / No RM</label>
															<div class="row">	
																<div class="col-lg-2" >
																	<input type="text" class="form-control"  name="pencarian3" id="pencarian3" >																	
																</div>
																	<button type="button"  id="btn_Cari3" class="btn btn-primary"><i class="fa fa-search"></i>	Cari</button>
																	<button type="button" style="margin-left:1%;" id="btn_Print3" class="btn btn-danger"	disabled=false><i class="fa fa-print"></i>	Cetak Nota Retur</button>
															</div>
														</div>	
													</div>	
												</div>																							
																						
											</div>						
																							
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<table id="list_3" class="table table-bordered table-hover display"	>
															<thead>
																<tr>
																	<th></th>
																	<th>No Retur UBL</th>	
																	<th>No RM</th>
																	<th>Nama Pasien</th>
																	<th>Nama Barang</th>
																	<th>Harga Retur</th>
																	<th>Qty</th>
																	<th>Sub Total</th>
																	<th>Tanggal Retur</th>
																	<th>Apotek</th>
																	<th>User</th>																	
																	<th>Faktur Beli</th>
																</tr>
															</thead>
														</table>												
													</div>								
												</div>
											</div>	
												
										</div>									
																															
									</div>
								</div>
																							
								<div class="tab-pane" id="tab_4" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">											
												
												<div class="form-group">
													<div class="box-body">	
														<div class="row">
															<label for="inputEmail3" style="margin-left:2%;width:15%;" class="col-sm-2 control-label">Cari Nama / No RM</label>
															<div class="row">	
																<div class="col-lg-2" >
																	<input type="text" class="form-control"  name="pencarian4" id="pencarian4" >																	
																</div>
																	<button type="button"  id="btn_Cari4" class="btn btn-primary"><i class="fa fa-search"></i>	Cari</button>
																	<button type="button" style="margin-left:1%;" id="btn_Print4" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	Cetak Nota Retur</button>
															</div>
														</div>	
													</div>	
												</div>																							
																						
											</div>						
																							
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<table id="list_4" class="table table-bordered table-hover display"	>
															<thead>
																<tr>
																	<th></th>
																	<th>No Retur Lunas</th>
																	<th>No RM</th>
																	<th>Nama Pasien</th>
																	<th>Nama Barang</th>
																	<th>Harga Retur</th>
																	<th>Qty</th>
																	<th>Sub Total</th>
																	<th>Tanggal Retur</th>
																	<th>Apotek</th>
																	<th>User</th>		
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
	
	$('#list_3').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#list_4").DataTable({
		paging: true, pagelenght: false, searching: false, ordering: false, info: true, autoWidth: false, select: true,
		order: [1, 'asc'], dom: 'T<"clear">lfrtip',
		tableTools: {
			sRowSelect:		'os', sRowSelector:	'td:first-child', aButtons:		[ ]
		}		
	});
	$(document).ready(function(){
		$("#pencarian").keyup(function(){
			ListCariUBL();
		});
	});
	
	$("#btn_Cari").click(function () {
       ListCariUBL();
    });
	
	function ListCariUBL(){
    $('#list_1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10, scrollX:true,
		"ajax":{
			url :"../DataCariUBL/", // json datasource
			type: "post",  // method  , by default get
			data:{combo_cari:$('#combo_pencarian').val(),cari:$('#pencarian').val()},
			error: function(){  // error handling
				$(".list_1-error").html("");
				$("#list_1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_1_processing").css("display","none");
							
			}
		}
	});		
	}
	$(document).ready(function(){
		$("#pencarian2").keyup(function(){
			ListObatLunas();
		});
	});
	$("#btn_Cari2").click(function () {
		ListObatLunas();
    });
	function ListObatLunas(){
    $('#list_2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10, scrollX:true,
		"ajax":{
			url :"../DataObatLunas/", // json datasource
			type: "post",  // method  , by default get
			data:{carinamanorm:$('#pencarian2').val()},
			error: function(){  // error handling
				$(".list_2-error").html("");
				$("#list_2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_2_processing").css("display","none");
							
			}
		}
	});		
	}
	$(document).ready(function(){
		$("#pencarian3").keyup(function(){
			ListReturUBL();
		});
	});
	$("#btn_Cari3").click(function () {
		ListReturUBL();
    });
	function ListReturUBL(){
    $('#list_3').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10, scrollX:true,
		"ajax":{
			url :"../DataReturUBL/", // json datasource
			type: "post",  // method  , by default get
			data:{carinamanorm:$('#pencarian3').val()},
			error: function(){  // error handling
				$(".list_3-error").html("");
				$("#list_3").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_3_processing").css("display","none");
							
			}
		}
	});		
	}
	$(document).ready(function(){
		$("#pencarian4").keyup(function(){
			ListReturLunas();
		});
	});
	$("#btn_Cari4").click(function () {
		ListReturLunas();
    });
	function ListReturLunas(){
    $('#list_4').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,scrollX:false,
		"ajax":{
			url :"../DataReturLunas/", // json datasource
			type: "post",  // method  , by default get
			data:{carinamanorm:$('#pencarian4').val()},
			error: function(){  // error handling
				$(".list_4-error").html("");
				$("#list_4").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_4_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_3').click(function() { 
		dtrec = $('#list_3').DataTable().row('.selected').data();
		$("#btn_Print3").prop( "disabled", false );
    });
	$('#list_4').click(function() { 
		dtrec = $('#list_4').DataTable().row('.selected').data();
		$("#btn_Print4").prop( "disabled", false );
    });
	$("#btn_Print3").click(function () {
		print3();
    });
	$("#btn_Print4").click(function () {
		print4();
    });	
	
	function print3(){	
		var win = "../../../assets/jasper/reports/farmasi/history/ReturUBL.php?noretur="+dtrec[1]+"";
		window.open(win);	
	}		
	function print4(){		
		var win = "../../../assets/jasper/reports/farmasi/history/ReturPembelianLunas.php?noretur="+dtrec[1]+"";
		window.open(win);	
	}
		
});	




</script>








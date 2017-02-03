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
		Report Akutansi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">AKUTANSI</a></li>
        <li class="active">Report Akutansi</li>
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
							<div class="nav-tabs-custom" id="tab_report">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Rekapan LPB (Customable)</a></li>
									<li><a href="#tab_2" data-toggle="tab">Point Reward (Customable)</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
															
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Periode</label>
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
															<button type="button" style="margin-left:22%;" id="btn_refreshR" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_cetakR" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	Cetak</button>													
														</div>																								
													</div>
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_rekapanlpb" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>Tanggal</th>
																			<th>Supplier</th>
																			<th>No LPB</th>	
																			<th>Total Pembayaran(Rp)</th>
																			<th>PPN(Rp)</th>
																			<th>Total(Rp)</th>																	
																			<th>Tunai(Rp)</th>
																			<th>Kredit(Rp)</th>	
																			<th>Referensi Supplier</th>
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
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Periode</label>
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
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">1 Point = Rp</label>
															<div class="col-lg-3" >
																<input type="text" name="point" id="point"  class="form-control" value="100000">
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Cari Nama</label>
															<div class="col-lg-6" >
																<input type="text" name="carinama" id="carinama"  class="form-control" placeholder="Masukan Nama ...">
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:23%;" id="btn_refreshP" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
															<button type="button" style="margin-left:1%;" id="btn_cetakP" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	Cetak Invoice</button>													
														</div>																								
													</div>
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Ambil Point</label>
															<div class="col-lg-3" >
																<input type="text" name="ambilpoint1" id="ambilpoint1"  class="form-control" >
															</div>
															<div class="col-lg-5" >
																<input type="text" style="margin-left:-8%;" name="ambilpoint2" id="ambilpoint2"  class="form-control" >
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Tanggal</label>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tanggalP" id="tanggalP"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Point yang diambil</label>
															<div class="col-lg-4" >
																<input type="text" name="pointygdiambil" id="pointygdiambil"  class="form-control" >
															</div>
																<button type="button" style="margin-left:%;" id="btn_ambil" class="btn btn-danger" ><i class="fa fa-sign-in"></i>	Ambil</button>
														</div>
													</div>
												</div>
												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<table id="list_pointreward" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No RM</th>
																			<th>Nama Pasien</th>
																			<th>Alamat</th>
																			<th>Total Transaksi</th>	
																			<th>Point(1 Point = Rp)</th>	
																			<th>Point Sudah Diambil</th>
																			<th>Saldo Point</th>	
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
	
	$('#list_rekapanlpb').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    }); 
	
	$("#btn_refreshR").click(function(){
		ListRekapanLPB();
	});
	function ListRekapanLPB(){
    $('#list_rekapanlpb').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:true, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataRekapanLPB/", // json datasource
			type: "post",  // method  , by default get
			data:{	tgl_awal:$('#tglperiodeR1').val(), 
					tgl_akhir:$('#tglperiodeR2').val()
					},
			error: function(){  // error handling
				$(".list_rekapanlpb-error").html("");
				$("#list_rekapanlpb").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_rekapanlpb_processing").css("display","none");
			}
			//,dataSrc : function(json) {var dt = json.TotalHutang; $("#totalrekapanrp").text('Rp '+dt);return json.data;}
		}
	});		
	}
	$("#list_rekapanlpb").click(function(){
		dtrec = $("#list_rekapanlpb").DataTable().row('.selected').data();
		$("#btn_cetakR").prop("disabled", false);
	});
	
});	



</script>








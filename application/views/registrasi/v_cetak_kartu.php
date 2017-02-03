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
		Form Cetak Kartu
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">REGISTRASI</a></li>
        <li class="active">Cetak Kartu</li>
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
						<div class="nav-tabs-custom" id="tab_cetakkartu">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Cetak Kartu</a></li>
								<li><a href="#tab_2" data-toggle="tab">History Percetakan Kartu</a></li>
							</ul>	
							
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">
											
												<div class="col-sm-6">
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Cetak Kartu</h3>
																<div class="box-tools pull-right">
																	<span class="label label-primary"></span>
																</div>
														</div>														
													</div>
													
													<div class="row">	
														<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Cari Nama</label>
														<div class="col-lg-4" >
															<input type="text"  class="form-control" name="nama" id="nama" placeholder=". . . .">
														</div>
															<button type="button"  id="btn_refresh" class="btn btn-danger"><i class="fa fa-refresh"></i>	Refresh</button>		
															<button type="button" style="margin-left:1%;" id="btn_cetak" class="btn btn-primary" disabled=false><i class="fa fa-print"></i>	 Cetak</button>	
													</div>	
														
													<div class="row">	
														<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Design</label>
														<div class="col-lg-4" >
															<select class="col-sm-2 form-control"  name="combo_design" id="combo_design" style="width: 100%;"	>
																<option selected="selected">Umum</option>
															</select>																		
														</div>	
													</div>
														
													<div class="row">	
														<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Cetak Sisi</label>
														<div class="col-lg-4" >
															<select class="col-sm-2 form-control"  name="combo_cetak" id="combo_cetak" style="width: 100%;"	>
																<option selected="selected">Depan</option>
																<option>Belakang</option>
															</select>																		
														</div>																							
													</div>
													
													<div class="box-body">	
														<div class="row">
															<label for="inputEmail3" style="font-size:20px;margin-left:19%;width:45%;"  class="col-sm-2 text-red" id="labeltarif" >Billing Kartu: Rp 5000</label>
														</div>	
													</div>
												</div>
												
												<div class="col-sm-6">	
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Billing Kartu</h3>
																<div class="box-tools pull-right">
																	<span class="label label-primary"></span>
																</div>
														</div>														
													</div>													
													
													<div class="row">	
														<div class="col-lg-7" >
															<label><input type="checkbox" style="width:50px;" name="cek_billing" id="cek_billing" >Otomatis menambah Billing jika Cetak Kartu</label>
														</div>
													</div>
													<div class="row">
														<label for="inputEmail3" style="margin-left:8%;width:26%;" class="col-sm-2 control-label">Tarif Cetak Kartu: Rp </label>
														<div class="col-lg-3" >
															<input type="number"  class="form-control" name="tarif" id="tarif" value="5000" disabled=false min="1" >
														</div>
													</div>	
												</div>
												
												<div class="col-sm-12">		
													<div class="row">
														<div class="box-body">
															<div class="col-md-12">
																<table id="list_cetakkartu" class="table table-bordered table-hover display">
																	<thead>
																		<tr>
																			<th></th>
																			<th>No RM</th>
																			<th>Nama</th>	
																			<th>Alamat</th>	
																			<th>Status Px</th>											
																			<th>Umur</th>
																			<th>Jenis Kelamin</th>
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
																							
								<div class="tab-pane" id="tab_2" style="position: relative; ">
									
									<div class="box-body">					
										<div class="row">
											<div class="form-group">
												<div class="col-sm-12">
													
													<div class="row">	
														<label for="inputEmail3" style="width:8%;" class="col-sm-2 control-label">Cari Nama</label>
														<div class="col-lg-2" >
															<input type="text"  class="form-control" name="nama2" id="nama2" placeholder=". . . .">
														</div>
															<button type="button"  id="btn_refresh2" class="btn btn-danger"><i class="fa fa-refresh"></i>	Refresh</button>		
													</div>	
													
													
													<div class="row">
														<div class="form-group">
															<div class="box-body">														
																<div class="col-md-12">
																	<table id="list_history" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																				<th></th>
																				<th>ID Pasien</th>
																				<th>Nama Pasien</th>	
																				<th>Tanggal Jam Cetak</th>											
																				<th>Design Kartu</th>
																				<th>Sisi Cetak</th>											
																				<th>User Cetak</th>
																				<th>Host</th>
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
	
	$('#list_cetakkartu').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_history').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#cek_billing").click(function(){
		if($("#cek_billing").prop("checked")){
			$("#tarif").prop("disabled", false);
		}else{
			$("#tarif").prop("disabled", true);
		}
	});
	
	DataCetakKartu();
	$(document).ready(function(){
		$("#nama").keyup(function(){
			DataCetakKartu();
		});
	});
	$("#btn_refresh").click(function(){
		DataCetakKartu();
	});
	function DataCetakKartu(){
    $('#list_cetakkartu').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataCetakKartu/", // json datasource
			type: "post",  // method  , by default get
			data:{ cari_nama:$('#nama').val() },
			error: function(){  // error handling
				$(".list_cetakkartu-error").html("");
				$("#list_cetakkartu").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_cetakkartu_processing").css("display","none");
							
			}
		}
	});		
	}
	
	$(document).ready(function(){
		$("#nama2").keyup(function(){
			DataHistory();
		});
	});
	$("#btn_refresh2").click(function(){
		DataHistory();
	});
	function DataHistory(){
    $('#list_history').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataHistory/", // json datasource
			type: "post",  // method  , by default get
			data:{ cari_nama:$('#nama2').val() },
			error: function(){  // error handling
				$(".list_history-error").html("");
				$("#list_history").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_history_processing").css("display","none");
							
			}
		}
	});		
	}
	
	$(document).ready(function(){
		$("#tarif").keyup(function(){
			var data=$("#tarif").val();
			$("#labeltarif").text('Billing Kartu: Rp '+data);
		});
	});
	
	function Simpan(){		
				$.ajax({  datatype: "json",data:{
					id : dtrec[1],
					design :$('#combo_design option:selected').text(),		
					sisicetak :$('#combo_cetak option:selected').text(),	
					tarif :$('#tarif').val(),
					nama : dtrec[2],	
					alamat : dtrec[3],	
					umur : dtrec[5],	
					jk : dtrec[6]},
				url: "../Simpan/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Billing Pasien otomatis dimasukan dalam tagihan');}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});		 			
		
	}
	
	$('#list_cetakkartu').click(function() { 
		dtrec = $('#list_cetakkartu').DataTable().row('.selected').data();		
		$("#btn_cetak").prop("disabled", false);	
		
    });
	
	$("#btn_cetak").click(function(){
		Simpan();
		PrintKartu();
		
	});
	function PrintKartu(){	
		var win = "../../../assets/jasper/reports/registrasi/cetak_kartu/CetakKartu.php?norm="+dtrec[1]+"";
		window.open(win);	
	}
	
});	



</script>








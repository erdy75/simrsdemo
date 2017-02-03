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
		Pasien Rawat Inap
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">GIZI</a></li>
        <li class="active">Pasien Rawat Inap</li>
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
							<div class="nav-tabs-custom" id="tab_pri">
							
								<div class="col-sm-6">
									<div class="box-body">
										<div class="form-group">
																
											<div class="row">	
												<label for="inputEmail3" class="col-sm-2 control-label">Pencarian</label>
												<div class="col-lg-5" >
													<input type="text"  class="form-control" name="pencarian" id="pencarian" placeholder="Masukan Nama Pasien ...">
												</div>
													<button type="button" id="btn_refresh" class="btn btn-danger"><i class="fa fa-refresh"></i>	 Refresh</button>												
											</div>
											<div class="row">	
												<label for="inputEmail3" style="" class="col-sm-2 control-label">Urutkan</label>
												<div class="col-lg-4" >
													<select class="col-sm-2 form-control"  name="combo_urutkan" id="combo_urutkan" style="width: 100%;"	>
														<option value="a.nomor_bed" selected="selected">Nomor Bed</option>
														<option value="b.nama">Nama Pasien</option>
														<option value="a.tgl_check_in">Tanggal</option>
													</select>																		
												</div>
											</div>
										
										</div>
										
									</div>																						
								</div>
								<div class="col-sm-12">
									<div class="box-body">
										<div class="form-group">
											<table id="list_pri" class="table table-bordered table-hover display">
												<thead>
													<tr>
														<th></th>
														<th>Reg Inap</th>
														<th>Nomor Bed</th>
														<th>No RM</th>	
														<th>Nama</th>
														<th>Alamat</th>																	
														<th>Waktu CheckIn</th>											
														<th>Hari Ke (Perkiraan)</th>
														<th>Remark</th>																	
														<th>Jenis</th>											
														<th>Penjamin</th>
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
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->				
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="tab_pri2">
								
								<div class="col-sm-6">
									<div class="box-body">
										<div class="form-group">
											
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-2%;width:17%;" class="col-sm-2 control-label">Pasien</label>
												<div class="col-lg-4" >
													<input type="text"  class="form-control" name="norm" id="norm" disabled=false>
												</div>
												<div class="col-lg-6" >
													<input type="text" style="margin-left:-7%;" class="form-control" name="alamat" id="alamat" disabled=false>
												</div>												
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-2%;width:17%;" class="col-sm-2 control-label"></label>
												<div class="col-lg-4" >
													<input type="text" class="form-control" name="jk" id="jk" disabled=false>
												</div>		
												<div class="col-lg-2" >
													<input type="text" style="margin-left:-26%;" class="form-control" name="umur" id="umur" disabled=false>
												</div>													
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-2%;width:17%;" class="col-sm-2 control-label">No Bed</label>
												<div class="col-lg-4" >
													<input type="text" class="form-control" name="nobed" id="nobed" disabled=false>
												</div>	
												<label for="inputEmail3" style="margin-left:-3%;width:17%;" class="col-sm-2 control-label">No Rec RM</label>
												<div class="col-lg-4" >
													<input type="text" style="margin-left:-2%;" class="form-control" name="norecrm" id="norecrm" disabled=false>
												</div>
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-2%;width:17%;" class="col-sm-2 control-label">Diet Pasien</label>
												<div class="col-xs-1" >
													<textarea rows="4" cols="63" name="dietpasien" id="dietpasien" disabled=false></textarea>
												</div>
											</div>
															
										</div>	
									</div>																						
								</div>
								
								<div class="col-md-12">
									<div class="box-body">
										<div class="form-group">
											<table id="list_pri2" class="table table-bordered table-hover display">
												<thead>
													<tr>
														<th></th>
														<th>No UPF</th>
														<th>Tanggal / Jam</th>
														<th>Diag Utama</th>	
														<th>Dokter</th>
														<th>Kamar/Poli</th>																	
														<th>Perawatan</th>											
														<th>Diet</th>
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
	
	$('#list_pri').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	ListPRI();
	$(document).ready(function(){
		$("#pencarian").keyup(function(){
			ListPRI();
		});
	});
	$("#combo_urutkan").change(function(){
		ListPRI();
	});
	$("#btn_refresh").click(function(){
		ListPRI();
	});	
	function ListPRI(){
    $('#list_pri').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPRI/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama:$('#pencarian').val(),order:$('#combo_urutkan').val() },
			error: function(){  // error handling
				$(".list_pri-error").html("");
				$("#list_pri").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_pri_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_pri').click(function() { 
		dtrec = $('#list_pri').DataTable().row('.selected').data();		
		$("#norm").val(dtrec[3]);
		$("#alamat").val(dtrec[5]);
		$("#jk").val(dtrec[11]);
		$("#umur").val(dtrec[12]);
		$("#nobed").val(dtrec[2]);
		$("#norecrm").val(dtrec[13]);
		ListPRI2();
	});
	function ListPRI2(){
    $('#list_pri2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPRI2/", // json datasource
			type: "post",  // method  , by default get
			data:{ norm:dtrec[3] },
			error: function(){  // error handling
				$(".list_pri2-error").html("");
				$("#list_pri2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_pri2_processing").css("display","none");
							
			}
		}
	});		
	}
	
});	



</script>








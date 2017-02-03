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
		Set Fee Dokter
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FISIOTERAPI</a></li>
        <li class="active">Set Fee Dokter</li>
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
							<div class="nav-tabs-custom" id="tab_setfeedokter">
								<div class="col-sm-5">
									<div class="form-group">
										<div class="row">
											<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Cari Nama Dokter</label>
											<div class="col-lg-6" >
												<input type="text" style="margin-left:%;" class="form-control" name="caridokter" id="caridokter" placeholder="Masukan Nama ...">
											</div>
												<button type="button" style="margin-left:%;" id="btn_search" class="btn btn-primary" ><i class="fa fa-search"></i>	Search</button>	
										</div>		
									</div>
									<div class="form-group">
										<div class="row">
											*) Klik untuk load fee Dokter
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="box-body">
												<table id="list_sfd1" class="table table-bordered table-hover display">
													<thead>
														<tr>
														<th></th>
														<th>ID</th>
														<th>Nama</th>
														<th>Poli / Unit</th>																	
														<th>Fee yang di Setup</th>		
														</tr>
													</thead>
												</table>												
											</div>									
										</div>
									</div>
								</div>
								<div class="col-sm-7">
									<div class="form-group">
										<div class="row">
											<label for="inputEmail3"  class="col-sm-2 control-label">Dokter</label>
											<div class="col-lg-5" >
												<input type="text" style="margin-left:%;" class="form-control" name="namadoker" id="namadoker" value="Nama Dokter" disabled=false>
											</div>
											<div class="col-lg-3" >
												<input type="hidden" style="margin-left:%;" class="form-control" name="iddokter" id="iddokter"  disabled=false>
											</div>
										</div>		
									</div>
									<div class="form-group">
										<div class="row">
											*) Setup Fee berlaku ke depan.
										</div>
										<div class="row">
											*) Untuk Laboratorium dan Radiologi Tarif yang berlaku adalah tarif yang berasal dari Modul Bersangkutan.
										</div>
										<div class="row">
											*) Apabila terdapat Item Laboratorium dan Radiologi yang belum ada, Gunakan Fitur Sync di Modul Set Harga
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<label for="inputEmail3" style="width:35%;" class="col-sm-2 control-label">Pilih Poli/Unit</label>
												<div class="col-lg-7" >
													<select  class="form-control" name="combo_poli" id="combo_poli" style="margin-width:100%;" disabled=false>
														<option value="" selected="selected">Semua Poli</option>
														<?php foreach ($dt_poli as $poli) { ?>	
															<option value="<?php echo $poli["nama"]; ?>"><?php echo $poli["nama"]; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>	
											<div class="row">
												<label for="inputEmail3" style="width:35%;" class="col-sm-2 control-label">Cari Tindakan</label>
												<div class="col-lg-7" >
													<input type="text" style="margin-left:%;" class="form-control" name="caritindakan" id="caritindakan" disabled=false>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">															
												<button type="button" style="margin-left:39%;" id="btn_cari" class="btn btn-primary" disabled=false><i class="fa fa-search"></i>	Cari</button>	
											</div>																								
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="row">
												<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Ubah Fee</label>
												<div class="col-lg-8" >
													<select  class="form-control" name="combo_ubahfee" id="combo_ubahfee" style="margin-width:100%;" disabled=false>
														<option selected="selected">Item yang dipilih saja</option>
														
													</select>
												</div>
											</div>	
											<div class="row">
												<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Set Fee</label>
												<div class="col-lg-6" >
													<select  class="form-control" name="combo_setfee" id="combo_setfee" style="margin-width:100%;" disabled=false>
														<option selected="selected">Pelaksana</option>
														<option>Refferal</option>
													</select>
												</div>
											</div>
											<div class="row">
												<label for="inputEmail3" style="width:30%;" class="col-sm-2 control-label">Nilai Fee</label>
												<div class="col-lg-6" >
													<input type="number" style="margin-left:%;" class="form-control" name="nilaifee" id="nilaifee" min=1 disabled=false>
												</div>
											</div>											
										</div>
										<div class="form-group">
											<div class="row">											
												<button type="button" style="margin-left:35%;" id="btn_set" class="btn btn-danger" disabled=false ><i class="fa fa-sign-in"></i>	Set</button>
												<button type="button" style="margin-left:1%;" id="btn_batal" class="btn btn-danger" disabled=false><i class="fa fa-reply"></i>	Batal</button>	
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												*) Jika nilai dibawah 100 dianggap persen % (persen)
											</div>
											<div class="row">
												*) Jika nilai diatas 100 dianggap Rp (Rupiah)
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="box-body">
												<table id="list_sfd2" class="table table-bordered table-hover display">
													<thead>
														<tr>
														<th></th>
														<th>Poli/Unit</th>
														<th>Nama Tindakan</th>
														<th>Tarif (Rp)</th>																	
														<th>Pelaksana [%/Rp]</th>															
														<th>Refferal [%/Rp]</th>	
														<th>Last Update</th>
														<th>User</th>																	
														<th>ID Tindakan</th>		
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
	
	$('#list_sfd1').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_sfd2').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#combo_poli").select2();	
	
	$("#btn_search").click(function(){
		ListFeeDokter();
	});
	$(document).ready(function(){
		$("#caridokter").keyup(function(){
			ListFeeDokter();
		});
	});
	function ListFeeDokter(){
    $('#list_sfd1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataFeeDokter/", // json datasource
			type: "post",  // method  , by default get
			data:{	caridokter:$('#caridokter').val()},
			error: function(){  // error handling
				$(".list_sfd1-error").html("");
				$("#list_sfd1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_sfd1_processing").css("display","none");
							
			}
		}
	});	
	}
	
	$("#list_sfd1").click(function(){
		dtrec = $("#list_sfd1").DataTable().row('.selected').data();
		
		ListFeeDokter2();
		$("#namadoker").val(dtrec[2]);
		$("#iddokter").val(dtrec[1]);
		$("#combo_poli").prop("disabled", false);
		$("#caritindakan").prop("disabled", false);
		$("#btn_cari").prop("disabled", false);
		$("#btn_batal").prop("disabled", false);
		$("#combo_setfee").prop("disabled", true);
		$("#nilaifee").prop("disabled", true);
		$("#btn_set").prop("disabled", true);
	});
	$("#btn_cari").click(function(){
		ListFeeDokter2();
	});
	$("#combo_poli").change(function(){
		ListFeeDokter2();
	});
	$(document).ready(function(){
		$("#caritindakan").keyup(function(){
			ListFeeDokter2();
		});
	});
	function ListFeeDokter2(){
    $('#list_sfd2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataFeeDokter2/", // json datasource
			type: "post",  // method  , by default get
			data:{	iddokter:$('#iddokter').val(),poli:$('#combo_poli').val(),caritindakan:$('#caritindakan').val()},
			error: function(){  // error handling
				$(".list_sfd2-error").html("");
				$("#list_sfd2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_sfd2_processing").css("display","none");
							
			}
		}
	});	
	}
	$("#list_sfd2").click(function(){
		dtrec = $("#list_sfd2").DataTable().row('.selected').data();
				
		$("#combo_setfee").prop("disabled", false);
		$("#nilaifee").prop("disabled", false);
		$("#btn_set").prop("disabled", false);
	});
	$("#btn_set").click(function(){
		if ($("#iddokter").val() == "" ){
			alert("Klik Dokter yang akan diset nilai fee");
		}else if ($("#nilaifee").val() == "" ){
			alert("Mohon masukan nilai fee");
		}else{
			$.ajax({  datatype: "json",data:{
						setfee :$('#combo_setfee option:selected').text(),
						iddokter :$('#iddokter').val(),
						idtindakan :dtrec[8],		
						nilai :$('#nilaifee').val()	
						},
					url: "../SetFee/",
					async: false, type:'POST',success: function(data){alert("Set data fee Dokter telah berhasil disimpan.");
					var dt=JSON.parse(data);	
					ListFeeDokter();
					ListFeeDokter2();
					}, 
					error: function(){alert('Error Nih !!! ');}		
				});
		}
	});
	$("#btn_batal").click(function(){
		$("#caridokter").val("");
		$("#iddokter").val("");
		$("#combo_poli").val("Semua Poli");
		$("#caritindakan").val("");
		$("#combo_setfee").val("Pelaksana");
		$("#nilaifee").val("");
		$("#combo_poli").prop("disabled", true);
		$("#caritindakan").prop("disabled", true);
		$("#btn_cari").prop("disabled", true);
		$("#combo_setfee").prop("disabled", true);
		$("#nilaifee").prop("disabled", true);
		$("#btn_set").prop("disabled", true);
		ListFeeDokter();
		ListFeeDokter2('no');
	});
	
});	



</script>
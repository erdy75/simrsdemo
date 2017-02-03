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
		RM Fisioterapi
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FISIOTERAPI</a></li>
        <li class="active">RM Fisioterapi</li>
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
							<div class="nav-tabs-custom" id="tab_rm_fisioterapi">
							
								<div class="col-sm-6">
									<div class="box-body">
										<div class="form-group">
															
											<div class="row">	
												<label for="inputEmail3" style="" class="col-sm-2 control-label">Periode</label>
												<div class="col-lg-4" >
													<div class="input-group" >
														<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
														<input type="text" style="width:100%;" name="tglperiode1" id="tglperiode1"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
													</div> 
												</div>
												<label for="inputEmail3" style="margin-left:-3%;width:2%;" class="col-sm-2 control-label">s/d</label>
												<div class="col-lg-4" >
													<div class="input-group" >
														<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
														<input type="text" style="width:100%;" name="tglperiode2" id="tglperiode2"   class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
													</div> 
												</div>
											</div>	
																	
											<div class="row">	
												<label for="inputEmail3" style="" class="col-sm-2 control-label">Pencarian</label>
												<div class="col-lg-5" >
													<input type="text" style="width:97%;" class="form-control" name="normnama" id="normnama" placeholder="Masukan No RM / Nama">
												</div>
											</div>
										
										</div>
										<div class="form-group">
											<div class="row">															
												<button type="button" style="margin-left:19%;" id="btn_refresh" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>												
											</div>
															
										</div>	
									</div>																						
								</div>
								<div class="col-sm-12">
									<div class="box-body">
										<div class="form-group">
											<div class="row">
												<div class="box-body">
													<div class="col-md-12">
														<table id="list_fisioterapi" class="table table-bordered table-hover display">
															<thead>
																<tr>
																	<th></th>
																	<th>No Reg</th>
																	<th>Nama Pasien</th>
																	<th>No RM</th>	
																	<th>Tanggal Periksa</th>
																	<th>Jam Periksa</th>																	
																	<th>Nama Dokter</th>											
																	<th>Poli</th>
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
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->				
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="tab_rm_fisioterapi">
							
								<div class="col-sm-3">
									<div class="box-body">
										<div class="form-group">
											
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:35%;" class="col-sm-2 control-label">No Reg</label>
												<div class="col-lg-8" >
													<input type="text" style="" class="form-control" name="noreg" id="noreg" disabled=false>
												</div>												
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:35%;" class="col-sm-2 control-label">Nama</label>
												<div class="col-lg-8" >
													<input type="text" style="" class="form-control" name="norm" id="norm" disabled=false>
												</div>												
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:35%;" class="col-sm-2 control-label">Sex / Umur</label>
												<div class="col-lg-8" >
													<input type="text" style="" class="form-control" name="jk" id="jk" disabled=false>
												</div>												
											</div>
															
										</div>	
									</div>																						
								</div>
								
								<div class="col-sm-6">
									<div class="box-body">
										<div class="form-group">
											
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-8%;width:24%;" class="col-sm-2 control-label">Tanggal</label>
												<div class="col-lg-5" >
													<div class="input-group" >
														<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
														<input type="text" style="width:74%;" name="tanggal" id="tanggal" disabled=false class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" tgl-mask>
													</div> 
												</div>	
												<label for="inputEmail3" style="margin-left:-11%;width:14%;" class="col-sm-2 control-label">Jam</label>
												<div class="col-lg-4" >
													<div class="input-group" >
														<div  class="input-group-addon"> <i class="fa fa-clock-o"></i></div>
														<input type="text" style="width:74%;" name="jam" id="jam" disabled=false class="form-control" >
													</div> 
												</div>		
											</div>
											<div class="row">	
												<div class="col-lg-7" >
													<input type="text" style="margin-left:-16%;" class="form-control" name="nama" id="nama" disabled=false>
												</div>	
												<div class="col-lg-5" >
													<input type="text" style="margin-left:-32%;" class="form-control" name="alamat" id="alamat" disabled=false>
												</div>
											</div>
											<div class="row">	
												<div class="col-lg-2" >
													<input type="text" style="margin-left:-73%;" class="form-control" name="umur" id="umur" disabled=false>
												</div>		
													<label for="inputEmail3" style="margin-left:-12%;" class="col-sm-2 control-label">Tahun</label>
											</div>
															
										</div>	
									</div>																						
								</div>
								
								<div class="col-sm-5">
									<div class="box-body">
										<div class="form-group">
										
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-3%;width:27%;" class="col-sm-2 control-label">Jenis Terapi</label>
												<div class="col-lg-8" >
													<select class="col-sm-2 form-control"  name="combo_jenisterapi" id="combo_jenisterapi" style="width: 100%;"	>
														<option selected="selected">Exercise Therapy</option>
														<option>Healting Therapy</option>
														<option>Chest Physiotherapy</option>
														<option>Orthopedhic & Rheumathoid Arthritis</option>
														<option>Electrical Stimulations Therapy</option>
														<option>Hydro Therapy</option>
														<option>Cold Therapy</option>
													</select>																		
												</div>									
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-3%;width:27%;" class="col-sm-2 control-label">Nama Terapi</label>
												<div class="col-lg-8" >
													<input type="text" style="margin-left:%;" class="form-control" name="namaterapi" id="namaterapi"  >
												</div>											
											</div>
											
										</div>
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="box-body">
										<div class="form-group">
										
											<div class="row">	
												<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Mulai</label>
												<div class="col-lg-4" >
													<div class="input-group" >
														<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
														<input type="text" style="width:100%;" name="tglmulai" id="tglmulai"  class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" tgl-mask>
													</div> 
												</div>																									
												<div class="col-lg-4" >
													<div class="input-group">
														<div class="input-group-addon"> <i class="fa fa-clock-o"></i></div>
														<input type="text"  name="jammulai" id="jammulai" class="form-control" placeholder="hh:ii:ss">
													</div>
												</div>
											</div>
											<div class="row">	
												<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Selesai</label>
												<div class="col-lg-4" >
													<div class="input-group" >
														<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
														<input type="text" style="width:100%;" name="tglselesai" id="tglselesai"   class="form-control" data-inputmask="'alias': 'yyyy/mm/dd'" tgl-mask>
													</div> 
												</div>													
												<div class="col-lg-4" >
													<div class="input-group">
														<div class="input-group-addon"> <i class="fa fa-clock-o"></i></div>
														<input type="text"  name="jamselesai" id="jamselesai" class="form-control" placeholder="hh:ii:ss">																
													</div>
												</div>
												
											</div>
											
											
										</div>
									</div>
								</div>
								
								<div class="col-sm-11">
									<div class="box-body">
										<div class="form-group">										
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">R.Jalan/Inap</label>
												<div class="col-lg-2" >
													<select class="col-sm-2 form-control"  name="combo_rjalaninap" id="combo_rjalaninap" style="width: 100%;"	>
														<?php foreach ($dt_perawatan as $perawatan) { ?>	
															<option value="<?php echo $perawatan["nama"]; ?>"><?php echo $perawatan["nama"]; ?></option>
														<?php } ?>
													</select>																		
												</div>									
											</div>											
										
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Dokter</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control"  name="combo_dokter" id="combo_dokter" style="width: 120%;"	>
														<option selected="selected">-</option>
														<?php foreach ($dt_namadokter as $namadokter) { ?>	
															<option value="<?php echo $namadokter["dokter"]; ?>"><?php echo $namadokter["dokter"]; ?></option>
														<?php } ?>																
													</select>																	
												</div>	
												<label for="inputEmail3" style="margin-left:8%;width:6%;" class="col-sm-2 control-label">Perawat</label>
												<div class="col-lg-3" >
													<select class="col-sm-2 form-control"  name="combo_perawat" id="combo_perawat" style="width: 101%;"	>
														<option selected="selected">-</option>
														<?php foreach ($dt_namaperawat as $namaperawat) { ?>	
															<option value="<?php echo $namaperawat["nama"]; ?>"><?php echo $namaperawat["nama"]; ?></option>
														<?php } ?>	
													</select>																		
												</div>
											</div>
										</div>
										<div class="form-group">										
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Diagnosa</label>
												<div class="col-lg-2" >
													<input type="text" style="margin-left:-1%;" class="form-control" name="diagnosa1" id="diagnosa1" disabled=false>
												</div>
												<div class="col-lg-6" >
													<input type="text" style="margin-left:-5%;" class="form-control" name="diagnosa2" id="diagnosa2" disabled=false>
												</div>
													<button type="button" data-toggle="modal" data-target="#ModalIcd" style="width:13%;" style="margin-left:-3%;" id="btn_search" class="btn btn-primary"><i class="fa fa-search"></i>	 Search</button>												
													<div class="modal fade" id="ModalIcd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
														<div class="modal-dialog" style="width:900px">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">Kepala Unit</h4>
																</div>
																<div class="modal-body">
																	<table id="list_icd" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																				<th></th>
																				<th>ICD</th>
																				<th>Description ENG</th>
																				<th>Description INA</th>
																				<th>DTD</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php foreach ($dt_icd as $icd) { ?>
																			<tr>
																				<td></td>
																				<td><?php echo $icd['ICD']; ?></td>
																				<td><?php echo $icd['Deskripsi']; ?></td>
																				<td><?php echo $icd['Deskripsi_ina']; ?></td>
																				<td><?php echo $icd['DTD']; ?></td>
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
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Vital Sign</label>
												<label for="inputEmail3" style="margin-left:%;width:13%;" class="col-sm-2 control-label">Sistole/Diatole</label>
												<div class="col-lg-1" >
													<input type="number" style="width:120%;" class="form-control" name="sistolediatole" id="sistolediatole"  min=1 max=300 >
												</div>
												<label for="inputEmail3" style="margin-left:3%;width:5%;" class="col-sm-2 control-label">Suhu</label>
												<div class="col-lg-1" >
													<input type="number" style="width:120%;" class="form-control" name="suhu" id="suhu"  min=-20 max=100>
												</div>												
												<label for="inputEmail3" style="margin-left:-1%;width:8%;" class="col-sm-2 control-label">Celcius</label>
												
												<label for="inputEmail3" style="width:11%;" class="col-sm-2 control-label">Berat Badan</label>
												<div class="col-lg-1" >
													<input type="number" style="width:120%;" class="form-control" name="bb" id="bb"  min=1 max=200>
												</div>
												<label for="inputEmail3" style="margin-left:-1%;" class="col-sm-2 control-label">Kilogram</label>
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:11%;width:13%;" class="col-sm-2 control-label">Respiratory Rate</label>
												<div class="col-lg-1" >
													<input type="number" style="width:120%;" class="form-control" name="respiratoryrate" id="respiratoryrate"  min=1 max=300>
												</div>
												<label for="inputEmail3" style="margin-left:3%;width:5%;" class="col-sm-2 control-label">Nadi</label>
												<div class="col-lg-1" >
													<input type="number" style="width:120%;" class="form-control" name="nadi" id="nadi"  min=1 max=300>
												</div>
												<label for="inputEmail3" style="margin-left:7%;width:11%;" class="col-sm-2 control-label">Tinggi Badan</label>
												<div class="col-lg-1" >
													<input type="number" style="width:120%;" class="form-control" name="tb" id="tb"  min=1 max=200>
												</div>
												<label for="inputEmail3" style="margin-left:-1%;" class="col-sm-2 control-label">Centimeter</label>
											</div>	
										</div>
										<div class="form-group">										
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Anamnesa</label>
												<div class="col-xs-1" >
													<textarea rows="4" cols="99" name="anamnesa" id="anamnesa"  ></textarea>
												</div>	
											</div>
										</div>
										<div class="form-group">
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Pemeriksaan Fisik</label>
												<div class="col-xs-1" >
													<textarea rows="4" cols="99" name="pemeriksaanfisik" id="pemeriksaanfisik"  ></textarea>
												</div>	
											</div>
										</div>
										<div class="form-group">
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Keadaan Umum</label>
												<div class="col-lg-5" >
													<input type="text" style="margin-left:%;" class="form-control" name="keadaanumum" id="keadaanumum"  >
												</div>
												<label for="inputEmail3" style="margin-left:-2%;width:8%;" class="col-sm-2 control-label">Kesadaraan</label>
												<div class="col-lg-2" >
													<select class="col-sm-2 form-control"  name="combo_kesadaran" id="combo_kesadaran" style="width: 105%;"	>
														<?php foreach ($dt_kesadaran as $kesadaran) { ?>	
															<option value="<?php echo $kesadaran["nama"]; ?>"><?php echo $kesadaran["nama"]; ?></option>
														<?php } ?>	
													</select>																		
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-1%;width:12%;" class="col-sm-2 control-label">Remark</label>
												<div class="col-xs-1" >
													<textarea rows="4" cols="99" name="remark" id="remark"  ></textarea>
												</div>	
											</div>
										</div>
										<div class="form-group">
											<div class="row">	
												<button type="button" style="margin-left:49%;" id="btn_selesai" class="btn btn-primary"><i class="fa fa-share"></i>	 Selesai</button>												
												<button type="button" style="margin-left:1%;" id="btn_simpan" class="btn btn-danger" disabled=false><i class="fa fa-save"></i>	 Simpan</button>												
												<button type="button" style="margin-left:1%;" id="btn_hapus" class="btn btn-danger" disabled=false><i class="fa fa-recycle"></i>	 Hapus</button>												
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
	
	$(".timepicker").timepicker({
        showInputs: false
    });
		
	$("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
	$("[tgl-mask]").inputmask();
	
	$('#list_fisioterapi').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_icd').DataTable({
		paging: true, lengthChange:true , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_icd').click(function() {   
		dtrec = $('#list_icd').DataTable().row('.selected').data();
		$("#diagnosa1").val(dtrec[1]);
		$("#diagnosa2").val(dtrec[2]);
	}); 
	$(document).ready(function(){
		$("#normnama").keyup(function(){
			DataFisioterapi();
		});
	});
	$("#btn_refresh").click(function(){
		DataFisioterapi();
	});	
	function DataFisioterapi(){
    $('#list_fisioterapi').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering: false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataFisioterapi/", // json datasource
			type: "post",  // method  , by default get
			data:{ norm_nama:$('#normnama').val(),tgl_awal:$('#tglperiode1').val(),tgl_akhir:$('#tglperiode2').val() },
			error: function(){  // error handling
				$(".list_fisioterapi-error").html("");
				$("#list_fisioterapi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_fisioterapi_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_fisioterapi').click(function() { 
		dtrec = $('#list_fisioterapi').DataTable().row('.selected').data();		
		$("#noreg").val(dtrec[1]);
		$("#tanggal").val(dtrec[4]);
		$("#jam").val(dtrec[5]);
		$("#norm").val(dtrec[3]);
		$("#nama").val(dtrec[2]);		
		$("#alamat").val(dtrec[8]);
		$("#jk").val(dtrec[10]);
		$("#umur").val(dtrec[11]);		
		$("#combo_jenisterapi").val(dtrec[13]);		
		$("#namaterapi").val(dtrec[25]);
		$("#tglmulai").val(dtrec[14]);
		$("#tglselesai").val(dtrec[15]);
		$("#jammulai").val(dtrec[16]);
		$("#jamselesai").val(dtrec[17]);
		$("#combo_rjalaninap").val(dtrec[8]);
		$("#combo_dokter option:selected").text(dtrec[6]);	
		$("#combo_perawat").val(dtrec[12]);		
		$("#diagnosa1").val(dtrec[18]);
		$("#diagnosa2").val(dtrec[19]);	
		
		$("#sistolediatole").val(dtrec[26]);
		$("#suhu").val(dtrec[27]);
		$("#bb").val(dtrec[28]);
		$("#tb").val(dtrec[29]);
		$("#nadi").val(dtrec[30]);
		$("#respiratoryrate").val(dtrec[31]);
		
		$("#anamnesa").val(dtrec[20]);
		$("#pemeriksaanfisik").val(dtrec[21]);
		$("#keadaanumum").val(dtrec[22]);
		$("#combo_kesadaran option:selected").text(dtrec[23]);
		$("#remark").val(dtrec[24]);
		
		$("#btn_simpan").prop("disabled", false);
		$("#btn_hapus").prop("disabled", false);
	});
	$("#btn_selesai").click(function(){
		Clear();
	});
	function Clear(){
		$("#noreg").val("");
		$("#tanggal").val("");
		$("#jam").val("");
		$("#norm").val("");
		$("#nama").val("");		
		$("#alamat").val("");
		$("#jk").val("");
		$("#umur").val("");		
		$("#combo_jenisterapi").val("Exercise Therapy");		
		$("#namaterapi").val("");
		$("#tglmulai").val("");
		$("#tglselesai").val("");
		$("#jammulai").val("00:00:00");
		$("#jamselesai").val("00:00:00");
		$("#combo_rjalaninap").val("Rawat Jalan");
		$("#combo_dokter option:selected").text("-");	
		$("#combo_perawat").val("-");		
		$("#diagnosa1").val("");
		$("#diagnosa2").val("");	
		
		$("#sistolediatole").val("");
		$("#suhu").val("");
		$("#bb").val("");
		$("#tb").val("");
		$("#nadi").val("");
		$("#respiratoryrate").val("");
		
		$("#anamnesa").val("");
		$("#pemeriksaanfisik").val("");
		$("#keadaanumum").val("");
		$("#combo_kesadaran").val("Compos Mentis");
		$("#remark").val("");
		
		$("#btn_simpan").prop("disabled", true);
		$("#btn_hapus").prop("disabled", true);
	}
	$("#btn_simpan").click(function(){
		$.ajax({  datatype: "json",data:{
					noupf: $('#noreg').val(),
					namadokter:$('#combo_dokter option:selected').text(),
					poli: dtrec[7],
					kodeicdutama: $('#diagnosa1').val(),
					sistole: $('#sistolediatole').val(),
					suhu: $('#suhu').val(),
					bb: $('#bb').val(),
					tb: $('#tb').val(),
					nadi: $('#nadi').val(),
					respiratory: $('#respiratoryrate').val(),
					anamnesa: $('#anamnesa').val(),
					pemeriksaanfisik: $('#pemeriksaanfisik').val(),
					keadaan: $('#keadaanumum').val(),
					kesadaran: $('#combo_kesadaran option:selected').text(),
					remark: $('#remark').val(),
					
					jenisterapi: $('#combo_jenisterapi option:selected').text(),
					namaterapi: $('#namaterapi').val(),
					tglmulai: $('#tglmulai').val(),
					tglselesai: $('#tglselesai').val(),
					jammulai: $('#jammulai').val(),
					jamselesai: $('#jamselesai').val(),
					perawat: $('#combo_perawat option:selected').text()},
			url: "../Update/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Data Sudah Disimpan' );
			DataFisioterapi();}
			}, error: function(){alert('Error Nih !!!');}
		});	
	});
	$("#btn_hapus").click(function(){
		if (confirm("Anda Yakin akan Menghapus Rekam Medis Fisioterapi "+dtrec[1]+", "+dtrec[3]+" / "+dtrec[2]+", yakin melanjutkan ?") == true) {
			
		$.ajax({  datatype: "json",data:{noupf: dtrec[1]},
			url: "../Hapus/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert("Rekam Medis Fisioterapi No Reg "+dtrec[1]+" dari Pasien "+dtrec[2]+" telah berhasil dihapus, sedangkan tagihan dan kunjungan Registrasi tidak ikut dihapus." );
			Clear();
			DataFisioterapi();}
			}, error: function(){alert('Error Nih !!!');}
		});			
		
		} 
	});
	
});	



</script>








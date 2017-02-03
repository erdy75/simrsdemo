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
		Form Registrasi Paket
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">REGISTRASI</a></li>
        <li class="active">Reg Paket</li>
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
							
							
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">
											
												<div class="col-sm-10">
													<div class="form-group">
														
														<div class="row">
															<label for="inputEmail3" style="width:7%;" class="col-sm-2 control-label">No RM</label>
															<div class="col-lg-3" >
																<input type="text" class="form-control" name="norm" id="norm" placeholder=" .  .  .  .">
															</div>
														
																<button type="button" style="margin-left:5px;" id="btn_ok" class="btn btn-danger"><i class="fa fa-refresh"></i>	OK</button>		
																<button type="button" id="btn_search" class="btn btn-primary"><i class="fa fa-search"></i>	 Search</button>	
																
														</div>	
													</div>
													<div class="form-group">		
														<div class="row">	
															<label for="inputEmail3" style="width:7%;" class="col-sm-2 control-label">Pasien</label>
															<div class="col-lg-3" >
																<input type="text" class="form-control" name="nama" id="nama" disabled=false >																
															</div>
															<div class="col-lg-2" >
																<input type="text" style="margin-left:-15%;" class="form-control" name="jk" id="jk" disabled=false >																
															</div>	
															<div class="col-lg-2" >
																<input type="text" style="margin-left:-30%;" class="form-control" name="umur" id="umur" disabled=false >																
															</div>	
																<label for="inputEmail3" style="margin-left:-5%;" class="col-sm-2 control-label">Tahun (Bulan)</label>		
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:7%;" class="col-sm-2 control-label">Alamat</label>
															<div class="col-xs-1" >
																<textarea style="margin-left:px;" rows="3" cols="53" name="alamat" id="alamat" disabled=false ></textarea>
															</div>
																								
														</div>
													</div>
													
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Pilih Paket</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_paket" id="combo_paket" style="width: 100%;"  >
																	<option selected="selected">-</option>
																	<?php foreach ($dt_nama_paket as $dt_namapaket) { ?>
																		<option ><?php echo $dt_namapaket['nama']; ?></option>
																	<?php } ?>
																</select>
															</div>	
															<label for="inputEmail3" style="width:8%;" class="col-sm-2 control-label">Tarif	Rp</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" name="tarif" id="tarif" value="0" disabled=false >																
															</div>
														</div>													
														
														<div class="row">	
															<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Dokter Pengirim</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:-42px;width:25px;" name="cek_drpengirim" id="cek_drpengirim"  >
															</div>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_drpengirim" id="combo_drpengirim" style="margin-left:-38%;width: 135%;" disabled="false">
																	<option selected="selected">APS</option>
																	<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
																		<option ><?php echo $dt_namadokter['nama']; ?></option>
																	<?php } ?>
																</select>
															</div>									
														</div>
													</div>
													
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Auto Reg Poli (1)</label>
															<div class="col-lg-3" >
																<input type="text" class="form-control" name="poli1" id="poli1" disabled=false >
															</div>
															
															<label for="inputEmail3" style="width:26%;" class="col-sm-2 control-label">Pemeriksaan / Konsul oleh Dokter (1)</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_pemerisaan1" id="combo_pemerisaan1" style="width: 100%;" disabled=false>
																	<option selected="selected">-</option>
																	<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
																		<option ><?php echo $dt_namadokter['nama']; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
															
														<div class="row">	
															<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Auto Reg Poli (2)</label>
															<div class="col-lg-3" >
																<input type="text" class="form-control" name="poli2" id="poli2" disabled=false >
															</div>	
															
															<label for="inputEmail3" style="width:26%;" class="col-sm-2 control-label">Pemeriksaan / Konsul oleh Dokter (2)</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_pemerisaan2" id="combo_pemerisaan2" style="width: 100%;" disabled=false>
																	<option selected="selected">-</option>
																	<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
																		<option ><?php echo $dt_namadokter['nama']; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>															
													</div>
													
												</div>	
												
											</div>
														
											<div class="form-group">
												<div class="row">
													<div class="col-md-12">
														<table id="list_regPaket" class="table table-bordered table-hover display"	>
															<thead>
																<tr>
																	<th></th>
																	<th>Tindakan/Pemeriksaan</th>
																	<th>Tarif(Rp)</th>
																	<th>Jenis</th>
																	<th>Poli/Penunjang</th>
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
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">	
				
				</div><!-- /.box-header -->
				
				
					<div class="box-body">
						<div class="form-group">							
							
							<div class="row">
								<label for="inputEmail3" style="width:15%;" class="col-sm-2 control-label">Dokter Pelaksana</label>
								<div class="col-lg-3" >
									<select class="col-sm-2 form-control"  name="combo_drpelaksana" id="combo_drpelaksana" style="width:100%;" >
									<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
										<option ><?php echo $dt_namadokter['nama']; ?></option>
									<?php } ?>	
									</select>
								</div>							
							</div>
							
						</div>		
							
						<div class="form-group">
							<div class="row">
								
									<button type="button" style="margin-left:16%" id="btn_setdokter" class="btn btn-primary"><i class="fa fa-sign-in"></i>	 Set Dokter</button>	
									<button type="button" style="margin-left:5px;" id="btn_register" class="btn btn-danger" disabled=false><i class="fa fa-mail-forward"></i>	Register</button>
									<button type="button" style="margin-left:5px;" id="btn_batal" class="btn btn-danger" disabled=false><i class="fa fa-mail-reply"></i>	Batal</button>		
								
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
	
	$("#cek_drpengirim").click(function(){
		 if ($( "#cek_drpengirim" ).prop( "checked"))	{
			 alert("Hindari nama dokter ganda, pastikan dokter memang tidak terdaftar dalam list");
			 $( "#combo_drpengirim" ).prop( "disabled", false );	
		}else{
			$( "#combo_drpengirim" ).prop( "disabled", true );	
		}			
	});
		
	function active(){
		$( "#combo_jenispx" ).prop( "disabled", false );
		$( "#cek_penjamin" ).prop( "disabled", false );
		$( "#suratjaminan" ).prop( "disabled", false );		
		$( "#perkiraanmenginap" ).prop( "disabled", false );
		$( "#Pjawabpasien" ).prop( "disabled", false );
		$( "#alamatPjawab" ).prop( "disabled", false );			
		$( "#telpPjawab" ).prop( "disabled", false );
		$( "#pekerjaan" ).prop( "disabled", false );
		$( "#hubungan" ).prop( "disabled", false );	
		$( "#combo_pasien" ).prop( "disabled", false );
		$( "#cek_dokterpengirim" ).prop( "disabled", false );
		$( "#cek_dokterPjawab" ).prop( "disabled", false );			
		$( "#combo_remarkapotek" ).prop( "disabled", false );		
	}
	$("#btn_batal").click(function(){
		clear();
	});
	function clear(){
		$( "#combo_jenispx" ).prop( "disabled", true );
		$( "#cek_penjamin" ).prop( "disabled", true );
		$( "#combo_penjamin" ).prop( "disabled", true );
		$( "#suratjaminan" ).prop( "disabled", true );		
		$( "#perkiraanmenginap" ).prop( "disabled", true );
		$( "#Pjawabpasien" ).prop( "disabled", true );
		$( "#alamatPjawab" ).prop( "disabled", true );			
		$( "#telpPjawab" ).prop( "disabled", true );
		$( "#pekerjaan" ).prop( "disabled", true );
		$( "#hubungan" ).prop( "disabled", true );	
		$( "#combo_pasien" ).prop( "disabled", true );
		$( "#cek_dokterpengirim" ).prop( "disabled", true );
		$( "#combo_dokterpengirim" ).prop( "disabled", true );
		$( "#cek_dokterPjawab" ).prop( "disabled", true );
		$( "#combo_dokterPjawab" ).prop( "disabled", true );
		$( "#combo_remarkapotek" ).prop( "disabled", true );
		$( "#combo_bedkosong" ).prop( "disabled", true );	
		$( "#norm" ).val( "" );		
		$( "#nama" ).val( "" );
		$( "#alamat" ).val( "" );
		$( "#combo_jenispx" ).val( "UMUM" );
		$( "#combo_penjamin" ).val( "-" );	
		$( "#suratjaminan" ).val( "" );
		$( "#perkiraanmenginap" ).val( "" );
		$( "#Pjawabpasien" ).val( "" );
		$( "#alamatPjawab" ).val( "" );
		$( "#telpPjawab" ).val( "" );	
		$( "#pekerjaan" ).val( "" );
		$( "#hubungan" ).val( "" );
		$( "#combo_pasien" ).val( "==PILIH==" );	
		$( "#combo_dokterpengirim" ).val( "==PILIH==" );	
		$( "#combo_dokterPjawab" ).val( "==PILIH==" );	
		$( "#combo_remarkapotek" ).val( "==PILIH==" );		
		$( "#combo_bedkosong" ).val( "==PILIH==" );	
		$( "#kelas" ).val( "" );
		$( "#kamar" ).val( "" );
		$( "#combo_bedkosong" ).val( "" );			
	}
	
	
	$("#btn_ok").click(function(){
		$.ajax({  datatype: "json",data:{n_rm:$('#norm').val()},
			url: "../carinorm/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ $('#nama').val(dt[0].nama);$('#jk').val(dt[0].sex);$('#umur').val(dt[0].umur);$('#alamat').val(dt[0].alamat);
			active();
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});
	
	$("#combo_paket").change(function () {
		dataPaket();
		iniListPaket();
		if($("#poli1").val() == ""){
			$( "#combo_pemerisaan1" ).prop( "disabled", true );
		}else if ($("#poli1").val() !== "-" ){
			$( "#combo_pemerisaan1" ).prop( "disabled", false );	
		}else{
			$( "#combo_pemerisaan1" ).prop( "disabled", true );	
		}
		
		if($("#poli2").val() == ""){
			$( "#combo_pemerisaan2" ).prop( "disabled", true );
		}else if ($("#poli2").val() !== "-" ){
			$( "#combo_pemerisaan2" ).prop( "disabled", false );	
		}else{
			$( "#combo_pemerisaan2" ).prop( "disabled", true );	
		}
		
		
    });
	function dataPaket(){
		$.ajax({  datatype: "json",data:{nama:$('#combo_paket option:selected').text()},
			url: "../caripaket/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ $('#poli1').val(dt[0].poli1);$('#poli2').val(dt[0].poli2);$('#tarif').val(dt[0].tarif);
			active();
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	function iniListPaket(){
    $('#list_regPaket').DataTable( {
		"destroy": true,"processing": true, "serverSide": true,
		"ajax":{
			url :"../list_paket/", // json datasource
			type: "post",  // method  , by default get
			data:{nama:$('#combo_paket option:selected').text()},
			error: function(){  // error handling
				$(".list_regPaket-error").html("");
				$("#list_regPaket").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_regPaket_processing").css("display","none");
							
			}
		}
	});		
	}
	$("#btn_daftar").click(function() { 
		 if ($("#norm").val() == "",$("#suratjaminan").val() == "",$("#perkiraanmenginap").val() == "",$("#Pjawabpasien").val() == "",$("#alamatPjawab").val() == "",
			$("#telpPjawab").val() == "",$("#pekerjaan").val() == "",$("#hubungan").val() == "",$("#combo_pasien option:selected").text() == "==PILIH==",
			$("#combo_dokterpengirim option:selected").text() == "==PILIH==",$("#combo_dokterPjawab option:selected").text() == "==PILIH==",$("#combo_remarkapotek option:selected").text() == "==PILIH=="){
			alert("Data Belum Lengkap");
		}else if ($("#kelas").val() == "",$("#kamar").val() == ""){
			alert("Masukan Data Kamar");
		}else {
				Simpan();
			 			
		}					  
	});
	function Simpan(){
		$.ajax({  datatype: "json",data:{
					norm :$('#norm').val(),	
					kelas :$('#kelas').val(),	
					kamar :$('#kamar').val(),	
					bedkosong :$('#combo_bedkosong option:selected').text(),
					perkiraanmenginap : $('#perkiraanmenginap').val(),
					dokterPjawab :$('#combo_dokterPjawab option:selected').text(),
					jenis :$('#combo_jenispx option:selected').text(),				
					penjamin :$('#combo_penjamin option:selected').text(),
					remarkapotek :$('#combo_remarkapotek option:selected').text(),				
					tarif :dtrec[3],			
					poli :$('#combo_pasien option:selected').text(),												
					Pjawabpasien :$('#Pjawabpasien').val(),														
					alamatPjawab :$('#alamatPjawab').val(),												
					telpPjawab :$('#telpPjawab').val(),												
					pekerjaan :$('#pekerjaan').val(),												
					hub :$('#hubungan').val(),						
					suratjaminan :$('#suratjaminan').val(),	
					dokterpengirim :$('#combo_dokterpengirim option:selected').text(),											
					remark :$('#remark').val()},
				url: "../simpan/",
				async: false, type:'POST',success: function(data){var dt=JSON.parse(data);
				alert('Registrasi Rawat Inap telah sukses.');
				UpdateStatusKamar();
				iniDataKamar();
				clear();}, 					   
				error: function(){alert('Error Nih !!! ');}		
				});
	}
	
	$('#list_kamar').DataTable({
		paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_kamar').click(function() { 
		dtrec = $('#list_kamar').DataTable().row('.selected').data();
		$("#kamar").val(dtrec[1]);
		$("#kelas").val(dtrec[4]);		
		//Bed();
		if($( "#norm" ).val() == ""){
			$( "#combo_bedkosong").prop( "disabled", true );
		}else{
			$( "#combo_bedkosong").prop( "disabled", false );
		}
		
    });
	function UpdateStatusKamar(){
		$.ajax({  datatype: "json",
				data:{combo_bed :$('#combo_bedkosong option:selected').text() },
			url: "../UpdateStatusKamar/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	
	
	
});	



</script>








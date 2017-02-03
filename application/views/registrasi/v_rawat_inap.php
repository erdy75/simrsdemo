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
		Form Registrasi Rawat Inap
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">REGISTRASI</a></li>
        <li class="active">Reg Rawat Inap</li>
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
											
												<div class="col-sm-6">
													<div class="form-group">
														
														<div class="row">
															<label for="inputEmail3" style="width:75px;" class="col-sm-2 control-label">No RM</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="norm" id="norm" placeholder=" .  .  .  .">
															</div>
														
																<button type="button" style="margin-left:5px;" id="btn_ok" class="btn btn-danger"><i class="fa fa-refresh"></i>	OK</button>		
																<button type="button" id="btn_search" class="btn btn-primary"><i class="fa fa-search"></i>	 Search</button>	
																
														</div>	
																
														<div class="row">	
															<label for="inputEmail3" style="width:75px;" class="col-sm-2 control-label">Nama</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="nama" id="nama" disabled=false >
															</div>
																								
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:75px;" class="col-sm-2 control-label">Alamat</label>
															<div class="col-xs-1" >
																<textarea style="margin-left:px;" rows="4" cols="45" name="alamat" id="alamat" disabled=false ></textarea>
															</div>
																								
														</div>
													</div>
													
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Jenis</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_jenispx" id="combo_jenispx" style="width: 100%;" disabled=false >
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_jp as $jp) { ?>	
																		<option value="<?php echo $jp["nama"]; ?>"><?php echo $jp["nama"]; ?></option>
																	<?php } ?>
																</select>
															</div>									
														</div>
														
														
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Penjamin</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:-40px;width:25px;" name="cek_penjamin" id="cek_penjamin" disabled=false >
															</div>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_penjamin" id="combo_penjamin" style="margin-left:-51px;width: 100%;" disabled="false">
																	<option selected="selected">-</option>
																	<option>ASURANSI (NOT REGISTERED)</option>
																	<option>RS WILLIAM BOOTH</option>
																</select>
															</div>									
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Surat Jaminan</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="suratjaminan" id="suratjaminan" disabled=false >
															</div>				
														</div>
															
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Perkiraan Menginap</label>
															<div class="col-lg-2" >
																<input type="number" class="form-control" name="perkiraanmenginap" id="perkiraanmenginap" min=1 disabled=false >
															</div>	
																<label for="inputEmail3" style="width:5px;" class="col-sm-2 control-label">Hari</label>								
														</div>
															
													</div>
													
													<div class="form-group">	
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">P.Jawab Pasien</label>
															<div class="col-lg-7" >
																<input type="text" class="form-control" name="Pjawabpasien" id="Pjawabpasien" disabled=false  >
															</div>				
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Alamat P.Jawab</label>
															<div class="col-xs-1" >
																<textarea rows="3" cols="46" name="alamatPjawab" id="alamatPjawab" disabled=false ></textarea>
															</div>				
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Telp P.Jawab</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="telpPjawab" id="telpPjawab" disabled=false >
															</div>	
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Pekerjaan</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="pekerjaan" id="pekerjaan" disabled=false>
															</div>	
														</div>
														
														<div class="row">	
															<label for="inputEmail3" style="width:155px;" class="col-sm-2 control-label">Hubungan</label>
															<div class="col-lg-7" >
																<input type="text" class="form-control" name="hubungan	" id="hubungan" disabled=false>
															</div>				
														</div>
														
													</div>
													
												</div>
												
												<div class="col-sm-6">
																										
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:160px;" class="col-sm-2 control-label">Pasien dari Unit/Poli</label>
															<div class="col-lg-4" >
																<select class="col-sm-2 form-control"  name="combo_pasien" id="combo_pasien" style="width:120%;" disabled=false >
																	<option selected="selected" >==PILIH==</option>
																	<?php foreach ($dt_poli as $poli) { ?>	
																		<option value="<?php echo $poli["nama"]; ?>"><?php echo $poli["nama"]; ?></option>
																	<?php } ?>
																</select>
															</div>
																							
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:160px;" class="col-sm-2 control-label">Dokter Pengirim</label>														
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_dokterpengirim" id="combo_dokterpengirim" style="width:120%;" disabled=false>																	
																<option selected="selected">==PILIH==</option>
																<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
																		<option ><?php echo $dt_namadokter['nama']; ?></option>
																	<?php } ?>																
																</select>
															</div>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:160px;" class="col-sm-2 control-label">Dokter P.Jawab</label>														
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_dokterPjawab" id="combo_dokterPjawab" style="width:120%;" disabled=false>																	
																	<option selected="selected">==PILIH==</option>
																	<?php foreach ($dt_nama_dokter as $dt_namadokter) { ?>
																		<option ><?php echo $dt_namadokter['nama']; ?></option>
																	<?php } ?>																
																</select>	
															</div>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:160;" class="col-sm-2 control-label">Remark Apotek</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_remarkapotek" id="combo_remarkapotek" style="width: 120%;" disabled=false >
																	<option selected="selected">==PILIH==</option>
																	<option>OTS</option>
																	<option>ORS</option>
																</select>
															</div>																							
														</div>
													</div>
													
												</div>
											
											</div>
											
											<div class="box">
												<div class="box-header with-border">
													<h3 class="box-title">List Data Kamar Pasien</h3>
												</div><!-- /.box-header -->												
												<div class="form-group">
													<div class="row">
														<div class="col-md-12">
															<table id="list_kamar" class="table table-bordered table-hover display"	>
																<thead>
																	<tr>
																	<th></th>
																	<th>Kamar</th>
																	<th>Bed Kosong</th>
																	<th>Tarif</th>
																	<th>Kelas</th>
																	<th>Fasilitas</th>
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
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">	
				
				</div><!-- /.box-header -->
				
				
					<div class="box-body">
						<div class="form-group">							
							
							<div class="row">
								<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Daftarkan di Kelas / Kamar - Bed</label>
								<div class="col-lg-2" >
									<input type="text" style="margin-left:px;" class="form-control" name="kelas" id="kelas" disabled="false" disabled=false >
								</div>
								<div class="col-lg-2" >
									<input type="text" style="margin-left:-10%;" class="form-control" name="kamar" id="kamar" disabled="false" disabled=false >
								</div>
								<div class="col-lg-2" id="tampilcombo_bedkosong">
									<select class="col-sm-2 form-control"  name="combo_bedkosong" id="combo_bedkosong" style="margin-left:-20%;width:100%;" disabled="false">
										<option selected="selected">==PILIH==</option>
									</select>
								</div>							
							</div>
							
						</div>							
						<div class="form-group">
							<div class="row">
								<button type="button" style="margin-left:21%" id="btn_daftar" class="btn btn-danger"><i class="fa fa-save"></i>	 Daftar & Cek In</button>	
								<button type="button" style="margin-left:5px;" id="btn_batal" class="btn btn-danger"><i class="fa fa-mail-reply"></i>	Batal</button>		
							</div>
						</div>
						
						<div class="box-body">
							<div class="form-group">
								<div class="row">
									*) Pilih Kamar dengan mengklik daftar dibawah ini.
								</div>
								<div class="row">
									*) Perhatian: Apabila ada kesalahan Cek In, proses pembatalan hanya boleh dilakukan oleh bagian R.Inap.
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
	
	$("#cek_penjamin").click(function(){
		 if ($( "#cek_penjamin" ).prop( "checked"))	{
			 alert("Perhatian! Perubahan yang Anda lakukan hanya berdampak pada pemberian tarif kamar, agar Penjamin dapat berlaku secara global, Penjamin harus dirubah melalui Master Pasien");
			$( "#combo_penjamin" ).prop( "disabled", false );	
		}else{
			$( "#combo_penjamin" ).prop( "disabled", true );	
		}			
	});
	
	function ComboBedKosong(){
		$.ajax({  
			data:{kamar:$("#kamar").val()}, 
			url: "../get_bedkosong/",
			async: false, type:'POST',
			success: function(data){ 
			$("#tampilcombo_bedkosong").html(data);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	
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
		$( "#combo_dokterpengirim" ).prop( "disabled", false );
		$( "#combo_dokterPjawab" ).prop( "disabled", false );			
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
		iniDataKamar();
	}
	$("#combo_penjamin").change(function(){
		if (this.value =='ASURANSI (NOT REGISTERED)'){
			$( "#Pjawabpasien" ).prop( "disabled", true );
			$( "#alamatPjawab" ).prop( "disabled", true );			
			$( "#telpPjawab" ).prop( "disabled", true );
			$( "#pekerjaan" ).prop( "disabled", true );
			$( "#hubungan" ).prop( "disabled", true );	
			$( "#Pjawabpasien" ).val("ASURANSI (NOT REGISTERED)");			
			$( "#alamatPjawab" ).val("Surabaya");
			$( "#telpPjawab" ).val("-/");
			$( "#pekerjaan" ).val("-");
			$( "#hubungan" ).val("PENJAMIN PERUSAHAAN/ASURANSI");
		}else if (this.value =='RS WILLIAM BOOTH'){
			$( "#Pjawabpasien" ).prop( "disabled", true );
			$( "#alamatPjawab" ).prop( "disabled", true );			
			$( "#telpPjawab" ).prop( "disabled", true );
			$( "#pekerjaan" ).prop( "disabled", true );
			$( "#hubungan" ).prop( "disabled", true );	
			$( "#Pjawabpasien" ).val("RS WILLIAM BOOTH");			
			$( "#alamatPjawab" ).val("Surabaya");
			$( "#telpPjawab" ).val("-/");
			$( "#pekerjaan" ).val("-");
			$( "#hubungan" ).val("PENJAMIN PERUSAHAAN/ASURANSI");
		}else{
			$( "#Pjawabpasien" ).prop( "disabled", false );
			$( "#alamatPjawab" ).prop( "disabled", false );			
			$( "#telpPjawab" ).prop( "disabled", false );
			$( "#pekerjaan" ).prop( "disabled", false );
			$( "#hubungan" ).prop( "disabled", false );	
			$( "#Pjawabpasien" ).val("");			
			$( "#alamatPjawab" ).val("");
			$( "#telpPjawab" ).val("");
			$( "#pekerjaan" ).val("");
			$( "#hubungan" ).val("");
		}
	});
	
	$("#btn_ok").click(function(){
		$.ajax({  datatype: "json",data:{n_rm:$('#norm').val()},
			url: "../carinorm/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ $('#nama').val(dt[0].nama);$('#alamat').val(dt[0].alamat);
			active();
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});
	
	$("#btn_daftar").click(function() { 
		 if ($("#norm").val() == "" || $("#combo_jenispx option:selected").text() == "==PILIH==" || $("#suratjaminan").val() == "" || $("#perkiraanmenginap").val() == "" || $("#Pjawabpasien").val() == "" || 
			$("#alamatPjawab").val() == "" || $("#telpPjawab").val() == "" || $("#pekerjaan").val() == "" || $("#hubungan").val() == "" || $("#combo_pasien option:selected").text() == "==PILIH==" ||	
			$("#combo_dokterpengirim option:selected").text() == "==PILIH==" || $("#combo_dokterPjawab option:selected").text() == "==PILIH==" || $("#combo_remarkapotek option:selected").text() == "==PILIH=="){
			alert("Data Belum Lengkap");
		}else if ($("#kelas").val() == "" || $("#kamar").val() == ""){
			alert("Masukan Data Kamar");
		}else if ($("#combo_bedkosong option:selected").text() == "==PILIH=="){
			alert("Pilih No Kamar");
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
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_kamar').click(function() { 
		dtrec = $('#list_kamar').DataTable().row('.selected').data();
		$("#kamar").val(dtrec[1]);
		$("#kelas").val(dtrec[4]);
		ComboBedKosong();
			
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
	iniDataKamar();
	function iniDataKamar(){
    $('#list_kamar').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:false, pagelenght:10,searchAble:true,
		"ajax":{
			url :"../list_kamar/", // json datasource
			type: "post",  // method  , by default get
			error: function(){  // error handling
				$(".list_kamar-error").html("");
				$("#list_kamar").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_kamar_processing").css("display","none");
							
			}
		}
	});		
	}
	
	
});	



</script>








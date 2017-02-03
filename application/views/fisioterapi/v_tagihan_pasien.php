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
		Tagihan Pasien
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FISIOTERAPI</a></li>
        <li class="active">Tagihan Pasien</li>
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
							<div class="nav-tabs-custom" id="tab_tagihanpasien">							
								<div class="col-sm-12">
									<div class="box-body">										
										<div class="form-group">
											<div class="row">															
												<button type="button" style="margin-left:2%;" id="btn_refresh" class="btn btn-primary"><i class="fa fa-refresh"></i>	 Refresh</button>												
											</div>															
										</div>	
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<table id="list_pasien_fisioterapi" class="table table-bordered table-hover display">
														<thead>
															<tr>
															<th></th>
															<th>No RM</th>
															<th>Nama</th>
															<th>No Reg</th>	
															<th>Tanggal</th>
															<th>Jam</th>																	
															<th>Status</th>
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
		<div class="col-sm-5">
			<div class="box">
				<div class="box-header with-border">					
				</div><!-- /.box-header -->				
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="tab_tagihanpasien">
							
								<div class="col-sm-12">
									<div class="box-body">
										<div class="form-group">											
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:25%;" class="col-sm-2 control-label">No RM</label>
												<div class="col-lg-5" >
													<input type="text" style="" class="form-control" name="norm" id="norm" >
												</div>																
													<button type="button" style="margin-left:%;" id="btn_ok" class="btn btn-primary" disabled=false><i class="fa fa-search"></i>	 OK</button>																				
											</div>
										</div>	
										<div class="form-group">											
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">Nama</label>
												<div class="col-lg-9" >
													<input type="text" style="" class="form-control" name="nama" id="nama" disabled=false>
												</div>
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">Alamat</label>
												<div class="col-xs-1" >
													<textarea rows="3" cols="43" name="alamat" id="alamat"  disabled=false></textarea>
												</div>				
											</div>
														
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">Jenis Kelamin</label>
												<div class="col-lg-4" >
													<input type="text" class="form-control" name="jk" id="jk" disabled=false >
												</div>
												<label for="inputEmail3" style="margin-left:-5%;width:15%;" class="col-sm-2 control-label">Umur</label>
												<div class="col-lg-2" >
													<input type="text" class="form-control" name="umur" id="umur" disabled=false >
												</div>
												<label for="inputEmail3" style="margin-left:-5%;" class="col-sm-2 control-label">Tahun</label>
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">No Reg</label>
												<div class="col-lg-9" >
													<input type="text" style="" class="form-control" name="noreg" id="noreg" disabled=false>
												</div>
											</div>
										</div>	
										
										<div class="form-group">											
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">R.Inap/R.Jalan</label>
												<div class="col-lg-5" >
													<select class="col-sm-2 form-control"  name="combo_inapjalan" id="combo_inapjalan" style="width: 100%;"	>
														<option selected="selected">Rawat Jalan</option>
														<option>Rawat Inap</option>
													</select>																		
												</div>																								
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">Jenis</label>
												<div class="col-lg-5" >
													<select class="col-sm-2 form-control"  name="combo_jenis" id="combo_jenis" style="width: 100%;"	>
														<option selected="selected">-</option>
														<?php foreach ($dt_jp as $jp) { ?>	
															<option value="<?php echo $jp["nama"]; ?>"><?php echo $jp["nama"]; ?></option>
														<?php } ?>	
													</select>																		
												</div>																								
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-5%;width:30%;" class="col-sm-2 control-label">Penjamin</label>
												<div class="col-lg-9" >
													<select class="col-sm-2 form-control"  name="combo_penjamin" id="combo_penjamin" style="width: 100%;"	>
														<option selected="selected">-</option>
														<?php foreach ($dt_penjamin as $penjamin) { ?>	
															<option value="<?php echo $penjamin["nama"]; ?>"><?php echo $penjamin["nama"]; ?></option>
														<?php } ?>
													</select>																		
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
		<div class="col-sm-7">
			<div class="box">
				<div class="box-header with-border">
					
				</div><!-- /.box-header -->				
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="tab_tagihanpasien">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">Tindakan/Tagihan Lainnya</a></li>
									<li><a href="#tab_2" data-toggle="tab">Bahan Habis Pakai (BHP)</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Poli/ Dept/ Unit</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_poli" id="combo_poli" style="width: 100%;"	>
																	<option selected="selected">POLI FISIOTHERAPY</option>
																</select>																		
															</div>																								
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Kelas / Group</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_kelas" id="combo_kelas" style="width: 100%;"	>
																	<?php foreach ($dt_namakelas as $namakelas) { ?>	
																		<option value="<?php echo $namakelas["kelas"]; ?>"><?php echo $namakelas["kelas"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>																								
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Tindakan</label>
															<div class="col-lg-3" >
																<select class="col-sm-2 form-control"  name="combo_tindakan" id="combo_tindakan" style="width: 100%;"	>
																	<option selected="selected">Nebulizer</option>
																</select>																		
															</div>																								
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Tarif Rp</label>
															<div class="col-lg-3" >
																<input type="number" style="" class="form-control" name="tarif" id="tarif" value="200000" min=0>
															</div>
															<label for="inputEmail3" style="margin-left:-2%;width:10%;" class="col-sm-2 control-label">Jumlah</label>
															<div class="col-lg-2" >
																<input type="number" style="" class="form-control" name="qty" id="qty" min=1>
															</div>
														</div>
														<div class="row">
															<div class="col-lg-3" >
																<label><input type="radio" style="margin-left:-10%;width:50px;" name="radio" id="radio_dokter" checked >Dokter</label>
															</div>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control" style="margin-left:-11%;" name="combo_dokter" id="combo_dokter" style="width: 100%;"	>
																	<option selected="selected">-</option>
																	<?php foreach ($dt_namadokter as $namadokter) { ?>	
																		<option value="<?php echo $namadokter["dokter"]; ?>"><?php echo $namadokter["dokter"]; ?></option>
																	<?php } ?>		
																</select>																		
															</div>
														</div>
														<div class="row">
															<div class="col-lg-3" >
																<label><input type="radio" style="margin-left:-10%;width:50px;" name="radio" id="radio_perawat"  >Perawat</label>
															</div>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control" style="margin-left:-11%;" name="combo_perawat" id="combo_perawat" disabled=false style="width: 100%;"	>
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
															<button type="button" style="margin-left:27%;" id="btn_tambahitem" class="btn btn-danger" disabled=false><i class="fa fa-plus"></i>	Tambah Item</button>
															<button type="button" style="margin-left:1%;" id="btn_hapusitem" class="btn btn-danger" disabled=false><i class="fa fa-minus"></i>	Hapus Item</button>												
														</div>
																		
													</div>
													<div class="form-group">
														<div class="row">															
															*) Hanya Supervisor yang dapat menghapus Item, atau silahkan menghubungi Patugas Kasir Central.									
														</div>
																		
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_2" style="position: relative; ">									
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">BHP Obat / Alkes</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_bhpobat" id="combo_bhpobat" style="width: 100%;"	>
																	<?php foreach ($dt_bhp_obat as $bhp_obat) { ?>	
																		<option value="<?php echo $bhp_obat["barang"]; ?>"><?php echo $bhp_obat["barang"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>																								
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Jumlah</label>
															<div class="col-lg-2" >
																<input type="number" style="" class="form-control" name="jumlah" id="jumlah" min=1>
															</div>
															<label for="inputEmail3" style="margin-left:-4%;" name="satuan" id="satuan" class="col-sm-2 control-label">[satuan]</label>
														</div>
														<div class="row">	
															<label for="inputEmail3" style="width:13%;" class="col-sm-2 control-label">Harga</label>
															<div class="col-lg-1" >
																<label><input type="checkbox" style="width:50px;" name="cek_harga" id="cek_harga"></label>
															</div>
															<div class="col-lg-3" >
																<input type="number" style="margin-left:-6%;" class="form-control" name="harga" id="harga" disabled=false>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:22%;" id="btn_tambahbhp" class="btn btn-danger" disabled=false><i class="fa fa-plus"></i>	Tambah BHP</button>
															<button type="button" style="margin-left:1%;" id="btn_hapusbhp" class="btn btn-danger" disabled=false><i class="fa fa-minus"></i>	Hapus BHP</button>												
														</div>
																		
													</div>
													<div class="form-group">
														<div class="row">															
															*) Koreksi baik-baik sebelum BHP ditambahkan.									
														</div>
														<div class="row">															
															*) Pemakaian BHP otomatis mengurangi stock.									
														</div>
														<div class="row">															
															*) Hanya Supervisor yang dapat menghapus Item, atau silahkan menghubungi Patugas Kasir Central.					
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
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="tab_tagihanpasien">
							
								<div class="col-sm-12">
									<div class="box-body">
										<div class="form-group">											
											<div class="col-md-12">
												<table id="list_faktur_prebayar" class="table table-bordered table-hover display">
													<thead>
														<tr>
															<th></th>
															<th>Uraian</th>
															<th>Tarif</th>
															<th>Qty</th>	
															<th>Total</th>
															<th>Unit/Poli</th>																	
															<th>Dokter</th>																																	
															<th>Tanggal</th>																																
															<th>Jam</th>
														</tr>
													</thead>
													<tbody>
												</table>												
											</div>	
										</div>	
										<div class="form-group">
											<div class="row">															
												<button type="button" style="margin-left:3%;" id="btn_cetak" class="btn btn-danger" disabled=false><i class="fa fa-print"></i>	Cetak Tagihan</button>
												<button type="button" style="margin-left:1%;" id="btn_tutup" class="btn btn-danger"><i class="fa fa-arrow-left"></i>	Tutup Sementara</button>												
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
	
	$('#list_pasien_fisioterapi').DataTable({
		paging: true, lengthChange:true , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_faktur_prebayar').DataTable({
		paging: true, lengthChange:true , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	
	$("#combo_penjamin").select2();
	$("#combo_bhpobat").select2();
	$("#combo_dokter").select2();
	$("#combo_perawat").select2();
	DataSatuanHarga();
	
	$("#radio_dokter").click(function(){
		if ($("#radio_dokter").prop("checked")){
			$("#combo_dokter").prop("disabled", false);			
			$("#combo_perawat").prop("disabled", true);
		}else{
			$("#combo_dokter").prop("disabled", true);			
			$("#combo_perawat").prop("disabled", false);
		}
	});
	$("#radio_perawat").click(function(){
		if ($("#radio_perawat").prop("checked")){
			$("#combo_dokter").prop("disabled", true);			
			$("#combo_perawat").prop("disabled", false);
		}else{
			$("#combo_dokter").prop("disabled", false);			
			$("#combo_perawat").prop("disabled", true);
		}
	});
	
	$("#cek_harga").click(function(){
		if($("#cek_harga").prop("checked")){
			$("#harga").prop("disabled", false);
		}else{
			$("#harga").prop("disabled", true);
		}
	});
	$("#btn_tutup").click(function(){
		Clear();
	});
	function Clear(){
		$("#norm").val("");
		$("#nama").val("");
		$("#alamat").val("");
		$("#jk").val("");
		$("#umur").val("");
		$("#noreg").val("");
		$("#combo_jenis").val("-");
		$("#btn_cetak").prop("disabled", true);
		DataFaktur();
	}
	$("#btn_refresh").click(function(){
		DataPasienFisioterapi();
	});
	function DataPasienFisioterapi(){
    $('#list_pasien_fisioterapi').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, ordering:false, paging:true, pagelenght:10, searchAble:true,
		"ajax":{
			url :"../DataPasienFisioterapi/", // json datasource
			type: "post",  // method  , by default get
			
			error: function(){  // error handling
				$(".list_pasien_fisioterapi-error").html("");
				$("#list_pasien_fisioterapi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_pasien_fisioterapi_processing").css("display","none");
			}
		}
	});		
	}
	$('#list_pasien_fisioterapi').click(function() { 
		dtrec = $('#list_pasien_fisioterapi').DataTable().row('.selected').data();	
		$("#norm").val(dtrec[1]);
		$("#btn_ok").prop("disabled", false);
	});
	$("#btn_ok").click(function(){
		if($("#norm").val() == ""){
			alert("Masukan No RM !");
			$("#nama").val("");
			$("#alamat").val("");
			$("#jk").val("");
			$("#umur").val("");
			$("#noreg").val("");
		}else{
			$("#nama").val(dtrec[2]);
			$("#alamat").val(dtrec[7]);
			$("#jk").val(dtrec[8]);
			$("#umur").val(dtrec[9]);
			$("#noreg").val(dtrec[3]);
			$("#combo_jenis").val(dtrec[10]);			
			$("#btn_tambahitem").prop("disabled", false);			
			$("#btn_tambahbhp").prop("disabled", false);
			$("#btn_cetak").prop("disabled", false);
		}
		DataFaktur();
	});
	
	function DataFaktur(){
    $('#list_faktur_prebayar').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select : true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataFaktur/", // json datasource
			type: "post",  // method  , by default get
			data:{carinorm:$('#norm').val()},
			error: function(){  // error handling
				$(".list_faktur_prebayar-error").html("");
				$("#list_faktur_prebayar").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_faktur_prebayar_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_faktur_prebayar').click(function() { 
		dtrec = $('#list_faktur_prebayar').DataTable().row('.selected').data();			
		$("#btn_hapusitem").prop("disabled", false);
		$("#btn_hapusbhp").prop("disabled", false);
	});
	$("#combo_kelas").change(function () { 
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_kelas").val()}, 
			url: "../get_tarif/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#tarif").val(dt.tarif);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
		
	});	
	
	function DataSatuanHarga(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_bhpobat").val()}, 
			url: "../get_satuan/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#satuan").text(dt.satuan);$("#harga").val(dt.harga);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_bhpobat").change(function () { 
		DataSatuanHarga();		
	});	
	
	$("#btn_tambahitem").click(function(){
		if($("#radio_dokter").prop("checked")){
			var dok_per = $('#combo_dokter option:selected').text();
		}else{
			var dok_per = $('#combo_perawat option:selected').text();
		}
		
		if ($("#qty").val() == ""){
			alert("Masukan jumlah tindakan");
		}else{
			$.ajax({  datatype: "json",data:{
						tarif: $('#tarif').val(),
						qty: $('#qty').val(),
						dp: dok_per,
						poli: $('#combo_poli option:selected').text(),
						tindakan: $('#combo_tindakan option:selected').text(),
						
						inap_jalan: $('#combo_inapjalan option:selected').text(),
						norm: $('#norm').val(),
						nama: $('#nama').val(),	
						alamat: $('#alamat').val(),
						umur: $('#umur').val(),
						jk: $('#jk').val()},
				url: "../TambahItem/",
				async: false, type:'POST',success: function(data){alert('Tindakan / Tagihan Lainnya sudah ditambahkan.');
				DataFaktur();
				$("#qty").val("");
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	$("#btn_hapusitem").click(function(){
		if((dtrec[5]) == "POLI FISIOTHERAPY"){
			if (confirm("Apakah Anda Yakin akan Menghapus item "+dtrec[1]+" ?") == true) {
				HapusItem();
			}
		}else{
			if (confirm("Apakah Anda Yakin akan Menghapus item "+dtrec[1]+" ?") == true) {
				alert("Untuk menghapus Bahan Habis Pakai (BHP) harus melalui panel Bahan Habis Pakai (BHP)");
			}
		}
	});
	function HapusItem(){					
		$.ajax({  datatype: "json",data:{tgl: dtrec[7],jam: dtrec[8]},
			url: "../HapusItem/",
			async: false, type:'POST',success: function(data){alert('Item '+dtrec[1]+' telah berhasil dihapus dari Tindakan / Tagihan Lainnya' );			
			DataFaktur();
			var dt=JSON.parse(data);},
			error: function(){alert('Error Nih !!!');}
		});	
	}
	$("#btn_tambahbhp").click(function(){		
		if ($("#jumlah").val() == ""){
			alert("Masukan jumlah Habis Pakai");
		}else if($("#harga").val() == ""){
			alert("Masukan harga Habis Pakai");
		}else{	
			$.ajax({  datatype: "json",data:{
						bhpobat: $('#combo_bhpobat option:selected').text(),
						qty: $('#jumlah').val(),
						harga: $('#harga').val(),					
						inap_jalan: $('#combo_inapjalan option:selected').text(),
						norm: $('#norm').val(),
						nama: $('#nama').val(),	
						alamat: $('#alamat').val(),
						umur: $('#umur').val(),
						jk: $('#jk').val()},
				url: "../TambahBHP/",
				async: false, type:'POST',success: function(data){alert('Habis Pakai telah ditambahlan dalam tagihan. Stock Anda otomatis berkurang sesuai penggunaan.');
				DataFaktur();
				$("#jumlah").val("");
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});
		}
	});
	$("#btn_hapusbhp").click(function(){
		alert('Perhatian: Penghapusan BHP dari tagihan tidak otomatis mengembalikan Stock BHP yang digunakan. Informasi lebih lanjut hubungi Administrator');
		if((dtrec[5]) == "POLI FISIOTHERAPY (BHP)"){
			if (confirm("Apakah Anda Yakin akan Menghapus item "+dtrec[1]+" ?") == true) {
				HapusBHP();
			}
		}else{
			if (confirm("Apakah Anda Yakin akan Menghapus item "+dtrec[1]+" ?") == true) {
				alert("Untuk menghapus Tagihan "+dtrec[1]+" harus melalui panel Tindakan / Tagihan Lainnya");
			}
		}
	});
	function HapusBHP(){					
		$.ajax({  datatype: "json",data:{tgl: dtrec[7],jam: dtrec[8]},
			url: "../HapusBHP/",
			async: false, type:'POST',success: function(data){alert('Perhatian: BHP '+dtrec[1]+' telah dihapus, untuk pengembalian stock anda harus memasukan MANUAL.' );			
			DataFaktur();
			var dt=JSON.parse(data);},
			error: function(){alert('Error Nih !!!');}
		});	
	}
	$('#btn_cetak').click(function() { 
		Print();		
    });	
	function Print(){	
		var win = "../../../assets/jasper/reports/fisioterapi/tagihan_pasien/TagihanPasien.php?norm="+$("#norm").val()+"";
		window.open(win);	
	}
});	



</script>








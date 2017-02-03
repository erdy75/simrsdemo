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
		Form Retur
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FARMASI</a></li>
        <li class="active">Retur</li>
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
								<li class="active"><a href="#tab_1" data-toggle="tab">Retur Piutang Obat (UBL)</a></li>
								<li><a href="#tab_2" data-toggle="tab">Retur Obat Lunas</a></li>
							</ul>	
							
							<div class="tab-content">
								<div class="tab-pane active" id="tab_1" style="position: relative; ">
									<div class="box-body">
										
										<div class="row">
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
													
														<div class="row">
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">No Retur</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="noretur1" id="noretur1"  value="~Auto Number~" disabled=false>
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">No RM</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="norm" id="norm"  placeholder="">
															</div>
																<button type="button" id="btn_ok" class="btn btn-primary"><i class="fa fa-refresh"></i>	OK</button>		
														</div>	
													</div>
													<div class="form-group">			
														<div class="row">	
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">Pasien</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="nama" id="nama" disabled=false>
															</div>
															<div class="col-lg-5" >
																<input type="text" style="margin-left:-20px;" class="form-control" name="alamat" id="alamat"  disabled=false>
															</div>																									
														</div>
														<div class="row">	
															<div class="col-lg-2" >
																<input type="text" style="margin-left:85px;width:120px;"class="form-control" name="jenispx" id="jenispx"  disabled=false>
															</div>
															<div class="col-lg-3" >
																<input type="text" style="margin-left:110px;" class="form-control" name="perawatan1" id="perawatan1" disabled=false>
															</div>		
															<div class="col-lg-3" >
																<input type="text" style="margin-left:88px;width:154px;" class="form-control" name="perawatan" id="perawatan"  disabled=false>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:600px;" class="col-sm-2 control-label">Retur berupa nilai Potongan Retur saat pasien melakukan pembayaran di Kasir</label>
														</div>
													</div>
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<table id="list_retur_ubl1" class="table table-bordered table-hover display"	>
																		<thead>
																		<tr>
																			<th></th>
																			<th>Barang</th>
																			<th>Harga Beli</th>
																			<th>Qty</th>
																			<th>Dokter</th>
																			<th>Tanggal/Jam</th>						
																		</tr>
																		</thead>
																	</table>												
																</div>								
															</div>
														</div>	
													</div>
												</div>
												
												<div class="col-sm-6">
													<div class="form-group">
															
														<div class="row">
															<label for="inputEmail3" style="width:180;" class="col-sm-2 control-label">Barang yang di Retur</label>
															<div class="col-lg-6" >
																<select class="col-sm-2 form-control"  name="combo_barang" id="combo_barang" style="width: 100%;">
																<option selected="selected">==PILIH==</option>
																<?php foreach ($dt_nama_barang as $dt_namabarang) { ?>
																	<option value="<?php echo $dt_namabarang["nama"]; ?>"><?php echo $dt_namabarang['nama']; ?></option>
																<?php } ?>
																</select>
															</div>																
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:190;" class="col-sm-2 control-label">Uang Retur yang kembali</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:-10px;" name="cek_persen" id="cek_persen" value="cek_persen">																
															</div>
															<div class="col-lg-1" >
																<input type="number" class="form-control" style="margin-left:-40px;width:60px;" name="persen" id="persen" value="90" disabled="false"  min="1" max="100">
															</div>		
																<label for="inputEmail3" style="margin-left:-20px;" class="col-sm-2 control-label">%</label>																													
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:190;" class="col-sm-2 control-label">Jumlah Di Retur</label>
															<div class="col-lg-2" >
																<input type="number" class="form-control" style="margin-left:-10px;width:145px;" name="jumlah_retur" id="jumlah_retur"   min="1" max="100">
															</div>	
																<label for="inputEmail3" style="margin-left:40px;width:10px;" class="col-sm-2 control-label">Stock:</label>	
																<label for="inputEmail3" style="margin-left:15px;width:10px;" id="stock" class="col-sm-2 control-label">[Jumlah]</label>
																																										
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:190;" class="col-sm-2 control-label">Uang Retur dikembalikan</label>
															<label for="inputEmail3" style="margin-left:-10px;width:10px;" class="col-sm-2 control-label">Rp</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" style="margin-left:-10px;" name="uang_retur" id="uang_retur"   min="1">
															</div>
														</div>
													
													</div>
													<div class="form-group">
														<div class="row">
																<button style="margin-left:32%;" type="button" id="btn_simpanretur" class="btn btn-danger" disabled=false><i class="fa fa-save"></i>	Simpan Retur</button>	
																<button style="" type="button" id="btn_batalretur" class="btn btn-danger"><i class="fa fa-mail-reply"></i>	Batal Retur</button>																											
														</div>
													</div>
													
													
														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<table id="list_retur_ubl2" class="table table-bordered table-hover display"	>
																		<thead>
																		<tr>
																			<th></th>
																			<th>Nama</th>
																			<th>Harga Retur</th>
																			<th>Qty</th>
																			<th>Sub Total</th>						
																		</tr>
																		</thead>
																	</table>												
																</div>								
															</div>
														</div>
													
													
													<div class="row">
														<label for="inputEmail3" style="width:90;" class="col-sm-2 control-label">Retur: Rp</label>
														<div class="col-lg-3" >
															<input type="number" class="form-control" style="margin-left:-10px;" name="totalrp" id="totalrp" disabled=false >
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
											<div class="row">
												<div class="col-sm-5">
													<div class="form-group">
															
														<div class="row">
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">No Retur</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:-20px;" name="cek_persen" id="cek_autonumber" value="cek_autonumber">																
															</div>
															<div class="col-lg-5" >
																<input type="text" style="margin-left:-43px;" class="form-control" name="noretur2" id="noretur2"  value="~Auto Number~" disabled=false>
															</div>
																<button type="button" style="margin-left:-44px;" id="btn_load" class="btn btn-danger" disabled=false><i class="fa fa-refresh"></i>	Load</button>		
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">No RM</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="norm2" id="norm2"  placeholder="">
															</div>
																<button type="button" id="btn_ok2" class="btn btn-primary"><i class="fa fa-refresh"></i>	OK</button>		
														</div>
													</div>
													<div class="form-group">			
														<div class="row">	
															<label for="inputEmail3" style="width:85px;" class="col-sm-2 control-label">Pasien</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="nama2" id="nama2" disabled=false>
															</div>
															<div class="col-lg-4" >
																<input type="text" style="margin-left:-21px;" class="form-control" name="jenispx2" id="jenispx2"  disabled=false>
															</div>																									
														</div>
														<div class="row">	
															<div class="col-lg-8" >
																<input type="text" style="margin-left:85px;width:107%;"class="form-control" name="alamat2" id="alamat2"  disabled=false>
															</div>															
														</div>
														<div class="row">
															<div class="col-lg-3" >
																<input type="text" style="margin-left:85px;width:154px;" class="form-control" name="perawatan2" id="perawatan2" disabled=false>
															</div>
														</div>
														
													</div>
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Data Pembelian Pasien</h3>
														</div><!-- /.box-header -->	
														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<table id="list_retur_lunas1" class="table table-bordered table-hover display"	>
																		<thead>
																		<tr>
																			<th></th>
																			<th>No Faktur</th>
																			<th>Tanggal</th>
																			<th>Kelompok Beli</th>					
																		</tr>
																		</thead>
																	</table>												
																</div>								
															</div>
														</div>	
													</div>
													<div class="box-body">
													<div class="row">
														<label for="inputEmail3" style="width:350px;" class="col-sm-2 control-label">*) klik list diatas untuk menampilkan barangnya</label>
													</div>
													</div>
													
													<div class="box-body">
														<div class="row">
															<label for="inputEmail3" style="width:240px;" class="col-sm-2 control-label">Barang yang dibeli di No Kwitansi</label>
															<div class="col-lg-4" >
																<input type="text" class="form-control" name="tampilnofak" id="tampilnofak" disabled=false>
															</div>															
														</div>
													</div>
													
														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<table id="list_retur_lunas2" class="table table-bordered table-hover display"	>
																		<thead>
																		<tr>
																			<th></th>
																			<th>Nama Barang</th>
																			<th>Jumlah Dibeli</th>
																			<th>Harga Beli</th>						
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
															<label for="inputEmail3" style="width:130;" class="col-sm-2 control-label">Jumlah Di Retur</label>
															<div class="col-lg-2" >
																<input type="number" class="form-control" style="" name="jumlah_retur2" id="jumlah_retur2"   min="1">
															</div>	
																<label for="inputEmail3" style="margin-left:px;width:10px;" class="col-sm-2 control-label">Stock:</label>	
																<label for="inputEmail3" style="margin-left:15px;width:10px;" id="stock2" class="col-sm-2 control-label">[Jumlah]</label>
																
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:130;" class="col-sm-2 control-label">Harga di Retur</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" style="" name="harga_retur" id="harga_retur" disabled=false  min="1">
															</div>		
																																										
														
															<label for="inputEmail3" style="width:130;" class="col-sm-2 control-label">Dikurangi</label>
															<div class="col-lg-2" >
																<select class="col-sm-2 form-control" style="margin-left:-50px" name="combo_persen" id="combo_persen" style="width: 100%;">
																<option>5</option>
																<option selected="selected">10</option>
																<option>12.5</option>
																<option>15</option>
																<option>20</option>
																</select>
															</div>		
																<label for="inputEmail3" style="margin-left:-70px;" class="col-sm-2 control-label">%</label>																													
														</div>
														
														<div class="row">
															<label for="inputEmail3" style="width:130;" class="col-sm-2 control-label">Menjadi</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:-50px;" name="cek_harga" id="cek_harga" value="cek_harga">																
															</div>
															<label for="inputEmail3" style="margin-left:-50px;width:10px;" class="col-sm-2 control-label">Rp</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" style="margin-left:-10px;" name="uang_retur2" id="uang_retur2" disabled=false  min="1">
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:130;" class="col-sm-2 control-label">Uraian</label>
															<div class="col-xs-5" >
																<textarea style="margin-left:5px;" rows="3" cols="53" name="uraian" id="uraian" ></textarea>
															</div>																																										
														</div>
													
													</div>
													<div class="form-group">
														<div class="row">
															<button style="margin-left:21%;" type="button" id="btn_simpanretur2" class="btn btn-danger" disabled=false ><i class="fa fa-save"></i>	Simpan Retur</button>	
															<button type="button" id="btn_batalretur2" class="btn btn-danger"><i class="fa fa-mail-reply"></i>	Batal Retur</button>
															<button type="button" id="btn_cetaknotaretur" class="btn btn-primary" disabled=false><i class="fa fa-print"></i>	Cetak Nota Retur</button>																
														</div>
													</div>
													
													<div class="box">
														<div class="box-header with-border">
															<h3 class="box-title">Barang yang akan di Retur</h3>
														</div><!-- /.box-header -->	
														<div class="form-group">
															<div class="row">
																<div class="col-md-12">
																	<table id="list_retur_lunas3" class="table table-bordered table-hover display"	>
																		<thead>
																		<tr>
																			<th></th>
																			<th>Nama Barang</th>
																			<th>Harga</th>
																			<th>Jumlah</th>
																			<th>Sub Total</th>	
																			<th>Ref Kwitansi</th>						
																		</tr>
																		</thead>
																	</table>												
																</div>								
															</div>
														</div>
													</div>
													
													<div class="row">
														<label for="inputEmail3" style="width:325;" class="col-sm-2 control-label">Uang Retur yang Dikembalikan ke Pasien:	Rp</label>
														<div class="col-lg-3" >
															<input type="number" class="form-control" style="margin-left:-40px;" name="uangkembali" id="uangkembali" disabled=false >
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

	$('#list_retur_ubl1').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_retur_lunas1').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_retur_lunas2').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#cek_persen").click(function() {	
		 if ($( "#cek_persen" ).prop( "checked"))	{
			$( "#persen" ).prop( "disabled", false );	
		}else{
			$( "#persen" ).prop( "disabled", true );	
		}		
	});
	$("#cek_autonumber").click(function() {	
		 if ($( "#cek_autonumber" ).prop( "checked"))	{
			$( "#noretur2" ).prop( "disabled", false );
			$( "#btn_load" ).prop( "disabled", false );
			$("#noretur2").val("");	
		}else{
			$( "#noretur2" ).prop( "disabled", true );	
			$( "#btn_load" ).prop( "disabled", true );
			$("#noretur2").val("~Auto Number~");
		}		
	});
	$("#cek_harga").click(function() {	
		 if ($( "#cek_harga" ).prop( "checked"))	{
			$( "#uang_retur2" ).prop( "disabled", false );	
		}else{
			$( "#uang_retur2" ).prop( "disabled", true );	
		}		
	});
	$("#btn_batalretur").click(function() {
		Clear();
	});
	function Clear(){
		$("#noretur1").val("~Auto Number~");
		$("#norm").val("");
		$("#nama").val("");
		$("#alamat").val("");
		$("#jenispx").val("");
		$("#perawatan1").val("");
		$("#perawatan").val("");
		$("#combo_barang").val("==PILIH==");
		$("#persen").val("90");
		$("#jumlah_retur").val("");
		$("#stock").text("[Jumlah]");
		$("#uang_retur").val("");		
		$("#totalrp").val("");
		$("#btn_simpanretur").prop( "disabled", false );
		$("#btn_ok").prop( "disabled", false );
		ListReturUbl1();	
		ListReturUbl2();
	}
	
	//$("#combo_barang").select2();
	
	$("#btn_ok").click(function() {
		ListReturUbl1();
		CariBioUbl();
		$("#btn_ok").prop("disabled", true);
	});
	function ListReturUbl1(){
    $('#list_retur_ubl1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataReturUbl1/", // json datasource
			type: "post",  // method  , by default get
			data:{carinorm:$('#norm').val()},
			error: function(){  // error handling
				$(".list_retur_ubl1-error").html("");
				$("#list_retur_ubl1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_retur_ubl1_processing").css("display","none");
							
			}
		}
		
	});		
	}
	
	function CariBioUbl(){
		$.ajax({  datatype: "json",data:{carinorm:$('#norm').val()},
			url: "../CariBioUbl/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ 
			$('#nama').val(dt[0].status); 
			$('#alamat').val(dt[0].alamat); 
			$('#jenispx').val(dt[0].KelompokBeli);			
			$('#perawatan1').val(dt[0].isResep); 
			$('#perawatan').val(dt[0].inap_jalan); 			
			$("#btn_simpanretur").prop("disabled", false);
			$("#btn_batalretur").prop("disabled", false);
			
			}else{ alert('No RM Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	
	$('#list_retur_ubl1').click(function() { 
		dtrec = $('#list_retur_ubl1').DataTable().row('.selected').data();
		$("#combo_barang option:selected").text(dtrec[1]);
		$("#uang_retur").val((dtrec[2]*$("#persen").val())/100);
		
		if ($( "#perawatan" ).val() =='Rawat Jalan' || 'RAWAT JALAN'){
			tampilStockRajalUbl();
		}else if ($( "#perawatan" ).val() =='Rawat Inap' || 'RAWAT INAP'){
			tampilStockRanapUbl();
		}else{
				
		} 		
    });
	function tampilStockRajalUbl(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_barang option:selected").text()}, 
			url: "../get_stockrajal/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#stock").text(dt.jumlah);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	function tampilStockRanapUbl(){
    	$.ajax({  datatype: "json",
			data:{id_master:$("#combo_barang option:selected").text()}, 
			url: "../get_stockranap/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#stock").text(dt.jumlah);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#jumlah_retur").click(function() {
		$("#uang_retur").val((dtrec[2]*$("#persen").val())/100);	
	});
		
	$("#btn_simpanretur").click(function() { 
		 if ($("#combo_barang").val() == "" || $("#uang_retur").val() == "" ){
			alert("Data Belum Lengkap");
		}else if (parseInt($("#jumlah_retur").val()) > parseInt(dtrec[3])){
			alert("Jumlah Retur lebih banyak dari yang dibeli, ulangi");
		}else {
			$.ajax({  datatype: "json",data:{
					norm : $('#norm').val(),
					combo_barang :$('#combo_barang option:selected').text(),
					jumlah_retur : $('#jumlah_retur').val(),	
					uang_retur : $('#uang_retur').val()},
				url: "../SimpanReturUbl/",
				async: false, type:'POST',success: function(data){alert('Barang telah Diretur dan Memberi potongan pada tagihan billing');
				if ($( "#perawatan" ).val() =='Rawat Jalan'){
					UpdateStockRajalUbl();
				}else if ($( "#perawatan" ).val() =='Rawat Inap'){
					UpdateStockRanapUbl();
				}else{
					
				} 
				var dt=JSON.parse(data);$("#noretur1").val(dt); }, 					   
				error: function(){alert('Error Nih !!! ');}		
				});	ListReturUbl2();Subtotal1();
				$("#btn_simpanretur").prop( "disabled", true );
				$("#jumlah_retur").val("");
				$("#uang_retur").val("");
				$("#stock").text("[Jumlah]");
			}  
	});
	function UpdateStockRajalUbl(){
		$.ajax({  datatype: "json",
				data:{combo_barang :$('#combo_barang').val(),
					  qty: parseInt($("#stock").text())+parseInt($("#jumlah_retur").val()) },
			url: "../UpdateStockRajal/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	function UpdateStockRanapUbl(){
    	$.ajax({  datatype: "json",
				data:{combo_barang :$('#combo_barang').val(),
					  qty: parseInt($("#stock").text())+parseInt($("#jumlah_retur").val()) },
			url: "../UpdateStockRanap/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	function ListReturUbl2(){
    $('#list_retur_ubl2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true,  select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataReturUbl2/", // json datasource
			type: "post",  // method  , by default get
			data:{no_retur:$('#noretur1').val()},
			error: function(){  // error handling
				$(".list_retur_ubl2-error").html("");
				$("#list_retur_ubl2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_retur_ubl2_processing").css("display","none");
							
			}
		}
	});		
	}
	function Subtotal1(){
		$.ajax({  datatype: "json",data:{no_retur:$('#noretur1').val()},
			url: "../CariSubTotal1/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ 
			$('#totalrp').val(dt[0].subtotal);  
			}else{ alert('No RM Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	
	//tab2
	$("#btn_batalretur2").click(function() {
		Clear2();
	});
	function Clear2(){
		$("#noretur2").val("~Auto Number~");
		$("#norm2").val("");
		$("#nama2").val("");
		$("#alamat2").val("");
		$("#jenispx2").val("");
		$("#perawatan2").val("");
		$("#combo_persen").val("10");
		$("#jumlah_retur2").val("");
		$("#stock2").text("[Jumlah]");
		$("#uang_retur2").val("");		
		$("#uangkembali").val("");
		$("#btn_simpanretur2").prop( "disabled", false );
		$("#btn_ok2").prop("disabled", false);
		ListReturLunas1();	
		ListReturLunas2();
		ListReturLunas3();
	}
	$("#btn_ok2").click(function() {
		ListReturLunas1();
		CariBioLunas();
		$("#btn_ok2").prop("disabled", true);
	});
	function ListReturLunas1(){
    $('#list_retur_lunas1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataReturLunas1/", // json datasource
			type: "post",  // method  , by default get
			data:{carinorm:$('#norm2').val()},
			error: function(){  // error handling
				$(".list_retur_lunas1-error").html("");
				$("#list_retur_lunas1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_retur_lunas1_processing").css("display","none");
							
			}
		}
	});		
	}
	function CariBioLunas(){
		$.ajax({  datatype: "json",data:{carinorm:$('#norm2').val()},
			url: "../CariBioLunas/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ 
			$('#nama2').val(dt[0].pasien_tampil); 
			$('#jenispx2').val(dt[0].isdinas); 
			$('#alamat').val(dt[0].alamat);		
			$('#perawatan2').val(dt[0].inap_jalan); 			
			$("#btn_simpanretur2").prop("disabled", false);
			$("#btn_batalretur2").prop("disabled", false);		
			
			}else{ alert('No RM Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	$('#list_retur_lunas1').click(function() { 
		dtrec = $('#list_retur_lunas1').DataTable().row('.selected').data();
		$("#tampilnofak").val(dtrec[1]);
		ListReturLunas2();
				
    });
	function ListReturLunas2(){
    $('#list_retur_lunas2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataReturLunas2/", // json datasource
			type: "post",  // method  , by default get
			data:{carinofak:dtrec[1]},
			error: function(){  // error handling
				$(".list_retur_lunas2-error").html("");
				$("#list_retur_lunas2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_retur_lunas2_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_retur_lunas2').click(function() { 
		dtrec = $('#list_retur_lunas2').DataTable().row('.selected').data();
		$("#harga_retur").val(dtrec[3]);
		$("#uang_retur2").val(dtrec[3]-(dtrec[3]*$("#combo_persen").val()/100));
			
		if ($( "#perawatan2" ).val() =='Rawat Jalan'){
			tampilStockRajalLunas();
		}else if ($( "#perawatan2" ).val() =='Rawat Inap'){
			tampilStockRanapLunas();
		}else{
				
		} 
    });
	$("#combo_persen").change(function() {
		$("#uang_retur2").val(dtrec[3]-(dtrec[3]*$("#combo_persen").val()/100));
	});
	function tampilStockRajalLunas(){
		$.ajax({  datatype: "json",
			data:{id_master:dtrec[1]}, 
			url: "../get_stockrajal/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#stock2").text(dt.jumlah);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	function tampilStockRanapLunas(){
    	$.ajax({  datatype: "json",
			data:{id_master:dtrec[1]}, 
			url: "../get_stockranap/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#stock2").text(dt.jumlah);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#btn_simpanretur2").click(function() { 
		 if ($("#uang_retur2").val() == "" || $("#uraian").val() == ""){
			alert("Data Belum Lengkap");
		}else if (parseInt($("#jumlah_retur2").val()) > parseInt(dtrec[2])){
			alert("Jumlah Retur lebih banyak dari yang dibeli, ulangi");
		}else {
			$.ajax({  datatype: "json",data:{
					noretur : $('#noretur2').val(),
					norm : $('#norm2').val(),					
					nofak : $('#tampilnofak').val(),
					namabarang :dtrec[1],
					qty : $('#jumlah_retur2').val(),
					harga : $('#uang_retur2').val(),
					uraian : $('#uraian').val(),	
					uang_retur : $('#uang_retur').val()},
				url: "../SimpanReturLunas/",
				async: false, type:'POST',success: function(data){alert('Retur Apotek telah berhasil disimpan');
				
				if ($( "#perawatan2" ).val() =='Rawat Jalan'){
					UpdateStockRajalLunas();
				}else if ($( "#perawatan2" ).val() =='Rawat Inap'){
					UpdateStockRanapLunas();
				}else{
					
				}
				var dt=JSON.parse(data);$("#noretur2").val(dt); }, 					   
				error: function(){alert('Error Nih !!! ');}		
				});	ListReturLunas3();Subtotal2();
				$("#btn_simpanretur2").prop( "disabled", true );
				$("#jumlah_retur2").val("");
				$("#harga_retur").val("");
				$("#uang_retur2").val("");
				$("#uraian").val("");
				$("#stock2").text("[Jumlah]");
			}			
				  
	});
	function UpdateStockRajalLunas(){
		$.ajax({  datatype: "json",
				data:{combo_barang :dtrec[1],
					  qty: parseInt($("#stock2").text())+parseInt($("#jumlah_retur2").val()) },
			url: "../UpdateStockRajal/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	function UpdateStockRanapLunas(){
    	$.ajax({  datatype: "json",
				data:{combo_barang :dtrec[1],
					  qty: parseInt($("#stock2").text())+parseInt($("#jumlah_retur2").val()) },
			url: "../UpdateStockRanap/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);
			if (dt.length > 0){
				console.log(dt);
			}else{}
			}, error: function(){alert('Error Nih !!! ');}
		});
	}
	function ListReturLunas3(){
    $('#list_retur_lunas3').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataReturLunas3/", // json datasource
			type: "post",  // method  , by default get
			data:{no_retur:$('#noretur2').val()},
			error: function(){  // error handling
				$(".list_retur_lunas3-error").html("");
				$("#list_retur_lunas3").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_retur_lunas3_processing").css("display","none");
							
			}
		}
	});		
	}
	function Subtotal2(){
		$.ajax({  datatype: "json",data:{no_retur:$('#noretur2').val()},
			url: "../CariSubTotal2/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ 
			$('#uangkembali').val(dt[0].subtotal);  
			}else{ }
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#btn_load").click(function() {
		ListReturLunas3();
		TampilNoRM();
	});
	function TampilNoRM(){
		$.ajax({  datatype: "json",data:{no_retur:$('#noretur2').val()},
			url: "../CariNoRM/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ 
			$('#norm2').val(dt[0].id_pasien); 			
			$("#btn_simpanretur2").prop("disabled", false);
			$("#btn_batalretur2").prop("disabled", false);		
			
			}else{ alert('No Retur Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	}
	$('#list_retur_lunas3').click(function() { 
		dtrec = $('#list_retur_lunas3s').DataTable().row('.selected').data();		
		$("#btn_cetaknotaretur").prop("disabled", false);
		
    });	
	$('#btn_cetaknotaretur').click(function() { 
		Print();
		
    });	
	function Print(){	
		var win = "../../../assets/jasper/reports/farmasi/retur/ReturObatLunas.php?noretur="+$("#noretur2").val()+"";
		window.open(win);	
	}	
			
});	




</script>








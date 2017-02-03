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
		Form Purchasing
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FARMASI</a></li>
        <li class="active">Form Purchasing</li>
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
					<div class="nav-tabs-custom" id="tab_purchasing">
						<ul class="nav nav-tabs">
							<li id="tab1" class="active"><a href="#tab_1" data-toggle="tab">Form Request ke Purchasing</a></li>
							<li id="tab2"><a href="#tab_2" data-toggle="tab">Request di Bag.Pembelian: APOTEK PELAYANAN</a></li>
							<li id="tab3"><a href="#tab_3" data-toggle="tab">Cari Barang</a></li>
						</ul>	
						
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1" style="position: relative;">
								<div class="box-body">
									<div class="form-group">
									
										<div class="row">
											<label for="inputEmail3" style="width:110px;" class="col-sm-2 control-label">No Request</label>
											<div class="col-lg-2" >
												<input type="text" class="form-control" name="norequest" id="norequest" value="~Auto Number~" disabled=false placeholder="~Auto Number~">
											</div>
										</div>	
										
										<div class="row">	
											<label for="inputEmail3" style="width:110px;" class="col-sm-2 control-label">Poli/Unit</label>
											<div class="col-lg-3" >
												<input type="text" class="form-control" name="poli/unit" id="poli/unit" disabled=false	placeholder="APOTEK PELAYANAN">
											</div>
												<button type="button" id="buatrequestbaru" class="btn btn-danger"><i class="fa fa-edit"></i>	Buat Request Baru</button>		
										</div>
									</div>
									
									<div class="row">
										<div class="form-group">
										
											<div class="row">
											<label style="width:120px;" class="col-sm-2 control-label">Nama Barang:</label>
											<div class="col-lg-1" >
												<input type="checkbox" style="width:50px;" name="check_namabarang" id="check_namabarang"	value="check_namabarang"	disabled=false>
											</div>
												<select class="col-sm-2 form-control" name="combo_namabarang" id="combo_namabarang"  style="width: 20%;"	disabled=false></select>										
											</div>
											
											<div class="row">
												<div class="col-lg-2"> <!--Radio Buton 1-->
													<label><input type="radio" name="r3" id="r_kemasankecil" class="flat-red"	checked disabled=false>Kemasan Kecil</label>
												</div>										
												<div class="col-lg-1" >
													<input type="number" style="margin-left:1px;" class="form-control" name="kemasankecil" id="kemasankecil" min="1" max="100" disabled=false>
												</div>
												<label style="width:150px;" class="col-sm-2 control-label"	value="kecil" name="label_kemasankecil" id="label_kemasankecil">[Kemasan Kecil]</label>
											</div>
											
											<div class="row">
												<div class="col-lg-2"> <!--Radio Buton 2-->
													<label><input type="radio" name="r3" id="r_kemasansedang" class="flat-red" disabled=false>Kemasan Sedang</label>
												</div>										
												<div class="col-lg-1" >
													<input type="number" style="margin-left:1px;" class="form-control" name="kemasansedang" id="kemasansedang" min="1" max="100" disabled=false>
												</div>
												<label style="width:150px;" class="col-sm-2 control-label"	value="sedang" name="label_kemasansedang" id="label_kemasansedang">[Kemasan Sedang]</label>
											</div>
											
											<div class="row">
												<div class="col-lg-2"> <!--Radio Buton 3-->
													<label><input type="radio" name="r3" id="r_kemasanbesar" class="flat-red" disabled=false>Kemasan Besar</label>
												</div>										
												<div class="col-lg-1" >
													<input type="number" style="margin-left:1px;" class="form-control" name="kemasanbesar" id="kemasanbesar" min="1" max="100" disabled=false>
												</div>
												<label style="width:150px;" class="col-sm-2 control-label"	value="besar" name="label_kemasanbesar" id="label_kemasanbesar">[Kemasan Besar]</label>
											</div>
											
											<div class="row">
												<label style="width:150px;" class="col-sm-2 control-label"	disabled=false>Spesifikasi Lainya:</label>
												<div class="col-lg-3" >
												<textarea	style="margin-left:58px;" class="form-control" name="spesifikasi" id="spesifikasi" disabled=false placeholder="Masukkan Deskripsi .."></textarea>
												</div>
											</div>
										</div>
										
										<div class="form-group">
											<div class="row">
												<div class="col-md-12">
													<table id="list_purchasing1" class="table table-bordered table-hover display"	>
														<thead>
															<tr>
															<th></th>
															<th>Nama Barang</th>
															<th>Quantity</th>
															<th>Satuan</th>
															<th>Spesifikasi Lainnya</th>
															</tr>
														</thead>
													</table>												
												</div>								
											</div>
										</div>
											
										<div class="row">
											<div class="col-sm-5">
												<div class="box-body">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Catatan</label>
															<div class="col-lg-8" >
																<input type="text" class="form-control" name="catatan" id="catatan" disabled=false	placeholder="Masukkan Catatan ..">
															</div>
														</div>	
														<div class="row">	
															<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Kepala Unit</label>
															<div class="col-lg-6" >
																<input type="text" class="form-control" name="kepalaunit" id="kepalaunit" disabled=false	>
															</div>																	
																<button type="button" data-toggle="modal" data-target="#Modalku" style="width:13%;" id="btn_kepalaunit" class="btn btn-primary" disabled=false><i class="fa fa-search"></i>	</button>	
																<div class="modal fade" id="Modalku" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog" style="width:500px">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="myModalLabel">Kepala Unit</h4>
																			</div>
																			<div class="modal-body">
																				<table id="list_ku" class="table table-bordered table-hover display">
																					<thead>
																					  <tr>
																						<th></th>
																						<th>Nama</th>
																					  </tr>
																					</thead>
																					<tbody>
																					<?php foreach ($dt_kepalaunit as $dt_ku) { ?>
																						<tr>
																						<td> </td>
																						<td><?php echo $dt_ku['nama']; ?></td>
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
															<button style="margin-left:28%;" type="button" id="simpan" class="btn btn-danger" disabled=false><i class="fa fa-save"></i>	Simpan</button>	
															<button type="button" id="batal" class="btn btn-danger" disabled=false><i class="fa fa-mail-reply"></i>	Batal</button>	
														</div>
													</div>							
												</div>
											</div>
											
											<div class="col-sm-7">
												<div class="form-group">
													<div class="row">
														<div class="col-lg-4" >
														<label><input type="checkbox" style="width:50px;" name="ttdp1" id="ttdp1"	checked>Tanda Tangan Pejabat 1</table>
														</div>
														<div class="col-lg-3" >
															<input type="text" class="form-control" name="ttp1" id="ttp1" value=Purchasing >
														</div>
														<div class="col-lg-4" >
															<input type="text" class="form-control" name="ttp1_2" id="ttp1_2" >
														</div>
													</div>
													
													<div class="row">
														<div class="col-lg-4" >
														<label><input type="checkbox" style="width:50px;" name="ttdp2" id="ttdp2"	checked	>Tanda Tangan Pejabat 2</table>
														</div>
														<div class="col-lg-3" >
															<input type="text" class="form-control" name="ttp2" id="ttp2" value=Direktur>
														</div>
														<div class="col-lg-4" >
															<input type="text" class="form-control" name="ttp2_2" id="ttp2_2">
														</div>
													</div>
													
													<div class="row">
														<div class="col-lg-4" >
														<label><input type="checkbox" style="width:50px;" name="ttdp3"	id="ttdp3" 	>Tanda Tangan Pejabat 3</table>
														</div>
														<div class="col-lg-3" >
															<input type="text" class="form-control" name="ttp3" id="ttp3" disabled=false>
														</div>
														<div class="col-lg-4" >
															<input type="text" class="form-control" name="ttp3_2" id="ttp3_2" disabled=false>
														</div>
													</div>									
												</div>
												<div class="form-group">
													<div class="row">
														<button style="margin-left:35%;" type="set" id="set" class="btn btn-primary" ><i class="fa fa-share-square-o"></i>	Set</button>	
													</div>
												</div>
											</div>
											
										</div>
											
											
																			
									</div>
								</div>
							</div>					
																						
							<div class="tab-pane" id="tab_2" style="position: relative;">
								<div class="box-body">
									<div class="form-group">					
										<div class="row">																
											<button style="margin-left:2%;" type="button" id="refresh" class="btn btn-primary" ><i class="fa fa-refresh"></i>	Refresh</button>
											<button type="button" id="batalkanrequest" class="btn btn-danger" disabled=false ><i class="fa fa-times"></i>	Batalkan Request</button>												
											<button type="button" id="printformpurcashe" class="btn btn-danger" disabled=false)"><i class="fa fa-print"></i>	Print Form Purcashe</button>
										</div>
									</div>
									<div class="form-group">	
										<div class="row">	
											*)Setting Tanda Tangan Request Mengikuti Setting Pada Form Request 
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<table id="list_purchasing2" class="table table-bordered table-hover display">
													<thead>
														<tr>
														<th></th>
														<th>No Request</th>
														<th>Nama Barang Dipesan</th>
														<th>Jumlah</th>
														<th>Satuan</th>														
														<th>Tanggal</th>
														<th>Unit</th>			
														<th>Yang Memesan</th>	
														<th>Kepala Unit</th>
														<th>Catatan</th>
														</tr>
													</thead>
												</table>												
											</div>								
										</div>
									</div>	
								</div>
							</div>
							
							<div class="tab-pane" id="tab_3" style="position: relative; ">								
								<div class="box-body">
									<div class="form-group">
										<div class="row">	
											*)Apabila Terdapat Kesalahan Penulisan Nama Atau Atribut Lainnya, Harap Hubungi Gudang Logistik
										</div>
									</div>
									<div class="form-group">
										<div class="row">												
											<div class="col-md-12">
												<table id="list_purchasing3" class="table table-bordered table-hover display">
													<thead>
														<tr>
														<th></th>
														<th>ID</th>
														<th>Nama</th>
														<th>Kemasan Kecil</th>
														<th>Kemasan Sedang</th>														
														<th>Kemasan Besar</th>
														<th>Type</th>																											
														<th>Jenis</th>
														<th>Generik</th>
														<th>Sediaan</th>
														<th>Principal</th>
														<th>Barcode</th>
														</tr>
													</thead>
													<tbody>
														<?php foreach ($dt_barang as $dt_brg) { ?>
														<tr>
														<td> </td>
														<td><?php echo $dt_brg['id']; ?></td>
														<td><?php echo $dt_brg['nama']; ?></td>
														<td><?php echo $dt_brg['satuan']; ?></td>
														<td><?php echo $dt_brg['pengali_satuan_sedang'].'@'.$dt_brg['nama_satuan_sedang']; ?></td>
														<td><?php echo $dt_brg['pengali_satuan_besar'].'@'.$dt_brg['nama_satuan_besar']; ?></td>
														<td><?php echo $dt_brg['kategori_item']; ?></td>
														<td><?php echo $dt_brg['jenis']; ?></td>
														<td><?php echo $dt_brg['generik']; ?></td>
														<td><?php echo $dt_brg['bentuk_sediaan'].'/'.$dt_brg['dosis_sediaan'].''.$dt_brg['kekuatan_sediaan']; ?></td>
														<td><?php echo $dt_brg['principal']; ?></td>
														<td><?php echo $dt_brg['barcode']; ?></td>
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
	
	$('#list_purchasing2').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$("#buatrequestbaru").click(function() {
		Enable();
	});
	function Enable(){
		$( "#buatrequestbaru" ).prop( "disabled", true );		
		$( "#check_namabarang" ).prop( "disabled", false );
		$( "#r_kemasankecil" ).prop( "disabled", false );		
		$( "#r_kemasansedang" ).prop( "disabled", false );
		$( "#r_kemasanbesar" ).prop( "disabled", false );
		$( "#spesifikasi" ).prop( "disabled", false );
		$( "#tambah" ).prop( "disabled", false );
		$( "#hapus" ).prop( "disabled", false );
		$( "#catatan" ).prop( "disabled", false );
		$( "#btn_kepalaunit" ).prop( "disabled", false );
		$( "#simpan" ).prop( "disabled", false );
		$( "#batal" ).prop( "disabled", false );	
		
		if ($("#r_kemasankecil" ).prop( "checked"))	{
			$( "#kemasankecil" ).prop( "disabled", false );			
		}else if( $("#r_kemasansedang" ).prop( "checked") )	{
			$( "#kemasansedang" ).prop( "disabled", false );
		}else 	{
			$( "#kemasanbesar" ).prop( "disabled", false );
		}
		
		if ($("#check_namabarang" ).prop( "checked"))	{
			$( "#combo_namabarang" ).prop( "disabled", false );	
		}else 	{
			$( "#combo_namabarang" ).prop( "disabled", true );
		}
	}
	$("#check_namabarang").click(function() {	
		 if ($( "#check_namabarang" ).prop( "checked"))	{
			$( "#combo_namabarang" ).prop( "disabled", false );
		}else{
			$( "#combo_namabarang" ).prop( "disabled", true );
		}		
	});
	
	$("#r_kemasankecil").click(function() {	
		 if ($("#r_kemasankecil" ).prop( "checked"))	{
			$( "#kemasankecil" ).prop( "disabled", false );
			$( "#kemasansedang" ).prop( "disabled", true );
			$( "#kemasanbesar" ).prop( "disabled", true );
			
		}else{
			$( "#kemasankecil" ).prop( "disabled", true );
		}
		
	});
	$("#r_kemasansedang").click(function() {	
		 if ($( "#r_kemasansedang" ).prop( "checked"))	{
			$( "#kemasansedang" ).prop( "disabled", false );
			$( "#kemasankecil" ).prop( "disabled", true );
			$( "#kemasanbesar" ).prop( "disabled", true );
		}else{
			$( "#kemasansedang" ).prop( "disabled", true );
		}
		
	});
	$("#r_kemasanbesar").click(function() {	
		 if ($("#r_kemasanbesar" ).prop( "checked"))	{
			$( "#kemasanbesar" ).prop( "disabled", false );
			$( "#kemasansedang" ).prop( "disabled", true );
			$( "#kemasankecil" ).prop( "disabled", true );
		}else{
			$( "#kemasanbesar" ).prop( "disabled", true );
		}
		
	});
	
	$("#ttdp1").click(function() {	
		 if ($( "#ttdp1" ).prop( "checked"))	{	
			$( "#ttp1" ).prop( "disabled", false );
			$( "#ttp1_2" ).prop( "disabled", false );
		}else {
			$( "#ttp1" ).prop( "disabled", true );
			$( "#ttp1_2" ).prop( "disabled", true );
		}
		
	});
	$("#ttdp2").click(function() {	
		if ($( "#ttp1" ).prop( "disabled"))	{	
			alert("Anda Harus Memasukan Pejabat 1 Terlebih Dahulu");
		}else if ($( "#ttdp2" ).prop( "checked"))	{	
			$( "#ttp2" ).prop( "disabled", false );
			$( "#ttp2_2" ).prop( "disabled", false );
		}else {
			$( "#ttp2" ).prop( "disabled", true );
			$( "#ttp2_2" ).prop( "disabled", true );
		}
		 
		
	});
	$("#ttdp3").click(function() {	
		 if ($( "#ttp2" ).prop( "disabled"))	{	
			alert("Anda Harus Memasukan Pejabat 2 Terlebih Dahulu");
		}else if ($( "#ttdp3" ).prop( "checked"))	{	
			$( "#ttp3" ).prop( "disabled", false );
			$( "#ttp3_2" ).prop( "disabled", false );
		}else {
			$( "#ttp3" ).prop( "disabled", true );
			$( "#ttp3_2" ).prop( "disabled", true );
		}
		
	});
	
	$("#batal").click(function() {
		$( "#norequest" ).val("~Auto Number~");	
		iniDataPurchasing1('no');
		Disable();
		Clear();	
	});
	function Clear(){				
		$( "#label_kemasankecil" ).text("[Kemasan Kecil]");
		$( "#label_kemasansedang" ).text("[Kemasan Sedang]");
		$( "#label_kemasanbesar" ).text("[Kemasan Besar]");
		$( "#kemasankecil" ).val("");
		$( "#kemasansedang" ).val("");
		$( "#kemasanbesar" ).val("");
		$( "#spesifikasi" ).val("");
		$( "#catatan" ).val("");
		$( "#kepalaunit" ).val("");
	}
	function Disable(){		
		$( "#buatrequestbaru" ).prop( "disabled", false );		
		$( "#check_namabarang" ).prop( "disabled", true );		
		$( "#combo_namabarang" ).prop( "disabled", true );
		$( "#r_kemasankecil" ).prop( "disabled", true );	
		$( "#kemasankecil" ).prop( "disabled", true );	
		$( "#r_kemasansedang" ).prop( "disabled", true );
		$( "#kemasansedang" ).prop( "disabled", true );	
		$( "#r_kemasanbesar" ).prop( "disabled", true );
		$( "#kemasanbesar" ).prop( "disabled", true );	
		$( "#spesifikasi" ).prop( "disabled", true );
		$( "#tambah" ).prop( "disabled", true );
		$( "#hapus" ).prop( "disabled", true );
		$( "#catatan" ).prop( "disabled", true );
		$( "#simpan" ).prop( "disabled", true );
		$( "#batal" ).prop( "disabled", true );
		
		
	}
	$('#list_ku').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 1], "visible": true, "searchable": true
            },
            {
                "targets": [ 1], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_ku').click(function() {   
		dtrec = $('#list_ku').DataTable().row('.selected').data();
		$("#kepalaunit").val(dtrec[1]);
	}); 
	var cari_namabarang = {
        placeholder: "Cari Nama Barang...",
        minimumInputLength: 1,
         ajax: {	
				url: "../cari_namabarang/", 
				dataType: 'json',
				type:"POST", 
				data: function (term) {return term;},
				processResults: function (data, page) { return { results: data };}
        } 
    };
	$("#combo_namabarang").select2(cari_namabarang);
	
	$("#combo_namabarang").change(function () { 
		$.ajax({  datatype: "json",data:{id_master:$("#combo_namabarang").val()}, 
				url: "../get_namabarang/",
				async: false, type:'POST',
				success: function(data){ 
				var dt=JSON.parse(data);
				$("#label_kemasankecil").text(dt.satuan);$("#label_kemasansedang").text(dt.satuan);$("#label_kemasanbesar").text(dt.satuan);}, 
				error: function(){alert('Error Nih !!! ');}		
		});
	});
	
	$("#simpan").click(function() { 
	
		if ($("#r_kemasankecil" ).prop( "checked"))	{
			var quantity=$('#kemasankecil').val();			
		}else if( $("#r_kemasansedang" ).prop( "checked") )	{
			var	quantity=$('#kemasansedang').val();
		}else 	{
			var	quantity=$('#kemasanbesar').val();
		}
		
		if ($("#label_kemasankecil").text() == "[Kemasan Kecil]")	{
				alert("Pilih nama barang");
		}else if($("#spesifikasi").val() == "")	{
				alert("Masukan deskripsi spesifikasi");
		}else if($("#kepalaunit").val() == "")	{
				alert("Pilih kepala unit");
		}else {
				$.ajax({  datatype: "json",data:{
							norequest :$('#norequest').val(),
							namabarang :$('#combo_namabarang option:selected').text(),
							qty : quantity,
							satuan :$('#label_kemasankecil').text(),
							spesifikasi : $('#spesifikasi').val(),
							catatan: $('#catatan').val(), 
							kepalaunit :$('#kepalaunit').val()},
				url: "../simpan/",
				async: false, type:'POST',success: function(data){
				var dt=JSON.parse(data); $("#norequest").val(dt);
				iniDataPurchasing1();
				Clear();}, 
				error: function(){alert('Error Nih !!! ');}
					
				});					
		}
	});
	
	function iniDataPurchasing1(){
    $('#list_purchasing1').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataPurchasing1/", // json datasource
			type: "post",  // method  , by default get
			data:{noreq:$('#norequest').val()},
			error: function(){  // error handling
				$(".list_purchasing1-error").html("");
				$("#list_purchasing1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_purchasing1_processing").css("display","none");
							
			}
		}
	});		
	}
	
	$("#refresh").click(function() { 
		iniDataPurchasing2();
		$( "#printformpurcashe" ).prop( "disabled", false );
	});
	$("#printformpurcashe").click(function() { 
		print();
	});
	function iniDataPurchasing2(){
    $('#list_purchasing2').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:true, ordering:false, paging:true, pagelenght:10, searchAble:true,
		"ajax":{
			url :"../DataPurchasing2/", // json datasource
			type: "post",  // method  , by default get
			error: function(){  // error handling
				$(".list_purchasing2-error").html("");
				$("#list_purchasing2").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_purchasing2_processing").css("display","none");
							
			}
		}
	});		
	}
	
	$('#list_purchasing2').click(function() { 	
		dtrec = $('#list_purchasing2').DataTable().row('.selected').data();
		$( "#batalkanrequest" ).prop( "disabled", false );
    });
	
	$("#batalkanrequest").click(function() {
		if (confirm("Anda Yakin Membatalkan Request "+ dtrec[1]) == true) {
			
        $.ajax({  datatype: "json",data:{ no_req : dtrec[1] },
			url: "../updaterequest/",async: false, type:'POST',
					success: function(data){ var dt=JSON.parse(data);
				if (dt.length > 0){ 
					console.log(dt);
				}else{ alert("Request Telah Dibatalkan");}iniDataPurchasing2();
				}, error: function(){alert('Error Nih !!! ');}
		});			
		
		} 
		
	});
	
	$('#list_purchasing3').DataTable({
		paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
		"columnDefs": [
            {
                "targets": [ 10], "visible": true, "searchable": true
            },
            {
                "targets": [ 11], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_purchasing3').click(function() { 	
		dtrec = $('#list_purchasing3').DataTable().row('.selected').data();
		$("#label_kemasankecil").text(dtrec[3]);
		$("#label_kemasansedang").text(dtrec[3]);
		$("#label_kemasanbesar").text(dtrec[3]);
		$("#combo_namabarang").text(dtrec[2]);		
		$( "#tab1" ).addClass('active');	
		$( "#tab_1" ).addClass('active');	
		$( "#tab3" ).removeClass('active');	
		$( "#tab_3" ).removeClass('active');	
    });
	function print(){		
		window.open("../../../assets/jasper/reports/farmasi/purchasing/RequestFormPurchasing.php");   
	}
	
});	




</script>








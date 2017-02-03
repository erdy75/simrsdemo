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
		Setting Menu Makanan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">GIZI</a></li>
        <li class="active">Setting Menu Makanan</li>
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
							<div class="nav-tabs-custom" id="tab_dmm">
							
								<div class="col-sm-8">
									<div class="box-body">
										<div class="form-group">
											<div class="row">
												<div class="box-header with-border">
													<h3 class="box-title">Daftar Menu Makanan :</h3>
												</div><!-- /.box-header -->	
											</div>
											<table id="list_daftarmenu" class="table table-bordered table-hover display">
												<thead>
													<tr>
														<th></th>
														<th>Nama Menu</th>
														<th>Harga Persajian (Rp)</th>
														<th>Catatan</th>	
													</tr>
												</thead>
											</table>												
										</div>	
									</div>	
								</div>
								
								<div class="col-sm-4">
									<div class="box-body">
										<div class="form-group">
																
											<div class="row">	
												<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Kode Diet :</label>												
											</div>
											<div class="row">
												<div class="col-xs-1" >
													<textarea rows="7" cols="50" name="kodediet" id="kodediet" disabled=false></textarea>
												</div>
											</div>
											<div class="row">	
												<label for="inputEmail3" style="width:40%;" class="col-sm-2 control-label">Bahan Makanan :</label>												
											</div>
											<div class="row">
												<div class="col-xs-1" >
													<textarea rows="7" cols="50" name="bahanmakanan" id="bahanmakanan" disabled=false></textarea>
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
							<div class="nav-tabs-custom" id="tab_dmm2">
								
								<div class="col-sm-4">
									<div class="box-body">
										<div class="form-group">
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-3%;width:41%;" class="col-sm-2 control-label">Nama Menu</label>												
												<div class="col-lg-7" >
													<input type="text" class="form-control" name="namamenu" id="namamenu">
												</div>	
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-3%;width:41%;" class="col-sm-2 control-label">Harga Persajian (Rp)</label>												
												<div class="col-lg-6" >
													<input type="text" class="form-control" name="harga" id="harga" >
												</div>	
											</div>
											<div class="row">	
												<label for="inputEmail3" style="margin-left:-3%;width:41%;" class="col-sm-2 control-label">Catatan</label>												
												<div class="col-xs-1" >
													<textarea rows="4" cols="30" name="catatan" id="catatan" ></textarea>
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												<button type="button" style="margin-left:10%;" id="btn_tambah" class="btn btn-danger"><i class="fa fa-plus"></i>	 Tambah</button>
												<button type="button" style="margin-left:2%;" id="btn_ubah" class="btn btn-danger" disabled=false><i class="fa fa-pencil"></i>	 Ubah</button>
												<button type="button" style="margin-left:2%;" id="btn_hapus" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	 Hapus</button>	
												<button type="button" style="margin-left:2%;" id="btn_batal" class="btn btn-primary" ><i class="fa fa-reply"></i>	 Batal</button>												
											</div>
										</div>
										<div class="form-group">
											<div class="row">
												*) Pilih minimal 1 Diet dan 1 Bahan dalam Menu Makanan.
											</div>
										</div>
									</div>																						
								</div>
								
								<div class="col-sm-4">
									<div class="box-body">
										<div class="form-group">																
											<div class="row">	
												<label for="inputEmail3" style="width:40%;" class="col-sm-2 control-label">List Kode Diet :</label>												
											</div>	
											<div class="row">	
											<table id="list_kodediet" class="table table-bordered table-hover display">
												<thead>
													<tr>
														<th></th>
														<th>Nama Diet</th>
													</tr>
												</thead>
											</table>
											</div>
										</div>	
										<div class="form-group">
											<div class="row">	
												<label for="inputEmail3" style="" class="col-sm-2 control-label">Diet</label>
												<div id="tampildiet" class="col-lg-10" >
													<select class="col-sm-2 form-control"  name="combo_diet" id="combo_diet" style="width: 100%;"	>
														
													</select>																		
												</div>
											</div>																							
										</div>
										<div class="form-group">
											<div class="row">
												<button type="button" style="margin-left:20%;" id="btn_plusdiet" class="btn btn-primary" ><i class="fa fa-plus"></i>	 </button>
												<button type="button" style="margin-left:2%;" id="btn_mindiet" class="btn btn-danger" disabled=false><i class="fa fa-minus"></i>	 </button>												
											</div>
										</div>
									</div>																						
								</div>
								
								<div class="col-sm-4">
									<div class="box-body">
										<div class="form-group">
																
											<div class="row">	
												<label for="inputEmail3" style="width:50%;" class="col-sm-2 control-label">Daftar Bahan Makanan :</label>												
											</div>
											<div class="row">	
											<table id="list_daftarbahanmakanan" class="table table-bordered table-hover display">
												<thead>
													<tr>
														<th></th>
														<th>Nama Bahan</th>
													</tr>
												</thead>
											</table>
											</div>
										</div>
										<div class="form-group">
											<div class="row">	
												<label for="inputEmail3" style="" class="col-sm-2 control-label">Bahan</label>
												<div id="tampilbahan" class="col-lg-10" >
													<select class="col-sm-2 form-control"  name="combo_bahan" id="combo_bahan" style="width: 100%;"	>
														
													</select>																		
												</div>
											</div>	
										</div>
										<div class="form-group">
											<div class="row">
												<button type="button" style="margin-left:20%;" id="btn_plusbahan" class="btn btn-primary" ><i class="fa fa-plus"></i>	 </button>
												<button type="button" style="margin-left:2%;" id="btn_minbahan" class="btn btn-danger" disabled=false><i class="fa fa-minus"></i>	 </button>												
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
	
	$('#list_daftarmenu').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_kodediet').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });	
	$('#list_daftarbahanmakanan').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	ListDaftarMenu();	
	function ListDaftarMenu(){
    $('#list_daftarmenu').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:true, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataDaftarMenu/", // json datasource
			type: "post",  // method  , by default get
			error: function(){  // error handling
				$(".list_daftarmenu-error").html("");
				$("#list_daftarmenu").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_daftarmenu_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_daftarmenu').click(function() { 
		dtrec = $('#list_daftarmenu').DataTable().row('.selected').data();		
		$("#namamenu").val(dtrec[1]);
		$("#harga").val(dtrec[2]);
		$("#catatan").val(dtrec[3]);
		
		$("#namamenu").prop("disabled", true);
		$("#btn_tambah").prop("disabled", true);
		$("#btn_ubah").prop("disabled", false);
		$("#btn_hapus").prop("disabled", false);
		
		ListDiet();
		ListBahan();	
		ComboDiet();
		ComboBahan();
	});
	ComboDiet();
	function ComboDiet(){
		$.ajax({  
			data:{menu:$("#namamenu").val()}, 
			url: "../combo_diet/",
			async: false, type:'POST',
			success: function(data){ 
			$("#tampildiet").html(data);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	ComboBahan();
	function ComboBahan(){
		$.ajax({  
			data:{menu:$("#namamenu").val()}, 
			url: "../combo_bahan/",
			async: false, type:'POST',
			success: function(data){ 
			$("#tampilbahan").html(data);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#btn_batal").click(function(){
		$("#namamenu").val("");
		$("#harga").val("");
		$("#catatan").val("");
		
		$("#namamenu").prop("disabled", false);
		$("#btn_tambah").prop("disabled", false);
		$("#btn_ubah").prop("disabled", true);
		$("#btn_hapus").prop("disabled", true);
		
		ListDaftarMenu();
		ListDiet();
		ListBahan();
		
	});
	/*$("#btn_plusdiet").click(function(){
		var text = $("#listkodediet").val() + '\n' + $("#combo_diet").val();
		$("#listkodediet").val(text);
	});*/
	
	$("#btn_tambah").click(function(){
		$.ajax({  datatype: "json",data:{
						nama_menu: $('#namamenu').val(),
						harga: $('#harga').val(),
						cat: $('#catatan').val()},
				url: "../TambahMenu/",
				async: false, type:'POST',success: function(data){alert('Menu Makanan telah berhasil ditambah.');
				ListDaftarMenu();
				$("#btn_tambah").prop("disabled", true);
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
	});
	$("#btn_ubah").click(function(){
		$.ajax({  datatype: "json",data:{
						nama_menu: $('#namamenu').val(),
						harga: $('#harga').val(),
						cat: $('#catatan').val()},
				url: "../UbahMenu/",
				async: false, type:'POST',success: function(data){alert('Menu Makanan telah berhasil diubah.');
				$("#namamenu").val("");$("#harga").val("");$("#catatan").val("");
				$("#btn_tambah").prop("disabled", false);
				$("#btn_ubah").prop("disabled", true);
				$("#btn_hapus").prop("disabled", true);
				ListDaftarMenu();ListDiet();ListBahan();				
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
	});
	$("#btn_hapus").click(function(){
		if (confirm("Anda yakin akan Menghapus Menu "+dtrec[1]+" ?") == true) {			
		$.ajax({  datatype: "json",data:{nama_menu: dtrec[1]},
			url: "../HapusMenu/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert("Menu "+dtrec[1]+" telah berhasil dihapus." );
			ListDaftarMenu();ListDiet();ListBahan();
			$("#namamenu").val("");$("#harga").val("");$("#catatan").val("");
			$("#namamenu").prop("disabled", false);
			$("#btn_tambah").prop("disabled", false);
			$("#btn_ubah").prop("disabled", true);
			$("#btn_hapus").prop("disabled", true);}
			}, error: function(){alert('Error Nih !!!');}
		});			
		
		} 
	});
	
	$("#btn_plusdiet").click(function(){
		if($("#namamenu").val() == ""){
			alert("Masukan terlebih dahulu Menu Makanan");
		}else{
		$.ajax({  datatype: "json",data:{
						namamenu: $('#namamenu').val(),
						diet: $('#combo_diet option:selected').text()},
				url: "../TambahDiet/",
				async: false, type:'POST',success: function(data){//alert('Menu Diet telah ditambah.');
				ListDiet();	
				ComboDiet()			
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	function ListDiet(){
    $('#list_kodediet').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataDiet/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama_menu:$('#namamenu').val() },
			error: function(){  // error handling
				$(".list_kodediet-error").html("");
				$("#list_kodediet").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_kodediet_processing").css("display","none");
							
			}
		}
	});		
	}
	$('#list_kodediet').click(function() { 
		dtrec = $('#list_kodediet').DataTable().row('.selected').data();		
		$("#btn_mindiet").prop("disabled", false);
	});
	$("#btn_mindiet").click(function(){
		$.ajax({  datatype: "json",data:{nama_menu: $('#namamenu').val(),diet: dtrec[1]},
			url: "../HapusDiet/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{
			ListDiet();
			ComboDiet();}
			}, error: function(){alert('Error Nih !!!');}
		});			
		
	});
	
	$("#btn_plusbahan").click(function(){
		if($("#namamenu").val() == ""){
			alert("Masukan terlebih dahulu Menu Makanan");
		}else{
		$.ajax({  datatype: "json",data:{
						namamenu: $('#namamenu').val(),
						bahan: $('#combo_bahan option:selected').text()},
				url: "../TambahBahan/",
				async: false, type:'POST',success: function(data){//alert('Menu Bahan telah ditambah.');
				ListBahan();
				ComboBahan();			
				var dt=JSON.parse(data); }, 					   
				error: function(){alert('Error Nih !!! ');}					
			});	
		}
	});
	function ListBahan(){
    $('#list_daftarbahanmakanan').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataBahan/", // json datasource
			type: "post",  // method  , by default get
			data:{ nama_menu:$('#namamenu').val() },
			error: function(){  // error handling
				$(".list_daftarbahanmakanan-error").html("");
				$("#list_daftarbahanmakanan").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_daftarbahanmakanan_processing").css("display","none");
			}
			,dataSrc : function(json) {var dt = json.data; $("#bahanmakanan").val(dt+"\n"); return json.data;}
			/*,dataSrc : function(json) {var dt = json.data; drt='';
				for ( a	=1; a<dt.length; a++){
					var i = a;
					$("#bahanmakanan").val(drt+dt[a]+"\n");
					drt = $("#bahanmakanan").val();
				}
			return json.data;}*/
		}
	});		
	}
	$('#list_daftarbahanmakanan').click(function() { 
		dtrec = $('#list_daftarbahanmakanan').DataTable().row('.selected').data();		
		$("#btn_minbahan").prop("disabled", false);
	});
	$("#btn_minbahan").click(function(){
		$.ajax({  datatype: "json",data:{nama_menu: $('#namamenu').val(),bahan: dtrec[1]},
			url: "../HapusBahan/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{
			ListBahan();
		    ComboBahan();}
			}, error: function(){alert('Error Nih !!!');}
		});			
		
	});
	
	
	//example
	function arrangeSno(){
        var i=0;
            $('#pTable tr').each(function() {
                $(this).find(".sNo").html(i); 
                i++;
            });
	}
	$(document).ready(function(){
		$('#addButId').click(function(){
			
			var sno = $('#pTable tr').length;
				trow = 	"<tr><td class='sNo'>"+sno+"</td>"+
						"<td><input name='pName' id='pName' type='text' disabled='false'></td>"+
						"<td><button type='button' class='rButton' >	X</button></td></tr>";
					
					var isi = $("#combo_bahan option:selected").text();	
					$("#pName").val(isi);
					$('#pTable').append(trow);
					//$("#pName").val($("#combo_bahan option:selected").text());	
		});
	});
	$(document).on('click', 'button.rButton', function () {
		$(this).closest('tr').remove();
			arrangeSno();
		return false;
	});
	
	//pairwan
	/*$("#btn_plusdiet").click(function(){
		
		var myarr = $("#combo_diet option:selected");
		var table = $("#list_kodediet").DataTable();
		table
			.clear()
			.draw();
		//for ( a =1 ; a <  myarr.length; a++) {
		//	var nama = myarr[a]; //var obat=namas[0].split(":");
			table.row.add(	{ "0" :	"", "1": $("#combo_diet option:selected").text()}	).draw();
			
		//}
	});*/
		
});	



</script>








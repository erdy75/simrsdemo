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
        Penyerahan Obat
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FARMASI</a></li>
        <li class="active">Penyerahan Obat</li>
    </ol>
</section>

<!-- Main content -->

<section class="content">
    <!-- Default box -->
    <div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">				
				</div><!-- /.box-header -->
				
				<div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="nav-tabs-custom" id="tab_setfeedokter">
								<div class="col-sm-6">
									<div class="form-group">
										<div class="row">	
											<label for="inputEmail3" style="margin-left:2%;" class="col-sm-2 control-label">Pencarian </label>
											<div class="col-lg-6" >
												<input type="text" class="form-control" name="cari" id="cari" placeholder="Masukkan No Kwitansi / Nama ...">
											</div>
												<button type="button"  id="search" class="btn btn-danger"><i class="fa fa-search"></i>	Search</button>							
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<table id="list_datafaktur" class="table table-bordered table-hover display">
													<thead>
														<tr>
														<th></th>
														<th>No Faktur</th>
														<th>Tanggal/Jam</th>
														<th>Nama Pasien</th>
														<th>No RM</th>
														<th>No Ref</th>
														</tr>
													</thead>
												</table>
											</div>
										</div>
									</div>
									
								</div>
								<div class="col-sm-6">
									<div class="form-group">				
										<div class="row">	
											<label for="inputEmail3" style="margin-left:10px;width:110px;" class="col-sm-2 control-label">No Kwitansi</label>
											<div class="col-lg-4" >
											<input type="text" class="form-control" name="nokwitansi" id="nokwitansi" disabled=false>
											</div>
										</div>	
										<div class="row">	
											<label for="inputEmail3" style="margin-left:10px;width:110px;" class="col-sm-2 control-label">Pasien</label>
												<div class="col-lg-4" >
												<input type="text" class="form-control" name="norm" id="norm" disabled=false>
											</div>
											<div class="col-lg-5" >
												<input type="text" class="form-control" name="namapasien" id="namapasien" disabled=false>
											</div>
										</div>
									</div>
									<div class="form-group">				
										<div class="row">	
											<button style="margin-left:22%;" type="button" id="serahkanobat" disabled=false class="btn btn-danger"><i class="fa fa-share-square-o"></i>	Serahkan Obat</button>
											<button style="margin-left:1%;" type="button" id="batal" disabled=false class="btn btn-danger"><i class="fa fa-reply"></i>	Batal</button>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											*) Petugas Penyerahan Obat wajib memastikan Pasien, Kwitansi dan Obat yang diserahkan sudah Benar.				
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-md-12">
												<table id="list_detailfaktur" class="table table-bordered table-hover display">
													<thead>
														<tr>
														<th></th>
														<th>Nama Item</th>
														<th>Harga</th>
														<th>Kuantitas</th>
														<th>Sub Total (Rp)</th>
														<th>Disc</th>
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
<script src="../../../assets/DataTables/js/dataTables.select.min.js"></script>
<script src="../../../assets/select2/dist/js/select2.js"></script>
<script src="../../../assets/Select-master/js/dataTables.select.js"></script>
<script src="../../../assets/DataTables/js/dataTables.tableTools.js"></script>
<script type="text/javascript">

	
	var dtrec;	
	
	
$(function () {		
	
	$('#list_datafaktur').DataTable({
		paging: true, lengthChange:false , searching: true,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$(document).ready(function(){
		$("#cari").keyup(function(){
			iniDataFaktur();
		});
	});
	$("#search").click(function() {
		iniDataFaktur();
	});	
		
	function iniDataFaktur(){
    $('#list_datafaktur').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataFaktur/", // json datasource
			type: "post",  // method  , by default get
			data:{carinokw:$('#cari').val()},
			error: function(){  // error handling
				$(".list_datafaktur-error").html("");
				$("#list_datafaktur").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_datafaktur_processing").css("display","none");
							
			}
		}
	});		
	}	
	
	function iniDetailFaktur(nofaktur){
    $('#list_detailfaktur').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:false, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataDetail/", // json datasource
			type: "post",  // method  , by default get
			data:{no_faktur : nofaktur},
			error: function(){  // error handling
				$(".list_detailfaktur-error").html("");
				$("#list_detailfaktur").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_detailfaktur_processing").css("display","none");
				}
			}
		});		
	}
		
	$('#list_datafaktur').click(function() { 	
		dtrec = $('#list_datafaktur').DataTable().row('.selected').data();
		iniDetailFaktur(dtrec[1]);		
		$("#nokwitansi").val(dtrec[1]);
		$("#norm").val(dtrec[4]);
		$("#namapasien").val(dtrec[3]);
		
		$( "#serahkanobat" ).prop( "disabled", false );
		$( "#batal" ).prop( "disabled", false );
    });
	
	$("#serahkanobat").click(function() {
		if (confirm("Anda Yakin Menyerahkan Obat Untuk Kwitansi "+ dtrec[1]) == true) {
			
        $.ajax({  datatype: "json",data:{ no_fak : dtrec[1] },
			url: "../update/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Obat Sudah Diserahkan');}
			}, error: function(){alert('Error Nih !!! ');}
		});			
		iniDataFaktur();
		ClearData();
		
		} 
		
	});
	
	$("#batal").click(function() {
		ClearData();
	});
	
	function ClearData(){
		$("#nokwitansi").val("");
		$("#norm").val("");
		$("#namapasien").val("");
		$( "#serahkanobat" ).prop( "disabled", true );
		$( "#batal" ).prop( "disabled", true );
		iniDetailFaktur('no');	
	}
	
	
});	
</script>
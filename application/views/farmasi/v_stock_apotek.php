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
		Form Stock Apotek
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FARMASI</a></li>
        <li class="active">Stock Apotek</li>
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
							<div class="box-body">												
								<div class="form-group">	
									<div class="row">
										<label for="inputEmail3" style="margin-left:25px;width:150px;" class="col-sm-2 control-label">Cari Nama Barang</label>
										<div class="row">
											<div class="col-lg-2" >
												<select class="col-sm-2 form-control" name="combo_pencarian" id="combo_pencarian" style="width:100%;">
													<option>Rawat Jalan</option>
													<option>Rawat Inap</option>
												</select>
											</div>
											<div class="col-lg-2" >
												<input type="text" style="margin-left:px;" class="form-control"  name="carinamabarang" id="carinamabarang" >																	
											</div>
												<button type="button" id="btn_carinamabarang" class="btn btn-primary"><i class="fa fa-search"></i>	Cari</button>
												<button type="button" id="btn_Print" class="btn btn-danger" disabled=false ><i class="fa fa-print"></i>	Cetak</button>
										</div>
									</div>
								</div>																							
								<div class="form-group">
									<div class="row">
										<div class="box-body">
											<div class="col-md-12">
												<table id="list_stockbarang" class="table table-bordered table-hover display"	>
													<thead>
														<tr>
														<th></th>
														<th>Nama</th>
														<th>Jumlah</th>
														<th>Limit</th>
														<th>Kemasan</th>
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
	
	$("#list_stockbarang").DataTable({
		paging: true, lenghtChange: false, searching: false, ordering: false, info: true, autoWidth: false, select: true,
		order:	[1, 'asc'], dom: 'T<"clear">lfrtip',
		tableTools: {
			sRowSelect:		'os', sRowSelector: 'td:first-child',aButtons: 	[	]
		}
	});
	$("#combo_pencarian").change(function () {       
		ListStockBarang();  
    });
	$("#btn_carinamabarang").click(function () {       
		ListStockBarang();  
    });
	$(document).ready(function(){
		$("#carinamabarang").keyup(function(){
			ListStockBarang();
		});
	});
	function ListStockBarang(){
    $('#list_stockbarang').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false,  paging:true, pagelenght:10,
		"ajax":{
			url :"../DataStockBarang/", // json datasource
			type: "post",  // method  , by default get
			data:{perawatan:$('#combo_pencarian').val(), cari_namabarang:$('#carinamabarang').val()},
			error: function(){  // error handling
				$(".list_stockbarang-error").html("");
				$("#list_stockbarang").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_stockbarang_processing").css("display","none");
							
			}
		}
	});		
	}
	
	$('#list_stockbarang').click(function() { 
		dtrec = $('#list_stockbarang').DataTable().row('.selected').data();		
		$("#btn_Print").prop("disabled", false);
		
    });
	$("#btn_Print").click(function () {       
		if ($( "#combo_pencarian" ).val() =='Rawat Jalan'){
			printRajal();
		}else if ($( "#combo_pencarian" ).val() =='Rawat Inap'){
			printRanap();
		}else{
			
		}        
    });
	function printRajal(){	
		var win = "../../../assets/jasper/reports/farmasi/stock/StockRajal.php?namabarang="+dtrec[1]+"";
		window.open(win);	
	}		
	function printRanap(){		
		var win = "../../../assets/jasper/reports/farmasi/stock/StockRanap.php?namabarang="+dtrec[1]+"";
		window.open(win);	
	}
	
		
});	




</script>








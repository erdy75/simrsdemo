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
		Transaksi SIA
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li><a href="#">FISIOTERAPI</a></li>
        <li class="active">Transaksi SIA</li>
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
							<div class="nav-tabs-custom" id="tab_transaksi_sia">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#tab_1" data-toggle="tab">BKK - BKM</a></li>
									<li><a href="#tab_2" data-toggle="tab">Jurnal Umum</a></li>
								</ul>	
							
								<div class="tab-content">
									<div class="tab-pane active" id="tab_1" style="position: relative; ">
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-7">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" class="col-sm-2 control-label">Transaksi</label>
															<div class="col-lg-5" >
																<select class="col-sm-2 form-control"  name="combo_transaksi" id="combo_transaksi" style="width: 100%;"	>
																	<option selected="selected">== PILIH ==</option>
																	<?php foreach ($dt_namakas as $namakas) { ?>	
																		<option value="<?php echo $namakas["kas"]; ?>"><?php echo $namakas["kas"]; ?></option>
																	<?php } ?>
																</select>																		
															</div>																	
																<label for="inputEmail3" style="margin-left:-2%;color:purple;" name="creditdebet1" id="creditdebet1" class="col-sm-2 control-label">?</label>	
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label"></label>
															<div class="col-lg-2" >
																<input type="text" class="form-control" name="kodetransaksi" id="kodetransaksi" disabled=false>
															</div>
															<div class="col-lg-5" >
																<input type="text" style="margin-left:-6%;" class="form-control" name="namatransaksi" id="namatransaksi" disabled=false>
															</div>
																<button type="button" style="margin-left:-3%;" id="btn_baru" class="btn btn-primary" ><i class="fa fa-share-square-o"></i>	Baru</button>	
														</div>		
													</div>													
												</div>
												
												<div class="col-sm-6">
													<div class="box-body">
														<div class="form-group">
															<div class="row">															
																<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">No BKK/BKM</label>
																<div class="col-lg-5" >
																	<input type="text" style="margin-left:1px;" class="form-control" name="nobkk" id="nobkk" >
																</div>																	
																	<button type="button" id="btn_koreksi" class="btn btn-primary" ><i class="fa fa-check"></i>	 Koreksi</button>																															
															</div>
															<div class="row">	
																<label for="inputEmail3" style="width:12%;" class="col-sm-2 control-label">Tanggal</label>
																<div class="col-lg-1" >
																	<input type="checkbox" style="margin-left:20px;width:25px;" name="cek_tglbkk" id="cek_tglbkk" >
																</div>
																<div class="col-lg-5" >
																	<div class="input-group" >
																		<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																		<input type="text" style="width:100%;" name="tglbkk" id="tglbkk"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																	</div> 
																</div>
															</div>
															<div class="row">
																<label for="inputEmail3" style="width:20%;" name="kepada_dari" id="kepada_dari" class="col-sm-2 control-label">Kepada_Dari</label>
																<div class="col-lg-7" >
																	<input type="text" style="margin-left:1px;" class="form-control" name="kepadadari" id="kepadadari" >
																</div>																
															</div>	
															<div class="row">
																<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Uraian</label>
																<div class="col-xs-1" >
																	<textarea style="margin-left:1px;" rows="2" cols="43" name="uraianbkk" id="uraianbkk"  ></textarea>
																</div>																	
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-sm-6">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label"></label>
																<div class="col-lg-4" >
																	<input type="hidden" class="form-control" name="idjurnal" id="idjurnal" >
																</div>																
															</div>
															<div class="row">
																<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Nama Penerima</label>
																<div class="col-lg-6" >
																	<input type="text" class="form-control" name="namapenerima" id="namapenerima" >
																</div>																
															</div>	
															<div class="row">
																<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Nama Pembukuan</label>
																<div class="col-lg-7" >
																	<input type="text" class="form-control" name="namapembukuan" id="namapembukuan" >
																</div>																
															</div>
															<div class="row">
																<label for="inputEmail3" style="width:25%;" class="col-sm-2 control-label">Nama Mengetahui</label>
																<div class="col-lg-7" >
																	<input type="text" class="form-control" name="namamengetahui" id="namamengetahui" >
																</div>																
															</div>	
															<div id="showdata" style="display:none;"><!--data maxi-->		
															</div>
														</div>
													</div>
												</div>
												
												<div class="col-sm-12">
													<div class="box-body">
														<div class="form-group">
															<div class="row">
																<div class="box-body">
																	<div class="col-md-15">
																		<table id="list_bkk" class="table table-bordered table-hover display">
																			<thead>
																				<tr>
																					<th></th>
																					<th>Rincian</th>
																					<th>Nilai (Rp)</th>
																					<th>Remark</th>																	
																					<th>Kode</th>		
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
												
												<div class="col-sm-7">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" class="col-sm-2 control-label">Aktivitas</label>
															<div class="col-lg-6" id="tampilaktivitas" >
																<select class="col-sm-2 form-control"  name="combo_aktivitas" id="combo_aktivitas" style="width: 100%;"	>
																	<option selected="selected">== PILIH ==</option>
																	<!--<?php foreach ($dt_namaaktivitas as $namaaktivitas) { ?>
																		<option value="<?php echo $namaaktivitas["aktivitas"]; ?>"><?php echo $namaaktivitas["aktivitas"]; ?></option>
																	<?php } ?>-->
																</select>																		
															</div>																	
																<label for="inputEmail3" style="margin-left:-2%;color:purple;" name="creditdebet2" id="creditdebet2" class="col-sm-2 control-label">?</label>	
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label"></label>
															<div class="col-lg-2" >
																<input type="text" class="form-control" name="kodeaktivitas" id="kodeaktivitas" disabled=false>
															</div>
															<div class="col-lg-6" >
																<input type="text" style="margin-left:-6%;" class="form-control" name="namaaktivitas" id="namaaktivitas" disabled=false>
															</div>
														</div>	
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Rincian</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="rincian" id="rincian" >
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Nilai (Rp)</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" name="nilaibkk" id="nilaibkk" min=1>
															</div>
															<label for="inputEmail3" style="margin-left:-3%;" class="col-sm-2 control-label">,00</label>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Remark</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="remarkbkk" id="remarkbkk" >
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:19%;" id="btn_simpan" class="btn btn-danger" disabled=false><i class="fa fa-save"></i>	Simpan</button>														
															<button type="button" style="margin-left:1%;" id="btn_hapusbkk" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Hapus</button>		
															<button type="button" style="margin-left:1%;" id="btn_batal" class="btn btn-danger" disabled=false><i class="fa fa-reply"></i>	Batal</button>											
														</div>																								
													</div>													
												</div>
												<div class="col-sm-5">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="font-size:25px;width:20%;" class="col-sm-2 control-label">Total :</label>
															<label for="inputEmail3" style="font-size:25px;width:50%;color:purple;" id="total" class="col-sm-2 control-label">Rp 0,-</label>
															
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="tab_2" style="position: relative; ">									
										<div class="box-body">					
											<div class="row">
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
															<label for="inputEmail3" style="font-size:25px;width:20%;color:purple;" class="col-sm-2 control-label">DEBIT</label>
															
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Kode Akun</label>
															<div class="col-lg-2" >
																<input type="text" class="form-control" name="kodeakundebit" id="kodeakundebit" >
															</div>
															<div class="col-lg-6" >
																<input type="text" style="margin-left:-6%;" class="form-control" name="namaakundebit" id="namaakundebit" >
															</div>
																<button type="button" data-toggle="modal" data-target="#ModalDebit" style="margin-left:-4%;" id="btn_cariakundebit" class="btn btn-primary" ><i class="fa fa-search"></i>	</button>
															
																<div class="modal fade" id="ModalDebit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog" style="width:800px">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
																			</div>
																			<div class="modal-body">
																				<table id="list_coadebit" class="table table-bordered table-hover display">
																					<thead>
																					  <tr>
																						<th></th>
																						<th>Kode Akun</th>
																						<th>Nama Akun</th>
																						<th>Neraca/Rugi Laba</th>
																						<th>Level</th>
																						<th>Rekap</th>
																					  </tr>
																					</thead>
																					<tbody>
																						 <?php foreach ($dt_coas as $dt_coa) { ?>
																						  <tr>
																							<td> </td>
																							<td><?php echo $dt_coa['kode']; ?></td>
																							<td><?php echo $dt_coa['nama']; ?></td>
																							<td><?php echo $dt_coa['NR_RL']; ?></td>
																							<td><?php echo $dt_coa['level']; ?></td>
																							<td><?php echo $dt_coa['isRekap']; ?></td>
																						  </tr>
																						<?php } ?>
																					</tbody>
																				</table>                                    
																			</div>
																		</div>
																	</div>
																</div>
															
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Remark</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="remarkdebit" id="remarkdebit" >
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Nilai (Rp)</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" name="nilaidebit" id="nilaidebit" >
															</div>
															<label for="inputEmail3" style="margin-left:-3%;" class="col-sm-2 control-label">,00</label>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label"></label>
															<div class="col-lg-3" >
																<input type="hidden" class="form-control" name="idjurnalumum" id="idjurnalumum" >
															</div>
														</div>
													</div>
																									
												</div>
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">															
															<label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
															<label for="inputEmail3" style="font-size:25px;width:20%;color:purple;" class="col-sm-2 control-label">CREDIT</label>
															
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Kode Akun</label>
															<div class="col-lg-2" >
																<input type="text" class="form-control" name="kodeakuncredit" id="kodeakuncredit" >
															</div>
															<div class="col-lg-6" >
																<input type="text" style="margin-left:-6%;" class="form-control" name="namaakuncredit" id="namaakuncredit" >
															</div>
																<button type="button" data-toggle="modal" data-target="#ModalCredit" style="margin-left:-4%;" id="btn_cariakuncredit" class="btn btn-primary" ><i class="fa fa-search"></i>	</button>
															
																<div class="modal fade" id="ModalCredit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																	<div class="modal-dialog" style="width:800px">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h4 class="modal-title" id="myModalLabel">Chart Of Account (COA)</h4>
																			</div>
																			<div class="modal-body">
																				<table id="list_coacredit" class="table table-bordered table-hover display">
																					<thead>
																					  <tr>
																						<th></th>
																						<th>Kode Akun</th>
																						<th>Nama Akun</th>
																						<th>Neraca/Rugi Laba</th>
																						<th>Level</th>
																						<th>Rekap</th>
																					  </tr>
																					</thead>
																					<tbody>
																						 <?php foreach ($dt_coas as $dt_coa) { ?>
																						  <tr>
																							<td> </td>
																							<td><?php echo $dt_coa['kode']; ?></td>
																							<td><?php echo $dt_coa['nama']; ?></td>
																							<td><?php echo $dt_coa['NR_RL']; ?></td>
																							<td><?php echo $dt_coa['level']; ?></td>
																							<td><?php echo $dt_coa['isRekap']; ?></td>
																						  </tr>
																						<?php } ?>
																					</tbody>
																				</table>                                    
																			</div>
																		</div>
																	</div>
																</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Remark</label>
															<div class="col-lg-5" >
																<input type="text" class="form-control" name="remarkcredit" id="remarkcredit" >
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" class="col-sm-2 control-label">Nilai (Rp)</label>
															<div class="col-lg-3" >
																<input type="number" class="form-control" name="nilaicredit" id="nilaicredit" >
															</div>
															<label for="inputEmail3" style="margin-left:-3%;" class="col-sm-2 control-label">,00</label>
														</div>
													</div>
																									
												</div>
												
												<div class="col-sm-12">
													<div class="form-group">
														<div class="row">
															<div class="box-body">
																<div class="col-md-15">
																	<table id="list_jurnal" class="table table-bordered table-hover display">
																		<thead>
																			<tr>
																				<th></th>
																				<th>Kode</th>
																				<th>Uraian</th>
																				<th>Debit</th>	
																				<th>Credit</th>
																			</tr>
																		</thead>
																		<tbody>
																	</table>												
																</div>								
															</div>									
														</div>
													</div>
												</div>
												
												<div class="col-sm-6">
													<div class="form-group">
														<div class="row">	
															<label for="inputEmail3" style="width:12%;" class="col-sm-2 control-label">Tanggal</label>
															<div class="col-lg-1" >
																<input type="checkbox" style="margin-left:20px;width:25px;" name="cek_tgljurnal" id="cek_tgljurnal" >
															</div>
															<div class="col-lg-4" >
																<div class="input-group" >
																	<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
																	<input type="text" style="width:100%;" name="tgljurnal" id="tgljurnal"  class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" tgl-mask>
																</div> 
															</div>
														</div>
														<div class="row">
															<label for="inputEmail3" style="width:20%;" class="col-sm-2 control-label">Uraian</label>
															<div class="col-xs-1" >
																<textarea  style="margin-left:10%;" rows="2" cols="43" name="uraianjurnal" id="uraianjurnal"  ></textarea>
															</div>
														</div>
													</div>
													<div class="form-group">
														<div class="row">															
															<button type="button" style="margin-left:23%;" id="btn_posting" class="btn btn-danger" disabled=false><i class="fa fa-sign-in"></i>	Posting Jurnal</button>															
															<button type="button" style="margin-left:1%;" id="btn_hapusjurnal" class="btn btn-danger" disabled=false><i class="fa fa-times"></i>	Hapus Jurnal</button>	
															<button type="button" style="margin-left:1%;" id="btn_batalposting" class="btn btn-danger" ><i class="fa fa-reply"></i>	Batal Posting</button>												
														</div>																								
													</div>	
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="font-size:20px;width:22%;" class="col-sm-2 control-label">Debet:</label>
															<label for="inputEmail3" style="font-size:20px;width:50%;color:purple;" id="totaldebet" class="col-sm-2 control-label">Rp 0,-</label>
														</div>
													</div>
												</div>
												<div class="col-sm-3">
													<div class="form-group">
														<div class="row">
															<label for="inputEmail3" style="font-size:20px;width:22%;" class="col-sm-2 control-label">Credit:</label>
															<label for="inputEmail3" style="font-size:20px;width:50%;color:purple;" id="totalcredit" class="col-sm-2 control-label">Rp 0,-</label>
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
<script src="../../../assets/AdminLTE-2.0.5/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="../../../assets/DataTables/js/dataTables.select.min.js"></script>
<script src="../../../assets/select2/dist/js/select2.js"></script>
<script src="../../../assets/Select-master/js/dataTables.select.js"></script>
<script src="../../../assets/DataTables/js/dataTables.tableTools.js"></script>
<script type="text/javascript">

	
	var dtrec;	
	
$(function () {	
	
	$("#datemask").inputmask("yyyy/mm/dd", {"placeholder": "yyyy/mm/dd"});
	$("[tgl-mask]").inputmask();
	
	$('#list_bkk').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	$('#list_jurnal').DataTable({
		paging: true, lengthChange:false , searching: false,ordering: false,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',		
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });
	ComboAktivitas();
	function ComboAktivitas(){
		$.ajax({  
			data:{nokas:$("#nobkk").val()}, 
			url: "../combo_transaksi/",
			async: false, type:'POST',
			success: function(data){ 
			$("#tampilaktivitas").html(data);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
		
	function DataTransaksi(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_transaksi option:selected").text()}, 
			url: "../get_transaksi/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#creditdebet1").text(dt.DEBET_CREDIT);$("#kodetransaksi").val(dt.kode_COA);$("#namatransaksi").val(dt.nama);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_transaksi").change(function () { 
		if($("#combo_transaksi option:selected").text() == "== PILIH =="){
			$("#creditdebet1").text("?");
			$("#kodetransaksi").val("");
			$("#namatransaksi").val("");	
		}else{
			DataTransaksi();	
		}
		if($("#creditdebet1").text() == "CREDIT"){
			$("#kepada_dari").text("Dibayar Ke");
		}else{
			$("#kepada_dari").text("Diterima Dari");
		}
	});	
	
	//data ada di controlller
	/*function DataAktivitas(){
		$.ajax({  datatype: "json",
			data:{id_master:$("#combo_aktivitas option:selected").text()}, 
			url: "../get_aktivitas/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#creditdebet2").text(dt.DEBET_CREDIT);$("#kodeaktivitas").val(dt.kode_COA);$("#namaaktivitas").val(dt.nama);}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$("#combo_aktivitas").change(function () { 
		if($("#combo_aktivitas option:selected").text() == "== PILIH =="){
			$("#creditdebet2").text("?");
			$("#kodeaktivitas").val("");
			$("#namaaktivitas").val("");			
			$("#rincian").val("");
		}else{
			DataAktivitas();
			$("#rincian").val($("#combo_aktivitas option:selected").text());
		}
		
		
	});*/	
	
	$("#btn_baru").click(function () { 
		if($("#creditdebet1").text() == "?"){
			alert("Pilih jenis Transaksi !")
		}else{			
			$("#combo_transaksi").prop("disabled", true);
			$("#btn_baru").prop("disabled", true);
			$("#btn_simpan").prop("disabled", false);
			$("#btn_batal").prop("disabled", false);
			$("#btn_koreksi").prop("disabled", true);
			$("#nobkk").prop("disabled", true);			
			
			$("#nobkk").val("~Auto Number~");
		}
	});	
	$("#btn_batal").click(function(){
		ClearBKK();
	});
	function ClearBKK(){
		$("#combo_transaksi").prop("disabled", false);
		$("#btn_baru").prop("disabled", false);
		$("#btn_simpan").prop("disabled", true);
		$("#btn_batal").prop("disabled", true);
		$("#btn_koreksi").prop("disabled", false);
		$("#nobkk").prop("disabled", false);			
		
		$("#combo_transaksi").val("== PILIH ==");
		$("#combo_aktivitas").val("== PILIH ==");
		$("#nobkk").val("");
		$("#tglbkk").val("");
		$("#kepadadari").val("");
		$("#uraianbkk").val("");
		$("#namapenerima").val("");
		$("#namapembukuan").val("");
		$("#namamengetahui").val("");
		$("#nilaibkk").val("");
		$("#remarkbkk").val("");
		
		ListBKK();
		DataTotal();
		ComboAktivitas();
		
		$("#total").text("Rp 0,00-");
	}
	
	$("#btn_simpan").click(function(){
		if($("#creditdebet1").text() == $("#creditdebet2").text() )	{
			alert("Aktivitas dan Transaksi sama jenisnya ("+$("#creditdebet1").text()+"), ulangi dengan jenis yang berbeda");
		}else if($("#combo_transaksi option:selected").text() == "== PILIH =="  )	{
			alert("Pilih jenis Traansaksi");
		}else if($("#combo_aktivitas option:selected").text() == "== PILIH =="  )	{
			alert("Pilih jenis Aktifitas");
		}else if($("#tglbkk").val() == ""  )	{
			alert("Masukan tanggal transaksi");
		}else if($("#nilaibkk").val() == ""  )	{
			alert("Masukan Nilai (Rp)");
		}else{
			$.ajax({  datatype: "json",data:{
								transaksi :$('#combo_transaksi option:selected').text(),
								creditdebet :$('#creditdebet1').text(),
								kodetransaksi :$('#kodetransaksi').val(),
								nobkk :$('#nobkk').val(),
								idjurnal :$('#idjurnal').val(),
								tglbkk : $('#tglbkk').val(),
								kpddari: $('#kepadadari').val(),
								uraian: $('#uraianbkk').val(),  
								npenerima :$('#namapenerima').val(),
								npembukuan: $('#namapembukuan').val(),
								nmengetahui: $('#namamengetahui').val(),  
								aktivitas :$('#combo_aktivitas option:selected').text(),
								kodeaktivitas :$('#kodeaktivitas').val(),
								nilaibkk :$('#nilaibkk').val(),
								remark :$('#remarkbkk').val()				
								},
					url: "../Simpan/",
					async: false, type:'POST',success: function(data){alert("Transaksi "+$('#combo_transaksi option:selected').text()+" berhasil disimpan.");
					$("#showdata").html(data); 					
					ListBKK();
					DataTotal();
					ComboAktivitas();
					$("#combo_aktivitas").val("== PILIH ==");
					$("#kodeaktivitas").val("");
					$("#namaaktivitas").val("");
					$("#rincian").val("");
					$("#nilaibkk").val("");
					$("#remarkbkk").val("");}, 
					error: function(){alert('Error Nih !!! ');}		
			});
		}
	});
	function ListBKK(){
    $('#list_bkk').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataBKK/", // json datasource
			type: "post",  // method  , by default get
			data:{no_kas:$('#nobkk').val()},
			error: function(){  // error handling
				$(".list_bkk-error").html("");
				$("#list_bkk").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_bkk_processing").css("display","none");
							
			}
		}
	});		
	}
	function DataTotal(){
		$.ajax({  datatype: "json",
			data:{ no_kas:$("#nobkk").val() }, 
			url: "../get_total/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#total").text('Rp '+dt.total+' ,00-');}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$('#list_bkk').click(function() { 
		dtrec = $('#list_bkk').DataTable().row('.selected').data();			
		$("#btn_hapusbkk").prop("disabled", false);		
	});
	$("#btn_hapusbkk").click(function(){				
		$.ajax({  datatype: "json",data:{nobkk:$('#nobkk').val(),kodeakun: dtrec[4],idjurnal: dtrec[5],nilai: dtrec[2]},
			url: "../Hapus/",
			async: false, type:'POST',success: function(data){			
			ListBKK();
			DataTotal();
			ComboAktivitas();
			var dt=JSON.parse(data);},
			error: function(){alert('Error Nih !!!');}
		});	
	});
	
	
	$('#list_coadebit').DataTable({
    paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
    order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
    "columnDefs": [
            {
                "targets": [ 5], "visible": true, "searchable": true
            },
            {
                "targets": [ 5], "visible": false, "searchable": false
            }
        ],
        tableTools: {
            sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
        }
    });

   $('#list_coadebit').click(function() {   
		dtrec = $('#list_coadebit').DataTable().row('.selected').data();
		$("#btn_posting").prop("disabled", false);
		$("#kodeakundebit").val(dtrec[1]);
		$("#namaakundebit").val(dtrec[2]);
	}); 
	$('#list_coacredit').DataTable({
		paging: true, lengthChange:true , searching: true,ordering: true,info: true,autoWidth: false,select: true,
		order: [ 1, 'asc' ], dom: 'T<"clear">lfrtip',
		"columnDefs": [
				{
					"targets": [ 5], "visible": true, "searchable": true
				},
				{
					"targets": [ 5], "visible": false, "searchable": false
				}
			],
			tableTools: {
				sRowSelect:   'os', sRowSelector: 'td:first-child',aButtons:     [  ]
			}
    });

	$('#list_coacredit').click(function() {   
		dtrec = $('#list_coacredit').DataTable().row('.selected').data();
		$("#btn_posting").prop("disabled", false);
		$("#kodeakuncredit").val(dtrec[1]);
		$("#namaakuncredit").val(dtrec[2]);
	}); 
	
	$("#btn_posting").click(function(){
		if($("#nilaidebit").val() != $("#nilaicredit").val() )	{
			alert("Tidak dapat diposting karena DEBIT dan CREDIT tidak sama, mohon ulangi !");
		}else if($("#kodeakundebit").val() == ""  )	{
			alert("Masukan kode akun Debit");
		}else if($("#kodeakuncredit").val() == ""  )	{
			alert("Masukan kode akun Credit");
		}else if($("#nilaidebit").val() == ""  )	{
			alert("Masukan Nilai Debit");
		}else if($("#nilaicredit").val() == ""  )	{
			alert("Masukan Nilai Credit");
		}else if($("#tgljurnal").val() == ""  )	{
			alert("Masukan Tanggal jurnal");
		}else{
			$.ajax({  datatype: "json",data:{
								kodeakundebit :$('#kodeakundebit').val(),
								remarkdebit :$('#remarkdebit').val(),
								nilaidebit :$('#nilaidebit').val(),
								
								kodeakuncredit :$('#kodeakuncredit').val(),
								remarkcredit :$('#remarkcredit').val(),
								nilaicredit :$('#nilaicredit').val(),
								
								tgljurnal :$('#tgljurnal').val(),
								uraian :$('#uraianjurnal').val()				
								},
					url: "../Posting/",
					async: false, type:'POST',success: function(data){alert("Jurnal Umum telah berhasil diposting.");
					var dt=JSON.parse(data);$("#idjurnalumum").val(dt);			
					ListJurnal();
					DataTotalJurnal();
					ClearJurnal();
					}, 
					error: function(){alert('Error Nih !!! ');}		
			});
		}
	});
	
	function ListJurnal(){
    $('#list_jurnal').DataTable( {
		"destroy": true,"processing": true, "serverSide": true, select:true, searching:false, ordering:false, paging:true, pagelenght:10,
		"ajax":{
			url :"../DataJurnal/", // json datasource
			type: "post",  // method  , by default get
			data:{id_jurnal:$('#idjurnalumum').val()},
			error: function(){  // error handling
				$(".list_jurnal-error").html("");
				$("#list_jurnal").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_jurnal_processing").css("display","none");
							
			}
		}
	});		
	}
	function DataTotalJurnal(){
		$.ajax({  datatype: "json",
			data:{ id_jurnal:$("#idjurnalumum").val() }, 
			url: "../get_total_jurnal/",
			async: false, type:'POST',
			success: function(data){ 
			var dt=JSON.parse(data);
			$("#totaldebet").text('Rp '+dt.total_debet+' ,00-');$("#totalcredit").text('Rp '+dt.total_credit+' ,00-');}, 
			error: function(){alert('Error Nih !!! ');}		
		});
	}
	$('#list_jurnal').click(function() { 
		dtrec = $('#list_jurnal').DataTable().row('.selected').data();			
		$("#btn_hapusjurnal").prop("disabled", false);		
	});
	
	$("#btn_hapusjurnal").click(function(){				
		
	});
	$("#btn_batalposting").click(function(){
		ClearJurnal();
	});
	function ClearJurnal(){
		$('#kodeakundebit').val("");
		$('#namaakundebit').val("");
		$('#remarkdebit').val("");
		$('#nilaidebit').val("");
								
		$('#kodeakuncredit').val("");
		$('#namaakuncredit').val("");
		$('#remarkcredit').val("");
		$('#nilaicredit').val("");
								
		$('#tgljurnal').val("");
		$('#uraianjurnal').val("");
		
		$("#btn_posting").prop("disabled", true);		
		$("#btn_hapusjurnal").prop("disabled", true);
		
		ListJurnal();
		DataTotalJurnal();
	}
	
	
});	



</script>
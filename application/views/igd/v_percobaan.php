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
        Percobaan
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">IGD</a></li>
        <li class="active">Percobaan</li>
    </ol>
</section>

<!-- Main content -->

<section class="content">
    <!-- Default box -->
    <div class="row">
		<div class="col-sm-6">
			<div class="box">
				<div class="box-header with-border">
				<h3 class="box-title">Form Percobaan</h3>
				<div class="box-tools pull-right">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
				<span class="label label-primary">Taufik</span>
				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				
				<div class="box-body">
				<div class="form-group">				
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:85px;" class="col-sm-2 control-label">No ID</label>
					<div class="col-lg-6" >
						<input type="text" class="form-control" name="norm" id="norm" placeholder="Masukkan Nomor ID">
					</div>
				</div>	
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:85px;" class="col-sm-2 control-label">Nama</label>
					<div class="col-lg-6" >
						<input type="text" class="form-control" name="namaP" id="namaP" placeholder="Masukkan Nama Anda">
					</div>
				</div>	
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:85px;" class="col-sm-2 control-label">Alamat</label>
					<div class="col-lg-8" >
						<textarea class="form-control" name="alamatP" id="alamatP"  placeholder="Masukkan Alamat Lengkap"></textarea>
					</div>
				</div>
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:100px;" class="col-sm-2 control-label">Tlp</label>
					<div style="margin-left:50px" class="input-group">
						<div  style="margin-left:30px" class="input-group-addon"> <i class="fa fa-phone"></i> </div>
						<input type="text" style="width:295px;" class="form-control" name="tlp" id="tlp"  data-inputmask='"mask": "(999) 999-9999"' data-mask >
					</div>
				</div>
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:100px;" class="col-sm-2 control-label">Tgl Lahir</label>
					<div style="margin-left:50px" class="input-group" >
						<div style="margin-left:30px" class="input-group-addon"> <i class="fa fa-calendar"></i></div>
						<input type="text" style="width:292px;" name="tglP" id="tglP"  class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
					</div> 
                </div>				
				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label style="margin-left:10px;width:50px;" class="col-sm-2 control-label">J.Kelamin</label>
								<select class="col-sm-2 form-control" name="sel_kel" id="sel_kel"  style="width: 50%;margin-left:55px;" placeholder="Masukkan">
								<?php foreach ($dt_j_k as $dt_jk) { ?>
									<option ><?php echo $dt_jk['jk']; ?></option>
								<?php } ?>
								</select>
						</div>
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label style="margin-left:10px;width:50px;" class="col-sm-2 control-label">G.Darah	</label>
							<select class="col-sm-2 form-control" name="sel_gdar" id="sel_gdar"  style="width: 20%;margin-left:55px;">
								<?php foreach ($dt_g_darah as $dt_gdarah) { ?>
									<option ><?php echo $dt_gdarah['golongan_darah']; ?></option>
								<?php } ?>
							</select>
						</div>		
					</div>
					
					<div class="col-md-12">
						<div class="form-group">
							<label style="margin-left:10px;width:100px;" class="col-sm-2 control-label">J.Pasien</label>
							<select class="col-sm-2 form-control" name="j_pas" id="j_pas"  style="width: 65%;margin-left:5px;">
								<?php foreach ($dt_j_pass as $dt_j_pas) { ?>
									<option ><?php echo $dt_j_pas['nama']; ?></option>
								<?php } ?>	
							</select>	
						</div>		
					</div>
					
					<div class="col-md-12">
						<div class="input-group-btn">
							<button style="margin-left:270px;width:50px;" type="button" id="save" class="btn btn-danger">Save</button>
						</div>
						<div class="input-group-btn">
							<button style="margin-left:15px;width:50px;" type="button" id="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				</div>
				</div>
				</div><!-- /.box-body -->
				<div class="box-footer">						
				</div><!-- box-footer -->
			</div><!-- /.box -->
		</div>
		
		<div class="col-sm-6">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Pengantar</h3>
					<div class="box-tools pull-right">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
						<span class="label label-primary">Hidayah</span>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Jenis Kelamin</label>
						<input type="text" style="width:305px" class="form-control" name="j_kel" id="j_kel" >
					</div>		
				</div>
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Golongan Darah</label>
						<input type="text" style="width:305px" class="form-control" name="g_darah" id="g_darah" >
					</div>		
				</div>
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Jenis Pasien</label>
						<input type="text" style="width:305px;" class="form-control" name="j_pasien" id="j_pasien" >
					</div>	
				<div class="box-body">
					<div class="input-group-btn">
						<button style="margin-left:140px;width:70px;" type="button" id="update" class="btn btn-danger">Update</button>
					</div>
					</div>
				</div>
				
				</div>
				<div class="box-footer">
					The footer of the box
				</div><!-- box-footer -->
			</div><!-- /.box -->
		</div>
		
		<div class="row">
		<div class="col-sm-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Data Pribadi</h3>
					<div class="box-tools pull-right">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
						<span class="label label-primary">Dodo</span>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="row">
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Cari Nama</label>
						<select class="form-control select2" style="width:305px;" name="carinama" id="carinama" >
								 <option ></option>
						</select>
					</div>
					</div>
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Nama Lengkap</label>
						<input type="text" style="width:305px" class="form-control" name="namaL" id="namaL" >
					</div>		
				</div>
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Umur</label>
						<input type="text" style="width:305px" class="form-control" name="umur" id="umur" >
					</div>		
				</div>
				<div class="box-body">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Sekolah</label>
						<input type="text" style="width:305px;" class="form-control" name="sekolah" id="sekolah" >
					</div>	
				<div class="box-body">
					<div class="input-group-btn">
						<button style="margin-left:30px;width:70px;" type="button" id="cari" class="btn btn-danger">Cari</button>
						<button style="margin-left:50px;width:70px;" type="button" id="simpan" class="btn btn-danger">Save</button>
						<button style="margin-left:50px;width:70px;" type="button" id="edit" class="btn btn-danger">Update</button>
						<button style="margin-left:50px;width:70px;" type="button" id="hapus" class="btn btn-danger">Delete</button>
					</div>
					</div>
				</div>
				
				</div>
				<div class="box-footer">
					The footer of the box
				</div><!-- box-footer -->
			</div><!-- /.box -->
		</div>
		</div>							
		<div class="row">
		<div class="col-sm-12">
			<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">List Data Pribadi</h3>
			</div><!-- /.box-header -->	
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<table id="list_datapribadi" class="table table-bordered table-hover display">
							<thead>
								<tr>
									<th></th>
									<th>Nama</th>
									<th>Umur</th>
									<th>Sekolah</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
						<div id="lst_kiriman" style="display:none;"></div>
						<div id="lst_stock" style="display:none;"></div>
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
<script src="../../../assets/select2/dist/js/select2.js"></script>


<script type="text/javascript">

$(function () {
	
	$('input[id="r3_2"]').on("change", function () {
		$( "#norm" ).prop( "disabled", true );
		$( "#namaP" ).prop( "disabled", false );
		$( "#alamatP" ).prop( "disabled", false );
		$( "#tlp" ).prop( "disabled", false );
		$( "#tglP" ).prop( "disabled", false );
		$( "#sel_gdar" ).prop( "disabled", false );
		$( "#sel_kel" ).prop( "disabled", false );
		$( "#jns_pas" ).prop( "disabled", false );
	});
	$('input[id="r3_1"]').on("change", function () {
		$( "#norm" ).prop( "disabled", false );
		$( "#namaP" ).prop( "disabled", true );
		$( "#alamatP" ).prop( "disabled", true );
		$( "#tlp" ).prop( "disabled", true );
		$( "#tglP" ).prop( "disabled", true );
		$( "#sel_gdar" ).prop( "disabled", true );
		$( "#sel_kel" ).prop( "disabled", true );
		$( "#jns_pas" ).prop( "disabled", true );
	});
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	$("[data-mask]").inputmask();
	$("#antar_pas").change(function () {
        if (this.value !='Datang Sendiri'){
			$( "#hub_pas" ).prop( "disabled", false );
			$( "#tlp_peng" ).prop( "disabled", false );
			$( "#almt_peng" ).prop( "disabled", false );
			$( "#nm_peng" ).prop( "disabled", false );
		}else{
			$( "#hub_pas" ).prop( "disabled", true );
			$( "#tlp_peng" ).prop( "disabled", true );
			$( "#almt_peng" ).prop( "disabled", true );
			$( "#nm_peng" ).prop( "disabled", true );
		}
        
    });
	$("#dok_pik").change(function () { 
		//alert (this.value);
	});
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
	/*$("#cari").click(function() {
		 $.ajax({  datatype: "json",data:{no_rm:$('#norm').val()},
			url: "../cari_norm/",async: false,
			type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $('#namaP').val(dt[0].nama); $('#alamatP').val(dt[0].alamat); 
			$('#tglP').val(dt[0].tgl_lahir); $('#sel_kel').val(dt[0].sex);$('#sel_gdar').val(dt[0].darah); $('#sel_gdar').val(dt[0].jenis); 
			$('#tlp').val(dt[0].telp); }else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});*/
	
	$("#save").click(function() { 
		$("#sel_kel option:selected").text();
		$("#j_kel").val($("#sel_kel option:selected").text());
		
		$("#sel_gdar option:selected").text();
		$("#g_darah").val($("#sel_gdar option:selected").text());
	 
		$("#j_pas option:selected").text();
		$("#j_pasien").val($("#j_pas option:selected").text());
		
		$.ajax({  datatype: "json",data:{j_kel:$('#j_kel').val(),g_darah: $('#g_darah').val(),j_pasien: $('#j_pasien').val() },
			url: "../insert/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Data Sudah Disimpan' );}
			}, error: function(){alert('Error Nih !!! ');}
		});
	});		
		
	$("#update").click(function() {
		alert('');
		$.ajax({  datatype: "json",data:{j_kel:$('#j_kel').val(),g_darah: $('#g_darah').val(),j_pasien: $('#j_pasien').val() },
			url: "../update/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Data Sudah Diupdate' );}
			}, error: function(){alert('Error Nih !!! ');} 
			});
	});
	
	$("#cari").click(function() {
		$.ajax({  datatype: "json",data:{namaL:$('#namaL').val()},
			url: "../cari/",async: false,
			type:'POST',success: function(data){ 
			var dt=JSON.parse(data);if (dt.length > 0){ $('#namaL').val(dt[0].namaL); $('#umur').val(dt[0].umur); $('#sekolah').val(dt[0].sekolah); 
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});
		
	/*$("#simpan").click(function() { 
		$.ajax({  datatype: "json",data:{namaL:$('#namaL').val(),umur:$('#umur').val(),sekolah:$('#sekolah').val() },
			url: "../simpan/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){
					console.log(dt);$("#namalengkap").val(dt); initDataTables(dt);	
			}else{ alert('Data Sudah Disimpan' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});*/
	$("#simpan").click(function() { 
		$.ajax({  datatype: "json",data:{namaL:$('#namaL').val(),umur:$('#umur').val(),sekolah : $('#sekolah').val(),}, 
			url: "../simpan/",async: false, type:'POST',success: function(data){
				var dt=JSON.parse(data); $("#namaL").val(dt); initDataTables(dt);	
				
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});
	
	$("#edit").click(function() { 
		alert("");
		$.ajax({  datatype: "json",data:{namaL:$('#namaL').val(),umur: $('#umur').val(),sekolah: $('#sekolah').val() },
			url: "../edit/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Data Sudah Diedit' );}
			}, error: function(){alert('Error Nih !!! ');}
		});	
	});
	$("#hapus").click(function($namaL) { 
		alert("");
		$.ajax({  datatype: "json",data:{namaL:$('#namaL').val() },
			url: "../hapus/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Data Sudah Dihapus' );}
			}, error: function(){alert('Error Nih !!! ');}
		});
	});
	var searchTerm = null;
	var remoteDataConfig = {
        placeholder: "Cari Nama Lengkap...",
        minimumInputLength: 1,
        ajax: {
				url: "../cari_nama/",
				dataType: 'json',
				type:"POST",
				data: function (term) { return term; },
				processResults: function (data, page) { return { results: data };}
        } 
    };

    $("#carinama").select2(remoteDataConfig);
	
	/*$("#carinama").change(function () { 
		$.ajax({  datatype: "json",data:{id_master:$("#carinama").val()}, url: "../cari_nama/",async: false, type:'POST',
			success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $("#namaL").val(dt);}else{ alert('Nama Tidak Ada');}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});*/
	
	function initDataTables(namalengkap){
    $('#list_datapribadi').DataTable( {
		"destroy": true,"processing": true, "serverSide": true,
		"ajax":{
			url :"../list_datapribadi/", // json datasource
			type: "post",  // method  , by default get
			data:{nama_lengkap : namalengkap},
			error: function(){  // error handling
				$(".list_datapribadi-error").html("");
				$("#list_datapribadi").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
				$("#list_datapribadi_processing").css("display","none");
							
			}
		}
	});		
	}
	initDataTables('asal');	
	
	
});	
</script>
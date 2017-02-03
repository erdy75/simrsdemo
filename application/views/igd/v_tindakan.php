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
        Pendaftaran IGD
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">IGD</a></li>
        <li class="active">Pendaftaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="row">
		<div class="col-sm-6">
			<div class="box">
				<div class="box-header with-border">
				<h3 class="box-title">Pendaftaran</h3>
				<div class="box-tools pull-right">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
				<span class="label label-primary">Label</span>
				</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
						<div class="form-group">
				<div>
					<label>
						<input type="radio" name="r3" id="r3_1" class="flat-red" checked>
						Sudah Terdaftar Di Rekam Medis
					</label>
				</div>
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px" class="col-sm-2 control-label">Nom.RM</label>
					<div class="col-lg-6" >
						<input type="text" class="form-control" name="norm" id="norm" placeholder="Masukkan Nomor RM">
					</div>
					<div class="input-group-btn">
						<button type="button" id="cari" class="btn btn-danger">Cari</button>
					</div>
					<div class="input-group-btn">
						<button type="button" id="save" class="btn btn-danger">Save</button>
					</div>
				</div>	
				<div>
					<label>
						<input type="radio" name="r3" id="r3_2" class="flat-red">
						Belum Terdaftar Di Rekam Medis
					</label>
				</div>
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:85px;" class="col-sm-2 control-label">Nama Px</label>
					<div class="col-lg-8" >
						<input type="text" class="form-control" name="namaP" id="namaP" disabled=false placeholder="Masukkan Nama Pasien">
					</div>
				</div>	
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:85px;" class="col-sm-2 control-label">Alamat</label>
					<div class="col-lg-8" >
						<input type="text" class="form-control" name="alamatP" id="alamatP" disabled=false placeholder="Masukkan Nama Pasien">
					</div>
				</div>
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:100px;" class="col-sm-2 control-label">Tlp</label>
					<div style="margin-left:50px" class="input-group">
						<div  style="margin-left:30px" class="input-group-addon"> <i class="fa fa-phone"></i> </div>
						<input type="text" style="width:295px;" class="form-control" name="tlp" id="tlp" disabled=false data-inputmask='"mask": "(999) 999-9999"' data-mask >
					</div>
				</div>
				<div class="row">	
					<label for="inputEmail3" style="margin-left:30px;width:100px;" class="col-sm-2 control-label">Tgl Lahir</label>
					<div class="input-group" >
						<div  class="input-group-addon"> <i class="fa fa-calendar"></i></div>
						<input type="text" style="width:292px;" name="tglP" id="tglP" disabled=false class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
					</div> 
                </div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label style="margin-left:10px;width:50px;" class="col-sm-2 control-label">J.Kelamin</label>
								<select class="col-sm-2 form-control" name="sel_kel" id="sel_kel" disabled=false style="width: 50%;margin-left:55px;">
									<option selected="selected" value="P">Laki-laki</option>
									<option value="Perempuan" >Perempuan</option>
								</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label style="margin-left:10px" class="col-sm-2 control-label">G.Darah</label>
								<select class="col-sm-2 form-control" name="sel_gdar" id="sel_gdar" disabled=false style="width: 34%;margin-left:45px;">
									<option selected="selected" value="A" >A</option>
									<option value="B" >B</option>
									<option value="AB" >AB</option>
									<option value="O" >O</option>
								</select>
						</div>		
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label style="margin-left:10px;width:100px;" class="col-sm-2 control-label">Jenis Px</label>
							<select class="col-sm-2 form-control" name="jns_pas" id="jns_pas" disabled=false style="width: 65%;margin-left:5px;">
								<?php foreach ($dt_j_pass as $dt_j_pas) { ?>
									<option ><?php echo $dt_j_pas['nama']; ?></option>
								<?php } ?>	
							</select>	
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
						<span class="label label-primary">Label</span>
					</div><!-- /.box-tools -->
				</div><!-- /.box-header -->
				<div class="box-body">
				<div style="margin-top:30px;" class="col-md-12">
					<div class="form-group">
						<label style="margin-left:10px;width:130px;" class="col-sm-2 control-label">Pengantar</label>
						<select class="col-sm-2 form-control" name="antar_pas" id="antar_pas" style="width: 300px;margin-left:10px;">
							<option selected="selected">Datang Sendiri</option>
							<option>Diantar Keluarga</option>
							<option>Diantar Polisi</option>
							<option>Diatar Orang Lain</option>
						</select>
					</div>		
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Nama Pengantar</label>
						<input type="text" style="width:305px" class="form-control" name="nm_peng" id="nm_peng" disabled=false placeholder="Nama Pengantar">
					</div>		
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Aalmat</label>
						<input type="text" style="width:305px" class="form-control" name="almt_peng" id="almt_peng" disabled=false placeholder="Alamat Pengantar">
					</div>		
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label style="margin-left:10px;width:140px;" class="col-sm-2 control-label">Tlp Pengantar</label>
						<input type="text" style="width:300px;" class="form-control" name="tlp_peng" id="tlp_peng" disabled=false data-inputmask='"mask": "(999) 999-9999"' data-mask >
					</div>		
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label style="margin-left:10px;width:130px;" class="col-sm-2 control-label">Hubungan</label>
						<select class="col-sm-2 form-control select2" name="hub_pas" id="hub_pas" disabled=false style="width: 300px;margin-left:10px;">
							<option selected="selected" value="Ayah/Ibu" >Ayah/Ibu</option>
							<option value="Suami/Istri" >Suami/Istri</option>
							<option value="Anak">Anak</option>
							<option value="Saudara" >Saudara</option>
							<option value="Saudara/Ipar" >Saudara/Ipar</option>
						</select>
					</div>		
				</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					The footer of the box
				</div><!-- box-footer -->
			</div><!-- /.box -->
		</div>
	</div>
	<div class="row">
		<div class="col-sm-6">
		<div class="box">
				<div class="box-header with-border">
				<h3 class="box-title">Deskripsi Kondisi Pasien</h3>
				<div class="box-tools pull-right">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
				<span class="label label-primary">Label</span>
				</div><!-- /.box-tools -->
		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#tab_1" data-toggle="tab">Keterangan</a></li>
					<li><a href="#tab_2" data-toggle="tab">Glasgow Comma Scale (GCS)</a></li>	
				</ul>	
			<div class="tab-content">
				<div class="tab-pane active" id="tab_1">
					<div class="row">
						<label style="width:130px;" class="col-sm-2 control-label">Dokter Jaga</label>
						<select class="col-sm-2 form-control select2" name="dok_pik" id="dok_pik" style="width: 60%;">
							<?php foreach ($dt_pegawais as $dt_pegawai) { ?>
								<option value ="<?php echo $dt_pegawai['id']; ?>" ><?php echo $dt_pegawai['nama']; ?></option>
							<?php } ?>	
						</select>
					</div>	
					<div class="row">
						<label style="width:130px;" class="col-sm-2 control-label">Kesadaran</label>
						<select class="col-sm-2 form-control select2" name="sadar" id="sadar" style="width: 60%;">
							<?php foreach ($dt_kesadarans as $dt_kesadaran) { ?>
								<option value ="<?php echo $dt_kesadaran['id_kesadaran']; ?>" ><?php echo $dt_kesadaran['keterangan']; ?></option>
							<?php } ?>	
						</select>
					</div>	
					<div class="row" style="margin-top:10px;" >
						<label class="control-label">Deskripsikan Kondisi Pasien Secara Singkat Berdasarkan Pengamatan</label>
						<textarea class="col-sm-2 form-control" id="catatan" rows="3" id=placeholder="Deskripsikan Secara Singkat Kondisi Pasien"></textarea>
					</div>		
				</div>
				<div class="tab-pane active" id="tab_2">
					<div class="row">
						<label style="width:130px;" class="col-sm-2 control-label">Respon Mata</label>
						<select class="col-sm-2 form-control select2" name="GCS_Eye" id="GCS_Eye" style="width: 60%;">
							<?php foreach ($dt_gcs_matas as $dt_gcs_mata) { ?>
								<option value ="<?php echo $dt_gcs_mata['id_gcs']; ?>" ><?php echo $dt_gcs_mata['keterangan']; ?></option>
							<?php } ?>	
						</select>
					</div>
					<div class="row">
						<label style="width:130px;" class="col-sm-2 control-label">Respon Ucapan</label>
						<select class="col-sm-2 form-control select2" name="GCS_Verbal" id="GCS_Verbal" style="width: 60%;">
							<?php foreach ($dt_gcs_ucapans as $dt_gcs_ucapan) { ?>
								<option value ="<?php echo $dt_gcs_ucapan['id_gcs']; ?>" ><?php echo $dt_gcs_ucapan['keterangan']; ?></option>
							<?php } ?>	
						</select>
					</div>
					<div class="row">
						<label style="width:130px;" class="col-sm-2 control-label">Respon Gerak</label>
						<select class="col-sm-2 form-control select2" name="GCS_Motorik" id="GCS_Motorik" style="width: 60%;">
							<?php foreach ($dt_gcs_geraks as $dt_gcs_gerak) { ?>
								<option value ="<?php echo $dt_gcs_gerak['id_gcs']; ?>" ><?php echo $dt_gcs_gerak['keterangan']; ?></option>
							<?php } ?>	
						</select>
					</div>
				</div>
			</div>	
			</div>	
		</div><!-- /.box-body -->
		<div class="box-footer">
				The footer of the box
		</div><!-- box-footer -->
		</div><!-- /.box -->
	</div>
	<div class="col-sm-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">Pasien IGD Hari Ini</h3>
				<div class="box-tools pull-right">
					<!-- Buttons, labels, and many other things can be placed here! -->
					<!-- Here is a label for example -->
				<span class="label label-primary">Label</span>
				</div><!-- /.box-tools -->
			</div><!-- /.box-header -->
			<div class="box-body">
				<table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No Reg</th>
                  <th>Nama Pasien</th>
                  <th>Tgl.Masuk</th>
                  <th>Jam.Masuk</th>
                  <th>Umur</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach ($dt_ugds as $dt_ugd) { ?>
                <tr>
                  <td><?php echo $dt_ugd['no_ugd']; ?></td>
                  <td><?php echo $dt_ugd['nama']; ?></td>
                  <td><?php echo $dt_ugd['tanggal']; ?></td>
                  <td><?php echo $dt_ugd['jam']; ?></td>
                  <td><?php echo $dt_ugd['umur']; ?></td>
                </tr>
				<?php } ?>
                
                </tfoot>
              </table>
				
			</div><!-- /.box-body -->
			<div class="box-footer">
				The footer of the box
			</div><!-- box-footer -->
		</div><!-- /.box -->
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
	$("#cari").click(function() {
		 $.ajax({  datatype: "json",data:{no_rm:$('#norm').val()},
			url: "../cari_norm/",async: false,
			type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ $('#namaP').val(dt[0].nama); $('#alamatP').val(dt[0].alamat); 
			$('#tglP').val(dt[0].tgl_lahir); $('#sel_kel').val(dt[0].sex);$('#sel_gdar').val(dt[0].darah); $('#sel_gdar').val(dt[0].jenis); 
			$('#tlp').val(dt[0].telp); }else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});
	});
	$("#save").click(function() { 
		/* $.ajax({  datatype: "json",data:{isMrX:$('#norm').val(),nama: $('#namaP').val(),alamat: $('#alamatP').val(),telp: $('#tlp').val(),
			sex : $('#sel_kel').val(),darah :$('#sel_gdar').val(),pengantar :$('#antar_pas').val(),pengantar_nama :$('#nm_peng').val(),
			pengantar_alamat: $('#almt_peng').val(), pengantar_telp: $('#tlp_peng').val(), pengantar_hubungan: $('#hub_pas').val(),
			catatan :$('#catatan').val(), dokter :$('#dok_pik').val(),GCS_Eye:$('#GCS_Eye').val(),GCS_Verbal:$('#GCS_Verbal').val(),
			GCS_Motorik:$('#GCS_Motorik').val() },
			url: "../add_pas_ugd/",async: false, type:'POST',success: function(data){ var dt=JSON.parse(data);if (dt.length > 0){ 
					console.log(dt);
			}else{ alert('Pasien Tidak Ada' );}
			}, error: function(){alert('Error Nih !!! ');}		
		});*/
		var d = new Date();
		var tgl_lahir= $('#tglP').val().split('/');
		alert(d.getDate()-tgl_lahir[0]);
	});
	
});	
</script>
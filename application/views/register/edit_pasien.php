<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Edit Pasien</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Sistem</a></li>
      <li class="active">Edit Pasien</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">

      <!-- Begin Table -->
      <div class="col-md-12">

        <div class="box box-success">
          <!-- begin box-header -->
          <div class="box-header">
            <h3 class="box-title">Edit Pasien</h3>
          </div>
          <!-- end box-header -->

          <!-- begin box-body -->
          <div class="box-body">
            <div class="row">
              
              <form id="form_modul" action="<?=base_url()?>index.php/register/pasien/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                <div class="col-md-6">
                    <table width="100%">
                      <tbody>
                        <?php echo input_text_1('ID Pasien', 'id pasien', 'pasien_id', $data['pasien_id']); ?>
                        <?php echo input_text_1('Nama', 'nama user', 'nama', $data['nama']); ?>
                        <?php echo input_textarea_1('Alamat', 'Alamat', 'alamat', $data['alamat']); ?>
                        <?php echo select_jenis_kelamin($data['jenis_kelamin']); ?>
                        <?php echo input_text_1('No HP', '892323xxx', 'no_hp', $data['no_hp']); ?>
                        <?=$select_kota;?>
                        <?php echo input_text_tgl_1('Tgl Lahir',  'tgl_lahir', $tgl_lahir);?>
                      </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table width="100%">
                      <tbody>
                        <?php echo input_text_1('Email', 'nama@user', 'email', $data['email']); ?>
                        <?php echo select_jenis_kelamin($data['jenis_kelamin']); ?>
                        <?=$select_darah?>
                        <?=$select_agama?>
                        <?=$select_indentitas?>
                        <?php echo input_text_1('Indentitas', 'Indentitas', 'no_indentitas', $data['no_indentitas']); ?>
                        <?php echo input_textarea_1('Lain-lain', 'Data lain-lain', 'lain2', $data['lain-lain']); ?>
                        <tr>
                          <td colspan="2" align="right" style="padding-top:5px">
                            <?php echo form_hidden('id', $data['id']); ?>
                            <button type="submit" class="btn btn-success btn-sm" id="simpan">Simpan</button>
                            <a class="btn btn-success btn-sm" href="<?=base_url()?>index.php/register/pasien/" id="batal">Batal</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>                   
                </div>
              </form>

            </div>
          </div>
          <!-- end box-body -->        
        </div>

      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<script>
//Datemask dd/mm/yyyy
$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
$('#pasien').addClass('active');
$(".select2").select2();
</script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Edit User</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Manajemen Sistem</a></li>
      <li class="active">Edit User</li>
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
            <h3 class="box-title">Edit User</h3>
          </div>
          <!-- end box-header -->

          <!-- begin box-body -->
          <div class="box-body">
            <div class="row">
              
              <form id="form_modul" action="<?=base_url()?>index.php/sistem/user/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

                <div class="col-md-6">
                    <table width="100%">
                      <tbody>
                        <?php echo input_text_1('ID', 'nama user', 'id', $data['id']); ?>
                        <?php echo input_text_1('Nama', 'nama user', 'nama', $data['nama']); ?>
                        <?=$select_role;?>
                        <?php if($cek==0) { ?>
                          <?php echo input_password_1('Password', 'password', 'password'); ?>
                          <?php echo input_password_1('Ulangi Password', 'password', 're_password'); ?>
                        <?php } else { ?>
                          <?php echo input_password_1('Password', 'password', 'password', 'disabled="disabled"'); ?>
                          <?php echo input_password_1('Ulangi Password', 'password', 're_password',  'disabled="disabled"'); ?>
                        <?php } ?>
                        <?php echo select_jenis_kelamin($data['jenis_kelamin']); ?>
                        <?php echo input_text_1('No HP', '892323xxx', 'no_hp', $data['no_hp']); ?>
                      </tbody>
                    </table>
                </div>

                <div class="col-md-6">
                    <table width="100%">
                      <tbody>
                        <?php echo input_text_1('Email', 'nama@user', 'email', $data['email']); ?>
                        <?php echo input_textarea_1('Alamat', 'Alamat', 'alamat', $data['alamat']); ?>
                        <?=$select_prov;?>
                        <?=$select_kota;?>
                        <?=$select_kec;?>
                        <?=$select_kel;?>
                        <tr>
                          <td colspan="2" align="right" style="padding-top:5px">
                            <?php echo form_hidden('cek', $cek) ?>
                            <button type="submit" class="btn btn-success btn-sm" id="simpan">Simpan</button>
                            <a class="btn btn-success btn-sm" id="batal">Batal</a>
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
$('#prov_id').change(function(event) {
  var prov_id = $('#prov_id').val();
  $.ajax({
    url: '<?=base_url()?>index.php/sistem/user/show_kabupaten_by_id',
    type: 'POST',
    data: 'prov_id='+prov_id,
    success: function(msg) {
      $("#td_kota_id").html(msg);
    }
  });
  $.ajax({
      url: '<?=base_url()?>index.php/sistem/user/show_kecamatan_by_id',
      type: 'POST',
      data: 'kab_id=0',
      success: function(msg) {
          $("#td_kec_id").html(msg);
      }
  });
  $.ajax({
      url: '<?=base_url()?>index.php/sistem/user/show_kelurahan_by_id',
      type: 'POST',
      data: 'kec_id=0',
      success: function(msg) {
          $("#td_kel_id").html(msg);
      }
  });   
});

$('#kab_id').change(function(event) {
    var kab_id = $('#kab_id').val();
    $.ajax({
        url: '<?=base_url()?>index.php/sistem/user/show_kecamatan_by_id',
        type: 'POST',
        data: 'kab_id='+kab_id,
        success: function(msg) {
            $("#td_kec_id").html(msg);
        }
    }); 
    $.ajax({
        url: '<?=base_url()?>index.php/sistem/user/show_kelurahan_by_id',
        type: 'POST',
        data: 'kec_id=0',
        success: function(msg) {
            $("#td_kel_id").html(msg);
        }
    });  
});

$('#kec_id').change(function(event) {
    var kec_id = $('#kec_id').val();
    $.ajax({
        url: '<?=base_url()?>index.php/sistem/user/show_kelurahan_by_id',
        type: 'POST',
        data: 'kec_id='+kec_id,
        success: function(msg) {
            $("#td_kel_id").html(msg);
        }
    }); 
});

$("#simpan").click(function(event) {
  var x = '';
  if ($("#password").val()!=$("#re_password").val())
  {
    x = x + "password tidak cocock \n";
  }

  if(x=='')
  {
    
    return true;
  }
  else
  {
    alert(x);
    return false;
  }


});
</script>
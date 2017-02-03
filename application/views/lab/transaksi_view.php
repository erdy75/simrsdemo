<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Transaksi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Pemeriksaan</a></li>
      <li class="active">Transaksi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Begin Table -->
      <div class="col-md-12">
        <div class="box box-success">
          <form action="<?=base_url()?>index.php/laboratorium/transaksi/submit_transaksi" method="post" accept-charset="utf-8">
            <!-- begin box-header -->
            <div class="box-header">
              <h3 class="box-title">Transaksi</h3>
              <div class="box-tools">
                <div class="input-group" style="width: 150px;display: none;">
                  <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                  <div class="input-group-btn">
                    <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- end box-header -->
            <div class="box-header">
              <div class="col-md-6">
                <table>
                  <tr>
                    <td colspan="4" style="padding-top:5px;padding-bottom: 5px;">
                      No Lab : 
                      <input type="checkbox" name="cek_autonumber" id="cek_autonumber">
                      <input type="text" name="autonumber" id="autonumber" class="new-form-control readonly" readonly="true" value="Auto Number"> 
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;">
                      <input type="radio" name="cek_nomer" id="cek_nomer1" value="1">
                    </td>
                    <td style="padding-top:5px;padding-bottom: 5px;">No Reg : </td>
                    <td style="padding:5px; "><input type="text" name="no_reg" id="no_reg" class="new-form-control readonly" readonly="true" style="width:90px;"></td>
                    <td rowspan="2">
                      <a href="#" id="btn_ok_cari" class="btn bg-maroon margin"><i class="fa fa-fw fa-refresh"></i> OK</a>
                    </td>   
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;">
                      <input type="radio" name="cek_nomer" id="cek_nomer2" class="new-form-control" checked="true" value="2">
                    </td>
                    <td style="padding-top:5px;padding-bottom: 5px;">No RM : </td>
                    <td colspan="2" style="padding:5px;" id="show_no_rm"><input type="text" name="no_rm" id="no_rm" class="new-form-control" data-inputmask='"mask": "999.99.99.99"' data-mask style="width:90px;"></td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;"></td>
                    <td style="padding-top:5px;padding-bottom: 5px;">Nama Pasien : </td>
                    <td colspan="2" style="padding:5px;"><input type="text" name="nama" id="nama" class="new-form-control" style="width: 215px;"></td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;"></td>
                    <td style="padding-top:5px;padding-bottom: 5px;">Alamat : </td>
                    <td colspan="2" style="padding:5px;"><input type="text" name="alamat" id="alamat" class="new-form-control" style="width: 215px;"></td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;"></td>
                    <td style="padding-top:5px;padding-bottom: 5px;">Sex / Umur : </td>
                    <td colspan="2" style="padding:5px;">
                      <select name="jenis_kelamin" id="jenis_kelamin" class="new-form-control">
                        <option value="Laki-Laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                      <input type="text" name="age" id="age" class="new-form-control" maxlength="5" max="5" style="width:45px;"> Tahun(Bulan)
                    </td>
                  </tr>               
                </table>
                <table>
                  <tr>
                    <td  style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Dokter Pengirim : 
                      <input type="checkbox" name="cek_dokter" id="cek_dokter">
                    </td>
                    <td>
                      <select name="nama_dokter" id="nama_dokter" class="new-form-control">
                        <option value="0"></option>
                        <?php for ($i=0; $i < count($list_dokter) ; $i++) { ?>
                          <option value="<?=$list_dokter[$i]['nama']?>"><?=$list_dokter[$i]['nama']?></option>
                        <?php } ?>
                      </select>
                      <input type="text" name="nama_dokter_text" id="nama_dokter_text" class="new-form-control">
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Jenis Pasien : 
                    </td>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <select name="jenis_pasien" class="new-form-control">
                        <option value="UMUM">UMUM</option>
                        <option value="ASURANSI">ASURANSI</option>
                        <option value="KARYAWAN">KARYAWAN</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Penjamin : 
                    </td>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <select name="penjamin" id="penjamin" class="new-form-control">
                        <option value="0">-</option>
                        <option value="ASURANSI">ASURANSI(NOT_REGISTRED)</option>
                        <option value="RS.WILLIAM BOTH">RS.WILLIAM BOTH</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Perawatan : 
                    </td>
                    <td id="show_perawatan" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <select name="perawatan" id="perawatan" class="new-form-control">
                        <option value="Rawat Jalan">Rawat Jalan</option>
                        <option value="Rawat Inap">Rawat Inap</option>
                        <option value="UGD / IGD">UGD / IGD</option>
                      </select>
                      <select name="ruangan_dari" id="ruangan_dari" class="new-form-control">
                        <option value="0">-</option>
                      <?php for ($i=0; $i < count($list_rawat_jalan) ; $i++) { ?>
                        <option value="<?=$list_rawat_jalan[$i]['nama']?>"><?=$list_rawat_jalan[$i]['nama']?></option>
                      <?php } ?>
                      </select>                    
                    </td>
                  </tr>
                </table>                       
              </div>
              <div class="col-md-6">
                <div id="show_list_tarif">
                  <table class="table table-bordered table-lab">
                    <thead>
                      <tr>
                        <th>Nama Pemeriksaan</th>
                        <th>Tarif</th>
                        <th>Rujukan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>                
                </div>
                <table>
                  <tr>
                    <td  style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Kelompok Tarif : 
                    </td>
                    <td colspan="2">
                      <select name="kel_tarif" id="kel_tarif" class="new-form-control">
                        <option value="BETHANY">BETHANY</option>
                        <option value="HEMODIALISA">HEMODIALISA</option>
                        <option value="KARYAWAN">KARYAWAN</option>
                        <option value="UMUM">UMUM</option>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Bidang : 
                    </td>
                    <td colspan="2" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <select name="lab_bidang" id="lab_bidang" class="new-form-control">
                      <?php for ($i=0; $i < count($list_lab_bidang) ; $i++) { ?>
                        <option value="<?=$list_lab_bidang[$i]['nama']?>"><?=$list_lab_bidang[$i]['nama']?></option>
                      <?php }?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Pemeriksaan : 
                    </td>
                    <td colspan="2" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;" id="show_lab_detail">
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      Tarif : Rp
                    </td>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;" id="show_tarif">
                      <input type="text" name="tarif" id="tarif" class="new-form-control" style="width: 100px;">
                    </td>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;text-align:right;">
                      Disc : <input type="text" name="diskon" id="diskon" class="new-form-control" style="width: 100px;" value="0">
                    </td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <input type="checkbox" name="cek_rujukan" id="cek_rujukan">
                      Dirujuk Ke : 
                    </td>
                    <td colspan="2" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <select name="dirujuk" id="dirujuk" class="new-form-control">
                        <option value="0">-</option>
                        <option value="RSUD HASAN SADIKIN">RSUD HASAN SADIKIN</option>
                        <option value="RSUD SANTO YUSUF">RSUD SANTO YUSUF</option>
                        <option value="RSUD BROMEOUS">RSUD BROMEOUS</option>
                      </select>
                    </td>                
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                       
                    </td>
                    <td colspan="2" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                      <a href="#" id="btn_tambah" class="btn btn-sm bg-maroon"> Tambah</a>
                      <span id="total_tarif">Total Rp.0</span>
                      <input type="hidden" name="tot_tarif" id="tot_tarif">
                      <input type="hidden" name="cek_list_tarif" id="cek_list_tarif">
                    </td>                
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                    Remark / Notes :    
                    </td>
                    <td colspan="2" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;">
                    <input type="text" name="keterangan" id="keterangan" class="new-form-control" style="width: 200px;">
                    </td>                
                  </tr>
                  <tr>
                    <td  colspan="3" style="padding-top:5px;padding-bottom: 5px;padding-right:5px;"> 
                      <button type="submit" id="btn_simpan" class="btn bg-maroon"> Simpan</button>
                      <a herf="#" id="btn_batal" class="btn bg-maroon"> Batal</a>
                    </td>                
                  </tr>
                </table>                
              </div>

            </div>
            <!-- begin box-body -->
            <div class="box-body" id="ajax_lab_periksa">
            </div>
            <!-- end box-body -->
          </form>

        
        </div>
      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Begin Modal -->
<div class="modal fade" id="modal_si" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header modal-begie">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="modal_show">
      </div>
      <div class="modal-footer modal-begie">
        <button type="button" class="btn btn-sm btn-rs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<script>
window.onunload = function(){
    alert("unload event detected!");
}

$("li#transaksi").addClass("active");
$("li#LABORTORIUM").addClass('active');
$("#cek_autonumber").click(function(event) {
  if($("#cek_autonumber").is(':checked')) {
    $("#autonumber").attr('readonly', false);
    $("#autonumber").removeClass('readonly');
    $("#autonumber").val("");
  } else {
    $("#autonumber").attr('readonly', true);
    $("#autonumber").addClass('readonly');
    $("#autonumber").val("Auto Number");
  }
});

$("#nama_dokter_text").hide();
$("[data-mask]").inputmask();
$("#no_rm").keyup(function(event) {
  $("[data-mask]").inputmask();
});

$("#cek_nomer1").click(function(event) {
  if($("#cek_nomer1").is(':checked')){
      $("#no_reg").attr('readonly', false);
      $("#no_reg").removeClass('readonly');
      $("#no_rm").attr('readonly', true);
      $("#no_rm").addClass('readonly');      
      //$("#cek_nomer2").prop("checked",false);
  } else {
      $("#no_reg").attr('readonly', true);
      $("#no_reg").addClass('readonly'); 
      $("#no_rm").attr('readonly', false);
      $("#no_rm").removeClass('readonly');      
      //$("#cek_nomer2").prop("checked",true);
  }
});

$("#cek_nomer2").click(function(event) {
  if($("#cek_nomer2").is(':checked')){
      $("#no_reg").attr('readonly', true);
      $("#no_reg").addClass('readonly'); 
      $("#no_rm").attr('readonly', false);
      $("#no_rm").removeClass('readonly');       
      //$("#cek_nomer2").prop("checked",false);
  } else {     
      //$("#cek_nomer2").prop("checked",true);
      $("#no_reg").attr('readonly', false);
      $("#no_reg").removeClass('readonly');
      $("#no_rm").attr('readonly', true);
      $("#no_rm").addClass('readonly');
  }
});

$('#btn_ok_cari').click(function(event) {
  var no_reg = $('#no_reg').val();
  var no_rm = $('#no_rm').val().length;
  
  if(no_rm==12 && $("input#no_rm:not([readonly])") && $("#cek_nomer2").is(':checked'))
  {
    $.ajax({
      type: "POST",
      data: "no_rm="+$('#no_rm').val(),
      url: "<?=base_url()?>index.php/laboratorium/Transaksi/cek_no_rm",
      success: function(msg) {
        $("div#ajax_lab_periksa").html(msg);
      }
    });
    $(this).attr('disabled',true);  
    $('#btn_tambah').attr('disabled', false);
    $('#btn_hapus').attr('disabled', false);
    $('#btn_simpan').attr('disabled', false);
    $('#btn_batal').attr('disabled', false);
  } else if($("#cek_nomer1").is(':checked')) {
    if (no_reg == '') {
      alert("Harap isi no regristrasi");
    } else {
      $.ajax({
        type: "GET",
        data: "ajax=1&filter="+filter,
        url: "<?=base_url()?>index.php/laboratorium/Transaksi/generate_no_rm",
        success: function(msg) {
          $("td#show_no_rm").html(msg);
        }
      }); 
      $("#no_reg").attr('readonly', true);
      $("#no_reg").addClass('readonly'); 
      $(this).attr('disabled',true);  
      $('#btn_tambah').attr('disabled', false);
      $('#btn_hapus').attr('disabled', false);
      $('#btn_simpan').attr('disabled', false);
      $('#btn_batal').attr('disabled', false);          
    }
  } else {
    $.ajax({
      type: "GET",
      data: "ajax=1&filter="+filter,
      url: "<?=base_url()?>index.php/laboratorium/Transaksi/generate_no_rm",
      success: function(msg) {
        $("td#show_no_rm").html(msg);
      }
    }); 
    $(this).attr('disabled',true);
    $('#btn_tambah').attr('disabled', false);
    $('#btn_hapus').attr('disabled', false); 
    $('#btn_simpan').attr('disabled', false);
    $('#btn_batal').attr('disabled', false); 
  }
});


$("#cek_dokter").click(function(event) {
  if($("#cek_dokter").is(':checked')) {
    $("#nama_dokter").val("0");
    $("#nama_dokter_text").show();
    $("#nama_dokter").hide();
  } else {
    $("#nama_dokter_text").val("");
    $("#nama_dokter_text").hide();
    $("#nama_dokter").show();
  }
});

$("#perawatan").change(function(event) {
  if ($(this).val()=="Rawat Jalan") {
    $.ajax({
      type: "GET",
      url: "<?=base_url()?>index.php/laboratorium/Transaksi/show_rawat_jalan",
      success: function(msg) {
        $("td#show_perawatan").html(msg);
      }
    }); 
  } else if ($(this).val()=="Rawat Inap") {
    $.ajax({
      type: "GET",
      url: "<?=base_url()?>index.php/laboratorium/Transaksi/show_rawat_inap",
      success: function(msg) {
        $("td#show_perawatan").html(msg);
      }
    }); 
  } else {
    $.ajax({
      type: "GET",
      url: "<?=base_url()?>index.php/laboratorium/Transaksi/show_ugd",
      success: function(msg) {
        $("td#show_perawatan").html(msg);
      }
    }); 
  }
});

$('#btn_tambah').attr('disabled', true);
$('#btn_hapus').attr('disabled', true);
$('#btn_simpan').attr('disabled', true);
$('#btn_batal').attr('disabled', true);

$('#btn_batal').click(function(event) {
  $(this).attr('disabled', true);
  $('#btn_simpan').attr('disabled', true);  
  $('#btn_tambah').attr('disabled', true);
  $('#btn_hapus').attr('disabled', true);
  $('#btn_ok_cari').attr('disabled', false);
  $('#cek_nomer1').attr('checked', false);
  $('#cek_nomer2').attr('checked', true);
  $("#no_reg").attr('readonly', true);
  $("#no_reg").addClass('readonly');   
  $("#no_rm").attr('readonly', false);
  $("#no_rm").removeClass('readonly');
  $("#no_rm").val(""); 
  $("#no_reg").val("");
  $("#nama").val("");
  $("#alamat").val("");
  $("#age").val("");
});

var lab_bidang = $("#lab_bidang").val();
var kel_tarif = $("#kel_tarif").val();
$.ajax({
  type: "POST",
  data: "kel_tarif="+kel_tarif+"&lab_bidang="+lab_bidang,
  url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_lab_detail",
  success: function(msg) {
    $("td#show_lab_detail").html(msg);
  }
}); 
$("#lab_bidang").change(function(event) {
  var lab_bidang = $(this).val();
  $.ajax({
    type: "POST",
    data: "kel_tarif="+kel_tarif+"&lab_bidang="+lab_bidang,
    url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_lab_detail",
    success: function(msg) {
      $("td#show_lab_detail").html(msg);
    }
  }); 
});
$("#kel_tarif").change(function(event) {
  var kel_tarif = $(this).val();
  $.ajax({
    type: "POST",
    data: "kel_tarif="+kel_tarif+"&id_layanan="+$("#list_lab_detail").val(),
    url: "<?=base_url();?>index.php/laboratorium/Transaksi/get_tarif",
    success: function(msg) {
      $("td#show_tarif").html(msg);
    }
  }); 
});
$("#cek_rujukan").click(function(event) {
  if($("#cek_rujukan").is(':checked')){
    $("#dirujuk").attr('disabled', false);
    $("#dirujuk").removeClass('readonly');
  } else {
    $("#dirujuk").attr('disabled', true);
    $("#dirujuk").val("0");
    $("#dirujuk").addClass('readonly');
  }

});


$("#btn_tambah").click(function(event) {
  var x = '';
  var nama_lab_detail = $("#list_lab_detail").val();
  var diskon = $("#diskon").val();
  var tarif = $("#tarif").val();
  var lab_bidang = $("#lab_bidang").val();
  var keterangan = $("#keterangan").val();
  var dirujuk = $("#dirujuk").val()
  if($("#cek_nomer1").is(':checked')){
    if($("#no_reg").val()==''){
      x += 'Harap isi no reg \n'; 
    }
    if($("#nama").val()==''){
      x += 'Nama Tidak Boleh kosong \n';
    }
    if($("#alamat").val()==''){
      x += 'Alamat Tidak Boleh kosong \n';
    }
    if($("#age").val()==''){
      x += 'Umur Tidak Boleh kosong \n';
    }
    if($("#cek_dokter").is(":checked")){
      if($("#nama_dokter_text").val()=='')
      {
        x += 'Harap Mengisi Nama Dokter \n';
      }
    } else {
      if($("#nama_dokter").val()==0)
      {
        x += 'Harap Piih Nama Dokter \n';
      }   
    }
  } 
  if($("#cek_nomer2").is(':checked')){

    if($("#nama").val()==''){
      x += 'Nama Tidak Boleh kosong \n';
    }
    if($("#alamat").val()==''){
      x += 'Alamat Tidak Boleh kosong \n';
    }
    if($("#age").val()==''){
      x += 'Umur Tidak Boleh kosong \n';
    }
    if($("#cek_dokter").is(":checked")){
      if($("#nama_dokter_text").val()=='')
      {
        x += 'Harap Mengisi Nama Dokter \n';
      }
    } else {
      if($("#nama_dokter").val()==0)
      {
        x += 'Harap Piih Nama Dokter \n';
      }   
    }
  } 

  if($("#cek_rujukan").is(':checked')){
    if($("#dirujuk").val()==0){
      x += "harus pilih rujukan terlebih dahulu";
    }
  } 

  if(x!='') {
    alert(x);
  } else {
    if ($("#penjamin").val()==0)
    {
      var r = confirm("Belum Memasukkan Penjamin Yakin mau menambahkan ?");
      if (r == true) {
        if ($("#ruangan_dari").val()==0) {
          var o = confirm("Pasien Rawat Inap atau Rawat Jalan, yakin mau memasukkan ?");
          if (o == true) {
            //alert("nama : "+nama_lab_detail+", tarif : "+tarif+", diskon : "+diskon );
            $.ajax({
              type: "POST",
              data: "nama_lab_detail="+nama_lab_detail+"&diskon="+diskon+"&tarif="+tarif+"&keterangan="+keterangan+"&dirujuk="+dirujuk,
              url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_tarif_lab",
              success: function(msg) {
                $("#show_list_tarif").html(msg);
              }
            });            
            return false;
          } else {
            alert(diskon);
            return false;
          }      
        } else {
          $.ajax({
            type: "POST",
            data: "nama_lab_detail="+nama_lab_detail+"&diskon="+diskon+"&tarif="+tarif+"&keterangan="+keterangan+"&dirujuk="+dirujuk,
            url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_tarif_lab",
            success: function(msg) {
              $("#show_list_tarif").html(msg);
            }
          }); 
          return false;
        }
      } else {
        alert("kamu jawab tidak penjamin");
      }
    } else if ($("#ruangan_dari").val()==0) {
      var r = confirm("Pasien Rawat Inap atau Rawat Jalan, yakin mau memasukkan ?");
      if (r == true) {
        if ($("#penjamin").val()==0) {
          var o = confirm("Belum Memasukkan Penjamin Yakin mau menambahkan ?");
          if (o == true) {
          $.ajax({
            type: "POST",
            data: "nama_lab_detail="+nama_lab_detail+"&diskon="+diskon+"&tarif="+tarif+"&keterangan="+keterangan+"&dirujuk="+dirujuk,
            url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_tarif_lab",
            success: function(msg) {
              $("#show_list_tarif").html(msg);
            }
          }); 
            return false;
          } else {
            alert("kamu jawab tidak");
            return false;
          }      
        } else {
          $.ajax({
            type: "POST",
            data: "nama_lab_detail="+nama_lab_detail+"&diskon="+diskon+"&tarif="+tarif+"&keterangan="+keterangan+"&dirujuk="+dirujuk,
            url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_tarif_lab",
            success: function(msg) {
              $("#show_list_tarif").html(msg);
            }
          }); 
          return false;
        } 
      } else {
        alert("kamu jawab tidak ruangan");
      }      
    } else {
      $.ajax({
        type: "POST",
        data: "nama_lab_detail="+nama_lab_detail+"&diskon="+diskon+"&tarif="+tarif+"&keterangan="+keterangan+"&dirujuk="+dirujuk,
        url: "<?=base_url()?>index.php/laboratorium/Transaksi/list_tarif_lab",
        success: function(msg) {
          $("#show_list_tarif").html(msg);
        }
      }); 
      return false;      
    } 
  }  
});

$("#btn_simpan").click(function(event) {
  if ($("#cek_list_tarif").val()==0 ||$("#cek_list_tarif").val()=="")
  {
    alert("silahkan isi lab terlebih dahuulu");
    return false;
  }
});
</script>
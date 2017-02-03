<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Item</th>
      <th>Qty</th>
      <th>Satuan</th>
      <th>Harga</th>
      <th>Disc(%)</th>
      <th>Exp</th>
      <th>Batch</th>
      <th>Sub Total</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['nama']?></td>
      <td><?=$listdata[$i]['kuantitas']?></td>
      <td><?=$listdata[$i]['kemasan']?></td>
      <td style="text-align:right;"><?=$listdata[$i]['harga']?></td>
      <td><?=$listdata[$i]['disc']?></td>
      <td></td>
      <td></td>
      <td style="text-align:right;"><?=$listdata[$i]['kuantitas']*$listdata[$i]['harga'];?></td>
      <td>
        <button type="button" class="btn bg-navy btn-sm set_batch" data-toggle="modal" data-target="#modal_set_batch">
          Set
        </button>
        <button type="button" class="btn bg-navy btn-sm sp_detail"  data-toggle="modal" data-target="#modal_sp_detail">
          <i class="fa fa-fw fa-edit"></i>
        </button>
        <button type="button" class="btn btn-danger btn-sm hapus" onclick="hapus(<?=$listdata[$i]['kuantitas']*$listdata[$i]['harga'];?>)">
          <i class="fa fa-fw fa-trash"></i>
        </button>
        <input type="hidden" name="nama_barang_cek" value="<?=$listdata[$i]['id'].'###'.$listdata[$i]['satuan'].'###'.$listdata[$i]['nama']?>">
        <input type="hidden" name="bunddle[]" value="<?=$listdata[$i]['nama'].'###'.$listdata[$i]['kuantitas'].'###'.$listdata[$i]['kemasan'].'###'.$listdata[$i]['harga'].'###'.$listdata[$i]['disc'].'###0###0###'.$listdata[$i]['kuantitas']*$listdata[$i]['harga']?>">
      </td>     
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="6">
        <ul class="pagination pull-right" id="ajax_pagingsearci" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>


<div class="row">
  <div class="col-md-6">
    <button type="button" class="btn btn-info btn-sm" id="batal" >Batal</button>
    <button type="button" class="btn btn-info btn-sm" id="tambah_baris" data-toggle="modal" data-target="#modal_sp_detail">tambah</button>
    <button class="btn btn-info btn-sm" id="simpan_all">Simpan Semua</button>
  </div>
  <div class="col-md-6">
  <table width="100%">
    <tbody>
      <tr>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">Sub Total : </td>
        <td style="font-size:15px;padding:5px;font-weight:bolder;text-align:right;" id="sub_total_show">
          Rp.<?=$this->admin_template_minor->uang_format($tot_harga['tot_harga']);?>  
        </td>
      </tr>
      <tr>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">PPN : </td>
        <td style="font-size:15px;padding:5px;font-weight:bolder;text-align:right;">
          Rp.<?php echo $this->admin_template_minor->uang_format(($tot_harga['tot_harga']*$ppn['ppn'])/100);?></td>
      </tr>
      <tr>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">Materai : </td>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">
          <select name="materai" id="materai">
            <option value="0">0</option>
            <option value="3000">3000</option>
            <option value="3300">3000 + PPN</option>
            <option value="6000">6000</option>
            <option value="6600">6000 + PPN</option>
          </select>
        </td>
      </tr>
      <tr>
        <td style="border-top:1px solid #000;font-size:15px;padding:5px;font-weight:bolder;">Total : </td>
        <td style="border-top:1px solid #000;font-size:15px;padding:5px;font-weight:bolder;text-align:right;" id="total_show">
          Rp.<?php echo $this->admin_template_minor->uang_format($tot_harga['tot_harga']-(($tot_harga['tot_harga']*$ppn['ppn'])/100));?>  
        </td>
      </tr>
      <tr>
        <input type="hidden" id="total" value="<?=$tot_harga['tot_harga']-(($tot_harga['tot_harga']*$ppn['ppn'])/100)?>">
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div id="modal_sp_detail" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content size-custom">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Barang</h4>
      </div>
      <div class="modal-body" id="show_modal">
      <table id="table_one">
        <tbody>
          <tr>
            <td style="padding:5px;">Nama : </td>
            <td style="padding:5px;" colspan="5">
              <select name="nama_barang" id="nama_barang" class="new-form-control">
                <?php for ($i=0; $i < count($listbarang) ; $i++) { ?>
                  <option value="<?=$listbarang[$i]['id'].'###'.$listbarang[$i]['satuan']."###".$listbarang[$i]['nama']?>"><?=$listbarang[$i]['nama']?></option>
                <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td style="padding:5px;">Jumlah : </td>
            <td style="padding:5px;"><input type="radio" name="myRadio" id="radio1" value="1" /> Kemasan Kecil </td>
            <td style="padding:5px;"><input type="text" name="k_kecil" class="new-form-control" ></td>
            <td style="padding:5px;" class="show_satuan">[Kemasan Kecil]</td>
            <td style="padding:5px;">Harga Beli / kms.Kecil : Rp </td>
            <td style="padding:5px;"><input type="text" name="rp_k_kecil" class="new-form-control" ></td>
          </tr>
          <tr>
            <td style="padding:5px;"></td>
            <td style="padding:5px;"><input type="radio" name="myRadio" id="radio2" value="2" /> Kemasan Sedang </td>
            <td style="padding:5px;"><input type="text" name="k_sedang" class="new-form-control readonly" readonly="true" ></td>
            <td style="padding:5px;" class="show_satuan">[Kemasan Sedang]</td>
            <td style="padding:5px;">Harga Beli / kms.Sedang : Rp </td>
            <td style="padding:5px;"><input type="text" name="rp_k_sedang" class="new-form-control readonly" readonly="true"></td>
          </tr>
          <tr>
            <td style="padding:5px;"></td>
            <td style="padding:5px;"><input type="radio" name="myRadio" id="radio3"  value="3" /> Kemasan Besar </td>
            <td style="padding:5px;"><input type="text" name="k_besar" class="new-form-control readonly" readonly="true"></td>
            <td style="padding:5px;" class="show_satuan">[Kemasan Besar]</td>
            <td style="padding:5px;">Harga Beli / kms.Besar : Rp </td>
            <td style="padding:5px;"><input type="text" name="rp_k_besar" class="new-form-control readonly" readonly="true"></td>
          </tr>
          <tr>
            <td style="padding:5px;">Disc (%) : </td>
            <td style="padding:5px;" colspan="5">
              <input type="text" name="diskon" class="new-form-control" >
            </td>
          </tr>
          <tr>
            <td style="padding:5px;">Exp : </td>
            <td style="padding:5px;">
              <input type="text" name="tgl_exp" class="new-form-control" >
            </td>
            <td style="padding:5px;">Batch No : </td>
            <td style="padding:5px;" colspan="3">
              <input type="text" name="batch_no" class="new-form-control" >
            </td>
          </tr>
          <tr>
            <td colspan=6 style="color:red;">NB : Satuan Harga yang disimpan pada Penerimaan Gudang dan LPB dalam format Kemasan Terkecil</td>
          </tr>
          <tr>
            <td colspan=6 style="color:red;">NB : Bila dimasukan dalam bidang sedang / besar program mengkonversi ke keemasan terkecil otomatis(sesuai kemasan Barang)</td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="row_cek_sp_detail" value="0">
        <input type="hidden" id="tot_brg_sblm" >
        <input type="hidden" id="nama_brg_anon" >
        <button type="button" class="btn btn-info btn-sm" id="simpan_brg_smntra" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<div id="modal_set_batch" class="modal fade" role="dialog">
  <div class="modal-dialog large">
   
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Set Up</h4>
      </div>
      <div class="modal-body" id="show_modals">
      <table>
        <tbody>
          <tr>
            <td style="padding:5px;">Expired : </td>
            <td style="padding:5px;"><input type="text" name="kadarluarsa" id="kadarluarsa" readonly="true" value="<?=date('d-m-Y')?>"></td>
            <td style="padding:5px;">Batch : </td>
            <td style="padding:5px;"><input type="text" name="batch_primer" id="batch_primer"></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="bundle_data">
        <button type="button" class="btn btn-info btn-sm" id="update_batch" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script>  
applyPagination2()
function applyPagination2(){
  $("#ajax_pagingsearci a").click(function() {
    var url = $(this).attr("href");
    var no_sp_final = "<?=$no_sp_final?>";
    $.ajax({
      type: "POST",
      data: "ajax=1&no_sp_final="+no_sp_final,
      url: url,
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
    return false;
  });
}

$("#batal").click(function(event) {
    $.ajax({
      type: "POST",
      data: "ajax=1",
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/kosong",
      success: function(msg) {
        $("div#show_list").html(msg);
        $("td#data_detail_gudang").html(msg);
      }
    });  
});
$("#tambah_baris").click(function(event) {
  $('select[name=nama_barang]').val('10027###BIJI###12');
  $('input[name=k_kecil]').val('');
  $('input[name=rp_k_kecil]').val('');
  $('input[name=k_sedang]').val('');
  $('input[name=rp_k_sedang]').val('');
  $('input[name=k_besar]').val('');
  $('input[name=rp_k_besar]').val('');
  $('input[name=diskon]').val('');
  $('input[name=tgl_exp]').val('');
  $('input[name=batch_no]').val('');
  $('input#radio1').prop('checked', 'true');
  $('input[name=k_kecil]').removeAttr('readonly');
  $('input[name=k_kecil]').removeClass('readonly');
  $('input[name=rp_k_kecil]').removeAttr('readonly');
  $('input[name=rp_k_kecil]').removeClass('readonly');
  $('input[name=k_sedang]').attr('readonly','true');
  $('input[name=k_sedang]').addClass('readonly');
  $('input[name=rp_k_sedang]').attr('readonly','true');
  $('input[name=rp_k_sedang]').addClass('readonly');
  $('input[name=k_besar]').attr('readonly','true');
  $('input[name=k_besar]').addClass('readonly');
  $('input[name=rp_k_besar]').attr('readonly','true');
  $('input[name=rp_k_besar]').addClass('readonly');
  $('#row_cek_sp_detail').val('0');
});
function hapus(total_harga)
{
  var total = $("#total").val();
  var total_baru = total - total_harga;
  $("#total").val(total_baru);
  var strTotal_baru = toRp(total_baru);
  $("td#total_show").text(strTotal_baru);
  $("td#sub_total_show").text(strTotal_baru);
}

$('button.btn.btn-danger.btn-sm.hapus').click(function(event) {
  $(this).parent().parent().remove();
});

$("#example1").on('click','.btn.btn-danger.btn-sm.hapus',function(){
  $(this).parent().parent().remove();
});

function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
}

$('#table_one input').on('change', function() {
  var x = $('input[name="myRadio"]:checked', '#table_one').val();

  if (x == 1) {
    $('input[name=k_kecil]').removeAttr('readonly');
    $('input[name=k_kecil]').removeClass('readonly');
    $('input[name=rp_k_kecil]').removeAttr('readonly');
    $('input[name=rp_k_kecil]').removeClass('readonly');
    $('input[name=k_sedang]').attr('readonly','true');
    $('input[name=k_sedang]').addClass('readonly');
    $('input[name=rp_k_sedang]').attr('readonly');
    $('input[name=rp_k_sedang]').addClass('readonly');
    $('input[name=k_besar]').attr('readonly');
    $('input[name=k_besar]').addClass('readonly');
    $('input[name=rp_k_besar]').attr('readonly');
    $('input[name=rp_k_besar]').addClass('readonly');
  }
  if (x == 2) {
    $('input[name=k_kecil]').attr('readonly');
    $('input[name=k_kecil]').addClass('readonly');
    $('input[name=rp_k_kecil]').attr('readonly');
    $('input[name=rp_k_kecil]').addClass('readonly');
    $('input[name=k_sedang]').removeAttr('readonly','true');
    $('input[name=k_sedang]').removeClass('readonly');
    $('input[name=rp_k_sedang]').removeAttr('readonly');
    $('input[name=rp_k_sedang]').removeClass('readonly');
    $('input[name=k_besar]').attr('readonly');
    $('input[name=k_besar]').addClass('readonly');
    $('input[name=rp_k_besar]').attr('readonly');
    $('input[name=rp_k_besar]').addClass('readonly');
  } 
  if (x == 3) {
    $('input[name=k_kecil]').removeAttr('readonly');
    $('input[name=k_kecil]').addClass('readonly');
    $('input[name=rp_k_kecil]').removeAttr('readonly');
    $('input[name=rp_k_kecil]').addClass('readonly');
    $('input[name=k_sedang]').attr('readonly','true');
    $('input[name=k_sedang]').addClass('readonly');
    $('input[name=rp_k_sedang]').attr('readonly');
    $('input[name=rp_k_sedang]').addClass('readonly');
    $('input[name=k_besar]').removeAttr('readonly');
    $('input[name=k_besar]').removeClass('readonly');
    $('input[name=rp_k_besar]').removeAttr('readonly');
    $('input[name=rp_k_besar]').removeClass('readonly');
  }  

});
$('select[name=nama_barang]').change(function(event) {
  var value = $(this).val();
  var arr_val = value.split("###");
  $('td.show_satuan').text("["+arr_val[1]+"]");
});

$("#simpan_brg_smntra").click(function(event) {
  var x = $('input[name="myRadio"]:checked', '#table_one').val();
  var value = $('select#nama_barang').val();
  if (value == null)
  {
    var value = $('input#nama_brg_anon').val()
  }
  var arr_barang = value.split("###");
  var k_kecil = $('input[name=k_kecil]').val();
  var rp_k_kecil = $('input[name=rp_k_kecil]').val();
  var k_sedang = $('input[name=k_sedang]').val();
  var rp_k_sedang = $('input[name=rp_k_sedang]').val();
  var k_besar = $('input[name=k_besar]').val();
  var rp_k_besar = $('input[name=rp_k_besar]').val();
  var diskon = $('input[name=diskon]').val();
  var tgl_exp = $('input[name=tgl_exp]').val();
  var batch = $('input[name=batch_no]').val();
  var text = '';
  var row_cek_sp_detail = $('#row_cek_sp_detail').val();

  if (row_cek_sp_detail==0){
    if (x==1){
      var total_brg = k_kecil * rp_k_kecil; 
      var str_bundle = arr_barang[2] + '###' + k_kecil + '###' + arr_barang[1] + '###' + rp_k_kecil + '###' + diskon + '###' + tgl_exp + '###' + batch + '###' + total_brg; 
      text = text + '<tr>';
      text = text + '<td>'+ arr_barang[2] +'</td>';
      text = text + '<td>'+ k_kecil +'</td>';
      text = text + '<td style="text-align:right;">'+ arr_barang[1] +'</td>';  
      text = text + '<td>'+ rp_k_kecil +'</td>'; 
      text = text + '<td>'+ diskon +'</td>'; 
      text = text + '<td>'+ tgl_exp +'</td>'; 
      text = text + '<td>'+ batch +'</td>'; 
      text = text + '<td style="text-align:right;">'+ total_brg +'</td>'; 
      text = text + '<td>';
      text = text + '<button type="button" class="btn bg-navy btn-sm set_batch" data-toggle="modal" data-target="#modal_set_batch">';
      text = text + 'Set';
      text = text + '</button> ';     
      text = text + '<button type="button" class="btn bg-navy btn-sm sp_detail" data-toggle="modal" data-target="#modal_sp_detail">';    
      text = text + '<i class="fa fa-fw fa-edit"></i>';    
      text = text + '</button> ';       
      text = text + '<button type="button" class="btn btn-danger btn-sm hapus" onclick="hapus(' + total_brg + ')">';
      text = text + '<i class="fa fa-fw fa-trash"></i>';  
      text = text + '</button> ';
      text = text + '<input type="hidden" name="nama_barang_cek" value="' + value + '">'; 
      text = text + '<input type="hidden" name="bunddle[]" value="' + str_bundle + '">'; 
      text = text + '</td>';
      text = text + '</tr>';
    }
    if (x==2){
      var total_brg = k_sedang * rp_k_sedang; 
      var str_bundle = arr_barang[2] + '###' + k_sedang + '###' + arr_barang[1] + '###' + rp_k_sedang + '###' + diskon + '###' + tgl_exp + '###' + batch + '###' + total_brg;
      text = text + '<tr>';
      text = text + '<td>'+ arr_barang[2] +'</td>';
      text = text + '<td>'+ k_sedang +'</td>';
      text = text + '<td style="text-align:right;">'+ arr_barang[1] +'</td>';  
      text = text + '<td>'+ rp_k_sedang +'</td>'; 
      text = text + '<td>'+ diskon +'</td>'; 
      text = text + '<td>'+ tgl_exp +'</td>'; 
      text = text + '<td>'+ batch +'</td>'; 
      text = text + '<td style="text-align:right;">'+ total_brg +'</td>'; 
      text = text + '<td>';
      text = text + '<button type="button" class="btn bg-navy btn-sm set_batch" data-toggle="modal" data-target="#modal_set_batch">';
      text = text + 'Set';
      text = text + '</button> ';     
      text = text + '<button type="button" class="btn bg-navy btn-sm sp_detail" data-toggle="modal" data-target="#modal_sp_detail">';    
      text = text + '<i class="fa fa-fw fa-edit"></i>';    
      text = text + '</button> ';       
      text = text + '<button type="button" class="btn btn-danger btn-sm hapus" onclick="hapus(' + total_brg + ')">';
      text = text + '<i class="fa fa-fw fa-trash"></i>';    
      text = text + '</button> ';
      text = text + '<input type="hidden" name="nama_barang_cek" value="' + value + '">'; 
      text = text + '<input type="hidden" name="bunddle[]" value="' + str_bundle + '">';        
      text = text + '</td>';
      text = text + '</tr>';
    }
    if (x==3){
      var total_brg = k_besar * rp_k_besar; 
      var str_bundle = arr_barang[2] + '###' + k_besar + '###' + arr_barang[1] + '###' + rp_k_besar + '###' + diskon + '###' + tgl_exp + '###' + batch + '###' + total_brg;
      text = text + '<tr>';
      text = text + '<td>'+ arr_barang[2] +'</td>';
      text = text + '<td>'+ k_besar +'</td>';
      text = text + '<td style="text-align:right;">'+ arr_barang[1] +'</td>';  
      text = text + '<td>'+ rp_k_besar +'</td>'; 
      text = text + '<td>'+ diskon +'</td>'; 
      text = text + '<td>'+ tgl_exp +'</td>'; 
      text = text + '<td>'+ batch +'</td>'; 
      text = text + '<td style="text-align:right;">'+ total_brg +'</td>'; 
      text = text + '<td>';
      text = text + '<button type="button" class="btn bg-navy btn-sm set_batch" data-toggle="modal" data-target="#modal_set_batch">';
      text = text + 'Set';
      text = text + '</button> ';     
      text = text + '<button type="button" class="btn bg-navy btn-sm sp_detail" data-toggle="modal" data-target="#modal_sp_detail">';    
      text = text + '<i class="fa fa-fw fa-edit"></i>';    
      text = text + '</button> ';       
      text = text + '<button type="button" class="btn btn-danger btn-sm hapus" onclick="hapus(' + total_brg + ')">';
      text = text + '<i class="fa fa-fw fa-trash"></i>';    
      text = text + '</button> ';
      text = text + '<input type="hidden" name="nama_barang_cek" value="' + value + '">'; 
      text = text + '<input type="hidden" name="bunddle[]" value="' + str_bundle + '">';        
      text = text + '</td>';
      text = text + '</tr>';
    }  
    $('#example1').append(text);
    var total = $("#total").val();
    var total_baru = parseInt(total) + parseInt(total_brg);
    $("#total").val(total_baru);
    var strTotal_baru = toRp(total_baru);
    $("td#total_show").text(strTotal_baru);
    $("td#sub_total_show").text(strTotal_baru);  
  } else {
    $("tr#point_row").children().eq(0).text(arr_barang[2]);
    if(x==1) {
      var total_brg = k_kecil * rp_k_kecil; 
      var str_bundle = arr_barang[2] + '###' + k_kecil + '###' + arr_barang[1] + '###' + rp_k_kecil + '###' + diskon + '###' + tgl_exp + '###' + batch + '###' + total_brg;
      $("tr#point_row").children().eq(1).text(k_kecil);
      $("tr#point_row").children().eq(3).text(rp_k_kecil);
      $("tr#point_row").children().eq(7).text(k_kecil*rp_k_kecil);
      $("tr#point_row").children().eq(8).children().eq(4).val(str_bundle);
    }
    if(x==2) {
      var total_brg = k_sedang * rp_k_sedang; 
      var str_bundle = arr_barang[2] + '###' + k_sedang + '###' + arr_barang[1] + '###' + rp_k_sedang + '###' + diskon + '###' + tgl_exp + '###' + batch + '###' + total_brg;      
      $("tr#point_row").children().eq(1).text(k_sedang);
      $("tr#point_row").children().eq(3).text(rp_k_sedang);
      $("tr#point_row").children().eq(7).text(k_sedang*rp_k_sedang);
      $("tr#point_row").children().eq(8).children().eq(4).val(str_bundle);
    }
    if(x==3) {
      var total_brg = k_besar * rp_k_besar; 
      var str_bundle = arr_barang[2] + '###' + k_besar + '###' + arr_barang[1] + '###' + rp_k_besar + '###' + diskon + '###' + tgl_exp + '###' + batch + '###' + total_brg;   
      $("tr#point_row").children().eq(1).text(k_besar);
      $("tr#point_row").children().eq(3).text(rp_k_besar);
      $("tr#point_row").children().eq(7).text(k_besar*rp_k_besar);
      $("tr#point_row").children().eq(8).children().eq(4).val(str_bundle);
    }
    $("tr#point_row").children().eq(2).text(arr_barang[1]);
    $("tr#point_row").children().eq(4).text(diskon);
    $("tr#point_row").children().eq(5).text(tgl_exp);
    $("tr#point_row").children().eq(6).text(batch);
    $("tr#point_row").removeAttr('id');   

    $('#example1').append(text);
    var total = $("#total").val();
    var tot_brg_sblm = $("#tot_brg_sblm").val();
    var total_baru = parseInt(total) + parseInt(total_brg) - parseInt(tot_brg_sblm);
    $("#total").val(total_baru);
    var strTotal_baru = toRp(total_baru);
    $("td#total_show").text(strTotal_baru);
    $("td#sub_total_show").text(strTotal_baru); 
  }

});

$("#example1").on('click','.btn.btn-danger.btn-sm.sp_detail',function(){
//$("button.btn.bg-navy.btn-sm.sp_detail").click(function(event) {
  var cek_point = $(this).parent().parent().attr('id', 'point_row');
  var nama = $(this).parent().children().eq(3).val();
  var qty = $(this).parent().parent().children().eq(1).text();
  var satuan = $(this).parent().parent().children().eq(2).text();
  var harga = $(this).parent().parent().children().eq(3).text();
  var diskon = $(this).parent().parent().children().eq(4).text();
  var exp = $(this).parent().parent().children().eq(5).text();
  var batch = $(this).parent().parent().children().eq(6).text();
  var total_harga = $(this).parent().parent().children().eq(7).text();
  $("select[name=nama_barang]").val(nama);
  $("input#nama_brg_anon").val(nama + '^^');
  $('input[name=k_kecil]').val(qty);
  $('input[name=rp_k_kecil]').val(harga);
  $('input[name=diskon]').val(diskon);
  $('input[name=tgl_exp]').val(exp);
  $('input[name=batch_no]').val(batch);
  $('input#radio1').prop('checked', 'true');
  $('input[name=k_kecil]').removeAttr('readonly');
  $('input[name=k_kecil]').removeClass('readonly');
  $('input[name=rp_k_kecil]').removeAttr('readonly');
  $('input[name=rp_k_kecil]').removeClass('readonly');
  $('input[name=k_sedang]').attr('readonly','true');
  $('input[name=k_sedang]').addClass('readonly');
  $('input[name=rp_k_sedang]').attr('readonly','true');
  $('input[name=rp_k_sedang]').addClass('readonly');
  $('input[name=k_besar]').attr('readonly','true');
  $('input[name=k_besar]').addClass('readonly');
  $('input[name=rp_k_besar]').attr('readonly','true');
  $('input[name=rp_k_besar]').addClass('readonly');
  $('input#row_cek_sp_detail').val(1);
  $('input#tot_brg_sblm').val(total_harga);
});

$("button.btn.bg-navy.btn-sm.sp_detail").click(function(event) {
  var cek_point = $(this).parent().parent().attr('id', 'point_row');
  var nama = $(this).parent().children().eq(3).val();
  var qty = $(this).parent().parent().children().eq(1).text();
  var satuan = $(this).parent().parent().children().eq(2).text();
  var harga = $(this).parent().parent().children().eq(3).text();
  var diskon = $(this).parent().parent().children().eq(4).text();
  var exp = $(this).parent().parent().children().eq(5).text();
  var batch = $(this).parent().parent().children().eq(6).text();
  var total_harga = $(this).parent().parent().children().eq(7).text();
  $("select[name=nama_barang]").val(nama);
  $("input#nama_brg_anon").val(nama + '^^');
  $('input[name=k_kecil]').val(qty);
  $('input[name=rp_k_kecil]').val(harga);
  $('input[name=diskon]').val(diskon);
  $('input[name=tgl_exp]').val(exp);
  $('input[name=batch_no]').val(batch);
  $('input#radio1').prop('checked', 'true');
  $('input[name=k_kecil]').removeAttr('readonly');
  $('input[name=k_kecil]').removeClass('readonly');
  $('input[name=rp_k_kecil]').removeAttr('readonly');
  $('input[name=rp_k_kecil]').removeClass('readonly');
  $('input[name=k_sedang]').attr('readonly','true');
  $('input[name=k_sedang]').addClass('readonly');
  $('input[name=rp_k_sedang]').attr('readonly','true');
  $('input[name=rp_k_sedang]').addClass('readonly');
  $('input[name=k_besar]').attr('readonly','true');
  $('input[name=k_besar]').addClass('readonly');
  $('input[name=rp_k_besar]').attr('readonly','true');
  $('input[name=rp_k_besar]').addClass('readonly');
  $('input#row_cek_sp_detail').val(1);
  $('input#tot_brg_sblm').val(total_harga);
});
$("button.btn.bg-navy.btn-sm.set_batch").click(function(event) {
  var cek_point = $(this).parent().parent().attr('id', 'point_row');
});
$("#example1").on('click','.btn.btn-danger.btn-sm.set_batch',function(){
  var cek_point = $(this).parent().parent().attr('id', 'point_row');
});

$("#update_batch").click(function(event) {
  var nama = $("tr#point_row").children().eq(0).text();
  var qty = $("tr#point_row").children().eq(1).text();
  var satuan = $("tr#point_row").children().eq(2).text();
  var harga = $("tr#point_row").children().eq(3).text();
  var diskon = $("tr#point_row").children().eq(4).text();
  var total_brg = qty * harga;
  var kadarluarsa = $("#kadarluarsa").val();
  var batch_primer = $("#batch_primer").val();
  var str_bundle = nama + '###' + qty + '###' + satuan + '###' + harga + '###' + diskon + '###' + kadarluarsa + '###' + batch_primer + '###' + total_brg;
  $("tr#point_row").children().eq(5).text(kadarluarsa);
  $("tr#point_row").children().eq(6).text(batch_primer);
  $("tr#point_row").children().eq(8).children().eq(4).val(str_bundle);
  //alert($("tr#point_row").children().eq(1).text());
  $("tr#point_row").removeAttr('id');
});
var ibatch = 0, jexp = 0;
$("button#simpan_all").click(function(event) {
  var ibatch = 0, jexp = 0;
  $('#example1 tr').each(function() {
      var batch = $(this).children().eq(6).html();
      var tgl_exp = $(this).children().eq(5).html();
      if(batch=='') {
        ibatch = ibatch + 1;
      }
      if(tgl_exp=='') {
        jexp = jexp + 1;
      }    
  });
  if(ibatch!=0 && jexp!=0){
    alert("pastikan batch dan tanggal exp harus terisi!!!" + ibatch + jexp);
    return false;
  } else {
    return true;
  }
});



$('input[name=tgl_exp]').datepicker({
  format: 'dd-mm-yyyy'
});
// end form event
</script>

<style>
.modal-content.size-custom {
     width: 800px;
    margin-left: -100px; 
}
.datepicker{z-index:1151 !important;}
</style>
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>No Asset</th>
      <th>UNIT</th>
      <th>Tgl/Jam Terima</th>
      <th>Nama Barang</th>
      <th>Harga(Rp)</th>
      <th>Warna</th>
      <th>Spesifikasi</th>
      <th>Batch</th>
      <th>Umur Pakai</th>
      <th>Ref Kirim Gudang</th>
      <th>Status</th>
      <th>Tgl Hapus</th>
      <th>User Hapus</th>
      <th>Alasan</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
      <?php if($listdata[$i]['isWriteOff']=='DELETED') { ?>
      <tr class="asset_1 merah">
        <td><?=$listdata[$i]['no_asset']?></td>
        <td><?=$listdata[$i]['unit']?></td>
        <td><?=$this->date->konversi2a($listdata[$i]['tanggal_terima']).' '.$listdata[$i]['jam_terima']?></td>  
        <td><?=$listdata[$i]['nama']?></td>
        <td style="text-align:right"><?=$this->admin_template_minor->uang_format($listdata[$i]['harga_beli'])?></td>
        <td><?=$listdata[$i]['warna']?></td>
        <td><?=$listdata[$i]['spesifikasi']?></td>
        <td><?=$listdata[$i]['batch_no']?></td>
        <td><?=$listdata[$i]['umur_pakai']?></td>
        <td><?=$listdata[$i]['ref_no_kirim_gudang']?></td> 
        <td><?=$listdata[$i]['isWriteOff']?></td> 
        <td><?=$this->date->konversi2a($listdata[$i]['tgl_write_off'])?></td>  
        <td><?=$listdata[$i]['id_user_write_off']?></td>
        <td><?=$listdata[$i]['alasan_write_off']?></td>
      </tr>
      <?php } else { ?>
      <tr class="asset_1">
        <td><?=$listdata[$i]['no_asset']?></td>
        <td><?=$listdata[$i]['unit']?></td>
        <td><?=$this->date->konversi2a($listdata[$i]['tanggal_terima']).' '.$listdata[$i]['jam_terima']?></td>  
        <td><?=$listdata[$i]['nama']?></td>
        <td style="text-align:right"><?=$this->admin_template_minor->uang_format($listdata[$i]['harga_beli'])?></td>
        <td><?=$listdata[$i]['warna']?></td>
        <td><?=$listdata[$i]['spesifikasi']?></td>
        <td><?=$listdata[$i]['batch_no']?></td>
        <td><?=$listdata[$i]['umur_pakai']?></td>
        <td><?=$listdata[$i]['ref_no_kirim_gudang']?></td> 
        <td><?=$listdata[$i]['isWriteOff']?></td> 
        <td><?=$this->date->konversi2a($listdata[$i]['tgl_write_off'])?></td>  
        <td><?=$listdata[$i]['id_user_write_off']?></td>
        <td><?=$listdata[$i]['alasan_write_off']?></td>
      </tr>
      <?php } ?>
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
      <td colspan="3">
      <input type="hidden" name="no_asset">
        <textarea name="alasan" rows="2" cols="10" style="width:100%;"></textarea>
      </td>
      <td colspan="4">
        <button type="button" class="btn btn-danger btn-sm" id="btn_hapus">
          <i class="fa fa-fw fa-trash"></i>
          Hapus / Musnah Dengan Alasan
        </button>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>


<script>  
applyPagination2()
function applyPagination2(){
  $("#ajax_pagingsearci a").click(function() {
    var url = $(this).attr("href");
    $.ajax({
      type: "POST",
      data: "ajax=1",
      url: url,
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
    return false;
  });
}

$('.asset_1').click(function(event) {
  var no_asset = $(this).children().eq(0).text();
  $('.asset_1',$(this).parent()).removeAttr('style');
  $(this).css('background-color', '#ccc');
  $('input[name=no_asset]').val(no_asset);
});
$('#btn_hapus').click(function(event) {
    var alasan = $("textarea[name=alasan]").val();
    var no_asset = $("input[name=no_asset]").val();
    if(alasan=='') {
      alert('alasan harus di isi..');
      return false;
    } else if (no_asset == '') {
      alert('pilih data yg mau dihapus');
      return false;
    } else {
      $.ajax({
        type: "POST",
        data: "no_asset="+no_asset+"&alasan="+alasan,
        url: "<?=base_url()?>index.php/gudang_logistik/daftar_inventaris/hapus",
        success: function(msg) {
          $("div#info").html(msg);
        }
      });       
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
.merah {
  background-color:red !important;
  color:#fff;
}
</style>
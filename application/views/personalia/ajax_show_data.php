<form action="<?=base_url()?>index.php/personalia/gaji_dokter_n_karyawan/ubah" method="post" accept-charset="utf-8">

<table id="table1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Keterangan</th>
      <th>Penambahan (Rp)</th>
      <th>Pengurangan (Rp)</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Jasa Medis</td>
      <td contenteditable="true" class="plus">0</td>
      <td></td>
      <td>
        <input type="hidden" name="bundle_data[]" class="bundle" value="Jasa Medis###0####0">
        <a href="javascript:void(0);" class="btn btn-danger btn-sm" >
          <i class="fa fa-fw fa-trash"></i>
        </a>
      </td>
    </tr>
    <tr>
      <td>Gaji Pokok</td>
      <td contenteditable="true" class="plus"><?=$list_data['gajipokok'];?></td>
      <td></td>
      <td>
        <input type="hidden" name="bundle_data[]" class="bundle" value="Gaji Pokok###<?=$list_data['gajipokok'];?>####0">
        <a href="javascript:void(0);" class="btn btn-danger btn-sm" >
          <i class="fa fa-fw fa-trash"></i>
        </a>
      </td>
    </tr>
    <tr>
      <td>Tunjungan Transport</td>
      <td contenteditable="true" class="plus"><?=$list_data['trans'];?></td>
      <td></td>
      <td>
        <input type="hidden" name="bundle_data[]" class="bundle" value="Tunjungan Transport###<?=$list_data['trans'];?>####0">
        <a href="javascript:void(0);" class="btn btn-danger btn-sm" >
          <i class="fa fa-fw fa-trash"></i>
        </a>
      </td>
    </tr>
    <tr>
      <td>Tunjangan Makan</td>
      <td contenteditable="true" class="plus"><?=$list_data['makan'];?></td>
      <td></td>
      <td>
        <input type="hidden" name="bundle_data[]" class="bundle" value="Tunjungan Makan###<?=$list_data['makan'];?>####0">
        <a href="javascript:void(0);" class="btn btn-danger btn-sm" >
          <i class="fa fa-fw fa-trash"></i>
        </a>
      </td>
    </tr>
    <tr>
      <td>Tunjangan Kehadiran</td>
      <td contenteditable="true" class="plus"><?=$list_data['kehadiran'];?></td>
      <td></td>
      <td>
        <input type="hidden" name="bundle_data[]" class="bundle" value="Tunjungan Makan###<?=$list_data['kehadiran'];?>####0">
        <a href="javascript:void(0);" class="btn btn-danger btn-sm" >
          <i class="fa fa-fw fa-trash"></i>
        </a>
      </td>      
    </tr>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="4" id="show_total">
      </td>
    </tr> 
    <tr>
      <td colspan="4">
        <input type="hidden" name="id" value="<?=$list_data['id'];?>">
        <input type="hidden" name="periode_gaji" value="<?=$periode_gaji;?>">
        <input type="hidden" name="metod_pembayaran" value="<?=$metod_pembayaran;?>">
        <input type="hidden" name="tot_penambahan" id="tot_penambahan" >
        <input type="hidden" name="tot_pengurangan" id="tot_pengurangan" >
        <button type="button" id="tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah</button>
        <button type="confirm" id="tambah" class="btn btn-primary btn-sm" >Simpan</button>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>

</form>

<!-- Begin Modals -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog larges">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Gaji Dokter dan Karyawan</h4>
        </div>
        <div class="modal-body" id="modal_body_show">
          <table width="100%">
            <tr>
              <td width="35%" style="padding-top:5px;font-weight:bold;">Keterangan :</td>
              <td width="65%" style="padding-top:5px">
              <select class="form-control input-sm" name="keterangan" id="keterangan">
                <?php for ($i=0; $i < count($list_keterangan) ; $i++) { ?>
                  <option value="<?=$list_keterangan[$i]?>"><?=$list_keterangan[$i]?></option>
                <?php } ?>
              </select>
              </td>
            </tr>
            <tr>
              <td width="35%" style="padding-top:5px;">Posisi :</td>
              <td width="65%" style="padding-top:5px">
              <select class="form-control input-sm" name="posisi" id="posisi">
                <option value="+">[+] Penambahan</option>
                <option value="-">[-] Pengurangan</option>
              </select>
              </td>
            </tr>
            <tr>
              <td width="35%" style="padding-top:5px;">Nilai Rupiah :</td>
              <td width="65%" style="padding-top:5px">
                <input type="text" class="form-control input-sm" name="nilai_rupiah" id="nilai_rupiah">
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success btn-sm" id="simpan" data-dismiss="modal">Simpan</button>
          <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
<!-- ends Modals -->

<script>  

$("button#simpan").click(function(event) {
  var total_plus = 0, total_minus = 0;

  $("td.plus").each(function() {
    $this = $(this);
    var value = parseInt($this.text());
    total_plus = total_plus + value 
  });
  $("td.minus").each(function() {
    $this = $(this);
    var value = parseInt($this.text());
    total_minus = total_minus + value 
  });
  var keterangan = $("#keterangan").val();
  var posisi = $("#posisi").val();
  var nilai_rupiah = $("#nilai_rupiah").val();
  if(posisi=='+') {
    var teks = '<tr>' +
        '<td>'+keterangan+'</td>' +
        '<td contenteditable="true" class="plus">'+nilai_rupiah+'</td>' +
        '<td></td>' +
        '<td>' +
          '<input type="hidden" name="bundle_data[]" class="bundle" value="'+keterangan+'###'+nilai_rupiah+'###'+'0">' +
          '<a href="javascript:void(0);" class="btn btn-danger btn-sm">' +
            '<i class="fa fa-fw fa-trash"></i>' +
          '</a>' +
        '</td>' +      
      '</tr>';
    $('#table1').append(teks);
    $("#tot_penambahan").val(total_plus + parseInt(nilai_rupiah));
    $("#tot_pengurangan").val(total_minus);
  } else {
    var teks = '<tr>' +
        '<td>'+keterangan+'</td>' +        
        '<td></td>' +
        '<td contenteditable="true" class="minus">'+nilai_rupiah+'</td>' +
        '<td>' +
          '<input type="hidden" name="bundle_data[]" class="bundle" value="'+keterangan+'###0###'+nilai_rupiah+'">' +
          '<a href="javascript:void(0);" class="btn btn-danger btn-sm">' +
            '<i class="fa fa-fw fa-trash"></i>' +
          '</a>' +
        '</td>' +      
      '</tr>';
    $("td.minus").each(function() {
      $this = $(this);
      var value = parseInt($this.text());
      total_minus = parseInt(total_minus) + value;
    });
    $('#table1').append(teks);
    $("#tot_penambahan").val(total_plus);
    $("#tot_pengurangan").val(total_minus + parseInt(nilai_rupiah));    
  }
  $.ajax({
    type: "POST",
    data: "tot_penambahan="+$("#tot_penambahan").val()+"&tot_pengurangan="+$("#tot_pengurangan").val(),
    url: "<?=base_url()?>index.php/personalia/gaji_dokter_n_karyawan/ajax_total_gaji",
    success: function(msg) {
      //alert($("#tot_penambahan").val());
      $("td#show_total").html(msg);
    }
  });
});
$("td[contenteditable=true]").blur(function(){
    var field_userid = $(this).attr("id") ;
    var value = $(this).text() ;
    var keterangan = $(this).parent().children().eq(0).text();
    var tambah = $(this).parent().children().eq(1).text();
    var kurang = $(this).parent().children().eq(2).text();
    var combine = keterangan + "###" + tambah + "###" + kurang;
    var teks = $(this).parent().children().eq(3).children().eq(0).val(combine);        
});
$("#table1").on('click','.btn.btn-danger.btn-sm',function(){
  var total_plus = 0, total_minus = 0;
  $(this).parent().parent().remove(); 
  $("td.plus").each(function() {
    $this = $(this);
    var value = parseInt($this.text());
    total_plus = total_plus + value ;
  });
  $("td.minus").each(function() {
    $this = $(this);
    var value = parseInt($this.text());
    total_minus = total_minus + value; 
  });
  $("#tot_penambahan").val(total_plus);
  $("#tot_pengurangan").val(total_minus); 
  $.ajax({
    type: "POST",
    data: "tot_penambahan="+$("#tot_penambahan").val()+"&tot_pengurangan="+$("#tot_pengurangan").val(),
    url: "<?=base_url()?>index.php/personalia/gaji_dokter_n_karyawan/ajax_total_gaji",
    success: function(msg) {
      $("td#show_total").html(msg);
    }
  });
});

$("#table1").on('blur','td[contenteditable=true]',function(){
    var field_userid = $(this).attr("id") ;
    var value = $(this).text() ;
    var keterangan = $(this).parent().children().eq(0).text();
    var tambah = $(this).parent().children().eq(1).text();
    var kurang = $(this).parent().children().eq(2).text();
    var combine = keterangan + "###" + tambah + "###" + kurang;
    var teks = $(this).parent().children().eq(3).children().eq(0).val(combine);    
});
// end form event
</script>
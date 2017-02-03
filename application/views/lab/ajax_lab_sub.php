<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Text Hasil</th>
      <th>Nama Pemeriksaan</th>
      <th>Bidang</th>
      <th>Model Hitung</th>
      <th>Text Reference</th>
      <th>Normal Laki</th>
      <th>Normal Perempuan</th>
      <th>Metode</th>
      <th>Index</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($list_data); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="<?=$list_data[$i]['id']?>" data-toggle="modal" data-target="#myModal">
          <?=$list_data[$i]['nama']?>
        </a>
      </td>
      <td><?=$list_data[$i]['layanan']?></td>
      <td><?=$list_data[$i]['nama_bidang']?></td>
      <td><?=$list_data[$i]['mode_hitung']?></td>
      <td><?=$list_data[$i]['text_depan']?></td>
      <td><?=$list_data[$i]['laki_t1']?> - <?=$list_data[$i]['laki_t2'].$list_data[$i]['satuan']?></td>
      <td><?=$list_data[$i]['perempuan_t1']?> - <?=$list_data[$i]['perempuan_t2'].$list_data[$i]['satuan']?>?></td>
      <td><?=$list_data[$i]['metode']?></td>
      <td><?=$list_data[$i]['inc']?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td>
        <button type="button" id="tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah</button>
      </td>
      <td colspan="3">
        <ul class="pagination pull-right" id="ajax_pagingsearc" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog larges">
    <form id="form_modul" action="<?=base_url()?>index.php/laboratorium/lab_sub/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Set Up Hasil</h4>
        </div>
        <div class="modal-body">

          <table width="100%">
            <tbody>
              <tr>
                <td width="50%">
                  
                  <table width="100%">
                    <tbody>
                      <?=$select_bidang;?>
                      <?=$select_pemeriksaan;?>
                      <?php echo input_text_1('Text Hasil', 'text hasil', 'text_hasil');?>
                      <?php echo input_text_1('Metode', 'isi metode', 'metode');?>
                      <?php echo input_text_1('Set Index', 'set index', 'index');?>
                    </tbody>
                  </table>  

                </td>
                <td id="show_spesimen" width="50%" style="padding-left: 10px" valign="top">

                  <table width="100%">
                    <tbody>
                      <?=field_kosong_v2('', 'td_gol_darah','Model Hitung');?>
                      <?=$radio_pilih;?>
                      <?=$select_perbandingan;?>
                      <?php echo input_text_1a('Text Depan', 'text depan', 'text_depan', 'tr_text_depan');?>
                      <?=$select_nilai_satuan;?>
                      <?php echo input_text_3('Nilai Laki','Nilai', 'nilai_lk1','nilai_lk2','tr_nilai_laki');?>
                      <?php echo input_textarea_2('Text Laki laki', 'isi text', 'text_laki','tr_text_laki');?>
                      <?php echo input_text_3('Nilai Perempuan','Nilai', 'nilai_pr1','nilai_pr2','tr_nilai_perempuan');?>
                      <?php echo input_textarea_2('Text Permpuan', 'isi text', 'text_perempuan','tr_text_perempuan');?>
                    </tbody>
                  </table>

                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="modal-footer">
          <?php echo form_hidden('id');?>
          <button type="submit" class="btn btn-success btn-sm" id="simpan">Simpan</button>
          <button type="submit" class="btn btn-success btn-sm" id="ubah">Ubah</button>
          <button type="submit" class="btn btn-danger btn-sm" id="hapus">Hapus</button>
          <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>

    </form>
  </div>
</div>

<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
  var filter = $('input#filter').val();
  var url = $(this).attr("href");  
  $.ajax({
    type: "GET",
    data: "ajax=1&filter="+filter,
    url: url,
    success: function(msg) {
      $("div#ajax_lab_detail").html(msg);
    }
  });
  return false;
  });
}

//nilai
$('#tr_nilai_laki').hide();
$('#tr_nilai_perempuan').hide();
$('#td_perbandingan_id').hide();
$('#td_nilai_satuan_id').hide();
$('#tr_text_depan').hide();
$('#tr_text_laki').show();
$('#tr_text_perempuan').show();
$("input[name='nilai']").on('change', function() {
  var cek_value = $("input[name='nilai']:checked").val();
  //alert(cek_value);
  if(cek_value=='text')
  {
    $('#tr_nilai_laki').hide();
    $('#tr_nilai_perempuan').hide();
    $('#td_perbandingan_id').hide();
    $('#td_nilai_satuan_id').hide();
    $('#tr_text_depan').hide();
    $('#tr_text_laki').show();
    $('#tr_text_perempuan').show();
  } else {
    $('#tr_nilai_laki').show();
    $('#tr_nilai_perempuan').show();
    $('#td_perbandingan_id').show();
    $('#td_nilai_satuan_id').show();
    $('#tr_text_depan').show();
    $('#tr_text_laki').hide();
    $('#tr_text_perempuan').hide();
    $('input[name="nilai_lk2"]').hide();
    $('input[name="nilai_pr2"]').hide();
  } 
});

$('#lab_bidang_id').change(function() {
  $.ajax({
    type: "GET",
    data: "id_bidang="+$("select#lab_bidang_id").val(),
    url: "<?=base_url()?>index.php/laboratorium/lab_sub/select_detail",
    success: function(msg) {
      $("td#td_detail_id").html(msg);
    }
  });  
});
$('#Perbandingan').change(function() {
  var cek_value = $('#Perbandingan').val()  
  if(cek_value == 'Antara Sama Dengan'){
    $('input[name="nilai_lk2"]').show();
    $('input[name="nilai_pr2"]').show();   
  } else {
    $('input[name="nilai_lk2"]').hide();
    $('input[name="nilai_pr2"]').hide();
  }
});

// begin form event
$('button#ubah').hide();
$('button#hapus').hide();
$('button#tambah').click(function() {
  $("input[name='id']").val('');
  $("select[name='lab_bidang_id']").val('');
  $("select[name='lab_detail_id']").val('');
  $("input[name='text_hasil']").val('');
  $("input[name='metode']").val('');
  $("input[name='index']").val('');
  $("input[name='nilai']:checked").val('text');
  $("textarea[name='text_laki']").text('');
  $("textarea[name='text_perempuan']").text('');
  $("select[name='Perbandingan']").val('');
  $("input[name='text_depan']").val('');
  $("select[name='satuan_nilai_id']").val('');
  $("input[name='nilai_lk1']").val('');
  $("input[name='nilai_lk2']").val('');
  $("input[name='nilai_pr1']").val('');
  $("input[name='nilai_pr2']").val('');
  $("button#simpan").show();
  $("button#ubah").hide();
  $('button#hapus').hide();
});
<?php for ($i=0; $i < count($list_data); $i++) {  ?>
$("a#<?=$list_data[$i]['id']?>").click(function() {
  $("input[name='id']").val("<?=$list_data[$i]['id']?>");
  $("select[name='lab_bidang_id']").val("<?=$list_data[$i]['lab_bidang_id']?>");
  $.ajax({
    type: "GET",
    data: "id_bidang="+$("select#lab_bidang_id").val(),
    url: "<?=base_url()?>index.php/laboratorium/lab_sub/select_detail",
    success: function(msg) {
      $("td#td_detail_id").html(msg);
    }
  });
  $("select[name='lab_detail_id']").val("<?=$list_data[$i]['lab_detail_id']?>");
  $("input[name='text_hasil']").val("<?=$list_data[$i]['nama']?>");
  $("input[name='metode']").val("<?=$list_data[$i]['metode']?>");
  $("input[name='index']").val("<?=$list_data[$i]['inc']?>");
  <?php if($list_data[$i]['mode_hitung']=='text') { ?>
    $("input#teks").attr('checked',"false");
    $('#tr_nilai_laki').hide();
    $('#tr_nilai_perempuan').hide();
    $('#td_perbandingan_id').hide();
    $('#td_nilai_satuan_id').hide();
    $('#tr_text_depan').hide();
    $('#tr_text_laki').show();
    $('#tr_text_perempuan').show();
  <?php } else { ?>
    $("input#numeric").attr('checked',"false");
    $('#tr_nilai_laki').show();
    $('#tr_nilai_perempuan').show();
    $('#td_perbandingan_id').show();
    $('#td_nilai_satuan_id').show();
    $('#tr_text_depan').show();
    $('#tr_text_laki').hide();
    $('#tr_text_perempuan').hide();
    $('input[name="nilai_lk2"]').hide();
    $('input[name="nilai_pr2"]').hide();
  <?php } ?>
  $("textarea[name='text_laki']").text("<?=$list_data[$i]['laki_text']?>");
  $("textarea[name='text_perempuan']").text("<?=$list_data[$i]['perempuan_text']?>");
  $("select[name='Perbandingan']").val("<?=$list_data[$i]['mode_hitung']?>");
  $("input[name='text_depan']").val("<?=$list_data[$i]['text_depan']?>");
  $("select[name='satuan_nilai_id']").val("<?=$list_data[$i]['satuan']?>");
  $("input[name='nilai_lk1']").val("<?=$list_data[$i]['laki_t1']?>");
  $("input[name='nilai_lk2']").val("<?=$list_data[$i]['laki_t2']?>");
  $("input[name='nilai_pr1']").val("<?=$list_data[$i]['perempuan_t1']?>");
  $("input[name='nilai_pr2']").val("<?=$list_data[$i]['perempuan_t2']?>");
  $("button#ubah").show();
  $('button#hapus').show();
});
<?php } ?>
// end form event
</script>
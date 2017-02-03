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

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="<?=$i?>" data-toggle="modal" data-target="#myModal">
          <?=str_replace(' ', '&nbsp;', $listdata[$i]['nama'])?>
        </a>
      </td>
      <td><?=$listdata[$i]['jenis']?></td>
      <td><?=$listdata[$i]['bidang']?></td>
      <td><?=$listdata[$i]['mode_hitung']?></td>
      <td><?=$listdata[$i]['text_depan']?></td>
      <?php 
      if($listdata[$i]['mode_hitung']=='Text') { 
        echo '<td>'.$listdata[$i]['laki_text'].'</td>';
        echo '<td>'.$listdata[$i]['perempuan_text'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Antara Sama Dengan') {
        echo '<td>'.$listdata[$i]['laki_t1'].' - '.$listdata[$i]['laki_t2'].$listdata[$i]['satuan'].'</td>';
        echo '<td>'.$listdata[$i]['perempuan_t1'].' - '.$listdata[$i]['perempuan_t2'].$listdata[$i]['satuan'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Lebih Kecil Dari') {
        echo '<td> <'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].'</td>';
        echo '<td> <'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Lebih Kecil Dari Sama Dengan') {
        echo '<td> =<'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].'</td>';
        echo '<td> =<'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].'</td>';
      } elseif ($listdata[$i]['mode_hitung']=='Lebih Besar Dari Sama Dengan') {
        echo '<td>'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].' >= </td>';
        echo '<td>'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].' >= </td>';
      } else {
        echo '<td>'.$listdata[$i]['laki_t1'].$listdata[$i]['satuan'].' > </td>';
        echo '<td>'.$listdata[$i]['perempuan_t1'].$listdata[$i]['satuan'].' > </td>';
      }

      ?>

      <td><?=$listdata[$i]['metode']?></td>
      <td><?=$listdata[$i]['inc']?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="3">
        <button type="button" id="tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah</button>
        <button type="button" id="cetak" class="btn btn-primary btn-sm">Cetak</button>
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


<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog larges">
    <form id="form_modul" action="<?=base_url()?>index.php/laboratorium/setup_hasil/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lab Detail</h4>
        </div>
        <div class="modal-body">

          <table width="100%">
            <tbody>
              <tr>
                <td width="50%" id="showform">
                  <table width="100%">
                    <tbody>
                      <tr>
                        <td width="20%" style="padding-top:5px">Bidang</td>
                        <td width="80%" style="padding-top:5px">
                          <select class="form-control input-sm" name="bidang_modal" id="bidang_modal">
                          <?php for ($i=0; $i < count($listbidang) ; $i++) { ?>
                            <option value="<?=$listbidang[$i]['nama']?>"><?=$listbidang[$i]['nama']?></option>
                          <?php } ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">Pemeriksaan</td>
                        <td width="80%" style="padding-top:5px" id="select_pemeriksaan">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">Text Hasil</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="nama" id="nama" value="">
                          <input type="hidden" class="form-control input-sm" name="nama_up" id="nama_up" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">Metode</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="metode" id="metode" value="">
                        </td>
                      </tr>
                    </tbody>
                  </table>                
                </td>
                <td width="50%" style="padding-left: 10px" valign="top">
                  <table width="100%">
                    <tbody>
                      <tr>
                        <td width="20%" style="padding-top:5px">Model Hitung</td>
                        <td width="80%" style="padding-top:5px">
                          <select class="form-control input-sm" name="model_hitung" id="model_hitung">
                          <?php for ($i=0; $i < count($listmodel_hitung) ; $i++) { ?>
                            <option value="<?=$listmodel_hitung[$i]?>"><?=$listmodel_hitung[$i]?></option>
                          <?php } ?>
                          </select>
                        </td>
                      </tr>
                      <tr class="view_text">
                        <td width="20%" style="padding-top:5px">Text LK</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="text_lk" id="text_lk" value="">
                        </td>
                      </tr>
                      <tr class="view_text">
                        <td width="20%" style="padding-top:5px">Text PR</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="text_pr" id="text_pr" value="">
                        </td>
                      </tr>
                      <tr class="view_nilai">
                        <td width="20%" style="padding-top:5px">Nilai LK</td>
                        <td width="80%" style="padding-top:5px">
                          <table>
                            <tbody>
                              <tr>
                                <td><input type="text" class="form-control input-sm" name="nilai_lk1" id="nilai_lk1" value=""></td>
                                <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
                                <td><input type="text" class="form-control input-sm" name="nilai_lk2" id="nilai_lk2" value=""></td>  
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr class="view_nilai">
                        <td width="20%" style="padding-top:5px">Nilai PR</td>
                        <td width="80%" style="padding-top:5px">
                          <table>
                            <tbody>
                              <tr>
                                <td><input type="text" class="form-control input-sm" name="nilai_pr1" id="nilai_pr1" value=""></td>
                                <td>&nbsp;&nbsp;-&nbsp;&nbsp;</td>
                                <td><input type="text" class="form-control input-sm" name="nilai_pr2" id="nilai_pr2" value=""></td>  
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr class="view_nilai">
                        <td width="20%" style="padding-top:5px">Text Depan</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="text_depan" id="text_depan" value="">
                        </td>
                      </tr>
                      <tr class="view_nilai">
                        <td width="20%" style="padding-top:5px">Satuan Nilai Normal</td>
                        <td width="80%" style="padding-top:5px">
                          <select class="form-control input-sm" name="satuan" id="satuan">
                          <?php for ($i=0; $i < count($listnilai_normal) ; $i++) { ?>
                            <option value="<?=$listnilai_normal[$i]?>"><?=$listnilai_normal[$i]?></option>
                          <?php } ?>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>                                  
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-sm" id="simpan">Simpan</button>
          <button type="submit" class="btn btn-success btn-sm" id="ubah">Ubah</button>
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
  var url = $(this).attr("href");  
  $.ajax({
    type: "POST",
    data: "ajax=1&filter="+$("#text_filter").val(),
    url: url,
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });
  return false;
  });
}
$('tr.view_nilai').hide();
$('select#model_hitung').change(function(event) {
  if($("select#model_hitung").val()=='Text'){
    $('tr.view_nilai').hide();
    $('tr.view_text').show();
  } else if($("select#model_hitung").val()=='Antara Sama Dengan') {
    $('tr.view_nilai').show();
    $('tr.view_text').hide();
    $('#text_lk').val('');
    $('#text_pr').val('');
    $('#nilai_lk2').val('');
    $('#nilai_pr2').val('');
    $('#nilai_lk2').show();
    $('#nilai_pr2').show();
  } else if($("select#model_hitung").val()=='Lebih Kecil Dari') {
    $('tr.view_nilai').show();
    $('tr.view_text').hide();
    $('#nilai_lk2').hide();
    $('#nilai_pr2').hide();
  } else if($("select#model_hitung").val()=='Lebih Kecil Sama Dengan') {
    $('tr.view_nilai').show();
    $('tr.view_text').hide();
    $('#nilai_lk2').hide();
    $('#nilai_pr2').hide();
  } else if($("select#model_hitung").val()=='Lebih Besar Sama Dengan') {
    $('tr.view_nilai').show();
    $('tr.view_text').hide(); 
    $('#nilai_lk2').hide();
    $('#nilai_pr2').hide();
  } else {
    $('tr.view_nilai').show();
    $('tr.view_text').hide(); 
    $('#nilai_lk2').hide();
    $('#nilai_pr2').hide();
  }     
});

$.ajax({
  type: "POST",
  data: "bidang="+$("#bidang_modal").val(),
  url: "<?=base_url()?>index.php/laboratorium/setup_hasil/select_lab_detail",
  success: function(msg) {
    $("td#select_pemeriksaan").html(msg);
  }
});

$("#hapus").click(function(event) {
  r= confirm("Apakah data mau di hapus?");
  if(r==true)
  {
    $("#form_modul").attr('action', '<?=base_url()?>index.php/laboratorium/setup_hasil/hapus/');
  } else {
    return false;
  }
});

$("#bidang_modal").change(function(event) {
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang_modal").val(),
    url: "<?=base_url()?>index.php/laboratorium/setup_hasil/select_lab_detail",
    success: function(msg) {
      $("td#select_pemeriksaan").html(msg);
    }
  });
});

// begin form event
$('button#ubah').hide();
$('button#hapus').hide();
$('button#tambah').click(function() {
  $("#bidang_modal").val('ALERGI');
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang_modal").val(),
    url: "<?=base_url()?>index.php/laboratorium/setup_hasil/select_lab_detail",
    success: function(msg) {
      $("td#select_pemeriksaan").html(msg);
    }
  });
  $("#nama").val('');
  $("#nama_up").val('');
  $("#metode").val('');
  $("#model_hitung").val('Text');
  $('tr.view_nilai').hide();
  $('tr.view_text').show();
  $("#text_lk").val('');
  $("#text_lk").val('');
  $("#nilai_lk1").val('');
  $("#nilai_lk2").val('');
  $("#nilai_pr1").val('');
  $("#nilai_pr2").val('');
  $("#text_depan").val('');
  $("#satuan").val('mg/dL');  
  $("button#simpan").show();
  $("button#ubah").hide();
  $('button#hapus').hide();
});


function cetak()
{
  var childWin = window.open("<?=base_url()?>index.php/laboratorium/setup_hasil/cetak/", "_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no"); 
}

$("#cetak").click(function(event) {
  cetak();
});

<?php for ($i=0; $i < count($listdata); $i++) {  ?>
$("a#<?=$i;?>").click(function() {
  $("#bidang_modal").val("<?=$listdata[$i]['bidang']?>");
  $.ajax({
    type: "POST",
    data: "bidang="+$("#bidang_modal").val(),
    url: "<?=base_url()?>index.php/laboratorium/setup_hasil/select_lab_detail",
    success: function(msg) {
      $("td#select_pemeriksaan").html(msg);
    }
  });
  $("#nama").val("<?=$listdata[$i]['nama']?>");
  $("#nama_up").val("<?=$listdata[$i]['nama']?>");
  $("#metode").val("<?=$listdata[$i]['metode']?>");
  $("#model_hitung").val("<?=$listdata[$i]['mode_hitung']?>");
  <?php if($listdata[$i]['mode_hitung']=='Text') { ?>
    $('tr.view_nilai').hide();
    $('tr.view_text').show();
    $('#text_lk').val("<?=$listdata[$i]['laki_text']?>");
    $('#text_pr').val("<?=$listdata[$i]['perempuan_text']?>");
  <?php } elseif($listdata[$i]['mode_hitung']=='Antara Sama Dengan') { ?>
    $('tr.view_nilai').show();
    $('tr.view_text').hide();    
    $('#text_lk').val("");
    $('#text_pr').val("");
    $('#nilai_lk1').val("<?=$listdata[$i]['laki_t1']?>");
    $('#nilai_pr1').val("<?=$listdata[$i]['perempuan_t1']?>");
    $('#nilai_lk2').val("<?=$listdata[$i]['laki_t2']?>");
    $('#nilai_pr2').val("<?=$listdata[$i]['perempuan_t2']?>");
    $('#nilai_lk2').show();
    $('#nilai_pr2').show();
  <?php } else { ?>
    $('tr.view_nilai').show();
    $('tr.view_text').hide();    
    $('#text_lk').val("");
    $('#text_pr').val("");
    $('#nilai_lk1').val("<?=$listdata[$i]['laki_t1']?>");
    $('#nilai_pr1').val("<?=$listdata[$i]['perempuan_t1']?>");
    $('#nilai_lk2').val("");
    $('#nilai_pr2').val("");
    $('#nilai_lk2').hide();
    $('#nilai_pr2').hide();
  <?php } ?>
  $("#text_depan").val("<?=$listdata[$i]['text_depan']?>");
  $("#satuan").val("<?=$listdata[$i]['satuan']?>");  
  $("button#simpan").hide();
  $("button#ubah").show();
  $('button#hapus').show();
});
<?php } ?>


// end form event
</script>
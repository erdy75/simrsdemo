<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Pemeriksaan</th>
      <th>Bidang</th>
      <th>Unit Cost (Rp)</th>
      <th>BETHANY</th>
      <th>HEMODIALISA</th>
      <th>KARYAWAN</th>
      <th>UMUM</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="<?=$i?>" data-toggle="modal" data-target="#myModal">
          <?=str_replace(' ', '&nbsp;', $listdata[$i]['id_layanan'])?>
        </a>
      </td>
      <td><?=$listdata[$i]['bidang']?></td>
      <td><?=$listdata[$i]['unit_cost']?></td>
      <td><?=$listdata[$i]['BETHANY']?></td>
      <td><?=$listdata[$i]['HEMODIALISA']?></td>
      <td><?=$listdata[$i]['KARYAWAN']?></td>
      <td><?=$listdata[$i]['UMUM']?></td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
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
    <form id="form_modul" action="<?=base_url()?>index.php/laboratorium/tarif_laboratorium/edit/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tarif Laboratorium</h4>
        </div>
        <div class="modal-body">
          <table width="100%">
            <tbody>
              <tr>
                <td width="50%" id="showform">
                  <table width="100%">
                    <tbody>
                      <tr>
                        <td width="20%" style="padding-top:5px">unit_cost</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="unit_cost" id="unit_cost" value="">
                          <input type="hidden" name="id_layanan" id="id_layanan" value="">
                          <input type="hidden" name="bidang" id="bidang_form" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">BETHANY</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="BETHANY" id="BETHANY" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">HEMODIALISA</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="HEMODIALISA" id="HEMODIALISA" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">KARYAWAN</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="KARYAWAN" id="KARYAWAN" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">UMUM</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="UMUM" id="UMUM" value="">
                        </td>
                      </tr>
                    </tbody>
                  </table>                
                </td>
                <td width="50%" style="padding-left: 10px" valign="top">                                
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






<?php for ($i=0; $i < count($listdata); $i++) {  ?>
$("a#<?=$i;?>").click(function() { 
  $("#bidang_form").val("<?=$listdata[$i]['bidang']?>");
  $("#id_layanan").val("<?=$listdata[$i]['id_layanan']?>");
  $("#BETHANY").val("<?=$listdata[$i]['BETHANY']?>");
  $("#HEMODIALISA").val("<?=$listdata[$i]['HEMODIALISA']?>");
  $("#KARYAWAN").val("<?=$listdata[$i]['KARYAWAN']?>");
  $("#UMUM").val("<?=$listdata[$i]['UMUM']?>");
  $("#unit_cost").val("<?=$listdata[$i]['unit_cost']?>");
});
<?php } ?>


// end form event
</script>
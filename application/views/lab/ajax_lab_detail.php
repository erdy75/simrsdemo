<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Nama Pemeriksaan</th>
      <th>Bidang</th>
      <th>Persiapan</th>
      <th>Unit Cost(Rp)</th>
      <th>Metode</th>
      <th>Spesiment</th>
      <th>Setup Hasil</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td>
        <a href="#" id="layanan<?=$i?>" data-toggle="modal" data-target="#myModal">
          <?=$listdata[$i]['id_layanan']?>
        </a>
      </td>
      <td><?=$listdata[$i]['bidang']?></td>
      <td><?=$listdata[$i]['persiapan']?></td>
      <td><?=$listdata[$i]['unit_cost']?></td>
      <td><?=$listdata[$i]['metode']?></td>
      <td><?=$listdata[$i]['specimen']?></td>
      <td><?=$listdata[$i]['setup_hasil']?></td>
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
  <div class="modal-dialog small">
    <form id="form_modul" action="<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/edit_detail/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

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
                        <td width="20%" style="padding-top:5px">Nama Periksa</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="id_layanan" id="id_layanan" value="">
                          <input type="hidden" class="form-control input-sm" name="id_layanan_up" id="id_layanan_up" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">Unit Cost</td>
                        <td width="80%" style="padding-top:5px">
                          <input type="text" class="form-control input-sm" name="unit_cost" id="unit_cost" value="">
                        </td>
                      </tr>
                      <tr>
                        <td width="20%" style="padding-top:5px">Persiapan</td>
                        <td width="80%" style="padding-top:5px">
                          <select class="form-control input-sm" name="persiapan" id="persiapan">
                          <?php for ($i=0; $i < count($listpersiapan) ; $i++) { ?>
                            <option value="<?=$listpersiapan[$i]?>"><?=$listpersiapan[$i]?></option>
                          <?php } ?>
                          </select>                          
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
                <td id="show_spesimen" width="50%" style="padding-left: 10px" valign="top">                                 
                </td>
              </tr>
            </tbody>
          </table>

        </div>
        <div class="modal-footer">
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
  var bidang = $("#bidang").val();
  var nama_pemeriksaan = $("#filter_nama").val();
  var url = $(this).attr("href");  
  $.ajax({
    type: "POST",
    data: "ajax=1&bidang="+bidang+"&nama_pemeriksaan="+nama_pemeriksaan,
    url: url,
    success: function(msg) {
      $("div#show_list").html(msg);
    }
  });
  return false;
  });
}

$("#hapus").click(function(event) {
  r= confirm("Apakah data mau di hapus?");
  if(r==true)
  {
    $("#form_modul").attr('action', '<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/hapus_detail/');
  } else {
    return false;
  }
});


// begin form event
$('button#ubah').hide();
$('button#hapus').hide();
$('button#tambah').click(function() {
  $("input[name='id_layanan']").val('');
  $("input[name='id_layanan_up']").val('');  
  $("input[name='unitcost']").val('');
  $("input[name='metode']").val('');
  $("select[name='persiapan']").val('');
  $("input[name='bidang_modal']").val('');
  $("button#simpan").show();
  $("button#ubah").hide();
  $('button#hapus').hide();
  $.ajax({
    type: "GET",
    data: "id_layanan=0",
    url: "<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/ajax_spesimen",
    success: function(msg) {
      $("td#show_spesimen").html(msg);
    }
  });
});


function cetak()
{
  var childWin = window.open("<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/cetak/", "_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no"); 
}

$("#cetak").click(function(event) {
  cetak();
});

<?php for ($i=0; $i < count($listdata); $i++) {  ?>
$("a#layanan<?=$i?>").click(function() {
  $("input[name='bidang_modal']").val('<?=$listdata[$i]['bidang']?>');
  $("input[name='id_layanan']").val('<?=$listdata[$i]['id_layanan']?>');
  $("input[name='id_layanan_up']").val('<?=$listdata[$i]['id_layanan']?>');  
  $("input[name='unit_cost']").val('<?=$listdata[$i]['unit_cost']?>');
  $("input[name='metode']").val('<?=$listdata[$i]['metode']?>');
  $("select[name='persiapan']").val('<?=$listdata[$i]['persiapan']?>');
  $("button#simpan").hide();
  $("button#ubah").show();
  $('button#hapus').show();
  $.ajax({
    type: "POST",
    data: "id_layanan="+$("input[name='id_layanan']").val(),
    url: "<?=base_url()?>index.php/laboratorium/nama_pemeriksaan/ajax_spesimen",
    success: function(msg) {
      $("td#show_spesimen").html(msg);
    }
  });
});
<?php } ?>

// end form event
</script>
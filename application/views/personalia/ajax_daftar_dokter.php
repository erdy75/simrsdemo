<table id="example1" class="table table-bordered table-striped">
  <thead >
    <tr>
      <th>ID Dokter</th>
      <th>Nama Dokter</th>
      <th>Status</th>
      <th>Poli</th>
      <th>Alamat</th>
      <th>Telp</th>
      <th>HP</th>
      <th>Tempat, Tanggal Lahir</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <td><?=$listdata[$i]['id']?></td>
      <td><?=$listdata[$i]['nama']?></td>
      <td id="<?=$i?>btn_aktif">
        <?php if($listdata[$i]['status'] =='Aktif') { ?>
          <a href="#" id="<?=$i?>aktif" class="btn btn-block btn-primary btn-sm" >Aktif</a>
        <?php } else { ?>
          <a href="#" id="<?=$i?>non_aktif" class="btn btn-block btn-danger btn-sm">Non Aktif</a>
        <?php } ?>    
      </td>
      <td><?=$listdata[$i]['poli']?></td>
      <td><?=$listdata[$i]['alamat']?></td>
      <td><?=$listdata[$i]['telp']?></td>
      <td><?=$listdata[$i]['no_hp']?></td>
      <td><?=$listdata[$i]['ttl']?></td>
      <td>
        <a href="#" class="btn btn-primary btn-sm" onclick="show_data(<?=$listdata[$i]['id']?>)" data-toggle="modal" data-target="#myModal">
          <i class="fa fa-fw fa-edit"></i>
        </a>
        <a href="<?=base_url()?>index.php/personalia/daftar_dokter/hapus/<?=$listdata[$i]['id']?>" class="btn btn-danger btn-sm" >
          <i class="fa fa-fw fa-trash"></i>
        </a>
      </td>      
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="3">
        <button type="button" id="tambah" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Tambah</button>
      </td>
      <td colspan="6">
        <ul class="pagination pull-right" id="ajax_pagingsearc" style="margin:-10px 0px">
          <p><?php echo $links; ?></p>
        </ul>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>


<!-- Begin Modals -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog larges">
    <form id="form_modul" action="<?=base_url()?>index.php/personalia/daftar_dokter/edit_data_dokter/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit / Tambah Data Dokter</h4>
        </div>
        <div class="modal-body" id="modal_body_show">


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
<!-- ends Modals -->

<script>  
applyPagination()
function applyPagination(){
  $("#ajax_pagingsearc a").click(function() {
    var url = $(this).attr("href"); 
    var cari_nama = $("#cari_nama").val();
    var order_p = $("#order_p").val();
    $.ajax({
      type: "POST",
      data: "ajax=1&cari_nama="+cari_nama+"&order_p="+order_p,
      url: url,
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
    return false;
  });
}
var cari_nama = $("#cari_nama").val();
var order_p = $("#order_p").val();
<?php for ($i=0; $i < count($listdata); $i++) {  ?>

$("a#<?=$i?>aktif").click(function(event) {
    var status = "<?=$listdata[$i]['status']?>";
    $.ajax({
      type: "POST",
      data: "ajax=1&id=<?=$listdata[$i]['id']?>&status="+status+"&cari_nama="+cari_nama+"&order_p="+order_p,
      url: "<?=base_url()?>index.php/personalia/daftar_dokter/update_status",
      success: function(msg) {
        //alert("<?=$listdata[$i]['id']?>"+status);
        $("div#show_ubah").html(msg);
      }
    });
});
$("a#<?=$i?>non_aktif").click(function(event) {
    var status = "<?=$listdata[$i]['status']?>";
    $.ajax({
      type: "POST",
      data: "ajax=1&id=<?=$listdata[$i]['id']?>&status="+status+"&cari_nama="+cari_nama+"&order_p="+order_p,
      url: "<?=base_url()?>index.php/personalia/daftar_dokter/update_status",
      success: function(msg) {
        //alert("<?=$listdata[$i]['id']?>"+status);
        $("div#show_ubah").html(msg);
      }
    });
});
<?php } ?>  
$("#tambah").click(function(event) {
    $.ajax({
      type: "POST",
      url: "<?=base_url()?>index.php/personalia/daftar_dokter/modal_daftar_dokter",
      success: function(msg) {
        $("div#modal_body_show").html(msg);
      }
    });
});
function show_data(id)
{
   $.ajax({
    type: "POST",
    url: "<?=base_url()?>index.php/personalia/daftar_dokter/modal_daftar_dokter/"+id,
    success: function(msg) {
      $("div#modal_body_show").html(msg);
    }
  }); 
}
// end form event
</script>
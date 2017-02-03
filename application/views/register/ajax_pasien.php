<table id="example1" class="table table-hover">
  <thead>
    <tr>
      <th>Pasien Id</th>
      <th>Nama Pasien</th>
      <th>Umur</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>Telp / HP</th>
      <th width="10%">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php for ($i=0; $i < count($list_data); $i++) {  ?>
    <tr>
      <td>
        <?=$list_data[$i]['pasien_id']?>     
      </td>
      <td>
        <?=$list_data[$i]['nama']?>
      </td>
      <td>
        <?=$list_data[$i]['tgl_lahir']?>
      </td>
      <td>
        <?=$list_data[$i]['alamat']?>
      </td>
      <td>
        <?=$list_data[$i]['jenis_kelamin']?>
      </td>
      <td>
        <?=$list_data[$i]['no_telp']?> / <?=$list_data[$i]['no_hp']?>
      </td>
      <td>
        <a class="btn btn-sm btn-primary" href="<?=base_url()?>index.php/register/pasien/edit_pasien/<?=$list_data[$i]['id']?>">
          <i class="glyphicon glyphicon-pencil"></i> Edit
        </a>
        <form action="<?=base_url()?>index.php/register/pasien/delete/" method="post">
          <button class="btn btn-sm btn-danger" type="submit" id="hapus">
            <?php echo form_hidden('id',$list_data[$i]['id']);?>
            <i class="glyphicon glyphicon-trash"></i> Delete  
          </button>
        </form>
      </td>
    </tr>
    <?php } ?>
  </tbody>
  <tfoot> 
    <!-- begin footer -->
    <tr>
      <td colspan="3">
        <ul class="pagination pull-left">
          <a class="btn btn-sm btn-succes" href="<?=base_url()?>index.php/register/pasien/edit_pasien/">
            <i class="glyphicon glyphicon-plus"></i> Tambah aja
          </a>
        </ul>
        <ul class="pagination pull-right" id="ajax_pagingsearc" style="margin:-10px 0px">
          <p><?php echo $links;?> </p>
        </ul>
      </td>
    </tr> 
    <!-- end footer -->
  </tfoot>
</table>
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
      $("div#ajax_pasien").html(msg);
    }
  });
  return false;
  });
}
// button hapus
$("button#hapus").click(function() {
  var txt;
  var r = confirm("Data Provinsi Akan Di Hapus?");
  if (r == true) {
      $("#form_modul").attr("action", "<?=base_url()?>index.php/register/pasien/delete/");
      txt = "You pressed OK!";
      alert(txt);
  } else {
      txt = "You pressed Cancel!";
      alert(txt);
      return false;
  }
});
</script>
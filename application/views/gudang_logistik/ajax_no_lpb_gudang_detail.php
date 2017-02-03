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
      <td><?=$listdata[$i]['jumlah']?></td>
      <td><?=$listdata[$i]['satuan']?></td>
      <td style="text-align:right;">Rp.<?=$this->admin_template_minor->uang_format($listdata[$i]['harga_beli'])?></td>
      <td><?=$listdata[$i]['disc']?></td>
      <td><?=$this->date->konversi2a($listdata[$i]['kadaluwarsa'])?></td>
      <td><?=$listdata[$i]['batch_no']?></td>
      <td style="text-align:right;">
        Rp.<?=$this->admin_template_minor->uang_format($listdata[$i]['jumlah']*$listdata[$i]['harga_beli']);?>  
      </td>
      <td>
        <button class="btn bg-navy btn-sm" id="set_batch" data-toggle="modal" data-target="#modal_lbp_gudang" onclick="get_data_faktur(<?=$listdata[$i]['no_faktur']?>,<?=$listdata[$i]['id']?>)">Set</button>
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
    <button class="btn btn-info btn-sm" id="batal">Batal</button>
  </div>
  <div class="col-md-6">
  <table width="100%">
    <tbody>
      <tr>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">Sub Total : </td>
        <td style="font-size:15px;padding:5px;font-weight:bolder;text-align:right;">
          Rp.<?=$this->admin_template_minor->uang_format($total_hasil['total_hasil']);?>  
        </td>
      </tr>
      <tr>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">PPN : </td>
        <td style="font-size:15px;padding:5px;font-weight:bolder;text-align:right;">
          Rp.<?php echo $this->admin_template_minor->uang_format(($total_hasil['total_hasil']*$ppn)/100);?></td>
      </tr>
      <tr>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">Materai : </td>
        <td style="font-size:15px;padding:5px;font-weight:bolder;">
          <select>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </select>
        </td>
      </tr>
      <tr>
        <td style="border-top:1px solid #000;font-size:15px;padding:5px;font-weight:bolder;">Total : </td>
        <td style="border-top:1px solid #000;font-size:15px;padding:5px;font-weight:bolder;text-align:right;">
          Rp.<?php echo $this->admin_template_minor->uang_format($total_hasil['total_hasil']-(($total_hasil['total_hasil']*$ppn)/100));?>  
        </td>
      </tr>
    </tbody>
  </table>
  </div>
</div>

<div id="modal_lbp_gudang" class="modal fade" role="dialog">
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
            <td style="padding:5px;"><input type="text" name="batch" id="batch"></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="bundle_data">
        <button type="button" class="btn btn-info btn-sm" id="update" data-dismiss="modal">Update</button>
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
    var no_faktur = "<?=$no_faktur?>";
    $.ajax({
      type: "POST",
      data: "ajax=1&no_faktur="+no_faktur,
      url: url,
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
    return false;
  });
}
$('#kadarluarsa').datepicker({
  format: 'dd-mm-yyyy'
});
function get_data_faktur(no_faktur,id)
{
  $("#bundle_data").val(no_faktur+'###'+id);
}

$("#update").click(function(event) {
  var bundle_data = $("#bundle_data").val();
  var kadarluarsa = $("#kadarluarsa").val();
  alert(kadarluarsa);
  var batch = $("#batch").val();
    $.ajax({
      type: "POST",
      data: "ajax=1&bundle_data="+bundle_data+"&kadarluarsa="+kadarluarsa+"&batch="+batch,
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/update_batch_gudang",
      success: function(msg) {
        $("div#info").html(msg);
      }
    });  

});
$("#batal").click(function(event) {

    $.ajax({
      type: "POST",
      data: "ajax=1&bundle_data="+bundle_data+"&kadarluarsa="+kadarluarsa+"&batch="+batch,
      url: "<?=base_url()?>index.php/gudang_logistik/penerimaan/kosong",
      success: function(msg) {
        $("div#show_list").html(msg);
        $("td#data_detail_gudang").html(msg);
      }
    });  
});
// end form event
</script>
<style>
.datepicker{z-index:1151 !important;}
</style>
<table>
  <tbody>
    <tr>
      <td style="padding:5px;">Supplier : </td>
      <td style="padding:5px;">
        <select name="supplier" id="supplier">
        <?php for ($i=0; $i < count($list_supp) ; $i++) { ?>
          <?php if($list_supp[$i]['nama']==$datalist['supplier']) { ?>
            <option value="<?=$list_supp[$i]['nama']?>" selected="true"><?=$list_supp[$i]['nama']?></option>
          <?php } else { ?>
            <option value="<?=$list_supp[$i]['nama']?>" ><?=$list_supp[$i]['nama']?></option>
          <?php } ?>
        <?php } ?>
        </select>
      </td>
      <td style="padding:5px;">
        Tgl Faktur :
      </td>
      <td style="padding:5px;">
        <input type="text" name="tgl_faktur" id="tgl_faktur" readonly="true" value="<?=$this->date->konversi2a($datalist['tgl_faktur_supplier'])?>">
      </td>
    </tr>
    <tr>
      <td style="padding:5px;">Fakt Supplier : </td>
      <td style="padding:5px;">
      <input type="text" name="fakt_supplier" id="fakt_supplier"  value="<?=$datalist['no_faktur_supplier']?>">
      </td>
      <td style="padding:5px;">
        Tgl terima :
      </td>
      <td style="padding:5px;">
        <input type="text" name="tgl_terima" id="tgl_terima" readonly="true" value="<?=$this->date->konversi2a($datalist['tgl_terima'])?>">
      </td>
    </tr>
    <tr>
      <td style="padding:5px;">PPN : </td>
      <td style="padding:5px;" colspan="3">
        <input type="text" name="ppn" id="ppn"  value="<?=$datalist['ppn']?>">%
      </td>
    </tr>
    <tr>
      <td style="padding:5px;">Klasifikasi : </td>
      <td style="padding:5px;">
        <select name="klasifikasi" id="klasifikasi">
        <?php for ($i=0; $i < count($list_klasifikasi) ; $i++) { ?>
          <?php if($datalist['jatuh_tempo']!=0 && $list_klasifikasi[$i]=='Hutang Jatuh Tempo') { ?>
            <option value="<?=$list_klasifikasi[$i]?>" selected="true"><?=$list_klasifikasi[$i]?></option>
          <?php } else { ?>
            <option value="<?=$list_klasifikasi[$i]?>"><?=$list_klasifikasi[$i]?></option>
          <?php } ?>
        <?php } ?>
        </select>
      </td>
      <td style="padding:5px;" colspan="2">
      <?php if($hari_tempo==0) { ?>
        <select name="hari" id="hari" style="display:none;">
      <?php } else { ?>
        <select name="hari" id="hari">
      <?php } ?>
        <?php for ($i=0; $i < count($list_hari) ; $i++) { ?>
          <?php if($hari_tempo['hari']==$list_hari[$i]) { ?>
            <option value="<?=$list_hari[$i]?>" selected="true"><?=$list_hari[$i]?></option>
          <?php } else { ?>
            <option value="<?=$list_hari[$i]?>"><?=$list_hari[$i]?></option>
          <?php } ?>
        <?php } ?>
        </select> Hari <?=$hari_tempo['hari'];?>       
      </td>
    </tr>
  </tbody>
</table>

<script>
$("#btn_load_sp_final").attr('disabled', 'true');
$("#btn_no_lpg_gudang").attr('disabled', 'true');
$("#btn_koreksi_lpb").attr('disabled', 'true');
$("#no_lpb_gudang").val("<?=$datalist['no_faktur']?>");
$("#no_lpb_gudang").attr('readonly', 'true');
var cek_supplier = <?=$cek_list_supp?>;
var nama_supplier = "<?=$datalist['supplier']?>";
if(cek_supplier==0) {
  $("#supplier").append('<option value="'+nama_supplier+'" selected="true">'+nama_supplier+'</option>');
}
</script>
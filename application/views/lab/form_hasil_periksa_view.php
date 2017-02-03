<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Hasil LAB</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Hasil LAB</a></li>
      <li class="active">Form Hasil Pemeriksaan LAB</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Begin Table -->
      <div class="col-md-12">
        <div class="box box-success">

          <!-- begin box-header -->
          <div class="box-header">
            <h3 class="box-title">Form Hasil Pemeriksaan LAB</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <form action="<?=base_url()?>index.php/laboratorium/Form_hasil_pemeriksaan_lab/proses" method="post" accept-charset="utf-8">
          <!-- end box-header -->
          <div class="box-header">
            <div class="row">
              <div class="col-md-4">
                
                <table>
                  <tr>
                    <td>Pasien : </td>
                    <td><?=$data_pasien['cib'];?> / <?=$data_pasien['nama_manual_edit'];?></td>
                  </tr>
                  <tr>
                    <td>Dokter : </td>
                    <td><?=$data_pasien['dokter'];?></td>
                  </tr>
                  <tr>
                    <td>Tgl / Perawatan : </td>
                    <td><?=$data_pasien['tanggal'];?> / <?=$data_pasien['jalan_inap'];?></td>
                  </tr>
                  <tr>
                    <td>Jenis : </td>
                    <td><?=$data_pasien['KelompokBeli'];?></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-4">
                <table>
                  <tr>
                    <td>Umur : <input type="hidden" name="sex" value="<?=$data_pasien['sex_manual_edit'];?>"></td>
                    <td><?=$data_pasien['umur_manual_edit'];?>, Jenis Kelamin <?=$data_pasien['sex_manual_edit'];?></td>
                  </tr>
                  <tr>
                    <td> Alamat : <input type="hidden" name="alamat" value="<?=$data_pasien['alamat_manual_edit'];?>"></td>
                    <td><?=$data_pasien['alamat_manual_edit'];?></td>
                  </tr>
                  <tr>
                    <td>Nilai Total Rp. : </td>
                    <td>Belum di koding</td>
                  </tr>
                  <tr>
                    <td>Penjamin : </td>
                    <td><?=$data_pasien['penjamin_manual_edit'];?></td>
                  </tr>
                </table>                
              </div>
              <div class="col-md-4">
                <table>
                  <tr>
                    <td>Dr. P. Jawab : </td>
                    <td>
                      <select name="dr_jawab" >
                        <?php
                        for ($i=0; $i < count($list_dokter); $i++) { 
                          if($data_pasien['dokter']==$list_dokter[$i]['nama'])
                          {
                            echo '<option value="'.$list_dokter[$i]['nama'].'" selected="true">'.$list_dokter[$i]['nama'].'</option>';  
                          }
                          else
                          {
                            echo '<option value="'.$list_dokter[$i]['nama'].'">'.$list_dokter[$i]['nama'].'</option>';  
                          }
                        }
                        ?>
                      </select>

                    </td>
                  </tr>
                  <tr>
                    <td> Analasis Medis : <input type="hidden" name="pemeriksa" value="<?=$data_pasien['pemeriksa'];?>"></td>
                    <td><?=$data_pasien['pemeriksa'];?></td>
                  </tr>
                  <tr>
                    <td>Catatan : <input type="hidden" name="status" id="status"  value="<?=$data_pasien['status'];?>"></td>
                    <td><textarea name="catatan"></textarea></td>
                  </tr>
                </table>                  
              </div>
              <div class="col-md-12">
                <input type="submit" class="btn btn-sm btn-rs" name="simpan" value="Simpan Sementara">
                <a id="cetak" href="#" class="btn btn-sm btn-rs">Cetak</a>
                <a id="approved" href="#" class="btn btn-sm btn-rs">Approved</a>
                Status Aprroved : <?=$data_pasien['isApproved']?>
              </div>
              
            </div>
          </div>
          <!-- begin box-body -->
          <div class="box-body" id="show_list">
            
              <table class="table table-bordered table-lab">
                <thead>
                  <tr>
                    <th>Pemeriksaan</th>
                    <th>Hasil Pemeriksaan</th>
                    <th>Nilai Pemeriksaan</th>
                    <th>Apakah Abnormal ?</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=0; $i < count($data_sub) ; $i++) { ?>
                    <?php if($data_sub[$i]['mode_hitung']=='Text'){?>
                      <?php if($data_pasien['sex_manual_edit']=='Laki-laki'){?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td><?=$data_sub[$i]['laki_text']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###LK : '.$data_sub[$i]['laki_text'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } else { ?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td><?=$data_sub[$i]['perempuan_text']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###PR : '.$data_sub[$i]['perempuan_text'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } ?>
                    <?php } elseif($data_sub[$i]['mode_hitung']=='Antara Sama Dengan') { ?>
                      <?php if($data_pasien['sex_manual_edit']=='Laki-laki'){?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td>LK : <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1'].'-'.$data_sub[$i]['laki_t2']?> <?=$data_sub[$i]['satuan']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###LK : '.$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1'].'-'.$data_sub[$i]['laki_t2'].' '.$data_sub[$i]['satuan'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } else { ?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td>Pr : <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1'].'-'.$data_sub[$i]['perempuan_t2']?> <?=$data_sub[$i]['satuan']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###Pr : '.$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1'].'-'.$data_sub[$i]['perempuan_t2'].' '.$data_sub[$i]['satuan'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } ?>
                    <?php } elseif($data_sub[$i]['mode_hitung']=='Lebih Kecil Dari') { ?>
                      <?php if($data_pasien['sex_manual_edit']=='Laki-laki'){?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td>LK : < <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1']?> <?=$data_sub[$i]['satuan']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###LK : < '.$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1'].' '.$data_sub[$i]['satuan'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } else { ?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td>Pr : < <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1']?> <?=$data_sub[$i]['satuan']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###Pr : < '.$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1'].' '.$data_sub[$i]['satuan'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } ?>
                    <?php } else { ?>
                      <?php if($data_pasien['sex_manual_edit']=='Laki-laki'){?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td>LK : > <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1']?> <?=$data_sub[$i]['satuan']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###LK : > '.$data_sub[$i]['text_depan'].':'.$data_sub[$i]['laki_t1'].' '.$data_sub[$i]['satuan'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } else { ?>
                      <tr class="<?=$i?>">
                        <td><?=$data_sub[$i]['nama']?></td>
                        <td></td>
                        <td>Pr : > <?=$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1']?> <?=$data_sub[$i]['satuan']?></td>
                        <td></td>
                        <td>
                          <input type="hidden" value="<?=$i?>">
                          <input type="hidden" name="data_colect[]" value="<?=$data_sub[$i]['nama'].'###0###Pr : > '.$data_sub[$i]['text_depan'].':'.$data_sub[$i]['perempuan_t1'].' '.$data_sub[$i]['satuan'].'###0'?>">
                          <button class="btn btn-sm btn-rs proc" type="button" data-toggle="modal" data-target="#modal_si">EDIT</button>
                        </td>
                      </tr>
                      <?php } ?>                
                    <?php } ?>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="5">
                      <input type="hidden" id="no_order" name="no_order" value="<?=$no_order?>">
                    </td>
                  </tr>
                </tfoot>
              </table>


           

          </div>
          <!-- end box-body -->
         </form>
        </div>
      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Begin Modal -->
<div class="modal fade" id="modal_si" role="dialog">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header modal-begie">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body" id="modal_show">
        <table>
          <tbody>
            <tr>
              <th>Hasil Pemeriksaan</th>
              <th>:</th>
              <th><input type="text" id="hasil"></th>
            </tr>
            <tr>
              <th>Nilai Pemeriksaan</th>
              <th>:</th>
              <th><input type="text" id="nilai"></th>
            </tr>
            <tr>
              <th>Apakah Abnormal ?</th>
              <th>:</th>
              <th><input type="hidden" id="nama"><input type="hidden" id="td_id">
                <select id="abnormal">
                  <option value="">Normal</option>
                  <option value="Abnormal Lower">Abnormal Lower</option>
                  <option value="Abnormal">Abnormal</option>
                  <option value="Abnormal Higher">Abnormal Higher</option>
                </select>
              </th>
            </tr>            
          </tbody>
        </table>
      </div>
      <div class="modal-footer modal-begie">
        <button type="button" class="btn btn-sm btn-rs" id="ubah" data-dismiss="modal">Ubah</button>
        <button type="button" class="btn btn-sm btn-rs" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->
<script>
$("li#hasillab").addClass('active');
$("li#hsl-periksa-lab").addClass('active');
$("li#LABORTORIUM").addClass('active');
$('button.btn.btn-sm.btn-rs.proc').click(function(event) {
  var nama = $(this).parent().parent().children().eq(0).text();
  var hasil = $(this).parent().parent().children().eq(1).text();
  var nilai = $(this).parent().parent().children().eq(2).text();
  var abnormal = $(this).parent().parent().children().eq(3).text();
  var id = $(this).parent().parent().children().eq(4).children().eq(0).val();

  $('#nama').val(nama);
  $('#hasil').val(hasil);
  $('#nilai').val(nilai);
  $('#abnormal').val(abnormal);  
  $('#td_id').val(id);

});

$('button#ubah').click(function(event) {
  var nama = $('#nama').val();
  var hasil = $('#hasil').val();
  var nilai = $('#nilai').val();
  var abnormal = $('#abnormal').val(); 
  var td_id = $('#td_id').val(); 
  var data_colect = nama + '###' + hasil + '###' + nilai + '###' + abnormal;
  $('tr.'+td_id).children().eq(1).text(hasil);
  $('tr.'+td_id).children().eq(2).text(nilai);
  $('tr.'+td_id).children().eq(3).text(abnormal);
  $('tr.'+td_id).children().eq(4).children().eq(1).val(data_colect);
});

if($('#status').val()=='sementara') {
    $.ajax({
      type: "POST",
      data: "no_order=<?=$no_order?>",
      url: "<?=base_url()?>index.php/laboratorium/Form_hasil_pemeriksaan_lab/ajax_periksa",
      success: function(msg) {
        $("div#show_list").html(msg);
      }
    });
}

$("#cetak").click(function(event) {
  cetak();
});
$("#approved").click(function(event) {
    $.ajax({
      type: "POST",
      data: "no_order=<?=$no_order?>",
      url: "<?=base_url()?>index.php/laboratorium/Form_hasil_pemeriksaan_lab/approved_process",
      success: function(msg) {
        alert('data_berhasil di approve');
        location.reload();
      }
    });
});

function cetak()
{
  var no_reg_lab = $('#no_order').val();
  alert(no_reg_lab);
  var childWin = window.open("<?=base_url()?>index.php/laboratorium/form_hasil_pemeriksaan_lab/cetak/?no_order="+no_reg_lab, "_blank", "height=400, width=800, status=yes, toolbar=no, menubar=no, location=no,addressbar=no"); 
}
</script>
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
      <li class="active">Page Setup</li>
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
            <h3 class="box-title">Page Setup</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->

          <!-- begin box-body -->
          <div class="box-body" id="show_list">
            <div class="row">
              <div class="col-md-12">
                <form action="<?=base_url()?>index.php/laboratorium/form_hasil_pemeriksaan_lab/simpan_page_setup" method="post">
                  <table>
                    <tr>
                      <td>Kertas yang digunakan : </td>
                      <td style="padding-left:20px">
                        <select class="input-sm" name="pil_kertas" id="pil_kertas">
                          <?php for ($i=0; $i < count($pil_kertas) ; $i++) { ?>
                            <?php if($data_colect[0]['pil_kertas']==$pil_kertas[$i]['val']) { ?>
                              <option value="<?=$pil_kertas[$i]['val']?>" selected="true"><?=$pil_kertas[$i]['text']?></option>
                            <?php } else { ?>
                              <option value="<?=$pil_kertas[$i]['val']?>"><?=$pil_kertas[$i]['text']?></option>
                            <?php } ?>
                          <?php } ?>
                        </select>
                      </td>
                      <td style="padding-left:20px">
                        <button class="btn btn-sm btn-info" type="submit">Simpan</button>
                      </td>
                    </tr>
                  </table>
                  <table style="margin-top:10px;">
                    <tr>
                      <td>Font Name Result Table Header : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <input type="text" class="input-sm" name="font_name_result_h" id="font_name_result_h" value="<?=$data_colect[1]['font_name_result_h']?>">
                      </td>
                    </tr>
                    <tr>
                      <td>Font Size Result Table Header : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <select class="input-sm" name="font_size_result_h" id="font_size_result_h">
                          <?php for ($i=0; $i < count($angka_text) ; $i++) { ?>
                            <?php if($data_colect[2]['font_size_result_h']==$angka_text[$i]) { ?>
                              <option value="<?=$angka_text[$i]?>" selected="true"><?=$angka_text[$i]?></option>
                            <?php } else { ?>
                              <option value="<?=$angka_text[$i]?>"><?=$angka_text[$i]?></option>
                            <?php } ?>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Font Name Result Table Detail : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <input type="text" class="input-sm" name="font_name_result_d" id="font_name_result_d" value="<?=$data_colect[3]['font_name_result_d']?>">
                      </td>
                    </tr>
                    <tr>
                      <td>Font Size Result Table Detail : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <select class="input-sm" name="font_size_result_d" id="font_size_result_d">
                          <?php for ($i=0; $i < count($angka_text) ; $i++) { ?>
                            <?php if($data_colect[4]['font_size_result_d']==$angka_text[$i]) { ?>
                              <option value="<?=$angka_text[$i]?>" selected="true"><?=$angka_text[$i]?></option>
                            <?php } else { ?>
                              <option value="<?=$angka_text[$i]?>"><?=$angka_text[$i]?></option>
                            <?php } ?>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                    <tr>
                      <td>Penanda Hasil Abnormal : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <select class="input-sm" name="penanda_hasil_abnormal" id="penanda_hasil_abnormal">
                          <?php for ($i=0; $i < count($abnormal) ; $i++) { ?>
                            <?php if($data_colect[5]['penanda_hasil_abnormal']==$abnormal[$i]['val']) { ?>
                              <option value="<?=$abnormal[$i]['val']?>" selected="true"><?=$abnormal[$i]['text']?></option>
                            <?php } else { ?>
                              <option value="<?=$abnormal[$i]['val']?>"><?=$abnormal[$i]['text']?></option>
                            <?php } ?>
                          <?php } ?>
                        </select>
                      </td>
                    </tr>
                  </table>
                  <table style="margin-top:10px;">
                    <tr>
                      <td>Text Head Report 1 : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <input type="text" class="input-sm" name="text_head_report_1" id="text_head_report_1" value="<?=$data_colect[6]['text_head_report_1']?>" style="width:280px;">
                      </td>
                    </tr>
                    <tr>
                      <td>Text Head Report 2 : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <input type="text" class="input-sm" name="text_head_report_2" id="text_head_report_2" value="<?=$data_colect[7]['text_head_report_2']?>" style="width:280px;">
                      </td>
                    </tr>
                    <tr>
                      <td>Text Head Report 3 : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <input type="text" class="input-sm" name="text_head_report_3" id="text_head_report_3" value="<?=$data_colect[8]['text_head_report_3']?>" style="width:280px;">
                      </td>
                    </tr>
                    <tr>
                      <td>Text Head Report 4 : </td>
                      <td style="padding-left:20px;padding-top:5px;">
                        <input type="text" class="input-sm" name="text_head_report_4" id="text_head_report_4" value="<?=$data_colect[9]['text_head_report_4']?>" style="width:280px;">
                      </td>
                    </tr>
                  </table>
                  <fieldset>
                    <legend>Print dengan kertas HVS Kosong :</legend>
                      Ukuran Kertas : 
                      <select class="input-sm" name="ukuran_kertas" id="ukuran_kertas">
                        <?php for ($i=0; $i < count($ukuran_kertas) ; $i++) { ?>
                          <?php if($data_colect[10]['ukuran_kertas']==$ukuran_kertas[$i]) { ?>
                            <option value="<?=$ukuran_kertas[$i]?>" selected="true"><?=$ukuran_kertas[$i]?></option>
                          <?php } else { ?>
                            <option value="<?=$ukuran_kertas[$i]?>"><?=$ukuran_kertas[$i]?></option>
                          <?php } ?>
                        <?php } ?>
                      </select> <br><br>
                      Font Size Head Report : 
                      <select class="input-sm" name="font_size_head_report" id="font_size_head_report">
                        <?php for ($i=0; $i < count($angka_text_header) ; $i++) { ?>
                          <?php if($data_colect[11]['font_size_head_report']==$angka_text_header[$i]) { ?>
                            <option value="<?=$angka_text_header[$i]?>" selected="true"><?=$angka_text_header[$i]?></option>
                          <?php } else { ?>
                            <option value="<?=$angka_text_header[$i]?>"><?=$angka_text_header[$i]?></option>
                          <?php } ?>
                        <?php } ?>
                      </select> <br><br>
                      Format  Hasil : 
                      <select class="input-sm" name="format_hasil" id="format_hasil">
                        <?php for ($i=0; $i < count($format_hasil) ; $i++) { ?>
                          <?php if($data_colect[12]['format_hasil']==$format_hasil[$i]['val']) { ?>
                            <option value="<?=$format_hasil[$i]['val']?>" selected="true"><?=$format_hasil[$i]['text']?></option>
                          <?php } else { ?>
                            <option value="<?=$format_hasil[$i]['val']?>"><?=$format_hasil[$i]['text']?></option>
                          <?php } ?>
                        <?php } ?>
                      </select> <br><br>
                      Lebar Perkolom : <input type="text" class="input-sm" name="lebar_perkolom" id="lebar_perkolom" value="<?=$data_colect[13]['lebar_perkolom']?>"><br><br>
                      Left Margin : <input type="text" class="input-sm" name="left_margin" id="left_margin" value="<?=$data_colect[14]['left_margin']?>" style="width:50px;"> 
                      Logo Image Scale : width : <input type="text" class="input-sm" name="logo_width" id="logo_width" value="<?=$data_colect[15]['logo_width']?>" style="width:50px;">
                      Height : <input type="text" class="input-sm" name="logo_height" id="logo_height" value="<?=$data_colect[16]['logo_height']?>" style="width:50px;">
                  </fieldset>
                </form>                

              </div>
            </div>
          </div>
          <!-- end box-body -->
        
        </div>
      </div>
      <!-- End Table -->


    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->


<script>
$("li#hasillab").addClass('active');
$("li#page-setup").addClass('active');
$("li#LABORTORIUM").addClass('active');
</script>
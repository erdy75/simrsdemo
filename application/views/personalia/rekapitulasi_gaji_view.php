<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Rekapitulasi Gaji</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Rekapitulasi Gaji</a></li>
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
            <h3 class="box-title">Rekapitulasi Gaji</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div id="info"></div>
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i><div id="show_ubah">
                    
                  </div></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->

          <!-- begin box-body -->
          <div class="box-body">
            <div class="row">
              <!-- begin show list -->
              <div class="col-md-12">
                <table style="width:100%;">
                  <tbody>
                  <tr>
                    <td width="50%" valign="top">
                      <table>
                        <tbody>
                          <tr>
                            <td style="padding:5px;">Period Gaji : </td>
                            <td style="padding:5px;">
                               <select name="bln" id="bln">
                                <?php for ($i=0; $i < 13 ; $i++) { ?>
                                  <?php if('0'.$i==date('m') || $i==date('m')) { ?>
                                    <?php if($i > 9) { ?>
                                      <option value="<?=$i?>" selected="true"><?=$i?></option>
                                    <?php } else { ?>
                                      <option value="<?='0'.$i?>" selected="true"><?='0'.$i?></option>
                                    <?php } ?>
                                  <?php } else { ?>
                                    <?php if($i > 9) { ?>
                                      <option value="<?=$i?>"><?=$i?></option>
                                    <?php } else { ?>
                                      <option value="<?='0'.$i?>"><?='0'.$i?></option>
                                    <?php } ?>
                                  <?php } ?>
                                <?php } ?>
                              </select> - 
                              <select name="tahun" id="tahun">
                                <?php for ($i=2012; $i < 2100 ; $i++) { ?>
                                  <?php if($i==date('Y')) { ?>
                                    <option value="<?=$i?>" selected="true"><?=$i?></option>
                                  <?php } else { ?>
                                    <option value="<?=$i?>"><?=$i?></option>
                                  <?php } ?>
                                <?php } ?>
                              </select>                             
                            </td>
                          </tr>
                        </tbody>
                      </table>                      
                    </td>
                    <td width="50%" valign="top">
                      <a id="cari" href="#" class="btn btn-sm btn-rs">Cari</a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- end show list-->
              <!-- begin edit list -->
              <div class="col-md-12" id="show_list">
              </div>
              <!-- end edit list-->
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
$("li#rekapitulasi-gaji").addClass('active');
$("li#PERSONALIA").addClass('active');




</script>
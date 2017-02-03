<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      SIM RS
      <small>Default Kelompok Tarif</small>
    </h1>
    <ol class="breadcrumb">
      <li class="active"><a href="#"><i class="fa fa-dashboard"></i>Default Kelompok Tarif</a></li>
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
            <h3 class="box-title">Default Kelompok Tarif</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px;display: none;">
                <input type="text" class="form-control input-sm pull-right" id="filter" name="filter" placeholder="Search">
                <div id="info"></div>
                <div class="input-group-btn">
                  <button id="btn_ajax_cari" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div>
          <!-- end box-header -->

          <!-- begin box-body -->
          <div class="box-body">
            <div class="row">
              <!-- begin edit list -->
              <div class="col-md-12" id="show_list">
<table id="example1" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Jenis</th>
      <th>Kelas</th>
      <th>Kel Tarif Lab</th>
    </tr>
  </thead>
  <tbody>
    <?php for ($i=0; $i < count($listdata); $i++) {  ?>
    <tr>
      <?php if($listdata[$i]['perawatan']=='UGD / IGD') { ?>
        <td>UGD / IGD</td>
      <?php } elseif ($listdata[$i]['perawatan']=='Rawat Jalan') { ?>
        <td>Rawat Jalan</td>
      <?php } else { ?>
        <td>Rawat Inap</td>
      <?php } ?>
      <td>
        <a href="#" id="<?=$i?>" data-toggle="modal" data-target="#myModal">
          <?=str_replace(' ', '&nbsp;', $listdata[$i]['perawatan'])?>
        </a>
      </td>      
      <td><?=$listdata[$i]['kelompok_tarif']?></td>
    </td>
    <?php } ?>
  </tbody>
</table>                
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

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog larges">
    <form id="form_modul" action="<?=base_url()?>index.php/laboratorium/tarif_laboratorium/edit_def_kel_tarif/" method="post" accept-charset="utf-8" enctype="multipart/form-data">

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
                        <td width="20%" style="padding-top:5px">Kelompok Tarif</td>
                        <td width="80%" style="padding-top:5px">
                          <select name="kel_tarif" id="kel_tarif_form" >
                          <?php for ($i=0; $i < count($kel_tarif) ; $i++) { ?> 
                            <option value="<?=$kel_tarif[$i]?>"><?=$kel_tarif[$i]?></option>}
                          <?php }?> 
                          </select>
                          <input type="hidden" name="perawatan" id="perawatan">
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
          <button type="button" class="btn btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>

    </form>
  </div>
</div>

<script>
$("li#tarif-lab").addClass('active');
$("li#def-kel-tarif").addClass('active')
<?php for ($i=0; $i < count($listdata); $i++) {  ?>
$("a#<?=$i?>").click(function(event) {
  $("#kel_tarif_form").val("<?=$listdata[$i]['kelompok_tarif']?>");
  $("#perawatan").val("<?=$listdata[$i]['perawatan']?>");
});
<?php } ?>

</script>
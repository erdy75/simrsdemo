<!-- Content Wrapper. Contains page content -->
<div class="content-wrappers">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Daftar List Panel
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      
      <?php for ($i=0; $i < count($modul_list) ; $i++) {  ?>
      <div class="col-lg-3">
        <div class="box box-success">

          <div class="box-left-icon">
            <a href="<?=base_url().$modul_list[$i]['link']?>" title="">
              <img src="<?=base_url().$modul_list[$i]['icon']?>" alt="icon" class="img-icon" >
            </a>            
          </div>
          <div style="height: 90px">
             <a href="<?=base_url().$modul_list[$i]['link']?>"><p class="font-icon"><?=$modul_list[$i]['nama']?> </p> </a>
          </div>
         
        </div>  
      </div>
      <?php } ?>

    </div>
  </section>
  <!-- End main content -->

</div><!-- /.content-wrapper -->\
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SISTEM INFORMASI RUMAH SAKIT</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="assets/admin_lte/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/admin_lte/plugins/font-awesome-4.5.0/css/font-awesome.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/admin_lte/plugins/ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/admin_lte/dist/css/AdminLTE.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets/admin_lte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <!-- jQuery 2.1.4 -->
    <script src="assets/admin_lte/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="assets/admin_lte/bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="assets/admin_lte/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>

    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html"><b>SISTEM RUMAH SAKIT</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body right">

        <p class="login-box-msg">Silahkan login sesuai dengan user anda</p>
        <?php echo form_open('login/proses',array( 'id' => 'login-form', 'class' => 'login' )); ?>
          <div class="form-group has-feedback">
            <input type="text" name="user" class="form-control" placeholder="User ID">
             
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Simpan User dan Password
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
      <div class="login-box-body left">
          <img src="assets/admin_lte/dist/css/hospital.png" alt="" width="200" height="177">  
      </div>
    </div><!-- /.login-box -->
      
  </body>
</html>


<script type="text/javascript">

</script>
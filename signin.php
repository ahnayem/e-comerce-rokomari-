<?php 
  ob_start();
  session_start();
  session_regenerate_id();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Signin || ROKOMARI</title>

  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" type="image/x-icon" href="">
  <link rel="apple-touch-icon" type="image/x-icon" href="">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="">

  <!-- CSS -->
  <link rel="stylesheet" href="dashboard/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="dashboard/assets/bower_components/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="dashboard/assets/dist/css/Theme.min.css">
  <link rel="stylesheet" href="dashboard/assets/dist/css/skins/skin-custom.css">
  <link rel="stylesheet" href="dashboard/assets/plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="dashboard/assets/dist/css/style.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index"><b>rokomari</b>.com</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="form-group has-feedback">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        
        <div class="row">
          <div class="col-xs-6">
            <div class="checkbox icheck">
              <input type="checkbox" id="remember" name="remember">
              <label for="rememberremember">Remember me</label>
            </div>
          </div>

        </div>
        <br>
        <div class="row">
          <div class="col-xs-8">
            
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat" name="signin">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->


    <div class="text-center"><br>
      <a href="register.php" class="pull-left text-info"><i class="fa fa-tag"></i> &nbsp;Register as a new member</a>
      <a href="index.php" class="pull-right text-info"><i class="fa fa-home"></i> &nbsp;Back To Home</a>
    </div>
  </div>
  <!-- /.login-box -->


  <!-- REQUIRED JS SCRIPTS -->
  <script src="dashboard/assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="dashboard/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="dashboard/assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="dashboard/assets/dist/js/Theme.min.js"></script>
  <script src="dashboard/assets/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
</html>

<?php include 'app/signin_script.php' ?>
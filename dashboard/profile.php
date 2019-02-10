<?php include 'inc/check_session.php'; ?>
<?php include 'inc/fetch_user.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>Title</title>

  <!-- Favicon and touch icons -->
  <link rel="shortcut icon" type="image/x-icon" href="">
  <link rel="apple-touch-icon" type="image/x-icon" href="">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="">
  <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="">

  <!-- CSS -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">

  <link rel="stylesheet" href="assets/dist/css/Theme.min.css">
  <link rel="stylesheet" href="assets/dist/css/skins/skin-custom.css">
  <link rel="stylesheet" href="assets/dist/css/style.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">

    <?php include 'inc/header.php'; ?>
    <?php include 'inc/left_sidebar.php'; ?>

    
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content-header">
        <h1><i class="fa fa-user-circle"></i> Profile <small>User Information</small></h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Here</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
          <div class="col-md-12">
                

                <div class="row">

                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <div class="box box-widget widget-user">
                      <!-- Add the bg color to the header using any of the bg-* classes -->
                      <div class="widget-user-header bg-aqua-active">
                        
                      </div>
                      <div class="widget-user-image">


                        <?php 
                          if (empty($user_image)) {
                            

                        ?>

                        <img src="assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                          
                        <?php 
                          }else{

                          
                        ?>

                        <img src="uploads/profile/<?php echo($user_image) ?>" style="height: 85px; width: 85px" class="img-circle user-image" alt="User Image">

                        <?php 
                          }
                        ?>

                        
                      </div>
                      <div class="box-footer text-center">
                        <h3 class="widget-user-username"><?php echo $user_name ?></h3>
                        <h5 class="widget-user-desc">
                          <?php  
                            if ($user_role == 1) {
                              echo "Admin";
                            }else{
                              echo "User";
                            }
                          ?>
                        </h5>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3"></div>

                 

                <div class="row">

                            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" enctype="multipart/form-data" style="position: absolute; top: 1vh; left: 33%;">
                              <div class="form-group">
                                  <label for="fileToUpload"></label>
                                  <input type="file" name="image" id="imgInp" class="btn btn-info" style="float: left;">
                                  <button name="profile" class="btn btn-info" style="">Upload</button>
                              </div>
                            </form>

                            <?php include 'script/profile_picture_update_script.php'; ?>

                </div>





                <div class="row">

                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <div class="box box-widget widget-user-2">
                      
                      <div class="box-footer no-padding">
                        <ul class="nav nav-stacked">
                          <li><a href="#">Address <span class="pull-right badge bg-blue"><?php echo $user_address ?></span></a></li>
                          <li><a href="#">Date of birth <span class="pull-right badge bg-aqua"><?php echo date("d/m/Y", strtotime($user_DOB)) ?></span></a></li>
                          <li><a href="#">Joining Date <span class="pull-right badge bg-green"><?php echo date("d/m/Y", strtotime($user_joining_date)) ?></span></a></li>
                        </ul>
                      </div>
                      <div class="text-center" style="padding: 10px 0;">
                        <a href="profile_edit?id=<?php echo $user_id ?>"><button class="btn btn-info">Edit Profile</button></a>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-3">
                  </div>

                </div>


              
          </div>
          <!-- /.col -->
      </div>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <?php include 'inc/footer.php'; ?>
    <?php include 'inc/right_sidebar.php'; ?>

  </div>
  <!-- ./wrapper -->


  <!-- REQUIRED JS SCRIPTS -->
  <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="assets/dist/js/Theme.min.js"></script>

</body>
</html>
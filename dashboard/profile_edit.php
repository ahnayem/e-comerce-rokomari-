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
        <h1><i class="fa fa-user-circle"></i> Profile <small>User Information Edit</small></h1>
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
                    <?php  
                                      include 'db/db.php';

                                      if (isset($_GET['id'])) {
                                          $get_id = $_GET['id'];
                                      }else{
                                          echo "Nothing";
                                      }

                                      $query          = "SELECT * FROM tbl_user WHERE id = '$get_id'";
                                      $stmt           = $db->prepare($query);
                                      $result         = $stmt->execute();

                                      if ($result) {
                                          while($row = $stmt->fetch()){
                                              $admin_id = $row['id'];
                                              $admin_name = $row['fullname'];
                                              $admin_email = $row['email'];
                                              $admin_role = $row['role'];
                                          }
                                      }else{
                                          echo "Fetch Error";
                                      }


                                  ?>


                                  <form action="profile_edit.php?id=<?php echo $get_id; ?>" method="POST">

                                      <input type="text" hidden value="<?php echo $admin_id ?>" name="admin_id">
                                      <div class="row">
                                          <div class="col-md-12">
                                              <div class="form-group">
                                                  <label for="admin_name">NAME</label>
                                                  <input type="text" class="form-control border-input" placeholder="Enter Admin Name" id="admin_name" name="admin_name" required value="<?php echo $user_name ?>">
                                              </div>

                                              <div class="form-group">
                                                  <label for="admin_email">EMAIL</label>
                                                  <input type="text" class="form-control border-input" placeholder="Enter Admin Email" id="admin_email" name="admin_email" required value="<?php echo $user_email ?>">
                                              </div>

                                              <div class="form-group">
                                                  <label for="admin_password">OLD PASSWORD</label>
                                                  <input type="password" class="form-control border-input" placeholder="Enter Old Password" id="admin_password" name="admin_password1" required>
                                              </div>

                                              <div class="form-group">
                                                  <label for="admin_password">NEW PASSWORD</label>
                                                  <input type="password" class="form-control border-input" placeholder="Enter New Password" id="admin_password" name="admin_password2" required>
                                              </div>

                                              <div class="form-group">
                                                  <label for="address">Address</label>
                                                  <input type="text" class="form-control border-input" value="<?php echo $user_address ?>" id="address" name="address" required>
                                              </div>

                                              <div class="form-group">
                                                  <label for="dob">Date Od Birth</label>
                                                  <input type="date" class="form-control border-input" placeholder="Enter New Password" id="dob" name="dob" required value="<?php echo strftime('%Y-%m-%d',
                                                  strtotime($user_DOB)) ?>">
                                              </div>
                                          </div>
                                      </div>
                                      <div class="text-center">
                                          <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="update_admin"><i class="fa fa-floppy-o"></i> UPDATE</button>
                                      </div>
                                      <div class="clearfix"></div>
                                  </form>
                  </div>
                  <div class="col-md-3"></div>
    
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


<?php
                                    
    if(isset($_POST["update_admin"])) {
        include 'db/db.php';
        $admin_id          = $_POST['admin_id'];
        $admin_name        = $_POST['admin_name'];
        $admin_email       = $_POST['admin_email'];
        $admin_password1   = $_POST['admin_password1'];
        $admin_password2   = $_POST['admin_password2'];
        $admin_DOB         = $_POST['dob'];
        $admin_address     = $_POST['address'];

        if (!empty($admin_name) || !empty($admin_email) || !empty($admin_password1) || !empty($admin_password2) || !empty($admin_DOB) || !empty($admin_address)) {

            
                $password_old = password_hash($admin_password1,PASSWORD_DEFAULT);
                $query          ="SELECT id FROM tbl_user WHERE email = :admin_email AND password = :password_olds";
                $stmt           = $db->prepare($query);
                $stmt         -> bindValue(':admin_email',$admin_email,PDO::PARAM_STR);
                $stmt         -> bindValue(':password_olds',$password_old,PDO::PARAM_STR);
                $result         = $stmt->execute();
                var_dump($result);
                if ($result === false) {
                    echo "<script>alert('Incorrect Password.')</script>";
                }else{
                    $password1 = password_hash($admin_password2,PASSWORD_DEFAULT);
                    $query = "UPDATE tbl_user SET fullname = :admin_name, email= :admin_email, password= :password, DOB = :admin_DOB, address = :admin_address WHERE id= :admin_id";
                    $stmt         = $db->prepare($query);
                    $stmt         -> bindValue(':admin_name',$admin_name,PDO::PARAM_STR);
                    $stmt         -> bindValue(':admin_email',$admin_email,PDO::PARAM_STR);
                    $stmt         -> bindValue(':password',$password1,PDO::PARAM_STR);
                    $stmt         -> bindValue(':admin_DOB',$admin_DOB,PDO::PARAM_STR);
                    $stmt         -> bindValue(':admin_address',$admin_address,PDO::PARAM_STR);
                    $stmt         ->bindValue(':admin_id',$admin_id,PDO::PARAM_STR);
                    $result       = $stmt->execute(); 
                    if ($result) {
                        echo "<script>alert('Admin Updated Successfully!')</script>";
                        echo "<script>window.location.href='profile.php'</script>";
                    }else{
                        echo "<script>alert('ERROR!!! While Updating Admin')</script>";
                    }
                }
            
            

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>
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
        <h1><i class="fa fa-clipboard"></i> Slider</h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Here</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="row">
                <div class="col-md-6">
                        <div class="header">
                            <h4 class="title" style="margin-left: 3%;">ADD NEW Slider</h4>
                        </div>
                        <div class="content">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="slider_file">File</label>
                                    <input type="file" name="slider_file" id="slider_file" class="form-control" multiple required>
                                  </div>
                                </div>
                                <br>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="add_slider">ADD Slider</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>

                </div>
                <div class="col-md-6">
                  <div class="">
                      <div class="header">
                          <h4 class="title">Slider List</h4>
                      </div>
                      <div class="content table-responsive table-full-width">
                          <table class="table" style="font-size: 13px;">
                              <tr>
                                  <th>#</th>
                                  <th>Click To View</th>   
                                  <th>Status</th>   
                                  <th class="text-center">Action</th>   
                              </tr>

                              <?php  
                                  include 'db/db.php';

                                  $query_slider   = "SELECT * FROM tbl_slider ORDER BY slider_id DESC";
                                  $stmt           = $db->prepare($query_slider);
                                  $result         = $stmt->execute();

                                  if ($result) {
                                      $i = 1;
                                      while($row = $stmt->fetch()){
                                          $slider_id = $row['slider_id'];
                                          $slider_image = $row['slider_image'];
                                          $slider_status = $row['slider_status'];
                              ?>
                              <tr>
                                  <td><?php echo $i++ ?></td>
                                  <td><a href="uploads/slider/<?php echo $slider_image ?>" >Click To view</a></td>
                                  <td><a href="slider_status.php?id=<?php echo $slider_id ?>&status=<?php echo $slider_status ?>" ><?php if ($slider_status == 1) {
                                    echo "Inactive";
                                  }else{
                                    echo "Active";
                                  } ?></a></td>
                                  <td class="text-center">
                                    <a href="slider_delete?id=<?php echo $slider_id; ?>&action=delete" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                  </td>
                              </tr>    

                              <?php }} ?>     
                          </table>
                      </div>
                  </div>
              </div>
              </div>

            </div>
            <!-- ./box-body -->
            <div class="box-footer">
              
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
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
                                    
    if(isset($_POST["add_slider"])) {
        include 'db/db.php';
        $file          = $_FILES['slider_file']['name'];
        $tmp_file           = $_FILES['slider_file']['tmp_name'];

        if (!empty($file)) {
          $target_dir     = "uploads/slider/";
          $target_file    = $target_dir . basename($file);
          $target_file    = md5($target_file);
          $uploadOk       = 1;
          $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);
          
              if (file_exists($target_file)) {
                  echo "Sorry, file already exists.";
                  $uploadOk = 0;
              }

              if ($_FILES["slider_file"]["size"] > 500000) {
                  echo "Sorry, your file is too large.";
                  $uploadOk = 0;
              }

              if ($uploadOk == 0) {
                  echo "Sorry, your file was not uploaded.";
              // if everything is ok, try to upload file
              } else {
                  
                $extension=explode(".", $file);
                $extension=end($extension);
                $prod = $target_file;
                $newfilename=$prod .".".$extension;
                echo $move = move_uploaded_file($tmp_file, $target_dir.$newfilename);
                if ($move == true) {
                  $query        = "INSERT INTO tbl_slider(slider_image) VALUES(:file_name)";
                  $stmt         = $db->prepare($query);
                  $stmt         -> bindValue(':file_name',$newfilename,PDO::PARAM_STR);
                  $result       = $stmt->execute(); 
                  if ($result == true) {
                      echo "<script>alert('Slider Added Inserted Successfully')</script>";
                      echo "<script>window.location.href='slider.php'</script>";
                  }else{
                      echo "<script>alert('ERROR!!! While inserting Category')</script>";
                  }
                }else{
                  echo "<script>alert('ERROR!!! While uploading File')</script>";
                }
              }
        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>
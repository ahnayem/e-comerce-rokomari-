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
        <h1><i class="fa fa-clipboard"></i> Author</h1>
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
                        <h4 class="title" style="margin-left: 3%;">UPDATE AUTHOR</h4>
                    </div>
                    <div class="content">
                        <?php  
                              include 'db/db.php';

                              if (isset($_GET['id'])) {
                                $get_id = $_GET['id'];
                              }else{
                                header('location: author.php');
                              }

                              $query_author   = "SELECT * FROM tbl_author WHERE author_id = '$get_id'";
                              $stmt                = $db->prepare($query_author);
                              $result              = $stmt->execute();

                              if ($result) {
                                  while($row = $stmt->fetch()){
                                      $author_id   = $row['author_id'];
                                      $author_name = $row['author_name'];
                                  }
                              }else{
                                echo "Fetch Error";
                              }


                          ?>

                      <form action="author-edit?id=<?php echo $get_id; ?>" method="POST" enctype="multipart/form-data">
                        <input type="text" hidden name="id" value="<?php echo $get_id ?>"> 
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="form-group">
                                      <h3></h3>
                                      <input type="text" class="form-control border-input" placeholder="Category Name" id="author_name" name="author_name" value="<?php echo $author_name; ?>">
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label for="author_file">File</label>
                              <input type="file" name="author_file" id="author_file" class="form-control">
                            </div>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="update_author">UPDATE AUTHOR</button>
                          </div>
                          <div class="clearfix"></div>
                      </form>
                    </div>

            </div>
            <div class="col-md-6">
                <div class="">
                    <div class="header">
                        <h4 class="title">AUTHOR LIST</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table" style="font-size: 13px;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>   
                                <th class="text-center">File</th>   
                                <th class="text-center">Action</th>   
                            </tr>

                            <?php  
                                include 'db/db.php';

                                $query_category   = "SELECT * FROM tbl_author ORDER BY author_id DESC";
                                $stmt             = $db->prepare($query_category);
                                $result           = $stmt->execute();

                                if ($result) {
                                    $i = 1;
                                    while($row = $stmt->fetch()){
                                        $author_id 	= $row['author_id'];
                                        $author_name 	= $row['author_name'];
                                        $author_file  = $row['author_image'];
                                    
                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $author_name ?></td>
                                <td class="text-center"><a href="uploads/author/<?php echo $author_file ?>" target="_blank">View File</a></td>
                                <td class="text-center">
                                  <a href="author-edit?id=<?php echo $author_id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                  <a href="author-delete?id=<?php echo $author_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                                    
    if(isset($_POST["update_author"])) {

        include 'db/db.php';

        $id = $_POST['id'];

        $author_name    = $_POST['author_name'];

        $file           = $_FILES['author_file']['name'];
        $tmp_file       = $_FILES['author_file']['tmp_name'];

        if (!empty($file)) {

          $target_dir     = "uploads/author/";
          $target_file    = $target_dir . basename($file);
          $target_file    = md5($target_file);
          $uploadOk       = 1;
          $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);
        
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if ($_FILES["author_file"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file        
            }else{
              $extension=explode(".", $file);
              $extension=end($extension);
              $prod = $target_file;
              $newfilename=$prod .".".$extension;
              $move = move_uploaded_file($tmp_file, $target_dir.$newfilename);

              if ($move == true) {
                
                $query          = "UPDATE tbl_author SET author_name ='$author_name' , author_image = '$newfilename' WHERE author_id = '$id'";
                $stmt           = $db->prepare($query);
                $result         = $stmt->execute();
                if ($result) {

                    echo "<script>alert('Author Updated Successfully')</script>";
                    echo "<script>window.location.href='author'</script>";

                }else{
                    echo "<script>alert('ERROR!!! While Updating Category')</script>";
                }

              }else{
                 echo "<script>alert('ERROR!!! While uploading Author Image')</script>";
              }
            }
          }else{
                            
                $query          = "UPDATE tbl_author SET author_name ='$author_name' WHERE author_id = '$id'";
                $stmt           = $db->prepare($query);
                $result         = $stmt->execute();
                if ($result) {

                    echo "<script>alert('Author Updated Successfully')</script>";
                    echo "<script>window.location.href='author'</script>";

                }else{
                    echo "<script>alert('ERROR!!! While Updating Author')</script>";
                }
            }
        }
    
    
?>



            
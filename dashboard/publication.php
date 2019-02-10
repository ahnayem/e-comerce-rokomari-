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
        <h1><i class="fa fa-clipboard"></i> Category</h1>
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
                        <h4 class="title" style="margin-left: 3%;">ADD NEW PUBLICATION</h4>
                    </div>
                    <div class="content">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h3></h3>
                                        <input type="text" class="form-control border-input" placeholder="Publication Name" id="publication_name" name="publication_name">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info btn-fill btn-wd pull-right" name="add_publication">ADD PUBLICATION</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>

            </div>
            <div class="col-md-6">
                <div class="">
                    <div class="header">
                        <h4 class="title">CATEGORY LIST</h4>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table" style="font-size: 13px;">
                            <tr>
                                <th>#</th>
                                <th>Name</th>   
                                <th class="text-center">Action</th>   
                            </tr>

                            <?php  
                                include 'db/db.php';

                                $query_category   = "SELECT * FROM tbl_publication ORDER BY publication_id DESC";
                                $stmt           = $db->prepare($query_category);
                                $result         = $stmt->execute();

                                if ($result) {
                                    $i = 1;
                                    while($row = $stmt->fetch()){
                                        $publication_id = $row['publication_id'];
                                        $publication_name = $row['publication_name'];

                                    
                                


                            ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td><?php echo $publication_name ?></td>
                                <td class="text-center">
                                  <a href="publication-edit?id=<?php echo $publication_id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                  <a href="publication-delete?id=<?php echo $publication_id; ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
                                    
    if(isset($_POST["add_publication"])) {
        include 'db/db.php';
        $publication_name = $_POST['publication_name'];

        if (!empty($publication_name)) {
            $query        = "INSERT INTO tbl_publication(publication_name) VALUES(:publication_name)";
            $stmt         = $db->prepare($query);
            $stmt         -> bindValue(':publication_name',$publication_name,PDO::PARAM_STR);
            $result       = $stmt->execute(); 
            if ($result == true) {
                echo "<script>alert('publication Inserted Successfully')</script>";
                echo "<script>window.location.href='publication.php'</script>";
            }else{
                echo "<script>alert('ERROR!!! While inserting Category')</script>";
            }

        }else{
            echo "<script>alert('Field Must Not be Empty')</script>";
        }

                


    }
    
?>
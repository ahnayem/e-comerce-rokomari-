<?php include 'inc/check_session.php'; ?>
<?php include 'inc/fetch_user.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <title>ROKOMARI || DASHBOARD</title>

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
        <h1><i class="fa fa-clipboard"></i> Dashboard <small>Get the summery here</small></h1>
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
              <h3 class="box-title">Heading</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php 
                if ($user_role == 1) {
                  
              ?>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <?php 
                        include 'db/db.php';

                        $query    = "SELECT * FROM tbl_order";
                        $stmt        = $db->prepare($query);
                        $result        = $stmt->execute();
                        $i = 1;
                        while ($row = $stmt->fetch()) {
                          $i++;
                        }
                  ?>
                  <div class="inner">
                    <h3><?php echo $i-1; ?></h3>

                    <p>Orders</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <?php 
                        include 'db/db.php';

                        $query    = "SELECT * FROM tbl_user";
                        $stmt        = $db->prepare($query);
                        $result        = $stmt->execute();
                        $i = 1;
                        while ($row = $stmt->fetch()) {
                          $i++;
                        }
                  ?>
                  <div class="inner">
                    <h3><?php echo $i-1; ?></h3>

                    <p>User</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php }else{ ?>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                  <div class="inner">
                    <h3>200</h3>

                    <p>Happy Clints</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3>15+</h3>

                    <p>Worker</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            <?php } ?>

              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                  <?php 
                        include 'db/db.php';

                        $query    = "SELECT * FROM tbl_books";
                        $stmt        = $db->prepare($query);
                        $result        = $stmt->execute();
                        $i = 1;
                        while ($row = $stmt->fetch()) {
                          $i++;
                        }
                  ?>
                  <div class="inner">
                    <h3><?php echo $i-1; ?></h3>

                    <p>Books</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-book"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                  <?php 
                        include 'db/db.php';

                        $query    = "SELECT * FROM tbl_author";
                        $stmt        = $db->prepare($query);
                        $result        = $stmt->execute();
                        $i = 1;
                        while ($row = $stmt->fetch()) {
                          $i++;
                        }
                  ?>
                  <div class="inner">
                    <h3><?php echo $i-1; ?></h3>

                    <p>Author</p>
                  </div>
                  <div class="icon">
                    <i class="fa fa-user-secret"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
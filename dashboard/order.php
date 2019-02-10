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
        <h1><i class="fa fa-clipboard"></i> Order <small>Get the summery here</small></h1>
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
              <h3 class="box-title">Order</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="content">
            <div class="container-fluid">
                <?php  
                    if ($user_role == 1) {
                        
                    
                ?>
                
                <table class="table text-center">
                    <thead>
                      <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Product</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Token No.</th>
                        <th class="text-center">Bkash</th>
                        <th class="text-center">Transection ID</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php  
                            include 'db/db.php';

                            $query          = "SELECT * FROM tbl_order ORDER BY order_id DESC";
                            $stmt           = $db->prepare($query);
                            $result         = $stmt->execute();

                            if ($result) {
                                $i = 1;
                                while($row = $stmt->fetch()){
                                    $order_id             = $row['order_id'];
                                    $book_ids             = $row['book_ids'];
                                    $amount               = $row['paid_amount'];
                                    $order_status         = $row['order_status'];
                                    $date                 = $row['order_date'];
                                    $token_no             = $row['token_number'];
                                    $phone_number         = $row['mobile_number'];
                                    $bkash_transection_id = $row['bkash_transiction_id'];
                               
                        ?>

                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td>
                            <?php 
                                $book_ids=explode(",",$book_ids);

                                foreach ($book_ids as $key) {
                                    
                                    $query_books         = "SELECT * FROM tbl_books WHERE book_id = '$key'";
                                    $stmt_books           = $db->prepare($query_books);
                                    $result_books         = $stmt_books->execute();
                                    if ($result_books) {
                                        while ($row_result = $stmt_books->fetch()) {
                                            echo $book_name = $row_result['book_title'].', ';
                                        }
                                    }
                                }
                                
                            ?>
                                
                        </td>
                        <td><?php echo $amount." TK" ?></td>
                        <td><?php echo $token_no ?></td>
                        <td><?php echo $phone_number ?></td>
                        <td><?php echo $bkash_transection_id ?></td>
                        <td><?php echo date('d/m/Y',strtotime($date)) ?></td>

                        <td>

                            <?php 
                                if ($order_status == 1) {
                            ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Pending <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="order_status_change.php?id=<?php echo $order_id ?>&action=2">Delevered</a></li>
                    </ul>
                </div>
                                    

                            <?php 
                            }elseif ($order_status == 2) {
                              
                            ?>

                            <div class="btn-group">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Delevered <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                      <li><a href="order_status_change.php?id=<?php echo $order_id ?>&action=1">Pending</a></li>
                    </ul>
                </div>

              <?php } ?>
                        </td>
                    </tr>

                      <?php }} ?>
                    </tbody>
                    </table>

                    <?php  
                        }else{
                    ?>
                    <table class="table text-center">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Token No.</th>
                            <th class="text-center">Bkash</th>
                            <th class="text-center">Transection ID</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php  
                                include 'db/db.php';
                                $query          = "SELECT * FROM tbl_order WHERE user_id = '$user_id' ORDER BY order_id DESC";
                                $stmt           = $db->prepare($query);
                                $result         = $stmt->execute();

                            if ($result) {
                                $i = 1;
                                while($row = $stmt->fetch()){
                                    $order_id             = $row['order_id'];
                                    $book_ids             = $row['book_ids'];
                                    $amount               = $row['paid_amount'];
                                    $order_status         = $row['order_status'];
                                    $date                 = $row['order_date'];
                                    $token_no             = $row['token_number'];
                                    $phone_number         = $row['mobile_number'];
                                    $bkash_transection_id = $row['bkash_transiction_id'];
                                    
                                


                            ?>
                          <tr>
                            <td><?php echo $i++ ?></td>
                            <td>
                                <?php 
                                $book_ids=explode(",",$book_ids);

                                foreach ($book_ids as $key) {
                                    
                                    $query_books         = "SELECT * FROM tbl_books WHERE book_id = '$key'";
                                    $stmt_books           = $db->prepare($query_books);
                                    $result_books         = $stmt_books->execute();
                                    if ($result_books) {
                                        while ($row_result = $stmt_books->fetch()) {
                                            echo $book_name = $row_result['book_title'];
                                            echo "<br>";
                                        }
                                    }
                                }
                                
                            ?>
                                    
                            </td>
                            <td><?php echo $amount." TK" ?></td>
                            <td><?php echo $token_no ?></td>
                            <td><?php echo $phone_number ?></td>
                            <td><?php echo $bkash_transection_id ?></td>
                            <td><?php echo date('d/m/Y h:i a',strtotime($date)) ?></td>

                            <td>
                                <?php 
                                    if ($order_status == 1) {
                                        echo "<a href='' disabled readonly class='btn btn-danger' title='Click to Change Status'>Pending</a>";
                                    }elseif ($order_status == 2) {
                                        echo "<a href='' disabled readonly class='btn btn-success' title='Click to Change Status'>Delevered</a>";
                                    }

                                ?>
                                        
                            </td>
                          </tr>

                          <?php }} ?>
                        </tbody>
                    </table>
                    <?php } ?>

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
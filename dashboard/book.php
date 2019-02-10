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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  
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
        <h1><i class="fa fa-clipboard"></i> Books <small>Get the books here</small></h1>
        <ol class="breadcrumb">
          <li><a href="index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Books</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-file-o"></i> All Books</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <table id="table_id" class="table display">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Author</th>
                  <th>Category</th>
                  <th>Publication</th>
                  <th>No. Of Pages</th>
                  <th>Country</th>
                  <th>Language</th>
                  <th>File</th>
                  <th>Edition</th>
                  <th>Make This Feature</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                
                <tbody>
                <?php  
                    include 'db/db.php';

                    $query_book     = "SELECT * FROM tbl_books ORDER BY book_id DESC";
                    $stmt        = $db->prepare($query_book);
                    $result        = $stmt->execute();
                    $i = 1;
                    while($row = $stmt->fetch()){
                        $book_id            = $row['book_id'];
                        $book_title         = $row['book_title'];
                        $book_author        = $row['book_author'];
                        $book_category      = $row['book_category'];
                        $book_publication   = $row['book_publication'];
                        $book_page_count    = $row['book_pages'];
                        $book_country       = $row['book_country'];
                        $book_language      = $row['book_language'];
                        $book_file          = $row['book_file'];
                        $book_edition       = $row['book_edition'];
                        $book_feature       = $row['book_feature'];

                        $query_author       = "SELECT * FROM tbl_author WHERE author_id = '$book_author'";
                        $stmt_author        = $db->prepare($query_author);
                        $result_author      = $stmt_author->execute();
                        $row_author         = $stmt_author->fetch();

                        $query_category     = "SELECT * FROM tbl_category WHERE cat_id = '$book_category'";
                        $stmt_category      = $db->prepare($query_category);
                        $result_category    = $stmt_category->execute();
                        $row_category       = $stmt_category->fetch();

                        $query_publication  = "SELECT * FROM tbl_publication WHERE publication_id = '$book_publication'";
                        $stmt_publication   = $db->prepare($query_publication);
                        $result_publication = $stmt_publication->execute();
                        $row_publication    = $stmt_publication->fetch();

                            
                        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

                        foreach ($countries as $key => $value) {
                          if ($key == $book_country) {
                            $book_country_name = $value;
                          }
                        }

                ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php 
                        $allowedlimit = 15;
                        if(mb_strlen($book_title)>$allowedlimit)
                        {
                            echo mb_substr($book_title,0,$allowedlimit)."....";
                        }else{
                          echo $book_title;
                        } 
                    ?></td>
                    <td><?php echo $row_author['author_name'] ?></td>
                    <td><?php echo $row_category['cat_name'] ?></td>
                    <td><?php echo $row_publication['publication_name']; ?></td>
                    <td><?php echo $book_page_count ?></td>
                    <td><?php echo $book_country_name ?></td>
                    <td><?php echo $book_language ?></td>
                    <td><a target="_blank" href="uploads/book/<?php echo $book_file ?>">Click To view</a></td>
                    <td>
                      <?php 
                      $explode = explode(",", $book_edition);
                      foreach ($explode as $key => $value) {
                        echo $value;
                        echo "<br>";
                      }
                    ?>
                      
                    </td>
                    <td><a href="make_book_slider.php?id=<?php echo $book_id; ?>&status=<?php echo $book_feature ?>">
                      <?php 
                        if ($book_feature == 1) {
                          echo "Activated";
                        }else{
                          echo "Active";
                        }
                      ?>
                    </a></td>
                    <td>
                        <a href="book_edit.php?id=<?php echo $book_id; ?>" class="text-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="book_delete.php?id=<?php echo $book_id; ?>" class="text-danger" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                </tr>    

                <?php } ?> 
                </tbody> 
              </table>

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
  <script src="assets/bower_components/jquery/dist/jquery1.min.js"></script>
  <script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
  <script src="assets/dist/js/Theme.min.js"></script>
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable({
          responsive: true
        });
    } );
  </script>
</body>
</html>
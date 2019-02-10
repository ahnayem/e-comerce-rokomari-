<?php include 'inc/check_session.php'; ?>
<?php include 'inc/fetch_user.php'; ?>

<?php 
    if(isset($_GET['id'])){

      $book_id = $_GET['id'];

      $query_book    = "SELECT * FROM tbl_books WHERE book_id=:book_id";
      $stmt_book     = $db->prepare($query_book);
      $stmt_book     -> bindValue(':book_id',$book_id, PDO::PARAM_STR);
      $result_book   = $stmt_book->execute();
      $fetch_book    = $stmt_book->fetch();

      $query_author    = "SELECT * FROM tbl_author WHERE author_id=:author_id";
      $stmt_author     = $db->prepare($query_author);
      $stmt_author     -> bindValue(':author_id',$fetch_book['book_author'], PDO::PARAM_STR);
      $result_author   = $stmt_author->execute();
      $fetch_author    = $stmt_author->fetch();

      $query_publication    = "SELECT * FROM tbl_publication WHERE publication_id=:publication_id";
      $stmt_publication     = $db->prepare($query_publication);
      $stmt_publication     -> bindValue(':publication_id',$fetch_book['book_publication'], PDO::PARAM_STR);
      $result_publication   = $stmt_publication->execute();
      $fetch_publication    = $stmt_publication->fetch();

      $query_category    = "SELECT * FROM tbl_category WHERE cat_id=:cat_id";
      $stmt_category     = $db->prepare($query_category);
      $stmt_category     -> bindValue(':cat_id',$fetch_book['book_category'], PDO::PARAM_STR);
      $result_category   = $stmt_category->execute();
      $fetch_category    = $stmt_category->fetch();

    }else{
      header('location: 404.php');
    }
?>

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
  <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">

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
        <h1><i class="fa fa-clipboard"></i> books <small>Get the books here</small></h1>
        <ol class="breadcrumb">
          <li><a href="index"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">Book</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content container-fluid">

        <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="fa fa-plus"></i> Add New Book</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12">
                  <form action="" method="post" enctype="multipart/form-data">
              
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_title">Title</label>
                        <input type="text" name="book_title" id="book_title" value="<?php echo $fetch_book['book_title']; ?>" class="form-control" maxlength="255" required>
                      </div>
                    </div>


                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_author">Author</label>
                        <select class="form-control select2" name="book_author" id="book_author" >
                          <option selected="<?php echo $fetch_author['author_name']; ?>"><?php echo $fetch_author['author_name']; ?></option>
                          <?php 
                              include 'db/db.php';

                              $query_author   = "SELECT * FROM tbl_author ORDER BY author_id DESC";
                              $stmt           = $db->prepare($query_author);
                              $result         = $stmt->execute();

                              if ($result) {
                                  $i = 1;
                                  while($row = $stmt->fetch()){
                                      $author_id = $row['author_id'];
                                      $author_name = $row['author_name'];
                                      $author_file = $row['author_image'];
                          ?>
                          <option value="<?php echo $author_id ?>"><?php echo $author_name; ?></option>
                        <?php }} ?>
                        </select>
                      </div>
                    </div>
              
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_publication">Publication</label>
                        <select class="form-control select2" name="book_publication" id="book_publication" value="<?php echo $fetch['book_title']; ?>">
                          <option selected="<?php echo $fetch_publication['publication_name']; ?>"><?php echo $fetch_publication['publication_name']; ?></option>
                          <?php 
                              include 'db/db.php';

                              $query_publication   = "SELECT * FROM tbl_publication ORDER BY publication_id DESC";
                              $stmt                = $db->prepare($query_publication);
                              $result              = $stmt->execute();

                              if ($result) {
                                  $i = 1;
                                  while($row = $stmt->fetch()){
                                      $publication_id = $row['publication_id'];
                                      $publication_name = $row['publication_name'];
                          ?>
                          <option value="<?php echo $publication_id ?>"><?php echo $publication_name; ?></option>
                        <?php }} ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_category">Category</label>
                        <select class="form-control select2" name="book_category" id="book_category">
                          <option selected="<?php echo $fetch_category['cat_name']; ?>"><?php echo $fetch_category['cat_name']; ?></option>
                          <?php 
                              include 'db/db.php';

                              $query_category   = "SELECT * FROM tbl_category ORDER BY cat_id DESC";
                              $stmt                = $db->prepare($query_category);
                              $result              = $stmt->execute();

                              if ($result) {
                                  $i = 1;
                                  while($row = $stmt->fetch()){
                                      $cat_id = $row['cat_id'];
                                      $cat_name = $row['cat_name'];
                          ?>
                          <option value="<?php echo $cat_id ?>"><?php echo $cat_name; ?></option>
                        <?php }} ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_page">Number Of Pages</label>
                        <input type="number" name="book_page" id="book_page" placeholder="Number Of Pages" class="form-control" required value="<?php echo $fetch_book['book_pages']; ?>">
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_country">Origin Of the Book</label>
                        <?php 
                          $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
                          
                        ?>
                        
                        <select class="form-control select2" name="book_country" id="book_country">
                          <?php 
                              echo $book_country = $fetch_book['book_country'];  

                              foreach ($countries as $key => $value) {
                                if ($key == $book_country) {
                                  $book_country_name = $value;
                          ?>
                              <option selected="<?php echo $key ?>"><?php echo $book_country_name; ?></option>
                            <?php } ?>
  
                          <option value="<?php echo $key ?>"><?php echo $value;?></option>
                        <?php } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_language">Language</label>
                        
                        <select class="form-control select2" name="book_language" id="book_language">
                          <option value="<?php echo $fetch_book['book_language']; ?>"><?php echo $fetch_book['book_language']; ?></option>
                          <option value="bangla">Bangla</option>
                          <option value="english">English</option>
                          <option value="hindi">Hindi</option>
                          <option value="turkish">Turcky</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="author_file">Book</label>
                        <input type="file" name="author_file" id="author_file" class="form-control" multiple required >
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="author_images">Cover Image</label>
                        <input type="file" name="author_images" id="author_images" class="form-control" multiple required>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_edition">Edition</label>
                        <div class="row">
                            <div class="col-md-6">
                            <input type="date" name="book_release_date" id="book_release_date" class="form-control"  required value="<?php
                                    list($first, $last) = explode(",", $fetch_book['book_edition']);
                                      echo $first; ?>">
                            </div>
                            <div class="col-md-6">
                              <input type="text" placeholder="Edition Number" name="book_edition" id="book_edition" class="form-control" multiple required value="<?php echo $last; ?>">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="book_edition">Price</label>
                        <input type="number" placeholder="Book Price" name="book_price" id="book_price" class="form-control"  required value="<?php echo $fetch_book['book_price']; ?>">
                      </div>
                    </div>

                    <button type="submit" name="add_books" class="btn btn-primary btn-lg d-block"><i class="fa fa-file"></i> Update Books</button>

                  </form>
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
  <script src="assets/bower_components/select2/dist/js/select2.min.js"></script>
  <script src="assets/dist/js/Theme.min.js"></script>
  <script>
    $('.select2').select2()
  </script>

</body>
</html>

<?php 
  if (isset($_POST['add_books'])) {
    include 'db/db.php';
    $book_title           = $_POST['book_title'];
    $book_author          = $_POST['book_author'];
    $book_publication     = $_POST['book_publication'];
    $book_category        = $_POST['book_category'];
    $book_page            = $_POST['book_page'];
    $book_country         = $_POST['book_country'];
    $book_language        = $_POST['book_language'];
    $book_release         = $_POST['book_release_date'];
    $book_edition         = $_POST['book_edition'];
    $book_edition_new     = $book_release.",".$book_edition;
    $book_price           = $_POST['book_price'];
    

    $file                 = $_FILES['author_file']['name'];
    $tmp_file             = $_FILES['author_file']['tmp_name'];

    $cover_image          = $_FILES['author_images']['name'];
    $cover_tmp_file       = $_FILES['author_images']['tmp_name'];


    if (!empty($book_title) && !empty($book_author) && !empty($book_publication) && !empty($book_category) && !empty($book_page) && !empty($book_country) && !empty($book_language) && !empty($book_edition_new) && !empty($file) && !empty($cover_image) && !empty($book_price)) {
        $target_dir     = "uploads/book/";
        $target_file    = $target_dir . basename($file);
        $target_file    = md5($target_file);
        $uploadOk       = 1;
        $imageFileType  = pathinfo($target_file,PATHINFO_EXTENSION);

        $target_dir_cover     = "uploads/cover/";
        $target_file_cover    = $target_dir_cover . basename($file);
        $target_file_cover    = md5($target_file_cover);
        $uploadOk_cover       = 1;
        $imageFileType_cover  = pathinfo($target_file_cover,PATHINFO_EXTENSION);
        
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            if (file_exists($target_file_cover)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // if ($_FILES["books_file"]["size"] > 500000) {
            //     echo "Sorry, your file is too large.";
            //     $uploadOk = 0;
            // }

            if ($uploadOk == 0 && $uploadOk_cover == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                
              $extension=explode(".", $file);
              $extension=end($extension);
              $prod = $target_file;
              $newfilename=$prod .".".$extension;
              $move = move_uploaded_file($tmp_file, $target_dir.$newfilename);

              $extension_cover=explode(".", $cover_image);
              $extension_cover=end($extension_cover);
              $prod_cover = $target_file_cover;
              $newfilename_cover=$prod_cover .".".$extension_cover;
              $move_cover = move_uploaded_file($cover_tmp_file, $target_dir_cover.$newfilename_cover);

              if ($move == true && $move_cover == true) {
                  $query        = "INSERT INTO tbl_books(book_title, book_author, book_publication, book_category, book_pages, book_country, book_translate_from, book_file, book_edition, book_price, book_cover_image) 
                                                VALUES(:book_title, :book_author, :book_publication, :book_category, :book_page, :book_country, :book_translate_from, :book_file, :book_edition, :book_price, :book_cover_image)";

                  $query        ="UPDATE tbl_books SET book_title=(:book_title),book_author=(:book_author),book_category=(:book_category),book_publication=(:book_publication),book_pages=(:book_page),book_price=(:book_price),book_country=(:book_country),book_language=(:book_translate_from),book_file=(:book_file),book_edition=(:book_edition),book_cover_image=(:book_cover_image) WHERE book_id='$book_id'";

                  $stmt         = $db->prepare($query);
                  $stmt         -> bindValue(':book_title',$book_title,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_author',$book_author,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_category',$book_category,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_publication',$book_publication,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_page',$book_page,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_country',$book_country,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_translate_from',$book_language,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_file',$newfilename,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_edition',$book_edition_new,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_price',$book_price,PDO::PARAM_STR);
                  $stmt         -> bindValue(':book_cover_image',$newfilename_cover,PDO::PARAM_STR);
                  $result       = $stmt->execute();                        

                  if ($result) {
                      echo "<script>alert('books Updated Successfully')</script>";
                      echo "<script>window.location.href='book.php'</script>";
                  }else{
                      echo "<script>alert('ERROR!!! While Updating Book')</script>";
                  }
              }else{
                echo "<script>alert('ERROR!!! While moveing Book')</script>";
              }
              
                
            }
                
    }else{
      echo "<script>alert('Filed Empty')</script>";
    }

    
  }

?>
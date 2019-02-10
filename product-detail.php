<?php  
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['shopping_cart'])) {
            
        }else{
            $item_array = array(
            'item_id'       => $_GET['id'], 
            'item_name'     => $_POST['hidden_name'], 
            'item_price'    => $_POST['hidden_price'], 
            'item_quantity' => $_POST['quantity'],
            );
        }
    }
?>

<?php include 'inc/header.php'; ?>

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<?php include 'inc/main-nav.php' ?>

		<!-- Header Mobile -->
		<?php include 'inc/header-mobile.php'; ?>

		<!-- Menu Mobile -->
		<?php include 'inc/mobile-menu.php'; ?>
	</header>

	<!-- book Detail -->
			<div class="section mt-5">
		        <div class="container">
		                
		            <div class="row">
							
		                <?php  

		                    require("dashboard/db/db.php"); 
		                    $get_book_id = $_GET['id'];
		                    $query = "SELECT * FROM tbl_books WHERE book_id = '$get_book_id'";
		                    $stmt        = $db->prepare($query);
                    		$result        = $stmt->execute();

		                    if ($result) {
		                        while($row = $stmt->fetch()){
		                            $book_id         	= $row['book_id'];
		                            $book_title      	= $row['book_title'];
		                            $book_details    	= $row['book_description'];
		                            $book_price      	= $row['book_price'];
		                            $book_file	      	= $row['book_file'];
		                            $book_cover_image 	= $row['book_cover_image'];
		                            $book_cat_id     	= $row['book_category'];
		                            $book_author	   	= $row['book_author'];
		                            $book_language	   	= $row['book_language'];
		                            $book_edition       = $row['book_edition'];
		                            $book_country       = $row['book_country'];

		                        }
		                    }
		                ?>

		                <div class="col-md-3">
		                    <div style="text-align: center; width: 100%; padding: 15px; border: 1px solid #eee;">
		                        <img class="card-img-top img-fluid" src="dashboard/uploads/cover/<?php echo $book_cover_image ?>">
		                    </div>
		                    <div class="read-pdf-btn text-center">
		                    	<a href="dashboard/uploads/book/<?php echo $book_file ?>" target="_blank"><i class="fa fa-hand-o-right"></i> একটু পড়ে দেখুন</a>
		                    </div>    
		                </div>    
		                        
		                 <div class="col-md-8">
		                 	<div class="panel-body">
		                      <h3 class="card-title mt-2"><?php echo $book_title ?></h3>
		                     	<span>
		                     	<?php 
		                     		$query_author 				= "SELECT * FROM tbl_author WHERE author_id = '$book_author'";
		                     		$stmt_author        		= $db->prepare($query_author);
                    				$result_author        		= $stmt_author->execute();
                    				$fetch_author        		= $stmt_author->fetch();
		                     		echo $author_name 			= $fetch_author['author_name'];

		                     	?></span>
		                      <h4 class="mt-2 mb-2"><?php echo '৳ '.$book_price ?></h4>
		                      <hr>
		                      <p class="card-text">Category: 
		                      <?php 
			                      	$query_cat 				= "SELECT * FROM tbl_category WHERE cat_id = '$book_cat_id'";
		                     		$stmt_cat        		= $db->prepare($query_cat);
                    				$result_cat        		= $stmt_cat->execute();
                    				$fetch_cat        		= $stmt_cat->fetch();
		                     		echo $cat_name 			= $fetch_cat['cat_name'];
		                      ?>
		                      	
		                      </p>
								<br>
		                        <form action="add_cart.php?action=add&id=<?php echo $book_id; ?>" method="POST">

		                            <input type="number" name="quantity" value="1" class="form-control" style="border: 1px solid #e0e0e0!important;">

		                            <input type="text" hidden name="hidden_name" value="<?php echo $book_title; ?>">

		                            <input type="text" hidden name="hidden_price" value="<?php echo $book_price; ?>">

		                            <button name="add_to_cart" class="btn btn-danger btn-lg pull-right btn-block" style="margin-top: 15px;">
		                                            <i class="fa fa-shopping-cart"></i> Add To Cart
		                                        </button>
		                        </form>
		                    </div>
		                 </div>
		                  </div>
		                  <!-- /.card -->
		            </div>
		        </div>
		    </div>
		    <section class="pt-5">
		    	<div class="container">
		    		<h3 class="mb-3" style="font-size: 20px!important;">Product Specification & Summary</h3>
			    	<ul class="nav nav-tabs">
					  <li class="nav-item">
					    <a class="nav-link active" href="#" style="border-top: 3px solid #33c24d!important;">Specification</a>
					  </li>
					</ul>
					<div class="tab-content pt-4">
						<div class="tab-pane show active">
							<table class="table table-bodered">
								<tbody>
									<tr>
										<td>Title</td>
										<td><?php echo $book_title ?></td>
									</tr>
									<tr>
										<td>Author</td>
										<td><?php echo $author_name = $fetch_author['author_name']; ?></td>
									</tr>
									<tr>
										<td>Category</td>
										<td><?php echo $cat_name = $fetch_cat['cat_name']; ?></td>
									</tr>
									<tr>
										<td>Language</td>
										<td><?php echo $book_language; ?></td>
									</tr>
									<tr>
										<td>Edition</td>
										<td>
										<?php 
					                      $explode = explode(",", $book_edition);
					                      foreach ($explode as $key => $value) {
					                        echo $value;
					                        echo " ";
					                      }
					                    ?>    	
						                </td>
									</tr>
									<tr>
										<td>Country</td>
										<td>
										<?php 
											$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

					                        foreach ($countries as $key => $value) {
					                          if ($key == $book_country) {
					                            echo $book_country_name = $value;
					                          }
					                        }
										?>   	
						                </td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
			    </div>
		    </section>

	<!-- Review Book -->
	
	<section class="relatebook bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Book Review
				</h3>
			</div>
			<?php  
				if (isset($_SESSION['user_id'])) {
			?>
			<div class="row">
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="review-content">
						<form action="" method="POST">
							<div class="form-group">
								<textarea name="review_text" id="review_text" cols="30" rows="10" placeholder="Write Your Review And give reating here" class="form-control"></textarea>
								<div class="innfer-form" style="margin-top: 15px;">
									<div class="row">
										<div class="col-md-6">
											<label for="reating">Reating</label>
											<select name="reating" id="reating" class="form-control">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
										<div class="col-md-6 text-center">
											<div class="submit-btn" style="padding: 32px 0;">
												<button type="submit" name="submit_review" class="btn btn-success pull-right">Submit Review</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<?php  
	
			if (isset($_POST['submit_review'])) {

				include 'dashboard/db/db.php';

				$review_text 	= $_POST['review_text'];
				$review_number	= $_POST['reating'];
				$get_book_id 	= $_GET['id'];
				$get_user_id 	= $_SESSION['user_id'];
				

				if (!empty($review_text) || !empty($review_number)) {
					$query 	= "INSERT INTO tbl_review(review_text,review_number,book_id,user_id)
											  VALUES('$review_text','$review_number','$get_book_id',$get_user_id)";
					$stmt         = $db->prepare($query);
		          	$stmt         -> bindValue(':review_text',$review_text,PDO::PARAM_STR);
		          	$stmt         -> bindValue(':review_number',$review_number,PDO::PARAM_STR);
		          	$stmt         -> bindValue(':get_book_id',$get_book_id,PDO::PARAM_STR);
		          	$stmt         -> bindValue(':get_user_id',$get_user_id,PDO::PARAM_STR);
		          	$result       = $stmt->execute(); 
					if ($result) {
						echo "<script>alert('Review Submitted')</script>";
					}else{
						echo "<script>alert('Review Submitted query failed')</script>";
					}
				}else{
					echo "<script>alert('Field Empty')</script>";
				}
			}
			
		?>
			<div class="row">
				<h3 style="margin: 15px 0;">Previous Review</h3>
				<div class="review-star" style="padding: 0 15px; width: 100%;">
					<h2 style="position: relative;">
					<?php  
						$query = "SELECT SUM(review_number) / COUNT(review_id) AS counter FROM tbl_review WHERE book_id = '$get_book_id'";
						$stmt 		= $db->prepare($query);
	                	$result    	= $stmt->execute();
	                	$fetch 		= $stmt->fetch();

	                	$count 		= $fetch['counter'];
	                	$ceil_count	= floor($count);
	                	echo "<p style='float: left; margin-right: 15px; font-size: 35px!important; color: #000; position: relative; top: -16px;'>".$ceil_count."</p>";
	                	echo "<p>Ratings Out Of 5</p>";
	                	if ($ceil_count == 1) {
	                		echo "<div class='star-print'>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "</div>";
	                	}elseif ($ceil_count == 2) {
	                		echo "<div class='star-print'>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "</div>";
	                	}elseif ($ceil_count == 3) {
	                		echo "<div class='star-print' style=''padding: 0 15px;>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "</div>";

	                	}elseif ($ceil_count == 4) {
	                		echo "<div class='star-print'>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "</div>";
	                	}elseif ($ceil_count == 5) {
	                		echo "<div class='star-print' style=''padding: 0 15px;>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "<i class='fa fa-star'></i>";
	                		echo "</div>";
	                	}
					?>
					</h2>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12">
				<?php  
					$query_review 		= "SELECT * FROM tbl_review WHERE book_id = '$get_book_id'";
					$stmt_review   		= $db->prepare($query_review);
                    $result_review     	= $stmt_review->execute();
                    if ($result_review) {
                    	while ($row_review = $stmt_review->fetch()) {
                    		$user_id    	= $row_review['user_id'];
                            $book_id  		= $row_review['book_id'];
                            $review_number  = $row_review['review_number'];
                            $review_text  	= $row_review['review_text'];



				?>
				<div class="review-comment">
					<h3 style="font-size: 16px; text-align: justify; margin: 10px 0; padding: 0;"><?php 
						$review_text;
						$allowedlimit = 300;
						if(mb_strlen($review_text)>$allowedlimit)
						{
						    echo mb_substr($review_text,0,$allowedlimit)."....";
						}else{
							echo $review_text;
						}
					?></h3>
					<span style="font-size: 12px;">
						<?php  
							$query 		= "SELECT * FROM tbl_user WHERE id = $user_id";
							$stmt   	= $db->prepare($query);
                    		$result     = $stmt->execute();
                    		$fetch 		= $stmt->fetch();
                    		echo  "Commented By: ". $fetch['fullname'];
                    		if ($review_number == 1) {
		                		echo "<div class='star-print' style='margin-bottom: 15px;'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}elseif ($review_number == 2) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}elseif ($review_number == 3) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";

		                	}elseif ($review_number == 4) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}elseif ($review_number == 5) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}
						?>
					</span>
				</div>
			<div class="clearfix"></div>
			<?php }} ?>
			</div>
		</div>
		</div>
	</section>
<?php }else{ ?>
		<div class="row">
			<h3 style="margin: 15px 0;">Previous Review</h3>
			<div class="review-star" style="padding: 0 15px; width: 100%;">
				<h2 style="position: relative;">
				<?php  
					$query = "SELECT SUM(review_number) / COUNT(review_id) AS counter FROM tbl_review WHERE book_id = '$get_book_id'";
					$stmt 		= $db->prepare($query);
                	$result    	= $stmt->execute();
                	$fetch 		= $stmt->fetch();

                	$count 		= $fetch['counter'];
                	$ceil_count	= floor($count);
                	echo "<p style='float: left; margin-right: 15px; font-size: 35px!important; color: #000; position: relative; top: -16px;'>".$ceil_count."</p>";
                	echo "<p>Ratings Out Of 5</p>";
                	if ($ceil_count == 1) {
                		echo "<div class='star-print'>";
                		echo "<i class='fa fa-star'></i>";
                		echo "</div>";
                	}elseif ($ceil_count == 2) {
                		echo "<div class='star-print'>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "</div>";
                	}elseif ($ceil_count == 3) {
                		echo "<div class='star-print' style=''padding: 0 15px;>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "</div>";

                	}elseif ($ceil_count == 4) {
                		echo "<div class='star-print'>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "</div>";
                	}elseif ($ceil_count == 5) {
                		echo "<div class='star-print' style=''padding: 0 15px;>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "<i class='fa fa-star'></i>";
                		echo "</div>";
                	}
				?>
				</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php  
					$query_review 		= "SELECT * FROM tbl_review WHERE book_id = '$get_book_id'";
					$stmt_review   		= $db->prepare($query_review);
                    $result_review     	= $stmt_review->execute();
                    if ($result_review) {
                    	while ($row_review = $stmt_review->fetch()) {
                    		$user_id    	= $row_review['user_id'];
                            $book_id  		= $row_review['book_id'];
                            $review_number  = $row_review['review_number'];
                            $review_text  	= $row_review['review_text'];



				?>
				<div class="review-comment">
					<h3 style="font-size: 16px; text-align: justify; margin: 10px 0; padding: 0;"><?php 
						$review_text;
						$allowedlimit = 300;
						if(mb_strlen($review_text)>$allowedlimit)
						{
						    echo mb_substr($review_text,0,$allowedlimit)."....";
						}else{
							echo $review_text;
						}
					?></h3>
					<span style="font-size: 12px;">
						<?php  
							$query 		= "SELECT * FROM tbl_user WHERE id = $user_id";
							$stmt   	= $db->prepare($query);
                    		$result     = $stmt->execute();
                    		$fetch 		= $stmt->fetch();
                    		echo  "Commented By: ". $fetch['fullname'];
                    		if ($review_number == 1) {
		                		echo "<div class='star-print' style='margin-bottom: 15px;'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}elseif ($review_number == 2) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}elseif ($review_number == 3) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";

		                	}elseif ($review_number == 4) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}elseif ($review_number == 5) {
		                		echo "<div class='star-print'>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "<i class='fa fa-star'></i>";
		                		echo "</div>";
		                	}
						?>
					</span>
				</div>
			<div class="clearfix"></div>
			<?php }} ?>
			</div>
		</div>
		<h3 class="text-center">Please <a href="signin">Log In</a> Give Review</h3>
	<?php } ?>

	</div>
	<!-- Relate book -->
	<section class="relatebook bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related books
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php 
						include 'dashboard/db/db.php';

						$query_data 	= "SELECT * FROM tbl_books WHERE book_category = '$book_cat_id'";
						$stmt           = $db->prepare($query_data);
		                $result         = $stmt->execute();

		                if ($result ==  true) {
		                	while ($row = $stmt->fetch()) {
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
		                        $book_price			= $row['book_price'];
		                        $book_cover_image	= $row['book_cover_image'];
		                
					?>

					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="dashboard/uploads/cover/<?php echo $book_cover_image ?>" alt="IMG-PRODUCT">
								

								<div class="block2-overlay trans-0-4">
									<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
										<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
										<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
									</a>

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<a href="product-detail.php?id=<?php echo $book_id; ?>">
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												View Details
											</button>
										</a>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.php?id=<?php echo $book_id; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $book_title; ?>
								</a>

								<span style="float: left;" class=" m-text6 p-r-5">
									৳ <?php echo $book_price ?>
								</span>
								<a href="cart.php" class="pull-right"><i class="fa fa-shopping-cart"></i></a>
							</div>
						</div>
					</div>
				<?php }} ?>
				</div>
			</div>

		</div>
	</section>

	

	<!-- Footer -->
	<?php include 'inc/footer.php'; ?>
<?php include 'inc/script.php'; ?>



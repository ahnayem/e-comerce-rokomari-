
<section class="newproduct bgwhite p-t-45 p-b-105">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				Featured Products
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php 
					include 'dashboard/db/db.php';

					$query 	= "SELECT * FROM tbl_books WHERE book_feature = 1";
					$stmt           = $db->prepare($query);
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

	                        $query_author 		= "SELECT * FROM tbl_author WHERE author_id = '$book_author' ORDER BY author_id DESC";
							$stmt_author    	= $db->prepare($query_author);
							//$stmt_author		= $stmt_author->bindValue(':author_id',$book_author,PDO::PARAM_STR);
			                $result_author      = $stmt_author->execute();

			                if ($result_author ==  true) {
			                	while ($row_author = $stmt_author->fetch()) {
			                		$author_id    = $row_author['author_id'];
		                            $author_name  = $row_author['author_name'];
		                        }
		                    }
	                
				?>
				<div class="item-slick2 p-l-15 p-r-15" style="width: 200px!important;">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-img wrap-pic-w of-hidden pos-relative ">
							<img src="dashboard/uploads/cover/<?php echo $book_cover_image ?>" alt="IMG-PRODUCT">
							

							<div class="block2-overlay trans-0-4">
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

						<div class="block2-txt p-t-20 text-center">
							<a href="product-detail.php?id=<?php echo $book_id; ?>" class="block2-name dis-block s-text3 p-b-5">
								<?php 

									$allowedlimit = 29;
									if(mb_strlen($book_title)>$allowedlimit)
									{
									    echo mb_substr($book_title,0,$allowedlimit)."....";
									}else{
										echo $book_title;
									}

								?>
							</a>
							<span style="display: block;" class=" m-text6">
								<?php echo $author_name ?>
							</span>
							<span class="mt-1 m-text6">
								৳ <?php echo $book_price ?>
							</span>
						</div>
					</div>
				</div>
				
		<?php }} ?>
			</div>
		</div>

	</div>
</section>
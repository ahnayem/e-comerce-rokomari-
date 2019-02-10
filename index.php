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

	<!-- Slide1 -->
	<?php include 'inc/main-slider.php'; ?>

	<!-- Banner -->

	<!-- Feature Product -->
	<?php include'inc/feature.php'; ?>
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					BOOKS
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php 
						include 'dashboard/db/db.php';

						$query 	= "SELECT * FROM tbl_books ORDER BY book_id DESC";
						$stmt           = $db->prepare($query);
		                $result         = $stmt->execute();

		                if ($result ==  true) {
		                	while ($row = $stmt->fetch()) {
		                		$book_id    = $row['book_id'];
	                            $book_title  = $row['book_title'];
	                            $book_cover	=$row['book_cover_image'];
		                
					?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<a href="#">
								<div class="block2-img wrap-pic-w of-hidden pos-relative text-center" style="width: 100%; margin: auto;">
									<img src="dashboard/uploads/cover/<?php echo $book_cover ?>" alt="IMG-PRODUCT"> 
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
									<!-- <i class="fa  fa-book" style="font-size: 50px"></i> -->
								</div>
							</a>

							<div class="block2-txt p-t-20 text-center">
								<a href="product-detail.php?id=<?php echo $book_id; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $book_title; ?>
								</a>

								<a href="product-detail.php?id=<?php echo $book_id; ?>">View Details</a>
							</div>
						</div>
					</div>
					
			<?php }} ?>
				</div>
			</div>

		</div>
	</section>

	<!-- Shipping -->
	<?php include 'inc/shipping.php'; ?>


	<!-- Footer -->
	<?php include 'inc/footer.php'; ?>

<?php include 'inc/script.php'; ?>
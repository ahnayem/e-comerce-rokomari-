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

	<!-- Feature Product -->

<section class="newproduct bgwhite p-t-45 p-b-105">
	<div class="container">
		<div class="sec-title p-b-60">
			<h3 class="m-text5 t-center">
				জনপ্রিয় বই
			</h3>
		</div>
		<div class="sorting-btn">
			<h5 class="text-center" style="margin-bottom: 10px;"><i class="fa fa-sort"></i> Sort</h5>
			<ul style="margin-bottom: 10px;">
				<li><a href="book.php?status=1" class="btn btn-success">Price: Low To Hign</a></li>
				<li><a href="book.php?status=2" class="btn btn-success">Price: High To Low</a></li>
				<li><a href="book.php?status=3" class="btn btn-success">New Release</a></li>
				<li><a href="book.php" class="btn btn-success">Reset</a></li>
			</ul>
		</div>
		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick row">
				<?php 
					include 'dashboard/db/db.php';

					if (isset($_GET['status'])) {
						 $status = $_GET['status'];
					}else{
						$status = 3;
					}

					
					if ($status == 1) {
						$query 	= "SELECT * FROM tbl_books ORDER BY book_price ASC";
					}elseif ($status == 2) {
						$query 	= "SELECT * FROM tbl_books ORDER BY book_price DESC";
					}elseif ($status == 3) {
						$query 	= "SELECT * FROM tbl_books ORDER BY book_id DESC";
					}else{
						$query 	= "SELECT * FROM tbl_books ORDER BY book_id DESC";
					}
					$stmt           = $db->prepare($query);
	                $result         = $stmt->execute();

	                if ($result ==  true) {
	                	while ($row = $stmt->fetch()) {
	                		$book_id    = $row['book_id'];
                            $book_title  = $row['book_title'];
                            $book_price	=$row['book_price'];
                            $book_cover	=$row['book_cover_image'];
	                
				?>
				<div class="col-md-3" style="padding: 15px 15px 20px 15px; box-shadow: 0px 4px 6px #e1e1e1; margin-bottom: 10px;">
					<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
						<div class="block2">
							<a href="product-detail.php?id=<?php echo $book_id; ?>">
								<div class="block2-img wrap-pic-w of-hidden pos-relative text-center">
									<img src="dashboard/uploads/cover/<?php echo $book_cover ?>" alt="IMG-PRODUCT" style="border-radius: 100px; width: 100px; height: 100px; margin: auto;"> 
									<!-- <i class="fa  fa-book" style="font-size: 50px"></i> -->
								</div>
							</a>

							<div class="block2-txt p-t-20 text-center">
								<a href="product-detail.php?id=<?php echo $book_id; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $book_title; ?>
								</a>
								<a href="product-detail.php?id=<?php echo $book_id; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $book_price; ?>
								</a>

								<a href="product-detail.php?id=<?php echo $book_id; ?>">View Details</a>
							</div>
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
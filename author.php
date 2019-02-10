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
				জনপ্রিয় লেখকগণ
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php 
					include 'dashboard/db/db.php';

					$query 	= "SELECT * FROM tbl_author ORDER BY author_id DESC";
					$stmt           = $db->prepare($query);
	                $result         = $stmt->execute();

	                if ($result ==  true) {
	                	while ($row = $stmt->fetch()) {
	                		$author_id    = $row['author_id'];
                            $author_name  = $row['author_name'];
                            $author_file  = $row['author_image'];
	                
				?>
				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<div class="block2">
						<a href="details-info.php?id=<?php echo $author_id; ?>&action=author">
							<div class="block2-img wrap-pic-w of-hidden pos-relative">
								<img src="dashboard/uploads/author/<?php echo $author_file; ?>"  style="border-radius: 50%; width: 100px; margin: auto; height: 100px;" alt="IMG-PRODUCT">
							</div>
						</a>

						<div class="block2-txt p-t-20 text-center">
							<a href="details-info.php?id=<?php echo $author_id; ?>&action=author" class="block2-name dis-block s-text3 p-b-5">
								<?php echo $author_name; ?>
							</a>

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
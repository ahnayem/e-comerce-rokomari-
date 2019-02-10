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
				জনপ্রিয় পাবলিকেশন
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php 
					include 'dashboard/db/db.php';

					$query 	= "SELECT * FROM tbl_publication ORDER BY publication_id DESC";
					$stmt           = $db->prepare($query);
	                $result         = $stmt->execute();

	                if ($result ==  true) {
	                	while ($row = $stmt->fetch()) {
	                		$publication_id    = $row['publication_id'];
                            $publication_name  = $row['publication_name'];
	                
				?>
				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<div class="block2">
						<a href="details-info.php?id=<?php echo $publication_id; ?>&action=publication">
							<div class="block2-img wrap-pic-w of-hidden pos-relative text-center" style="width: 100px; margin: auto;">
								<!-- <img src="dashboard/uploads/author/<?php echo $author_file ?>" alt="IMG-PRODUCT"> -->
								<img src="assets/images/icon_svg/shop_by_pub.svg" alt="IMG-PRODUCT">
							</div>
						</a>

						<div class="block2-txt p-t-20 text-center">
							<a href="details-info.php?id=<?php echo $publication_id; ?>&action=publication" class="block2-name dis-block s-text3 p-b-5">
								<?php echo $publication_name; ?>
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
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
				জনপ্রিয় বিষয়
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php 
					include 'dashboard/db/db.php';

					$query 	= "SELECT * FROM tbl_category ORDER BY cat_id DESC";
					$stmt           = $db->prepare($query);
	                $result         = $stmt->execute();

	                if ($result ==  true) {
	                	while ($row = $stmt->fetch()) {
	                		$cat_id    = $row['cat_id'];
                            $cat_name  = $row['cat_name'];
	                
				?>
				<div class="item-slick2 p-l-15 p-r-15">
					<!-- Block2 -->
					<div class="block2">
						<a href="details-info.php?id=<?php echo $cat_id; ?>&action=category">
							<div class="block2-img wrap-pic-w of-hidden pos-relative text-center" style="width: 100px; margin: auto;">
								<img src="assets/images/icon_svg/shop_by_sub.svg" alt="IMG-PRODUCT">
								<!-- <i class="fa  fa-book" style="font-size: 50px"></i> -->
							</div>
						</a>

						<div class="block2-txt p-t-20 text-center">
							<a href="details-info.php?id=<?php echo $cat_id; ?>&action=category" class="block2-name dis-block s-text3 p-b-5">
								<?php echo $cat_name; ?>
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
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
	<!-- Title Page -->
	<!-- <section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(assets/images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Women
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Women Collection 2018
		</p>
	</section> -->


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<?php include 'inc/siderbar_product.php'; ?>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<?php include 'inc/product_shorting.php'; ?>
					<!-- Product -->
					<?php include 'inc/product_grid.php'; ?>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
						<a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<?php include 'inc/footer.php'; ?>

	<div id="dropDownSelect2"></div>

<?php include 'inc/script.php'; ?>
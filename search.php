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
				অনুসন্ধান ফলাফল
			</h3><br>
			<h4 class="t-center">"<?php echo $_GET['search-book']; ?>"</h4>
		</div>

		<!-- Slide2 -->
				
				<?php 
					include 'dashboard/db/db.php';
					$get_string = $_GET['search-book'];

					$query 	= "SELECT * FROM tbl_books WHERE book_title LIKE '%$get_string%' ORDER BY book_id DESC";
					$stmt           = $db->prepare($query);
	                $result         = $stmt->execute();

	                if ($result ==  true) {
	                	$i = 1;
	                	while ($row = $stmt->fetch()) {
	                		$book_id    = $row['book_id'];
	                
				?>

				<table class="table">
					<tr>
						<td>
							<a href="product-detail.php?id=<?php echo $book_id; ?>">
								<?php echo $row['book_title']; ?> |
								<?php echo $row['book_country']; ?> |
								<?php echo $row['book_language']; ?> |
							</a>
						</td>
					</tr>
				</table>
				
				
		<?php }} ?>
			

	</div>
</section>

	<!-- Shipping -->
	<?php include 'inc/shipping.php'; ?>


	<!-- Footer -->
	<?php include 'inc/footer.php'; ?>

<?php include 'inc/script.php'; ?>
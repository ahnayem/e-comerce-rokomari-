<div class="container-menu-header">
	<div class="topbar">
		<div class="topbar-social">
			<a href="#" class="topbar-social-item fa fa-facebook"></a>
			<a href="#" class="topbar-social-item fa fa-instagram"></a>
			<!-- <a href="#" class="topbar-social-item fa fa-pinterest-p"></a> -->
			<!-- <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a> -->
			<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
		</div>

		<div class="search-product pos-relative bo4 of-hidden">
			<form action="search" method="get">
				<input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-book" style="width: 500px; height: 30px!important; border-bottom: 2px solid #f90!important;" placeholder="Search Products...">

				<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4" type="submit">
					<i class="fs-12 fa fa-search" aria-hidden="true"></i>
				</button>
			</form>
		</div>

		<div class="topbar-child2">
			<span class="topbar-email">
				rokomari.com@example.com
			</span>

			<!-- <div class="topbar-language rs1-select2">
				<select class="selection-1" name="time">
					<option>USD</option>
					<option>BTD</option>
				</select>
			</div> -->
		</div>
	</div>

	<div class="wrap_header">
		<!-- Logo -->
		<a href="index.php" class="logo">
			<img src="assets/images/logo/logo.png" alt="IMG-LOGO">

		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.php"><i class="fa fa-home"></i></a>
						<!-- <ul class="sub_menu">
							<li><a href="index.html">Homepage V1</a></li>
							<li><a href="home-02.html">Homepage V2</a></li>
							<li><a href="home-03.html">Homepage V3</a></li>
						</ul> -->
					</li>

					<li>
						<a href="author.php">লেখক</a>
					</li>
					
					<li>
						<a href="publication.php">প্রকাশনী</a>
					</li>

					<li>
						<a href="category.php">ক্যাটেগরি</a>
					</li>

					<li>
						<a href="book.php">বই</a>
					</li>

					<li>
						<a href="contact.php">যোগাযোগ</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
			<a href="dashboard/" class="header-wrapicon1 dis-block">
				<?php  
					if (isset($_SESSION['user_id']) && !empty($user_image)) {
					
				?>
				<img style="border-radius: 50%;" src="dashboard/uploads/profile/<?php echo $user_image; ?>" class="header-icon1" alt="ICON">
			<?php }else if(isset($_SESSION['user_id'])){ ?>
				<img src="dashboard/uploads/profile/user2-160x160.jpg" class="header-icon1" alt="ICON">
			<?php }else{ ?>
				<img src="assets/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			<?php } ?>
			</a>

			<span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<a href="cart.php"><i class="fa fa-shopping-cart"></i>
					<?php 
	                if (!empty($_SESSION['shopping_cart'])) {

	                    echo '('.count($_SESSION['shopping_cart']).')';

	                }else{
	                    echo "(0)";
	                }
	            ?></a>
			</div>
		</div>
	</div>
</div>
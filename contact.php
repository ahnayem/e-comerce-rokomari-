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
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(assets/images/logo/11381697751c9c241f383b173ae6db68.png);">
		<h2 class="l-text2 t-center">
			Contact
		</h2>
	</section>
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-b-30">
					<div class="p-r-20 p-r-0-lg">
						<h4 class="m-text26 p-b-36 p-t-15">
							About Us
						</h4>
						<h5 class="p-b-25">Rokomari</h5>
						<span style="font-size: 15px;"><i class="fa fa-map-marker"></i> store at 3rd floor, Talaimari, Rajshahi, Raj 6000 or call us on +8801786192924</span>
						<br>
						<div class="from-group" style="display: block; margin-top: 10px;">
							<label for="">Contact Us</label>
							<br>
							<span style="font-size: 15px;"><i class="fa fa-mail"></i>rokomari.com@example.com</span>
						</div>
						
					</div>
				</div>
				<div class="col-md-6 p-b-30">
					<form class="leave-comment" action="" method="POST">
						<h4 class="m-text26 p-b-36 p-t-15">
							Send us your message
						</h4>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="name" placeholder="Full Name">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="phone_number" placeholder="Phone Number">
						</div>

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="email" placeholder="Email Address">
						</div>

						<textarea class="dis-block s-text7 size20 bo4 p-l-22 p-r-22 p-t-13 m-b-20" name="message" placeholder="Message"></textarea>

						<div class="w-size25">
							<!-- Button -->
							<button type="submit" name="send" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Send
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- Shipping -->
	<?php include 'inc/shipping.php'; ?>


	<!-- Footer -->
	<?php include 'inc/footer.php'; ?>

<?php include 'inc/script.php'; ?>


<?php 

	if (isset($_POST['send'])) {


		include 'dashboard/db/db.php';

		$fullname   	  = $_POST['name'];
		$phone_number     = $_POST['phone_number'];
		$email   		  = $_POST['email'];
		$massege  	 	  = $_POST['message'];


		$query_currency   = "INSERT INTO tbl_contact(fullname, number, email, massege) VALUES (:fullname, :number, :email, :massege)";
		$stmt      		  = $db->prepare($query_currency);
		$stmt  		      -> bindValue(':fullname',$fullname,PDO::PARAM_STR);
		$stmt      		  -> bindValue(':number',$phone_number,PDO::PARAM_STR);
		$stmt     		  -> bindValue(':email',$email,PDO::PARAM_STR);
		$stmt     		  -> bindValue(':massege',$massege,PDO::PARAM_STR);
		$result   		  = $stmt->execute();	

		if ($result) {
          echo "<script>alert('Message Send!')</script>";
          echo "<script>window.location.href='contact.php'</script>";
        }else{
          echo "<script>alert('Message Send Failed')</script>";
          echo "<script>window.location.href='contact.php'</script>";
        }


	}



 ?>
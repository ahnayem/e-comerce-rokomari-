<?php include 'inc/header.php'; ?>
<?php  
    if (isset($_GET["action"])){
        if ($_GET["action"] == "delete") {
           
            foreach ($_SESSION['shopping_cart'] as $key => $value) {
                if ($value['item_id'] == $_GET['id']) {
                    $id = $_GET['id'];
                    unset($_SESSION['shopping_cart'][$key]);
                    echo "<script>alert('Item has been removed')</script>";
                    echo "<script>window.location.href='cart.php?id=$id'</script>";
                }
            }
        }
    }
?>
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
	<!-- <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(assets/images/logo/11381697751c9c241f383b173ae6db68.png);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section> -->
	
	<!-- Cart -->
	<?php include 'inc/cart.php'; ?>

	<!-- Footer -->
	<?php include 'inc/footer.php'; ?>
	
<?php include 'inc/script.php'; ?>

<?php 
	include 'dashboard/db/db.php';
	if (isset($_POST['continue_shipping'])) {
		$phone_number			= $_POST['mobile_number'];
		$bkash_transsiction		= $_POST['bkash_transection_id'];
		$paid_amount			= $_POST['paid_amount'];
		$full_address			= $_POST['full_address'];
		$allOk					= 1;
		$user_id                = $_SESSION['user_id'];

        $token                  =  rand(1001,9999);
        $token_no               = substr($token, 1,6);

		foreach ($_SESSION['shopping_cart'] as $key => $value) {
			$product_id[] 		= $value['item_id'];
			$product_id_save	= implode(',', $product_id)	;
		}

		if ($phone_number == "" || empty($phone_number)) {
			echo "<script>alert('Please Provide A Phone Number!')</script>";
			$allOk = 0;
		}

		if ($bkash_transsiction == "" || empty($bkash_transsiction)) {
			echo "<script>alert('Please Provide bkash transsiction id Number!')</script>";
			$allOk = 0;
		}

		if ($paid_amount == "" || empty($paid_amount)) {
			echo "<script>alert('Please Provide ammount You Paid!')</script>";
			$allOk = 0;
		}

		if ($product_id_save == "" || empty($product_id_save)) {
			echo "<script>alert('Please No Product Selected!')</script>";
			$allOk = 0;
		}

		if ($allOk == 1) {
          	  $query        = "INSERT INTO tbl_order(
          	  									user_id,
          	  									book_ids,
          	  									paid_amount,
          	  									shipping_address,
          	  									mobile_number,
          	  									bkash_transiction_id,
          	  									token_number) 
          	  							VALUES(
          	  									:user_id, 
          	  									:book_ids,
          	  									:paid_amount,
          	  									:shipping_address,
          	  									:mobile_number,
          	  									:bkash_transiction_id,
          	  									:token_number)";
              $stmt         = $db->prepare($query);
              $stmt         -> bindValue(':user_id',$user_id,PDO::PARAM_INT);
              $stmt         -> bindValue(':book_ids',$product_id_save,PDO::PARAM_STR);
              $stmt         -> bindValue(':paid_amount',$paid_amount,PDO::PARAM_STR);
              $stmt         -> bindValue(':shipping_address',$full_address,PDO::PARAM_STR);
              $stmt         -> bindValue(':mobile_number',$phone_number,PDO::PARAM_STR);
              $stmt         -> bindValue(':bkash_transiction_id',$bkash_transsiction,PDO::PARAM_STR);
              $stmt         -> bindValue(':token_number',$token_no,PDO::PARAM_INT);
              $result       = $stmt->execute();   
              if ($result) {
              	echo "<script>alert('Order Placed Successfull!')</script>";
                unset($_SESSION['shopping_cart']);
                echo "<script>window.location.href='index.php'</script>";
              }else{
              	echo "<script>alert('Query Error!')</script>";
              }
		}
	}
?>
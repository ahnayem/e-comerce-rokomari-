<section class="slide1">
	<div class="wrap-slick1">
		<div class="slick1">
			<?php 
				include 'dashboard/db/db.php';

				$query_data 	= "SELECT * FROM tbl_slider WHERE slider_status = 1 LIMIT 3";
				$stmt           = $db->prepare($query_data);
	            $result         = $stmt->execute();

	            if ($result ==  true) {
	            	while ($row = $stmt->fetch()) {
	            		$slider_id            = $row['slider_id'];
	                    $slider_image         = $row['slider_image'];
	                
			?>
			<div class="item-slick1 item1-slick1" style="background-image: url(dashboard/uploads/slider/<?php echo $slider_image ?>); background-position: center; background-size: cover;">
			</div>
			<?php }} ?>
		</div>
	</div>
</section>

<section style="padding: 30px 0; background: #eee;">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<a href="author" style="padding: 25px 15px; background: #fff; display: block; border: 1px solid #e0e0e0; box-shadow: 0 3px 6px -4px #a2a2a2;">
					<div class="row">
						<div class="col-md-2">
							<div class="svg-content">
								<img src="assets/images/icon_svg/shop_by_aut.svg" style="width: 50px; padding: 5px 0;" alt="Logo">
							</div>
						</div>
						<div class="col-md-8">
							<div class="text-content">
								<p style="font-size: 18px; color: #000;">Shop By Author</p>
								<span style="font-size: 13px; color: #666">Browse your favorite Authors</span>
							</div>
						</div>
						<div class="col-md-2">
							<div class="icon-content">
								<i class="fa fa-angle-right" style="font-size: 30px; padding: 8px 0;"></i>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4"">
				<a href="category" style="padding: 25px 15px; background: #fff; display: block; border: 1px solid #e0e0e0; box-shadow: 0 3px 6px -4px #a2a2a2;">
					<div class="row">
						<div class="col-md-2">
							<div class="svg-content">
								<img src="assets/images/icon_svg/shop_by_sub.svg" style="width: 50px; padding: 5px 0;" alt="Logo">
							</div>
						</div>
						<div class="col-md-8">
							<div class="text-content">
								<p style="font-size: 18px; color: #000;">Shop By Categories</p>
								<span style="font-size: 13px; color: #666">Browse your favorite Categories</span>
							</div>
						</div>
						<div class="col-md-2">
							<div class="icon-content">
								<i class="fa fa-angle-right" style="font-size: 30px; padding: 8px 0;"></i>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-md-4">
				<a href="publication" style="padding: 25px 15px; background: #fff; display: block; border: 1px solid #e0e0e0; box-shadow: 0 3px 6px -4px #a2a2a2;">
					<div class="row">
						<div class="col-md-2">
							<div class="svg-content">
								<img src="assets/images/icon_svg/shop_by_pub.svg" style="width: 50px; padding: 5px 0;" alt="Logo">
							</div>
						</div>
						<div class="col-md-8">
							<div class="text-content">
								<p style="font-size: 18px; color: #000;">Shop By Publishers</p>
								<span style="font-size: 13px; color: #666">Browse your favorite Publishers</span>
							</div>
						</div>
						<div class="col-md-2">
							<div class="icon-content">
								<i class="fa fa-angle-right" style="font-size: 30px; padding: 8px 0;"></i>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
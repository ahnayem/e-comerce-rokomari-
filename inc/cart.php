
	<section class="cart p-t-70 p-b-100" style="background: #f1f2f4;">
		<div class="container">
			<h3 class="text-center" style="text-transform: uppercase; font-size: 22px;"><i class="fa fa-shopping-cart"></i>&nbsp;Cart</h3>
			<hr>
			<!-- Cart item -->
			<div class="container-table-cart1 pos-relative">
				<div class="wrap-table-shopping-cart bgwhite mb-4">
					<table class="table-shopping-cart table-bodered">
						<tr class="table-head">
							<th class="column-1">Name</th>
							<th class="column-2 text-center">Price</th>
							<th class="column-3">Quantity</th>
							<th class="column-4">Total</th>
							<th class="column-5">Remove</th>							
						</tr>
					<?php 
	                    if (!empty($_SESSION['shopping_cart'])) {
	                        $total = 0;


	                        foreach ($_SESSION['shopping_cart'] as $key => $value) {
	                         
	                        
	                    
	                ?>
						<tr class="table-row">
							<td class="column-1"><?php echo $value['item_name'] ?></td>
							<td class="column-2 text-center"><?php echo $value['item_price'] ?></td>
							<td class="column-3"><?php echo $value['quantity'] ?></td>
							<td class="column-4"><?php echo number_format($value['quantity'] * $value['item_price'], 2) ?></</td>
							<td class="column-5 text-center"><a href="cart.php?action=delete&id=<?php echo $value['item_id'] ?>" style="padding: 3px 5px; background: "><i class="fa fa-trash"></i></a></td>
						</tr>
						<?php  
	                        $total = $total + ($value['quantity'] * $value['item_price']);
	                    ?>
					<?php }} ?>
					</table>
				</div>
				<?php 
					if (isset($_SESSION['user_id'])) {
				
				?>
				<div class="row">
					<div class="col-md-7">
						<div class="total_area">
	                        <ul>
	                            <li>Cart Sub Total <span>
	                                <?php 
	                                    if (!empty($_SESSION['shopping_cart'])) {
	                                        echo number_format($total,2);
	                                    }
	                                ?>
	                            </span></li>
	                            <li>Eco Tax <span>0.00</span></li>
	                            <li>Total <span>
	                                <?php 
	                                    if (!empty($_SESSION['shopping_cart'])) {
	                                        echo number_format($total,2);
	                                    }
	                                ?>
	                            </span></li>
	                        </ul>
	                            <?php  
	                                if (isset($_SESSION['id'])) {
	                                    
	                                
	                            ?>

	                            

	                            <?php } ?>
	                    </div>
					</div>
					<div class="col-md-5">
						<div class="inner-form" style="padding: 25px 15px; background: #fff; box-shadow: 0 4px 6px -3px #9c9c9c;">
							<h3 class="mb-4">Fill out your information</h3>
							<form action="cart.php" method="POST">
								<div class="form-group">
									<label for="mobile_number">Mobile Number</label>
									<input type="text" name="mobile_number" style="border: 1px solid #d4d3d3!important;     border-radius: initial;" id="mobile_number" class="form-control" placeholder="Mobile Number" required="">
								</div>
								<div class="form-group">
									<label for="bkash_transection_id">Bkash Transection Id</label>
									<input type="text" name="bkash_transection_id" style="border: 1px solid #d4d3d3!important;     border-radius: initial;" class="form-control" id="bkash_transection_id" placeholder="Bkash Transection Id" required="">
								</div>
								<div class="form-group">
									<label for="paid_amount">Paid Amount</label>
									<input type="number" name="paid_amount" style="border: 1px solid #d4d3d3!important;     border-radius: initial;" class="form-control" id="paid_amount" placeholder="Paid Amount" required="">
								</div>

								<div class="form-group">
									<label for="">Full Address</label>
									<textarea name="full_address" class="form-control" style="border: 1px solid #d4d3d3!important;     border-radius: initial;" id="full_address" cols="30" rows="10" placeholder="Full Address"></textarea>
								</div>
								<button class="btn btn-warning" style="color: #fff; padding: 10px 15px;" name="continue_shipping" type="submit">Continue To Shipping</button>
							</form>
						</div>
					</div>
				</div>
			<?php }else{ ?>
				<h3 class="text-center">Please <a href="signin">Log In</a> check Out</h3>
			<?php } ?>
			</div>
		</div>
	</section>


<?php 

	/*
	* Signup 
	*/
	if (isset($_POST['signup']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		$agree = $_POST['terms'];
		/*
		* Agreed or not
		*/
		if (!empty($agree)) {
		/*
		* Input data from Form
		*/
			include "dashboard/db/db.php";
			$name 	= $_POST['fname'];
			$mail 	= $_POST['umail'];
			$pass 	= $_POST['upass'];
			$pass1 	= $_POST['upass1'];


		/*
		* Value are empty or not
		*/
			if (!empty($name) && !empty($mail) && !empty($pass1) && !empty($pass)) {
				/*
				* Two pass Match's or not
				*/
				$length = strlen($pass);
				if ($length > 8 && $pass === $pass1) {
					/*
					* Email Validate
					*/
					if (filter_var($mail,FILTER_VALIDATE_EMAIL) === false) {
						echo "<script>alert('Your email is not valid!!')</script>";
					}else{
						/*
						* Email exists check
						*/
						$query_check_email 	  = "SELECT * FROM user WHERE uemail = :email";
				    	$stmt_check_email 	  = $db->prepare($query_check_email);
				        $stmt_check_email     -> bindValue(':email',$mail,PDO::PARAM_STR);
				    	$result_check_email   = $stmt_check_email->execute();
				    	$fetch_check_email    = $stmt_check_email->fetch();
				    	if ($fetch_check_email ) {
				    		echo "<script>alert('Email already exists!!')</script>";
				    	}else{
				    		/*
							* Password Encrypt
							*/
				    		$encrypted_password = password_hash($pass,PASSWORD_DEFAULT);
				    		$token = bin2hex(random_bytes(16));
		    				$token_hash = hash_hmac('sha256',$token,'stack');
				    		$query_insert 	  = "INSERT INTO tbl_user (fullname,email,password,user_token)
				    										VALUES(:name,:email,:pass,:token)";
					    	$stmt_insert 	  = $db->prepare($query_insert);
					        $stmt_insert     -> bindValue(':name',$name,PDO::PARAM_STR);
					        $stmt_insert     -> bindValue(':email',$mail,PDO::PARAM_STR);
					        $stmt_insert     -> bindValue(':pass',$encrypted_password,PDO::PARAM_STR);
					        $stmt_insert     -> bindValue(':token',$token_hash,PDO::PARAM_STR);
					    	$result_insert   = $stmt_insert->execute();
					    	if ($result_insert == true) {
					    		$to = $mail;
								$subject = "Rokomari || Email Confirmation";
								$txt = "

									<table  style='width:100%;'>
									<tr style='width: 100%;'>
										<td style='background-color:#ff6666;color:#fff;text-align:center;font-size: 40px;font-weight: bold;letter-spacing: 10px;'>
											<div> 
												<p>Rokomari</p>	
												<span style='font-size: 22px;'>We serve Books</span>
											</div>
										</td>
										
									</tr>
									<br>
									<tr style='width:100%'>
										<td style='text-align: center;'>
											<div>
												<p style='font-size: 25px;'>To conform your email please click the button</p>
												<a href='localhost/rokomari/email_confirmation.php?id=$token' style='background:#ff6666;color:white; padding: 20px; display: inline-block;'>Confirm Email</a>
											</div>
										</td>
									</tr>

									<tr style='width:100%'>
										<td style='text-align: center;'>
											<div>
												<p style='font-size: 15px;'>Find Us</p>
												<a href='#' style='background:#ff6666;color:white; padding: 10px; display: inline-block;'>Facebook</a>
											</div>
										</td>
									</tr>
									</table>

								";
								$headers = "Content-Type: text/html; charset=ISO-8859-1\r\n".
								"From: ibrahimkholil550@gmail.com" . "\r\n" .
								"CC: ibrahimkholil550@gmail.com";

								$mail = mail($to,$subject,$txt,$headers);

								if (!$mail) {
									echo "<script>alert('Mail Not send!!')</script>";
								}
								echo "<script>alert('Data Inseration successfull!!')</script>";
					    	}else{
					    		echo "<script>alert('Data Inseration Faild!!')</script>";
					    		echo "<script>window.location.href='register.php'</script>";
					    	}
				    	}
					}
				}else{
					echo "<script>alert('Problem With password')</script>";
					echo "<script>window.location.href='register.php'</script>";
				}
			}else{
				echo "<script>alert('Field Empty!!')</script>";
				echo "<script>window.location.href='register.php'</script>";
			}

		}else{
			echo "<script>alert('You have to first agreed to the term')</script>";
			echo "<script>window.location.href='register.php'</script>";
		}
	}
?>
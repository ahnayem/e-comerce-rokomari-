<?php  
	ob_start();
	session_start();


	if (isset($_COOKIE['remember'])) {

		include 'db/db.php';
		$cookie 			= $_COOKIE['remember'];
		$token_hash 		= hash_hmac('sha256',$cookie,'secret');

		$query 				= "DELETE FROM remember_login WHERE token_hash = :token_hash";
		$stmt 				= $db->prepare($query);
  		$stmt     			-> bindValue(':token_hash',$token_hash, PDO::PARAM_STR);
		$result 			= $stmt->execute();

		if ($result) {
			setcookie('remember', '', time() - 3600);
			session_destroy();
			header('location: ../signin.php');
		}
	}else{
		setcookie('remember', '', time() - 3600);
		session_destroy();
		header('location: ../signin.php');
	}
	
?>
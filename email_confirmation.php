<?php  
	if (isset($_GET['id'])) {
		include 'dashboard/db/db.php';



		$token = $_GET['id'];

        $token_hash = hash_hmac('sha256',$token,'stack');

		
		$query 	  = "SELECT * FROM tbl_user WHERE user_token=:token";
    	$stmt 	  = $db->prepare($query);
        $stmt     -> bindValue(':token',$token_hash,PDO::PARAM_STR);
    	$result   = $stmt->execute();

    	if ($result == true) {
    		
    		$query 	  = "UPDATE tbl_user SET user_status = 1 WHERE user_token = :token";
	    	$stmt 	  = $db->prepare($query);
	        $stmt     -> bindValue(':token',$token_hash,PDO::PARAM_STR);
	    	$result   = $stmt->execute();

	    	if ($result) {
	    		echo "<script>alert('Success!')</script>";
	    		echo "<script>window.location.href='success'</script>";
	    	}else{
	    		echo "<script>alert('Error!')</script>";
	    	}

    	}else{
    		echo "<script>alert('User Not Found!')</script>";
    	}
	}
?>
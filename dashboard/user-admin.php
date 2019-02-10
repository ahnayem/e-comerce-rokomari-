<?php 
	include 'db/db.php';
	$user_id = $_GET['id'];
	$user_role = $_GET['role'];

	if(isset($user_id) && isset($user_role)){

		if($user_role==2){
			$user_role=1;
		}else{
			$user_role=2;
		}

		$query = "UPDATE tbl_user SET role='$user_role' WHERE id='$user_id'";

		$stmt           = $db->prepare($query);
        $result         = $stmt->execute();

        if($result){
        	echo "<script>alert('User Role UPDATED')</script>";
            echo "<script>window.location.href='users.php'</script>";
        } else{
        	echo "<script>alert('User role cannot be changed!')</script>";
            echo "<script>window.location.href='users.php'</script>";
        }

	} else{
		echo "<script>alert('Something wents WRONG!')</script>";
        echo "<script>window.location.href='users.php'</script>";
	}

 ?>
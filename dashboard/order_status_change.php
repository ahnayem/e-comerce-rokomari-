
<?php  

	include 'db/db.php';

	
	if (isset($_GET['id']) && isset($_GET['action'])) {
		$get_id = $_GET['id'];
		$get_action = $_GET['action'];
		$query        = "UPDATE tbl_order SET order_status = :get_action WHERE order_id = :get_id";
        $stmt         = $db->prepare($query);
        $stmt         -> bindValue(':get_action',$get_action,PDO::PARAM_STR);
        $stmt         -> bindValue(':get_id',$get_id,PDO::PARAM_STR);
        $result       = $stmt->execute();  

	    if ($result) {
	        echo "<script>alert('Status Updated Successfully')</script>";
	        echo "<script>window.location.href='order.php'</script>";
	    }
	}

	
      
?>
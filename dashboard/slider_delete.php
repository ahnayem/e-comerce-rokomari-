
<?php include 'inc/check_session.php'; ?>
<?php include 'inc/fetch_user.php'; ?>
<?php include 'inc/admin.php'; ?>


<?php  

	if (isset($_GET['id']) && isset($_GET['action'])) {

		$get_id = $_GET['id'];

		include 'db/db.php';


        $query          = "DELETE FROM tbl_slider WHERE slider_id = '$get_id'";
        $stmt           = $db->prepare($query);
        $result         = $stmt->execute();
        if ($result == true) {

            echo "<script>alert('Slider DELETED Successfully')</script>";
            echo "<script>window.location.href='slider'</script>";

        }else{
            echo "<script>alert('ERROR!!! While DELETING Category')</script>";
        }
	}else{
		echo "<script>window.location.href='slider'</script>";
	}
?>
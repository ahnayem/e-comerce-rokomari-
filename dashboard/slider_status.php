<?php  
	include 'db/db.php';

    $get_id = $_GET['id'];
	$get_status = $_GET['status'];

    if (isset($get_id) && isset($get_status)) {
    	if ($get_status == 1) {
            $query_update          = "UPDATE tbl_slider SET slider_status = 0 WHERE slider_id = '$get_id'";
            $stmt_update           = $db->prepare($query_update);
            $result_update         = $stmt_update->execute(); 
            if ($result_update == true) {
                echo "<script>alert('Slider Deactivated')</script>";
                echo "<script>window.location.href='slider'</script>";
            }else{
                echo "<script>alert('Slider activated Error')</script>";
            }
        }else{
            $query_update          = "UPDATE tbl_slider SET slider_status = 1 WHERE slider_id = '$get_id'";
            $stmt_update           = $db->prepare($query_update);
            $result_update         = $stmt_update->execute(); 
            if ($result_update == true) {
                echo "<script>alert('Slider activated')</script>";
                echo "<script>window.location.href='slider'</script>";
            }else{
                echo "<script>alert('Activation Error')</script>";
            }
        }
        
    }else{
        echo "<script>alert('Empty')</script>";
    }
?>

<?php include 'inc/check_session.php'; ?>
<?php include 'inc/fetch_user.php'; ?>
<?php include 'inc/admin.php'; ?>



<?php
                                    
    if(isset($_GET["id"])) {


        include 'db/db.php';


        $id = $_GET['id'];


        $query = "DELETE FROM tbl_category WHERE cat_id = '$id'";
        $stmt           = $db->prepare($query);
        $result         = $stmt->execute();
        if ($result) {

            echo "<script>alert('Category DELETED Successfully')</script>";
            echo "<script>window.location.href='category'</script>";

        }else{
            echo "<script>alert('ERROR!!! While DELETING Category')</script>";
        }

    }else{
    	echo "<script>window.location.href='category'</script>";
    }
    
?>
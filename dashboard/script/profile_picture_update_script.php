<?php  
										
	if (isset($_POST['profile'])) {
		$tmp_profile_pic  = $_FILES["image"]["tmp_name"];
		$profile_pic      = $_FILES["image"]["name"];

		if (!empty($profile_pic)) {

            $target_dir = "uploads/profile/";
            $target_file = $target_dir . basename($profile_pic);
            $target_file = md5($target_file);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            

                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                
                } else {
                    $uploadOk = 1;

                    $extension      = explode(".", $profile_pic);
                    $extension      = end($extension);
                    $prod           = $target_file;
                    $newfilename    = $prod .".".$extension;
                    
                    if (move_uploaded_file($tmp_profile_pic, $target_dir.$newfilename)) {
                        $query = "UPDATE tbl_user SET image =:user_image WHERE id=:user_id";

                      $stmt         = $db->prepare($query);
                      $stmt         -> bindValue(':user_image',$newfilename,PDO::PARAM_STR);
                      $stmt         -> bindValue(':user_id',$user_id,PDO::PARAM_INT);
                      $result       = $stmt->execute();  


                        if ($result) {

                            

                            echo "<script>alert('Profile Picture Updated Successfully')</script>";

                            echo "<script>window.location.href='profile.php'</script>";

                        }else{
                            echo "<script>alert('ERROR!!! While Updating')</script>";
                        }
                    }else{
                        echo "<script>alert('ERROR!!! File Not Moved')</script>";
                    }
                }
                    
                
        }else{
        	echo "<script>alert('Field Empty')</script>";
        }
	}

?>
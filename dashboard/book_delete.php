

<?php
                                    
    if(isset($_GET["id"])) {
        include 'db/db.php';
        $id = $_GET['id'];

        $query2         = "SELECT * FROM tbl_books WHERE book_id = '$id'";
        $stmt           = $db->prepare($query2);
        $result         = $stmt->execute();

        while ($row = $stmt->fetch()) {


            $file = $row['book_file'];
            $file_exists = file_exists("uploads/book/".$file);
            if (!$file_exists) {
                echo "<script>alert('File Not Found')</script>";
            }else{
                $delete = unlink("uploads/book/$file");
                if ($delete) {
                    $query = "DELETE FROM tbl_books WHERE book_id = :book_id";
                    $stmt         = $db->prepare($query);

                    $stmt         -> bindValue(':book_id',$id,PDO::PARAM_INT);
                    $result       = $stmt->execute();  

                    if ($result) {
                        echo "<script>alert('Book DELETED Successfully')</script>";
                        echo "<script>window.location.href='book.php'</script>";
                    }else{
                        echo "<script>alert('Database Delete Error')</script>";
                    }
                }else{
                    echo "<script>alert('Error')</script>";
                }
            }
            
        }
        
    }else{
    	echo "<script>window.location.href='book.php'</script>";
    }
    
?>
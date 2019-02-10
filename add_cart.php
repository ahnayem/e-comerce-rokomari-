<?php  
    session_start();

    if (isset($_POST['add_to_cart'])) {

        echo $id = $_GET['id'];
        if (isset($_SESSION['shopping_cart'])) {
            $item_array_id = array_column($_SESSION['shopping_cart'], "item_id");
            if (!in_array($_GET['id'], $item_array_id)) {
                $count = count($_SESSION['shopping_cart']);
                $item_array = array(
                        'item_id' => $_GET['id'], 
                        'item_name' => $_POST['hidden_name'], 
                        'item_price' => $_POST['hidden_price'],
                        'quantity' => $_POST['quantity']);
                if ($_SESSION['shopping_cart'][$count] = $item_array) {
                    echo "<script>alert('Product Added to Cart')</script>";
                    echo "<script>window.location.href='product-detail.php?id=$id'</script>";
                }
                    
            }else{
                echo "<script>alert('Already Added')</script>";
                echo "<script>window.location.href='product-detail.php?id=$id'</script>";
            }
        }else{
            $item_array = array(
                        'item_id' => $_GET['id'], 
                        'item_name' => $_POST['hidden_name'], 
                        'item_price' => $_POST['hidden_price'],
                        'quantity' => $_POST['quantity']);
            $_SESSION['shopping_cart'][0] = $item_array;

            if ($_SESSION['shopping_cart'][0] = $item_array) {
                echo "<script>alert('Product Added to Cart')</script>";
                echo "<script>window.location.href='product-detail.php?id=$id'</script>";
            }
        }

    }
?>
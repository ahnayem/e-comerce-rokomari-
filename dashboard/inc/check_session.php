<?php  
	ob_start();
	session_start();
	include 'db/db.php';
	if( !isset($_SESSION['user_id']) ) {
		header("Location: ../signin");
		exit;
	}
?>
<?php

	$host = "localhost";
	$user = "root";
	$password = "";
	$db_name = "db_rokomari";
	$con = mysqli_connect($host,$user,$password,$db_name);

	// Check connection
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	// $dns = 'mysql:host=localhost;dbname=db_rokomari;charset=utf8';
	// $db = new PDO($dns,'root','');
?>